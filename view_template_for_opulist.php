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
$view_template_for_opu_list = new view_template_for_opu_list();

// Run the page
$view_template_for_opu_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_template_for_opu_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_template_for_opu->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_template_for_opulist = currentForm = new ew.Form("fview_template_for_opulist", "list");
fview_template_for_opulist.formKeyCountName = '<?php echo $view_template_for_opu_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_template_for_opulist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_template_for_opulist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_template_for_opulistsrch = currentSearchForm = new ew.Form("fview_template_for_opulistsrch");

// Validate function for search
fview_template_for_opulistsrch.validate = function(fobj) {
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
fview_template_for_opulistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_template_for_opulistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_template_for_opulistsrch.filterList = <?php echo $view_template_for_opu_list->getFilterList() ?>;
</script>
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
<?php if (!$view_template_for_opu->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_template_for_opu_list->TotalRecs > 0 && $view_template_for_opu_list->ExportOptions->visible()) { ?>
<?php $view_template_for_opu_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_template_for_opu_list->ImportOptions->visible()) { ?>
<?php $view_template_for_opu_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_template_for_opu_list->SearchOptions->visible()) { ?>
<?php $view_template_for_opu_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_template_for_opu_list->FilterOptions->visible()) { ?>
<?php $view_template_for_opu_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_template_for_opu_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_template_for_opu->isExport() && !$view_template_for_opu->CurrentAction) { ?>
<form name="fview_template_for_opulistsrch" id="fview_template_for_opulistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_template_for_opu_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_template_for_opulistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_template_for_opu">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_template_for_opu_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_template_for_opu->RowType = ROWTYPE_SEARCH;

// Render row
$view_template_for_opu->resetAttributes();
$view_template_for_opu_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_template_for_opu->Treatment->Visible) { // Treatment ?>
	<div id="xsc_Treatment" class="ew-cell form-group">
		<label for="x_Treatment" class="ew-search-caption ew-label"><?php echo $view_template_for_opu->Treatment->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Treatment" id="z_Treatment" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_template_for_opu" data-field="x_Treatment" name="x_Treatment" id="x_Treatment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_template_for_opu->Treatment->getPlaceHolder()) ?>" value="<?php echo $view_template_for_opu->Treatment->EditValue ?>"<?php echo $view_template_for_opu->Treatment->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_template_for_opu->Origin->Visible) { // Origin ?>
	<div id="xsc_Origin" class="ew-cell form-group">
		<label for="x_Origin" class="ew-search-caption ew-label"><?php echo $view_template_for_opu->Origin->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Origin" id="z_Origin" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_template_for_opu" data-field="x_Origin" name="x_Origin" id="x_Origin" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_template_for_opu->Origin->getPlaceHolder()) ?>" value="<?php echo $view_template_for_opu->Origin->EditValue ?>"<?php echo $view_template_for_opu->Origin->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_template_for_opu->FemaleIndications->Visible) { // FemaleIndications ?>
	<div id="xsc_FemaleIndications" class="ew-cell form-group">
		<label for="x_FemaleIndications" class="ew-search-caption ew-label"><?php echo $view_template_for_opu->FemaleIndications->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_FemaleIndications" id="z_FemaleIndications" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_template_for_opu" data-field="x_FemaleIndications" name="x_FemaleIndications" id="x_FemaleIndications" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_template_for_opu->FemaleIndications->getPlaceHolder()) ?>" value="<?php echo $view_template_for_opu->FemaleIndications->EditValue ?>"<?php echo $view_template_for_opu->FemaleIndications->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_template_for_opu->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_template_for_opu->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_template_for_opu" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_template_for_opu->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_template_for_opu->PatientName->EditValue ?>"<?php echo $view_template_for_opu->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($view_template_for_opu->PatientID->Visible) { // PatientID ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $view_template_for_opu->PatientID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_template_for_opu" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_template_for_opu->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_template_for_opu->PatientID->EditValue ?>"<?php echo $view_template_for_opu->PatientID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_template_for_opu->PartnerName->Visible) { // PartnerName ?>
	<div id="xsc_PartnerName" class="ew-cell form-group">
		<label for="x_PartnerName" class="ew-search-caption ew-label"><?php echo $view_template_for_opu->PartnerName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_template_for_opu" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_template_for_opu->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_template_for_opu->PartnerName->EditValue ?>"<?php echo $view_template_for_opu->PartnerName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
<?php if ($view_template_for_opu->PartnerID->Visible) { // PartnerID ?>
	<div id="xsc_PartnerID" class="ew-cell form-group">
		<label for="x_PartnerID" class="ew-search-caption ew-label"><?php echo $view_template_for_opu->PartnerID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_template_for_opu" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_template_for_opu->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_template_for_opu->PartnerID->EditValue ?>"<?php echo $view_template_for_opu->PartnerID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_template_for_opu->A4ICSICycle->Visible) { // A4ICSICycle ?>
	<div id="xsc_A4ICSICycle" class="ew-cell form-group">
		<label for="x_A4ICSICycle" class="ew-search-caption ew-label"><?php echo $view_template_for_opu->A4ICSICycle->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_A4ICSICycle" id="z_A4ICSICycle" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_template_for_opu" data-field="x_A4ICSICycle" name="x_A4ICSICycle" id="x_A4ICSICycle" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_template_for_opu->A4ICSICycle->getPlaceHolder()) ?>" value="<?php echo $view_template_for_opu->A4ICSICycle->EditValue ?>"<?php echo $view_template_for_opu->A4ICSICycle->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_5" class="ew-row d-sm-flex">
<?php if ($view_template_for_opu->TotalICSICycle->Visible) { // TotalICSICycle ?>
	<div id="xsc_TotalICSICycle" class="ew-cell form-group">
		<label for="x_TotalICSICycle" class="ew-search-caption ew-label"><?php echo $view_template_for_opu->TotalICSICycle->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TotalICSICycle" id="z_TotalICSICycle" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_template_for_opu" data-field="x_TotalICSICycle" name="x_TotalICSICycle" id="x_TotalICSICycle" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_template_for_opu->TotalICSICycle->getPlaceHolder()) ?>" value="<?php echo $view_template_for_opu->TotalICSICycle->EditValue ?>"<?php echo $view_template_for_opu->TotalICSICycle->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_6" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_template_for_opu_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_template_for_opu_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_template_for_opu_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_template_for_opu_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_template_for_opu_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_template_for_opu_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_template_for_opu_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_template_for_opu_list->showPageHeader(); ?>
<?php
$view_template_for_opu_list->showMessage();
?>
<?php if ($view_template_for_opu_list->TotalRecs > 0 || $view_template_for_opu->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_template_for_opu_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_template_for_opu">
<?php if (!$view_template_for_opu->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_template_for_opu->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_template_for_opu_list->Pager)) $view_template_for_opu_list->Pager = new NumericPager($view_template_for_opu_list->StartRec, $view_template_for_opu_list->DisplayRecs, $view_template_for_opu_list->TotalRecs, $view_template_for_opu_list->RecRange, $view_template_for_opu_list->AutoHidePager) ?>
<?php if ($view_template_for_opu_list->Pager->RecordCount > 0 && $view_template_for_opu_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_template_for_opu_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_for_opu_list->pageUrl() ?>start=<?php echo $view_template_for_opu_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_template_for_opu_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_for_opu_list->pageUrl() ?>start=<?php echo $view_template_for_opu_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_template_for_opu_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_template_for_opu_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_template_for_opu_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_for_opu_list->pageUrl() ?>start=<?php echo $view_template_for_opu_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_template_for_opu_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_for_opu_list->pageUrl() ?>start=<?php echo $view_template_for_opu_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_template_for_opu_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_template_for_opu_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_template_for_opu_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_template_for_opu_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_template_for_opu_list->TotalRecs > 0 && (!$view_template_for_opu_list->AutoHidePageSizeSelector || $view_template_for_opu_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_template_for_opu">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_template_for_opu_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_template_for_opu_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_template_for_opu_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_template_for_opu_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_template_for_opu_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_template_for_opu_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_template_for_opu->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_template_for_opu_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_template_for_opulist" id="fview_template_for_opulist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_template_for_opu_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_template_for_opu_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_template_for_opu">
<div id="gmp_view_template_for_opu" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_template_for_opu_list->TotalRecs > 0 || $view_template_for_opu->isGridEdit()) { ?>
<table id="tbl_view_template_for_opulist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_template_for_opu_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_template_for_opu_list->renderListOptions();

// Render list options (header, left)
$view_template_for_opu_list->ListOptions->render("header", "left");
?>
<?php if ($view_template_for_opu->id->Visible) { // id ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_template_for_opu->id->headerCellClass() ?>"><div id="elh_view_template_for_opu_id" class="view_template_for_opu_id"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_template_for_opu->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->id) ?>',1);"><div id="elh_view_template_for_opu_id" class="view_template_for_opu_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_template_for_opu->RIDNO->headerCellClass() ?>"><div id="elh_view_template_for_opu_RIDNO" class="view_template_for_opu_RIDNO"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_template_for_opu->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->RIDNO) ?>',1);"><div id="elh_view_template_for_opu_RIDNO" class="view_template_for_opu_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->Treatment->Visible) { // Treatment ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->Treatment) == "") { ?>
		<th data-name="Treatment" class="<?php echo $view_template_for_opu->Treatment->headerCellClass() ?>"><div id="elh_view_template_for_opu_Treatment" class="view_template_for_opu_Treatment"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->Treatment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Treatment" class="<?php echo $view_template_for_opu->Treatment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->Treatment) ?>',1);"><div id="elh_view_template_for_opu_Treatment" class="view_template_for_opu_Treatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->Treatment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->Treatment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->Treatment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->Origin->Visible) { // Origin ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->Origin) == "") { ?>
		<th data-name="Origin" class="<?php echo $view_template_for_opu->Origin->headerCellClass() ?>"><div id="elh_view_template_for_opu_Origin" class="view_template_for_opu_Origin"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->Origin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Origin" class="<?php echo $view_template_for_opu->Origin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->Origin) ?>',1);"><div id="elh_view_template_for_opu_Origin" class="view_template_for_opu_Origin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->Origin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->Origin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->Origin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->MaleIndications->Visible) { // MaleIndications ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->MaleIndications) == "") { ?>
		<th data-name="MaleIndications" class="<?php echo $view_template_for_opu->MaleIndications->headerCellClass() ?>"><div id="elh_view_template_for_opu_MaleIndications" class="view_template_for_opu_MaleIndications"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->MaleIndications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaleIndications" class="<?php echo $view_template_for_opu->MaleIndications->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->MaleIndications) ?>',1);"><div id="elh_view_template_for_opu_MaleIndications" class="view_template_for_opu_MaleIndications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->MaleIndications->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->MaleIndications->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->MaleIndications->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->FemaleIndications->Visible) { // FemaleIndications ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->FemaleIndications) == "") { ?>
		<th data-name="FemaleIndications" class="<?php echo $view_template_for_opu->FemaleIndications->headerCellClass() ?>"><div id="elh_view_template_for_opu_FemaleIndications" class="view_template_for_opu_FemaleIndications"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->FemaleIndications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FemaleIndications" class="<?php echo $view_template_for_opu->FemaleIndications->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->FemaleIndications) ?>',1);"><div id="elh_view_template_for_opu_FemaleIndications" class="view_template_for_opu_FemaleIndications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->FemaleIndications->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->FemaleIndications->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->FemaleIndications->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->PatientName->Visible) { // PatientName ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_template_for_opu->PatientName->headerCellClass() ?>"><div id="elh_view_template_for_opu_PatientName" class="view_template_for_opu_PatientName"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_template_for_opu->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->PatientName) ?>',1);"><div id="elh_view_template_for_opu_PatientName" class="view_template_for_opu_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->PatientID->Visible) { // PatientID ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_template_for_opu->PatientID->headerCellClass() ?>"><div id="elh_view_template_for_opu_PatientID" class="view_template_for_opu_PatientID"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_template_for_opu->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->PatientID) ?>',1);"><div id="elh_view_template_for_opu_PatientID" class="view_template_for_opu_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_template_for_opu->PartnerName->headerCellClass() ?>"><div id="elh_view_template_for_opu_PartnerName" class="view_template_for_opu_PartnerName"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_template_for_opu->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->PartnerName) ?>',1);"><div id="elh_view_template_for_opu_PartnerName" class="view_template_for_opu_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->PartnerID->Visible) { // PartnerID ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $view_template_for_opu->PartnerID->headerCellClass() ?>"><div id="elh_view_template_for_opu_PartnerID" class="view_template_for_opu_PartnerID"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $view_template_for_opu->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->PartnerID) ?>',1);"><div id="elh_view_template_for_opu_PartnerID" class="view_template_for_opu_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->PartnerID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->PartnerID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->A4ICSICycle->Visible) { // A4ICSICycle ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->A4ICSICycle) == "") { ?>
		<th data-name="A4ICSICycle" class="<?php echo $view_template_for_opu->A4ICSICycle->headerCellClass() ?>"><div id="elh_view_template_for_opu_A4ICSICycle" class="view_template_for_opu_A4ICSICycle"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->A4ICSICycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A4ICSICycle" class="<?php echo $view_template_for_opu->A4ICSICycle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->A4ICSICycle) ?>',1);"><div id="elh_view_template_for_opu_A4ICSICycle" class="view_template_for_opu_A4ICSICycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->A4ICSICycle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->A4ICSICycle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->A4ICSICycle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->TotalICSICycle->Visible) { // TotalICSICycle ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->TotalICSICycle) == "") { ?>
		<th data-name="TotalICSICycle" class="<?php echo $view_template_for_opu->TotalICSICycle->headerCellClass() ?>"><div id="elh_view_template_for_opu_TotalICSICycle" class="view_template_for_opu_TotalICSICycle"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->TotalICSICycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalICSICycle" class="<?php echo $view_template_for_opu->TotalICSICycle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->TotalICSICycle) ?>',1);"><div id="elh_view_template_for_opu_TotalICSICycle" class="view_template_for_opu_TotalICSICycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->TotalICSICycle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->TotalICSICycle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->TotalICSICycle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->TypeOfInfertility) == "") { ?>
		<th data-name="TypeOfInfertility" class="<?php echo $view_template_for_opu->TypeOfInfertility->headerCellClass() ?>"><div id="elh_view_template_for_opu_TypeOfInfertility" class="view_template_for_opu_TypeOfInfertility"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->TypeOfInfertility->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeOfInfertility" class="<?php echo $view_template_for_opu->TypeOfInfertility->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->TypeOfInfertility) ?>',1);"><div id="elh_view_template_for_opu_TypeOfInfertility" class="view_template_for_opu_TypeOfInfertility">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->TypeOfInfertility->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->TypeOfInfertility->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->TypeOfInfertility->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->RelevantHistory->Visible) { // RelevantHistory ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->RelevantHistory) == "") { ?>
		<th data-name="RelevantHistory" class="<?php echo $view_template_for_opu->RelevantHistory->headerCellClass() ?>"><div id="elh_view_template_for_opu_RelevantHistory" class="view_template_for_opu_RelevantHistory"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->RelevantHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RelevantHistory" class="<?php echo $view_template_for_opu->RelevantHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->RelevantHistory) ?>',1);"><div id="elh_view_template_for_opu_RelevantHistory" class="view_template_for_opu_RelevantHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->RelevantHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->RelevantHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->RelevantHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->IUICycles->Visible) { // IUICycles ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->IUICycles) == "") { ?>
		<th data-name="IUICycles" class="<?php echo $view_template_for_opu->IUICycles->headerCellClass() ?>"><div id="elh_view_template_for_opu_IUICycles" class="view_template_for_opu_IUICycles"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->IUICycles->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUICycles" class="<?php echo $view_template_for_opu->IUICycles->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->IUICycles) ?>',1);"><div id="elh_view_template_for_opu_IUICycles" class="view_template_for_opu_IUICycles">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->IUICycles->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->IUICycles->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->IUICycles->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->AMH->Visible) { // AMH ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->AMH) == "") { ?>
		<th data-name="AMH" class="<?php echo $view_template_for_opu->AMH->headerCellClass() ?>"><div id="elh_view_template_for_opu_AMH" class="view_template_for_opu_AMH"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->AMH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AMH" class="<?php echo $view_template_for_opu->AMH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->AMH) ?>',1);"><div id="elh_view_template_for_opu_AMH" class="view_template_for_opu_AMH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->AMH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->AMH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->AMH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->FBMI->Visible) { // FBMI ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->FBMI) == "") { ?>
		<th data-name="FBMI" class="<?php echo $view_template_for_opu->FBMI->headerCellClass() ?>"><div id="elh_view_template_for_opu_FBMI" class="view_template_for_opu_FBMI"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->FBMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBMI" class="<?php echo $view_template_for_opu->FBMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->FBMI) ?>',1);"><div id="elh_view_template_for_opu_FBMI" class="view_template_for_opu_FBMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->FBMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->FBMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->FBMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->ANTAGONISTSTARTDAY) == "") { ?>
		<th data-name="ANTAGONISTSTARTDAY" class="<?php echo $view_template_for_opu->ANTAGONISTSTARTDAY->headerCellClass() ?>"><div id="elh_view_template_for_opu_ANTAGONISTSTARTDAY" class="view_template_for_opu_ANTAGONISTSTARTDAY"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->ANTAGONISTSTARTDAY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANTAGONISTSTARTDAY" class="<?php echo $view_template_for_opu->ANTAGONISTSTARTDAY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->ANTAGONISTSTARTDAY) ?>',1);"><div id="elh_view_template_for_opu_ANTAGONISTSTARTDAY" class="view_template_for_opu_ANTAGONISTSTARTDAY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->ANTAGONISTSTARTDAY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->ANTAGONISTSTARTDAY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->ANTAGONISTSTARTDAY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->OvarianSurgery->Visible) { // OvarianSurgery ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->OvarianSurgery) == "") { ?>
		<th data-name="OvarianSurgery" class="<?php echo $view_template_for_opu->OvarianSurgery->headerCellClass() ?>"><div id="elh_view_template_for_opu_OvarianSurgery" class="view_template_for_opu_OvarianSurgery"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->OvarianSurgery->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OvarianSurgery" class="<?php echo $view_template_for_opu->OvarianSurgery->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->OvarianSurgery) ?>',1);"><div id="elh_view_template_for_opu_OvarianSurgery" class="view_template_for_opu_OvarianSurgery">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->OvarianSurgery->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->OvarianSurgery->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->OvarianSurgery->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->OPUDATE->Visible) { // OPUDATE ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->OPUDATE) == "") { ?>
		<th data-name="OPUDATE" class="<?php echo $view_template_for_opu->OPUDATE->headerCellClass() ?>"><div id="elh_view_template_for_opu_OPUDATE" class="view_template_for_opu_OPUDATE"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->OPUDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPUDATE" class="<?php echo $view_template_for_opu->OPUDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->OPUDATE) ?>',1);"><div id="elh_view_template_for_opu_OPUDATE" class="view_template_for_opu_OPUDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->OPUDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->OPUDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->OPUDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->RFSH1->Visible) { // RFSH1 ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->RFSH1) == "") { ?>
		<th data-name="RFSH1" class="<?php echo $view_template_for_opu->RFSH1->headerCellClass() ?>"><div id="elh_view_template_for_opu_RFSH1" class="view_template_for_opu_RFSH1"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->RFSH1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH1" class="<?php echo $view_template_for_opu->RFSH1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->RFSH1) ?>',1);"><div id="elh_view_template_for_opu_RFSH1" class="view_template_for_opu_RFSH1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->RFSH1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->RFSH1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->RFSH1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->RFSH2->Visible) { // RFSH2 ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->RFSH2) == "") { ?>
		<th data-name="RFSH2" class="<?php echo $view_template_for_opu->RFSH2->headerCellClass() ?>"><div id="elh_view_template_for_opu_RFSH2" class="view_template_for_opu_RFSH2"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->RFSH2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH2" class="<?php echo $view_template_for_opu->RFSH2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->RFSH2) ?>',1);"><div id="elh_view_template_for_opu_RFSH2" class="view_template_for_opu_RFSH2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->RFSH2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->RFSH2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->RFSH2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->RFSH3->Visible) { // RFSH3 ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->RFSH3) == "") { ?>
		<th data-name="RFSH3" class="<?php echo $view_template_for_opu->RFSH3->headerCellClass() ?>"><div id="elh_view_template_for_opu_RFSH3" class="view_template_for_opu_RFSH3"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->RFSH3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH3" class="<?php echo $view_template_for_opu->RFSH3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->RFSH3) ?>',1);"><div id="elh_view_template_for_opu_RFSH3" class="view_template_for_opu_RFSH3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->RFSH3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->RFSH3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->RFSH3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->E21->Visible) { // E21 ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->E21) == "") { ?>
		<th data-name="E21" class="<?php echo $view_template_for_opu->E21->headerCellClass() ?>"><div id="elh_view_template_for_opu_E21" class="view_template_for_opu_E21"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->E21->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E21" class="<?php echo $view_template_for_opu->E21->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->E21) ?>',1);"><div id="elh_view_template_for_opu_E21" class="view_template_for_opu_E21">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->E21->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->E21->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->E21->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->Hysteroscopy->Visible) { // Hysteroscopy ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->Hysteroscopy) == "") { ?>
		<th data-name="Hysteroscopy" class="<?php echo $view_template_for_opu->Hysteroscopy->headerCellClass() ?>"><div id="elh_view_template_for_opu_Hysteroscopy" class="view_template_for_opu_Hysteroscopy"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->Hysteroscopy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Hysteroscopy" class="<?php echo $view_template_for_opu->Hysteroscopy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->Hysteroscopy) ?>',1);"><div id="elh_view_template_for_opu_Hysteroscopy" class="view_template_for_opu_Hysteroscopy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->Hysteroscopy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->Hysteroscopy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->Hysteroscopy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->HospID->Visible) { // HospID ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_template_for_opu->HospID->headerCellClass() ?>"><div id="elh_view_template_for_opu_HospID" class="view_template_for_opu_HospID"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_template_for_opu->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->HospID) ?>',1);"><div id="elh_view_template_for_opu_HospID" class="view_template_for_opu_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->Fweight->Visible) { // Fweight ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->Fweight) == "") { ?>
		<th data-name="Fweight" class="<?php echo $view_template_for_opu->Fweight->headerCellClass() ?>"><div id="elh_view_template_for_opu_Fweight" class="view_template_for_opu_Fweight"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->Fweight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fweight" class="<?php echo $view_template_for_opu->Fweight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->Fweight) ?>',1);"><div id="elh_view_template_for_opu_Fweight" class="view_template_for_opu_Fweight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->Fweight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->Fweight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->Fweight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->AntiTPO->Visible) { // AntiTPO ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->AntiTPO) == "") { ?>
		<th data-name="AntiTPO" class="<?php echo $view_template_for_opu->AntiTPO->headerCellClass() ?>"><div id="elh_view_template_for_opu_AntiTPO" class="view_template_for_opu_AntiTPO"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->AntiTPO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AntiTPO" class="<?php echo $view_template_for_opu->AntiTPO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->AntiTPO) ?>',1);"><div id="elh_view_template_for_opu_AntiTPO" class="view_template_for_opu_AntiTPO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->AntiTPO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->AntiTPO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->AntiTPO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->AntiTG->Visible) { // AntiTG ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->AntiTG) == "") { ?>
		<th data-name="AntiTG" class="<?php echo $view_template_for_opu->AntiTG->headerCellClass() ?>"><div id="elh_view_template_for_opu_AntiTG" class="view_template_for_opu_AntiTG"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->AntiTG->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AntiTG" class="<?php echo $view_template_for_opu->AntiTG->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->AntiTG) ?>',1);"><div id="elh_view_template_for_opu_AntiTG" class="view_template_for_opu_AntiTG">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->AntiTG->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->AntiTG->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->AntiTG->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->PatientAge->Visible) { // PatientAge ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->PatientAge) == "") { ?>
		<th data-name="PatientAge" class="<?php echo $view_template_for_opu->PatientAge->headerCellClass() ?>"><div id="elh_view_template_for_opu_PatientAge" class="view_template_for_opu_PatientAge"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->PatientAge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientAge" class="<?php echo $view_template_for_opu->PatientAge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->PatientAge) ?>',1);"><div id="elh_view_template_for_opu_PatientAge" class="view_template_for_opu_PatientAge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->PatientAge->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->PatientAge->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->PatientAge->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->PartnerAge->Visible) { // PartnerAge ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->PartnerAge) == "") { ?>
		<th data-name="PartnerAge" class="<?php echo $view_template_for_opu->PartnerAge->headerCellClass() ?>"><div id="elh_view_template_for_opu_PartnerAge" class="view_template_for_opu_PartnerAge"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->PartnerAge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerAge" class="<?php echo $view_template_for_opu->PartnerAge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->PartnerAge) ?>',1);"><div id="elh_view_template_for_opu_PartnerAge" class="view_template_for_opu_PartnerAge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->PartnerAge->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->PartnerAge->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->PartnerAge->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->R_OVARY->Visible) { // R.OVARY ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->R_OVARY) == "") { ?>
		<th data-name="R_OVARY" class="<?php echo $view_template_for_opu->R_OVARY->headerCellClass() ?>"><div id="elh_view_template_for_opu_R_OVARY" class="view_template_for_opu_R_OVARY"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->R_OVARY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="R_OVARY" class="<?php echo $view_template_for_opu->R_OVARY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->R_OVARY) ?>',1);"><div id="elh_view_template_for_opu_R_OVARY" class="view_template_for_opu_R_OVARY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->R_OVARY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->R_OVARY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->R_OVARY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->R_AFC->Visible) { // R.AFC ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->R_AFC) == "") { ?>
		<th data-name="R_AFC" class="<?php echo $view_template_for_opu->R_AFC->headerCellClass() ?>"><div id="elh_view_template_for_opu_R_AFC" class="view_template_for_opu_R_AFC"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->R_AFC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="R_AFC" class="<?php echo $view_template_for_opu->R_AFC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->R_AFC) ?>',1);"><div id="elh_view_template_for_opu_R_AFC" class="view_template_for_opu_R_AFC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->R_AFC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->R_AFC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->R_AFC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->L_OVARY->Visible) { // L.OVARY ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->L_OVARY) == "") { ?>
		<th data-name="L_OVARY" class="<?php echo $view_template_for_opu->L_OVARY->headerCellClass() ?>"><div id="elh_view_template_for_opu_L_OVARY" class="view_template_for_opu_L_OVARY"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->L_OVARY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="L_OVARY" class="<?php echo $view_template_for_opu->L_OVARY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->L_OVARY) ?>',1);"><div id="elh_view_template_for_opu_L_OVARY" class="view_template_for_opu_L_OVARY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->L_OVARY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->L_OVARY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->L_OVARY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->L_AFC->Visible) { // L.AFC ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->L_AFC) == "") { ?>
		<th data-name="L_AFC" class="<?php echo $view_template_for_opu->L_AFC->headerCellClass() ?>"><div id="elh_view_template_for_opu_L_AFC" class="view_template_for_opu_L_AFC"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->L_AFC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="L_AFC" class="<?php echo $view_template_for_opu->L_AFC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->L_AFC) ?>',1);"><div id="elh_view_template_for_opu_L_AFC" class="view_template_for_opu_L_AFC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->L_AFC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->L_AFC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->L_AFC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->E2->Visible) { // E2 ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->E2) == "") { ?>
		<th data-name="E2" class="<?php echo $view_template_for_opu->E2->headerCellClass() ?>"><div id="elh_view_template_for_opu_E2" class="view_template_for_opu_E2"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->E2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E2" class="<?php echo $view_template_for_opu->E2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->E2) ?>',1);"><div id="elh_view_template_for_opu_E2" class="view_template_for_opu_E2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->E2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->E2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->E2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->AMH1->Visible) { // AMH1 ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->AMH1) == "") { ?>
		<th data-name="AMH1" class="<?php echo $view_template_for_opu->AMH1->headerCellClass() ?>"><div id="elh_view_template_for_opu_AMH1" class="view_template_for_opu_AMH1"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->AMH1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AMH1" class="<?php echo $view_template_for_opu->AMH1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->AMH1) ?>',1);"><div id="elh_view_template_for_opu_AMH1" class="view_template_for_opu_AMH1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->AMH1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->AMH1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->AMH1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->BMI28MALE29->Visible) { // BMI(MALE) ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->BMI28MALE29) == "") { ?>
		<th data-name="BMI28MALE29" class="<?php echo $view_template_for_opu->BMI28MALE29->headerCellClass() ?>"><div id="elh_view_template_for_opu_BMI28MALE29" class="view_template_for_opu_BMI28MALE29"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->BMI28MALE29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BMI28MALE29" class="<?php echo $view_template_for_opu->BMI28MALE29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->BMI28MALE29) ?>',1);"><div id="elh_view_template_for_opu_BMI28MALE29" class="view_template_for_opu_BMI28MALE29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->BMI28MALE29->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->BMI28MALE29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->BMI28MALE29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->MaleMedicalConditions->Visible) { // MaleMedicalConditions ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->MaleMedicalConditions) == "") { ?>
		<th data-name="MaleMedicalConditions" class="<?php echo $view_template_for_opu->MaleMedicalConditions->headerCellClass() ?>"><div id="elh_view_template_for_opu_MaleMedicalConditions" class="view_template_for_opu_MaleMedicalConditions"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->MaleMedicalConditions->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaleMedicalConditions" class="<?php echo $view_template_for_opu->MaleMedicalConditions->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->MaleMedicalConditions) ?>',1);"><div id="elh_view_template_for_opu_MaleMedicalConditions" class="view_template_for_opu_MaleMedicalConditions">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->MaleMedicalConditions->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->MaleMedicalConditions->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->MaleMedicalConditions->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->CC_100->Visible) { // CC 100 ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->CC_100) == "") { ?>
		<th data-name="CC_100" class="<?php echo $view_template_for_opu->CC_100->headerCellClass() ?>"><div id="elh_view_template_for_opu_CC_100" class="view_template_for_opu_CC_100"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->CC_100->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CC_100" class="<?php echo $view_template_for_opu->CC_100->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->CC_100) ?>',1);"><div id="elh_view_template_for_opu_CC_100" class="view_template_for_opu_CC_100">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->CC_100->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->CC_100->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->CC_100->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->RFSH1A->Visible) { // RFSH1A ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->RFSH1A) == "") { ?>
		<th data-name="RFSH1A" class="<?php echo $view_template_for_opu->RFSH1A->headerCellClass() ?>"><div id="elh_view_template_for_opu_RFSH1A" class="view_template_for_opu_RFSH1A"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->RFSH1A->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RFSH1A" class="<?php echo $view_template_for_opu->RFSH1A->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->RFSH1A) ?>',1);"><div id="elh_view_template_for_opu_RFSH1A" class="view_template_for_opu_RFSH1A">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->RFSH1A->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->RFSH1A->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->RFSH1A->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->HMG1->Visible) { // HMG1 ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->HMG1) == "") { ?>
		<th data-name="HMG1" class="<?php echo $view_template_for_opu->HMG1->headerCellClass() ?>"><div id="elh_view_template_for_opu_HMG1" class="view_template_for_opu_HMG1"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->HMG1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HMG1" class="<?php echo $view_template_for_opu->HMG1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->HMG1) ?>',1);"><div id="elh_view_template_for_opu_HMG1" class="view_template_for_opu_HMG1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->HMG1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->HMG1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->HMG1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->DAYSOFSTIMULATION) == "") { ?>
		<th data-name="DAYSOFSTIMULATION" class="<?php echo $view_template_for_opu->DAYSOFSTIMULATION->headerCellClass() ?>"><div id="elh_view_template_for_opu_DAYSOFSTIMULATION" class="view_template_for_opu_DAYSOFSTIMULATION"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->DAYSOFSTIMULATION->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAYSOFSTIMULATION" class="<?php echo $view_template_for_opu->DAYSOFSTIMULATION->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->DAYSOFSTIMULATION) ?>',1);"><div id="elh_view_template_for_opu_DAYSOFSTIMULATION" class="view_template_for_opu_DAYSOFSTIMULATION">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->DAYSOFSTIMULATION->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->DAYSOFSTIMULATION->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->DAYSOFSTIMULATION->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_opu->TRIGGERR->Visible) { // TRIGGERR ?>
	<?php if ($view_template_for_opu->sortUrl($view_template_for_opu->TRIGGERR) == "") { ?>
		<th data-name="TRIGGERR" class="<?php echo $view_template_for_opu->TRIGGERR->headerCellClass() ?>"><div id="elh_view_template_for_opu_TRIGGERR" class="view_template_for_opu_TRIGGERR"><div class="ew-table-header-caption"><?php echo $view_template_for_opu->TRIGGERR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TRIGGERR" class="<?php echo $view_template_for_opu->TRIGGERR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_opu->SortUrl($view_template_for_opu->TRIGGERR) ?>',1);"><div id="elh_view_template_for_opu_TRIGGERR" class="view_template_for_opu_TRIGGERR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_opu->TRIGGERR->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_opu->TRIGGERR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_opu->TRIGGERR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_template_for_opu_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_template_for_opu->ExportAll && $view_template_for_opu->isExport()) {
	$view_template_for_opu_list->StopRec = $view_template_for_opu_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_template_for_opu_list->TotalRecs > $view_template_for_opu_list->StartRec + $view_template_for_opu_list->DisplayRecs - 1)
		$view_template_for_opu_list->StopRec = $view_template_for_opu_list->StartRec + $view_template_for_opu_list->DisplayRecs - 1;
	else
		$view_template_for_opu_list->StopRec = $view_template_for_opu_list->TotalRecs;
}
$view_template_for_opu_list->RecCnt = $view_template_for_opu_list->StartRec - 1;
if ($view_template_for_opu_list->Recordset && !$view_template_for_opu_list->Recordset->EOF) {
	$view_template_for_opu_list->Recordset->moveFirst();
	$selectLimit = $view_template_for_opu_list->UseSelectLimit;
	if (!$selectLimit && $view_template_for_opu_list->StartRec > 1)
		$view_template_for_opu_list->Recordset->move($view_template_for_opu_list->StartRec - 1);
} elseif (!$view_template_for_opu->AllowAddDeleteRow && $view_template_for_opu_list->StopRec == 0) {
	$view_template_for_opu_list->StopRec = $view_template_for_opu->GridAddRowCount;
}

// Initialize aggregate
$view_template_for_opu->RowType = ROWTYPE_AGGREGATEINIT;
$view_template_for_opu->resetAttributes();
$view_template_for_opu_list->renderRow();
while ($view_template_for_opu_list->RecCnt < $view_template_for_opu_list->StopRec) {
	$view_template_for_opu_list->RecCnt++;
	if ($view_template_for_opu_list->RecCnt >= $view_template_for_opu_list->StartRec) {
		$view_template_for_opu_list->RowCnt++;

		// Set up key count
		$view_template_for_opu_list->KeyCount = $view_template_for_opu_list->RowIndex;

		// Init row class and style
		$view_template_for_opu->resetAttributes();
		$view_template_for_opu->CssClass = "";
		if ($view_template_for_opu->isGridAdd()) {
		} else {
			$view_template_for_opu_list->loadRowValues($view_template_for_opu_list->Recordset); // Load row values
		}
		$view_template_for_opu->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_template_for_opu->RowAttrs = array_merge($view_template_for_opu->RowAttrs, array('data-rowindex'=>$view_template_for_opu_list->RowCnt, 'id'=>'r' . $view_template_for_opu_list->RowCnt . '_view_template_for_opu', 'data-rowtype'=>$view_template_for_opu->RowType));

		// Render row
		$view_template_for_opu_list->renderRow();

		// Render list options
		$view_template_for_opu_list->renderListOptions();
?>
	<tr<?php echo $view_template_for_opu->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_template_for_opu_list->ListOptions->render("body", "left", $view_template_for_opu_list->RowCnt);
?>
	<?php if ($view_template_for_opu->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_template_for_opu->id->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_id" class="view_template_for_opu_id">
<span<?php echo $view_template_for_opu->id->viewAttributes() ?>>
<?php echo $view_template_for_opu->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $view_template_for_opu->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_RIDNO" class="view_template_for_opu_RIDNO">
<span<?php echo $view_template_for_opu->RIDNO->viewAttributes() ?>>
<?php echo $view_template_for_opu->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment"<?php echo $view_template_for_opu->Treatment->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_Treatment" class="view_template_for_opu_Treatment">
<span<?php echo $view_template_for_opu->Treatment->viewAttributes() ?>>
<?php echo $view_template_for_opu->Treatment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->Origin->Visible) { // Origin ?>
		<td data-name="Origin"<?php echo $view_template_for_opu->Origin->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_Origin" class="view_template_for_opu_Origin">
<span<?php echo $view_template_for_opu->Origin->viewAttributes() ?>>
<?php echo $view_template_for_opu->Origin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->MaleIndications->Visible) { // MaleIndications ?>
		<td data-name="MaleIndications"<?php echo $view_template_for_opu->MaleIndications->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_MaleIndications" class="view_template_for_opu_MaleIndications">
<span<?php echo $view_template_for_opu->MaleIndications->viewAttributes() ?>>
<?php echo $view_template_for_opu->MaleIndications->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->FemaleIndications->Visible) { // FemaleIndications ?>
		<td data-name="FemaleIndications"<?php echo $view_template_for_opu->FemaleIndications->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_FemaleIndications" class="view_template_for_opu_FemaleIndications">
<span<?php echo $view_template_for_opu->FemaleIndications->viewAttributes() ?>>
<?php echo $view_template_for_opu->FemaleIndications->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_template_for_opu->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_PatientName" class="view_template_for_opu_PatientName">
<span<?php echo $view_template_for_opu->PatientName->viewAttributes() ?>>
<?php echo $view_template_for_opu->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_template_for_opu->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_PatientID" class="view_template_for_opu_PatientID">
<span<?php echo $view_template_for_opu->PatientID->viewAttributes() ?>>
<?php echo $view_template_for_opu->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $view_template_for_opu->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_PartnerName" class="view_template_for_opu_PartnerName">
<span<?php echo $view_template_for_opu->PartnerName->viewAttributes() ?>>
<?php echo $view_template_for_opu->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID"<?php echo $view_template_for_opu->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_PartnerID" class="view_template_for_opu_PartnerID">
<span<?php echo $view_template_for_opu->PartnerID->viewAttributes() ?>>
<?php echo $view_template_for_opu->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->A4ICSICycle->Visible) { // A4ICSICycle ?>
		<td data-name="A4ICSICycle"<?php echo $view_template_for_opu->A4ICSICycle->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_A4ICSICycle" class="view_template_for_opu_A4ICSICycle">
<span<?php echo $view_template_for_opu->A4ICSICycle->viewAttributes() ?>>
<?php echo $view_template_for_opu->A4ICSICycle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->TotalICSICycle->Visible) { // TotalICSICycle ?>
		<td data-name="TotalICSICycle"<?php echo $view_template_for_opu->TotalICSICycle->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_TotalICSICycle" class="view_template_for_opu_TotalICSICycle">
<span<?php echo $view_template_for_opu->TotalICSICycle->viewAttributes() ?>>
<?php echo $view_template_for_opu->TotalICSICycle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
		<td data-name="TypeOfInfertility"<?php echo $view_template_for_opu->TypeOfInfertility->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_TypeOfInfertility" class="view_template_for_opu_TypeOfInfertility">
<span<?php echo $view_template_for_opu->TypeOfInfertility->viewAttributes() ?>>
<?php echo $view_template_for_opu->TypeOfInfertility->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->RelevantHistory->Visible) { // RelevantHistory ?>
		<td data-name="RelevantHistory"<?php echo $view_template_for_opu->RelevantHistory->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_RelevantHistory" class="view_template_for_opu_RelevantHistory">
<span<?php echo $view_template_for_opu->RelevantHistory->viewAttributes() ?>>
<?php echo $view_template_for_opu->RelevantHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->IUICycles->Visible) { // IUICycles ?>
		<td data-name="IUICycles"<?php echo $view_template_for_opu->IUICycles->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_IUICycles" class="view_template_for_opu_IUICycles">
<span<?php echo $view_template_for_opu->IUICycles->viewAttributes() ?>>
<?php echo $view_template_for_opu->IUICycles->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->AMH->Visible) { // AMH ?>
		<td data-name="AMH"<?php echo $view_template_for_opu->AMH->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_AMH" class="view_template_for_opu_AMH">
<span<?php echo $view_template_for_opu->AMH->viewAttributes() ?>>
<?php echo $view_template_for_opu->AMH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->FBMI->Visible) { // FBMI ?>
		<td data-name="FBMI"<?php echo $view_template_for_opu->FBMI->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_FBMI" class="view_template_for_opu_FBMI">
<span<?php echo $view_template_for_opu->FBMI->viewAttributes() ?>>
<?php echo $view_template_for_opu->FBMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
		<td data-name="ANTAGONISTSTARTDAY"<?php echo $view_template_for_opu->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_ANTAGONISTSTARTDAY" class="view_template_for_opu_ANTAGONISTSTARTDAY">
<span<?php echo $view_template_for_opu->ANTAGONISTSTARTDAY->viewAttributes() ?>>
<?php echo $view_template_for_opu->ANTAGONISTSTARTDAY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->OvarianSurgery->Visible) { // OvarianSurgery ?>
		<td data-name="OvarianSurgery"<?php echo $view_template_for_opu->OvarianSurgery->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_OvarianSurgery" class="view_template_for_opu_OvarianSurgery">
<span<?php echo $view_template_for_opu->OvarianSurgery->viewAttributes() ?>>
<?php echo $view_template_for_opu->OvarianSurgery->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->OPUDATE->Visible) { // OPUDATE ?>
		<td data-name="OPUDATE"<?php echo $view_template_for_opu->OPUDATE->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_OPUDATE" class="view_template_for_opu_OPUDATE">
<span<?php echo $view_template_for_opu->OPUDATE->viewAttributes() ?>>
<?php echo $view_template_for_opu->OPUDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->RFSH1->Visible) { // RFSH1 ?>
		<td data-name="RFSH1"<?php echo $view_template_for_opu->RFSH1->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_RFSH1" class="view_template_for_opu_RFSH1">
<span<?php echo $view_template_for_opu->RFSH1->viewAttributes() ?>>
<?php echo $view_template_for_opu->RFSH1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->RFSH2->Visible) { // RFSH2 ?>
		<td data-name="RFSH2"<?php echo $view_template_for_opu->RFSH2->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_RFSH2" class="view_template_for_opu_RFSH2">
<span<?php echo $view_template_for_opu->RFSH2->viewAttributes() ?>>
<?php echo $view_template_for_opu->RFSH2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->RFSH3->Visible) { // RFSH3 ?>
		<td data-name="RFSH3"<?php echo $view_template_for_opu->RFSH3->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_RFSH3" class="view_template_for_opu_RFSH3">
<span<?php echo $view_template_for_opu->RFSH3->viewAttributes() ?>>
<?php echo $view_template_for_opu->RFSH3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->E21->Visible) { // E21 ?>
		<td data-name="E21"<?php echo $view_template_for_opu->E21->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_E21" class="view_template_for_opu_E21">
<span<?php echo $view_template_for_opu->E21->viewAttributes() ?>>
<?php echo $view_template_for_opu->E21->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<td data-name="Hysteroscopy"<?php echo $view_template_for_opu->Hysteroscopy->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_Hysteroscopy" class="view_template_for_opu_Hysteroscopy">
<span<?php echo $view_template_for_opu->Hysteroscopy->viewAttributes() ?>>
<?php echo $view_template_for_opu->Hysteroscopy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_template_for_opu->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_HospID" class="view_template_for_opu_HospID">
<span<?php echo $view_template_for_opu->HospID->viewAttributes() ?>>
<?php echo $view_template_for_opu->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->Fweight->Visible) { // Fweight ?>
		<td data-name="Fweight"<?php echo $view_template_for_opu->Fweight->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_Fweight" class="view_template_for_opu_Fweight">
<span<?php echo $view_template_for_opu->Fweight->viewAttributes() ?>>
<?php echo $view_template_for_opu->Fweight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->AntiTPO->Visible) { // AntiTPO ?>
		<td data-name="AntiTPO"<?php echo $view_template_for_opu->AntiTPO->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_AntiTPO" class="view_template_for_opu_AntiTPO">
<span<?php echo $view_template_for_opu->AntiTPO->viewAttributes() ?>>
<?php echo $view_template_for_opu->AntiTPO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->AntiTG->Visible) { // AntiTG ?>
		<td data-name="AntiTG"<?php echo $view_template_for_opu->AntiTG->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_AntiTG" class="view_template_for_opu_AntiTG">
<span<?php echo $view_template_for_opu->AntiTG->viewAttributes() ?>>
<?php echo $view_template_for_opu->AntiTG->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->PatientAge->Visible) { // PatientAge ?>
		<td data-name="PatientAge"<?php echo $view_template_for_opu->PatientAge->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_PatientAge" class="view_template_for_opu_PatientAge">
<span<?php echo $view_template_for_opu->PatientAge->viewAttributes() ?>>
<?php echo $view_template_for_opu->PatientAge->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->PartnerAge->Visible) { // PartnerAge ?>
		<td data-name="PartnerAge"<?php echo $view_template_for_opu->PartnerAge->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_PartnerAge" class="view_template_for_opu_PartnerAge">
<span<?php echo $view_template_for_opu->PartnerAge->viewAttributes() ?>>
<?php echo $view_template_for_opu->PartnerAge->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->R_OVARY->Visible) { // R.OVARY ?>
		<td data-name="R_OVARY"<?php echo $view_template_for_opu->R_OVARY->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_R_OVARY" class="view_template_for_opu_R_OVARY">
<span<?php echo $view_template_for_opu->R_OVARY->viewAttributes() ?>>
<?php echo $view_template_for_opu->R_OVARY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->R_AFC->Visible) { // R.AFC ?>
		<td data-name="R_AFC"<?php echo $view_template_for_opu->R_AFC->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_R_AFC" class="view_template_for_opu_R_AFC">
<span<?php echo $view_template_for_opu->R_AFC->viewAttributes() ?>>
<?php echo $view_template_for_opu->R_AFC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->L_OVARY->Visible) { // L.OVARY ?>
		<td data-name="L_OVARY"<?php echo $view_template_for_opu->L_OVARY->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_L_OVARY" class="view_template_for_opu_L_OVARY">
<span<?php echo $view_template_for_opu->L_OVARY->viewAttributes() ?>>
<?php echo $view_template_for_opu->L_OVARY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->L_AFC->Visible) { // L.AFC ?>
		<td data-name="L_AFC"<?php echo $view_template_for_opu->L_AFC->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_L_AFC" class="view_template_for_opu_L_AFC">
<span<?php echo $view_template_for_opu->L_AFC->viewAttributes() ?>>
<?php echo $view_template_for_opu->L_AFC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->E2->Visible) { // E2 ?>
		<td data-name="E2"<?php echo $view_template_for_opu->E2->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_E2" class="view_template_for_opu_E2">
<span<?php echo $view_template_for_opu->E2->viewAttributes() ?>>
<?php echo $view_template_for_opu->E2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->AMH1->Visible) { // AMH1 ?>
		<td data-name="AMH1"<?php echo $view_template_for_opu->AMH1->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_AMH1" class="view_template_for_opu_AMH1">
<span<?php echo $view_template_for_opu->AMH1->viewAttributes() ?>>
<?php echo $view_template_for_opu->AMH1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->BMI28MALE29->Visible) { // BMI(MALE) ?>
		<td data-name="BMI28MALE29"<?php echo $view_template_for_opu->BMI28MALE29->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_BMI28MALE29" class="view_template_for_opu_BMI28MALE29">
<span<?php echo $view_template_for_opu->BMI28MALE29->viewAttributes() ?>>
<?php echo $view_template_for_opu->BMI28MALE29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->MaleMedicalConditions->Visible) { // MaleMedicalConditions ?>
		<td data-name="MaleMedicalConditions"<?php echo $view_template_for_opu->MaleMedicalConditions->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_MaleMedicalConditions" class="view_template_for_opu_MaleMedicalConditions">
<span<?php echo $view_template_for_opu->MaleMedicalConditions->viewAttributes() ?>>
<?php echo $view_template_for_opu->MaleMedicalConditions->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->CC_100->Visible) { // CC 100 ?>
		<td data-name="CC_100"<?php echo $view_template_for_opu->CC_100->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_CC_100" class="view_template_for_opu_CC_100">
<span<?php echo $view_template_for_opu->CC_100->viewAttributes() ?>>
<?php echo $view_template_for_opu->CC_100->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->RFSH1A->Visible) { // RFSH1A ?>
		<td data-name="RFSH1A"<?php echo $view_template_for_opu->RFSH1A->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_RFSH1A" class="view_template_for_opu_RFSH1A">
<span<?php echo $view_template_for_opu->RFSH1A->viewAttributes() ?>>
<?php echo $view_template_for_opu->RFSH1A->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->HMG1->Visible) { // HMG1 ?>
		<td data-name="HMG1"<?php echo $view_template_for_opu->HMG1->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_HMG1" class="view_template_for_opu_HMG1">
<span<?php echo $view_template_for_opu->HMG1->viewAttributes() ?>>
<?php echo $view_template_for_opu->HMG1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
		<td data-name="DAYSOFSTIMULATION"<?php echo $view_template_for_opu->DAYSOFSTIMULATION->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_DAYSOFSTIMULATION" class="view_template_for_opu_DAYSOFSTIMULATION">
<span<?php echo $view_template_for_opu->DAYSOFSTIMULATION->viewAttributes() ?>>
<?php echo $view_template_for_opu->DAYSOFSTIMULATION->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_opu->TRIGGERR->Visible) { // TRIGGERR ?>
		<td data-name="TRIGGERR"<?php echo $view_template_for_opu->TRIGGERR->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_opu_list->RowCnt ?>_view_template_for_opu_TRIGGERR" class="view_template_for_opu_TRIGGERR">
<span<?php echo $view_template_for_opu->TRIGGERR->viewAttributes() ?>>
<?php echo $view_template_for_opu->TRIGGERR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_template_for_opu_list->ListOptions->render("body", "right", $view_template_for_opu_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_template_for_opu->isGridAdd())
		$view_template_for_opu_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_template_for_opu->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_template_for_opu_list->Recordset)
	$view_template_for_opu_list->Recordset->Close();
?>
<?php if (!$view_template_for_opu->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_template_for_opu->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_template_for_opu_list->Pager)) $view_template_for_opu_list->Pager = new NumericPager($view_template_for_opu_list->StartRec, $view_template_for_opu_list->DisplayRecs, $view_template_for_opu_list->TotalRecs, $view_template_for_opu_list->RecRange, $view_template_for_opu_list->AutoHidePager) ?>
<?php if ($view_template_for_opu_list->Pager->RecordCount > 0 && $view_template_for_opu_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_template_for_opu_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_for_opu_list->pageUrl() ?>start=<?php echo $view_template_for_opu_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_template_for_opu_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_for_opu_list->pageUrl() ?>start=<?php echo $view_template_for_opu_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_template_for_opu_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_template_for_opu_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_template_for_opu_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_for_opu_list->pageUrl() ?>start=<?php echo $view_template_for_opu_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_template_for_opu_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_for_opu_list->pageUrl() ?>start=<?php echo $view_template_for_opu_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_template_for_opu_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_template_for_opu_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_template_for_opu_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_template_for_opu_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_template_for_opu_list->TotalRecs > 0 && (!$view_template_for_opu_list->AutoHidePageSizeSelector || $view_template_for_opu_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_template_for_opu">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_template_for_opu_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_template_for_opu_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_template_for_opu_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_template_for_opu_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_template_for_opu_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_template_for_opu_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_template_for_opu->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_template_for_opu_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_template_for_opu_list->TotalRecs == 0 && !$view_template_for_opu->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_template_for_opu_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_template_for_opu_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_template_for_opu->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_template_for_opu_list->terminate();
?>