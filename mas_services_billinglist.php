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
$mas_services_billing_list = new mas_services_billing_list();

// Run the page
$mas_services_billing_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_services_billing_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_services_billing->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fmas_services_billinglist = currentForm = new ew.Form("fmas_services_billinglist", "list");
fmas_services_billinglist.formKeyCountName = '<?php echo $mas_services_billing_list->FormKeyCountName ?>';

// Validate form
fmas_services_billinglist.validate = function() {
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
		<?php if ($mas_services_billing_list->Id->Required) { ?>
			elm = this.getElements("x" + infix + "_Id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Id->caption(), $mas_services_billing->Id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->CODE->Required) { ?>
			elm = this.getElements("x" + infix + "_CODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->CODE->caption(), $mas_services_billing->CODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->SERVICE->Required) { ?>
			elm = this.getElements("x" + infix + "_SERVICE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->SERVICE->caption(), $mas_services_billing->SERVICE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->UNITS->Required) { ?>
			elm = this.getElements("x" + infix + "_UNITS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->UNITS->caption(), $mas_services_billing->UNITS->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UNITS");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_services_billing->UNITS->errorMessage()) ?>");
		<?php if ($mas_services_billing_list->AMOUNT->Required) { ?>
			elm = this.getElements("x" + infix + "_AMOUNT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->AMOUNT->caption(), $mas_services_billing->AMOUNT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->SERVICE_TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_SERVICE_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->SERVICE_TYPE->caption(), $mas_services_billing->SERVICE_TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->DEPARTMENT->Required) { ?>
			elm = this.getElements("x" + infix + "_DEPARTMENT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->DEPARTMENT->caption(), $mas_services_billing->DEPARTMENT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->mas_services_billingcol->Required) { ?>
			elm = this.getElements("x" + infix + "_mas_services_billingcol");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->mas_services_billingcol->caption(), $mas_services_billing->mas_services_billingcol->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->DrShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->DrShareAmount->caption(), $mas_services_billing->DrShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_services_billing->DrShareAmount->errorMessage()) ?>");
		<?php if ($mas_services_billing_list->HospShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->HospShareAmount->caption(), $mas_services_billing->HospShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_services_billing->HospShareAmount->errorMessage()) ?>");
		<?php if ($mas_services_billing_list->DrSharePer->Required) { ?>
			elm = this.getElements("x" + infix + "_DrSharePer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->DrSharePer->caption(), $mas_services_billing->DrSharePer->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrSharePer");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_services_billing->DrSharePer->errorMessage()) ?>");
		<?php if ($mas_services_billing_list->HospSharePer->Required) { ?>
			elm = this.getElements("x" + infix + "_HospSharePer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->HospSharePer->caption(), $mas_services_billing->HospSharePer->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospSharePer");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_services_billing->HospSharePer->errorMessage()) ?>");
		<?php if ($mas_services_billing_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->HospID->caption(), $mas_services_billing->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->TestSubCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestSubCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->TestSubCd->caption(), $mas_services_billing->TestSubCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Method->caption(), $mas_services_billing->Method->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Order->caption(), $mas_services_billing->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_services_billing->Order->errorMessage()) ?>");
		<?php if ($mas_services_billing_list->ResType->Required) { ?>
			elm = this.getElements("x" + infix + "_ResType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->ResType->caption(), $mas_services_billing->ResType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->UnitCD->Required) { ?>
			elm = this.getElements("x" + infix + "_UnitCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->UnitCD->caption(), $mas_services_billing->UnitCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->Sample->Required) { ?>
			elm = this.getElements("x" + infix + "_Sample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Sample->caption(), $mas_services_billing->Sample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->NoD->Required) { ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->NoD->caption(), $mas_services_billing->NoD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_services_billing->NoD->errorMessage()) ?>");
		<?php if ($mas_services_billing_list->BillOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->BillOrder->caption(), $mas_services_billing->BillOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_services_billing->BillOrder->errorMessage()) ?>");
		<?php if ($mas_services_billing_list->Inactive->Required) { ?>
			elm = this.getElements("x" + infix + "_Inactive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Inactive->caption(), $mas_services_billing->Inactive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->Outsource->Required) { ?>
			elm = this.getElements("x" + infix + "_Outsource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Outsource->caption(), $mas_services_billing->Outsource->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->CollSample->Required) { ?>
			elm = this.getElements("x" + infix + "_CollSample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->CollSample->caption(), $mas_services_billing->CollSample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->TestType->Required) { ?>
			elm = this.getElements("x" + infix + "_TestType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->TestType->caption(), $mas_services_billing->TestType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->NoHeading->Required) { ?>
			elm = this.getElements("x" + infix + "_NoHeading");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->NoHeading->caption(), $mas_services_billing->NoHeading->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->ChemicalCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ChemicalCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->ChemicalCode->caption(), $mas_services_billing->ChemicalCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->ChemicalName->Required) { ?>
			elm = this.getElements("x" + infix + "_ChemicalName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->ChemicalName->caption(), $mas_services_billing->ChemicalName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_list->Utilaization->Required) { ?>
			elm = this.getElements("x" + infix + "_Utilaization");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Utilaization->caption(), $mas_services_billing->Utilaization->RequiredErrorMessage)) ?>");
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
fmas_services_billinglist.emptyRow = function(infix) {
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
fmas_services_billinglist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_services_billinglist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_services_billinglist.lists["x_SERVICE_TYPE"] = <?php echo $mas_services_billing_list->SERVICE_TYPE->Lookup->toClientList() ?>;
fmas_services_billinglist.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($mas_services_billing_list->SERVICE_TYPE->lookupOptions()) ?>;
fmas_services_billinglist.lists["x_DEPARTMENT"] = <?php echo $mas_services_billing_list->DEPARTMENT->Lookup->toClientList() ?>;
fmas_services_billinglist.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($mas_services_billing_list->DEPARTMENT->lookupOptions()) ?>;

// Form object for search
var fmas_services_billinglistsrch = currentSearchForm = new ew.Form("fmas_services_billinglistsrch");

// Validate function for search
fmas_services_billinglistsrch.validate = function(fobj) {
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
fmas_services_billinglistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_services_billinglistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_services_billinglistsrch.lists["x_SERVICE_TYPE"] = <?php echo $mas_services_billing_list->SERVICE_TYPE->Lookup->toClientList() ?>;
fmas_services_billinglistsrch.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($mas_services_billing_list->SERVICE_TYPE->lookupOptions()) ?>;
fmas_services_billinglistsrch.lists["x_DEPARTMENT"] = <?php echo $mas_services_billing_list->DEPARTMENT->Lookup->toClientList() ?>;
fmas_services_billinglistsrch.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($mas_services_billing_list->DEPARTMENT->lookupOptions()) ?>;

// Filters
fmas_services_billinglistsrch.filterList = <?php echo $mas_services_billing_list->getFilterList() ?>;
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
<?php if (!$mas_services_billing->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_services_billing_list->TotalRecs > 0 && $mas_services_billing_list->ExportOptions->visible()) { ?>
<?php $mas_services_billing_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_services_billing_list->ImportOptions->visible()) { ?>
<?php $mas_services_billing_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_services_billing_list->SearchOptions->visible()) { ?>
<?php $mas_services_billing_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_services_billing_list->FilterOptions->visible()) { ?>
<?php $mas_services_billing_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_services_billing_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_services_billing->isExport() && !$mas_services_billing->CurrentAction) { ?>
<form name="fmas_services_billinglistsrch" id="fmas_services_billinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($mas_services_billing_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fmas_services_billinglistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_services_billing">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$mas_services_billing_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$mas_services_billing->RowType = ROWTYPE_SEARCH;

// Render row
$mas_services_billing->resetAttributes();
$mas_services_billing_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($mas_services_billing->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<div id="xsc_SERVICE_TYPE" class="ew-cell form-group">
		<label for="x_SERVICE_TYPE" class="ew-search-caption ew-label"><?php echo $mas_services_billing->SERVICE_TYPE->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SERVICE_TYPE" id="z_SERVICE_TYPE" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $mas_services_billing->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x_SERVICE_TYPE" name="x_SERVICE_TYPE"<?php echo $mas_services_billing->SERVICE_TYPE->editAttributes() ?>>
		<?php echo $mas_services_billing->SERVICE_TYPE->selectOptionListHtml("x_SERVICE_TYPE") ?>
	</select>
</div>
<?php echo $mas_services_billing->SERVICE_TYPE->Lookup->getParamTag("p_x_SERVICE_TYPE") ?>
</span>
	</div>
<?php } ?>
<?php if ($mas_services_billing->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div id="xsc_DEPARTMENT" class="ew-cell form-group">
		<label for="x_DEPARTMENT" class="ew-search-caption ew-label"><?php echo $mas_services_billing->DEPARTMENT->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DEPARTMENT" id="z_DEPARTMENT" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_DEPARTMENT" data-value-separator="<?php echo $mas_services_billing->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x_DEPARTMENT" name="x_DEPARTMENT"<?php echo $mas_services_billing->DEPARTMENT->editAttributes() ?>>
		<?php echo $mas_services_billing->DEPARTMENT->selectOptionListHtml("x_DEPARTMENT") ?>
	</select>
</div>
<?php echo $mas_services_billing->DEPARTMENT->Lookup->getParamTag("p_x_DEPARTMENT") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($mas_services_billing_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($mas_services_billing_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_services_billing_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_services_billing_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_services_billing_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_services_billing_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_services_billing_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $mas_services_billing_list->showPageHeader(); ?>
<?php
$mas_services_billing_list->showMessage();
?>
<?php if ($mas_services_billing_list->TotalRecs > 0 || $mas_services_billing->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_services_billing_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_services_billing">
<?php if (!$mas_services_billing->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_services_billing->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_services_billing_list->Pager)) $mas_services_billing_list->Pager = new NumericPager($mas_services_billing_list->StartRec, $mas_services_billing_list->DisplayRecs, $mas_services_billing_list->TotalRecs, $mas_services_billing_list->RecRange, $mas_services_billing_list->AutoHidePager) ?>
<?php if ($mas_services_billing_list->Pager->RecordCount > 0 && $mas_services_billing_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_services_billing_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_services_billing_list->pageUrl() ?>start=<?php echo $mas_services_billing_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_services_billing_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_services_billing_list->pageUrl() ?>start=<?php echo $mas_services_billing_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_services_billing_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_services_billing_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_services_billing_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_services_billing_list->pageUrl() ?>start=<?php echo $mas_services_billing_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_services_billing_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_services_billing_list->pageUrl() ?>start=<?php echo $mas_services_billing_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_services_billing_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_services_billing_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_services_billing_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_services_billing_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_services_billing_list->TotalRecs > 0 && (!$mas_services_billing_list->AutoHidePageSizeSelector || $mas_services_billing_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_services_billing">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_services_billing_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_services_billing_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_services_billing_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_services_billing_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_services_billing_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_services_billing_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_services_billing->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_services_billing_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_services_billinglist" id="fmas_services_billinglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_services_billing_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_services_billing_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_services_billing">
<div id="gmp_mas_services_billing" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($mas_services_billing_list->TotalRecs > 0 || $mas_services_billing->isAdd() || $mas_services_billing->isCopy() || $mas_services_billing->isGridEdit()) { ?>
<table id="tbl_mas_services_billinglist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_services_billing_list->RowType = ROWTYPE_HEADER;

// Render list options
$mas_services_billing_list->renderListOptions();

// Render list options (header, left)
$mas_services_billing_list->ListOptions->render("header", "left");
?>
<?php if ($mas_services_billing->Id->Visible) { // Id ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->Id) == "") { ?>
		<th data-name="Id" class="<?php echo $mas_services_billing->Id->headerCellClass() ?>"><div id="elh_mas_services_billing_Id" class="mas_services_billing_Id"><div class="ew-table-header-caption"><?php echo $mas_services_billing->Id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Id" class="<?php echo $mas_services_billing->Id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->Id) ?>',1);"><div id="elh_mas_services_billing_Id" class="mas_services_billing_Id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->Id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->Id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->Id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->CODE->Visible) { // CODE ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $mas_services_billing->CODE->headerCellClass() ?>"><div id="elh_mas_services_billing_CODE" class="mas_services_billing_CODE"><div class="ew-table-header-caption"><?php echo $mas_services_billing->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $mas_services_billing->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->CODE) ?>',1);"><div id="elh_mas_services_billing_CODE" class="mas_services_billing_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->CODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->CODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->SERVICE->Visible) { // SERVICE ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->SERVICE) == "") { ?>
		<th data-name="SERVICE" class="<?php echo $mas_services_billing->SERVICE->headerCellClass() ?>"><div id="elh_mas_services_billing_SERVICE" class="mas_services_billing_SERVICE"><div class="ew-table-header-caption"><?php echo $mas_services_billing->SERVICE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE" class="<?php echo $mas_services_billing->SERVICE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->SERVICE) ?>',1);"><div id="elh_mas_services_billing_SERVICE" class="mas_services_billing_SERVICE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->SERVICE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->SERVICE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->SERVICE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->UNITS->Visible) { // UNITS ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->UNITS) == "") { ?>
		<th data-name="UNITS" class="<?php echo $mas_services_billing->UNITS->headerCellClass() ?>"><div id="elh_mas_services_billing_UNITS" class="mas_services_billing_UNITS"><div class="ew-table-header-caption"><?php echo $mas_services_billing->UNITS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNITS" class="<?php echo $mas_services_billing->UNITS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->UNITS) ?>',1);"><div id="elh_mas_services_billing_UNITS" class="mas_services_billing_UNITS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->UNITS->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->UNITS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->UNITS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->AMOUNT->Visible) { // AMOUNT ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->AMOUNT) == "") { ?>
		<th data-name="AMOUNT" class="<?php echo $mas_services_billing->AMOUNT->headerCellClass() ?>"><div id="elh_mas_services_billing_AMOUNT" class="mas_services_billing_AMOUNT"><div class="ew-table-header-caption"><?php echo $mas_services_billing->AMOUNT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AMOUNT" class="<?php echo $mas_services_billing->AMOUNT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->AMOUNT) ?>',1);"><div id="elh_mas_services_billing_AMOUNT" class="mas_services_billing_AMOUNT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->AMOUNT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->AMOUNT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->AMOUNT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->SERVICE_TYPE) == "") { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $mas_services_billing->SERVICE_TYPE->headerCellClass() ?>"><div id="elh_mas_services_billing_SERVICE_TYPE" class="mas_services_billing_SERVICE_TYPE"><div class="ew-table-header-caption"><?php echo $mas_services_billing->SERVICE_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $mas_services_billing->SERVICE_TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->SERVICE_TYPE) ?>',1);"><div id="elh_mas_services_billing_SERVICE_TYPE" class="mas_services_billing_SERVICE_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->SERVICE_TYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->SERVICE_TYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->SERVICE_TYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->DEPARTMENT) == "") { ?>
		<th data-name="DEPARTMENT" class="<?php echo $mas_services_billing->DEPARTMENT->headerCellClass() ?>"><div id="elh_mas_services_billing_DEPARTMENT" class="mas_services_billing_DEPARTMENT"><div class="ew-table-header-caption"><?php echo $mas_services_billing->DEPARTMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEPARTMENT" class="<?php echo $mas_services_billing->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->DEPARTMENT) ?>',1);"><div id="elh_mas_services_billing_DEPARTMENT" class="mas_services_billing_DEPARTMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->DEPARTMENT->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->DEPARTMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->DEPARTMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->mas_services_billingcol) == "") { ?>
		<th data-name="mas_services_billingcol" class="<?php echo $mas_services_billing->mas_services_billingcol->headerCellClass() ?>"><div id="elh_mas_services_billing_mas_services_billingcol" class="mas_services_billing_mas_services_billingcol"><div class="ew-table-header-caption"><?php echo $mas_services_billing->mas_services_billingcol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mas_services_billingcol" class="<?php echo $mas_services_billing->mas_services_billingcol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->mas_services_billingcol) ?>',1);"><div id="elh_mas_services_billing_mas_services_billingcol" class="mas_services_billing_mas_services_billingcol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->mas_services_billingcol->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->mas_services_billingcol->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->mas_services_billingcol->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->DrShareAmount->Visible) { // DrShareAmount ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->DrShareAmount) == "") { ?>
		<th data-name="DrShareAmount" class="<?php echo $mas_services_billing->DrShareAmount->headerCellClass() ?>"><div id="elh_mas_services_billing_DrShareAmount" class="mas_services_billing_DrShareAmount"><div class="ew-table-header-caption"><?php echo $mas_services_billing->DrShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareAmount" class="<?php echo $mas_services_billing->DrShareAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->DrShareAmount) ?>',1);"><div id="elh_mas_services_billing_DrShareAmount" class="mas_services_billing_DrShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->DrShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->DrShareAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->DrShareAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->HospShareAmount->Visible) { // HospShareAmount ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->HospShareAmount) == "") { ?>
		<th data-name="HospShareAmount" class="<?php echo $mas_services_billing->HospShareAmount->headerCellClass() ?>"><div id="elh_mas_services_billing_HospShareAmount" class="mas_services_billing_HospShareAmount"><div class="ew-table-header-caption"><?php echo $mas_services_billing->HospShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospShareAmount" class="<?php echo $mas_services_billing->HospShareAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->HospShareAmount) ?>',1);"><div id="elh_mas_services_billing_HospShareAmount" class="mas_services_billing_HospShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->HospShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->HospShareAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->HospShareAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->DrSharePer->Visible) { // DrSharePer ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->DrSharePer) == "") { ?>
		<th data-name="DrSharePer" class="<?php echo $mas_services_billing->DrSharePer->headerCellClass() ?>"><div id="elh_mas_services_billing_DrSharePer" class="mas_services_billing_DrSharePer"><div class="ew-table-header-caption"><?php echo $mas_services_billing->DrSharePer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrSharePer" class="<?php echo $mas_services_billing->DrSharePer->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->DrSharePer) ?>',1);"><div id="elh_mas_services_billing_DrSharePer" class="mas_services_billing_DrSharePer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->DrSharePer->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->DrSharePer->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->DrSharePer->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->HospSharePer->Visible) { // HospSharePer ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->HospSharePer) == "") { ?>
		<th data-name="HospSharePer" class="<?php echo $mas_services_billing->HospSharePer->headerCellClass() ?>"><div id="elh_mas_services_billing_HospSharePer" class="mas_services_billing_HospSharePer"><div class="ew-table-header-caption"><?php echo $mas_services_billing->HospSharePer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospSharePer" class="<?php echo $mas_services_billing->HospSharePer->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->HospSharePer) ?>',1);"><div id="elh_mas_services_billing_HospSharePer" class="mas_services_billing_HospSharePer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->HospSharePer->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->HospSharePer->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->HospSharePer->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->HospID->Visible) { // HospID ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $mas_services_billing->HospID->headerCellClass() ?>"><div id="elh_mas_services_billing_HospID" class="mas_services_billing_HospID"><div class="ew-table-header-caption"><?php echo $mas_services_billing->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $mas_services_billing->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->HospID) ?>',1);"><div id="elh_mas_services_billing_HospID" class="mas_services_billing_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $mas_services_billing->TestSubCd->headerCellClass() ?>"><div id="elh_mas_services_billing_TestSubCd" class="mas_services_billing_TestSubCd"><div class="ew-table-header-caption"><?php echo $mas_services_billing->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $mas_services_billing->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->TestSubCd) ?>',1);"><div id="elh_mas_services_billing_TestSubCd" class="mas_services_billing_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->TestSubCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->TestSubCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->TestSubCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->Method->Visible) { // Method ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $mas_services_billing->Method->headerCellClass() ?>"><div id="elh_mas_services_billing_Method" class="mas_services_billing_Method"><div class="ew-table-header-caption"><?php echo $mas_services_billing->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $mas_services_billing->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->Method) ?>',1);"><div id="elh_mas_services_billing_Method" class="mas_services_billing_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->Method->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->Method->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->Order->Visible) { // Order ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $mas_services_billing->Order->headerCellClass() ?>"><div id="elh_mas_services_billing_Order" class="mas_services_billing_Order"><div class="ew-table-header-caption"><?php echo $mas_services_billing->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $mas_services_billing->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->Order) ?>',1);"><div id="elh_mas_services_billing_Order" class="mas_services_billing_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->ResType->Visible) { // ResType ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $mas_services_billing->ResType->headerCellClass() ?>"><div id="elh_mas_services_billing_ResType" class="mas_services_billing_ResType"><div class="ew-table-header-caption"><?php echo $mas_services_billing->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $mas_services_billing->ResType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->ResType) ?>',1);"><div id="elh_mas_services_billing_ResType" class="mas_services_billing_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->ResType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->ResType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->ResType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->UnitCD->Visible) { // UnitCD ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->UnitCD) == "") { ?>
		<th data-name="UnitCD" class="<?php echo $mas_services_billing->UnitCD->headerCellClass() ?>"><div id="elh_mas_services_billing_UnitCD" class="mas_services_billing_UnitCD"><div class="ew-table-header-caption"><?php echo $mas_services_billing->UnitCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitCD" class="<?php echo $mas_services_billing->UnitCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->UnitCD) ?>',1);"><div id="elh_mas_services_billing_UnitCD" class="mas_services_billing_UnitCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->UnitCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->UnitCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->UnitCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->Sample->Visible) { // Sample ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $mas_services_billing->Sample->headerCellClass() ?>"><div id="elh_mas_services_billing_Sample" class="mas_services_billing_Sample"><div class="ew-table-header-caption"><?php echo $mas_services_billing->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $mas_services_billing->Sample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->Sample) ?>',1);"><div id="elh_mas_services_billing_Sample" class="mas_services_billing_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->Sample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->Sample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->Sample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->NoD->Visible) { // NoD ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $mas_services_billing->NoD->headerCellClass() ?>"><div id="elh_mas_services_billing_NoD" class="mas_services_billing_NoD"><div class="ew-table-header-caption"><?php echo $mas_services_billing->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $mas_services_billing->NoD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->NoD) ?>',1);"><div id="elh_mas_services_billing_NoD" class="mas_services_billing_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->NoD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->NoD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->BillOrder->Visible) { // BillOrder ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $mas_services_billing->BillOrder->headerCellClass() ?>"><div id="elh_mas_services_billing_BillOrder" class="mas_services_billing_BillOrder"><div class="ew-table-header-caption"><?php echo $mas_services_billing->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $mas_services_billing->BillOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->BillOrder) ?>',1);"><div id="elh_mas_services_billing_BillOrder" class="mas_services_billing_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->BillOrder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->BillOrder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->Inactive->Visible) { // Inactive ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $mas_services_billing->Inactive->headerCellClass() ?>"><div id="elh_mas_services_billing_Inactive" class="mas_services_billing_Inactive"><div class="ew-table-header-caption"><?php echo $mas_services_billing->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $mas_services_billing->Inactive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->Inactive) ?>',1);"><div id="elh_mas_services_billing_Inactive" class="mas_services_billing_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->Inactive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->Inactive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->Inactive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->Outsource->Visible) { // Outsource ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->Outsource) == "") { ?>
		<th data-name="Outsource" class="<?php echo $mas_services_billing->Outsource->headerCellClass() ?>"><div id="elh_mas_services_billing_Outsource" class="mas_services_billing_Outsource"><div class="ew-table-header-caption"><?php echo $mas_services_billing->Outsource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Outsource" class="<?php echo $mas_services_billing->Outsource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->Outsource) ?>',1);"><div id="elh_mas_services_billing_Outsource" class="mas_services_billing_Outsource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->Outsource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->Outsource->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->Outsource->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->CollSample->Visible) { // CollSample ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $mas_services_billing->CollSample->headerCellClass() ?>"><div id="elh_mas_services_billing_CollSample" class="mas_services_billing_CollSample"><div class="ew-table-header-caption"><?php echo $mas_services_billing->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $mas_services_billing->CollSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->CollSample) ?>',1);"><div id="elh_mas_services_billing_CollSample" class="mas_services_billing_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->CollSample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->CollSample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->CollSample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->TestType->Visible) { // TestType ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $mas_services_billing->TestType->headerCellClass() ?>"><div id="elh_mas_services_billing_TestType" class="mas_services_billing_TestType"><div class="ew-table-header-caption"><?php echo $mas_services_billing->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $mas_services_billing->TestType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->TestType) ?>',1);"><div id="elh_mas_services_billing_TestType" class="mas_services_billing_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->TestType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->TestType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->TestType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->NoHeading->Visible) { // NoHeading ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->NoHeading) == "") { ?>
		<th data-name="NoHeading" class="<?php echo $mas_services_billing->NoHeading->headerCellClass() ?>"><div id="elh_mas_services_billing_NoHeading" class="mas_services_billing_NoHeading"><div class="ew-table-header-caption"><?php echo $mas_services_billing->NoHeading->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoHeading" class="<?php echo $mas_services_billing->NoHeading->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->NoHeading) ?>',1);"><div id="elh_mas_services_billing_NoHeading" class="mas_services_billing_NoHeading">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->NoHeading->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->NoHeading->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->NoHeading->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->ChemicalCode->Visible) { // ChemicalCode ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->ChemicalCode) == "") { ?>
		<th data-name="ChemicalCode" class="<?php echo $mas_services_billing->ChemicalCode->headerCellClass() ?>"><div id="elh_mas_services_billing_ChemicalCode" class="mas_services_billing_ChemicalCode"><div class="ew-table-header-caption"><?php echo $mas_services_billing->ChemicalCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChemicalCode" class="<?php echo $mas_services_billing->ChemicalCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->ChemicalCode) ?>',1);"><div id="elh_mas_services_billing_ChemicalCode" class="mas_services_billing_ChemicalCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->ChemicalCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->ChemicalCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->ChemicalCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->ChemicalName->Visible) { // ChemicalName ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->ChemicalName) == "") { ?>
		<th data-name="ChemicalName" class="<?php echo $mas_services_billing->ChemicalName->headerCellClass() ?>"><div id="elh_mas_services_billing_ChemicalName" class="mas_services_billing_ChemicalName"><div class="ew-table-header-caption"><?php echo $mas_services_billing->ChemicalName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChemicalName" class="<?php echo $mas_services_billing->ChemicalName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->ChemicalName) ?>',1);"><div id="elh_mas_services_billing_ChemicalName" class="mas_services_billing_ChemicalName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->ChemicalName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->ChemicalName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->ChemicalName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing->Utilaization->Visible) { // Utilaization ?>
	<?php if ($mas_services_billing->sortUrl($mas_services_billing->Utilaization) == "") { ?>
		<th data-name="Utilaization" class="<?php echo $mas_services_billing->Utilaization->headerCellClass() ?>"><div id="elh_mas_services_billing_Utilaization" class="mas_services_billing_Utilaization"><div class="ew-table-header-caption"><?php echo $mas_services_billing->Utilaization->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Utilaization" class="<?php echo $mas_services_billing->Utilaization->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services_billing->SortUrl($mas_services_billing->Utilaization) ?>',1);"><div id="elh_mas_services_billing_Utilaization" class="mas_services_billing_Utilaization">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing->Utilaization->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing->Utilaization->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services_billing->Utilaization->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_services_billing_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($mas_services_billing->isAdd() || $mas_services_billing->isCopy()) {
		$mas_services_billing_list->RowIndex = 0;
		$mas_services_billing_list->KeyCount = $mas_services_billing_list->RowIndex;
		if ($mas_services_billing->isCopy() && !$mas_services_billing_list->loadRow())
			$mas_services_billing->CurrentAction = "add";
		if ($mas_services_billing->isAdd())
			$mas_services_billing_list->loadRowValues();
		if ($mas_services_billing->EventCancelled) // Insert failed
			$mas_services_billing_list->restoreFormValues(); // Restore form values

		// Set row properties
		$mas_services_billing->resetAttributes();
		$mas_services_billing->RowAttrs = array_merge($mas_services_billing->RowAttrs, array('data-rowindex'=>0, 'id'=>'r0_mas_services_billing', 'data-rowtype'=>ROWTYPE_ADD));
		$mas_services_billing->RowType = ROWTYPE_ADD;

		// Render row
		$mas_services_billing_list->renderRow();

		// Render list options
		$mas_services_billing_list->renderListOptions();
		$mas_services_billing_list->StartRowCnt = 0;
?>
	<tr<?php echo $mas_services_billing->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_services_billing_list->ListOptions->render("body", "left", $mas_services_billing_list->RowCnt);
?>
	<?php if ($mas_services_billing->Id->Visible) { // Id ?>
		<td data-name="Id">
<input type="hidden" data-table="mas_services_billing" data-field="x_Id" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Id" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($mas_services_billing->Id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->CODE->Visible) { // CODE ?>
		<td data-name="CODE">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_CODE" class="form-group mas_services_billing_CODE">
<input type="text" data-table="mas_services_billing" data-field="x_CODE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_CODE" id="x<?php echo $mas_services_billing_list->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing->CODE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->CODE->EditValue ?>"<?php echo $mas_services_billing->CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CODE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_CODE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_CODE" value="<?php echo HtmlEncode($mas_services_billing->CODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_SERVICE" class="form-group mas_services_billing_SERVICE">
<input type="text" data-table="mas_services_billing" data-field="x_SERVICE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" id="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing->SERVICE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->SERVICE->EditValue ?>"<?php echo $mas_services_billing->SERVICE->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($mas_services_billing->SERVICE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_UNITS" class="form-group mas_services_billing_UNITS">
<input type="text" data-table="mas_services_billing" data-field="x_UNITS" name="x<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" id="x<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->UNITS->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->UNITS->EditValue ?>"<?php echo $mas_services_billing->UNITS->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UNITS" name="o<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" id="o<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($mas_services_billing->UNITS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->AMOUNT->Visible) { // AMOUNT ?>
		<td data-name="AMOUNT">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_AMOUNT" class="form-group mas_services_billing_AMOUNT">
<input type="text" data-table="mas_services_billing" data-field="x_AMOUNT" name="x<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" id="x<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->AMOUNT->EditValue ?>"<?php echo $mas_services_billing->AMOUNT->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_AMOUNT" name="o<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" id="o<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" value="<?php echo HtmlEncode($mas_services_billing->AMOUNT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_SERVICE_TYPE" class="form-group mas_services_billing_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $mas_services_billing->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE"<?php echo $mas_services_billing->SERVICE_TYPE->editAttributes() ?>>
		<?php echo $mas_services_billing->SERVICE_TYPE->selectOptionListHtml("x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$mas_services_billing->SERVICE_TYPE->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing->SERVICE_TYPE->caption() ?>" data-title="<?php echo $mas_services_billing->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE',url:'mas_services_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $mas_services_billing->SERVICE_TYPE->Lookup->getParamTag("p_x" . $mas_services_billing_list->RowIndex . "_SERVICE_TYPE") ?>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($mas_services_billing->SERVICE_TYPE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_DEPARTMENT" class="form-group mas_services_billing_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_DEPARTMENT" data-value-separator="<?php echo $mas_services_billing->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT"<?php echo $mas_services_billing->DEPARTMENT->editAttributes() ?>>
		<?php echo $mas_services_billing->DEPARTMENT->selectOptionListHtml("x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$mas_services_billing->DEPARTMENT->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing->DEPARTMENT->caption() ?>" data-title="<?php echo $mas_services_billing->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT',url:'mas_billing_departmentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $mas_services_billing->DEPARTMENT->Lookup->getParamTag("p_x" . $mas_services_billing_list->RowIndex . "_DEPARTMENT") ?>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DEPARTMENT" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($mas_services_billing->DEPARTMENT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td data-name="mas_services_billingcol">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_mas_services_billingcol" class="form-group mas_services_billing_mas_services_billingcol">
<input type="text" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="x<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" id="x<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->mas_services_billingcol->EditValue ?>"<?php echo $mas_services_billing->mas_services_billingcol->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="o<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" id="o<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" value="<?php echo HtmlEncode($mas_services_billing->mas_services_billingcol->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_DrShareAmount" class="form-group mas_services_billing_DrShareAmount">
<input type="text" data-table="mas_services_billing" data-field="x_DrShareAmount" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->DrShareAmount->EditValue ?>"<?php echo $mas_services_billing->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrShareAmount" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($mas_services_billing->DrShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_HospShareAmount" class="form-group mas_services_billing_HospShareAmount">
<input type="text" data-table="mas_services_billing" data-field="x_HospShareAmount" name="x<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" id="x<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->HospShareAmount->EditValue ?>"<?php echo $mas_services_billing->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospShareAmount" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($mas_services_billing->HospShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->DrSharePer->Visible) { // DrSharePer ?>
		<td data-name="DrSharePer">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_DrSharePer" class="form-group mas_services_billing_DrSharePer">
<input type="text" data-table="mas_services_billing" data-field="x_DrSharePer" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->DrSharePer->EditValue ?>"<?php echo $mas_services_billing->DrSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrSharePer" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" value="<?php echo HtmlEncode($mas_services_billing->DrSharePer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->HospSharePer->Visible) { // HospSharePer ?>
		<td data-name="HospSharePer">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_HospSharePer" class="form-group mas_services_billing_HospSharePer">
<input type="text" data-table="mas_services_billing" data-field="x_HospSharePer" name="x<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" id="x<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->HospSharePer->EditValue ?>"<?php echo $mas_services_billing->HospSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospSharePer" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" value="<?php echo HtmlEncode($mas_services_billing->HospSharePer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="mas_services_billing" data-field="x_HospID" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospID" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($mas_services_billing->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_TestSubCd" class="form-group mas_services_billing_TestSubCd">
<input type="text" data-table="mas_services_billing" data-field="x_TestSubCd" name="x<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" id="x<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->TestSubCd->EditValue ?>"<?php echo $mas_services_billing->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestSubCd" name="o<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" id="o<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($mas_services_billing->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Method->Visible) { // Method ?>
		<td data-name="Method">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Method" class="form-group mas_services_billing_Method">
<input type="text" data-table="mas_services_billing" data-field="x_Method" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Method" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Method->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Method->EditValue ?>"<?php echo $mas_services_billing->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Method" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Method" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($mas_services_billing->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Order->Visible) { // Order ?>
		<td data-name="Order">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Order" class="form-group mas_services_billing_Order">
<input type="text" data-table="mas_services_billing" data-field="x_Order" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Order" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->Order->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Order->EditValue ?>"<?php echo $mas_services_billing->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Order" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Order" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($mas_services_billing->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->ResType->Visible) { // ResType ?>
		<td data-name="ResType">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_ResType" class="form-group mas_services_billing_ResType">
<input type="text" data-table="mas_services_billing" data-field="x_ResType" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ResType" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->ResType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->ResType->EditValue ?>"<?php echo $mas_services_billing->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ResType" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ResType" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($mas_services_billing->ResType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_UnitCD" class="form-group mas_services_billing_UnitCD">
<input type="text" data-table="mas_services_billing" data-field="x_UnitCD" name="x<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" id="x<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->UnitCD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->UnitCD->EditValue ?>"<?php echo $mas_services_billing->UnitCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UnitCD" name="o<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" id="o<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($mas_services_billing->UnitCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Sample->Visible) { // Sample ?>
		<td data-name="Sample">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Sample" class="form-group mas_services_billing_Sample">
<input type="text" data-table="mas_services_billing" data-field="x_Sample" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Sample" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($mas_services_billing->Sample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Sample->EditValue ?>"<?php echo $mas_services_billing->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Sample" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Sample" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($mas_services_billing->Sample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->NoD->Visible) { // NoD ?>
		<td data-name="NoD">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_NoD" class="form-group mas_services_billing_NoD">
<input type="text" data-table="mas_services_billing" data-field="x_NoD" name="x<?php echo $mas_services_billing_list->RowIndex ?>_NoD" id="x<?php echo $mas_services_billing_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->NoD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->NoD->EditValue ?>"<?php echo $mas_services_billing->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoD" name="o<?php echo $mas_services_billing_list->RowIndex ?>_NoD" id="o<?php echo $mas_services_billing_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($mas_services_billing->NoD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_BillOrder" class="form-group mas_services_billing_BillOrder">
<input type="text" data-table="mas_services_billing" data-field="x_BillOrder" name="x<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" id="x<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->BillOrder->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->BillOrder->EditValue ?>"<?php echo $mas_services_billing->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_BillOrder" name="o<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" id="o<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($mas_services_billing->BillOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Inactive" class="form-group mas_services_billing_Inactive">
<input type="text" data-table="mas_services_billing" data-field="x_Inactive" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Inactive->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Inactive->EditValue ?>"<?php echo $mas_services_billing->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Inactive" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($mas_services_billing->Inactive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Outsource" class="form-group mas_services_billing_Outsource">
<input type="text" data-table="mas_services_billing" data-field="x_Outsource" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Outsource->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Outsource->EditValue ?>"<?php echo $mas_services_billing->Outsource->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Outsource" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($mas_services_billing->Outsource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_CollSample" class="form-group mas_services_billing_CollSample">
<input type="text" data-table="mas_services_billing" data-field="x_CollSample" name="x<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" id="x<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->CollSample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->CollSample->EditValue ?>"<?php echo $mas_services_billing->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CollSample" name="o<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" id="o<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($mas_services_billing->CollSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_TestType" class="form-group mas_services_billing_TestType">
<input type="text" data-table="mas_services_billing" data-field="x_TestType" name="x<?php echo $mas_services_billing_list->RowIndex ?>_TestType" id="x<?php echo $mas_services_billing_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->TestType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->TestType->EditValue ?>"<?php echo $mas_services_billing->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestType" name="o<?php echo $mas_services_billing_list->RowIndex ?>_TestType" id="o<?php echo $mas_services_billing_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($mas_services_billing->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->NoHeading->Visible) { // NoHeading ?>
		<td data-name="NoHeading">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_NoHeading" class="form-group mas_services_billing_NoHeading">
<input type="text" data-table="mas_services_billing" data-field="x_NoHeading" name="x<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" id="x<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->NoHeading->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->NoHeading->EditValue ?>"<?php echo $mas_services_billing->NoHeading->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoHeading" name="o<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" id="o<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" value="<?php echo HtmlEncode($mas_services_billing->NoHeading->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->ChemicalCode->Visible) { // ChemicalCode ?>
		<td data-name="ChemicalCode">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_ChemicalCode" class="form-group mas_services_billing_ChemicalCode">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalCode" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->ChemicalCode->EditValue ?>"<?php echo $mas_services_billing->ChemicalCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalCode" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" value="<?php echo HtmlEncode($mas_services_billing->ChemicalCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->ChemicalName->Visible) { // ChemicalName ?>
		<td data-name="ChemicalName">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_ChemicalName" class="form-group mas_services_billing_ChemicalName">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalName" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->ChemicalName->EditValue ?>"<?php echo $mas_services_billing->ChemicalName->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalName" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" value="<?php echo HtmlEncode($mas_services_billing->ChemicalName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Utilaization->Visible) { // Utilaization ?>
		<td data-name="Utilaization">
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Utilaization" class="form-group mas_services_billing_Utilaization">
<input type="text" data-table="mas_services_billing" data-field="x_Utilaization" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Utilaization->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Utilaization->EditValue ?>"<?php echo $mas_services_billing->Utilaization->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Utilaization" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" value="<?php echo HtmlEncode($mas_services_billing->Utilaization->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_services_billing_list->ListOptions->render("body", "right", $mas_services_billing_list->RowCnt);
?>
<script>
fmas_services_billinglist.updateLists(<?php echo $mas_services_billing_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
<?php
if ($mas_services_billing->ExportAll && $mas_services_billing->isExport()) {
	$mas_services_billing_list->StopRec = $mas_services_billing_list->TotalRecs;
} else {

	// Set the last record to display
	if ($mas_services_billing_list->TotalRecs > $mas_services_billing_list->StartRec + $mas_services_billing_list->DisplayRecs - 1)
		$mas_services_billing_list->StopRec = $mas_services_billing_list->StartRec + $mas_services_billing_list->DisplayRecs - 1;
	else
		$mas_services_billing_list->StopRec = $mas_services_billing_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $mas_services_billing_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($mas_services_billing_list->FormKeyCountName) && ($mas_services_billing->isGridAdd() || $mas_services_billing->isGridEdit() || $mas_services_billing->isConfirm())) {
		$mas_services_billing_list->KeyCount = $CurrentForm->getValue($mas_services_billing_list->FormKeyCountName);
		$mas_services_billing_list->StopRec = $mas_services_billing_list->StartRec + $mas_services_billing_list->KeyCount - 1;
	}
}
$mas_services_billing_list->RecCnt = $mas_services_billing_list->StartRec - 1;
if ($mas_services_billing_list->Recordset && !$mas_services_billing_list->Recordset->EOF) {
	$mas_services_billing_list->Recordset->moveFirst();
	$selectLimit = $mas_services_billing_list->UseSelectLimit;
	if (!$selectLimit && $mas_services_billing_list->StartRec > 1)
		$mas_services_billing_list->Recordset->move($mas_services_billing_list->StartRec - 1);
} elseif (!$mas_services_billing->AllowAddDeleteRow && $mas_services_billing_list->StopRec == 0) {
	$mas_services_billing_list->StopRec = $mas_services_billing->GridAddRowCount;
}

// Initialize aggregate
$mas_services_billing->RowType = ROWTYPE_AGGREGATEINIT;
$mas_services_billing->resetAttributes();
$mas_services_billing_list->renderRow();
$mas_services_billing_list->EditRowCnt = 0;
if ($mas_services_billing->isEdit())
	$mas_services_billing_list->RowIndex = 1;
if ($mas_services_billing->isGridAdd())
	$mas_services_billing_list->RowIndex = 0;
if ($mas_services_billing->isGridEdit())
	$mas_services_billing_list->RowIndex = 0;
while ($mas_services_billing_list->RecCnt < $mas_services_billing_list->StopRec) {
	$mas_services_billing_list->RecCnt++;
	if ($mas_services_billing_list->RecCnt >= $mas_services_billing_list->StartRec) {
		$mas_services_billing_list->RowCnt++;
		if ($mas_services_billing->isGridAdd() || $mas_services_billing->isGridEdit() || $mas_services_billing->isConfirm()) {
			$mas_services_billing_list->RowIndex++;
			$CurrentForm->Index = $mas_services_billing_list->RowIndex;
			if ($CurrentForm->hasValue($mas_services_billing_list->FormActionName) && $mas_services_billing_list->EventCancelled)
				$mas_services_billing_list->RowAction = strval($CurrentForm->getValue($mas_services_billing_list->FormActionName));
			elseif ($mas_services_billing->isGridAdd())
				$mas_services_billing_list->RowAction = "insert";
			else
				$mas_services_billing_list->RowAction = "";
		}

		// Set up key count
		$mas_services_billing_list->KeyCount = $mas_services_billing_list->RowIndex;

		// Init row class and style
		$mas_services_billing->resetAttributes();
		$mas_services_billing->CssClass = "";
		if ($mas_services_billing->isGridAdd()) {
			$mas_services_billing_list->loadRowValues(); // Load default values
		} else {
			$mas_services_billing_list->loadRowValues($mas_services_billing_list->Recordset); // Load row values
		}
		$mas_services_billing->RowType = ROWTYPE_VIEW; // Render view
		if ($mas_services_billing->isGridAdd()) // Grid add
			$mas_services_billing->RowType = ROWTYPE_ADD; // Render add
		if ($mas_services_billing->isGridAdd() && $mas_services_billing->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$mas_services_billing_list->restoreCurrentRowFormValues($mas_services_billing_list->RowIndex); // Restore form values
		if ($mas_services_billing->isEdit()) {
			if ($mas_services_billing_list->checkInlineEditKey() && $mas_services_billing_list->EditRowCnt == 0) { // Inline edit
				$mas_services_billing->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($mas_services_billing->isGridEdit()) { // Grid edit
			if ($mas_services_billing->EventCancelled)
				$mas_services_billing_list->restoreCurrentRowFormValues($mas_services_billing_list->RowIndex); // Restore form values
			if ($mas_services_billing_list->RowAction == "insert")
				$mas_services_billing->RowType = ROWTYPE_ADD; // Render add
			else
				$mas_services_billing->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($mas_services_billing->isEdit() && $mas_services_billing->RowType == ROWTYPE_EDIT && $mas_services_billing->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$mas_services_billing_list->restoreFormValues(); // Restore form values
		}
		if ($mas_services_billing->isGridEdit() && ($mas_services_billing->RowType == ROWTYPE_EDIT || $mas_services_billing->RowType == ROWTYPE_ADD) && $mas_services_billing->EventCancelled) // Update failed
			$mas_services_billing_list->restoreCurrentRowFormValues($mas_services_billing_list->RowIndex); // Restore form values
		if ($mas_services_billing->RowType == ROWTYPE_EDIT) // Edit row
			$mas_services_billing_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$mas_services_billing->RowAttrs = array_merge($mas_services_billing->RowAttrs, array('data-rowindex'=>$mas_services_billing_list->RowCnt, 'id'=>'r' . $mas_services_billing_list->RowCnt . '_mas_services_billing', 'data-rowtype'=>$mas_services_billing->RowType));

		// Render row
		$mas_services_billing_list->renderRow();

		// Render list options
		$mas_services_billing_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($mas_services_billing_list->RowAction <> "delete" && $mas_services_billing_list->RowAction <> "insertdelete" && !($mas_services_billing_list->RowAction == "insert" && $mas_services_billing->isConfirm() && $mas_services_billing_list->emptyRow())) {
?>
	<tr<?php echo $mas_services_billing->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_services_billing_list->ListOptions->render("body", "left", $mas_services_billing_list->RowCnt);
?>
	<?php if ($mas_services_billing->Id->Visible) { // Id ?>
		<td data-name="Id"<?php echo $mas_services_billing->Id->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="mas_services_billing" data-field="x_Id" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Id" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($mas_services_billing->Id->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Id" class="form-group mas_services_billing_Id">
<span<?php echo $mas_services_billing->Id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($mas_services_billing->Id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Id" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Id" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($mas_services_billing->Id->CurrentValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Id" class="mas_services_billing_Id">
<span<?php echo $mas_services_billing->Id->viewAttributes() ?>>
<?php echo $mas_services_billing->Id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->CODE->Visible) { // CODE ?>
		<td data-name="CODE"<?php echo $mas_services_billing->CODE->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_CODE" class="form-group mas_services_billing_CODE">
<input type="text" data-table="mas_services_billing" data-field="x_CODE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_CODE" id="x<?php echo $mas_services_billing_list->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing->CODE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->CODE->EditValue ?>"<?php echo $mas_services_billing->CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CODE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_CODE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_CODE" value="<?php echo HtmlEncode($mas_services_billing->CODE->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_CODE" class="form-group mas_services_billing_CODE">
<input type="text" data-table="mas_services_billing" data-field="x_CODE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_CODE" id="x<?php echo $mas_services_billing_list->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing->CODE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->CODE->EditValue ?>"<?php echo $mas_services_billing->CODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_CODE" class="mas_services_billing_CODE">
<span<?php echo $mas_services_billing->CODE->viewAttributes() ?>>
<?php echo $mas_services_billing->CODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE"<?php echo $mas_services_billing->SERVICE->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_SERVICE" class="form-group mas_services_billing_SERVICE">
<input type="text" data-table="mas_services_billing" data-field="x_SERVICE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" id="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing->SERVICE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->SERVICE->EditValue ?>"<?php echo $mas_services_billing->SERVICE->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($mas_services_billing->SERVICE->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_SERVICE" class="form-group mas_services_billing_SERVICE">
<input type="text" data-table="mas_services_billing" data-field="x_SERVICE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" id="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing->SERVICE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->SERVICE->EditValue ?>"<?php echo $mas_services_billing->SERVICE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_SERVICE" class="mas_services_billing_SERVICE">
<span<?php echo $mas_services_billing->SERVICE->viewAttributes() ?>>
<?php echo $mas_services_billing->SERVICE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS"<?php echo $mas_services_billing->UNITS->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_UNITS" class="form-group mas_services_billing_UNITS">
<input type="text" data-table="mas_services_billing" data-field="x_UNITS" name="x<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" id="x<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->UNITS->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->UNITS->EditValue ?>"<?php echo $mas_services_billing->UNITS->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UNITS" name="o<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" id="o<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($mas_services_billing->UNITS->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_UNITS" class="form-group mas_services_billing_UNITS">
<input type="text" data-table="mas_services_billing" data-field="x_UNITS" name="x<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" id="x<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->UNITS->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->UNITS->EditValue ?>"<?php echo $mas_services_billing->UNITS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_UNITS" class="mas_services_billing_UNITS">
<span<?php echo $mas_services_billing->UNITS->viewAttributes() ?>>
<?php echo $mas_services_billing->UNITS->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->AMOUNT->Visible) { // AMOUNT ?>
		<td data-name="AMOUNT"<?php echo $mas_services_billing->AMOUNT->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_AMOUNT" class="form-group mas_services_billing_AMOUNT">
<input type="text" data-table="mas_services_billing" data-field="x_AMOUNT" name="x<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" id="x<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->AMOUNT->EditValue ?>"<?php echo $mas_services_billing->AMOUNT->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_AMOUNT" name="o<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" id="o<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" value="<?php echo HtmlEncode($mas_services_billing->AMOUNT->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_AMOUNT" class="form-group mas_services_billing_AMOUNT">
<input type="text" data-table="mas_services_billing" data-field="x_AMOUNT" name="x<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" id="x<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->AMOUNT->EditValue ?>"<?php echo $mas_services_billing->AMOUNT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_AMOUNT" class="mas_services_billing_AMOUNT">
<span<?php echo $mas_services_billing->AMOUNT->viewAttributes() ?>>
<?php echo $mas_services_billing->AMOUNT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE"<?php echo $mas_services_billing->SERVICE_TYPE->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_SERVICE_TYPE" class="form-group mas_services_billing_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $mas_services_billing->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE"<?php echo $mas_services_billing->SERVICE_TYPE->editAttributes() ?>>
		<?php echo $mas_services_billing->SERVICE_TYPE->selectOptionListHtml("x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$mas_services_billing->SERVICE_TYPE->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing->SERVICE_TYPE->caption() ?>" data-title="<?php echo $mas_services_billing->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE',url:'mas_services_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $mas_services_billing->SERVICE_TYPE->Lookup->getParamTag("p_x" . $mas_services_billing_list->RowIndex . "_SERVICE_TYPE") ?>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($mas_services_billing->SERVICE_TYPE->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_SERVICE_TYPE" class="form-group mas_services_billing_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $mas_services_billing->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE"<?php echo $mas_services_billing->SERVICE_TYPE->editAttributes() ?>>
		<?php echo $mas_services_billing->SERVICE_TYPE->selectOptionListHtml("x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$mas_services_billing->SERVICE_TYPE->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing->SERVICE_TYPE->caption() ?>" data-title="<?php echo $mas_services_billing->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE',url:'mas_services_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $mas_services_billing->SERVICE_TYPE->Lookup->getParamTag("p_x" . $mas_services_billing_list->RowIndex . "_SERVICE_TYPE") ?>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_SERVICE_TYPE" class="mas_services_billing_SERVICE_TYPE">
<span<?php echo $mas_services_billing->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $mas_services_billing->SERVICE_TYPE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT"<?php echo $mas_services_billing->DEPARTMENT->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_DEPARTMENT" class="form-group mas_services_billing_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_DEPARTMENT" data-value-separator="<?php echo $mas_services_billing->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT"<?php echo $mas_services_billing->DEPARTMENT->editAttributes() ?>>
		<?php echo $mas_services_billing->DEPARTMENT->selectOptionListHtml("x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$mas_services_billing->DEPARTMENT->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing->DEPARTMENT->caption() ?>" data-title="<?php echo $mas_services_billing->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT',url:'mas_billing_departmentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $mas_services_billing->DEPARTMENT->Lookup->getParamTag("p_x" . $mas_services_billing_list->RowIndex . "_DEPARTMENT") ?>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DEPARTMENT" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($mas_services_billing->DEPARTMENT->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_DEPARTMENT" class="form-group mas_services_billing_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_DEPARTMENT" data-value-separator="<?php echo $mas_services_billing->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT"<?php echo $mas_services_billing->DEPARTMENT->editAttributes() ?>>
		<?php echo $mas_services_billing->DEPARTMENT->selectOptionListHtml("x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$mas_services_billing->DEPARTMENT->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing->DEPARTMENT->caption() ?>" data-title="<?php echo $mas_services_billing->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT',url:'mas_billing_departmentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $mas_services_billing->DEPARTMENT->Lookup->getParamTag("p_x" . $mas_services_billing_list->RowIndex . "_DEPARTMENT") ?>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_DEPARTMENT" class="mas_services_billing_DEPARTMENT">
<span<?php echo $mas_services_billing->DEPARTMENT->viewAttributes() ?>>
<?php echo $mas_services_billing->DEPARTMENT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td data-name="mas_services_billingcol"<?php echo $mas_services_billing->mas_services_billingcol->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_mas_services_billingcol" class="form-group mas_services_billing_mas_services_billingcol">
<input type="text" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="x<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" id="x<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->mas_services_billingcol->EditValue ?>"<?php echo $mas_services_billing->mas_services_billingcol->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="o<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" id="o<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" value="<?php echo HtmlEncode($mas_services_billing->mas_services_billingcol->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_mas_services_billingcol" class="form-group mas_services_billing_mas_services_billingcol">
<input type="text" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="x<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" id="x<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->mas_services_billingcol->EditValue ?>"<?php echo $mas_services_billing->mas_services_billingcol->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_mas_services_billingcol" class="mas_services_billing_mas_services_billingcol">
<span<?php echo $mas_services_billing->mas_services_billingcol->viewAttributes() ?>>
<?php echo $mas_services_billing->mas_services_billingcol->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount"<?php echo $mas_services_billing->DrShareAmount->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_DrShareAmount" class="form-group mas_services_billing_DrShareAmount">
<input type="text" data-table="mas_services_billing" data-field="x_DrShareAmount" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->DrShareAmount->EditValue ?>"<?php echo $mas_services_billing->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrShareAmount" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($mas_services_billing->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_DrShareAmount" class="form-group mas_services_billing_DrShareAmount">
<input type="text" data-table="mas_services_billing" data-field="x_DrShareAmount" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->DrShareAmount->EditValue ?>"<?php echo $mas_services_billing->DrShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_DrShareAmount" class="mas_services_billing_DrShareAmount">
<span<?php echo $mas_services_billing->DrShareAmount->viewAttributes() ?>>
<?php echo $mas_services_billing->DrShareAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount"<?php echo $mas_services_billing->HospShareAmount->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_HospShareAmount" class="form-group mas_services_billing_HospShareAmount">
<input type="text" data-table="mas_services_billing" data-field="x_HospShareAmount" name="x<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" id="x<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->HospShareAmount->EditValue ?>"<?php echo $mas_services_billing->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospShareAmount" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($mas_services_billing->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_HospShareAmount" class="form-group mas_services_billing_HospShareAmount">
<input type="text" data-table="mas_services_billing" data-field="x_HospShareAmount" name="x<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" id="x<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->HospShareAmount->EditValue ?>"<?php echo $mas_services_billing->HospShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_HospShareAmount" class="mas_services_billing_HospShareAmount">
<span<?php echo $mas_services_billing->HospShareAmount->viewAttributes() ?>>
<?php echo $mas_services_billing->HospShareAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->DrSharePer->Visible) { // DrSharePer ?>
		<td data-name="DrSharePer"<?php echo $mas_services_billing->DrSharePer->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_DrSharePer" class="form-group mas_services_billing_DrSharePer">
<input type="text" data-table="mas_services_billing" data-field="x_DrSharePer" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->DrSharePer->EditValue ?>"<?php echo $mas_services_billing->DrSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrSharePer" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" value="<?php echo HtmlEncode($mas_services_billing->DrSharePer->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_DrSharePer" class="form-group mas_services_billing_DrSharePer">
<input type="text" data-table="mas_services_billing" data-field="x_DrSharePer" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->DrSharePer->EditValue ?>"<?php echo $mas_services_billing->DrSharePer->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_DrSharePer" class="mas_services_billing_DrSharePer">
<span<?php echo $mas_services_billing->DrSharePer->viewAttributes() ?>>
<?php echo $mas_services_billing->DrSharePer->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->HospSharePer->Visible) { // HospSharePer ?>
		<td data-name="HospSharePer"<?php echo $mas_services_billing->HospSharePer->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_HospSharePer" class="form-group mas_services_billing_HospSharePer">
<input type="text" data-table="mas_services_billing" data-field="x_HospSharePer" name="x<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" id="x<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->HospSharePer->EditValue ?>"<?php echo $mas_services_billing->HospSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospSharePer" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" value="<?php echo HtmlEncode($mas_services_billing->HospSharePer->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_HospSharePer" class="form-group mas_services_billing_HospSharePer">
<input type="text" data-table="mas_services_billing" data-field="x_HospSharePer" name="x<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" id="x<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->HospSharePer->EditValue ?>"<?php echo $mas_services_billing->HospSharePer->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_HospSharePer" class="mas_services_billing_HospSharePer">
<span<?php echo $mas_services_billing->HospSharePer->viewAttributes() ?>>
<?php echo $mas_services_billing->HospSharePer->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $mas_services_billing->HospID->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospID" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospID" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($mas_services_billing->HospID->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_HospID" class="mas_services_billing_HospID">
<span<?php echo $mas_services_billing->HospID->viewAttributes() ?>>
<?php echo $mas_services_billing->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd"<?php echo $mas_services_billing->TestSubCd->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_TestSubCd" class="form-group mas_services_billing_TestSubCd">
<input type="text" data-table="mas_services_billing" data-field="x_TestSubCd" name="x<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" id="x<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->TestSubCd->EditValue ?>"<?php echo $mas_services_billing->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestSubCd" name="o<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" id="o<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($mas_services_billing->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_TestSubCd" class="form-group mas_services_billing_TestSubCd">
<input type="text" data-table="mas_services_billing" data-field="x_TestSubCd" name="x<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" id="x<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->TestSubCd->EditValue ?>"<?php echo $mas_services_billing->TestSubCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_TestSubCd" class="mas_services_billing_TestSubCd">
<span<?php echo $mas_services_billing->TestSubCd->viewAttributes() ?>>
<?php echo $mas_services_billing->TestSubCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Method->Visible) { // Method ?>
		<td data-name="Method"<?php echo $mas_services_billing->Method->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Method" class="form-group mas_services_billing_Method">
<input type="text" data-table="mas_services_billing" data-field="x_Method" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Method" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Method->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Method->EditValue ?>"<?php echo $mas_services_billing->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Method" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Method" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($mas_services_billing->Method->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Method" class="form-group mas_services_billing_Method">
<input type="text" data-table="mas_services_billing" data-field="x_Method" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Method" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Method->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Method->EditValue ?>"<?php echo $mas_services_billing->Method->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Method" class="mas_services_billing_Method">
<span<?php echo $mas_services_billing->Method->viewAttributes() ?>>
<?php echo $mas_services_billing->Method->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $mas_services_billing->Order->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Order" class="form-group mas_services_billing_Order">
<input type="text" data-table="mas_services_billing" data-field="x_Order" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Order" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->Order->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Order->EditValue ?>"<?php echo $mas_services_billing->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Order" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Order" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($mas_services_billing->Order->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Order" class="form-group mas_services_billing_Order">
<input type="text" data-table="mas_services_billing" data-field="x_Order" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Order" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->Order->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Order->EditValue ?>"<?php echo $mas_services_billing->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Order" class="mas_services_billing_Order">
<span<?php echo $mas_services_billing->Order->viewAttributes() ?>>
<?php echo $mas_services_billing->Order->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->ResType->Visible) { // ResType ?>
		<td data-name="ResType"<?php echo $mas_services_billing->ResType->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_ResType" class="form-group mas_services_billing_ResType">
<input type="text" data-table="mas_services_billing" data-field="x_ResType" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ResType" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->ResType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->ResType->EditValue ?>"<?php echo $mas_services_billing->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ResType" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ResType" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($mas_services_billing->ResType->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_ResType" class="form-group mas_services_billing_ResType">
<input type="text" data-table="mas_services_billing" data-field="x_ResType" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ResType" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->ResType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->ResType->EditValue ?>"<?php echo $mas_services_billing->ResType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_ResType" class="mas_services_billing_ResType">
<span<?php echo $mas_services_billing->ResType->viewAttributes() ?>>
<?php echo $mas_services_billing->ResType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD"<?php echo $mas_services_billing->UnitCD->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_UnitCD" class="form-group mas_services_billing_UnitCD">
<input type="text" data-table="mas_services_billing" data-field="x_UnitCD" name="x<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" id="x<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->UnitCD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->UnitCD->EditValue ?>"<?php echo $mas_services_billing->UnitCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UnitCD" name="o<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" id="o<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($mas_services_billing->UnitCD->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_UnitCD" class="form-group mas_services_billing_UnitCD">
<input type="text" data-table="mas_services_billing" data-field="x_UnitCD" name="x<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" id="x<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->UnitCD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->UnitCD->EditValue ?>"<?php echo $mas_services_billing->UnitCD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_UnitCD" class="mas_services_billing_UnitCD">
<span<?php echo $mas_services_billing->UnitCD->viewAttributes() ?>>
<?php echo $mas_services_billing->UnitCD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Sample->Visible) { // Sample ?>
		<td data-name="Sample"<?php echo $mas_services_billing->Sample->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Sample" class="form-group mas_services_billing_Sample">
<input type="text" data-table="mas_services_billing" data-field="x_Sample" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Sample" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($mas_services_billing->Sample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Sample->EditValue ?>"<?php echo $mas_services_billing->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Sample" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Sample" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($mas_services_billing->Sample->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Sample" class="form-group mas_services_billing_Sample">
<input type="text" data-table="mas_services_billing" data-field="x_Sample" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Sample" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($mas_services_billing->Sample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Sample->EditValue ?>"<?php echo $mas_services_billing->Sample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Sample" class="mas_services_billing_Sample">
<span<?php echo $mas_services_billing->Sample->viewAttributes() ?>>
<?php echo $mas_services_billing->Sample->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->NoD->Visible) { // NoD ?>
		<td data-name="NoD"<?php echo $mas_services_billing->NoD->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_NoD" class="form-group mas_services_billing_NoD">
<input type="text" data-table="mas_services_billing" data-field="x_NoD" name="x<?php echo $mas_services_billing_list->RowIndex ?>_NoD" id="x<?php echo $mas_services_billing_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->NoD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->NoD->EditValue ?>"<?php echo $mas_services_billing->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoD" name="o<?php echo $mas_services_billing_list->RowIndex ?>_NoD" id="o<?php echo $mas_services_billing_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($mas_services_billing->NoD->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_NoD" class="form-group mas_services_billing_NoD">
<input type="text" data-table="mas_services_billing" data-field="x_NoD" name="x<?php echo $mas_services_billing_list->RowIndex ?>_NoD" id="x<?php echo $mas_services_billing_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->NoD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->NoD->EditValue ?>"<?php echo $mas_services_billing->NoD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_NoD" class="mas_services_billing_NoD">
<span<?php echo $mas_services_billing->NoD->viewAttributes() ?>>
<?php echo $mas_services_billing->NoD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder"<?php echo $mas_services_billing->BillOrder->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_BillOrder" class="form-group mas_services_billing_BillOrder">
<input type="text" data-table="mas_services_billing" data-field="x_BillOrder" name="x<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" id="x<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->BillOrder->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->BillOrder->EditValue ?>"<?php echo $mas_services_billing->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_BillOrder" name="o<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" id="o<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($mas_services_billing->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_BillOrder" class="form-group mas_services_billing_BillOrder">
<input type="text" data-table="mas_services_billing" data-field="x_BillOrder" name="x<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" id="x<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->BillOrder->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->BillOrder->EditValue ?>"<?php echo $mas_services_billing->BillOrder->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_BillOrder" class="mas_services_billing_BillOrder">
<span<?php echo $mas_services_billing->BillOrder->viewAttributes() ?>>
<?php echo $mas_services_billing->BillOrder->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive"<?php echo $mas_services_billing->Inactive->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Inactive" class="form-group mas_services_billing_Inactive">
<input type="text" data-table="mas_services_billing" data-field="x_Inactive" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Inactive->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Inactive->EditValue ?>"<?php echo $mas_services_billing->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Inactive" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($mas_services_billing->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Inactive" class="form-group mas_services_billing_Inactive">
<input type="text" data-table="mas_services_billing" data-field="x_Inactive" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Inactive->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Inactive->EditValue ?>"<?php echo $mas_services_billing->Inactive->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Inactive" class="mas_services_billing_Inactive">
<span<?php echo $mas_services_billing->Inactive->viewAttributes() ?>>
<?php echo $mas_services_billing->Inactive->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource"<?php echo $mas_services_billing->Outsource->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Outsource" class="form-group mas_services_billing_Outsource">
<input type="text" data-table="mas_services_billing" data-field="x_Outsource" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Outsource->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Outsource->EditValue ?>"<?php echo $mas_services_billing->Outsource->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Outsource" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($mas_services_billing->Outsource->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Outsource" class="form-group mas_services_billing_Outsource">
<input type="text" data-table="mas_services_billing" data-field="x_Outsource" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Outsource->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Outsource->EditValue ?>"<?php echo $mas_services_billing->Outsource->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Outsource" class="mas_services_billing_Outsource">
<span<?php echo $mas_services_billing->Outsource->viewAttributes() ?>>
<?php echo $mas_services_billing->Outsource->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample"<?php echo $mas_services_billing->CollSample->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_CollSample" class="form-group mas_services_billing_CollSample">
<input type="text" data-table="mas_services_billing" data-field="x_CollSample" name="x<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" id="x<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->CollSample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->CollSample->EditValue ?>"<?php echo $mas_services_billing->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CollSample" name="o<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" id="o<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($mas_services_billing->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_CollSample" class="form-group mas_services_billing_CollSample">
<input type="text" data-table="mas_services_billing" data-field="x_CollSample" name="x<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" id="x<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->CollSample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->CollSample->EditValue ?>"<?php echo $mas_services_billing->CollSample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_CollSample" class="mas_services_billing_CollSample">
<span<?php echo $mas_services_billing->CollSample->viewAttributes() ?>>
<?php echo $mas_services_billing->CollSample->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->TestType->Visible) { // TestType ?>
		<td data-name="TestType"<?php echo $mas_services_billing->TestType->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_TestType" class="form-group mas_services_billing_TestType">
<input type="text" data-table="mas_services_billing" data-field="x_TestType" name="x<?php echo $mas_services_billing_list->RowIndex ?>_TestType" id="x<?php echo $mas_services_billing_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->TestType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->TestType->EditValue ?>"<?php echo $mas_services_billing->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestType" name="o<?php echo $mas_services_billing_list->RowIndex ?>_TestType" id="o<?php echo $mas_services_billing_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($mas_services_billing->TestType->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_TestType" class="form-group mas_services_billing_TestType">
<input type="text" data-table="mas_services_billing" data-field="x_TestType" name="x<?php echo $mas_services_billing_list->RowIndex ?>_TestType" id="x<?php echo $mas_services_billing_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->TestType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->TestType->EditValue ?>"<?php echo $mas_services_billing->TestType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_TestType" class="mas_services_billing_TestType">
<span<?php echo $mas_services_billing->TestType->viewAttributes() ?>>
<?php echo $mas_services_billing->TestType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->NoHeading->Visible) { // NoHeading ?>
		<td data-name="NoHeading"<?php echo $mas_services_billing->NoHeading->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_NoHeading" class="form-group mas_services_billing_NoHeading">
<input type="text" data-table="mas_services_billing" data-field="x_NoHeading" name="x<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" id="x<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->NoHeading->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->NoHeading->EditValue ?>"<?php echo $mas_services_billing->NoHeading->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoHeading" name="o<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" id="o<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" value="<?php echo HtmlEncode($mas_services_billing->NoHeading->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_NoHeading" class="form-group mas_services_billing_NoHeading">
<input type="text" data-table="mas_services_billing" data-field="x_NoHeading" name="x<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" id="x<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->NoHeading->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->NoHeading->EditValue ?>"<?php echo $mas_services_billing->NoHeading->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_NoHeading" class="mas_services_billing_NoHeading">
<span<?php echo $mas_services_billing->NoHeading->viewAttributes() ?>>
<?php echo $mas_services_billing->NoHeading->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->ChemicalCode->Visible) { // ChemicalCode ?>
		<td data-name="ChemicalCode"<?php echo $mas_services_billing->ChemicalCode->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_ChemicalCode" class="form-group mas_services_billing_ChemicalCode">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalCode" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->ChemicalCode->EditValue ?>"<?php echo $mas_services_billing->ChemicalCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalCode" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" value="<?php echo HtmlEncode($mas_services_billing->ChemicalCode->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_ChemicalCode" class="form-group mas_services_billing_ChemicalCode">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalCode" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->ChemicalCode->EditValue ?>"<?php echo $mas_services_billing->ChemicalCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_ChemicalCode" class="mas_services_billing_ChemicalCode">
<span<?php echo $mas_services_billing->ChemicalCode->viewAttributes() ?>>
<?php echo $mas_services_billing->ChemicalCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->ChemicalName->Visible) { // ChemicalName ?>
		<td data-name="ChemicalName"<?php echo $mas_services_billing->ChemicalName->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_ChemicalName" class="form-group mas_services_billing_ChemicalName">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalName" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->ChemicalName->EditValue ?>"<?php echo $mas_services_billing->ChemicalName->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalName" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" value="<?php echo HtmlEncode($mas_services_billing->ChemicalName->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_ChemicalName" class="form-group mas_services_billing_ChemicalName">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalName" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->ChemicalName->EditValue ?>"<?php echo $mas_services_billing->ChemicalName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_ChemicalName" class="mas_services_billing_ChemicalName">
<span<?php echo $mas_services_billing->ChemicalName->viewAttributes() ?>>
<?php echo $mas_services_billing->ChemicalName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Utilaization->Visible) { // Utilaization ?>
		<td data-name="Utilaization"<?php echo $mas_services_billing->Utilaization->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Utilaization" class="form-group mas_services_billing_Utilaization">
<input type="text" data-table="mas_services_billing" data-field="x_Utilaization" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Utilaization->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Utilaization->EditValue ?>"<?php echo $mas_services_billing->Utilaization->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Utilaization" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" value="<?php echo HtmlEncode($mas_services_billing->Utilaization->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Utilaization" class="form-group mas_services_billing_Utilaization">
<input type="text" data-table="mas_services_billing" data-field="x_Utilaization" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Utilaization->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Utilaization->EditValue ?>"<?php echo $mas_services_billing->Utilaization->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCnt ?>_mas_services_billing_Utilaization" class="mas_services_billing_Utilaization">
<span<?php echo $mas_services_billing->Utilaization->viewAttributes() ?>>
<?php echo $mas_services_billing->Utilaization->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_services_billing_list->ListOptions->render("body", "right", $mas_services_billing_list->RowCnt);
?>
	</tr>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD || $mas_services_billing->RowType == ROWTYPE_EDIT) { ?>
<script>
fmas_services_billinglist.updateLists(<?php echo $mas_services_billing_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$mas_services_billing->isGridAdd())
		if (!$mas_services_billing_list->Recordset->EOF)
			$mas_services_billing_list->Recordset->moveNext();
}
?>
<?php
	if ($mas_services_billing->isGridAdd() || $mas_services_billing->isGridEdit()) {
		$mas_services_billing_list->RowIndex = '$rowindex$';
		$mas_services_billing_list->loadRowValues();

		// Set row properties
		$mas_services_billing->resetAttributes();
		$mas_services_billing->RowAttrs = array_merge($mas_services_billing->RowAttrs, array('data-rowindex'=>$mas_services_billing_list->RowIndex, 'id'=>'r0_mas_services_billing', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($mas_services_billing->RowAttrs["class"], "ew-template");
		$mas_services_billing->RowType = ROWTYPE_ADD;

		// Render row
		$mas_services_billing_list->renderRow();

		// Render list options
		$mas_services_billing_list->renderListOptions();
		$mas_services_billing_list->StartRowCnt = 0;
?>
	<tr<?php echo $mas_services_billing->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_services_billing_list->ListOptions->render("body", "left", $mas_services_billing_list->RowIndex);
?>
	<?php if ($mas_services_billing->Id->Visible) { // Id ?>
		<td data-name="Id">
<input type="hidden" data-table="mas_services_billing" data-field="x_Id" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Id" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($mas_services_billing->Id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->CODE->Visible) { // CODE ?>
		<td data-name="CODE">
<span id="el$rowindex$_mas_services_billing_CODE" class="form-group mas_services_billing_CODE">
<input type="text" data-table="mas_services_billing" data-field="x_CODE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_CODE" id="x<?php echo $mas_services_billing_list->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing->CODE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->CODE->EditValue ?>"<?php echo $mas_services_billing->CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CODE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_CODE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_CODE" value="<?php echo HtmlEncode($mas_services_billing->CODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE">
<span id="el$rowindex$_mas_services_billing_SERVICE" class="form-group mas_services_billing_SERVICE">
<input type="text" data-table="mas_services_billing" data-field="x_SERVICE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" id="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing->SERVICE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->SERVICE->EditValue ?>"<?php echo $mas_services_billing->SERVICE->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($mas_services_billing->SERVICE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS">
<span id="el$rowindex$_mas_services_billing_UNITS" class="form-group mas_services_billing_UNITS">
<input type="text" data-table="mas_services_billing" data-field="x_UNITS" name="x<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" id="x<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->UNITS->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->UNITS->EditValue ?>"<?php echo $mas_services_billing->UNITS->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UNITS" name="o<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" id="o<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($mas_services_billing->UNITS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->AMOUNT->Visible) { // AMOUNT ?>
		<td data-name="AMOUNT">
<span id="el$rowindex$_mas_services_billing_AMOUNT" class="form-group mas_services_billing_AMOUNT">
<input type="text" data-table="mas_services_billing" data-field="x_AMOUNT" name="x<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" id="x<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->AMOUNT->EditValue ?>"<?php echo $mas_services_billing->AMOUNT->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_AMOUNT" name="o<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" id="o<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" value="<?php echo HtmlEncode($mas_services_billing->AMOUNT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE">
<span id="el$rowindex$_mas_services_billing_SERVICE_TYPE" class="form-group mas_services_billing_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $mas_services_billing->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE"<?php echo $mas_services_billing->SERVICE_TYPE->editAttributes() ?>>
		<?php echo $mas_services_billing->SERVICE_TYPE->selectOptionListHtml("x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$mas_services_billing->SERVICE_TYPE->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing->SERVICE_TYPE->caption() ?>" data-title="<?php echo $mas_services_billing->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE',url:'mas_services_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $mas_services_billing->SERVICE_TYPE->Lookup->getParamTag("p_x" . $mas_services_billing_list->RowIndex . "_SERVICE_TYPE") ?>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($mas_services_billing->SERVICE_TYPE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT">
<span id="el$rowindex$_mas_services_billing_DEPARTMENT" class="form-group mas_services_billing_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_DEPARTMENT" data-value-separator="<?php echo $mas_services_billing->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT"<?php echo $mas_services_billing->DEPARTMENT->editAttributes() ?>>
		<?php echo $mas_services_billing->DEPARTMENT->selectOptionListHtml("x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$mas_services_billing->DEPARTMENT->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing->DEPARTMENT->caption() ?>" data-title="<?php echo $mas_services_billing->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT',url:'mas_billing_departmentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $mas_services_billing->DEPARTMENT->Lookup->getParamTag("p_x" . $mas_services_billing_list->RowIndex . "_DEPARTMENT") ?>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DEPARTMENT" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($mas_services_billing->DEPARTMENT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td data-name="mas_services_billingcol">
<span id="el$rowindex$_mas_services_billing_mas_services_billingcol" class="form-group mas_services_billing_mas_services_billingcol">
<input type="text" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="x<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" id="x<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->mas_services_billingcol->EditValue ?>"<?php echo $mas_services_billing->mas_services_billingcol->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="o<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" id="o<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" value="<?php echo HtmlEncode($mas_services_billing->mas_services_billingcol->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount">
<span id="el$rowindex$_mas_services_billing_DrShareAmount" class="form-group mas_services_billing_DrShareAmount">
<input type="text" data-table="mas_services_billing" data-field="x_DrShareAmount" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->DrShareAmount->EditValue ?>"<?php echo $mas_services_billing->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrShareAmount" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($mas_services_billing->DrShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount">
<span id="el$rowindex$_mas_services_billing_HospShareAmount" class="form-group mas_services_billing_HospShareAmount">
<input type="text" data-table="mas_services_billing" data-field="x_HospShareAmount" name="x<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" id="x<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->HospShareAmount->EditValue ?>"<?php echo $mas_services_billing->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospShareAmount" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($mas_services_billing->HospShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->DrSharePer->Visible) { // DrSharePer ?>
		<td data-name="DrSharePer">
<span id="el$rowindex$_mas_services_billing_DrSharePer" class="form-group mas_services_billing_DrSharePer">
<input type="text" data-table="mas_services_billing" data-field="x_DrSharePer" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->DrSharePer->EditValue ?>"<?php echo $mas_services_billing->DrSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrSharePer" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" value="<?php echo HtmlEncode($mas_services_billing->DrSharePer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->HospSharePer->Visible) { // HospSharePer ?>
		<td data-name="HospSharePer">
<span id="el$rowindex$_mas_services_billing_HospSharePer" class="form-group mas_services_billing_HospSharePer">
<input type="text" data-table="mas_services_billing" data-field="x_HospSharePer" name="x<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" id="x<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->HospSharePer->EditValue ?>"<?php echo $mas_services_billing->HospSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospSharePer" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" value="<?php echo HtmlEncode($mas_services_billing->HospSharePer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="mas_services_billing" data-field="x_HospID" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospID" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($mas_services_billing->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<span id="el$rowindex$_mas_services_billing_TestSubCd" class="form-group mas_services_billing_TestSubCd">
<input type="text" data-table="mas_services_billing" data-field="x_TestSubCd" name="x<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" id="x<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->TestSubCd->EditValue ?>"<?php echo $mas_services_billing->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestSubCd" name="o<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" id="o<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($mas_services_billing->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Method->Visible) { // Method ?>
		<td data-name="Method">
<span id="el$rowindex$_mas_services_billing_Method" class="form-group mas_services_billing_Method">
<input type="text" data-table="mas_services_billing" data-field="x_Method" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Method" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Method->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Method->EditValue ?>"<?php echo $mas_services_billing->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Method" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Method" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($mas_services_billing->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Order->Visible) { // Order ?>
		<td data-name="Order">
<span id="el$rowindex$_mas_services_billing_Order" class="form-group mas_services_billing_Order">
<input type="text" data-table="mas_services_billing" data-field="x_Order" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Order" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->Order->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Order->EditValue ?>"<?php echo $mas_services_billing->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Order" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Order" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($mas_services_billing->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->ResType->Visible) { // ResType ?>
		<td data-name="ResType">
<span id="el$rowindex$_mas_services_billing_ResType" class="form-group mas_services_billing_ResType">
<input type="text" data-table="mas_services_billing" data-field="x_ResType" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ResType" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->ResType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->ResType->EditValue ?>"<?php echo $mas_services_billing->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ResType" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ResType" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($mas_services_billing->ResType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD">
<span id="el$rowindex$_mas_services_billing_UnitCD" class="form-group mas_services_billing_UnitCD">
<input type="text" data-table="mas_services_billing" data-field="x_UnitCD" name="x<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" id="x<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->UnitCD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->UnitCD->EditValue ?>"<?php echo $mas_services_billing->UnitCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UnitCD" name="o<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" id="o<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($mas_services_billing->UnitCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Sample->Visible) { // Sample ?>
		<td data-name="Sample">
<span id="el$rowindex$_mas_services_billing_Sample" class="form-group mas_services_billing_Sample">
<input type="text" data-table="mas_services_billing" data-field="x_Sample" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Sample" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($mas_services_billing->Sample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Sample->EditValue ?>"<?php echo $mas_services_billing->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Sample" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Sample" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($mas_services_billing->Sample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->NoD->Visible) { // NoD ?>
		<td data-name="NoD">
<span id="el$rowindex$_mas_services_billing_NoD" class="form-group mas_services_billing_NoD">
<input type="text" data-table="mas_services_billing" data-field="x_NoD" name="x<?php echo $mas_services_billing_list->RowIndex ?>_NoD" id="x<?php echo $mas_services_billing_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->NoD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->NoD->EditValue ?>"<?php echo $mas_services_billing->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoD" name="o<?php echo $mas_services_billing_list->RowIndex ?>_NoD" id="o<?php echo $mas_services_billing_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($mas_services_billing->NoD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder">
<span id="el$rowindex$_mas_services_billing_BillOrder" class="form-group mas_services_billing_BillOrder">
<input type="text" data-table="mas_services_billing" data-field="x_BillOrder" name="x<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" id="x<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->BillOrder->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->BillOrder->EditValue ?>"<?php echo $mas_services_billing->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_BillOrder" name="o<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" id="o<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($mas_services_billing->BillOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive">
<span id="el$rowindex$_mas_services_billing_Inactive" class="form-group mas_services_billing_Inactive">
<input type="text" data-table="mas_services_billing" data-field="x_Inactive" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Inactive->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Inactive->EditValue ?>"<?php echo $mas_services_billing->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Inactive" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($mas_services_billing->Inactive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource">
<span id="el$rowindex$_mas_services_billing_Outsource" class="form-group mas_services_billing_Outsource">
<input type="text" data-table="mas_services_billing" data-field="x_Outsource" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Outsource->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Outsource->EditValue ?>"<?php echo $mas_services_billing->Outsource->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Outsource" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($mas_services_billing->Outsource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample">
<span id="el$rowindex$_mas_services_billing_CollSample" class="form-group mas_services_billing_CollSample">
<input type="text" data-table="mas_services_billing" data-field="x_CollSample" name="x<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" id="x<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->CollSample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->CollSample->EditValue ?>"<?php echo $mas_services_billing->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CollSample" name="o<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" id="o<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($mas_services_billing->CollSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<span id="el$rowindex$_mas_services_billing_TestType" class="form-group mas_services_billing_TestType">
<input type="text" data-table="mas_services_billing" data-field="x_TestType" name="x<?php echo $mas_services_billing_list->RowIndex ?>_TestType" id="x<?php echo $mas_services_billing_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->TestType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->TestType->EditValue ?>"<?php echo $mas_services_billing->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestType" name="o<?php echo $mas_services_billing_list->RowIndex ?>_TestType" id="o<?php echo $mas_services_billing_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($mas_services_billing->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->NoHeading->Visible) { // NoHeading ?>
		<td data-name="NoHeading">
<span id="el$rowindex$_mas_services_billing_NoHeading" class="form-group mas_services_billing_NoHeading">
<input type="text" data-table="mas_services_billing" data-field="x_NoHeading" name="x<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" id="x<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->NoHeading->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->NoHeading->EditValue ?>"<?php echo $mas_services_billing->NoHeading->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoHeading" name="o<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" id="o<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" value="<?php echo HtmlEncode($mas_services_billing->NoHeading->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->ChemicalCode->Visible) { // ChemicalCode ?>
		<td data-name="ChemicalCode">
<span id="el$rowindex$_mas_services_billing_ChemicalCode" class="form-group mas_services_billing_ChemicalCode">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalCode" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->ChemicalCode->EditValue ?>"<?php echo $mas_services_billing->ChemicalCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalCode" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" value="<?php echo HtmlEncode($mas_services_billing->ChemicalCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->ChemicalName->Visible) { // ChemicalName ?>
		<td data-name="ChemicalName">
<span id="el$rowindex$_mas_services_billing_ChemicalName" class="form-group mas_services_billing_ChemicalName">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalName" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->ChemicalName->EditValue ?>"<?php echo $mas_services_billing->ChemicalName->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalName" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" value="<?php echo HtmlEncode($mas_services_billing->ChemicalName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing->Utilaization->Visible) { // Utilaization ?>
		<td data-name="Utilaization">
<span id="el$rowindex$_mas_services_billing_Utilaization" class="form-group mas_services_billing_Utilaization">
<input type="text" data-table="mas_services_billing" data-field="x_Utilaization" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Utilaization->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Utilaization->EditValue ?>"<?php echo $mas_services_billing->Utilaization->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Utilaization" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" value="<?php echo HtmlEncode($mas_services_billing->Utilaization->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_services_billing_list->ListOptions->render("body", "right", $mas_services_billing_list->RowIndex);
?>
<script>
fmas_services_billinglist.updateLists(<?php echo $mas_services_billing_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($mas_services_billing->isAdd() || $mas_services_billing->isCopy()) { ?>
<input type="hidden" name="<?php echo $mas_services_billing_list->FormKeyCountName ?>" id="<?php echo $mas_services_billing_list->FormKeyCountName ?>" value="<?php echo $mas_services_billing_list->KeyCount ?>">
<?php } ?>
<?php if ($mas_services_billing->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $mas_services_billing_list->FormKeyCountName ?>" id="<?php echo $mas_services_billing_list->FormKeyCountName ?>" value="<?php echo $mas_services_billing_list->KeyCount ?>">
<?php echo $mas_services_billing_list->MultiSelectKey ?>
<?php } ?>
<?php if ($mas_services_billing->isEdit()) { ?>
<input type="hidden" name="<?php echo $mas_services_billing_list->FormKeyCountName ?>" id="<?php echo $mas_services_billing_list->FormKeyCountName ?>" value="<?php echo $mas_services_billing_list->KeyCount ?>">
<?php } ?>
<?php if ($mas_services_billing->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $mas_services_billing_list->FormKeyCountName ?>" id="<?php echo $mas_services_billing_list->FormKeyCountName ?>" value="<?php echo $mas_services_billing_list->KeyCount ?>">
<?php echo $mas_services_billing_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$mas_services_billing->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_services_billing_list->Recordset)
	$mas_services_billing_list->Recordset->Close();
?>
<?php if (!$mas_services_billing->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_services_billing->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_services_billing_list->Pager)) $mas_services_billing_list->Pager = new NumericPager($mas_services_billing_list->StartRec, $mas_services_billing_list->DisplayRecs, $mas_services_billing_list->TotalRecs, $mas_services_billing_list->RecRange, $mas_services_billing_list->AutoHidePager) ?>
<?php if ($mas_services_billing_list->Pager->RecordCount > 0 && $mas_services_billing_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_services_billing_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_services_billing_list->pageUrl() ?>start=<?php echo $mas_services_billing_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_services_billing_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_services_billing_list->pageUrl() ?>start=<?php echo $mas_services_billing_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_services_billing_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_services_billing_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_services_billing_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_services_billing_list->pageUrl() ?>start=<?php echo $mas_services_billing_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_services_billing_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_services_billing_list->pageUrl() ?>start=<?php echo $mas_services_billing_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_services_billing_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_services_billing_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_services_billing_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_services_billing_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_services_billing_list->TotalRecs > 0 && (!$mas_services_billing_list->AutoHidePageSizeSelector || $mas_services_billing_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_services_billing">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_services_billing_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_services_billing_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_services_billing_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_services_billing_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_services_billing_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_services_billing_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_services_billing->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_services_billing_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_services_billing_list->TotalRecs == 0 && !$mas_services_billing->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_services_billing_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_services_billing_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_services_billing->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$mas_services_billing->isExport()) { ?>
<script>
ew.scrollableTable("gmp_mas_services_billing", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_services_billing_list->terminate();
?>