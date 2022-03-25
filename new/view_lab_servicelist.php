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
$view_lab_service_list = new view_lab_service_list();

// Run the page
$view_lab_service_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_service_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_lab_service_list->isExport()) { ?>
<script>
var fview_lab_servicelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_lab_servicelist = currentForm = new ew.Form("fview_lab_servicelist", "list");
	fview_lab_servicelist.formKeyCountName = '<?php echo $view_lab_service_list->FormKeyCountName ?>';

	// Validate form
	fview_lab_servicelist.validate = function() {
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
			<?php if ($view_lab_service_list->Id->Required) { ?>
				elm = this.getElements("x" + infix + "_Id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->Id->caption(), $view_lab_service_list->Id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->CODE->caption(), $view_lab_service_list->CODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->SERVICE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->SERVICE->caption(), $view_lab_service_list->SERVICE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->UNITS->Required) { ?>
				elm = this.getElements("x" + infix + "_UNITS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->UNITS->caption(), $view_lab_service_list->UNITS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->AMOUNT->Required) { ?>
				elm = this.getElements("x" + infix + "_AMOUNT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->AMOUNT->caption(), $view_lab_service_list->AMOUNT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->SERVICE_TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->SERVICE_TYPE->caption(), $view_lab_service_list->SERVICE_TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->DEPARTMENT->Required) { ?>
				elm = this.getElements("x" + infix + "_DEPARTMENT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->DEPARTMENT->caption(), $view_lab_service_list->DEPARTMENT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->mas_services_billingcol->Required) { ?>
				elm = this.getElements("x" + infix + "_mas_services_billingcol");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->mas_services_billingcol->caption(), $view_lab_service_list->mas_services_billingcol->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->DrShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->DrShareAmount->caption(), $view_lab_service_list->DrShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_list->DrShareAmount->errorMessage()) ?>");
			<?php if ($view_lab_service_list->HospShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->HospShareAmount->caption(), $view_lab_service_list->HospShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_list->HospShareAmount->errorMessage()) ?>");
			<?php if ($view_lab_service_list->DrSharePer->Required) { ?>
				elm = this.getElements("x" + infix + "_DrSharePer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->DrSharePer->caption(), $view_lab_service_list->DrSharePer->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrSharePer");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_list->DrSharePer->errorMessage()) ?>");
			<?php if ($view_lab_service_list->HospSharePer->Required) { ?>
				elm = this.getElements("x" + infix + "_HospSharePer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->HospSharePer->caption(), $view_lab_service_list->HospSharePer->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospSharePer");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_list->HospSharePer->errorMessage()) ?>");
			<?php if ($view_lab_service_list->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->HospID->caption(), $view_lab_service_list->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->TestSubCd->caption(), $view_lab_service_list->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->Method->caption(), $view_lab_service_list->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->Order->caption(), $view_lab_service_list->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_list->Order->errorMessage()) ?>");
			<?php if ($view_lab_service_list->ResType->Required) { ?>
				elm = this.getElements("x" + infix + "_ResType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->ResType->caption(), $view_lab_service_list->ResType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->UnitCD->Required) { ?>
				elm = this.getElements("x" + infix + "_UnitCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->UnitCD->caption(), $view_lab_service_list->UnitCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->Sample->Required) { ?>
				elm = this.getElements("x" + infix + "_Sample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->Sample->caption(), $view_lab_service_list->Sample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->NoD->Required) { ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->NoD->caption(), $view_lab_service_list->NoD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_list->NoD->errorMessage()) ?>");
			<?php if ($view_lab_service_list->BillOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->BillOrder->caption(), $view_lab_service_list->BillOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_list->BillOrder->errorMessage()) ?>");
			<?php if ($view_lab_service_list->Inactive->Required) { ?>
				elm = this.getElements("x" + infix + "_Inactive[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->Inactive->caption(), $view_lab_service_list->Inactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->Outsource->Required) { ?>
				elm = this.getElements("x" + infix + "_Outsource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->Outsource->caption(), $view_lab_service_list->Outsource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->CollSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CollSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->CollSample->caption(), $view_lab_service_list->CollSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->TestType->Required) { ?>
				elm = this.getElements("x" + infix + "_TestType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->TestType->caption(), $view_lab_service_list->TestType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->NoHeading->Required) { ?>
				elm = this.getElements("x" + infix + "_NoHeading");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->NoHeading->caption(), $view_lab_service_list->NoHeading->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->ChemicalCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ChemicalCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->ChemicalCode->caption(), $view_lab_service_list->ChemicalCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->ChemicalName->Required) { ?>
				elm = this.getElements("x" + infix + "_ChemicalName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->ChemicalName->caption(), $view_lab_service_list->ChemicalName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_list->Utilaization->Required) { ?>
				elm = this.getElements("x" + infix + "_Utilaization");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_list->Utilaization->caption(), $view_lab_service_list->Utilaization->RequiredErrorMessage)) ?>");
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
	fview_lab_servicelist.emptyRow = function(infix) {
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
		if (ew.valueChanged(fobj, infix, "Inactive[]", false)) return false;
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
	fview_lab_servicelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_lab_servicelist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_lab_servicelist.lists["x_UNITS"] = <?php echo $view_lab_service_list->UNITS->Lookup->toClientList($view_lab_service_list) ?>;
	fview_lab_servicelist.lists["x_UNITS"].options = <?php echo JsonEncode($view_lab_service_list->UNITS->lookupOptions()) ?>;
	fview_lab_servicelist.lists["x_SERVICE_TYPE"] = <?php echo $view_lab_service_list->SERVICE_TYPE->Lookup->toClientList($view_lab_service_list) ?>;
	fview_lab_servicelist.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($view_lab_service_list->SERVICE_TYPE->lookupOptions()) ?>;
	fview_lab_servicelist.lists["x_DEPARTMENT"] = <?php echo $view_lab_service_list->DEPARTMENT->Lookup->toClientList($view_lab_service_list) ?>;
	fview_lab_servicelist.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($view_lab_service_list->DEPARTMENT->options(FALSE, TRUE)) ?>;
	fview_lab_servicelist.lists["x_Inactive[]"] = <?php echo $view_lab_service_list->Inactive->Lookup->toClientList($view_lab_service_list) ?>;
	fview_lab_servicelist.lists["x_Inactive[]"].options = <?php echo JsonEncode($view_lab_service_list->Inactive->options(FALSE, TRUE)) ?>;
	fview_lab_servicelist.lists["x_TestType"] = <?php echo $view_lab_service_list->TestType->Lookup->toClientList($view_lab_service_list) ?>;
	fview_lab_servicelist.lists["x_TestType"].options = <?php echo JsonEncode($view_lab_service_list->TestType->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_lab_servicelist");
});
var fview_lab_servicelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_lab_servicelistsrch = currentSearchForm = new ew.Form("fview_lab_servicelistsrch");

	// Validate function for search
	fview_lab_servicelistsrch.validate = function(fobj) {
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
	fview_lab_servicelistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_lab_servicelistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_lab_servicelistsrch.lists["x_SERVICE_TYPE"] = <?php echo $view_lab_service_list->SERVICE_TYPE->Lookup->toClientList($view_lab_service_list) ?>;
	fview_lab_servicelistsrch.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($view_lab_service_list->SERVICE_TYPE->lookupOptions()) ?>;
	fview_lab_servicelistsrch.lists["x_DEPARTMENT"] = <?php echo $view_lab_service_list->DEPARTMENT->Lookup->toClientList($view_lab_service_list) ?>;
	fview_lab_servicelistsrch.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($view_lab_service_list->DEPARTMENT->options(FALSE, TRUE)) ?>;
	fview_lab_servicelistsrch.lists["x_TestType"] = <?php echo $view_lab_service_list->TestType->Lookup->toClientList($view_lab_service_list) ?>;
	fview_lab_servicelistsrch.lists["x_TestType"].options = <?php echo JsonEncode($view_lab_service_list->TestType->options(FALSE, TRUE)) ?>;

	// Filters
	fview_lab_servicelistsrch.filterList = <?php echo $view_lab_service_list->getFilterList() ?>;
	loadjs.done("fview_lab_servicelistsrch");
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
<?php if (!$view_lab_service_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_lab_service_list->TotalRecords > 0 && $view_lab_service_list->ExportOptions->visible()) { ?>
<?php $view_lab_service_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_service_list->ImportOptions->visible()) { ?>
<?php $view_lab_service_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_service_list->SearchOptions->visible()) { ?>
<?php $view_lab_service_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_service_list->FilterOptions->visible()) { ?>
<?php $view_lab_service_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_lab_service_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_lab_service_list->isExport() && !$view_lab_service->CurrentAction) { ?>
<form name="fview_lab_servicelistsrch" id="fview_lab_servicelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_lab_servicelistsrch-search-panel" class="<?php echo $view_lab_service_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_lab_service">
	<div class="ew-extended-search">
<?php

// Render search row
$view_lab_service->RowType = ROWTYPE_SEARCH;
$view_lab_service->resetAttributes();
$view_lab_service_list->renderRow();
?>
<?php if ($view_lab_service_list->SERVICE->Visible) { // SERVICE ?>
	<?php
		$view_lab_service_list->SearchColumnCount++;
		if (($view_lab_service_list->SearchColumnCount - 1) % $view_lab_service_list->SearchFieldsPerRow == 0) {
			$view_lab_service_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_lab_service_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SERVICE" class="ew-cell form-group">
		<label for="x_SERVICE" class="ew-search-caption ew-label"><?php echo $view_lab_service_list->SERVICE->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SERVICE" id="z_SERVICE" value="LIKE">
</span>
		<span id="el_view_lab_service_SERVICE" class="ew-search-field">
<input type="text" data-table="view_lab_service" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_list->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->SERVICE->EditValue ?>"<?php echo $view_lab_service_list->SERVICE->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_lab_service_list->SearchColumnCount % $view_lab_service_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<?php
		$view_lab_service_list->SearchColumnCount++;
		if (($view_lab_service_list->SearchColumnCount - 1) % $view_lab_service_list->SearchFieldsPerRow == 0) {
			$view_lab_service_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_lab_service_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SERVICE_TYPE" class="ew-cell form-group">
		<label for="x_SERVICE_TYPE" class="ew-search-caption ew-label"><?php echo $view_lab_service_list->SERVICE_TYPE->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SERVICE_TYPE" id="z_SERVICE_TYPE" value="LIKE">
</span>
		<span id="el_view_lab_service_SERVICE_TYPE" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $view_lab_service_list->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x_SERVICE_TYPE" name="x_SERVICE_TYPE"<?php echo $view_lab_service_list->SERVICE_TYPE->editAttributes() ?>>
			<?php echo $view_lab_service_list->SERVICE_TYPE->selectOptionListHtml("x_SERVICE_TYPE") ?>
		</select>
</div>
<?php echo $view_lab_service_list->SERVICE_TYPE->Lookup->getParamTag($view_lab_service_list, "p_x_SERVICE_TYPE") ?>
</span>
	</div>
	<?php if ($view_lab_service_list->SearchColumnCount % $view_lab_service_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php
		$view_lab_service_list->SearchColumnCount++;
		if (($view_lab_service_list->SearchColumnCount - 1) % $view_lab_service_list->SearchFieldsPerRow == 0) {
			$view_lab_service_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_lab_service_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_DEPARTMENT" class="ew-cell form-group">
		<label for="x_DEPARTMENT" class="ew-search-caption ew-label"><?php echo $view_lab_service_list->DEPARTMENT->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DEPARTMENT" id="z_DEPARTMENT" value="LIKE">
</span>
		<span id="el_view_lab_service_DEPARTMENT" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_DEPARTMENT" data-value-separator="<?php echo $view_lab_service_list->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x_DEPARTMENT" name="x_DEPARTMENT"<?php echo $view_lab_service_list->DEPARTMENT->editAttributes() ?>>
			<?php echo $view_lab_service_list->DEPARTMENT->selectOptionListHtml("x_DEPARTMENT") ?>
		</select>
</div>
</span>
	</div>
	<?php if ($view_lab_service_list->SearchColumnCount % $view_lab_service_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->TestType->Visible) { // TestType ?>
	<?php
		$view_lab_service_list->SearchColumnCount++;
		if (($view_lab_service_list->SearchColumnCount - 1) % $view_lab_service_list->SearchFieldsPerRow == 0) {
			$view_lab_service_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_lab_service_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_TestType" class="ew-cell form-group">
		<label for="x_TestType" class="ew-search-caption ew-label"><?php echo $view_lab_service_list->TestType->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TestType" id="z_TestType" value="LIKE">
</span>
		<span id="el_view_lab_service_TestType" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_TestType" data-value-separator="<?php echo $view_lab_service_list->TestType->displayValueSeparatorAttribute() ?>" id="x_TestType" name="x_TestType"<?php echo $view_lab_service_list->TestType->editAttributes() ?>>
			<?php echo $view_lab_service_list->TestType->selectOptionListHtml("x_TestType") ?>
		</select>
</div>
</span>
	</div>
	<?php if ($view_lab_service_list->SearchColumnCount % $view_lab_service_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_lab_service_list->SearchColumnCount % $view_lab_service_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_lab_service_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_lab_service_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_lab_service_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_lab_service_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_lab_service_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_lab_service_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_lab_service_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_lab_service_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_lab_service_list->showPageHeader(); ?>
<?php
$view_lab_service_list->showMessage();
?>
<?php if ($view_lab_service_list->TotalRecords > 0 || $view_lab_service->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_lab_service_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_service">
<?php if (!$view_lab_service_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_lab_service_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_lab_service_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_service_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_lab_servicelist" id="fview_lab_servicelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_service">
<div id="gmp_view_lab_service" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_lab_service_list->TotalRecords > 0 || $view_lab_service_list->isAdd() || $view_lab_service_list->isCopy() || $view_lab_service_list->isGridEdit()) { ?>
<table id="tbl_view_lab_servicelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_lab_service->RowType = ROWTYPE_HEADER;

// Render list options
$view_lab_service_list->renderListOptions();

// Render list options (header, left)
$view_lab_service_list->ListOptions->render("header", "left");
?>
<?php if ($view_lab_service_list->Id->Visible) { // Id ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->Id) == "") { ?>
		<th data-name="Id" class="<?php echo $view_lab_service_list->Id->headerCellClass() ?>"><div id="elh_view_lab_service_Id" class="view_lab_service_Id"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->Id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Id" class="<?php echo $view_lab_service_list->Id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->Id) ?>', 1);"><div id="elh_view_lab_service_Id" class="view_lab_service_Id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->Id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->Id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->Id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->CODE->Visible) { // CODE ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $view_lab_service_list->CODE->headerCellClass() ?>"><div id="elh_view_lab_service_CODE" class="view_lab_service_CODE"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $view_lab_service_list->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->CODE) ?>', 1);"><div id="elh_view_lab_service_CODE" class="view_lab_service_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->CODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->CODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->SERVICE->Visible) { // SERVICE ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->SERVICE) == "") { ?>
		<th data-name="SERVICE" class="<?php echo $view_lab_service_list->SERVICE->headerCellClass() ?>"><div id="elh_view_lab_service_SERVICE" class="view_lab_service_SERVICE"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->SERVICE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE" class="<?php echo $view_lab_service_list->SERVICE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->SERVICE) ?>', 1);"><div id="elh_view_lab_service_SERVICE" class="view_lab_service_SERVICE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->SERVICE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->SERVICE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->SERVICE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->UNITS->Visible) { // UNITS ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->UNITS) == "") { ?>
		<th data-name="UNITS" class="<?php echo $view_lab_service_list->UNITS->headerCellClass() ?>"><div id="elh_view_lab_service_UNITS" class="view_lab_service_UNITS"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->UNITS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNITS" class="<?php echo $view_lab_service_list->UNITS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->UNITS) ?>', 1);"><div id="elh_view_lab_service_UNITS" class="view_lab_service_UNITS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->UNITS->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->UNITS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->UNITS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->AMOUNT->Visible) { // AMOUNT ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->AMOUNT) == "") { ?>
		<th data-name="AMOUNT" class="<?php echo $view_lab_service_list->AMOUNT->headerCellClass() ?>"><div id="elh_view_lab_service_AMOUNT" class="view_lab_service_AMOUNT"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->AMOUNT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AMOUNT" class="<?php echo $view_lab_service_list->AMOUNT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->AMOUNT) ?>', 1);"><div id="elh_view_lab_service_AMOUNT" class="view_lab_service_AMOUNT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->AMOUNT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->AMOUNT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->AMOUNT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->SERVICE_TYPE) == "") { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $view_lab_service_list->SERVICE_TYPE->headerCellClass() ?>"><div id="elh_view_lab_service_SERVICE_TYPE" class="view_lab_service_SERVICE_TYPE"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->SERVICE_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $view_lab_service_list->SERVICE_TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->SERVICE_TYPE) ?>', 1);"><div id="elh_view_lab_service_SERVICE_TYPE" class="view_lab_service_SERVICE_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->SERVICE_TYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->SERVICE_TYPE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->SERVICE_TYPE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->DEPARTMENT) == "") { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_lab_service_list->DEPARTMENT->headerCellClass() ?>"><div id="elh_view_lab_service_DEPARTMENT" class="view_lab_service_DEPARTMENT"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->DEPARTMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_lab_service_list->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->DEPARTMENT) ?>', 1);"><div id="elh_view_lab_service_DEPARTMENT" class="view_lab_service_DEPARTMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->DEPARTMENT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->DEPARTMENT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->DEPARTMENT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->mas_services_billingcol) == "") { ?>
		<th data-name="mas_services_billingcol" class="<?php echo $view_lab_service_list->mas_services_billingcol->headerCellClass() ?>"><div id="elh_view_lab_service_mas_services_billingcol" class="view_lab_service_mas_services_billingcol"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->mas_services_billingcol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mas_services_billingcol" class="<?php echo $view_lab_service_list->mas_services_billingcol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->mas_services_billingcol) ?>', 1);"><div id="elh_view_lab_service_mas_services_billingcol" class="view_lab_service_mas_services_billingcol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->mas_services_billingcol->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->mas_services_billingcol->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->mas_services_billingcol->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->DrShareAmount->Visible) { // DrShareAmount ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->DrShareAmount) == "") { ?>
		<th data-name="DrShareAmount" class="<?php echo $view_lab_service_list->DrShareAmount->headerCellClass() ?>"><div id="elh_view_lab_service_DrShareAmount" class="view_lab_service_DrShareAmount"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->DrShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareAmount" class="<?php echo $view_lab_service_list->DrShareAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->DrShareAmount) ?>', 1);"><div id="elh_view_lab_service_DrShareAmount" class="view_lab_service_DrShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->DrShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->DrShareAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->DrShareAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->HospShareAmount->Visible) { // HospShareAmount ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->HospShareAmount) == "") { ?>
		<th data-name="HospShareAmount" class="<?php echo $view_lab_service_list->HospShareAmount->headerCellClass() ?>"><div id="elh_view_lab_service_HospShareAmount" class="view_lab_service_HospShareAmount"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->HospShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospShareAmount" class="<?php echo $view_lab_service_list->HospShareAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->HospShareAmount) ?>', 1);"><div id="elh_view_lab_service_HospShareAmount" class="view_lab_service_HospShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->HospShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->HospShareAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->HospShareAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->DrSharePer->Visible) { // DrSharePer ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->DrSharePer) == "") { ?>
		<th data-name="DrSharePer" class="<?php echo $view_lab_service_list->DrSharePer->headerCellClass() ?>"><div id="elh_view_lab_service_DrSharePer" class="view_lab_service_DrSharePer"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->DrSharePer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrSharePer" class="<?php echo $view_lab_service_list->DrSharePer->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->DrSharePer) ?>', 1);"><div id="elh_view_lab_service_DrSharePer" class="view_lab_service_DrSharePer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->DrSharePer->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->DrSharePer->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->DrSharePer->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->HospSharePer->Visible) { // HospSharePer ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->HospSharePer) == "") { ?>
		<th data-name="HospSharePer" class="<?php echo $view_lab_service_list->HospSharePer->headerCellClass() ?>"><div id="elh_view_lab_service_HospSharePer" class="view_lab_service_HospSharePer"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->HospSharePer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospSharePer" class="<?php echo $view_lab_service_list->HospSharePer->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->HospSharePer) ?>', 1);"><div id="elh_view_lab_service_HospSharePer" class="view_lab_service_HospSharePer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->HospSharePer->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->HospSharePer->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->HospSharePer->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_lab_service_list->HospID->headerCellClass() ?>"><div id="elh_view_lab_service_HospID" class="view_lab_service_HospID"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_lab_service_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->HospID) ?>', 1);"><div id="elh_view_lab_service_HospID" class="view_lab_service_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $view_lab_service_list->TestSubCd->headerCellClass() ?>"><div id="elh_view_lab_service_TestSubCd" class="view_lab_service_TestSubCd"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $view_lab_service_list->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->TestSubCd) ?>', 1);"><div id="elh_view_lab_service_TestSubCd" class="view_lab_service_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->TestSubCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->TestSubCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->TestSubCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->Method->Visible) { // Method ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $view_lab_service_list->Method->headerCellClass() ?>"><div id="elh_view_lab_service_Method" class="view_lab_service_Method"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $view_lab_service_list->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->Method) ?>', 1);"><div id="elh_view_lab_service_Method" class="view_lab_service_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->Method->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->Method->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->Order->Visible) { // Order ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_lab_service_list->Order->headerCellClass() ?>"><div id="elh_view_lab_service_Order" class="view_lab_service_Order"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_lab_service_list->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->Order) ?>', 1);"><div id="elh_view_lab_service_Order" class="view_lab_service_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->Order->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->Order->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->ResType->Visible) { // ResType ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $view_lab_service_list->ResType->headerCellClass() ?>"><div id="elh_view_lab_service_ResType" class="view_lab_service_ResType"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $view_lab_service_list->ResType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->ResType) ?>', 1);"><div id="elh_view_lab_service_ResType" class="view_lab_service_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->ResType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->ResType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->ResType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->UnitCD->Visible) { // UnitCD ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->UnitCD) == "") { ?>
		<th data-name="UnitCD" class="<?php echo $view_lab_service_list->UnitCD->headerCellClass() ?>"><div id="elh_view_lab_service_UnitCD" class="view_lab_service_UnitCD"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->UnitCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitCD" class="<?php echo $view_lab_service_list->UnitCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->UnitCD) ?>', 1);"><div id="elh_view_lab_service_UnitCD" class="view_lab_service_UnitCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->UnitCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->UnitCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->UnitCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->Sample->Visible) { // Sample ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $view_lab_service_list->Sample->headerCellClass() ?>"><div id="elh_view_lab_service_Sample" class="view_lab_service_Sample"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $view_lab_service_list->Sample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->Sample) ?>', 1);"><div id="elh_view_lab_service_Sample" class="view_lab_service_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->Sample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->Sample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->Sample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->NoD->Visible) { // NoD ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $view_lab_service_list->NoD->headerCellClass() ?>"><div id="elh_view_lab_service_NoD" class="view_lab_service_NoD"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $view_lab_service_list->NoD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->NoD) ?>', 1);"><div id="elh_view_lab_service_NoD" class="view_lab_service_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->NoD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->NoD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->BillOrder->Visible) { // BillOrder ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $view_lab_service_list->BillOrder->headerCellClass() ?>"><div id="elh_view_lab_service_BillOrder" class="view_lab_service_BillOrder"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $view_lab_service_list->BillOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->BillOrder) ?>', 1);"><div id="elh_view_lab_service_BillOrder" class="view_lab_service_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->BillOrder->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->BillOrder->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->Inactive->Visible) { // Inactive ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $view_lab_service_list->Inactive->headerCellClass() ?>"><div id="elh_view_lab_service_Inactive" class="view_lab_service_Inactive"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $view_lab_service_list->Inactive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->Inactive) ?>', 1);"><div id="elh_view_lab_service_Inactive" class="view_lab_service_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->Inactive->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->Inactive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->Inactive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->Outsource->Visible) { // Outsource ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->Outsource) == "") { ?>
		<th data-name="Outsource" class="<?php echo $view_lab_service_list->Outsource->headerCellClass() ?>"><div id="elh_view_lab_service_Outsource" class="view_lab_service_Outsource"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->Outsource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Outsource" class="<?php echo $view_lab_service_list->Outsource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->Outsource) ?>', 1);"><div id="elh_view_lab_service_Outsource" class="view_lab_service_Outsource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->Outsource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->Outsource->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->Outsource->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->CollSample->Visible) { // CollSample ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $view_lab_service_list->CollSample->headerCellClass() ?>"><div id="elh_view_lab_service_CollSample" class="view_lab_service_CollSample"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $view_lab_service_list->CollSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->CollSample) ?>', 1);"><div id="elh_view_lab_service_CollSample" class="view_lab_service_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->CollSample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->CollSample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->CollSample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->TestType->Visible) { // TestType ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $view_lab_service_list->TestType->headerCellClass() ?>"><div id="elh_view_lab_service_TestType" class="view_lab_service_TestType"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $view_lab_service_list->TestType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->TestType) ?>', 1);"><div id="elh_view_lab_service_TestType" class="view_lab_service_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->TestType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->TestType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->TestType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->NoHeading->Visible) { // NoHeading ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->NoHeading) == "") { ?>
		<th data-name="NoHeading" class="<?php echo $view_lab_service_list->NoHeading->headerCellClass() ?>"><div id="elh_view_lab_service_NoHeading" class="view_lab_service_NoHeading"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->NoHeading->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoHeading" class="<?php echo $view_lab_service_list->NoHeading->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->NoHeading) ?>', 1);"><div id="elh_view_lab_service_NoHeading" class="view_lab_service_NoHeading">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->NoHeading->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->NoHeading->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->NoHeading->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->ChemicalCode->Visible) { // ChemicalCode ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->ChemicalCode) == "") { ?>
		<th data-name="ChemicalCode" class="<?php echo $view_lab_service_list->ChemicalCode->headerCellClass() ?>"><div id="elh_view_lab_service_ChemicalCode" class="view_lab_service_ChemicalCode"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->ChemicalCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChemicalCode" class="<?php echo $view_lab_service_list->ChemicalCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->ChemicalCode) ?>', 1);"><div id="elh_view_lab_service_ChemicalCode" class="view_lab_service_ChemicalCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->ChemicalCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->ChemicalCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->ChemicalCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->ChemicalName->Visible) { // ChemicalName ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->ChemicalName) == "") { ?>
		<th data-name="ChemicalName" class="<?php echo $view_lab_service_list->ChemicalName->headerCellClass() ?>"><div id="elh_view_lab_service_ChemicalName" class="view_lab_service_ChemicalName"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->ChemicalName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChemicalName" class="<?php echo $view_lab_service_list->ChemicalName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->ChemicalName) ?>', 1);"><div id="elh_view_lab_service_ChemicalName" class="view_lab_service_ChemicalName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->ChemicalName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->ChemicalName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->ChemicalName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_list->Utilaization->Visible) { // Utilaization ?>
	<?php if ($view_lab_service_list->SortUrl($view_lab_service_list->Utilaization) == "") { ?>
		<th data-name="Utilaization" class="<?php echo $view_lab_service_list->Utilaization->headerCellClass() ?>"><div id="elh_view_lab_service_Utilaization" class="view_lab_service_Utilaization"><div class="ew-table-header-caption"><?php echo $view_lab_service_list->Utilaization->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Utilaization" class="<?php echo $view_lab_service_list->Utilaization->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_list->SortUrl($view_lab_service_list->Utilaization) ?>', 1);"><div id="elh_view_lab_service_Utilaization" class="view_lab_service_Utilaization">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_list->Utilaization->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_list->Utilaization->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_list->Utilaization->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_service_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($view_lab_service_list->isAdd() || $view_lab_service_list->isCopy()) {
		$view_lab_service_list->RowIndex = 0;
		$view_lab_service_list->KeyCount = $view_lab_service_list->RowIndex;
		if ($view_lab_service_list->isCopy() && !$view_lab_service_list->loadRow())
			$view_lab_service->CurrentAction = "add";
		if ($view_lab_service_list->isAdd())
			$view_lab_service_list->loadRowValues();
		if ($view_lab_service->EventCancelled) // Insert failed
			$view_lab_service_list->restoreFormValues(); // Restore form values

		// Set row properties
		$view_lab_service->resetAttributes();
		$view_lab_service->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_view_lab_service", "data-rowtype" => ROWTYPE_ADD]);
		$view_lab_service->RowType = ROWTYPE_ADD;

		// Render row
		$view_lab_service_list->renderRow();

		// Render list options
		$view_lab_service_list->renderListOptions();
		$view_lab_service_list->StartRowCount = 0;
?>
	<tr <?php echo $view_lab_service->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_service_list->ListOptions->render("body", "left", $view_lab_service_list->RowCount);
?>
	<?php if ($view_lab_service_list->Id->Visible) { // Id ?>
		<td data-name="Id">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Id" class="form-group view_lab_service_Id"></span>
<input type="hidden" data-table="view_lab_service" data-field="x_Id" name="o<?php echo $view_lab_service_list->RowIndex ?>_Id" id="o<?php echo $view_lab_service_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_list->Id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->CODE->Visible) { // CODE ?>
		<td data-name="CODE">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_CODE" class="form-group view_lab_service_CODE">
<input type="text" data-table="view_lab_service" data-field="x_CODE" name="x<?php echo $view_lab_service_list->RowIndex ?>_CODE" id="x<?php echo $view_lab_service_list->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_list->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->CODE->EditValue ?>"<?php echo $view_lab_service_list->CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_CODE" name="o<?php echo $view_lab_service_list->RowIndex ?>_CODE" id="o<?php echo $view_lab_service_list->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_list->CODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_SERVICE" class="form-group view_lab_service_SERVICE">
<input type="text" data-table="view_lab_service" data-field="x_SERVICE" name="x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_list->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->SERVICE->EditValue ?>"<?php echo $view_lab_service_list->SERVICE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_SERVICE" name="o<?php echo $view_lab_service_list->RowIndex ?>_SERVICE" id="o<?php echo $view_lab_service_list->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_list->SERVICE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_UNITS" class="form-group view_lab_service_UNITS">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_lab_service_list->RowIndex ?>_UNITS"><?php echo EmptyValue(strval($view_lab_service_list->UNITS->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_lab_service_list->UNITS->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_lab_service_list->UNITS->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_lab_service_list->UNITS->ReadOnly || $view_lab_service_list->UNITS->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_lab_service_list->RowIndex ?>_UNITS',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$view_lab_service_list->UNITS->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_service_list->RowIndex ?>_UNITS" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_list->UNITS->caption() ?>" data-title="<?php echo $view_lab_service_list->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_service_list->RowIndex ?>_UNITS',url:'lab_unit_mastaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $view_lab_service_list->UNITS->Lookup->getParamTag($view_lab_service_list, "p_x" . $view_lab_service_list->RowIndex . "_UNITS") ?>
<input type="hidden" data-table="view_lab_service" data-field="x_UNITS" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_lab_service_list->UNITS->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_list->RowIndex ?>_UNITS" id="x<?php echo $view_lab_service_list->RowIndex ?>_UNITS" value="<?php echo $view_lab_service_list->UNITS->CurrentValue ?>"<?php echo $view_lab_service_list->UNITS->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_UNITS" name="o<?php echo $view_lab_service_list->RowIndex ?>_UNITS" id="o<?php echo $view_lab_service_list->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_list->UNITS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->AMOUNT->Visible) { // AMOUNT ?>
		<td data-name="AMOUNT">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_AMOUNT" class="form-group view_lab_service_AMOUNT">
<input type="text" data-table="view_lab_service" data-field="x_AMOUNT" name="x<?php echo $view_lab_service_list->RowIndex ?>_AMOUNT" id="x<?php echo $view_lab_service_list->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_list->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->AMOUNT->EditValue ?>"<?php echo $view_lab_service_list->AMOUNT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_AMOUNT" name="o<?php echo $view_lab_service_list->RowIndex ?>_AMOUNT" id="o<?php echo $view_lab_service_list->RowIndex ?>_AMOUNT" value="<?php echo HtmlEncode($view_lab_service_list->AMOUNT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_SERVICE_TYPE" class="form-group view_lab_service_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $view_lab_service_list->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE"<?php echo $view_lab_service_list->SERVICE_TYPE->editAttributes() ?>>
			<?php echo $view_lab_service_list->SERVICE_TYPE->selectOptionListHtml("x{$view_lab_service_list->RowIndex}_SERVICE_TYPE") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_lab_services_type") && !$view_lab_service_list->SERVICE_TYPE->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_list->SERVICE_TYPE->caption() ?>" data-title="<?php echo $view_lab_service_list->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE',url:'mas_lab_services_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $view_lab_service_list->SERVICE_TYPE->Lookup->getParamTag($view_lab_service_list, "p_x" . $view_lab_service_list->RowIndex . "_SERVICE_TYPE") ?>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_SERVICE_TYPE" name="o<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_lab_service_list->SERVICE_TYPE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_DEPARTMENT" class="form-group view_lab_service_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_DEPARTMENT" data-value-separator="<?php echo $view_lab_service_list->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_service_list->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_lab_service_list->RowIndex ?>_DEPARTMENT"<?php echo $view_lab_service_list->DEPARTMENT->editAttributes() ?>>
			<?php echo $view_lab_service_list->DEPARTMENT->selectOptionListHtml("x{$view_lab_service_list->RowIndex}_DEPARTMENT") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_DEPARTMENT" name="o<?php echo $view_lab_service_list->RowIndex ?>_DEPARTMENT" id="o<?php echo $view_lab_service_list->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_lab_service_list->DEPARTMENT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td data-name="mas_services_billingcol">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_mas_services_billingcol" class="form-group view_lab_service_mas_services_billingcol">
<input type="text" data-table="view_lab_service" data-field="x_mas_services_billingcol" name="x<?php echo $view_lab_service_list->RowIndex ?>_mas_services_billingcol" id="x<?php echo $view_lab_service_list->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->mas_services_billingcol->EditValue ?>"<?php echo $view_lab_service_list->mas_services_billingcol->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_mas_services_billingcol" name="o<?php echo $view_lab_service_list->RowIndex ?>_mas_services_billingcol" id="o<?php echo $view_lab_service_list->RowIndex ?>_mas_services_billingcol" value="<?php echo HtmlEncode($view_lab_service_list->mas_services_billingcol->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_DrShareAmount" class="form-group view_lab_service_DrShareAmount">
<input type="text" data-table="view_lab_service" data-field="x_DrShareAmount" name="x<?php echo $view_lab_service_list->RowIndex ?>_DrShareAmount" id="x<?php echo $view_lab_service_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->DrShareAmount->EditValue ?>"<?php echo $view_lab_service_list->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_DrShareAmount" name="o<?php echo $view_lab_service_list->RowIndex ?>_DrShareAmount" id="o<?php echo $view_lab_service_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_lab_service_list->DrShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_HospShareAmount" class="form-group view_lab_service_HospShareAmount">
<input type="text" data-table="view_lab_service" data-field="x_HospShareAmount" name="x<?php echo $view_lab_service_list->RowIndex ?>_HospShareAmount" id="x<?php echo $view_lab_service_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->HospShareAmount->EditValue ?>"<?php echo $view_lab_service_list->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_HospShareAmount" name="o<?php echo $view_lab_service_list->RowIndex ?>_HospShareAmount" id="o<?php echo $view_lab_service_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_lab_service_list->HospShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->DrSharePer->Visible) { // DrSharePer ?>
		<td data-name="DrSharePer">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_DrSharePer" class="form-group view_lab_service_DrSharePer">
<input type="text" data-table="view_lab_service" data-field="x_DrSharePer" name="x<?php echo $view_lab_service_list->RowIndex ?>_DrSharePer" id="x<?php echo $view_lab_service_list->RowIndex ?>_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->DrSharePer->EditValue ?>"<?php echo $view_lab_service_list->DrSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_DrSharePer" name="o<?php echo $view_lab_service_list->RowIndex ?>_DrSharePer" id="o<?php echo $view_lab_service_list->RowIndex ?>_DrSharePer" value="<?php echo HtmlEncode($view_lab_service_list->DrSharePer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->HospSharePer->Visible) { // HospSharePer ?>
		<td data-name="HospSharePer">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_HospSharePer" class="form-group view_lab_service_HospSharePer">
<input type="text" data-table="view_lab_service" data-field="x_HospSharePer" name="x<?php echo $view_lab_service_list->RowIndex ?>_HospSharePer" id="x<?php echo $view_lab_service_list->RowIndex ?>_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->HospSharePer->EditValue ?>"<?php echo $view_lab_service_list->HospSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_HospSharePer" name="o<?php echo $view_lab_service_list->RowIndex ?>_HospSharePer" id="o<?php echo $view_lab_service_list->RowIndex ?>_HospSharePer" value="<?php echo HtmlEncode($view_lab_service_list->HospSharePer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="view_lab_service" data-field="x_HospID" name="o<?php echo $view_lab_service_list->RowIndex ?>_HospID" id="o<?php echo $view_lab_service_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_list->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_TestSubCd" class="form-group view_lab_service_TestSubCd">
<input type="text" data-table="view_lab_service" data-field="x_TestSubCd" name="x<?php echo $view_lab_service_list->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_service_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->TestSubCd->EditValue ?>"<?php echo $view_lab_service_list->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_TestSubCd" name="o<?php echo $view_lab_service_list->RowIndex ?>_TestSubCd" id="o<?php echo $view_lab_service_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_list->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Method->Visible) { // Method ?>
		<td data-name="Method">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Method" class="form-group view_lab_service_Method">
<input type="text" data-table="view_lab_service" data-field="x_Method" name="x<?php echo $view_lab_service_list->RowIndex ?>_Method" id="x<?php echo $view_lab_service_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Method->EditValue ?>"<?php echo $view_lab_service_list->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Method" name="o<?php echo $view_lab_service_list->RowIndex ?>_Method" id="o<?php echo $view_lab_service_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_list->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Order->Visible) { // Order ?>
		<td data-name="Order">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Order" class="form-group view_lab_service_Order">
<input type="text" data-table="view_lab_service" data-field="x_Order" name="x<?php echo $view_lab_service_list->RowIndex ?>_Order" id="x<?php echo $view_lab_service_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Order->EditValue ?>"<?php echo $view_lab_service_list->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Order" name="o<?php echo $view_lab_service_list->RowIndex ?>_Order" id="o<?php echo $view_lab_service_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_list->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->ResType->Visible) { // ResType ?>
		<td data-name="ResType">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_ResType" class="form-group view_lab_service_ResType">
<input type="text" data-table="view_lab_service" data-field="x_ResType" name="x<?php echo $view_lab_service_list->RowIndex ?>_ResType" id="x<?php echo $view_lab_service_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->ResType->EditValue ?>"<?php echo $view_lab_service_list->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_ResType" name="o<?php echo $view_lab_service_list->RowIndex ?>_ResType" id="o<?php echo $view_lab_service_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_list->ResType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_UnitCD" class="form-group view_lab_service_UnitCD">
<input type="text" data-table="view_lab_service" data-field="x_UnitCD" name="x<?php echo $view_lab_service_list->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_service_list->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->UnitCD->EditValue ?>"<?php echo $view_lab_service_list->UnitCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_UnitCD" name="o<?php echo $view_lab_service_list->RowIndex ?>_UnitCD" id="o<?php echo $view_lab_service_list->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_list->UnitCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Sample->Visible) { // Sample ?>
		<td data-name="Sample">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Sample" class="form-group view_lab_service_Sample">
<input type="text" data-table="view_lab_service" data-field="x_Sample" name="x<?php echo $view_lab_service_list->RowIndex ?>_Sample" id="x<?php echo $view_lab_service_list->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_service_list->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Sample->EditValue ?>"<?php echo $view_lab_service_list->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Sample" name="o<?php echo $view_lab_service_list->RowIndex ?>_Sample" id="o<?php echo $view_lab_service_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_list->Sample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->NoD->Visible) { // NoD ?>
		<td data-name="NoD">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_NoD" class="form-group view_lab_service_NoD">
<input type="text" data-table="view_lab_service" data-field="x_NoD" name="x<?php echo $view_lab_service_list->RowIndex ?>_NoD" id="x<?php echo $view_lab_service_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->NoD->EditValue ?>"<?php echo $view_lab_service_list->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_NoD" name="o<?php echo $view_lab_service_list->RowIndex ?>_NoD" id="o<?php echo $view_lab_service_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_list->NoD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_BillOrder" class="form-group view_lab_service_BillOrder">
<input type="text" data-table="view_lab_service" data-field="x_BillOrder" name="x<?php echo $view_lab_service_list->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_service_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->BillOrder->EditValue ?>"<?php echo $view_lab_service_list->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_BillOrder" name="o<?php echo $view_lab_service_list->RowIndex ?>_BillOrder" id="o<?php echo $view_lab_service_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_list->BillOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Inactive" class="form-group view_lab_service_Inactive">
<div id="tp_x<?php echo $view_lab_service_list->RowIndex ?>_Inactive" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_service" data-field="x_Inactive" data-value-separator="<?php echo $view_lab_service_list->Inactive->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_list->RowIndex ?>_Inactive[]" id="x<?php echo $view_lab_service_list->RowIndex ?>_Inactive[]" value="{value}"<?php echo $view_lab_service_list->Inactive->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_service_list->RowIndex ?>_Inactive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_service_list->Inactive->checkBoxListHtml(FALSE, "x{$view_lab_service_list->RowIndex}_Inactive[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Inactive" name="o<?php echo $view_lab_service_list->RowIndex ?>_Inactive[]" id="o<?php echo $view_lab_service_list->RowIndex ?>_Inactive[]" value="<?php echo HtmlEncode($view_lab_service_list->Inactive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Outsource" class="form-group view_lab_service_Outsource">
<input type="text" data-table="view_lab_service" data-field="x_Outsource" name="x<?php echo $view_lab_service_list->RowIndex ?>_Outsource" id="x<?php echo $view_lab_service_list->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Outsource->EditValue ?>"<?php echo $view_lab_service_list->Outsource->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Outsource" name="o<?php echo $view_lab_service_list->RowIndex ?>_Outsource" id="o<?php echo $view_lab_service_list->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_list->Outsource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_CollSample" class="form-group view_lab_service_CollSample">
<input type="text" data-table="view_lab_service" data-field="x_CollSample" name="x<?php echo $view_lab_service_list->RowIndex ?>_CollSample" id="x<?php echo $view_lab_service_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->CollSample->EditValue ?>"<?php echo $view_lab_service_list->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_CollSample" name="o<?php echo $view_lab_service_list->RowIndex ?>_CollSample" id="o<?php echo $view_lab_service_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_list->CollSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_TestType" class="form-group view_lab_service_TestType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_TestType" data-value-separator="<?php echo $view_lab_service_list->TestType->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_service_list->RowIndex ?>_TestType" name="x<?php echo $view_lab_service_list->RowIndex ?>_TestType"<?php echo $view_lab_service_list->TestType->editAttributes() ?>>
			<?php echo $view_lab_service_list->TestType->selectOptionListHtml("x{$view_lab_service_list->RowIndex}_TestType") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_TestType" name="o<?php echo $view_lab_service_list->RowIndex ?>_TestType" id="o<?php echo $view_lab_service_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_service_list->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->NoHeading->Visible) { // NoHeading ?>
		<td data-name="NoHeading">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_NoHeading" class="form-group view_lab_service_NoHeading">
<input type="text" data-table="view_lab_service" data-field="x_NoHeading" name="x<?php echo $view_lab_service_list->RowIndex ?>_NoHeading" id="x<?php echo $view_lab_service_list->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->NoHeading->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->NoHeading->EditValue ?>"<?php echo $view_lab_service_list->NoHeading->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_NoHeading" name="o<?php echo $view_lab_service_list->RowIndex ?>_NoHeading" id="o<?php echo $view_lab_service_list->RowIndex ?>_NoHeading" value="<?php echo HtmlEncode($view_lab_service_list->NoHeading->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->ChemicalCode->Visible) { // ChemicalCode ?>
		<td data-name="ChemicalCode">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_ChemicalCode" class="form-group view_lab_service_ChemicalCode">
<input type="text" data-table="view_lab_service" data-field="x_ChemicalCode" name="x<?php echo $view_lab_service_list->RowIndex ?>_ChemicalCode" id="x<?php echo $view_lab_service_list->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->ChemicalCode->EditValue ?>"<?php echo $view_lab_service_list->ChemicalCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_ChemicalCode" name="o<?php echo $view_lab_service_list->RowIndex ?>_ChemicalCode" id="o<?php echo $view_lab_service_list->RowIndex ?>_ChemicalCode" value="<?php echo HtmlEncode($view_lab_service_list->ChemicalCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->ChemicalName->Visible) { // ChemicalName ?>
		<td data-name="ChemicalName">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_ChemicalName" class="form-group view_lab_service_ChemicalName">
<input type="text" data-table="view_lab_service" data-field="x_ChemicalName" name="x<?php echo $view_lab_service_list->RowIndex ?>_ChemicalName" id="x<?php echo $view_lab_service_list->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->ChemicalName->EditValue ?>"<?php echo $view_lab_service_list->ChemicalName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_ChemicalName" name="o<?php echo $view_lab_service_list->RowIndex ?>_ChemicalName" id="o<?php echo $view_lab_service_list->RowIndex ?>_ChemicalName" value="<?php echo HtmlEncode($view_lab_service_list->ChemicalName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Utilaization->Visible) { // Utilaization ?>
		<td data-name="Utilaization">
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Utilaization" class="form-group view_lab_service_Utilaization">
<input type="text" data-table="view_lab_service" data-field="x_Utilaization" name="x<?php echo $view_lab_service_list->RowIndex ?>_Utilaization" id="x<?php echo $view_lab_service_list->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->Utilaization->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Utilaization->EditValue ?>"<?php echo $view_lab_service_list->Utilaization->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Utilaization" name="o<?php echo $view_lab_service_list->RowIndex ?>_Utilaization" id="o<?php echo $view_lab_service_list->RowIndex ?>_Utilaization" value="<?php echo HtmlEncode($view_lab_service_list->Utilaization->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_service_list->ListOptions->render("body", "right", $view_lab_service_list->RowCount);
?>
<script>
loadjs.ready(["fview_lab_servicelist", "load"], function() {
	fview_lab_servicelist.updateLists(<?php echo $view_lab_service_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($view_lab_service_list->ExportAll && $view_lab_service_list->isExport()) {
	$view_lab_service_list->StopRecord = $view_lab_service_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_lab_service_list->TotalRecords > $view_lab_service_list->StartRecord + $view_lab_service_list->DisplayRecords - 1)
		$view_lab_service_list->StopRecord = $view_lab_service_list->StartRecord + $view_lab_service_list->DisplayRecords - 1;
	else
		$view_lab_service_list->StopRecord = $view_lab_service_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($view_lab_service->isConfirm() || $view_lab_service_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_lab_service_list->FormKeyCountName) && ($view_lab_service_list->isGridAdd() || $view_lab_service_list->isGridEdit() || $view_lab_service->isConfirm())) {
		$view_lab_service_list->KeyCount = $CurrentForm->getValue($view_lab_service_list->FormKeyCountName);
		$view_lab_service_list->StopRecord = $view_lab_service_list->StartRecord + $view_lab_service_list->KeyCount - 1;
	}
}
$view_lab_service_list->RecordCount = $view_lab_service_list->StartRecord - 1;
if ($view_lab_service_list->Recordset && !$view_lab_service_list->Recordset->EOF) {
	$view_lab_service_list->Recordset->moveFirst();
	$selectLimit = $view_lab_service_list->UseSelectLimit;
	if (!$selectLimit && $view_lab_service_list->StartRecord > 1)
		$view_lab_service_list->Recordset->move($view_lab_service_list->StartRecord - 1);
} elseif (!$view_lab_service->AllowAddDeleteRow && $view_lab_service_list->StopRecord == 0) {
	$view_lab_service_list->StopRecord = $view_lab_service->GridAddRowCount;
}

// Initialize aggregate
$view_lab_service->RowType = ROWTYPE_AGGREGATEINIT;
$view_lab_service->resetAttributes();
$view_lab_service_list->renderRow();
$view_lab_service_list->EditRowCount = 0;
if ($view_lab_service_list->isEdit())
	$view_lab_service_list->RowIndex = 1;
if ($view_lab_service_list->isGridAdd())
	$view_lab_service_list->RowIndex = 0;
if ($view_lab_service_list->isGridEdit())
	$view_lab_service_list->RowIndex = 0;
while ($view_lab_service_list->RecordCount < $view_lab_service_list->StopRecord) {
	$view_lab_service_list->RecordCount++;
	if ($view_lab_service_list->RecordCount >= $view_lab_service_list->StartRecord) {
		$view_lab_service_list->RowCount++;
		if ($view_lab_service_list->isGridAdd() || $view_lab_service_list->isGridEdit() || $view_lab_service->isConfirm()) {
			$view_lab_service_list->RowIndex++;
			$CurrentForm->Index = $view_lab_service_list->RowIndex;
			if ($CurrentForm->hasValue($view_lab_service_list->FormActionName) && ($view_lab_service->isConfirm() || $view_lab_service_list->EventCancelled))
				$view_lab_service_list->RowAction = strval($CurrentForm->getValue($view_lab_service_list->FormActionName));
			elseif ($view_lab_service_list->isGridAdd())
				$view_lab_service_list->RowAction = "insert";
			else
				$view_lab_service_list->RowAction = "";
		}

		// Set up key count
		$view_lab_service_list->KeyCount = $view_lab_service_list->RowIndex;

		// Init row class and style
		$view_lab_service->resetAttributes();
		$view_lab_service->CssClass = "";
		if ($view_lab_service_list->isGridAdd()) {
			$view_lab_service_list->loadRowValues(); // Load default values
		} else {
			$view_lab_service_list->loadRowValues($view_lab_service_list->Recordset); // Load row values
		}
		$view_lab_service->RowType = ROWTYPE_VIEW; // Render view
		if ($view_lab_service_list->isGridAdd()) // Grid add
			$view_lab_service->RowType = ROWTYPE_ADD; // Render add
		if ($view_lab_service_list->isGridAdd() && $view_lab_service->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_lab_service_list->restoreCurrentRowFormValues($view_lab_service_list->RowIndex); // Restore form values
		if ($view_lab_service_list->isEdit()) {
			if ($view_lab_service_list->checkInlineEditKey() && $view_lab_service_list->EditRowCount == 0) { // Inline edit
				$view_lab_service->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($view_lab_service_list->isGridEdit()) { // Grid edit
			if ($view_lab_service->EventCancelled)
				$view_lab_service_list->restoreCurrentRowFormValues($view_lab_service_list->RowIndex); // Restore form values
			if ($view_lab_service_list->RowAction == "insert")
				$view_lab_service->RowType = ROWTYPE_ADD; // Render add
			else
				$view_lab_service->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_lab_service_list->isEdit() && $view_lab_service->RowType == ROWTYPE_EDIT && $view_lab_service->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$view_lab_service_list->restoreFormValues(); // Restore form values
		}
		if ($view_lab_service_list->isGridEdit() && ($view_lab_service->RowType == ROWTYPE_EDIT || $view_lab_service->RowType == ROWTYPE_ADD) && $view_lab_service->EventCancelled) // Update failed
			$view_lab_service_list->restoreCurrentRowFormValues($view_lab_service_list->RowIndex); // Restore form values
		if ($view_lab_service->RowType == ROWTYPE_EDIT) // Edit row
			$view_lab_service_list->EditRowCount++;

		// Set up row id / data-rowindex
		$view_lab_service->RowAttrs->merge(["data-rowindex" => $view_lab_service_list->RowCount, "id" => "r" . $view_lab_service_list->RowCount . "_view_lab_service", "data-rowtype" => $view_lab_service->RowType]);

		// Render row
		$view_lab_service_list->renderRow();

		// Render list options
		$view_lab_service_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_lab_service_list->RowAction != "delete" && $view_lab_service_list->RowAction != "insertdelete" && !($view_lab_service_list->RowAction == "insert" && $view_lab_service->isConfirm() && $view_lab_service_list->emptyRow())) {
?>
	<tr <?php echo $view_lab_service->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_service_list->ListOptions->render("body", "left", $view_lab_service_list->RowCount);
?>
	<?php if ($view_lab_service_list->Id->Visible) { // Id ?>
		<td data-name="Id" <?php echo $view_lab_service_list->Id->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Id" class="form-group"></span>
<input type="hidden" data-table="view_lab_service" data-field="x_Id" name="o<?php echo $view_lab_service_list->RowIndex ?>_Id" id="o<?php echo $view_lab_service_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_list->Id->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Id" class="form-group">
<span<?php echo $view_lab_service_list->Id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_list->Id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Id" name="x<?php echo $view_lab_service_list->RowIndex ?>_Id" id="x<?php echo $view_lab_service_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_list->Id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Id">
<span<?php echo $view_lab_service_list->Id->viewAttributes() ?>><?php echo $view_lab_service_list->Id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->CODE->Visible) { // CODE ?>
		<td data-name="CODE" <?php echo $view_lab_service_list->CODE->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_CODE" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_CODE" name="x<?php echo $view_lab_service_list->RowIndex ?>_CODE" id="x<?php echo $view_lab_service_list->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_list->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->CODE->EditValue ?>"<?php echo $view_lab_service_list->CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_CODE" name="o<?php echo $view_lab_service_list->RowIndex ?>_CODE" id="o<?php echo $view_lab_service_list->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_list->CODE->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_CODE" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_CODE" name="x<?php echo $view_lab_service_list->RowIndex ?>_CODE" id="x<?php echo $view_lab_service_list->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_list->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->CODE->EditValue ?>"<?php echo $view_lab_service_list->CODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_CODE">
<span<?php echo $view_lab_service_list->CODE->viewAttributes() ?>><?php echo $view_lab_service_list->CODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE" <?php echo $view_lab_service_list->SERVICE->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_SERVICE" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_SERVICE" name="x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_list->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->SERVICE->EditValue ?>"<?php echo $view_lab_service_list->SERVICE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_SERVICE" name="o<?php echo $view_lab_service_list->RowIndex ?>_SERVICE" id="o<?php echo $view_lab_service_list->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_list->SERVICE->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_SERVICE" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_SERVICE" name="x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_list->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->SERVICE->EditValue ?>"<?php echo $view_lab_service_list->SERVICE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_SERVICE">
<span<?php echo $view_lab_service_list->SERVICE->viewAttributes() ?>><?php echo $view_lab_service_list->SERVICE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS" <?php echo $view_lab_service_list->UNITS->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_UNITS" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_lab_service_list->RowIndex ?>_UNITS"><?php echo EmptyValue(strval($view_lab_service_list->UNITS->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_lab_service_list->UNITS->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_lab_service_list->UNITS->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_lab_service_list->UNITS->ReadOnly || $view_lab_service_list->UNITS->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_lab_service_list->RowIndex ?>_UNITS',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$view_lab_service_list->UNITS->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_service_list->RowIndex ?>_UNITS" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_list->UNITS->caption() ?>" data-title="<?php echo $view_lab_service_list->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_service_list->RowIndex ?>_UNITS',url:'lab_unit_mastaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $view_lab_service_list->UNITS->Lookup->getParamTag($view_lab_service_list, "p_x" . $view_lab_service_list->RowIndex . "_UNITS") ?>
<input type="hidden" data-table="view_lab_service" data-field="x_UNITS" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_lab_service_list->UNITS->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_list->RowIndex ?>_UNITS" id="x<?php echo $view_lab_service_list->RowIndex ?>_UNITS" value="<?php echo $view_lab_service_list->UNITS->CurrentValue ?>"<?php echo $view_lab_service_list->UNITS->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_UNITS" name="o<?php echo $view_lab_service_list->RowIndex ?>_UNITS" id="o<?php echo $view_lab_service_list->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_list->UNITS->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_UNITS" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_lab_service_list->RowIndex ?>_UNITS"><?php echo EmptyValue(strval($view_lab_service_list->UNITS->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_lab_service_list->UNITS->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_lab_service_list->UNITS->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_lab_service_list->UNITS->ReadOnly || $view_lab_service_list->UNITS->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_lab_service_list->RowIndex ?>_UNITS',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$view_lab_service_list->UNITS->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_service_list->RowIndex ?>_UNITS" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_list->UNITS->caption() ?>" data-title="<?php echo $view_lab_service_list->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_service_list->RowIndex ?>_UNITS',url:'lab_unit_mastaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $view_lab_service_list->UNITS->Lookup->getParamTag($view_lab_service_list, "p_x" . $view_lab_service_list->RowIndex . "_UNITS") ?>
<input type="hidden" data-table="view_lab_service" data-field="x_UNITS" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_lab_service_list->UNITS->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_list->RowIndex ?>_UNITS" id="x<?php echo $view_lab_service_list->RowIndex ?>_UNITS" value="<?php echo $view_lab_service_list->UNITS->CurrentValue ?>"<?php echo $view_lab_service_list->UNITS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_UNITS">
<span<?php echo $view_lab_service_list->UNITS->viewAttributes() ?>><?php echo $view_lab_service_list->UNITS->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->AMOUNT->Visible) { // AMOUNT ?>
		<td data-name="AMOUNT" <?php echo $view_lab_service_list->AMOUNT->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_AMOUNT" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_AMOUNT" name="x<?php echo $view_lab_service_list->RowIndex ?>_AMOUNT" id="x<?php echo $view_lab_service_list->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_list->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->AMOUNT->EditValue ?>"<?php echo $view_lab_service_list->AMOUNT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_AMOUNT" name="o<?php echo $view_lab_service_list->RowIndex ?>_AMOUNT" id="o<?php echo $view_lab_service_list->RowIndex ?>_AMOUNT" value="<?php echo HtmlEncode($view_lab_service_list->AMOUNT->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_AMOUNT" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_AMOUNT" name="x<?php echo $view_lab_service_list->RowIndex ?>_AMOUNT" id="x<?php echo $view_lab_service_list->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_list->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->AMOUNT->EditValue ?>"<?php echo $view_lab_service_list->AMOUNT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_AMOUNT">
<span<?php echo $view_lab_service_list->AMOUNT->viewAttributes() ?>><?php echo $view_lab_service_list->AMOUNT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE" <?php echo $view_lab_service_list->SERVICE_TYPE->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_SERVICE_TYPE" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $view_lab_service_list->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE"<?php echo $view_lab_service_list->SERVICE_TYPE->editAttributes() ?>>
			<?php echo $view_lab_service_list->SERVICE_TYPE->selectOptionListHtml("x{$view_lab_service_list->RowIndex}_SERVICE_TYPE") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_lab_services_type") && !$view_lab_service_list->SERVICE_TYPE->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_list->SERVICE_TYPE->caption() ?>" data-title="<?php echo $view_lab_service_list->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE',url:'mas_lab_services_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $view_lab_service_list->SERVICE_TYPE->Lookup->getParamTag($view_lab_service_list, "p_x" . $view_lab_service_list->RowIndex . "_SERVICE_TYPE") ?>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_SERVICE_TYPE" name="o<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_lab_service_list->SERVICE_TYPE->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_SERVICE_TYPE" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $view_lab_service_list->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE"<?php echo $view_lab_service_list->SERVICE_TYPE->editAttributes() ?>>
			<?php echo $view_lab_service_list->SERVICE_TYPE->selectOptionListHtml("x{$view_lab_service_list->RowIndex}_SERVICE_TYPE") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_lab_services_type") && !$view_lab_service_list->SERVICE_TYPE->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_list->SERVICE_TYPE->caption() ?>" data-title="<?php echo $view_lab_service_list->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE',url:'mas_lab_services_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $view_lab_service_list->SERVICE_TYPE->Lookup->getParamTag($view_lab_service_list, "p_x" . $view_lab_service_list->RowIndex . "_SERVICE_TYPE") ?>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_SERVICE_TYPE">
<span<?php echo $view_lab_service_list->SERVICE_TYPE->viewAttributes() ?>><?php echo $view_lab_service_list->SERVICE_TYPE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT" <?php echo $view_lab_service_list->DEPARTMENT->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_DEPARTMENT" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_DEPARTMENT" data-value-separator="<?php echo $view_lab_service_list->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_service_list->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_lab_service_list->RowIndex ?>_DEPARTMENT"<?php echo $view_lab_service_list->DEPARTMENT->editAttributes() ?>>
			<?php echo $view_lab_service_list->DEPARTMENT->selectOptionListHtml("x{$view_lab_service_list->RowIndex}_DEPARTMENT") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_DEPARTMENT" name="o<?php echo $view_lab_service_list->RowIndex ?>_DEPARTMENT" id="o<?php echo $view_lab_service_list->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_lab_service_list->DEPARTMENT->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_DEPARTMENT" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_DEPARTMENT" data-value-separator="<?php echo $view_lab_service_list->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_service_list->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_lab_service_list->RowIndex ?>_DEPARTMENT"<?php echo $view_lab_service_list->DEPARTMENT->editAttributes() ?>>
			<?php echo $view_lab_service_list->DEPARTMENT->selectOptionListHtml("x{$view_lab_service_list->RowIndex}_DEPARTMENT") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_DEPARTMENT">
<span<?php echo $view_lab_service_list->DEPARTMENT->viewAttributes() ?>><?php echo $view_lab_service_list->DEPARTMENT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td data-name="mas_services_billingcol" <?php echo $view_lab_service_list->mas_services_billingcol->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_mas_services_billingcol" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_mas_services_billingcol" name="x<?php echo $view_lab_service_list->RowIndex ?>_mas_services_billingcol" id="x<?php echo $view_lab_service_list->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->mas_services_billingcol->EditValue ?>"<?php echo $view_lab_service_list->mas_services_billingcol->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_mas_services_billingcol" name="o<?php echo $view_lab_service_list->RowIndex ?>_mas_services_billingcol" id="o<?php echo $view_lab_service_list->RowIndex ?>_mas_services_billingcol" value="<?php echo HtmlEncode($view_lab_service_list->mas_services_billingcol->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_mas_services_billingcol" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_mas_services_billingcol" name="x<?php echo $view_lab_service_list->RowIndex ?>_mas_services_billingcol" id="x<?php echo $view_lab_service_list->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->mas_services_billingcol->EditValue ?>"<?php echo $view_lab_service_list->mas_services_billingcol->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_mas_services_billingcol">
<span<?php echo $view_lab_service_list->mas_services_billingcol->viewAttributes() ?>><?php echo $view_lab_service_list->mas_services_billingcol->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount" <?php echo $view_lab_service_list->DrShareAmount->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_DrShareAmount" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_DrShareAmount" name="x<?php echo $view_lab_service_list->RowIndex ?>_DrShareAmount" id="x<?php echo $view_lab_service_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->DrShareAmount->EditValue ?>"<?php echo $view_lab_service_list->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_DrShareAmount" name="o<?php echo $view_lab_service_list->RowIndex ?>_DrShareAmount" id="o<?php echo $view_lab_service_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_lab_service_list->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_DrShareAmount" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_DrShareAmount" name="x<?php echo $view_lab_service_list->RowIndex ?>_DrShareAmount" id="x<?php echo $view_lab_service_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->DrShareAmount->EditValue ?>"<?php echo $view_lab_service_list->DrShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_DrShareAmount">
<span<?php echo $view_lab_service_list->DrShareAmount->viewAttributes() ?>><?php echo $view_lab_service_list->DrShareAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount" <?php echo $view_lab_service_list->HospShareAmount->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_HospShareAmount" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_HospShareAmount" name="x<?php echo $view_lab_service_list->RowIndex ?>_HospShareAmount" id="x<?php echo $view_lab_service_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->HospShareAmount->EditValue ?>"<?php echo $view_lab_service_list->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_HospShareAmount" name="o<?php echo $view_lab_service_list->RowIndex ?>_HospShareAmount" id="o<?php echo $view_lab_service_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_lab_service_list->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_HospShareAmount" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_HospShareAmount" name="x<?php echo $view_lab_service_list->RowIndex ?>_HospShareAmount" id="x<?php echo $view_lab_service_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->HospShareAmount->EditValue ?>"<?php echo $view_lab_service_list->HospShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_HospShareAmount">
<span<?php echo $view_lab_service_list->HospShareAmount->viewAttributes() ?>><?php echo $view_lab_service_list->HospShareAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->DrSharePer->Visible) { // DrSharePer ?>
		<td data-name="DrSharePer" <?php echo $view_lab_service_list->DrSharePer->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_DrSharePer" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_DrSharePer" name="x<?php echo $view_lab_service_list->RowIndex ?>_DrSharePer" id="x<?php echo $view_lab_service_list->RowIndex ?>_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->DrSharePer->EditValue ?>"<?php echo $view_lab_service_list->DrSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_DrSharePer" name="o<?php echo $view_lab_service_list->RowIndex ?>_DrSharePer" id="o<?php echo $view_lab_service_list->RowIndex ?>_DrSharePer" value="<?php echo HtmlEncode($view_lab_service_list->DrSharePer->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_DrSharePer" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_DrSharePer" name="x<?php echo $view_lab_service_list->RowIndex ?>_DrSharePer" id="x<?php echo $view_lab_service_list->RowIndex ?>_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->DrSharePer->EditValue ?>"<?php echo $view_lab_service_list->DrSharePer->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_DrSharePer">
<span<?php echo $view_lab_service_list->DrSharePer->viewAttributes() ?>><?php echo $view_lab_service_list->DrSharePer->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->HospSharePer->Visible) { // HospSharePer ?>
		<td data-name="HospSharePer" <?php echo $view_lab_service_list->HospSharePer->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_HospSharePer" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_HospSharePer" name="x<?php echo $view_lab_service_list->RowIndex ?>_HospSharePer" id="x<?php echo $view_lab_service_list->RowIndex ?>_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->HospSharePer->EditValue ?>"<?php echo $view_lab_service_list->HospSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_HospSharePer" name="o<?php echo $view_lab_service_list->RowIndex ?>_HospSharePer" id="o<?php echo $view_lab_service_list->RowIndex ?>_HospSharePer" value="<?php echo HtmlEncode($view_lab_service_list->HospSharePer->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_HospSharePer" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_HospSharePer" name="x<?php echo $view_lab_service_list->RowIndex ?>_HospSharePer" id="x<?php echo $view_lab_service_list->RowIndex ?>_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->HospSharePer->EditValue ?>"<?php echo $view_lab_service_list->HospSharePer->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_HospSharePer">
<span<?php echo $view_lab_service_list->HospSharePer->viewAttributes() ?>><?php echo $view_lab_service_list->HospSharePer->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_lab_service_list->HospID->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_service" data-field="x_HospID" name="o<?php echo $view_lab_service_list->RowIndex ?>_HospID" id="o<?php echo $view_lab_service_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_list->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_HospID">
<span<?php echo $view_lab_service_list->HospID->viewAttributes() ?>><?php echo $view_lab_service_list->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" <?php echo $view_lab_service_list->TestSubCd->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_TestSubCd" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_TestSubCd" name="x<?php echo $view_lab_service_list->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_service_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->TestSubCd->EditValue ?>"<?php echo $view_lab_service_list->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_TestSubCd" name="o<?php echo $view_lab_service_list->RowIndex ?>_TestSubCd" id="o<?php echo $view_lab_service_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_list->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_TestSubCd" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_TestSubCd" name="x<?php echo $view_lab_service_list->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_service_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->TestSubCd->EditValue ?>"<?php echo $view_lab_service_list->TestSubCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_TestSubCd">
<span<?php echo $view_lab_service_list->TestSubCd->viewAttributes() ?>><?php echo $view_lab_service_list->TestSubCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Method->Visible) { // Method ?>
		<td data-name="Method" <?php echo $view_lab_service_list->Method->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Method" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_Method" name="x<?php echo $view_lab_service_list->RowIndex ?>_Method" id="x<?php echo $view_lab_service_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Method->EditValue ?>"<?php echo $view_lab_service_list->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Method" name="o<?php echo $view_lab_service_list->RowIndex ?>_Method" id="o<?php echo $view_lab_service_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_list->Method->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Method" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_Method" name="x<?php echo $view_lab_service_list->RowIndex ?>_Method" id="x<?php echo $view_lab_service_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Method->EditValue ?>"<?php echo $view_lab_service_list->Method->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Method">
<span<?php echo $view_lab_service_list->Method->viewAttributes() ?>><?php echo $view_lab_service_list->Method->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Order->Visible) { // Order ?>
		<td data-name="Order" <?php echo $view_lab_service_list->Order->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Order" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_Order" name="x<?php echo $view_lab_service_list->RowIndex ?>_Order" id="x<?php echo $view_lab_service_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Order->EditValue ?>"<?php echo $view_lab_service_list->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Order" name="o<?php echo $view_lab_service_list->RowIndex ?>_Order" id="o<?php echo $view_lab_service_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_list->Order->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Order" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_Order" name="x<?php echo $view_lab_service_list->RowIndex ?>_Order" id="x<?php echo $view_lab_service_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Order->EditValue ?>"<?php echo $view_lab_service_list->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Order">
<span<?php echo $view_lab_service_list->Order->viewAttributes() ?>><?php echo $view_lab_service_list->Order->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->ResType->Visible) { // ResType ?>
		<td data-name="ResType" <?php echo $view_lab_service_list->ResType->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_ResType" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_ResType" name="x<?php echo $view_lab_service_list->RowIndex ?>_ResType" id="x<?php echo $view_lab_service_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->ResType->EditValue ?>"<?php echo $view_lab_service_list->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_ResType" name="o<?php echo $view_lab_service_list->RowIndex ?>_ResType" id="o<?php echo $view_lab_service_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_list->ResType->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_ResType" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_ResType" name="x<?php echo $view_lab_service_list->RowIndex ?>_ResType" id="x<?php echo $view_lab_service_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->ResType->EditValue ?>"<?php echo $view_lab_service_list->ResType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_ResType">
<span<?php echo $view_lab_service_list->ResType->viewAttributes() ?>><?php echo $view_lab_service_list->ResType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD" <?php echo $view_lab_service_list->UnitCD->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_UnitCD" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_UnitCD" name="x<?php echo $view_lab_service_list->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_service_list->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->UnitCD->EditValue ?>"<?php echo $view_lab_service_list->UnitCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_UnitCD" name="o<?php echo $view_lab_service_list->RowIndex ?>_UnitCD" id="o<?php echo $view_lab_service_list->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_list->UnitCD->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_UnitCD" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_UnitCD" name="x<?php echo $view_lab_service_list->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_service_list->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->UnitCD->EditValue ?>"<?php echo $view_lab_service_list->UnitCD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_UnitCD">
<span<?php echo $view_lab_service_list->UnitCD->viewAttributes() ?>><?php echo $view_lab_service_list->UnitCD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Sample->Visible) { // Sample ?>
		<td data-name="Sample" <?php echo $view_lab_service_list->Sample->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Sample" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_Sample" name="x<?php echo $view_lab_service_list->RowIndex ?>_Sample" id="x<?php echo $view_lab_service_list->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_service_list->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Sample->EditValue ?>"<?php echo $view_lab_service_list->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Sample" name="o<?php echo $view_lab_service_list->RowIndex ?>_Sample" id="o<?php echo $view_lab_service_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_list->Sample->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Sample" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_Sample" name="x<?php echo $view_lab_service_list->RowIndex ?>_Sample" id="x<?php echo $view_lab_service_list->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_service_list->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Sample->EditValue ?>"<?php echo $view_lab_service_list->Sample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Sample">
<span<?php echo $view_lab_service_list->Sample->viewAttributes() ?>><?php echo $view_lab_service_list->Sample->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->NoD->Visible) { // NoD ?>
		<td data-name="NoD" <?php echo $view_lab_service_list->NoD->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_NoD" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_NoD" name="x<?php echo $view_lab_service_list->RowIndex ?>_NoD" id="x<?php echo $view_lab_service_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->NoD->EditValue ?>"<?php echo $view_lab_service_list->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_NoD" name="o<?php echo $view_lab_service_list->RowIndex ?>_NoD" id="o<?php echo $view_lab_service_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_list->NoD->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_NoD" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_NoD" name="x<?php echo $view_lab_service_list->RowIndex ?>_NoD" id="x<?php echo $view_lab_service_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->NoD->EditValue ?>"<?php echo $view_lab_service_list->NoD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_NoD">
<span<?php echo $view_lab_service_list->NoD->viewAttributes() ?>><?php echo $view_lab_service_list->NoD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder" <?php echo $view_lab_service_list->BillOrder->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_BillOrder" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_BillOrder" name="x<?php echo $view_lab_service_list->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_service_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->BillOrder->EditValue ?>"<?php echo $view_lab_service_list->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_BillOrder" name="o<?php echo $view_lab_service_list->RowIndex ?>_BillOrder" id="o<?php echo $view_lab_service_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_list->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_BillOrder" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_BillOrder" name="x<?php echo $view_lab_service_list->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_service_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->BillOrder->EditValue ?>"<?php echo $view_lab_service_list->BillOrder->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_BillOrder">
<span<?php echo $view_lab_service_list->BillOrder->viewAttributes() ?>><?php echo $view_lab_service_list->BillOrder->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive" <?php echo $view_lab_service_list->Inactive->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Inactive" class="form-group">
<div id="tp_x<?php echo $view_lab_service_list->RowIndex ?>_Inactive" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_service" data-field="x_Inactive" data-value-separator="<?php echo $view_lab_service_list->Inactive->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_list->RowIndex ?>_Inactive[]" id="x<?php echo $view_lab_service_list->RowIndex ?>_Inactive[]" value="{value}"<?php echo $view_lab_service_list->Inactive->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_service_list->RowIndex ?>_Inactive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_service_list->Inactive->checkBoxListHtml(FALSE, "x{$view_lab_service_list->RowIndex}_Inactive[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Inactive" name="o<?php echo $view_lab_service_list->RowIndex ?>_Inactive[]" id="o<?php echo $view_lab_service_list->RowIndex ?>_Inactive[]" value="<?php echo HtmlEncode($view_lab_service_list->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Inactive" class="form-group">
<div id="tp_x<?php echo $view_lab_service_list->RowIndex ?>_Inactive" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_service" data-field="x_Inactive" data-value-separator="<?php echo $view_lab_service_list->Inactive->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_list->RowIndex ?>_Inactive[]" id="x<?php echo $view_lab_service_list->RowIndex ?>_Inactive[]" value="{value}"<?php echo $view_lab_service_list->Inactive->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_service_list->RowIndex ?>_Inactive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_service_list->Inactive->checkBoxListHtml(FALSE, "x{$view_lab_service_list->RowIndex}_Inactive[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Inactive">
<span<?php echo $view_lab_service_list->Inactive->viewAttributes() ?>><?php echo $view_lab_service_list->Inactive->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource" <?php echo $view_lab_service_list->Outsource->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Outsource" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_Outsource" name="x<?php echo $view_lab_service_list->RowIndex ?>_Outsource" id="x<?php echo $view_lab_service_list->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Outsource->EditValue ?>"<?php echo $view_lab_service_list->Outsource->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Outsource" name="o<?php echo $view_lab_service_list->RowIndex ?>_Outsource" id="o<?php echo $view_lab_service_list->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_list->Outsource->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Outsource" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_Outsource" name="x<?php echo $view_lab_service_list->RowIndex ?>_Outsource" id="x<?php echo $view_lab_service_list->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Outsource->EditValue ?>"<?php echo $view_lab_service_list->Outsource->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Outsource">
<span<?php echo $view_lab_service_list->Outsource->viewAttributes() ?>><?php echo $view_lab_service_list->Outsource->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample" <?php echo $view_lab_service_list->CollSample->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_CollSample" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_CollSample" name="x<?php echo $view_lab_service_list->RowIndex ?>_CollSample" id="x<?php echo $view_lab_service_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->CollSample->EditValue ?>"<?php echo $view_lab_service_list->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_CollSample" name="o<?php echo $view_lab_service_list->RowIndex ?>_CollSample" id="o<?php echo $view_lab_service_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_list->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_CollSample" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_CollSample" name="x<?php echo $view_lab_service_list->RowIndex ?>_CollSample" id="x<?php echo $view_lab_service_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->CollSample->EditValue ?>"<?php echo $view_lab_service_list->CollSample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_CollSample">
<span<?php echo $view_lab_service_list->CollSample->viewAttributes() ?>><?php echo $view_lab_service_list->CollSample->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->TestType->Visible) { // TestType ?>
		<td data-name="TestType" <?php echo $view_lab_service_list->TestType->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_TestType" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_TestType" data-value-separator="<?php echo $view_lab_service_list->TestType->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_service_list->RowIndex ?>_TestType" name="x<?php echo $view_lab_service_list->RowIndex ?>_TestType"<?php echo $view_lab_service_list->TestType->editAttributes() ?>>
			<?php echo $view_lab_service_list->TestType->selectOptionListHtml("x{$view_lab_service_list->RowIndex}_TestType") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_TestType" name="o<?php echo $view_lab_service_list->RowIndex ?>_TestType" id="o<?php echo $view_lab_service_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_service_list->TestType->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_TestType" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_TestType" data-value-separator="<?php echo $view_lab_service_list->TestType->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_service_list->RowIndex ?>_TestType" name="x<?php echo $view_lab_service_list->RowIndex ?>_TestType"<?php echo $view_lab_service_list->TestType->editAttributes() ?>>
			<?php echo $view_lab_service_list->TestType->selectOptionListHtml("x{$view_lab_service_list->RowIndex}_TestType") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_TestType">
<span<?php echo $view_lab_service_list->TestType->viewAttributes() ?>><?php echo $view_lab_service_list->TestType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->NoHeading->Visible) { // NoHeading ?>
		<td data-name="NoHeading" <?php echo $view_lab_service_list->NoHeading->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_NoHeading" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_NoHeading" name="x<?php echo $view_lab_service_list->RowIndex ?>_NoHeading" id="x<?php echo $view_lab_service_list->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->NoHeading->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->NoHeading->EditValue ?>"<?php echo $view_lab_service_list->NoHeading->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_NoHeading" name="o<?php echo $view_lab_service_list->RowIndex ?>_NoHeading" id="o<?php echo $view_lab_service_list->RowIndex ?>_NoHeading" value="<?php echo HtmlEncode($view_lab_service_list->NoHeading->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_NoHeading" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_NoHeading" name="x<?php echo $view_lab_service_list->RowIndex ?>_NoHeading" id="x<?php echo $view_lab_service_list->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->NoHeading->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->NoHeading->EditValue ?>"<?php echo $view_lab_service_list->NoHeading->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_NoHeading">
<span<?php echo $view_lab_service_list->NoHeading->viewAttributes() ?>><?php echo $view_lab_service_list->NoHeading->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->ChemicalCode->Visible) { // ChemicalCode ?>
		<td data-name="ChemicalCode" <?php echo $view_lab_service_list->ChemicalCode->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_ChemicalCode" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_ChemicalCode" name="x<?php echo $view_lab_service_list->RowIndex ?>_ChemicalCode" id="x<?php echo $view_lab_service_list->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->ChemicalCode->EditValue ?>"<?php echo $view_lab_service_list->ChemicalCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_ChemicalCode" name="o<?php echo $view_lab_service_list->RowIndex ?>_ChemicalCode" id="o<?php echo $view_lab_service_list->RowIndex ?>_ChemicalCode" value="<?php echo HtmlEncode($view_lab_service_list->ChemicalCode->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_ChemicalCode" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_ChemicalCode" name="x<?php echo $view_lab_service_list->RowIndex ?>_ChemicalCode" id="x<?php echo $view_lab_service_list->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->ChemicalCode->EditValue ?>"<?php echo $view_lab_service_list->ChemicalCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_ChemicalCode">
<span<?php echo $view_lab_service_list->ChemicalCode->viewAttributes() ?>><?php echo $view_lab_service_list->ChemicalCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->ChemicalName->Visible) { // ChemicalName ?>
		<td data-name="ChemicalName" <?php echo $view_lab_service_list->ChemicalName->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_ChemicalName" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_ChemicalName" name="x<?php echo $view_lab_service_list->RowIndex ?>_ChemicalName" id="x<?php echo $view_lab_service_list->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->ChemicalName->EditValue ?>"<?php echo $view_lab_service_list->ChemicalName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_ChemicalName" name="o<?php echo $view_lab_service_list->RowIndex ?>_ChemicalName" id="o<?php echo $view_lab_service_list->RowIndex ?>_ChemicalName" value="<?php echo HtmlEncode($view_lab_service_list->ChemicalName->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_ChemicalName" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_ChemicalName" name="x<?php echo $view_lab_service_list->RowIndex ?>_ChemicalName" id="x<?php echo $view_lab_service_list->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->ChemicalName->EditValue ?>"<?php echo $view_lab_service_list->ChemicalName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_ChemicalName">
<span<?php echo $view_lab_service_list->ChemicalName->viewAttributes() ?>><?php echo $view_lab_service_list->ChemicalName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Utilaization->Visible) { // Utilaization ?>
		<td data-name="Utilaization" <?php echo $view_lab_service_list->Utilaization->cellAttributes() ?>>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Utilaization" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_Utilaization" name="x<?php echo $view_lab_service_list->RowIndex ?>_Utilaization" id="x<?php echo $view_lab_service_list->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->Utilaization->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Utilaization->EditValue ?>"<?php echo $view_lab_service_list->Utilaization->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Utilaization" name="o<?php echo $view_lab_service_list->RowIndex ?>_Utilaization" id="o<?php echo $view_lab_service_list->RowIndex ?>_Utilaization" value="<?php echo HtmlEncode($view_lab_service_list->Utilaization->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Utilaization" class="form-group">
<input type="text" data-table="view_lab_service" data-field="x_Utilaization" name="x<?php echo $view_lab_service_list->RowIndex ?>_Utilaization" id="x<?php echo $view_lab_service_list->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->Utilaization->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Utilaization->EditValue ?>"<?php echo $view_lab_service_list->Utilaization->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_list->RowCount ?>_view_lab_service_Utilaization">
<span<?php echo $view_lab_service_list->Utilaization->viewAttributes() ?>><?php echo $view_lab_service_list->Utilaization->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_service_list->ListOptions->render("body", "right", $view_lab_service_list->RowCount);
?>
	</tr>
<?php if ($view_lab_service->RowType == ROWTYPE_ADD || $view_lab_service->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_lab_servicelist", "load"], function() {
	fview_lab_servicelist.updateLists(<?php echo $view_lab_service_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_lab_service_list->isGridAdd())
		if (!$view_lab_service_list->Recordset->EOF)
			$view_lab_service_list->Recordset->moveNext();
}
?>
<?php
	if ($view_lab_service_list->isGridAdd() || $view_lab_service_list->isGridEdit()) {
		$view_lab_service_list->RowIndex = '$rowindex$';
		$view_lab_service_list->loadRowValues();

		// Set row properties
		$view_lab_service->resetAttributes();
		$view_lab_service->RowAttrs->merge(["data-rowindex" => $view_lab_service_list->RowIndex, "id" => "r0_view_lab_service", "data-rowtype" => ROWTYPE_ADD]);
		$view_lab_service->RowAttrs->appendClass("ew-template");
		$view_lab_service->RowType = ROWTYPE_ADD;

		// Render row
		$view_lab_service_list->renderRow();

		// Render list options
		$view_lab_service_list->renderListOptions();
		$view_lab_service_list->StartRowCount = 0;
?>
	<tr <?php echo $view_lab_service->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_service_list->ListOptions->render("body", "left", $view_lab_service_list->RowIndex);
?>
	<?php if ($view_lab_service_list->Id->Visible) { // Id ?>
		<td data-name="Id">
<span id="el$rowindex$_view_lab_service_Id" class="form-group view_lab_service_Id"></span>
<input type="hidden" data-table="view_lab_service" data-field="x_Id" name="o<?php echo $view_lab_service_list->RowIndex ?>_Id" id="o<?php echo $view_lab_service_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_list->Id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->CODE->Visible) { // CODE ?>
		<td data-name="CODE">
<span id="el$rowindex$_view_lab_service_CODE" class="form-group view_lab_service_CODE">
<input type="text" data-table="view_lab_service" data-field="x_CODE" name="x<?php echo $view_lab_service_list->RowIndex ?>_CODE" id="x<?php echo $view_lab_service_list->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_list->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->CODE->EditValue ?>"<?php echo $view_lab_service_list->CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_CODE" name="o<?php echo $view_lab_service_list->RowIndex ?>_CODE" id="o<?php echo $view_lab_service_list->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_list->CODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE">
<span id="el$rowindex$_view_lab_service_SERVICE" class="form-group view_lab_service_SERVICE">
<input type="text" data-table="view_lab_service" data-field="x_SERVICE" name="x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_list->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->SERVICE->EditValue ?>"<?php echo $view_lab_service_list->SERVICE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_SERVICE" name="o<?php echo $view_lab_service_list->RowIndex ?>_SERVICE" id="o<?php echo $view_lab_service_list->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_list->SERVICE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS">
<span id="el$rowindex$_view_lab_service_UNITS" class="form-group view_lab_service_UNITS">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_lab_service_list->RowIndex ?>_UNITS"><?php echo EmptyValue(strval($view_lab_service_list->UNITS->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_lab_service_list->UNITS->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_lab_service_list->UNITS->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_lab_service_list->UNITS->ReadOnly || $view_lab_service_list->UNITS->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_lab_service_list->RowIndex ?>_UNITS',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$view_lab_service_list->UNITS->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_service_list->RowIndex ?>_UNITS" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_list->UNITS->caption() ?>" data-title="<?php echo $view_lab_service_list->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_service_list->RowIndex ?>_UNITS',url:'lab_unit_mastaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $view_lab_service_list->UNITS->Lookup->getParamTag($view_lab_service_list, "p_x" . $view_lab_service_list->RowIndex . "_UNITS") ?>
<input type="hidden" data-table="view_lab_service" data-field="x_UNITS" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_lab_service_list->UNITS->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_list->RowIndex ?>_UNITS" id="x<?php echo $view_lab_service_list->RowIndex ?>_UNITS" value="<?php echo $view_lab_service_list->UNITS->CurrentValue ?>"<?php echo $view_lab_service_list->UNITS->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_UNITS" name="o<?php echo $view_lab_service_list->RowIndex ?>_UNITS" id="o<?php echo $view_lab_service_list->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_list->UNITS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->AMOUNT->Visible) { // AMOUNT ?>
		<td data-name="AMOUNT">
<span id="el$rowindex$_view_lab_service_AMOUNT" class="form-group view_lab_service_AMOUNT">
<input type="text" data-table="view_lab_service" data-field="x_AMOUNT" name="x<?php echo $view_lab_service_list->RowIndex ?>_AMOUNT" id="x<?php echo $view_lab_service_list->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_list->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->AMOUNT->EditValue ?>"<?php echo $view_lab_service_list->AMOUNT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_AMOUNT" name="o<?php echo $view_lab_service_list->RowIndex ?>_AMOUNT" id="o<?php echo $view_lab_service_list->RowIndex ?>_AMOUNT" value="<?php echo HtmlEncode($view_lab_service_list->AMOUNT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE">
<span id="el$rowindex$_view_lab_service_SERVICE_TYPE" class="form-group view_lab_service_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $view_lab_service_list->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE"<?php echo $view_lab_service_list->SERVICE_TYPE->editAttributes() ?>>
			<?php echo $view_lab_service_list->SERVICE_TYPE->selectOptionListHtml("x{$view_lab_service_list->RowIndex}_SERVICE_TYPE") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_lab_services_type") && !$view_lab_service_list->SERVICE_TYPE->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_list->SERVICE_TYPE->caption() ?>" data-title="<?php echo $view_lab_service_list->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE',url:'mas_lab_services_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $view_lab_service_list->SERVICE_TYPE->Lookup->getParamTag($view_lab_service_list, "p_x" . $view_lab_service_list->RowIndex . "_SERVICE_TYPE") ?>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_SERVICE_TYPE" name="o<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $view_lab_service_list->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_lab_service_list->SERVICE_TYPE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT">
<span id="el$rowindex$_view_lab_service_DEPARTMENT" class="form-group view_lab_service_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_DEPARTMENT" data-value-separator="<?php echo $view_lab_service_list->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_service_list->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_lab_service_list->RowIndex ?>_DEPARTMENT"<?php echo $view_lab_service_list->DEPARTMENT->editAttributes() ?>>
			<?php echo $view_lab_service_list->DEPARTMENT->selectOptionListHtml("x{$view_lab_service_list->RowIndex}_DEPARTMENT") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_DEPARTMENT" name="o<?php echo $view_lab_service_list->RowIndex ?>_DEPARTMENT" id="o<?php echo $view_lab_service_list->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_lab_service_list->DEPARTMENT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td data-name="mas_services_billingcol">
<span id="el$rowindex$_view_lab_service_mas_services_billingcol" class="form-group view_lab_service_mas_services_billingcol">
<input type="text" data-table="view_lab_service" data-field="x_mas_services_billingcol" name="x<?php echo $view_lab_service_list->RowIndex ?>_mas_services_billingcol" id="x<?php echo $view_lab_service_list->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->mas_services_billingcol->EditValue ?>"<?php echo $view_lab_service_list->mas_services_billingcol->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_mas_services_billingcol" name="o<?php echo $view_lab_service_list->RowIndex ?>_mas_services_billingcol" id="o<?php echo $view_lab_service_list->RowIndex ?>_mas_services_billingcol" value="<?php echo HtmlEncode($view_lab_service_list->mas_services_billingcol->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount">
<span id="el$rowindex$_view_lab_service_DrShareAmount" class="form-group view_lab_service_DrShareAmount">
<input type="text" data-table="view_lab_service" data-field="x_DrShareAmount" name="x<?php echo $view_lab_service_list->RowIndex ?>_DrShareAmount" id="x<?php echo $view_lab_service_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->DrShareAmount->EditValue ?>"<?php echo $view_lab_service_list->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_DrShareAmount" name="o<?php echo $view_lab_service_list->RowIndex ?>_DrShareAmount" id="o<?php echo $view_lab_service_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_lab_service_list->DrShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount">
<span id="el$rowindex$_view_lab_service_HospShareAmount" class="form-group view_lab_service_HospShareAmount">
<input type="text" data-table="view_lab_service" data-field="x_HospShareAmount" name="x<?php echo $view_lab_service_list->RowIndex ?>_HospShareAmount" id="x<?php echo $view_lab_service_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->HospShareAmount->EditValue ?>"<?php echo $view_lab_service_list->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_HospShareAmount" name="o<?php echo $view_lab_service_list->RowIndex ?>_HospShareAmount" id="o<?php echo $view_lab_service_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_lab_service_list->HospShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->DrSharePer->Visible) { // DrSharePer ?>
		<td data-name="DrSharePer">
<span id="el$rowindex$_view_lab_service_DrSharePer" class="form-group view_lab_service_DrSharePer">
<input type="text" data-table="view_lab_service" data-field="x_DrSharePer" name="x<?php echo $view_lab_service_list->RowIndex ?>_DrSharePer" id="x<?php echo $view_lab_service_list->RowIndex ?>_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->DrSharePer->EditValue ?>"<?php echo $view_lab_service_list->DrSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_DrSharePer" name="o<?php echo $view_lab_service_list->RowIndex ?>_DrSharePer" id="o<?php echo $view_lab_service_list->RowIndex ?>_DrSharePer" value="<?php echo HtmlEncode($view_lab_service_list->DrSharePer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->HospSharePer->Visible) { // HospSharePer ?>
		<td data-name="HospSharePer">
<span id="el$rowindex$_view_lab_service_HospSharePer" class="form-group view_lab_service_HospSharePer">
<input type="text" data-table="view_lab_service" data-field="x_HospSharePer" name="x<?php echo $view_lab_service_list->RowIndex ?>_HospSharePer" id="x<?php echo $view_lab_service_list->RowIndex ?>_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->HospSharePer->EditValue ?>"<?php echo $view_lab_service_list->HospSharePer->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_HospSharePer" name="o<?php echo $view_lab_service_list->RowIndex ?>_HospSharePer" id="o<?php echo $view_lab_service_list->RowIndex ?>_HospSharePer" value="<?php echo HtmlEncode($view_lab_service_list->HospSharePer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="view_lab_service" data-field="x_HospID" name="o<?php echo $view_lab_service_list->RowIndex ?>_HospID" id="o<?php echo $view_lab_service_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_list->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<span id="el$rowindex$_view_lab_service_TestSubCd" class="form-group view_lab_service_TestSubCd">
<input type="text" data-table="view_lab_service" data-field="x_TestSubCd" name="x<?php echo $view_lab_service_list->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_service_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->TestSubCd->EditValue ?>"<?php echo $view_lab_service_list->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_TestSubCd" name="o<?php echo $view_lab_service_list->RowIndex ?>_TestSubCd" id="o<?php echo $view_lab_service_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_list->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Method->Visible) { // Method ?>
		<td data-name="Method">
<span id="el$rowindex$_view_lab_service_Method" class="form-group view_lab_service_Method">
<input type="text" data-table="view_lab_service" data-field="x_Method" name="x<?php echo $view_lab_service_list->RowIndex ?>_Method" id="x<?php echo $view_lab_service_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Method->EditValue ?>"<?php echo $view_lab_service_list->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Method" name="o<?php echo $view_lab_service_list->RowIndex ?>_Method" id="o<?php echo $view_lab_service_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_list->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Order->Visible) { // Order ?>
		<td data-name="Order">
<span id="el$rowindex$_view_lab_service_Order" class="form-group view_lab_service_Order">
<input type="text" data-table="view_lab_service" data-field="x_Order" name="x<?php echo $view_lab_service_list->RowIndex ?>_Order" id="x<?php echo $view_lab_service_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Order->EditValue ?>"<?php echo $view_lab_service_list->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Order" name="o<?php echo $view_lab_service_list->RowIndex ?>_Order" id="o<?php echo $view_lab_service_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_list->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->ResType->Visible) { // ResType ?>
		<td data-name="ResType">
<span id="el$rowindex$_view_lab_service_ResType" class="form-group view_lab_service_ResType">
<input type="text" data-table="view_lab_service" data-field="x_ResType" name="x<?php echo $view_lab_service_list->RowIndex ?>_ResType" id="x<?php echo $view_lab_service_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->ResType->EditValue ?>"<?php echo $view_lab_service_list->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_ResType" name="o<?php echo $view_lab_service_list->RowIndex ?>_ResType" id="o<?php echo $view_lab_service_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_list->ResType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD">
<span id="el$rowindex$_view_lab_service_UnitCD" class="form-group view_lab_service_UnitCD">
<input type="text" data-table="view_lab_service" data-field="x_UnitCD" name="x<?php echo $view_lab_service_list->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_service_list->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->UnitCD->EditValue ?>"<?php echo $view_lab_service_list->UnitCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_UnitCD" name="o<?php echo $view_lab_service_list->RowIndex ?>_UnitCD" id="o<?php echo $view_lab_service_list->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_list->UnitCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Sample->Visible) { // Sample ?>
		<td data-name="Sample">
<span id="el$rowindex$_view_lab_service_Sample" class="form-group view_lab_service_Sample">
<input type="text" data-table="view_lab_service" data-field="x_Sample" name="x<?php echo $view_lab_service_list->RowIndex ?>_Sample" id="x<?php echo $view_lab_service_list->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_service_list->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Sample->EditValue ?>"<?php echo $view_lab_service_list->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Sample" name="o<?php echo $view_lab_service_list->RowIndex ?>_Sample" id="o<?php echo $view_lab_service_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_list->Sample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->NoD->Visible) { // NoD ?>
		<td data-name="NoD">
<span id="el$rowindex$_view_lab_service_NoD" class="form-group view_lab_service_NoD">
<input type="text" data-table="view_lab_service" data-field="x_NoD" name="x<?php echo $view_lab_service_list->RowIndex ?>_NoD" id="x<?php echo $view_lab_service_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->NoD->EditValue ?>"<?php echo $view_lab_service_list->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_NoD" name="o<?php echo $view_lab_service_list->RowIndex ?>_NoD" id="o<?php echo $view_lab_service_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_list->NoD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder">
<span id="el$rowindex$_view_lab_service_BillOrder" class="form-group view_lab_service_BillOrder">
<input type="text" data-table="view_lab_service" data-field="x_BillOrder" name="x<?php echo $view_lab_service_list->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_service_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_list->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->BillOrder->EditValue ?>"<?php echo $view_lab_service_list->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_BillOrder" name="o<?php echo $view_lab_service_list->RowIndex ?>_BillOrder" id="o<?php echo $view_lab_service_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_list->BillOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive">
<span id="el$rowindex$_view_lab_service_Inactive" class="form-group view_lab_service_Inactive">
<div id="tp_x<?php echo $view_lab_service_list->RowIndex ?>_Inactive" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_service" data-field="x_Inactive" data-value-separator="<?php echo $view_lab_service_list->Inactive->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_list->RowIndex ?>_Inactive[]" id="x<?php echo $view_lab_service_list->RowIndex ?>_Inactive[]" value="{value}"<?php echo $view_lab_service_list->Inactive->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_service_list->RowIndex ?>_Inactive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_service_list->Inactive->checkBoxListHtml(FALSE, "x{$view_lab_service_list->RowIndex}_Inactive[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Inactive" name="o<?php echo $view_lab_service_list->RowIndex ?>_Inactive[]" id="o<?php echo $view_lab_service_list->RowIndex ?>_Inactive[]" value="<?php echo HtmlEncode($view_lab_service_list->Inactive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource">
<span id="el$rowindex$_view_lab_service_Outsource" class="form-group view_lab_service_Outsource">
<input type="text" data-table="view_lab_service" data-field="x_Outsource" name="x<?php echo $view_lab_service_list->RowIndex ?>_Outsource" id="x<?php echo $view_lab_service_list->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Outsource->EditValue ?>"<?php echo $view_lab_service_list->Outsource->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Outsource" name="o<?php echo $view_lab_service_list->RowIndex ?>_Outsource" id="o<?php echo $view_lab_service_list->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_list->Outsource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample">
<span id="el$rowindex$_view_lab_service_CollSample" class="form-group view_lab_service_CollSample">
<input type="text" data-table="view_lab_service" data-field="x_CollSample" name="x<?php echo $view_lab_service_list->RowIndex ?>_CollSample" id="x<?php echo $view_lab_service_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->CollSample->EditValue ?>"<?php echo $view_lab_service_list->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_CollSample" name="o<?php echo $view_lab_service_list->RowIndex ?>_CollSample" id="o<?php echo $view_lab_service_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_list->CollSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<span id="el$rowindex$_view_lab_service_TestType" class="form-group view_lab_service_TestType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_TestType" data-value-separator="<?php echo $view_lab_service_list->TestType->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_lab_service_list->RowIndex ?>_TestType" name="x<?php echo $view_lab_service_list->RowIndex ?>_TestType"<?php echo $view_lab_service_list->TestType->editAttributes() ?>>
			<?php echo $view_lab_service_list->TestType->selectOptionListHtml("x{$view_lab_service_list->RowIndex}_TestType") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_TestType" name="o<?php echo $view_lab_service_list->RowIndex ?>_TestType" id="o<?php echo $view_lab_service_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_service_list->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->NoHeading->Visible) { // NoHeading ?>
		<td data-name="NoHeading">
<span id="el$rowindex$_view_lab_service_NoHeading" class="form-group view_lab_service_NoHeading">
<input type="text" data-table="view_lab_service" data-field="x_NoHeading" name="x<?php echo $view_lab_service_list->RowIndex ?>_NoHeading" id="x<?php echo $view_lab_service_list->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->NoHeading->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->NoHeading->EditValue ?>"<?php echo $view_lab_service_list->NoHeading->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_NoHeading" name="o<?php echo $view_lab_service_list->RowIndex ?>_NoHeading" id="o<?php echo $view_lab_service_list->RowIndex ?>_NoHeading" value="<?php echo HtmlEncode($view_lab_service_list->NoHeading->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->ChemicalCode->Visible) { // ChemicalCode ?>
		<td data-name="ChemicalCode">
<span id="el$rowindex$_view_lab_service_ChemicalCode" class="form-group view_lab_service_ChemicalCode">
<input type="text" data-table="view_lab_service" data-field="x_ChemicalCode" name="x<?php echo $view_lab_service_list->RowIndex ?>_ChemicalCode" id="x<?php echo $view_lab_service_list->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->ChemicalCode->EditValue ?>"<?php echo $view_lab_service_list->ChemicalCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_ChemicalCode" name="o<?php echo $view_lab_service_list->RowIndex ?>_ChemicalCode" id="o<?php echo $view_lab_service_list->RowIndex ?>_ChemicalCode" value="<?php echo HtmlEncode($view_lab_service_list->ChemicalCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->ChemicalName->Visible) { // ChemicalName ?>
		<td data-name="ChemicalName">
<span id="el$rowindex$_view_lab_service_ChemicalName" class="form-group view_lab_service_ChemicalName">
<input type="text" data-table="view_lab_service" data-field="x_ChemicalName" name="x<?php echo $view_lab_service_list->RowIndex ?>_ChemicalName" id="x<?php echo $view_lab_service_list->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->ChemicalName->EditValue ?>"<?php echo $view_lab_service_list->ChemicalName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_ChemicalName" name="o<?php echo $view_lab_service_list->RowIndex ?>_ChemicalName" id="o<?php echo $view_lab_service_list->RowIndex ?>_ChemicalName" value="<?php echo HtmlEncode($view_lab_service_list->ChemicalName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_list->Utilaization->Visible) { // Utilaization ?>
		<td data-name="Utilaization">
<span id="el$rowindex$_view_lab_service_Utilaization" class="form-group view_lab_service_Utilaization">
<input type="text" data-table="view_lab_service" data-field="x_Utilaization" name="x<?php echo $view_lab_service_list->RowIndex ?>_Utilaization" id="x<?php echo $view_lab_service_list->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_list->Utilaization->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_list->Utilaization->EditValue ?>"<?php echo $view_lab_service_list->Utilaization->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service" data-field="x_Utilaization" name="o<?php echo $view_lab_service_list->RowIndex ?>_Utilaization" id="o<?php echo $view_lab_service_list->RowIndex ?>_Utilaization" value="<?php echo HtmlEncode($view_lab_service_list->Utilaization->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_service_list->ListOptions->render("body", "right", $view_lab_service_list->RowIndex);
?>
<script>
loadjs.ready(["fview_lab_servicelist", "load"], function() {
	fview_lab_servicelist.updateLists(<?php echo $view_lab_service_list->RowIndex ?>);
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
<?php if ($view_lab_service_list->isAdd() || $view_lab_service_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $view_lab_service_list->FormKeyCountName ?>" id="<?php echo $view_lab_service_list->FormKeyCountName ?>" value="<?php echo $view_lab_service_list->KeyCount ?>">
<?php } ?>
<?php if ($view_lab_service_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $view_lab_service_list->FormKeyCountName ?>" id="<?php echo $view_lab_service_list->FormKeyCountName ?>" value="<?php echo $view_lab_service_list->KeyCount ?>">
<?php echo $view_lab_service_list->MultiSelectKey ?>
<?php } ?>
<?php if ($view_lab_service_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $view_lab_service_list->FormKeyCountName ?>" id="<?php echo $view_lab_service_list->FormKeyCountName ?>" value="<?php echo $view_lab_service_list->KeyCount ?>">
<?php } ?>
<?php if ($view_lab_service_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_lab_service_list->FormKeyCountName ?>" id="<?php echo $view_lab_service_list->FormKeyCountName ?>" value="<?php echo $view_lab_service_list->KeyCount ?>">
<?php echo $view_lab_service_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_lab_service->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_lab_service_list->Recordset)
	$view_lab_service_list->Recordset->Close();
?>
<?php if (!$view_lab_service_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_lab_service_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_lab_service_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_service_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_lab_service_list->TotalRecords == 0 && !$view_lab_service->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_lab_service_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_lab_service_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_lab_service_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_lab_service->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_lab_service",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_lab_service_list->terminate();
?>