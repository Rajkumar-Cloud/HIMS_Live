<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_lab_resultreleased_auth_grid))
	$view_lab_resultreleased_auth_grid = new view_lab_resultreleased_auth_grid();

// Run the page
$view_lab_resultreleased_auth_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_resultreleased_auth_grid->Page_Render();
?>
<?php if (!$view_lab_resultreleased_auth_grid->isExport()) { ?>
<script>
var fview_lab_resultreleased_authgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fview_lab_resultreleased_authgrid = new ew.Form("fview_lab_resultreleased_authgrid", "grid");
	fview_lab_resultreleased_authgrid.formKeyCountName = '<?php echo $view_lab_resultreleased_auth_grid->FormKeyCountName ?>';

	// Validate form
	fview_lab_resultreleased_authgrid.validate = function() {
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
			<?php if ($view_lab_resultreleased_auth_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->id->caption(), $view_lab_resultreleased_auth_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->PatID->caption(), $view_lab_resultreleased_auth_grid->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased_auth_grid->PatID->errorMessage()) ?>");
			<?php if ($view_lab_resultreleased_auth_grid->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->PatientName->caption(), $view_lab_resultreleased_auth_grid->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->Age->caption(), $view_lab_resultreleased_auth_grid->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->Gender->caption(), $view_lab_resultreleased_auth_grid->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->sid->Required) { ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->sid->caption(), $view_lab_resultreleased_auth_grid->sid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased_auth_grid->sid->errorMessage()) ?>");
			<?php if ($view_lab_resultreleased_auth_grid->ItemCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->ItemCode->caption(), $view_lab_resultreleased_auth_grid->ItemCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->DEptCd->Required) { ?>
				elm = this.getElements("x" + infix + "_DEptCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->DEptCd->caption(), $view_lab_resultreleased_auth_grid->DEptCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->Resulted->Required) { ?>
				elm = this.getElements("x" + infix + "_Resulted[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->Resulted->caption(), $view_lab_resultreleased_auth_grid->Resulted->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->Services->Required) { ?>
				elm = this.getElements("x" + infix + "_Services");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->Services->caption(), $view_lab_resultreleased_auth_grid->Services->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->LabReport->Required) { ?>
				elm = this.getElements("x" + infix + "_LabReport");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->LabReport->caption(), $view_lab_resultreleased_auth_grid->LabReport->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->Pic1->Required) { ?>
				felm = this.getElements("x" + infix + "_Pic1");
				elm = this.getElements("fn_x" + infix + "_Pic1");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->Pic1->caption(), $view_lab_resultreleased_auth_grid->Pic1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->Pic2->Required) { ?>
				felm = this.getElements("x" + infix + "_Pic2");
				elm = this.getElements("fn_x" + infix + "_Pic2");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->Pic2->caption(), $view_lab_resultreleased_auth_grid->Pic2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->TestUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_TestUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->TestUnit->caption(), $view_lab_resultreleased_auth_grid->TestUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->RefValue->Required) { ?>
				elm = this.getElements("x" + infix + "_RefValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->RefValue->caption(), $view_lab_resultreleased_auth_grid->RefValue->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->Order->caption(), $view_lab_resultreleased_auth_grid->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased_auth_grid->Order->errorMessage()) ?>");
			<?php if ($view_lab_resultreleased_auth_grid->Repeated->Required) { ?>
				elm = this.getElements("x" + infix + "_Repeated[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->Repeated->caption(), $view_lab_resultreleased_auth_grid->Repeated->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->Vid->Required) { ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->Vid->caption(), $view_lab_resultreleased_auth_grid->Vid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased_auth_grid->Vid->errorMessage()) ?>");
			<?php if ($view_lab_resultreleased_auth_grid->invoiceId->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->invoiceId->caption(), $view_lab_resultreleased_auth_grid->invoiceId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased_auth_grid->invoiceId->errorMessage()) ?>");
			<?php if ($view_lab_resultreleased_auth_grid->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->DrID->caption(), $view_lab_resultreleased_auth_grid->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased_auth_grid->DrID->errorMessage()) ?>");
			<?php if ($view_lab_resultreleased_auth_grid->DrCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_DrCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->DrCODE->caption(), $view_lab_resultreleased_auth_grid->DrCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->DrName->Required) { ?>
				elm = this.getElements("x" + infix + "_DrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->DrName->caption(), $view_lab_resultreleased_auth_grid->DrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->Department->caption(), $view_lab_resultreleased_auth_grid->Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->createddatetime->caption(), $view_lab_resultreleased_auth_grid->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased_auth_grid->createddatetime->errorMessage()) ?>");
			<?php if ($view_lab_resultreleased_auth_grid->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->status->caption(), $view_lab_resultreleased_auth_grid->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased_auth_grid->status->errorMessage()) ?>");
			<?php if ($view_lab_resultreleased_auth_grid->TestType->Required) { ?>
				elm = this.getElements("x" + infix + "_TestType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->TestType->caption(), $view_lab_resultreleased_auth_grid->TestType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->ResultDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->ResultDate->caption(), $view_lab_resultreleased_auth_grid->ResultDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->ResultedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->ResultedBy->caption(), $view_lab_resultreleased_auth_grid->ResultedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleased_auth_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased_auth_grid->HospID->caption(), $view_lab_resultreleased_auth_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased_auth_grid->HospID->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fview_lab_resultreleased_authgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "PatID", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
		if (ew.valueChanged(fobj, infix, "Age", false)) return false;
		if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
		if (ew.valueChanged(fobj, infix, "sid", false)) return false;
		if (ew.valueChanged(fobj, infix, "ItemCode", false)) return false;
		if (ew.valueChanged(fobj, infix, "DEptCd", false)) return false;
		if (ew.valueChanged(fobj, infix, "Resulted[]", false)) return false;
		if (ew.valueChanged(fobj, infix, "Services", false)) return false;
		if (ew.valueChanged(fobj, infix, "LabReport", false)) return false;
		if (ew.valueChanged(fobj, infix, "Pic1", false)) return false;
		if (ew.valueChanged(fobj, infix, "Pic2", false)) return false;
		if (ew.valueChanged(fobj, infix, "TestUnit", false)) return false;
		if (ew.valueChanged(fobj, infix, "RefValue", false)) return false;
		if (ew.valueChanged(fobj, infix, "Order", false)) return false;
		if (ew.valueChanged(fobj, infix, "Repeated[]", false)) return false;
		if (ew.valueChanged(fobj, infix, "Vid", false)) return false;
		if (ew.valueChanged(fobj, infix, "invoiceId", false)) return false;
		if (ew.valueChanged(fobj, infix, "DrID", false)) return false;
		if (ew.valueChanged(fobj, infix, "DrCODE", false)) return false;
		if (ew.valueChanged(fobj, infix, "DrName", false)) return false;
		if (ew.valueChanged(fobj, infix, "Department", false)) return false;
		if (ew.valueChanged(fobj, infix, "createddatetime", false)) return false;
		if (ew.valueChanged(fobj, infix, "status", false)) return false;
		if (ew.valueChanged(fobj, infix, "TestType", false)) return false;
		if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fview_lab_resultreleased_authgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_lab_resultreleased_authgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_lab_resultreleased_authgrid.lists["x_Resulted[]"] = <?php echo $view_lab_resultreleased_auth_grid->Resulted->Lookup->toClientList($view_lab_resultreleased_auth_grid) ?>;
	fview_lab_resultreleased_authgrid.lists["x_Resulted[]"].options = <?php echo JsonEncode($view_lab_resultreleased_auth_grid->Resulted->options(FALSE, TRUE)) ?>;
	fview_lab_resultreleased_authgrid.lists["x_TestUnit"] = <?php echo $view_lab_resultreleased_auth_grid->TestUnit->Lookup->toClientList($view_lab_resultreleased_auth_grid) ?>;
	fview_lab_resultreleased_authgrid.lists["x_TestUnit"].options = <?php echo JsonEncode($view_lab_resultreleased_auth_grid->TestUnit->lookupOptions()) ?>;
	fview_lab_resultreleased_authgrid.autoSuggests["x_TestUnit"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_lab_resultreleased_authgrid.lists["x_Repeated[]"] = <?php echo $view_lab_resultreleased_auth_grid->Repeated->Lookup->toClientList($view_lab_resultreleased_auth_grid) ?>;
	fview_lab_resultreleased_authgrid.lists["x_Repeated[]"].options = <?php echo JsonEncode($view_lab_resultreleased_auth_grid->Repeated->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_lab_resultreleased_authgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$view_lab_resultreleased_auth_grid->renderOtherOptions();
?>
<?php if ($view_lab_resultreleased_auth_grid->TotalRecords > 0 || $view_lab_resultreleased_auth->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_lab_resultreleased_auth_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_resultreleased_auth">
<?php if ($view_lab_resultreleased_auth_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_lab_resultreleased_auth_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_lab_resultreleased_authgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_lab_resultreleased_auth" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_lab_resultreleased_authgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_lab_resultreleased_auth->RowType = ROWTYPE_HEADER;

// Render list options
$view_lab_resultreleased_auth_grid->renderListOptions();

// Render list options (header, left)
$view_lab_resultreleased_auth_grid->ListOptions->render("header", "left");
?>
<?php if ($view_lab_resultreleased_auth_grid->id->Visible) { // id ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_lab_resultreleased_auth_grid->id->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_id" class="view_lab_resultreleased_auth_id"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_lab_resultreleased_auth_grid->id->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_id" class="view_lab_resultreleased_auth_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->PatID->Visible) { // PatID ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_lab_resultreleased_auth_grid->PatID->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_PatID" class="view_lab_resultreleased_auth_PatID"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_lab_resultreleased_auth_grid->PatID->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_PatID" class="view_lab_resultreleased_auth_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->PatientName->Visible) { // PatientName ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_resultreleased_auth_grid->PatientName->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_PatientName" class="view_lab_resultreleased_auth_PatientName"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_resultreleased_auth_grid->PatientName->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_PatientName" class="view_lab_resultreleased_auth_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->Age->Visible) { // Age ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_lab_resultreleased_auth_grid->Age->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_Age" class="view_lab_resultreleased_auth_Age"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_lab_resultreleased_auth_grid->Age->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_Age" class="view_lab_resultreleased_auth_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->Gender->Visible) { // Gender ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_lab_resultreleased_auth_grid->Gender->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_Gender" class="view_lab_resultreleased_auth_Gender"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_lab_resultreleased_auth_grid->Gender->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_Gender" class="view_lab_resultreleased_auth_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->sid->Visible) { // sid ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_lab_resultreleased_auth_grid->sid->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_sid" class="view_lab_resultreleased_auth_sid"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_lab_resultreleased_auth_grid->sid->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_sid" class="view_lab_resultreleased_auth_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->sid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->sid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_lab_resultreleased_auth_grid->ItemCode->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_ItemCode" class="view_lab_resultreleased_auth_ItemCode"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_lab_resultreleased_auth_grid->ItemCode->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_ItemCode" class="view_lab_resultreleased_auth_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->ItemCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->ItemCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_lab_resultreleased_auth_grid->DEptCd->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_DEptCd" class="view_lab_resultreleased_auth_DEptCd"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_lab_resultreleased_auth_grid->DEptCd->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_DEptCd" class="view_lab_resultreleased_auth_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->DEptCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->DEptCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->Resulted->Visible) { // Resulted ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $view_lab_resultreleased_auth_grid->Resulted->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_Resulted" class="view_lab_resultreleased_auth_Resulted"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Resulted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $view_lab_resultreleased_auth_grid->Resulted->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_Resulted" class="view_lab_resultreleased_auth_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Resulted->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->Resulted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->Resulted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->Services->Visible) { // Services ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_lab_resultreleased_auth_grid->Services->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_Services" class="view_lab_resultreleased_auth_Services"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_lab_resultreleased_auth_grid->Services->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_Services" class="view_lab_resultreleased_auth_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->Services->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->Services->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->LabReport->Visible) { // LabReport ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->LabReport) == "") { ?>
		<th data-name="LabReport" class="<?php echo $view_lab_resultreleased_auth_grid->LabReport->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_LabReport" class="view_lab_resultreleased_auth_LabReport"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->LabReport->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabReport" class="<?php echo $view_lab_resultreleased_auth_grid->LabReport->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_LabReport" class="view_lab_resultreleased_auth_LabReport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->LabReport->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->LabReport->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->LabReport->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $view_lab_resultreleased_auth_grid->Pic1->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_Pic1" class="view_lab_resultreleased_auth_Pic1"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $view_lab_resultreleased_auth_grid->Pic1->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_Pic1" class="view_lab_resultreleased_auth_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Pic1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->Pic1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->Pic1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $view_lab_resultreleased_auth_grid->Pic2->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_Pic2" class="view_lab_resultreleased_auth_Pic2"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $view_lab_resultreleased_auth_grid->Pic2->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_Pic2" class="view_lab_resultreleased_auth_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Pic2->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->Pic2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->Pic2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $view_lab_resultreleased_auth_grid->TestUnit->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_TestUnit" class="view_lab_resultreleased_auth_TestUnit"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->TestUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $view_lab_resultreleased_auth_grid->TestUnit->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_TestUnit" class="view_lab_resultreleased_auth_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->TestUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->TestUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->TestUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->RefValue->Visible) { // RefValue ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->RefValue) == "") { ?>
		<th data-name="RefValue" class="<?php echo $view_lab_resultreleased_auth_grid->RefValue->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_RefValue" class="view_lab_resultreleased_auth_RefValue"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->RefValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefValue" class="<?php echo $view_lab_resultreleased_auth_grid->RefValue->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_RefValue" class="view_lab_resultreleased_auth_RefValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->RefValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->RefValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->RefValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->Order->Visible) { // Order ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_lab_resultreleased_auth_grid->Order->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_Order" class="view_lab_resultreleased_auth_Order"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_lab_resultreleased_auth_grid->Order->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_Order" class="view_lab_resultreleased_auth_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->Order->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->Order->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->Repeated->Visible) { // Repeated ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $view_lab_resultreleased_auth_grid->Repeated->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_Repeated" class="view_lab_resultreleased_auth_Repeated"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Repeated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $view_lab_resultreleased_auth_grid->Repeated->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_Repeated" class="view_lab_resultreleased_auth_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Repeated->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->Repeated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->Repeated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->Vid->Visible) { // Vid ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $view_lab_resultreleased_auth_grid->Vid->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_Vid" class="view_lab_resultreleased_auth_Vid"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $view_lab_resultreleased_auth_grid->Vid->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_Vid" class="view_lab_resultreleased_auth_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->Vid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->Vid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $view_lab_resultreleased_auth_grid->invoiceId->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_invoiceId" class="view_lab_resultreleased_auth_invoiceId"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $view_lab_resultreleased_auth_grid->invoiceId->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_invoiceId" class="view_lab_resultreleased_auth_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->invoiceId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->invoiceId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->DrID->Visible) { // DrID ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_lab_resultreleased_auth_grid->DrID->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_DrID" class="view_lab_resultreleased_auth_DrID"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_lab_resultreleased_auth_grid->DrID->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_DrID" class="view_lab_resultreleased_auth_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->DrID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->DrID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $view_lab_resultreleased_auth_grid->DrCODE->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_DrCODE" class="view_lab_resultreleased_auth_DrCODE"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->DrCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $view_lab_resultreleased_auth_grid->DrCODE->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_DrCODE" class="view_lab_resultreleased_auth_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->DrCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->DrCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->DrCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->DrName->Visible) { // DrName ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_lab_resultreleased_auth_grid->DrName->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_DrName" class="view_lab_resultreleased_auth_DrName"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_lab_resultreleased_auth_grid->DrName->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_DrName" class="view_lab_resultreleased_auth_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->DrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->DrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->Department->Visible) { // Department ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_lab_resultreleased_auth_grid->Department->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_Department" class="view_lab_resultreleased_auth_Department"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_lab_resultreleased_auth_grid->Department->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_Department" class="view_lab_resultreleased_auth_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_lab_resultreleased_auth_grid->createddatetime->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_createddatetime" class="view_lab_resultreleased_auth_createddatetime"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_lab_resultreleased_auth_grid->createddatetime->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_createddatetime" class="view_lab_resultreleased_auth_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->status->Visible) { // status ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_lab_resultreleased_auth_grid->status->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_status" class="view_lab_resultreleased_auth_status"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_lab_resultreleased_auth_grid->status->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_status" class="view_lab_resultreleased_auth_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->TestType->Visible) { // TestType ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $view_lab_resultreleased_auth_grid->TestType->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_TestType" class="view_lab_resultreleased_auth_TestType"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $view_lab_resultreleased_auth_grid->TestType->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_TestType" class="view_lab_resultreleased_auth_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->TestType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->TestType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->TestType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $view_lab_resultreleased_auth_grid->ResultDate->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_ResultDate" class="view_lab_resultreleased_auth_ResultDate"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $view_lab_resultreleased_auth_grid->ResultDate->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_ResultDate" class="view_lab_resultreleased_auth_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->ResultDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->ResultDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $view_lab_resultreleased_auth_grid->ResultedBy->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_ResultedBy" class="view_lab_resultreleased_auth_ResultedBy"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $view_lab_resultreleased_auth_grid->ResultedBy->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_ResultedBy" class="view_lab_resultreleased_auth_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->ResultedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->ResultedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_resultreleased_auth_grid->SortUrl($view_lab_resultreleased_auth_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_lab_resultreleased_auth_grid->HospID->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_auth_HospID" class="view_lab_resultreleased_auth_HospID"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_lab_resultreleased_auth_grid->HospID->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleased_auth_HospID" class="view_lab_resultreleased_auth_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_auth_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_resultreleased_auth_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_lab_resultreleased_auth_grid->StartRecord = 1;
$view_lab_resultreleased_auth_grid->StopRecord = $view_lab_resultreleased_auth_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($view_lab_resultreleased_auth->isConfirm() || $view_lab_resultreleased_auth_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_lab_resultreleased_auth_grid->FormKeyCountName) && ($view_lab_resultreleased_auth_grid->isGridAdd() || $view_lab_resultreleased_auth_grid->isGridEdit() || $view_lab_resultreleased_auth->isConfirm())) {
		$view_lab_resultreleased_auth_grid->KeyCount = $CurrentForm->getValue($view_lab_resultreleased_auth_grid->FormKeyCountName);
		$view_lab_resultreleased_auth_grid->StopRecord = $view_lab_resultreleased_auth_grid->StartRecord + $view_lab_resultreleased_auth_grid->KeyCount - 1;
	}
}
$view_lab_resultreleased_auth_grid->RecordCount = $view_lab_resultreleased_auth_grid->StartRecord - 1;
if ($view_lab_resultreleased_auth_grid->Recordset && !$view_lab_resultreleased_auth_grid->Recordset->EOF) {
	$view_lab_resultreleased_auth_grid->Recordset->moveFirst();
	$selectLimit = $view_lab_resultreleased_auth_grid->UseSelectLimit;
	if (!$selectLimit && $view_lab_resultreleased_auth_grid->StartRecord > 1)
		$view_lab_resultreleased_auth_grid->Recordset->move($view_lab_resultreleased_auth_grid->StartRecord - 1);
} elseif (!$view_lab_resultreleased_auth->AllowAddDeleteRow && $view_lab_resultreleased_auth_grid->StopRecord == 0) {
	$view_lab_resultreleased_auth_grid->StopRecord = $view_lab_resultreleased_auth->GridAddRowCount;
}

// Initialize aggregate
$view_lab_resultreleased_auth->RowType = ROWTYPE_AGGREGATEINIT;
$view_lab_resultreleased_auth->resetAttributes();
$view_lab_resultreleased_auth_grid->renderRow();
if ($view_lab_resultreleased_auth_grid->isGridAdd())
	$view_lab_resultreleased_auth_grid->RowIndex = 0;
if ($view_lab_resultreleased_auth_grid->isGridEdit())
	$view_lab_resultreleased_auth_grid->RowIndex = 0;
while ($view_lab_resultreleased_auth_grid->RecordCount < $view_lab_resultreleased_auth_grid->StopRecord) {
	$view_lab_resultreleased_auth_grid->RecordCount++;
	if ($view_lab_resultreleased_auth_grid->RecordCount >= $view_lab_resultreleased_auth_grid->StartRecord) {
		$view_lab_resultreleased_auth_grid->RowCount++;
		if ($view_lab_resultreleased_auth_grid->isGridAdd() || $view_lab_resultreleased_auth_grid->isGridEdit() || $view_lab_resultreleased_auth->isConfirm()) {
			$view_lab_resultreleased_auth_grid->RowIndex++;
			$CurrentForm->Index = $view_lab_resultreleased_auth_grid->RowIndex;
			if ($CurrentForm->hasValue($view_lab_resultreleased_auth_grid->FormActionName) && ($view_lab_resultreleased_auth->isConfirm() || $view_lab_resultreleased_auth_grid->EventCancelled))
				$view_lab_resultreleased_auth_grid->RowAction = strval($CurrentForm->getValue($view_lab_resultreleased_auth_grid->FormActionName));
			elseif ($view_lab_resultreleased_auth_grid->isGridAdd())
				$view_lab_resultreleased_auth_grid->RowAction = "insert";
			else
				$view_lab_resultreleased_auth_grid->RowAction = "";
		}

		// Set up key count
		$view_lab_resultreleased_auth_grid->KeyCount = $view_lab_resultreleased_auth_grid->RowIndex;

		// Init row class and style
		$view_lab_resultreleased_auth->resetAttributes();
		$view_lab_resultreleased_auth->CssClass = "";
		if ($view_lab_resultreleased_auth_grid->isGridAdd()) {
			if ($view_lab_resultreleased_auth->CurrentMode == "copy") {
				$view_lab_resultreleased_auth_grid->loadRowValues($view_lab_resultreleased_auth_grid->Recordset); // Load row values
				$view_lab_resultreleased_auth_grid->setRecordKey($view_lab_resultreleased_auth_grid->RowOldKey, $view_lab_resultreleased_auth_grid->Recordset); // Set old record key
			} else {
				$view_lab_resultreleased_auth_grid->loadRowValues(); // Load default values
				$view_lab_resultreleased_auth_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_lab_resultreleased_auth_grid->loadRowValues($view_lab_resultreleased_auth_grid->Recordset); // Load row values
		}
		$view_lab_resultreleased_auth->RowType = ROWTYPE_VIEW; // Render view
		if ($view_lab_resultreleased_auth_grid->isGridAdd()) // Grid add
			$view_lab_resultreleased_auth->RowType = ROWTYPE_ADD; // Render add
		if ($view_lab_resultreleased_auth_grid->isGridAdd() && $view_lab_resultreleased_auth->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_lab_resultreleased_auth_grid->restoreCurrentRowFormValues($view_lab_resultreleased_auth_grid->RowIndex); // Restore form values
		if ($view_lab_resultreleased_auth_grid->isGridEdit()) { // Grid edit
			if ($view_lab_resultreleased_auth->EventCancelled)
				$view_lab_resultreleased_auth_grid->restoreCurrentRowFormValues($view_lab_resultreleased_auth_grid->RowIndex); // Restore form values
			if ($view_lab_resultreleased_auth_grid->RowAction == "insert")
				$view_lab_resultreleased_auth->RowType = ROWTYPE_ADD; // Render add
			else
				$view_lab_resultreleased_auth->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_lab_resultreleased_auth_grid->isGridEdit() && ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT || $view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) && $view_lab_resultreleased_auth->EventCancelled) // Update failed
			$view_lab_resultreleased_auth_grid->restoreCurrentRowFormValues($view_lab_resultreleased_auth_grid->RowIndex); // Restore form values
		if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) // Edit row
			$view_lab_resultreleased_auth_grid->EditRowCount++;
		if ($view_lab_resultreleased_auth->isConfirm()) // Confirm row
			$view_lab_resultreleased_auth_grid->restoreCurrentRowFormValues($view_lab_resultreleased_auth_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_lab_resultreleased_auth->RowAttrs->merge(["data-rowindex" => $view_lab_resultreleased_auth_grid->RowCount, "id" => "r" . $view_lab_resultreleased_auth_grid->RowCount . "_view_lab_resultreleased_auth", "data-rowtype" => $view_lab_resultreleased_auth->RowType]);

		// Render row
		$view_lab_resultreleased_auth_grid->renderRow();

		// Render list options
		$view_lab_resultreleased_auth_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_lab_resultreleased_auth_grid->RowAction != "delete" && $view_lab_resultreleased_auth_grid->RowAction != "insertdelete" && !($view_lab_resultreleased_auth_grid->RowAction == "insert" && $view_lab_resultreleased_auth->isConfirm() && $view_lab_resultreleased_auth_grid->emptyRow())) {
?>
	<tr <?php echo $view_lab_resultreleased_auth->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_resultreleased_auth_grid->ListOptions->render("body", "left", $view_lab_resultreleased_auth_grid->RowCount);
?>
	<?php if ($view_lab_resultreleased_auth_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_lab_resultreleased_auth_grid->id->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_id" class="form-group"></span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_id" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_id" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_id" class="form-group">
<span<?php echo $view_lab_resultreleased_auth_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_id" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_id" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_id">
<span<?php echo $view_lab_resultreleased_auth_grid->id->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->id->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_id" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_id" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->id->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_id" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_id" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_id" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_id" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->id->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_id" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_id" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $view_lab_resultreleased_auth_grid->PatID->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_PatID" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_PatID" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->PatID->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_PatID" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_PatID" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_PatID" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->PatID->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_PatID">
<span<?php echo $view_lab_resultreleased_auth_grid->PatID->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->PatID->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_PatID" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_PatID" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_PatID" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_PatID" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_lab_resultreleased_auth_grid->PatientName->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_PatientName" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->PatientName->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_PatientName" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_PatientName" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->PatientName->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_PatientName">
<span<?php echo $view_lab_resultreleased_auth_grid->PatientName->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->PatientName->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_PatientName" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_PatientName" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_PatientName" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $view_lab_resultreleased_auth_grid->Age->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Age" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Age" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Age->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Age" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Age" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Age" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Age->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Age">
<span<?php echo $view_lab_resultreleased_auth_grid->Age->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->Age->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Age" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Age->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Age" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Age" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Age->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Age" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $view_lab_resultreleased_auth_grid->Gender->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Gender" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Gender" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Gender->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Gender" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Gender" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Gender" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Gender->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Gender">
<span<?php echo $view_lab_resultreleased_auth_grid->Gender->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->Gender->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Gender" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Gender" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Gender" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Gender" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->sid->Visible) { // sid ?>
		<td data-name="sid" <?php echo $view_lab_resultreleased_auth_grid->sid->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_sid" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_sid" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->sid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->sid->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_sid" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->sid->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_sid" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_sid" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->sid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->sid->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->sid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_sid">
<span<?php echo $view_lab_resultreleased_auth_grid->sid->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->sid->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_sid" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->sid->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_sid" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->sid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_sid" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->sid->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_sid" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->sid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" <?php echo $view_lab_resultreleased_auth_grid->ItemCode->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_ItemCode" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->ItemCode->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ItemCode" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_ItemCode" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->ItemCode->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->ItemCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_ItemCode">
<span<?php echo $view_lab_resultreleased_auth_grid->ItemCode->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->ItemCode->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ItemCode->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ItemCode" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ItemCode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ItemCode" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ItemCode->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ItemCode" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ItemCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" <?php echo $view_lab_resultreleased_auth_grid->DEptCd->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_DEptCd" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->DEptCd->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DEptCd" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_DEptCd" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->DEptCd->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->DEptCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_DEptCd">
<span<?php echo $view_lab_resultreleased_auth_grid->DEptCd->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->DEptCd->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DEptCd->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DEptCd" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DEptCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DEptCd" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DEptCd->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DEptCd" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DEptCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted" <?php echo $view_lab_resultreleased_auth_grid->Resulted->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Resulted" class="form-group">
<div id="tp_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleased_auth" data-field="x_Resulted" data-value-separator="<?php echo $view_lab_resultreleased_auth_grid->Resulted->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted[]" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted[]" value="{value}"<?php echo $view_lab_resultreleased_auth_grid->Resulted->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleased_auth_grid->Resulted->checkBoxListHtml(FALSE, "x{$view_lab_resultreleased_auth_grid->RowIndex}_Resulted[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Resulted" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted[]" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted[]" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Resulted" class="form-group">
<div id="tp_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleased_auth" data-field="x_Resulted" data-value-separator="<?php echo $view_lab_resultreleased_auth_grid->Resulted->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted[]" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted[]" value="{value}"<?php echo $view_lab_resultreleased_auth_grid->Resulted->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleased_auth_grid->Resulted->checkBoxListHtml(FALSE, "x{$view_lab_resultreleased_auth_grid->RowIndex}_Resulted[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Resulted">
<span<?php echo $view_lab_resultreleased_auth_grid->Resulted->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->Resulted->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Resulted" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Resulted->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Resulted" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted[]" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted[]" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Resulted->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Resulted" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Resulted->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Resulted" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted[]" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted[]" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Resulted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Services->Visible) { // Services ?>
		<td data-name="Services" <?php echo $view_lab_resultreleased_auth_grid->Services->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Services" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Services" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Services->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Services->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Services" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Services->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Services" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Services" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Services->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Services->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Services->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Services">
<span<?php echo $view_lab_resultreleased_auth_grid->Services->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->Services->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Services" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Services->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Services" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Services->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Services" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Services->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Services" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Services->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->LabReport->Visible) { // LabReport ?>
		<td data-name="LabReport" <?php echo $view_lab_resultreleased_auth_grid->LabReport->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_LabReport" class="form-group">
<textarea data-table="view_lab_resultreleased_auth" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->LabReport->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased_auth_grid->LabReport->editAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->LabReport->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_LabReport" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->LabReport->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_LabReport" class="form-group">
<textarea data-table="view_lab_resultreleased_auth" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->LabReport->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased_auth_grid->LabReport->editAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->LabReport->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_LabReport">
<span<?php echo $view_lab_resultreleased_auth_grid->LabReport->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->LabReport->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->LabReport->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_LabReport" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->LabReport->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_LabReport" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->LabReport->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_LabReport" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->LabReport->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1" <?php echo $view_lab_resultreleased_auth_grid->Pic1->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth_grid->RowAction == "insert") { // Add record ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Pic1" class="form-group view_lab_resultreleased_auth_Pic1">
<div id="fd_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $view_lab_resultreleased_auth_grid->Pic1->title() ?>" data-table="view_lab_resultreleased_auth" data-field="x_Pic1" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" lang="<?php echo CurrentLanguageID() ?>"<?php echo $view_lab_resultreleased_auth_grid->Pic1->editAttributes() ?><?php if ($view_lab_resultreleased_auth_grid->Pic1->ReadOnly || $view_lab_resultreleased_auth_grid->Pic1->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id= "fn_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased_auth_grid->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id= "fs_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id= "fx_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased_auth_grid->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id= "fm_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased_auth_grid->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Pic1" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Pic1->OldValue) ?>">
<?php } elseif ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Pic1">
<span<?php echo $view_lab_resultreleased_auth_grid->Pic1->viewAttributes() ?>><?php echo GetFileViewTag($view_lab_resultreleased_auth_grid->Pic1, $view_lab_resultreleased_auth_grid->Pic1->getViewValue(), FALSE) ?></span>
</span>
<?php } else  { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Pic1" class="form-group view_lab_resultreleased_auth_Pic1">
<div id="fd_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $view_lab_resultreleased_auth_grid->Pic1->title() ?>" data-table="view_lab_resultreleased_auth" data-field="x_Pic1" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" lang="<?php echo CurrentLanguageID() ?>"<?php echo $view_lab_resultreleased_auth_grid->Pic1->editAttributes() ?><?php if ($view_lab_resultreleased_auth_grid->Pic1->ReadOnly || $view_lab_resultreleased_auth_grid->Pic1->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id= "fn_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased_auth_grid->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="<?php echo (Post("fa_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id= "fs_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id= "fx_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased_auth_grid->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id= "fm_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased_auth_grid->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2" <?php echo $view_lab_resultreleased_auth_grid->Pic2->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth_grid->RowAction == "insert") { // Add record ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Pic2" class="form-group view_lab_resultreleased_auth_Pic2">
<div id="fd_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $view_lab_resultreleased_auth_grid->Pic2->title() ?>" data-table="view_lab_resultreleased_auth" data-field="x_Pic2" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" lang="<?php echo CurrentLanguageID() ?>"<?php echo $view_lab_resultreleased_auth_grid->Pic2->editAttributes() ?><?php if ($view_lab_resultreleased_auth_grid->Pic2->ReadOnly || $view_lab_resultreleased_auth_grid->Pic2->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id= "fn_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased_auth_grid->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id= "fs_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id= "fx_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased_auth_grid->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id= "fm_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased_auth_grid->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Pic2" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Pic2->OldValue) ?>">
<?php } elseif ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Pic2">
<span<?php echo $view_lab_resultreleased_auth_grid->Pic2->viewAttributes() ?>><?php echo GetFileViewTag($view_lab_resultreleased_auth_grid->Pic2, $view_lab_resultreleased_auth_grid->Pic2->getViewValue(), FALSE) ?></span>
</span>
<?php } else  { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Pic2" class="form-group view_lab_resultreleased_auth_Pic2">
<div id="fd_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $view_lab_resultreleased_auth_grid->Pic2->title() ?>" data-table="view_lab_resultreleased_auth" data-field="x_Pic2" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" lang="<?php echo CurrentLanguageID() ?>"<?php echo $view_lab_resultreleased_auth_grid->Pic2->editAttributes() ?><?php if ($view_lab_resultreleased_auth_grid->Pic2->ReadOnly || $view_lab_resultreleased_auth_grid->Pic2->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id= "fn_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased_auth_grid->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="<?php echo (Post("fa_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id= "fs_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id= "fx_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased_auth_grid->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id= "fm_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased_auth_grid->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit" <?php echo $view_lab_resultreleased_auth_grid->TestUnit->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_TestUnit" class="form-group">
<?php
$onchange = $view_lab_resultreleased_auth_grid->TestUnit->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_lab_resultreleased_auth_grid->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit">
	<input type="text" class="form-control" name="sv_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" id="sv_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" value="<?php echo RemoveHtml($view_lab_resultreleased_auth_grid->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestUnit->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased_auth_grid->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestUnit" data-value-separator="<?php echo $view_lab_resultreleased_auth_grid->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestUnit->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_lab_resultreleased_authgrid"], function() {
	fview_lab_resultreleased_authgrid.createAutoSuggest({"id":"x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit","forceSelect":false});
});
</script>
<?php echo $view_lab_resultreleased_auth_grid->TestUnit->Lookup->getParamTag($view_lab_resultreleased_auth_grid, "p_x" . $view_lab_resultreleased_auth_grid->RowIndex . "_TestUnit") ?>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestUnit" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_TestUnit" class="form-group">
<?php
$onchange = $view_lab_resultreleased_auth_grid->TestUnit->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_lab_resultreleased_auth_grid->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit">
	<input type="text" class="form-control" name="sv_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" id="sv_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" value="<?php echo RemoveHtml($view_lab_resultreleased_auth_grid->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestUnit->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased_auth_grid->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestUnit" data-value-separator="<?php echo $view_lab_resultreleased_auth_grid->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestUnit->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_lab_resultreleased_authgrid"], function() {
	fview_lab_resultreleased_authgrid.createAutoSuggest({"id":"x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit","forceSelect":false});
});
</script>
<?php echo $view_lab_resultreleased_auth_grid->TestUnit->Lookup->getParamTag($view_lab_resultreleased_auth_grid, "p_x" . $view_lab_resultreleased_auth_grid->RowIndex . "_TestUnit") ?>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_TestUnit">
<span<?php echo $view_lab_resultreleased_auth_grid->TestUnit->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->TestUnit->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestUnit" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestUnit->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestUnit" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestUnit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestUnit" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestUnit->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestUnit" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->RefValue->Visible) { // RefValue ?>
		<td data-name="RefValue" <?php echo $view_lab_resultreleased_auth_grid->RefValue->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_RefValue" class="form-group">
<textarea data-table="view_lab_resultreleased_auth" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased_auth_grid->RefValue->editAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->RefValue->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_RefValue" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->RefValue->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_RefValue" class="form-group">
<textarea data-table="view_lab_resultreleased_auth" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased_auth_grid->RefValue->editAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->RefValue->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_RefValue">
<span<?php echo $view_lab_resultreleased_auth_grid->RefValue->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->RefValue->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->RefValue->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_RefValue" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->RefValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_RefValue" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->RefValue->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_RefValue" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->RefValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Order->Visible) { // Order ?>
		<td data-name="Order" <?php echo $view_lab_resultreleased_auth_grid->Order->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Order" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Order" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Order->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Order" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Order->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Order" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Order" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Order->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Order">
<span<?php echo $view_lab_resultreleased_auth_grid->Order->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->Order->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Order" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Order->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Order" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Order->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Order" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Order->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Order" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Order->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated" <?php echo $view_lab_resultreleased_auth_grid->Repeated->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Repeated" class="form-group">
<div id="tp_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleased_auth" data-field="x_Repeated" data-value-separator="<?php echo $view_lab_resultreleased_auth_grid->Repeated->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated[]" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated[]" value="{value}"<?php echo $view_lab_resultreleased_auth_grid->Repeated->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleased_auth_grid->Repeated->checkBoxListHtml(FALSE, "x{$view_lab_resultreleased_auth_grid->RowIndex}_Repeated[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Repeated" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated[]" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated[]" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Repeated" class="form-group">
<div id="tp_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleased_auth" data-field="x_Repeated" data-value-separator="<?php echo $view_lab_resultreleased_auth_grid->Repeated->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated[]" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated[]" value="{value}"<?php echo $view_lab_resultreleased_auth_grid->Repeated->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleased_auth_grid->Repeated->checkBoxListHtml(FALSE, "x{$view_lab_resultreleased_auth_grid->RowIndex}_Repeated[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Repeated">
<span<?php echo $view_lab_resultreleased_auth_grid->Repeated->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->Repeated->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Repeated" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Repeated->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Repeated" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated[]" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated[]" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Repeated->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Repeated" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Repeated->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Repeated" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated[]" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated[]" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Repeated->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Vid->Visible) { // Vid ?>
		<td data-name="Vid" <?php echo $view_lab_resultreleased_auth_grid->Vid->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_lab_resultreleased_auth_grid->Vid->getSessionValue() != "") { ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Vid" class="form-group">
<span<?php echo $view_lab_resultreleased_auth_grid->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Vid" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Vid" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Vid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Vid->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Vid" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Vid->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_lab_resultreleased_auth_grid->Vid->getSessionValue() != "") { ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Vid" class="form-group">
<span<?php echo $view_lab_resultreleased_auth_grid->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Vid" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Vid" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Vid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Vid->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Vid">
<span<?php echo $view_lab_resultreleased_auth_grid->Vid->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->Vid->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Vid" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Vid->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Vid" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Vid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Vid" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Vid->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Vid" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Vid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId" <?php echo $view_lab_resultreleased_auth_grid->invoiceId->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_invoiceId" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->invoiceId->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_invoiceId" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_invoiceId" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->invoiceId->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->invoiceId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_invoiceId">
<span<?php echo $view_lab_resultreleased_auth_grid->invoiceId->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->invoiceId->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->invoiceId->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_invoiceId" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->invoiceId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_invoiceId" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->invoiceId->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_invoiceId" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->invoiceId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->DrID->Visible) { // DrID ?>
		<td data-name="DrID" <?php echo $view_lab_resultreleased_auth_grid->DrID->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_DrID" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_DrID" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->DrID->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrID" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_DrID" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_DrID" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->DrID->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->DrID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_DrID">
<span<?php echo $view_lab_resultreleased_auth_grid->DrID->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->DrID->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrID" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrID->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrID" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrID" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrID->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrID" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE" <?php echo $view_lab_resultreleased_auth_grid->DrCODE->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_DrCODE" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->DrCODE->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrCODE" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_DrCODE" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->DrCODE->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->DrCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_DrCODE">
<span<?php echo $view_lab_resultreleased_auth_grid->DrCODE->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->DrCODE->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrCODE->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrCODE" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrCODE" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrCODE->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrCODE" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->DrName->Visible) { // DrName ?>
		<td data-name="DrName" <?php echo $view_lab_resultreleased_auth_grid->DrName->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_DrName" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_DrName" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->DrName->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrName" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrName->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_DrName" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_DrName" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->DrName->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->DrName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_DrName">
<span<?php echo $view_lab_resultreleased_auth_grid->DrName->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->DrName->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrName" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrName->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrName" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrName" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrName->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrName" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Department->Visible) { // Department ?>
		<td data-name="Department" <?php echo $view_lab_resultreleased_auth_grid->Department->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Department" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Department" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Department->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Department->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Department" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Department->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Department" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Department" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Department->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Department->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_Department">
<span<?php echo $view_lab_resultreleased_auth_grid->Department->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->Department->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Department" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Department->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Department" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Department->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Department" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Department->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Department" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_lab_resultreleased_auth_grid->createddatetime->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_createddatetime" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->createddatetime->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_resultreleased_auth_grid->createddatetime->ReadOnly && !$view_lab_resultreleased_auth_grid->createddatetime->Disabled && !isset($view_lab_resultreleased_auth_grid->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_resultreleased_auth_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_lab_resultreleased_authgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_lab_resultreleased_authgrid", "x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_createddatetime" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_createddatetime" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->createddatetime->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_resultreleased_auth_grid->createddatetime->ReadOnly && !$view_lab_resultreleased_auth_grid->createddatetime->Disabled && !isset($view_lab_resultreleased_auth_grid->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_resultreleased_auth_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_lab_resultreleased_authgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_lab_resultreleased_authgrid", "x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_createddatetime">
<span<?php echo $view_lab_resultreleased_auth_grid->createddatetime->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_createddatetime" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_createddatetime" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_createddatetime" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->status->Visible) { // status ?>
		<td data-name="status" <?php echo $view_lab_resultreleased_auth_grid->status->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_status" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_status" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->status->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->status->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_status" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->status->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_status" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_status" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->status->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->status->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_status">
<span<?php echo $view_lab_resultreleased_auth_grid->status->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->status->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_status" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->status->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_status" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_status" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->status->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_status" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->TestType->Visible) { // TestType ?>
		<td data-name="TestType" <?php echo $view_lab_resultreleased_auth_grid->TestType->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_TestType" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_TestType" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestType->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->TestType->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestType" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestType->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_TestType" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_TestType" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestType->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->TestType->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->TestType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_TestType">
<span<?php echo $view_lab_resultreleased_auth_grid->TestType->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->TestType->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestType" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestType->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestType" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestType" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestType->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestType" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" <?php echo $view_lab_resultreleased_auth_grid->ResultDate->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ResultDate" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultDate" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_ResultDate">
<span<?php echo $view_lab_resultreleased_auth_grid->ResultDate->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->ResultDate->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ResultDate" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ResultDate->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ResultDate" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultDate" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ResultDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ResultDate" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultDate" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ResultDate->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ResultDate" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultDate" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy" <?php echo $view_lab_resultreleased_auth_grid->ResultedBy->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ResultedBy" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultedBy" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_ResultedBy">
<span<?php echo $view_lab_resultreleased_auth_grid->ResultedBy->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->ResultedBy->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ResultedBy" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ResultedBy" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultedBy" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ResultedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ResultedBy" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultedBy" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ResultedBy" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultedBy" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ResultedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_lab_resultreleased_auth_grid->HospID->cellAttributes() ?>>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_HospID" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_HospID" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->HospID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->HospID->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_HospID" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_HospID" class="form-group">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_HospID" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->HospID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->HospID->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_auth_grid->RowCount ?>_view_lab_resultreleased_auth_HospID">
<span<?php echo $view_lab_resultreleased_auth_grid->HospID->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_HospID" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_HospID" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_HospID" name="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" id="fview_lab_resultreleased_authgrid$x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_HospID" name="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" id="fview_lab_resultreleased_authgrid$o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_resultreleased_auth_grid->ListOptions->render("body", "right", $view_lab_resultreleased_auth_grid->RowCount);
?>
	</tr>
<?php if ($view_lab_resultreleased_auth->RowType == ROWTYPE_ADD || $view_lab_resultreleased_auth->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_lab_resultreleased_authgrid", "load"], function() {
	fview_lab_resultreleased_authgrid.updateLists(<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_lab_resultreleased_auth_grid->isGridAdd() || $view_lab_resultreleased_auth->CurrentMode == "copy")
		if (!$view_lab_resultreleased_auth_grid->Recordset->EOF)
			$view_lab_resultreleased_auth_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_lab_resultreleased_auth->CurrentMode == "add" || $view_lab_resultreleased_auth->CurrentMode == "copy" || $view_lab_resultreleased_auth->CurrentMode == "edit") {
		$view_lab_resultreleased_auth_grid->RowIndex = '$rowindex$';
		$view_lab_resultreleased_auth_grid->loadRowValues();

		// Set row properties
		$view_lab_resultreleased_auth->resetAttributes();
		$view_lab_resultreleased_auth->RowAttrs->merge(["data-rowindex" => $view_lab_resultreleased_auth_grid->RowIndex, "id" => "r0_view_lab_resultreleased_auth", "data-rowtype" => ROWTYPE_ADD]);
		$view_lab_resultreleased_auth->RowAttrs->appendClass("ew-template");
		$view_lab_resultreleased_auth->RowType = ROWTYPE_ADD;

		// Render row
		$view_lab_resultreleased_auth_grid->renderRow();

		// Render list options
		$view_lab_resultreleased_auth_grid->renderListOptions();
		$view_lab_resultreleased_auth_grid->StartRowCount = 0;
?>
	<tr <?php echo $view_lab_resultreleased_auth->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_resultreleased_auth_grid->ListOptions->render("body", "left", $view_lab_resultreleased_auth_grid->RowIndex);
?>
	<?php if ($view_lab_resultreleased_auth_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_id" class="form-group view_lab_resultreleased_auth_id"></span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_id" class="form-group view_lab_resultreleased_auth_id">
<span<?php echo $view_lab_resultreleased_auth_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_id" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_id" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_id" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_id" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_PatID" class="form-group view_lab_resultreleased_auth_PatID">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_PatID" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->PatID->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->PatID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_PatID" class="form-group view_lab_resultreleased_auth_PatID">
<span<?php echo $view_lab_resultreleased_auth_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_PatID" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_PatID" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_PatientName" class="form-group view_lab_resultreleased_auth_PatientName">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->PatientName->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_PatientName" class="form-group view_lab_resultreleased_auth_PatientName">
<span<?php echo $view_lab_resultreleased_auth_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_PatientName" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Age" class="form-group view_lab_resultreleased_auth_Age">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Age" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Age->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Age" class="form-group view_lab_resultreleased_auth_Age">
<span<?php echo $view_lab_resultreleased_auth_grid->Age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->Age->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Age" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Age" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Gender" class="form-group view_lab_resultreleased_auth_Gender">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Gender" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Gender->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Gender" class="form-group view_lab_resultreleased_auth_Gender">
<span<?php echo $view_lab_resultreleased_auth_grid->Gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->Gender->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Gender" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Gender" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->sid->Visible) { // sid ?>
		<td data-name="sid">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_sid" class="form-group view_lab_resultreleased_auth_sid">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_sid" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->sid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->sid->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->sid->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_sid" class="form-group view_lab_resultreleased_auth_sid">
<span<?php echo $view_lab_resultreleased_auth_grid->sid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->sid->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_sid" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->sid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_sid" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->sid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_ItemCode" class="form-group view_lab_resultreleased_auth_ItemCode">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->ItemCode->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->ItemCode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_ItemCode" class="form-group view_lab_resultreleased_auth_ItemCode">
<span<?php echo $view_lab_resultreleased_auth_grid->ItemCode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->ItemCode->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ItemCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ItemCode" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ItemCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_DEptCd" class="form-group view_lab_resultreleased_auth_DEptCd">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->DEptCd->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->DEptCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_DEptCd" class="form-group view_lab_resultreleased_auth_DEptCd">
<span<?php echo $view_lab_resultreleased_auth_grid->DEptCd->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->DEptCd->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DEptCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DEptCd" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DEptCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Resulted" class="form-group view_lab_resultreleased_auth_Resulted">
<div id="tp_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleased_auth" data-field="x_Resulted" data-value-separator="<?php echo $view_lab_resultreleased_auth_grid->Resulted->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted[]" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted[]" value="{value}"<?php echo $view_lab_resultreleased_auth_grid->Resulted->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleased_auth_grid->Resulted->checkBoxListHtml(FALSE, "x{$view_lab_resultreleased_auth_grid->RowIndex}_Resulted[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Resulted" class="form-group view_lab_resultreleased_auth_Resulted">
<span<?php echo $view_lab_resultreleased_auth_grid->Resulted->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->Resulted->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Resulted" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Resulted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Resulted" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted[]" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Resulted[]" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Resulted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Services->Visible) { // Services ?>
		<td data-name="Services">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Services" class="form-group view_lab_resultreleased_auth_Services">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Services" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Services->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Services->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Services->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Services" class="form-group view_lab_resultreleased_auth_Services">
<span<?php echo $view_lab_resultreleased_auth_grid->Services->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->Services->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Services" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Services->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Services" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Services->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->LabReport->Visible) { // LabReport ?>
		<td data-name="LabReport">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_LabReport" class="form-group view_lab_resultreleased_auth_LabReport">
<textarea data-table="view_lab_resultreleased_auth" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->LabReport->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased_auth_grid->LabReport->editAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->LabReport->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_LabReport" class="form-group view_lab_resultreleased_auth_LabReport">
<span<?php echo $view_lab_resultreleased_auth_grid->LabReport->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->LabReport->ViewValue ?></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->LabReport->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_LabReport" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->LabReport->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1">
<span id="el$rowindex$_view_lab_resultreleased_auth_Pic1" class="form-group view_lab_resultreleased_auth_Pic1">
<div id="fd_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $view_lab_resultreleased_auth_grid->Pic1->title() ?>" data-table="view_lab_resultreleased_auth" data-field="x_Pic1" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" lang="<?php echo CurrentLanguageID() ?>"<?php echo $view_lab_resultreleased_auth_grid->Pic1->editAttributes() ?><?php if ($view_lab_resultreleased_auth_grid->Pic1->ReadOnly || $view_lab_resultreleased_auth_grid->Pic1->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id= "fn_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased_auth_grid->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id= "fs_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id= "fx_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased_auth_grid->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id= "fm_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased_auth_grid->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Pic1" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Pic1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2">
<span id="el$rowindex$_view_lab_resultreleased_auth_Pic2" class="form-group view_lab_resultreleased_auth_Pic2">
<div id="fd_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $view_lab_resultreleased_auth_grid->Pic2->title() ?>" data-table="view_lab_resultreleased_auth" data-field="x_Pic2" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" lang="<?php echo CurrentLanguageID() ?>"<?php echo $view_lab_resultreleased_auth_grid->Pic2->editAttributes() ?><?php if ($view_lab_resultreleased_auth_grid->Pic2->ReadOnly || $view_lab_resultreleased_auth_grid->Pic2->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id= "fn_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased_auth_grid->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id= "fs_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id= "fx_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased_auth_grid->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id= "fm_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased_auth_grid->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Pic2" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Pic2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_TestUnit" class="form-group view_lab_resultreleased_auth_TestUnit">
<?php
$onchange = $view_lab_resultreleased_auth_grid->TestUnit->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_lab_resultreleased_auth_grid->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit">
	<input type="text" class="form-control" name="sv_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" id="sv_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" value="<?php echo RemoveHtml($view_lab_resultreleased_auth_grid->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestUnit->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased_auth_grid->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestUnit" data-value-separator="<?php echo $view_lab_resultreleased_auth_grid->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestUnit->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_lab_resultreleased_authgrid"], function() {
	fview_lab_resultreleased_authgrid.createAutoSuggest({"id":"x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit","forceSelect":false});
});
</script>
<?php echo $view_lab_resultreleased_auth_grid->TestUnit->Lookup->getParamTag($view_lab_resultreleased_auth_grid, "p_x" . $view_lab_resultreleased_auth_grid->RowIndex . "_TestUnit") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_TestUnit" class="form-group view_lab_resultreleased_auth_TestUnit">
<span<?php echo $view_lab_resultreleased_auth_grid->TestUnit->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->TestUnit->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestUnit" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestUnit" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->RefValue->Visible) { // RefValue ?>
		<td data-name="RefValue">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_RefValue" class="form-group view_lab_resultreleased_auth_RefValue">
<textarea data-table="view_lab_resultreleased_auth" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased_auth_grid->RefValue->editAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->RefValue->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_RefValue" class="form-group view_lab_resultreleased_auth_RefValue">
<span<?php echo $view_lab_resultreleased_auth_grid->RefValue->viewAttributes() ?>><?php echo $view_lab_resultreleased_auth_grid->RefValue->ViewValue ?></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->RefValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_RefValue" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->RefValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Order->Visible) { // Order ?>
		<td data-name="Order">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Order" class="form-group view_lab_resultreleased_auth_Order">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Order" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Order->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Order->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Order" class="form-group view_lab_resultreleased_auth_Order">
<span<?php echo $view_lab_resultreleased_auth_grid->Order->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->Order->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Order" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Order->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Order" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Repeated" class="form-group view_lab_resultreleased_auth_Repeated">
<div id="tp_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleased_auth" data-field="x_Repeated" data-value-separator="<?php echo $view_lab_resultreleased_auth_grid->Repeated->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated[]" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated[]" value="{value}"<?php echo $view_lab_resultreleased_auth_grid->Repeated->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleased_auth_grid->Repeated->checkBoxListHtml(FALSE, "x{$view_lab_resultreleased_auth_grid->RowIndex}_Repeated[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Repeated" class="form-group view_lab_resultreleased_auth_Repeated">
<span<?php echo $view_lab_resultreleased_auth_grid->Repeated->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->Repeated->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Repeated" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Repeated->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Repeated" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated[]" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Repeated[]" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Repeated->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Vid->Visible) { // Vid ?>
		<td data-name="Vid">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<?php if ($view_lab_resultreleased_auth_grid->Vid->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Vid" class="form-group view_lab_resultreleased_auth_Vid">
<span<?php echo $view_lab_resultreleased_auth_grid->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Vid" class="form-group view_lab_resultreleased_auth_Vid">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Vid" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Vid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Vid->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Vid" class="form-group view_lab_resultreleased_auth_Vid">
<span<?php echo $view_lab_resultreleased_auth_grid->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Vid" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Vid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Vid" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Vid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_invoiceId" class="form-group view_lab_resultreleased_auth_invoiceId">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->invoiceId->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->invoiceId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_invoiceId" class="form-group view_lab_resultreleased_auth_invoiceId">
<span<?php echo $view_lab_resultreleased_auth_grid->invoiceId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->invoiceId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->invoiceId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_invoiceId" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->invoiceId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->DrID->Visible) { // DrID ?>
		<td data-name="DrID">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_DrID" class="form-group view_lab_resultreleased_auth_DrID">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_DrID" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->DrID->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->DrID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_DrID" class="form-group view_lab_resultreleased_auth_DrID">
<span<?php echo $view_lab_resultreleased_auth_grid->DrID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->DrID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrID" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrID" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_DrCODE" class="form-group view_lab_resultreleased_auth_DrCODE">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->DrCODE->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->DrCODE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_DrCODE" class="form-group view_lab_resultreleased_auth_DrCODE">
<span<?php echo $view_lab_resultreleased_auth_grid->DrCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->DrCODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrCODE" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->DrName->Visible) { // DrName ?>
		<td data-name="DrName">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_DrName" class="form-group view_lab_resultreleased_auth_DrName">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_DrName" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->DrName->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->DrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_DrName" class="form-group view_lab_resultreleased_auth_DrName">
<span<?php echo $view_lab_resultreleased_auth_grid->DrName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->DrName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrName" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_DrName" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->DrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->Department->Visible) { // Department ?>
		<td data-name="Department">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Department" class="form-group view_lab_resultreleased_auth_Department">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_Department" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Department->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->Department->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->Department->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_Department" class="form-group view_lab_resultreleased_auth_Department">
<span<?php echo $view_lab_resultreleased_auth_grid->Department->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->Department->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Department" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_Department" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_createddatetime" class="form-group view_lab_resultreleased_auth_createddatetime">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->createddatetime->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_resultreleased_auth_grid->createddatetime->ReadOnly && !$view_lab_resultreleased_auth_grid->createddatetime->Disabled && !isset($view_lab_resultreleased_auth_grid->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_resultreleased_auth_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_lab_resultreleased_authgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_lab_resultreleased_authgrid", "x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_createddatetime" class="form-group view_lab_resultreleased_auth_createddatetime">
<span<?php echo $view_lab_resultreleased_auth_grid->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->createddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_createddatetime" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_status" class="form-group view_lab_resultreleased_auth_status">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_status" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->status->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->status->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_status" class="form-group view_lab_resultreleased_auth_status">
<span<?php echo $view_lab_resultreleased_auth_grid->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_status" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_status" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_TestType" class="form-group view_lab_resultreleased_auth_TestType">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_TestType" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestType->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->TestType->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->TestType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_TestType" class="form-group view_lab_resultreleased_auth_TestType">
<span<?php echo $view_lab_resultreleased_auth_grid->TestType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->TestType->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestType" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_TestType" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_ResultDate" class="form-group view_lab_resultreleased_auth_ResultDate">
<span<?php echo $view_lab_resultreleased_auth_grid->ResultDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->ResultDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ResultDate" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ResultDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ResultDate" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultDate" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_ResultedBy" class="form-group view_lab_resultreleased_auth_ResultedBy">
<span<?php echo $view_lab_resultreleased_auth_grid->ResultedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->ResultedBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ResultedBy" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ResultedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_ResultedBy" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultedBy" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->ResultedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased_auth_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_lab_resultreleased_auth->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_HospID" class="form-group view_lab_resultreleased_auth_HospID">
<input type="text" data-table="view_lab_resultreleased_auth" data-field="x_HospID" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->HospID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased_auth_grid->HospID->EditValue ?>"<?php echo $view_lab_resultreleased_auth_grid->HospID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_auth_HospID" class="form-group view_lab_resultreleased_auth_HospID">
<span<?php echo $view_lab_resultreleased_auth_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleased_auth_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_HospID" name="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased_auth" data-field="x_HospID" name="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" id="o<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleased_auth_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_resultreleased_auth_grid->ListOptions->render("body", "right", $view_lab_resultreleased_auth_grid->RowIndex);
?>
<script>
loadjs.ready(["fview_lab_resultreleased_authgrid", "load"], function() {
	fview_lab_resultreleased_authgrid.updateLists(<?php echo $view_lab_resultreleased_auth_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($view_lab_resultreleased_auth->CurrentMode == "add" || $view_lab_resultreleased_auth->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_lab_resultreleased_auth_grid->FormKeyCountName ?>" id="<?php echo $view_lab_resultreleased_auth_grid->FormKeyCountName ?>" value="<?php echo $view_lab_resultreleased_auth_grid->KeyCount ?>">
<?php echo $view_lab_resultreleased_auth_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_lab_resultreleased_auth_grid->FormKeyCountName ?>" id="<?php echo $view_lab_resultreleased_auth_grid->FormKeyCountName ?>" value="<?php echo $view_lab_resultreleased_auth_grid->KeyCount ?>">
<?php echo $view_lab_resultreleased_auth_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_lab_resultreleased_authgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_lab_resultreleased_auth_grid->Recordset)
	$view_lab_resultreleased_auth_grid->Recordset->Close();
?>
<?php if ($view_lab_resultreleased_auth_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_lab_resultreleased_auth_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_lab_resultreleased_auth_grid->TotalRecords == 0 && !$view_lab_resultreleased_auth->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_lab_resultreleased_auth_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$view_lab_resultreleased_auth_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_lab_resultreleased_auth->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_lab_resultreleased_auth",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$view_lab_resultreleased_auth_grid->terminate();
?>