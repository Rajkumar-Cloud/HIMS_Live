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
$patient_opd_follow_up_list = new patient_opd_follow_up_list();

// Run the page
$patient_opd_follow_up_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_opd_follow_up_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_opd_follow_up->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_opd_follow_uplist = currentForm = new ew.Form("fpatient_opd_follow_uplist", "list");
fpatient_opd_follow_uplist.formKeyCountName = '<?php echo $patient_opd_follow_up_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpatient_opd_follow_uplist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_opd_follow_uplist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_opd_follow_uplist.lists["x_ICSIAdvised[]"] = <?php echo $patient_opd_follow_up_list->ICSIAdvised->Lookup->toClientList() ?>;
fpatient_opd_follow_uplist.lists["x_ICSIAdvised[]"].options = <?php echo JsonEncode($patient_opd_follow_up_list->ICSIAdvised->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_uplist.lists["x_DeliveryRegistered[]"] = <?php echo $patient_opd_follow_up_list->DeliveryRegistered->Lookup->toClientList() ?>;
fpatient_opd_follow_uplist.lists["x_DeliveryRegistered[]"].options = <?php echo JsonEncode($patient_opd_follow_up_list->DeliveryRegistered->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_uplist.lists["x_SerologyPositive[]"] = <?php echo $patient_opd_follow_up_list->SerologyPositive->Lookup->toClientList() ?>;
fpatient_opd_follow_uplist.lists["x_SerologyPositive[]"].options = <?php echo JsonEncode($patient_opd_follow_up_list->SerologyPositive->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_uplist.lists["x_Allergy"] = <?php echo $patient_opd_follow_up_list->Allergy->Lookup->toClientList() ?>;
fpatient_opd_follow_uplist.lists["x_Allergy"].options = <?php echo JsonEncode($patient_opd_follow_up_list->Allergy->lookupOptions()) ?>;
fpatient_opd_follow_uplist.autoSuggests["x_Allergy"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_opd_follow_uplist.lists["x_status"] = <?php echo $patient_opd_follow_up_list->status->Lookup->toClientList() ?>;
fpatient_opd_follow_uplist.lists["x_status"].options = <?php echo JsonEncode($patient_opd_follow_up_list->status->lookupOptions()) ?>;
fpatient_opd_follow_uplist.lists["x_reportheader[]"] = <?php echo $patient_opd_follow_up_list->reportheader->Lookup->toClientList() ?>;
fpatient_opd_follow_uplist.lists["x_reportheader[]"].options = <?php echo JsonEncode($patient_opd_follow_up_list->reportheader->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_uplist.lists["x_DrName"] = <?php echo $patient_opd_follow_up_list->DrName->Lookup->toClientList() ?>;
fpatient_opd_follow_uplist.lists["x_DrName"].options = <?php echo JsonEncode($patient_opd_follow_up_list->DrName->lookupOptions()) ?>;

// Form object for search
var fpatient_opd_follow_uplistsrch = currentSearchForm = new ew.Form("fpatient_opd_follow_uplistsrch");

// Validate function for search
fpatient_opd_follow_uplistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->createddatetime->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fpatient_opd_follow_uplistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_opd_follow_uplistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fpatient_opd_follow_uplistsrch.filterList = <?php echo $patient_opd_follow_up_list->getFilterList() ?>;
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
<?php if (!$patient_opd_follow_up->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_opd_follow_up_list->TotalRecs > 0 && $patient_opd_follow_up_list->ExportOptions->visible()) { ?>
<?php $patient_opd_follow_up_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->ImportOptions->visible()) { ?>
<?php $patient_opd_follow_up_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->SearchOptions->visible()) { ?>
<?php $patient_opd_follow_up_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->FilterOptions->visible()) { ?>
<?php $patient_opd_follow_up_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$patient_opd_follow_up_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_opd_follow_up->isExport() && !$patient_opd_follow_up->CurrentAction) { ?>
<form name="fpatient_opd_follow_uplistsrch" id="fpatient_opd_follow_uplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_opd_follow_up_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_opd_follow_uplistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_opd_follow_up">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$patient_opd_follow_up_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$patient_opd_follow_up->RowType = ROWTYPE_SEARCH;

// Render row
$patient_opd_follow_up->resetAttributes();
$patient_opd_follow_up_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($patient_opd_follow_up->PatID->Visible) { // PatID ?>
	<div id="xsc_PatID" class="ew-cell form-group">
		<label for="x_PatID" class="ew-search-caption ew-label"><?php echo $patient_opd_follow_up->PatID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatID" id="z_PatID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->PatID->EditValue ?>"<?php echo $patient_opd_follow_up->PatID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $patient_opd_follow_up->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->PatientName->EditValue ?>"<?php echo $patient_opd_follow_up->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($patient_opd_follow_up->MobileNumber->Visible) { // MobileNumber ?>
	<div id="xsc_MobileNumber" class="ew-cell form-group">
		<label for="x_MobileNumber" class="ew-search-caption ew-label"><?php echo $patient_opd_follow_up->MobileNumber->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->MobileNumber->EditValue ?>"<?php echo $patient_opd_follow_up->MobileNumber->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $patient_opd_follow_up->createddatetime->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createddatetime" id="z_createddatetime" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->createddatetime->EditValue ?>"<?php echo $patient_opd_follow_up->createddatetime->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->createddatetime->ReadOnly && !$patient_opd_follow_up->createddatetime->Disabled && !isset($patient_opd_follow_up->createddatetime->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_uplistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createddatetime style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createddatetime style="d-none"">
<input type="text" data-table="patient_opd_follow_up" data-field="x_createddatetime" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->createddatetime->EditValue2 ?>"<?php echo $patient_opd_follow_up->createddatetime->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->createddatetime->ReadOnly && !$patient_opd_follow_up->createddatetime->Disabled && !isset($patient_opd_follow_up->createddatetime->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_uplistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($patient_opd_follow_up->createdUserName->Visible) { // createdUserName ?>
	<div id="xsc_createdUserName" class="ew-cell form-group">
		<label for="x_createdUserName" class="ew-search-caption ew-label"><?php echo $patient_opd_follow_up->createdUserName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_createdUserName" id="z_createdUserName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_createdUserName" name="x_createdUserName" id="x_createdUserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->createdUserName->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->createdUserName->EditValue ?>"<?php echo $patient_opd_follow_up->createdUserName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_opd_follow_up_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_opd_follow_up_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_opd_follow_up_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_opd_follow_up_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_opd_follow_up_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_opd_follow_up_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_opd_follow_up_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_opd_follow_up_list->showPageHeader(); ?>
<?php
$patient_opd_follow_up_list->showMessage();
?>
<?php if ($patient_opd_follow_up_list->TotalRecs > 0 || $patient_opd_follow_up->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_opd_follow_up_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_opd_follow_up">
<?php if (!$patient_opd_follow_up->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_opd_follow_up->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_opd_follow_up_list->Pager)) $patient_opd_follow_up_list->Pager = new NumericPager($patient_opd_follow_up_list->StartRec, $patient_opd_follow_up_list->DisplayRecs, $patient_opd_follow_up_list->TotalRecs, $patient_opd_follow_up_list->RecRange, $patient_opd_follow_up_list->AutoHidePager) ?>
<?php if ($patient_opd_follow_up_list->Pager->RecordCount > 0 && $patient_opd_follow_up_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_opd_follow_up_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_opd_follow_up_list->pageUrl() ?>start=<?php echo $patient_opd_follow_up_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_opd_follow_up_list->pageUrl() ?>start=<?php echo $patient_opd_follow_up_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_opd_follow_up_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_opd_follow_up_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_opd_follow_up_list->pageUrl() ?>start=<?php echo $patient_opd_follow_up_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_opd_follow_up_list->pageUrl() ?>start=<?php echo $patient_opd_follow_up_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_opd_follow_up_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_opd_follow_up_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_opd_follow_up_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_opd_follow_up_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_opd_follow_up_list->TotalRecs > 0 && (!$patient_opd_follow_up_list->AutoHidePageSizeSelector || $patient_opd_follow_up_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_opd_follow_up">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_opd_follow_up_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_opd_follow_up_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_opd_follow_up_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_opd_follow_up_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_opd_follow_up_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_opd_follow_up_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_opd_follow_up->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_opd_follow_up_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_opd_follow_uplist" id="fpatient_opd_follow_uplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_opd_follow_up_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_opd_follow_up_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<div id="gmp_patient_opd_follow_up" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_opd_follow_up_list->TotalRecs > 0 || $patient_opd_follow_up->isGridEdit()) { ?>
<table id="tbl_patient_opd_follow_uplist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_opd_follow_up_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_opd_follow_up_list->renderListOptions();

// Render list options (header, left)
$patient_opd_follow_up_list->ListOptions->render("header", "left");
?>
<?php if ($patient_opd_follow_up->id->Visible) { // id ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_opd_follow_up->id->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_id" class="patient_opd_follow_up_id"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_opd_follow_up->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->id) ?>',1);"><div id="elh_patient_opd_follow_up_id" class="patient_opd_follow_up_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->PatID->Visible) { // PatID ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_opd_follow_up->PatID->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_PatID" class="patient_opd_follow_up_PatID"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_opd_follow_up->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->PatID) ?>',1);"><div id="elh_patient_opd_follow_up_PatID" class="patient_opd_follow_up_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->PatID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_opd_follow_up->PatientName->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_PatientName" class="patient_opd_follow_up_PatientName"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_opd_follow_up->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->PatientName) ?>',1);"><div id="elh_patient_opd_follow_up_PatientName" class="patient_opd_follow_up_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_opd_follow_up->MobileNumber->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_MobileNumber" class="patient_opd_follow_up_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_opd_follow_up->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->MobileNumber) ?>',1);"><div id="elh_patient_opd_follow_up_MobileNumber" class="patient_opd_follow_up_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->Gender->Visible) { // Gender ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_opd_follow_up->Gender->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_Gender" class="patient_opd_follow_up_Gender"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_opd_follow_up->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->Gender) ?>',1);"><div id="elh_patient_opd_follow_up_Gender" class="patient_opd_follow_up_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->NextReviewDate) == "") { ?>
		<th data-name="NextReviewDate" class="<?php echo $patient_opd_follow_up->NextReviewDate->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_up_NextReviewDate"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->NextReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NextReviewDate" class="<?php echo $patient_opd_follow_up->NextReviewDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->NextReviewDate) ?>',1);"><div id="elh_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_up_NextReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->NextReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->NextReviewDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->NextReviewDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->ICSIAdvised) == "") { ?>
		<th data-name="ICSIAdvised" class="<?php echo $patient_opd_follow_up->ICSIAdvised->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_up_ICSIAdvised"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->ICSIAdvised->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIAdvised" class="<?php echo $patient_opd_follow_up->ICSIAdvised->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->ICSIAdvised) ?>',1);"><div id="elh_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_up_ICSIAdvised">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->ICSIAdvised->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->ICSIAdvised->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->ICSIAdvised->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->DeliveryRegistered) == "") { ?>
		<th data-name="DeliveryRegistered" class="<?php echo $patient_opd_follow_up->DeliveryRegistered->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_up_DeliveryRegistered"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->DeliveryRegistered->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryRegistered" class="<?php echo $patient_opd_follow_up->DeliveryRegistered->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->DeliveryRegistered) ?>',1);"><div id="elh_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_up_DeliveryRegistered">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->DeliveryRegistered->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->DeliveryRegistered->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->DeliveryRegistered->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->EDD->Visible) { // EDD ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->EDD) == "") { ?>
		<th data-name="EDD" class="<?php echo $patient_opd_follow_up->EDD->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_EDD" class="patient_opd_follow_up_EDD"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->EDD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EDD" class="<?php echo $patient_opd_follow_up->EDD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->EDD) ?>',1);"><div id="elh_patient_opd_follow_up_EDD" class="patient_opd_follow_up_EDD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->EDD->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->EDD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->EDD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->SerologyPositive) == "") { ?>
		<th data-name="SerologyPositive" class="<?php echo $patient_opd_follow_up->SerologyPositive->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_up_SerologyPositive"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->SerologyPositive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SerologyPositive" class="<?php echo $patient_opd_follow_up->SerologyPositive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->SerologyPositive) ?>',1);"><div id="elh_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_up_SerologyPositive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->SerologyPositive->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->SerologyPositive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->SerologyPositive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->Allergy->Visible) { // Allergy ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->Allergy) == "") { ?>
		<th data-name="Allergy" class="<?php echo $patient_opd_follow_up->Allergy->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_Allergy" class="patient_opd_follow_up_Allergy"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->Allergy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Allergy" class="<?php echo $patient_opd_follow_up->Allergy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->Allergy) ?>',1);"><div id="elh_patient_opd_follow_up_Allergy" class="patient_opd_follow_up_Allergy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->Allergy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->Allergy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->Allergy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->status->Visible) { // status ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_opd_follow_up->status->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_status" class="patient_opd_follow_up_status"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_opd_follow_up->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->status) ?>',1);"><div id="elh_patient_opd_follow_up_status" class="patient_opd_follow_up_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->createdby->Visible) { // createdby ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_opd_follow_up->createdby->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_createdby" class="patient_opd_follow_up_createdby"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_opd_follow_up->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->createdby) ?>',1);"><div id="elh_patient_opd_follow_up_createdby" class="patient_opd_follow_up_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_opd_follow_up->createddatetime->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_createddatetime" class="patient_opd_follow_up_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_opd_follow_up->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->createddatetime) ?>',1);"><div id="elh_patient_opd_follow_up_createddatetime" class="patient_opd_follow_up_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_opd_follow_up->modifiedby->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_modifiedby" class="patient_opd_follow_up_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_opd_follow_up->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->modifiedby) ?>',1);"><div id="elh_patient_opd_follow_up_modifiedby" class="patient_opd_follow_up_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_opd_follow_up->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_modifieddatetime" class="patient_opd_follow_up_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_opd_follow_up->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->modifieddatetime) ?>',1);"><div id="elh_patient_opd_follow_up_modifieddatetime" class="patient_opd_follow_up_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->LMP->Visible) { // LMP ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->LMP) == "") { ?>
		<th data-name="LMP" class="<?php echo $patient_opd_follow_up->LMP->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_LMP" class="patient_opd_follow_up_LMP"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->LMP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LMP" class="<?php echo $patient_opd_follow_up->LMP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->LMP) ?>',1);"><div id="elh_patient_opd_follow_up_LMP" class="patient_opd_follow_up_LMP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->LMP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->LMP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->LMP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->ProcedureDateTime) == "") { ?>
		<th data-name="ProcedureDateTime" class="<?php echo $patient_opd_follow_up->ProcedureDateTime->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_up_ProcedureDateTime"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->ProcedureDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureDateTime" class="<?php echo $patient_opd_follow_up->ProcedureDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->ProcedureDateTime) ?>',1);"><div id="elh_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_up_ProcedureDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->ProcedureDateTime->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->ProcedureDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->ProcedureDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->ICSIDate) == "") { ?>
		<th data-name="ICSIDate" class="<?php echo $patient_opd_follow_up->ICSIDate->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_up_ICSIDate"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->ICSIDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIDate" class="<?php echo $patient_opd_follow_up->ICSIDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->ICSIDate) ?>',1);"><div id="elh_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_up_ICSIDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->ICSIDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->ICSIDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->ICSIDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->HospID->Visible) { // HospID ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_opd_follow_up->HospID->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_HospID" class="patient_opd_follow_up_HospID"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_opd_follow_up->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->HospID) ?>',1);"><div id="elh_patient_opd_follow_up_HospID" class="patient_opd_follow_up_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->createdUserName->Visible) { // createdUserName ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->createdUserName) == "") { ?>
		<th data-name="createdUserName" class="<?php echo $patient_opd_follow_up->createdUserName->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_createdUserName" class="patient_opd_follow_up_createdUserName"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->createdUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdUserName" class="<?php echo $patient_opd_follow_up->createdUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->createdUserName) ?>',1);"><div id="elh_patient_opd_follow_up_createdUserName" class="patient_opd_follow_up_createdUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->createdUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->createdUserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->createdUserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->reportheader->Visible) { // reportheader ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->reportheader) == "") { ?>
		<th data-name="reportheader" class="<?php echo $patient_opd_follow_up->reportheader->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_reportheader" class="patient_opd_follow_up_reportheader"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->reportheader->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="reportheader" class="<?php echo $patient_opd_follow_up->reportheader->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->reportheader) ?>',1);"><div id="elh_patient_opd_follow_up_reportheader" class="patient_opd_follow_up_reportheader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->reportheader->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->reportheader->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->reportheader->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->DrName->Visible) { // DrName ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $patient_opd_follow_up->DrName->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_DrName" class="patient_opd_follow_up_DrName"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $patient_opd_follow_up->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_opd_follow_up->SortUrl($patient_opd_follow_up->DrName) ?>',1);"><div id="elh_patient_opd_follow_up_DrName" class="patient_opd_follow_up_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_opd_follow_up_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_opd_follow_up->ExportAll && $patient_opd_follow_up->isExport()) {
	$patient_opd_follow_up_list->StopRec = $patient_opd_follow_up_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_opd_follow_up_list->TotalRecs > $patient_opd_follow_up_list->StartRec + $patient_opd_follow_up_list->DisplayRecs - 1)
		$patient_opd_follow_up_list->StopRec = $patient_opd_follow_up_list->StartRec + $patient_opd_follow_up_list->DisplayRecs - 1;
	else
		$patient_opd_follow_up_list->StopRec = $patient_opd_follow_up_list->TotalRecs;
}
$patient_opd_follow_up_list->RecCnt = $patient_opd_follow_up_list->StartRec - 1;
if ($patient_opd_follow_up_list->Recordset && !$patient_opd_follow_up_list->Recordset->EOF) {
	$patient_opd_follow_up_list->Recordset->moveFirst();
	$selectLimit = $patient_opd_follow_up_list->UseSelectLimit;
	if (!$selectLimit && $patient_opd_follow_up_list->StartRec > 1)
		$patient_opd_follow_up_list->Recordset->move($patient_opd_follow_up_list->StartRec - 1);
} elseif (!$patient_opd_follow_up->AllowAddDeleteRow && $patient_opd_follow_up_list->StopRec == 0) {
	$patient_opd_follow_up_list->StopRec = $patient_opd_follow_up->GridAddRowCount;
}

// Initialize aggregate
$patient_opd_follow_up->RowType = ROWTYPE_AGGREGATEINIT;
$patient_opd_follow_up->resetAttributes();
$patient_opd_follow_up_list->renderRow();
while ($patient_opd_follow_up_list->RecCnt < $patient_opd_follow_up_list->StopRec) {
	$patient_opd_follow_up_list->RecCnt++;
	if ($patient_opd_follow_up_list->RecCnt >= $patient_opd_follow_up_list->StartRec) {
		$patient_opd_follow_up_list->RowCnt++;

		// Set up key count
		$patient_opd_follow_up_list->KeyCount = $patient_opd_follow_up_list->RowIndex;

		// Init row class and style
		$patient_opd_follow_up->resetAttributes();
		$patient_opd_follow_up->CssClass = "";
		if ($patient_opd_follow_up->isGridAdd()) {
		} else {
			$patient_opd_follow_up_list->loadRowValues($patient_opd_follow_up_list->Recordset); // Load row values
		}
		$patient_opd_follow_up->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_opd_follow_up->RowAttrs = array_merge($patient_opd_follow_up->RowAttrs, array('data-rowindex'=>$patient_opd_follow_up_list->RowCnt, 'id'=>'r' . $patient_opd_follow_up_list->RowCnt . '_patient_opd_follow_up', 'data-rowtype'=>$patient_opd_follow_up->RowType));

		// Render row
		$patient_opd_follow_up_list->renderRow();

		// Render list options
		$patient_opd_follow_up_list->renderListOptions();
?>
	<tr<?php echo $patient_opd_follow_up->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_opd_follow_up_list->ListOptions->render("body", "left", $patient_opd_follow_up_list->RowCnt);
?>
	<?php if ($patient_opd_follow_up->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_opd_follow_up->id->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_id" class="patient_opd_follow_up_id">
<span<?php echo $patient_opd_follow_up->id->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $patient_opd_follow_up->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_PatID" class="patient_opd_follow_up_PatID">
<span<?php echo $patient_opd_follow_up->PatID->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_opd_follow_up->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_PatientName" class="patient_opd_follow_up_PatientName">
<span<?php echo $patient_opd_follow_up->PatientName->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $patient_opd_follow_up->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_MobileNumber" class="patient_opd_follow_up_MobileNumber">
<span<?php echo $patient_opd_follow_up->MobileNumber->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_opd_follow_up->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_Gender" class="patient_opd_follow_up_Gender">
<span<?php echo $patient_opd_follow_up->Gender->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
		<td data-name="NextReviewDate"<?php echo $patient_opd_follow_up->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_up_NextReviewDate">
<span<?php echo $patient_opd_follow_up->NextReviewDate->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->NextReviewDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<td data-name="ICSIAdvised"<?php echo $patient_opd_follow_up->ICSIAdvised->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_up_ICSIAdvised">
<span<?php echo $patient_opd_follow_up->ICSIAdvised->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
		<td data-name="DeliveryRegistered"<?php echo $patient_opd_follow_up->DeliveryRegistered->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_up_DeliveryRegistered">
<span<?php echo $patient_opd_follow_up->DeliveryRegistered->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->DeliveryRegistered->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->EDD->Visible) { // EDD ?>
		<td data-name="EDD"<?php echo $patient_opd_follow_up->EDD->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_EDD" class="patient_opd_follow_up_EDD">
<span<?php echo $patient_opd_follow_up->EDD->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->EDD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
		<td data-name="SerologyPositive"<?php echo $patient_opd_follow_up->SerologyPositive->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_up_SerologyPositive">
<span<?php echo $patient_opd_follow_up->SerologyPositive->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->SerologyPositive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->Allergy->Visible) { // Allergy ?>
		<td data-name="Allergy"<?php echo $patient_opd_follow_up->Allergy->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_Allergy" class="patient_opd_follow_up_Allergy">
<span<?php echo $patient_opd_follow_up->Allergy->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->Allergy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_opd_follow_up->status->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_status" class="patient_opd_follow_up_status">
<span<?php echo $patient_opd_follow_up->status->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $patient_opd_follow_up->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_createdby" class="patient_opd_follow_up_createdby">
<span<?php echo $patient_opd_follow_up->createdby->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $patient_opd_follow_up->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_createddatetime" class="patient_opd_follow_up_createddatetime">
<span<?php echo $patient_opd_follow_up->createddatetime->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $patient_opd_follow_up->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_modifiedby" class="patient_opd_follow_up_modifiedby">
<span<?php echo $patient_opd_follow_up->modifiedby->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $patient_opd_follow_up->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_modifieddatetime" class="patient_opd_follow_up_modifieddatetime">
<span<?php echo $patient_opd_follow_up->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->LMP->Visible) { // LMP ?>
		<td data-name="LMP"<?php echo $patient_opd_follow_up->LMP->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_LMP" class="patient_opd_follow_up_LMP">
<span<?php echo $patient_opd_follow_up->LMP->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->LMP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
		<td data-name="ProcedureDateTime"<?php echo $patient_opd_follow_up->ProcedureDateTime->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_up_ProcedureDateTime">
<span<?php echo $patient_opd_follow_up->ProcedureDateTime->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->ProcedureDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
		<td data-name="ICSIDate"<?php echo $patient_opd_follow_up->ICSIDate->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_up_ICSIDate">
<span<?php echo $patient_opd_follow_up->ICSIDate->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->ICSIDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $patient_opd_follow_up->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_HospID" class="patient_opd_follow_up_HospID">
<span<?php echo $patient_opd_follow_up->HospID->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->createdUserName->Visible) { // createdUserName ?>
		<td data-name="createdUserName"<?php echo $patient_opd_follow_up->createdUserName->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_createdUserName" class="patient_opd_follow_up_createdUserName">
<span<?php echo $patient_opd_follow_up->createdUserName->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->createdUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->reportheader->Visible) { // reportheader ?>
		<td data-name="reportheader"<?php echo $patient_opd_follow_up->reportheader->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_reportheader" class="patient_opd_follow_up_reportheader">
<span<?php echo $patient_opd_follow_up->reportheader->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->reportheader->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->DrName->Visible) { // DrName ?>
		<td data-name="DrName"<?php echo $patient_opd_follow_up->DrName->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCnt ?>_patient_opd_follow_up_DrName" class="patient_opd_follow_up_DrName">
<span<?php echo $patient_opd_follow_up->DrName->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->DrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_opd_follow_up_list->ListOptions->render("body", "right", $patient_opd_follow_up_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$patient_opd_follow_up->isGridAdd())
		$patient_opd_follow_up_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$patient_opd_follow_up->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_opd_follow_up_list->Recordset)
	$patient_opd_follow_up_list->Recordset->Close();
?>
<?php if (!$patient_opd_follow_up->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_opd_follow_up->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_opd_follow_up_list->Pager)) $patient_opd_follow_up_list->Pager = new NumericPager($patient_opd_follow_up_list->StartRec, $patient_opd_follow_up_list->DisplayRecs, $patient_opd_follow_up_list->TotalRecs, $patient_opd_follow_up_list->RecRange, $patient_opd_follow_up_list->AutoHidePager) ?>
<?php if ($patient_opd_follow_up_list->Pager->RecordCount > 0 && $patient_opd_follow_up_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_opd_follow_up_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_opd_follow_up_list->pageUrl() ?>start=<?php echo $patient_opd_follow_up_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_opd_follow_up_list->pageUrl() ?>start=<?php echo $patient_opd_follow_up_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_opd_follow_up_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_opd_follow_up_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_opd_follow_up_list->pageUrl() ?>start=<?php echo $patient_opd_follow_up_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_opd_follow_up_list->pageUrl() ?>start=<?php echo $patient_opd_follow_up_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_opd_follow_up_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_opd_follow_up_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_opd_follow_up_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_opd_follow_up_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_opd_follow_up_list->TotalRecs > 0 && (!$patient_opd_follow_up_list->AutoHidePageSizeSelector || $patient_opd_follow_up_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_opd_follow_up">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_opd_follow_up_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_opd_follow_up_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_opd_follow_up_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_opd_follow_up_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_opd_follow_up_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_opd_follow_up_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_opd_follow_up->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_opd_follow_up_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_opd_follow_up_list->TotalRecs == 0 && !$patient_opd_follow_up->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_opd_follow_up_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_opd_follow_up_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_opd_follow_up->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$patient_opd_follow_up->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_opd_follow_up", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_opd_follow_up_list->terminate();
?>