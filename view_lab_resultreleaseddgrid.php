<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_lab_resultreleasedd_grid))
	$view_lab_resultreleasedd_grid = new view_lab_resultreleasedd_grid();

// Run the page
$view_lab_resultreleasedd_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_resultreleasedd_grid->Page_Render();
?>
<?php if (!$view_lab_resultreleasedd->isExport()) { ?>
<script>

// Form object
var fview_lab_resultreleaseddgrid = new ew.Form("fview_lab_resultreleaseddgrid", "grid");
fview_lab_resultreleaseddgrid.formKeyCountName = '<?php echo $view_lab_resultreleasedd_grid->FormKeyCountName ?>';

// Validate form
fview_lab_resultreleaseddgrid.validate = function() {
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
		<?php if ($view_lab_resultreleasedd_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->id->caption(), $view_lab_resultreleasedd->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->PatID->caption(), $view_lab_resultreleasedd->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->PatID->errorMessage()) ?>");
		<?php if ($view_lab_resultreleasedd_grid->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->PatientName->caption(), $view_lab_resultreleasedd->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Age->caption(), $view_lab_resultreleasedd->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Gender->caption(), $view_lab_resultreleasedd->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->sid->Required) { ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->sid->caption(), $view_lab_resultreleasedd->sid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->sid->errorMessage()) ?>");
		<?php if ($view_lab_resultreleasedd_grid->ItemCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->ItemCode->caption(), $view_lab_resultreleasedd->ItemCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->DEptCd->Required) { ?>
			elm = this.getElements("x" + infix + "_DEptCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->DEptCd->caption(), $view_lab_resultreleasedd->DEptCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->Resulted->Required) { ?>
			elm = this.getElements("x" + infix + "_Resulted[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Resulted->caption(), $view_lab_resultreleasedd->Resulted->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->Services->Required) { ?>
			elm = this.getElements("x" + infix + "_Services");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Services->caption(), $view_lab_resultreleasedd->Services->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->LabReport->Required) { ?>
			elm = this.getElements("x" + infix + "_LabReport");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->LabReport->caption(), $view_lab_resultreleasedd->LabReport->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->Pic1->Required) { ?>
			felm = this.getElements("x" + infix + "_Pic1");
			elm = this.getElements("fn_x" + infix + "_Pic1");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Pic1->caption(), $view_lab_resultreleasedd->Pic1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->Pic2->Required) { ?>
			felm = this.getElements("x" + infix + "_Pic2");
			elm = this.getElements("fn_x" + infix + "_Pic2");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Pic2->caption(), $view_lab_resultreleasedd->Pic2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->TestUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_TestUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->TestUnit->caption(), $view_lab_resultreleasedd->TestUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->RefValue->Required) { ?>
			elm = this.getElements("x" + infix + "_RefValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->RefValue->caption(), $view_lab_resultreleasedd->RefValue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Order->caption(), $view_lab_resultreleasedd->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->Order->errorMessage()) ?>");
		<?php if ($view_lab_resultreleasedd_grid->Repeated->Required) { ?>
			elm = this.getElements("x" + infix + "_Repeated[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Repeated->caption(), $view_lab_resultreleasedd->Repeated->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->Vid->Required) { ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Vid->caption(), $view_lab_resultreleasedd->Vid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->Vid->errorMessage()) ?>");
		<?php if ($view_lab_resultreleasedd_grid->invoiceId->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->invoiceId->caption(), $view_lab_resultreleasedd->invoiceId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->invoiceId->errorMessage()) ?>");
		<?php if ($view_lab_resultreleasedd_grid->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->DrID->caption(), $view_lab_resultreleasedd->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->DrID->errorMessage()) ?>");
		<?php if ($view_lab_resultreleasedd_grid->DrCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_DrCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->DrCODE->caption(), $view_lab_resultreleasedd->DrCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->DrName->caption(), $view_lab_resultreleasedd->DrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Department->caption(), $view_lab_resultreleasedd->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->createddatetime->caption(), $view_lab_resultreleasedd->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->createddatetime->errorMessage()) ?>");
		<?php if ($view_lab_resultreleasedd_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->status->caption(), $view_lab_resultreleasedd->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->status->errorMessage()) ?>");
		<?php if ($view_lab_resultreleasedd_grid->TestType->Required) { ?>
			elm = this.getElements("x" + infix + "_TestType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->TestType->caption(), $view_lab_resultreleasedd->TestType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->ResultDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->ResultDate->caption(), $view_lab_resultreleasedd->ResultDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->ResultedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->ResultedBy->caption(), $view_lab_resultreleasedd->ResultedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->HospID->caption(), $view_lab_resultreleasedd->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->HospID->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fview_lab_resultreleaseddgrid.emptyRow = function(infix) {
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

// Form_CustomValidate event
fview_lab_resultreleaseddgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_resultreleaseddgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_resultreleaseddgrid.lists["x_Resulted[]"] = <?php echo $view_lab_resultreleasedd_grid->Resulted->Lookup->toClientList() ?>;
fview_lab_resultreleaseddgrid.lists["x_Resulted[]"].options = <?php echo JsonEncode($view_lab_resultreleasedd_grid->Resulted->options(FALSE, TRUE)) ?>;
fview_lab_resultreleaseddgrid.lists["x_TestUnit"] = <?php echo $view_lab_resultreleasedd_grid->TestUnit->Lookup->toClientList() ?>;
fview_lab_resultreleaseddgrid.lists["x_TestUnit"].options = <?php echo JsonEncode($view_lab_resultreleasedd_grid->TestUnit->lookupOptions()) ?>;
fview_lab_resultreleaseddgrid.autoSuggests["x_TestUnit"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_lab_resultreleaseddgrid.lists["x_Repeated[]"] = <?php echo $view_lab_resultreleasedd_grid->Repeated->Lookup->toClientList() ?>;
fview_lab_resultreleaseddgrid.lists["x_Repeated[]"].options = <?php echo JsonEncode($view_lab_resultreleasedd_grid->Repeated->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$view_lab_resultreleasedd_grid->renderOtherOptions();
?>
<?php $view_lab_resultreleasedd_grid->showPageHeader(); ?>
<?php
$view_lab_resultreleasedd_grid->showMessage();
?>
<?php if ($view_lab_resultreleasedd_grid->TotalRecs > 0 || $view_lab_resultreleasedd->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_lab_resultreleasedd_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_resultreleasedd">
<?php if ($view_lab_resultreleasedd_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_lab_resultreleasedd_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_lab_resultreleaseddgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_lab_resultreleasedd" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_view_lab_resultreleaseddgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_lab_resultreleasedd_grid->RowType = ROWTYPE_HEADER;

// Render list options
$view_lab_resultreleasedd_grid->renderListOptions();

// Render list options (header, left)
$view_lab_resultreleasedd_grid->ListOptions->render("header", "left");
?>
<?php if ($view_lab_resultreleasedd->id->Visible) { // id ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_lab_resultreleasedd->id->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_id" class="view_lab_resultreleasedd_id"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_lab_resultreleasedd->id->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_id" class="view_lab_resultreleasedd_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->PatID->Visible) { // PatID ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_lab_resultreleasedd->PatID->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_PatID" class="view_lab_resultreleasedd_PatID"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_lab_resultreleasedd->PatID->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_PatID" class="view_lab_resultreleasedd_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->PatientName->Visible) { // PatientName ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_resultreleasedd->PatientName->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_PatientName" class="view_lab_resultreleasedd_PatientName"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_resultreleasedd->PatientName->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_PatientName" class="view_lab_resultreleasedd_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Age->Visible) { // Age ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_lab_resultreleasedd->Age->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Age" class="view_lab_resultreleasedd_Age"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_lab_resultreleasedd->Age->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_Age" class="view_lab_resultreleasedd_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Gender->Visible) { // Gender ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_lab_resultreleasedd->Gender->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Gender" class="view_lab_resultreleasedd_Gender"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_lab_resultreleasedd->Gender->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_Gender" class="view_lab_resultreleasedd_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->sid->Visible) { // sid ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_lab_resultreleasedd->sid->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_sid" class="view_lab_resultreleasedd_sid"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_lab_resultreleasedd->sid->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_sid" class="view_lab_resultreleasedd_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->sid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->sid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_lab_resultreleasedd->ItemCode->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_ItemCode" class="view_lab_resultreleasedd_ItemCode"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_lab_resultreleasedd->ItemCode->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_ItemCode" class="view_lab_resultreleasedd_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->ItemCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->ItemCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_lab_resultreleasedd->DEptCd->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_DEptCd" class="view_lab_resultreleasedd_DEptCd"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_lab_resultreleasedd->DEptCd->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_DEptCd" class="view_lab_resultreleasedd_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->DEptCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->DEptCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Resulted->Visible) { // Resulted ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $view_lab_resultreleasedd->Resulted->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Resulted" class="view_lab_resultreleasedd_Resulted"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Resulted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $view_lab_resultreleasedd->Resulted->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_Resulted" class="view_lab_resultreleasedd_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Resulted->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Resulted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Resulted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Services->Visible) { // Services ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_lab_resultreleasedd->Services->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Services" class="view_lab_resultreleasedd_Services"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_lab_resultreleasedd->Services->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_Services" class="view_lab_resultreleasedd_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Services->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Services->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->LabReport->Visible) { // LabReport ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->LabReport) == "") { ?>
		<th data-name="LabReport" class="<?php echo $view_lab_resultreleasedd->LabReport->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_LabReport" class="view_lab_resultreleasedd_LabReport"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->LabReport->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabReport" class="<?php echo $view_lab_resultreleasedd->LabReport->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_LabReport" class="view_lab_resultreleasedd_LabReport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->LabReport->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->LabReport->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->LabReport->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $view_lab_resultreleasedd->Pic1->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Pic1" class="view_lab_resultreleasedd_Pic1"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $view_lab_resultreleasedd->Pic1->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_Pic1" class="view_lab_resultreleasedd_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Pic1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Pic1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Pic1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $view_lab_resultreleasedd->Pic2->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Pic2" class="view_lab_resultreleasedd_Pic2"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $view_lab_resultreleasedd->Pic2->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_Pic2" class="view_lab_resultreleasedd_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Pic2->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Pic2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Pic2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $view_lab_resultreleasedd->TestUnit->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_TestUnit" class="view_lab_resultreleasedd_TestUnit"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->TestUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $view_lab_resultreleasedd->TestUnit->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_TestUnit" class="view_lab_resultreleasedd_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->TestUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->TestUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->TestUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RefValue->Visible) { // RefValue ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->RefValue) == "") { ?>
		<th data-name="RefValue" class="<?php echo $view_lab_resultreleasedd->RefValue->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_RefValue" class="view_lab_resultreleasedd_RefValue"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->RefValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefValue" class="<?php echo $view_lab_resultreleasedd->RefValue->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_RefValue" class="view_lab_resultreleasedd_RefValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->RefValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->RefValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->RefValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Order->Visible) { // Order ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_lab_resultreleasedd->Order->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Order" class="view_lab_resultreleasedd_Order"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_lab_resultreleasedd->Order->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_Order" class="view_lab_resultreleasedd_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Repeated->Visible) { // Repeated ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $view_lab_resultreleasedd->Repeated->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Repeated" class="view_lab_resultreleasedd_Repeated"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Repeated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $view_lab_resultreleasedd->Repeated->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_Repeated" class="view_lab_resultreleasedd_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Repeated->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Repeated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Repeated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Vid->Visible) { // Vid ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $view_lab_resultreleasedd->Vid->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Vid" class="view_lab_resultreleasedd_Vid"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $view_lab_resultreleasedd->Vid->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_Vid" class="view_lab_resultreleasedd_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $view_lab_resultreleasedd->invoiceId->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_invoiceId" class="view_lab_resultreleasedd_invoiceId"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $view_lab_resultreleasedd->invoiceId->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_invoiceId" class="view_lab_resultreleasedd_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->invoiceId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->invoiceId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->DrID->Visible) { // DrID ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_lab_resultreleasedd->DrID->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_DrID" class="view_lab_resultreleasedd_DrID"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_lab_resultreleasedd->DrID->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_DrID" class="view_lab_resultreleasedd_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->DrID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->DrID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $view_lab_resultreleasedd->DrCODE->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_DrCODE" class="view_lab_resultreleasedd_DrCODE"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DrCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $view_lab_resultreleasedd->DrCODE->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_DrCODE" class="view_lab_resultreleasedd_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DrCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->DrCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->DrCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->DrName->Visible) { // DrName ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_lab_resultreleasedd->DrName->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_DrName" class="view_lab_resultreleasedd_DrName"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_lab_resultreleasedd->DrName->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_DrName" class="view_lab_resultreleasedd_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Department->Visible) { // Department ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_lab_resultreleasedd->Department->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Department" class="view_lab_resultreleasedd_Department"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_lab_resultreleasedd->Department->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_Department" class="view_lab_resultreleasedd_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_lab_resultreleasedd->createddatetime->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_createddatetime" class="view_lab_resultreleasedd_createddatetime"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_lab_resultreleasedd->createddatetime->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_createddatetime" class="view_lab_resultreleasedd_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->status->Visible) { // status ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_lab_resultreleasedd->status->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_status" class="view_lab_resultreleasedd_status"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_lab_resultreleasedd->status->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_status" class="view_lab_resultreleasedd_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->TestType->Visible) { // TestType ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $view_lab_resultreleasedd->TestType->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_TestType" class="view_lab_resultreleasedd_TestType"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $view_lab_resultreleasedd->TestType->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_TestType" class="view_lab_resultreleasedd_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->TestType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->TestType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->TestType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $view_lab_resultreleasedd->ResultDate->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_ResultDate" class="view_lab_resultreleasedd_ResultDate"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $view_lab_resultreleasedd->ResultDate->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_ResultDate" class="view_lab_resultreleasedd_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->ResultDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->ResultDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $view_lab_resultreleasedd->ResultedBy->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_ResultedBy" class="view_lab_resultreleasedd_ResultedBy"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $view_lab_resultreleasedd->ResultedBy->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_ResultedBy" class="view_lab_resultreleasedd_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->ResultedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->ResultedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_lab_resultreleasedd->HospID->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_HospID" class="view_lab_resultreleasedd_HospID"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_lab_resultreleasedd->HospID->headerCellClass() ?>"><div><div id="elh_view_lab_resultreleasedd_HospID" class="view_lab_resultreleasedd_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_resultreleasedd_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_lab_resultreleasedd_grid->StartRec = 1;
$view_lab_resultreleasedd_grid->StopRec = $view_lab_resultreleasedd_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $view_lab_resultreleasedd_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_lab_resultreleasedd_grid->FormKeyCountName) && ($view_lab_resultreleasedd->isGridAdd() || $view_lab_resultreleasedd->isGridEdit() || $view_lab_resultreleasedd->isConfirm())) {
		$view_lab_resultreleasedd_grid->KeyCount = $CurrentForm->getValue($view_lab_resultreleasedd_grid->FormKeyCountName);
		$view_lab_resultreleasedd_grid->StopRec = $view_lab_resultreleasedd_grid->StartRec + $view_lab_resultreleasedd_grid->KeyCount - 1;
	}
}
$view_lab_resultreleasedd_grid->RecCnt = $view_lab_resultreleasedd_grid->StartRec - 1;
if ($view_lab_resultreleasedd_grid->Recordset && !$view_lab_resultreleasedd_grid->Recordset->EOF) {
	$view_lab_resultreleasedd_grid->Recordset->moveFirst();
	$selectLimit = $view_lab_resultreleasedd_grid->UseSelectLimit;
	if (!$selectLimit && $view_lab_resultreleasedd_grid->StartRec > 1)
		$view_lab_resultreleasedd_grid->Recordset->move($view_lab_resultreleasedd_grid->StartRec - 1);
} elseif (!$view_lab_resultreleasedd->AllowAddDeleteRow && $view_lab_resultreleasedd_grid->StopRec == 0) {
	$view_lab_resultreleasedd_grid->StopRec = $view_lab_resultreleasedd->GridAddRowCount;
}

// Initialize aggregate
$view_lab_resultreleasedd->RowType = ROWTYPE_AGGREGATEINIT;
$view_lab_resultreleasedd->resetAttributes();
$view_lab_resultreleasedd_grid->renderRow();
if ($view_lab_resultreleasedd->isGridAdd())
	$view_lab_resultreleasedd_grid->RowIndex = 0;
if ($view_lab_resultreleasedd->isGridEdit())
	$view_lab_resultreleasedd_grid->RowIndex = 0;
while ($view_lab_resultreleasedd_grid->RecCnt < $view_lab_resultreleasedd_grid->StopRec) {
	$view_lab_resultreleasedd_grid->RecCnt++;
	if ($view_lab_resultreleasedd_grid->RecCnt >= $view_lab_resultreleasedd_grid->StartRec) {
		$view_lab_resultreleasedd_grid->RowCnt++;
		if ($view_lab_resultreleasedd->isGridAdd() || $view_lab_resultreleasedd->isGridEdit() || $view_lab_resultreleasedd->isConfirm()) {
			$view_lab_resultreleasedd_grid->RowIndex++;
			$CurrentForm->Index = $view_lab_resultreleasedd_grid->RowIndex;
			if ($CurrentForm->hasValue($view_lab_resultreleasedd_grid->FormActionName) && $view_lab_resultreleasedd_grid->EventCancelled)
				$view_lab_resultreleasedd_grid->RowAction = strval($CurrentForm->getValue($view_lab_resultreleasedd_grid->FormActionName));
			elseif ($view_lab_resultreleasedd->isGridAdd())
				$view_lab_resultreleasedd_grid->RowAction = "insert";
			else
				$view_lab_resultreleasedd_grid->RowAction = "";
		}

		// Set up key count
		$view_lab_resultreleasedd_grid->KeyCount = $view_lab_resultreleasedd_grid->RowIndex;

		// Init row class and style
		$view_lab_resultreleasedd->resetAttributes();
		$view_lab_resultreleasedd->CssClass = "";
		if ($view_lab_resultreleasedd->isGridAdd()) {
			if ($view_lab_resultreleasedd->CurrentMode == "copy") {
				$view_lab_resultreleasedd_grid->loadRowValues($view_lab_resultreleasedd_grid->Recordset); // Load row values
				$view_lab_resultreleasedd_grid->setRecordKey($view_lab_resultreleasedd_grid->RowOldKey, $view_lab_resultreleasedd_grid->Recordset); // Set old record key
			} else {
				$view_lab_resultreleasedd_grid->loadRowValues(); // Load default values
				$view_lab_resultreleasedd_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_lab_resultreleasedd_grid->loadRowValues($view_lab_resultreleasedd_grid->Recordset); // Load row values
		}
		$view_lab_resultreleasedd->RowType = ROWTYPE_VIEW; // Render view
		if ($view_lab_resultreleasedd->isGridAdd()) // Grid add
			$view_lab_resultreleasedd->RowType = ROWTYPE_ADD; // Render add
		if ($view_lab_resultreleasedd->isGridAdd() && $view_lab_resultreleasedd->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_lab_resultreleasedd_grid->restoreCurrentRowFormValues($view_lab_resultreleasedd_grid->RowIndex); // Restore form values
		if ($view_lab_resultreleasedd->isGridEdit()) { // Grid edit
			if ($view_lab_resultreleasedd->EventCancelled)
				$view_lab_resultreleasedd_grid->restoreCurrentRowFormValues($view_lab_resultreleasedd_grid->RowIndex); // Restore form values
			if ($view_lab_resultreleasedd_grid->RowAction == "insert")
				$view_lab_resultreleasedd->RowType = ROWTYPE_ADD; // Render add
			else
				$view_lab_resultreleasedd->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_lab_resultreleasedd->isGridEdit() && ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT || $view_lab_resultreleasedd->RowType == ROWTYPE_ADD) && $view_lab_resultreleasedd->EventCancelled) // Update failed
			$view_lab_resultreleasedd_grid->restoreCurrentRowFormValues($view_lab_resultreleasedd_grid->RowIndex); // Restore form values
		if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) // Edit row
			$view_lab_resultreleasedd_grid->EditRowCnt++;
		if ($view_lab_resultreleasedd->isConfirm()) // Confirm row
			$view_lab_resultreleasedd_grid->restoreCurrentRowFormValues($view_lab_resultreleasedd_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_lab_resultreleasedd->RowAttrs = array_merge($view_lab_resultreleasedd->RowAttrs, array('data-rowindex'=>$view_lab_resultreleasedd_grid->RowCnt, 'id'=>'r' . $view_lab_resultreleasedd_grid->RowCnt . '_view_lab_resultreleasedd', 'data-rowtype'=>$view_lab_resultreleasedd->RowType));

		// Render row
		$view_lab_resultreleasedd_grid->renderRow();

		// Render list options
		$view_lab_resultreleasedd_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_lab_resultreleasedd_grid->RowAction <> "delete" && $view_lab_resultreleasedd_grid->RowAction <> "insertdelete" && !($view_lab_resultreleasedd_grid->RowAction == "insert" && $view_lab_resultreleasedd->isConfirm() && $view_lab_resultreleasedd_grid->emptyRow())) {
?>
	<tr<?php echo $view_lab_resultreleasedd->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_resultreleasedd_grid->ListOptions->render("body", "left", $view_lab_resultreleasedd_grid->RowCnt);
?>
	<?php if ($view_lab_resultreleasedd->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_lab_resultreleasedd->id->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_id" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleasedd->id->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_id" class="form-group view_lab_resultreleasedd_id">
<span<?php echo $view_lab_resultreleasedd->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_id" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleasedd->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_id" class="view_lab_resultreleasedd_id">
<span<?php echo $view_lab_resultreleasedd->id->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->id->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_id" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleasedd->id->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_id" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleasedd->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_id" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleasedd->id->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_id" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleasedd->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $view_lab_resultreleasedd->PatID->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_PatID" class="form-group view_lab_resultreleasedd_PatID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->PatID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->PatID->EditValue ?>"<?php echo $view_lab_resultreleasedd->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_PatID" class="form-group view_lab_resultreleasedd_PatID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->PatID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->PatID->EditValue ?>"<?php echo $view_lab_resultreleasedd->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_PatID" class="view_lab_resultreleasedd_PatID">
<span<?php echo $view_lab_resultreleasedd->PatID->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->PatID->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatID->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatID->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_lab_resultreleasedd->PatientName->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_PatientName" class="form-group view_lab_resultreleasedd_PatientName">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->PatientName->EditValue ?>"<?php echo $view_lab_resultreleasedd->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_PatientName" class="form-group view_lab_resultreleasedd_PatientName">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->PatientName->EditValue ?>"<?php echo $view_lab_resultreleasedd->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_PatientName" class="view_lab_resultreleasedd_PatientName">
<span<?php echo $view_lab_resultreleasedd->PatientName->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->PatientName->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_lab_resultreleasedd->Age->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Age" class="form-group view_lab_resultreleasedd_Age">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Age" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Age->EditValue ?>"<?php echo $view_lab_resultreleasedd->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Age" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Age->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Age" class="form-group view_lab_resultreleasedd_Age">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Age" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Age->EditValue ?>"<?php echo $view_lab_resultreleasedd->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Age" class="view_lab_resultreleasedd_Age">
<span<?php echo $view_lab_resultreleasedd->Age->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Age->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Age" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Age->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Age" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Age" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Age->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Age" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_lab_resultreleasedd->Gender->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Gender" class="form-group view_lab_resultreleasedd_Gender">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Gender->EditValue ?>"<?php echo $view_lab_resultreleasedd->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Gender->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Gender" class="form-group view_lab_resultreleasedd_Gender">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Gender->EditValue ?>"<?php echo $view_lab_resultreleasedd->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Gender" class="view_lab_resultreleasedd_Gender">
<span<?php echo $view_lab_resultreleasedd->Gender->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Gender->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Gender->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Gender->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->sid->Visible) { // sid ?>
		<td data-name="sid"<?php echo $view_lab_resultreleasedd->sid->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_sid" class="form-group view_lab_resultreleasedd_sid">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_sid" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->sid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->sid->EditValue ?>"<?php echo $view_lab_resultreleasedd->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_sid" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->sid->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_sid" class="form-group view_lab_resultreleasedd_sid">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_sid" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->sid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->sid->EditValue ?>"<?php echo $view_lab_resultreleasedd->sid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_sid" class="view_lab_resultreleasedd_sid">
<span<?php echo $view_lab_resultreleasedd->sid->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->sid->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_sid" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->sid->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_sid" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->sid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_sid" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->sid->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_sid" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->sid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode"<?php echo $view_lab_resultreleasedd->ItemCode->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_ItemCode" class="form-group view_lab_resultreleasedd_ItemCode">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->ItemCode->EditValue ?>"<?php echo $view_lab_resultreleasedd->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_ItemCode" class="form-group view_lab_resultreleasedd_ItemCode">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->ItemCode->EditValue ?>"<?php echo $view_lab_resultreleasedd->ItemCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_ItemCode" class="view_lab_resultreleasedd_ItemCode">
<span<?php echo $view_lab_resultreleasedd->ItemCode->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->ItemCode->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ItemCode->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ItemCode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ItemCode->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ItemCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd"<?php echo $view_lab_resultreleasedd->DEptCd->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_DEptCd" class="form-group view_lab_resultreleasedd_DEptCd">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DEptCd->EditValue ?>"<?php echo $view_lab_resultreleasedd->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_DEptCd" class="form-group view_lab_resultreleasedd_DEptCd">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DEptCd->EditValue ?>"<?php echo $view_lab_resultreleasedd->DEptCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_DEptCd" class="view_lab_resultreleasedd_DEptCd">
<span<?php echo $view_lab_resultreleasedd->DEptCd->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->DEptCd->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DEptCd->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DEptCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DEptCd->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DEptCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted"<?php echo $view_lab_resultreleasedd->Resulted->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Resulted" class="form-group view_lab_resultreleasedd_Resulted">
<div id="tp_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleasedd" data-field="x_Resulted" data-value-separator="<?php echo $view_lab_resultreleasedd->Resulted->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted[]" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted[]" value="{value}"<?php echo $view_lab_resultreleasedd->Resulted->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd->Resulted->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_grid->RowIndex}_Resulted[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Resulted" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted[]" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted[]" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Resulted" class="form-group view_lab_resultreleasedd_Resulted">
<div id="tp_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleasedd" data-field="x_Resulted" data-value-separator="<?php echo $view_lab_resultreleasedd->Resulted->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted[]" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted[]" value="{value}"<?php echo $view_lab_resultreleasedd->Resulted->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd->Resulted->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_grid->RowIndex}_Resulted[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Resulted" class="view_lab_resultreleasedd_Resulted">
<span<?php echo $view_lab_resultreleasedd->Resulted->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Resulted->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Resulted" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Resulted->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Resulted" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted[]" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted[]" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Resulted->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Resulted" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Resulted->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Resulted" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted[]" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted[]" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Resulted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Services->Visible) { // Services ?>
		<td data-name="Services"<?php echo $view_lab_resultreleasedd->Services->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Services" class="form-group view_lab_resultreleasedd_Services">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Services" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Services->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Services->EditValue ?>"<?php echo $view_lab_resultreleasedd->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Services" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Services->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Services" class="form-group view_lab_resultreleasedd_Services">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Services" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Services->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Services->EditValue ?>"<?php echo $view_lab_resultreleasedd->Services->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Services" class="view_lab_resultreleasedd_Services">
<span<?php echo $view_lab_resultreleasedd->Services->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Services->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Services" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Services->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Services" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Services->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Services" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Services->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Services" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Services->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->LabReport->Visible) { // LabReport ?>
		<td data-name="LabReport"<?php echo $view_lab_resultreleasedd->LabReport->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_LabReport" class="form-group view_lab_resultreleasedd_LabReport">
<textarea data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->LabReport->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->LabReport->editAttributes() ?>><?php echo $view_lab_resultreleasedd->LabReport->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleasedd->LabReport->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_LabReport" class="form-group view_lab_resultreleasedd_LabReport">
<textarea data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->LabReport->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->LabReport->editAttributes() ?>><?php echo $view_lab_resultreleasedd->LabReport->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_LabReport" class="view_lab_resultreleasedd_LabReport">
<span<?php echo $view_lab_resultreleasedd->LabReport->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->LabReport->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleasedd->LabReport->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleasedd->LabReport->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleasedd->LabReport->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleasedd->LabReport->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1"<?php echo $view_lab_resultreleasedd->Pic1->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd_grid->RowAction == "insert") { // Add record ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Pic1" class="form-group view_lab_resultreleasedd_Pic1">
<div id="fd_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1">
<span title="<?php echo $view_lab_resultreleasedd->Pic1->title() ? $view_lab_resultreleasedd->Pic1->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleasedd->Pic1->ReadOnly || $view_lab_resultreleasedd->Pic1->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1"<?php echo $view_lab_resultreleasedd->Pic1->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id= "fn_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id= "fs_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id= "fx_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id= "fm_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Pic1->OldValue) ?>">
<?php } elseif ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Pic1" class="view_lab_resultreleasedd_Pic1">
<span<?php echo $view_lab_resultreleasedd->Pic1->viewAttributes() ?>>
<?php echo GetFileViewTag($view_lab_resultreleasedd->Pic1, $view_lab_resultreleasedd->Pic1->getViewValue()) ?>
</span>
</span>
<?php } else  { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Pic1" class="form-group view_lab_resultreleasedd_Pic1">
<div id="fd_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1">
<span title="<?php echo $view_lab_resultreleasedd->Pic1->title() ? $view_lab_resultreleasedd->Pic1->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleasedd->Pic1->ReadOnly || $view_lab_resultreleasedd->Pic1->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1"<?php echo $view_lab_resultreleasedd->Pic1->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id= "fn_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->Upload->FileName ?>">
<?php if (Post("fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1") == "0") { ?>
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="1">
<?php } ?>
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id= "fs_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id= "fx_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id= "fm_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2"<?php echo $view_lab_resultreleasedd->Pic2->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd_grid->RowAction == "insert") { // Add record ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Pic2" class="form-group view_lab_resultreleasedd_Pic2">
<div id="fd_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2">
<span title="<?php echo $view_lab_resultreleasedd->Pic2->title() ? $view_lab_resultreleasedd->Pic2->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleasedd->Pic2->ReadOnly || $view_lab_resultreleasedd->Pic2->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2"<?php echo $view_lab_resultreleasedd->Pic2->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id= "fn_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id= "fs_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id= "fx_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id= "fm_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Pic2->OldValue) ?>">
<?php } elseif ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Pic2" class="view_lab_resultreleasedd_Pic2">
<span<?php echo $view_lab_resultreleasedd->Pic2->viewAttributes() ?>>
<?php echo GetFileViewTag($view_lab_resultreleasedd->Pic2, $view_lab_resultreleasedd->Pic2->getViewValue()) ?>
</span>
</span>
<?php } else  { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Pic2" class="form-group view_lab_resultreleasedd_Pic2">
<div id="fd_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2">
<span title="<?php echo $view_lab_resultreleasedd->Pic2->title() ? $view_lab_resultreleasedd->Pic2->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleasedd->Pic2->ReadOnly || $view_lab_resultreleasedd->Pic2->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2"<?php echo $view_lab_resultreleasedd->Pic2->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id= "fn_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->Upload->FileName ?>">
<?php if (Post("fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2") == "0") { ?>
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="1">
<?php } ?>
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id= "fs_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id= "fx_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id= "fm_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit"<?php echo $view_lab_resultreleasedd->TestUnit->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_TestUnit" class="form-group view_lab_resultreleasedd_TestUnit">
<?php
$wrkonchange = "" . trim(@$view_lab_resultreleasedd->TestUnit->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_lab_resultreleasedd->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" class="text-nowrap" style="z-index: <?php echo (9000 - $view_lab_resultreleasedd_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" id="sv_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" value="<?php echo RemoveHtml($view_lab_resultreleasedd->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" data-value-separator="<?php echo $view_lab_resultreleasedd->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_lab_resultreleaseddgrid.createAutoSuggest({"id":"x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit","forceSelect":false});
</script>
<?php echo $view_lab_resultreleasedd->TestUnit->Lookup->getParamTag("p_x" . $view_lab_resultreleasedd_grid->RowIndex . "_TestUnit") ?>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_TestUnit" class="form-group view_lab_resultreleasedd_TestUnit">
<?php
$wrkonchange = "" . trim(@$view_lab_resultreleasedd->TestUnit->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_lab_resultreleasedd->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" class="text-nowrap" style="z-index: <?php echo (9000 - $view_lab_resultreleasedd_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" id="sv_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" value="<?php echo RemoveHtml($view_lab_resultreleasedd->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" data-value-separator="<?php echo $view_lab_resultreleasedd->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_lab_resultreleaseddgrid.createAutoSuggest({"id":"x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit","forceSelect":false});
</script>
<?php echo $view_lab_resultreleasedd->TestUnit->Lookup->getParamTag("p_x" . $view_lab_resultreleasedd_grid->RowIndex . "_TestUnit") ?>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_TestUnit" class="view_lab_resultreleasedd_TestUnit">
<span<?php echo $view_lab_resultreleasedd->TestUnit->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->TestUnit->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->RefValue->Visible) { // RefValue ?>
		<td data-name="RefValue"<?php echo $view_lab_resultreleasedd->RefValue->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_RefValue" class="form-group view_lab_resultreleasedd_RefValue">
<textarea data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->RefValue->editAttributes() ?>><?php echo $view_lab_resultreleasedd->RefValue->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleasedd->RefValue->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_RefValue" class="form-group view_lab_resultreleasedd_RefValue">
<textarea data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->RefValue->editAttributes() ?>><?php echo $view_lab_resultreleasedd->RefValue->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_RefValue" class="view_lab_resultreleasedd_RefValue">
<span<?php echo $view_lab_resultreleasedd->RefValue->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->RefValue->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleasedd->RefValue->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleasedd->RefValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleasedd->RefValue->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleasedd->RefValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $view_lab_resultreleasedd->Order->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Order" class="form-group view_lab_resultreleasedd_Order">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Order" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Order->EditValue ?>"<?php echo $view_lab_resultreleasedd->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Order" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Order->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Order" class="form-group view_lab_resultreleasedd_Order">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Order" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Order->EditValue ?>"<?php echo $view_lab_resultreleasedd->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Order" class="view_lab_resultreleasedd_Order">
<span<?php echo $view_lab_resultreleasedd->Order->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Order->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Order" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Order->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Order" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Order->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Order" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Order->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Order" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Order->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated"<?php echo $view_lab_resultreleasedd->Repeated->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Repeated" class="form-group view_lab_resultreleasedd_Repeated">
<div id="tp_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleasedd" data-field="x_Repeated" data-value-separator="<?php echo $view_lab_resultreleasedd->Repeated->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated[]" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated[]" value="{value}"<?php echo $view_lab_resultreleasedd->Repeated->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd->Repeated->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_grid->RowIndex}_Repeated[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Repeated" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated[]" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated[]" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Repeated" class="form-group view_lab_resultreleasedd_Repeated">
<div id="tp_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleasedd" data-field="x_Repeated" data-value-separator="<?php echo $view_lab_resultreleasedd->Repeated->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated[]" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated[]" value="{value}"<?php echo $view_lab_resultreleasedd->Repeated->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd->Repeated->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_grid->RowIndex}_Repeated[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Repeated" class="view_lab_resultreleasedd_Repeated">
<span<?php echo $view_lab_resultreleasedd->Repeated->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Repeated->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Repeated" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Repeated->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Repeated" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated[]" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated[]" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Repeated->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Repeated" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Repeated->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Repeated" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated[]" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated[]" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Repeated->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Vid->Visible) { // Vid ?>
		<td data-name="Vid"<?php echo $view_lab_resultreleasedd->Vid->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_lab_resultreleasedd->Vid->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<span<?php echo $view_lab_resultreleasedd->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Vid->EditValue ?>"<?php echo $view_lab_resultreleasedd->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_lab_resultreleasedd->Vid->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<span<?php echo $view_lab_resultreleasedd->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Vid->EditValue ?>"<?php echo $view_lab_resultreleasedd->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Vid" class="view_lab_resultreleasedd_Vid">
<span<?php echo $view_lab_resultreleasedd->Vid->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Vid->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId"<?php echo $view_lab_resultreleasedd->invoiceId->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_invoiceId" class="form-group view_lab_resultreleasedd_invoiceId">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->invoiceId->EditValue ?>"<?php echo $view_lab_resultreleasedd->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleasedd->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_invoiceId" class="form-group view_lab_resultreleasedd_invoiceId">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->invoiceId->EditValue ?>"<?php echo $view_lab_resultreleasedd->invoiceId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_invoiceId" class="view_lab_resultreleasedd_invoiceId">
<span<?php echo $view_lab_resultreleasedd->invoiceId->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->invoiceId->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleasedd->invoiceId->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleasedd->invoiceId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleasedd->invoiceId->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleasedd->invoiceId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->DrID->Visible) { // DrID ?>
		<td data-name="DrID"<?php echo $view_lab_resultreleasedd->DrID->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_DrID" class="form-group view_lab_resultreleasedd_DrID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrID->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_DrID" class="form-group view_lab_resultreleasedd_DrID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrID->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_DrID" class="view_lab_resultreleasedd_DrID">
<span<?php echo $view_lab_resultreleasedd->DrID->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->DrID->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrID->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrID->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE"<?php echo $view_lab_resultreleasedd->DrCODE->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_DrCODE" class="form-group view_lab_resultreleasedd_DrCODE">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrCODE->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_DrCODE" class="form-group view_lab_resultreleasedd_DrCODE">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrCODE->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_DrCODE" class="view_lab_resultreleasedd_DrCODE">
<span<?php echo $view_lab_resultreleasedd->DrCODE->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->DrCODE->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrCODE->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrCODE->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->DrName->Visible) { // DrName ?>
		<td data-name="DrName"<?php echo $view_lab_resultreleasedd->DrName->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_DrName" class="form-group view_lab_resultreleasedd_DrName">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrName->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrName->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_DrName" class="form-group view_lab_resultreleasedd_DrName">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrName->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_DrName" class="view_lab_resultreleasedd_DrName">
<span<?php echo $view_lab_resultreleasedd->DrName->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->DrName->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrName->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrName->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $view_lab_resultreleasedd->Department->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Department" class="form-group view_lab_resultreleasedd_Department">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Department" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Department->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Department->EditValue ?>"<?php echo $view_lab_resultreleasedd->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Department" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Department->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Department" class="form-group view_lab_resultreleasedd_Department">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Department" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Department->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Department->EditValue ?>"<?php echo $view_lab_resultreleasedd->Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_Department" class="view_lab_resultreleasedd_Department">
<span<?php echo $view_lab_resultreleasedd->Department->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Department->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Department" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Department->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Department" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Department->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Department" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Department->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Department" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_lab_resultreleasedd->createddatetime->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_createddatetime" class="form-group view_lab_resultreleasedd_createddatetime">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->createddatetime->EditValue ?>"<?php echo $view_lab_resultreleasedd->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_resultreleasedd->createddatetime->ReadOnly && !$view_lab_resultreleasedd->createddatetime->Disabled && !isset($view_lab_resultreleasedd->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_resultreleasedd->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_resultreleaseddgrid", "x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleasedd->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_createddatetime" class="form-group view_lab_resultreleasedd_createddatetime">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->createddatetime->EditValue ?>"<?php echo $view_lab_resultreleasedd->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_resultreleasedd->createddatetime->ReadOnly && !$view_lab_resultreleasedd->createddatetime->Disabled && !isset($view_lab_resultreleasedd->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_resultreleasedd->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_resultreleaseddgrid", "x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_createddatetime" class="view_lab_resultreleasedd_createddatetime">
<span<?php echo $view_lab_resultreleasedd->createddatetime->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleasedd->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleasedd->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleasedd->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleasedd->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_lab_resultreleasedd->status->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_status" class="form-group view_lab_resultreleasedd_status">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_status" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->status->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->status->EditValue ?>"<?php echo $view_lab_resultreleasedd->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_status" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleasedd->status->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_status" class="form-group view_lab_resultreleasedd_status">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_status" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->status->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->status->EditValue ?>"<?php echo $view_lab_resultreleasedd->status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_status" class="view_lab_resultreleasedd_status">
<span<?php echo $view_lab_resultreleasedd->status->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->status->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_status" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleasedd->status->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_status" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleasedd->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_status" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleasedd->status->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_status" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleasedd->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->TestType->Visible) { // TestType ?>
		<td data-name="TestType"<?php echo $view_lab_resultreleasedd->TestType->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_TestType" class="form-group view_lab_resultreleasedd_TestType">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestType->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->TestType->EditValue ?>"<?php echo $view_lab_resultreleasedd->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestType->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_TestType" class="form-group view_lab_resultreleasedd_TestType">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestType->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->TestType->EditValue ?>"<?php echo $view_lab_resultreleasedd->TestType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_TestType" class="view_lab_resultreleasedd_TestType">
<span<?php echo $view_lab_resultreleasedd->TestType->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->TestType->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestType->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestType->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate"<?php echo $view_lab_resultreleasedd->ResultDate->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultDate" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultDate" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_ResultDate" class="view_lab_resultreleasedd_ResultDate">
<span<?php echo $view_lab_resultreleasedd->ResultDate->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->ResultDate->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultDate" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultDate->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultDate" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultDate" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultDate" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultDate" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultDate->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultDate" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultDate" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy"<?php echo $view_lab_resultreleasedd->ResultedBy->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultedBy" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultedBy" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_ResultedBy" class="view_lab_resultreleasedd_ResultedBy">
<span<?php echo $view_lab_resultreleasedd->ResultedBy->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->ResultedBy->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultedBy" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultedBy" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultedBy" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultedBy" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultedBy" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultedBy" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultedBy" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_lab_resultreleasedd->HospID->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_HospID" class="form-group view_lab_resultreleasedd_HospID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->HospID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->HospID->EditValue ?>"<?php echo $view_lab_resultreleasedd->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_HospID" class="form-group view_lab_resultreleasedd_HospID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->HospID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->HospID->EditValue ?>"<?php echo $view_lab_resultreleasedd->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_grid->RowCnt ?>_view_lab_resultreleasedd_HospID" class="view_lab_resultreleasedd_HospID">
<span<?php echo $view_lab_resultreleasedd->HospID->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->HospID->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" id="fview_lab_resultreleaseddgrid$x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->HospID->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" id="fview_lab_resultreleaseddgrid$o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_resultreleasedd_grid->ListOptions->render("body", "right", $view_lab_resultreleasedd_grid->RowCnt);
?>
	</tr>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD || $view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_lab_resultreleaseddgrid.updateLists(<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_lab_resultreleasedd->isGridAdd() || $view_lab_resultreleasedd->CurrentMode == "copy")
		if (!$view_lab_resultreleasedd_grid->Recordset->EOF)
			$view_lab_resultreleasedd_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_lab_resultreleasedd->CurrentMode == "add" || $view_lab_resultreleasedd->CurrentMode == "copy" || $view_lab_resultreleasedd->CurrentMode == "edit") {
		$view_lab_resultreleasedd_grid->RowIndex = '$rowindex$';
		$view_lab_resultreleasedd_grid->loadRowValues();

		// Set row properties
		$view_lab_resultreleasedd->resetAttributes();
		$view_lab_resultreleasedd->RowAttrs = array_merge($view_lab_resultreleasedd->RowAttrs, array('data-rowindex'=>$view_lab_resultreleasedd_grid->RowIndex, 'id'=>'r0_view_lab_resultreleasedd', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_lab_resultreleasedd->RowAttrs["class"], "ew-template");
		$view_lab_resultreleasedd->RowType = ROWTYPE_ADD;

		// Render row
		$view_lab_resultreleasedd_grid->renderRow();

		// Render list options
		$view_lab_resultreleasedd_grid->renderListOptions();
		$view_lab_resultreleasedd_grid->StartRowCnt = 0;
?>
	<tr<?php echo $view_lab_resultreleasedd->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_resultreleasedd_grid->ListOptions->render("body", "left", $view_lab_resultreleasedd_grid->RowIndex);
?>
	<?php if ($view_lab_resultreleasedd->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_id" class="form-group view_lab_resultreleasedd_id">
<span<?php echo $view_lab_resultreleasedd->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_id" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleasedd->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_id" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleasedd->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_PatID" class="form-group view_lab_resultreleasedd_PatID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->PatID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->PatID->EditValue ?>"<?php echo $view_lab_resultreleasedd->PatID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_PatID" class="form-group view_lab_resultreleasedd_PatID">
<span<?php echo $view_lab_resultreleasedd->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_PatientName" class="form-group view_lab_resultreleasedd_PatientName">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->PatientName->EditValue ?>"<?php echo $view_lab_resultreleasedd->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_PatientName" class="form-group view_lab_resultreleasedd_PatientName">
<span<?php echo $view_lab_resultreleasedd->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Age" class="form-group view_lab_resultreleasedd_Age">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Age" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Age->EditValue ?>"<?php echo $view_lab_resultreleasedd->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Age" class="form-group view_lab_resultreleasedd_Age">
<span<?php echo $view_lab_resultreleasedd->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->Age->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Age" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Age" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Gender" class="form-group view_lab_resultreleasedd_Gender">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Gender->EditValue ?>"<?php echo $view_lab_resultreleasedd->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Gender" class="form-group view_lab_resultreleasedd_Gender">
<span<?php echo $view_lab_resultreleasedd->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->Gender->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->sid->Visible) { // sid ?>
		<td data-name="sid">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_sid" class="form-group view_lab_resultreleasedd_sid">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_sid" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->sid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->sid->EditValue ?>"<?php echo $view_lab_resultreleasedd->sid->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_sid" class="form-group view_lab_resultreleasedd_sid">
<span<?php echo $view_lab_resultreleasedd->sid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->sid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_sid" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->sid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_sid" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->sid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_ItemCode" class="form-group view_lab_resultreleasedd_ItemCode">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->ItemCode->EditValue ?>"<?php echo $view_lab_resultreleasedd->ItemCode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_ItemCode" class="form-group view_lab_resultreleasedd_ItemCode">
<span<?php echo $view_lab_resultreleasedd->ItemCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->ItemCode->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ItemCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ItemCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_DEptCd" class="form-group view_lab_resultreleasedd_DEptCd">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DEptCd->EditValue ?>"<?php echo $view_lab_resultreleasedd->DEptCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_DEptCd" class="form-group view_lab_resultreleasedd_DEptCd">
<span<?php echo $view_lab_resultreleasedd->DEptCd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->DEptCd->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DEptCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DEptCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Resulted" class="form-group view_lab_resultreleasedd_Resulted">
<div id="tp_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleasedd" data-field="x_Resulted" data-value-separator="<?php echo $view_lab_resultreleasedd->Resulted->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted[]" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted[]" value="{value}"<?php echo $view_lab_resultreleasedd->Resulted->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd->Resulted->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_grid->RowIndex}_Resulted[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Resulted" class="form-group view_lab_resultreleasedd_Resulted">
<span<?php echo $view_lab_resultreleasedd->Resulted->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->Resulted->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Resulted" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Resulted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Resulted" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted[]" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Resulted[]" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Resulted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Services->Visible) { // Services ?>
		<td data-name="Services">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Services" class="form-group view_lab_resultreleasedd_Services">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Services" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Services->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Services->EditValue ?>"<?php echo $view_lab_resultreleasedd->Services->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Services" class="form-group view_lab_resultreleasedd_Services">
<span<?php echo $view_lab_resultreleasedd->Services->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->Services->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Services" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Services->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Services" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Services->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->LabReport->Visible) { // LabReport ?>
		<td data-name="LabReport">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_LabReport" class="form-group view_lab_resultreleasedd_LabReport">
<textarea data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->LabReport->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->LabReport->editAttributes() ?>><?php echo $view_lab_resultreleasedd->LabReport->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_LabReport" class="form-group view_lab_resultreleasedd_LabReport">
<span<?php echo $view_lab_resultreleasedd->LabReport->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->LabReport->ViewValue ?></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleasedd->LabReport->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleasedd->LabReport->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1">
<span id="el$rowindex$_view_lab_resultreleasedd_Pic1" class="form-group view_lab_resultreleasedd_Pic1">
<div id="fd_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1">
<span title="<?php echo $view_lab_resultreleasedd->Pic1->title() ? $view_lab_resultreleasedd->Pic1->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleasedd->Pic1->ReadOnly || $view_lab_resultreleasedd->Pic1->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1"<?php echo $view_lab_resultreleasedd->Pic1->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id= "fn_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id= "fs_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id= "fx_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id= "fm_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Pic1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2">
<span id="el$rowindex$_view_lab_resultreleasedd_Pic2" class="form-group view_lab_resultreleasedd_Pic2">
<div id="fd_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2">
<span title="<?php echo $view_lab_resultreleasedd->Pic2->title() ? $view_lab_resultreleasedd->Pic2->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleasedd->Pic2->ReadOnly || $view_lab_resultreleasedd->Pic2->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2"<?php echo $view_lab_resultreleasedd->Pic2->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id= "fn_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id= "fs_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id= "fx_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id= "fm_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Pic2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_TestUnit" class="form-group view_lab_resultreleasedd_TestUnit">
<?php
$wrkonchange = "" . trim(@$view_lab_resultreleasedd->TestUnit->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_lab_resultreleasedd->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" class="text-nowrap" style="z-index: <?php echo (9000 - $view_lab_resultreleasedd_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" id="sv_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" value="<?php echo RemoveHtml($view_lab_resultreleasedd->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" data-value-separator="<?php echo $view_lab_resultreleasedd->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_lab_resultreleaseddgrid.createAutoSuggest({"id":"x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit","forceSelect":false});
</script>
<?php echo $view_lab_resultreleasedd->TestUnit->Lookup->getParamTag("p_x" . $view_lab_resultreleasedd_grid->RowIndex . "_TestUnit") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_TestUnit" class="form-group view_lab_resultreleasedd_TestUnit">
<span<?php echo $view_lab_resultreleasedd->TestUnit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->TestUnit->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->RefValue->Visible) { // RefValue ?>
		<td data-name="RefValue">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_RefValue" class="form-group view_lab_resultreleasedd_RefValue">
<textarea data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->RefValue->editAttributes() ?>><?php echo $view_lab_resultreleasedd->RefValue->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_RefValue" class="form-group view_lab_resultreleasedd_RefValue">
<span<?php echo $view_lab_resultreleasedd->RefValue->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->RefValue->ViewValue ?></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleasedd->RefValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleasedd->RefValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Order->Visible) { // Order ?>
		<td data-name="Order">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Order" class="form-group view_lab_resultreleasedd_Order">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Order" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Order->EditValue ?>"<?php echo $view_lab_resultreleasedd->Order->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Order" class="form-group view_lab_resultreleasedd_Order">
<span<?php echo $view_lab_resultreleasedd->Order->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->Order->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Order" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Order->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Order" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Repeated" class="form-group view_lab_resultreleasedd_Repeated">
<div id="tp_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleasedd" data-field="x_Repeated" data-value-separator="<?php echo $view_lab_resultreleasedd->Repeated->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated[]" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated[]" value="{value}"<?php echo $view_lab_resultreleasedd->Repeated->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd->Repeated->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_grid->RowIndex}_Repeated[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Repeated" class="form-group view_lab_resultreleasedd_Repeated">
<span<?php echo $view_lab_resultreleasedd->Repeated->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->Repeated->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Repeated" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Repeated->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Repeated" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated[]" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Repeated[]" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Repeated->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Vid->Visible) { // Vid ?>
		<td data-name="Vid">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<?php if ($view_lab_resultreleasedd->Vid->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<span<?php echo $view_lab_resultreleasedd->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Vid->EditValue ?>"<?php echo $view_lab_resultreleasedd->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<span<?php echo $view_lab_resultreleasedd->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_invoiceId" class="form-group view_lab_resultreleasedd_invoiceId">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->invoiceId->EditValue ?>"<?php echo $view_lab_resultreleasedd->invoiceId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_invoiceId" class="form-group view_lab_resultreleasedd_invoiceId">
<span<?php echo $view_lab_resultreleasedd->invoiceId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->invoiceId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleasedd->invoiceId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleasedd->invoiceId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->DrID->Visible) { // DrID ?>
		<td data-name="DrID">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_DrID" class="form-group view_lab_resultreleasedd_DrID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrID->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_DrID" class="form-group view_lab_resultreleasedd_DrID">
<span<?php echo $view_lab_resultreleasedd->DrID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->DrID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_DrCODE" class="form-group view_lab_resultreleasedd_DrCODE">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrCODE->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrCODE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_DrCODE" class="form-group view_lab_resultreleasedd_DrCODE">
<span<?php echo $view_lab_resultreleasedd->DrCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->DrCODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->DrName->Visible) { // DrName ?>
		<td data-name="DrName">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_DrName" class="form-group view_lab_resultreleasedd_DrName">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrName->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_DrName" class="form-group view_lab_resultreleasedd_DrName">
<span<?php echo $view_lab_resultreleasedd->DrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->DrName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Department->Visible) { // Department ?>
		<td data-name="Department">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Department" class="form-group view_lab_resultreleasedd_Department">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Department" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Department->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Department->EditValue ?>"<?php echo $view_lab_resultreleasedd->Department->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Department" class="form-group view_lab_resultreleasedd_Department">
<span<?php echo $view_lab_resultreleasedd->Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->Department->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Department" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Department" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_createddatetime" class="form-group view_lab_resultreleasedd_createddatetime">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->createddatetime->EditValue ?>"<?php echo $view_lab_resultreleasedd->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_resultreleasedd->createddatetime->ReadOnly && !$view_lab_resultreleasedd->createddatetime->Disabled && !isset($view_lab_resultreleasedd->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_resultreleasedd->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_resultreleaseddgrid", "x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_createddatetime" class="form-group view_lab_resultreleasedd_createddatetime">
<span<?php echo $view_lab_resultreleasedd->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleasedd->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleasedd->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_status" class="form-group view_lab_resultreleasedd_status">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_status" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->status->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->status->EditValue ?>"<?php echo $view_lab_resultreleasedd->status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_status" class="form-group view_lab_resultreleasedd_status">
<span<?php echo $view_lab_resultreleasedd->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_status" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleasedd->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_status" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleasedd->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_TestType" class="form-group view_lab_resultreleasedd_TestType">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestType->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->TestType->EditValue ?>"<?php echo $view_lab_resultreleasedd->TestType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_TestType" class="form-group view_lab_resultreleasedd_TestType">
<span<?php echo $view_lab_resultreleasedd->TestType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->TestType->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_ResultDate" class="form-group view_lab_resultreleasedd_ResultDate">
<span<?php echo $view_lab_resultreleasedd->ResultDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->ResultDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultDate" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultDate" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultDate" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_ResultedBy" class="form-group view_lab_resultreleasedd_ResultedBy">
<span<?php echo $view_lab_resultreleasedd->ResultedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->ResultedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultedBy" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultedBy" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultedBy" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_lab_resultreleasedd->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_HospID" class="form-group view_lab_resultreleasedd_HospID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->HospID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->HospID->EditValue ?>"<?php echo $view_lab_resultreleasedd->HospID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_HospID" class="form-group view_lab_resultreleasedd_HospID">
<span<?php echo $view_lab_resultreleasedd->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" id="o<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_resultreleasedd_grid->ListOptions->render("body", "right", $view_lab_resultreleasedd_grid->RowIndex);
?>
<script>
fview_lab_resultreleaseddgrid.updateLists(<?php echo $view_lab_resultreleasedd_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($view_lab_resultreleasedd->CurrentMode == "add" || $view_lab_resultreleasedd->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_lab_resultreleasedd_grid->FormKeyCountName ?>" id="<?php echo $view_lab_resultreleasedd_grid->FormKeyCountName ?>" value="<?php echo $view_lab_resultreleasedd_grid->KeyCount ?>">
<?php echo $view_lab_resultreleasedd_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_lab_resultreleasedd_grid->FormKeyCountName ?>" id="<?php echo $view_lab_resultreleasedd_grid->FormKeyCountName ?>" value="<?php echo $view_lab_resultreleasedd_grid->KeyCount ?>">
<?php echo $view_lab_resultreleasedd_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_lab_resultreleaseddgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($view_lab_resultreleasedd_grid->Recordset)
	$view_lab_resultreleasedd_grid->Recordset->Close();
?>
</div>
<?php if ($view_lab_resultreleasedd_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_lab_resultreleasedd_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_lab_resultreleasedd_grid->TotalRecs == 0 && !$view_lab_resultreleasedd->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_lab_resultreleasedd_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_lab_resultreleasedd_grid->terminate();
?>
<?php if (!$view_lab_resultreleasedd->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_lab_resultreleasedd", "95%", "");
</script>
<?php } ?>