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
$view_doctor_notes_list = new view_doctor_notes_list();

// Run the page
$view_doctor_notes_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_doctor_notes_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_doctor_notes->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_doctor_noteslist = currentForm = new ew.Form("fview_doctor_noteslist", "list");
fview_doctor_noteslist.formKeyCountName = '<?php echo $view_doctor_notes_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_doctor_noteslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_doctor_noteslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_doctor_noteslistsrch = currentSearchForm = new ew.Form("fview_doctor_noteslistsrch");

// Validate function for search
fview_doctor_noteslistsrch.validate = function(fobj) {
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
fview_doctor_noteslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_doctor_noteslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_doctor_noteslistsrch.filterList = <?php echo $view_doctor_notes_list->getFilterList() ?>;
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
<?php if (!$view_doctor_notes->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_doctor_notes_list->TotalRecs > 0 && $view_doctor_notes_list->ExportOptions->visible()) { ?>
<?php $view_doctor_notes_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_doctor_notes_list->ImportOptions->visible()) { ?>
<?php $view_doctor_notes_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_doctor_notes_list->SearchOptions->visible()) { ?>
<?php $view_doctor_notes_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_doctor_notes_list->FilterOptions->visible()) { ?>
<?php $view_doctor_notes_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_doctor_notes_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_doctor_notes->isExport() && !$view_doctor_notes->CurrentAction) { ?>
<form name="fview_doctor_noteslistsrch" id="fview_doctor_noteslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_doctor_notes_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_doctor_noteslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_doctor_notes">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_doctor_notes_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_doctor_notes->RowType = ROWTYPE_SEARCH;

// Render row
$view_doctor_notes->resetAttributes();
$view_doctor_notes_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_doctor_notes->patientID->Visible) { // patientID ?>
	<div id="xsc_patientID" class="ew-cell form-group">
		<label for="x_patientID" class="ew-search-caption ew-label"><?php echo $view_doctor_notes->patientID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_patientID" id="z_patientID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_doctor_notes" data-field="x_patientID" name="x_patientID" id="x_patientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_doctor_notes->patientID->getPlaceHolder()) ?>" value="<?php echo $view_doctor_notes->patientID->EditValue ?>"<?php echo $view_doctor_notes->patientID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_doctor_notes->patientName->Visible) { // patientName ?>
	<div id="xsc_patientName" class="ew-cell form-group">
		<label for="x_patientName" class="ew-search-caption ew-label"><?php echo $view_doctor_notes->patientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_patientName" id="z_patientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_doctor_notes" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_doctor_notes->patientName->getPlaceHolder()) ?>" value="<?php echo $view_doctor_notes->patientName->EditValue ?>"<?php echo $view_doctor_notes->patientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_doctor_notes->DoctorName->Visible) { // DoctorName ?>
	<div id="xsc_DoctorName" class="ew-cell form-group">
		<label for="x_DoctorName" class="ew-search-caption ew-label"><?php echo $view_doctor_notes->DoctorName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DoctorName" id="z_DoctorName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_doctor_notes" data-field="x_DoctorName" name="x_DoctorName" id="x_DoctorName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_doctor_notes->DoctorName->getPlaceHolder()) ?>" value="<?php echo $view_doctor_notes->DoctorName->EditValue ?>"<?php echo $view_doctor_notes->DoctorName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_doctor_notes->Referal->Visible) { // Referal ?>
	<div id="xsc_Referal" class="ew-cell form-group">
		<label for="x_Referal" class="ew-search-caption ew-label"><?php echo $view_doctor_notes->Referal->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Referal" id="z_Referal" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_doctor_notes" data-field="x_Referal" name="x_Referal" id="x_Referal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_doctor_notes->Referal->getPlaceHolder()) ?>" value="<?php echo $view_doctor_notes->Referal->EditValue ?>"<?php echo $view_doctor_notes->Referal->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_doctor_notes_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_doctor_notes_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_doctor_notes_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_doctor_notes_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_doctor_notes_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_doctor_notes_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_doctor_notes_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_doctor_notes_list->showPageHeader(); ?>
<?php
$view_doctor_notes_list->showMessage();
?>
<?php if ($view_doctor_notes_list->TotalRecs > 0 || $view_doctor_notes->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_doctor_notes_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_doctor_notes">
<?php if (!$view_doctor_notes->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_doctor_notes->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_doctor_notes_list->Pager)) $view_doctor_notes_list->Pager = new NumericPager($view_doctor_notes_list->StartRec, $view_doctor_notes_list->DisplayRecs, $view_doctor_notes_list->TotalRecs, $view_doctor_notes_list->RecRange, $view_doctor_notes_list->AutoHidePager) ?>
<?php if ($view_doctor_notes_list->Pager->RecordCount > 0 && $view_doctor_notes_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_doctor_notes_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_doctor_notes_list->pageUrl() ?>start=<?php echo $view_doctor_notes_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_doctor_notes_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_doctor_notes_list->pageUrl() ?>start=<?php echo $view_doctor_notes_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_doctor_notes_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_doctor_notes_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_doctor_notes_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_doctor_notes_list->pageUrl() ?>start=<?php echo $view_doctor_notes_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_doctor_notes_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_doctor_notes_list->pageUrl() ?>start=<?php echo $view_doctor_notes_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_doctor_notes_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_doctor_notes_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_doctor_notes_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_doctor_notes_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_doctor_notes_list->TotalRecs > 0 && (!$view_doctor_notes_list->AutoHidePageSizeSelector || $view_doctor_notes_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_doctor_notes">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_doctor_notes_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_doctor_notes_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_doctor_notes_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_doctor_notes_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_doctor_notes_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_doctor_notes_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_doctor_notes->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_doctor_notes_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_doctor_noteslist" id="fview_doctor_noteslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_doctor_notes_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_doctor_notes_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_doctor_notes">
<div id="gmp_view_doctor_notes" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_doctor_notes_list->TotalRecs > 0 || $view_doctor_notes->isGridEdit()) { ?>
<table id="tbl_view_doctor_noteslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_doctor_notes_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_doctor_notes_list->renderListOptions();

// Render list options (header, left)
$view_doctor_notes_list->ListOptions->render("header", "left");
?>
<?php if ($view_doctor_notes->patientID->Visible) { // patientID ?>
	<?php if ($view_doctor_notes->sortUrl($view_doctor_notes->patientID) == "") { ?>
		<th data-name="patientID" class="<?php echo $view_doctor_notes->patientID->headerCellClass() ?>"><div id="elh_view_doctor_notes_patientID" class="view_doctor_notes_patientID"><div class="ew-table-header-caption"><?php echo $view_doctor_notes->patientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientID" class="<?php echo $view_doctor_notes->patientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_doctor_notes->SortUrl($view_doctor_notes->patientID) ?>',1);"><div id="elh_view_doctor_notes_patientID" class="view_doctor_notes_patientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes->patientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes->patientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_doctor_notes->patientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes->patientName->Visible) { // patientName ?>
	<?php if ($view_doctor_notes->sortUrl($view_doctor_notes->patientName) == "") { ?>
		<th data-name="patientName" class="<?php echo $view_doctor_notes->patientName->headerCellClass() ?>"><div id="elh_view_doctor_notes_patientName" class="view_doctor_notes_patientName"><div class="ew-table-header-caption"><?php echo $view_doctor_notes->patientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientName" class="<?php echo $view_doctor_notes->patientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_doctor_notes->SortUrl($view_doctor_notes->patientName) ?>',1);"><div id="elh_view_doctor_notes_patientName" class="view_doctor_notes_patientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes->patientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes->patientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_doctor_notes->patientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes->DoctorName->Visible) { // DoctorName ?>
	<?php if ($view_doctor_notes->sortUrl($view_doctor_notes->DoctorName) == "") { ?>
		<th data-name="DoctorName" class="<?php echo $view_doctor_notes->DoctorName->headerCellClass() ?>"><div id="elh_view_doctor_notes_DoctorName" class="view_doctor_notes_DoctorName"><div class="ew-table-header-caption"><?php echo $view_doctor_notes->DoctorName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorName" class="<?php echo $view_doctor_notes->DoctorName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_doctor_notes->SortUrl($view_doctor_notes->DoctorName) ?>',1);"><div id="elh_view_doctor_notes_DoctorName" class="view_doctor_notes_DoctorName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes->DoctorName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes->DoctorName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_doctor_notes->DoctorName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes->Referal->Visible) { // Referal ?>
	<?php if ($view_doctor_notes->sortUrl($view_doctor_notes->Referal) == "") { ?>
		<th data-name="Referal" class="<?php echo $view_doctor_notes->Referal->headerCellClass() ?>"><div id="elh_view_doctor_notes_Referal" class="view_doctor_notes_Referal"><div class="ew-table-header-caption"><?php echo $view_doctor_notes->Referal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Referal" class="<?php echo $view_doctor_notes->Referal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_doctor_notes->SortUrl($view_doctor_notes->Referal) ?>',1);"><div id="elh_view_doctor_notes_Referal" class="view_doctor_notes_Referal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes->Referal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes->Referal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_doctor_notes->Referal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes->PatientTypee->Visible) { // PatientTypee ?>
	<?php if ($view_doctor_notes->sortUrl($view_doctor_notes->PatientTypee) == "") { ?>
		<th data-name="PatientTypee" class="<?php echo $view_doctor_notes->PatientTypee->headerCellClass() ?>"><div id="elh_view_doctor_notes_PatientTypee" class="view_doctor_notes_PatientTypee"><div class="ew-table-header-caption"><?php echo $view_doctor_notes->PatientTypee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientTypee" class="<?php echo $view_doctor_notes->PatientTypee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_doctor_notes->SortUrl($view_doctor_notes->PatientTypee) ?>',1);"><div id="elh_view_doctor_notes_PatientTypee" class="view_doctor_notes_PatientTypee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes->PatientTypee->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes->PatientTypee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_doctor_notes->PatientTypee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes->procedurenotes->Visible) { // procedurenotes ?>
	<?php if ($view_doctor_notes->sortUrl($view_doctor_notes->procedurenotes) == "") { ?>
		<th data-name="procedurenotes" class="<?php echo $view_doctor_notes->procedurenotes->headerCellClass() ?>"><div id="elh_view_doctor_notes_procedurenotes" class="view_doctor_notes_procedurenotes"><div class="ew-table-header-caption"><?php echo $view_doctor_notes->procedurenotes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="procedurenotes" class="<?php echo $view_doctor_notes->procedurenotes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_doctor_notes->SortUrl($view_doctor_notes->procedurenotes) ?>',1);"><div id="elh_view_doctor_notes_procedurenotes" class="view_doctor_notes_procedurenotes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes->procedurenotes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes->procedurenotes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_doctor_notes->procedurenotes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes->HospID->Visible) { // HospID ?>
	<?php if ($view_doctor_notes->sortUrl($view_doctor_notes->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_doctor_notes->HospID->headerCellClass() ?>"><div id="elh_view_doctor_notes_HospID" class="view_doctor_notes_HospID"><div class="ew-table-header-caption"><?php echo $view_doctor_notes->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_doctor_notes->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_doctor_notes->SortUrl($view_doctor_notes->HospID) ?>',1);"><div id="elh_view_doctor_notes_HospID" class="view_doctor_notes_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_doctor_notes->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes->Created->Visible) { // Created ?>
	<?php if ($view_doctor_notes->sortUrl($view_doctor_notes->Created) == "") { ?>
		<th data-name="Created" class="<?php echo $view_doctor_notes->Created->headerCellClass() ?>"><div id="elh_view_doctor_notes_Created" class="view_doctor_notes_Created"><div class="ew-table-header-caption"><?php echo $view_doctor_notes->Created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Created" class="<?php echo $view_doctor_notes->Created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_doctor_notes->SortUrl($view_doctor_notes->Created) ?>',1);"><div id="elh_view_doctor_notes_Created" class="view_doctor_notes_Created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes->Created->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes->Created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_doctor_notes->Created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes->Started->Visible) { // Started ?>
	<?php if ($view_doctor_notes->sortUrl($view_doctor_notes->Started) == "") { ?>
		<th data-name="Started" class="<?php echo $view_doctor_notes->Started->headerCellClass() ?>"><div id="elh_view_doctor_notes_Started" class="view_doctor_notes_Started"><div class="ew-table-header-caption"><?php echo $view_doctor_notes->Started->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Started" class="<?php echo $view_doctor_notes->Started->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_doctor_notes->SortUrl($view_doctor_notes->Started) ?>',1);"><div id="elh_view_doctor_notes_Started" class="view_doctor_notes_Started">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes->Started->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes->Started->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_doctor_notes->Started->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_doctor_notes_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_doctor_notes->ExportAll && $view_doctor_notes->isExport()) {
	$view_doctor_notes_list->StopRec = $view_doctor_notes_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_doctor_notes_list->TotalRecs > $view_doctor_notes_list->StartRec + $view_doctor_notes_list->DisplayRecs - 1)
		$view_doctor_notes_list->StopRec = $view_doctor_notes_list->StartRec + $view_doctor_notes_list->DisplayRecs - 1;
	else
		$view_doctor_notes_list->StopRec = $view_doctor_notes_list->TotalRecs;
}
$view_doctor_notes_list->RecCnt = $view_doctor_notes_list->StartRec - 1;
if ($view_doctor_notes_list->Recordset && !$view_doctor_notes_list->Recordset->EOF) {
	$view_doctor_notes_list->Recordset->moveFirst();
	$selectLimit = $view_doctor_notes_list->UseSelectLimit;
	if (!$selectLimit && $view_doctor_notes_list->StartRec > 1)
		$view_doctor_notes_list->Recordset->move($view_doctor_notes_list->StartRec - 1);
} elseif (!$view_doctor_notes->AllowAddDeleteRow && $view_doctor_notes_list->StopRec == 0) {
	$view_doctor_notes_list->StopRec = $view_doctor_notes->GridAddRowCount;
}

// Initialize aggregate
$view_doctor_notes->RowType = ROWTYPE_AGGREGATEINIT;
$view_doctor_notes->resetAttributes();
$view_doctor_notes_list->renderRow();
while ($view_doctor_notes_list->RecCnt < $view_doctor_notes_list->StopRec) {
	$view_doctor_notes_list->RecCnt++;
	if ($view_doctor_notes_list->RecCnt >= $view_doctor_notes_list->StartRec) {
		$view_doctor_notes_list->RowCnt++;

		// Set up key count
		$view_doctor_notes_list->KeyCount = $view_doctor_notes_list->RowIndex;

		// Init row class and style
		$view_doctor_notes->resetAttributes();
		$view_doctor_notes->CssClass = "";
		if ($view_doctor_notes->isGridAdd()) {
		} else {
			$view_doctor_notes_list->loadRowValues($view_doctor_notes_list->Recordset); // Load row values
		}
		$view_doctor_notes->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_doctor_notes->RowAttrs = array_merge($view_doctor_notes->RowAttrs, array('data-rowindex'=>$view_doctor_notes_list->RowCnt, 'id'=>'r' . $view_doctor_notes_list->RowCnt . '_view_doctor_notes', 'data-rowtype'=>$view_doctor_notes->RowType));

		// Render row
		$view_doctor_notes_list->renderRow();

		// Render list options
		$view_doctor_notes_list->renderListOptions();
?>
	<tr<?php echo $view_doctor_notes->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_doctor_notes_list->ListOptions->render("body", "left", $view_doctor_notes_list->RowCnt);
?>
	<?php if ($view_doctor_notes->patientID->Visible) { // patientID ?>
		<td data-name="patientID"<?php echo $view_doctor_notes->patientID->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCnt ?>_view_doctor_notes_patientID" class="view_doctor_notes_patientID">
<span<?php echo $view_doctor_notes->patientID->viewAttributes() ?>>
<?php echo $view_doctor_notes->patientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_doctor_notes->patientName->Visible) { // patientName ?>
		<td data-name="patientName"<?php echo $view_doctor_notes->patientName->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCnt ?>_view_doctor_notes_patientName" class="view_doctor_notes_patientName">
<span<?php echo $view_doctor_notes->patientName->viewAttributes() ?>>
<?php echo $view_doctor_notes->patientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_doctor_notes->DoctorName->Visible) { // DoctorName ?>
		<td data-name="DoctorName"<?php echo $view_doctor_notes->DoctorName->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCnt ?>_view_doctor_notes_DoctorName" class="view_doctor_notes_DoctorName">
<span<?php echo $view_doctor_notes->DoctorName->viewAttributes() ?>>
<?php echo $view_doctor_notes->DoctorName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_doctor_notes->Referal->Visible) { // Referal ?>
		<td data-name="Referal"<?php echo $view_doctor_notes->Referal->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCnt ?>_view_doctor_notes_Referal" class="view_doctor_notes_Referal">
<span<?php echo $view_doctor_notes->Referal->viewAttributes() ?>>
<?php echo $view_doctor_notes->Referal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_doctor_notes->PatientTypee->Visible) { // PatientTypee ?>
		<td data-name="PatientTypee"<?php echo $view_doctor_notes->PatientTypee->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCnt ?>_view_doctor_notes_PatientTypee" class="view_doctor_notes_PatientTypee">
<span<?php echo $view_doctor_notes->PatientTypee->viewAttributes() ?>>
<?php echo $view_doctor_notes->PatientTypee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_doctor_notes->procedurenotes->Visible) { // procedurenotes ?>
		<td data-name="procedurenotes"<?php echo $view_doctor_notes->procedurenotes->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCnt ?>_view_doctor_notes_procedurenotes" class="view_doctor_notes_procedurenotes">
<span<?php echo $view_doctor_notes->procedurenotes->viewAttributes() ?>>
<?php echo $view_doctor_notes->procedurenotes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_doctor_notes->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_doctor_notes->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCnt ?>_view_doctor_notes_HospID" class="view_doctor_notes_HospID">
<span<?php echo $view_doctor_notes->HospID->viewAttributes() ?>>
<?php echo $view_doctor_notes->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_doctor_notes->Created->Visible) { // Created ?>
		<td data-name="Created"<?php echo $view_doctor_notes->Created->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCnt ?>_view_doctor_notes_Created" class="view_doctor_notes_Created">
<span<?php echo $view_doctor_notes->Created->viewAttributes() ?>>
<?php echo $view_doctor_notes->Created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_doctor_notes->Started->Visible) { // Started ?>
		<td data-name="Started"<?php echo $view_doctor_notes->Started->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCnt ?>_view_doctor_notes_Started" class="view_doctor_notes_Started">
<span<?php echo $view_doctor_notes->Started->viewAttributes() ?>>
<?php echo $view_doctor_notes->Started->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_doctor_notes_list->ListOptions->render("body", "right", $view_doctor_notes_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_doctor_notes->isGridAdd())
		$view_doctor_notes_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_doctor_notes->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_doctor_notes_list->Recordset)
	$view_doctor_notes_list->Recordset->Close();
?>
<?php if (!$view_doctor_notes->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_doctor_notes->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_doctor_notes_list->Pager)) $view_doctor_notes_list->Pager = new NumericPager($view_doctor_notes_list->StartRec, $view_doctor_notes_list->DisplayRecs, $view_doctor_notes_list->TotalRecs, $view_doctor_notes_list->RecRange, $view_doctor_notes_list->AutoHidePager) ?>
<?php if ($view_doctor_notes_list->Pager->RecordCount > 0 && $view_doctor_notes_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_doctor_notes_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_doctor_notes_list->pageUrl() ?>start=<?php echo $view_doctor_notes_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_doctor_notes_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_doctor_notes_list->pageUrl() ?>start=<?php echo $view_doctor_notes_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_doctor_notes_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_doctor_notes_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_doctor_notes_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_doctor_notes_list->pageUrl() ?>start=<?php echo $view_doctor_notes_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_doctor_notes_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_doctor_notes_list->pageUrl() ?>start=<?php echo $view_doctor_notes_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_doctor_notes_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_doctor_notes_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_doctor_notes_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_doctor_notes_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_doctor_notes_list->TotalRecs > 0 && (!$view_doctor_notes_list->AutoHidePageSizeSelector || $view_doctor_notes_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_doctor_notes">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_doctor_notes_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_doctor_notes_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_doctor_notes_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_doctor_notes_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_doctor_notes_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_doctor_notes_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_doctor_notes->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_doctor_notes_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_doctor_notes_list->TotalRecs == 0 && !$view_doctor_notes->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_doctor_notes_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_doctor_notes_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_doctor_notes->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_doctor_notes->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_doctor_notes", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_doctor_notes_list->terminate();
?>