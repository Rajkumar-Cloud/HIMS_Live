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
$patient_ot_delivery_register_list = new patient_ot_delivery_register_list();

// Run the page
$patient_ot_delivery_register_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_ot_delivery_register_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_ot_delivery_register->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_ot_delivery_registerlist = currentForm = new ew.Form("fpatient_ot_delivery_registerlist", "list");
fpatient_ot_delivery_registerlist.formKeyCountName = '<?php echo $patient_ot_delivery_register_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpatient_ot_delivery_registerlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_ot_delivery_registerlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_ot_delivery_registerlist.lists["x_Surgeon"] = <?php echo $patient_ot_delivery_register_list->Surgeon->Lookup->toClientList() ?>;
fpatient_ot_delivery_registerlist.lists["x_Surgeon"].options = <?php echo JsonEncode($patient_ot_delivery_register_list->Surgeon->lookupOptions()) ?>;
fpatient_ot_delivery_registerlist.autoSuggests["x_Surgeon"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registerlist.lists["x_Anaesthetist"] = <?php echo $patient_ot_delivery_register_list->Anaesthetist->Lookup->toClientList() ?>;
fpatient_ot_delivery_registerlist.lists["x_Anaesthetist"].options = <?php echo JsonEncode($patient_ot_delivery_register_list->Anaesthetist->lookupOptions()) ?>;
fpatient_ot_delivery_registerlist.autoSuggests["x_Anaesthetist"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registerlist.lists["x_AsstSurgeon1"] = <?php echo $patient_ot_delivery_register_list->AsstSurgeon1->Lookup->toClientList() ?>;
fpatient_ot_delivery_registerlist.lists["x_AsstSurgeon1"].options = <?php echo JsonEncode($patient_ot_delivery_register_list->AsstSurgeon1->lookupOptions()) ?>;
fpatient_ot_delivery_registerlist.autoSuggests["x_AsstSurgeon1"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registerlist.lists["x_AsstSurgeon2"] = <?php echo $patient_ot_delivery_register_list->AsstSurgeon2->Lookup->toClientList() ?>;
fpatient_ot_delivery_registerlist.lists["x_AsstSurgeon2"].options = <?php echo JsonEncode($patient_ot_delivery_register_list->AsstSurgeon2->lookupOptions()) ?>;
fpatient_ot_delivery_registerlist.autoSuggests["x_AsstSurgeon2"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registerlist.lists["x_paediatric"] = <?php echo $patient_ot_delivery_register_list->paediatric->Lookup->toClientList() ?>;
fpatient_ot_delivery_registerlist.lists["x_paediatric"].options = <?php echo JsonEncode($patient_ot_delivery_register_list->paediatric->lookupOptions()) ?>;
fpatient_ot_delivery_registerlist.autoSuggests["x_paediatric"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var fpatient_ot_delivery_registerlistsrch = currentSearchForm = new ew.Form("fpatient_ot_delivery_registerlistsrch");

// Validate function for search
fpatient_ot_delivery_registerlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_dte");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register->dte->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fpatient_ot_delivery_registerlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_ot_delivery_registerlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fpatient_ot_delivery_registerlistsrch.filterList = <?php echo $patient_ot_delivery_register_list->getFilterList() ?>;
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
<?php if (!$patient_ot_delivery_register->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_ot_delivery_register_list->TotalRecs > 0 && $patient_ot_delivery_register_list->ExportOptions->visible()) { ?>
<?php $patient_ot_delivery_register_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ImportOptions->visible()) { ?>
<?php $patient_ot_delivery_register_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->SearchOptions->visible()) { ?>
<?php $patient_ot_delivery_register_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->FilterOptions->visible()) { ?>
<?php $patient_ot_delivery_register_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_ot_delivery_register->isExport() || EXPORT_MASTER_RECORD && $patient_ot_delivery_register->isExport("print")) { ?>
<?php
if ($patient_ot_delivery_register_list->DbMasterFilter <> "" && $patient_ot_delivery_register->getCurrentMasterTable() == "ip_admission") {
	if ($patient_ot_delivery_register_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_ot_delivery_register_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_ot_delivery_register->isExport() && !$patient_ot_delivery_register->CurrentAction) { ?>
<form name="fpatient_ot_delivery_registerlistsrch" id="fpatient_ot_delivery_registerlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_ot_delivery_register_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_ot_delivery_registerlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_ot_delivery_register">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$patient_ot_delivery_register_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$patient_ot_delivery_register->RowType = ROWTYPE_SEARCH;

// Render row
$patient_ot_delivery_register->resetAttributes();
$patient_ot_delivery_register_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($patient_ot_delivery_register->mrnno->Visible) { // mrnno ?>
	<div id="xsc_mrnno" class="ew-cell form-group">
		<label for="x_mrnno" class="ew-search-caption ew-label"><?php echo $patient_ot_delivery_register->mrnno->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->mrnno->EditValue ?>"<?php echo $patient_ot_delivery_register->mrnno->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($patient_ot_delivery_register->dte->Visible) { // dte ?>
	<div id="xsc_dte" class="ew-cell form-group">
		<label for="x_dte" class="ew-search-caption ew-label"><?php echo $patient_ot_delivery_register->dte->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("BETWEEN") ?><input type="hidden" name="z_dte" id="z_dte" value="BETWEEN"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_dte" name="x_dte" id="x_dte" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->dte->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->dte->EditValue ?>"<?php echo $patient_ot_delivery_register->dte->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->dte->ReadOnly && !$patient_ot_delivery_register->dte->Disabled && !isset($patient_ot_delivery_register->dte->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->dte->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registerlistsrch", "x_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_dte"><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_dte">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_dte" name="y_dte" id="y_dte" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register->dte->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register->dte->EditValue2 ?>"<?php echo $patient_ot_delivery_register->dte->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register->dte->ReadOnly && !$patient_ot_delivery_register->dte->Disabled && !isset($patient_ot_delivery_register->dte->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register->dte->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_ot_delivery_registerlistsrch", "y_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_ot_delivery_register_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_ot_delivery_register_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_ot_delivery_register_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_ot_delivery_register_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_ot_delivery_register_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_ot_delivery_register_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_ot_delivery_register_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_ot_delivery_register_list->showPageHeader(); ?>
<?php
$patient_ot_delivery_register_list->showMessage();
?>
<?php if ($patient_ot_delivery_register_list->TotalRecs > 0 || $patient_ot_delivery_register->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_ot_delivery_register_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_ot_delivery_register">
<?php if (!$patient_ot_delivery_register->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_ot_delivery_register->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_ot_delivery_register_list->Pager)) $patient_ot_delivery_register_list->Pager = new NumericPager($patient_ot_delivery_register_list->StartRec, $patient_ot_delivery_register_list->DisplayRecs, $patient_ot_delivery_register_list->TotalRecs, $patient_ot_delivery_register_list->RecRange, $patient_ot_delivery_register_list->AutoHidePager) ?>
<?php if ($patient_ot_delivery_register_list->Pager->RecordCount > 0 && $patient_ot_delivery_register_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_ot_delivery_register_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_ot_delivery_register_list->pageUrl() ?>start=<?php echo $patient_ot_delivery_register_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_ot_delivery_register_list->pageUrl() ?>start=<?php echo $patient_ot_delivery_register_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_ot_delivery_register_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_ot_delivery_register_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_ot_delivery_register_list->pageUrl() ?>start=<?php echo $patient_ot_delivery_register_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_ot_delivery_register_list->pageUrl() ?>start=<?php echo $patient_ot_delivery_register_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_ot_delivery_register_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_ot_delivery_register_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_ot_delivery_register_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->TotalRecs > 0 && (!$patient_ot_delivery_register_list->AutoHidePageSizeSelector || $patient_ot_delivery_register_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_ot_delivery_register">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_ot_delivery_register_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_ot_delivery_register_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_ot_delivery_register_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_ot_delivery_register_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_ot_delivery_register_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_ot_delivery_register_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_ot_delivery_register->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_ot_delivery_register_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_ot_delivery_registerlist" id="fpatient_ot_delivery_registerlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_ot_delivery_register_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_ot_delivery_register_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_ot_delivery_register">
<?php if ($patient_ot_delivery_register->getCurrentMasterTable() == "ip_admission" && $patient_ot_delivery_register->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_ot_delivery_register->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_ot_delivery_register->mrnno->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_ot_delivery_register->PId->getSessionValue() ?>">
<?php } ?>
<div id="gmp_patient_ot_delivery_register" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_ot_delivery_register_list->TotalRecs > 0 || $patient_ot_delivery_register->isGridEdit()) { ?>
<table id="tbl_patient_ot_delivery_registerlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_ot_delivery_register_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_ot_delivery_register_list->renderListOptions();

// Render list options (header, left)
$patient_ot_delivery_register_list->ListOptions->render("header", "left");
?>
<?php if ($patient_ot_delivery_register->id->Visible) { // id ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_ot_delivery_register->id->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_id" class="patient_ot_delivery_register_id"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_ot_delivery_register->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->id) ?>',1);"><div id="elh_patient_ot_delivery_register_id" class="patient_ot_delivery_register_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatID->Visible) { // PatID ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_ot_delivery_register->PatID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatID" class="patient_ot_delivery_register_PatID"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_ot_delivery_register->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->PatID) ?>',1);"><div id="elh_patient_ot_delivery_register_PatID" class="patient_ot_delivery_register_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PatID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_ot_delivery_register->PatientName->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_register_PatientName"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_ot_delivery_register->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->PatientName) ?>',1);"><div id="elh_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_register_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_ot_delivery_register->mrnno->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_register_mrnno"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_ot_delivery_register->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->mrnno) ?>',1);"><div id="elh_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_register_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_ot_delivery_register->MobileNumber->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_register_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_ot_delivery_register->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->MobileNumber) ?>',1);"><div id="elh_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_register_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Age->Visible) { // Age ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_ot_delivery_register->Age->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Age" class="patient_ot_delivery_register_Age"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_ot_delivery_register->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->Age) ?>',1);"><div id="elh_patient_ot_delivery_register_Age" class="patient_ot_delivery_register_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Gender->Visible) { // Gender ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_ot_delivery_register->Gender->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Gender" class="patient_ot_delivery_register_Gender"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_ot_delivery_register->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->Gender) ?>',1);"><div id="elh_patient_ot_delivery_register_Gender" class="patient_ot_delivery_register_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ObstetricsHistryFeMale) == "") { ?>
		<th data-name="ObstetricsHistryFeMale" class="<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_register_ObstetricsHistryFeMale"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ObstetricsHistryFeMale" class="<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ObstetricsHistryFeMale) ?>',1);"><div id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_register_ObstetricsHistryFeMale">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ObstetricsHistryFeMale->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ObstetricsHistryFeMale->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Abortion->Visible) { // Abortion ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->Abortion) == "") { ?>
		<th data-name="Abortion" class="<?php echo $patient_ot_delivery_register->Abortion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_register_Abortion"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Abortion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abortion" class="<?php echo $patient_ot_delivery_register->Abortion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->Abortion) ?>',1);"><div id="elh_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_register_Abortion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Abortion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->Abortion->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->Abortion->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthDate->Visible) { // ChildBirthDate ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildBirthDate) == "") { ?>
		<th data-name="ChildBirthDate" class="<?php echo $patient_ot_delivery_register->ChildBirthDate->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_register_ChildBirthDate"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBirthDate" class="<?php echo $patient_ot_delivery_register->ChildBirthDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildBirthDate) ?>',1);"><div id="elh_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_register_ChildBirthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildBirthDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildBirthDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthTime->Visible) { // ChildBirthTime ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildBirthTime) == "") { ?>
		<th data-name="ChildBirthTime" class="<?php echo $patient_ot_delivery_register->ChildBirthTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_register_ChildBirthTime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBirthTime" class="<?php echo $patient_ot_delivery_register->ChildBirthTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildBirthTime) ?>',1);"><div id="elh_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_register_ChildBirthTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildBirthTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildBirthTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildSex->Visible) { // ChildSex ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildSex) == "") { ?>
		<th data-name="ChildSex" class="<?php echo $patient_ot_delivery_register->ChildSex->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_register_ChildSex"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildSex->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildSex" class="<?php echo $patient_ot_delivery_register->ChildSex->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildSex) ?>',1);"><div id="elh_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_register_ChildSex">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildSex->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildSex->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildSex->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildWt->Visible) { // ChildWt ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildWt) == "") { ?>
		<th data-name="ChildWt" class="<?php echo $patient_ot_delivery_register->ChildWt->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_register_ChildWt"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildWt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildWt" class="<?php echo $patient_ot_delivery_register->ChildWt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildWt) ?>',1);"><div id="elh_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_register_ChildWt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildWt->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildWt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildWt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildDay->Visible) { // ChildDay ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildDay) == "") { ?>
		<th data-name="ChildDay" class="<?php echo $patient_ot_delivery_register->ChildDay->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_register_ChildDay"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildDay->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildDay" class="<?php echo $patient_ot_delivery_register->ChildDay->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildDay) ?>',1);"><div id="elh_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_register_ChildDay">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildDay->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildDay->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildDay->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildOE->Visible) { // ChildOE ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildOE) == "") { ?>
		<th data-name="ChildOE" class="<?php echo $patient_ot_delivery_register->ChildOE->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_register_ChildOE"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildOE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildOE" class="<?php echo $patient_ot_delivery_register->ChildOE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildOE) ?>',1);"><div id="elh_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_register_ChildOE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildOE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildOE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildOE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBlGrp->Visible) { // ChildBlGrp ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildBlGrp) == "") { ?>
		<th data-name="ChildBlGrp" class="<?php echo $patient_ot_delivery_register->ChildBlGrp->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_register_ChildBlGrp"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBlGrp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBlGrp" class="<?php echo $patient_ot_delivery_register->ChildBlGrp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildBlGrp) ?>',1);"><div id="elh_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_register_ChildBlGrp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBlGrp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildBlGrp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildBlGrp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ApgarScore->Visible) { // ApgarScore ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ApgarScore) == "") { ?>
		<th data-name="ApgarScore" class="<?php echo $patient_ot_delivery_register->ApgarScore->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_register_ApgarScore"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ApgarScore->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApgarScore" class="<?php echo $patient_ot_delivery_register->ApgarScore->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ApgarScore) ?>',1);"><div id="elh_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_register_ApgarScore">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ApgarScore->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ApgarScore->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ApgarScore->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->birthnotification->Visible) { // birthnotification ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->birthnotification) == "") { ?>
		<th data-name="birthnotification" class="<?php echo $patient_ot_delivery_register->birthnotification->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_register_birthnotification"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->birthnotification->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="birthnotification" class="<?php echo $patient_ot_delivery_register->birthnotification->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->birthnotification) ?>',1);"><div id="elh_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_register_birthnotification">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->birthnotification->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->birthnotification->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->birthnotification->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->formno->Visible) { // formno ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->formno) == "") { ?>
		<th data-name="formno" class="<?php echo $patient_ot_delivery_register->formno->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_formno" class="patient_ot_delivery_register_formno"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->formno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="formno" class="<?php echo $patient_ot_delivery_register->formno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->formno) ?>',1);"><div id="elh_patient_ot_delivery_register_formno" class="patient_ot_delivery_register_formno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->formno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->formno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->formno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->dte->Visible) { // dte ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->dte) == "") { ?>
		<th data-name="dte" class="<?php echo $patient_ot_delivery_register->dte->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_dte" class="patient_ot_delivery_register_dte"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->dte->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dte" class="<?php echo $patient_ot_delivery_register->dte->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->dte) ?>',1);"><div id="elh_patient_ot_delivery_register_dte" class="patient_ot_delivery_register_dte">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->dte->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->dte->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->dte->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->motherReligion->Visible) { // motherReligion ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->motherReligion) == "") { ?>
		<th data-name="motherReligion" class="<?php echo $patient_ot_delivery_register->motherReligion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_register_motherReligion"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->motherReligion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="motherReligion" class="<?php echo $patient_ot_delivery_register->motherReligion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->motherReligion) ?>',1);"><div id="elh_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_register_motherReligion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->motherReligion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->motherReligion->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->motherReligion->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodgroup->Visible) { // bloodgroup ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->bloodgroup) == "") { ?>
		<th data-name="bloodgroup" class="<?php echo $patient_ot_delivery_register->bloodgroup->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_register_bloodgroup"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->bloodgroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bloodgroup" class="<?php echo $patient_ot_delivery_register->bloodgroup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->bloodgroup) ?>',1);"><div id="elh_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_register_bloodgroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->bloodgroup->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->bloodgroup->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->bloodgroup->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->status->Visible) { // status ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_ot_delivery_register->status->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_status" class="patient_ot_delivery_register_status"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_ot_delivery_register->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->status) ?>',1);"><div id="elh_patient_ot_delivery_register_status" class="patient_ot_delivery_register_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->createdby->Visible) { // createdby ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_ot_delivery_register->createdby->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_createdby" class="patient_ot_delivery_register_createdby"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_ot_delivery_register->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->createdby) ?>',1);"><div id="elh_patient_ot_delivery_register_createdby" class="patient_ot_delivery_register_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_ot_delivery_register->createddatetime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_register_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_ot_delivery_register->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->createddatetime) ?>',1);"><div id="elh_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_register_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_ot_delivery_register->modifiedby->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_register_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_ot_delivery_register->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->modifiedby) ?>',1);"><div id="elh_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_register_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_ot_delivery_register->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_register_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_ot_delivery_register->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->modifieddatetime) ?>',1);"><div id="elh_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_register_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatientID->Visible) { // PatientID ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $patient_ot_delivery_register->PatientID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_register_PatientID"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $patient_ot_delivery_register->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->PatientID) ?>',1);"><div id="elh_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_register_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->HospID->Visible) { // HospID ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_ot_delivery_register->HospID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_HospID" class="patient_ot_delivery_register_HospID"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_ot_delivery_register->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->HospID) ?>',1);"><div id="elh_patient_ot_delivery_register_HospID" class="patient_ot_delivery_register_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildBirthDate1) == "") { ?>
		<th data-name="ChildBirthDate1" class="<?php echo $patient_ot_delivery_register->ChildBirthDate1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_register_ChildBirthDate1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthDate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBirthDate1" class="<?php echo $patient_ot_delivery_register->ChildBirthDate1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildBirthDate1) ?>',1);"><div id="elh_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_register_ChildBirthDate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthDate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildBirthDate1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildBirthDate1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildBirthTime1) == "") { ?>
		<th data-name="ChildBirthTime1" class="<?php echo $patient_ot_delivery_register->ChildBirthTime1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_register_ChildBirthTime1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthTime1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBirthTime1" class="<?php echo $patient_ot_delivery_register->ChildBirthTime1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildBirthTime1) ?>',1);"><div id="elh_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_register_ChildBirthTime1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBirthTime1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildBirthTime1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildBirthTime1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildSex1->Visible) { // ChildSex1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildSex1) == "") { ?>
		<th data-name="ChildSex1" class="<?php echo $patient_ot_delivery_register->ChildSex1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_register_ChildSex1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildSex1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildSex1" class="<?php echo $patient_ot_delivery_register->ChildSex1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildSex1) ?>',1);"><div id="elh_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_register_ChildSex1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildSex1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildSex1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildSex1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildWt1->Visible) { // ChildWt1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildWt1) == "") { ?>
		<th data-name="ChildWt1" class="<?php echo $patient_ot_delivery_register->ChildWt1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_register_ChildWt1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildWt1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildWt1" class="<?php echo $patient_ot_delivery_register->ChildWt1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildWt1) ?>',1);"><div id="elh_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_register_ChildWt1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildWt1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildWt1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildWt1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildDay1->Visible) { // ChildDay1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildDay1) == "") { ?>
		<th data-name="ChildDay1" class="<?php echo $patient_ot_delivery_register->ChildDay1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_register_ChildDay1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildDay1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildDay1" class="<?php echo $patient_ot_delivery_register->ChildDay1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildDay1) ?>',1);"><div id="elh_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_register_ChildDay1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildDay1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildDay1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildDay1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildOE1->Visible) { // ChildOE1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildOE1) == "") { ?>
		<th data-name="ChildOE1" class="<?php echo $patient_ot_delivery_register->ChildOE1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_register_ChildOE1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildOE1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildOE1" class="<?php echo $patient_ot_delivery_register->ChildOE1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildOE1) ?>',1);"><div id="elh_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_register_ChildOE1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildOE1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildOE1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildOE1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ChildBlGrp1) == "") { ?>
		<th data-name="ChildBlGrp1" class="<?php echo $patient_ot_delivery_register->ChildBlGrp1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_register_ChildBlGrp1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBlGrp1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBlGrp1" class="<?php echo $patient_ot_delivery_register->ChildBlGrp1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ChildBlGrp1) ?>',1);"><div id="elh_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_register_ChildBlGrp1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ChildBlGrp1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ChildBlGrp1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ChildBlGrp1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ApgarScore1->Visible) { // ApgarScore1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ApgarScore1) == "") { ?>
		<th data-name="ApgarScore1" class="<?php echo $patient_ot_delivery_register->ApgarScore1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_register_ApgarScore1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ApgarScore1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApgarScore1" class="<?php echo $patient_ot_delivery_register->ApgarScore1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ApgarScore1) ?>',1);"><div id="elh_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_register_ApgarScore1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ApgarScore1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ApgarScore1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ApgarScore1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->birthnotification1->Visible) { // birthnotification1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->birthnotification1) == "") { ?>
		<th data-name="birthnotification1" class="<?php echo $patient_ot_delivery_register->birthnotification1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_register_birthnotification1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->birthnotification1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="birthnotification1" class="<?php echo $patient_ot_delivery_register->birthnotification1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->birthnotification1) ?>',1);"><div id="elh_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_register_birthnotification1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->birthnotification1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->birthnotification1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->birthnotification1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->formno1->Visible) { // formno1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->formno1) == "") { ?>
		<th data-name="formno1" class="<?php echo $patient_ot_delivery_register->formno1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_formno1" class="patient_ot_delivery_register_formno1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->formno1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="formno1" class="<?php echo $patient_ot_delivery_register->formno1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->formno1) ?>',1);"><div id="elh_patient_ot_delivery_register_formno1" class="patient_ot_delivery_register_formno1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->formno1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->formno1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->formno1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->RecievedTime->Visible) { // RecievedTime ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->RecievedTime) == "") { ?>
		<th data-name="RecievedTime" class="<?php echo $patient_ot_delivery_register->RecievedTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_register_RecievedTime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->RecievedTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecievedTime" class="<?php echo $patient_ot_delivery_register->RecievedTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->RecievedTime) ?>',1);"><div id="elh_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_register_RecievedTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->RecievedTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->RecievedTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->RecievedTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->AnaesthesiaStarted) == "") { ?>
		<th data-name="AnaesthesiaStarted" class="<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_register_AnaesthesiaStarted"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AnaesthesiaStarted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnaesthesiaStarted" class="<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->AnaesthesiaStarted) ?>',1);"><div id="elh_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_register_AnaesthesiaStarted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AnaesthesiaStarted->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->AnaesthesiaStarted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->AnaesthesiaStarted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->AnaesthesiaEnded) == "") { ?>
		<th data-name="AnaesthesiaEnded" class="<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_register_AnaesthesiaEnded"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AnaesthesiaEnded->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnaesthesiaEnded" class="<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->AnaesthesiaEnded) ?>',1);"><div id="elh_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_register_AnaesthesiaEnded">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AnaesthesiaEnded->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->AnaesthesiaEnded->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->AnaesthesiaEnded->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->surgeryStarted->Visible) { // surgeryStarted ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->surgeryStarted) == "") { ?>
		<th data-name="surgeryStarted" class="<?php echo $patient_ot_delivery_register->surgeryStarted->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_register_surgeryStarted"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->surgeryStarted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="surgeryStarted" class="<?php echo $patient_ot_delivery_register->surgeryStarted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->surgeryStarted) ?>',1);"><div id="elh_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_register_surgeryStarted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->surgeryStarted->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->surgeryStarted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->surgeryStarted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->surgeryEnded->Visible) { // surgeryEnded ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->surgeryEnded) == "") { ?>
		<th data-name="surgeryEnded" class="<?php echo $patient_ot_delivery_register->surgeryEnded->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_register_surgeryEnded"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->surgeryEnded->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="surgeryEnded" class="<?php echo $patient_ot_delivery_register->surgeryEnded->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->surgeryEnded) ?>',1);"><div id="elh_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_register_surgeryEnded">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->surgeryEnded->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->surgeryEnded->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->surgeryEnded->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->RecoveryTime->Visible) { // RecoveryTime ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->RecoveryTime) == "") { ?>
		<th data-name="RecoveryTime" class="<?php echo $patient_ot_delivery_register->RecoveryTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_register_RecoveryTime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->RecoveryTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecoveryTime" class="<?php echo $patient_ot_delivery_register->RecoveryTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->RecoveryTime) ?>',1);"><div id="elh_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_register_RecoveryTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->RecoveryTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->RecoveryTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->RecoveryTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ShiftedTime->Visible) { // ShiftedTime ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ShiftedTime) == "") { ?>
		<th data-name="ShiftedTime" class="<?php echo $patient_ot_delivery_register->ShiftedTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_register_ShiftedTime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ShiftedTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ShiftedTime" class="<?php echo $patient_ot_delivery_register->ShiftedTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ShiftedTime) ?>',1);"><div id="elh_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_register_ShiftedTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ShiftedTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ShiftedTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ShiftedTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Duration->Visible) { // Duration ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->Duration) == "") { ?>
		<th data-name="Duration" class="<?php echo $patient_ot_delivery_register->Duration->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Duration" class="patient_ot_delivery_register_Duration"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Duration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Duration" class="<?php echo $patient_ot_delivery_register->Duration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->Duration) ?>',1);"><div id="elh_patient_ot_delivery_register_Duration" class="patient_ot_delivery_register_Duration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Duration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->Duration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->Duration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Surgeon->Visible) { // Surgeon ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->Surgeon) == "") { ?>
		<th data-name="Surgeon" class="<?php echo $patient_ot_delivery_register->Surgeon->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_register_Surgeon"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Surgeon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Surgeon" class="<?php echo $patient_ot_delivery_register->Surgeon->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->Surgeon) ?>',1);"><div id="elh_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_register_Surgeon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Surgeon->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->Surgeon->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->Surgeon->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Anaesthetist->Visible) { // Anaesthetist ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->Anaesthetist) == "") { ?>
		<th data-name="Anaesthetist" class="<?php echo $patient_ot_delivery_register->Anaesthetist->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_register_Anaesthetist"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Anaesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anaesthetist" class="<?php echo $patient_ot_delivery_register->Anaesthetist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->Anaesthetist) ?>',1);"><div id="elh_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_register_Anaesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Anaesthetist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->Anaesthetist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->Anaesthetist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->AsstSurgeon1) == "") { ?>
		<th data-name="AsstSurgeon1" class="<?php echo $patient_ot_delivery_register->AsstSurgeon1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_register_AsstSurgeon1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AsstSurgeon1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AsstSurgeon1" class="<?php echo $patient_ot_delivery_register->AsstSurgeon1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->AsstSurgeon1) ?>',1);"><div id="elh_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_register_AsstSurgeon1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AsstSurgeon1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->AsstSurgeon1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->AsstSurgeon1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->AsstSurgeon2) == "") { ?>
		<th data-name="AsstSurgeon2" class="<?php echo $patient_ot_delivery_register->AsstSurgeon2->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_register_AsstSurgeon2"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AsstSurgeon2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AsstSurgeon2" class="<?php echo $patient_ot_delivery_register->AsstSurgeon2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->AsstSurgeon2) ?>',1);"><div id="elh_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_register_AsstSurgeon2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->AsstSurgeon2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->AsstSurgeon2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->AsstSurgeon2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->paediatric->Visible) { // paediatric ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->paediatric) == "") { ?>
		<th data-name="paediatric" class="<?php echo $patient_ot_delivery_register->paediatric->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_register_paediatric"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->paediatric->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="paediatric" class="<?php echo $patient_ot_delivery_register->paediatric->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->paediatric) ?>',1);"><div id="elh_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_register_paediatric">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->paediatric->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->paediatric->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->paediatric->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ScrubNurse1->Visible) { // ScrubNurse1 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ScrubNurse1) == "") { ?>
		<th data-name="ScrubNurse1" class="<?php echo $patient_ot_delivery_register->ScrubNurse1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_register_ScrubNurse1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ScrubNurse1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ScrubNurse1" class="<?php echo $patient_ot_delivery_register->ScrubNurse1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ScrubNurse1) ?>',1);"><div id="elh_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_register_ScrubNurse1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ScrubNurse1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ScrubNurse1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ScrubNurse1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->ScrubNurse2->Visible) { // ScrubNurse2 ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->ScrubNurse2) == "") { ?>
		<th data-name="ScrubNurse2" class="<?php echo $patient_ot_delivery_register->ScrubNurse2->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_register_ScrubNurse2"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ScrubNurse2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ScrubNurse2" class="<?php echo $patient_ot_delivery_register->ScrubNurse2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->ScrubNurse2) ?>',1);"><div id="elh_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_register_ScrubNurse2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->ScrubNurse2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->ScrubNurse2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->ScrubNurse2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->FloorNurse->Visible) { // FloorNurse ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->FloorNurse) == "") { ?>
		<th data-name="FloorNurse" class="<?php echo $patient_ot_delivery_register->FloorNurse->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_register_FloorNurse"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->FloorNurse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FloorNurse" class="<?php echo $patient_ot_delivery_register->FloorNurse->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->FloorNurse) ?>',1);"><div id="elh_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_register_FloorNurse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->FloorNurse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->FloorNurse->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->FloorNurse->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Technician->Visible) { // Technician ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->Technician) == "") { ?>
		<th data-name="Technician" class="<?php echo $patient_ot_delivery_register->Technician->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Technician" class="patient_ot_delivery_register_Technician"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Technician->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Technician" class="<?php echo $patient_ot_delivery_register->Technician->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->Technician) ?>',1);"><div id="elh_patient_ot_delivery_register_Technician" class="patient_ot_delivery_register_Technician">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Technician->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->Technician->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->Technician->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->HouseKeeping->Visible) { // HouseKeeping ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->HouseKeeping) == "") { ?>
		<th data-name="HouseKeeping" class="<?php echo $patient_ot_delivery_register->HouseKeeping->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_register_HouseKeeping"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->HouseKeeping->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HouseKeeping" class="<?php echo $patient_ot_delivery_register->HouseKeeping->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->HouseKeeping) ?>',1);"><div id="elh_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_register_HouseKeeping">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->HouseKeeping->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->HouseKeeping->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->HouseKeeping->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->countsCheckedMops->Visible) { // countsCheckedMops ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->countsCheckedMops) == "") { ?>
		<th data-name="countsCheckedMops" class="<?php echo $patient_ot_delivery_register->countsCheckedMops->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_register_countsCheckedMops"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->countsCheckedMops->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="countsCheckedMops" class="<?php echo $patient_ot_delivery_register->countsCheckedMops->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->countsCheckedMops) ?>',1);"><div id="elh_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_register_countsCheckedMops">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->countsCheckedMops->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->countsCheckedMops->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->countsCheckedMops->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->gauze->Visible) { // gauze ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->gauze) == "") { ?>
		<th data-name="gauze" class="<?php echo $patient_ot_delivery_register->gauze->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_gauze" class="patient_ot_delivery_register_gauze"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->gauze->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gauze" class="<?php echo $patient_ot_delivery_register->gauze->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->gauze) ?>',1);"><div id="elh_patient_ot_delivery_register_gauze" class="patient_ot_delivery_register_gauze">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->gauze->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->gauze->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->gauze->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->needles->Visible) { // needles ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->needles) == "") { ?>
		<th data-name="needles" class="<?php echo $patient_ot_delivery_register->needles->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_needles" class="patient_ot_delivery_register_needles"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->needles->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="needles" class="<?php echo $patient_ot_delivery_register->needles->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->needles) ?>',1);"><div id="elh_patient_ot_delivery_register_needles" class="patient_ot_delivery_register_needles">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->needles->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->needles->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->needles->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodloss->Visible) { // bloodloss ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->bloodloss) == "") { ?>
		<th data-name="bloodloss" class="<?php echo $patient_ot_delivery_register->bloodloss->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_register_bloodloss"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->bloodloss->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bloodloss" class="<?php echo $patient_ot_delivery_register->bloodloss->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->bloodloss) ?>',1);"><div id="elh_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_register_bloodloss">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->bloodloss->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->bloodloss->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->bloodloss->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodtransfusion->Visible) { // bloodtransfusion ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->bloodtransfusion) == "") { ?>
		<th data-name="bloodtransfusion" class="<?php echo $patient_ot_delivery_register->bloodtransfusion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_register_bloodtransfusion"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->bloodtransfusion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bloodtransfusion" class="<?php echo $patient_ot_delivery_register->bloodtransfusion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->bloodtransfusion) ?>',1);"><div id="elh_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_register_bloodtransfusion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->bloodtransfusion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->bloodtransfusion->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->bloodtransfusion->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->Reception->Visible) { // Reception ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_ot_delivery_register->Reception->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Reception" class="patient_ot_delivery_register_Reception"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_ot_delivery_register->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->Reception) ?>',1);"><div id="elh_patient_ot_delivery_register_Reception" class="patient_ot_delivery_register_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register->PId->Visible) { // PId ?>
	<?php if ($patient_ot_delivery_register->sortUrl($patient_ot_delivery_register->PId) == "") { ?>
		<th data-name="PId" class="<?php echo $patient_ot_delivery_register->PId->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PId" class="patient_ot_delivery_register_PId"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PId" class="<?php echo $patient_ot_delivery_register->PId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_ot_delivery_register->SortUrl($patient_ot_delivery_register->PId) ?>',1);"><div id="elh_patient_ot_delivery_register_PId" class="patient_ot_delivery_register_PId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register->PId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register->PId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register->PId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_ot_delivery_register_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_ot_delivery_register->ExportAll && $patient_ot_delivery_register->isExport()) {
	$patient_ot_delivery_register_list->StopRec = $patient_ot_delivery_register_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_ot_delivery_register_list->TotalRecs > $patient_ot_delivery_register_list->StartRec + $patient_ot_delivery_register_list->DisplayRecs - 1)
		$patient_ot_delivery_register_list->StopRec = $patient_ot_delivery_register_list->StartRec + $patient_ot_delivery_register_list->DisplayRecs - 1;
	else
		$patient_ot_delivery_register_list->StopRec = $patient_ot_delivery_register_list->TotalRecs;
}
$patient_ot_delivery_register_list->RecCnt = $patient_ot_delivery_register_list->StartRec - 1;
if ($patient_ot_delivery_register_list->Recordset && !$patient_ot_delivery_register_list->Recordset->EOF) {
	$patient_ot_delivery_register_list->Recordset->moveFirst();
	$selectLimit = $patient_ot_delivery_register_list->UseSelectLimit;
	if (!$selectLimit && $patient_ot_delivery_register_list->StartRec > 1)
		$patient_ot_delivery_register_list->Recordset->move($patient_ot_delivery_register_list->StartRec - 1);
} elseif (!$patient_ot_delivery_register->AllowAddDeleteRow && $patient_ot_delivery_register_list->StopRec == 0) {
	$patient_ot_delivery_register_list->StopRec = $patient_ot_delivery_register->GridAddRowCount;
}

// Initialize aggregate
$patient_ot_delivery_register->RowType = ROWTYPE_AGGREGATEINIT;
$patient_ot_delivery_register->resetAttributes();
$patient_ot_delivery_register_list->renderRow();
while ($patient_ot_delivery_register_list->RecCnt < $patient_ot_delivery_register_list->StopRec) {
	$patient_ot_delivery_register_list->RecCnt++;
	if ($patient_ot_delivery_register_list->RecCnt >= $patient_ot_delivery_register_list->StartRec) {
		$patient_ot_delivery_register_list->RowCnt++;

		// Set up key count
		$patient_ot_delivery_register_list->KeyCount = $patient_ot_delivery_register_list->RowIndex;

		// Init row class and style
		$patient_ot_delivery_register->resetAttributes();
		$patient_ot_delivery_register->CssClass = "";
		if ($patient_ot_delivery_register->isGridAdd()) {
		} else {
			$patient_ot_delivery_register_list->loadRowValues($patient_ot_delivery_register_list->Recordset); // Load row values
		}
		$patient_ot_delivery_register->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_ot_delivery_register->RowAttrs = array_merge($patient_ot_delivery_register->RowAttrs, array('data-rowindex'=>$patient_ot_delivery_register_list->RowCnt, 'id'=>'r' . $patient_ot_delivery_register_list->RowCnt . '_patient_ot_delivery_register', 'data-rowtype'=>$patient_ot_delivery_register->RowType));

		// Render row
		$patient_ot_delivery_register_list->renderRow();

		// Render list options
		$patient_ot_delivery_register_list->renderListOptions();
?>
	<tr<?php echo $patient_ot_delivery_register->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_ot_delivery_register_list->ListOptions->render("body", "left", $patient_ot_delivery_register_list->RowCnt);
?>
	<?php if ($patient_ot_delivery_register->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_ot_delivery_register->id->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_id" class="patient_ot_delivery_register_id">
<span<?php echo $patient_ot_delivery_register->id->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $patient_ot_delivery_register->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_PatID" class="patient_ot_delivery_register_PatID">
<span<?php echo $patient_ot_delivery_register->PatID->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_ot_delivery_register->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_register_PatientName">
<span<?php echo $patient_ot_delivery_register->PatientName->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_ot_delivery_register->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_register_mrnno">
<span<?php echo $patient_ot_delivery_register->mrnno->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $patient_ot_delivery_register->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_register_MobileNumber">
<span<?php echo $patient_ot_delivery_register->MobileNumber->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_ot_delivery_register->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_Age" class="patient_ot_delivery_register_Age">
<span<?php echo $patient_ot_delivery_register->Age->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_ot_delivery_register->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_Gender" class="patient_ot_delivery_register_Gender">
<span<?php echo $patient_ot_delivery_register->Gender->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
		<td data-name="ObstetricsHistryFeMale"<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_register_ObstetricsHistryFeMale">
<span<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Abortion->Visible) { // Abortion ?>
		<td data-name="Abortion"<?php echo $patient_ot_delivery_register->Abortion->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_register_Abortion">
<span<?php echo $patient_ot_delivery_register->Abortion->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Abortion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBirthDate->Visible) { // ChildBirthDate ?>
		<td data-name="ChildBirthDate"<?php echo $patient_ot_delivery_register->ChildBirthDate->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_register_ChildBirthDate">
<span<?php echo $patient_ot_delivery_register->ChildBirthDate->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBirthDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBirthTime->Visible) { // ChildBirthTime ?>
		<td data-name="ChildBirthTime"<?php echo $patient_ot_delivery_register->ChildBirthTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_register_ChildBirthTime">
<span<?php echo $patient_ot_delivery_register->ChildBirthTime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBirthTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildSex->Visible) { // ChildSex ?>
		<td data-name="ChildSex"<?php echo $patient_ot_delivery_register->ChildSex->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_register_ChildSex">
<span<?php echo $patient_ot_delivery_register->ChildSex->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildSex->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildWt->Visible) { // ChildWt ?>
		<td data-name="ChildWt"<?php echo $patient_ot_delivery_register->ChildWt->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_register_ChildWt">
<span<?php echo $patient_ot_delivery_register->ChildWt->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildWt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildDay->Visible) { // ChildDay ?>
		<td data-name="ChildDay"<?php echo $patient_ot_delivery_register->ChildDay->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_register_ChildDay">
<span<?php echo $patient_ot_delivery_register->ChildDay->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildDay->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildOE->Visible) { // ChildOE ?>
		<td data-name="ChildOE"<?php echo $patient_ot_delivery_register->ChildOE->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_register_ChildOE">
<span<?php echo $patient_ot_delivery_register->ChildOE->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildOE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBlGrp->Visible) { // ChildBlGrp ?>
		<td data-name="ChildBlGrp"<?php echo $patient_ot_delivery_register->ChildBlGrp->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_register_ChildBlGrp">
<span<?php echo $patient_ot_delivery_register->ChildBlGrp->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBlGrp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ApgarScore->Visible) { // ApgarScore ?>
		<td data-name="ApgarScore"<?php echo $patient_ot_delivery_register->ApgarScore->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_register_ApgarScore">
<span<?php echo $patient_ot_delivery_register->ApgarScore->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ApgarScore->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->birthnotification->Visible) { // birthnotification ?>
		<td data-name="birthnotification"<?php echo $patient_ot_delivery_register->birthnotification->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_register_birthnotification">
<span<?php echo $patient_ot_delivery_register->birthnotification->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->birthnotification->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->formno->Visible) { // formno ?>
		<td data-name="formno"<?php echo $patient_ot_delivery_register->formno->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_formno" class="patient_ot_delivery_register_formno">
<span<?php echo $patient_ot_delivery_register->formno->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->formno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->dte->Visible) { // dte ?>
		<td data-name="dte"<?php echo $patient_ot_delivery_register->dte->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_dte" class="patient_ot_delivery_register_dte">
<span<?php echo $patient_ot_delivery_register->dte->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->dte->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->motherReligion->Visible) { // motherReligion ?>
		<td data-name="motherReligion"<?php echo $patient_ot_delivery_register->motherReligion->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_register_motherReligion">
<span<?php echo $patient_ot_delivery_register->motherReligion->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->motherReligion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->bloodgroup->Visible) { // bloodgroup ?>
		<td data-name="bloodgroup"<?php echo $patient_ot_delivery_register->bloodgroup->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_register_bloodgroup">
<span<?php echo $patient_ot_delivery_register->bloodgroup->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->bloodgroup->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_ot_delivery_register->status->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_status" class="patient_ot_delivery_register_status">
<span<?php echo $patient_ot_delivery_register->status->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $patient_ot_delivery_register->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_createdby" class="patient_ot_delivery_register_createdby">
<span<?php echo $patient_ot_delivery_register->createdby->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $patient_ot_delivery_register->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_register_createddatetime">
<span<?php echo $patient_ot_delivery_register->createddatetime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $patient_ot_delivery_register->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_register_modifiedby">
<span<?php echo $patient_ot_delivery_register->modifiedby->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $patient_ot_delivery_register->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_register_modifieddatetime">
<span<?php echo $patient_ot_delivery_register->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $patient_ot_delivery_register->PatientID->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_register_PatientID">
<span<?php echo $patient_ot_delivery_register->PatientID->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $patient_ot_delivery_register->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_HospID" class="patient_ot_delivery_register_HospID">
<span<?php echo $patient_ot_delivery_register->HospID->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
		<td data-name="ChildBirthDate1"<?php echo $patient_ot_delivery_register->ChildBirthDate1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_register_ChildBirthDate1">
<span<?php echo $patient_ot_delivery_register->ChildBirthDate1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBirthDate1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
		<td data-name="ChildBirthTime1"<?php echo $patient_ot_delivery_register->ChildBirthTime1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_register_ChildBirthTime1">
<span<?php echo $patient_ot_delivery_register->ChildBirthTime1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBirthTime1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildSex1->Visible) { // ChildSex1 ?>
		<td data-name="ChildSex1"<?php echo $patient_ot_delivery_register->ChildSex1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_register_ChildSex1">
<span<?php echo $patient_ot_delivery_register->ChildSex1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildSex1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildWt1->Visible) { // ChildWt1 ?>
		<td data-name="ChildWt1"<?php echo $patient_ot_delivery_register->ChildWt1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_register_ChildWt1">
<span<?php echo $patient_ot_delivery_register->ChildWt1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildWt1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildDay1->Visible) { // ChildDay1 ?>
		<td data-name="ChildDay1"<?php echo $patient_ot_delivery_register->ChildDay1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_register_ChildDay1">
<span<?php echo $patient_ot_delivery_register->ChildDay1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildDay1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildOE1->Visible) { // ChildOE1 ?>
		<td data-name="ChildOE1"<?php echo $patient_ot_delivery_register->ChildOE1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_register_ChildOE1">
<span<?php echo $patient_ot_delivery_register->ChildOE1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildOE1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
		<td data-name="ChildBlGrp1"<?php echo $patient_ot_delivery_register->ChildBlGrp1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_register_ChildBlGrp1">
<span<?php echo $patient_ot_delivery_register->ChildBlGrp1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBlGrp1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ApgarScore1->Visible) { // ApgarScore1 ?>
		<td data-name="ApgarScore1"<?php echo $patient_ot_delivery_register->ApgarScore1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_register_ApgarScore1">
<span<?php echo $patient_ot_delivery_register->ApgarScore1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ApgarScore1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->birthnotification1->Visible) { // birthnotification1 ?>
		<td data-name="birthnotification1"<?php echo $patient_ot_delivery_register->birthnotification1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_register_birthnotification1">
<span<?php echo $patient_ot_delivery_register->birthnotification1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->birthnotification1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->formno1->Visible) { // formno1 ?>
		<td data-name="formno1"<?php echo $patient_ot_delivery_register->formno1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_formno1" class="patient_ot_delivery_register_formno1">
<span<?php echo $patient_ot_delivery_register->formno1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->formno1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->RecievedTime->Visible) { // RecievedTime ?>
		<td data-name="RecievedTime"<?php echo $patient_ot_delivery_register->RecievedTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_register_RecievedTime">
<span<?php echo $patient_ot_delivery_register->RecievedTime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->RecievedTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
		<td data-name="AnaesthesiaStarted"<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_register_AnaesthesiaStarted">
<span<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
		<td data-name="AnaesthesiaEnded"<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_register_AnaesthesiaEnded">
<span<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->surgeryStarted->Visible) { // surgeryStarted ?>
		<td data-name="surgeryStarted"<?php echo $patient_ot_delivery_register->surgeryStarted->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_register_surgeryStarted">
<span<?php echo $patient_ot_delivery_register->surgeryStarted->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->surgeryStarted->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->surgeryEnded->Visible) { // surgeryEnded ?>
		<td data-name="surgeryEnded"<?php echo $patient_ot_delivery_register->surgeryEnded->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_register_surgeryEnded">
<span<?php echo $patient_ot_delivery_register->surgeryEnded->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->surgeryEnded->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->RecoveryTime->Visible) { // RecoveryTime ?>
		<td data-name="RecoveryTime"<?php echo $patient_ot_delivery_register->RecoveryTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_register_RecoveryTime">
<span<?php echo $patient_ot_delivery_register->RecoveryTime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->RecoveryTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ShiftedTime->Visible) { // ShiftedTime ?>
		<td data-name="ShiftedTime"<?php echo $patient_ot_delivery_register->ShiftedTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_register_ShiftedTime">
<span<?php echo $patient_ot_delivery_register->ShiftedTime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ShiftedTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Duration->Visible) { // Duration ?>
		<td data-name="Duration"<?php echo $patient_ot_delivery_register->Duration->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_Duration" class="patient_ot_delivery_register_Duration">
<span<?php echo $patient_ot_delivery_register->Duration->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Duration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Surgeon->Visible) { // Surgeon ?>
		<td data-name="Surgeon"<?php echo $patient_ot_delivery_register->Surgeon->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_register_Surgeon">
<span<?php echo $patient_ot_delivery_register->Surgeon->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Surgeon->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Anaesthetist->Visible) { // Anaesthetist ?>
		<td data-name="Anaesthetist"<?php echo $patient_ot_delivery_register->Anaesthetist->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_register_Anaesthetist">
<span<?php echo $patient_ot_delivery_register->Anaesthetist->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Anaesthetist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
		<td data-name="AsstSurgeon1"<?php echo $patient_ot_delivery_register->AsstSurgeon1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_register_AsstSurgeon1">
<span<?php echo $patient_ot_delivery_register->AsstSurgeon1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->AsstSurgeon1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
		<td data-name="AsstSurgeon2"<?php echo $patient_ot_delivery_register->AsstSurgeon2->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_register_AsstSurgeon2">
<span<?php echo $patient_ot_delivery_register->AsstSurgeon2->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->AsstSurgeon2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->paediatric->Visible) { // paediatric ?>
		<td data-name="paediatric"<?php echo $patient_ot_delivery_register->paediatric->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_register_paediatric">
<span<?php echo $patient_ot_delivery_register->paediatric->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->paediatric->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ScrubNurse1->Visible) { // ScrubNurse1 ?>
		<td data-name="ScrubNurse1"<?php echo $patient_ot_delivery_register->ScrubNurse1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_register_ScrubNurse1">
<span<?php echo $patient_ot_delivery_register->ScrubNurse1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ScrubNurse1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->ScrubNurse2->Visible) { // ScrubNurse2 ?>
		<td data-name="ScrubNurse2"<?php echo $patient_ot_delivery_register->ScrubNurse2->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_register_ScrubNurse2">
<span<?php echo $patient_ot_delivery_register->ScrubNurse2->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ScrubNurse2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->FloorNurse->Visible) { // FloorNurse ?>
		<td data-name="FloorNurse"<?php echo $patient_ot_delivery_register->FloorNurse->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_register_FloorNurse">
<span<?php echo $patient_ot_delivery_register->FloorNurse->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->FloorNurse->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Technician->Visible) { // Technician ?>
		<td data-name="Technician"<?php echo $patient_ot_delivery_register->Technician->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_Technician" class="patient_ot_delivery_register_Technician">
<span<?php echo $patient_ot_delivery_register->Technician->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Technician->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->HouseKeeping->Visible) { // HouseKeeping ?>
		<td data-name="HouseKeeping"<?php echo $patient_ot_delivery_register->HouseKeeping->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_register_HouseKeeping">
<span<?php echo $patient_ot_delivery_register->HouseKeeping->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->HouseKeeping->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->countsCheckedMops->Visible) { // countsCheckedMops ?>
		<td data-name="countsCheckedMops"<?php echo $patient_ot_delivery_register->countsCheckedMops->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_register_countsCheckedMops">
<span<?php echo $patient_ot_delivery_register->countsCheckedMops->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->countsCheckedMops->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->gauze->Visible) { // gauze ?>
		<td data-name="gauze"<?php echo $patient_ot_delivery_register->gauze->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_gauze" class="patient_ot_delivery_register_gauze">
<span<?php echo $patient_ot_delivery_register->gauze->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->gauze->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->needles->Visible) { // needles ?>
		<td data-name="needles"<?php echo $patient_ot_delivery_register->needles->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_needles" class="patient_ot_delivery_register_needles">
<span<?php echo $patient_ot_delivery_register->needles->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->needles->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->bloodloss->Visible) { // bloodloss ?>
		<td data-name="bloodloss"<?php echo $patient_ot_delivery_register->bloodloss->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_register_bloodloss">
<span<?php echo $patient_ot_delivery_register->bloodloss->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->bloodloss->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->bloodtransfusion->Visible) { // bloodtransfusion ?>
		<td data-name="bloodtransfusion"<?php echo $patient_ot_delivery_register->bloodtransfusion->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_register_bloodtransfusion">
<span<?php echo $patient_ot_delivery_register->bloodtransfusion->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->bloodtransfusion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_ot_delivery_register->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_Reception" class="patient_ot_delivery_register_Reception">
<span<?php echo $patient_ot_delivery_register->Reception->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register->PId->Visible) { // PId ?>
		<td data-name="PId"<?php echo $patient_ot_delivery_register->PId->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCnt ?>_patient_ot_delivery_register_PId" class="patient_ot_delivery_register_PId">
<span<?php echo $patient_ot_delivery_register->PId->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->PId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_ot_delivery_register_list->ListOptions->render("body", "right", $patient_ot_delivery_register_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$patient_ot_delivery_register->isGridAdd())
		$patient_ot_delivery_register_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$patient_ot_delivery_register->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_ot_delivery_register_list->Recordset)
	$patient_ot_delivery_register_list->Recordset->Close();
?>
<?php if (!$patient_ot_delivery_register->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_ot_delivery_register->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_ot_delivery_register_list->Pager)) $patient_ot_delivery_register_list->Pager = new NumericPager($patient_ot_delivery_register_list->StartRec, $patient_ot_delivery_register_list->DisplayRecs, $patient_ot_delivery_register_list->TotalRecs, $patient_ot_delivery_register_list->RecRange, $patient_ot_delivery_register_list->AutoHidePager) ?>
<?php if ($patient_ot_delivery_register_list->Pager->RecordCount > 0 && $patient_ot_delivery_register_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_ot_delivery_register_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_ot_delivery_register_list->pageUrl() ?>start=<?php echo $patient_ot_delivery_register_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_ot_delivery_register_list->pageUrl() ?>start=<?php echo $patient_ot_delivery_register_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_ot_delivery_register_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_ot_delivery_register_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_ot_delivery_register_list->pageUrl() ?>start=<?php echo $patient_ot_delivery_register_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_ot_delivery_register_list->pageUrl() ?>start=<?php echo $patient_ot_delivery_register_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_ot_delivery_register_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_ot_delivery_register_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_ot_delivery_register_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->TotalRecs > 0 && (!$patient_ot_delivery_register_list->AutoHidePageSizeSelector || $patient_ot_delivery_register_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_ot_delivery_register">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_ot_delivery_register_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_ot_delivery_register_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_ot_delivery_register_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_ot_delivery_register_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_ot_delivery_register_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_ot_delivery_register_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_ot_delivery_register->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_ot_delivery_register_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_ot_delivery_register_list->TotalRecs == 0 && !$patient_ot_delivery_register->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_ot_delivery_register_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_ot_delivery_register_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_ot_delivery_register->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$patient_ot_delivery_register->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_ot_delivery_register", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_ot_delivery_register_list->terminate();
?>