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
$patient_history_list = new patient_history_list();

// Run the page
$patient_history_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_history_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_history->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_historylist = currentForm = new ew.Form("fpatient_historylist", "list");
fpatient_historylist.formKeyCountName = '<?php echo $patient_history_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpatient_historylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_historylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpatient_historylistsrch = currentSearchForm = new ew.Form("fpatient_historylistsrch");

// Validate function for search
fpatient_historylistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_PatientId");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_history->PatientId->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fpatient_historylistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_historylistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fpatient_historylistsrch.filterList = <?php echo $patient_history_list->getFilterList() ?>;
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
<?php if (!$patient_history->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_history_list->TotalRecs > 0 && $patient_history_list->ExportOptions->visible()) { ?>
<?php $patient_history_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_history_list->ImportOptions->visible()) { ?>
<?php $patient_history_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_history_list->SearchOptions->visible()) { ?>
<?php $patient_history_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_history_list->FilterOptions->visible()) { ?>
<?php $patient_history_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_history->isExport() || EXPORT_MASTER_RECORD && $patient_history->isExport("print")) { ?>
<?php
if ($patient_history_list->DbMasterFilter <> "" && $patient_history->getCurrentMasterTable() == "ip_admission") {
	if ($patient_history_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_history_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_history->isExport() && !$patient_history->CurrentAction) { ?>
<form name="fpatient_historylistsrch" id="fpatient_historylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_history_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_historylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_history">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$patient_history_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$patient_history->RowType = ROWTYPE_SEARCH;

// Render row
$patient_history->resetAttributes();
$patient_history_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($patient_history->mrnno->Visible) { // mrnno ?>
	<div id="xsc_mrnno" class="ew-cell form-group">
		<label for="x_mrnno" class="ew-search-caption ew-label"><?php echo $patient_history->mrnno->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_history->mrnno->EditValue ?>"<?php echo $patient_history->mrnno->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($patient_history->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $patient_history->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_history->PatientName->EditValue ?>"<?php echo $patient_history->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($patient_history->PatientId->Visible) { // PatientId ?>
	<div id="xsc_PatientId" class="ew-cell form-group">
		<label for="x_PatientId" class="ew-search-caption ew-label"><?php echo $patient_history->PatientId->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="="></span>
		<span class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_history->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_history->PatientId->EditValue ?>"<?php echo $patient_history->PatientId->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($patient_history->MobileNumber->Visible) { // MobileNumber ?>
	<div id="xsc_MobileNumber" class="ew-cell form-group">
		<label for="x_MobileNumber" class="ew-search-caption ew-label"><?php echo $patient_history->MobileNumber->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_history->MobileNumber->EditValue ?>"<?php echo $patient_history->MobileNumber->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_history_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_history_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_history_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_history_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_history_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_history_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_history_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_history_list->showPageHeader(); ?>
<?php
$patient_history_list->showMessage();
?>
<?php if ($patient_history_list->TotalRecs > 0 || $patient_history->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_history_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_history">
<?php if (!$patient_history->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_history->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_history_list->Pager)) $patient_history_list->Pager = new NumericPager($patient_history_list->StartRec, $patient_history_list->DisplayRecs, $patient_history_list->TotalRecs, $patient_history_list->RecRange, $patient_history_list->AutoHidePager) ?>
<?php if ($patient_history_list->Pager->RecordCount > 0 && $patient_history_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_history_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_history_list->pageUrl() ?>start=<?php echo $patient_history_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_history_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_history_list->pageUrl() ?>start=<?php echo $patient_history_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_history_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_history_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_history_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_history_list->pageUrl() ?>start=<?php echo $patient_history_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_history_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_history_list->pageUrl() ?>start=<?php echo $patient_history_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_history_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_history_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_history_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_history_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_history_list->TotalRecs > 0 && (!$patient_history_list->AutoHidePageSizeSelector || $patient_history_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_history">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_history_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_history_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_history_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_history_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_history_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_history_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_history->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_history_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_historylist" id="fpatient_historylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_history_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_history_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_history">
<?php if ($patient_history->getCurrentMasterTable() == "ip_admission" && $patient_history->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_history->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_history->PatientId->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_history->mrnno->getSessionValue() ?>">
<?php } ?>
<div id="gmp_patient_history" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_history_list->TotalRecs > 0 || $patient_history->isGridEdit()) { ?>
<table id="tbl_patient_historylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_history_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_history_list->renderListOptions();

// Render list options (header, left)
$patient_history_list->ListOptions->render("header", "left");
?>
<?php if ($patient_history->id->Visible) { // id ?>
	<?php if ($patient_history->sortUrl($patient_history->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_history->id->headerCellClass() ?>"><div id="elh_patient_history_id" class="patient_history_id"><div class="ew-table-header-caption"><?php echo $patient_history->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_history->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_history->SortUrl($patient_history->id) ?>',1);"><div id="elh_patient_history_id" class="patient_history_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_history->sortUrl($patient_history->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_history->mrnno->headerCellClass() ?>"><div id="elh_patient_history_mrnno" class="patient_history_mrnno"><div class="ew-table-header-caption"><?php echo $patient_history->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_history->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_history->SortUrl($patient_history->mrnno) ?>',1);"><div id="elh_patient_history_mrnno" class="patient_history_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_history->sortUrl($patient_history->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_history->PatientName->headerCellClass() ?>"><div id="elh_patient_history_PatientName" class="patient_history_PatientName"><div class="ew-table-header-caption"><?php echo $patient_history->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_history->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_history->SortUrl($patient_history->PatientName) ?>',1);"><div id="elh_patient_history_PatientName" class="patient_history_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_history->sortUrl($patient_history->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_history->PatientId->headerCellClass() ?>"><div id="elh_patient_history_PatientId" class="patient_history_PatientId"><div class="ew-table-header-caption"><?php echo $patient_history->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_history->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_history->SortUrl($patient_history->PatientId) ?>',1);"><div id="elh_patient_history_PatientId" class="patient_history_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_history->sortUrl($patient_history->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_history->MobileNumber->headerCellClass() ?>"><div id="elh_patient_history_MobileNumber" class="patient_history_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_history->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_history->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_history->SortUrl($patient_history->MobileNumber) ?>',1);"><div id="elh_patient_history_MobileNumber" class="patient_history_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->MaritalHistory->Visible) { // MaritalHistory ?>
	<?php if ($patient_history->sortUrl($patient_history->MaritalHistory) == "") { ?>
		<th data-name="MaritalHistory" class="<?php echo $patient_history->MaritalHistory->headerCellClass() ?>"><div id="elh_patient_history_MaritalHistory" class="patient_history_MaritalHistory"><div class="ew-table-header-caption"><?php echo $patient_history->MaritalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaritalHistory" class="<?php echo $patient_history->MaritalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_history->SortUrl($patient_history->MaritalHistory) ?>',1);"><div id="elh_patient_history_MaritalHistory" class="patient_history_MaritalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->MaritalHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history->MaritalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->MaritalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($patient_history->sortUrl($patient_history->MenstrualHistory) == "") { ?>
		<th data-name="MenstrualHistory" class="<?php echo $patient_history->MenstrualHistory->headerCellClass() ?>"><div id="elh_patient_history_MenstrualHistory" class="patient_history_MenstrualHistory"><div class="ew-table-header-caption"><?php echo $patient_history->MenstrualHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MenstrualHistory" class="<?php echo $patient_history->MenstrualHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_history->SortUrl($patient_history->MenstrualHistory) ?>',1);"><div id="elh_patient_history_MenstrualHistory" class="patient_history_MenstrualHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->MenstrualHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history->MenstrualHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->MenstrualHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<?php if ($patient_history->sortUrl($patient_history->ObstetricHistory) == "") { ?>
		<th data-name="ObstetricHistory" class="<?php echo $patient_history->ObstetricHistory->headerCellClass() ?>"><div id="elh_patient_history_ObstetricHistory" class="patient_history_ObstetricHistory"><div class="ew-table-header-caption"><?php echo $patient_history->ObstetricHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ObstetricHistory" class="<?php echo $patient_history->ObstetricHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_history->SortUrl($patient_history->ObstetricHistory) ?>',1);"><div id="elh_patient_history_ObstetricHistory" class="patient_history_ObstetricHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->ObstetricHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history->ObstetricHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->ObstetricHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->Age->Visible) { // Age ?>
	<?php if ($patient_history->sortUrl($patient_history->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_history->Age->headerCellClass() ?>"><div id="elh_patient_history_Age" class="patient_history_Age"><div class="ew-table-header-caption"><?php echo $patient_history->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_history->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_history->SortUrl($patient_history->Age) ?>',1);"><div id="elh_patient_history_Age" class="patient_history_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->Gender->Visible) { // Gender ?>
	<?php if ($patient_history->sortUrl($patient_history->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_history->Gender->headerCellClass() ?>"><div id="elh_patient_history_Gender" class="patient_history_Gender"><div class="ew-table-header-caption"><?php echo $patient_history->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_history->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_history->SortUrl($patient_history->Gender) ?>',1);"><div id="elh_patient_history_Gender" class="patient_history_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->PatID->Visible) { // PatID ?>
	<?php if ($patient_history->sortUrl($patient_history->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_history->PatID->headerCellClass() ?>"><div id="elh_patient_history_PatID" class="patient_history_PatID"><div class="ew-table-header-caption"><?php echo $patient_history->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_history->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_history->SortUrl($patient_history->PatID) ?>',1);"><div id="elh_patient_history_PatID" class="patient_history_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->PatID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->Reception->Visible) { // Reception ?>
	<?php if ($patient_history->sortUrl($patient_history->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_history->Reception->headerCellClass() ?>"><div id="elh_patient_history_Reception" class="patient_history_Reception"><div class="ew-table-header-caption"><?php echo $patient_history->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_history->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_history->SortUrl($patient_history->Reception) ?>',1);"><div id="elh_patient_history_Reception" class="patient_history_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->HospID->Visible) { // HospID ?>
	<?php if ($patient_history->sortUrl($patient_history->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_history->HospID->headerCellClass() ?>"><div id="elh_patient_history_HospID" class="patient_history_HospID"><div class="ew-table-header-caption"><?php echo $patient_history->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_history->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_history->SortUrl($patient_history->HospID) ?>',1);"><div id="elh_patient_history_HospID" class="patient_history_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_history_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_history->ExportAll && $patient_history->isExport()) {
	$patient_history_list->StopRec = $patient_history_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_history_list->TotalRecs > $patient_history_list->StartRec + $patient_history_list->DisplayRecs - 1)
		$patient_history_list->StopRec = $patient_history_list->StartRec + $patient_history_list->DisplayRecs - 1;
	else
		$patient_history_list->StopRec = $patient_history_list->TotalRecs;
}
$patient_history_list->RecCnt = $patient_history_list->StartRec - 1;
if ($patient_history_list->Recordset && !$patient_history_list->Recordset->EOF) {
	$patient_history_list->Recordset->moveFirst();
	$selectLimit = $patient_history_list->UseSelectLimit;
	if (!$selectLimit && $patient_history_list->StartRec > 1)
		$patient_history_list->Recordset->move($patient_history_list->StartRec - 1);
} elseif (!$patient_history->AllowAddDeleteRow && $patient_history_list->StopRec == 0) {
	$patient_history_list->StopRec = $patient_history->GridAddRowCount;
}

// Initialize aggregate
$patient_history->RowType = ROWTYPE_AGGREGATEINIT;
$patient_history->resetAttributes();
$patient_history_list->renderRow();
while ($patient_history_list->RecCnt < $patient_history_list->StopRec) {
	$patient_history_list->RecCnt++;
	if ($patient_history_list->RecCnt >= $patient_history_list->StartRec) {
		$patient_history_list->RowCnt++;

		// Set up key count
		$patient_history_list->KeyCount = $patient_history_list->RowIndex;

		// Init row class and style
		$patient_history->resetAttributes();
		$patient_history->CssClass = "";
		if ($patient_history->isGridAdd()) {
		} else {
			$patient_history_list->loadRowValues($patient_history_list->Recordset); // Load row values
		}
		$patient_history->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_history->RowAttrs = array_merge($patient_history->RowAttrs, array('data-rowindex'=>$patient_history_list->RowCnt, 'id'=>'r' . $patient_history_list->RowCnt . '_patient_history', 'data-rowtype'=>$patient_history->RowType));

		// Render row
		$patient_history_list->renderRow();

		// Render list options
		$patient_history_list->renderListOptions();
?>
	<tr<?php echo $patient_history->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_history_list->ListOptions->render("body", "left", $patient_history_list->RowCnt);
?>
	<?php if ($patient_history->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_history->id->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCnt ?>_patient_history_id" class="patient_history_id">
<span<?php echo $patient_history->id->viewAttributes() ?>>
<?php echo $patient_history->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_history->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCnt ?>_patient_history_mrnno" class="patient_history_mrnno">
<span<?php echo $patient_history->mrnno->viewAttributes() ?>>
<?php echo $patient_history->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_history->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCnt ?>_patient_history_PatientName" class="patient_history_PatientName">
<span<?php echo $patient_history->PatientName->viewAttributes() ?>>
<?php echo $patient_history->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $patient_history->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCnt ?>_patient_history_PatientId" class="patient_history_PatientId">
<span<?php echo $patient_history->PatientId->viewAttributes() ?>>
<?php echo $patient_history->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $patient_history->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCnt ?>_patient_history_MobileNumber" class="patient_history_MobileNumber">
<span<?php echo $patient_history->MobileNumber->viewAttributes() ?>>
<?php echo $patient_history->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history->MaritalHistory->Visible) { // MaritalHistory ?>
		<td data-name="MaritalHistory"<?php echo $patient_history->MaritalHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCnt ?>_patient_history_MaritalHistory" class="patient_history_MaritalHistory">
<span<?php echo $patient_history->MaritalHistory->viewAttributes() ?>>
<?php echo $patient_history->MaritalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory"<?php echo $patient_history->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCnt ?>_patient_history_MenstrualHistory" class="patient_history_MenstrualHistory">
<span<?php echo $patient_history->MenstrualHistory->viewAttributes() ?>>
<?php echo $patient_history->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td data-name="ObstetricHistory"<?php echo $patient_history->ObstetricHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCnt ?>_patient_history_ObstetricHistory" class="patient_history_ObstetricHistory">
<span<?php echo $patient_history->ObstetricHistory->viewAttributes() ?>>
<?php echo $patient_history->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_history->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCnt ?>_patient_history_Age" class="patient_history_Age">
<span<?php echo $patient_history->Age->viewAttributes() ?>>
<?php echo $patient_history->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_history->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCnt ?>_patient_history_Gender" class="patient_history_Gender">
<span<?php echo $patient_history->Gender->viewAttributes() ?>>
<?php echo $patient_history->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $patient_history->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCnt ?>_patient_history_PatID" class="patient_history_PatID">
<span<?php echo $patient_history->PatID->viewAttributes() ?>>
<?php echo $patient_history->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_history->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCnt ?>_patient_history_Reception" class="patient_history_Reception">
<span<?php echo $patient_history->Reception->viewAttributes() ?>>
<?php echo $patient_history->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $patient_history->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCnt ?>_patient_history_HospID" class="patient_history_HospID">
<span<?php echo $patient_history->HospID->viewAttributes() ?>>
<?php echo $patient_history->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_history_list->ListOptions->render("body", "right", $patient_history_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$patient_history->isGridAdd())
		$patient_history_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$patient_history->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_history_list->Recordset)
	$patient_history_list->Recordset->Close();
?>
<?php if (!$patient_history->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_history->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_history_list->Pager)) $patient_history_list->Pager = new NumericPager($patient_history_list->StartRec, $patient_history_list->DisplayRecs, $patient_history_list->TotalRecs, $patient_history_list->RecRange, $patient_history_list->AutoHidePager) ?>
<?php if ($patient_history_list->Pager->RecordCount > 0 && $patient_history_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_history_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_history_list->pageUrl() ?>start=<?php echo $patient_history_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_history_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_history_list->pageUrl() ?>start=<?php echo $patient_history_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_history_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_history_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_history_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_history_list->pageUrl() ?>start=<?php echo $patient_history_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_history_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_history_list->pageUrl() ?>start=<?php echo $patient_history_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_history_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_history_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_history_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_history_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_history_list->TotalRecs > 0 && (!$patient_history_list->AutoHidePageSizeSelector || $patient_history_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_history">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_history_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_history_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_history_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_history_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_history_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_history_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_history->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_history_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_history_list->TotalRecs == 0 && !$patient_history->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_history_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_history_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_history->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$patient_history->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_history", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_history_list->terminate();
?>