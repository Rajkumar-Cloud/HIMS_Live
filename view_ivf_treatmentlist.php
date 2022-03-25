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
$view_ivf_treatment_list = new view_ivf_treatment_list();

// Run the page
$view_ivf_treatment_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ivf_treatment_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ivf_treatment->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_ivf_treatmentlist = currentForm = new ew.Form("fview_ivf_treatmentlist", "list");
fview_ivf_treatmentlist.formKeyCountName = '<?php echo $view_ivf_treatment_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_ivf_treatmentlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ivf_treatmentlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ivf_treatmentlist.lists["x_Male"] = <?php echo $view_ivf_treatment_list->Male->Lookup->toClientList() ?>;
fview_ivf_treatmentlist.lists["x_Male"].options = <?php echo JsonEncode($view_ivf_treatment_list->Male->lookupOptions()) ?>;
fview_ivf_treatmentlist.lists["x_Female"] = <?php echo $view_ivf_treatment_list->Female->Lookup->toClientList() ?>;
fview_ivf_treatmentlist.lists["x_Female"].options = <?php echo JsonEncode($view_ivf_treatment_list->Female->lookupOptions()) ?>;
fview_ivf_treatmentlist.lists["x_ReferedBy"] = <?php echo $view_ivf_treatment_list->ReferedBy->Lookup->toClientList() ?>;
fview_ivf_treatmentlist.lists["x_ReferedBy"].options = <?php echo JsonEncode($view_ivf_treatment_list->ReferedBy->lookupOptions()) ?>;
fview_ivf_treatmentlist.lists["x_ARTCYCLE1"] = <?php echo $view_ivf_treatment_list->ARTCYCLE1->Lookup->toClientList() ?>;
fview_ivf_treatmentlist.lists["x_ARTCYCLE1"].options = <?php echo JsonEncode($view_ivf_treatment_list->ARTCYCLE1->options(FALSE, TRUE)) ?>;
fview_ivf_treatmentlist.lists["x_RESULT1"] = <?php echo $view_ivf_treatment_list->RESULT1->Lookup->toClientList() ?>;
fview_ivf_treatmentlist.lists["x_RESULT1"].options = <?php echo JsonEncode($view_ivf_treatment_list->RESULT1->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_ivf_treatmentlistsrch = currentSearchForm = new ew.Form("fview_ivf_treatmentlistsrch");

// Validate function for search
fview_ivf_treatmentlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_ivf_treatmentlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ivf_treatmentlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ivf_treatmentlistsrch.lists["x_Male"] = <?php echo $view_ivf_treatment_list->Male->Lookup->toClientList() ?>;
fview_ivf_treatmentlistsrch.lists["x_Male"].options = <?php echo JsonEncode($view_ivf_treatment_list->Male->lookupOptions()) ?>;
fview_ivf_treatmentlistsrch.lists["x_Female"] = <?php echo $view_ivf_treatment_list->Female->Lookup->toClientList() ?>;
fview_ivf_treatmentlistsrch.lists["x_Female"].options = <?php echo JsonEncode($view_ivf_treatment_list->Female->lookupOptions()) ?>;
fview_ivf_treatmentlistsrch.lists["x_ARTCYCLE1"] = <?php echo $view_ivf_treatment_list->ARTCYCLE1->Lookup->toClientList() ?>;
fview_ivf_treatmentlistsrch.lists["x_ARTCYCLE1"].options = <?php echo JsonEncode($view_ivf_treatment_list->ARTCYCLE1->options(FALSE, TRUE)) ?>;
fview_ivf_treatmentlistsrch.lists["x_RESULT1"] = <?php echo $view_ivf_treatment_list->RESULT1->Lookup->toClientList() ?>;
fview_ivf_treatmentlistsrch.lists["x_RESULT1"].options = <?php echo JsonEncode($view_ivf_treatment_list->RESULT1->options(FALSE, TRUE)) ?>;

// Filters
fview_ivf_treatmentlistsrch.filterList = <?php echo $view_ivf_treatment_list->getFilterList() ?>;
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
<?php if (!$view_ivf_treatment->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ivf_treatment_list->TotalRecs > 0 && $view_ivf_treatment_list->ExportOptions->visible()) { ?>
<?php $view_ivf_treatment_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->ImportOptions->visible()) { ?>
<?php $view_ivf_treatment_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->SearchOptions->visible()) { ?>
<?php $view_ivf_treatment_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->FilterOptions->visible()) { ?>
<?php $view_ivf_treatment_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ivf_treatment_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ivf_treatment->isExport() && !$view_ivf_treatment->CurrentAction) { ?>
<form name="fview_ivf_treatmentlistsrch" id="fview_ivf_treatmentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_ivf_treatment_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_ivf_treatmentlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ivf_treatment">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_ivf_treatment_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_ivf_treatment->RowType = ROWTYPE_SEARCH;

// Render row
$view_ivf_treatment->resetAttributes();
$view_ivf_treatment_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_ivf_treatment->Male->Visible) { // Male ?>
	<div id="xsc_Male" class="ew-cell form-group">
		<label for="x_Male" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment->Male->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Male" id="z_Male" value="="></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ivf_treatment" data-field="x_Male" name="x_Male" id="x_Male" size="30" placeholder="<?php echo HtmlEncode($view_ivf_treatment->Male->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment->Male->EditValue ?>"<?php echo $view_ivf_treatment->Male->editAttributes() ?>>
<?php echo $view_ivf_treatment->Male->Lookup->getParamTag("p_x_Male") ?>
</span>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment->Female->Visible) { // Female ?>
	<div id="xsc_Female" class="ew-cell form-group">
		<label for="x_Female" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment->Female->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Female" id="z_Female" value="="></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ivf_treatment" data-field="x_Female" name="x_Female" id="x_Female" size="30" placeholder="<?php echo HtmlEncode($view_ivf_treatment->Female->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment->Female->EditValue ?>"<?php echo $view_ivf_treatment->Female->editAttributes() ?>>
<?php echo $view_ivf_treatment->Female->Lookup->getParamTag("p_x_Female") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_ivf_treatment->ARTCYCLE1->Visible) { // ARTCYCLE1 ?>
	<div id="xsc_ARTCYCLE1" class="ew-cell form-group">
		<label for="x_ARTCYCLE1" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment->ARTCYCLE1->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ARTCYCLE1" id="z_ARTCYCLE1" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment" data-field="x_ARTCYCLE1" data-value-separator="<?php echo $view_ivf_treatment->ARTCYCLE1->displayValueSeparatorAttribute() ?>" id="x_ARTCYCLE1" name="x_ARTCYCLE1"<?php echo $view_ivf_treatment->ARTCYCLE1->editAttributes() ?>>
		<?php echo $view_ivf_treatment->ARTCYCLE1->selectOptionListHtml("x_ARTCYCLE1") ?>
	</select>
</div>
</span>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment->RESULT1->Visible) { // RESULT1 ?>
	<div id="xsc_RESULT1" class="ew-cell form-group">
		<label for="x_RESULT1" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment->RESULT1->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RESULT1" id="z_RESULT1" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment" data-field="x_RESULT1" data-value-separator="<?php echo $view_ivf_treatment->RESULT1->displayValueSeparatorAttribute() ?>" id="x_RESULT1" name="x_RESULT1"<?php echo $view_ivf_treatment->RESULT1->editAttributes() ?>>
		<?php echo $view_ivf_treatment->RESULT1->selectOptionListHtml("x_RESULT1") ?>
	</select>
</div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($view_ivf_treatment->CoupleID->Visible) { // CoupleID ?>
	<div id="xsc_CoupleID" class="ew-cell form-group">
		<label for="x_CoupleID" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment->CoupleID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_CoupleID" id="z_CoupleID" value="="></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ivf_treatment" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment->CoupleID->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment->CoupleID->EditValue ?>"<?php echo $view_ivf_treatment->CoupleID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_ivf_treatment_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_ivf_treatment_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ivf_treatment_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ivf_treatment_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ivf_treatment_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ivf_treatment_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ivf_treatment_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_ivf_treatment_list->showPageHeader(); ?>
<?php
$view_ivf_treatment_list->showMessage();
?>
<?php if ($view_ivf_treatment_list->TotalRecs > 0 || $view_ivf_treatment->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ivf_treatment_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ivf_treatment">
<?php if (!$view_ivf_treatment->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ivf_treatment->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ivf_treatment_list->Pager)) $view_ivf_treatment_list->Pager = new NumericPager($view_ivf_treatment_list->StartRec, $view_ivf_treatment_list->DisplayRecs, $view_ivf_treatment_list->TotalRecs, $view_ivf_treatment_list->RecRange, $view_ivf_treatment_list->AutoHidePager) ?>
<?php if ($view_ivf_treatment_list->Pager->RecordCount > 0 && $view_ivf_treatment_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ivf_treatment_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_treatment_list->pageUrl() ?>start=<?php echo $view_ivf_treatment_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_treatment_list->pageUrl() ?>start=<?php echo $view_ivf_treatment_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ivf_treatment_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ivf_treatment_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_treatment_list->pageUrl() ?>start=<?php echo $view_ivf_treatment_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_treatment_list->pageUrl() ?>start=<?php echo $view_ivf_treatment_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ivf_treatment_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ivf_treatment_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ivf_treatment_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ivf_treatment_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ivf_treatment_list->TotalRecs > 0 && (!$view_ivf_treatment_list->AutoHidePageSizeSelector || $view_ivf_treatment_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ivf_treatment">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ivf_treatment_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ivf_treatment_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ivf_treatment_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ivf_treatment_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ivf_treatment_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ivf_treatment_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ivf_treatment->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ivf_treatment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ivf_treatmentlist" id="fview_ivf_treatmentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ivf_treatment_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ivf_treatment_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ivf_treatment">
<div id="gmp_view_ivf_treatment" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_ivf_treatment_list->TotalRecs > 0 || $view_ivf_treatment->isGridEdit()) { ?>
<table id="tbl_view_ivf_treatmentlist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ivf_treatment_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_ivf_treatment_list->renderListOptions();

// Render list options (header, left)
$view_ivf_treatment_list->ListOptions->render("header", "left", "", "block", $view_ivf_treatment->TableVar, "view_ivf_treatmentlist");
?>
<?php if ($view_ivf_treatment->id->Visible) { // id ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ivf_treatment->id->headerCellClass() ?>"><div id="elh_view_ivf_treatment_id" class="view_ivf_treatment_id"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_id" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ivf_treatment->id->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_id" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->id) ?>',1);"><div id="elh_view_ivf_treatment_id" class="view_ivf_treatment_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_ivf_treatment->RIDNO->headerCellClass() ?>"><div id="elh_view_ivf_treatment_RIDNO" class="view_ivf_treatment_RIDNO"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_RIDNO" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->RIDNO->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_ivf_treatment->RIDNO->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_RIDNO" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->RIDNO) ?>',1);"><div id="elh_view_ivf_treatment_RIDNO" class="view_ivf_treatment_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->Name->Visible) { // Name ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $view_ivf_treatment->Name->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Name" class="view_ivf_treatment_Name"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_Name" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->Name->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $view_ivf_treatment->Name->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_Name" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->Name) ?>',1);"><div id="elh_view_ivf_treatment_Name" class="view_ivf_treatment_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->Age->Visible) { // Age ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_ivf_treatment->Age->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Age" class="view_ivf_treatment_Age"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_Age" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->Age->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_ivf_treatment->Age->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_Age" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->Age) ?>',1);"><div id="elh_view_ivf_treatment_Age" class="view_ivf_treatment_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->treatment_status->Visible) { // treatment_status ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->treatment_status) == "") { ?>
		<th data-name="treatment_status" class="<?php echo $view_ivf_treatment->treatment_status->headerCellClass() ?>"><div id="elh_view_ivf_treatment_treatment_status" class="view_ivf_treatment_treatment_status"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_treatment_status" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->treatment_status->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="treatment_status" class="<?php echo $view_ivf_treatment->treatment_status->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_treatment_status" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->treatment_status) ?>',1);"><div id="elh_view_ivf_treatment_treatment_status" class="view_ivf_treatment_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->treatment_status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->treatment_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->treatment_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_ivf_treatment->ARTCYCLE->headerCellClass() ?>"><div id="elh_view_ivf_treatment_ARTCYCLE" class="view_ivf_treatment_ARTCYCLE"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_ARTCYCLE" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->ARTCYCLE->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_ivf_treatment->ARTCYCLE->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_ARTCYCLE" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->ARTCYCLE) ?>',1);"><div id="elh_view_ivf_treatment_ARTCYCLE" class="view_ivf_treatment_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->ARTCYCLE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->ARTCYCLE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->ARTCYCLE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->RESULT->Visible) { // RESULT ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $view_ivf_treatment->RESULT->headerCellClass() ?>"><div id="elh_view_ivf_treatment_RESULT" class="view_ivf_treatment_RESULT"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_RESULT" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->RESULT->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $view_ivf_treatment->RESULT->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_RESULT" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->RESULT) ?>',1);"><div id="elh_view_ivf_treatment_RESULT" class="view_ivf_treatment_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->RESULT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->RESULT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->RESULT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->status->Visible) { // status ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_ivf_treatment->status->headerCellClass() ?>"><div id="elh_view_ivf_treatment_status" class="view_ivf_treatment_status"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_status" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->status->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_ivf_treatment->status->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_status" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->status) ?>',1);"><div id="elh_view_ivf_treatment_status" class="view_ivf_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->createdby->Visible) { // createdby ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ivf_treatment->createdby->headerCellClass() ?>"><div id="elh_view_ivf_treatment_createdby" class="view_ivf_treatment_createdby"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_createdby" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->createdby->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ivf_treatment->createdby->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_createdby" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->createdby) ?>',1);"><div id="elh_view_ivf_treatment_createdby" class="view_ivf_treatment_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ivf_treatment->createddatetime->headerCellClass() ?>"><div id="elh_view_ivf_treatment_createddatetime" class="view_ivf_treatment_createddatetime"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_createddatetime" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->createddatetime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ivf_treatment->createddatetime->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_createddatetime" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->createddatetime) ?>',1);"><div id="elh_view_ivf_treatment_createddatetime" class="view_ivf_treatment_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ivf_treatment->modifiedby->headerCellClass() ?>"><div id="elh_view_ivf_treatment_modifiedby" class="view_ivf_treatment_modifiedby"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_modifiedby" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->modifiedby->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ivf_treatment->modifiedby->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_modifiedby" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->modifiedby) ?>',1);"><div id="elh_view_ivf_treatment_modifiedby" class="view_ivf_treatment_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ivf_treatment->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ivf_treatment_modifieddatetime" class="view_ivf_treatment_modifieddatetime"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_modifieddatetime" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->modifieddatetime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ivf_treatment->modifieddatetime->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_modifieddatetime" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->modifieddatetime) ?>',1);"><div id="elh_view_ivf_treatment_modifieddatetime" class="view_ivf_treatment_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->TreatmentStartDate) == "") { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $view_ivf_treatment->TreatmentStartDate->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TreatmentStartDate" class="view_ivf_treatment_TreatmentStartDate"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_TreatmentStartDate" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->TreatmentStartDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $view_ivf_treatment->TreatmentStartDate->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_TreatmentStartDate" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->TreatmentStartDate) ?>',1);"><div id="elh_view_ivf_treatment_TreatmentStartDate" class="view_ivf_treatment_TreatmentStartDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->TreatmentStartDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->TreatmentStartDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->TreatmentStartDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->TreatementStopDate->Visible) { // TreatementStopDate ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->TreatementStopDate) == "") { ?>
		<th data-name="TreatementStopDate" class="<?php echo $view_ivf_treatment->TreatementStopDate->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TreatementStopDate" class="view_ivf_treatment_TreatementStopDate"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_TreatementStopDate" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->TreatementStopDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="TreatementStopDate" class="<?php echo $view_ivf_treatment->TreatementStopDate->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_TreatementStopDate" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->TreatementStopDate) ?>',1);"><div id="elh_view_ivf_treatment_TreatementStopDate" class="view_ivf_treatment_TreatementStopDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->TreatementStopDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->TreatementStopDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->TreatementStopDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->TypePatient->Visible) { // TypePatient ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->TypePatient) == "") { ?>
		<th data-name="TypePatient" class="<?php echo $view_ivf_treatment->TypePatient->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TypePatient" class="view_ivf_treatment_TypePatient"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_TypePatient" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->TypePatient->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="TypePatient" class="<?php echo $view_ivf_treatment->TypePatient->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_TypePatient" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->TypePatient) ?>',1);"><div id="elh_view_ivf_treatment_TypePatient" class="view_ivf_treatment_TypePatient">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->TypePatient->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->TypePatient->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->TypePatient->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->Treatment->Visible) { // Treatment ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->Treatment) == "") { ?>
		<th data-name="Treatment" class="<?php echo $view_ivf_treatment->Treatment->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Treatment" class="view_ivf_treatment_Treatment"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_Treatment" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->Treatment->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Treatment" class="<?php echo $view_ivf_treatment->Treatment->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_Treatment" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->Treatment) ?>',1);"><div id="elh_view_ivf_treatment_Treatment" class="view_ivf_treatment_Treatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->Treatment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->Treatment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->Treatment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->TreatmentTec->Visible) { // TreatmentTec ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->TreatmentTec) == "") { ?>
		<th data-name="TreatmentTec" class="<?php echo $view_ivf_treatment->TreatmentTec->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TreatmentTec" class="view_ivf_treatment_TreatmentTec"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_TreatmentTec" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->TreatmentTec->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentTec" class="<?php echo $view_ivf_treatment->TreatmentTec->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_TreatmentTec" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->TreatmentTec) ?>',1);"><div id="elh_view_ivf_treatment_TreatmentTec" class="view_ivf_treatment_TreatmentTec">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->TreatmentTec->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->TreatmentTec->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->TreatmentTec->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->TypeOfCycle->Visible) { // TypeOfCycle ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->TypeOfCycle) == "") { ?>
		<th data-name="TypeOfCycle" class="<?php echo $view_ivf_treatment->TypeOfCycle->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TypeOfCycle" class="view_ivf_treatment_TypeOfCycle"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_TypeOfCycle" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->TypeOfCycle->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="TypeOfCycle" class="<?php echo $view_ivf_treatment->TypeOfCycle->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_TypeOfCycle" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->TypeOfCycle) ?>',1);"><div id="elh_view_ivf_treatment_TypeOfCycle" class="view_ivf_treatment_TypeOfCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->TypeOfCycle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->TypeOfCycle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->TypeOfCycle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->SpermOrgin->Visible) { // SpermOrgin ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->SpermOrgin) == "") { ?>
		<th data-name="SpermOrgin" class="<?php echo $view_ivf_treatment->SpermOrgin->headerCellClass() ?>"><div id="elh_view_ivf_treatment_SpermOrgin" class="view_ivf_treatment_SpermOrgin"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_SpermOrgin" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->SpermOrgin->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="SpermOrgin" class="<?php echo $view_ivf_treatment->SpermOrgin->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_SpermOrgin" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->SpermOrgin) ?>',1);"><div id="elh_view_ivf_treatment_SpermOrgin" class="view_ivf_treatment_SpermOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->SpermOrgin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->SpermOrgin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->SpermOrgin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->State->Visible) { // State ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->State) == "") { ?>
		<th data-name="State" class="<?php echo $view_ivf_treatment->State->headerCellClass() ?>"><div id="elh_view_ivf_treatment_State" class="view_ivf_treatment_State"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_State" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->State->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $view_ivf_treatment->State->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_State" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->State) ?>',1);"><div id="elh_view_ivf_treatment_State" class="view_ivf_treatment_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->Origin->Visible) { // Origin ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->Origin) == "") { ?>
		<th data-name="Origin" class="<?php echo $view_ivf_treatment->Origin->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Origin" class="view_ivf_treatment_Origin"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_Origin" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->Origin->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Origin" class="<?php echo $view_ivf_treatment->Origin->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_Origin" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->Origin) ?>',1);"><div id="elh_view_ivf_treatment_Origin" class="view_ivf_treatment_Origin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->Origin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->Origin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->Origin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->MACS->Visible) { // MACS ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->MACS) == "") { ?>
		<th data-name="MACS" class="<?php echo $view_ivf_treatment->MACS->headerCellClass() ?>"><div id="elh_view_ivf_treatment_MACS" class="view_ivf_treatment_MACS"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_MACS" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->MACS->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="MACS" class="<?php echo $view_ivf_treatment->MACS->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_MACS" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->MACS) ?>',1);"><div id="elh_view_ivf_treatment_MACS" class="view_ivf_treatment_MACS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->MACS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->MACS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->MACS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->Technique->Visible) { // Technique ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->Technique) == "") { ?>
		<th data-name="Technique" class="<?php echo $view_ivf_treatment->Technique->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Technique" class="view_ivf_treatment_Technique"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_Technique" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->Technique->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Technique" class="<?php echo $view_ivf_treatment->Technique->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_Technique" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->Technique) ?>',1);"><div id="elh_view_ivf_treatment_Technique" class="view_ivf_treatment_Technique">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->Technique->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->Technique->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->Technique->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->PgdPlanning->Visible) { // PgdPlanning ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->PgdPlanning) == "") { ?>
		<th data-name="PgdPlanning" class="<?php echo $view_ivf_treatment->PgdPlanning->headerCellClass() ?>"><div id="elh_view_ivf_treatment_PgdPlanning" class="view_ivf_treatment_PgdPlanning"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_PgdPlanning" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->PgdPlanning->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PgdPlanning" class="<?php echo $view_ivf_treatment->PgdPlanning->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_PgdPlanning" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->PgdPlanning) ?>',1);"><div id="elh_view_ivf_treatment_PgdPlanning" class="view_ivf_treatment_PgdPlanning">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->PgdPlanning->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->PgdPlanning->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->PgdPlanning->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->IMSI->Visible) { // IMSI ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->IMSI) == "") { ?>
		<th data-name="IMSI" class="<?php echo $view_ivf_treatment->IMSI->headerCellClass() ?>"><div id="elh_view_ivf_treatment_IMSI" class="view_ivf_treatment_IMSI"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_IMSI" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->IMSI->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="IMSI" class="<?php echo $view_ivf_treatment->IMSI->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_IMSI" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->IMSI) ?>',1);"><div id="elh_view_ivf_treatment_IMSI" class="view_ivf_treatment_IMSI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->IMSI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->IMSI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->IMSI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->SequentialCulture->Visible) { // SequentialCulture ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->SequentialCulture) == "") { ?>
		<th data-name="SequentialCulture" class="<?php echo $view_ivf_treatment->SequentialCulture->headerCellClass() ?>"><div id="elh_view_ivf_treatment_SequentialCulture" class="view_ivf_treatment_SequentialCulture"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_SequentialCulture" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->SequentialCulture->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="SequentialCulture" class="<?php echo $view_ivf_treatment->SequentialCulture->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_SequentialCulture" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->SequentialCulture) ?>',1);"><div id="elh_view_ivf_treatment_SequentialCulture" class="view_ivf_treatment_SequentialCulture">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->SequentialCulture->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->SequentialCulture->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->SequentialCulture->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->TimeLapse->Visible) { // TimeLapse ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->TimeLapse) == "") { ?>
		<th data-name="TimeLapse" class="<?php echo $view_ivf_treatment->TimeLapse->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TimeLapse" class="view_ivf_treatment_TimeLapse"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_TimeLapse" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->TimeLapse->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="TimeLapse" class="<?php echo $view_ivf_treatment->TimeLapse->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_TimeLapse" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->TimeLapse) ?>',1);"><div id="elh_view_ivf_treatment_TimeLapse" class="view_ivf_treatment_TimeLapse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->TimeLapse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->TimeLapse->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->TimeLapse->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->AH->Visible) { // AH ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->AH) == "") { ?>
		<th data-name="AH" class="<?php echo $view_ivf_treatment->AH->headerCellClass() ?>"><div id="elh_view_ivf_treatment_AH" class="view_ivf_treatment_AH"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_AH" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->AH->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="AH" class="<?php echo $view_ivf_treatment->AH->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_AH" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->AH) ?>',1);"><div id="elh_view_ivf_treatment_AH" class="view_ivf_treatment_AH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->AH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->AH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->AH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->Weight->Visible) { // Weight ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->Weight) == "") { ?>
		<th data-name="Weight" class="<?php echo $view_ivf_treatment->Weight->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Weight" class="view_ivf_treatment_Weight"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_Weight" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->Weight->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Weight" class="<?php echo $view_ivf_treatment->Weight->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_Weight" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->Weight) ?>',1);"><div id="elh_view_ivf_treatment_Weight" class="view_ivf_treatment_Weight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->Weight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->Weight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->Weight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->BMI->Visible) { // BMI ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->BMI) == "") { ?>
		<th data-name="BMI" class="<?php echo $view_ivf_treatment->BMI->headerCellClass() ?>"><div id="elh_view_ivf_treatment_BMI" class="view_ivf_treatment_BMI"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_BMI" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->BMI->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BMI" class="<?php echo $view_ivf_treatment->BMI->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_BMI" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->BMI) ?>',1);"><div id="elh_view_ivf_treatment_BMI" class="view_ivf_treatment_BMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->BMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->BMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->BMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->Male->Visible) { // Male ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->Male) == "") { ?>
		<th data-name="Male" class="<?php echo $view_ivf_treatment->Male->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Male" class="view_ivf_treatment_Male"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_Male" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->Male->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Male" class="<?php echo $view_ivf_treatment->Male->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_Male" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->Male) ?>',1);"><div id="elh_view_ivf_treatment_Male" class="view_ivf_treatment_Male">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->Male->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->Male->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->Male->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->Female->Visible) { // Female ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->Female) == "") { ?>
		<th data-name="Female" class="<?php echo $view_ivf_treatment->Female->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Female" class="view_ivf_treatment_Female"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_Female" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->Female->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Female" class="<?php echo $view_ivf_treatment->Female->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_Female" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->Female) ?>',1);"><div id="elh_view_ivf_treatment_Female" class="view_ivf_treatment_Female">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->Female->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->Female->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->Female->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->malepropic->Visible) { // malepropic ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->malepropic) == "") { ?>
		<th data-name="malepropic" class="<?php echo $view_ivf_treatment->malepropic->headerCellClass() ?>"><div id="elh_view_ivf_treatment_malepropic" class="view_ivf_treatment_malepropic"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_malepropic" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->malepropic->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="malepropic" class="<?php echo $view_ivf_treatment->malepropic->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_malepropic" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->malepropic) ?>',1);"><div id="elh_view_ivf_treatment_malepropic" class="view_ivf_treatment_malepropic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->malepropic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->malepropic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->malepropic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->femalepropic->Visible) { // femalepropic ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->femalepropic) == "") { ?>
		<th data-name="femalepropic" class="<?php echo $view_ivf_treatment->femalepropic->headerCellClass() ?>"><div id="elh_view_ivf_treatment_femalepropic" class="view_ivf_treatment_femalepropic"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_femalepropic" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->femalepropic->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="femalepropic" class="<?php echo $view_ivf_treatment->femalepropic->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_femalepropic" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->femalepropic) ?>',1);"><div id="elh_view_ivf_treatment_femalepropic" class="view_ivf_treatment_femalepropic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->femalepropic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->femalepropic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->femalepropic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->HusbandEducation->Visible) { // HusbandEducation ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->HusbandEducation) == "") { ?>
		<th data-name="HusbandEducation" class="<?php echo $view_ivf_treatment->HusbandEducation->headerCellClass() ?>"><div id="elh_view_ivf_treatment_HusbandEducation" class="view_ivf_treatment_HusbandEducation"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_HusbandEducation" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->HusbandEducation->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandEducation" class="<?php echo $view_ivf_treatment->HusbandEducation->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_HusbandEducation" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->HusbandEducation) ?>',1);"><div id="elh_view_ivf_treatment_HusbandEducation" class="view_ivf_treatment_HusbandEducation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->HusbandEducation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->HusbandEducation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->HusbandEducation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->WifeEducation->Visible) { // WifeEducation ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->WifeEducation) == "") { ?>
		<th data-name="WifeEducation" class="<?php echo $view_ivf_treatment->WifeEducation->headerCellClass() ?>"><div id="elh_view_ivf_treatment_WifeEducation" class="view_ivf_treatment_WifeEducation"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_WifeEducation" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->WifeEducation->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeEducation" class="<?php echo $view_ivf_treatment->WifeEducation->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_WifeEducation" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->WifeEducation) ?>',1);"><div id="elh_view_ivf_treatment_WifeEducation" class="view_ivf_treatment_WifeEducation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->WifeEducation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->WifeEducation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->WifeEducation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->HusbandWorkHours) == "") { ?>
		<th data-name="HusbandWorkHours" class="<?php echo $view_ivf_treatment->HusbandWorkHours->headerCellClass() ?>"><div id="elh_view_ivf_treatment_HusbandWorkHours" class="view_ivf_treatment_HusbandWorkHours"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_HusbandWorkHours" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->HusbandWorkHours->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandWorkHours" class="<?php echo $view_ivf_treatment->HusbandWorkHours->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_HusbandWorkHours" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->HusbandWorkHours) ?>',1);"><div id="elh_view_ivf_treatment_HusbandWorkHours" class="view_ivf_treatment_HusbandWorkHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->HusbandWorkHours->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->HusbandWorkHours->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->HusbandWorkHours->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->WifeWorkHours) == "") { ?>
		<th data-name="WifeWorkHours" class="<?php echo $view_ivf_treatment->WifeWorkHours->headerCellClass() ?>"><div id="elh_view_ivf_treatment_WifeWorkHours" class="view_ivf_treatment_WifeWorkHours"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_WifeWorkHours" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->WifeWorkHours->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeWorkHours" class="<?php echo $view_ivf_treatment->WifeWorkHours->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_WifeWorkHours" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->WifeWorkHours) ?>',1);"><div id="elh_view_ivf_treatment_WifeWorkHours" class="view_ivf_treatment_WifeWorkHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->WifeWorkHours->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->WifeWorkHours->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->WifeWorkHours->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->PatientLanguage->Visible) { // PatientLanguage ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->PatientLanguage) == "") { ?>
		<th data-name="PatientLanguage" class="<?php echo $view_ivf_treatment->PatientLanguage->headerCellClass() ?>"><div id="elh_view_ivf_treatment_PatientLanguage" class="view_ivf_treatment_PatientLanguage"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_PatientLanguage" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->PatientLanguage->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientLanguage" class="<?php echo $view_ivf_treatment->PatientLanguage->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_PatientLanguage" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->PatientLanguage) ?>',1);"><div id="elh_view_ivf_treatment_PatientLanguage" class="view_ivf_treatment_PatientLanguage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->PatientLanguage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->PatientLanguage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->PatientLanguage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->ReferedBy->Visible) { // ReferedBy ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->ReferedBy) == "") { ?>
		<th data-name="ReferedBy" class="<?php echo $view_ivf_treatment->ReferedBy->headerCellClass() ?>"><div id="elh_view_ivf_treatment_ReferedBy" class="view_ivf_treatment_ReferedBy"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_ReferedBy" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->ReferedBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedBy" class="<?php echo $view_ivf_treatment->ReferedBy->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_ReferedBy" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->ReferedBy) ?>',1);"><div id="elh_view_ivf_treatment_ReferedBy" class="view_ivf_treatment_ReferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->ReferedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->ReferedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->ReferedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->ReferPhNo->Visible) { // ReferPhNo ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->ReferPhNo) == "") { ?>
		<th data-name="ReferPhNo" class="<?php echo $view_ivf_treatment->ReferPhNo->headerCellClass() ?>"><div id="elh_view_ivf_treatment_ReferPhNo" class="view_ivf_treatment_ReferPhNo"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_ReferPhNo" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->ReferPhNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferPhNo" class="<?php echo $view_ivf_treatment->ReferPhNo->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_ReferPhNo" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->ReferPhNo) ?>',1);"><div id="elh_view_ivf_treatment_ReferPhNo" class="view_ivf_treatment_ReferPhNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->ReferPhNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->ReferPhNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->ReferPhNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->ARTCYCLE1->Visible) { // ARTCYCLE1 ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->ARTCYCLE1) == "") { ?>
		<th data-name="ARTCYCLE1" class="<?php echo $view_ivf_treatment->ARTCYCLE1->headerCellClass() ?>"><div id="elh_view_ivf_treatment_ARTCYCLE1" class="view_ivf_treatment_ARTCYCLE1"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_ARTCYCLE1" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->ARTCYCLE1->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE1" class="<?php echo $view_ivf_treatment->ARTCYCLE1->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_ARTCYCLE1" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->ARTCYCLE1) ?>',1);"><div id="elh_view_ivf_treatment_ARTCYCLE1" class="view_ivf_treatment_ARTCYCLE1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->ARTCYCLE1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->ARTCYCLE1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->ARTCYCLE1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->RESULT1->Visible) { // RESULT1 ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->RESULT1) == "") { ?>
		<th data-name="RESULT1" class="<?php echo $view_ivf_treatment->RESULT1->headerCellClass() ?>"><div id="elh_view_ivf_treatment_RESULT1" class="view_ivf_treatment_RESULT1"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_RESULT1" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->RESULT1->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT1" class="<?php echo $view_ivf_treatment->RESULT1->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_RESULT1" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->RESULT1) ?>',1);"><div id="elh_view_ivf_treatment_RESULT1" class="view_ivf_treatment_RESULT1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->RESULT1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->RESULT1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->RESULT1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->CoupleID->Visible) { // CoupleID ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->CoupleID) == "") { ?>
		<th data-name="CoupleID" class="<?php echo $view_ivf_treatment->CoupleID->headerCellClass() ?>"><div id="elh_view_ivf_treatment_CoupleID" class="view_ivf_treatment_CoupleID"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_CoupleID" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->CoupleID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CoupleID" class="<?php echo $view_ivf_treatment->CoupleID->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_CoupleID" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->CoupleID) ?>',1);"><div id="elh_view_ivf_treatment_CoupleID" class="view_ivf_treatment_CoupleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->CoupleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->CoupleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->CoupleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment->HospID->Visible) { // HospID ?>
	<?php if ($view_ivf_treatment->sortUrl($view_ivf_treatment->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ivf_treatment->HospID->headerCellClass() ?>"><div id="elh_view_ivf_treatment_HospID" class="view_ivf_treatment_HospID"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_HospID" class="view_ivf_treatmentlist" type="text/html"><span><?php echo $view_ivf_treatment->HospID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ivf_treatment->HospID->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_HospID" class="view_ivf_treatmentlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment->SortUrl($view_ivf_treatment->HospID) ?>',1);"><div id="elh_view_ivf_treatment_HospID" class="view_ivf_treatment_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ivf_treatment_list->ListOptions->render("header", "right", "", "block", $view_ivf_treatment->TableVar, "view_ivf_treatmentlist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ivf_treatment->ExportAll && $view_ivf_treatment->isExport()) {
	$view_ivf_treatment_list->StopRec = $view_ivf_treatment_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_ivf_treatment_list->TotalRecs > $view_ivf_treatment_list->StartRec + $view_ivf_treatment_list->DisplayRecs - 1)
		$view_ivf_treatment_list->StopRec = $view_ivf_treatment_list->StartRec + $view_ivf_treatment_list->DisplayRecs - 1;
	else
		$view_ivf_treatment_list->StopRec = $view_ivf_treatment_list->TotalRecs;
}
$view_ivf_treatment_list->RecCnt = $view_ivf_treatment_list->StartRec - 1;
if ($view_ivf_treatment_list->Recordset && !$view_ivf_treatment_list->Recordset->EOF) {
	$view_ivf_treatment_list->Recordset->moveFirst();
	$selectLimit = $view_ivf_treatment_list->UseSelectLimit;
	if (!$selectLimit && $view_ivf_treatment_list->StartRec > 1)
		$view_ivf_treatment_list->Recordset->move($view_ivf_treatment_list->StartRec - 1);
} elseif (!$view_ivf_treatment->AllowAddDeleteRow && $view_ivf_treatment_list->StopRec == 0) {
	$view_ivf_treatment_list->StopRec = $view_ivf_treatment->GridAddRowCount;
}

// Initialize aggregate
$view_ivf_treatment->RowType = ROWTYPE_AGGREGATEINIT;
$view_ivf_treatment->resetAttributes();
$view_ivf_treatment_list->renderRow();
while ($view_ivf_treatment_list->RecCnt < $view_ivf_treatment_list->StopRec) {
	$view_ivf_treatment_list->RecCnt++;
	if ($view_ivf_treatment_list->RecCnt >= $view_ivf_treatment_list->StartRec) {
		$view_ivf_treatment_list->RowCnt++;

		// Set up key count
		$view_ivf_treatment_list->KeyCount = $view_ivf_treatment_list->RowIndex;

		// Init row class and style
		$view_ivf_treatment->resetAttributes();
		$view_ivf_treatment->CssClass = "";
		if ($view_ivf_treatment->isGridAdd()) {
		} else {
			$view_ivf_treatment_list->loadRowValues($view_ivf_treatment_list->Recordset); // Load row values
		}
		$view_ivf_treatment->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ivf_treatment->RowAttrs = array_merge($view_ivf_treatment->RowAttrs, array('data-rowindex'=>$view_ivf_treatment_list->RowCnt, 'id'=>'r' . $view_ivf_treatment_list->RowCnt . '_view_ivf_treatment', 'data-rowtype'=>$view_ivf_treatment->RowType));

		// Render row
		$view_ivf_treatment_list->renderRow();

		// Render list options
		$view_ivf_treatment_list->renderListOptions();

		// Save row and cell attributes
		$view_ivf_treatment_list->Attrs[$view_ivf_treatment_list->RowCnt] = array("row_attrs" => $view_ivf_treatment->rowAttributes(), "cell_attrs" => array());
		$view_ivf_treatment_list->Attrs[$view_ivf_treatment_list->RowCnt]["cell_attrs"] = $view_ivf_treatment->fieldCellAttributes();
?>
	<tr<?php echo $view_ivf_treatment->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ivf_treatment_list->ListOptions->render("body", "left", $view_ivf_treatment_list->RowCnt, "block", $view_ivf_treatment->TableVar, "view_ivf_treatmentlist");
?>
	<?php if ($view_ivf_treatment->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_ivf_treatment->id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_id" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_id" class="view_ivf_treatment_id">
<span<?php echo $view_ivf_treatment->id->viewAttributes() ?>>
<?php echo $view_ivf_treatment->id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $view_ivf_treatment->RIDNO->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_RIDNO" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_RIDNO" class="view_ivf_treatment_RIDNO">
<span<?php echo $view_ivf_treatment->RIDNO->viewAttributes() ?>>
<?php echo $view_ivf_treatment->RIDNO->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $view_ivf_treatment->Name->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_Name" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_Name" class="view_ivf_treatment_Name">
<span<?php echo $view_ivf_treatment->Name->viewAttributes() ?>>
<?php echo $view_ivf_treatment->Name->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_ivf_treatment->Age->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_Age" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_Age" class="view_ivf_treatment_Age">
<span<?php echo $view_ivf_treatment->Age->viewAttributes() ?>>
<?php echo $view_ivf_treatment->Age->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status"<?php echo $view_ivf_treatment->treatment_status->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_treatment_status" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_treatment_status" class="view_ivf_treatment_treatment_status">
<span<?php echo $view_ivf_treatment->treatment_status->viewAttributes() ?>>
<?php echo $view_ivf_treatment->treatment_status->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE"<?php echo $view_ivf_treatment->ARTCYCLE->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_ARTCYCLE" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_ARTCYCLE" class="view_ivf_treatment_ARTCYCLE">
<span<?php echo $view_ivf_treatment->ARTCYCLE->viewAttributes() ?>>
<?php echo $view_ivf_treatment->ARTCYCLE->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT"<?php echo $view_ivf_treatment->RESULT->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_RESULT" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_RESULT" class="view_ivf_treatment_RESULT">
<span<?php echo $view_ivf_treatment->RESULT->viewAttributes() ?>>
<?php echo $view_ivf_treatment->RESULT->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_ivf_treatment->status->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_status" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_status" class="view_ivf_treatment_status">
<span<?php echo $view_ivf_treatment->status->viewAttributes() ?>>
<?php echo $view_ivf_treatment->status->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_ivf_treatment->createdby->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_createdby" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_createdby" class="view_ivf_treatment_createdby">
<span<?php echo $view_ivf_treatment->createdby->viewAttributes() ?>>
<?php echo $view_ivf_treatment->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_ivf_treatment->createddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_createddatetime" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_createddatetime" class="view_ivf_treatment_createddatetime">
<span<?php echo $view_ivf_treatment->createddatetime->viewAttributes() ?>>
<?php echo $view_ivf_treatment->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_ivf_treatment->modifiedby->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_modifiedby" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_modifiedby" class="view_ivf_treatment_modifiedby">
<span<?php echo $view_ivf_treatment->modifiedby->viewAttributes() ?>>
<?php echo $view_ivf_treatment->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_ivf_treatment->modifieddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_modifieddatetime" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_modifieddatetime" class="view_ivf_treatment_modifieddatetime">
<span<?php echo $view_ivf_treatment->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ivf_treatment->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td data-name="TreatmentStartDate"<?php echo $view_ivf_treatment->TreatmentStartDate->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_TreatmentStartDate" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_TreatmentStartDate" class="view_ivf_treatment_TreatmentStartDate">
<span<?php echo $view_ivf_treatment->TreatmentStartDate->viewAttributes() ?>>
<?php echo $view_ivf_treatment->TreatmentStartDate->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->TreatementStopDate->Visible) { // TreatementStopDate ?>
		<td data-name="TreatementStopDate"<?php echo $view_ivf_treatment->TreatementStopDate->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_TreatementStopDate" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_TreatementStopDate" class="view_ivf_treatment_TreatementStopDate">
<span<?php echo $view_ivf_treatment->TreatementStopDate->viewAttributes() ?>>
<?php echo $view_ivf_treatment->TreatementStopDate->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->TypePatient->Visible) { // TypePatient ?>
		<td data-name="TypePatient"<?php echo $view_ivf_treatment->TypePatient->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_TypePatient" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_TypePatient" class="view_ivf_treatment_TypePatient">
<span<?php echo $view_ivf_treatment->TypePatient->viewAttributes() ?>>
<?php echo $view_ivf_treatment->TypePatient->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment"<?php echo $view_ivf_treatment->Treatment->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_Treatment" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_Treatment" class="view_ivf_treatment_Treatment">
<span<?php echo $view_ivf_treatment->Treatment->viewAttributes() ?>>
<?php echo $view_ivf_treatment->Treatment->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->TreatmentTec->Visible) { // TreatmentTec ?>
		<td data-name="TreatmentTec"<?php echo $view_ivf_treatment->TreatmentTec->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_TreatmentTec" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_TreatmentTec" class="view_ivf_treatment_TreatmentTec">
<span<?php echo $view_ivf_treatment->TreatmentTec->viewAttributes() ?>>
<?php echo $view_ivf_treatment->TreatmentTec->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<td data-name="TypeOfCycle"<?php echo $view_ivf_treatment->TypeOfCycle->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_TypeOfCycle" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_TypeOfCycle" class="view_ivf_treatment_TypeOfCycle">
<span<?php echo $view_ivf_treatment->TypeOfCycle->viewAttributes() ?>>
<?php echo $view_ivf_treatment->TypeOfCycle->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->SpermOrgin->Visible) { // SpermOrgin ?>
		<td data-name="SpermOrgin"<?php echo $view_ivf_treatment->SpermOrgin->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_SpermOrgin" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_SpermOrgin" class="view_ivf_treatment_SpermOrgin">
<span<?php echo $view_ivf_treatment->SpermOrgin->viewAttributes() ?>>
<?php echo $view_ivf_treatment->SpermOrgin->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->State->Visible) { // State ?>
		<td data-name="State"<?php echo $view_ivf_treatment->State->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_State" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_State" class="view_ivf_treatment_State">
<span<?php echo $view_ivf_treatment->State->viewAttributes() ?>>
<?php echo $view_ivf_treatment->State->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->Origin->Visible) { // Origin ?>
		<td data-name="Origin"<?php echo $view_ivf_treatment->Origin->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_Origin" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_Origin" class="view_ivf_treatment_Origin">
<span<?php echo $view_ivf_treatment->Origin->viewAttributes() ?>>
<?php echo $view_ivf_treatment->Origin->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->MACS->Visible) { // MACS ?>
		<td data-name="MACS"<?php echo $view_ivf_treatment->MACS->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_MACS" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_MACS" class="view_ivf_treatment_MACS">
<span<?php echo $view_ivf_treatment->MACS->viewAttributes() ?>>
<?php echo $view_ivf_treatment->MACS->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->Technique->Visible) { // Technique ?>
		<td data-name="Technique"<?php echo $view_ivf_treatment->Technique->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_Technique" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_Technique" class="view_ivf_treatment_Technique">
<span<?php echo $view_ivf_treatment->Technique->viewAttributes() ?>>
<?php echo $view_ivf_treatment->Technique->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->PgdPlanning->Visible) { // PgdPlanning ?>
		<td data-name="PgdPlanning"<?php echo $view_ivf_treatment->PgdPlanning->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_PgdPlanning" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_PgdPlanning" class="view_ivf_treatment_PgdPlanning">
<span<?php echo $view_ivf_treatment->PgdPlanning->viewAttributes() ?>>
<?php echo $view_ivf_treatment->PgdPlanning->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->IMSI->Visible) { // IMSI ?>
		<td data-name="IMSI"<?php echo $view_ivf_treatment->IMSI->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_IMSI" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_IMSI" class="view_ivf_treatment_IMSI">
<span<?php echo $view_ivf_treatment->IMSI->viewAttributes() ?>>
<?php echo $view_ivf_treatment->IMSI->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->SequentialCulture->Visible) { // SequentialCulture ?>
		<td data-name="SequentialCulture"<?php echo $view_ivf_treatment->SequentialCulture->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_SequentialCulture" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_SequentialCulture" class="view_ivf_treatment_SequentialCulture">
<span<?php echo $view_ivf_treatment->SequentialCulture->viewAttributes() ?>>
<?php echo $view_ivf_treatment->SequentialCulture->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->TimeLapse->Visible) { // TimeLapse ?>
		<td data-name="TimeLapse"<?php echo $view_ivf_treatment->TimeLapse->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_TimeLapse" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_TimeLapse" class="view_ivf_treatment_TimeLapse">
<span<?php echo $view_ivf_treatment->TimeLapse->viewAttributes() ?>>
<?php echo $view_ivf_treatment->TimeLapse->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->AH->Visible) { // AH ?>
		<td data-name="AH"<?php echo $view_ivf_treatment->AH->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_AH" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_AH" class="view_ivf_treatment_AH">
<span<?php echo $view_ivf_treatment->AH->viewAttributes() ?>>
<?php echo $view_ivf_treatment->AH->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->Weight->Visible) { // Weight ?>
		<td data-name="Weight"<?php echo $view_ivf_treatment->Weight->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_Weight" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_Weight" class="view_ivf_treatment_Weight">
<span<?php echo $view_ivf_treatment->Weight->viewAttributes() ?>>
<?php echo $view_ivf_treatment->Weight->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->BMI->Visible) { // BMI ?>
		<td data-name="BMI"<?php echo $view_ivf_treatment->BMI->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_BMI" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_BMI" class="view_ivf_treatment_BMI">
<span<?php echo $view_ivf_treatment->BMI->viewAttributes() ?>>
<?php echo $view_ivf_treatment->BMI->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->Male->Visible) { // Male ?>
		<td data-name="Male"<?php echo $view_ivf_treatment->Male->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_Male" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_Male" class="view_ivf_treatment_Male">
<span<?php echo $view_ivf_treatment->Male->viewAttributes() ?>>
<?php echo $view_ivf_treatment->Male->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->Female->Visible) { // Female ?>
		<td data-name="Female"<?php echo $view_ivf_treatment->Female->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_Female" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_Female" class="view_ivf_treatment_Female">
<span<?php echo $view_ivf_treatment->Female->viewAttributes() ?>>
<?php echo $view_ivf_treatment->Female->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->malepropic->Visible) { // malepropic ?>
		<td data-name="malepropic"<?php echo $view_ivf_treatment->malepropic->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_malepropic" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_malepropic" class="view_ivf_treatment_malepropic">
<span>
<?php echo GetFileViewTag($view_ivf_treatment->malepropic, $view_ivf_treatment->malepropic->getViewValue()) ?>
</span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->femalepropic->Visible) { // femalepropic ?>
		<td data-name="femalepropic"<?php echo $view_ivf_treatment->femalepropic->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_femalepropic" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_femalepropic" class="view_ivf_treatment_femalepropic">
<span>
<?php echo GetFileViewTag($view_ivf_treatment->femalepropic, $view_ivf_treatment->femalepropic->getViewValue()) ?>
</span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->HusbandEducation->Visible) { // HusbandEducation ?>
		<td data-name="HusbandEducation"<?php echo $view_ivf_treatment->HusbandEducation->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_HusbandEducation" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_HusbandEducation" class="view_ivf_treatment_HusbandEducation">
<span<?php echo $view_ivf_treatment->HusbandEducation->viewAttributes() ?>>
<?php echo $view_ivf_treatment->HusbandEducation->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->WifeEducation->Visible) { // WifeEducation ?>
		<td data-name="WifeEducation"<?php echo $view_ivf_treatment->WifeEducation->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_WifeEducation" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_WifeEducation" class="view_ivf_treatment_WifeEducation">
<span<?php echo $view_ivf_treatment->WifeEducation->viewAttributes() ?>>
<?php echo $view_ivf_treatment->WifeEducation->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
		<td data-name="HusbandWorkHours"<?php echo $view_ivf_treatment->HusbandWorkHours->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_HusbandWorkHours" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_HusbandWorkHours" class="view_ivf_treatment_HusbandWorkHours">
<span<?php echo $view_ivf_treatment->HusbandWorkHours->viewAttributes() ?>>
<?php echo $view_ivf_treatment->HusbandWorkHours->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->WifeWorkHours->Visible) { // WifeWorkHours ?>
		<td data-name="WifeWorkHours"<?php echo $view_ivf_treatment->WifeWorkHours->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_WifeWorkHours" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_WifeWorkHours" class="view_ivf_treatment_WifeWorkHours">
<span<?php echo $view_ivf_treatment->WifeWorkHours->viewAttributes() ?>>
<?php echo $view_ivf_treatment->WifeWorkHours->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->PatientLanguage->Visible) { // PatientLanguage ?>
		<td data-name="PatientLanguage"<?php echo $view_ivf_treatment->PatientLanguage->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_PatientLanguage" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_PatientLanguage" class="view_ivf_treatment_PatientLanguage">
<span<?php echo $view_ivf_treatment->PatientLanguage->viewAttributes() ?>>
<?php echo $view_ivf_treatment->PatientLanguage->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->ReferedBy->Visible) { // ReferedBy ?>
		<td data-name="ReferedBy"<?php echo $view_ivf_treatment->ReferedBy->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_ReferedBy" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_ReferedBy" class="view_ivf_treatment_ReferedBy">
<span<?php echo $view_ivf_treatment->ReferedBy->viewAttributes() ?>>
<?php echo $view_ivf_treatment->ReferedBy->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->ReferPhNo->Visible) { // ReferPhNo ?>
		<td data-name="ReferPhNo"<?php echo $view_ivf_treatment->ReferPhNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_ReferPhNo" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_ReferPhNo" class="view_ivf_treatment_ReferPhNo">
<span<?php echo $view_ivf_treatment->ReferPhNo->viewAttributes() ?>>
<?php echo $view_ivf_treatment->ReferPhNo->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->ARTCYCLE1->Visible) { // ARTCYCLE1 ?>
		<td data-name="ARTCYCLE1"<?php echo $view_ivf_treatment->ARTCYCLE1->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_ARTCYCLE1" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_ARTCYCLE1" class="view_ivf_treatment_ARTCYCLE1">
<span<?php echo $view_ivf_treatment->ARTCYCLE1->viewAttributes() ?>>
<?php echo $view_ivf_treatment->ARTCYCLE1->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->RESULT1->Visible) { // RESULT1 ?>
		<td data-name="RESULT1"<?php echo $view_ivf_treatment->RESULT1->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_RESULT1" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_RESULT1" class="view_ivf_treatment_RESULT1">
<span<?php echo $view_ivf_treatment->RESULT1->viewAttributes() ?>>
<?php echo $view_ivf_treatment->RESULT1->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->CoupleID->Visible) { // CoupleID ?>
		<td data-name="CoupleID"<?php echo $view_ivf_treatment->CoupleID->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_CoupleID" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_CoupleID" class="view_ivf_treatment_CoupleID">
<span<?php echo $view_ivf_treatment->CoupleID->viewAttributes() ?>>
<?php echo $view_ivf_treatment->CoupleID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_ivf_treatment->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_HospID" class="view_ivf_treatmentlist" type="text/html">
<span id="el<?php echo $view_ivf_treatment_list->RowCnt ?>_view_ivf_treatment_HospID" class="view_ivf_treatment_HospID">
<span<?php echo $view_ivf_treatment->HospID->viewAttributes() ?>>
<?php echo $view_ivf_treatment->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ivf_treatment_list->ListOptions->render("body", "right", $view_ivf_treatment_list->RowCnt, "block", $view_ivf_treatment->TableVar, "view_ivf_treatmentlist");
?>
	</tr>
<?php
	}
	if (!$view_ivf_treatment->isGridAdd())
		$view_ivf_treatment_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_ivf_treatment->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_view_ivf_treatmentlist" class="ew-custom-template"></div>
<script id="tpm_view_ivf_treatmentlist" type="text/html">
<div id="ct_view_ivf_treatment_list"><?php if ($view_ivf_treatment_list->RowCnt > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
	<tr class="ew-table-header">
	{{include tmpl="#tpoh_view_ivf_treatment"/}}
	<td rowspan="2">Home</td>
	<td rowspan="2">{{include tmpl="#tpc_view_ivf_treatment_CoupleID"/}}</td>
	<td rowspan="2">{{include tmpl="#tpc_view_ivf_treatment_malepropic"/}}</td>
		<td rowspan="2">{{include tmpl="#tpc_view_ivf_treatment_femalepropic"/}}</td>
	<td>{{include tmpl="#tpc_view_ivf_treatment_Male"/}}</td>
				<td>{{include tmpl="#tpc_view_ivf_treatment_ARTCYCLE"/}}</td>
					<td>{{include tmpl="#tpc_view_ivf_treatment_status"/}}</td>
	</tr>
	<tr class="ew-table-header">
	<td>{{include tmpl="#tpc_view_ivf_treatment_Female"/}}</td>
				<td>{{include tmpl="#tpc_view_ivf_treatment_RESULT"/}}</td>
					<td>{{include tmpl="#tpc_view_ivf_treatment_ReferedBy"/}}</td>
	</tr>    
	</thead>          
	<tbody>  
<?php for ($i = $view_ivf_treatment_list->StartRowCnt; $i <= $view_ivf_treatment_list->RowCnt; $i++) { ?>
<tr<?php echo @$view_ivf_treatment_list->Attrs[$i]['row_attrs'] ?>> 
	{{include tmpl="#tpob<?php echo $i ?>_view_ivf_treatment"/}}
	<td rowspan="2">
				<a class="btn btn-app" href="treatment.php?id={{: ~root.rows[<?php echo $i - 1 ?>].id }}">
				  <i class="fas fa-user-md"></i> Start
				</a>
	</td>
	<td rowspan="2">{{include tmpl="#tpx<?php echo $i ?>_view_ivf_treatment_CoupleID"/}}</td>
	<td rowspan="2">{{include tmpl="#tpx<?php echo $i ?>_view_ivf_treatment_malepropic"/}}</td>
		<td rowspan="2">{{include tmpl="#tpx<?php echo $i ?>_view_ivf_treatment_femalepropic"/}}</td>
	<td>{{include tmpl="#tpx<?php echo $i ?>_view_ivf_treatment_Male"/}}</td>
				<td>{{include tmpl="#tpx<?php echo $i ?>_view_ivf_treatment_ARTCYCLE"/}}</td>
					<td>{{include tmpl="#tpx<?php echo $i ?>_view_ivf_treatment_status"/}}</td>
</tr>
<tr<?php echo @$view_ivf_treatment_list->Attrs[$i]['row_attrs'] ?>>
	<td>{{include tmpl="#tpx<?php echo $i ?>_view_ivf_treatment_Female"/}}</td>
				<td>{{include tmpl="#tpx<?php echo $i ?>_view_ivf_treatment_RESULT"/}}</td>
					<td>{{include tmpl="#tpx<?php echo $i ?>_view_ivf_treatment_ReferedBy"/}}</td>
</tr>
<?php } ?>
	</tbody>
	<!-- <?php if ($view_ivf_treatment_list->TotalRecs > 0 && !$view_ivf_treatment->isGridAdd() && !$view_ivf_treatment->isGridEdit()) { ?>
<tfoot><tr class="ew-table-footer">{{include tmpl="#tpof_view_ivf_treatment"/}}<td>{{include tmpl="#tpg_MyField1"/}}</td><td>&nbsp;</td></tr></tfoot>
<?php } ?> -->
</table>
<?php } ?>
</div>
</script>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ivf_treatment_list->Recordset)
	$view_ivf_treatment_list->Recordset->Close();
?>
<?php if (!$view_ivf_treatment->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ivf_treatment->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ivf_treatment_list->Pager)) $view_ivf_treatment_list->Pager = new NumericPager($view_ivf_treatment_list->StartRec, $view_ivf_treatment_list->DisplayRecs, $view_ivf_treatment_list->TotalRecs, $view_ivf_treatment_list->RecRange, $view_ivf_treatment_list->AutoHidePager) ?>
<?php if ($view_ivf_treatment_list->Pager->RecordCount > 0 && $view_ivf_treatment_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ivf_treatment_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_treatment_list->pageUrl() ?>start=<?php echo $view_ivf_treatment_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_treatment_list->pageUrl() ?>start=<?php echo $view_ivf_treatment_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ivf_treatment_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ivf_treatment_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_treatment_list->pageUrl() ?>start=<?php echo $view_ivf_treatment_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_treatment_list->pageUrl() ?>start=<?php echo $view_ivf_treatment_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ivf_treatment_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ivf_treatment_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ivf_treatment_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ivf_treatment_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ivf_treatment_list->TotalRecs > 0 && (!$view_ivf_treatment_list->AutoHidePageSizeSelector || $view_ivf_treatment_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ivf_treatment">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ivf_treatment_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ivf_treatment_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ivf_treatment_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ivf_treatment_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ivf_treatment_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ivf_treatment_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ivf_treatment->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ivf_treatment_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ivf_treatment_list->TotalRecs == 0 && !$view_ivf_treatment->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ivf_treatment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ivf_treatment->Rows) ?> };
ew.applyTemplate("tpd_view_ivf_treatmentlist", "tpm_view_ivf_treatmentlist", "view_ivf_treatmentlist", "<?php echo $view_ivf_treatment->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_view_ivf_treatmentlist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_view_ivf_treatmentlist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.view_ivf_treatmentlist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ivf_treatment_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ivf_treatment->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_ivf_treatment->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_ivf_treatment", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ivf_treatment_list->terminate();
?>