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
$ip_admission_list = new ip_admission_list();

// Run the page
$ip_admission_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ip_admission_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ip_admission->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fip_admissionlist = currentForm = new ew.Form("fip_admissionlist", "list");
fip_admissionlist.formKeyCountName = '<?php echo $ip_admission_list->FormKeyCountName ?>';

// Form_CustomValidate event
fip_admissionlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fip_admissionlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fip_admissionlist.lists["x_gender"] = <?php echo $ip_admission_list->gender->Lookup->toClientList() ?>;
fip_admissionlist.lists["x_gender"].options = <?php echo JsonEncode($ip_admission_list->gender->lookupOptions()) ?>;
fip_admissionlist.autoSuggests["x_gender"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fip_admissionlist.lists["x_typeRegsisteration"] = <?php echo $ip_admission_list->typeRegsisteration->Lookup->toClientList() ?>;
fip_admissionlist.lists["x_typeRegsisteration"].options = <?php echo JsonEncode($ip_admission_list->typeRegsisteration->lookupOptions()) ?>;
fip_admissionlist.lists["x_PaymentCategory"] = <?php echo $ip_admission_list->PaymentCategory->Lookup->toClientList() ?>;
fip_admissionlist.lists["x_PaymentCategory"].options = <?php echo JsonEncode($ip_admission_list->PaymentCategory->lookupOptions()) ?>;
fip_admissionlist.lists["x_physician_id"] = <?php echo $ip_admission_list->physician_id->Lookup->toClientList() ?>;
fip_admissionlist.lists["x_physician_id"].options = <?php echo JsonEncode($ip_admission_list->physician_id->lookupOptions()) ?>;
fip_admissionlist.lists["x_admission_consultant_id"] = <?php echo $ip_admission_list->admission_consultant_id->Lookup->toClientList() ?>;
fip_admissionlist.lists["x_admission_consultant_id"].options = <?php echo JsonEncode($ip_admission_list->admission_consultant_id->lookupOptions()) ?>;
fip_admissionlist.lists["x_leading_consultant_id"] = <?php echo $ip_admission_list->leading_consultant_id->Lookup->toClientList() ?>;
fip_admissionlist.lists["x_leading_consultant_id"].options = <?php echo JsonEncode($ip_admission_list->leading_consultant_id->lookupOptions()) ?>;
fip_admissionlist.lists["x_PaymentStatus"] = <?php echo $ip_admission_list->PaymentStatus->Lookup->toClientList() ?>;
fip_admissionlist.lists["x_PaymentStatus"].options = <?php echo JsonEncode($ip_admission_list->PaymentStatus->lookupOptions()) ?>;
fip_admissionlist.lists["x_HospID"] = <?php echo $ip_admission_list->HospID->Lookup->toClientList() ?>;
fip_admissionlist.lists["x_HospID"].options = <?php echo JsonEncode($ip_admission_list->HospID->lookupOptions()) ?>;
fip_admissionlist.lists["x_ReferedByDr"] = <?php echo $ip_admission_list->ReferedByDr->Lookup->toClientList() ?>;
fip_admissionlist.lists["x_ReferedByDr"].options = <?php echo JsonEncode($ip_admission_list->ReferedByDr->lookupOptions()) ?>;
fip_admissionlist.lists["x_ReferA4TreatingConsultant"] = <?php echo $ip_admission_list->ReferA4TreatingConsultant->Lookup->toClientList() ?>;
fip_admissionlist.lists["x_ReferA4TreatingConsultant"].options = <?php echo JsonEncode($ip_admission_list->ReferA4TreatingConsultant->lookupOptions()) ?>;
fip_admissionlist.lists["x_patient_id"] = <?php echo $ip_admission_list->patient_id->Lookup->toClientList() ?>;
fip_admissionlist.lists["x_patient_id"].options = <?php echo JsonEncode($ip_admission_list->patient_id->lookupOptions()) ?>;

// Form object for search
var fip_admissionlistsrch = currentSearchForm = new ew.Form("fip_admissionlistsrch");

// Validate function for search
fip_admissionlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ip_admission->createddatetime->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fip_admissionlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fip_admissionlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fip_admissionlistsrch.lists["x_typeRegsisteration"] = <?php echo $ip_admission_list->typeRegsisteration->Lookup->toClientList() ?>;
fip_admissionlistsrch.lists["x_typeRegsisteration"].options = <?php echo JsonEncode($ip_admission_list->typeRegsisteration->lookupOptions()) ?>;
fip_admissionlistsrch.lists["x_PaymentCategory"] = <?php echo $ip_admission_list->PaymentCategory->Lookup->toClientList() ?>;
fip_admissionlistsrch.lists["x_PaymentCategory"].options = <?php echo JsonEncode($ip_admission_list->PaymentCategory->lookupOptions()) ?>;
fip_admissionlistsrch.lists["x_physician_id"] = <?php echo $ip_admission_list->physician_id->Lookup->toClientList() ?>;
fip_admissionlistsrch.lists["x_physician_id"].options = <?php echo JsonEncode($ip_admission_list->physician_id->lookupOptions()) ?>;
fip_admissionlistsrch.lists["x_admission_consultant_id"] = <?php echo $ip_admission_list->admission_consultant_id->Lookup->toClientList() ?>;
fip_admissionlistsrch.lists["x_admission_consultant_id"].options = <?php echo JsonEncode($ip_admission_list->admission_consultant_id->lookupOptions()) ?>;
fip_admissionlistsrch.lists["x_patient_id"] = <?php echo $ip_admission_list->patient_id->Lookup->toClientList() ?>;
fip_admissionlistsrch.lists["x_patient_id"].options = <?php echo JsonEncode($ip_admission_list->patient_id->lookupOptions()) ?>;

// Filters
fip_admissionlistsrch.filterList = <?php echo $ip_admission_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #DCD110; /* preview row color */
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
ew.PREVIEW_SINGLE_ROW = true;
ew.PREVIEW_OVERLAY = true;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ip_admission->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ip_admission_list->TotalRecs > 0 && $ip_admission_list->ExportOptions->visible()) { ?>
<?php $ip_admission_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ip_admission_list->ImportOptions->visible()) { ?>
<?php $ip_admission_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ip_admission_list->SearchOptions->visible()) { ?>
<?php $ip_admission_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ip_admission_list->FilterOptions->visible()) { ?>
<?php $ip_admission_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ip_admission_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ip_admission->isExport() && !$ip_admission->CurrentAction) { ?>
<form name="fip_admissionlistsrch" id="fip_admissionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ip_admission_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fip_admissionlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ip_admission">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$ip_admission_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$ip_admission->RowType = ROWTYPE_SEARCH;

// Render row
$ip_admission->resetAttributes();
$ip_admission_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($ip_admission->mrnNo->Visible) { // mrnNo ?>
	<div id="xsc_mrnNo" class="ew-cell form-group">
		<label for="x_mrnNo" class="ew-search-caption ew-label"><?php echo $ip_admission->mrnNo->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnNo" id="z_mrnNo" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="ip_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->mrnNo->getPlaceHolder()) ?>" value="<?php echo $ip_admission->mrnNo->EditValue ?>"<?php echo $ip_admission->mrnNo->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($ip_admission->patient_name->Visible) { // patient_name ?>
	<div id="xsc_patient_name" class="ew-cell form-group">
		<label for="x_patient_name" class="ew-search-caption ew-label"><?php echo $ip_admission->patient_name->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="ip_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->patient_name->getPlaceHolder()) ?>" value="<?php echo $ip_admission->patient_name->EditValue ?>"<?php echo $ip_admission->patient_name->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($ip_admission->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<div id="xsc_typeRegsisteration" class="ew-cell form-group">
		<label for="x_typeRegsisteration" class="ew-search-caption ew-label"><?php echo $ip_admission->typeRegsisteration->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_typeRegsisteration" id="z_typeRegsisteration" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_typeRegsisteration" data-value-separator="<?php echo $ip_admission->typeRegsisteration->displayValueSeparatorAttribute() ?>" id="x_typeRegsisteration" name="x_typeRegsisteration"<?php echo $ip_admission->typeRegsisteration->editAttributes() ?>>
		<?php echo $ip_admission->typeRegsisteration->selectOptionListHtml("x_typeRegsisteration") ?>
	</select>
</div>
<?php echo $ip_admission->typeRegsisteration->Lookup->getParamTag("p_x_typeRegsisteration") ?>
</span>
	</div>
<?php } ?>
<?php if ($ip_admission->PaymentCategory->Visible) { // PaymentCategory ?>
	<div id="xsc_PaymentCategory" class="ew-cell form-group">
		<label for="x_PaymentCategory" class="ew-search-caption ew-label"><?php echo $ip_admission->PaymentCategory->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PaymentCategory" id="z_PaymentCategory" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_PaymentCategory" data-value-separator="<?php echo $ip_admission->PaymentCategory->displayValueSeparatorAttribute() ?>" id="x_PaymentCategory" name="x_PaymentCategory"<?php echo $ip_admission->PaymentCategory->editAttributes() ?>>
		<?php echo $ip_admission->PaymentCategory->selectOptionListHtml("x_PaymentCategory") ?>
	</select>
</div>
<?php echo $ip_admission->PaymentCategory->Lookup->getParamTag("p_x_PaymentCategory") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($ip_admission->physician_id->Visible) { // physician_id ?>
	<div id="xsc_physician_id" class="ew-cell form-group">
		<label for="x_physician_id" class="ew-search-caption ew-label"><?php echo $ip_admission->physician_id->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_physician_id" id="z_physician_id" value="="></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_physician_id" data-value-separator="<?php echo $ip_admission->physician_id->displayValueSeparatorAttribute() ?>" id="x_physician_id" name="x_physician_id"<?php echo $ip_admission->physician_id->editAttributes() ?>>
		<?php echo $ip_admission->physician_id->selectOptionListHtml("x_physician_id") ?>
	</select>
</div>
<?php echo $ip_admission->physician_id->Lookup->getParamTag("p_x_physician_id") ?>
</span>
	</div>
<?php } ?>
<?php if ($ip_admission->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<div id="xsc_admission_consultant_id" class="ew-cell form-group">
		<label for="x_admission_consultant_id" class="ew-search-caption ew-label"><?php echo $ip_admission->admission_consultant_id->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_admission_consultant_id" id="z_admission_consultant_id" value="="></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_admission_consultant_id" data-value-separator="<?php echo $ip_admission->admission_consultant_id->displayValueSeparatorAttribute() ?>" id="x_admission_consultant_id" name="x_admission_consultant_id"<?php echo $ip_admission->admission_consultant_id->editAttributes() ?>>
		<?php echo $ip_admission->admission_consultant_id->selectOptionListHtml("x_admission_consultant_id") ?>
	</select>
</div>
<?php echo $ip_admission->admission_consultant_id->Lookup->getParamTag("p_x_admission_consultant_id") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
<?php if ($ip_admission->createddatetime->Visible) { // createddatetime ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $ip_admission->createddatetime->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createddatetime" id="z_createddatetime" value="="></span>
		<span class="ew-search-field">
<input type="text" data-table="ip_admission" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($ip_admission->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ip_admission->createddatetime->EditValue ?>"<?php echo $ip_admission->createddatetime->editAttributes() ?>>
<?php if (!$ip_admission->createddatetime->ReadOnly && !$ip_admission->createddatetime->Disabled && !isset($ip_admission->createddatetime->EditAttrs["readonly"]) && !isset($ip_admission->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fip_admissionlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
<?php if ($ip_admission->patient_id->Visible) { // patient_id ?>
	<div id="xsc_patient_id" class="ew-cell form-group">
		<label for="x_patient_id" class="ew-search-caption ew-label"><?php echo $ip_admission->patient_id->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_patient_id" id="z_patient_id" value="="></span>
		<span class="ew-search-field">
<input type="text" data-table="ip_admission" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($ip_admission->patient_id->getPlaceHolder()) ?>" value="<?php echo $ip_admission->patient_id->EditValue ?>"<?php echo $ip_admission->patient_id->editAttributes() ?>>
<?php echo $ip_admission->patient_id->Lookup->getParamTag("p_x_patient_id") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_5" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ip_admission_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ip_admission_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ip_admission_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ip_admission_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ip_admission_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ip_admission_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ip_admission_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ip_admission_list->showPageHeader(); ?>
<?php
$ip_admission_list->showMessage();
?>
<?php if ($ip_admission_list->TotalRecs > 0 || $ip_admission->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ip_admission_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ip_admission">
<?php if (!$ip_admission->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ip_admission->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ip_admission_list->Pager)) $ip_admission_list->Pager = new NumericPager($ip_admission_list->StartRec, $ip_admission_list->DisplayRecs, $ip_admission_list->TotalRecs, $ip_admission_list->RecRange, $ip_admission_list->AutoHidePager) ?>
<?php if ($ip_admission_list->Pager->RecordCount > 0 && $ip_admission_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ip_admission_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ip_admission_list->pageUrl() ?>start=<?php echo $ip_admission_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ip_admission_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ip_admission_list->pageUrl() ?>start=<?php echo $ip_admission_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ip_admission_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ip_admission_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ip_admission_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ip_admission_list->pageUrl() ?>start=<?php echo $ip_admission_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ip_admission_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ip_admission_list->pageUrl() ?>start=<?php echo $ip_admission_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ip_admission_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ip_admission_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ip_admission_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ip_admission_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ip_admission_list->TotalRecs > 0 && (!$ip_admission_list->AutoHidePageSizeSelector || $ip_admission_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ip_admission">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ip_admission_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ip_admission_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ip_admission_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ip_admission_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ip_admission_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ip_admission_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ip_admission->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ip_admission_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fip_admissionlist" id="fip_admissionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ip_admission_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ip_admission_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ip_admission">
<div id="gmp_ip_admission" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ip_admission_list->TotalRecs > 0 || $ip_admission->isGridEdit()) { ?>
<table id="tbl_ip_admissionlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ip_admission_list->RowType = ROWTYPE_HEADER;

// Render list options
$ip_admission_list->renderListOptions();

// Render list options (header, left)
$ip_admission_list->ListOptions->render("header", "left");
?>
<?php if ($ip_admission->id->Visible) { // id ?>
	<?php if ($ip_admission->sortUrl($ip_admission->id) == "") { ?>
		<th data-name="id" class="<?php echo $ip_admission->id->headerCellClass() ?>"><div id="elh_ip_admission_id" class="ip_admission_id"><div class="ew-table-header-caption"><?php echo $ip_admission->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ip_admission->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->id) ?>',1);"><div id="elh_ip_admission_id" class="ip_admission_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->mrnNo->Visible) { // mrnNo ?>
	<?php if ($ip_admission->sortUrl($ip_admission->mrnNo) == "") { ?>
		<th data-name="mrnNo" class="<?php echo $ip_admission->mrnNo->headerCellClass() ?>"><div id="elh_ip_admission_mrnNo" class="ip_admission_mrnNo"><div class="ew-table-header-caption"><?php echo $ip_admission->mrnNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnNo" class="<?php echo $ip_admission->mrnNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->mrnNo) ?>',1);"><div id="elh_ip_admission_mrnNo" class="ip_admission_mrnNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->mrnNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->mrnNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->mrnNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->PatientID->Visible) { // PatientID ?>
	<?php if ($ip_admission->sortUrl($ip_admission->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $ip_admission->PatientID->headerCellClass() ?>"><div id="elh_ip_admission_PatientID" class="ip_admission_PatientID"><div class="ew-table-header-caption"><?php echo $ip_admission->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $ip_admission->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->PatientID) ?>',1);"><div id="elh_ip_admission_PatientID" class="ip_admission_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->patient_name->Visible) { // patient_name ?>
	<?php if ($ip_admission->sortUrl($ip_admission->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $ip_admission->patient_name->headerCellClass() ?>"><div id="elh_ip_admission_patient_name" class="ip_admission_patient_name"><div class="ew-table-header-caption"><?php echo $ip_admission->patient_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $ip_admission->patient_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->patient_name) ?>',1);"><div id="elh_ip_admission_patient_name" class="ip_admission_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->patient_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->patient_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->mobileno->Visible) { // mobileno ?>
	<?php if ($ip_admission->sortUrl($ip_admission->mobileno) == "") { ?>
		<th data-name="mobileno" class="<?php echo $ip_admission->mobileno->headerCellClass() ?>"><div id="elh_ip_admission_mobileno" class="ip_admission_mobileno"><div class="ew-table-header-caption"><?php echo $ip_admission->mobileno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobileno" class="<?php echo $ip_admission->mobileno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->mobileno) ?>',1);"><div id="elh_ip_admission_mobileno" class="ip_admission_mobileno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->mobileno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->mobileno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->mobileno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->gender->Visible) { // gender ?>
	<?php if ($ip_admission->sortUrl($ip_admission->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $ip_admission->gender->headerCellClass() ?>"><div id="elh_ip_admission_gender" class="ip_admission_gender"><div class="ew-table-header-caption"><?php echo $ip_admission->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $ip_admission->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->gender) ?>',1);"><div id="elh_ip_admission_gender" class="ip_admission_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->age->Visible) { // age ?>
	<?php if ($ip_admission->sortUrl($ip_admission->age) == "") { ?>
		<th data-name="age" class="<?php echo $ip_admission->age->headerCellClass() ?>"><div id="elh_ip_admission_age" class="ip_admission_age"><div class="ew-table-header-caption"><?php echo $ip_admission->age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="age" class="<?php echo $ip_admission->age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->age) ?>',1);"><div id="elh_ip_admission_age" class="ip_admission_age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php if ($ip_admission->sortUrl($ip_admission->typeRegsisteration) == "") { ?>
		<th data-name="typeRegsisteration" class="<?php echo $ip_admission->typeRegsisteration->headerCellClass() ?>"><div id="elh_ip_admission_typeRegsisteration" class="ip_admission_typeRegsisteration"><div class="ew-table-header-caption"><?php echo $ip_admission->typeRegsisteration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="typeRegsisteration" class="<?php echo $ip_admission->typeRegsisteration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->typeRegsisteration) ?>',1);"><div id="elh_ip_admission_typeRegsisteration" class="ip_admission_typeRegsisteration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->typeRegsisteration->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->typeRegsisteration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->typeRegsisteration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->PaymentCategory->Visible) { // PaymentCategory ?>
	<?php if ($ip_admission->sortUrl($ip_admission->PaymentCategory) == "") { ?>
		<th data-name="PaymentCategory" class="<?php echo $ip_admission->PaymentCategory->headerCellClass() ?>"><div id="elh_ip_admission_PaymentCategory" class="ip_admission_PaymentCategory"><div class="ew-table-header-caption"><?php echo $ip_admission->PaymentCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentCategory" class="<?php echo $ip_admission->PaymentCategory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->PaymentCategory) ?>',1);"><div id="elh_ip_admission_PaymentCategory" class="ip_admission_PaymentCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->PaymentCategory->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->PaymentCategory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->PaymentCategory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->physician_id->Visible) { // physician_id ?>
	<?php if ($ip_admission->sortUrl($ip_admission->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $ip_admission->physician_id->headerCellClass() ?>"><div id="elh_ip_admission_physician_id" class="ip_admission_physician_id"><div class="ew-table-header-caption"><?php echo $ip_admission->physician_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $ip_admission->physician_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->physician_id) ?>',1);"><div id="elh_ip_admission_physician_id" class="ip_admission_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->physician_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->physician_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<?php if ($ip_admission->sortUrl($ip_admission->admission_consultant_id) == "") { ?>
		<th data-name="admission_consultant_id" class="<?php echo $ip_admission->admission_consultant_id->headerCellClass() ?>"><div id="elh_ip_admission_admission_consultant_id" class="ip_admission_admission_consultant_id"><div class="ew-table-header-caption"><?php echo $ip_admission->admission_consultant_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_consultant_id" class="<?php echo $ip_admission->admission_consultant_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->admission_consultant_id) ?>',1);"><div id="elh_ip_admission_admission_consultant_id" class="ip_admission_admission_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->admission_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->admission_consultant_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->admission_consultant_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<?php if ($ip_admission->sortUrl($ip_admission->leading_consultant_id) == "") { ?>
		<th data-name="leading_consultant_id" class="<?php echo $ip_admission->leading_consultant_id->headerCellClass() ?>"><div id="elh_ip_admission_leading_consultant_id" class="ip_admission_leading_consultant_id"><div class="ew-table-header-caption"><?php echo $ip_admission->leading_consultant_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leading_consultant_id" class="<?php echo $ip_admission->leading_consultant_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->leading_consultant_id) ?>',1);"><div id="elh_ip_admission_leading_consultant_id" class="ip_admission_leading_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->leading_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->leading_consultant_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->leading_consultant_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->admission_date->Visible) { // admission_date ?>
	<?php if ($ip_admission->sortUrl($ip_admission->admission_date) == "") { ?>
		<th data-name="admission_date" class="<?php echo $ip_admission->admission_date->headerCellClass() ?>"><div id="elh_ip_admission_admission_date" class="ip_admission_admission_date"><div class="ew-table-header-caption"><?php echo $ip_admission->admission_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_date" class="<?php echo $ip_admission->admission_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->admission_date) ?>',1);"><div id="elh_ip_admission_admission_date" class="ip_admission_admission_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->admission_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->admission_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->admission_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->release_date->Visible) { // release_date ?>
	<?php if ($ip_admission->sortUrl($ip_admission->release_date) == "") { ?>
		<th data-name="release_date" class="<?php echo $ip_admission->release_date->headerCellClass() ?>"><div id="elh_ip_admission_release_date" class="ip_admission_release_date"><div class="ew-table-header-caption"><?php echo $ip_admission->release_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="release_date" class="<?php echo $ip_admission->release_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->release_date) ?>',1);"><div id="elh_ip_admission_release_date" class="ip_admission_release_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->release_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->release_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->release_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($ip_admission->sortUrl($ip_admission->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $ip_admission->PaymentStatus->headerCellClass() ?>"><div id="elh_ip_admission_PaymentStatus" class="ip_admission_PaymentStatus"><div class="ew-table-header-caption"><?php echo $ip_admission->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $ip_admission->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->PaymentStatus) ?>',1);"><div id="elh_ip_admission_PaymentStatus" class="ip_admission_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->PaymentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->PaymentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ip_admission->sortUrl($ip_admission->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $ip_admission->createddatetime->headerCellClass() ?>"><div id="elh_ip_admission_createddatetime" class="ip_admission_createddatetime"><div class="ew-table-header-caption"><?php echo $ip_admission->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $ip_admission->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->createddatetime) ?>',1);"><div id="elh_ip_admission_createddatetime" class="ip_admission_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->createddatetime->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->profilePic->Visible) { // profilePic ?>
	<?php if ($ip_admission->sortUrl($ip_admission->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $ip_admission->profilePic->headerCellClass() ?>"><div id="elh_ip_admission_profilePic" class="ip_admission_profilePic"><div class="ew-table-header-caption"><?php echo $ip_admission->profilePic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $ip_admission->profilePic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->profilePic) ?>',1);"><div id="elh_ip_admission_profilePic" class="ip_admission_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->profilePic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->profilePic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->profilePic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->HospID->Visible) { // HospID ?>
	<?php if ($ip_admission->sortUrl($ip_admission->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $ip_admission->HospID->headerCellClass() ?>"><div id="elh_ip_admission_HospID" class="ip_admission_HospID"><div class="ew-table-header-caption"><?php echo $ip_admission->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $ip_admission->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->HospID) ?>',1);"><div id="elh_ip_admission_HospID" class="ip_admission_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($ip_admission->sortUrl($ip_admission->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $ip_admission->ReferedByDr->headerCellClass() ?>"><div id="elh_ip_admission_ReferedByDr" class="ip_admission_ReferedByDr"><div class="ew-table-header-caption"><?php echo $ip_admission->ReferedByDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $ip_admission->ReferedByDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->ReferedByDr) ?>',1);"><div id="elh_ip_admission_ReferedByDr" class="ip_admission_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->ReferedByDr->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->ReferedByDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->ReferedByDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($ip_admission->sortUrl($ip_admission->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $ip_admission->ReferClinicname->headerCellClass() ?>"><div id="elh_ip_admission_ReferClinicname" class="ip_admission_ReferClinicname"><div class="ew-table-header-caption"><?php echo $ip_admission->ReferClinicname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $ip_admission->ReferClinicname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->ReferClinicname) ?>',1);"><div id="elh_ip_admission_ReferClinicname" class="ip_admission_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->ReferClinicname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->ReferClinicname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->ReferCity->Visible) { // ReferCity ?>
	<?php if ($ip_admission->sortUrl($ip_admission->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $ip_admission->ReferCity->headerCellClass() ?>"><div id="elh_ip_admission_ReferCity" class="ip_admission_ReferCity"><div class="ew-table-header-caption"><?php echo $ip_admission->ReferCity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $ip_admission->ReferCity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->ReferCity) ?>',1);"><div id="elh_ip_admission_ReferCity" class="ip_admission_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->ReferCity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->ReferCity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($ip_admission->sortUrl($ip_admission->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $ip_admission->ReferMobileNo->headerCellClass() ?>"><div id="elh_ip_admission_ReferMobileNo" class="ip_admission_ReferMobileNo"><div class="ew-table-header-caption"><?php echo $ip_admission->ReferMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $ip_admission->ReferMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->ReferMobileNo) ?>',1);"><div id="elh_ip_admission_ReferMobileNo" class="ip_admission_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->ReferMobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->ReferMobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($ip_admission->sortUrl($ip_admission->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $ip_admission->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_ip_admission_ReferA4TreatingConsultant" class="ip_admission_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><?php echo $ip_admission->ReferA4TreatingConsultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $ip_admission->ReferA4TreatingConsultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->ReferA4TreatingConsultant) ?>',1);"><div id="elh_ip_admission_ReferA4TreatingConsultant" class="ip_admission_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->ReferA4TreatingConsultant->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($ip_admission->sortUrl($ip_admission->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $ip_admission->PurposreReferredfor->headerCellClass() ?>"><div id="elh_ip_admission_PurposreReferredfor" class="ip_admission_PurposreReferredfor"><div class="ew-table-header-caption"><?php echo $ip_admission->PurposreReferredfor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $ip_admission->PurposreReferredfor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->PurposreReferredfor) ?>',1);"><div id="elh_ip_admission_PurposreReferredfor" class="ip_admission_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->PurposreReferredfor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->PurposreReferredfor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->BillClosing->Visible) { // BillClosing ?>
	<?php if ($ip_admission->sortUrl($ip_admission->BillClosing) == "") { ?>
		<th data-name="BillClosing" class="<?php echo $ip_admission->BillClosing->headerCellClass() ?>"><div id="elh_ip_admission_BillClosing" class="ip_admission_BillClosing"><div class="ew-table-header-caption"><?php echo $ip_admission->BillClosing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosing" class="<?php echo $ip_admission->BillClosing->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->BillClosing) ?>',1);"><div id="elh_ip_admission_BillClosing" class="ip_admission_BillClosing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->BillClosing->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->BillClosing->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->BillClosing->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->BillClosingDate->Visible) { // BillClosingDate ?>
	<?php if ($ip_admission->sortUrl($ip_admission->BillClosingDate) == "") { ?>
		<th data-name="BillClosingDate" class="<?php echo $ip_admission->BillClosingDate->headerCellClass() ?>"><div id="elh_ip_admission_BillClosingDate" class="ip_admission_BillClosingDate"><div class="ew-table-header-caption"><?php echo $ip_admission->BillClosingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosingDate" class="<?php echo $ip_admission->BillClosingDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->BillClosingDate) ?>',1);"><div id="elh_ip_admission_BillClosingDate" class="ip_admission_BillClosingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->BillClosingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->BillClosingDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->BillClosingDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->BillNumber->Visible) { // BillNumber ?>
	<?php if ($ip_admission->sortUrl($ip_admission->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $ip_admission->BillNumber->headerCellClass() ?>"><div id="elh_ip_admission_BillNumber" class="ip_admission_BillNumber"><div class="ew-table-header-caption"><?php echo $ip_admission->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $ip_admission->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->BillNumber) ?>',1);"><div id="elh_ip_admission_BillNumber" class="ip_admission_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->ClosingAmount->Visible) { // ClosingAmount ?>
	<?php if ($ip_admission->sortUrl($ip_admission->ClosingAmount) == "") { ?>
		<th data-name="ClosingAmount" class="<?php echo $ip_admission->ClosingAmount->headerCellClass() ?>"><div id="elh_ip_admission_ClosingAmount" class="ip_admission_ClosingAmount"><div class="ew-table-header-caption"><?php echo $ip_admission->ClosingAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingAmount" class="<?php echo $ip_admission->ClosingAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->ClosingAmount) ?>',1);"><div id="elh_ip_admission_ClosingAmount" class="ip_admission_ClosingAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->ClosingAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->ClosingAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->ClosingAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->ClosingType->Visible) { // ClosingType ?>
	<?php if ($ip_admission->sortUrl($ip_admission->ClosingType) == "") { ?>
		<th data-name="ClosingType" class="<?php echo $ip_admission->ClosingType->headerCellClass() ?>"><div id="elh_ip_admission_ClosingType" class="ip_admission_ClosingType"><div class="ew-table-header-caption"><?php echo $ip_admission->ClosingType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingType" class="<?php echo $ip_admission->ClosingType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->ClosingType) ?>',1);"><div id="elh_ip_admission_ClosingType" class="ip_admission_ClosingType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->ClosingType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->ClosingType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->ClosingType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->BillAmount->Visible) { // BillAmount ?>
	<?php if ($ip_admission->sortUrl($ip_admission->BillAmount) == "") { ?>
		<th data-name="BillAmount" class="<?php echo $ip_admission->BillAmount->headerCellClass() ?>"><div id="elh_ip_admission_BillAmount" class="ip_admission_BillAmount"><div class="ew-table-header-caption"><?php echo $ip_admission->BillAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillAmount" class="<?php echo $ip_admission->BillAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->BillAmount) ?>',1);"><div id="elh_ip_admission_BillAmount" class="ip_admission_BillAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->BillAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->BillAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->BillAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->billclosedBy->Visible) { // billclosedBy ?>
	<?php if ($ip_admission->sortUrl($ip_admission->billclosedBy) == "") { ?>
		<th data-name="billclosedBy" class="<?php echo $ip_admission->billclosedBy->headerCellClass() ?>"><div id="elh_ip_admission_billclosedBy" class="ip_admission_billclosedBy"><div class="ew-table-header-caption"><?php echo $ip_admission->billclosedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="billclosedBy" class="<?php echo $ip_admission->billclosedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->billclosedBy) ?>',1);"><div id="elh_ip_admission_billclosedBy" class="ip_admission_billclosedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->billclosedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->billclosedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->billclosedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<?php if ($ip_admission->sortUrl($ip_admission->bllcloseByDate) == "") { ?>
		<th data-name="bllcloseByDate" class="<?php echo $ip_admission->bllcloseByDate->headerCellClass() ?>"><div id="elh_ip_admission_bllcloseByDate" class="ip_admission_bllcloseByDate"><div class="ew-table-header-caption"><?php echo $ip_admission->bllcloseByDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bllcloseByDate" class="<?php echo $ip_admission->bllcloseByDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->bllcloseByDate) ?>',1);"><div id="elh_ip_admission_bllcloseByDate" class="ip_admission_bllcloseByDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->bllcloseByDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->bllcloseByDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->bllcloseByDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($ip_admission->sortUrl($ip_admission->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $ip_admission->ReportHeader->headerCellClass() ?>"><div id="elh_ip_admission_ReportHeader" class="ip_admission_ReportHeader"><div class="ew-table-header-caption"><?php echo $ip_admission->ReportHeader->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $ip_admission->ReportHeader->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->ReportHeader) ?>',1);"><div id="elh_ip_admission_ReportHeader" class="ip_admission_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->ReportHeader->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->ReportHeader->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->ReportHeader->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->Procedure->Visible) { // Procedure ?>
	<?php if ($ip_admission->sortUrl($ip_admission->Procedure) == "") { ?>
		<th data-name="Procedure" class="<?php echo $ip_admission->Procedure->headerCellClass() ?>"><div id="elh_ip_admission_Procedure" class="ip_admission_Procedure"><div class="ew-table-header-caption"><?php echo $ip_admission->Procedure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Procedure" class="<?php echo $ip_admission->Procedure->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->Procedure) ?>',1);"><div id="elh_ip_admission_Procedure" class="ip_admission_Procedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->Procedure->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->Procedure->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->Procedure->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->Consultant->Visible) { // Consultant ?>
	<?php if ($ip_admission->sortUrl($ip_admission->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $ip_admission->Consultant->headerCellClass() ?>"><div id="elh_ip_admission_Consultant" class="ip_admission_Consultant"><div class="ew-table-header-caption"><?php echo $ip_admission->Consultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $ip_admission->Consultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->Consultant) ?>',1);"><div id="elh_ip_admission_Consultant" class="ip_admission_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->Consultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->Consultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->Consultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->Anesthetist->Visible) { // Anesthetist ?>
	<?php if ($ip_admission->sortUrl($ip_admission->Anesthetist) == "") { ?>
		<th data-name="Anesthetist" class="<?php echo $ip_admission->Anesthetist->headerCellClass() ?>"><div id="elh_ip_admission_Anesthetist" class="ip_admission_Anesthetist"><div class="ew-table-header-caption"><?php echo $ip_admission->Anesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthetist" class="<?php echo $ip_admission->Anesthetist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->Anesthetist) ?>',1);"><div id="elh_ip_admission_Anesthetist" class="ip_admission_Anesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->Anesthetist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->Anesthetist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->Anesthetist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->Amound->Visible) { // Amound ?>
	<?php if ($ip_admission->sortUrl($ip_admission->Amound) == "") { ?>
		<th data-name="Amound" class="<?php echo $ip_admission->Amound->headerCellClass() ?>"><div id="elh_ip_admission_Amound" class="ip_admission_Amound"><div class="ew-table-header-caption"><?php echo $ip_admission->Amound->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amound" class="<?php echo $ip_admission->Amound->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->Amound) ?>',1);"><div id="elh_ip_admission_Amound" class="ip_admission_Amound">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->Amound->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->Amound->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->Amound->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->Package->Visible) { // Package ?>
	<?php if ($ip_admission->sortUrl($ip_admission->Package) == "") { ?>
		<th data-name="Package" class="<?php echo $ip_admission->Package->headerCellClass() ?>"><div id="elh_ip_admission_Package" class="ip_admission_Package"><div class="ew-table-header-caption"><?php echo $ip_admission->Package->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Package" class="<?php echo $ip_admission->Package->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->Package) ?>',1);"><div id="elh_ip_admission_Package" class="ip_admission_Package">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->Package->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->Package->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->Package->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->patient_id->Visible) { // patient_id ?>
	<?php if ($ip_admission->sortUrl($ip_admission->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $ip_admission->patient_id->headerCellClass() ?>"><div id="elh_ip_admission_patient_id" class="ip_admission_patient_id"><div class="ew-table-header-caption"><?php echo $ip_admission->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $ip_admission->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->patient_id) ?>',1);"><div id="elh_ip_admission_patient_id" class="ip_admission_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->PartnerID->Visible) { // PartnerID ?>
	<?php if ($ip_admission->sortUrl($ip_admission->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $ip_admission->PartnerID->headerCellClass() ?>"><div id="elh_ip_admission_PartnerID" class="ip_admission_PartnerID"><div class="ew-table-header-caption"><?php echo $ip_admission->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $ip_admission->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->PartnerID) ?>',1);"><div id="elh_ip_admission_PartnerID" class="ip_admission_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->PartnerID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->PartnerID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->PartnerName->Visible) { // PartnerName ?>
	<?php if ($ip_admission->sortUrl($ip_admission->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $ip_admission->PartnerName->headerCellClass() ?>"><div id="elh_ip_admission_PartnerName" class="ip_admission_PartnerName"><div class="ew-table-header-caption"><?php echo $ip_admission->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $ip_admission->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->PartnerName) ?>',1);"><div id="elh_ip_admission_PartnerName" class="ip_admission_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->PartnerMobile->Visible) { // PartnerMobile ?>
	<?php if ($ip_admission->sortUrl($ip_admission->PartnerMobile) == "") { ?>
		<th data-name="PartnerMobile" class="<?php echo $ip_admission->PartnerMobile->headerCellClass() ?>"><div id="elh_ip_admission_PartnerMobile" class="ip_admission_PartnerMobile"><div class="ew-table-header-caption"><?php echo $ip_admission->PartnerMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerMobile" class="<?php echo $ip_admission->PartnerMobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->PartnerMobile) ?>',1);"><div id="elh_ip_admission_PartnerMobile" class="ip_admission_PartnerMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->PartnerMobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->PartnerMobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->PartnerMobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->Cid->Visible) { // Cid ?>
	<?php if ($ip_admission->sortUrl($ip_admission->Cid) == "") { ?>
		<th data-name="Cid" class="<?php echo $ip_admission->Cid->headerCellClass() ?>"><div id="elh_ip_admission_Cid" class="ip_admission_Cid"><div class="ew-table-header-caption"><?php echo $ip_admission->Cid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cid" class="<?php echo $ip_admission->Cid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->Cid) ?>',1);"><div id="elh_ip_admission_Cid" class="ip_admission_Cid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->Cid->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->Cid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->Cid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->PartId->Visible) { // PartId ?>
	<?php if ($ip_admission->sortUrl($ip_admission->PartId) == "") { ?>
		<th data-name="PartId" class="<?php echo $ip_admission->PartId->headerCellClass() ?>"><div id="elh_ip_admission_PartId" class="ip_admission_PartId"><div class="ew-table-header-caption"><?php echo $ip_admission->PartId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartId" class="<?php echo $ip_admission->PartId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->PartId) ?>',1);"><div id="elh_ip_admission_PartId" class="ip_admission_PartId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->PartId->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->PartId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->PartId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->IDProof->Visible) { // IDProof ?>
	<?php if ($ip_admission->sortUrl($ip_admission->IDProof) == "") { ?>
		<th data-name="IDProof" class="<?php echo $ip_admission->IDProof->headerCellClass() ?>"><div id="elh_ip_admission_IDProof" class="ip_admission_IDProof"><div class="ew-table-header-caption"><?php echo $ip_admission->IDProof->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IDProof" class="<?php echo $ip_admission->IDProof->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->IDProof) ?>',1);"><div id="elh_ip_admission_IDProof" class="ip_admission_IDProof">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->IDProof->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->IDProof->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->IDProof->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<?php if ($ip_admission->sortUrl($ip_admission->AdviceToOtherHospital) == "") { ?>
		<th data-name="AdviceToOtherHospital" class="<?php echo $ip_admission->AdviceToOtherHospital->headerCellClass() ?>"><div id="elh_ip_admission_AdviceToOtherHospital" class="ip_admission_AdviceToOtherHospital"><div class="ew-table-header-caption"><?php echo $ip_admission->AdviceToOtherHospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdviceToOtherHospital" class="<?php echo $ip_admission->AdviceToOtherHospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ip_admission->SortUrl($ip_admission->AdviceToOtherHospital) ?>',1);"><div id="elh_ip_admission_AdviceToOtherHospital" class="ip_admission_AdviceToOtherHospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission->AdviceToOtherHospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission->AdviceToOtherHospital->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ip_admission->AdviceToOtherHospital->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ip_admission_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ip_admission->ExportAll && $ip_admission->isExport()) {
	$ip_admission_list->StopRec = $ip_admission_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ip_admission_list->TotalRecs > $ip_admission_list->StartRec + $ip_admission_list->DisplayRecs - 1)
		$ip_admission_list->StopRec = $ip_admission_list->StartRec + $ip_admission_list->DisplayRecs - 1;
	else
		$ip_admission_list->StopRec = $ip_admission_list->TotalRecs;
}
$ip_admission_list->RecCnt = $ip_admission_list->StartRec - 1;
if ($ip_admission_list->Recordset && !$ip_admission_list->Recordset->EOF) {
	$ip_admission_list->Recordset->moveFirst();
	$selectLimit = $ip_admission_list->UseSelectLimit;
	if (!$selectLimit && $ip_admission_list->StartRec > 1)
		$ip_admission_list->Recordset->move($ip_admission_list->StartRec - 1);
} elseif (!$ip_admission->AllowAddDeleteRow && $ip_admission_list->StopRec == 0) {
	$ip_admission_list->StopRec = $ip_admission->GridAddRowCount;
}

// Initialize aggregate
$ip_admission->RowType = ROWTYPE_AGGREGATEINIT;
$ip_admission->resetAttributes();
$ip_admission_list->renderRow();
while ($ip_admission_list->RecCnt < $ip_admission_list->StopRec) {
	$ip_admission_list->RecCnt++;
	if ($ip_admission_list->RecCnt >= $ip_admission_list->StartRec) {
		$ip_admission_list->RowCnt++;

		// Set up key count
		$ip_admission_list->KeyCount = $ip_admission_list->RowIndex;

		// Init row class and style
		$ip_admission->resetAttributes();
		$ip_admission->CssClass = "";
		if ($ip_admission->isGridAdd()) {
		} else {
			$ip_admission_list->loadRowValues($ip_admission_list->Recordset); // Load row values
		}
		$ip_admission->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ip_admission->RowAttrs = array_merge($ip_admission->RowAttrs, array('data-rowindex'=>$ip_admission_list->RowCnt, 'id'=>'r' . $ip_admission_list->RowCnt . '_ip_admission', 'data-rowtype'=>$ip_admission->RowType));

		// Render row
		$ip_admission_list->renderRow();

		// Render list options
		$ip_admission_list->renderListOptions();
?>
	<tr<?php echo $ip_admission->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ip_admission_list->ListOptions->render("body", "left", $ip_admission_list->RowCnt);
?>
	<?php if ($ip_admission->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ip_admission->id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_id" class="ip_admission_id">
<span<?php echo $ip_admission->id->viewAttributes() ?>>
<?php echo $ip_admission->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->mrnNo->Visible) { // mrnNo ?>
		<td data-name="mrnNo"<?php echo $ip_admission->mrnNo->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_mrnNo" class="ip_admission_mrnNo">
<span<?php echo $ip_admission->mrnNo->viewAttributes() ?>>
<?php echo $ip_admission->mrnNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $ip_admission->PatientID->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_PatientID" class="ip_admission_PatientID">
<span<?php echo $ip_admission->PatientID->viewAttributes() ?>>
<?php echo $ip_admission->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name"<?php echo $ip_admission->patient_name->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_patient_name" class="ip_admission_patient_name">
<span<?php echo $ip_admission->patient_name->viewAttributes() ?>>
<?php echo $ip_admission->patient_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->mobileno->Visible) { // mobileno ?>
		<td data-name="mobileno"<?php echo $ip_admission->mobileno->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_mobileno" class="ip_admission_mobileno">
<span<?php echo $ip_admission->mobileno->viewAttributes() ?>>
<?php echo $ip_admission->mobileno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $ip_admission->gender->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_gender" class="ip_admission_gender">
<span<?php echo $ip_admission->gender->viewAttributes() ?>>
<?php echo $ip_admission->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->age->Visible) { // age ?>
		<td data-name="age"<?php echo $ip_admission->age->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_age" class="ip_admission_age">
<span<?php echo $ip_admission->age->viewAttributes() ?>>
<?php echo $ip_admission->age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td data-name="typeRegsisteration"<?php echo $ip_admission->typeRegsisteration->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_typeRegsisteration" class="ip_admission_typeRegsisteration">
<span<?php echo $ip_admission->typeRegsisteration->viewAttributes() ?>>
<?php echo $ip_admission->typeRegsisteration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->PaymentCategory->Visible) { // PaymentCategory ?>
		<td data-name="PaymentCategory"<?php echo $ip_admission->PaymentCategory->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_PaymentCategory" class="ip_admission_PaymentCategory">
<span<?php echo $ip_admission->PaymentCategory->viewAttributes() ?>>
<?php echo $ip_admission->PaymentCategory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id"<?php echo $ip_admission->physician_id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_physician_id" class="ip_admission_physician_id">
<span<?php echo $ip_admission->physician_id->viewAttributes() ?>>
<?php echo $ip_admission->physician_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<td data-name="admission_consultant_id"<?php echo $ip_admission->admission_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_admission_consultant_id" class="ip_admission_admission_consultant_id">
<span<?php echo $ip_admission->admission_consultant_id->viewAttributes() ?>>
<?php echo $ip_admission->admission_consultant_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<td data-name="leading_consultant_id"<?php echo $ip_admission->leading_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_leading_consultant_id" class="ip_admission_leading_consultant_id">
<span<?php echo $ip_admission->leading_consultant_id->viewAttributes() ?>>
<?php echo $ip_admission->leading_consultant_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->admission_date->Visible) { // admission_date ?>
		<td data-name="admission_date"<?php echo $ip_admission->admission_date->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_admission_date" class="ip_admission_admission_date">
<span<?php echo $ip_admission->admission_date->viewAttributes() ?>>
<?php echo $ip_admission->admission_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->release_date->Visible) { // release_date ?>
		<td data-name="release_date"<?php echo $ip_admission->release_date->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_release_date" class="ip_admission_release_date">
<span<?php echo $ip_admission->release_date->viewAttributes() ?>>
<?php echo $ip_admission->release_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus"<?php echo $ip_admission->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_PaymentStatus" class="ip_admission_PaymentStatus">
<span<?php echo $ip_admission->PaymentStatus->viewAttributes() ?>>
<?php echo $ip_admission->PaymentStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $ip_admission->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_createddatetime" class="ip_admission_createddatetime">
<span<?php echo $ip_admission->createddatetime->viewAttributes() ?>>
<?php echo $ip_admission->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic"<?php echo $ip_admission->profilePic->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_profilePic" class="ip_admission_profilePic">
<span<?php echo $ip_admission->profilePic->viewAttributes() ?>>
<?php echo $ip_admission->profilePic->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $ip_admission->HospID->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_HospID" class="ip_admission_HospID">
<span<?php echo $ip_admission->HospID->viewAttributes() ?>>
<?php echo $ip_admission->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr"<?php echo $ip_admission->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_ReferedByDr" class="ip_admission_ReferedByDr">
<span<?php echo $ip_admission->ReferedByDr->viewAttributes() ?>>
<?php echo $ip_admission->ReferedByDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname"<?php echo $ip_admission->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_ReferClinicname" class="ip_admission_ReferClinicname">
<span<?php echo $ip_admission->ReferClinicname->viewAttributes() ?>>
<?php echo $ip_admission->ReferClinicname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity"<?php echo $ip_admission->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_ReferCity" class="ip_admission_ReferCity">
<span<?php echo $ip_admission->ReferCity->viewAttributes() ?>>
<?php echo $ip_admission->ReferCity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo"<?php echo $ip_admission->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_ReferMobileNo" class="ip_admission_ReferMobileNo">
<span<?php echo $ip_admission->ReferMobileNo->viewAttributes() ?>>
<?php echo $ip_admission->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant"<?php echo $ip_admission->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_ReferA4TreatingConsultant" class="ip_admission_ReferA4TreatingConsultant">
<span<?php echo $ip_admission->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $ip_admission->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor"<?php echo $ip_admission->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_PurposreReferredfor" class="ip_admission_PurposreReferredfor">
<span<?php echo $ip_admission->PurposreReferredfor->viewAttributes() ?>>
<?php echo $ip_admission->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->BillClosing->Visible) { // BillClosing ?>
		<td data-name="BillClosing"<?php echo $ip_admission->BillClosing->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_BillClosing" class="ip_admission_BillClosing">
<span<?php echo $ip_admission->BillClosing->viewAttributes() ?>>
<?php echo $ip_admission->BillClosing->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->BillClosingDate->Visible) { // BillClosingDate ?>
		<td data-name="BillClosingDate"<?php echo $ip_admission->BillClosingDate->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_BillClosingDate" class="ip_admission_BillClosingDate">
<span<?php echo $ip_admission->BillClosingDate->viewAttributes() ?>>
<?php echo $ip_admission->BillClosingDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $ip_admission->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_BillNumber" class="ip_admission_BillNumber">
<span<?php echo $ip_admission->BillNumber->viewAttributes() ?>>
<?php echo $ip_admission->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->ClosingAmount->Visible) { // ClosingAmount ?>
		<td data-name="ClosingAmount"<?php echo $ip_admission->ClosingAmount->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_ClosingAmount" class="ip_admission_ClosingAmount">
<span<?php echo $ip_admission->ClosingAmount->viewAttributes() ?>>
<?php echo $ip_admission->ClosingAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->ClosingType->Visible) { // ClosingType ?>
		<td data-name="ClosingType"<?php echo $ip_admission->ClosingType->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_ClosingType" class="ip_admission_ClosingType">
<span<?php echo $ip_admission->ClosingType->viewAttributes() ?>>
<?php echo $ip_admission->ClosingType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->BillAmount->Visible) { // BillAmount ?>
		<td data-name="BillAmount"<?php echo $ip_admission->BillAmount->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_BillAmount" class="ip_admission_BillAmount">
<span<?php echo $ip_admission->BillAmount->viewAttributes() ?>>
<?php echo $ip_admission->BillAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->billclosedBy->Visible) { // billclosedBy ?>
		<td data-name="billclosedBy"<?php echo $ip_admission->billclosedBy->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_billclosedBy" class="ip_admission_billclosedBy">
<span<?php echo $ip_admission->billclosedBy->viewAttributes() ?>>
<?php echo $ip_admission->billclosedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->bllcloseByDate->Visible) { // bllcloseByDate ?>
		<td data-name="bllcloseByDate"<?php echo $ip_admission->bllcloseByDate->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_bllcloseByDate" class="ip_admission_bllcloseByDate">
<span<?php echo $ip_admission->bllcloseByDate->viewAttributes() ?>>
<?php echo $ip_admission->bllcloseByDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader"<?php echo $ip_admission->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_ReportHeader" class="ip_admission_ReportHeader">
<span<?php echo $ip_admission->ReportHeader->viewAttributes() ?>>
<?php echo $ip_admission->ReportHeader->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->Procedure->Visible) { // Procedure ?>
		<td data-name="Procedure"<?php echo $ip_admission->Procedure->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_Procedure" class="ip_admission_Procedure">
<span<?php echo $ip_admission->Procedure->viewAttributes() ?>>
<?php echo $ip_admission->Procedure->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant"<?php echo $ip_admission->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_Consultant" class="ip_admission_Consultant">
<span<?php echo $ip_admission->Consultant->viewAttributes() ?>>
<?php echo $ip_admission->Consultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->Anesthetist->Visible) { // Anesthetist ?>
		<td data-name="Anesthetist"<?php echo $ip_admission->Anesthetist->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_Anesthetist" class="ip_admission_Anesthetist">
<span<?php echo $ip_admission->Anesthetist->viewAttributes() ?>>
<?php echo $ip_admission->Anesthetist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->Amound->Visible) { // Amound ?>
		<td data-name="Amound"<?php echo $ip_admission->Amound->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_Amound" class="ip_admission_Amound">
<span<?php echo $ip_admission->Amound->viewAttributes() ?>>
<?php echo $ip_admission->Amound->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->Package->Visible) { // Package ?>
		<td data-name="Package"<?php echo $ip_admission->Package->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_Package" class="ip_admission_Package">
<span<?php echo $ip_admission->Package->viewAttributes() ?>>
<?php echo $ip_admission->Package->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $ip_admission->patient_id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_patient_id" class="ip_admission_patient_id">
<span<?php echo $ip_admission->patient_id->viewAttributes() ?>>
<?php echo $ip_admission->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID"<?php echo $ip_admission->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_PartnerID" class="ip_admission_PartnerID">
<span<?php echo $ip_admission->PartnerID->viewAttributes() ?>>
<?php echo $ip_admission->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $ip_admission->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_PartnerName" class="ip_admission_PartnerName">
<span<?php echo $ip_admission->PartnerName->viewAttributes() ?>>
<?php echo $ip_admission->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->PartnerMobile->Visible) { // PartnerMobile ?>
		<td data-name="PartnerMobile"<?php echo $ip_admission->PartnerMobile->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_PartnerMobile" class="ip_admission_PartnerMobile">
<span<?php echo $ip_admission->PartnerMobile->viewAttributes() ?>>
<?php echo $ip_admission->PartnerMobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->Cid->Visible) { // Cid ?>
		<td data-name="Cid"<?php echo $ip_admission->Cid->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_Cid" class="ip_admission_Cid">
<span<?php echo $ip_admission->Cid->viewAttributes() ?>>
<?php echo $ip_admission->Cid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->PartId->Visible) { // PartId ?>
		<td data-name="PartId"<?php echo $ip_admission->PartId->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_PartId" class="ip_admission_PartId">
<span<?php echo $ip_admission->PartId->viewAttributes() ?>>
<?php echo $ip_admission->PartId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->IDProof->Visible) { // IDProof ?>
		<td data-name="IDProof"<?php echo $ip_admission->IDProof->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_IDProof" class="ip_admission_IDProof">
<span<?php echo $ip_admission->IDProof->viewAttributes() ?>>
<?php echo $ip_admission->IDProof->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
		<td data-name="AdviceToOtherHospital"<?php echo $ip_admission->AdviceToOtherHospital->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCnt ?>_ip_admission_AdviceToOtherHospital" class="ip_admission_AdviceToOtherHospital">
<span<?php echo $ip_admission->AdviceToOtherHospital->viewAttributes() ?>>
<?php echo $ip_admission->AdviceToOtherHospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ip_admission_list->ListOptions->render("body", "right", $ip_admission_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$ip_admission->isGridAdd())
		$ip_admission_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$ip_admission->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ip_admission_list->Recordset)
	$ip_admission_list->Recordset->Close();
?>
<?php if (!$ip_admission->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ip_admission->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ip_admission_list->Pager)) $ip_admission_list->Pager = new NumericPager($ip_admission_list->StartRec, $ip_admission_list->DisplayRecs, $ip_admission_list->TotalRecs, $ip_admission_list->RecRange, $ip_admission_list->AutoHidePager) ?>
<?php if ($ip_admission_list->Pager->RecordCount > 0 && $ip_admission_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ip_admission_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ip_admission_list->pageUrl() ?>start=<?php echo $ip_admission_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ip_admission_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ip_admission_list->pageUrl() ?>start=<?php echo $ip_admission_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ip_admission_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ip_admission_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ip_admission_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ip_admission_list->pageUrl() ?>start=<?php echo $ip_admission_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ip_admission_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ip_admission_list->pageUrl() ?>start=<?php echo $ip_admission_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ip_admission_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ip_admission_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ip_admission_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ip_admission_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ip_admission_list->TotalRecs > 0 && (!$ip_admission_list->AutoHidePageSizeSelector || $ip_admission_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ip_admission">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ip_admission_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ip_admission_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ip_admission_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ip_admission_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ip_admission_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ip_admission_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ip_admission->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ip_admission_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ip_admission_list->TotalRecs == 0 && !$ip_admission->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ip_admission_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ip_admission_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ip_admission->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ip_admission->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ip_admission", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ip_admission_list->terminate();
?>