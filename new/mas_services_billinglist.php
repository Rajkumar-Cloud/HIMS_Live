<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
<?php include_once "header.php"; ?>
<?php if (!$mas_services_billing_list->isExport()) { ?>
<script>
var fmas_services_billinglist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmas_services_billinglist = currentForm = new ew.Form("fmas_services_billinglist", "list");
	fmas_services_billinglist.formKeyCountName = '<?php echo $mas_services_billing_list->FormKeyCountName ?>';

	// Validate form
	fmas_services_billinglist.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
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
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->Id->caption(), $mas_services_billing_list->Id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->CODE->caption(), $mas_services_billing_list->CODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->SERVICE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->SERVICE->caption(), $mas_services_billing_list->SERVICE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->UNITS->Required) { ?>
				elm = this.getElements("x" + infix + "_UNITS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->UNITS->caption(), $mas_services_billing_list->UNITS->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UNITS");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_services_billing_list->UNITS->errorMessage()) ?>");
			<?php if ($mas_services_billing_list->AMOUNT->Required) { ?>
				elm = this.getElements("x" + infix + "_AMOUNT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->AMOUNT->caption(), $mas_services_billing_list->AMOUNT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->SERVICE_TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->SERVICE_TYPE->caption(), $mas_services_billing_list->SERVICE_TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->DEPARTMENT->Required) { ?>
				elm = this.getElements("x" + infix + "_DEPARTMENT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->DEPARTMENT->caption(), $mas_services_billing_list->DEPARTMENT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->mas_services_billingcol->Required) { ?>
				elm = this.getElements("x" + infix + "_mas_services_billingcol");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->mas_services_billingcol->caption(), $mas_services_billing_list->mas_services_billingcol->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->DrShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->DrShareAmount->caption(), $mas_services_billing_list->DrShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_services_billing_list->DrShareAmount->errorMessage()) ?>");
			<?php if ($mas_services_billing_list->HospShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->HospShareAmount->caption(), $mas_services_billing_list->HospShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_services_billing_list->HospShareAmount->errorMessage()) ?>");
			<?php if ($mas_services_billing_list->DrSharePer->Required) { ?>
				elm = this.getElements("x" + infix + "_DrSharePer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->DrSharePer->caption(), $mas_services_billing_list->DrSharePer->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrSharePer");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_services_billing_list->DrSharePer->errorMessage()) ?>");
			<?php if ($mas_services_billing_list->HospSharePer->Required) { ?>
				elm = this.getElements("x" + infix + "_HospSharePer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->HospSharePer->caption(), $mas_services_billing_list->HospSharePer->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospSharePer");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_services_billing_list->HospSharePer->errorMessage()) ?>");
			<?php if ($mas_services_billing_list->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->HospID->caption(), $mas_services_billing_list->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->TestSubCd->caption(), $mas_services_billing_list->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->Method->caption(), $mas_services_billing_list->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->Order->caption(), $mas_services_billing_list->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_services_billing_list->Order->errorMessage()) ?>");
			<?php if ($mas_services_billing_list->ResType->Required) { ?>
				elm = this.getElements("x" + infix + "_ResType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->ResType->caption(), $mas_services_billing_list->ResType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->UnitCD->Required) { ?>
				elm = this.getElements("x" + infix + "_UnitCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->UnitCD->caption(), $mas_services_billing_list->UnitCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->Sample->Required) { ?>
				elm = this.getElements("x" + infix + "_Sample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->Sample->caption(), $mas_services_billing_list->Sample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->NoD->Required) { ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->NoD->caption(), $mas_services_billing_list->NoD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_services_billing_list->NoD->errorMessage()) ?>");
			<?php if ($mas_services_billing_list->BillOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->BillOrder->caption(), $mas_services_billing_list->BillOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_services_billing_list->BillOrder->errorMessage()) ?>");
			<?php if ($mas_services_billing_list->Inactive->Required) { ?>
				elm = this.getElements("x" + infix + "_Inactive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->Inactive->caption(), $mas_services_billing_list->Inactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->Outsource->Required) { ?>
				elm = this.getElements("x" + infix + "_Outsource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->Outsource->caption(), $mas_services_billing_list->Outsource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->CollSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CollSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->CollSample->caption(), $mas_services_billing_list->CollSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->TestType->Required) { ?>
				elm = this.getElements("x" + infix + "_TestType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->TestType->caption(), $mas_services_billing_list->TestType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->NoHeading->Required) { ?>
				elm = this.getElements("x" + infix + "_NoHeading");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->NoHeading->caption(), $mas_services_billing_list->NoHeading->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->ChemicalCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ChemicalCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->ChemicalCode->caption(), $mas_services_billing_list->ChemicalCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->ChemicalName->Required) { ?>
				elm = this.getElements("x" + infix + "_ChemicalName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->ChemicalName->caption(), $mas_services_billing_list->ChemicalName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_list->Utilaization->Required) { ?>
				elm = this.getElements("x" + infix + "_Utilaization");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_list->Utilaization->caption(), $mas_services_billing_list->Utilaization->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fmas_services_billinglist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_services_billinglist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmas_services_billinglist.lists["x_SERVICE_TYPE"] = <?php echo $mas_services_billing_list->SERVICE_TYPE->Lookup->toClientList($mas_services_billing_list) ?>;
	fmas_services_billinglist.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($mas_services_billing_list->SERVICE_TYPE->lookupOptions()) ?>;
	fmas_services_billinglist.lists["x_DEPARTMENT"] = <?php echo $mas_services_billing_list->DEPARTMENT->Lookup->toClientList($mas_services_billing_list) ?>;
	fmas_services_billinglist.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($mas_services_billing_list->DEPARTMENT->lookupOptions()) ?>;
	loadjs.done("fmas_services_billinglist");
});
var fmas_services_billinglistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmas_services_billinglistsrch = currentSearchForm = new ew.Form("fmas_services_billinglistsrch");

	// Validate function for search
	fmas_services_billinglistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fmas_services_billinglistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_services_billinglistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmas_services_billinglistsrch.lists["x_SERVICE_TYPE"] = <?php echo $mas_services_billing_list->SERVICE_TYPE->Lookup->toClientList($mas_services_billing_list) ?>;
	fmas_services_billinglistsrch.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($mas_services_billing_list->SERVICE_TYPE->lookupOptions()) ?>;
	fmas_services_billinglistsrch.lists["x_DEPARTMENT"] = <?php echo $mas_services_billing_list->DEPARTMENT->Lookup->toClientList($mas_services_billing_list) ?>;
	fmas_services_billinglistsrch.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($mas_services_billing_list->DEPARTMENT->lookupOptions()) ?>;

	// Filters
	fmas_services_billinglistsrch.filterList = <?php echo $mas_services_billing_list->getFilterList() ?>;
	loadjs.done("fmas_services_billinglistsrch");
});
</script>
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
<script>
loadjs.ready("head", function() {
	ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
	ew.PREVIEW_SINGLE_ROW = false;
	ew.PREVIEW_OVERLAY = false;
	loadjs("js/ewpreview.js", "preview");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mas_services_billing_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_services_billing_list->TotalRecords > 0 && $mas_services_billing_list->ExportOptions->visible()) { ?>
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
<?php if (!$mas_services_billing_list->isExport() && !$mas_services_billing->CurrentAction) { ?>
<form name="fmas_services_billinglistsrch" id="fmas_services_billinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmas_services_billinglistsrch-search-panel" class="<?php echo $mas_services_billing_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_services_billing">
	<div class="ew-extended-search">
<?php

// Render search row
$mas_services_billing->RowType = ROWTYPE_SEARCH;
$mas_services_billing->resetAttributes();
$mas_services_billing_list->renderRow();
?>
<?php if ($mas_services_billing_list->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<?php
		$mas_services_billing_list->SearchColumnCount++;
		if (($mas_services_billing_list->SearchColumnCount - 1) % $mas_services_billing_list->SearchFieldsPerRow == 0) {
			$mas_services_billing_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $mas_services_billing_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SERVICE_TYPE" class="ew-cell form-group">
		<label for="x_SERVICE_TYPE" class="ew-search-caption ew-label"><?php echo $mas_services_billing_list->SERVICE_TYPE->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SERVICE_TYPE" id="z_SERVICE_TYPE" value="LIKE">
</span>
		<span id="el_mas_services_billing_SERVICE_TYPE" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $mas_services_billing_list->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x_SERVICE_TYPE" name="x_SERVICE_TYPE"<?php echo $mas_services_billing_list->SERVICE_TYPE->editAttributes() ?>>
			<?php echo $mas_services_billing_list->SERVICE_TYPE->selectOptionListHtml("x_SERVICE_TYPE") ?>
		</select>
</div>
<?php echo $mas_services_billing_list->SERVICE_TYPE->Lookup->getParamTag($mas_services_billing_list, "p_x_SERVICE_TYPE") ?>
</span>
	</div>
	<?php if ($mas_services_billing_list->SearchColumnCount % $mas_services_billing_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php
		$mas_services_billing_list->SearchColumnCount++;
		if (($mas_services_billing_list->SearchColumnCount - 1) % $mas_services_billing_list->SearchFieldsPerRow == 0) {
			$mas_services_billing_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $mas_services_billing_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_DEPARTMENT" class="ew-cell form-group">
		<label for="x_DEPARTMENT" class="ew-search-caption ew-label"><?php echo $mas_services_billing_list->DEPARTMENT->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DEPARTMENT" id="z_DEPARTMENT" value="LIKE">
</span>
		<span id="el_mas_services_billing_DEPARTMENT" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_DEPARTMENT" data-value-separator="<?php echo $mas_services_billing_list->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x_DEPARTMENT" name="x_DEPARTMENT"<?php echo $mas_services_billing_list->DEPARTMENT->editAttributes() ?>>
			<?php echo $mas_services_billing_list->DEPARTMENT->selectOptionListHtml("x_DEPARTMENT") ?>
		</select>
</div>
<?php echo $mas_services_billing_list->DEPARTMENT->Lookup->getParamTag($mas_services_billing_list, "p_x_DEPARTMENT") ?>
</span>
	</div>
	<?php if ($mas_services_billing_list->SearchColumnCount % $mas_services_billing_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($mas_services_billing_list->SearchColumnCount % $mas_services_billing_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $mas_services_billing_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($mas_services_billing_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($mas_services_billing_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_services_billing_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_services_billing_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_services_billing_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_services_billing_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_services_billing_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $mas_services_billing_list->showPageHeader(); ?>
<?php
$mas_services_billing_list->showMessage();
?>
<?php if ($mas_services_billing_list->TotalRecords > 0 || $mas_services_billing->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_services_billing_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_services_billing">
<?php if (!$mas_services_billing_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_services_billing_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_services_billing_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_services_billing_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_services_billinglist" id="fmas_services_billinglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_services_billing">
<div id="gmp_mas_services_billing" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($mas_services_billing_list->TotalRecords > 0 || $mas_services_billing_list->isAdd() || $mas_services_billing_list->isCopy() || $mas_services_billing_list->isGridEdit()) { ?>
<table id="tbl_mas_services_billinglist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_services_billing->RowType = ROWTYPE_HEADER;

// Render list options
$mas_services_billing_list->renderListOptions();

// Render list options (header, left)
$mas_services_billing_list->ListOptions->render("header", "left");
?>
<?php if ($mas_services_billing_list->Id->Visible) { // Id ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->Id) == "") { ?>
		<th data-name="Id" class="<?php echo $mas_services_billing_list->Id->headerCellClass() ?>"><div id="elh_mas_services_billing_Id" class="mas_services_billing_Id"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->Id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Id" class="<?php echo $mas_services_billing_list->Id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->Id) ?>', 1);"><div id="elh_mas_services_billing_Id" class="mas_services_billing_Id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->Id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->Id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->Id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->CODE->Visible) { // CODE ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $mas_services_billing_list->CODE->headerCellClass() ?>"><div id="elh_mas_services_billing_CODE" class="mas_services_billing_CODE"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $mas_services_billing_list->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->CODE) ?>', 1);"><div id="elh_mas_services_billing_CODE" class="mas_services_billing_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->CODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->CODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->SERVICE->Visible) { // SERVICE ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->SERVICE) == "") { ?>
		<th data-name="SERVICE" class="<?php echo $mas_services_billing_list->SERVICE->headerCellClass() ?>"><div id="elh_mas_services_billing_SERVICE" class="mas_services_billing_SERVICE"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->SERVICE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE" class="<?php echo $mas_services_billing_list->SERVICE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->SERVICE) ?>', 1);"><div id="elh_mas_services_billing_SERVICE" class="mas_services_billing_SERVICE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->SERVICE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->SERVICE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->SERVICE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->UNITS->Visible) { // UNITS ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->UNITS) == "") { ?>
		<th data-name="UNITS" class="<?php echo $mas_services_billing_list->UNITS->headerCellClass() ?>"><div id="elh_mas_services_billing_UNITS" class="mas_services_billing_UNITS"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->UNITS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNITS" class="<?php echo $mas_services_billing_list->UNITS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->UNITS) ?>', 1);"><div id="elh_mas_services_billing_UNITS" class="mas_services_billing_UNITS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->UNITS->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->UNITS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->UNITS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->AMOUNT->Visible) { // AMOUNT ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->AMOUNT) == "") { ?>
		<th data-name="AMOUNT" class="<?php echo $mas_services_billing_list->AMOUNT->headerCellClass() ?>"><div id="elh_mas_services_billing_AMOUNT" class="mas_services_billing_AMOUNT"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->AMOUNT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AMOUNT" class="<?php echo $mas_services_billing_list->AMOUNT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->AMOUNT) ?>', 1);"><div id="elh_mas_services_billing_AMOUNT" class="mas_services_billing_AMOUNT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->AMOUNT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->AMOUNT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->AMOUNT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->SERVICE_TYPE) == "") { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $mas_services_billing_list->SERVICE_TYPE->headerCellClass() ?>"><div id="elh_mas_services_billing_SERVICE_TYPE" class="mas_services_billing_SERVICE_TYPE"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->SERVICE_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $mas_services_billing_list->SERVICE_TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->SERVICE_TYPE) ?>', 1);"><div id="elh_mas_services_billing_SERVICE_TYPE" class="mas_services_billing_SERVICE_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->SERVICE_TYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->SERVICE_TYPE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->SERVICE_TYPE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->DEPARTMENT) == "") { ?>
		<th data-name="DEPARTMENT" class="<?php echo $mas_services_billing_list->DEPARTMENT->headerCellClass() ?>"><div id="elh_mas_services_billing_DEPARTMENT" class="mas_services_billing_DEPARTMENT"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->DEPARTMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEPARTMENT" class="<?php echo $mas_services_billing_list->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->DEPARTMENT) ?>', 1);"><div id="elh_mas_services_billing_DEPARTMENT" class="mas_services_billing_DEPARTMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->DEPARTMENT->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->DEPARTMENT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->DEPARTMENT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->mas_services_billingcol) == "") { ?>
		<th data-name="mas_services_billingcol" class="<?php echo $mas_services_billing_list->mas_services_billingcol->headerCellClass() ?>"><div id="elh_mas_services_billing_mas_services_billingcol" class="mas_services_billing_mas_services_billingcol"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->mas_services_billingcol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mas_services_billingcol" class="<?php echo $mas_services_billing_list->mas_services_billingcol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->mas_services_billingcol) ?>', 1);"><div id="elh_mas_services_billing_mas_services_billingcol" class="mas_services_billing_mas_services_billingcol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->mas_services_billingcol->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->mas_services_billingcol->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->mas_services_billingcol->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->DrShareAmount->Visible) { // DrShareAmount ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->DrShareAmount) == "") { ?>
		<th data-name="DrShareAmount" class="<?php echo $mas_services_billing_list->DrShareAmount->headerCellClass() ?>"><div id="elh_mas_services_billing_DrShareAmount" class="mas_services_billing_DrShareAmount"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->DrShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareAmount" class="<?php echo $mas_services_billing_list->DrShareAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->DrShareAmount) ?>', 1);"><div id="elh_mas_services_billing_DrShareAmount" class="mas_services_billing_DrShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->DrShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->DrShareAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->DrShareAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->HospShareAmount->Visible) { // HospShareAmount ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->HospShareAmount) == "") { ?>
		<th data-name="HospShareAmount" class="<?php echo $mas_services_billing_list->HospShareAmount->headerCellClass() ?>"><div id="elh_mas_services_billing_HospShareAmount" class="mas_services_billing_HospShareAmount"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->HospShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospShareAmount" class="<?php echo $mas_services_billing_list->HospShareAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->HospShareAmount) ?>', 1);"><div id="elh_mas_services_billing_HospShareAmount" class="mas_services_billing_HospShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->HospShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->HospShareAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->HospShareAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->DrSharePer->Visible) { // DrSharePer ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->DrSharePer) == "") { ?>
		<th data-name="DrSharePer" class="<?php echo $mas_services_billing_list->DrSharePer->headerCellClass() ?>"><div id="elh_mas_services_billing_DrSharePer" class="mas_services_billing_DrSharePer"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->DrSharePer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrSharePer" class="<?php echo $mas_services_billing_list->DrSharePer->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->DrSharePer) ?>', 1);"><div id="elh_mas_services_billing_DrSharePer" class="mas_services_billing_DrSharePer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->DrSharePer->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->DrSharePer->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->DrSharePer->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->HospSharePer->Visible) { // HospSharePer ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->HospSharePer) == "") { ?>
		<th data-name="HospSharePer" class="<?php echo $mas_services_billing_list->HospSharePer->headerCellClass() ?>"><div id="elh_mas_services_billing_HospSharePer" class="mas_services_billing_HospSharePer"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->HospSharePer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospSharePer" class="<?php echo $mas_services_billing_list->HospSharePer->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->HospSharePer) ?>', 1);"><div id="elh_mas_services_billing_HospSharePer" class="mas_services_billing_HospSharePer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->HospSharePer->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->HospSharePer->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->HospSharePer->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->HospID->Visible) { // HospID ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $mas_services_billing_list->HospID->headerCellClass() ?>"><div id="elh_mas_services_billing_HospID" class="mas_services_billing_HospID"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $mas_services_billing_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->HospID) ?>', 1);"><div id="elh_mas_services_billing_HospID" class="mas_services_billing_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $mas_services_billing_list->TestSubCd->headerCellClass() ?>"><div id="elh_mas_services_billing_TestSubCd" class="mas_services_billing_TestSubCd"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $mas_services_billing_list->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->TestSubCd) ?>', 1);"><div id="elh_mas_services_billing_TestSubCd" class="mas_services_billing_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->TestSubCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->TestSubCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->TestSubCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->Method->Visible) { // Method ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $mas_services_billing_list->Method->headerCellClass() ?>"><div id="elh_mas_services_billing_Method" class="mas_services_billing_Method"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $mas_services_billing_list->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->Method) ?>', 1);"><div id="elh_mas_services_billing_Method" class="mas_services_billing_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->Method->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->Method->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->Order->Visible) { // Order ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $mas_services_billing_list->Order->headerCellClass() ?>"><div id="elh_mas_services_billing_Order" class="mas_services_billing_Order"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $mas_services_billing_list->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->Order) ?>', 1);"><div id="elh_mas_services_billing_Order" class="mas_services_billing_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->Order->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->Order->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->ResType->Visible) { // ResType ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $mas_services_billing_list->ResType->headerCellClass() ?>"><div id="elh_mas_services_billing_ResType" class="mas_services_billing_ResType"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $mas_services_billing_list->ResType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->ResType) ?>', 1);"><div id="elh_mas_services_billing_ResType" class="mas_services_billing_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->ResType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->ResType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->ResType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->UnitCD->Visible) { // UnitCD ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->UnitCD) == "") { ?>
		<th data-name="UnitCD" class="<?php echo $mas_services_billing_list->UnitCD->headerCellClass() ?>"><div id="elh_mas_services_billing_UnitCD" class="mas_services_billing_UnitCD"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->UnitCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitCD" class="<?php echo $mas_services_billing_list->UnitCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->UnitCD) ?>', 1);"><div id="elh_mas_services_billing_UnitCD" class="mas_services_billing_UnitCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->UnitCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->UnitCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->UnitCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->Sample->Visible) { // Sample ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $mas_services_billing_list->Sample->headerCellClass() ?>"><div id="elh_mas_services_billing_Sample" class="mas_services_billing_Sample"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $mas_services_billing_list->Sample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->Sample) ?>', 1);"><div id="elh_mas_services_billing_Sample" class="mas_services_billing_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->Sample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->Sample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->Sample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->NoD->Visible) { // NoD ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $mas_services_billing_list->NoD->headerCellClass() ?>"><div id="elh_mas_services_billing_NoD" class="mas_services_billing_NoD"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $mas_services_billing_list->NoD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->NoD) ?>', 1);"><div id="elh_mas_services_billing_NoD" class="mas_services_billing_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->NoD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->NoD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->BillOrder->Visible) { // BillOrder ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $mas_services_billing_list->BillOrder->headerCellClass() ?>"><div id="elh_mas_services_billing_BillOrder" class="mas_services_billing_BillOrder"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $mas_services_billing_list->BillOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->BillOrder) ?>', 1);"><div id="elh_mas_services_billing_BillOrder" class="mas_services_billing_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->BillOrder->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->BillOrder->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->Inactive->Visible) { // Inactive ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $mas_services_billing_list->Inactive->headerCellClass() ?>"><div id="elh_mas_services_billing_Inactive" class="mas_services_billing_Inactive"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $mas_services_billing_list->Inactive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->Inactive) ?>', 1);"><div id="elh_mas_services_billing_Inactive" class="mas_services_billing_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->Inactive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->Inactive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->Inactive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->Outsource->Visible) { // Outsource ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->Outsource) == "") { ?>
		<th data-name="Outsource" class="<?php echo $mas_services_billing_list->Outsource->headerCellClass() ?>"><div id="elh_mas_services_billing_Outsource" class="mas_services_billing_Outsource"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->Outsource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Outsource" class="<?php echo $mas_services_billing_list->Outsource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->Outsource) ?>', 1);"><div id="elh_mas_services_billing_Outsource" class="mas_services_billing_Outsource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->Outsource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->Outsource->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->Outsource->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->CollSample->Visible) { // CollSample ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $mas_services_billing_list->CollSample->headerCellClass() ?>"><div id="elh_mas_services_billing_CollSample" class="mas_services_billing_CollSample"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $mas_services_billing_list->CollSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->CollSample) ?>', 1);"><div id="elh_mas_services_billing_CollSample" class="mas_services_billing_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->CollSample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->CollSample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->CollSample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->TestType->Visible) { // TestType ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $mas_services_billing_list->TestType->headerCellClass() ?>"><div id="elh_mas_services_billing_TestType" class="mas_services_billing_TestType"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $mas_services_billing_list->TestType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->TestType) ?>', 1);"><div id="elh_mas_services_billing_TestType" class="mas_services_billing_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->TestType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->TestType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->TestType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->NoHeading->Visible) { // NoHeading ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->NoHeading) == "") { ?>
		<th data-name="NoHeading" class="<?php echo $mas_services_billing_list->NoHeading->headerCellClass() ?>"><div id="elh_mas_services_billing_NoHeading" class="mas_services_billing_NoHeading"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->NoHeading->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoHeading" class="<?php echo $mas_services_billing_list->NoHeading->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->NoHeading) ?>', 1);"><div id="elh_mas_services_billing_NoHeading" class="mas_services_billing_NoHeading">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->NoHeading->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->NoHeading->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->NoHeading->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->ChemicalCode->Visible) { // ChemicalCode ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->ChemicalCode) == "") { ?>
		<th data-name="ChemicalCode" class="<?php echo $mas_services_billing_list->ChemicalCode->headerCellClass() ?>"><div id="elh_mas_services_billing_ChemicalCode" class="mas_services_billing_ChemicalCode"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->ChemicalCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChemicalCode" class="<?php echo $mas_services_billing_list->ChemicalCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->ChemicalCode) ?>', 1);"><div id="elh_mas_services_billing_ChemicalCode" class="mas_services_billing_ChemicalCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->ChemicalCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->ChemicalCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->ChemicalCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->ChemicalName->Visible) { // ChemicalName ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->ChemicalName) == "") { ?>
		<th data-name="ChemicalName" class="<?php echo $mas_services_billing_list->ChemicalName->headerCellClass() ?>"><div id="elh_mas_services_billing_ChemicalName" class="mas_services_billing_ChemicalName"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->ChemicalName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChemicalName" class="<?php echo $mas_services_billing_list->ChemicalName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->ChemicalName) ?>', 1);"><div id="elh_mas_services_billing_ChemicalName" class="mas_services_billing_ChemicalName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->ChemicalName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->ChemicalName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->ChemicalName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services_billing_list->Utilaization->Visible) { // Utilaization ?>
	<?php if ($mas_services_billing_list->SortUrl($mas_services_billing_list->Utilaization) == "") { ?>
		<th data-name="Utilaization" class="<?php echo $mas_services_billing_list->Utilaization->headerCellClass() ?>"><div id="elh_mas_services_billing_Utilaization" class="mas_services_billing_Utilaization"><div class="ew-table-header-caption"><?php echo $mas_services_billing_list->Utilaization->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Utilaization" class="<?php echo $mas_services_billing_list->Utilaization->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_services_billing_list->SortUrl($mas_services_billing_list->Utilaization) ?>', 1);"><div id="elh_mas_services_billing_Utilaization" class="mas_services_billing_Utilaization">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services_billing_list->Utilaization->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services_billing_list->Utilaization->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_services_billing_list->Utilaization->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
	if ($mas_services_billing_list->isAdd() || $mas_services_billing_list->isCopy()) {
		$mas_services_billing_list->RowIndex = 0;
		$mas_services_billing_list->KeyCount = $mas_services_billing_list->RowIndex;
		if ($mas_services_billing_list->isCopy() && !$mas_services_billing_list->loadRow())
			$mas_services_billing->CurrentAction = "add";
		if ($mas_services_billing_list->isAdd())
			$mas_services_billing_list->loadRowValues();
		if ($mas_services_billing->EventCancelled) // Insert failed
			$mas_services_billing_list->restoreFormValues(); // Restore form values

		// Set row properties
		$mas_services_billing->resetAttributes();
		$mas_services_billing->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_mas_services_billing", "data-rowtype" => ROWTYPE_ADD]);
		$mas_services_billing->RowType = ROWTYPE_ADD;

		// Render row
		$mas_services_billing_list->renderRow();

		// Render list options
		$mas_services_billing_list->renderListOptions();
		$mas_services_billing_list->StartRowCount = 0;
?>
	<tr <?php echo $mas_services_billing->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_services_billing_list->ListOptions->render("body", "left", $mas_services_billing_list->RowCount);
?>
	<?php if ($mas_services_billing_list->Id->Visible) { // Id ?>
		<td data-name="Id">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Id" class="form-group mas_services_billing_Id"></span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Id" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Id" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($mas_services_billing_list->Id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->CODE->Visible) { // CODE ?>
		<td data-name="CODE">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_CODE" class="form-group mas_services_billing_CODE">
<input type="text" data-table="mas_services_billing" data-field="x_CODE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_CODE" id="x<?php echo $mas_services_billing_list->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing_list->CODE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->CODE->EditValue ?>"<?php echo $mas_services_billing_list->CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CODE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_CODE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_CODE" value="<?php echo HtmlEncode($mas_services_billing_list->CODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_SERVICE" class="form-group mas_services_billing_SERVICE">
<input type="text" data-table="mas_services_billing" data-field="x_SERVICE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" id="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing_list->SERVICE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->SERVICE->EditValue ?>"<?php echo $mas_services_billing_list->SERVICE->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($mas_services_billing_list->SERVICE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_UNITS" class="form-group mas_services_billing_UNITS">
<input type="text" data-table="mas_services_billing" data-field="x_UNITS" name="x<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" id="x<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->UNITS->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->UNITS->EditValue ?>"<?php echo $mas_services_billing_list->UNITS->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UNITS" name="o<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" id="o<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($mas_services_billing_list->UNITS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->AMOUNT->Visible) { // AMOUNT ?>
		<td data-name="AMOUNT">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_AMOUNT" class="form-group mas_services_billing_AMOUNT">
<input type="text" data-table="mas_services_billing" data-field="x_AMOUNT" name="x<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" id="x<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing_list->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->AMOUNT->EditValue ?>"<?php echo $mas_services_billing_list->AMOUNT->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_AMOUNT" name="o<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" id="o<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" value="<?php echo HtmlEncode($mas_services_billing_list->AMOUNT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_SERVICE_TYPE" class="form-group mas_services_billing_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $mas_services_billing_list->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE"<?php echo $mas_services_billing_list->SERVICE_TYPE->editAttributes() ?>>
			<?php echo $mas_services_billing_list->SERVICE_TYPE->selectOptionListHtml("x{$mas_services_billing_list->RowIndex}_SERVICE_TYPE") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$mas_services_billing_list->SERVICE_TYPE->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing_list->SERVICE_TYPE->caption() ?>" data-title="<?php echo $mas_services_billing_list->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE',url:'mas_services_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $mas_services_billing_list->SERVICE_TYPE->Lookup->getParamTag($mas_services_billing_list, "p_x" . $mas_services_billing_list->RowIndex . "_SERVICE_TYPE") ?>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($mas_services_billing_list->SERVICE_TYPE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_DEPARTMENT" class="form-group mas_services_billing_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_DEPARTMENT" data-value-separator="<?php echo $mas_services_billing_list->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT"<?php echo $mas_services_billing_list->DEPARTMENT->editAttributes() ?>>
			<?php echo $mas_services_billing_list->DEPARTMENT->selectOptionListHtml("x{$mas_services_billing_list->RowIndex}_DEPARTMENT") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$mas_services_billing_list->DEPARTMENT->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing_list->DEPARTMENT->caption() ?>" data-title="<?php echo $mas_services_billing_list->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT',url:'mas_billing_departmentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $mas_services_billing_list->DEPARTMENT->Lookup->getParamTag($mas_services_billing_list, "p_x" . $mas_services_billing_list->RowIndex . "_DEPARTMENT") ?>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DEPARTMENT" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($mas_services_billing_list->DEPARTMENT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td data-name="mas_services_billingcol">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_mas_services_billingcol" class="form-group mas_services_billing_mas_services_billingcol">
<input type="text" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="x<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" id="x<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->mas_services_billingcol->EditValue ?>"<?php echo $mas_services_billing_list->mas_services_billingcol->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="o<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" id="o<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" value="<?php echo HtmlEncode($mas_services_billing_list->mas_services_billingcol->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_DrShareAmount" class="form-group mas_services_billing_DrShareAmount">
<input type="text" data-table="mas_services_billing" data-field="x_DrShareAmount" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->DrShareAmount->EditValue ?>"<?php echo $mas_services_billing_list->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrShareAmount" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($mas_services_billing_list->DrShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_HospShareAmount" class="form-group mas_services_billing_HospShareAmount">
<input type="text" data-table="mas_services_billing" data-field="x_HospShareAmount" name="x<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" id="x<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->HospShareAmount->EditValue ?>"<?php echo $mas_services_billing_list->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospShareAmount" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($mas_services_billing_list->HospShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->DrSharePer->Visible) { // DrSharePer ?>
		<td data-name="DrSharePer">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_DrSharePer" class="form-group mas_services_billing_DrSharePer">
<input type="text" data-table="mas_services_billing" data-field="x_DrSharePer" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->DrSharePer->EditValue ?>"<?php echo $mas_services_billing_list->DrSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrSharePer" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" value="<?php echo HtmlEncode($mas_services_billing_list->DrSharePer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->HospSharePer->Visible) { // HospSharePer ?>
		<td data-name="HospSharePer">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_HospSharePer" class="form-group mas_services_billing_HospSharePer">
<input type="text" data-table="mas_services_billing" data-field="x_HospSharePer" name="x<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" id="x<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->HospSharePer->EditValue ?>"<?php echo $mas_services_billing_list->HospSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospSharePer" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" value="<?php echo HtmlEncode($mas_services_billing_list->HospSharePer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="mas_services_billing" data-field="x_HospID" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospID" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($mas_services_billing_list->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_TestSubCd" class="form-group mas_services_billing_TestSubCd">
<input type="text" data-table="mas_services_billing" data-field="x_TestSubCd" name="x<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" id="x<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->TestSubCd->EditValue ?>"<?php echo $mas_services_billing_list->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestSubCd" name="o<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" id="o<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($mas_services_billing_list->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Method->Visible) { // Method ?>
		<td data-name="Method">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Method" class="form-group mas_services_billing_Method">
<input type="text" data-table="mas_services_billing" data-field="x_Method" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Method" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Method->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Method->EditValue ?>"<?php echo $mas_services_billing_list->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Method" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Method" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($mas_services_billing_list->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Order->Visible) { // Order ?>
		<td data-name="Order">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Order" class="form-group mas_services_billing_Order">
<input type="text" data-table="mas_services_billing" data-field="x_Order" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Order" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Order->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Order->EditValue ?>"<?php echo $mas_services_billing_list->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Order" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Order" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($mas_services_billing_list->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->ResType->Visible) { // ResType ?>
		<td data-name="ResType">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_ResType" class="form-group mas_services_billing_ResType">
<input type="text" data-table="mas_services_billing" data-field="x_ResType" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ResType" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->ResType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->ResType->EditValue ?>"<?php echo $mas_services_billing_list->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ResType" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ResType" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($mas_services_billing_list->ResType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_UnitCD" class="form-group mas_services_billing_UnitCD">
<input type="text" data-table="mas_services_billing" data-field="x_UnitCD" name="x<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" id="x<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->UnitCD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->UnitCD->EditValue ?>"<?php echo $mas_services_billing_list->UnitCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UnitCD" name="o<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" id="o<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($mas_services_billing_list->UnitCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Sample->Visible) { // Sample ?>
		<td data-name="Sample">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Sample" class="form-group mas_services_billing_Sample">
<input type="text" data-table="mas_services_billing" data-field="x_Sample" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Sample" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Sample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Sample->EditValue ?>"<?php echo $mas_services_billing_list->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Sample" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Sample" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($mas_services_billing_list->Sample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->NoD->Visible) { // NoD ?>
		<td data-name="NoD">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_NoD" class="form-group mas_services_billing_NoD">
<input type="text" data-table="mas_services_billing" data-field="x_NoD" name="x<?php echo $mas_services_billing_list->RowIndex ?>_NoD" id="x<?php echo $mas_services_billing_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->NoD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->NoD->EditValue ?>"<?php echo $mas_services_billing_list->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoD" name="o<?php echo $mas_services_billing_list->RowIndex ?>_NoD" id="o<?php echo $mas_services_billing_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($mas_services_billing_list->NoD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_BillOrder" class="form-group mas_services_billing_BillOrder">
<input type="text" data-table="mas_services_billing" data-field="x_BillOrder" name="x<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" id="x<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->BillOrder->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->BillOrder->EditValue ?>"<?php echo $mas_services_billing_list->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_BillOrder" name="o<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" id="o<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($mas_services_billing_list->BillOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Inactive" class="form-group mas_services_billing_Inactive">
<input type="text" data-table="mas_services_billing" data-field="x_Inactive" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Inactive->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Inactive->EditValue ?>"<?php echo $mas_services_billing_list->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Inactive" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($mas_services_billing_list->Inactive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Outsource" class="form-group mas_services_billing_Outsource">
<input type="text" data-table="mas_services_billing" data-field="x_Outsource" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Outsource->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Outsource->EditValue ?>"<?php echo $mas_services_billing_list->Outsource->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Outsource" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($mas_services_billing_list->Outsource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_CollSample" class="form-group mas_services_billing_CollSample">
<input type="text" data-table="mas_services_billing" data-field="x_CollSample" name="x<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" id="x<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->CollSample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->CollSample->EditValue ?>"<?php echo $mas_services_billing_list->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CollSample" name="o<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" id="o<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($mas_services_billing_list->CollSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_TestType" class="form-group mas_services_billing_TestType">
<input type="text" data-table="mas_services_billing" data-field="x_TestType" name="x<?php echo $mas_services_billing_list->RowIndex ?>_TestType" id="x<?php echo $mas_services_billing_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->TestType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->TestType->EditValue ?>"<?php echo $mas_services_billing_list->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestType" name="o<?php echo $mas_services_billing_list->RowIndex ?>_TestType" id="o<?php echo $mas_services_billing_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($mas_services_billing_list->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->NoHeading->Visible) { // NoHeading ?>
		<td data-name="NoHeading">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_NoHeading" class="form-group mas_services_billing_NoHeading">
<input type="text" data-table="mas_services_billing" data-field="x_NoHeading" name="x<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" id="x<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->NoHeading->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->NoHeading->EditValue ?>"<?php echo $mas_services_billing_list->NoHeading->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoHeading" name="o<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" id="o<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" value="<?php echo HtmlEncode($mas_services_billing_list->NoHeading->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->ChemicalCode->Visible) { // ChemicalCode ?>
		<td data-name="ChemicalCode">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_ChemicalCode" class="form-group mas_services_billing_ChemicalCode">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalCode" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->ChemicalCode->EditValue ?>"<?php echo $mas_services_billing_list->ChemicalCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalCode" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" value="<?php echo HtmlEncode($mas_services_billing_list->ChemicalCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->ChemicalName->Visible) { // ChemicalName ?>
		<td data-name="ChemicalName">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_ChemicalName" class="form-group mas_services_billing_ChemicalName">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalName" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->ChemicalName->EditValue ?>"<?php echo $mas_services_billing_list->ChemicalName->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalName" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" value="<?php echo HtmlEncode($mas_services_billing_list->ChemicalName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Utilaization->Visible) { // Utilaization ?>
		<td data-name="Utilaization">
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Utilaization" class="form-group mas_services_billing_Utilaization">
<input type="text" data-table="mas_services_billing" data-field="x_Utilaization" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Utilaization->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Utilaization->EditValue ?>"<?php echo $mas_services_billing_list->Utilaization->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Utilaization" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" value="<?php echo HtmlEncode($mas_services_billing_list->Utilaization->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_services_billing_list->ListOptions->render("body", "right", $mas_services_billing_list->RowCount);
?>
<script>
loadjs.ready(["fmas_services_billinglist", "load"], function() {
	fmas_services_billinglist.updateLists(<?php echo $mas_services_billing_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($mas_services_billing_list->ExportAll && $mas_services_billing_list->isExport()) {
	$mas_services_billing_list->StopRecord = $mas_services_billing_list->TotalRecords;
} else {

	// Set the last record to display
	if ($mas_services_billing_list->TotalRecords > $mas_services_billing_list->StartRecord + $mas_services_billing_list->DisplayRecords - 1)
		$mas_services_billing_list->StopRecord = $mas_services_billing_list->StartRecord + $mas_services_billing_list->DisplayRecords - 1;
	else
		$mas_services_billing_list->StopRecord = $mas_services_billing_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($mas_services_billing->isConfirm() || $mas_services_billing_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($mas_services_billing_list->FormKeyCountName) && ($mas_services_billing_list->isGridAdd() || $mas_services_billing_list->isGridEdit() || $mas_services_billing->isConfirm())) {
		$mas_services_billing_list->KeyCount = $CurrentForm->getValue($mas_services_billing_list->FormKeyCountName);
		$mas_services_billing_list->StopRecord = $mas_services_billing_list->StartRecord + $mas_services_billing_list->KeyCount - 1;
	}
}
$mas_services_billing_list->RecordCount = $mas_services_billing_list->StartRecord - 1;
if ($mas_services_billing_list->Recordset && !$mas_services_billing_list->Recordset->EOF) {
	$mas_services_billing_list->Recordset->moveFirst();
	$selectLimit = $mas_services_billing_list->UseSelectLimit;
	if (!$selectLimit && $mas_services_billing_list->StartRecord > 1)
		$mas_services_billing_list->Recordset->move($mas_services_billing_list->StartRecord - 1);
} elseif (!$mas_services_billing->AllowAddDeleteRow && $mas_services_billing_list->StopRecord == 0) {
	$mas_services_billing_list->StopRecord = $mas_services_billing->GridAddRowCount;
}

// Initialize aggregate
$mas_services_billing->RowType = ROWTYPE_AGGREGATEINIT;
$mas_services_billing->resetAttributes();
$mas_services_billing_list->renderRow();
$mas_services_billing_list->EditRowCount = 0;
if ($mas_services_billing_list->isEdit())
	$mas_services_billing_list->RowIndex = 1;
if ($mas_services_billing_list->isGridAdd())
	$mas_services_billing_list->RowIndex = 0;
if ($mas_services_billing_list->isGridEdit())
	$mas_services_billing_list->RowIndex = 0;
while ($mas_services_billing_list->RecordCount < $mas_services_billing_list->StopRecord) {
	$mas_services_billing_list->RecordCount++;
	if ($mas_services_billing_list->RecordCount >= $mas_services_billing_list->StartRecord) {
		$mas_services_billing_list->RowCount++;
		if ($mas_services_billing_list->isGridAdd() || $mas_services_billing_list->isGridEdit() || $mas_services_billing->isConfirm()) {
			$mas_services_billing_list->RowIndex++;
			$CurrentForm->Index = $mas_services_billing_list->RowIndex;
			if ($CurrentForm->hasValue($mas_services_billing_list->FormActionName) && ($mas_services_billing->isConfirm() || $mas_services_billing_list->EventCancelled))
				$mas_services_billing_list->RowAction = strval($CurrentForm->getValue($mas_services_billing_list->FormActionName));
			elseif ($mas_services_billing_list->isGridAdd())
				$mas_services_billing_list->RowAction = "insert";
			else
				$mas_services_billing_list->RowAction = "";
		}

		// Set up key count
		$mas_services_billing_list->KeyCount = $mas_services_billing_list->RowIndex;

		// Init row class and style
		$mas_services_billing->resetAttributes();
		$mas_services_billing->CssClass = "";
		if ($mas_services_billing_list->isGridAdd()) {
			$mas_services_billing_list->loadRowValues(); // Load default values
		} else {
			$mas_services_billing_list->loadRowValues($mas_services_billing_list->Recordset); // Load row values
		}
		$mas_services_billing->RowType = ROWTYPE_VIEW; // Render view
		if ($mas_services_billing_list->isGridAdd()) // Grid add
			$mas_services_billing->RowType = ROWTYPE_ADD; // Render add
		if ($mas_services_billing_list->isGridAdd() && $mas_services_billing->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$mas_services_billing_list->restoreCurrentRowFormValues($mas_services_billing_list->RowIndex); // Restore form values
		if ($mas_services_billing_list->isEdit()) {
			if ($mas_services_billing_list->checkInlineEditKey() && $mas_services_billing_list->EditRowCount == 0) { // Inline edit
				$mas_services_billing->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($mas_services_billing_list->isGridEdit()) { // Grid edit
			if ($mas_services_billing->EventCancelled)
				$mas_services_billing_list->restoreCurrentRowFormValues($mas_services_billing_list->RowIndex); // Restore form values
			if ($mas_services_billing_list->RowAction == "insert")
				$mas_services_billing->RowType = ROWTYPE_ADD; // Render add
			else
				$mas_services_billing->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($mas_services_billing_list->isEdit() && $mas_services_billing->RowType == ROWTYPE_EDIT && $mas_services_billing->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$mas_services_billing_list->restoreFormValues(); // Restore form values
		}
		if ($mas_services_billing_list->isGridEdit() && ($mas_services_billing->RowType == ROWTYPE_EDIT || $mas_services_billing->RowType == ROWTYPE_ADD) && $mas_services_billing->EventCancelled) // Update failed
			$mas_services_billing_list->restoreCurrentRowFormValues($mas_services_billing_list->RowIndex); // Restore form values
		if ($mas_services_billing->RowType == ROWTYPE_EDIT) // Edit row
			$mas_services_billing_list->EditRowCount++;

		// Set up row id / data-rowindex
		$mas_services_billing->RowAttrs->merge(["data-rowindex" => $mas_services_billing_list->RowCount, "id" => "r" . $mas_services_billing_list->RowCount . "_mas_services_billing", "data-rowtype" => $mas_services_billing->RowType]);

		// Render row
		$mas_services_billing_list->renderRow();

		// Render list options
		$mas_services_billing_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($mas_services_billing_list->RowAction != "delete" && $mas_services_billing_list->RowAction != "insertdelete" && !($mas_services_billing_list->RowAction == "insert" && $mas_services_billing->isConfirm() && $mas_services_billing_list->emptyRow())) {
?>
	<tr <?php echo $mas_services_billing->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_services_billing_list->ListOptions->render("body", "left", $mas_services_billing_list->RowCount);
?>
	<?php if ($mas_services_billing_list->Id->Visible) { // Id ?>
		<td data-name="Id" <?php echo $mas_services_billing_list->Id->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Id" class="form-group"></span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Id" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Id" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($mas_services_billing_list->Id->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Id" class="form-group">
<span<?php echo $mas_services_billing_list->Id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mas_services_billing_list->Id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Id" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Id" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($mas_services_billing_list->Id->CurrentValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Id">
<span<?php echo $mas_services_billing_list->Id->viewAttributes() ?>><?php echo $mas_services_billing_list->Id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->CODE->Visible) { // CODE ?>
		<td data-name="CODE" <?php echo $mas_services_billing_list->CODE->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_CODE" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_CODE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_CODE" id="x<?php echo $mas_services_billing_list->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing_list->CODE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->CODE->EditValue ?>"<?php echo $mas_services_billing_list->CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CODE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_CODE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_CODE" value="<?php echo HtmlEncode($mas_services_billing_list->CODE->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_CODE" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_CODE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_CODE" id="x<?php echo $mas_services_billing_list->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing_list->CODE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->CODE->EditValue ?>"<?php echo $mas_services_billing_list->CODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_CODE">
<span<?php echo $mas_services_billing_list->CODE->viewAttributes() ?>><?php echo $mas_services_billing_list->CODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE" <?php echo $mas_services_billing_list->SERVICE->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_SERVICE" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_SERVICE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" id="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing_list->SERVICE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->SERVICE->EditValue ?>"<?php echo $mas_services_billing_list->SERVICE->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($mas_services_billing_list->SERVICE->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_SERVICE" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_SERVICE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" id="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing_list->SERVICE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->SERVICE->EditValue ?>"<?php echo $mas_services_billing_list->SERVICE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_SERVICE">
<span<?php echo $mas_services_billing_list->SERVICE->viewAttributes() ?>><?php echo $mas_services_billing_list->SERVICE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS" <?php echo $mas_services_billing_list->UNITS->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_UNITS" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_UNITS" name="x<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" id="x<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->UNITS->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->UNITS->EditValue ?>"<?php echo $mas_services_billing_list->UNITS->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UNITS" name="o<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" id="o<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($mas_services_billing_list->UNITS->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_UNITS" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_UNITS" name="x<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" id="x<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->UNITS->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->UNITS->EditValue ?>"<?php echo $mas_services_billing_list->UNITS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_UNITS">
<span<?php echo $mas_services_billing_list->UNITS->viewAttributes() ?>><?php echo $mas_services_billing_list->UNITS->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->AMOUNT->Visible) { // AMOUNT ?>
		<td data-name="AMOUNT" <?php echo $mas_services_billing_list->AMOUNT->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_AMOUNT" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_AMOUNT" name="x<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" id="x<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing_list->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->AMOUNT->EditValue ?>"<?php echo $mas_services_billing_list->AMOUNT->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_AMOUNT" name="o<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" id="o<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" value="<?php echo HtmlEncode($mas_services_billing_list->AMOUNT->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_AMOUNT" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_AMOUNT" name="x<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" id="x<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing_list->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->AMOUNT->EditValue ?>"<?php echo $mas_services_billing_list->AMOUNT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_AMOUNT">
<span<?php echo $mas_services_billing_list->AMOUNT->viewAttributes() ?>><?php echo $mas_services_billing_list->AMOUNT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE" <?php echo $mas_services_billing_list->SERVICE_TYPE->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_SERVICE_TYPE" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $mas_services_billing_list->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE"<?php echo $mas_services_billing_list->SERVICE_TYPE->editAttributes() ?>>
			<?php echo $mas_services_billing_list->SERVICE_TYPE->selectOptionListHtml("x{$mas_services_billing_list->RowIndex}_SERVICE_TYPE") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$mas_services_billing_list->SERVICE_TYPE->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing_list->SERVICE_TYPE->caption() ?>" data-title="<?php echo $mas_services_billing_list->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE',url:'mas_services_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $mas_services_billing_list->SERVICE_TYPE->Lookup->getParamTag($mas_services_billing_list, "p_x" . $mas_services_billing_list->RowIndex . "_SERVICE_TYPE") ?>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($mas_services_billing_list->SERVICE_TYPE->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_SERVICE_TYPE" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $mas_services_billing_list->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE"<?php echo $mas_services_billing_list->SERVICE_TYPE->editAttributes() ?>>
			<?php echo $mas_services_billing_list->SERVICE_TYPE->selectOptionListHtml("x{$mas_services_billing_list->RowIndex}_SERVICE_TYPE") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$mas_services_billing_list->SERVICE_TYPE->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing_list->SERVICE_TYPE->caption() ?>" data-title="<?php echo $mas_services_billing_list->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE',url:'mas_services_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $mas_services_billing_list->SERVICE_TYPE->Lookup->getParamTag($mas_services_billing_list, "p_x" . $mas_services_billing_list->RowIndex . "_SERVICE_TYPE") ?>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_SERVICE_TYPE">
<span<?php echo $mas_services_billing_list->SERVICE_TYPE->viewAttributes() ?>><?php echo $mas_services_billing_list->SERVICE_TYPE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT" <?php echo $mas_services_billing_list->DEPARTMENT->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_DEPARTMENT" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_DEPARTMENT" data-value-separator="<?php echo $mas_services_billing_list->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT"<?php echo $mas_services_billing_list->DEPARTMENT->editAttributes() ?>>
			<?php echo $mas_services_billing_list->DEPARTMENT->selectOptionListHtml("x{$mas_services_billing_list->RowIndex}_DEPARTMENT") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$mas_services_billing_list->DEPARTMENT->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing_list->DEPARTMENT->caption() ?>" data-title="<?php echo $mas_services_billing_list->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT',url:'mas_billing_departmentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $mas_services_billing_list->DEPARTMENT->Lookup->getParamTag($mas_services_billing_list, "p_x" . $mas_services_billing_list->RowIndex . "_DEPARTMENT") ?>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DEPARTMENT" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($mas_services_billing_list->DEPARTMENT->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_DEPARTMENT" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_DEPARTMENT" data-value-separator="<?php echo $mas_services_billing_list->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT"<?php echo $mas_services_billing_list->DEPARTMENT->editAttributes() ?>>
			<?php echo $mas_services_billing_list->DEPARTMENT->selectOptionListHtml("x{$mas_services_billing_list->RowIndex}_DEPARTMENT") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$mas_services_billing_list->DEPARTMENT->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing_list->DEPARTMENT->caption() ?>" data-title="<?php echo $mas_services_billing_list->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT',url:'mas_billing_departmentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $mas_services_billing_list->DEPARTMENT->Lookup->getParamTag($mas_services_billing_list, "p_x" . $mas_services_billing_list->RowIndex . "_DEPARTMENT") ?>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_DEPARTMENT">
<span<?php echo $mas_services_billing_list->DEPARTMENT->viewAttributes() ?>><?php echo $mas_services_billing_list->DEPARTMENT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td data-name="mas_services_billingcol" <?php echo $mas_services_billing_list->mas_services_billingcol->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_mas_services_billingcol" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="x<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" id="x<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->mas_services_billingcol->EditValue ?>"<?php echo $mas_services_billing_list->mas_services_billingcol->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="o<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" id="o<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" value="<?php echo HtmlEncode($mas_services_billing_list->mas_services_billingcol->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_mas_services_billingcol" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="x<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" id="x<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->mas_services_billingcol->EditValue ?>"<?php echo $mas_services_billing_list->mas_services_billingcol->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_mas_services_billingcol">
<span<?php echo $mas_services_billing_list->mas_services_billingcol->viewAttributes() ?>><?php echo $mas_services_billing_list->mas_services_billingcol->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount" <?php echo $mas_services_billing_list->DrShareAmount->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_DrShareAmount" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_DrShareAmount" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->DrShareAmount->EditValue ?>"<?php echo $mas_services_billing_list->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrShareAmount" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($mas_services_billing_list->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_DrShareAmount" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_DrShareAmount" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->DrShareAmount->EditValue ?>"<?php echo $mas_services_billing_list->DrShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_DrShareAmount">
<span<?php echo $mas_services_billing_list->DrShareAmount->viewAttributes() ?>><?php echo $mas_services_billing_list->DrShareAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount" <?php echo $mas_services_billing_list->HospShareAmount->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_HospShareAmount" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_HospShareAmount" name="x<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" id="x<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->HospShareAmount->EditValue ?>"<?php echo $mas_services_billing_list->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospShareAmount" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($mas_services_billing_list->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_HospShareAmount" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_HospShareAmount" name="x<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" id="x<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->HospShareAmount->EditValue ?>"<?php echo $mas_services_billing_list->HospShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_HospShareAmount">
<span<?php echo $mas_services_billing_list->HospShareAmount->viewAttributes() ?>><?php echo $mas_services_billing_list->HospShareAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->DrSharePer->Visible) { // DrSharePer ?>
		<td data-name="DrSharePer" <?php echo $mas_services_billing_list->DrSharePer->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_DrSharePer" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_DrSharePer" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->DrSharePer->EditValue ?>"<?php echo $mas_services_billing_list->DrSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrSharePer" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" value="<?php echo HtmlEncode($mas_services_billing_list->DrSharePer->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_DrSharePer" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_DrSharePer" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->DrSharePer->EditValue ?>"<?php echo $mas_services_billing_list->DrSharePer->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_DrSharePer">
<span<?php echo $mas_services_billing_list->DrSharePer->viewAttributes() ?>><?php echo $mas_services_billing_list->DrSharePer->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->HospSharePer->Visible) { // HospSharePer ?>
		<td data-name="HospSharePer" <?php echo $mas_services_billing_list->HospSharePer->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_HospSharePer" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_HospSharePer" name="x<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" id="x<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->HospSharePer->EditValue ?>"<?php echo $mas_services_billing_list->HospSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospSharePer" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" value="<?php echo HtmlEncode($mas_services_billing_list->HospSharePer->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_HospSharePer" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_HospSharePer" name="x<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" id="x<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->HospSharePer->EditValue ?>"<?php echo $mas_services_billing_list->HospSharePer->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_HospSharePer">
<span<?php echo $mas_services_billing_list->HospSharePer->viewAttributes() ?>><?php echo $mas_services_billing_list->HospSharePer->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $mas_services_billing_list->HospID->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospID" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospID" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($mas_services_billing_list->HospID->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_HospID">
<span<?php echo $mas_services_billing_list->HospID->viewAttributes() ?>><?php echo $mas_services_billing_list->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" <?php echo $mas_services_billing_list->TestSubCd->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_TestSubCd" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_TestSubCd" name="x<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" id="x<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->TestSubCd->EditValue ?>"<?php echo $mas_services_billing_list->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestSubCd" name="o<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" id="o<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($mas_services_billing_list->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_TestSubCd" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_TestSubCd" name="x<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" id="x<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->TestSubCd->EditValue ?>"<?php echo $mas_services_billing_list->TestSubCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_TestSubCd">
<span<?php echo $mas_services_billing_list->TestSubCd->viewAttributes() ?>><?php echo $mas_services_billing_list->TestSubCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Method->Visible) { // Method ?>
		<td data-name="Method" <?php echo $mas_services_billing_list->Method->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Method" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_Method" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Method" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Method->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Method->EditValue ?>"<?php echo $mas_services_billing_list->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Method" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Method" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($mas_services_billing_list->Method->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Method" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_Method" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Method" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Method->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Method->EditValue ?>"<?php echo $mas_services_billing_list->Method->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Method">
<span<?php echo $mas_services_billing_list->Method->viewAttributes() ?>><?php echo $mas_services_billing_list->Method->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Order->Visible) { // Order ?>
		<td data-name="Order" <?php echo $mas_services_billing_list->Order->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Order" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_Order" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Order" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Order->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Order->EditValue ?>"<?php echo $mas_services_billing_list->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Order" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Order" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($mas_services_billing_list->Order->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Order" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_Order" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Order" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Order->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Order->EditValue ?>"<?php echo $mas_services_billing_list->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Order">
<span<?php echo $mas_services_billing_list->Order->viewAttributes() ?>><?php echo $mas_services_billing_list->Order->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->ResType->Visible) { // ResType ?>
		<td data-name="ResType" <?php echo $mas_services_billing_list->ResType->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_ResType" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_ResType" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ResType" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->ResType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->ResType->EditValue ?>"<?php echo $mas_services_billing_list->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ResType" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ResType" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($mas_services_billing_list->ResType->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_ResType" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_ResType" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ResType" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->ResType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->ResType->EditValue ?>"<?php echo $mas_services_billing_list->ResType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_ResType">
<span<?php echo $mas_services_billing_list->ResType->viewAttributes() ?>><?php echo $mas_services_billing_list->ResType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD" <?php echo $mas_services_billing_list->UnitCD->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_UnitCD" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_UnitCD" name="x<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" id="x<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->UnitCD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->UnitCD->EditValue ?>"<?php echo $mas_services_billing_list->UnitCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UnitCD" name="o<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" id="o<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($mas_services_billing_list->UnitCD->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_UnitCD" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_UnitCD" name="x<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" id="x<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->UnitCD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->UnitCD->EditValue ?>"<?php echo $mas_services_billing_list->UnitCD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_UnitCD">
<span<?php echo $mas_services_billing_list->UnitCD->viewAttributes() ?>><?php echo $mas_services_billing_list->UnitCD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Sample->Visible) { // Sample ?>
		<td data-name="Sample" <?php echo $mas_services_billing_list->Sample->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Sample" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_Sample" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Sample" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Sample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Sample->EditValue ?>"<?php echo $mas_services_billing_list->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Sample" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Sample" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($mas_services_billing_list->Sample->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Sample" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_Sample" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Sample" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Sample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Sample->EditValue ?>"<?php echo $mas_services_billing_list->Sample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Sample">
<span<?php echo $mas_services_billing_list->Sample->viewAttributes() ?>><?php echo $mas_services_billing_list->Sample->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->NoD->Visible) { // NoD ?>
		<td data-name="NoD" <?php echo $mas_services_billing_list->NoD->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_NoD" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_NoD" name="x<?php echo $mas_services_billing_list->RowIndex ?>_NoD" id="x<?php echo $mas_services_billing_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->NoD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->NoD->EditValue ?>"<?php echo $mas_services_billing_list->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoD" name="o<?php echo $mas_services_billing_list->RowIndex ?>_NoD" id="o<?php echo $mas_services_billing_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($mas_services_billing_list->NoD->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_NoD" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_NoD" name="x<?php echo $mas_services_billing_list->RowIndex ?>_NoD" id="x<?php echo $mas_services_billing_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->NoD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->NoD->EditValue ?>"<?php echo $mas_services_billing_list->NoD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_NoD">
<span<?php echo $mas_services_billing_list->NoD->viewAttributes() ?>><?php echo $mas_services_billing_list->NoD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder" <?php echo $mas_services_billing_list->BillOrder->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_BillOrder" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_BillOrder" name="x<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" id="x<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->BillOrder->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->BillOrder->EditValue ?>"<?php echo $mas_services_billing_list->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_BillOrder" name="o<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" id="o<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($mas_services_billing_list->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_BillOrder" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_BillOrder" name="x<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" id="x<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->BillOrder->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->BillOrder->EditValue ?>"<?php echo $mas_services_billing_list->BillOrder->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_BillOrder">
<span<?php echo $mas_services_billing_list->BillOrder->viewAttributes() ?>><?php echo $mas_services_billing_list->BillOrder->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive" <?php echo $mas_services_billing_list->Inactive->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Inactive" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_Inactive" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Inactive->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Inactive->EditValue ?>"<?php echo $mas_services_billing_list->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Inactive" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($mas_services_billing_list->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Inactive" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_Inactive" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Inactive->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Inactive->EditValue ?>"<?php echo $mas_services_billing_list->Inactive->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Inactive">
<span<?php echo $mas_services_billing_list->Inactive->viewAttributes() ?>><?php echo $mas_services_billing_list->Inactive->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource" <?php echo $mas_services_billing_list->Outsource->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Outsource" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_Outsource" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Outsource->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Outsource->EditValue ?>"<?php echo $mas_services_billing_list->Outsource->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Outsource" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($mas_services_billing_list->Outsource->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Outsource" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_Outsource" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Outsource->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Outsource->EditValue ?>"<?php echo $mas_services_billing_list->Outsource->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Outsource">
<span<?php echo $mas_services_billing_list->Outsource->viewAttributes() ?>><?php echo $mas_services_billing_list->Outsource->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample" <?php echo $mas_services_billing_list->CollSample->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_CollSample" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_CollSample" name="x<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" id="x<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->CollSample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->CollSample->EditValue ?>"<?php echo $mas_services_billing_list->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CollSample" name="o<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" id="o<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($mas_services_billing_list->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_CollSample" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_CollSample" name="x<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" id="x<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->CollSample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->CollSample->EditValue ?>"<?php echo $mas_services_billing_list->CollSample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_CollSample">
<span<?php echo $mas_services_billing_list->CollSample->viewAttributes() ?>><?php echo $mas_services_billing_list->CollSample->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->TestType->Visible) { // TestType ?>
		<td data-name="TestType" <?php echo $mas_services_billing_list->TestType->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_TestType" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_TestType" name="x<?php echo $mas_services_billing_list->RowIndex ?>_TestType" id="x<?php echo $mas_services_billing_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->TestType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->TestType->EditValue ?>"<?php echo $mas_services_billing_list->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestType" name="o<?php echo $mas_services_billing_list->RowIndex ?>_TestType" id="o<?php echo $mas_services_billing_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($mas_services_billing_list->TestType->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_TestType" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_TestType" name="x<?php echo $mas_services_billing_list->RowIndex ?>_TestType" id="x<?php echo $mas_services_billing_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->TestType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->TestType->EditValue ?>"<?php echo $mas_services_billing_list->TestType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_TestType">
<span<?php echo $mas_services_billing_list->TestType->viewAttributes() ?>><?php echo $mas_services_billing_list->TestType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->NoHeading->Visible) { // NoHeading ?>
		<td data-name="NoHeading" <?php echo $mas_services_billing_list->NoHeading->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_NoHeading" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_NoHeading" name="x<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" id="x<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->NoHeading->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->NoHeading->EditValue ?>"<?php echo $mas_services_billing_list->NoHeading->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoHeading" name="o<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" id="o<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" value="<?php echo HtmlEncode($mas_services_billing_list->NoHeading->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_NoHeading" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_NoHeading" name="x<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" id="x<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->NoHeading->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->NoHeading->EditValue ?>"<?php echo $mas_services_billing_list->NoHeading->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_NoHeading">
<span<?php echo $mas_services_billing_list->NoHeading->viewAttributes() ?>><?php echo $mas_services_billing_list->NoHeading->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->ChemicalCode->Visible) { // ChemicalCode ?>
		<td data-name="ChemicalCode" <?php echo $mas_services_billing_list->ChemicalCode->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_ChemicalCode" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalCode" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->ChemicalCode->EditValue ?>"<?php echo $mas_services_billing_list->ChemicalCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalCode" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" value="<?php echo HtmlEncode($mas_services_billing_list->ChemicalCode->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_ChemicalCode" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalCode" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->ChemicalCode->EditValue ?>"<?php echo $mas_services_billing_list->ChemicalCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_ChemicalCode">
<span<?php echo $mas_services_billing_list->ChemicalCode->viewAttributes() ?>><?php echo $mas_services_billing_list->ChemicalCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->ChemicalName->Visible) { // ChemicalName ?>
		<td data-name="ChemicalName" <?php echo $mas_services_billing_list->ChemicalName->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_ChemicalName" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalName" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->ChemicalName->EditValue ?>"<?php echo $mas_services_billing_list->ChemicalName->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalName" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" value="<?php echo HtmlEncode($mas_services_billing_list->ChemicalName->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_ChemicalName" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalName" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->ChemicalName->EditValue ?>"<?php echo $mas_services_billing_list->ChemicalName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_ChemicalName">
<span<?php echo $mas_services_billing_list->ChemicalName->viewAttributes() ?>><?php echo $mas_services_billing_list->ChemicalName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Utilaization->Visible) { // Utilaization ?>
		<td data-name="Utilaization" <?php echo $mas_services_billing_list->Utilaization->cellAttributes() ?>>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Utilaization" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_Utilaization" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Utilaization->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Utilaization->EditValue ?>"<?php echo $mas_services_billing_list->Utilaization->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Utilaization" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" value="<?php echo HtmlEncode($mas_services_billing_list->Utilaization->OldValue) ?>">
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Utilaization" class="form-group">
<input type="text" data-table="mas_services_billing" data-field="x_Utilaization" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Utilaization->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Utilaization->EditValue ?>"<?php echo $mas_services_billing_list->Utilaization->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_services_billing->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_services_billing_list->RowCount ?>_mas_services_billing_Utilaization">
<span<?php echo $mas_services_billing_list->Utilaization->viewAttributes() ?>><?php echo $mas_services_billing_list->Utilaization->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_services_billing_list->ListOptions->render("body", "right", $mas_services_billing_list->RowCount);
?>
	</tr>
<?php if ($mas_services_billing->RowType == ROWTYPE_ADD || $mas_services_billing->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fmas_services_billinglist", "load"], function() {
	fmas_services_billinglist.updateLists(<?php echo $mas_services_billing_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$mas_services_billing_list->isGridAdd())
		if (!$mas_services_billing_list->Recordset->EOF)
			$mas_services_billing_list->Recordset->moveNext();
}
?>
<?php
	if ($mas_services_billing_list->isGridAdd() || $mas_services_billing_list->isGridEdit()) {
		$mas_services_billing_list->RowIndex = '$rowindex$';
		$mas_services_billing_list->loadRowValues();

		// Set row properties
		$mas_services_billing->resetAttributes();
		$mas_services_billing->RowAttrs->merge(["data-rowindex" => $mas_services_billing_list->RowIndex, "id" => "r0_mas_services_billing", "data-rowtype" => ROWTYPE_ADD]);
		$mas_services_billing->RowAttrs->appendClass("ew-template");
		$mas_services_billing->RowType = ROWTYPE_ADD;

		// Render row
		$mas_services_billing_list->renderRow();

		// Render list options
		$mas_services_billing_list->renderListOptions();
		$mas_services_billing_list->StartRowCount = 0;
?>
	<tr <?php echo $mas_services_billing->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_services_billing_list->ListOptions->render("body", "left", $mas_services_billing_list->RowIndex);
?>
	<?php if ($mas_services_billing_list->Id->Visible) { // Id ?>
		<td data-name="Id">
<span id="el$rowindex$_mas_services_billing_Id" class="form-group mas_services_billing_Id"></span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Id" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Id" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($mas_services_billing_list->Id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->CODE->Visible) { // CODE ?>
		<td data-name="CODE">
<span id="el$rowindex$_mas_services_billing_CODE" class="form-group mas_services_billing_CODE">
<input type="text" data-table="mas_services_billing" data-field="x_CODE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_CODE" id="x<?php echo $mas_services_billing_list->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing_list->CODE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->CODE->EditValue ?>"<?php echo $mas_services_billing_list->CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CODE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_CODE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_CODE" value="<?php echo HtmlEncode($mas_services_billing_list->CODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE">
<span id="el$rowindex$_mas_services_billing_SERVICE" class="form-group mas_services_billing_SERVICE">
<input type="text" data-table="mas_services_billing" data-field="x_SERVICE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" id="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing_list->SERVICE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->SERVICE->EditValue ?>"<?php echo $mas_services_billing_list->SERVICE->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($mas_services_billing_list->SERVICE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS">
<span id="el$rowindex$_mas_services_billing_UNITS" class="form-group mas_services_billing_UNITS">
<input type="text" data-table="mas_services_billing" data-field="x_UNITS" name="x<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" id="x<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->UNITS->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->UNITS->EditValue ?>"<?php echo $mas_services_billing_list->UNITS->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UNITS" name="o<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" id="o<?php echo $mas_services_billing_list->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($mas_services_billing_list->UNITS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->AMOUNT->Visible) { // AMOUNT ?>
		<td data-name="AMOUNT">
<span id="el$rowindex$_mas_services_billing_AMOUNT" class="form-group mas_services_billing_AMOUNT">
<input type="text" data-table="mas_services_billing" data-field="x_AMOUNT" name="x<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" id="x<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing_list->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->AMOUNT->EditValue ?>"<?php echo $mas_services_billing_list->AMOUNT->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_AMOUNT" name="o<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" id="o<?php echo $mas_services_billing_list->RowIndex ?>_AMOUNT" value="<?php echo HtmlEncode($mas_services_billing_list->AMOUNT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE">
<span id="el$rowindex$_mas_services_billing_SERVICE_TYPE" class="form-group mas_services_billing_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $mas_services_billing_list->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE"<?php echo $mas_services_billing_list->SERVICE_TYPE->editAttributes() ?>>
			<?php echo $mas_services_billing_list->SERVICE_TYPE->selectOptionListHtml("x{$mas_services_billing_list->RowIndex}_SERVICE_TYPE") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$mas_services_billing_list->SERVICE_TYPE->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing_list->SERVICE_TYPE->caption() ?>" data-title="<?php echo $mas_services_billing_list->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE',url:'mas_services_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $mas_services_billing_list->SERVICE_TYPE->Lookup->getParamTag($mas_services_billing_list, "p_x" . $mas_services_billing_list->RowIndex . "_SERVICE_TYPE") ?>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" name="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $mas_services_billing_list->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($mas_services_billing_list->SERVICE_TYPE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT">
<span id="el$rowindex$_mas_services_billing_DEPARTMENT" class="form-group mas_services_billing_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_DEPARTMENT" data-value-separator="<?php echo $mas_services_billing_list->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT"<?php echo $mas_services_billing_list->DEPARTMENT->editAttributes() ?>>
			<?php echo $mas_services_billing_list->DEPARTMENT->selectOptionListHtml("x{$mas_services_billing_list->RowIndex}_DEPARTMENT") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$mas_services_billing_list->DEPARTMENT->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing_list->DEPARTMENT->caption() ?>" data-title="<?php echo $mas_services_billing_list->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT',url:'mas_billing_departmentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $mas_services_billing_list->DEPARTMENT->Lookup->getParamTag($mas_services_billing_list, "p_x" . $mas_services_billing_list->RowIndex . "_DEPARTMENT") ?>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DEPARTMENT" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($mas_services_billing_list->DEPARTMENT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td data-name="mas_services_billingcol">
<span id="el$rowindex$_mas_services_billing_mas_services_billingcol" class="form-group mas_services_billing_mas_services_billingcol">
<input type="text" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="x<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" id="x<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->mas_services_billingcol->EditValue ?>"<?php echo $mas_services_billing_list->mas_services_billingcol->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="o<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" id="o<?php echo $mas_services_billing_list->RowIndex ?>_mas_services_billingcol" value="<?php echo HtmlEncode($mas_services_billing_list->mas_services_billingcol->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount">
<span id="el$rowindex$_mas_services_billing_DrShareAmount" class="form-group mas_services_billing_DrShareAmount">
<input type="text" data-table="mas_services_billing" data-field="x_DrShareAmount" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->DrShareAmount->EditValue ?>"<?php echo $mas_services_billing_list->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrShareAmount" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($mas_services_billing_list->DrShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount">
<span id="el$rowindex$_mas_services_billing_HospShareAmount" class="form-group mas_services_billing_HospShareAmount">
<input type="text" data-table="mas_services_billing" data-field="x_HospShareAmount" name="x<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" id="x<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->HospShareAmount->EditValue ?>"<?php echo $mas_services_billing_list->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospShareAmount" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($mas_services_billing_list->HospShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->DrSharePer->Visible) { // DrSharePer ?>
		<td data-name="DrSharePer">
<span id="el$rowindex$_mas_services_billing_DrSharePer" class="form-group mas_services_billing_DrSharePer">
<input type="text" data-table="mas_services_billing" data-field="x_DrSharePer" name="x<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" id="x<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->DrSharePer->EditValue ?>"<?php echo $mas_services_billing_list->DrSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrSharePer" name="o<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" id="o<?php echo $mas_services_billing_list->RowIndex ?>_DrSharePer" value="<?php echo HtmlEncode($mas_services_billing_list->DrSharePer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->HospSharePer->Visible) { // HospSharePer ?>
		<td data-name="HospSharePer">
<span id="el$rowindex$_mas_services_billing_HospSharePer" class="form-group mas_services_billing_HospSharePer">
<input type="text" data-table="mas_services_billing" data-field="x_HospSharePer" name="x<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" id="x<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->HospSharePer->EditValue ?>"<?php echo $mas_services_billing_list->HospSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospSharePer" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospSharePer" value="<?php echo HtmlEncode($mas_services_billing_list->HospSharePer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="mas_services_billing" data-field="x_HospID" name="o<?php echo $mas_services_billing_list->RowIndex ?>_HospID" id="o<?php echo $mas_services_billing_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($mas_services_billing_list->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<span id="el$rowindex$_mas_services_billing_TestSubCd" class="form-group mas_services_billing_TestSubCd">
<input type="text" data-table="mas_services_billing" data-field="x_TestSubCd" name="x<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" id="x<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->TestSubCd->EditValue ?>"<?php echo $mas_services_billing_list->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestSubCd" name="o<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" id="o<?php echo $mas_services_billing_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($mas_services_billing_list->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Method->Visible) { // Method ?>
		<td data-name="Method">
<span id="el$rowindex$_mas_services_billing_Method" class="form-group mas_services_billing_Method">
<input type="text" data-table="mas_services_billing" data-field="x_Method" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Method" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Method->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Method->EditValue ?>"<?php echo $mas_services_billing_list->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Method" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Method" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($mas_services_billing_list->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Order->Visible) { // Order ?>
		<td data-name="Order">
<span id="el$rowindex$_mas_services_billing_Order" class="form-group mas_services_billing_Order">
<input type="text" data-table="mas_services_billing" data-field="x_Order" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Order" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Order->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Order->EditValue ?>"<?php echo $mas_services_billing_list->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Order" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Order" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($mas_services_billing_list->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->ResType->Visible) { // ResType ?>
		<td data-name="ResType">
<span id="el$rowindex$_mas_services_billing_ResType" class="form-group mas_services_billing_ResType">
<input type="text" data-table="mas_services_billing" data-field="x_ResType" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ResType" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->ResType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->ResType->EditValue ?>"<?php echo $mas_services_billing_list->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ResType" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ResType" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($mas_services_billing_list->ResType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD">
<span id="el$rowindex$_mas_services_billing_UnitCD" class="form-group mas_services_billing_UnitCD">
<input type="text" data-table="mas_services_billing" data-field="x_UnitCD" name="x<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" id="x<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->UnitCD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->UnitCD->EditValue ?>"<?php echo $mas_services_billing_list->UnitCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UnitCD" name="o<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" id="o<?php echo $mas_services_billing_list->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($mas_services_billing_list->UnitCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Sample->Visible) { // Sample ?>
		<td data-name="Sample">
<span id="el$rowindex$_mas_services_billing_Sample" class="form-group mas_services_billing_Sample">
<input type="text" data-table="mas_services_billing" data-field="x_Sample" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Sample" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Sample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Sample->EditValue ?>"<?php echo $mas_services_billing_list->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Sample" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Sample" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($mas_services_billing_list->Sample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->NoD->Visible) { // NoD ?>
		<td data-name="NoD">
<span id="el$rowindex$_mas_services_billing_NoD" class="form-group mas_services_billing_NoD">
<input type="text" data-table="mas_services_billing" data-field="x_NoD" name="x<?php echo $mas_services_billing_list->RowIndex ?>_NoD" id="x<?php echo $mas_services_billing_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->NoD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->NoD->EditValue ?>"<?php echo $mas_services_billing_list->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoD" name="o<?php echo $mas_services_billing_list->RowIndex ?>_NoD" id="o<?php echo $mas_services_billing_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($mas_services_billing_list->NoD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder">
<span id="el$rowindex$_mas_services_billing_BillOrder" class="form-group mas_services_billing_BillOrder">
<input type="text" data-table="mas_services_billing" data-field="x_BillOrder" name="x<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" id="x<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_list->BillOrder->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->BillOrder->EditValue ?>"<?php echo $mas_services_billing_list->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_BillOrder" name="o<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" id="o<?php echo $mas_services_billing_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($mas_services_billing_list->BillOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive">
<span id="el$rowindex$_mas_services_billing_Inactive" class="form-group mas_services_billing_Inactive">
<input type="text" data-table="mas_services_billing" data-field="x_Inactive" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Inactive->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Inactive->EditValue ?>"<?php echo $mas_services_billing_list->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Inactive" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($mas_services_billing_list->Inactive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource">
<span id="el$rowindex$_mas_services_billing_Outsource" class="form-group mas_services_billing_Outsource">
<input type="text" data-table="mas_services_billing" data-field="x_Outsource" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Outsource->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Outsource->EditValue ?>"<?php echo $mas_services_billing_list->Outsource->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Outsource" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($mas_services_billing_list->Outsource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample">
<span id="el$rowindex$_mas_services_billing_CollSample" class="form-group mas_services_billing_CollSample">
<input type="text" data-table="mas_services_billing" data-field="x_CollSample" name="x<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" id="x<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->CollSample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->CollSample->EditValue ?>"<?php echo $mas_services_billing_list->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CollSample" name="o<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" id="o<?php echo $mas_services_billing_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($mas_services_billing_list->CollSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<span id="el$rowindex$_mas_services_billing_TestType" class="form-group mas_services_billing_TestType">
<input type="text" data-table="mas_services_billing" data-field="x_TestType" name="x<?php echo $mas_services_billing_list->RowIndex ?>_TestType" id="x<?php echo $mas_services_billing_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->TestType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->TestType->EditValue ?>"<?php echo $mas_services_billing_list->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestType" name="o<?php echo $mas_services_billing_list->RowIndex ?>_TestType" id="o<?php echo $mas_services_billing_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($mas_services_billing_list->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->NoHeading->Visible) { // NoHeading ?>
		<td data-name="NoHeading">
<span id="el$rowindex$_mas_services_billing_NoHeading" class="form-group mas_services_billing_NoHeading">
<input type="text" data-table="mas_services_billing" data-field="x_NoHeading" name="x<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" id="x<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->NoHeading->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->NoHeading->EditValue ?>"<?php echo $mas_services_billing_list->NoHeading->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoHeading" name="o<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" id="o<?php echo $mas_services_billing_list->RowIndex ?>_NoHeading" value="<?php echo HtmlEncode($mas_services_billing_list->NoHeading->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->ChemicalCode->Visible) { // ChemicalCode ?>
		<td data-name="ChemicalCode">
<span id="el$rowindex$_mas_services_billing_ChemicalCode" class="form-group mas_services_billing_ChemicalCode">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalCode" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->ChemicalCode->EditValue ?>"<?php echo $mas_services_billing_list->ChemicalCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalCode" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalCode" value="<?php echo HtmlEncode($mas_services_billing_list->ChemicalCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->ChemicalName->Visible) { // ChemicalName ?>
		<td data-name="ChemicalName">
<span id="el$rowindex$_mas_services_billing_ChemicalName" class="form-group mas_services_billing_ChemicalName">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalName" name="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" id="x<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->ChemicalName->EditValue ?>"<?php echo $mas_services_billing_list->ChemicalName->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalName" name="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" id="o<?php echo $mas_services_billing_list->RowIndex ?>_ChemicalName" value="<?php echo HtmlEncode($mas_services_billing_list->ChemicalName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_services_billing_list->Utilaization->Visible) { // Utilaization ?>
		<td data-name="Utilaization">
<span id="el$rowindex$_mas_services_billing_Utilaization" class="form-group mas_services_billing_Utilaization">
<input type="text" data-table="mas_services_billing" data-field="x_Utilaization" name="x<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" id="x<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_list->Utilaization->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_list->Utilaization->EditValue ?>"<?php echo $mas_services_billing_list->Utilaization->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Utilaization" name="o<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" id="o<?php echo $mas_services_billing_list->RowIndex ?>_Utilaization" value="<?php echo HtmlEncode($mas_services_billing_list->Utilaization->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_services_billing_list->ListOptions->render("body", "right", $mas_services_billing_list->RowIndex);
?>
<script>
loadjs.ready(["fmas_services_billinglist", "load"], function() {
	fmas_services_billinglist.updateLists(<?php echo $mas_services_billing_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($mas_services_billing_list->isAdd() || $mas_services_billing_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $mas_services_billing_list->FormKeyCountName ?>" id="<?php echo $mas_services_billing_list->FormKeyCountName ?>" value="<?php echo $mas_services_billing_list->KeyCount ?>">
<?php } ?>
<?php if ($mas_services_billing_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $mas_services_billing_list->FormKeyCountName ?>" id="<?php echo $mas_services_billing_list->FormKeyCountName ?>" value="<?php echo $mas_services_billing_list->KeyCount ?>">
<?php echo $mas_services_billing_list->MultiSelectKey ?>
<?php } ?>
<?php if ($mas_services_billing_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $mas_services_billing_list->FormKeyCountName ?>" id="<?php echo $mas_services_billing_list->FormKeyCountName ?>" value="<?php echo $mas_services_billing_list->KeyCount ?>">
<?php } ?>
<?php if ($mas_services_billing_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $mas_services_billing_list->FormKeyCountName ?>" id="<?php echo $mas_services_billing_list->FormKeyCountName ?>" value="<?php echo $mas_services_billing_list->KeyCount ?>">
<?php echo $mas_services_billing_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$mas_services_billing->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_services_billing_list->Recordset)
	$mas_services_billing_list->Recordset->Close();
?>
<?php if (!$mas_services_billing_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_services_billing_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_services_billing_list->Pager->render() ?>
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
<?php if ($mas_services_billing_list->TotalRecords == 0 && !$mas_services_billing->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_services_billing_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_services_billing_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_services_billing_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$mas_services_billing->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_mas_services_billing",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$mas_services_billing_list->terminate();
?>