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
$patient_investigations_list = new patient_investigations_list();

// Run the page
$patient_investigations_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_investigations_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_investigations->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_investigationslist = currentForm = new ew.Form("fpatient_investigationslist", "list");
fpatient_investigationslist.formKeyCountName = '<?php echo $patient_investigations_list->FormKeyCountName ?>';

// Validate form
fpatient_investigationslist.validate = function() {
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
		<?php if ($patient_investigations_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->id->caption(), $patient_investigations->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_list->Investigation->Required) { ?>
			elm = this.getElements("x" + infix + "_Investigation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Investigation->caption(), $patient_investigations->Investigation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_list->Value->Required) { ?>
			elm = this.getElements("x" + infix + "_Value");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Value->caption(), $patient_investigations->Value->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_list->NormalRange->Required) { ?>
			elm = this.getElements("x" + infix + "_NormalRange");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->NormalRange->caption(), $patient_investigations->NormalRange->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_list->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->mrnno->caption(), $patient_investigations->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_list->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Age->caption(), $patient_investigations->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_list->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Gender->caption(), $patient_investigations->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_list->SampleCollected->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleCollected");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->SampleCollected->caption(), $patient_investigations->SampleCollected->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SampleCollected");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_investigations->SampleCollected->errorMessage()) ?>");
		<?php if ($patient_investigations_list->SampleCollectedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleCollectedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->SampleCollectedBy->caption(), $patient_investigations->SampleCollectedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_list->ResultedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->ResultedDate->caption(), $patient_investigations->ResultedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResultedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_investigations->ResultedDate->errorMessage()) ?>");
		<?php if ($patient_investigations_list->ResultedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->ResultedBy->caption(), $patient_investigations->ResultedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_list->Modified->Required) { ?>
			elm = this.getElements("x" + infix + "_Modified");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Modified->caption(), $patient_investigations->Modified->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Modified");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_investigations->Modified->errorMessage()) ?>");
		<?php if ($patient_investigations_list->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->ModifiedBy->caption(), $patient_investigations->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_list->Created->Required) { ?>
			elm = this.getElements("x" + infix + "_Created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Created->caption(), $patient_investigations->Created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_investigations->Created->errorMessage()) ?>");
		<?php if ($patient_investigations_list->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->CreatedBy->caption(), $patient_investigations->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_list->GroupHead->Required) { ?>
			elm = this.getElements("x" + infix + "_GroupHead");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->GroupHead->caption(), $patient_investigations->GroupHead->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_list->Cost->Required) { ?>
			elm = this.getElements("x" + infix + "_Cost");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Cost->caption(), $patient_investigations->Cost->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Cost");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_investigations->Cost->errorMessage()) ?>");
		<?php if ($patient_investigations_list->PaymentStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->PaymentStatus->caption(), $patient_investigations->PaymentStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_list->PayMode->Required) { ?>
			elm = this.getElements("x" + infix + "_PayMode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->PayMode->caption(), $patient_investigations->PayMode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_list->VoucherNo->Required) { ?>
			elm = this.getElements("x" + infix + "_VoucherNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->VoucherNo->caption(), $patient_investigations->VoucherNo->RequiredErrorMessage)) ?>");
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
fpatient_investigationslist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Investigation", false)) return false;
	if (ew.valueChanged(fobj, infix, "Value", false)) return false;
	if (ew.valueChanged(fobj, infix, "NormalRange", false)) return false;
	if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
	if (ew.valueChanged(fobj, infix, "Age", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
	if (ew.valueChanged(fobj, infix, "SampleCollected", false)) return false;
	if (ew.valueChanged(fobj, infix, "SampleCollectedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "ResultedDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "ResultedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "Modified", false)) return false;
	if (ew.valueChanged(fobj, infix, "ModifiedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "Created", false)) return false;
	if (ew.valueChanged(fobj, infix, "CreatedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "GroupHead", false)) return false;
	if (ew.valueChanged(fobj, infix, "Cost", false)) return false;
	if (ew.valueChanged(fobj, infix, "PaymentStatus", false)) return false;
	if (ew.valueChanged(fobj, infix, "PayMode", false)) return false;
	if (ew.valueChanged(fobj, infix, "VoucherNo", false)) return false;
	return true;
}

// Form_CustomValidate event
fpatient_investigationslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_investigationslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpatient_investigationslistsrch = currentSearchForm = new ew.Form("fpatient_investigationslistsrch");

// Filters
fpatient_investigationslistsrch.filterList = <?php echo $patient_investigations_list->getFilterList() ?>;
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
<?php if (!$patient_investigations->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_investigations_list->TotalRecs > 0 && $patient_investigations_list->ExportOptions->visible()) { ?>
<?php $patient_investigations_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_investigations_list->ImportOptions->visible()) { ?>
<?php $patient_investigations_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_investigations_list->SearchOptions->visible()) { ?>
<?php $patient_investigations_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_investigations_list->FilterOptions->visible()) { ?>
<?php $patient_investigations_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_investigations->isExport() || EXPORT_MASTER_RECORD && $patient_investigations->isExport("print")) { ?>
<?php
if ($patient_investigations_list->DbMasterFilter <> "" && $patient_investigations->getCurrentMasterTable() == "ip_admission") {
	if ($patient_investigations_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_investigations_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_investigations->isExport() && !$patient_investigations->CurrentAction) { ?>
<form name="fpatient_investigationslistsrch" id="fpatient_investigationslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_investigations_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_investigationslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_investigations">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_investigations_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_investigations_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_investigations_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_investigations_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_investigations_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_investigations_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_investigations_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_investigations_list->showPageHeader(); ?>
<?php
$patient_investigations_list->showMessage();
?>
<?php if ($patient_investigations_list->TotalRecs > 0 || $patient_investigations->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_investigations_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_investigations">
<?php if (!$patient_investigations->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_investigations->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_investigations_list->Pager)) $patient_investigations_list->Pager = new NumericPager($patient_investigations_list->StartRec, $patient_investigations_list->DisplayRecs, $patient_investigations_list->TotalRecs, $patient_investigations_list->RecRange, $patient_investigations_list->AutoHidePager) ?>
<?php if ($patient_investigations_list->Pager->RecordCount > 0 && $patient_investigations_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_investigations_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_investigations_list->pageUrl() ?>start=<?php echo $patient_investigations_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_investigations_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_investigations_list->pageUrl() ?>start=<?php echo $patient_investigations_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_investigations_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_investigations_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_investigations_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_investigations_list->pageUrl() ?>start=<?php echo $patient_investigations_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_investigations_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_investigations_list->pageUrl() ?>start=<?php echo $patient_investigations_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_investigations_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_investigations_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_investigations_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_investigations_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_investigations_list->TotalRecs > 0 && (!$patient_investigations_list->AutoHidePageSizeSelector || $patient_investigations_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_investigations">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_investigations_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_investigations_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_investigations_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_investigations_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_investigations_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_investigations_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_investigations->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_investigations_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_investigationslist" id="fpatient_investigationslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_investigations_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_investigations_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_investigations">
<?php if ($patient_investigations->getCurrentMasterTable() == "ip_admission" && $patient_investigations->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_investigations->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_investigations->PatientId->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_investigations->mrnno->getSessionValue() ?>">
<?php } ?>
<div id="gmp_patient_investigations" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_investigations_list->TotalRecs > 0 || $patient_investigations->isGridEdit()) { ?>
<table id="tbl_patient_investigationslist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_investigations_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_investigations_list->renderListOptions();

// Render list options (header, left)
$patient_investigations_list->ListOptions->render("header", "left", "", "block", $patient_investigations->TableVar, "patient_investigationslist");
?>
<?php if ($patient_investigations->id->Visible) { // id ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_investigations->id->headerCellClass() ?>"><div id="elh_patient_investigations_id" class="patient_investigations_id"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_id" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_investigations->id->headerCellClass() ?>"><script id="tpc_patient_investigations_id" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->id) ?>',1);"><div id="elh_patient_investigations_id" class="patient_investigations_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Investigation->Visible) { // Investigation ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->Investigation) == "") { ?>
		<th data-name="Investigation" class="<?php echo $patient_investigations->Investigation->headerCellClass() ?>"><div id="elh_patient_investigations_Investigation" class="patient_investigations_Investigation"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_Investigation" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->Investigation->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Investigation" class="<?php echo $patient_investigations->Investigation->headerCellClass() ?>"><script id="tpc_patient_investigations_Investigation" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->Investigation) ?>',1);"><div id="elh_patient_investigations_Investigation" class="patient_investigations_Investigation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->Investigation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->Investigation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->Investigation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Value->Visible) { // Value ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->Value) == "") { ?>
		<th data-name="Value" class="<?php echo $patient_investigations->Value->headerCellClass() ?>"><div id="elh_patient_investigations_Value" class="patient_investigations_Value"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_Value" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->Value->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Value" class="<?php echo $patient_investigations->Value->headerCellClass() ?>"><script id="tpc_patient_investigations_Value" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->Value) ?>',1);"><div id="elh_patient_investigations_Value" class="patient_investigations_Value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->Value->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->Value->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->Value->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->NormalRange->Visible) { // NormalRange ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->NormalRange) == "") { ?>
		<th data-name="NormalRange" class="<?php echo $patient_investigations->NormalRange->headerCellClass() ?>"><div id="elh_patient_investigations_NormalRange" class="patient_investigations_NormalRange"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_NormalRange" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->NormalRange->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="NormalRange" class="<?php echo $patient_investigations->NormalRange->headerCellClass() ?>"><script id="tpc_patient_investigations_NormalRange" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->NormalRange) ?>',1);"><div id="elh_patient_investigations_NormalRange" class="patient_investigations_NormalRange">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->NormalRange->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->NormalRange->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->NormalRange->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_investigations->mrnno->headerCellClass() ?>"><div id="elh_patient_investigations_mrnno" class="patient_investigations_mrnno"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_mrnno" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->mrnno->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_investigations->mrnno->headerCellClass() ?>"><script id="tpc_patient_investigations_mrnno" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->mrnno) ?>',1);"><div id="elh_patient_investigations_mrnno" class="patient_investigations_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Age->Visible) { // Age ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_investigations->Age->headerCellClass() ?>"><div id="elh_patient_investigations_Age" class="patient_investigations_Age"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_Age" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->Age->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_investigations->Age->headerCellClass() ?>"><script id="tpc_patient_investigations_Age" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->Age) ?>',1);"><div id="elh_patient_investigations_Age" class="patient_investigations_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Gender->Visible) { // Gender ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_investigations->Gender->headerCellClass() ?>"><div id="elh_patient_investigations_Gender" class="patient_investigations_Gender"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_Gender" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->Gender->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_investigations->Gender->headerCellClass() ?>"><script id="tpc_patient_investigations_Gender" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->Gender) ?>',1);"><div id="elh_patient_investigations_Gender" class="patient_investigations_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->SampleCollected->Visible) { // SampleCollected ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->SampleCollected) == "") { ?>
		<th data-name="SampleCollected" class="<?php echo $patient_investigations->SampleCollected->headerCellClass() ?>"><div id="elh_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_SampleCollected" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->SampleCollected->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="SampleCollected" class="<?php echo $patient_investigations->SampleCollected->headerCellClass() ?>"><script id="tpc_patient_investigations_SampleCollected" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->SampleCollected) ?>',1);"><div id="elh_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->SampleCollected->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->SampleCollected->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->SampleCollected->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->SampleCollectedBy) == "") { ?>
		<th data-name="SampleCollectedBy" class="<?php echo $patient_investigations->SampleCollectedBy->headerCellClass() ?>"><div id="elh_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_SampleCollectedBy" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->SampleCollectedBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="SampleCollectedBy" class="<?php echo $patient_investigations->SampleCollectedBy->headerCellClass() ?>"><script id="tpc_patient_investigations_SampleCollectedBy" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->SampleCollectedBy) ?>',1);"><div id="elh_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->SampleCollectedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->SampleCollectedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->SampleCollectedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->ResultedDate->Visible) { // ResultedDate ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->ResultedDate) == "") { ?>
		<th data-name="ResultedDate" class="<?php echo $patient_investigations->ResultedDate->headerCellClass() ?>"><div id="elh_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_ResultedDate" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->ResultedDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedDate" class="<?php echo $patient_investigations->ResultedDate->headerCellClass() ?>"><script id="tpc_patient_investigations_ResultedDate" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->ResultedDate) ?>',1);"><div id="elh_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->ResultedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->ResultedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->ResultedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $patient_investigations->ResultedBy->headerCellClass() ?>"><div id="elh_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_ResultedBy" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->ResultedBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $patient_investigations->ResultedBy->headerCellClass() ?>"><script id="tpc_patient_investigations_ResultedBy" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->ResultedBy) ?>',1);"><div id="elh_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->ResultedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->ResultedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->ResultedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Modified->Visible) { // Modified ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->Modified) == "") { ?>
		<th data-name="Modified" class="<?php echo $patient_investigations->Modified->headerCellClass() ?>"><div id="elh_patient_investigations_Modified" class="patient_investigations_Modified"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_Modified" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->Modified->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Modified" class="<?php echo $patient_investigations->Modified->headerCellClass() ?>"><script id="tpc_patient_investigations_Modified" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->Modified) ?>',1);"><div id="elh_patient_investigations_Modified" class="patient_investigations_Modified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->Modified->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->Modified->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->Modified->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $patient_investigations->ModifiedBy->headerCellClass() ?>"><div id="elh_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_ModifiedBy" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->ModifiedBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $patient_investigations->ModifiedBy->headerCellClass() ?>"><script id="tpc_patient_investigations_ModifiedBy" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->ModifiedBy) ?>',1);"><div id="elh_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->ModifiedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->ModifiedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->ModifiedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Created->Visible) { // Created ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->Created) == "") { ?>
		<th data-name="Created" class="<?php echo $patient_investigations->Created->headerCellClass() ?>"><div id="elh_patient_investigations_Created" class="patient_investigations_Created"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_Created" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->Created->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Created" class="<?php echo $patient_investigations->Created->headerCellClass() ?>"><script id="tpc_patient_investigations_Created" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->Created) ?>',1);"><div id="elh_patient_investigations_Created" class="patient_investigations_Created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->Created->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->Created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->Created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $patient_investigations->CreatedBy->headerCellClass() ?>"><div id="elh_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_CreatedBy" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->CreatedBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $patient_investigations->CreatedBy->headerCellClass() ?>"><script id="tpc_patient_investigations_CreatedBy" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->CreatedBy) ?>',1);"><div id="elh_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->CreatedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->CreatedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->CreatedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->GroupHead->Visible) { // GroupHead ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->GroupHead) == "") { ?>
		<th data-name="GroupHead" class="<?php echo $patient_investigations->GroupHead->headerCellClass() ?>"><div id="elh_patient_investigations_GroupHead" class="patient_investigations_GroupHead"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_GroupHead" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->GroupHead->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="GroupHead" class="<?php echo $patient_investigations->GroupHead->headerCellClass() ?>"><script id="tpc_patient_investigations_GroupHead" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->GroupHead) ?>',1);"><div id="elh_patient_investigations_GroupHead" class="patient_investigations_GroupHead">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->GroupHead->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->GroupHead->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->GroupHead->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Cost->Visible) { // Cost ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->Cost) == "") { ?>
		<th data-name="Cost" class="<?php echo $patient_investigations->Cost->headerCellClass() ?>"><div id="elh_patient_investigations_Cost" class="patient_investigations_Cost"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_Cost" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->Cost->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Cost" class="<?php echo $patient_investigations->Cost->headerCellClass() ?>"><script id="tpc_patient_investigations_Cost" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->Cost) ?>',1);"><div id="elh_patient_investigations_Cost" class="patient_investigations_Cost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->Cost->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->Cost->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->Cost->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $patient_investigations->PaymentStatus->headerCellClass() ?>"><div id="elh_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_PaymentStatus" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->PaymentStatus->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $patient_investigations->PaymentStatus->headerCellClass() ?>"><script id="tpc_patient_investigations_PaymentStatus" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->PaymentStatus) ?>',1);"><div id="elh_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->PaymentStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->PaymentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->PaymentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->PayMode->Visible) { // PayMode ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->PayMode) == "") { ?>
		<th data-name="PayMode" class="<?php echo $patient_investigations->PayMode->headerCellClass() ?>"><div id="elh_patient_investigations_PayMode" class="patient_investigations_PayMode"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_PayMode" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->PayMode->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PayMode" class="<?php echo $patient_investigations->PayMode->headerCellClass() ?>"><script id="tpc_patient_investigations_PayMode" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->PayMode) ?>',1);"><div id="elh_patient_investigations_PayMode" class="patient_investigations_PayMode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->PayMode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->PayMode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->PayMode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->VoucherNo->Visible) { // VoucherNo ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->VoucherNo) == "") { ?>
		<th data-name="VoucherNo" class="<?php echo $patient_investigations->VoucherNo->headerCellClass() ?>"><div id="elh_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_VoucherNo" class="patient_investigationslist" type="text/html"><span><?php echo $patient_investigations->VoucherNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="VoucherNo" class="<?php echo $patient_investigations->VoucherNo->headerCellClass() ?>"><script id="tpc_patient_investigations_VoucherNo" class="patient_investigationslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_investigations->SortUrl($patient_investigations->VoucherNo) ?>',1);"><div id="elh_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->VoucherNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->VoucherNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->VoucherNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_investigations_list->ListOptions->render("header", "right", "", "block", $patient_investigations->TableVar, "patient_investigationslist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_investigations->ExportAll && $patient_investigations->isExport()) {
	$patient_investigations_list->StopRec = $patient_investigations_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_investigations_list->TotalRecs > $patient_investigations_list->StartRec + $patient_investigations_list->DisplayRecs - 1)
		$patient_investigations_list->StopRec = $patient_investigations_list->StartRec + $patient_investigations_list->DisplayRecs - 1;
	else
		$patient_investigations_list->StopRec = $patient_investigations_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $patient_investigations_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_investigations_list->FormKeyCountName) && ($patient_investigations->isGridAdd() || $patient_investigations->isGridEdit() || $patient_investigations->isConfirm())) {
		$patient_investigations_list->KeyCount = $CurrentForm->getValue($patient_investigations_list->FormKeyCountName);
		$patient_investigations_list->StopRec = $patient_investigations_list->StartRec + $patient_investigations_list->KeyCount - 1;
	}
}
$patient_investigations_list->RecCnt = $patient_investigations_list->StartRec - 1;
if ($patient_investigations_list->Recordset && !$patient_investigations_list->Recordset->EOF) {
	$patient_investigations_list->Recordset->moveFirst();
	$selectLimit = $patient_investigations_list->UseSelectLimit;
	if (!$selectLimit && $patient_investigations_list->StartRec > 1)
		$patient_investigations_list->Recordset->move($patient_investigations_list->StartRec - 1);
} elseif (!$patient_investigations->AllowAddDeleteRow && $patient_investigations_list->StopRec == 0) {
	$patient_investigations_list->StopRec = $patient_investigations->GridAddRowCount;
}

// Initialize aggregate
$patient_investigations->RowType = ROWTYPE_AGGREGATEINIT;
$patient_investigations->resetAttributes();
$patient_investigations_list->renderRow();
if ($patient_investigations->isGridAdd())
	$patient_investigations_list->RowIndex = 0;
if ($patient_investigations->isGridEdit())
	$patient_investigations_list->RowIndex = 0;
while ($patient_investigations_list->RecCnt < $patient_investigations_list->StopRec) {
	$patient_investigations_list->RecCnt++;
	if ($patient_investigations_list->RecCnt >= $patient_investigations_list->StartRec) {
		$patient_investigations_list->RowCnt++;
		if ($patient_investigations->isGridAdd() || $patient_investigations->isGridEdit() || $patient_investigations->isConfirm()) {
			$patient_investigations_list->RowIndex++;
			$CurrentForm->Index = $patient_investigations_list->RowIndex;
			if ($CurrentForm->hasValue($patient_investigations_list->FormActionName) && $patient_investigations_list->EventCancelled)
				$patient_investigations_list->RowAction = strval($CurrentForm->getValue($patient_investigations_list->FormActionName));
			elseif ($patient_investigations->isGridAdd())
				$patient_investigations_list->RowAction = "insert";
			else
				$patient_investigations_list->RowAction = "";
		}

		// Set up key count
		$patient_investigations_list->KeyCount = $patient_investigations_list->RowIndex;

		// Init row class and style
		$patient_investigations->resetAttributes();
		$patient_investigations->CssClass = "";
		if ($patient_investigations->isGridAdd()) {
			$patient_investigations_list->loadRowValues(); // Load default values
		} else {
			$patient_investigations_list->loadRowValues($patient_investigations_list->Recordset); // Load row values
		}
		$patient_investigations->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_investigations->isGridAdd()) // Grid add
			$patient_investigations->RowType = ROWTYPE_ADD; // Render add
		if ($patient_investigations->isGridAdd() && $patient_investigations->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_investigations_list->restoreCurrentRowFormValues($patient_investigations_list->RowIndex); // Restore form values
		if ($patient_investigations->isGridEdit()) { // Grid edit
			if ($patient_investigations->EventCancelled)
				$patient_investigations_list->restoreCurrentRowFormValues($patient_investigations_list->RowIndex); // Restore form values
			if ($patient_investigations_list->RowAction == "insert")
				$patient_investigations->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_investigations->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_investigations->isGridEdit() && ($patient_investigations->RowType == ROWTYPE_EDIT || $patient_investigations->RowType == ROWTYPE_ADD) && $patient_investigations->EventCancelled) // Update failed
			$patient_investigations_list->restoreCurrentRowFormValues($patient_investigations_list->RowIndex); // Restore form values
		if ($patient_investigations->RowType == ROWTYPE_EDIT) // Edit row
			$patient_investigations_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$patient_investigations->RowAttrs = array_merge($patient_investigations->RowAttrs, array('data-rowindex'=>$patient_investigations_list->RowCnt, 'id'=>'r' . $patient_investigations_list->RowCnt . '_patient_investigations', 'data-rowtype'=>$patient_investigations->RowType));

		// Render row
		$patient_investigations_list->renderRow();

		// Render list options
		$patient_investigations_list->renderListOptions();

		// Save row and cell attributes
		$patient_investigations_list->Attrs[$patient_investigations_list->RowCnt] = array("row_attrs" => $patient_investigations->rowAttributes(), "cell_attrs" => array());
		$patient_investigations_list->Attrs[$patient_investigations_list->RowCnt]["cell_attrs"] = $patient_investigations->fieldCellAttributes();

		// Skip delete row / empty row for confirm page
		if ($patient_investigations_list->RowAction <> "delete" && $patient_investigations_list->RowAction <> "insertdelete" && !($patient_investigations_list->RowAction == "insert" && $patient_investigations->isConfirm() && $patient_investigations_list->emptyRow())) {
?>
	<tr<?php echo $patient_investigations->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_investigations_list->ListOptions->render("body", "left", $patient_investigations_list->RowCnt, "block", $patient_investigations->TableVar, "patient_investigationslist");
?>
	<?php if ($patient_investigations->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_investigations->id->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_id" class="patient_investigationslist" type="text/html"><span></span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="o<?php echo $patient_investigations_list->RowIndex ?>_id" id="o<?php echo $patient_investigations_list->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_id" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_id" class="form-group patient_investigations_id">
<span<?php echo $patient_investigations->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="x<?php echo $patient_investigations_list->RowIndex ?>_id" id="x<?php echo $patient_investigations_list->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_id" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_id" class="patient_investigations_id">
<span<?php echo $patient_investigations->id->viewAttributes() ?>>
<?php echo $patient_investigations->id->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->Investigation->Visible) { // Investigation ?>
		<td data-name="Investigation"<?php echo $patient_investigations->Investigation->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Investigation" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Investigation" class="form-group patient_investigations_Investigation">
<input type="text" data-table="patient_investigations" data-field="x_Investigation" name="x<?php echo $patient_investigations_list->RowIndex ?>_Investigation" id="x<?php echo $patient_investigations_list->RowIndex ?>_Investigation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Investigation->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Investigation->EditValue ?>"<?php echo $patient_investigations->Investigation->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" name="o<?php echo $patient_investigations_list->RowIndex ?>_Investigation" id="o<?php echo $patient_investigations_list->RowIndex ?>_Investigation" value="<?php echo HtmlEncode($patient_investigations->Investigation->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Investigation" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Investigation" class="form-group patient_investigations_Investigation">
<input type="text" data-table="patient_investigations" data-field="x_Investigation" name="x<?php echo $patient_investigations_list->RowIndex ?>_Investigation" id="x<?php echo $patient_investigations_list->RowIndex ?>_Investigation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Investigation->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Investigation->EditValue ?>"<?php echo $patient_investigations->Investigation->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Investigation" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Investigation" class="patient_investigations_Investigation">
<span<?php echo $patient_investigations->Investigation->viewAttributes() ?>>
<?php echo $patient_investigations->Investigation->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->Value->Visible) { // Value ?>
		<td data-name="Value"<?php echo $patient_investigations->Value->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Value" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Value" class="form-group patient_investigations_Value">
<input type="text" data-table="patient_investigations" data-field="x_Value" name="x<?php echo $patient_investigations_list->RowIndex ?>_Value" id="x<?php echo $patient_investigations_list->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Value->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Value->EditValue ?>"<?php echo $patient_investigations->Value->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" name="o<?php echo $patient_investigations_list->RowIndex ?>_Value" id="o<?php echo $patient_investigations_list->RowIndex ?>_Value" value="<?php echo HtmlEncode($patient_investigations->Value->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Value" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Value" class="form-group patient_investigations_Value">
<input type="text" data-table="patient_investigations" data-field="x_Value" name="x<?php echo $patient_investigations_list->RowIndex ?>_Value" id="x<?php echo $patient_investigations_list->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Value->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Value->EditValue ?>"<?php echo $patient_investigations->Value->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Value" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Value" class="patient_investigations_Value">
<span<?php echo $patient_investigations->Value->viewAttributes() ?>>
<?php echo $patient_investigations->Value->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->NormalRange->Visible) { // NormalRange ?>
		<td data-name="NormalRange"<?php echo $patient_investigations->NormalRange->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_NormalRange" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_NormalRange" class="form-group patient_investigations_NormalRange">
<input type="text" data-table="patient_investigations" data-field="x_NormalRange" name="x<?php echo $patient_investigations_list->RowIndex ?>_NormalRange" id="x<?php echo $patient_investigations_list->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->NormalRange->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->NormalRange->EditValue ?>"<?php echo $patient_investigations->NormalRange->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" name="o<?php echo $patient_investigations_list->RowIndex ?>_NormalRange" id="o<?php echo $patient_investigations_list->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($patient_investigations->NormalRange->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_NormalRange" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_NormalRange" class="form-group patient_investigations_NormalRange">
<input type="text" data-table="patient_investigations" data-field="x_NormalRange" name="x<?php echo $patient_investigations_list->RowIndex ?>_NormalRange" id="x<?php echo $patient_investigations_list->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->NormalRange->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->NormalRange->EditValue ?>"<?php echo $patient_investigations->NormalRange->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_NormalRange" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_NormalRange" class="patient_investigations_NormalRange">
<span<?php echo $patient_investigations->NormalRange->viewAttributes() ?>>
<?php echo $patient_investigations->NormalRange->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_investigations->mrnno->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_investigations->mrnno->getSessionValue() <> "") { ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_mrnno" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_mrnno" class="form-group patient_investigations_mrnno">
<span<?php echo $patient_investigations->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->mrnno->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x<?php echo $patient_investigations_list->RowIndex ?>_mrnno" name="x<?php echo $patient_investigations_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_mrnno" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_mrnno" class="form-group patient_investigations_mrnno">
<input type="text" data-table="patient_investigations" data-field="x_mrnno" name="x<?php echo $patient_investigations_list->RowIndex ?>_mrnno" id="x<?php echo $patient_investigations_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->mrnno->EditValue ?>"<?php echo $patient_investigations->mrnno->editAttributes() ?>>
</span>
</script>
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="o<?php echo $patient_investigations_list->RowIndex ?>_mrnno" id="o<?php echo $patient_investigations_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_mrnno" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_mrnno" class="form-group patient_investigations_mrnno">
<span<?php echo $patient_investigations->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->mrnno->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="x<?php echo $patient_investigations_list->RowIndex ?>_mrnno" id="x<?php echo $patient_investigations_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_mrnno" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_mrnno" class="patient_investigations_mrnno">
<span<?php echo $patient_investigations->mrnno->viewAttributes() ?>>
<?php echo $patient_investigations->mrnno->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_investigations->Age->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Age" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Age" class="form-group patient_investigations_Age">
<input type="text" data-table="patient_investigations" data-field="x_Age" name="x<?php echo $patient_investigations_list->RowIndex ?>_Age" id="x<?php echo $patient_investigations_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Age->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Age->EditValue ?>"<?php echo $patient_investigations->Age->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" name="o<?php echo $patient_investigations_list->RowIndex ?>_Age" id="o<?php echo $patient_investigations_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_investigations->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Age" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Age" class="form-group patient_investigations_Age">
<input type="text" data-table="patient_investigations" data-field="x_Age" name="x<?php echo $patient_investigations_list->RowIndex ?>_Age" id="x<?php echo $patient_investigations_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Age->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Age->EditValue ?>"<?php echo $patient_investigations->Age->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Age" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Age" class="patient_investigations_Age">
<span<?php echo $patient_investigations->Age->viewAttributes() ?>>
<?php echo $patient_investigations->Age->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_investigations->Gender->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Gender" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Gender" class="form-group patient_investigations_Gender">
<input type="text" data-table="patient_investigations" data-field="x_Gender" name="x<?php echo $patient_investigations_list->RowIndex ?>_Gender" id="x<?php echo $patient_investigations_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Gender->EditValue ?>"<?php echo $patient_investigations->Gender->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" name="o<?php echo $patient_investigations_list->RowIndex ?>_Gender" id="o<?php echo $patient_investigations_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_investigations->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Gender" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Gender" class="form-group patient_investigations_Gender">
<input type="text" data-table="patient_investigations" data-field="x_Gender" name="x<?php echo $patient_investigations_list->RowIndex ?>_Gender" id="x<?php echo $patient_investigations_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Gender->EditValue ?>"<?php echo $patient_investigations->Gender->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Gender" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Gender" class="patient_investigations_Gender">
<span<?php echo $patient_investigations->Gender->viewAttributes() ?>>
<?php echo $patient_investigations->Gender->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->SampleCollected->Visible) { // SampleCollected ?>
		<td data-name="SampleCollected"<?php echo $patient_investigations->SampleCollected->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_SampleCollected" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_SampleCollected" class="form-group patient_investigations_SampleCollected">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollected" id="x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollected" placeholder="<?php echo HtmlEncode($patient_investigations->SampleCollected->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->SampleCollected->EditValue ?>"<?php echo $patient_investigations->SampleCollected->editAttributes() ?>>
<?php if (!$patient_investigations->SampleCollected->ReadOnly && !$patient_investigations->SampleCollected->Disabled && !isset($patient_investigations->SampleCollected->EditAttrs["readonly"]) && !isset($patient_investigations->SampleCollected->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_investigationslist_js">
ew.createDateTimePicker("fpatient_investigationslist", "x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" name="o<?php echo $patient_investigations_list->RowIndex ?>_SampleCollected" id="o<?php echo $patient_investigations_list->RowIndex ?>_SampleCollected" value="<?php echo HtmlEncode($patient_investigations->SampleCollected->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_SampleCollected" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_SampleCollected" class="form-group patient_investigations_SampleCollected">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollected" id="x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollected" placeholder="<?php echo HtmlEncode($patient_investigations->SampleCollected->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->SampleCollected->EditValue ?>"<?php echo $patient_investigations->SampleCollected->editAttributes() ?>>
<?php if (!$patient_investigations->SampleCollected->ReadOnly && !$patient_investigations->SampleCollected->Disabled && !isset($patient_investigations->SampleCollected->EditAttrs["readonly"]) && !isset($patient_investigations->SampleCollected->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_investigationslist_js">
ew.createDateTimePicker("fpatient_investigationslist", "x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_SampleCollected" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected">
<span<?php echo $patient_investigations->SampleCollected->viewAttributes() ?>>
<?php echo $patient_investigations->SampleCollected->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
		<td data-name="SampleCollectedBy"<?php echo $patient_investigations->SampleCollectedBy->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_SampleCollectedBy" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_SampleCollectedBy" class="form-group patient_investigations_SampleCollectedBy">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollectedBy" id="x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollectedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->SampleCollectedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->SampleCollectedBy->EditValue ?>"<?php echo $patient_investigations->SampleCollectedBy->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="o<?php echo $patient_investigations_list->RowIndex ?>_SampleCollectedBy" id="o<?php echo $patient_investigations_list->RowIndex ?>_SampleCollectedBy" value="<?php echo HtmlEncode($patient_investigations->SampleCollectedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_SampleCollectedBy" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_SampleCollectedBy" class="form-group patient_investigations_SampleCollectedBy">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollectedBy" id="x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollectedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->SampleCollectedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->SampleCollectedBy->EditValue ?>"<?php echo $patient_investigations->SampleCollectedBy->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_SampleCollectedBy" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy">
<span<?php echo $patient_investigations->SampleCollectedBy->viewAttributes() ?>>
<?php echo $patient_investigations->SampleCollectedBy->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->ResultedDate->Visible) { // ResultedDate ?>
		<td data-name="ResultedDate"<?php echo $patient_investigations->ResultedDate->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ResultedDate" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ResultedDate" class="form-group patient_investigations_ResultedDate">
<input type="text" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?php echo $patient_investigations_list->RowIndex ?>_ResultedDate" id="x<?php echo $patient_investigations_list->RowIndex ?>_ResultedDate" placeholder="<?php echo HtmlEncode($patient_investigations->ResultedDate->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ResultedDate->EditValue ?>"<?php echo $patient_investigations->ResultedDate->editAttributes() ?>>
<?php if (!$patient_investigations->ResultedDate->ReadOnly && !$patient_investigations->ResultedDate->Disabled && !isset($patient_investigations->ResultedDate->EditAttrs["readonly"]) && !isset($patient_investigations->ResultedDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_investigationslist_js">
ew.createDateTimePicker("fpatient_investigationslist", "x<?php echo $patient_investigations_list->RowIndex ?>_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" name="o<?php echo $patient_investigations_list->RowIndex ?>_ResultedDate" id="o<?php echo $patient_investigations_list->RowIndex ?>_ResultedDate" value="<?php echo HtmlEncode($patient_investigations->ResultedDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ResultedDate" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ResultedDate" class="form-group patient_investigations_ResultedDate">
<input type="text" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?php echo $patient_investigations_list->RowIndex ?>_ResultedDate" id="x<?php echo $patient_investigations_list->RowIndex ?>_ResultedDate" placeholder="<?php echo HtmlEncode($patient_investigations->ResultedDate->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ResultedDate->EditValue ?>"<?php echo $patient_investigations->ResultedDate->editAttributes() ?>>
<?php if (!$patient_investigations->ResultedDate->ReadOnly && !$patient_investigations->ResultedDate->Disabled && !isset($patient_investigations->ResultedDate->EditAttrs["readonly"]) && !isset($patient_investigations->ResultedDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_investigationslist_js">
ew.createDateTimePicker("fpatient_investigationslist", "x<?php echo $patient_investigations_list->RowIndex ?>_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ResultedDate" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate">
<span<?php echo $patient_investigations->ResultedDate->viewAttributes() ?>>
<?php echo $patient_investigations->ResultedDate->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy"<?php echo $patient_investigations->ResultedBy->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ResultedBy" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ResultedBy" class="form-group patient_investigations_ResultedBy">
<input type="text" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?php echo $patient_investigations_list->RowIndex ?>_ResultedBy" id="x<?php echo $patient_investigations_list->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ResultedBy->EditValue ?>"<?php echo $patient_investigations->ResultedBy->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" name="o<?php echo $patient_investigations_list->RowIndex ?>_ResultedBy" id="o<?php echo $patient_investigations_list->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_investigations->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ResultedBy" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ResultedBy" class="form-group patient_investigations_ResultedBy">
<input type="text" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?php echo $patient_investigations_list->RowIndex ?>_ResultedBy" id="x<?php echo $patient_investigations_list->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ResultedBy->EditValue ?>"<?php echo $patient_investigations->ResultedBy->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ResultedBy" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy">
<span<?php echo $patient_investigations->ResultedBy->viewAttributes() ?>>
<?php echo $patient_investigations->ResultedBy->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->Modified->Visible) { // Modified ?>
		<td data-name="Modified"<?php echo $patient_investigations->Modified->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Modified" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Modified" class="form-group patient_investigations_Modified">
<input type="text" data-table="patient_investigations" data-field="x_Modified" name="x<?php echo $patient_investigations_list->RowIndex ?>_Modified" id="x<?php echo $patient_investigations_list->RowIndex ?>_Modified" placeholder="<?php echo HtmlEncode($patient_investigations->Modified->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Modified->EditValue ?>"<?php echo $patient_investigations->Modified->editAttributes() ?>>
<?php if (!$patient_investigations->Modified->ReadOnly && !$patient_investigations->Modified->Disabled && !isset($patient_investigations->Modified->EditAttrs["readonly"]) && !isset($patient_investigations->Modified->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_investigationslist_js">
ew.createDateTimePicker("fpatient_investigationslist", "x<?php echo $patient_investigations_list->RowIndex ?>_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" name="o<?php echo $patient_investigations_list->RowIndex ?>_Modified" id="o<?php echo $patient_investigations_list->RowIndex ?>_Modified" value="<?php echo HtmlEncode($patient_investigations->Modified->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Modified" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Modified" class="form-group patient_investigations_Modified">
<input type="text" data-table="patient_investigations" data-field="x_Modified" name="x<?php echo $patient_investigations_list->RowIndex ?>_Modified" id="x<?php echo $patient_investigations_list->RowIndex ?>_Modified" placeholder="<?php echo HtmlEncode($patient_investigations->Modified->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Modified->EditValue ?>"<?php echo $patient_investigations->Modified->editAttributes() ?>>
<?php if (!$patient_investigations->Modified->ReadOnly && !$patient_investigations->Modified->Disabled && !isset($patient_investigations->Modified->EditAttrs["readonly"]) && !isset($patient_investigations->Modified->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_investigationslist_js">
ew.createDateTimePicker("fpatient_investigationslist", "x<?php echo $patient_investigations_list->RowIndex ?>_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Modified" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Modified" class="patient_investigations_Modified">
<span<?php echo $patient_investigations->Modified->viewAttributes() ?>>
<?php echo $patient_investigations->Modified->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy"<?php echo $patient_investigations->ModifiedBy->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ModifiedBy" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ModifiedBy" class="form-group patient_investigations_ModifiedBy">
<input type="text" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?php echo $patient_investigations_list->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_investigations_list->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ModifiedBy->EditValue ?>"<?php echo $patient_investigations->ModifiedBy->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" name="o<?php echo $patient_investigations_list->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_investigations_list->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_investigations->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ModifiedBy" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ModifiedBy" class="form-group patient_investigations_ModifiedBy">
<input type="text" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?php echo $patient_investigations_list->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_investigations_list->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ModifiedBy->EditValue ?>"<?php echo $patient_investigations->ModifiedBy->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ModifiedBy" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy">
<span<?php echo $patient_investigations->ModifiedBy->viewAttributes() ?>>
<?php echo $patient_investigations->ModifiedBy->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->Created->Visible) { // Created ?>
		<td data-name="Created"<?php echo $patient_investigations->Created->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Created" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Created" class="form-group patient_investigations_Created">
<input type="text" data-table="patient_investigations" data-field="x_Created" name="x<?php echo $patient_investigations_list->RowIndex ?>_Created" id="x<?php echo $patient_investigations_list->RowIndex ?>_Created" placeholder="<?php echo HtmlEncode($patient_investigations->Created->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Created->EditValue ?>"<?php echo $patient_investigations->Created->editAttributes() ?>>
<?php if (!$patient_investigations->Created->ReadOnly && !$patient_investigations->Created->Disabled && !isset($patient_investigations->Created->EditAttrs["readonly"]) && !isset($patient_investigations->Created->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_investigationslist_js">
ew.createDateTimePicker("fpatient_investigationslist", "x<?php echo $patient_investigations_list->RowIndex ?>_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" name="o<?php echo $patient_investigations_list->RowIndex ?>_Created" id="o<?php echo $patient_investigations_list->RowIndex ?>_Created" value="<?php echo HtmlEncode($patient_investigations->Created->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Created" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Created" class="form-group patient_investigations_Created">
<input type="text" data-table="patient_investigations" data-field="x_Created" name="x<?php echo $patient_investigations_list->RowIndex ?>_Created" id="x<?php echo $patient_investigations_list->RowIndex ?>_Created" placeholder="<?php echo HtmlEncode($patient_investigations->Created->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Created->EditValue ?>"<?php echo $patient_investigations->Created->editAttributes() ?>>
<?php if (!$patient_investigations->Created->ReadOnly && !$patient_investigations->Created->Disabled && !isset($patient_investigations->Created->EditAttrs["readonly"]) && !isset($patient_investigations->Created->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_investigationslist_js">
ew.createDateTimePicker("fpatient_investigationslist", "x<?php echo $patient_investigations_list->RowIndex ?>_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Created" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Created" class="patient_investigations_Created">
<span<?php echo $patient_investigations->Created->viewAttributes() ?>>
<?php echo $patient_investigations->Created->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy"<?php echo $patient_investigations->CreatedBy->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_CreatedBy" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_CreatedBy" class="form-group patient_investigations_CreatedBy">
<input type="text" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?php echo $patient_investigations_list->RowIndex ?>_CreatedBy" id="x<?php echo $patient_investigations_list->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->CreatedBy->EditValue ?>"<?php echo $patient_investigations->CreatedBy->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" name="o<?php echo $patient_investigations_list->RowIndex ?>_CreatedBy" id="o<?php echo $patient_investigations_list->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_investigations->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_CreatedBy" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_CreatedBy" class="form-group patient_investigations_CreatedBy">
<input type="text" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?php echo $patient_investigations_list->RowIndex ?>_CreatedBy" id="x<?php echo $patient_investigations_list->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->CreatedBy->EditValue ?>"<?php echo $patient_investigations->CreatedBy->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_CreatedBy" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy">
<span<?php echo $patient_investigations->CreatedBy->viewAttributes() ?>>
<?php echo $patient_investigations->CreatedBy->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->GroupHead->Visible) { // GroupHead ?>
		<td data-name="GroupHead"<?php echo $patient_investigations->GroupHead->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_GroupHead" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_GroupHead" class="form-group patient_investigations_GroupHead">
<input type="text" data-table="patient_investigations" data-field="x_GroupHead" name="x<?php echo $patient_investigations_list->RowIndex ?>_GroupHead" id="x<?php echo $patient_investigations_list->RowIndex ?>_GroupHead" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($patient_investigations->GroupHead->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->GroupHead->EditValue ?>"<?php echo $patient_investigations->GroupHead->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" name="o<?php echo $patient_investigations_list->RowIndex ?>_GroupHead" id="o<?php echo $patient_investigations_list->RowIndex ?>_GroupHead" value="<?php echo HtmlEncode($patient_investigations->GroupHead->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_GroupHead" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_GroupHead" class="form-group patient_investigations_GroupHead">
<input type="text" data-table="patient_investigations" data-field="x_GroupHead" name="x<?php echo $patient_investigations_list->RowIndex ?>_GroupHead" id="x<?php echo $patient_investigations_list->RowIndex ?>_GroupHead" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($patient_investigations->GroupHead->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->GroupHead->EditValue ?>"<?php echo $patient_investigations->GroupHead->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_GroupHead" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_GroupHead" class="patient_investigations_GroupHead">
<span<?php echo $patient_investigations->GroupHead->viewAttributes() ?>>
<?php echo $patient_investigations->GroupHead->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->Cost->Visible) { // Cost ?>
		<td data-name="Cost"<?php echo $patient_investigations->Cost->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Cost" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Cost" class="form-group patient_investigations_Cost">
<input type="text" data-table="patient_investigations" data-field="x_Cost" name="x<?php echo $patient_investigations_list->RowIndex ?>_Cost" id="x<?php echo $patient_investigations_list->RowIndex ?>_Cost" size="30" placeholder="<?php echo HtmlEncode($patient_investigations->Cost->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Cost->EditValue ?>"<?php echo $patient_investigations->Cost->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" name="o<?php echo $patient_investigations_list->RowIndex ?>_Cost" id="o<?php echo $patient_investigations_list->RowIndex ?>_Cost" value="<?php echo HtmlEncode($patient_investigations->Cost->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Cost" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Cost" class="form-group patient_investigations_Cost">
<input type="text" data-table="patient_investigations" data-field="x_Cost" name="x<?php echo $patient_investigations_list->RowIndex ?>_Cost" id="x<?php echo $patient_investigations_list->RowIndex ?>_Cost" size="30" placeholder="<?php echo HtmlEncode($patient_investigations->Cost->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Cost->EditValue ?>"<?php echo $patient_investigations->Cost->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Cost" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_Cost" class="patient_investigations_Cost">
<span<?php echo $patient_investigations->Cost->viewAttributes() ?>>
<?php echo $patient_investigations->Cost->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus"<?php echo $patient_investigations->PaymentStatus->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_PaymentStatus" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_PaymentStatus" class="form-group patient_investigations_PaymentStatus">
<input type="text" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?php echo $patient_investigations_list->RowIndex ?>_PaymentStatus" id="x<?php echo $patient_investigations_list->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->PaymentStatus->EditValue ?>"<?php echo $patient_investigations->PaymentStatus->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" name="o<?php echo $patient_investigations_list->RowIndex ?>_PaymentStatus" id="o<?php echo $patient_investigations_list->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($patient_investigations->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_PaymentStatus" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_PaymentStatus" class="form-group patient_investigations_PaymentStatus">
<input type="text" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?php echo $patient_investigations_list->RowIndex ?>_PaymentStatus" id="x<?php echo $patient_investigations_list->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->PaymentStatus->EditValue ?>"<?php echo $patient_investigations->PaymentStatus->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_PaymentStatus" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus">
<span<?php echo $patient_investigations->PaymentStatus->viewAttributes() ?>>
<?php echo $patient_investigations->PaymentStatus->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->PayMode->Visible) { // PayMode ?>
		<td data-name="PayMode"<?php echo $patient_investigations->PayMode->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_PayMode" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_PayMode" class="form-group patient_investigations_PayMode">
<input type="text" data-table="patient_investigations" data-field="x_PayMode" name="x<?php echo $patient_investigations_list->RowIndex ?>_PayMode" id="x<?php echo $patient_investigations_list->RowIndex ?>_PayMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->PayMode->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->PayMode->EditValue ?>"<?php echo $patient_investigations->PayMode->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" name="o<?php echo $patient_investigations_list->RowIndex ?>_PayMode" id="o<?php echo $patient_investigations_list->RowIndex ?>_PayMode" value="<?php echo HtmlEncode($patient_investigations->PayMode->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_PayMode" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_PayMode" class="form-group patient_investigations_PayMode">
<input type="text" data-table="patient_investigations" data-field="x_PayMode" name="x<?php echo $patient_investigations_list->RowIndex ?>_PayMode" id="x<?php echo $patient_investigations_list->RowIndex ?>_PayMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->PayMode->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->PayMode->EditValue ?>"<?php echo $patient_investigations->PayMode->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_PayMode" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_PayMode" class="patient_investigations_PayMode">
<span<?php echo $patient_investigations->PayMode->viewAttributes() ?>>
<?php echo $patient_investigations->PayMode->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->VoucherNo->Visible) { // VoucherNo ?>
		<td data-name="VoucherNo"<?php echo $patient_investigations->VoucherNo->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_VoucherNo" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_VoucherNo" class="form-group patient_investigations_VoucherNo">
<input type="text" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?php echo $patient_investigations_list->RowIndex ?>_VoucherNo" id="x<?php echo $patient_investigations_list->RowIndex ?>_VoucherNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->VoucherNo->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->VoucherNo->EditValue ?>"<?php echo $patient_investigations->VoucherNo->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" name="o<?php echo $patient_investigations_list->RowIndex ?>_VoucherNo" id="o<?php echo $patient_investigations_list->RowIndex ?>_VoucherNo" value="<?php echo HtmlEncode($patient_investigations->VoucherNo->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_VoucherNo" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_VoucherNo" class="form-group patient_investigations_VoucherNo">
<input type="text" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?php echo $patient_investigations_list->RowIndex ?>_VoucherNo" id="x<?php echo $patient_investigations_list->RowIndex ?>_VoucherNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->VoucherNo->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->VoucherNo->EditValue ?>"<?php echo $patient_investigations->VoucherNo->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_VoucherNo" class="patient_investigationslist" type="text/html">
<span id="el<?php echo $patient_investigations_list->RowCnt ?>_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo">
<span<?php echo $patient_investigations->VoucherNo->viewAttributes() ?>>
<?php echo $patient_investigations->VoucherNo->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_investigations_list->ListOptions->render("body", "right", $patient_investigations_list->RowCnt, "block", $patient_investigations->TableVar, "patient_investigationslist");
?>
	</tr>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD || $patient_investigations->RowType == ROWTYPE_EDIT) { ?>
<script class="patient_investigationslist_js" type="text/html">
fpatient_investigationslist.updateLists(<?php echo $patient_investigations_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_investigations->isGridAdd())
		if (!$patient_investigations_list->Recordset->EOF)
			$patient_investigations_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($patient_investigations->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $patient_investigations_list->FormKeyCountName ?>" id="<?php echo $patient_investigations_list->FormKeyCountName ?>" value="<?php echo $patient_investigations_list->KeyCount ?>">
<?php echo $patient_investigations_list->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_investigations->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $patient_investigations_list->FormKeyCountName ?>" id="<?php echo $patient_investigations_list->FormKeyCountName ?>" value="<?php echo $patient_investigations_list->KeyCount ?>">
<?php echo $patient_investigations_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$patient_investigations->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_patient_investigationslist" class="ew-custom-template"></div>
<script id="tpm_patient_investigationslist" type="text/html">
<div id="ct_patient_investigations_list"><?php if ($patient_investigations_list->RowCnt > 0) { ?>
<div style="overflow-x:auto;">
<table class="ew-table">
	<thead>
		<tr class="ew-table-header">
			<td class="text-center" >{{include tmpl="#tpc_patient_investigations_Investigation"/}}</td>
		</tr>    
	</thead> 
<tbody>
<?php for ($i = $patient_investigations_list->StartRowCnt; $i <= $patient_investigations_list->RowCnt; $i++) { ?>
<tr<?php echo @$patient_investigations_list->Attrs[$i]['row_attrs'] ?>>
	 <td>{{include tmpl="#tpx<?php echo $i ?>_patient_investigations_Investigation"/}}</td>
</tr>
<?php } ?>
<?php if ($patient_investigations_list->TotalRecs > 0 && !$patient_investigations->isGridAdd() && !$patient_investigations->isGridEdit()) { ?>
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
if ($patient_investigations_list->Recordset)
	$patient_investigations_list->Recordset->Close();
?>
<?php if (!$patient_investigations->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_investigations->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_investigations_list->Pager)) $patient_investigations_list->Pager = new NumericPager($patient_investigations_list->StartRec, $patient_investigations_list->DisplayRecs, $patient_investigations_list->TotalRecs, $patient_investigations_list->RecRange, $patient_investigations_list->AutoHidePager) ?>
<?php if ($patient_investigations_list->Pager->RecordCount > 0 && $patient_investigations_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_investigations_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_investigations_list->pageUrl() ?>start=<?php echo $patient_investigations_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_investigations_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_investigations_list->pageUrl() ?>start=<?php echo $patient_investigations_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_investigations_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_investigations_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_investigations_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_investigations_list->pageUrl() ?>start=<?php echo $patient_investigations_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_investigations_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_investigations_list->pageUrl() ?>start=<?php echo $patient_investigations_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_investigations_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_investigations_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_investigations_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_investigations_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_investigations_list->TotalRecs > 0 && (!$patient_investigations_list->AutoHidePageSizeSelector || $patient_investigations_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_investigations">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_investigations_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_investigations_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_investigations_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_investigations_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_investigations_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_investigations_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_investigations->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_investigations_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_investigations_list->TotalRecs == 0 && !$patient_investigations->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_investigations_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_investigations->Rows) ?> };
ew.applyTemplate("tpd_patient_investigationslist", "tpm_patient_investigationslist", "patient_investigationslist", "<?php echo $patient_investigations->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_patient_investigationslist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_patient_investigationslist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.patient_investigationslist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_investigations_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_investigations->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$patient_investigations->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_investigations", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_investigations_list->terminate();
?>