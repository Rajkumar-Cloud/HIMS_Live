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
$patient_prescription_list = new patient_prescription_list();

// Run the page
$patient_prescription_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_prescription_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_prescription->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_prescriptionlist = currentForm = new ew.Form("fpatient_prescriptionlist", "list");
fpatient_prescriptionlist.formKeyCountName = '<?php echo $patient_prescription_list->FormKeyCountName ?>';

// Validate form
fpatient_prescriptionlist.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
		if (checkrow) {
			addcnt++;
		<?php if ($patient_prescription_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->id->caption(), $patient_prescription->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Reception->caption(), $patient_prescription->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->PatientId->caption(), $patient_prescription->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->PatientName->caption(), $patient_prescription->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->Medicine->Required) { ?>
			elm = this.getElements("x" + infix + "_Medicine");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Medicine->caption(), $patient_prescription->Medicine->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->M->Required) { ?>
			elm = this.getElements("x" + infix + "_M");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->M->caption(), $patient_prescription->M->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->A->Required) { ?>
			elm = this.getElements("x" + infix + "_A");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->A->caption(), $patient_prescription->A->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->N->Required) { ?>
			elm = this.getElements("x" + infix + "_N");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->N->caption(), $patient_prescription->N->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->NoOfDays->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfDays");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->NoOfDays->caption(), $patient_prescription->NoOfDays->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->PreRoute->Required) { ?>
			elm = this.getElements("x" + infix + "_PreRoute");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->PreRoute->caption(), $patient_prescription->PreRoute->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->TimeOfTaking->Required) { ?>
			elm = this.getElements("x" + infix + "_TimeOfTaking");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->TimeOfTaking->caption(), $patient_prescription->TimeOfTaking->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Type->caption(), $patient_prescription->Type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->mrnno->caption(), $patient_prescription->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Age->caption(), $patient_prescription->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Gender->caption(), $patient_prescription->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->profilePic->caption(), $patient_prescription->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->Status->Required) { ?>
			elm = this.getElements("x" + infix + "_Status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Status->caption(), $patient_prescription->Status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->CreatedBy->caption(), $patient_prescription->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->CreateDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreateDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->CreateDateTime->caption(), $patient_prescription->CreateDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->ModifiedBy->caption(), $patient_prescription->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_list->ModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->ModifiedDateTime->caption(), $patient_prescription->ModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	if (gridinsert && addcnt == 0) { // No row added
		ew.alert(ew.language.phrase("NoAddRecord"));
		return false;
	}
	return true;
}

// Check empty row
fpatient_prescriptionlist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Medicine", false)) return false;
	if (ew.valueChanged(fobj, infix, "M", false)) return false;
	if (ew.valueChanged(fobj, infix, "A", false)) return false;
	if (ew.valueChanged(fobj, infix, "N", false)) return false;
	if (ew.valueChanged(fobj, infix, "NoOfDays", false)) return false;
	if (ew.valueChanged(fobj, infix, "PreRoute", false)) return false;
	if (ew.valueChanged(fobj, infix, "TimeOfTaking", false)) return false;
	if (ew.valueChanged(fobj, infix, "Type", false)) return false;
	if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
	if (ew.valueChanged(fobj, infix, "Age", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
	if (ew.valueChanged(fobj, infix, "profilePic", false)) return false;
	if (ew.valueChanged(fobj, infix, "Status", false)) return false;
	if (ew.valueChanged(fobj, infix, "CreatedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "CreateDateTime", false)) return false;
	if (ew.valueChanged(fobj, infix, "ModifiedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "ModifiedDateTime", false)) return false;
	return true;
}

// Form_CustomValidate event
fpatient_prescriptionlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_prescriptionlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_prescriptionlist.lists["x_Medicine"] = <?php echo $patient_prescription_list->Medicine->Lookup->toClientList() ?>;
fpatient_prescriptionlist.lists["x_Medicine"].options = <?php echo JsonEncode($patient_prescription_list->Medicine->lookupOptions()) ?>;
fpatient_prescriptionlist.autoSuggests["x_Medicine"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptionlist.lists["x_PreRoute"] = <?php echo $patient_prescription_list->PreRoute->Lookup->toClientList() ?>;
fpatient_prescriptionlist.lists["x_PreRoute"].options = <?php echo JsonEncode($patient_prescription_list->PreRoute->lookupOptions()) ?>;
fpatient_prescriptionlist.autoSuggests["x_PreRoute"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptionlist.lists["x_TimeOfTaking"] = <?php echo $patient_prescription_list->TimeOfTaking->Lookup->toClientList() ?>;
fpatient_prescriptionlist.lists["x_TimeOfTaking"].options = <?php echo JsonEncode($patient_prescription_list->TimeOfTaking->lookupOptions()) ?>;
fpatient_prescriptionlist.autoSuggests["x_TimeOfTaking"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptionlist.lists["x_Type"] = <?php echo $patient_prescription_list->Type->Lookup->toClientList() ?>;
fpatient_prescriptionlist.lists["x_Type"].options = <?php echo JsonEncode($patient_prescription_list->Type->options(FALSE, TRUE)) ?>;
fpatient_prescriptionlist.lists["x_Status"] = <?php echo $patient_prescription_list->Status->Lookup->toClientList() ?>;
fpatient_prescriptionlist.lists["x_Status"].options = <?php echo JsonEncode($patient_prescription_list->Status->lookupOptions()) ?>;

// Form object for search
var fpatient_prescriptionlistsrch = currentSearchForm = new ew.Form("fpatient_prescriptionlistsrch");

// Filters
fpatient_prescriptionlistsrch.filterList = <?php echo $patient_prescription_list->getFilterList() ?>;
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
ew.PREVIEW_OVERLAY = true;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_prescription->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_prescription_list->TotalRecs > 0 && $patient_prescription_list->ExportOptions->visible()) { ?>
<?php $patient_prescription_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_prescription_list->ImportOptions->visible()) { ?>
<?php $patient_prescription_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_prescription_list->SearchOptions->visible()) { ?>
<?php $patient_prescription_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_prescription_list->FilterOptions->visible()) { ?>
<?php $patient_prescription_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_prescription->isExport() || EXPORT_MASTER_RECORD && $patient_prescription->isExport("print")) { ?>
<?php
if ($patient_prescription_list->DbMasterFilter <> "" && $patient_prescription->getCurrentMasterTable() == "ip_admission") {
	if ($patient_prescription_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_prescription_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_prescription->isExport() && !$patient_prescription->CurrentAction) { ?>
<form name="fpatient_prescriptionlistsrch" id="fpatient_prescriptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_prescription_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_prescriptionlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_prescription">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_prescription_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_prescription_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_prescription_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_prescription_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_prescription_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_prescription_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_prescription_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_prescription_list->showPageHeader(); ?>
<?php
$patient_prescription_list->showMessage();
?>
<?php if ($patient_prescription_list->TotalRecs > 0 || $patient_prescription->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_prescription_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_prescription">
<?php if (!$patient_prescription->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_prescription->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_prescription_list->Pager)) $patient_prescription_list->Pager = new NumericPager($patient_prescription_list->StartRec, $patient_prescription_list->DisplayRecs, $patient_prescription_list->TotalRecs, $patient_prescription_list->RecRange, $patient_prescription_list->AutoHidePager) ?>
<?php if ($patient_prescription_list->Pager->RecordCount > 0 && $patient_prescription_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_prescription_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_prescription_list->pageUrl() ?>start=<?php echo $patient_prescription_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_prescription_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_prescription_list->pageUrl() ?>start=<?php echo $patient_prescription_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_prescription_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_prescription_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_prescription_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_prescription_list->pageUrl() ?>start=<?php echo $patient_prescription_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_prescription_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_prescription_list->pageUrl() ?>start=<?php echo $patient_prescription_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_prescription_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_prescription_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_prescription_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_prescription_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_prescription_list->TotalRecs > 0 && (!$patient_prescription_list->AutoHidePageSizeSelector || $patient_prescription_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_prescription">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_prescription_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_prescription_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_prescription_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_prescription_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_prescription_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_prescription_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_prescription->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_prescription_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_prescriptionlist" id="fpatient_prescriptionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_prescription_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_prescription_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_prescription">
<?php if ($patient_prescription->getCurrentMasterTable() == "ip_admission" && $patient_prescription->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_prescription->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_prescription->PatientId->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_prescription->mrnno->getSessionValue() ?>">
<?php } ?>
<div id="gmp_patient_prescription" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_prescription_list->TotalRecs > 0 || $patient_prescription->isAdd() || $patient_prescription->isCopy() || $patient_prescription->isGridEdit()) { ?>
<table id="tbl_patient_prescriptionlist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_prescription_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_prescription_list->renderListOptions();

// Render list options (header, left)
$patient_prescription_list->ListOptions->render("header", "left", "", "block", $patient_prescription->TableVar, "patient_prescriptionlist");
?>
<?php if ($patient_prescription->id->Visible) { // id ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_prescription->id->headerCellClass() ?>"><div id="elh_patient_prescription_id" class="patient_prescription_id"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_id" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_prescription->id->headerCellClass() ?>"><script id="tpc_patient_prescription_id" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->id) ?>',1);"><div id="elh_patient_prescription_id" class="patient_prescription_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Reception->Visible) { // Reception ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_prescription->Reception->headerCellClass() ?>"><div id="elh_patient_prescription_Reception" class="patient_prescription_Reception"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_Reception" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->Reception->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_prescription->Reception->headerCellClass() ?>"><script id="tpc_patient_prescription_Reception" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->Reception) ?>',1);"><div id="elh_patient_prescription_Reception" class="patient_prescription_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_prescription->PatientId->headerCellClass() ?>"><div id="elh_patient_prescription_PatientId" class="patient_prescription_PatientId"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_PatientId" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->PatientId->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_prescription->PatientId->headerCellClass() ?>"><script id="tpc_patient_prescription_PatientId" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->PatientId) ?>',1);"><div id="elh_patient_prescription_PatientId" class="patient_prescription_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_prescription->PatientName->headerCellClass() ?>"><div id="elh_patient_prescription_PatientName" class="patient_prescription_PatientName"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_PatientName" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->PatientName->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_prescription->PatientName->headerCellClass() ?>"><script id="tpc_patient_prescription_PatientName" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->PatientName) ?>',1);"><div id="elh_patient_prescription_PatientName" class="patient_prescription_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Medicine->Visible) { // Medicine ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->Medicine) == "") { ?>
		<th data-name="Medicine" class="<?php echo $patient_prescription->Medicine->headerCellClass() ?>" style="width: 20px;"><div id="elh_patient_prescription_Medicine" class="patient_prescription_Medicine"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_Medicine" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->Medicine->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Medicine" class="<?php echo $patient_prescription->Medicine->headerCellClass() ?>" style="width: 20px;"><script id="tpc_patient_prescription_Medicine" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->Medicine) ?>',1);"><div id="elh_patient_prescription_Medicine" class="patient_prescription_Medicine">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->Medicine->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->Medicine->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->Medicine->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->M->Visible) { // M ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->M) == "") { ?>
		<th data-name="M" class="<?php echo $patient_prescription->M->headerCellClass() ?>"><div id="elh_patient_prescription_M" class="patient_prescription_M"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_M" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->M->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="M" class="<?php echo $patient_prescription->M->headerCellClass() ?>"><script id="tpc_patient_prescription_M" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->M) ?>',1);"><div id="elh_patient_prescription_M" class="patient_prescription_M">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->M->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->M->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->M->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->A->Visible) { // A ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->A) == "") { ?>
		<th data-name="A" class="<?php echo $patient_prescription->A->headerCellClass() ?>"><div id="elh_patient_prescription_A" class="patient_prescription_A"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_A" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->A->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="A" class="<?php echo $patient_prescription->A->headerCellClass() ?>"><script id="tpc_patient_prescription_A" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->A) ?>',1);"><div id="elh_patient_prescription_A" class="patient_prescription_A">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->A->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->A->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->A->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->N->Visible) { // N ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->N) == "") { ?>
		<th data-name="N" class="<?php echo $patient_prescription->N->headerCellClass() ?>"><div id="elh_patient_prescription_N" class="patient_prescription_N"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_N" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->N->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="N" class="<?php echo $patient_prescription->N->headerCellClass() ?>"><script id="tpc_patient_prescription_N" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->N) ?>',1);"><div id="elh_patient_prescription_N" class="patient_prescription_N">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->N->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->N->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->N->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->NoOfDays->Visible) { // NoOfDays ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->NoOfDays) == "") { ?>
		<th data-name="NoOfDays" class="<?php echo $patient_prescription->NoOfDays->headerCellClass() ?>"><div id="elh_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_NoOfDays" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->NoOfDays->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfDays" class="<?php echo $patient_prescription->NoOfDays->headerCellClass() ?>"><script id="tpc_patient_prescription_NoOfDays" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->NoOfDays) ?>',1);"><div id="elh_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->NoOfDays->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->NoOfDays->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->NoOfDays->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->PreRoute->Visible) { // PreRoute ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->PreRoute) == "") { ?>
		<th data-name="PreRoute" class="<?php echo $patient_prescription->PreRoute->headerCellClass() ?>"><div id="elh_patient_prescription_PreRoute" class="patient_prescription_PreRoute"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_PreRoute" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->PreRoute->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PreRoute" class="<?php echo $patient_prescription->PreRoute->headerCellClass() ?>"><script id="tpc_patient_prescription_PreRoute" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->PreRoute) ?>',1);"><div id="elh_patient_prescription_PreRoute" class="patient_prescription_PreRoute">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->PreRoute->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->PreRoute->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->PreRoute->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->TimeOfTaking) == "") { ?>
		<th data-name="TimeOfTaking" class="<?php echo $patient_prescription->TimeOfTaking->headerCellClass() ?>"><div id="elh_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_TimeOfTaking" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->TimeOfTaking->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="TimeOfTaking" class="<?php echo $patient_prescription->TimeOfTaking->headerCellClass() ?>"><script id="tpc_patient_prescription_TimeOfTaking" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->TimeOfTaking) ?>',1);"><div id="elh_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->TimeOfTaking->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->TimeOfTaking->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->TimeOfTaking->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Type->Visible) { // Type ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $patient_prescription->Type->headerCellClass() ?>" style="width: 12px;"><div id="elh_patient_prescription_Type" class="patient_prescription_Type"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_Type" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->Type->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $patient_prescription->Type->headerCellClass() ?>" style="width: 12px;"><script id="tpc_patient_prescription_Type" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->Type) ?>',1);"><div id="elh_patient_prescription_Type" class="patient_prescription_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->Type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->Type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_prescription->mrnno->headerCellClass() ?>"><div id="elh_patient_prescription_mrnno" class="patient_prescription_mrnno"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_mrnno" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->mrnno->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_prescription->mrnno->headerCellClass() ?>"><script id="tpc_patient_prescription_mrnno" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->mrnno) ?>',1);"><div id="elh_patient_prescription_mrnno" class="patient_prescription_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Age->Visible) { // Age ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_prescription->Age->headerCellClass() ?>"><div id="elh_patient_prescription_Age" class="patient_prescription_Age"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_Age" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->Age->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_prescription->Age->headerCellClass() ?>"><script id="tpc_patient_prescription_Age" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->Age) ?>',1);"><div id="elh_patient_prescription_Age" class="patient_prescription_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Gender->Visible) { // Gender ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_prescription->Gender->headerCellClass() ?>"><div id="elh_patient_prescription_Gender" class="patient_prescription_Gender"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_Gender" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->Gender->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_prescription->Gender->headerCellClass() ?>"><script id="tpc_patient_prescription_Gender" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->Gender) ?>',1);"><div id="elh_patient_prescription_Gender" class="patient_prescription_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->profilePic->Visible) { // profilePic ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $patient_prescription->profilePic->headerCellClass() ?>"><div id="elh_patient_prescription_profilePic" class="patient_prescription_profilePic"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_profilePic" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->profilePic->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $patient_prescription->profilePic->headerCellClass() ?>"><script id="tpc_patient_prescription_profilePic" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->profilePic) ?>',1);"><div id="elh_patient_prescription_profilePic" class="patient_prescription_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->profilePic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->profilePic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->profilePic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Status->Visible) { // Status ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $patient_prescription->Status->headerCellClass() ?>"><div id="elh_patient_prescription_Status" class="patient_prescription_Status"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_Status" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->Status->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $patient_prescription->Status->headerCellClass() ?>"><script id="tpc_patient_prescription_Status" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->Status) ?>',1);"><div id="elh_patient_prescription_Status" class="patient_prescription_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->Status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->Status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $patient_prescription->CreatedBy->headerCellClass() ?>"><div id="elh_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_CreatedBy" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->CreatedBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $patient_prescription->CreatedBy->headerCellClass() ?>"><script id="tpc_patient_prescription_CreatedBy" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->CreatedBy) ?>',1);"><div id="elh_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->CreatedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->CreatedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->CreatedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->CreateDateTime) == "") { ?>
		<th data-name="CreateDateTime" class="<?php echo $patient_prescription->CreateDateTime->headerCellClass() ?>"><div id="elh_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_CreateDateTime" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->CreateDateTime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CreateDateTime" class="<?php echo $patient_prescription->CreateDateTime->headerCellClass() ?>"><script id="tpc_patient_prescription_CreateDateTime" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->CreateDateTime) ?>',1);"><div id="elh_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->CreateDateTime->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->CreateDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->CreateDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $patient_prescription->ModifiedBy->headerCellClass() ?>"><div id="elh_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_ModifiedBy" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->ModifiedBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $patient_prescription->ModifiedBy->headerCellClass() ?>"><script id="tpc_patient_prescription_ModifiedBy" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->ModifiedBy) ?>',1);"><div id="elh_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->ModifiedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->ModifiedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->ModifiedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->ModifiedDateTime) == "") { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $patient_prescription->ModifiedDateTime->headerCellClass() ?>"><div id="elh_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_ModifiedDateTime" class="patient_prescriptionlist" type="text/html"><span><?php echo $patient_prescription->ModifiedDateTime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $patient_prescription->ModifiedDateTime->headerCellClass() ?>"><script id="tpc_patient_prescription_ModifiedDateTime" class="patient_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_prescription->SortUrl($patient_prescription->ModifiedDateTime) ?>',1);"><div id="elh_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->ModifiedDateTime->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->ModifiedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->ModifiedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_prescription_list->ListOptions->render("header", "right", "", "block", $patient_prescription->TableVar, "patient_prescriptionlist");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($patient_prescription->isAdd() || $patient_prescription->isCopy()) {
		$patient_prescription_list->RowIndex = 0;
		$patient_prescription_list->KeyCount = $patient_prescription_list->RowIndex;
		if ($patient_prescription->isCopy() && !$patient_prescription_list->loadRow())
			$patient_prescription->CurrentAction = "add";
		if ($patient_prescription->isAdd())
			$patient_prescription_list->loadRowValues();
		if ($patient_prescription->EventCancelled) // Insert failed
			$patient_prescription_list->restoreFormValues(); // Restore form values

		// Set row properties
		$patient_prescription->resetAttributes();
		$patient_prescription->RowAttrs = array_merge($patient_prescription->RowAttrs, array('data-rowindex'=>0, 'id'=>'r0_patient_prescription', 'data-rowtype'=>ROWTYPE_ADD));
		$patient_prescription->RowType = ROWTYPE_ADD;

		// Render row
		$patient_prescription_list->renderRow();

		// Render list options
		$patient_prescription_list->renderListOptions();
		$patient_prescription_list->StartRowCnt = 0;
?>
	<tr<?php echo $patient_prescription->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_prescription_list->ListOptions->render("body", "left", $patient_prescription_list->RowCnt, "block", $patient_prescription->TableVar, "patient_prescriptionlist");
?>
	<?php if ($patient_prescription->id->Visible) { // id ?>
		<td data-name="id">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_id" class="patient_prescriptionlist" type="text/html"><span></span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="o<?php echo $patient_prescription_list->RowIndex ?>_id" id="o<?php echo $patient_prescription_list->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if ($patient_prescription->Reception->getSessionValue() <> "") { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Reception" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<span<?php echo $patient_prescription->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->Reception->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" name="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Reception" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<input type="text" data-table="patient_prescription" data-field="x_Reception" name="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" id="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_prescription->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Reception->EditValue ?>"<?php echo $patient_prescription->Reception->editAttributes() ?>>
</span>
</script>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="o<?php echo $patient_prescription_list->RowIndex ?>_Reception" id="o<?php echo $patient_prescription_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if ($patient_prescription->PatientId->getSessionValue() <> "") { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientId" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<span<?php echo $patient_prescription->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->PatientId->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" name="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientId" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<input type="text" data-table="patient_prescription" data-field="x_PatientId" name="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" id="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_prescription->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->PatientId->EditValue ?>"<?php echo $patient_prescription->PatientId->editAttributes() ?>>
</span>
</script>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="o<?php echo $patient_prescription_list->RowIndex ?>_PatientId" id="o<?php echo $patient_prescription_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientName" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientName" class="form-group patient_prescription_PatientName">
<input type="text" data-table="patient_prescription" data-field="x_PatientName" name="x<?php echo $patient_prescription_list->RowIndex ?>_PatientName" id="x<?php echo $patient_prescription_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->PatientName->EditValue ?>"<?php echo $patient_prescription->PatientName->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="o<?php echo $patient_prescription_list->RowIndex ?>_PatientName" id="o<?php echo $patient_prescription_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->Medicine->Visible) { // Medicine ?>
		<td data-name="Medicine">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Medicine" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Medicine" class="form-group patient_prescription_Medicine">
<?php
$wrkonchange = "" . trim(@$patient_prescription->Medicine->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_list->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" value="<?php echo RemoveHtml($patient_prescription->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->Medicine->getPlaceHolder()) ?>"<?php echo $patient_prescription->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_prescription->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_prescription->Medicine->ReadOnly || $patient_prescription->Medicine->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_prescription->Medicine->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" id="x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_prescription->Medicine->Lookup->getParamTag("p_x" . $patient_prescription_list->RowIndex . "_Medicine") ?>
</span>
</script>
<script type="text/html" class="patient_prescriptionlist_js">
fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_Medicine","forceSelect":false});
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="o<?php echo $patient_prescription_list->RowIndex ?>_Medicine" id="o<?php echo $patient_prescription_list->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->M->Visible) { // M ?>
		<td data-name="M">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_M" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_M" class="form-group patient_prescription_M">
<input type="text" data-table="patient_prescription" data-field="x_M" name="x<?php echo $patient_prescription_list->RowIndex ?>_M" id="x<?php echo $patient_prescription_list->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->M->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->M->EditValue ?>"<?php echo $patient_prescription->M->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="o<?php echo $patient_prescription_list->RowIndex ?>_M" id="o<?php echo $patient_prescription_list->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription->M->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->A->Visible) { // A ?>
		<td data-name="A">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_A" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_A" class="form-group patient_prescription_A">
<input type="text" data-table="patient_prescription" data-field="x_A" name="x<?php echo $patient_prescription_list->RowIndex ?>_A" id="x<?php echo $patient_prescription_list->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->A->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->A->EditValue ?>"<?php echo $patient_prescription->A->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="o<?php echo $patient_prescription_list->RowIndex ?>_A" id="o<?php echo $patient_prescription_list->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription->A->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->N->Visible) { // N ?>
		<td data-name="N">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_N" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_N" class="form-group patient_prescription_N">
<input type="text" data-table="patient_prescription" data-field="x_N" name="x<?php echo $patient_prescription_list->RowIndex ?>_N" id="x<?php echo $patient_prescription_list->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->N->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->N->EditValue ?>"<?php echo $patient_prescription->N->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="o<?php echo $patient_prescription_list->RowIndex ?>_N" id="o<?php echo $patient_prescription_list->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription->N->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->NoOfDays->Visible) { // NoOfDays ?>
		<td data-name="NoOfDays">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_NoOfDays" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_NoOfDays" class="form-group patient_prescription_NoOfDays">
<input type="text" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" id="x<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->NoOfDays->EditValue ?>"<?php echo $patient_prescription->NoOfDays->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="o<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" id="o<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription->NoOfDays->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->PreRoute->Visible) { // PreRoute ?>
		<td data-name="PreRoute">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PreRoute" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PreRoute" class="form-group patient_prescription_PreRoute">
<?php
$wrkonchange = "" . trim(@$patient_prescription->PreRoute->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_list->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" value="<?php echo RemoveHtml($patient_prescription->PreRoute->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->PreRoute->getPlaceHolder()) ?>"<?php echo $patient_prescription->PreRoute->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$patient_prescription->PreRoute->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription->PreRoute->caption() ?>" data-title="<?php echo $patient_prescription->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-value-separator="<?php echo $patient_prescription->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" id="x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_prescription->PreRoute->Lookup->getParamTag("p_x" . $patient_prescription_list->RowIndex . "_PreRoute") ?>
</span>
</script>
<script type="text/html" class="patient_prescriptionlist_js">
fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"});
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="o<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" id="o<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<td data-name="TimeOfTaking">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_TimeOfTaking" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_TimeOfTaking" class="form-group patient_prescription_TimeOfTaking">
<?php
$wrkonchange = "" . trim(@$patient_prescription->TimeOfTaking->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_list->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo RemoveHtml($patient_prescription->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $patient_prescription->TimeOfTaking->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$patient_prescription->TimeOfTaking->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription->TimeOfTaking->caption() ?>" data-title="<?php echo $patient_prescription->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $patient_prescription->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" id="x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_prescription->TimeOfTaking->Lookup->getParamTag("p_x" . $patient_prescription_list->RowIndex . "_TimeOfTaking") ?>
</span>
</script>
<script type="text/html" class="patient_prescriptionlist_js">
fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"});
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="o<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" id="o<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->Type->Visible) { // Type ?>
		<td data-name="Type">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Type" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Type" class="form-group patient_prescription_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Type" data-value-separator="<?php echo $patient_prescription->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_list->RowIndex ?>_Type" name="x<?php echo $patient_prescription_list->RowIndex ?>_Type"<?php echo $patient_prescription->Type->editAttributes() ?>>
		<?php echo $patient_prescription->Type->selectOptionListHtml("x<?php echo $patient_prescription_list->RowIndex ?>_Type") ?>
	</select>
</div>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="o<?php echo $patient_prescription_list->RowIndex ?>_Type" id="o<?php echo $patient_prescription_list->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription->Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if ($patient_prescription->mrnno->getSessionValue() <> "") { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_mrnno" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<span<?php echo $patient_prescription->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->mrnno->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" name="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_mrnno" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<input type="text" data-table="patient_prescription" data-field="x_mrnno" name="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" id="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->mrnno->EditValue ?>"<?php echo $patient_prescription->mrnno->editAttributes() ?>>
</span>
</script>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="o<?php echo $patient_prescription_list->RowIndex ?>_mrnno" id="o<?php echo $patient_prescription_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->Age->Visible) { // Age ?>
		<td data-name="Age">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Age" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Age" class="form-group patient_prescription_Age">
<input type="text" data-table="patient_prescription" data-field="x_Age" name="x<?php echo $patient_prescription_list->RowIndex ?>_Age" id="x<?php echo $patient_prescription_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Age->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Age->EditValue ?>"<?php echo $patient_prescription->Age->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="o<?php echo $patient_prescription_list->RowIndex ?>_Age" id="o<?php echo $patient_prescription_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Gender" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Gender" class="form-group patient_prescription_Gender">
<input type="text" data-table="patient_prescription" data-field="x_Gender" name="x<?php echo $patient_prescription_list->RowIndex ?>_Gender" id="x<?php echo $patient_prescription_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Gender->EditValue ?>"<?php echo $patient_prescription->Gender->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="o<?php echo $patient_prescription_list->RowIndex ?>_Gender" id="o<?php echo $patient_prescription_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_profilePic" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_profilePic" class="form-group patient_prescription_profilePic">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?php echo $patient_prescription_list->RowIndex ?>_profilePic" id="x<?php echo $patient_prescription_list->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_prescription->profilePic->getPlaceHolder()) ?>"<?php echo $patient_prescription->profilePic->editAttributes() ?>><?php echo $patient_prescription->profilePic->EditValue ?></textarea>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="o<?php echo $patient_prescription_list->RowIndex ?>_profilePic" id="o<?php echo $patient_prescription_list->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription->profilePic->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->Status->Visible) { // Status ?>
		<td data-name="Status">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Status" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Status" class="form-group patient_prescription_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Status" data-value-separator="<?php echo $patient_prescription->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_list->RowIndex ?>_Status" name="x<?php echo $patient_prescription_list->RowIndex ?>_Status"<?php echo $patient_prescription->Status->editAttributes() ?>>
		<?php echo $patient_prescription->Status->selectOptionListHtml("x<?php echo $patient_prescription_list->RowIndex ?>_Status") ?>
	</select>
</div>
<?php echo $patient_prescription->Status->Lookup->getParamTag("p_x" . $patient_prescription_list->RowIndex . "_Status") ?>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="o<?php echo $patient_prescription_list->RowIndex ?>_Status" id="o<?php echo $patient_prescription_list->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription->Status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_CreatedBy" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_CreatedBy" class="form-group patient_prescription_CreatedBy">
<input type="text" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" id="x<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreatedBy->EditValue ?>"<?php echo $patient_prescription->CreatedBy->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="o<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" id="o<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription->CreatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
		<td data-name="CreateDateTime">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_CreateDateTime" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_CreateDateTime" class="form-group patient_prescription_CreateDateTime">
<input type="text" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" id="x<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreateDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreateDateTime->EditValue ?>"<?php echo $patient_prescription->CreateDateTime->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="o<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" id="o<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription->CreateDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_ModifiedBy" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_ModifiedBy" class="form-group patient_prescription_ModifiedBy">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedBy->EditValue ?>"<?php echo $patient_prescription->ModifiedBy->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="o<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription->ModifiedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime">
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_ModifiedDateTime" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_ModifiedDateTime" class="form-group patient_prescription_ModifiedDateTime">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" id="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedDateTime->EditValue ?>"<?php echo $patient_prescription->ModifiedDateTime->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="o<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" id="o<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_prescription_list->ListOptions->render("body", "right", $patient_prescription_list->RowCnt, "block", $patient_prescription->TableVar, "patient_prescriptionlist");
?>
<script class="patient_prescriptionlist_js" type="text/html">
fpatient_prescriptionlist.updateLists(<?php echo $patient_prescription_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
<?php
if ($patient_prescription->ExportAll && $patient_prescription->isExport()) {
	$patient_prescription_list->StopRec = $patient_prescription_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_prescription_list->TotalRecs > $patient_prescription_list->StartRec + $patient_prescription_list->DisplayRecs - 1)
		$patient_prescription_list->StopRec = $patient_prescription_list->StartRec + $patient_prescription_list->DisplayRecs - 1;
	else
		$patient_prescription_list->StopRec = $patient_prescription_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $patient_prescription_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_prescription_list->FormKeyCountName) && ($patient_prescription->isGridAdd() || $patient_prescription->isGridEdit() || $patient_prescription->isConfirm())) {
		$patient_prescription_list->KeyCount = $CurrentForm->getValue($patient_prescription_list->FormKeyCountName);
		$patient_prescription_list->StopRec = $patient_prescription_list->StartRec + $patient_prescription_list->KeyCount - 1;
	}
}
$patient_prescription_list->RecCnt = $patient_prescription_list->StartRec - 1;
if ($patient_prescription_list->Recordset && !$patient_prescription_list->Recordset->EOF) {
	$patient_prescription_list->Recordset->moveFirst();
	$selectLimit = $patient_prescription_list->UseSelectLimit;
	if (!$selectLimit && $patient_prescription_list->StartRec > 1)
		$patient_prescription_list->Recordset->move($patient_prescription_list->StartRec - 1);
} elseif (!$patient_prescription->AllowAddDeleteRow && $patient_prescription_list->StopRec == 0) {
	$patient_prescription_list->StopRec = $patient_prescription->GridAddRowCount;
}

// Initialize aggregate
$patient_prescription->RowType = ROWTYPE_AGGREGATEINIT;
$patient_prescription->resetAttributes();
$patient_prescription_list->renderRow();
$patient_prescription_list->EditRowCnt = 0;
if ($patient_prescription->isEdit())
	$patient_prescription_list->RowIndex = 1;
if ($patient_prescription->isGridAdd())
	$patient_prescription_list->RowIndex = 0;
if ($patient_prescription->isGridEdit())
	$patient_prescription_list->RowIndex = 0;
while ($patient_prescription_list->RecCnt < $patient_prescription_list->StopRec) {
	$patient_prescription_list->RecCnt++;
	if ($patient_prescription_list->RecCnt >= $patient_prescription_list->StartRec) {
		$patient_prescription_list->RowCnt++;
		if ($patient_prescription->isGridAdd() || $patient_prescription->isGridEdit() || $patient_prescription->isConfirm()) {
			$patient_prescription_list->RowIndex++;
			$CurrentForm->Index = $patient_prescription_list->RowIndex;
			if ($CurrentForm->hasValue($patient_prescription_list->FormActionName) && $patient_prescription_list->EventCancelled)
				$patient_prescription_list->RowAction = strval($CurrentForm->getValue($patient_prescription_list->FormActionName));
			elseif ($patient_prescription->isGridAdd())
				$patient_prescription_list->RowAction = "insert";
			else
				$patient_prescription_list->RowAction = "";
		}

		// Set up key count
		$patient_prescription_list->KeyCount = $patient_prescription_list->RowIndex;

		// Init row class and style
		$patient_prescription->resetAttributes();
		$patient_prescription->CssClass = "";
		if ($patient_prescription->isGridAdd()) {
			$patient_prescription_list->loadRowValues(); // Load default values
		} else {
			$patient_prescription_list->loadRowValues($patient_prescription_list->Recordset); // Load row values
		}
		$patient_prescription->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_prescription->isGridAdd()) // Grid add
			$patient_prescription->RowType = ROWTYPE_ADD; // Render add
		if ($patient_prescription->isGridAdd() && $patient_prescription->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_prescription_list->restoreCurrentRowFormValues($patient_prescription_list->RowIndex); // Restore form values
		if ($patient_prescription->isEdit()) {
			if ($patient_prescription_list->checkInlineEditKey() && $patient_prescription_list->EditRowCnt == 0) { // Inline edit
				$patient_prescription->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($patient_prescription->isGridEdit()) { // Grid edit
			if ($patient_prescription->EventCancelled)
				$patient_prescription_list->restoreCurrentRowFormValues($patient_prescription_list->RowIndex); // Restore form values
			if ($patient_prescription_list->RowAction == "insert")
				$patient_prescription->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_prescription->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_prescription->isEdit() && $patient_prescription->RowType == ROWTYPE_EDIT && $patient_prescription->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$patient_prescription_list->restoreFormValues(); // Restore form values
		}
		if ($patient_prescription->isGridEdit() && ($patient_prescription->RowType == ROWTYPE_EDIT || $patient_prescription->RowType == ROWTYPE_ADD) && $patient_prescription->EventCancelled) // Update failed
			$patient_prescription_list->restoreCurrentRowFormValues($patient_prescription_list->RowIndex); // Restore form values
		if ($patient_prescription->RowType == ROWTYPE_EDIT) // Edit row
			$patient_prescription_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$patient_prescription->RowAttrs = array_merge($patient_prescription->RowAttrs, array('data-rowindex'=>$patient_prescription_list->RowCnt, 'id'=>'r' . $patient_prescription_list->RowCnt . '_patient_prescription', 'data-rowtype'=>$patient_prescription->RowType));

		// Render row
		$patient_prescription_list->renderRow();

		// Render list options
		$patient_prescription_list->renderListOptions();

		// Save row and cell attributes
		$patient_prescription_list->Attrs[$patient_prescription_list->RowCnt] = array("row_attrs" => $patient_prescription->rowAttributes(), "cell_attrs" => array());
		$patient_prescription_list->Attrs[$patient_prescription_list->RowCnt]["cell_attrs"] = $patient_prescription->fieldCellAttributes();

		// Skip delete row / empty row for confirm page
		if ($patient_prescription_list->RowAction <> "delete" && $patient_prescription_list->RowAction <> "insertdelete" && !($patient_prescription_list->RowAction == "insert" && $patient_prescription->isConfirm() && $patient_prescription_list->emptyRow())) {
?>
	<tr<?php echo $patient_prescription->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_prescription_list->ListOptions->render("body", "left", $patient_prescription_list->RowCnt, "block", $patient_prescription->TableVar, "patient_prescriptionlist");
?>
	<?php if ($patient_prescription->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_prescription->id->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_id" class="patient_prescriptionlist" type="text/html"><span></span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="o<?php echo $patient_prescription_list->RowIndex ?>_id" id="o<?php echo $patient_prescription_list->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_id" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_id" class="form-group patient_prescription_id">
<span<?php echo $patient_prescription->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="x<?php echo $patient_prescription_list->RowIndex ?>_id" id="x<?php echo $patient_prescription_list->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_id" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_id" class="patient_prescription_id">
<span<?php echo $patient_prescription->id->viewAttributes() ?>>
<?php echo $patient_prescription->id->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_prescription->Reception->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_prescription->Reception->getSessionValue() <> "") { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Reception" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<span<?php echo $patient_prescription->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->Reception->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" name="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Reception" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<input type="text" data-table="patient_prescription" data-field="x_Reception" name="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" id="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_prescription->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Reception->EditValue ?>"<?php echo $patient_prescription->Reception->editAttributes() ?>>
</span>
</script>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="o<?php echo $patient_prescription_list->RowIndex ?>_Reception" id="o<?php echo $patient_prescription_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Reception" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<span<?php echo $patient_prescription->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->Reception->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" id="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Reception" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Reception" class="patient_prescription_Reception">
<span<?php echo $patient_prescription->Reception->viewAttributes() ?>>
<?php echo $patient_prescription->Reception->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $patient_prescription->PatientId->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_prescription->PatientId->getSessionValue() <> "") { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientId" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<span<?php echo $patient_prescription->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->PatientId->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" name="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientId" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<input type="text" data-table="patient_prescription" data-field="x_PatientId" name="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" id="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_prescription->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->PatientId->EditValue ?>"<?php echo $patient_prescription->PatientId->editAttributes() ?>>
</span>
</script>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="o<?php echo $patient_prescription_list->RowIndex ?>_PatientId" id="o<?php echo $patient_prescription_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientId" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<span<?php echo $patient_prescription->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->PatientId->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" id="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientId" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientId" class="patient_prescription_PatientId">
<span<?php echo $patient_prescription->PatientId->viewAttributes() ?>>
<?php echo $patient_prescription->PatientId->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_prescription->PatientName->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientName" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientName" class="form-group patient_prescription_PatientName">
<input type="text" data-table="patient_prescription" data-field="x_PatientName" name="x<?php echo $patient_prescription_list->RowIndex ?>_PatientName" id="x<?php echo $patient_prescription_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->PatientName->EditValue ?>"<?php echo $patient_prescription->PatientName->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="o<?php echo $patient_prescription_list->RowIndex ?>_PatientName" id="o<?php echo $patient_prescription_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientName" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientName" class="form-group patient_prescription_PatientName">
<input type="text" data-table="patient_prescription" data-field="x_PatientName" name="x<?php echo $patient_prescription_list->RowIndex ?>_PatientName" id="x<?php echo $patient_prescription_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->PatientName->EditValue ?>"<?php echo $patient_prescription->PatientName->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientName" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PatientName" class="patient_prescription_PatientName">
<span<?php echo $patient_prescription->PatientName->viewAttributes() ?>>
<?php echo $patient_prescription->PatientName->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->Medicine->Visible) { // Medicine ?>
		<td data-name="Medicine"<?php echo $patient_prescription->Medicine->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Medicine" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Medicine" class="form-group patient_prescription_Medicine">
<?php
$wrkonchange = "" . trim(@$patient_prescription->Medicine->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_list->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" value="<?php echo RemoveHtml($patient_prescription->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->Medicine->getPlaceHolder()) ?>"<?php echo $patient_prescription->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_prescription->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_prescription->Medicine->ReadOnly || $patient_prescription->Medicine->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_prescription->Medicine->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" id="x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_prescription->Medicine->Lookup->getParamTag("p_x" . $patient_prescription_list->RowIndex . "_Medicine") ?>
</span>
</script>
<script type="text/html" class="patient_prescriptionlist_js">
fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_Medicine","forceSelect":false});
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="o<?php echo $patient_prescription_list->RowIndex ?>_Medicine" id="o<?php echo $patient_prescription_list->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Medicine" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Medicine" class="form-group patient_prescription_Medicine">
<?php
$wrkonchange = "" . trim(@$patient_prescription->Medicine->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_list->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" value="<?php echo RemoveHtml($patient_prescription->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->Medicine->getPlaceHolder()) ?>"<?php echo $patient_prescription->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_prescription->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_prescription->Medicine->ReadOnly || $patient_prescription->Medicine->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_prescription->Medicine->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" id="x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_prescription->Medicine->Lookup->getParamTag("p_x" . $patient_prescription_list->RowIndex . "_Medicine") ?>
</span>
</script>
<script type="text/html" class="patient_prescriptionlist_js">
fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_Medicine","forceSelect":false});
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Medicine" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Medicine" class="patient_prescription_Medicine">
<span<?php echo $patient_prescription->Medicine->viewAttributes() ?>>
<?php echo $patient_prescription->Medicine->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->M->Visible) { // M ?>
		<td data-name="M"<?php echo $patient_prescription->M->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_M" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_M" class="form-group patient_prescription_M">
<input type="text" data-table="patient_prescription" data-field="x_M" name="x<?php echo $patient_prescription_list->RowIndex ?>_M" id="x<?php echo $patient_prescription_list->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->M->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->M->EditValue ?>"<?php echo $patient_prescription->M->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="o<?php echo $patient_prescription_list->RowIndex ?>_M" id="o<?php echo $patient_prescription_list->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription->M->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_M" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_M" class="form-group patient_prescription_M">
<input type="text" data-table="patient_prescription" data-field="x_M" name="x<?php echo $patient_prescription_list->RowIndex ?>_M" id="x<?php echo $patient_prescription_list->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->M->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->M->EditValue ?>"<?php echo $patient_prescription->M->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_M" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_M" class="patient_prescription_M">
<span<?php echo $patient_prescription->M->viewAttributes() ?>>
<?php echo $patient_prescription->M->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->A->Visible) { // A ?>
		<td data-name="A"<?php echo $patient_prescription->A->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_A" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_A" class="form-group patient_prescription_A">
<input type="text" data-table="patient_prescription" data-field="x_A" name="x<?php echo $patient_prescription_list->RowIndex ?>_A" id="x<?php echo $patient_prescription_list->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->A->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->A->EditValue ?>"<?php echo $patient_prescription->A->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="o<?php echo $patient_prescription_list->RowIndex ?>_A" id="o<?php echo $patient_prescription_list->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription->A->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_A" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_A" class="form-group patient_prescription_A">
<input type="text" data-table="patient_prescription" data-field="x_A" name="x<?php echo $patient_prescription_list->RowIndex ?>_A" id="x<?php echo $patient_prescription_list->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->A->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->A->EditValue ?>"<?php echo $patient_prescription->A->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_A" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_A" class="patient_prescription_A">
<span<?php echo $patient_prescription->A->viewAttributes() ?>>
<?php echo $patient_prescription->A->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->N->Visible) { // N ?>
		<td data-name="N"<?php echo $patient_prescription->N->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_N" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_N" class="form-group patient_prescription_N">
<input type="text" data-table="patient_prescription" data-field="x_N" name="x<?php echo $patient_prescription_list->RowIndex ?>_N" id="x<?php echo $patient_prescription_list->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->N->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->N->EditValue ?>"<?php echo $patient_prescription->N->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="o<?php echo $patient_prescription_list->RowIndex ?>_N" id="o<?php echo $patient_prescription_list->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription->N->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_N" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_N" class="form-group patient_prescription_N">
<input type="text" data-table="patient_prescription" data-field="x_N" name="x<?php echo $patient_prescription_list->RowIndex ?>_N" id="x<?php echo $patient_prescription_list->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->N->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->N->EditValue ?>"<?php echo $patient_prescription->N->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_N" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_N" class="patient_prescription_N">
<span<?php echo $patient_prescription->N->viewAttributes() ?>>
<?php echo $patient_prescription->N->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->NoOfDays->Visible) { // NoOfDays ?>
		<td data-name="NoOfDays"<?php echo $patient_prescription->NoOfDays->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_NoOfDays" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_NoOfDays" class="form-group patient_prescription_NoOfDays">
<input type="text" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" id="x<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->NoOfDays->EditValue ?>"<?php echo $patient_prescription->NoOfDays->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="o<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" id="o<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription->NoOfDays->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_NoOfDays" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_NoOfDays" class="form-group patient_prescription_NoOfDays">
<input type="text" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" id="x<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->NoOfDays->EditValue ?>"<?php echo $patient_prescription->NoOfDays->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_NoOfDays" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays">
<span<?php echo $patient_prescription->NoOfDays->viewAttributes() ?>>
<?php echo $patient_prescription->NoOfDays->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->PreRoute->Visible) { // PreRoute ?>
		<td data-name="PreRoute"<?php echo $patient_prescription->PreRoute->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PreRoute" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PreRoute" class="form-group patient_prescription_PreRoute">
<?php
$wrkonchange = "" . trim(@$patient_prescription->PreRoute->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_list->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" value="<?php echo RemoveHtml($patient_prescription->PreRoute->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->PreRoute->getPlaceHolder()) ?>"<?php echo $patient_prescription->PreRoute->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$patient_prescription->PreRoute->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription->PreRoute->caption() ?>" data-title="<?php echo $patient_prescription->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-value-separator="<?php echo $patient_prescription->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" id="x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_prescription->PreRoute->Lookup->getParamTag("p_x" . $patient_prescription_list->RowIndex . "_PreRoute") ?>
</span>
</script>
<script type="text/html" class="patient_prescriptionlist_js">
fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"});
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="o<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" id="o<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PreRoute" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PreRoute" class="form-group patient_prescription_PreRoute">
<?php
$wrkonchange = "" . trim(@$patient_prescription->PreRoute->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_list->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" value="<?php echo RemoveHtml($patient_prescription->PreRoute->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->PreRoute->getPlaceHolder()) ?>"<?php echo $patient_prescription->PreRoute->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$patient_prescription->PreRoute->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription->PreRoute->caption() ?>" data-title="<?php echo $patient_prescription->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-value-separator="<?php echo $patient_prescription->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" id="x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_prescription->PreRoute->Lookup->getParamTag("p_x" . $patient_prescription_list->RowIndex . "_PreRoute") ?>
</span>
</script>
<script type="text/html" class="patient_prescriptionlist_js">
fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"});
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PreRoute" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_PreRoute" class="patient_prescription_PreRoute">
<span<?php echo $patient_prescription->PreRoute->viewAttributes() ?>>
<?php echo $patient_prescription->PreRoute->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<td data-name="TimeOfTaking"<?php echo $patient_prescription->TimeOfTaking->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_TimeOfTaking" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_TimeOfTaking" class="form-group patient_prescription_TimeOfTaking">
<?php
$wrkonchange = "" . trim(@$patient_prescription->TimeOfTaking->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_list->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo RemoveHtml($patient_prescription->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $patient_prescription->TimeOfTaking->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$patient_prescription->TimeOfTaking->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription->TimeOfTaking->caption() ?>" data-title="<?php echo $patient_prescription->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $patient_prescription->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" id="x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_prescription->TimeOfTaking->Lookup->getParamTag("p_x" . $patient_prescription_list->RowIndex . "_TimeOfTaking") ?>
</span>
</script>
<script type="text/html" class="patient_prescriptionlist_js">
fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"});
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="o<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" id="o<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_TimeOfTaking" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_TimeOfTaking" class="form-group patient_prescription_TimeOfTaking">
<?php
$wrkonchange = "" . trim(@$patient_prescription->TimeOfTaking->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_list->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo RemoveHtml($patient_prescription->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $patient_prescription->TimeOfTaking->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$patient_prescription->TimeOfTaking->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription->TimeOfTaking->caption() ?>" data-title="<?php echo $patient_prescription->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $patient_prescription->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" id="x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_prescription->TimeOfTaking->Lookup->getParamTag("p_x" . $patient_prescription_list->RowIndex . "_TimeOfTaking") ?>
</span>
</script>
<script type="text/html" class="patient_prescriptionlist_js">
fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"});
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_TimeOfTaking" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking">
<span<?php echo $patient_prescription->TimeOfTaking->viewAttributes() ?>>
<?php echo $patient_prescription->TimeOfTaking->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->Type->Visible) { // Type ?>
		<td data-name="Type"<?php echo $patient_prescription->Type->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Type" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Type" class="form-group patient_prescription_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Type" data-value-separator="<?php echo $patient_prescription->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_list->RowIndex ?>_Type" name="x<?php echo $patient_prescription_list->RowIndex ?>_Type"<?php echo $patient_prescription->Type->editAttributes() ?>>
		<?php echo $patient_prescription->Type->selectOptionListHtml("x<?php echo $patient_prescription_list->RowIndex ?>_Type") ?>
	</select>
</div>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="o<?php echo $patient_prescription_list->RowIndex ?>_Type" id="o<?php echo $patient_prescription_list->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription->Type->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Type" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Type" class="form-group patient_prescription_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Type" data-value-separator="<?php echo $patient_prescription->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_list->RowIndex ?>_Type" name="x<?php echo $patient_prescription_list->RowIndex ?>_Type"<?php echo $patient_prescription->Type->editAttributes() ?>>
		<?php echo $patient_prescription->Type->selectOptionListHtml("x<?php echo $patient_prescription_list->RowIndex ?>_Type") ?>
	</select>
</div>
</span>
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Type" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Type" class="patient_prescription_Type">
<span<?php echo $patient_prescription->Type->viewAttributes() ?>>
<?php echo $patient_prescription->Type->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_prescription->mrnno->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_prescription->mrnno->getSessionValue() <> "") { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_mrnno" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<span<?php echo $patient_prescription->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->mrnno->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" name="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_mrnno" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<input type="text" data-table="patient_prescription" data-field="x_mrnno" name="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" id="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->mrnno->EditValue ?>"<?php echo $patient_prescription->mrnno->editAttributes() ?>>
</span>
</script>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="o<?php echo $patient_prescription_list->RowIndex ?>_mrnno" id="o<?php echo $patient_prescription_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_mrnno" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<span<?php echo $patient_prescription->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->mrnno->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" id="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_mrnno" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_mrnno" class="patient_prescription_mrnno">
<span<?php echo $patient_prescription->mrnno->viewAttributes() ?>>
<?php echo $patient_prescription->mrnno->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_prescription->Age->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Age" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Age" class="form-group patient_prescription_Age">
<input type="text" data-table="patient_prescription" data-field="x_Age" name="x<?php echo $patient_prescription_list->RowIndex ?>_Age" id="x<?php echo $patient_prescription_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Age->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Age->EditValue ?>"<?php echo $patient_prescription->Age->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="o<?php echo $patient_prescription_list->RowIndex ?>_Age" id="o<?php echo $patient_prescription_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Age" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Age" class="form-group patient_prescription_Age">
<input type="text" data-table="patient_prescription" data-field="x_Age" name="x<?php echo $patient_prescription_list->RowIndex ?>_Age" id="x<?php echo $patient_prescription_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Age->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Age->EditValue ?>"<?php echo $patient_prescription->Age->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Age" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Age" class="patient_prescription_Age">
<span<?php echo $patient_prescription->Age->viewAttributes() ?>>
<?php echo $patient_prescription->Age->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_prescription->Gender->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Gender" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Gender" class="form-group patient_prescription_Gender">
<input type="text" data-table="patient_prescription" data-field="x_Gender" name="x<?php echo $patient_prescription_list->RowIndex ?>_Gender" id="x<?php echo $patient_prescription_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Gender->EditValue ?>"<?php echo $patient_prescription->Gender->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="o<?php echo $patient_prescription_list->RowIndex ?>_Gender" id="o<?php echo $patient_prescription_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Gender" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Gender" class="form-group patient_prescription_Gender">
<input type="text" data-table="patient_prescription" data-field="x_Gender" name="x<?php echo $patient_prescription_list->RowIndex ?>_Gender" id="x<?php echo $patient_prescription_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Gender->EditValue ?>"<?php echo $patient_prescription->Gender->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Gender" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Gender" class="patient_prescription_Gender">
<span<?php echo $patient_prescription->Gender->viewAttributes() ?>>
<?php echo $patient_prescription->Gender->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic"<?php echo $patient_prescription->profilePic->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_profilePic" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_profilePic" class="form-group patient_prescription_profilePic">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?php echo $patient_prescription_list->RowIndex ?>_profilePic" id="x<?php echo $patient_prescription_list->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_prescription->profilePic->getPlaceHolder()) ?>"<?php echo $patient_prescription->profilePic->editAttributes() ?>><?php echo $patient_prescription->profilePic->EditValue ?></textarea>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="o<?php echo $patient_prescription_list->RowIndex ?>_profilePic" id="o<?php echo $patient_prescription_list->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription->profilePic->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_profilePic" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_profilePic" class="form-group patient_prescription_profilePic">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?php echo $patient_prescription_list->RowIndex ?>_profilePic" id="x<?php echo $patient_prescription_list->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_prescription->profilePic->getPlaceHolder()) ?>"<?php echo $patient_prescription->profilePic->editAttributes() ?>><?php echo $patient_prescription->profilePic->EditValue ?></textarea>
</span>
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_profilePic" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_profilePic" class="patient_prescription_profilePic">
<span<?php echo $patient_prescription->profilePic->viewAttributes() ?>>
<?php echo $patient_prescription->profilePic->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->Status->Visible) { // Status ?>
		<td data-name="Status"<?php echo $patient_prescription->Status->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Status" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Status" class="form-group patient_prescription_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Status" data-value-separator="<?php echo $patient_prescription->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_list->RowIndex ?>_Status" name="x<?php echo $patient_prescription_list->RowIndex ?>_Status"<?php echo $patient_prescription->Status->editAttributes() ?>>
		<?php echo $patient_prescription->Status->selectOptionListHtml("x<?php echo $patient_prescription_list->RowIndex ?>_Status") ?>
	</select>
</div>
<?php echo $patient_prescription->Status->Lookup->getParamTag("p_x" . $patient_prescription_list->RowIndex . "_Status") ?>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="o<?php echo $patient_prescription_list->RowIndex ?>_Status" id="o<?php echo $patient_prescription_list->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription->Status->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Status" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Status" class="form-group patient_prescription_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Status" data-value-separator="<?php echo $patient_prescription->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_list->RowIndex ?>_Status" name="x<?php echo $patient_prescription_list->RowIndex ?>_Status"<?php echo $patient_prescription->Status->editAttributes() ?>>
		<?php echo $patient_prescription->Status->selectOptionListHtml("x<?php echo $patient_prescription_list->RowIndex ?>_Status") ?>
	</select>
</div>
<?php echo $patient_prescription->Status->Lookup->getParamTag("p_x" . $patient_prescription_list->RowIndex . "_Status") ?>
</span>
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Status" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_Status" class="patient_prescription_Status">
<span<?php echo $patient_prescription->Status->viewAttributes() ?>>
<?php echo $patient_prescription->Status->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy"<?php echo $patient_prescription->CreatedBy->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_CreatedBy" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_CreatedBy" class="form-group patient_prescription_CreatedBy">
<input type="text" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" id="x<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreatedBy->EditValue ?>"<?php echo $patient_prescription->CreatedBy->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="o<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" id="o<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_CreatedBy" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_CreatedBy" class="form-group patient_prescription_CreatedBy">
<input type="text" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" id="x<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreatedBy->EditValue ?>"<?php echo $patient_prescription->CreatedBy->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_CreatedBy" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy">
<span<?php echo $patient_prescription->CreatedBy->viewAttributes() ?>>
<?php echo $patient_prescription->CreatedBy->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
		<td data-name="CreateDateTime"<?php echo $patient_prescription->CreateDateTime->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_CreateDateTime" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_CreateDateTime" class="form-group patient_prescription_CreateDateTime">
<input type="text" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" id="x<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreateDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreateDateTime->EditValue ?>"<?php echo $patient_prescription->CreateDateTime->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="o<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" id="o<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription->CreateDateTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_CreateDateTime" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_CreateDateTime" class="form-group patient_prescription_CreateDateTime">
<input type="text" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" id="x<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreateDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreateDateTime->EditValue ?>"<?php echo $patient_prescription->CreateDateTime->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_CreateDateTime" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime">
<span<?php echo $patient_prescription->CreateDateTime->viewAttributes() ?>>
<?php echo $patient_prescription->CreateDateTime->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy"<?php echo $patient_prescription->ModifiedBy->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_ModifiedBy" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_ModifiedBy" class="form-group patient_prescription_ModifiedBy">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedBy->EditValue ?>"<?php echo $patient_prescription->ModifiedBy->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="o<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_ModifiedBy" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_ModifiedBy" class="form-group patient_prescription_ModifiedBy">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedBy->EditValue ?>"<?php echo $patient_prescription->ModifiedBy->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_ModifiedBy" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy">
<span<?php echo $patient_prescription->ModifiedBy->viewAttributes() ?>>
<?php echo $patient_prescription->ModifiedBy->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime"<?php echo $patient_prescription->ModifiedDateTime->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_ModifiedDateTime" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_ModifiedDateTime" class="form-group patient_prescription_ModifiedDateTime">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" id="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedDateTime->EditValue ?>"<?php echo $patient_prescription->ModifiedDateTime->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="o<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" id="o<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_ModifiedDateTime" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_ModifiedDateTime" class="form-group patient_prescription_ModifiedDateTime">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" id="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedDateTime->EditValue ?>"<?php echo $patient_prescription->ModifiedDateTime->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_ModifiedDateTime" class="patient_prescriptionlist" type="text/html">
<span id="el<?php echo $patient_prescription_list->RowCnt ?>_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime">
<span<?php echo $patient_prescription->ModifiedDateTime->viewAttributes() ?>>
<?php echo $patient_prescription->ModifiedDateTime->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_prescription_list->ListOptions->render("body", "right", $patient_prescription_list->RowCnt, "block", $patient_prescription->TableVar, "patient_prescriptionlist");
?>
	</tr>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD || $patient_prescription->RowType == ROWTYPE_EDIT) { ?>
<script class="patient_prescriptionlist_js" type="text/html">
fpatient_prescriptionlist.updateLists(<?php echo $patient_prescription_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_prescription->isGridAdd())
		if (!$patient_prescription_list->Recordset->EOF)
			$patient_prescription_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($patient_prescription->isAdd() || $patient_prescription->isCopy()) { ?>
<input type="hidden" name="<?php echo $patient_prescription_list->FormKeyCountName ?>" id="<?php echo $patient_prescription_list->FormKeyCountName ?>" value="<?php echo $patient_prescription_list->KeyCount ?>">
<?php } ?>
<?php if ($patient_prescription->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $patient_prescription_list->FormKeyCountName ?>" id="<?php echo $patient_prescription_list->FormKeyCountName ?>" value="<?php echo $patient_prescription_list->KeyCount ?>">
<?php echo $patient_prescription_list->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_prescription->isEdit()) { ?>
<input type="hidden" name="<?php echo $patient_prescription_list->FormKeyCountName ?>" id="<?php echo $patient_prescription_list->FormKeyCountName ?>" value="<?php echo $patient_prescription_list->KeyCount ?>">
<?php } ?>
<?php if ($patient_prescription->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $patient_prescription_list->FormKeyCountName ?>" id="<?php echo $patient_prescription_list->FormKeyCountName ?>" value="<?php echo $patient_prescription_list->KeyCount ?>">
<?php echo $patient_prescription_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$patient_prescription->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_patient_prescriptionlist" class="ew-custom-template"></div>
<script id="tpm_patient_prescriptionlist" type="text/html">
<div id="ct_patient_prescription_list"><?php if ($patient_prescription_list->RowCnt > 0) { ?>
<div style="overflow-x:auto;">
<table class="ew-table">
	<thead>
	<col>
		<col>
		<colgroup span="3" style="background-color:#adff2f;"></colgroup>
		<col>
		<col>
		<col>
		<col>
		<col>
		<tr>
			<th rowspan="1"></th>
			<th rowspan="1"></th>
			<th class="text-center" colspan="3" scope="colgroup">Dose</th>
			<th rowspan="1"></th>
			<th rowspan="1"></th>
			<th rowspan="1"></th>
			<th rowspan="1"></th>
			<th rowspan="1"></th>
		</tr>
		<tr class="ew-table-header">
		<td class="text-center" >*</td>
			<td class="text-center" >{{include tmpl="#tpc_patient_prescription_Medicine"/}}</td>
			<td class="text-center" >{{include tmpl="#tpc_patient_prescription_M"/}}</td>
			<td class="text-center" >{{include tmpl="#tpc_patient_prescription_A"/}}</td>
			<td class="text-center" >{{include tmpl="#tpc_patient_prescription_N"/}}</td>
			<td class="text-center" >{{include tmpl="#tpc_patient_prescription_NoOfDays"/}}</td>
			<td class="text-center" >{{include tmpl="#tpc_patient_prescription_PreRoute"/}}</td>
			<td class="text-center" >{{include tmpl="#tpc_patient_prescription_TimeOfTaking"/}}</td>
			<td class="text-center" >{{include tmpl="#tpc_patient_prescription_Type"/}}</td>
			<td class="text-center" >{{include tmpl="#tpc_patient_prescription_Status"/}}</td>
		</tr>    
	</thead> 
<tbody>
<?php for ($i = $patient_prescription_list->StartRowCnt; $i <= $patient_prescription_list->RowCnt; $i++) { ?>
<tr<?php echo @$patient_prescription_list->Attrs[$i]['row_attrs'] ?>>
<td class="ew-list-option-body text-nowrap" data-name="button"><div style="width: 25px;"><div class="btn-group btn-group-sm ew-btn-group"><a class="btn btn-default ew-grid-link ew-grid-delete" title="" data-caption="Delete" onclick="return ew.deleteGridRow(this, <?php echo $i ?>);" data-original-title="Delete"><i data-phrase="DeleteLink" class="fa fa-trash ew-icon" data-caption="Delete"></i></a></div></div></td>
	 <td>{{include tmpl="#tpx<?php echo $i ?>_patient_prescription_Medicine"/}}</td>
	 <td>{{include tmpl="#tpx<?php echo $i ?>_patient_prescription_M"/}}</td>
	 <td>{{include tmpl="#tpx<?php echo $i ?>_patient_prescription_A"/}}</td>
	 <td>{{include tmpl="#tpx<?php echo $i ?>_patient_prescription_N"/}}</td>
	 <td>{{include tmpl="#tpx<?php echo $i ?>_patient_prescription_NoOfDays"/}}</td>
	 <td>{{include tmpl="#tpx<?php echo $i ?>_patient_prescription_PreRoute"/}}</td>
	 <td>{{include tmpl="#tpx<?php echo $i ?>_patient_prescription_TimeOfTaking"/}}</td>
	 <td>{{include tmpl="#tpx<?php echo $i ?>_patient_prescription_Type"/}}</td>
	 <td>{{include tmpl="#tpx<?php echo $i ?>_patient_prescription_Status"/}}</td>
</tr>
<?php } ?>
<?php if ($patient_prescription_list->TotalRecs > 0 && !$patient_prescription->isGridAdd() && !$patient_prescription->isGridEdit()) { ?>
 </tbody>
</table>
</div>
<?php } ?>
<?php } ?>
</div>
</script>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_prescription_list->Recordset)
	$patient_prescription_list->Recordset->Close();
?>
<?php if (!$patient_prescription->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_prescription->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_prescription_list->Pager)) $patient_prescription_list->Pager = new NumericPager($patient_prescription_list->StartRec, $patient_prescription_list->DisplayRecs, $patient_prescription_list->TotalRecs, $patient_prescription_list->RecRange, $patient_prescription_list->AutoHidePager) ?>
<?php if ($patient_prescription_list->Pager->RecordCount > 0 && $patient_prescription_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_prescription_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_prescription_list->pageUrl() ?>start=<?php echo $patient_prescription_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_prescription_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_prescription_list->pageUrl() ?>start=<?php echo $patient_prescription_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_prescription_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_prescription_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_prescription_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_prescription_list->pageUrl() ?>start=<?php echo $patient_prescription_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_prescription_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_prescription_list->pageUrl() ?>start=<?php echo $patient_prescription_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_prescription_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_prescription_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_prescription_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_prescription_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_prescription_list->TotalRecs > 0 && (!$patient_prescription_list->AutoHidePageSizeSelector || $patient_prescription_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_prescription">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_prescription_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_prescription_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_prescription_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_prescription_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_prescription_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_prescription_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_prescription->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_prescription_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_prescription_list->TotalRecs == 0 && !$patient_prescription->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_prescription_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_prescription->Rows) ?> };
ew.applyTemplate("tpd_patient_prescriptionlist", "tpm_patient_prescriptionlist", "patient_prescriptionlist", "<?php echo $patient_prescription->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_patient_prescriptionlist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_patient_prescriptionlist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.patient_prescriptionlist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_prescription_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_prescription->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

 var c = document.getElementById("el_ip_admission_profilePic").children;
 var d = c[0].children;
 var evalue = c[0].innerText;

 //document.getElementById("profilePicturePatient").src = 'uploads/' + evalue;
	var myParent =  document.getElementById("tpd_ip_admissionmaster");
	var t = document.createTextNode("Select Drug Template : ");
	myParent.appendChild(t);

//Create array of options to be added
var array = ["Volvo","Saab","Mercades","Audi"];

//Create and append select list
var selectList = document.createElement("select");
selectList.id = "mySelect";
myParent.appendChild(selectList);

//Create and append the options
//for (var i = 0; i < array.length; i++) {
//    var option = document.createElement("option");
//    option.value = array[i];
//    option.text = array[i];
//    selectList.appendChild(option);
//}

	var btn = document.createElement("BUTTON");   // Create a <button> element
	btn.innerHTML = "Select";                   // Insert text
	btn.addEventListener("click", myScriptSelect);
myParent.appendChild(btn);               // Append <button> to <body>
		var user = [{
			'CustomerName': '<?php  echo CurrentUserName();  ?>'                    
		}];

	//v
		var jsonString = JSON.stringify(user);
			$.ajax({
				type: "POST",
				url: "ajaxinsert.php?control=selectTemplatePRE",
				data: { data: jsonString },
				cache: false,
				success: function (data) {
					let jsonObject = JSON.parse(data);
					var json = jsonObject["records"];
					for(var i = 0; i < json.length; i++) {
						var obj = json[i];
						console.log(obj.id);
						 var option = document.createElement("option");
	option.value = obj.TemplateName;
	option.text = obj.TemplateName;
	selectList.appendChild(option);
					  }

					//alert(data + "Saved Sucessfully...........");
					//swal({ text: "Saved Sucessfully......", icon: "success", });
				   // Receiptreset();
				  //  document.getElementById("VoucherAmt0").focus();

				}
			});
	for (var i = 0; i < 20; i++) {
		var kkk = $('*[data-caption="Add Blank Row"]')
		ew.addGridRow(kkk);
	}

	function myScriptSelect() {

	   // alert("hai");
//n

		var hhhh = document.getElementById("mySelect");
				var user = [{
					'CustomerName': '<?php  echo CurrentUserName();  ?>',
					'TemplateName': hhhh.value
		}];

	//v
		var jsonString = JSON.stringify(user);
			$.ajax({
				type: "POST",
				url: "ajaxinsert.php?control=selectTemplatePREItem",
				data: { data: jsonString },
				cache: false,
				success: function (data) {
					let jsonObject = JSON.parse(data);
					var json = jsonObject["records"];
					for(var i = 0; i < json.length; i++) {
						var obj = json[i];
						console.log(obj.id);
						 var option = document.createElement("option");
	option.value = obj.TemplateName;
	option.text = obj.TemplateName;
						selectList.appendChild(option);
						var Medicine = document.getElementById("sv_x"+(i+1)+"_Medicine");
						Medicine.value = obj.Medicine;
						Medicine.innerHTML  = obj.Medicine;
						Medicine.selectedIndex = obj.Medicine;
						Medicine.value = obj.Medicine;
						Medicine.text = obj.Medicine;
						var Medicine = document.getElementById("x"+(i+1)+"_Medicine");
						Medicine.value = obj.Medicine;
						var M = document.getElementById("x"+(i+1)+"_M");
						M.value = obj.M;
						var A = document.getElementById("x"+(i+1)+"_A");
						A.value = obj.A;
						var N = document.getElementById("x"+(i+1)+"_N");
						N.value = obj.N;
						var NoOfDays = document.getElementById("x"+(i+1)+"_NoOfDays");
						NoOfDays.value = obj.NoOfDays;
						var PreRoute = document.getElementById("sv_x"+(i+1)+"_PreRoute");
						PreRoute.value = obj.PreRoute;
						  var PreRoute = document.getElementById("x"+(i+1)+"_PreRoute");
						PreRoute.value = obj.PreRoute;
						var TimeOfTaking = document.getElementById("sv_x"+(i+1)+"_TimeOfTaking");
						TimeOfTaking.value = obj.TimeOfTaking;
							var TimeOfTaking = document.getElementById("x"+(i+1)+"_TimeOfTaking");
						TimeOfTaking.value = obj.TimeOfTaking;
						   var TimeOfTaking = document.getElementById("x"+(i+1)+"_Type");
						TimeOfTaking.value = 'Normal';
						var TimeOfTaking = document.getElementById("x"+(i+1)+"_Status");
						TimeOfTaking.value = 'Live';
					  }

					//alert(data + "Saved Sucessfully...........");
					//swal({ text: "Saved Sucessfully......", icon: "success", });
				   // Receiptreset();
				  //  document.getElementById("VoucherAmt0").focus();

				}
			});
	}
 </script>
<style>
.input-group {
	position: relative;
	display: flex;
	flex-wrap: unset;
	align-items: stretch;
	width: 100%;
}
.ew-grid .ew-table>tbody>tr>td, .ew-grid .ew-table>tfoot>tr>td {
	padding: .0rem;
	border-bottom: 1px solid;
	border-top: 0;
	border-left: 0;
	border-right: 1px solid;
	border-color: silver;
}
.text-nowrap {
	white-space: nowrap !important;
	line-height: 1;
	height: 33px;
}
</style>
<script>
jQuery("#tpd_patient_prescriptionlist th.ew-list-option-header").each(function() {this.rowSpan = 1});
jQuery("#tpd_patient_prescriptionlist td.ew-list-option-body").each(function() {this.rowSpan = 1});
</script>
<?php if (!$patient_prescription->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_prescription", "100%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_prescription_list->terminate();
?>