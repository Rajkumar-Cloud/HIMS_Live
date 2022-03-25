<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_labreport_print_grid))
	$view_labreport_print_grid = new view_labreport_print_grid();

// Run the page
$view_labreport_print_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_labreport_print_grid->Page_Render();
?>
<?php if (!$view_labreport_print->isExport()) { ?>
<script>

// Form object
var fview_labreport_printgrid = new ew.Form("fview_labreport_printgrid", "grid");
fview_labreport_printgrid.formKeyCountName = '<?php echo $view_labreport_print_grid->FormKeyCountName ?>';

// Validate form
fview_labreport_printgrid.validate = function() {
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
		<?php if ($view_labreport_print_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->id->caption(), $view_labreport_print->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->PatID->caption(), $view_labreport_print->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_labreport_print->PatID->errorMessage()) ?>");
		<?php if ($view_labreport_print_grid->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->PatientName->caption(), $view_labreport_print->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->Age->caption(), $view_labreport_print->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->Gender->caption(), $view_labreport_print->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->sid->Required) { ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->sid->caption(), $view_labreport_print->sid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_labreport_print->sid->errorMessage()) ?>");
		<?php if ($view_labreport_print_grid->ItemCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->ItemCode->caption(), $view_labreport_print->ItemCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->DEptCd->Required) { ?>
			elm = this.getElements("x" + infix + "_DEptCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->DEptCd->caption(), $view_labreport_print->DEptCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->Resulted->Required) { ?>
			elm = this.getElements("x" + infix + "_Resulted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->Resulted->caption(), $view_labreport_print->Resulted->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->Services->Required) { ?>
			elm = this.getElements("x" + infix + "_Services");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->Services->caption(), $view_labreport_print->Services->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->Pic1->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->Pic1->caption(), $view_labreport_print->Pic1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->Pic2->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->Pic2->caption(), $view_labreport_print->Pic2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->TestUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_TestUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->TestUnit->caption(), $view_labreport_print->TestUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->Order->caption(), $view_labreport_print->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_labreport_print->Order->errorMessage()) ?>");
		<?php if ($view_labreport_print_grid->Repeated->Required) { ?>
			elm = this.getElements("x" + infix + "_Repeated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->Repeated->caption(), $view_labreport_print->Repeated->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->Vid->Required) { ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->Vid->caption(), $view_labreport_print->Vid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_labreport_print->Vid->errorMessage()) ?>");
		<?php if ($view_labreport_print_grid->invoiceId->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->invoiceId->caption(), $view_labreport_print->invoiceId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_labreport_print->invoiceId->errorMessage()) ?>");
		<?php if ($view_labreport_print_grid->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->DrID->caption(), $view_labreport_print->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_labreport_print->DrID->errorMessage()) ?>");
		<?php if ($view_labreport_print_grid->DrCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_DrCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->DrCODE->caption(), $view_labreport_print->DrCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->DrName->caption(), $view_labreport_print->DrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->Department->caption(), $view_labreport_print->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->createddatetime->caption(), $view_labreport_print->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_labreport_print->createddatetime->errorMessage()) ?>");
		<?php if ($view_labreport_print_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->status->caption(), $view_labreport_print->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_labreport_print->status->errorMessage()) ?>");
		<?php if ($view_labreport_print_grid->TestType->Required) { ?>
			elm = this.getElements("x" + infix + "_TestType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->TestType->caption(), $view_labreport_print->TestType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->ResultDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->ResultDate->caption(), $view_labreport_print->ResultDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_labreport_print->ResultDate->errorMessage()) ?>");
		<?php if ($view_labreport_print_grid->ResultedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->ResultedBy->caption(), $view_labreport_print->ResultedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->Printed->Required) { ?>
			elm = this.getElements("x" + infix + "_Printed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->Printed->caption(), $view_labreport_print->Printed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->PrintBy->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->PrintBy->caption(), $view_labreport_print->PrintBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_labreport_print_grid->PrintDate->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_labreport_print->PrintDate->caption(), $view_labreport_print->PrintDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_labreport_print->PrintDate->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fview_labreport_printgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "PatID", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Age", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
	if (ew.valueChanged(fobj, infix, "sid", false)) return false;
	if (ew.valueChanged(fobj, infix, "ItemCode", false)) return false;
	if (ew.valueChanged(fobj, infix, "DEptCd", false)) return false;
	if (ew.valueChanged(fobj, infix, "Resulted", false)) return false;
	if (ew.valueChanged(fobj, infix, "Services", false)) return false;
	if (ew.valueChanged(fobj, infix, "Pic1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Pic2", false)) return false;
	if (ew.valueChanged(fobj, infix, "TestUnit", false)) return false;
	if (ew.valueChanged(fobj, infix, "Order", false)) return false;
	if (ew.valueChanged(fobj, infix, "Repeated", false)) return false;
	if (ew.valueChanged(fobj, infix, "Vid", false)) return false;
	if (ew.valueChanged(fobj, infix, "invoiceId", false)) return false;
	if (ew.valueChanged(fobj, infix, "DrID", false)) return false;
	if (ew.valueChanged(fobj, infix, "DrCODE", false)) return false;
	if (ew.valueChanged(fobj, infix, "DrName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Department", false)) return false;
	if (ew.valueChanged(fobj, infix, "createddatetime", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "TestType", false)) return false;
	if (ew.valueChanged(fobj, infix, "ResultDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "ResultedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "Printed", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrintBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrintDate", false)) return false;
	return true;
}

// Form_CustomValidate event
fview_labreport_printgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_labreport_printgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<?php } ?>
<?php
$view_labreport_print_grid->renderOtherOptions();
?>
<?php $view_labreport_print_grid->showPageHeader(); ?>
<?php
$view_labreport_print_grid->showMessage();
?>
<?php if ($view_labreport_print_grid->TotalRecs > 0 || $view_labreport_print->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_labreport_print_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_labreport_print">
<?php if ($view_labreport_print_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_labreport_print_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_labreport_printgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_labreport_print" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_view_labreport_printgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_labreport_print_grid->RowType = ROWTYPE_HEADER;

// Render list options
$view_labreport_print_grid->renderListOptions();

// Render list options (header, left)
$view_labreport_print_grid->ListOptions->render("header", "left");
?>
<?php if ($view_labreport_print->id->Visible) { // id ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_labreport_print->id->headerCellClass() ?>"><div id="elh_view_labreport_print_id" class="view_labreport_print_id"><div class="ew-table-header-caption"><?php echo $view_labreport_print->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_labreport_print->id->headerCellClass() ?>"><div><div id="elh_view_labreport_print_id" class="view_labreport_print_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->PatID->Visible) { // PatID ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_labreport_print->PatID->headerCellClass() ?>"><div id="elh_view_labreport_print_PatID" class="view_labreport_print_PatID"><div class="ew-table-header-caption"><?php echo $view_labreport_print->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_labreport_print->PatID->headerCellClass() ?>"><div><div id="elh_view_labreport_print_PatID" class="view_labreport_print_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->PatientName->Visible) { // PatientName ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_labreport_print->PatientName->headerCellClass() ?>"><div id="elh_view_labreport_print_PatientName" class="view_labreport_print_PatientName"><div class="ew-table-header-caption"><?php echo $view_labreport_print->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_labreport_print->PatientName->headerCellClass() ?>"><div><div id="elh_view_labreport_print_PatientName" class="view_labreport_print_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Age->Visible) { // Age ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_labreport_print->Age->headerCellClass() ?>"><div id="elh_view_labreport_print_Age" class="view_labreport_print_Age"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_labreport_print->Age->headerCellClass() ?>"><div><div id="elh_view_labreport_print_Age" class="view_labreport_print_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Gender->Visible) { // Gender ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_labreport_print->Gender->headerCellClass() ?>"><div id="elh_view_labreport_print_Gender" class="view_labreport_print_Gender"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_labreport_print->Gender->headerCellClass() ?>"><div><div id="elh_view_labreport_print_Gender" class="view_labreport_print_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->sid->Visible) { // sid ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_labreport_print->sid->headerCellClass() ?>"><div id="elh_view_labreport_print_sid" class="view_labreport_print_sid"><div class="ew-table-header-caption"><?php echo $view_labreport_print->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_labreport_print->sid->headerCellClass() ?>"><div><div id="elh_view_labreport_print_sid" class="view_labreport_print_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->sid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->sid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_labreport_print->ItemCode->headerCellClass() ?>"><div id="elh_view_labreport_print_ItemCode" class="view_labreport_print_ItemCode"><div class="ew-table-header-caption"><?php echo $view_labreport_print->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_labreport_print->ItemCode->headerCellClass() ?>"><div><div id="elh_view_labreport_print_ItemCode" class="view_labreport_print_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->ItemCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->ItemCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_labreport_print->DEptCd->headerCellClass() ?>"><div id="elh_view_labreport_print_DEptCd" class="view_labreport_print_DEptCd"><div class="ew-table-header-caption"><?php echo $view_labreport_print->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_labreport_print->DEptCd->headerCellClass() ?>"><div><div id="elh_view_labreport_print_DEptCd" class="view_labreport_print_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->DEptCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->DEptCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Resulted->Visible) { // Resulted ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $view_labreport_print->Resulted->headerCellClass() ?>"><div id="elh_view_labreport_print_Resulted" class="view_labreport_print_Resulted"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Resulted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $view_labreport_print->Resulted->headerCellClass() ?>"><div><div id="elh_view_labreport_print_Resulted" class="view_labreport_print_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Resulted->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Resulted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Resulted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Services->Visible) { // Services ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_labreport_print->Services->headerCellClass() ?>"><div id="elh_view_labreport_print_Services" class="view_labreport_print_Services"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_labreport_print->Services->headerCellClass() ?>"><div><div id="elh_view_labreport_print_Services" class="view_labreport_print_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Services->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Services->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $view_labreport_print->Pic1->headerCellClass() ?>"><div id="elh_view_labreport_print_Pic1" class="view_labreport_print_Pic1"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $view_labreport_print->Pic1->headerCellClass() ?>"><div><div id="elh_view_labreport_print_Pic1" class="view_labreport_print_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Pic1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Pic1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Pic1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $view_labreport_print->Pic2->headerCellClass() ?>"><div id="elh_view_labreport_print_Pic2" class="view_labreport_print_Pic2"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $view_labreport_print->Pic2->headerCellClass() ?>"><div><div id="elh_view_labreport_print_Pic2" class="view_labreport_print_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Pic2->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Pic2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Pic2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $view_labreport_print->TestUnit->headerCellClass() ?>"><div id="elh_view_labreport_print_TestUnit" class="view_labreport_print_TestUnit"><div class="ew-table-header-caption"><?php echo $view_labreport_print->TestUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $view_labreport_print->TestUnit->headerCellClass() ?>"><div><div id="elh_view_labreport_print_TestUnit" class="view_labreport_print_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->TestUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->TestUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->TestUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Order->Visible) { // Order ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_labreport_print->Order->headerCellClass() ?>"><div id="elh_view_labreport_print_Order" class="view_labreport_print_Order"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_labreport_print->Order->headerCellClass() ?>"><div><div id="elh_view_labreport_print_Order" class="view_labreport_print_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Repeated->Visible) { // Repeated ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $view_labreport_print->Repeated->headerCellClass() ?>"><div id="elh_view_labreport_print_Repeated" class="view_labreport_print_Repeated"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Repeated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $view_labreport_print->Repeated->headerCellClass() ?>"><div><div id="elh_view_labreport_print_Repeated" class="view_labreport_print_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Repeated->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Repeated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Repeated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Vid->Visible) { // Vid ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $view_labreport_print->Vid->headerCellClass() ?>"><div id="elh_view_labreport_print_Vid" class="view_labreport_print_Vid"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $view_labreport_print->Vid->headerCellClass() ?>"><div><div id="elh_view_labreport_print_Vid" class="view_labreport_print_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $view_labreport_print->invoiceId->headerCellClass() ?>"><div id="elh_view_labreport_print_invoiceId" class="view_labreport_print_invoiceId"><div class="ew-table-header-caption"><?php echo $view_labreport_print->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $view_labreport_print->invoiceId->headerCellClass() ?>"><div><div id="elh_view_labreport_print_invoiceId" class="view_labreport_print_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->invoiceId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->invoiceId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->DrID->Visible) { // DrID ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_labreport_print->DrID->headerCellClass() ?>"><div id="elh_view_labreport_print_DrID" class="view_labreport_print_DrID"><div class="ew-table-header-caption"><?php echo $view_labreport_print->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_labreport_print->DrID->headerCellClass() ?>"><div><div id="elh_view_labreport_print_DrID" class="view_labreport_print_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->DrID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->DrID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $view_labreport_print->DrCODE->headerCellClass() ?>"><div id="elh_view_labreport_print_DrCODE" class="view_labreport_print_DrCODE"><div class="ew-table-header-caption"><?php echo $view_labreport_print->DrCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $view_labreport_print->DrCODE->headerCellClass() ?>"><div><div id="elh_view_labreport_print_DrCODE" class="view_labreport_print_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->DrCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->DrCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->DrCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->DrName->Visible) { // DrName ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_labreport_print->DrName->headerCellClass() ?>"><div id="elh_view_labreport_print_DrName" class="view_labreport_print_DrName"><div class="ew-table-header-caption"><?php echo $view_labreport_print->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_labreport_print->DrName->headerCellClass() ?>"><div><div id="elh_view_labreport_print_DrName" class="view_labreport_print_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Department->Visible) { // Department ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_labreport_print->Department->headerCellClass() ?>"><div id="elh_view_labreport_print_Department" class="view_labreport_print_Department"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_labreport_print->Department->headerCellClass() ?>"><div><div id="elh_view_labreport_print_Department" class="view_labreport_print_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_labreport_print->createddatetime->headerCellClass() ?>"><div id="elh_view_labreport_print_createddatetime" class="view_labreport_print_createddatetime"><div class="ew-table-header-caption"><?php echo $view_labreport_print->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_labreport_print->createddatetime->headerCellClass() ?>"><div><div id="elh_view_labreport_print_createddatetime" class="view_labreport_print_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->status->Visible) { // status ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_labreport_print->status->headerCellClass() ?>"><div id="elh_view_labreport_print_status" class="view_labreport_print_status"><div class="ew-table-header-caption"><?php echo $view_labreport_print->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_labreport_print->status->headerCellClass() ?>"><div><div id="elh_view_labreport_print_status" class="view_labreport_print_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->TestType->Visible) { // TestType ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $view_labreport_print->TestType->headerCellClass() ?>"><div id="elh_view_labreport_print_TestType" class="view_labreport_print_TestType"><div class="ew-table-header-caption"><?php echo $view_labreport_print->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $view_labreport_print->TestType->headerCellClass() ?>"><div><div id="elh_view_labreport_print_TestType" class="view_labreport_print_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->TestType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->TestType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->TestType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $view_labreport_print->ResultDate->headerCellClass() ?>"><div id="elh_view_labreport_print_ResultDate" class="view_labreport_print_ResultDate"><div class="ew-table-header-caption"><?php echo $view_labreport_print->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $view_labreport_print->ResultDate->headerCellClass() ?>"><div><div id="elh_view_labreport_print_ResultDate" class="view_labreport_print_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->ResultDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->ResultDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $view_labreport_print->ResultedBy->headerCellClass() ?>"><div id="elh_view_labreport_print_ResultedBy" class="view_labreport_print_ResultedBy"><div class="ew-table-header-caption"><?php echo $view_labreport_print->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $view_labreport_print->ResultedBy->headerCellClass() ?>"><div><div id="elh_view_labreport_print_ResultedBy" class="view_labreport_print_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->ResultedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->ResultedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Printed->Visible) { // Printed ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Printed) == "") { ?>
		<th data-name="Printed" class="<?php echo $view_labreport_print->Printed->headerCellClass() ?>"><div id="elh_view_labreport_print_Printed" class="view_labreport_print_Printed"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Printed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Printed" class="<?php echo $view_labreport_print->Printed->headerCellClass() ?>"><div><div id="elh_view_labreport_print_Printed" class="view_labreport_print_Printed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Printed->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Printed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Printed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->PrintBy->Visible) { // PrintBy ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->PrintBy) == "") { ?>
		<th data-name="PrintBy" class="<?php echo $view_labreport_print->PrintBy->headerCellClass() ?>"><div id="elh_view_labreport_print_PrintBy" class="view_labreport_print_PrintBy"><div class="ew-table-header-caption"><?php echo $view_labreport_print->PrintBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintBy" class="<?php echo $view_labreport_print->PrintBy->headerCellClass() ?>"><div><div id="elh_view_labreport_print_PrintBy" class="view_labreport_print_PrintBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->PrintBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->PrintBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->PrintBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->PrintDate->Visible) { // PrintDate ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->PrintDate) == "") { ?>
		<th data-name="PrintDate" class="<?php echo $view_labreport_print->PrintDate->headerCellClass() ?>"><div id="elh_view_labreport_print_PrintDate" class="view_labreport_print_PrintDate"><div class="ew-table-header-caption"><?php echo $view_labreport_print->PrintDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintDate" class="<?php echo $view_labreport_print->PrintDate->headerCellClass() ?>"><div><div id="elh_view_labreport_print_PrintDate" class="view_labreport_print_PrintDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->PrintDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->PrintDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_labreport_print_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_labreport_print_grid->StartRec = 1;
$view_labreport_print_grid->StopRec = $view_labreport_print_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $view_labreport_print_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_labreport_print_grid->FormKeyCountName) && ($view_labreport_print->isGridAdd() || $view_labreport_print->isGridEdit() || $view_labreport_print->isConfirm())) {
		$view_labreport_print_grid->KeyCount = $CurrentForm->getValue($view_labreport_print_grid->FormKeyCountName);
		$view_labreport_print_grid->StopRec = $view_labreport_print_grid->StartRec + $view_labreport_print_grid->KeyCount - 1;
	}
}
$view_labreport_print_grid->RecCnt = $view_labreport_print_grid->StartRec - 1;
if ($view_labreport_print_grid->Recordset && !$view_labreport_print_grid->Recordset->EOF) {
	$view_labreport_print_grid->Recordset->moveFirst();
	$selectLimit = $view_labreport_print_grid->UseSelectLimit;
	if (!$selectLimit && $view_labreport_print_grid->StartRec > 1)
		$view_labreport_print_grid->Recordset->move($view_labreport_print_grid->StartRec - 1);
} elseif (!$view_labreport_print->AllowAddDeleteRow && $view_labreport_print_grid->StopRec == 0) {
	$view_labreport_print_grid->StopRec = $view_labreport_print->GridAddRowCount;
}

// Initialize aggregate
$view_labreport_print->RowType = ROWTYPE_AGGREGATEINIT;
$view_labreport_print->resetAttributes();
$view_labreport_print_grid->renderRow();
if ($view_labreport_print->isGridAdd())
	$view_labreport_print_grid->RowIndex = 0;
if ($view_labreport_print->isGridEdit())
	$view_labreport_print_grid->RowIndex = 0;
while ($view_labreport_print_grid->RecCnt < $view_labreport_print_grid->StopRec) {
	$view_labreport_print_grid->RecCnt++;
	if ($view_labreport_print_grid->RecCnt >= $view_labreport_print_grid->StartRec) {
		$view_labreport_print_grid->RowCnt++;
		if ($view_labreport_print->isGridAdd() || $view_labreport_print->isGridEdit() || $view_labreport_print->isConfirm()) {
			$view_labreport_print_grid->RowIndex++;
			$CurrentForm->Index = $view_labreport_print_grid->RowIndex;
			if ($CurrentForm->hasValue($view_labreport_print_grid->FormActionName) && $view_labreport_print_grid->EventCancelled)
				$view_labreport_print_grid->RowAction = strval($CurrentForm->getValue($view_labreport_print_grid->FormActionName));
			elseif ($view_labreport_print->isGridAdd())
				$view_labreport_print_grid->RowAction = "insert";
			else
				$view_labreport_print_grid->RowAction = "";
		}

		// Set up key count
		$view_labreport_print_grid->KeyCount = $view_labreport_print_grid->RowIndex;

		// Init row class and style
		$view_labreport_print->resetAttributes();
		$view_labreport_print->CssClass = "";
		if ($view_labreport_print->isGridAdd()) {
			if ($view_labreport_print->CurrentMode == "copy") {
				$view_labreport_print_grid->loadRowValues($view_labreport_print_grid->Recordset); // Load row values
				$view_labreport_print_grid->setRecordKey($view_labreport_print_grid->RowOldKey, $view_labreport_print_grid->Recordset); // Set old record key
			} else {
				$view_labreport_print_grid->loadRowValues(); // Load default values
				$view_labreport_print_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_labreport_print_grid->loadRowValues($view_labreport_print_grid->Recordset); // Load row values
		}
		$view_labreport_print->RowType = ROWTYPE_VIEW; // Render view
		if ($view_labreport_print->isGridAdd()) // Grid add
			$view_labreport_print->RowType = ROWTYPE_ADD; // Render add
		if ($view_labreport_print->isGridAdd() && $view_labreport_print->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_labreport_print_grid->restoreCurrentRowFormValues($view_labreport_print_grid->RowIndex); // Restore form values
		if ($view_labreport_print->isGridEdit()) { // Grid edit
			if ($view_labreport_print->EventCancelled)
				$view_labreport_print_grid->restoreCurrentRowFormValues($view_labreport_print_grid->RowIndex); // Restore form values
			if ($view_labreport_print_grid->RowAction == "insert")
				$view_labreport_print->RowType = ROWTYPE_ADD; // Render add
			else
				$view_labreport_print->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_labreport_print->isGridEdit() && ($view_labreport_print->RowType == ROWTYPE_EDIT || $view_labreport_print->RowType == ROWTYPE_ADD) && $view_labreport_print->EventCancelled) // Update failed
			$view_labreport_print_grid->restoreCurrentRowFormValues($view_labreport_print_grid->RowIndex); // Restore form values
		if ($view_labreport_print->RowType == ROWTYPE_EDIT) // Edit row
			$view_labreport_print_grid->EditRowCnt++;
		if ($view_labreport_print->isConfirm()) // Confirm row
			$view_labreport_print_grid->restoreCurrentRowFormValues($view_labreport_print_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_labreport_print->RowAttrs = array_merge($view_labreport_print->RowAttrs, array('data-rowindex'=>$view_labreport_print_grid->RowCnt, 'id'=>'r' . $view_labreport_print_grid->RowCnt . '_view_labreport_print', 'data-rowtype'=>$view_labreport_print->RowType));

		// Render row
		$view_labreport_print_grid->renderRow();

		// Render list options
		$view_labreport_print_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_labreport_print_grid->RowAction <> "delete" && $view_labreport_print_grid->RowAction <> "insertdelete" && !($view_labreport_print_grid->RowAction == "insert" && $view_labreport_print->isConfirm() && $view_labreport_print_grid->emptyRow())) {
?>
	<tr<?php echo $view_labreport_print->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_labreport_print_grid->ListOptions->render("body", "left", $view_labreport_print_grid->RowCnt);
?>
	<?php if ($view_labreport_print->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_labreport_print->id->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_id" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_id" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_labreport_print->id->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_id" class="form-group view_labreport_print_id">
<span<?php echo $view_labreport_print->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_id" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_id" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_labreport_print->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_id" class="view_labreport_print_id">
<span<?php echo $view_labreport_print->id->viewAttributes() ?>>
<?php echo $view_labreport_print->id->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_id" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_id" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_labreport_print->id->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_id" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_id" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_labreport_print->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_id" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_id" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_labreport_print->id->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_id" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_id" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_labreport_print->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $view_labreport_print->PatID->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_PatID" class="form-group view_labreport_print_PatID">
<input type="text" data-table="view_labreport_print" data-field="x_PatID" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->PatID->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->PatID->EditValue ?>"<?php echo $view_labreport_print->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_PatID" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_labreport_print->PatID->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_PatID" class="form-group view_labreport_print_PatID">
<input type="text" data-table="view_labreport_print" data-field="x_PatID" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->PatID->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->PatID->EditValue ?>"<?php echo $view_labreport_print->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_PatID" class="view_labreport_print_PatID">
<span<?php echo $view_labreport_print->PatID->viewAttributes() ?>>
<?php echo $view_labreport_print->PatID->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_PatID" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_labreport_print->PatID->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_PatID" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_labreport_print->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_PatID" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_labreport_print->PatID->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_PatID" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_labreport_print->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_labreport_print->PatientName->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_PatientName" class="form-group view_labreport_print_PatientName">
<input type="text" data-table="view_labreport_print" data-field="x_PatientName" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->PatientName->EditValue ?>"<?php echo $view_labreport_print->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_PatientName" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_labreport_print->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_PatientName" class="form-group view_labreport_print_PatientName">
<input type="text" data-table="view_labreport_print" data-field="x_PatientName" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->PatientName->EditValue ?>"<?php echo $view_labreport_print->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_PatientName" class="view_labreport_print_PatientName">
<span<?php echo $view_labreport_print->PatientName->viewAttributes() ?>>
<?php echo $view_labreport_print->PatientName->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_PatientName" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_labreport_print->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_PatientName" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_labreport_print->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_PatientName" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_labreport_print->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_PatientName" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_labreport_print->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_labreport_print->Age->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Age" class="form-group view_labreport_print_Age">
<input type="text" data-table="view_labreport_print" data-field="x_Age" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Age" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Age->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Age->EditValue ?>"<?php echo $view_labreport_print->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Age" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Age" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_labreport_print->Age->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Age" class="form-group view_labreport_print_Age">
<input type="text" data-table="view_labreport_print" data-field="x_Age" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Age" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Age->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Age->EditValue ?>"<?php echo $view_labreport_print->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Age" class="view_labreport_print_Age">
<span<?php echo $view_labreport_print->Age->viewAttributes() ?>>
<?php echo $view_labreport_print->Age->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Age" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Age" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_labreport_print->Age->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Age" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Age" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_labreport_print->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Age" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Age" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_labreport_print->Age->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Age" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Age" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_labreport_print->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_labreport_print->Gender->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Gender" class="form-group view_labreport_print_Gender">
<input type="text" data-table="view_labreport_print" data-field="x_Gender" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Gender->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Gender->EditValue ?>"<?php echo $view_labreport_print->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Gender" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_labreport_print->Gender->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Gender" class="form-group view_labreport_print_Gender">
<input type="text" data-table="view_labreport_print" data-field="x_Gender" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Gender->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Gender->EditValue ?>"<?php echo $view_labreport_print->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Gender" class="view_labreport_print_Gender">
<span<?php echo $view_labreport_print->Gender->viewAttributes() ?>>
<?php echo $view_labreport_print->Gender->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Gender" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_labreport_print->Gender->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Gender" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_labreport_print->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Gender" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_labreport_print->Gender->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Gender" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_labreport_print->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->sid->Visible) { // sid ?>
		<td data-name="sid"<?php echo $view_labreport_print->sid->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_sid" class="form-group view_labreport_print_sid">
<input type="text" data-table="view_labreport_print" data-field="x_sid" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_sid" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->sid->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->sid->EditValue ?>"<?php echo $view_labreport_print->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_sid" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_sid" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_labreport_print->sid->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_sid" class="form-group view_labreport_print_sid">
<input type="text" data-table="view_labreport_print" data-field="x_sid" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_sid" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->sid->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->sid->EditValue ?>"<?php echo $view_labreport_print->sid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_sid" class="view_labreport_print_sid">
<span<?php echo $view_labreport_print->sid->viewAttributes() ?>>
<?php echo $view_labreport_print->sid->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_sid" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_sid" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_labreport_print->sid->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_sid" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_sid" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_labreport_print->sid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_sid" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_sid" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_labreport_print->sid->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_sid" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_sid" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_labreport_print->sid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode"<?php echo $view_labreport_print->ItemCode->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_ItemCode" class="form-group view_labreport_print_ItemCode">
<input type="text" data-table="view_labreport_print" data-field="x_ItemCode" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->ItemCode->EditValue ?>"<?php echo $view_labreport_print->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_ItemCode" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_labreport_print->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_ItemCode" class="form-group view_labreport_print_ItemCode">
<input type="text" data-table="view_labreport_print" data-field="x_ItemCode" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->ItemCode->EditValue ?>"<?php echo $view_labreport_print->ItemCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_ItemCode" class="view_labreport_print_ItemCode">
<span<?php echo $view_labreport_print->ItemCode->viewAttributes() ?>>
<?php echo $view_labreport_print->ItemCode->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_ItemCode" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_labreport_print->ItemCode->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_ItemCode" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_labreport_print->ItemCode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_ItemCode" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_labreport_print->ItemCode->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_ItemCode" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_labreport_print->ItemCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd"<?php echo $view_labreport_print->DEptCd->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_DEptCd" class="form-group view_labreport_print_DEptCd">
<input type="text" data-table="view_labreport_print" data-field="x_DEptCd" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->DEptCd->EditValue ?>"<?php echo $view_labreport_print->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_DEptCd" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_labreport_print->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_DEptCd" class="form-group view_labreport_print_DEptCd">
<input type="text" data-table="view_labreport_print" data-field="x_DEptCd" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->DEptCd->EditValue ?>"<?php echo $view_labreport_print->DEptCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_DEptCd" class="view_labreport_print_DEptCd">
<span<?php echo $view_labreport_print->DEptCd->viewAttributes() ?>>
<?php echo $view_labreport_print->DEptCd->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_DEptCd" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_labreport_print->DEptCd->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_DEptCd" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_labreport_print->DEptCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_DEptCd" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_labreport_print->DEptCd->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_DEptCd" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_labreport_print->DEptCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted"<?php echo $view_labreport_print->Resulted->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Resulted" class="form-group view_labreport_print_Resulted">
<input type="text" data-table="view_labreport_print" data-field="x_Resulted" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Resulted->EditValue ?>"<?php echo $view_labreport_print->Resulted->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Resulted" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_labreport_print->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Resulted" class="form-group view_labreport_print_Resulted">
<input type="text" data-table="view_labreport_print" data-field="x_Resulted" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Resulted->EditValue ?>"<?php echo $view_labreport_print->Resulted->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Resulted" class="view_labreport_print_Resulted">
<span<?php echo $view_labreport_print->Resulted->viewAttributes() ?>>
<?php echo $view_labreport_print->Resulted->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Resulted" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_labreport_print->Resulted->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Resulted" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_labreport_print->Resulted->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Resulted" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_labreport_print->Resulted->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Resulted" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_labreport_print->Resulted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Services->Visible) { // Services ?>
		<td data-name="Services"<?php echo $view_labreport_print->Services->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Services" class="form-group view_labreport_print_Services">
<input type="text" data-table="view_labreport_print" data-field="x_Services" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Services" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_labreport_print->Services->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Services->EditValue ?>"<?php echo $view_labreport_print->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Services" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Services" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_labreport_print->Services->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Services" class="form-group view_labreport_print_Services">
<input type="text" data-table="view_labreport_print" data-field="x_Services" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Services" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_labreport_print->Services->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Services->EditValue ?>"<?php echo $view_labreport_print->Services->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Services" class="view_labreport_print_Services">
<span<?php echo $view_labreport_print->Services->viewAttributes() ?>>
<?php echo $view_labreport_print->Services->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Services" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Services" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_labreport_print->Services->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Services" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Services" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_labreport_print->Services->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Services" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Services" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_labreport_print->Services->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Services" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Services" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_labreport_print->Services->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1"<?php echo $view_labreport_print->Pic1->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Pic1" class="form-group view_labreport_print_Pic1">
<input type="text" data-table="view_labreport_print" data-field="x_Pic1" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Pic1->EditValue ?>"<?php echo $view_labreport_print->Pic1->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Pic1" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_labreport_print->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Pic1" class="form-group view_labreport_print_Pic1">
<input type="text" data-table="view_labreport_print" data-field="x_Pic1" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Pic1->EditValue ?>"<?php echo $view_labreport_print->Pic1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Pic1" class="view_labreport_print_Pic1">
<span<?php echo $view_labreport_print->Pic1->viewAttributes() ?>>
<?php echo $view_labreport_print->Pic1->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Pic1" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_labreport_print->Pic1->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Pic1" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_labreport_print->Pic1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Pic1" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_labreport_print->Pic1->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Pic1" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_labreport_print->Pic1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2"<?php echo $view_labreport_print->Pic2->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Pic2" class="form-group view_labreport_print_Pic2">
<input type="text" data-table="view_labreport_print" data-field="x_Pic2" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Pic2->EditValue ?>"<?php echo $view_labreport_print->Pic2->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Pic2" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_labreport_print->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Pic2" class="form-group view_labreport_print_Pic2">
<input type="text" data-table="view_labreport_print" data-field="x_Pic2" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Pic2->EditValue ?>"<?php echo $view_labreport_print->Pic2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Pic2" class="view_labreport_print_Pic2">
<span<?php echo $view_labreport_print->Pic2->viewAttributes() ?>>
<?php echo $view_labreport_print->Pic2->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Pic2" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_labreport_print->Pic2->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Pic2" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_labreport_print->Pic2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Pic2" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_labreport_print->Pic2->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Pic2" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_labreport_print->Pic2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit"<?php echo $view_labreport_print->TestUnit->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_TestUnit" class="form-group view_labreport_print_TestUnit">
<input type="text" data-table="view_labreport_print" data-field="x_TestUnit" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->TestUnit->EditValue ?>"<?php echo $view_labreport_print->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_TestUnit" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_labreport_print->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_TestUnit" class="form-group view_labreport_print_TestUnit">
<input type="text" data-table="view_labreport_print" data-field="x_TestUnit" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->TestUnit->EditValue ?>"<?php echo $view_labreport_print->TestUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_TestUnit" class="view_labreport_print_TestUnit">
<span<?php echo $view_labreport_print->TestUnit->viewAttributes() ?>>
<?php echo $view_labreport_print->TestUnit->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_TestUnit" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_labreport_print->TestUnit->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_TestUnit" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_labreport_print->TestUnit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_TestUnit" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_labreport_print->TestUnit->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_TestUnit" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_labreport_print->TestUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $view_labreport_print->Order->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Order" class="form-group view_labreport_print_Order">
<input type="text" data-table="view_labreport_print" data-field="x_Order" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Order" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->Order->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Order->EditValue ?>"<?php echo $view_labreport_print->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Order" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Order" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_labreport_print->Order->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Order" class="form-group view_labreport_print_Order">
<input type="text" data-table="view_labreport_print" data-field="x_Order" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Order" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->Order->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Order->EditValue ?>"<?php echo $view_labreport_print->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Order" class="view_labreport_print_Order">
<span<?php echo $view_labreport_print->Order->viewAttributes() ?>>
<?php echo $view_labreport_print->Order->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Order" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Order" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_labreport_print->Order->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Order" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Order" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_labreport_print->Order->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Order" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Order" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_labreport_print->Order->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Order" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Order" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_labreport_print->Order->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated"<?php echo $view_labreport_print->Repeated->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Repeated" class="form-group view_labreport_print_Repeated">
<input type="text" data-table="view_labreport_print" data-field="x_Repeated" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Repeated->EditValue ?>"<?php echo $view_labreport_print->Repeated->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Repeated" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_labreport_print->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Repeated" class="form-group view_labreport_print_Repeated">
<input type="text" data-table="view_labreport_print" data-field="x_Repeated" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Repeated->EditValue ?>"<?php echo $view_labreport_print->Repeated->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Repeated" class="view_labreport_print_Repeated">
<span<?php echo $view_labreport_print->Repeated->viewAttributes() ?>>
<?php echo $view_labreport_print->Repeated->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Repeated" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_labreport_print->Repeated->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Repeated" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_labreport_print->Repeated->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Repeated" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_labreport_print->Repeated->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Repeated" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_labreport_print->Repeated->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Vid->Visible) { // Vid ?>
		<td data-name="Vid"<?php echo $view_labreport_print->Vid->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_labreport_print->Vid->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Vid" class="form-group view_labreport_print_Vid">
<span<?php echo $view_labreport_print->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_labreport_print->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Vid" class="form-group view_labreport_print_Vid">
<input type="text" data-table="view_labreport_print" data-field="x_Vid" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->Vid->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Vid->EditValue ?>"<?php echo $view_labreport_print->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Vid" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_labreport_print->Vid->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_labreport_print->Vid->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Vid" class="form-group view_labreport_print_Vid">
<span<?php echo $view_labreport_print->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_labreport_print->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Vid" class="form-group view_labreport_print_Vid">
<input type="text" data-table="view_labreport_print" data-field="x_Vid" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->Vid->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Vid->EditValue ?>"<?php echo $view_labreport_print->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Vid" class="view_labreport_print_Vid">
<span<?php echo $view_labreport_print->Vid->viewAttributes() ?>>
<?php echo $view_labreport_print->Vid->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Vid" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_labreport_print->Vid->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Vid" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_labreport_print->Vid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Vid" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_labreport_print->Vid->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Vid" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_labreport_print->Vid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId"<?php echo $view_labreport_print->invoiceId->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_invoiceId" class="form-group view_labreport_print_invoiceId">
<input type="text" data-table="view_labreport_print" data-field="x_invoiceId" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->invoiceId->EditValue ?>"<?php echo $view_labreport_print->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_invoiceId" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_labreport_print->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_invoiceId" class="form-group view_labreport_print_invoiceId">
<input type="text" data-table="view_labreport_print" data-field="x_invoiceId" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->invoiceId->EditValue ?>"<?php echo $view_labreport_print->invoiceId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_invoiceId" class="view_labreport_print_invoiceId">
<span<?php echo $view_labreport_print->invoiceId->viewAttributes() ?>>
<?php echo $view_labreport_print->invoiceId->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_invoiceId" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_labreport_print->invoiceId->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_invoiceId" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_labreport_print->invoiceId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_invoiceId" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_labreport_print->invoiceId->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_invoiceId" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_labreport_print->invoiceId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->DrID->Visible) { // DrID ?>
		<td data-name="DrID"<?php echo $view_labreport_print->DrID->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_DrID" class="form-group view_labreport_print_DrID">
<input type="text" data-table="view_labreport_print" data-field="x_DrID" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->DrID->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->DrID->EditValue ?>"<?php echo $view_labreport_print->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_DrID" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_labreport_print->DrID->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_DrID" class="form-group view_labreport_print_DrID">
<input type="text" data-table="view_labreport_print" data-field="x_DrID" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->DrID->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->DrID->EditValue ?>"<?php echo $view_labreport_print->DrID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_DrID" class="view_labreport_print_DrID">
<span<?php echo $view_labreport_print->DrID->viewAttributes() ?>>
<?php echo $view_labreport_print->DrID->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_DrID" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_labreport_print->DrID->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_DrID" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_labreport_print->DrID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_DrID" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_labreport_print->DrID->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_DrID" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_labreport_print->DrID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE"<?php echo $view_labreport_print->DrCODE->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_DrCODE" class="form-group view_labreport_print_DrCODE">
<input type="text" data-table="view_labreport_print" data-field="x_DrCODE" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->DrCODE->EditValue ?>"<?php echo $view_labreport_print->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_DrCODE" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_labreport_print->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_DrCODE" class="form-group view_labreport_print_DrCODE">
<input type="text" data-table="view_labreport_print" data-field="x_DrCODE" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->DrCODE->EditValue ?>"<?php echo $view_labreport_print->DrCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_DrCODE" class="view_labreport_print_DrCODE">
<span<?php echo $view_labreport_print->DrCODE->viewAttributes() ?>>
<?php echo $view_labreport_print->DrCODE->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_DrCODE" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_labreport_print->DrCODE->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_DrCODE" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_labreport_print->DrCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_DrCODE" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_labreport_print->DrCODE->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_DrCODE" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_labreport_print->DrCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->DrName->Visible) { // DrName ?>
		<td data-name="DrName"<?php echo $view_labreport_print->DrName->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_DrName" class="form-group view_labreport_print_DrName">
<input type="text" data-table="view_labreport_print" data-field="x_DrName" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->DrName->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->DrName->EditValue ?>"<?php echo $view_labreport_print->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_DrName" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_labreport_print->DrName->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_DrName" class="form-group view_labreport_print_DrName">
<input type="text" data-table="view_labreport_print" data-field="x_DrName" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->DrName->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->DrName->EditValue ?>"<?php echo $view_labreport_print->DrName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_DrName" class="view_labreport_print_DrName">
<span<?php echo $view_labreport_print->DrName->viewAttributes() ?>>
<?php echo $view_labreport_print->DrName->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_DrName" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_labreport_print->DrName->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_DrName" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_labreport_print->DrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_DrName" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_labreport_print->DrName->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_DrName" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_labreport_print->DrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $view_labreport_print->Department->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Department" class="form-group view_labreport_print_Department">
<input type="text" data-table="view_labreport_print" data-field="x_Department" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Department" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Department->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Department->EditValue ?>"<?php echo $view_labreport_print->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Department" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Department" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_labreport_print->Department->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Department" class="form-group view_labreport_print_Department">
<input type="text" data-table="view_labreport_print" data-field="x_Department" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Department" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Department->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Department->EditValue ?>"<?php echo $view_labreport_print->Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Department" class="view_labreport_print_Department">
<span<?php echo $view_labreport_print->Department->viewAttributes() ?>>
<?php echo $view_labreport_print->Department->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Department" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Department" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_labreport_print->Department->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Department" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Department" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_labreport_print->Department->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Department" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Department" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_labreport_print->Department->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Department" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Department" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_labreport_print->Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_labreport_print->createddatetime->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_createddatetime" class="form-group view_labreport_print_createddatetime">
<input type="text" data-table="view_labreport_print" data-field="x_createddatetime" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_labreport_print->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->createddatetime->EditValue ?>"<?php echo $view_labreport_print->createddatetime->editAttributes() ?>>
<?php if (!$view_labreport_print->createddatetime->ReadOnly && !$view_labreport_print->createddatetime->Disabled && !isset($view_labreport_print->createddatetime->EditAttrs["readonly"]) && !isset($view_labreport_print->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_labreport_printgrid", "x<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_createddatetime" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_labreport_print->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_createddatetime" class="form-group view_labreport_print_createddatetime">
<input type="text" data-table="view_labreport_print" data-field="x_createddatetime" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_labreport_print->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->createddatetime->EditValue ?>"<?php echo $view_labreport_print->createddatetime->editAttributes() ?>>
<?php if (!$view_labreport_print->createddatetime->ReadOnly && !$view_labreport_print->createddatetime->Disabled && !isset($view_labreport_print->createddatetime->EditAttrs["readonly"]) && !isset($view_labreport_print->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_labreport_printgrid", "x<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_createddatetime" class="view_labreport_print_createddatetime">
<span<?php echo $view_labreport_print->createddatetime->viewAttributes() ?>>
<?php echo $view_labreport_print->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_createddatetime" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_labreport_print->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_createddatetime" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_labreport_print->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_createddatetime" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_labreport_print->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_createddatetime" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_labreport_print->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_labreport_print->status->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_status" class="form-group view_labreport_print_status">
<input type="text" data-table="view_labreport_print" data-field="x_status" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_status" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->status->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->status->EditValue ?>"<?php echo $view_labreport_print->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_status" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_status" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_labreport_print->status->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_status" class="form-group view_labreport_print_status">
<input type="text" data-table="view_labreport_print" data-field="x_status" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_status" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->status->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->status->EditValue ?>"<?php echo $view_labreport_print->status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_status" class="view_labreport_print_status">
<span<?php echo $view_labreport_print->status->viewAttributes() ?>>
<?php echo $view_labreport_print->status->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_status" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_status" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_labreport_print->status->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_status" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_status" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_labreport_print->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_status" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_status" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_labreport_print->status->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_status" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_status" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_labreport_print->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->TestType->Visible) { // TestType ?>
		<td data-name="TestType"<?php echo $view_labreport_print->TestType->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_TestType" class="form-group view_labreport_print_TestType">
<input type="text" data-table="view_labreport_print" data-field="x_TestType" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->TestType->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->TestType->EditValue ?>"<?php echo $view_labreport_print->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_TestType" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_labreport_print->TestType->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_TestType" class="form-group view_labreport_print_TestType">
<input type="text" data-table="view_labreport_print" data-field="x_TestType" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->TestType->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->TestType->EditValue ?>"<?php echo $view_labreport_print->TestType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_TestType" class="view_labreport_print_TestType">
<span<?php echo $view_labreport_print->TestType->viewAttributes() ?>>
<?php echo $view_labreport_print->TestType->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_TestType" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_labreport_print->TestType->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_TestType" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_labreport_print->TestType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_TestType" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_labreport_print->TestType->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_TestType" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_labreport_print->TestType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate"<?php echo $view_labreport_print->ResultDate->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_ResultDate" class="form-group view_labreport_print_ResultDate">
<input type="text" data-table="view_labreport_print" data-field="x_ResultDate" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($view_labreport_print->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->ResultDate->EditValue ?>"<?php echo $view_labreport_print->ResultDate->editAttributes() ?>>
<?php if (!$view_labreport_print->ResultDate->ReadOnly && !$view_labreport_print->ResultDate->Disabled && !isset($view_labreport_print->ResultDate->EditAttrs["readonly"]) && !isset($view_labreport_print->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_labreport_printgrid", "x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_ResultDate" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_labreport_print->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_ResultDate" class="form-group view_labreport_print_ResultDate">
<input type="text" data-table="view_labreport_print" data-field="x_ResultDate" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($view_labreport_print->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->ResultDate->EditValue ?>"<?php echo $view_labreport_print->ResultDate->editAttributes() ?>>
<?php if (!$view_labreport_print->ResultDate->ReadOnly && !$view_labreport_print->ResultDate->Disabled && !isset($view_labreport_print->ResultDate->EditAttrs["readonly"]) && !isset($view_labreport_print->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_labreport_printgrid", "x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_ResultDate" class="view_labreport_print_ResultDate">
<span<?php echo $view_labreport_print->ResultDate->viewAttributes() ?>>
<?php echo $view_labreport_print->ResultDate->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_ResultDate" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_labreport_print->ResultDate->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_ResultDate" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_labreport_print->ResultDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_ResultDate" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_labreport_print->ResultDate->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_ResultDate" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_labreport_print->ResultDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy"<?php echo $view_labreport_print->ResultedBy->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_ResultedBy" class="form-group view_labreport_print_ResultedBy">
<input type="text" data-table="view_labreport_print" data-field="x_ResultedBy" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->ResultedBy->EditValue ?>"<?php echo $view_labreport_print->ResultedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_ResultedBy" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_labreport_print->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_ResultedBy" class="form-group view_labreport_print_ResultedBy">
<input type="text" data-table="view_labreport_print" data-field="x_ResultedBy" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->ResultedBy->EditValue ?>"<?php echo $view_labreport_print->ResultedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_ResultedBy" class="view_labreport_print_ResultedBy">
<span<?php echo $view_labreport_print->ResultedBy->viewAttributes() ?>>
<?php echo $view_labreport_print->ResultedBy->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_ResultedBy" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_labreport_print->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_ResultedBy" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_labreport_print->ResultedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_ResultedBy" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_labreport_print->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_ResultedBy" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_labreport_print->ResultedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Printed->Visible) { // Printed ?>
		<td data-name="Printed"<?php echo $view_labreport_print->Printed->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Printed" class="form-group view_labreport_print_Printed">
<input type="text" data-table="view_labreport_print" data-field="x_Printed" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Printed->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Printed->EditValue ?>"<?php echo $view_labreport_print->Printed->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Printed" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_labreport_print->Printed->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Printed" class="form-group view_labreport_print_Printed">
<input type="text" data-table="view_labreport_print" data-field="x_Printed" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Printed->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Printed->EditValue ?>"<?php echo $view_labreport_print->Printed->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_Printed" class="view_labreport_print_Printed">
<span<?php echo $view_labreport_print->Printed->viewAttributes() ?>>
<?php echo $view_labreport_print->Printed->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Printed" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_labreport_print->Printed->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Printed" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_labreport_print->Printed->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Printed" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_labreport_print->Printed->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_Printed" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_labreport_print->Printed->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy"<?php echo $view_labreport_print->PrintBy->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_PrintBy" class="form-group view_labreport_print_PrintBy">
<input type="text" data-table="view_labreport_print" data-field="x_PrintBy" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->PrintBy->EditValue ?>"<?php echo $view_labreport_print->PrintBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_PrintBy" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_labreport_print->PrintBy->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_PrintBy" class="form-group view_labreport_print_PrintBy">
<input type="text" data-table="view_labreport_print" data-field="x_PrintBy" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->PrintBy->EditValue ?>"<?php echo $view_labreport_print->PrintBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_PrintBy" class="view_labreport_print_PrintBy">
<span<?php echo $view_labreport_print->PrintBy->viewAttributes() ?>>
<?php echo $view_labreport_print->PrintBy->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_PrintBy" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_labreport_print->PrintBy->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_PrintBy" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_labreport_print->PrintBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_PrintBy" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_labreport_print->PrintBy->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_PrintBy" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_labreport_print->PrintBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate"<?php echo $view_labreport_print->PrintDate->cellAttributes() ?>>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_PrintDate" class="form-group view_labreport_print_PrintDate">
<input type="text" data-table="view_labreport_print" data-field="x_PrintDate" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($view_labreport_print->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->PrintDate->EditValue ?>"<?php echo $view_labreport_print->PrintDate->editAttributes() ?>>
<?php if (!$view_labreport_print->PrintDate->ReadOnly && !$view_labreport_print->PrintDate->Disabled && !isset($view_labreport_print->PrintDate->EditAttrs["readonly"]) && !isset($view_labreport_print->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_labreport_printgrid", "x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_PrintDate" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_labreport_print->PrintDate->OldValue) ?>">
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_PrintDate" class="form-group view_labreport_print_PrintDate">
<input type="text" data-table="view_labreport_print" data-field="x_PrintDate" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($view_labreport_print->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->PrintDate->EditValue ?>"<?php echo $view_labreport_print->PrintDate->editAttributes() ?>>
<?php if (!$view_labreport_print->PrintDate->ReadOnly && !$view_labreport_print->PrintDate->Disabled && !isset($view_labreport_print->PrintDate->EditAttrs["readonly"]) && !isset($view_labreport_print->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_labreport_printgrid", "x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_labreport_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_labreport_print_grid->RowCnt ?>_view_labreport_print_PrintDate" class="view_labreport_print_PrintDate">
<span<?php echo $view_labreport_print->PrintDate->viewAttributes() ?>>
<?php echo $view_labreport_print->PrintDate->getViewValue() ?></span>
</span>
<?php if (!$view_labreport_print->isConfirm()) { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_PrintDate" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_labreport_print->PrintDate->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_PrintDate" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_labreport_print->PrintDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_PrintDate" name="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" id="fview_labreport_printgrid$x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_labreport_print->PrintDate->FormValue) ?>">
<input type="hidden" data-table="view_labreport_print" data-field="x_PrintDate" name="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" id="fview_labreport_printgrid$o<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_labreport_print->PrintDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_labreport_print_grid->ListOptions->render("body", "right", $view_labreport_print_grid->RowCnt);
?>
	</tr>
<?php if ($view_labreport_print->RowType == ROWTYPE_ADD || $view_labreport_print->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_labreport_printgrid.updateLists(<?php echo $view_labreport_print_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_labreport_print->isGridAdd() || $view_labreport_print->CurrentMode == "copy")
		if (!$view_labreport_print_grid->Recordset->EOF)
			$view_labreport_print_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_labreport_print->CurrentMode == "add" || $view_labreport_print->CurrentMode == "copy" || $view_labreport_print->CurrentMode == "edit") {
		$view_labreport_print_grid->RowIndex = '$rowindex$';
		$view_labreport_print_grid->loadRowValues();

		// Set row properties
		$view_labreport_print->resetAttributes();
		$view_labreport_print->RowAttrs = array_merge($view_labreport_print->RowAttrs, array('data-rowindex'=>$view_labreport_print_grid->RowIndex, 'id'=>'r0_view_labreport_print', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_labreport_print->RowAttrs["class"], "ew-template");
		$view_labreport_print->RowType = ROWTYPE_ADD;

		// Render row
		$view_labreport_print_grid->renderRow();

		// Render list options
		$view_labreport_print_grid->renderListOptions();
		$view_labreport_print_grid->StartRowCnt = 0;
?>
	<tr<?php echo $view_labreport_print->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_labreport_print_grid->ListOptions->render("body", "left", $view_labreport_print_grid->RowIndex);
?>
	<?php if ($view_labreport_print->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_id" class="form-group view_labreport_print_id">
<span<?php echo $view_labreport_print->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_id" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_id" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_labreport_print->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_id" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_id" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_labreport_print->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_PatID" class="form-group view_labreport_print_PatID">
<input type="text" data-table="view_labreport_print" data-field="x_PatID" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->PatID->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->PatID->EditValue ?>"<?php echo $view_labreport_print->PatID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_PatID" class="form-group view_labreport_print_PatID">
<span<?php echo $view_labreport_print->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_PatID" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_labreport_print->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_PatID" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_labreport_print->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_PatientName" class="form-group view_labreport_print_PatientName">
<input type="text" data-table="view_labreport_print" data-field="x_PatientName" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->PatientName->EditValue ?>"<?php echo $view_labreport_print->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_PatientName" class="form-group view_labreport_print_PatientName">
<span<?php echo $view_labreport_print->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_PatientName" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_labreport_print->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_PatientName" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_labreport_print->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_Age" class="form-group view_labreport_print_Age">
<input type="text" data-table="view_labreport_print" data-field="x_Age" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Age" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Age->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Age->EditValue ?>"<?php echo $view_labreport_print->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_Age" class="form-group view_labreport_print_Age">
<span<?php echo $view_labreport_print->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->Age->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Age" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Age" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_labreport_print->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Age" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Age" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_labreport_print->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_Gender" class="form-group view_labreport_print_Gender">
<input type="text" data-table="view_labreport_print" data-field="x_Gender" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Gender->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Gender->EditValue ?>"<?php echo $view_labreport_print->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_Gender" class="form-group view_labreport_print_Gender">
<span<?php echo $view_labreport_print->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->Gender->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Gender" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_labreport_print->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Gender" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_labreport_print->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->sid->Visible) { // sid ?>
		<td data-name="sid">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_sid" class="form-group view_labreport_print_sid">
<input type="text" data-table="view_labreport_print" data-field="x_sid" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_sid" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->sid->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->sid->EditValue ?>"<?php echo $view_labreport_print->sid->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_sid" class="form-group view_labreport_print_sid">
<span<?php echo $view_labreport_print->sid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->sid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_sid" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_sid" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_labreport_print->sid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_sid" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_sid" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_labreport_print->sid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_ItemCode" class="form-group view_labreport_print_ItemCode">
<input type="text" data-table="view_labreport_print" data-field="x_ItemCode" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->ItemCode->EditValue ?>"<?php echo $view_labreport_print->ItemCode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_ItemCode" class="form-group view_labreport_print_ItemCode">
<span<?php echo $view_labreport_print->ItemCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->ItemCode->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_ItemCode" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_labreport_print->ItemCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_ItemCode" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_labreport_print->ItemCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_DEptCd" class="form-group view_labreport_print_DEptCd">
<input type="text" data-table="view_labreport_print" data-field="x_DEptCd" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->DEptCd->EditValue ?>"<?php echo $view_labreport_print->DEptCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_DEptCd" class="form-group view_labreport_print_DEptCd">
<span<?php echo $view_labreport_print->DEptCd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->DEptCd->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_DEptCd" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_labreport_print->DEptCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_DEptCd" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_labreport_print->DEptCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_Resulted" class="form-group view_labreport_print_Resulted">
<input type="text" data-table="view_labreport_print" data-field="x_Resulted" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Resulted->EditValue ?>"<?php echo $view_labreport_print->Resulted->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_Resulted" class="form-group view_labreport_print_Resulted">
<span<?php echo $view_labreport_print->Resulted->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->Resulted->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Resulted" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_labreport_print->Resulted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Resulted" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_labreport_print->Resulted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Services->Visible) { // Services ?>
		<td data-name="Services">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_Services" class="form-group view_labreport_print_Services">
<input type="text" data-table="view_labreport_print" data-field="x_Services" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Services" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_labreport_print->Services->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Services->EditValue ?>"<?php echo $view_labreport_print->Services->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_Services" class="form-group view_labreport_print_Services">
<span<?php echo $view_labreport_print->Services->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->Services->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Services" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Services" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_labreport_print->Services->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Services" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Services" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_labreport_print->Services->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_Pic1" class="form-group view_labreport_print_Pic1">
<input type="text" data-table="view_labreport_print" data-field="x_Pic1" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Pic1->EditValue ?>"<?php echo $view_labreport_print->Pic1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_Pic1" class="form-group view_labreport_print_Pic1">
<span<?php echo $view_labreport_print->Pic1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->Pic1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Pic1" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_labreport_print->Pic1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Pic1" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_labreport_print->Pic1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_Pic2" class="form-group view_labreport_print_Pic2">
<input type="text" data-table="view_labreport_print" data-field="x_Pic2" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Pic2->EditValue ?>"<?php echo $view_labreport_print->Pic2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_Pic2" class="form-group view_labreport_print_Pic2">
<span<?php echo $view_labreport_print->Pic2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->Pic2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Pic2" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_labreport_print->Pic2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Pic2" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_labreport_print->Pic2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_TestUnit" class="form-group view_labreport_print_TestUnit">
<input type="text" data-table="view_labreport_print" data-field="x_TestUnit" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->TestUnit->EditValue ?>"<?php echo $view_labreport_print->TestUnit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_TestUnit" class="form-group view_labreport_print_TestUnit">
<span<?php echo $view_labreport_print->TestUnit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->TestUnit->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_TestUnit" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_labreport_print->TestUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_TestUnit" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_labreport_print->TestUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Order->Visible) { // Order ?>
		<td data-name="Order">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_Order" class="form-group view_labreport_print_Order">
<input type="text" data-table="view_labreport_print" data-field="x_Order" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Order" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->Order->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Order->EditValue ?>"<?php echo $view_labreport_print->Order->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_Order" class="form-group view_labreport_print_Order">
<span<?php echo $view_labreport_print->Order->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->Order->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Order" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Order" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_labreport_print->Order->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Order" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Order" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_labreport_print->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_Repeated" class="form-group view_labreport_print_Repeated">
<input type="text" data-table="view_labreport_print" data-field="x_Repeated" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Repeated->EditValue ?>"<?php echo $view_labreport_print->Repeated->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_Repeated" class="form-group view_labreport_print_Repeated">
<span<?php echo $view_labreport_print->Repeated->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->Repeated->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Repeated" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_labreport_print->Repeated->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Repeated" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_labreport_print->Repeated->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Vid->Visible) { // Vid ?>
		<td data-name="Vid">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<?php if ($view_labreport_print->Vid->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_labreport_print_Vid" class="form-group view_labreport_print_Vid">
<span<?php echo $view_labreport_print->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_labreport_print->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_Vid" class="form-group view_labreport_print_Vid">
<input type="text" data-table="view_labreport_print" data-field="x_Vid" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->Vid->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Vid->EditValue ?>"<?php echo $view_labreport_print->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_Vid" class="form-group view_labreport_print_Vid">
<span<?php echo $view_labreport_print->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Vid" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_labreport_print->Vid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Vid" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_labreport_print->Vid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_invoiceId" class="form-group view_labreport_print_invoiceId">
<input type="text" data-table="view_labreport_print" data-field="x_invoiceId" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->invoiceId->EditValue ?>"<?php echo $view_labreport_print->invoiceId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_invoiceId" class="form-group view_labreport_print_invoiceId">
<span<?php echo $view_labreport_print->invoiceId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->invoiceId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_invoiceId" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_labreport_print->invoiceId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_invoiceId" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_labreport_print->invoiceId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->DrID->Visible) { // DrID ?>
		<td data-name="DrID">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_DrID" class="form-group view_labreport_print_DrID">
<input type="text" data-table="view_labreport_print" data-field="x_DrID" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->DrID->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->DrID->EditValue ?>"<?php echo $view_labreport_print->DrID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_DrID" class="form-group view_labreport_print_DrID">
<span<?php echo $view_labreport_print->DrID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->DrID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_DrID" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_labreport_print->DrID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_DrID" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_labreport_print->DrID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_DrCODE" class="form-group view_labreport_print_DrCODE">
<input type="text" data-table="view_labreport_print" data-field="x_DrCODE" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->DrCODE->EditValue ?>"<?php echo $view_labreport_print->DrCODE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_DrCODE" class="form-group view_labreport_print_DrCODE">
<span<?php echo $view_labreport_print->DrCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->DrCODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_DrCODE" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_labreport_print->DrCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_DrCODE" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_labreport_print->DrCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->DrName->Visible) { // DrName ?>
		<td data-name="DrName">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_DrName" class="form-group view_labreport_print_DrName">
<input type="text" data-table="view_labreport_print" data-field="x_DrName" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->DrName->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->DrName->EditValue ?>"<?php echo $view_labreport_print->DrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_DrName" class="form-group view_labreport_print_DrName">
<span<?php echo $view_labreport_print->DrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->DrName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_DrName" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_labreport_print->DrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_DrName" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_labreport_print->DrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Department->Visible) { // Department ?>
		<td data-name="Department">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_Department" class="form-group view_labreport_print_Department">
<input type="text" data-table="view_labreport_print" data-field="x_Department" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Department" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Department->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Department->EditValue ?>"<?php echo $view_labreport_print->Department->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_Department" class="form-group view_labreport_print_Department">
<span<?php echo $view_labreport_print->Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->Department->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Department" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Department" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_labreport_print->Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Department" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Department" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_labreport_print->Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_createddatetime" class="form-group view_labreport_print_createddatetime">
<input type="text" data-table="view_labreport_print" data-field="x_createddatetime" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_labreport_print->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->createddatetime->EditValue ?>"<?php echo $view_labreport_print->createddatetime->editAttributes() ?>>
<?php if (!$view_labreport_print->createddatetime->ReadOnly && !$view_labreport_print->createddatetime->Disabled && !isset($view_labreport_print->createddatetime->EditAttrs["readonly"]) && !isset($view_labreport_print->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_labreport_printgrid", "x<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_createddatetime" class="form-group view_labreport_print_createddatetime">
<span<?php echo $view_labreport_print->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_createddatetime" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_labreport_print->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_createddatetime" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_labreport_print->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_status" class="form-group view_labreport_print_status">
<input type="text" data-table="view_labreport_print" data-field="x_status" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_status" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_labreport_print->status->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->status->EditValue ?>"<?php echo $view_labreport_print->status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_status" class="form-group view_labreport_print_status">
<span<?php echo $view_labreport_print->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_status" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_status" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_labreport_print->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_status" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_status" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_labreport_print->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_TestType" class="form-group view_labreport_print_TestType">
<input type="text" data-table="view_labreport_print" data-field="x_TestType" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->TestType->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->TestType->EditValue ?>"<?php echo $view_labreport_print->TestType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_TestType" class="form-group view_labreport_print_TestType">
<span<?php echo $view_labreport_print->TestType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->TestType->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_TestType" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_labreport_print->TestType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_TestType" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_labreport_print->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_ResultDate" class="form-group view_labreport_print_ResultDate">
<input type="text" data-table="view_labreport_print" data-field="x_ResultDate" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($view_labreport_print->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->ResultDate->EditValue ?>"<?php echo $view_labreport_print->ResultDate->editAttributes() ?>>
<?php if (!$view_labreport_print->ResultDate->ReadOnly && !$view_labreport_print->ResultDate->Disabled && !isset($view_labreport_print->ResultDate->EditAttrs["readonly"]) && !isset($view_labreport_print->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_labreport_printgrid", "x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_ResultDate" class="form-group view_labreport_print_ResultDate">
<span<?php echo $view_labreport_print->ResultDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->ResultDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_ResultDate" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_labreport_print->ResultDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_ResultDate" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_labreport_print->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_ResultedBy" class="form-group view_labreport_print_ResultedBy">
<input type="text" data-table="view_labreport_print" data-field="x_ResultedBy" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->ResultedBy->EditValue ?>"<?php echo $view_labreport_print->ResultedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_ResultedBy" class="form-group view_labreport_print_ResultedBy">
<span<?php echo $view_labreport_print->ResultedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->ResultedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_ResultedBy" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_labreport_print->ResultedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_ResultedBy" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_labreport_print->ResultedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Printed->Visible) { // Printed ?>
		<td data-name="Printed">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_Printed" class="form-group view_labreport_print_Printed">
<input type="text" data-table="view_labreport_print" data-field="x_Printed" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->Printed->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->Printed->EditValue ?>"<?php echo $view_labreport_print->Printed->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_Printed" class="form-group view_labreport_print_Printed">
<span<?php echo $view_labreport_print->Printed->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->Printed->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_Printed" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_labreport_print->Printed->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_Printed" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_labreport_print->Printed->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_PrintBy" class="form-group view_labreport_print_PrintBy">
<input type="text" data-table="view_labreport_print" data-field="x_PrintBy" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_labreport_print->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->PrintBy->EditValue ?>"<?php echo $view_labreport_print->PrintBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_PrintBy" class="form-group view_labreport_print_PrintBy">
<span<?php echo $view_labreport_print->PrintBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->PrintBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_PrintBy" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_labreport_print->PrintBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_PrintBy" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_labreport_print->PrintBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_labreport_print->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate">
<?php if (!$view_labreport_print->isConfirm()) { ?>
<span id="el$rowindex$_view_labreport_print_PrintDate" class="form-group view_labreport_print_PrintDate">
<input type="text" data-table="view_labreport_print" data-field="x_PrintDate" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($view_labreport_print->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_labreport_print->PrintDate->EditValue ?>"<?php echo $view_labreport_print->PrintDate->editAttributes() ?>>
<?php if (!$view_labreport_print->PrintDate->ReadOnly && !$view_labreport_print->PrintDate->Disabled && !isset($view_labreport_print->PrintDate->EditAttrs["readonly"]) && !isset($view_labreport_print->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_labreport_printgrid", "x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_labreport_print_PrintDate" class="form-group view_labreport_print_PrintDate">
<span<?php echo $view_labreport_print->PrintDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_labreport_print->PrintDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_labreport_print" data-field="x_PrintDate" name="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" id="x<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_labreport_print->PrintDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_labreport_print" data-field="x_PrintDate" name="o<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" id="o<?php echo $view_labreport_print_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_labreport_print->PrintDate->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_labreport_print_grid->ListOptions->render("body", "right", $view_labreport_print_grid->RowIndex);
?>
<script>
fview_labreport_printgrid.updateLists(<?php echo $view_labreport_print_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($view_labreport_print->CurrentMode == "add" || $view_labreport_print->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_labreport_print_grid->FormKeyCountName ?>" id="<?php echo $view_labreport_print_grid->FormKeyCountName ?>" value="<?php echo $view_labreport_print_grid->KeyCount ?>">
<?php echo $view_labreport_print_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_labreport_print->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_labreport_print_grid->FormKeyCountName ?>" id="<?php echo $view_labreport_print_grid->FormKeyCountName ?>" value="<?php echo $view_labreport_print_grid->KeyCount ?>">
<?php echo $view_labreport_print_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_labreport_print->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_labreport_printgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($view_labreport_print_grid->Recordset)
	$view_labreport_print_grid->Recordset->Close();
?>
</div>
<?php if ($view_labreport_print_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_labreport_print_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_labreport_print_grid->TotalRecs == 0 && !$view_labreport_print->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_labreport_print_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_labreport_print_grid->terminate();
?>