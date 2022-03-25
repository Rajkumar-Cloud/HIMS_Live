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
$patient_list = new patient_list();

// Run the page
$patient_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatientlist = currentForm = new ew.Form("fpatientlist", "list");
fpatientlist.formKeyCountName = '<?php echo $patient_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpatientlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatientlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatientlist.lists["x_title"] = <?php echo $patient_list->title->Lookup->toClientList() ?>;
fpatientlist.lists["x_title"].options = <?php echo JsonEncode($patient_list->title->lookupOptions()) ?>;
fpatientlist.lists["x_gender"] = <?php echo $patient_list->gender->Lookup->toClientList() ?>;
fpatientlist.lists["x_gender"].options = <?php echo JsonEncode($patient_list->gender->lookupOptions()) ?>;
fpatientlist.lists["x_blood_group"] = <?php echo $patient_list->blood_group->Lookup->toClientList() ?>;
fpatientlist.lists["x_blood_group"].options = <?php echo JsonEncode($patient_list->blood_group->lookupOptions()) ?>;
fpatientlist.lists["x_ReferedByDr"] = <?php echo $patient_list->ReferedByDr->Lookup->toClientList() ?>;
fpatientlist.lists["x_ReferedByDr"].options = <?php echo JsonEncode($patient_list->ReferedByDr->lookupOptions()) ?>;
fpatientlist.lists["x_ReferA4TreatingConsultant"] = <?php echo $patient_list->ReferA4TreatingConsultant->Lookup->toClientList() ?>;
fpatientlist.lists["x_ReferA4TreatingConsultant"].options = <?php echo JsonEncode($patient_list->ReferA4TreatingConsultant->lookupOptions()) ?>;
fpatientlist.lists["x_spouse_title"] = <?php echo $patient_list->spouse_title->Lookup->toClientList() ?>;
fpatientlist.lists["x_spouse_title"].options = <?php echo JsonEncode($patient_list->spouse_title->lookupOptions()) ?>;
fpatientlist.lists["x_spouse_gender"] = <?php echo $patient_list->spouse_gender->Lookup->toClientList() ?>;
fpatientlist.lists["x_spouse_gender"].options = <?php echo JsonEncode($patient_list->spouse_gender->lookupOptions()) ?>;
fpatientlist.lists["x_WhereDidYouHear[]"] = <?php echo $patient_list->WhereDidYouHear->Lookup->toClientList() ?>;
fpatientlist.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($patient_list->WhereDidYouHear->lookupOptions()) ?>;

// Form object for search
var fpatientlistsrch = currentSearchForm = new ew.Form("fpatientlistsrch");

// Validate function for search
fpatientlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient->createddatetime->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fpatientlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatientlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fpatientlistsrch.filterList = <?php echo $patient_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #27B647; /* preview row color */
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
<?php if (!$patient->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_list->TotalRecs > 0 && $patient_list->ExportOptions->visible()) { ?>
<?php $patient_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_list->ImportOptions->visible()) { ?>
<?php $patient_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_list->SearchOptions->visible()) { ?>
<?php $patient_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_list->FilterOptions->visible()) { ?>
<?php $patient_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$patient_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient->isExport() && !$patient->CurrentAction) { ?>
<form name="fpatientlistsrch" id="fpatientlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatientlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$patient_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$patient->RowType = ROWTYPE_SEARCH;

// Render row
$patient->resetAttributes();
$patient_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($patient->PatientID->Visible) { // PatientID ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $patient->PatientID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient->PatientID->EditValue ?>"<?php echo $patient->PatientID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($patient->first_name->Visible) { // first_name ?>
	<div id="xsc_first_name" class="ew-cell form-group">
		<label for="x_first_name" class="ew-search-caption ew-label"><?php echo $patient->first_name->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_first_name" id="z_first_name" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->first_name->getPlaceHolder()) ?>" value="<?php echo $patient->first_name->EditValue ?>"<?php echo $patient->first_name->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($patient->mobile_no->Visible) { // mobile_no ?>
	<div id="xsc_mobile_no" class="ew-cell form-group">
		<label for="x_mobile_no" class="ew-search-caption ew-label"><?php echo $patient->mobile_no->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mobile_no" id="z_mobile_no" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient->mobile_no->EditValue ?>"<?php echo $patient->mobile_no->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($patient->createddatetime->Visible) { // createddatetime ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $patient->createddatetime->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createddatetime" id="z_createddatetime" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($patient->createddatetime->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($patient->createddatetime->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($patient->createddatetime->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($patient->createddatetime->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($patient->createddatetime->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($patient->createddatetime->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($patient->createddatetime->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($patient->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($patient->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="patient" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient->createddatetime->EditValue ?>"<?php echo $patient->createddatetime->editAttributes() ?>>
<?php if (!$patient->createddatetime->ReadOnly && !$patient->createddatetime->Disabled && !isset($patient->createddatetime->EditAttrs["readonly"]) && !isset($patient->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatientlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createddatetime style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createddatetime style="d-none"">
<input type="text" data-table="patient" data-field="x_createddatetime" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($patient->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient->createddatetime->EditValue2 ?>"<?php echo $patient->createddatetime->editAttributes() ?>>
<?php if (!$patient->createddatetime->ReadOnly && !$patient->createddatetime->Disabled && !isset($patient->createddatetime->EditAttrs["readonly"]) && !isset($patient->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatientlistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($patient->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<div id="xsc_spouse_mobile_no" class="ew-cell form-group">
		<label for="x_spouse_mobile_no" class="ew-search-caption ew-label"><?php echo $patient->spouse_mobile_no->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_spouse_mobile_no" id="z_spouse_mobile_no" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient" data-field="x_spouse_mobile_no" name="x_spouse_mobile_no" id="x_spouse_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->spouse_mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient->spouse_mobile_no->EditValue ?>"<?php echo $patient->spouse_mobile_no->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_list->showPageHeader(); ?>
<?php
$patient_list->showMessage();
?>
<?php if ($patient_list->TotalRecs > 0 || $patient->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient">
<?php if (!$patient->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_list->Pager)) $patient_list->Pager = new PrevNextPager($patient_list->StartRec, $patient_list->DisplayRecs, $patient_list->TotalRecs, $patient_list->AutoHidePager) ?>
<?php if ($patient_list->Pager->RecordCount > 0 && $patient_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($patient_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $patient_list->pageUrl() ?>start=<?php echo $patient_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($patient_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $patient_list->pageUrl() ?>start=<?php echo $patient_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $patient_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($patient_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $patient_list->pageUrl() ?>start=<?php echo $patient_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($patient_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $patient_list->pageUrl() ?>start=<?php echo $patient_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $patient_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($patient_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_list->TotalRecs > 0 && (!$patient_list->AutoHidePageSizeSelector || $patient_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatientlist" id="fpatientlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient">
<div id="gmp_patient" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_list->TotalRecs > 0 || $patient->isGridEdit()) { ?>
<table id="tbl_patientlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_list->renderListOptions();

// Render list options (header, left)
$patient_list->ListOptions->render("header", "left");
?>
<?php if ($patient->id->Visible) { // id ?>
	<?php if ($patient->sortUrl($patient->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient->id->headerCellClass() ?>"><div id="elh_patient_id" class="patient_id"><div class="ew-table-header-caption"><?php echo $patient->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->id) ?>',1);"><div id="elh_patient_id" class="patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->PatientID->Visible) { // PatientID ?>
	<?php if ($patient->sortUrl($patient->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $patient->PatientID->headerCellClass() ?>"><div id="elh_patient_PatientID" class="patient_PatientID"><div class="ew-table-header-caption"><?php echo $patient->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $patient->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->PatientID) ?>',1);"><div id="elh_patient_PatientID" class="patient_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->title->Visible) { // title ?>
	<?php if ($patient->sortUrl($patient->title) == "") { ?>
		<th data-name="title" class="<?php echo $patient->title->headerCellClass() ?>"><div id="elh_patient_title" class="patient_title"><div class="ew-table-header-caption"><?php echo $patient->title->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="title" class="<?php echo $patient->title->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->title) ?>',1);"><div id="elh_patient_title" class="patient_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->title->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient->title->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->title->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->first_name->Visible) { // first_name ?>
	<?php if ($patient->sortUrl($patient->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $patient->first_name->headerCellClass() ?>"><div id="elh_patient_first_name" class="patient_first_name"><div class="ew-table-header-caption"><?php echo $patient->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $patient->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->first_name) ?>',1);"><div id="elh_patient_first_name" class="patient_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->gender->Visible) { // gender ?>
	<?php if ($patient->sortUrl($patient->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $patient->gender->headerCellClass() ?>"><div id="elh_patient_gender" class="patient_gender"><div class="ew-table-header-caption"><?php echo $patient->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $patient->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->gender) ?>',1);"><div id="elh_patient_gender" class="patient_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->Age->Visible) { // Age ?>
	<?php if ($patient->sortUrl($patient->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient->Age->headerCellClass() ?>"><div id="elh_patient_Age" class="patient_Age"><div class="ew-table-header-caption"><?php echo $patient->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->Age) ?>',1);"><div id="elh_patient_Age" class="patient_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->blood_group->Visible) { // blood_group ?>
	<?php if ($patient->sortUrl($patient->blood_group) == "") { ?>
		<th data-name="blood_group" class="<?php echo $patient->blood_group->headerCellClass() ?>"><div id="elh_patient_blood_group" class="patient_blood_group"><div class="ew-table-header-caption"><?php echo $patient->blood_group->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="blood_group" class="<?php echo $patient->blood_group->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->blood_group) ?>',1);"><div id="elh_patient_blood_group" class="patient_blood_group">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->blood_group->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient->blood_group->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->blood_group->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->mobile_no->Visible) { // mobile_no ?>
	<?php if ($patient->sortUrl($patient->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $patient->mobile_no->headerCellClass() ?>"><div id="elh_patient_mobile_no" class="patient_mobile_no"><div class="ew-table-header-caption"><?php echo $patient->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $patient->mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->mobile_no) ?>',1);"><div id="elh_patient_mobile_no" class="patient_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient->sortUrl($patient->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient->createddatetime->headerCellClass() ?>"><div id="elh_patient_createddatetime" class="patient_createddatetime"><div class="ew-table-header-caption"><?php echo $patient->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->createddatetime) ?>',1);"><div id="elh_patient_createddatetime" class="patient_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->profilePic->Visible) { // profilePic ?>
	<?php if ($patient->sortUrl($patient->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $patient->profilePic->headerCellClass() ?>"><div id="elh_patient_profilePic" class="patient_profilePic"><div class="ew-table-header-caption"><?php echo $patient->profilePic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $patient->profilePic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->profilePic) ?>',1);"><div id="elh_patient_profilePic" class="patient_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->profilePic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->profilePic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->profilePic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->IdentificationMark->Visible) { // IdentificationMark ?>
	<?php if ($patient->sortUrl($patient->IdentificationMark) == "") { ?>
		<th data-name="IdentificationMark" class="<?php echo $patient->IdentificationMark->headerCellClass() ?>"><div id="elh_patient_IdentificationMark" class="patient_IdentificationMark"><div class="ew-table-header-caption"><?php echo $patient->IdentificationMark->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IdentificationMark" class="<?php echo $patient->IdentificationMark->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->IdentificationMark) ?>',1);"><div id="elh_patient_IdentificationMark" class="patient_IdentificationMark">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->IdentificationMark->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->IdentificationMark->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->IdentificationMark->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->Religion->Visible) { // Religion ?>
	<?php if ($patient->sortUrl($patient->Religion) == "") { ?>
		<th data-name="Religion" class="<?php echo $patient->Religion->headerCellClass() ?>"><div id="elh_patient_Religion" class="patient_Religion"><div class="ew-table-header-caption"><?php echo $patient->Religion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Religion" class="<?php echo $patient->Religion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->Religion) ?>',1);"><div id="elh_patient_Religion" class="patient_Religion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->Religion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->Religion->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->Religion->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->Nationality->Visible) { // Nationality ?>
	<?php if ($patient->sortUrl($patient->Nationality) == "") { ?>
		<th data-name="Nationality" class="<?php echo $patient->Nationality->headerCellClass() ?>"><div id="elh_patient_Nationality" class="patient_Nationality"><div class="ew-table-header-caption"><?php echo $patient->Nationality->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nationality" class="<?php echo $patient->Nationality->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->Nationality) ?>',1);"><div id="elh_patient_Nationality" class="patient_Nationality">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->Nationality->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->Nationality->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->Nationality->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($patient->sortUrl($patient->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $patient->ReferedByDr->headerCellClass() ?>"><div id="elh_patient_ReferedByDr" class="patient_ReferedByDr"><div class="ew-table-header-caption"><?php echo $patient->ReferedByDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $patient->ReferedByDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->ReferedByDr) ?>',1);"><div id="elh_patient_ReferedByDr" class="patient_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->ReferedByDr->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient->ReferedByDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->ReferedByDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($patient->sortUrl($patient->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $patient->ReferMobileNo->headerCellClass() ?>"><div id="elh_patient_ReferMobileNo" class="patient_ReferMobileNo"><div class="ew-table-header-caption"><?php echo $patient->ReferMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $patient->ReferMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->ReferMobileNo) ?>',1);"><div id="elh_patient_ReferMobileNo" class="patient_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->ReferMobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->ReferMobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($patient->sortUrl($patient->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $patient->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_patient_ReferA4TreatingConsultant" class="patient_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><?php echo $patient->ReferA4TreatingConsultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $patient->ReferA4TreatingConsultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->ReferA4TreatingConsultant) ?>',1);"><div id="elh_patient_ReferA4TreatingConsultant" class="patient_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->ReferA4TreatingConsultant->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($patient->sortUrl($patient->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $patient->PurposreReferredfor->headerCellClass() ?>"><div id="elh_patient_PurposreReferredfor" class="patient_PurposreReferredfor"><div class="ew-table-header-caption"><?php echo $patient->PurposreReferredfor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $patient->PurposreReferredfor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->PurposreReferredfor) ?>',1);"><div id="elh_patient_PurposreReferredfor" class="patient_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->PurposreReferredfor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->PurposreReferredfor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->spouse_title->Visible) { // spouse_title ?>
	<?php if ($patient->sortUrl($patient->spouse_title) == "") { ?>
		<th data-name="spouse_title" class="<?php echo $patient->spouse_title->headerCellClass() ?>"><div id="elh_patient_spouse_title" class="patient_spouse_title"><div class="ew-table-header-caption"><?php echo $patient->spouse_title->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_title" class="<?php echo $patient->spouse_title->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->spouse_title) ?>',1);"><div id="elh_patient_spouse_title" class="patient_spouse_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->spouse_title->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient->spouse_title->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->spouse_title->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->spouse_first_name->Visible) { // spouse_first_name ?>
	<?php if ($patient->sortUrl($patient->spouse_first_name) == "") { ?>
		<th data-name="spouse_first_name" class="<?php echo $patient->spouse_first_name->headerCellClass() ?>"><div id="elh_patient_spouse_first_name" class="patient_spouse_first_name"><div class="ew-table-header-caption"><?php echo $patient->spouse_first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_first_name" class="<?php echo $patient->spouse_first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->spouse_first_name) ?>',1);"><div id="elh_patient_spouse_first_name" class="patient_spouse_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->spouse_first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->spouse_first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->spouse_first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->spouse_gender->Visible) { // spouse_gender ?>
	<?php if ($patient->sortUrl($patient->spouse_gender) == "") { ?>
		<th data-name="spouse_gender" class="<?php echo $patient->spouse_gender->headerCellClass() ?>"><div id="elh_patient_spouse_gender" class="patient_spouse_gender"><div class="ew-table-header-caption"><?php echo $patient->spouse_gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_gender" class="<?php echo $patient->spouse_gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->spouse_gender) ?>',1);"><div id="elh_patient_spouse_gender" class="patient_spouse_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->spouse_gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient->spouse_gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->spouse_gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<?php if ($patient->sortUrl($patient->spouse_mobile_no) == "") { ?>
		<th data-name="spouse_mobile_no" class="<?php echo $patient->spouse_mobile_no->headerCellClass() ?>"><div id="elh_patient_spouse_mobile_no" class="patient_spouse_mobile_no"><div class="ew-table-header-caption"><?php echo $patient->spouse_mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_mobile_no" class="<?php echo $patient->spouse_mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->spouse_mobile_no) ?>',1);"><div id="elh_patient_spouse_mobile_no" class="patient_spouse_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->spouse_mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->spouse_mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->spouse_mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->Passport->Visible) { // Passport ?>
	<?php if ($patient->sortUrl($patient->Passport) == "") { ?>
		<th data-name="Passport" class="<?php echo $patient->Passport->headerCellClass() ?>"><div id="elh_patient_Passport" class="patient_Passport"><div class="ew-table-header-caption"><?php echo $patient->Passport->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Passport" class="<?php echo $patient->Passport->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->Passport) ?>',1);"><div id="elh_patient_Passport" class="patient_Passport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->Passport->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->Passport->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->Passport->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->VisaNo->Visible) { // VisaNo ?>
	<?php if ($patient->sortUrl($patient->VisaNo) == "") { ?>
		<th data-name="VisaNo" class="<?php echo $patient->VisaNo->headerCellClass() ?>"><div id="elh_patient_VisaNo" class="patient_VisaNo"><div class="ew-table-header-caption"><?php echo $patient->VisaNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisaNo" class="<?php echo $patient->VisaNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->VisaNo) ?>',1);"><div id="elh_patient_VisaNo" class="patient_VisaNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->VisaNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->VisaNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->VisaNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($patient->sortUrl($patient->WhereDidYouHear) == "") { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $patient->WhereDidYouHear->headerCellClass() ?>"><div id="elh_patient_WhereDidYouHear" class="patient_WhereDidYouHear"><div class="ew-table-header-caption"><?php echo $patient->WhereDidYouHear->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $patient->WhereDidYouHear->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->WhereDidYouHear) ?>',1);"><div id="elh_patient_WhereDidYouHear" class="patient_WhereDidYouHear">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->WhereDidYouHear->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient->WhereDidYouHear->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->WhereDidYouHear->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->street->Visible) { // street ?>
	<?php if ($patient->sortUrl($patient->street) == "") { ?>
		<th data-name="street" class="<?php echo $patient->street->headerCellClass() ?>"><div id="elh_patient_street" class="patient_street"><div class="ew-table-header-caption"><?php echo $patient->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $patient->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->street) ?>',1);"><div id="elh_patient_street" class="patient_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->street->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->street->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->town->Visible) { // town ?>
	<?php if ($patient->sortUrl($patient->town) == "") { ?>
		<th data-name="town" class="<?php echo $patient->town->headerCellClass() ?>"><div id="elh_patient_town" class="patient_town"><div class="ew-table-header-caption"><?php echo $patient->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $patient->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->town) ?>',1);"><div id="elh_patient_town" class="patient_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->province->Visible) { // province ?>
	<?php if ($patient->sortUrl($patient->province) == "") { ?>
		<th data-name="province" class="<?php echo $patient->province->headerCellClass() ?>"><div id="elh_patient_province" class="patient_province"><div class="ew-table-header-caption"><?php echo $patient->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $patient->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->province) ?>',1);"><div id="elh_patient_province" class="patient_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->province->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->province->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->country->Visible) { // country ?>
	<?php if ($patient->sortUrl($patient->country) == "") { ?>
		<th data-name="country" class="<?php echo $patient->country->headerCellClass() ?>"><div id="elh_patient_country" class="patient_country"><div class="ew-table-header-caption"><?php echo $patient->country->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="country" class="<?php echo $patient->country->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->country) ?>',1);"><div id="elh_patient_country" class="patient_country">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->country->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->country->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->country->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->postal_code->Visible) { // postal_code ?>
	<?php if ($patient->sortUrl($patient->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $patient->postal_code->headerCellClass() ?>"><div id="elh_patient_postal_code" class="patient_postal_code"><div class="ew-table-header-caption"><?php echo $patient->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $patient->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->postal_code) ?>',1);"><div id="elh_patient_postal_code" class="patient_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->postal_code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->postal_code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->PEmail->Visible) { // PEmail ?>
	<?php if ($patient->sortUrl($patient->PEmail) == "") { ?>
		<th data-name="PEmail" class="<?php echo $patient->PEmail->headerCellClass() ?>"><div id="elh_patient_PEmail" class="patient_PEmail"><div class="ew-table-header-caption"><?php echo $patient->PEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PEmail" class="<?php echo $patient->PEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->PEmail) ?>',1);"><div id="elh_patient_PEmail" class="patient_PEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->PEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->PEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->PEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient->Clients->Visible) { // Clients ?>
	<?php if ($patient->sortUrl($patient->Clients) == "") { ?>
		<th data-name="Clients" class="<?php echo $patient->Clients->headerCellClass() ?>"><div id="elh_patient_Clients" class="patient_Clients"><div class="ew-table-header-caption"><?php echo $patient->Clients->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Clients" class="<?php echo $patient->Clients->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient->SortUrl($patient->Clients) ?>',1);"><div id="elh_patient_Clients" class="patient_Clients">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient->Clients->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient->Clients->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient->Clients->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient->ExportAll && $patient->isExport()) {
	$patient_list->StopRec = $patient_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_list->TotalRecs > $patient_list->StartRec + $patient_list->DisplayRecs - 1)
		$patient_list->StopRec = $patient_list->StartRec + $patient_list->DisplayRecs - 1;
	else
		$patient_list->StopRec = $patient_list->TotalRecs;
}
$patient_list->RecCnt = $patient_list->StartRec - 1;
if ($patient_list->Recordset && !$patient_list->Recordset->EOF) {
	$patient_list->Recordset->moveFirst();
	$selectLimit = $patient_list->UseSelectLimit;
	if (!$selectLimit && $patient_list->StartRec > 1)
		$patient_list->Recordset->move($patient_list->StartRec - 1);
} elseif (!$patient->AllowAddDeleteRow && $patient_list->StopRec == 0) {
	$patient_list->StopRec = $patient->GridAddRowCount;
}

// Initialize aggregate
$patient->RowType = ROWTYPE_AGGREGATEINIT;
$patient->resetAttributes();
$patient_list->renderRow();
while ($patient_list->RecCnt < $patient_list->StopRec) {
	$patient_list->RecCnt++;
	if ($patient_list->RecCnt >= $patient_list->StartRec) {
		$patient_list->RowCnt++;

		// Set up key count
		$patient_list->KeyCount = $patient_list->RowIndex;

		// Init row class and style
		$patient->resetAttributes();
		$patient->CssClass = "";
		if ($patient->isGridAdd()) {
		} else {
			$patient_list->loadRowValues($patient_list->Recordset); // Load row values
		}
		$patient->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient->RowAttrs = array_merge($patient->RowAttrs, array('data-rowindex'=>$patient_list->RowCnt, 'id'=>'r' . $patient_list->RowCnt . '_patient', 'data-rowtype'=>$patient->RowType));

		// Render row
		$patient_list->renderRow();

		// Render list options
		$patient_list->renderListOptions();
?>
	<tr<?php echo $patient->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_list->ListOptions->render("body", "left", $patient_list->RowCnt);
?>
	<?php if ($patient->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient->id->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_id" class="patient_id">
<span<?php echo $patient->id->viewAttributes() ?>>
<?php echo $patient->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $patient->PatientID->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_PatientID" class="patient_PatientID">
<span<?php echo $patient->PatientID->viewAttributes() ?>>
<?php echo $patient->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->title->Visible) { // title ?>
		<td data-name="title"<?php echo $patient->title->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_title" class="patient_title">
<span<?php echo $patient->title->viewAttributes() ?>>
<?php echo $patient->title->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->first_name->Visible) { // first_name ?>
		<td data-name="first_name"<?php echo $patient->first_name->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_first_name" class="patient_first_name">
<span<?php echo $patient->first_name->viewAttributes() ?>>
<?php echo $patient->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $patient->gender->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_gender" class="patient_gender">
<span<?php echo $patient->gender->viewAttributes() ?>>
<?php echo $patient->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_Age" class="patient_Age">
<span<?php echo $patient->Age->viewAttributes() ?>>
<?php echo $patient->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->blood_group->Visible) { // blood_group ?>
		<td data-name="blood_group"<?php echo $patient->blood_group->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_blood_group" class="patient_blood_group">
<span<?php echo $patient->blood_group->viewAttributes() ?>>
<?php echo $patient->blood_group->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no"<?php echo $patient->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_mobile_no" class="patient_mobile_no">
<span<?php echo $patient->mobile_no->viewAttributes() ?>>
<?php echo $patient->mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $patient->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_createddatetime" class="patient_createddatetime">
<span<?php echo $patient->createddatetime->viewAttributes() ?>>
<?php echo $patient->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic"<?php echo $patient->profilePic->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_profilePic" class="patient_profilePic">
<span>
<?php echo GetFileViewTag($patient->profilePic, $patient->profilePic->getViewValue()) ?>
</span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->IdentificationMark->Visible) { // IdentificationMark ?>
		<td data-name="IdentificationMark"<?php echo $patient->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_IdentificationMark" class="patient_IdentificationMark">
<span<?php echo $patient->IdentificationMark->viewAttributes() ?>>
<?php echo $patient->IdentificationMark->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->Religion->Visible) { // Religion ?>
		<td data-name="Religion"<?php echo $patient->Religion->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_Religion" class="patient_Religion">
<span<?php echo $patient->Religion->viewAttributes() ?>>
<?php echo $patient->Religion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->Nationality->Visible) { // Nationality ?>
		<td data-name="Nationality"<?php echo $patient->Nationality->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_Nationality" class="patient_Nationality">
<span<?php echo $patient->Nationality->viewAttributes() ?>>
<?php echo $patient->Nationality->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr"<?php echo $patient->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_ReferedByDr" class="patient_ReferedByDr">
<span<?php echo $patient->ReferedByDr->viewAttributes() ?>>
<?php echo $patient->ReferedByDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo"<?php echo $patient->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_ReferMobileNo" class="patient_ReferMobileNo">
<span<?php echo $patient->ReferMobileNo->viewAttributes() ?>>
<?php echo $patient->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant"<?php echo $patient->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_ReferA4TreatingConsultant" class="patient_ReferA4TreatingConsultant">
<span<?php echo $patient->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $patient->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor"<?php echo $patient->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_PurposreReferredfor" class="patient_PurposreReferredfor">
<span<?php echo $patient->PurposreReferredfor->viewAttributes() ?>>
<?php echo $patient->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->spouse_title->Visible) { // spouse_title ?>
		<td data-name="spouse_title"<?php echo $patient->spouse_title->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_spouse_title" class="patient_spouse_title">
<span<?php echo $patient->spouse_title->viewAttributes() ?>>
<?php echo $patient->spouse_title->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->spouse_first_name->Visible) { // spouse_first_name ?>
		<td data-name="spouse_first_name"<?php echo $patient->spouse_first_name->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_spouse_first_name" class="patient_spouse_first_name">
<span<?php echo $patient->spouse_first_name->viewAttributes() ?>>
<?php echo $patient->spouse_first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->spouse_gender->Visible) { // spouse_gender ?>
		<td data-name="spouse_gender"<?php echo $patient->spouse_gender->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_spouse_gender" class="patient_spouse_gender">
<span<?php echo $patient->spouse_gender->viewAttributes() ?>>
<?php echo $patient->spouse_gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
		<td data-name="spouse_mobile_no"<?php echo $patient->spouse_mobile_no->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_spouse_mobile_no" class="patient_spouse_mobile_no">
<span<?php echo $patient->spouse_mobile_no->viewAttributes() ?>>
<?php echo $patient->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->Passport->Visible) { // Passport ?>
		<td data-name="Passport"<?php echo $patient->Passport->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_Passport" class="patient_Passport">
<span<?php echo $patient->Passport->viewAttributes() ?>>
<?php echo $patient->Passport->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->VisaNo->Visible) { // VisaNo ?>
		<td data-name="VisaNo"<?php echo $patient->VisaNo->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_VisaNo" class="patient_VisaNo">
<span<?php echo $patient->VisaNo->viewAttributes() ?>>
<?php echo $patient->VisaNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear"<?php echo $patient->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_WhereDidYouHear" class="patient_WhereDidYouHear">
<span<?php echo $patient->WhereDidYouHear->viewAttributes() ?>>
<?php echo $patient->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->street->Visible) { // street ?>
		<td data-name="street"<?php echo $patient->street->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_street" class="patient_street">
<span<?php echo $patient->street->viewAttributes() ?>>
<?php echo $patient->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->town->Visible) { // town ?>
		<td data-name="town"<?php echo $patient->town->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_town" class="patient_town">
<span<?php echo $patient->town->viewAttributes() ?>>
<?php echo $patient->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->province->Visible) { // province ?>
		<td data-name="province"<?php echo $patient->province->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_province" class="patient_province">
<span<?php echo $patient->province->viewAttributes() ?>>
<?php echo $patient->province->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->country->Visible) { // country ?>
		<td data-name="country"<?php echo $patient->country->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_country" class="patient_country">
<span<?php echo $patient->country->viewAttributes() ?>>
<?php echo $patient->country->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code"<?php echo $patient->postal_code->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_postal_code" class="patient_postal_code">
<span<?php echo $patient->postal_code->viewAttributes() ?>>
<?php echo $patient->postal_code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->PEmail->Visible) { // PEmail ?>
		<td data-name="PEmail"<?php echo $patient->PEmail->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_PEmail" class="patient_PEmail">
<span<?php echo $patient->PEmail->viewAttributes() ?>>
<?php echo $patient->PEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient->Clients->Visible) { // Clients ?>
		<td data-name="Clients"<?php echo $patient->Clients->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCnt ?>_patient_Clients" class="patient_Clients">
<span<?php echo $patient->Clients->viewAttributes() ?>>
<?php echo $patient->Clients->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_list->ListOptions->render("body", "right", $patient_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$patient->isGridAdd())
		$patient_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$patient->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_list->Recordset)
	$patient_list->Recordset->Close();
?>
<?php if (!$patient->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_list->Pager)) $patient_list->Pager = new PrevNextPager($patient_list->StartRec, $patient_list->DisplayRecs, $patient_list->TotalRecs, $patient_list->AutoHidePager) ?>
<?php if ($patient_list->Pager->RecordCount > 0 && $patient_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($patient_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $patient_list->pageUrl() ?>start=<?php echo $patient_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($patient_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $patient_list->pageUrl() ?>start=<?php echo $patient_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $patient_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($patient_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $patient_list->pageUrl() ?>start=<?php echo $patient_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($patient_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $patient_list->pageUrl() ?>start=<?php echo $patient_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $patient_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($patient_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_list->TotalRecs > 0 && (!$patient_list->AutoHidePageSizeSelector || $patient_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_list->TotalRecs == 0 && !$patient->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$patient->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_list->terminate();
?>