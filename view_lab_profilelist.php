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
$view_lab_profile_list = new view_lab_profile_list();

// Run the page
$view_lab_profile_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_profile_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_lab_profile->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_lab_profilelist = currentForm = new ew.Form("fview_lab_profilelist", "list");
fview_lab_profilelist.formKeyCountName = '<?php echo $view_lab_profile_list->FormKeyCountName ?>';

// Validate form
fview_lab_profilelist.validate = function() {
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
		<?php if ($view_lab_profile_list->Id->Required) { ?>
			elm = this.getElements("x" + infix + "_Id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Id->caption(), $view_lab_profile->Id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->CODE->Required) { ?>
			elm = this.getElements("x" + infix + "_CODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->CODE->caption(), $view_lab_profile->CODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->SERVICE->Required) { ?>
			elm = this.getElements("x" + infix + "_SERVICE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->SERVICE->caption(), $view_lab_profile->SERVICE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->UNITS->Required) { ?>
			elm = this.getElements("x" + infix + "_UNITS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->UNITS->caption(), $view_lab_profile->UNITS->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UNITS");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_profile->UNITS->errorMessage()) ?>");
		<?php if ($view_lab_profile_list->AMOUNT->Required) { ?>
			elm = this.getElements("x" + infix + "_AMOUNT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->AMOUNT->caption(), $view_lab_profile->AMOUNT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->SERVICE_TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_SERVICE_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->SERVICE_TYPE->caption(), $view_lab_profile->SERVICE_TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->DEPARTMENT->Required) { ?>
			elm = this.getElements("x" + infix + "_DEPARTMENT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->DEPARTMENT->caption(), $view_lab_profile->DEPARTMENT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->mas_services_billingcol->Required) { ?>
			elm = this.getElements("x" + infix + "_mas_services_billingcol");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->mas_services_billingcol->caption(), $view_lab_profile->mas_services_billingcol->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->DrShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->DrShareAmount->caption(), $view_lab_profile->DrShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_profile->DrShareAmount->errorMessage()) ?>");
		<?php if ($view_lab_profile_list->HospShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->HospShareAmount->caption(), $view_lab_profile->HospShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_profile->HospShareAmount->errorMessage()) ?>");
		<?php if ($view_lab_profile_list->DrSharePer->Required) { ?>
			elm = this.getElements("x" + infix + "_DrSharePer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->DrSharePer->caption(), $view_lab_profile->DrSharePer->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrSharePer");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_profile->DrSharePer->errorMessage()) ?>");
		<?php if ($view_lab_profile_list->HospSharePer->Required) { ?>
			elm = this.getElements("x" + infix + "_HospSharePer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->HospSharePer->caption(), $view_lab_profile->HospSharePer->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospSharePer");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_profile->HospSharePer->errorMessage()) ?>");
		<?php if ($view_lab_profile_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->HospID->caption(), $view_lab_profile->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->TestSubCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestSubCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->TestSubCd->caption(), $view_lab_profile->TestSubCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Method->caption(), $view_lab_profile->Method->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Order->caption(), $view_lab_profile->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_profile->Order->errorMessage()) ?>");
		<?php if ($view_lab_profile_list->ResType->Required) { ?>
			elm = this.getElements("x" + infix + "_ResType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->ResType->caption(), $view_lab_profile->ResType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->UnitCD->Required) { ?>
			elm = this.getElements("x" + infix + "_UnitCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->UnitCD->caption(), $view_lab_profile->UnitCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->Sample->Required) { ?>
			elm = this.getElements("x" + infix + "_Sample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Sample->caption(), $view_lab_profile->Sample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->NoD->Required) { ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->NoD->caption(), $view_lab_profile->NoD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_profile->NoD->errorMessage()) ?>");
		<?php if ($view_lab_profile_list->BillOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->BillOrder->caption(), $view_lab_profile->BillOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_profile->BillOrder->errorMessage()) ?>");
		<?php if ($view_lab_profile_list->Inactive->Required) { ?>
			elm = this.getElements("x" + infix + "_Inactive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Inactive->caption(), $view_lab_profile->Inactive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->Outsource->Required) { ?>
			elm = this.getElements("x" + infix + "_Outsource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Outsource->caption(), $view_lab_profile->Outsource->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->CollSample->Required) { ?>
			elm = this.getElements("x" + infix + "_CollSample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->CollSample->caption(), $view_lab_profile->CollSample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->TestType->Required) { ?>
			elm = this.getElements("x" + infix + "_TestType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->TestType->caption(), $view_lab_profile->TestType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->NoHeading->Required) { ?>
			elm = this.getElements("x" + infix + "_NoHeading");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->NoHeading->caption(), $view_lab_profile->NoHeading->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->ChemicalCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ChemicalCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->ChemicalCode->caption(), $view_lab_profile->ChemicalCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->ChemicalName->Required) { ?>
			elm = this.getElements("x" + infix + "_ChemicalName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->ChemicalName->caption(), $view_lab_profile->ChemicalName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_list->Utilaization->Required) { ?>
			elm = this.getElements("x" + infix + "_Utilaization");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Utilaization->caption(), $view_lab_profile->Utilaization->RequiredErrorMessage)) ?>");
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
fview_lab_profilelist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "CODE", false)) return false;
	if (ew.valueChanged(fobj, infix, "SERVICE", false)) return false;
	if (ew.valueChanged(fobj, infix, "UNITS", false)) return false;
	if (ew.valueChanged(fobj, infix, "AMOUNT", false)) return false;
	if (ew.valueChanged(fobj, infix, "SERVICE_TYPE", false)) return false;
	if (ew.valueChanged(fobj, infix, "DEPARTMENT", false)) return false;
	if (ew.valueChanged(fobj, infix, "mas_services_billingcol", false)) return false;
	if (ew.valueChanged(fobj, infix, "DrShareAmount", false)) return false;
	if (ew.valueChanged(fobj, infix, "HospShareAmount", false)) return false;
	if (ew.valueChanged(fobj, infix, "DrSharePer", false)) return false;
	if (ew.valueChanged(fobj, infix, "HospSharePer", false)) return false;
	if (ew.valueChanged(fobj, infix, "TestSubCd", false)) return false;
	if (ew.valueChanged(fobj, infix, "Method", false)) return false;
	if (ew.valueChanged(fobj, infix, "Order", false)) return false;
	if (ew.valueChanged(fobj, infix, "ResType", false)) return false;
	if (ew.valueChanged(fobj, infix, "UnitCD", false)) return false;
	if (ew.valueChanged(fobj, infix, "Sample", false)) return false;
	if (ew.valueChanged(fobj, infix, "NoD", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillOrder", false)) return false;
	if (ew.valueChanged(fobj, infix, "Inactive", false)) return false;
	if (ew.valueChanged(fobj, infix, "Outsource", false)) return false;
	if (ew.valueChanged(fobj, infix, "CollSample", false)) return false;
	if (ew.valueChanged(fobj, infix, "TestType", false)) return false;
	if (ew.valueChanged(fobj, infix, "NoHeading", false)) return false;
	if (ew.valueChanged(fobj, infix, "ChemicalCode", false)) return false;
	if (ew.valueChanged(fobj, infix, "ChemicalName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Utilaization", false)) return false;
	return true;
}

// Form_CustomValidate event
fview_lab_profilelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_profilelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_profilelist.lists["x_SERVICE_TYPE"] = <?php echo $view_lab_profile_list->SERVICE_TYPE->Lookup->toClientList() ?>;
fview_lab_profilelist.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($view_lab_profile_list->SERVICE_TYPE->lookupOptions()) ?>;
fview_lab_profilelist.lists["x_DEPARTMENT"] = <?php echo $view_lab_profile_list->DEPARTMENT->Lookup->toClientList() ?>;
fview_lab_profilelist.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($view_lab_profile_list->DEPARTMENT->lookupOptions()) ?>;
fview_lab_profilelist.lists["x_TestType"] = <?php echo $view_lab_profile_list->TestType->Lookup->toClientList() ?>;
fview_lab_profilelist.lists["x_TestType"].options = <?php echo JsonEncode($view_lab_profile_list->TestType->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_lab_profilelistsrch = currentSearchForm = new ew.Form("fview_lab_profilelistsrch");

// Validate function for search
fview_lab_profilelistsrch.validate = function(fobj) {
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
fview_lab_profilelistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_profilelistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_profilelistsrch.lists["x_SERVICE_TYPE"] = <?php echo $view_lab_profile_list->SERVICE_TYPE->Lookup->toClientList() ?>;
fview_lab_profilelistsrch.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($view_lab_profile_list->SERVICE_TYPE->lookupOptions()) ?>;
fview_lab_profilelistsrch.lists["x_TestType"] = <?php echo $view_lab_profile_list->TestType->Lookup->toClientList() ?>;
fview_lab_profilelistsrch.lists["x_TestType"].options = <?php echo JsonEncode($view_lab_profile_list->TestType->options(FALSE, TRUE)) ?>;

// Filters
fview_lab_profilelistsrch.filterList = <?php echo $view_lab_profile_list->getFilterList() ?>;
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
<?php if (!$view_lab_profile->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_lab_profile_list->TotalRecs > 0 && $view_lab_profile_list->ExportOptions->visible()) { ?>
<?php $view_lab_profile_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_profile_list->ImportOptions->visible()) { ?>
<?php $view_lab_profile_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_profile_list->SearchOptions->visible()) { ?>
<?php $view_lab_profile_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_profile_list->FilterOptions->visible()) { ?>
<?php $view_lab_profile_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_lab_profile_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_lab_profile->isExport() && !$view_lab_profile->CurrentAction) { ?>
<form name="fview_lab_profilelistsrch" id="fview_lab_profilelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_lab_profile_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_lab_profilelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_lab_profile">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_lab_profile_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_lab_profile->RowType = ROWTYPE_SEARCH;

// Render row
$view_lab_profile->resetAttributes();
$view_lab_profile_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_lab_profile->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<div id="xsc_SERVICE_TYPE" class="ew-cell form-group">
		<label for="x_SERVICE_TYPE" class="ew-search-caption ew-label"><?php echo $view_lab_profile->SERVICE_TYPE->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SERVICE_TYPE" id="z_SERVICE_TYPE" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $view_lab_profile->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x_SERVICE_TYPE" name="x_SERVICE_TYPE"<?php echo $view_lab_profile->SERVICE_TYPE->editAttributes() ?>>
		<?php echo $view_lab_profile->SERVICE_TYPE->selectOptionListHtml("x_SERVICE_TYPE") ?>
	</select>
</div>
<?php echo $view_lab_profile->SERVICE_TYPE->Lookup->getParamTag("p_x_SERVICE_TYPE") ?>
</span>
	</div>
<?php } ?>
<?php if ($view_lab_profile->TestType->Visible) { // TestType ?>
	<div id="xsc_TestType" class="ew-cell form-group">
		<label for="x_TestType" class="ew-search-caption ew-label"><?php echo $view_lab_profile->TestType->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TestType" id="z_TestType" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_TestType" data-value-separator="<?php echo $view_lab_profile->TestType->displayValueSeparatorAttribute() ?>" id="x_TestType" name="x_TestType"<?php echo $view_lab_profile->TestType->editAttributes() ?>>
		<?php echo $view_lab_profile->TestType->selectOptionListHtml("x_TestType") ?>
	</select>
</div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_lab_profile_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_lab_profile_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_lab_profile_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_lab_profile_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_lab_profile_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_lab_profile_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_lab_profile_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_lab_profile_list->showPageHeader(); ?>
<?php
$view_lab_profile_list->showMessage();
?>
<?php if ($view_lab_profile_list->TotalRecs > 0 || $view_lab_profile->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_lab_profile_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_profile">
<?php if (!$view_lab_profile->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_lab_profile->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_lab_profile_list->Pager)) $view_lab_profile_list->Pager = new NumericPager($view_lab_profile_list->StartRec, $view_lab_profile_list->DisplayRecs, $view_lab_profile_list->TotalRecs, $view_lab_profile_list->RecRange, $view_lab_profile_list->AutoHidePager) ?>
<?php if ($view_lab_profile_list->Pager->RecordCount > 0 && $view_lab_profile_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_lab_profile_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_profile_list->pageUrl() ?>start=<?php echo $view_lab_profile_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_profile_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_profile_list->pageUrl() ?>start=<?php echo $view_lab_profile_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_lab_profile_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_lab_profile_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_lab_profile_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_profile_list->pageUrl() ?>start=<?php echo $view_lab_profile_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_profile_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_profile_list->pageUrl() ?>start=<?php echo $view_lab_profile_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_lab_profile_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_profile_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_profile_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_profile_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_lab_profile_list->TotalRecs > 0 && (!$view_lab_profile_list->AutoHidePageSizeSelector || $view_lab_profile_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_lab_profile">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_lab_profile_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_lab_profile_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_lab_profile_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_lab_profile_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_lab_profile_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_lab_profile_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_lab_profile->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_profile_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_lab_profilelist" id="fview_lab_profilelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_profile_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_profile_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_profile">
<div id="gmp_view_lab_profile" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_lab_profile_list->TotalRecs > 0 || $view_lab_profile->isAdd() || $view_lab_profile->isCopy() || $view_lab_profile->isGridEdit()) { ?>
<table id="tbl_view_lab_profilelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_lab_profile_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_lab_profile_list->renderListOptions();

// Render list options (header, left)
$view_lab_profile_list->ListOptions->render("header", "left");
?>
<?php if ($view_lab_profile->Id->Visible) { // Id ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->Id) == "") { ?>
		<th data-name="Id" class="<?php echo $view_lab_profile->Id->headerCellClass() ?>"><div id="elh_view_lab_profile_Id" class="view_lab_profile_Id"><div class="ew-table-header-caption"><?php echo $view_lab_profile->Id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Id" class="<?php echo $view_lab_profile->Id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->Id) ?>',1);"><div id="elh_view_lab_profile_Id" class="view_lab_profile_Id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->Id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->Id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->Id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->CODE->Visible) { // CODE ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $view_lab_profile->CODE->headerCellClass() ?>"><div id="elh_view_lab_profile_CODE" class="view_lab_profile_CODE"><div class="ew-table-header-caption"><?php echo $view_lab_profile->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $view_lab_profile->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->CODE) ?>',1);"><div id="elh_view_lab_profile_CODE" class="view_lab_profile_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->CODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->CODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->SERVICE->Visible) { // SERVICE ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->SERVICE) == "") { ?>
		<th data-name="SERVICE" class="<?php echo $view_lab_profile->SERVICE->headerCellClass() ?>"><div id="elh_view_lab_profile_SERVICE" class="view_lab_profile_SERVICE"><div class="ew-table-header-caption"><?php echo $view_lab_profile->SERVICE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE" class="<?php echo $view_lab_profile->SERVICE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->SERVICE) ?>',1);"><div id="elh_view_lab_profile_SERVICE" class="view_lab_profile_SERVICE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->SERVICE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->SERVICE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->SERVICE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->UNITS->Visible) { // UNITS ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->UNITS) == "") { ?>
		<th data-name="UNITS" class="<?php echo $view_lab_profile->UNITS->headerCellClass() ?>"><div id="elh_view_lab_profile_UNITS" class="view_lab_profile_UNITS"><div class="ew-table-header-caption"><?php echo $view_lab_profile->UNITS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNITS" class="<?php echo $view_lab_profile->UNITS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->UNITS) ?>',1);"><div id="elh_view_lab_profile_UNITS" class="view_lab_profile_UNITS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->UNITS->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->UNITS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->UNITS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->AMOUNT->Visible) { // AMOUNT ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->AMOUNT) == "") { ?>
		<th data-name="AMOUNT" class="<?php echo $view_lab_profile->AMOUNT->headerCellClass() ?>"><div id="elh_view_lab_profile_AMOUNT" class="view_lab_profile_AMOUNT"><div class="ew-table-header-caption"><?php echo $view_lab_profile->AMOUNT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AMOUNT" class="<?php echo $view_lab_profile->AMOUNT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->AMOUNT) ?>',1);"><div id="elh_view_lab_profile_AMOUNT" class="view_lab_profile_AMOUNT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->AMOUNT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->AMOUNT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->AMOUNT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->SERVICE_TYPE) == "") { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $view_lab_profile->SERVICE_TYPE->headerCellClass() ?>"><div id="elh_view_lab_profile_SERVICE_TYPE" class="view_lab_profile_SERVICE_TYPE"><div class="ew-table-header-caption"><?php echo $view_lab_profile->SERVICE_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $view_lab_profile->SERVICE_TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->SERVICE_TYPE) ?>',1);"><div id="elh_view_lab_profile_SERVICE_TYPE" class="view_lab_profile_SERVICE_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->SERVICE_TYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->SERVICE_TYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->SERVICE_TYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->DEPARTMENT) == "") { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_lab_profile->DEPARTMENT->headerCellClass() ?>"><div id="elh_view_lab_profile_DEPARTMENT" class="view_lab_profile_DEPARTMENT"><div class="ew-table-header-caption"><?php echo $view_lab_profile->DEPARTMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_lab_profile->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->DEPARTMENT) ?>',1);"><div id="elh_view_lab_profile_DEPARTMENT" class="view_lab_profile_DEPARTMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->DEPARTMENT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->DEPARTMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->DEPARTMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->mas_services_billingcol) == "") { ?>
		<th data-name="mas_services_billingcol" class="<?php echo $view_lab_profile->mas_services_billingcol->headerCellClass() ?>"><div id="elh_view_lab_profile_mas_services_billingcol" class="view_lab_profile_mas_services_billingcol"><div class="ew-table-header-caption"><?php echo $view_lab_profile->mas_services_billingcol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mas_services_billingcol" class="<?php echo $view_lab_profile->mas_services_billingcol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->mas_services_billingcol) ?>',1);"><div id="elh_view_lab_profile_mas_services_billingcol" class="view_lab_profile_mas_services_billingcol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->mas_services_billingcol->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->mas_services_billingcol->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->mas_services_billingcol->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->DrShareAmount->Visible) { // DrShareAmount ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->DrShareAmount) == "") { ?>
		<th data-name="DrShareAmount" class="<?php echo $view_lab_profile->DrShareAmount->headerCellClass() ?>"><div id="elh_view_lab_profile_DrShareAmount" class="view_lab_profile_DrShareAmount"><div class="ew-table-header-caption"><?php echo $view_lab_profile->DrShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareAmount" class="<?php echo $view_lab_profile->DrShareAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->DrShareAmount) ?>',1);"><div id="elh_view_lab_profile_DrShareAmount" class="view_lab_profile_DrShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->DrShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->DrShareAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->DrShareAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->HospShareAmount->Visible) { // HospShareAmount ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->HospShareAmount) == "") { ?>
		<th data-name="HospShareAmount" class="<?php echo $view_lab_profile->HospShareAmount->headerCellClass() ?>"><div id="elh_view_lab_profile_HospShareAmount" class="view_lab_profile_HospShareAmount"><div class="ew-table-header-caption"><?php echo $view_lab_profile->HospShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospShareAmount" class="<?php echo $view_lab_profile->HospShareAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->HospShareAmount) ?>',1);"><div id="elh_view_lab_profile_HospShareAmount" class="view_lab_profile_HospShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->HospShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->HospShareAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->HospShareAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->DrSharePer->Visible) { // DrSharePer ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->DrSharePer) == "") { ?>
		<th data-name="DrSharePer" class="<?php echo $view_lab_profile->DrSharePer->headerCellClass() ?>"><div id="elh_view_lab_profile_DrSharePer" class="view_lab_profile_DrSharePer"><div class="ew-table-header-caption"><?php echo $view_lab_profile->DrSharePer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrSharePer" class="<?php echo $view_lab_profile->DrSharePer->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->DrSharePer) ?>',1);"><div id="elh_view_lab_profile_DrSharePer" class="view_lab_profile_DrSharePer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->DrSharePer->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->DrSharePer->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->DrSharePer->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->HospSharePer->Visible) { // HospSharePer ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->HospSharePer) == "") { ?>
		<th data-name="HospSharePer" class="<?php echo $view_lab_profile->HospSharePer->headerCellClass() ?>"><div id="elh_view_lab_profile_HospSharePer" class="view_lab_profile_HospSharePer"><div class="ew-table-header-caption"><?php echo $view_lab_profile->HospSharePer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospSharePer" class="<?php echo $view_lab_profile->HospSharePer->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->HospSharePer) ?>',1);"><div id="elh_view_lab_profile_HospSharePer" class="view_lab_profile_HospSharePer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->HospSharePer->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->HospSharePer->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->HospSharePer->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_lab_profile->HospID->headerCellClass() ?>"><div id="elh_view_lab_profile_HospID" class="view_lab_profile_HospID"><div class="ew-table-header-caption"><?php echo $view_lab_profile->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_lab_profile->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->HospID) ?>',1);"><div id="elh_view_lab_profile_HospID" class="view_lab_profile_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $view_lab_profile->TestSubCd->headerCellClass() ?>"><div id="elh_view_lab_profile_TestSubCd" class="view_lab_profile_TestSubCd"><div class="ew-table-header-caption"><?php echo $view_lab_profile->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $view_lab_profile->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->TestSubCd) ?>',1);"><div id="elh_view_lab_profile_TestSubCd" class="view_lab_profile_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->TestSubCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->TestSubCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->TestSubCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->Method->Visible) { // Method ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $view_lab_profile->Method->headerCellClass() ?>"><div id="elh_view_lab_profile_Method" class="view_lab_profile_Method"><div class="ew-table-header-caption"><?php echo $view_lab_profile->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $view_lab_profile->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->Method) ?>',1);"><div id="elh_view_lab_profile_Method" class="view_lab_profile_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->Method->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->Method->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->Order->Visible) { // Order ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_lab_profile->Order->headerCellClass() ?>"><div id="elh_view_lab_profile_Order" class="view_lab_profile_Order"><div class="ew-table-header-caption"><?php echo $view_lab_profile->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_lab_profile->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->Order) ?>',1);"><div id="elh_view_lab_profile_Order" class="view_lab_profile_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->ResType->Visible) { // ResType ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $view_lab_profile->ResType->headerCellClass() ?>"><div id="elh_view_lab_profile_ResType" class="view_lab_profile_ResType"><div class="ew-table-header-caption"><?php echo $view_lab_profile->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $view_lab_profile->ResType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->ResType) ?>',1);"><div id="elh_view_lab_profile_ResType" class="view_lab_profile_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->ResType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->ResType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->ResType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->UnitCD->Visible) { // UnitCD ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->UnitCD) == "") { ?>
		<th data-name="UnitCD" class="<?php echo $view_lab_profile->UnitCD->headerCellClass() ?>"><div id="elh_view_lab_profile_UnitCD" class="view_lab_profile_UnitCD"><div class="ew-table-header-caption"><?php echo $view_lab_profile->UnitCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitCD" class="<?php echo $view_lab_profile->UnitCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->UnitCD) ?>',1);"><div id="elh_view_lab_profile_UnitCD" class="view_lab_profile_UnitCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->UnitCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->UnitCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->UnitCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->Sample->Visible) { // Sample ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $view_lab_profile->Sample->headerCellClass() ?>"><div id="elh_view_lab_profile_Sample" class="view_lab_profile_Sample"><div class="ew-table-header-caption"><?php echo $view_lab_profile->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $view_lab_profile->Sample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->Sample) ?>',1);"><div id="elh_view_lab_profile_Sample" class="view_lab_profile_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->Sample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->Sample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->Sample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->NoD->Visible) { // NoD ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $view_lab_profile->NoD->headerCellClass() ?>"><div id="elh_view_lab_profile_NoD" class="view_lab_profile_NoD"><div class="ew-table-header-caption"><?php echo $view_lab_profile->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $view_lab_profile->NoD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->NoD) ?>',1);"><div id="elh_view_lab_profile_NoD" class="view_lab_profile_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->NoD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->NoD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->BillOrder->Visible) { // BillOrder ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $view_lab_profile->BillOrder->headerCellClass() ?>"><div id="elh_view_lab_profile_BillOrder" class="view_lab_profile_BillOrder"><div class="ew-table-header-caption"><?php echo $view_lab_profile->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $view_lab_profile->BillOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->BillOrder) ?>',1);"><div id="elh_view_lab_profile_BillOrder" class="view_lab_profile_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->BillOrder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->BillOrder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->Inactive->Visible) { // Inactive ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $view_lab_profile->Inactive->headerCellClass() ?>"><div id="elh_view_lab_profile_Inactive" class="view_lab_profile_Inactive"><div class="ew-table-header-caption"><?php echo $view_lab_profile->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $view_lab_profile->Inactive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->Inactive) ?>',1);"><div id="elh_view_lab_profile_Inactive" class="view_lab_profile_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->Inactive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->Inactive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->Inactive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->Outsource->Visible) { // Outsource ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->Outsource) == "") { ?>
		<th data-name="Outsource" class="<?php echo $view_lab_profile->Outsource->headerCellClass() ?>"><div id="elh_view_lab_profile_Outsource" class="view_lab_profile_Outsource"><div class="ew-table-header-caption"><?php echo $view_lab_profile->Outsource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Outsource" class="<?php echo $view_lab_profile->Outsource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->Outsource) ?>',1);"><div id="elh_view_lab_profile_Outsource" class="view_lab_profile_Outsource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->Outsource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->Outsource->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->Outsource->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->CollSample->Visible) { // CollSample ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $view_lab_profile->CollSample->headerCellClass() ?>"><div id="elh_view_lab_profile_CollSample" class="view_lab_profile_CollSample"><div class="ew-table-header-caption"><?php echo $view_lab_profile->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $view_lab_profile->CollSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->CollSample) ?>',1);"><div id="elh_view_lab_profile_CollSample" class="view_lab_profile_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->CollSample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->CollSample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->CollSample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->TestType->Visible) { // TestType ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $view_lab_profile->TestType->headerCellClass() ?>"><div id="elh_view_lab_profile_TestType" class="view_lab_profile_TestType"><div class="ew-table-header-caption"><?php echo $view_lab_profile->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $view_lab_profile->TestType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->TestType) ?>',1);"><div id="elh_view_lab_profile_TestType" class="view_lab_profile_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->TestType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->TestType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->TestType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->NoHeading->Visible) { // NoHeading ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->NoHeading) == "") { ?>
		<th data-name="NoHeading" class="<?php echo $view_lab_profile->NoHeading->headerCellClass() ?>"><div id="elh_view_lab_profile_NoHeading" class="view_lab_profile_NoHeading"><div class="ew-table-header-caption"><?php echo $view_lab_profile->NoHeading->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoHeading" class="<?php echo $view_lab_profile->NoHeading->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->NoHeading) ?>',1);"><div id="elh_view_lab_profile_NoHeading" class="view_lab_profile_NoHeading">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->NoHeading->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->NoHeading->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->NoHeading->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->ChemicalCode->Visible) { // ChemicalCode ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->ChemicalCode) == "") { ?>
		<th data-name="ChemicalCode" class="<?php echo $view_lab_profile->ChemicalCode->headerCellClass() ?>"><div id="elh_view_lab_profile_ChemicalCode" class="view_lab_profile_ChemicalCode"><div class="ew-table-header-caption"><?php echo $view_lab_profile->ChemicalCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChemicalCode" class="<?php echo $view_lab_profile->ChemicalCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->ChemicalCode) ?>',1);"><div id="elh_view_lab_profile_ChemicalCode" class="view_lab_profile_ChemicalCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->ChemicalCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->ChemicalCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->ChemicalCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->ChemicalName->Visible) { // ChemicalName ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->ChemicalName) == "") { ?>
		<th data-name="ChemicalName" class="<?php echo $view_lab_profile->ChemicalName->headerCellClass() ?>"><div id="elh_view_lab_profile_ChemicalName" class="view_lab_profile_ChemicalName"><div class="ew-table-header-caption"><?php echo $view_lab_profile->ChemicalName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChemicalName" class="<?php echo $view_lab_profile->ChemicalName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->ChemicalName) ?>',1);"><div id="elh_view_lab_profile_ChemicalName" class="view_lab_profile_ChemicalName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->ChemicalName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->ChemicalName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->ChemicalName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_profile->Utilaization->Visible) { // Utilaization ?>
	<?php if ($view_lab_profile->sortUrl($view_lab_profile->Utilaization) == "") { ?>
		<th data-name="Utilaization" class="<?php echo $view_lab_profile->Utilaization->headerCellClass() ?>"><div id="elh_view_lab_profile_Utilaization" class="view_lab_profile_Utilaization"><div class="ew-table-header-caption"><?php echo $view_lab_profile->Utilaization->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Utilaization" class="<?php echo $view_lab_profile->Utilaization->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_profile->SortUrl($view_lab_profile->Utilaization) ?>',1);"><div id="elh_view_lab_profile_Utilaization" class="view_lab_profile_Utilaization">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_profile->Utilaization->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_profile->Utilaization->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_profile->Utilaization->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_profile_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($view_lab_profile->isAdd() || $view_lab_profile->isCopy()) {
		$view_lab_profile_list->RowIndex = 0;
		$view_lab_profile_list->KeyCount = $view_lab_profile_list->RowIndex;
		if ($view_lab_profile->isCopy() && !$view_lab_profile_list->loadRow())
			$view_lab_profile->CurrentAction = "add";
		if ($view_lab_profile->isAdd())
			$view_lab_profile_list->loadRowValues();
		if ($view_lab_profile->EventCancelled) // Insert failed
			$view_lab_profile_list->restoreFormValues(); // Restore form values

		// Set row properties
		$view_lab_profile->resetAttributes();
		$view_lab_profile->RowAttrs = array_merge($view_lab_profile->RowAttrs, array('data-rowindex'=>0, 'id'=>'r0_view_lab_profile', 'data-rowtype'=>ROWTYPE_ADD));
		$view_lab_profile->RowType = ROWTYPE_ADD;

		// Render row
		$view_lab_profile_list->renderRow();

		// Render list options
		$view_lab_profile_list->renderListOptions();
		$view_lab_profile_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_lab_profile->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_profile_list->ListOptions->render("body", "left", $view_lab_profile_list->RowCnt);
?>
	<?php if ($view_lab_profile->Id->Visible) { // Id ?>
		<td data-name="Id">
<input type="hidden" data-table="view_lab_profile" data-field="x_Id" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Id" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_profile->Id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->CODE->Visible) { // CODE ?>
		<td data-name="CODE">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_CODE" class="form-group view_lab_profile_CODE">
<input type="text" data-table="view_lab_profile" data-field="x_CODE" name="x<?php echo $view_lab_profile_list->RowIndex ?>_CODE" id="x<?php echo $view_lab_profile_list->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->CODE->EditValue ?>"<?php echo $view_lab_profile->CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_CODE" name="o<?php echo $view_lab_profile_list->RowIndex ?>_CODE" id="o<?php echo $view_lab_profile_list->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_profile->CODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_SERVICE" class="form-group view_lab_profile_SERVICE">
<input type="text" data-table="view_lab_profile" data-field="x_SERVICE" name="x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->SERVICE->EditValue ?>"<?php echo $view_lab_profile->SERVICE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_SERVICE" name="o<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE" id="o<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_profile->SERVICE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_UNITS" class="form-group view_lab_profile_UNITS">
<input type="text" data-table="view_lab_profile" data-field="x_UNITS" name="x<?php echo $view_lab_profile_list->RowIndex ?>_UNITS" id="x<?php echo $view_lab_profile_list->RowIndex ?>_UNITS" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->UNITS->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->UNITS->EditValue ?>"<?php echo $view_lab_profile->UNITS->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_UNITS" name="o<?php echo $view_lab_profile_list->RowIndex ?>_UNITS" id="o<?php echo $view_lab_profile_list->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_profile->UNITS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->AMOUNT->Visible) { // AMOUNT ?>
		<td data-name="AMOUNT">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_AMOUNT" class="form-group view_lab_profile_AMOUNT">
<input type="text" data-table="view_lab_profile" data-field="x_AMOUNT" name="x<?php echo $view_lab_profile_list->RowIndex ?>_AMOUNT" id="x<?php echo $view_lab_profile_list->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->AMOUNT->EditValue ?>"<?php echo $view_lab_profile->AMOUNT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_AMOUNT" name="o<?php echo $view_lab_profile_list->RowIndex ?>_AMOUNT" id="o<?php echo $view_lab_profile_list->RowIndex ?>_AMOUNT" value="<?php echo HtmlEncode($view_lab_profile->AMOUNT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_SERVICE_TYPE" class="form-group view_lab_profile_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $view_lab_profile->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE"<?php echo $view_lab_profile->SERVICE_TYPE->editAttributes() ?>>
		<?php echo $view_lab_profile->SERVICE_TYPE->selectOptionListHtml("x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$view_lab_profile->SERVICE_TYPE->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_profile->SERVICE_TYPE->caption() ?>" data-title="<?php echo $view_lab_profile->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE',url:'mas_services_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $view_lab_profile->SERVICE_TYPE->Lookup->getParamTag("p_x" . $view_lab_profile_list->RowIndex . "_SERVICE_TYPE") ?>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_SERVICE_TYPE" name="o<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_lab_profile->SERVICE_TYPE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_DEPARTMENT" class="form-group view_lab_profile_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_DEPARTMENT" data-value-separator="<?php echo $view_lab_profile->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT"<?php echo $view_lab_profile->DEPARTMENT->editAttributes() ?>>
		<?php echo $view_lab_profile->DEPARTMENT->selectOptionListHtml("x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$view_lab_profile->DEPARTMENT->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_profile->DEPARTMENT->caption() ?>" data-title="<?php echo $view_lab_profile->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT',url:'mas_billing_departmentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $view_lab_profile->DEPARTMENT->Lookup->getParamTag("p_x" . $view_lab_profile_list->RowIndex . "_DEPARTMENT") ?>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_DEPARTMENT" name="o<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT" id="o<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_lab_profile->DEPARTMENT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td data-name="mas_services_billingcol">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_mas_services_billingcol" class="form-group view_lab_profile_mas_services_billingcol">
<input type="text" data-table="view_lab_profile" data-field="x_mas_services_billingcol" name="x<?php echo $view_lab_profile_list->RowIndex ?>_mas_services_billingcol" id="x<?php echo $view_lab_profile_list->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->mas_services_billingcol->EditValue ?>"<?php echo $view_lab_profile->mas_services_billingcol->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_mas_services_billingcol" name="o<?php echo $view_lab_profile_list->RowIndex ?>_mas_services_billingcol" id="o<?php echo $view_lab_profile_list->RowIndex ?>_mas_services_billingcol" value="<?php echo HtmlEncode($view_lab_profile->mas_services_billingcol->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_DrShareAmount" class="form-group view_lab_profile_DrShareAmount">
<input type="text" data-table="view_lab_profile" data-field="x_DrShareAmount" name="x<?php echo $view_lab_profile_list->RowIndex ?>_DrShareAmount" id="x<?php echo $view_lab_profile_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->DrShareAmount->EditValue ?>"<?php echo $view_lab_profile->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_DrShareAmount" name="o<?php echo $view_lab_profile_list->RowIndex ?>_DrShareAmount" id="o<?php echo $view_lab_profile_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_lab_profile->DrShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_HospShareAmount" class="form-group view_lab_profile_HospShareAmount">
<input type="text" data-table="view_lab_profile" data-field="x_HospShareAmount" name="x<?php echo $view_lab_profile_list->RowIndex ?>_HospShareAmount" id="x<?php echo $view_lab_profile_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->HospShareAmount->EditValue ?>"<?php echo $view_lab_profile->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_HospShareAmount" name="o<?php echo $view_lab_profile_list->RowIndex ?>_HospShareAmount" id="o<?php echo $view_lab_profile_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_lab_profile->HospShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->DrSharePer->Visible) { // DrSharePer ?>
		<td data-name="DrSharePer">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_DrSharePer" class="form-group view_lab_profile_DrSharePer">
<input type="text" data-table="view_lab_profile" data-field="x_DrSharePer" name="x<?php echo $view_lab_profile_list->RowIndex ?>_DrSharePer" id="x<?php echo $view_lab_profile_list->RowIndex ?>_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->DrSharePer->EditValue ?>"<?php echo $view_lab_profile->DrSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_DrSharePer" name="o<?php echo $view_lab_profile_list->RowIndex ?>_DrSharePer" id="o<?php echo $view_lab_profile_list->RowIndex ?>_DrSharePer" value="<?php echo HtmlEncode($view_lab_profile->DrSharePer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->HospSharePer->Visible) { // HospSharePer ?>
		<td data-name="HospSharePer">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_HospSharePer" class="form-group view_lab_profile_HospSharePer">
<input type="text" data-table="view_lab_profile" data-field="x_HospSharePer" name="x<?php echo $view_lab_profile_list->RowIndex ?>_HospSharePer" id="x<?php echo $view_lab_profile_list->RowIndex ?>_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->HospSharePer->EditValue ?>"<?php echo $view_lab_profile->HospSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_HospSharePer" name="o<?php echo $view_lab_profile_list->RowIndex ?>_HospSharePer" id="o<?php echo $view_lab_profile_list->RowIndex ?>_HospSharePer" value="<?php echo HtmlEncode($view_lab_profile->HospSharePer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="view_lab_profile" data-field="x_HospID" name="o<?php echo $view_lab_profile_list->RowIndex ?>_HospID" id="o<?php echo $view_lab_profile_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_profile->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_TestSubCd" class="form-group view_lab_profile_TestSubCd">
<input type="text" data-table="view_lab_profile" data-field="x_TestSubCd" name="x<?php echo $view_lab_profile_list->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_profile_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->TestSubCd->EditValue ?>"<?php echo $view_lab_profile->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_TestSubCd" name="o<?php echo $view_lab_profile_list->RowIndex ?>_TestSubCd" id="o<?php echo $view_lab_profile_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_profile->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Method->Visible) { // Method ?>
		<td data-name="Method">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Method" class="form-group view_lab_profile_Method">
<input type="text" data-table="view_lab_profile" data-field="x_Method" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Method" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Method->EditValue ?>"<?php echo $view_lab_profile->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Method" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Method" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_profile->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Order->Visible) { // Order ?>
		<td data-name="Order">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Order" class="form-group view_lab_profile_Order">
<input type="text" data-table="view_lab_profile" data-field="x_Order" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Order" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Order->EditValue ?>"<?php echo $view_lab_profile->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Order" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Order" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_profile->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->ResType->Visible) { // ResType ?>
		<td data-name="ResType">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_ResType" class="form-group view_lab_profile_ResType">
<input type="text" data-table="view_lab_profile" data-field="x_ResType" name="x<?php echo $view_lab_profile_list->RowIndex ?>_ResType" id="x<?php echo $view_lab_profile_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->ResType->EditValue ?>"<?php echo $view_lab_profile->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_ResType" name="o<?php echo $view_lab_profile_list->RowIndex ?>_ResType" id="o<?php echo $view_lab_profile_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_profile->ResType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_UnitCD" class="form-group view_lab_profile_UnitCD">
<input type="text" data-table="view_lab_profile" data-field="x_UnitCD" name="x<?php echo $view_lab_profile_list->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_profile_list->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->UnitCD->EditValue ?>"<?php echo $view_lab_profile->UnitCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_UnitCD" name="o<?php echo $view_lab_profile_list->RowIndex ?>_UnitCD" id="o<?php echo $view_lab_profile_list->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_profile->UnitCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Sample->Visible) { // Sample ?>
		<td data-name="Sample">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Sample" class="form-group view_lab_profile_Sample">
<input type="text" data-table="view_lab_profile" data-field="x_Sample" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Sample" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_profile->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Sample->EditValue ?>"<?php echo $view_lab_profile->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Sample" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Sample" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_profile->Sample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->NoD->Visible) { // NoD ?>
		<td data-name="NoD">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_NoD" class="form-group view_lab_profile_NoD">
<input type="text" data-table="view_lab_profile" data-field="x_NoD" name="x<?php echo $view_lab_profile_list->RowIndex ?>_NoD" id="x<?php echo $view_lab_profile_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->NoD->EditValue ?>"<?php echo $view_lab_profile->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_NoD" name="o<?php echo $view_lab_profile_list->RowIndex ?>_NoD" id="o<?php echo $view_lab_profile_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_profile->NoD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_BillOrder" class="form-group view_lab_profile_BillOrder">
<input type="text" data-table="view_lab_profile" data-field="x_BillOrder" name="x<?php echo $view_lab_profile_list->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_profile_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->BillOrder->EditValue ?>"<?php echo $view_lab_profile->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_BillOrder" name="o<?php echo $view_lab_profile_list->RowIndex ?>_BillOrder" id="o<?php echo $view_lab_profile_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_profile->BillOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Inactive" class="form-group view_lab_profile_Inactive">
<input type="text" data-table="view_lab_profile" data-field="x_Inactive" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Inactive" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Inactive->EditValue ?>"<?php echo $view_lab_profile->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Inactive" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Inactive" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_lab_profile->Inactive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Outsource" class="form-group view_lab_profile_Outsource">
<input type="text" data-table="view_lab_profile" data-field="x_Outsource" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Outsource" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Outsource->EditValue ?>"<?php echo $view_lab_profile->Outsource->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Outsource" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Outsource" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_profile->Outsource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_CollSample" class="form-group view_lab_profile_CollSample">
<input type="text" data-table="view_lab_profile" data-field="x_CollSample" name="x<?php echo $view_lab_profile_list->RowIndex ?>_CollSample" id="x<?php echo $view_lab_profile_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->CollSample->EditValue ?>"<?php echo $view_lab_profile->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_CollSample" name="o<?php echo $view_lab_profile_list->RowIndex ?>_CollSample" id="o<?php echo $view_lab_profile_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_profile->CollSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_TestType" class="form-group view_lab_profile_TestType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_TestType" data-value-separator="<?php echo $view_lab_profile->TestType->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_profile_list->RowIndex ?>_TestType" name="x<?php echo $view_lab_profile_list->RowIndex ?>_TestType"<?php echo $view_lab_profile->TestType->editAttributes() ?>>
		<?php echo $view_lab_profile->TestType->selectOptionListHtml("x<?php echo $view_lab_profile_list->RowIndex ?>_TestType") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_TestType" name="o<?php echo $view_lab_profile_list->RowIndex ?>_TestType" id="o<?php echo $view_lab_profile_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_profile->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->NoHeading->Visible) { // NoHeading ?>
		<td data-name="NoHeading">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_NoHeading" class="form-group view_lab_profile_NoHeading">
<input type="text" data-table="view_lab_profile" data-field="x_NoHeading" name="x<?php echo $view_lab_profile_list->RowIndex ?>_NoHeading" id="x<?php echo $view_lab_profile_list->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->NoHeading->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->NoHeading->EditValue ?>"<?php echo $view_lab_profile->NoHeading->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_NoHeading" name="o<?php echo $view_lab_profile_list->RowIndex ?>_NoHeading" id="o<?php echo $view_lab_profile_list->RowIndex ?>_NoHeading" value="<?php echo HtmlEncode($view_lab_profile->NoHeading->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->ChemicalCode->Visible) { // ChemicalCode ?>
		<td data-name="ChemicalCode">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_ChemicalCode" class="form-group view_lab_profile_ChemicalCode">
<input type="text" data-table="view_lab_profile" data-field="x_ChemicalCode" name="x<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalCode" id="x<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->ChemicalCode->EditValue ?>"<?php echo $view_lab_profile->ChemicalCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_ChemicalCode" name="o<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalCode" id="o<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalCode" value="<?php echo HtmlEncode($view_lab_profile->ChemicalCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->ChemicalName->Visible) { // ChemicalName ?>
		<td data-name="ChemicalName">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_ChemicalName" class="form-group view_lab_profile_ChemicalName">
<input type="text" data-table="view_lab_profile" data-field="x_ChemicalName" name="x<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalName" id="x<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->ChemicalName->EditValue ?>"<?php echo $view_lab_profile->ChemicalName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_ChemicalName" name="o<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalName" id="o<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalName" value="<?php echo HtmlEncode($view_lab_profile->ChemicalName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Utilaization->Visible) { // Utilaization ?>
		<td data-name="Utilaization">
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Utilaization" class="form-group view_lab_profile_Utilaization">
<input type="text" data-table="view_lab_profile" data-field="x_Utilaization" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Utilaization" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Utilaization->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Utilaization->EditValue ?>"<?php echo $view_lab_profile->Utilaization->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Utilaization" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Utilaization" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Utilaization" value="<?php echo HtmlEncode($view_lab_profile->Utilaization->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_profile_list->ListOptions->render("body", "right", $view_lab_profile_list->RowCnt);
?>
<script>
fview_lab_profilelist.updateLists(<?php echo $view_lab_profile_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
<?php
if ($view_lab_profile->ExportAll && $view_lab_profile->isExport()) {
	$view_lab_profile_list->StopRec = $view_lab_profile_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_lab_profile_list->TotalRecs > $view_lab_profile_list->StartRec + $view_lab_profile_list->DisplayRecs - 1)
		$view_lab_profile_list->StopRec = $view_lab_profile_list->StartRec + $view_lab_profile_list->DisplayRecs - 1;
	else
		$view_lab_profile_list->StopRec = $view_lab_profile_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $view_lab_profile_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_lab_profile_list->FormKeyCountName) && ($view_lab_profile->isGridAdd() || $view_lab_profile->isGridEdit() || $view_lab_profile->isConfirm())) {
		$view_lab_profile_list->KeyCount = $CurrentForm->getValue($view_lab_profile_list->FormKeyCountName);
		$view_lab_profile_list->StopRec = $view_lab_profile_list->StartRec + $view_lab_profile_list->KeyCount - 1;
	}
}
$view_lab_profile_list->RecCnt = $view_lab_profile_list->StartRec - 1;
if ($view_lab_profile_list->Recordset && !$view_lab_profile_list->Recordset->EOF) {
	$view_lab_profile_list->Recordset->moveFirst();
	$selectLimit = $view_lab_profile_list->UseSelectLimit;
	if (!$selectLimit && $view_lab_profile_list->StartRec > 1)
		$view_lab_profile_list->Recordset->move($view_lab_profile_list->StartRec - 1);
} elseif (!$view_lab_profile->AllowAddDeleteRow && $view_lab_profile_list->StopRec == 0) {
	$view_lab_profile_list->StopRec = $view_lab_profile->GridAddRowCount;
}

// Initialize aggregate
$view_lab_profile->RowType = ROWTYPE_AGGREGATEINIT;
$view_lab_profile->resetAttributes();
$view_lab_profile_list->renderRow();
$view_lab_profile_list->EditRowCnt = 0;
if ($view_lab_profile->isEdit())
	$view_lab_profile_list->RowIndex = 1;
if ($view_lab_profile->isGridAdd())
	$view_lab_profile_list->RowIndex = 0;
if ($view_lab_profile->isGridEdit())
	$view_lab_profile_list->RowIndex = 0;
while ($view_lab_profile_list->RecCnt < $view_lab_profile_list->StopRec) {
	$view_lab_profile_list->RecCnt++;
	if ($view_lab_profile_list->RecCnt >= $view_lab_profile_list->StartRec) {
		$view_lab_profile_list->RowCnt++;
		if ($view_lab_profile->isGridAdd() || $view_lab_profile->isGridEdit() || $view_lab_profile->isConfirm()) {
			$view_lab_profile_list->RowIndex++;
			$CurrentForm->Index = $view_lab_profile_list->RowIndex;
			if ($CurrentForm->hasValue($view_lab_profile_list->FormActionName) && $view_lab_profile_list->EventCancelled)
				$view_lab_profile_list->RowAction = strval($CurrentForm->getValue($view_lab_profile_list->FormActionName));
			elseif ($view_lab_profile->isGridAdd())
				$view_lab_profile_list->RowAction = "insert";
			else
				$view_lab_profile_list->RowAction = "";
		}

		// Set up key count
		$view_lab_profile_list->KeyCount = $view_lab_profile_list->RowIndex;

		// Init row class and style
		$view_lab_profile->resetAttributes();
		$view_lab_profile->CssClass = "";
		if ($view_lab_profile->isGridAdd()) {
			$view_lab_profile_list->loadRowValues(); // Load default values
		} else {
			$view_lab_profile_list->loadRowValues($view_lab_profile_list->Recordset); // Load row values
		}
		$view_lab_profile->RowType = ROWTYPE_VIEW; // Render view
		if ($view_lab_profile->isGridAdd()) // Grid add
			$view_lab_profile->RowType = ROWTYPE_ADD; // Render add
		if ($view_lab_profile->isGridAdd() && $view_lab_profile->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_lab_profile_list->restoreCurrentRowFormValues($view_lab_profile_list->RowIndex); // Restore form values
		if ($view_lab_profile->isEdit()) {
			if ($view_lab_profile_list->checkInlineEditKey() && $view_lab_profile_list->EditRowCnt == 0) { // Inline edit
				$view_lab_profile->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($view_lab_profile->isGridEdit()) { // Grid edit
			if ($view_lab_profile->EventCancelled)
				$view_lab_profile_list->restoreCurrentRowFormValues($view_lab_profile_list->RowIndex); // Restore form values
			if ($view_lab_profile_list->RowAction == "insert")
				$view_lab_profile->RowType = ROWTYPE_ADD; // Render add
			else
				$view_lab_profile->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_lab_profile->isEdit() && $view_lab_profile->RowType == ROWTYPE_EDIT && $view_lab_profile->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$view_lab_profile_list->restoreFormValues(); // Restore form values
		}
		if ($view_lab_profile->isGridEdit() && ($view_lab_profile->RowType == ROWTYPE_EDIT || $view_lab_profile->RowType == ROWTYPE_ADD) && $view_lab_profile->EventCancelled) // Update failed
			$view_lab_profile_list->restoreCurrentRowFormValues($view_lab_profile_list->RowIndex); // Restore form values
		if ($view_lab_profile->RowType == ROWTYPE_EDIT) // Edit row
			$view_lab_profile_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$view_lab_profile->RowAttrs = array_merge($view_lab_profile->RowAttrs, array('data-rowindex'=>$view_lab_profile_list->RowCnt, 'id'=>'r' . $view_lab_profile_list->RowCnt . '_view_lab_profile', 'data-rowtype'=>$view_lab_profile->RowType));

		// Render row
		$view_lab_profile_list->renderRow();

		// Render list options
		$view_lab_profile_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_lab_profile_list->RowAction <> "delete" && $view_lab_profile_list->RowAction <> "insertdelete" && !($view_lab_profile_list->RowAction == "insert" && $view_lab_profile->isConfirm() && $view_lab_profile_list->emptyRow())) {
?>
	<tr<?php echo $view_lab_profile->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_profile_list->ListOptions->render("body", "left", $view_lab_profile_list->RowCnt);
?>
	<?php if ($view_lab_profile->Id->Visible) { // Id ?>
		<td data-name="Id"<?php echo $view_lab_profile->Id->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_profile" data-field="x_Id" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Id" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_profile->Id->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Id" class="form-group view_lab_profile_Id">
<span<?php echo $view_lab_profile->Id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_profile->Id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Id" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Id" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_profile->Id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Id" class="view_lab_profile_Id">
<span<?php echo $view_lab_profile->Id->viewAttributes() ?>>
<?php echo $view_lab_profile->Id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->CODE->Visible) { // CODE ?>
		<td data-name="CODE"<?php echo $view_lab_profile->CODE->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_CODE" class="form-group view_lab_profile_CODE">
<input type="text" data-table="view_lab_profile" data-field="x_CODE" name="x<?php echo $view_lab_profile_list->RowIndex ?>_CODE" id="x<?php echo $view_lab_profile_list->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->CODE->EditValue ?>"<?php echo $view_lab_profile->CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_CODE" name="o<?php echo $view_lab_profile_list->RowIndex ?>_CODE" id="o<?php echo $view_lab_profile_list->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_profile->CODE->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_CODE" class="form-group view_lab_profile_CODE">
<input type="text" data-table="view_lab_profile" data-field="x_CODE" name="x<?php echo $view_lab_profile_list->RowIndex ?>_CODE" id="x<?php echo $view_lab_profile_list->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->CODE->EditValue ?>"<?php echo $view_lab_profile->CODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_CODE" class="view_lab_profile_CODE">
<span<?php echo $view_lab_profile->CODE->viewAttributes() ?>>
<?php echo $view_lab_profile->CODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE"<?php echo $view_lab_profile->SERVICE->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_SERVICE" class="form-group view_lab_profile_SERVICE">
<input type="text" data-table="view_lab_profile" data-field="x_SERVICE" name="x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->SERVICE->EditValue ?>"<?php echo $view_lab_profile->SERVICE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_SERVICE" name="o<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE" id="o<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_profile->SERVICE->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_SERVICE" class="form-group view_lab_profile_SERVICE">
<input type="text" data-table="view_lab_profile" data-field="x_SERVICE" name="x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->SERVICE->EditValue ?>"<?php echo $view_lab_profile->SERVICE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_SERVICE" class="view_lab_profile_SERVICE">
<span<?php echo $view_lab_profile->SERVICE->viewAttributes() ?>>
<?php echo $view_lab_profile->SERVICE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS"<?php echo $view_lab_profile->UNITS->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_UNITS" class="form-group view_lab_profile_UNITS">
<input type="text" data-table="view_lab_profile" data-field="x_UNITS" name="x<?php echo $view_lab_profile_list->RowIndex ?>_UNITS" id="x<?php echo $view_lab_profile_list->RowIndex ?>_UNITS" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->UNITS->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->UNITS->EditValue ?>"<?php echo $view_lab_profile->UNITS->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_UNITS" name="o<?php echo $view_lab_profile_list->RowIndex ?>_UNITS" id="o<?php echo $view_lab_profile_list->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_profile->UNITS->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_UNITS" class="form-group view_lab_profile_UNITS">
<input type="text" data-table="view_lab_profile" data-field="x_UNITS" name="x<?php echo $view_lab_profile_list->RowIndex ?>_UNITS" id="x<?php echo $view_lab_profile_list->RowIndex ?>_UNITS" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->UNITS->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->UNITS->EditValue ?>"<?php echo $view_lab_profile->UNITS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_UNITS" class="view_lab_profile_UNITS">
<span<?php echo $view_lab_profile->UNITS->viewAttributes() ?>>
<?php echo $view_lab_profile->UNITS->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->AMOUNT->Visible) { // AMOUNT ?>
		<td data-name="AMOUNT"<?php echo $view_lab_profile->AMOUNT->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_AMOUNT" class="form-group view_lab_profile_AMOUNT">
<input type="text" data-table="view_lab_profile" data-field="x_AMOUNT" name="x<?php echo $view_lab_profile_list->RowIndex ?>_AMOUNT" id="x<?php echo $view_lab_profile_list->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->AMOUNT->EditValue ?>"<?php echo $view_lab_profile->AMOUNT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_AMOUNT" name="o<?php echo $view_lab_profile_list->RowIndex ?>_AMOUNT" id="o<?php echo $view_lab_profile_list->RowIndex ?>_AMOUNT" value="<?php echo HtmlEncode($view_lab_profile->AMOUNT->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_AMOUNT" class="form-group view_lab_profile_AMOUNT">
<input type="text" data-table="view_lab_profile" data-field="x_AMOUNT" name="x<?php echo $view_lab_profile_list->RowIndex ?>_AMOUNT" id="x<?php echo $view_lab_profile_list->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->AMOUNT->EditValue ?>"<?php echo $view_lab_profile->AMOUNT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_AMOUNT" class="view_lab_profile_AMOUNT">
<span<?php echo $view_lab_profile->AMOUNT->viewAttributes() ?>>
<?php echo $view_lab_profile->AMOUNT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE"<?php echo $view_lab_profile->SERVICE_TYPE->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_SERVICE_TYPE" class="form-group view_lab_profile_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $view_lab_profile->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE"<?php echo $view_lab_profile->SERVICE_TYPE->editAttributes() ?>>
		<?php echo $view_lab_profile->SERVICE_TYPE->selectOptionListHtml("x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$view_lab_profile->SERVICE_TYPE->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_profile->SERVICE_TYPE->caption() ?>" data-title="<?php echo $view_lab_profile->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE',url:'mas_services_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $view_lab_profile->SERVICE_TYPE->Lookup->getParamTag("p_x" . $view_lab_profile_list->RowIndex . "_SERVICE_TYPE") ?>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_SERVICE_TYPE" name="o<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_lab_profile->SERVICE_TYPE->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_SERVICE_TYPE" class="form-group view_lab_profile_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $view_lab_profile->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE"<?php echo $view_lab_profile->SERVICE_TYPE->editAttributes() ?>>
		<?php echo $view_lab_profile->SERVICE_TYPE->selectOptionListHtml("x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$view_lab_profile->SERVICE_TYPE->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_profile->SERVICE_TYPE->caption() ?>" data-title="<?php echo $view_lab_profile->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE',url:'mas_services_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $view_lab_profile->SERVICE_TYPE->Lookup->getParamTag("p_x" . $view_lab_profile_list->RowIndex . "_SERVICE_TYPE") ?>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_SERVICE_TYPE" class="view_lab_profile_SERVICE_TYPE">
<span<?php echo $view_lab_profile->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $view_lab_profile->SERVICE_TYPE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT"<?php echo $view_lab_profile->DEPARTMENT->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_DEPARTMENT" class="form-group view_lab_profile_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_DEPARTMENT" data-value-separator="<?php echo $view_lab_profile->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT"<?php echo $view_lab_profile->DEPARTMENT->editAttributes() ?>>
		<?php echo $view_lab_profile->DEPARTMENT->selectOptionListHtml("x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$view_lab_profile->DEPARTMENT->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_profile->DEPARTMENT->caption() ?>" data-title="<?php echo $view_lab_profile->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT',url:'mas_billing_departmentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $view_lab_profile->DEPARTMENT->Lookup->getParamTag("p_x" . $view_lab_profile_list->RowIndex . "_DEPARTMENT") ?>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_DEPARTMENT" name="o<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT" id="o<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_lab_profile->DEPARTMENT->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_DEPARTMENT" class="form-group view_lab_profile_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_DEPARTMENT" data-value-separator="<?php echo $view_lab_profile->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT"<?php echo $view_lab_profile->DEPARTMENT->editAttributes() ?>>
		<?php echo $view_lab_profile->DEPARTMENT->selectOptionListHtml("x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$view_lab_profile->DEPARTMENT->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_profile->DEPARTMENT->caption() ?>" data-title="<?php echo $view_lab_profile->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT',url:'mas_billing_departmentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $view_lab_profile->DEPARTMENT->Lookup->getParamTag("p_x" . $view_lab_profile_list->RowIndex . "_DEPARTMENT") ?>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_DEPARTMENT" class="view_lab_profile_DEPARTMENT">
<span<?php echo $view_lab_profile->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_lab_profile->DEPARTMENT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td data-name="mas_services_billingcol"<?php echo $view_lab_profile->mas_services_billingcol->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_mas_services_billingcol" class="form-group view_lab_profile_mas_services_billingcol">
<input type="text" data-table="view_lab_profile" data-field="x_mas_services_billingcol" name="x<?php echo $view_lab_profile_list->RowIndex ?>_mas_services_billingcol" id="x<?php echo $view_lab_profile_list->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->mas_services_billingcol->EditValue ?>"<?php echo $view_lab_profile->mas_services_billingcol->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_mas_services_billingcol" name="o<?php echo $view_lab_profile_list->RowIndex ?>_mas_services_billingcol" id="o<?php echo $view_lab_profile_list->RowIndex ?>_mas_services_billingcol" value="<?php echo HtmlEncode($view_lab_profile->mas_services_billingcol->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_mas_services_billingcol" class="form-group view_lab_profile_mas_services_billingcol">
<input type="text" data-table="view_lab_profile" data-field="x_mas_services_billingcol" name="x<?php echo $view_lab_profile_list->RowIndex ?>_mas_services_billingcol" id="x<?php echo $view_lab_profile_list->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->mas_services_billingcol->EditValue ?>"<?php echo $view_lab_profile->mas_services_billingcol->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_mas_services_billingcol" class="view_lab_profile_mas_services_billingcol">
<span<?php echo $view_lab_profile->mas_services_billingcol->viewAttributes() ?>>
<?php echo $view_lab_profile->mas_services_billingcol->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount"<?php echo $view_lab_profile->DrShareAmount->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_DrShareAmount" class="form-group view_lab_profile_DrShareAmount">
<input type="text" data-table="view_lab_profile" data-field="x_DrShareAmount" name="x<?php echo $view_lab_profile_list->RowIndex ?>_DrShareAmount" id="x<?php echo $view_lab_profile_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->DrShareAmount->EditValue ?>"<?php echo $view_lab_profile->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_DrShareAmount" name="o<?php echo $view_lab_profile_list->RowIndex ?>_DrShareAmount" id="o<?php echo $view_lab_profile_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_lab_profile->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_DrShareAmount" class="form-group view_lab_profile_DrShareAmount">
<input type="text" data-table="view_lab_profile" data-field="x_DrShareAmount" name="x<?php echo $view_lab_profile_list->RowIndex ?>_DrShareAmount" id="x<?php echo $view_lab_profile_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->DrShareAmount->EditValue ?>"<?php echo $view_lab_profile->DrShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_DrShareAmount" class="view_lab_profile_DrShareAmount">
<span<?php echo $view_lab_profile->DrShareAmount->viewAttributes() ?>>
<?php echo $view_lab_profile->DrShareAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount"<?php echo $view_lab_profile->HospShareAmount->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_HospShareAmount" class="form-group view_lab_profile_HospShareAmount">
<input type="text" data-table="view_lab_profile" data-field="x_HospShareAmount" name="x<?php echo $view_lab_profile_list->RowIndex ?>_HospShareAmount" id="x<?php echo $view_lab_profile_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->HospShareAmount->EditValue ?>"<?php echo $view_lab_profile->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_HospShareAmount" name="o<?php echo $view_lab_profile_list->RowIndex ?>_HospShareAmount" id="o<?php echo $view_lab_profile_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_lab_profile->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_HospShareAmount" class="form-group view_lab_profile_HospShareAmount">
<input type="text" data-table="view_lab_profile" data-field="x_HospShareAmount" name="x<?php echo $view_lab_profile_list->RowIndex ?>_HospShareAmount" id="x<?php echo $view_lab_profile_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->HospShareAmount->EditValue ?>"<?php echo $view_lab_profile->HospShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_HospShareAmount" class="view_lab_profile_HospShareAmount">
<span<?php echo $view_lab_profile->HospShareAmount->viewAttributes() ?>>
<?php echo $view_lab_profile->HospShareAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->DrSharePer->Visible) { // DrSharePer ?>
		<td data-name="DrSharePer"<?php echo $view_lab_profile->DrSharePer->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_DrSharePer" class="form-group view_lab_profile_DrSharePer">
<input type="text" data-table="view_lab_profile" data-field="x_DrSharePer" name="x<?php echo $view_lab_profile_list->RowIndex ?>_DrSharePer" id="x<?php echo $view_lab_profile_list->RowIndex ?>_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->DrSharePer->EditValue ?>"<?php echo $view_lab_profile->DrSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_DrSharePer" name="o<?php echo $view_lab_profile_list->RowIndex ?>_DrSharePer" id="o<?php echo $view_lab_profile_list->RowIndex ?>_DrSharePer" value="<?php echo HtmlEncode($view_lab_profile->DrSharePer->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_DrSharePer" class="form-group view_lab_profile_DrSharePer">
<input type="text" data-table="view_lab_profile" data-field="x_DrSharePer" name="x<?php echo $view_lab_profile_list->RowIndex ?>_DrSharePer" id="x<?php echo $view_lab_profile_list->RowIndex ?>_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->DrSharePer->EditValue ?>"<?php echo $view_lab_profile->DrSharePer->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_DrSharePer" class="view_lab_profile_DrSharePer">
<span<?php echo $view_lab_profile->DrSharePer->viewAttributes() ?>>
<?php echo $view_lab_profile->DrSharePer->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->HospSharePer->Visible) { // HospSharePer ?>
		<td data-name="HospSharePer"<?php echo $view_lab_profile->HospSharePer->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_HospSharePer" class="form-group view_lab_profile_HospSharePer">
<input type="text" data-table="view_lab_profile" data-field="x_HospSharePer" name="x<?php echo $view_lab_profile_list->RowIndex ?>_HospSharePer" id="x<?php echo $view_lab_profile_list->RowIndex ?>_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->HospSharePer->EditValue ?>"<?php echo $view_lab_profile->HospSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_HospSharePer" name="o<?php echo $view_lab_profile_list->RowIndex ?>_HospSharePer" id="o<?php echo $view_lab_profile_list->RowIndex ?>_HospSharePer" value="<?php echo HtmlEncode($view_lab_profile->HospSharePer->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_HospSharePer" class="form-group view_lab_profile_HospSharePer">
<input type="text" data-table="view_lab_profile" data-field="x_HospSharePer" name="x<?php echo $view_lab_profile_list->RowIndex ?>_HospSharePer" id="x<?php echo $view_lab_profile_list->RowIndex ?>_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->HospSharePer->EditValue ?>"<?php echo $view_lab_profile->HospSharePer->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_HospSharePer" class="view_lab_profile_HospSharePer">
<span<?php echo $view_lab_profile->HospSharePer->viewAttributes() ?>>
<?php echo $view_lab_profile->HospSharePer->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_lab_profile->HospID->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_profile" data-field="x_HospID" name="o<?php echo $view_lab_profile_list->RowIndex ?>_HospID" id="o<?php echo $view_lab_profile_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_profile->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_HospID" class="view_lab_profile_HospID">
<span<?php echo $view_lab_profile->HospID->viewAttributes() ?>>
<?php echo $view_lab_profile->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd"<?php echo $view_lab_profile->TestSubCd->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_TestSubCd" class="form-group view_lab_profile_TestSubCd">
<input type="text" data-table="view_lab_profile" data-field="x_TestSubCd" name="x<?php echo $view_lab_profile_list->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_profile_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->TestSubCd->EditValue ?>"<?php echo $view_lab_profile->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_TestSubCd" name="o<?php echo $view_lab_profile_list->RowIndex ?>_TestSubCd" id="o<?php echo $view_lab_profile_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_profile->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_TestSubCd" class="form-group view_lab_profile_TestSubCd">
<input type="text" data-table="view_lab_profile" data-field="x_TestSubCd" name="x<?php echo $view_lab_profile_list->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_profile_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->TestSubCd->EditValue ?>"<?php echo $view_lab_profile->TestSubCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_TestSubCd" class="view_lab_profile_TestSubCd">
<span<?php echo $view_lab_profile->TestSubCd->viewAttributes() ?>>
<?php echo $view_lab_profile->TestSubCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Method->Visible) { // Method ?>
		<td data-name="Method"<?php echo $view_lab_profile->Method->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Method" class="form-group view_lab_profile_Method">
<input type="text" data-table="view_lab_profile" data-field="x_Method" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Method" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Method->EditValue ?>"<?php echo $view_lab_profile->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Method" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Method" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_profile->Method->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Method" class="form-group view_lab_profile_Method">
<input type="text" data-table="view_lab_profile" data-field="x_Method" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Method" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Method->EditValue ?>"<?php echo $view_lab_profile->Method->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Method" class="view_lab_profile_Method">
<span<?php echo $view_lab_profile->Method->viewAttributes() ?>>
<?php echo $view_lab_profile->Method->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $view_lab_profile->Order->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Order" class="form-group view_lab_profile_Order">
<input type="text" data-table="view_lab_profile" data-field="x_Order" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Order" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Order->EditValue ?>"<?php echo $view_lab_profile->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Order" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Order" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_profile->Order->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Order" class="form-group view_lab_profile_Order">
<input type="text" data-table="view_lab_profile" data-field="x_Order" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Order" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Order->EditValue ?>"<?php echo $view_lab_profile->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Order" class="view_lab_profile_Order">
<span<?php echo $view_lab_profile->Order->viewAttributes() ?>>
<?php echo $view_lab_profile->Order->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->ResType->Visible) { // ResType ?>
		<td data-name="ResType"<?php echo $view_lab_profile->ResType->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_ResType" class="form-group view_lab_profile_ResType">
<input type="text" data-table="view_lab_profile" data-field="x_ResType" name="x<?php echo $view_lab_profile_list->RowIndex ?>_ResType" id="x<?php echo $view_lab_profile_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->ResType->EditValue ?>"<?php echo $view_lab_profile->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_ResType" name="o<?php echo $view_lab_profile_list->RowIndex ?>_ResType" id="o<?php echo $view_lab_profile_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_profile->ResType->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_ResType" class="form-group view_lab_profile_ResType">
<input type="text" data-table="view_lab_profile" data-field="x_ResType" name="x<?php echo $view_lab_profile_list->RowIndex ?>_ResType" id="x<?php echo $view_lab_profile_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->ResType->EditValue ?>"<?php echo $view_lab_profile->ResType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_ResType" class="view_lab_profile_ResType">
<span<?php echo $view_lab_profile->ResType->viewAttributes() ?>>
<?php echo $view_lab_profile->ResType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD"<?php echo $view_lab_profile->UnitCD->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_UnitCD" class="form-group view_lab_profile_UnitCD">
<input type="text" data-table="view_lab_profile" data-field="x_UnitCD" name="x<?php echo $view_lab_profile_list->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_profile_list->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->UnitCD->EditValue ?>"<?php echo $view_lab_profile->UnitCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_UnitCD" name="o<?php echo $view_lab_profile_list->RowIndex ?>_UnitCD" id="o<?php echo $view_lab_profile_list->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_profile->UnitCD->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_UnitCD" class="form-group view_lab_profile_UnitCD">
<input type="text" data-table="view_lab_profile" data-field="x_UnitCD" name="x<?php echo $view_lab_profile_list->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_profile_list->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->UnitCD->EditValue ?>"<?php echo $view_lab_profile->UnitCD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_UnitCD" class="view_lab_profile_UnitCD">
<span<?php echo $view_lab_profile->UnitCD->viewAttributes() ?>>
<?php echo $view_lab_profile->UnitCD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Sample->Visible) { // Sample ?>
		<td data-name="Sample"<?php echo $view_lab_profile->Sample->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Sample" class="form-group view_lab_profile_Sample">
<input type="text" data-table="view_lab_profile" data-field="x_Sample" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Sample" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_profile->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Sample->EditValue ?>"<?php echo $view_lab_profile->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Sample" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Sample" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_profile->Sample->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Sample" class="form-group view_lab_profile_Sample">
<input type="text" data-table="view_lab_profile" data-field="x_Sample" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Sample" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_profile->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Sample->EditValue ?>"<?php echo $view_lab_profile->Sample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Sample" class="view_lab_profile_Sample">
<span<?php echo $view_lab_profile->Sample->viewAttributes() ?>>
<?php echo $view_lab_profile->Sample->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->NoD->Visible) { // NoD ?>
		<td data-name="NoD"<?php echo $view_lab_profile->NoD->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_NoD" class="form-group view_lab_profile_NoD">
<input type="text" data-table="view_lab_profile" data-field="x_NoD" name="x<?php echo $view_lab_profile_list->RowIndex ?>_NoD" id="x<?php echo $view_lab_profile_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->NoD->EditValue ?>"<?php echo $view_lab_profile->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_NoD" name="o<?php echo $view_lab_profile_list->RowIndex ?>_NoD" id="o<?php echo $view_lab_profile_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_profile->NoD->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_NoD" class="form-group view_lab_profile_NoD">
<input type="text" data-table="view_lab_profile" data-field="x_NoD" name="x<?php echo $view_lab_profile_list->RowIndex ?>_NoD" id="x<?php echo $view_lab_profile_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->NoD->EditValue ?>"<?php echo $view_lab_profile->NoD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_NoD" class="view_lab_profile_NoD">
<span<?php echo $view_lab_profile->NoD->viewAttributes() ?>>
<?php echo $view_lab_profile->NoD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder"<?php echo $view_lab_profile->BillOrder->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_BillOrder" class="form-group view_lab_profile_BillOrder">
<input type="text" data-table="view_lab_profile" data-field="x_BillOrder" name="x<?php echo $view_lab_profile_list->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_profile_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->BillOrder->EditValue ?>"<?php echo $view_lab_profile->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_BillOrder" name="o<?php echo $view_lab_profile_list->RowIndex ?>_BillOrder" id="o<?php echo $view_lab_profile_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_profile->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_BillOrder" class="form-group view_lab_profile_BillOrder">
<input type="text" data-table="view_lab_profile" data-field="x_BillOrder" name="x<?php echo $view_lab_profile_list->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_profile_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->BillOrder->EditValue ?>"<?php echo $view_lab_profile->BillOrder->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_BillOrder" class="view_lab_profile_BillOrder">
<span<?php echo $view_lab_profile->BillOrder->viewAttributes() ?>>
<?php echo $view_lab_profile->BillOrder->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive"<?php echo $view_lab_profile->Inactive->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Inactive" class="form-group view_lab_profile_Inactive">
<input type="text" data-table="view_lab_profile" data-field="x_Inactive" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Inactive" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Inactive->EditValue ?>"<?php echo $view_lab_profile->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Inactive" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Inactive" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_lab_profile->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Inactive" class="form-group view_lab_profile_Inactive">
<input type="text" data-table="view_lab_profile" data-field="x_Inactive" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Inactive" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Inactive->EditValue ?>"<?php echo $view_lab_profile->Inactive->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Inactive" class="view_lab_profile_Inactive">
<span<?php echo $view_lab_profile->Inactive->viewAttributes() ?>>
<?php echo $view_lab_profile->Inactive->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource"<?php echo $view_lab_profile->Outsource->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Outsource" class="form-group view_lab_profile_Outsource">
<input type="text" data-table="view_lab_profile" data-field="x_Outsource" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Outsource" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Outsource->EditValue ?>"<?php echo $view_lab_profile->Outsource->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Outsource" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Outsource" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_profile->Outsource->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Outsource" class="form-group view_lab_profile_Outsource">
<input type="text" data-table="view_lab_profile" data-field="x_Outsource" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Outsource" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Outsource->EditValue ?>"<?php echo $view_lab_profile->Outsource->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Outsource" class="view_lab_profile_Outsource">
<span<?php echo $view_lab_profile->Outsource->viewAttributes() ?>>
<?php echo $view_lab_profile->Outsource->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample"<?php echo $view_lab_profile->CollSample->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_CollSample" class="form-group view_lab_profile_CollSample">
<input type="text" data-table="view_lab_profile" data-field="x_CollSample" name="x<?php echo $view_lab_profile_list->RowIndex ?>_CollSample" id="x<?php echo $view_lab_profile_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->CollSample->EditValue ?>"<?php echo $view_lab_profile->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_CollSample" name="o<?php echo $view_lab_profile_list->RowIndex ?>_CollSample" id="o<?php echo $view_lab_profile_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_profile->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_CollSample" class="form-group view_lab_profile_CollSample">
<input type="text" data-table="view_lab_profile" data-field="x_CollSample" name="x<?php echo $view_lab_profile_list->RowIndex ?>_CollSample" id="x<?php echo $view_lab_profile_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->CollSample->EditValue ?>"<?php echo $view_lab_profile->CollSample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_CollSample" class="view_lab_profile_CollSample">
<span<?php echo $view_lab_profile->CollSample->viewAttributes() ?>>
<?php echo $view_lab_profile->CollSample->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->TestType->Visible) { // TestType ?>
		<td data-name="TestType"<?php echo $view_lab_profile->TestType->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_TestType" class="form-group view_lab_profile_TestType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_TestType" data-value-separator="<?php echo $view_lab_profile->TestType->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_profile_list->RowIndex ?>_TestType" name="x<?php echo $view_lab_profile_list->RowIndex ?>_TestType"<?php echo $view_lab_profile->TestType->editAttributes() ?>>
		<?php echo $view_lab_profile->TestType->selectOptionListHtml("x<?php echo $view_lab_profile_list->RowIndex ?>_TestType") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_TestType" name="o<?php echo $view_lab_profile_list->RowIndex ?>_TestType" id="o<?php echo $view_lab_profile_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_profile->TestType->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_TestType" class="form-group view_lab_profile_TestType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_TestType" data-value-separator="<?php echo $view_lab_profile->TestType->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_profile_list->RowIndex ?>_TestType" name="x<?php echo $view_lab_profile_list->RowIndex ?>_TestType"<?php echo $view_lab_profile->TestType->editAttributes() ?>>
		<?php echo $view_lab_profile->TestType->selectOptionListHtml("x<?php echo $view_lab_profile_list->RowIndex ?>_TestType") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_TestType" class="view_lab_profile_TestType">
<span<?php echo $view_lab_profile->TestType->viewAttributes() ?>>
<?php echo $view_lab_profile->TestType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->NoHeading->Visible) { // NoHeading ?>
		<td data-name="NoHeading"<?php echo $view_lab_profile->NoHeading->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_NoHeading" class="form-group view_lab_profile_NoHeading">
<input type="text" data-table="view_lab_profile" data-field="x_NoHeading" name="x<?php echo $view_lab_profile_list->RowIndex ?>_NoHeading" id="x<?php echo $view_lab_profile_list->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->NoHeading->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->NoHeading->EditValue ?>"<?php echo $view_lab_profile->NoHeading->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_NoHeading" name="o<?php echo $view_lab_profile_list->RowIndex ?>_NoHeading" id="o<?php echo $view_lab_profile_list->RowIndex ?>_NoHeading" value="<?php echo HtmlEncode($view_lab_profile->NoHeading->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_NoHeading" class="form-group view_lab_profile_NoHeading">
<input type="text" data-table="view_lab_profile" data-field="x_NoHeading" name="x<?php echo $view_lab_profile_list->RowIndex ?>_NoHeading" id="x<?php echo $view_lab_profile_list->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->NoHeading->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->NoHeading->EditValue ?>"<?php echo $view_lab_profile->NoHeading->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_NoHeading" class="view_lab_profile_NoHeading">
<span<?php echo $view_lab_profile->NoHeading->viewAttributes() ?>>
<?php echo $view_lab_profile->NoHeading->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->ChemicalCode->Visible) { // ChemicalCode ?>
		<td data-name="ChemicalCode"<?php echo $view_lab_profile->ChemicalCode->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_ChemicalCode" class="form-group view_lab_profile_ChemicalCode">
<input type="text" data-table="view_lab_profile" data-field="x_ChemicalCode" name="x<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalCode" id="x<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->ChemicalCode->EditValue ?>"<?php echo $view_lab_profile->ChemicalCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_ChemicalCode" name="o<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalCode" id="o<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalCode" value="<?php echo HtmlEncode($view_lab_profile->ChemicalCode->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_ChemicalCode" class="form-group view_lab_profile_ChemicalCode">
<input type="text" data-table="view_lab_profile" data-field="x_ChemicalCode" name="x<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalCode" id="x<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->ChemicalCode->EditValue ?>"<?php echo $view_lab_profile->ChemicalCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_ChemicalCode" class="view_lab_profile_ChemicalCode">
<span<?php echo $view_lab_profile->ChemicalCode->viewAttributes() ?>>
<?php echo $view_lab_profile->ChemicalCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->ChemicalName->Visible) { // ChemicalName ?>
		<td data-name="ChemicalName"<?php echo $view_lab_profile->ChemicalName->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_ChemicalName" class="form-group view_lab_profile_ChemicalName">
<input type="text" data-table="view_lab_profile" data-field="x_ChemicalName" name="x<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalName" id="x<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->ChemicalName->EditValue ?>"<?php echo $view_lab_profile->ChemicalName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_ChemicalName" name="o<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalName" id="o<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalName" value="<?php echo HtmlEncode($view_lab_profile->ChemicalName->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_ChemicalName" class="form-group view_lab_profile_ChemicalName">
<input type="text" data-table="view_lab_profile" data-field="x_ChemicalName" name="x<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalName" id="x<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->ChemicalName->EditValue ?>"<?php echo $view_lab_profile->ChemicalName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_ChemicalName" class="view_lab_profile_ChemicalName">
<span<?php echo $view_lab_profile->ChemicalName->viewAttributes() ?>>
<?php echo $view_lab_profile->ChemicalName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Utilaization->Visible) { // Utilaization ?>
		<td data-name="Utilaization"<?php echo $view_lab_profile->Utilaization->cellAttributes() ?>>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Utilaization" class="form-group view_lab_profile_Utilaization">
<input type="text" data-table="view_lab_profile" data-field="x_Utilaization" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Utilaization" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Utilaization->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Utilaization->EditValue ?>"<?php echo $view_lab_profile->Utilaization->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Utilaization" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Utilaization" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Utilaization" value="<?php echo HtmlEncode($view_lab_profile->Utilaization->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Utilaization" class="form-group view_lab_profile_Utilaization">
<input type="text" data-table="view_lab_profile" data-field="x_Utilaization" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Utilaization" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Utilaization->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Utilaization->EditValue ?>"<?php echo $view_lab_profile->Utilaization->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_profile->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_profile_list->RowCnt ?>_view_lab_profile_Utilaization" class="view_lab_profile_Utilaization">
<span<?php echo $view_lab_profile->Utilaization->viewAttributes() ?>>
<?php echo $view_lab_profile->Utilaization->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_profile_list->ListOptions->render("body", "right", $view_lab_profile_list->RowCnt);
?>
	</tr>
<?php if ($view_lab_profile->RowType == ROWTYPE_ADD || $view_lab_profile->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_lab_profilelist.updateLists(<?php echo $view_lab_profile_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_lab_profile->isGridAdd())
		if (!$view_lab_profile_list->Recordset->EOF)
			$view_lab_profile_list->Recordset->moveNext();
}
?>
<?php
	if ($view_lab_profile->isGridAdd() || $view_lab_profile->isGridEdit()) {
		$view_lab_profile_list->RowIndex = '$rowindex$';
		$view_lab_profile_list->loadRowValues();

		// Set row properties
		$view_lab_profile->resetAttributes();
		$view_lab_profile->RowAttrs = array_merge($view_lab_profile->RowAttrs, array('data-rowindex'=>$view_lab_profile_list->RowIndex, 'id'=>'r0_view_lab_profile', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_lab_profile->RowAttrs["class"], "ew-template");
		$view_lab_profile->RowType = ROWTYPE_ADD;

		// Render row
		$view_lab_profile_list->renderRow();

		// Render list options
		$view_lab_profile_list->renderListOptions();
		$view_lab_profile_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_lab_profile->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_profile_list->ListOptions->render("body", "left", $view_lab_profile_list->RowIndex);
?>
	<?php if ($view_lab_profile->Id->Visible) { // Id ?>
		<td data-name="Id">
<input type="hidden" data-table="view_lab_profile" data-field="x_Id" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Id" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_profile->Id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->CODE->Visible) { // CODE ?>
		<td data-name="CODE">
<span id="el$rowindex$_view_lab_profile_CODE" class="form-group view_lab_profile_CODE">
<input type="text" data-table="view_lab_profile" data-field="x_CODE" name="x<?php echo $view_lab_profile_list->RowIndex ?>_CODE" id="x<?php echo $view_lab_profile_list->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->CODE->EditValue ?>"<?php echo $view_lab_profile->CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_CODE" name="o<?php echo $view_lab_profile_list->RowIndex ?>_CODE" id="o<?php echo $view_lab_profile_list->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_profile->CODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE">
<span id="el$rowindex$_view_lab_profile_SERVICE" class="form-group view_lab_profile_SERVICE">
<input type="text" data-table="view_lab_profile" data-field="x_SERVICE" name="x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->SERVICE->EditValue ?>"<?php echo $view_lab_profile->SERVICE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_SERVICE" name="o<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE" id="o<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_profile->SERVICE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS">
<span id="el$rowindex$_view_lab_profile_UNITS" class="form-group view_lab_profile_UNITS">
<input type="text" data-table="view_lab_profile" data-field="x_UNITS" name="x<?php echo $view_lab_profile_list->RowIndex ?>_UNITS" id="x<?php echo $view_lab_profile_list->RowIndex ?>_UNITS" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->UNITS->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->UNITS->EditValue ?>"<?php echo $view_lab_profile->UNITS->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_UNITS" name="o<?php echo $view_lab_profile_list->RowIndex ?>_UNITS" id="o<?php echo $view_lab_profile_list->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_profile->UNITS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->AMOUNT->Visible) { // AMOUNT ?>
		<td data-name="AMOUNT">
<span id="el$rowindex$_view_lab_profile_AMOUNT" class="form-group view_lab_profile_AMOUNT">
<input type="text" data-table="view_lab_profile" data-field="x_AMOUNT" name="x<?php echo $view_lab_profile_list->RowIndex ?>_AMOUNT" id="x<?php echo $view_lab_profile_list->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->AMOUNT->EditValue ?>"<?php echo $view_lab_profile->AMOUNT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_AMOUNT" name="o<?php echo $view_lab_profile_list->RowIndex ?>_AMOUNT" id="o<?php echo $view_lab_profile_list->RowIndex ?>_AMOUNT" value="<?php echo HtmlEncode($view_lab_profile->AMOUNT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE">
<span id="el$rowindex$_view_lab_profile_SERVICE_TYPE" class="form-group view_lab_profile_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $view_lab_profile->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE"<?php echo $view_lab_profile->SERVICE_TYPE->editAttributes() ?>>
		<?php echo $view_lab_profile->SERVICE_TYPE->selectOptionListHtml("x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$view_lab_profile->SERVICE_TYPE->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_profile->SERVICE_TYPE->caption() ?>" data-title="<?php echo $view_lab_profile->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE',url:'mas_services_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $view_lab_profile->SERVICE_TYPE->Lookup->getParamTag("p_x" . $view_lab_profile_list->RowIndex . "_SERVICE_TYPE") ?>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_SERVICE_TYPE" name="o<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $view_lab_profile_list->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_lab_profile->SERVICE_TYPE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT">
<span id="el$rowindex$_view_lab_profile_DEPARTMENT" class="form-group view_lab_profile_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_DEPARTMENT" data-value-separator="<?php echo $view_lab_profile->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT"<?php echo $view_lab_profile->DEPARTMENT->editAttributes() ?>>
		<?php echo $view_lab_profile->DEPARTMENT->selectOptionListHtml("x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$view_lab_profile->DEPARTMENT->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_profile->DEPARTMENT->caption() ?>" data-title="<?php echo $view_lab_profile->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT',url:'mas_billing_departmentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $view_lab_profile->DEPARTMENT->Lookup->getParamTag("p_x" . $view_lab_profile_list->RowIndex . "_DEPARTMENT") ?>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_DEPARTMENT" name="o<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT" id="o<?php echo $view_lab_profile_list->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_lab_profile->DEPARTMENT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td data-name="mas_services_billingcol">
<span id="el$rowindex$_view_lab_profile_mas_services_billingcol" class="form-group view_lab_profile_mas_services_billingcol">
<input type="text" data-table="view_lab_profile" data-field="x_mas_services_billingcol" name="x<?php echo $view_lab_profile_list->RowIndex ?>_mas_services_billingcol" id="x<?php echo $view_lab_profile_list->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->mas_services_billingcol->EditValue ?>"<?php echo $view_lab_profile->mas_services_billingcol->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_mas_services_billingcol" name="o<?php echo $view_lab_profile_list->RowIndex ?>_mas_services_billingcol" id="o<?php echo $view_lab_profile_list->RowIndex ?>_mas_services_billingcol" value="<?php echo HtmlEncode($view_lab_profile->mas_services_billingcol->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount">
<span id="el$rowindex$_view_lab_profile_DrShareAmount" class="form-group view_lab_profile_DrShareAmount">
<input type="text" data-table="view_lab_profile" data-field="x_DrShareAmount" name="x<?php echo $view_lab_profile_list->RowIndex ?>_DrShareAmount" id="x<?php echo $view_lab_profile_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->DrShareAmount->EditValue ?>"<?php echo $view_lab_profile->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_DrShareAmount" name="o<?php echo $view_lab_profile_list->RowIndex ?>_DrShareAmount" id="o<?php echo $view_lab_profile_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_lab_profile->DrShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount">
<span id="el$rowindex$_view_lab_profile_HospShareAmount" class="form-group view_lab_profile_HospShareAmount">
<input type="text" data-table="view_lab_profile" data-field="x_HospShareAmount" name="x<?php echo $view_lab_profile_list->RowIndex ?>_HospShareAmount" id="x<?php echo $view_lab_profile_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->HospShareAmount->EditValue ?>"<?php echo $view_lab_profile->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_HospShareAmount" name="o<?php echo $view_lab_profile_list->RowIndex ?>_HospShareAmount" id="o<?php echo $view_lab_profile_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_lab_profile->HospShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->DrSharePer->Visible) { // DrSharePer ?>
		<td data-name="DrSharePer">
<span id="el$rowindex$_view_lab_profile_DrSharePer" class="form-group view_lab_profile_DrSharePer">
<input type="text" data-table="view_lab_profile" data-field="x_DrSharePer" name="x<?php echo $view_lab_profile_list->RowIndex ?>_DrSharePer" id="x<?php echo $view_lab_profile_list->RowIndex ?>_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->DrSharePer->EditValue ?>"<?php echo $view_lab_profile->DrSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_DrSharePer" name="o<?php echo $view_lab_profile_list->RowIndex ?>_DrSharePer" id="o<?php echo $view_lab_profile_list->RowIndex ?>_DrSharePer" value="<?php echo HtmlEncode($view_lab_profile->DrSharePer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->HospSharePer->Visible) { // HospSharePer ?>
		<td data-name="HospSharePer">
<span id="el$rowindex$_view_lab_profile_HospSharePer" class="form-group view_lab_profile_HospSharePer">
<input type="text" data-table="view_lab_profile" data-field="x_HospSharePer" name="x<?php echo $view_lab_profile_list->RowIndex ?>_HospSharePer" id="x<?php echo $view_lab_profile_list->RowIndex ?>_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->HospSharePer->EditValue ?>"<?php echo $view_lab_profile->HospSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_HospSharePer" name="o<?php echo $view_lab_profile_list->RowIndex ?>_HospSharePer" id="o<?php echo $view_lab_profile_list->RowIndex ?>_HospSharePer" value="<?php echo HtmlEncode($view_lab_profile->HospSharePer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="view_lab_profile" data-field="x_HospID" name="o<?php echo $view_lab_profile_list->RowIndex ?>_HospID" id="o<?php echo $view_lab_profile_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_profile->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<span id="el$rowindex$_view_lab_profile_TestSubCd" class="form-group view_lab_profile_TestSubCd">
<input type="text" data-table="view_lab_profile" data-field="x_TestSubCd" name="x<?php echo $view_lab_profile_list->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_profile_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->TestSubCd->EditValue ?>"<?php echo $view_lab_profile->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_TestSubCd" name="o<?php echo $view_lab_profile_list->RowIndex ?>_TestSubCd" id="o<?php echo $view_lab_profile_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_profile->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Method->Visible) { // Method ?>
		<td data-name="Method">
<span id="el$rowindex$_view_lab_profile_Method" class="form-group view_lab_profile_Method">
<input type="text" data-table="view_lab_profile" data-field="x_Method" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Method" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Method->EditValue ?>"<?php echo $view_lab_profile->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Method" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Method" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_profile->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Order->Visible) { // Order ?>
		<td data-name="Order">
<span id="el$rowindex$_view_lab_profile_Order" class="form-group view_lab_profile_Order">
<input type="text" data-table="view_lab_profile" data-field="x_Order" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Order" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Order->EditValue ?>"<?php echo $view_lab_profile->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Order" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Order" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_profile->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->ResType->Visible) { // ResType ?>
		<td data-name="ResType">
<span id="el$rowindex$_view_lab_profile_ResType" class="form-group view_lab_profile_ResType">
<input type="text" data-table="view_lab_profile" data-field="x_ResType" name="x<?php echo $view_lab_profile_list->RowIndex ?>_ResType" id="x<?php echo $view_lab_profile_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->ResType->EditValue ?>"<?php echo $view_lab_profile->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_ResType" name="o<?php echo $view_lab_profile_list->RowIndex ?>_ResType" id="o<?php echo $view_lab_profile_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_profile->ResType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD">
<span id="el$rowindex$_view_lab_profile_UnitCD" class="form-group view_lab_profile_UnitCD">
<input type="text" data-table="view_lab_profile" data-field="x_UnitCD" name="x<?php echo $view_lab_profile_list->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_profile_list->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->UnitCD->EditValue ?>"<?php echo $view_lab_profile->UnitCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_UnitCD" name="o<?php echo $view_lab_profile_list->RowIndex ?>_UnitCD" id="o<?php echo $view_lab_profile_list->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_profile->UnitCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Sample->Visible) { // Sample ?>
		<td data-name="Sample">
<span id="el$rowindex$_view_lab_profile_Sample" class="form-group view_lab_profile_Sample">
<input type="text" data-table="view_lab_profile" data-field="x_Sample" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Sample" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_profile->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Sample->EditValue ?>"<?php echo $view_lab_profile->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Sample" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Sample" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_profile->Sample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->NoD->Visible) { // NoD ?>
		<td data-name="NoD">
<span id="el$rowindex$_view_lab_profile_NoD" class="form-group view_lab_profile_NoD">
<input type="text" data-table="view_lab_profile" data-field="x_NoD" name="x<?php echo $view_lab_profile_list->RowIndex ?>_NoD" id="x<?php echo $view_lab_profile_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->NoD->EditValue ?>"<?php echo $view_lab_profile->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_NoD" name="o<?php echo $view_lab_profile_list->RowIndex ?>_NoD" id="o<?php echo $view_lab_profile_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_profile->NoD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder">
<span id="el$rowindex$_view_lab_profile_BillOrder" class="form-group view_lab_profile_BillOrder">
<input type="text" data-table="view_lab_profile" data-field="x_BillOrder" name="x<?php echo $view_lab_profile_list->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_profile_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->BillOrder->EditValue ?>"<?php echo $view_lab_profile->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_BillOrder" name="o<?php echo $view_lab_profile_list->RowIndex ?>_BillOrder" id="o<?php echo $view_lab_profile_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_profile->BillOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive">
<span id="el$rowindex$_view_lab_profile_Inactive" class="form-group view_lab_profile_Inactive">
<input type="text" data-table="view_lab_profile" data-field="x_Inactive" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Inactive" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Inactive->EditValue ?>"<?php echo $view_lab_profile->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Inactive" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Inactive" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_lab_profile->Inactive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource">
<span id="el$rowindex$_view_lab_profile_Outsource" class="form-group view_lab_profile_Outsource">
<input type="text" data-table="view_lab_profile" data-field="x_Outsource" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Outsource" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Outsource->EditValue ?>"<?php echo $view_lab_profile->Outsource->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Outsource" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Outsource" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_profile->Outsource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample">
<span id="el$rowindex$_view_lab_profile_CollSample" class="form-group view_lab_profile_CollSample">
<input type="text" data-table="view_lab_profile" data-field="x_CollSample" name="x<?php echo $view_lab_profile_list->RowIndex ?>_CollSample" id="x<?php echo $view_lab_profile_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->CollSample->EditValue ?>"<?php echo $view_lab_profile->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_CollSample" name="o<?php echo $view_lab_profile_list->RowIndex ?>_CollSample" id="o<?php echo $view_lab_profile_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_profile->CollSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<span id="el$rowindex$_view_lab_profile_TestType" class="form-group view_lab_profile_TestType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_TestType" data-value-separator="<?php echo $view_lab_profile->TestType->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_profile_list->RowIndex ?>_TestType" name="x<?php echo $view_lab_profile_list->RowIndex ?>_TestType"<?php echo $view_lab_profile->TestType->editAttributes() ?>>
		<?php echo $view_lab_profile->TestType->selectOptionListHtml("x<?php echo $view_lab_profile_list->RowIndex ?>_TestType") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_TestType" name="o<?php echo $view_lab_profile_list->RowIndex ?>_TestType" id="o<?php echo $view_lab_profile_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_profile->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->NoHeading->Visible) { // NoHeading ?>
		<td data-name="NoHeading">
<span id="el$rowindex$_view_lab_profile_NoHeading" class="form-group view_lab_profile_NoHeading">
<input type="text" data-table="view_lab_profile" data-field="x_NoHeading" name="x<?php echo $view_lab_profile_list->RowIndex ?>_NoHeading" id="x<?php echo $view_lab_profile_list->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->NoHeading->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->NoHeading->EditValue ?>"<?php echo $view_lab_profile->NoHeading->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_NoHeading" name="o<?php echo $view_lab_profile_list->RowIndex ?>_NoHeading" id="o<?php echo $view_lab_profile_list->RowIndex ?>_NoHeading" value="<?php echo HtmlEncode($view_lab_profile->NoHeading->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->ChemicalCode->Visible) { // ChemicalCode ?>
		<td data-name="ChemicalCode">
<span id="el$rowindex$_view_lab_profile_ChemicalCode" class="form-group view_lab_profile_ChemicalCode">
<input type="text" data-table="view_lab_profile" data-field="x_ChemicalCode" name="x<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalCode" id="x<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->ChemicalCode->EditValue ?>"<?php echo $view_lab_profile->ChemicalCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_ChemicalCode" name="o<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalCode" id="o<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalCode" value="<?php echo HtmlEncode($view_lab_profile->ChemicalCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->ChemicalName->Visible) { // ChemicalName ?>
		<td data-name="ChemicalName">
<span id="el$rowindex$_view_lab_profile_ChemicalName" class="form-group view_lab_profile_ChemicalName">
<input type="text" data-table="view_lab_profile" data-field="x_ChemicalName" name="x<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalName" id="x<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->ChemicalName->EditValue ?>"<?php echo $view_lab_profile->ChemicalName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_ChemicalName" name="o<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalName" id="o<?php echo $view_lab_profile_list->RowIndex ?>_ChemicalName" value="<?php echo HtmlEncode($view_lab_profile->ChemicalName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_profile->Utilaization->Visible) { // Utilaization ?>
		<td data-name="Utilaization">
<span id="el$rowindex$_view_lab_profile_Utilaization" class="form-group view_lab_profile_Utilaization">
<input type="text" data-table="view_lab_profile" data-field="x_Utilaization" name="x<?php echo $view_lab_profile_list->RowIndex ?>_Utilaization" id="x<?php echo $view_lab_profile_list->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Utilaization->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Utilaization->EditValue ?>"<?php echo $view_lab_profile->Utilaization->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_profile" data-field="x_Utilaization" name="o<?php echo $view_lab_profile_list->RowIndex ?>_Utilaization" id="o<?php echo $view_lab_profile_list->RowIndex ?>_Utilaization" value="<?php echo HtmlEncode($view_lab_profile->Utilaization->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_profile_list->ListOptions->render("body", "right", $view_lab_profile_list->RowIndex);
?>
<script>
fview_lab_profilelist.updateLists(<?php echo $view_lab_profile_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($view_lab_profile->isAdd() || $view_lab_profile->isCopy()) { ?>
<input type="hidden" name="<?php echo $view_lab_profile_list->FormKeyCountName ?>" id="<?php echo $view_lab_profile_list->FormKeyCountName ?>" value="<?php echo $view_lab_profile_list->KeyCount ?>">
<?php } ?>
<?php if ($view_lab_profile->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $view_lab_profile_list->FormKeyCountName ?>" id="<?php echo $view_lab_profile_list->FormKeyCountName ?>" value="<?php echo $view_lab_profile_list->KeyCount ?>">
<?php echo $view_lab_profile_list->MultiSelectKey ?>
<?php } ?>
<?php if ($view_lab_profile->isEdit()) { ?>
<input type="hidden" name="<?php echo $view_lab_profile_list->FormKeyCountName ?>" id="<?php echo $view_lab_profile_list->FormKeyCountName ?>" value="<?php echo $view_lab_profile_list->KeyCount ?>">
<?php } ?>
<?php if ($view_lab_profile->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_lab_profile_list->FormKeyCountName ?>" id="<?php echo $view_lab_profile_list->FormKeyCountName ?>" value="<?php echo $view_lab_profile_list->KeyCount ?>">
<?php echo $view_lab_profile_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_lab_profile->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_lab_profile_list->Recordset)
	$view_lab_profile_list->Recordset->Close();
?>
<?php if (!$view_lab_profile->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_lab_profile->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_lab_profile_list->Pager)) $view_lab_profile_list->Pager = new NumericPager($view_lab_profile_list->StartRec, $view_lab_profile_list->DisplayRecs, $view_lab_profile_list->TotalRecs, $view_lab_profile_list->RecRange, $view_lab_profile_list->AutoHidePager) ?>
<?php if ($view_lab_profile_list->Pager->RecordCount > 0 && $view_lab_profile_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_lab_profile_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_profile_list->pageUrl() ?>start=<?php echo $view_lab_profile_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_profile_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_profile_list->pageUrl() ?>start=<?php echo $view_lab_profile_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_lab_profile_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_lab_profile_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_lab_profile_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_profile_list->pageUrl() ?>start=<?php echo $view_lab_profile_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_profile_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_profile_list->pageUrl() ?>start=<?php echo $view_lab_profile_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_lab_profile_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_profile_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_profile_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_profile_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_lab_profile_list->TotalRecs > 0 && (!$view_lab_profile_list->AutoHidePageSizeSelector || $view_lab_profile_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_lab_profile">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_lab_profile_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_lab_profile_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_lab_profile_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_lab_profile_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_lab_profile_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_lab_profile_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_lab_profile->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_profile_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_lab_profile_list->TotalRecs == 0 && !$view_lab_profile->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_lab_profile_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_lab_profile_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_lab_profile->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_lab_profile->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_lab_profile", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_lab_profile_list->terminate();
?>