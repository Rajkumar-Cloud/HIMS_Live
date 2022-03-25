<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_investigations_grid))
	$patient_investigations_grid = new patient_investigations_grid();

// Run the page
$patient_investigations_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_investigations_grid->Page_Render();
?>
<?php if (!$patient_investigations_grid->isExport()) { ?>
<script>
var fpatient_investigationsgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpatient_investigationsgrid = new ew.Form("fpatient_investigationsgrid", "grid");
	fpatient_investigationsgrid.formKeyCountName = '<?php echo $patient_investigations_grid->FormKeyCountName ?>';

	// Validate form
	fpatient_investigationsgrid.validate = function() {
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
			<?php if ($patient_investigations_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->id->caption(), $patient_investigations_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_grid->Investigation->Required) { ?>
				elm = this.getElements("x" + infix + "_Investigation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->Investigation->caption(), $patient_investigations_grid->Investigation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_grid->Value->Required) { ?>
				elm = this.getElements("x" + infix + "_Value");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->Value->caption(), $patient_investigations_grid->Value->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_grid->NormalRange->Required) { ?>
				elm = this.getElements("x" + infix + "_NormalRange");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->NormalRange->caption(), $patient_investigations_grid->NormalRange->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_grid->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->mrnno->caption(), $patient_investigations_grid->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_grid->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->Age->caption(), $patient_investigations_grid->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_grid->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->Gender->caption(), $patient_investigations_grid->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_grid->SampleCollected->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleCollected");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->SampleCollected->caption(), $patient_investigations_grid->SampleCollected->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SampleCollected");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_grid->SampleCollected->errorMessage()) ?>");
			<?php if ($patient_investigations_grid->SampleCollectedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleCollectedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->SampleCollectedBy->caption(), $patient_investigations_grid->SampleCollectedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_grid->ResultedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->ResultedDate->caption(), $patient_investigations_grid->ResultedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_grid->ResultedDate->errorMessage()) ?>");
			<?php if ($patient_investigations_grid->ResultedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->ResultedBy->caption(), $patient_investigations_grid->ResultedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_grid->Modified->Required) { ?>
				elm = this.getElements("x" + infix + "_Modified");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->Modified->caption(), $patient_investigations_grid->Modified->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Modified");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_grid->Modified->errorMessage()) ?>");
			<?php if ($patient_investigations_grid->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->ModifiedBy->caption(), $patient_investigations_grid->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_grid->Created->Required) { ?>
				elm = this.getElements("x" + infix + "_Created");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->Created->caption(), $patient_investigations_grid->Created->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Created");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_grid->Created->errorMessage()) ?>");
			<?php if ($patient_investigations_grid->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->CreatedBy->caption(), $patient_investigations_grid->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_grid->GroupHead->Required) { ?>
				elm = this.getElements("x" + infix + "_GroupHead");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->GroupHead->caption(), $patient_investigations_grid->GroupHead->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_grid->Cost->Required) { ?>
				elm = this.getElements("x" + infix + "_Cost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->Cost->caption(), $patient_investigations_grid->Cost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Cost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_grid->Cost->errorMessage()) ?>");
			<?php if ($patient_investigations_grid->PaymentStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_PaymentStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->PaymentStatus->caption(), $patient_investigations_grid->PaymentStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_grid->PayMode->Required) { ?>
				elm = this.getElements("x" + infix + "_PayMode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->PayMode->caption(), $patient_investigations_grid->PayMode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_grid->VoucherNo->Required) { ?>
				elm = this.getElements("x" + infix + "_VoucherNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_grid->VoucherNo->caption(), $patient_investigations_grid->VoucherNo->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fpatient_investigationsgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Investigation", false)) return false;
		if (ew.valueChanged(fobj, infix, "Value", false)) return false;
		if (ew.valueChanged(fobj, infix, "NormalRange", false)) return false;
		if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
		if (ew.valueChanged(fobj, infix, "Age", false)) return false;
		if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
		if (ew.valueChanged(fobj, infix, "SampleCollected", false)) return false;
		if (ew.valueChanged(fobj, infix, "SampleCollectedBy", false)) return false;
		if (ew.valueChanged(fobj, infix, "ResultedDate", false)) return false;
		if (ew.valueChanged(fobj, infix, "ResultedBy", false)) return false;
		if (ew.valueChanged(fobj, infix, "Modified", false)) return false;
		if (ew.valueChanged(fobj, infix, "ModifiedBy", false)) return false;
		if (ew.valueChanged(fobj, infix, "Created", false)) return false;
		if (ew.valueChanged(fobj, infix, "CreatedBy", false)) return false;
		if (ew.valueChanged(fobj, infix, "GroupHead", false)) return false;
		if (ew.valueChanged(fobj, infix, "Cost", false)) return false;
		if (ew.valueChanged(fobj, infix, "PaymentStatus", false)) return false;
		if (ew.valueChanged(fobj, infix, "PayMode", false)) return false;
		if (ew.valueChanged(fobj, infix, "VoucherNo", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpatient_investigationsgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_investigationsgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpatient_investigationsgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$patient_investigations_grid->renderOtherOptions();
?>
<?php if ($patient_investigations_grid->TotalRecords > 0 || $patient_investigations->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_investigations_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_investigations">
<?php if ($patient_investigations_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_investigations_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_investigationsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_investigations" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_investigationsgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_investigations->RowType = ROWTYPE_HEADER;

// Render list options
$patient_investigations_grid->renderListOptions();

// Render list options (header, left)
$patient_investigations_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_investigations_grid->id->Visible) { // id ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_investigations_grid->id->headerCellClass() ?>"><div id="elh_patient_investigations_id" class="patient_investigations_id"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_investigations_grid->id->headerCellClass() ?>"><div><div id="elh_patient_investigations_id" class="patient_investigations_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->Investigation->Visible) { // Investigation ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->Investigation) == "") { ?>
		<th data-name="Investigation" class="<?php echo $patient_investigations_grid->Investigation->headerCellClass() ?>"><div id="elh_patient_investigations_Investigation" class="patient_investigations_Investigation"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->Investigation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Investigation" class="<?php echo $patient_investigations_grid->Investigation->headerCellClass() ?>"><div><div id="elh_patient_investigations_Investigation" class="patient_investigations_Investigation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->Investigation->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->Investigation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->Investigation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->Value->Visible) { // Value ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->Value) == "") { ?>
		<th data-name="Value" class="<?php echo $patient_investigations_grid->Value->headerCellClass() ?>"><div id="elh_patient_investigations_Value" class="patient_investigations_Value"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->Value->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Value" class="<?php echo $patient_investigations_grid->Value->headerCellClass() ?>"><div><div id="elh_patient_investigations_Value" class="patient_investigations_Value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->Value->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->Value->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->Value->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->NormalRange->Visible) { // NormalRange ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->NormalRange) == "") { ?>
		<th data-name="NormalRange" class="<?php echo $patient_investigations_grid->NormalRange->headerCellClass() ?>"><div id="elh_patient_investigations_NormalRange" class="patient_investigations_NormalRange"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->NormalRange->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NormalRange" class="<?php echo $patient_investigations_grid->NormalRange->headerCellClass() ?>"><div><div id="elh_patient_investigations_NormalRange" class="patient_investigations_NormalRange">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->NormalRange->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->NormalRange->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->NormalRange->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_investigations_grid->mrnno->headerCellClass() ?>"><div id="elh_patient_investigations_mrnno" class="patient_investigations_mrnno"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_investigations_grid->mrnno->headerCellClass() ?>"><div><div id="elh_patient_investigations_mrnno" class="patient_investigations_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->Age->Visible) { // Age ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_investigations_grid->Age->headerCellClass() ?>"><div id="elh_patient_investigations_Age" class="patient_investigations_Age"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_investigations_grid->Age->headerCellClass() ?>"><div><div id="elh_patient_investigations_Age" class="patient_investigations_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->Gender->Visible) { // Gender ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_investigations_grid->Gender->headerCellClass() ?>"><div id="elh_patient_investigations_Gender" class="patient_investigations_Gender"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_investigations_grid->Gender->headerCellClass() ?>"><div><div id="elh_patient_investigations_Gender" class="patient_investigations_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->SampleCollected->Visible) { // SampleCollected ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->SampleCollected) == "") { ?>
		<th data-name="SampleCollected" class="<?php echo $patient_investigations_grid->SampleCollected->headerCellClass() ?>"><div id="elh_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->SampleCollected->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleCollected" class="<?php echo $patient_investigations_grid->SampleCollected->headerCellClass() ?>"><div><div id="elh_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->SampleCollected->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->SampleCollected->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->SampleCollected->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->SampleCollectedBy) == "") { ?>
		<th data-name="SampleCollectedBy" class="<?php echo $patient_investigations_grid->SampleCollectedBy->headerCellClass() ?>"><div id="elh_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->SampleCollectedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleCollectedBy" class="<?php echo $patient_investigations_grid->SampleCollectedBy->headerCellClass() ?>"><div><div id="elh_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->SampleCollectedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->SampleCollectedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->SampleCollectedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->ResultedDate->Visible) { // ResultedDate ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->ResultedDate) == "") { ?>
		<th data-name="ResultedDate" class="<?php echo $patient_investigations_grid->ResultedDate->headerCellClass() ?>"><div id="elh_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->ResultedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedDate" class="<?php echo $patient_investigations_grid->ResultedDate->headerCellClass() ?>"><div><div id="elh_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->ResultedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->ResultedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->ResultedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $patient_investigations_grid->ResultedBy->headerCellClass() ?>"><div id="elh_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $patient_investigations_grid->ResultedBy->headerCellClass() ?>"><div><div id="elh_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->ResultedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->ResultedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->Modified->Visible) { // Modified ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->Modified) == "") { ?>
		<th data-name="Modified" class="<?php echo $patient_investigations_grid->Modified->headerCellClass() ?>"><div id="elh_patient_investigations_Modified" class="patient_investigations_Modified"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->Modified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Modified" class="<?php echo $patient_investigations_grid->Modified->headerCellClass() ?>"><div><div id="elh_patient_investigations_Modified" class="patient_investigations_Modified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->Modified->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->Modified->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->Modified->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $patient_investigations_grid->ModifiedBy->headerCellClass() ?>"><div id="elh_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->ModifiedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $patient_investigations_grid->ModifiedBy->headerCellClass() ?>"><div><div id="elh_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->ModifiedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->ModifiedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->ModifiedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->Created->Visible) { // Created ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->Created) == "") { ?>
		<th data-name="Created" class="<?php echo $patient_investigations_grid->Created->headerCellClass() ?>"><div id="elh_patient_investigations_Created" class="patient_investigations_Created"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->Created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Created" class="<?php echo $patient_investigations_grid->Created->headerCellClass() ?>"><div><div id="elh_patient_investigations_Created" class="patient_investigations_Created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->Created->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->Created->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->Created->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $patient_investigations_grid->CreatedBy->headerCellClass() ?>"><div id="elh_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->CreatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $patient_investigations_grid->CreatedBy->headerCellClass() ?>"><div><div id="elh_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->CreatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->CreatedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->CreatedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->GroupHead->Visible) { // GroupHead ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->GroupHead) == "") { ?>
		<th data-name="GroupHead" class="<?php echo $patient_investigations_grid->GroupHead->headerCellClass() ?>"><div id="elh_patient_investigations_GroupHead" class="patient_investigations_GroupHead"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->GroupHead->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GroupHead" class="<?php echo $patient_investigations_grid->GroupHead->headerCellClass() ?>"><div><div id="elh_patient_investigations_GroupHead" class="patient_investigations_GroupHead">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->GroupHead->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->GroupHead->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->GroupHead->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->Cost->Visible) { // Cost ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->Cost) == "") { ?>
		<th data-name="Cost" class="<?php echo $patient_investigations_grid->Cost->headerCellClass() ?>"><div id="elh_patient_investigations_Cost" class="patient_investigations_Cost"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->Cost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cost" class="<?php echo $patient_investigations_grid->Cost->headerCellClass() ?>"><div><div id="elh_patient_investigations_Cost" class="patient_investigations_Cost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->Cost->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->Cost->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->Cost->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $patient_investigations_grid->PaymentStatus->headerCellClass() ?>"><div id="elh_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $patient_investigations_grid->PaymentStatus->headerCellClass() ?>"><div><div id="elh_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->PaymentStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->PaymentStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->PayMode->Visible) { // PayMode ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->PayMode) == "") { ?>
		<th data-name="PayMode" class="<?php echo $patient_investigations_grid->PayMode->headerCellClass() ?>"><div id="elh_patient_investigations_PayMode" class="patient_investigations_PayMode"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->PayMode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PayMode" class="<?php echo $patient_investigations_grid->PayMode->headerCellClass() ?>"><div><div id="elh_patient_investigations_PayMode" class="patient_investigations_PayMode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->PayMode->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->PayMode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->PayMode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_grid->VoucherNo->Visible) { // VoucherNo ?>
	<?php if ($patient_investigations_grid->SortUrl($patient_investigations_grid->VoucherNo) == "") { ?>
		<th data-name="VoucherNo" class="<?php echo $patient_investigations_grid->VoucherNo->headerCellClass() ?>"><div id="elh_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo"><div class="ew-table-header-caption"><?php echo $patient_investigations_grid->VoucherNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VoucherNo" class="<?php echo $patient_investigations_grid->VoucherNo->headerCellClass() ?>"><div><div id="elh_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_grid->VoucherNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_grid->VoucherNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_grid->VoucherNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_investigations_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_investigations_grid->StartRecord = 1;
$patient_investigations_grid->StopRecord = $patient_investigations_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($patient_investigations->isConfirm() || $patient_investigations_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_investigations_grid->FormKeyCountName) && ($patient_investigations_grid->isGridAdd() || $patient_investigations_grid->isGridEdit() || $patient_investigations->isConfirm())) {
		$patient_investigations_grid->KeyCount = $CurrentForm->getValue($patient_investigations_grid->FormKeyCountName);
		$patient_investigations_grid->StopRecord = $patient_investigations_grid->StartRecord + $patient_investigations_grid->KeyCount - 1;
	}
}
$patient_investigations_grid->RecordCount = $patient_investigations_grid->StartRecord - 1;
if ($patient_investigations_grid->Recordset && !$patient_investigations_grid->Recordset->EOF) {
	$patient_investigations_grid->Recordset->moveFirst();
	$selectLimit = $patient_investigations_grid->UseSelectLimit;
	if (!$selectLimit && $patient_investigations_grid->StartRecord > 1)
		$patient_investigations_grid->Recordset->move($patient_investigations_grid->StartRecord - 1);
} elseif (!$patient_investigations->AllowAddDeleteRow && $patient_investigations_grid->StopRecord == 0) {
	$patient_investigations_grid->StopRecord = $patient_investigations->GridAddRowCount;
}

// Initialize aggregate
$patient_investigations->RowType = ROWTYPE_AGGREGATEINIT;
$patient_investigations->resetAttributes();
$patient_investigations_grid->renderRow();
if ($patient_investigations_grid->isGridAdd())
	$patient_investigations_grid->RowIndex = 0;
if ($patient_investigations_grid->isGridEdit())
	$patient_investigations_grid->RowIndex = 0;
while ($patient_investigations_grid->RecordCount < $patient_investigations_grid->StopRecord) {
	$patient_investigations_grid->RecordCount++;
	if ($patient_investigations_grid->RecordCount >= $patient_investigations_grid->StartRecord) {
		$patient_investigations_grid->RowCount++;
		if ($patient_investigations_grid->isGridAdd() || $patient_investigations_grid->isGridEdit() || $patient_investigations->isConfirm()) {
			$patient_investigations_grid->RowIndex++;
			$CurrentForm->Index = $patient_investigations_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_investigations_grid->FormActionName) && ($patient_investigations->isConfirm() || $patient_investigations_grid->EventCancelled))
				$patient_investigations_grid->RowAction = strval($CurrentForm->getValue($patient_investigations_grid->FormActionName));
			elseif ($patient_investigations_grid->isGridAdd())
				$patient_investigations_grid->RowAction = "insert";
			else
				$patient_investigations_grid->RowAction = "";
		}

		// Set up key count
		$patient_investigations_grid->KeyCount = $patient_investigations_grid->RowIndex;

		// Init row class and style
		$patient_investigations->resetAttributes();
		$patient_investigations->CssClass = "";
		if ($patient_investigations_grid->isGridAdd()) {
			if ($patient_investigations->CurrentMode == "copy") {
				$patient_investigations_grid->loadRowValues($patient_investigations_grid->Recordset); // Load row values
				$patient_investigations_grid->setRecordKey($patient_investigations_grid->RowOldKey, $patient_investigations_grid->Recordset); // Set old record key
			} else {
				$patient_investigations_grid->loadRowValues(); // Load default values
				$patient_investigations_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_investigations_grid->loadRowValues($patient_investigations_grid->Recordset); // Load row values
		}
		$patient_investigations->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_investigations_grid->isGridAdd()) // Grid add
			$patient_investigations->RowType = ROWTYPE_ADD; // Render add
		if ($patient_investigations_grid->isGridAdd() && $patient_investigations->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_investigations_grid->restoreCurrentRowFormValues($patient_investigations_grid->RowIndex); // Restore form values
		if ($patient_investigations_grid->isGridEdit()) { // Grid edit
			if ($patient_investigations->EventCancelled)
				$patient_investigations_grid->restoreCurrentRowFormValues($patient_investigations_grid->RowIndex); // Restore form values
			if ($patient_investigations_grid->RowAction == "insert")
				$patient_investigations->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_investigations->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_investigations_grid->isGridEdit() && ($patient_investigations->RowType == ROWTYPE_EDIT || $patient_investigations->RowType == ROWTYPE_ADD) && $patient_investigations->EventCancelled) // Update failed
			$patient_investigations_grid->restoreCurrentRowFormValues($patient_investigations_grid->RowIndex); // Restore form values
		if ($patient_investigations->RowType == ROWTYPE_EDIT) // Edit row
			$patient_investigations_grid->EditRowCount++;
		if ($patient_investigations->isConfirm()) // Confirm row
			$patient_investigations_grid->restoreCurrentRowFormValues($patient_investigations_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_investigations->RowAttrs->merge(["data-rowindex" => $patient_investigations_grid->RowCount, "id" => "r" . $patient_investigations_grid->RowCount . "_patient_investigations", "data-rowtype" => $patient_investigations->RowType]);

		// Render row
		$patient_investigations_grid->renderRow();

		// Render list options
		$patient_investigations_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_investigations_grid->RowAction != "delete" && $patient_investigations_grid->RowAction != "insertdelete" && !($patient_investigations_grid->RowAction == "insert" && $patient_investigations->isConfirm() && $patient_investigations_grid->emptyRow())) {
?>
	<tr <?php echo $patient_investigations->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_investigations_grid->ListOptions->render("body", "left", $patient_investigations_grid->RowCount);
?>
	<?php if ($patient_investigations_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_investigations_grid->id->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_id" class="form-group"></span>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="o<?php echo $patient_investigations_grid->RowIndex ?>_id" id="o<?php echo $patient_investigations_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_id" class="form-group">
<span<?php echo $patient_investigations_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="x<?php echo $patient_investigations_grid->RowIndex ?>_id" id="x<?php echo $patient_investigations_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_id">
<span<?php echo $patient_investigations_grid->id->viewAttributes() ?>><?php echo $patient_investigations_grid->id->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="x<?php echo $patient_investigations_grid->RowIndex ?>_id" id="x<?php echo $patient_investigations_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="o<?php echo $patient_investigations_grid->RowIndex ?>_id" id="o<?php echo $patient_investigations_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_id" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_id" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->Investigation->Visible) { // Investigation ?>
		<td data-name="Investigation" <?php echo $patient_investigations_grid->Investigation->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Investigation" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Investigation" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Investigation->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Investigation->EditValue ?>"<?php echo $patient_investigations_grid->Investigation->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" value="<?php echo HtmlEncode($patient_investigations_grid->Investigation->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Investigation" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Investigation" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Investigation->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Investigation->EditValue ?>"<?php echo $patient_investigations_grid->Investigation->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Investigation">
<span<?php echo $patient_investigations_grid->Investigation->viewAttributes() ?>><?php echo $patient_investigations_grid->Investigation->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" value="<?php echo HtmlEncode($patient_investigations_grid->Investigation->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" value="<?php echo HtmlEncode($patient_investigations_grid->Investigation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" value="<?php echo HtmlEncode($patient_investigations_grid->Investigation->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" value="<?php echo HtmlEncode($patient_investigations_grid->Investigation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->Value->Visible) { // Value ?>
		<td data-name="Value" <?php echo $patient_investigations_grid->Value->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Value" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Value" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Value->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Value->EditValue ?>"<?php echo $patient_investigations_grid->Value->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($patient_investigations_grid->Value->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Value" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Value" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Value->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Value->EditValue ?>"<?php echo $patient_investigations_grid->Value->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Value">
<span<?php echo $patient_investigations_grid->Value->viewAttributes() ?>><?php echo $patient_investigations_grid->Value->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($patient_investigations_grid->Value->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Value" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($patient_investigations_grid->Value->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($patient_investigations_grid->Value->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Value" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($patient_investigations_grid->Value->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->NormalRange->Visible) { // NormalRange ?>
		<td data-name="NormalRange" <?php echo $patient_investigations_grid->NormalRange->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_NormalRange" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_NormalRange" name="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->NormalRange->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->NormalRange->EditValue ?>"<?php echo $patient_investigations_grid->NormalRange->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" name="o<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="o<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($patient_investigations_grid->NormalRange->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_NormalRange" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_NormalRange" name="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->NormalRange->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->NormalRange->EditValue ?>"<?php echo $patient_investigations_grid->NormalRange->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_NormalRange">
<span<?php echo $patient_investigations_grid->NormalRange->viewAttributes() ?>><?php echo $patient_investigations_grid->NormalRange->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" name="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($patient_investigations_grid->NormalRange->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" name="o<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="o<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($patient_investigations_grid->NormalRange->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($patient_investigations_grid->NormalRange->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($patient_investigations_grid->NormalRange->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_investigations_grid->mrnno->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_investigations_grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_mrnno" class="form-group">
<span<?php echo $patient_investigations_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_mrnno" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_mrnno" name="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->mrnno->EditValue ?>"<?php echo $patient_investigations_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="o<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_mrnno" class="form-group">
<span<?php echo $patient_investigations_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->mrnno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations_grid->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_mrnno">
<span<?php echo $patient_investigations_grid->mrnno->viewAttributes() ?>><?php echo $patient_investigations_grid->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="o<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations_grid->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $patient_investigations_grid->Age->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Age" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Age" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Age->EditValue ?>"<?php echo $patient_investigations_grid->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_investigations_grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Age" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Age" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Age->EditValue ?>"<?php echo $patient_investigations_grid->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Age">
<span<?php echo $patient_investigations_grid->Age->viewAttributes() ?>><?php echo $patient_investigations_grid->Age->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_investigations_grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Age" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_investigations_grid->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_investigations_grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Age" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_investigations_grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_investigations_grid->Gender->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Gender" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Gender" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Gender->EditValue ?>"<?php echo $patient_investigations_grid->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_investigations_grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Gender" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Gender" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Gender->EditValue ?>"<?php echo $patient_investigations_grid->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Gender">
<span<?php echo $patient_investigations_grid->Gender->viewAttributes() ?>><?php echo $patient_investigations_grid->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_investigations_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_investigations_grid->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_investigations_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_investigations_grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->SampleCollected->Visible) { // SampleCollected ?>
		<td data-name="SampleCollected" <?php echo $patient_investigations_grid->SampleCollected->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_SampleCollected" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" placeholder="<?php echo HtmlEncode($patient_investigations_grid->SampleCollected->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->SampleCollected->EditValue ?>"<?php echo $patient_investigations_grid->SampleCollected->editAttributes() ?>>
<?php if (!$patient_investigations_grid->SampleCollected->ReadOnly && !$patient_investigations_grid->SampleCollected->Disabled && !isset($patient_investigations_grid->SampleCollected->EditAttrs["readonly"]) && !isset($patient_investigations_grid->SampleCollected->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" name="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" value="<?php echo HtmlEncode($patient_investigations_grid->SampleCollected->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_SampleCollected" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" placeholder="<?php echo HtmlEncode($patient_investigations_grid->SampleCollected->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->SampleCollected->EditValue ?>"<?php echo $patient_investigations_grid->SampleCollected->editAttributes() ?>>
<?php if (!$patient_investigations_grid->SampleCollected->ReadOnly && !$patient_investigations_grid->SampleCollected->Disabled && !isset($patient_investigations_grid->SampleCollected->EditAttrs["readonly"]) && !isset($patient_investigations_grid->SampleCollected->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_SampleCollected">
<span<?php echo $patient_investigations_grid->SampleCollected->viewAttributes() ?>><?php echo $patient_investigations_grid->SampleCollected->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" value="<?php echo HtmlEncode($patient_investigations_grid->SampleCollected->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" name="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" value="<?php echo HtmlEncode($patient_investigations_grid->SampleCollected->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" value="<?php echo HtmlEncode($patient_investigations_grid->SampleCollected->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" value="<?php echo HtmlEncode($patient_investigations_grid->SampleCollected->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
		<td data-name="SampleCollectedBy" <?php echo $patient_investigations_grid->SampleCollectedBy->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_SampleCollectedBy" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->SampleCollectedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->SampleCollectedBy->EditValue ?>"<?php echo $patient_investigations_grid->SampleCollectedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" value="<?php echo HtmlEncode($patient_investigations_grid->SampleCollectedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_SampleCollectedBy" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->SampleCollectedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->SampleCollectedBy->EditValue ?>"<?php echo $patient_investigations_grid->SampleCollectedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_SampleCollectedBy">
<span<?php echo $patient_investigations_grid->SampleCollectedBy->viewAttributes() ?>><?php echo $patient_investigations_grid->SampleCollectedBy->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" value="<?php echo HtmlEncode($patient_investigations_grid->SampleCollectedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" value="<?php echo HtmlEncode($patient_investigations_grid->SampleCollectedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" value="<?php echo HtmlEncode($patient_investigations_grid->SampleCollectedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" value="<?php echo HtmlEncode($patient_investigations_grid->SampleCollectedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->ResultedDate->Visible) { // ResultedDate ?>
		<td data-name="ResultedDate" <?php echo $patient_investigations_grid->ResultedDate->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_ResultedDate" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" placeholder="<?php echo HtmlEncode($patient_investigations_grid->ResultedDate->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->ResultedDate->EditValue ?>"<?php echo $patient_investigations_grid->ResultedDate->editAttributes() ?>>
<?php if (!$patient_investigations_grid->ResultedDate->ReadOnly && !$patient_investigations_grid->ResultedDate->Disabled && !isset($patient_investigations_grid->ResultedDate->EditAttrs["readonly"]) && !isset($patient_investigations_grid->ResultedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" value="<?php echo HtmlEncode($patient_investigations_grid->ResultedDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_ResultedDate" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" placeholder="<?php echo HtmlEncode($patient_investigations_grid->ResultedDate->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->ResultedDate->EditValue ?>"<?php echo $patient_investigations_grid->ResultedDate->editAttributes() ?>>
<?php if (!$patient_investigations_grid->ResultedDate->ReadOnly && !$patient_investigations_grid->ResultedDate->Disabled && !isset($patient_investigations_grid->ResultedDate->EditAttrs["readonly"]) && !isset($patient_investigations_grid->ResultedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_ResultedDate">
<span<?php echo $patient_investigations_grid->ResultedDate->viewAttributes() ?>><?php echo $patient_investigations_grid->ResultedDate->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" value="<?php echo HtmlEncode($patient_investigations_grid->ResultedDate->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" value="<?php echo HtmlEncode($patient_investigations_grid->ResultedDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" value="<?php echo HtmlEncode($patient_investigations_grid->ResultedDate->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" value="<?php echo HtmlEncode($patient_investigations_grid->ResultedDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy" <?php echo $patient_investigations_grid->ResultedBy->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_ResultedBy" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->ResultedBy->EditValue ?>"<?php echo $patient_investigations_grid->ResultedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_investigations_grid->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_ResultedBy" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->ResultedBy->EditValue ?>"<?php echo $patient_investigations_grid->ResultedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_ResultedBy">
<span<?php echo $patient_investigations_grid->ResultedBy->viewAttributes() ?>><?php echo $patient_investigations_grid->ResultedBy->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_investigations_grid->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_investigations_grid->ResultedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_investigations_grid->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_investigations_grid->ResultedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->Modified->Visible) { // Modified ?>
		<td data-name="Modified" <?php echo $patient_investigations_grid->Modified->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Modified" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Modified" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Modified->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Modified->EditValue ?>"<?php echo $patient_investigations_grid->Modified->editAttributes() ?>>
<?php if (!$patient_investigations_grid->Modified->ReadOnly && !$patient_investigations_grid->Modified->Disabled && !isset($patient_investigations_grid->Modified->EditAttrs["readonly"]) && !isset($patient_investigations_grid->Modified->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($patient_investigations_grid->Modified->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Modified" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Modified" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Modified->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Modified->EditValue ?>"<?php echo $patient_investigations_grid->Modified->editAttributes() ?>>
<?php if (!$patient_investigations_grid->Modified->ReadOnly && !$patient_investigations_grid->Modified->Disabled && !isset($patient_investigations_grid->Modified->EditAttrs["readonly"]) && !isset($patient_investigations_grid->Modified->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Modified">
<span<?php echo $patient_investigations_grid->Modified->viewAttributes() ?>><?php echo $patient_investigations_grid->Modified->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($patient_investigations_grid->Modified->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($patient_investigations_grid->Modified->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($patient_investigations_grid->Modified->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($patient_investigations_grid->Modified->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy" <?php echo $patient_investigations_grid->ModifiedBy->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_ModifiedBy" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->ModifiedBy->EditValue ?>"<?php echo $patient_investigations_grid->ModifiedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_investigations_grid->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_ModifiedBy" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->ModifiedBy->EditValue ?>"<?php echo $patient_investigations_grid->ModifiedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_ModifiedBy">
<span<?php echo $patient_investigations_grid->ModifiedBy->viewAttributes() ?>><?php echo $patient_investigations_grid->ModifiedBy->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_investigations_grid->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_investigations_grid->ModifiedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_investigations_grid->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_investigations_grid->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->Created->Visible) { // Created ?>
		<td data-name="Created" <?php echo $patient_investigations_grid->Created->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Created" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Created" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Created->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Created->EditValue ?>"<?php echo $patient_investigations_grid->Created->editAttributes() ?>>
<?php if (!$patient_investigations_grid->Created->ReadOnly && !$patient_investigations_grid->Created->Disabled && !isset($patient_investigations_grid->Created->EditAttrs["readonly"]) && !isset($patient_investigations_grid->Created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($patient_investigations_grid->Created->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Created" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Created" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Created->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Created->EditValue ?>"<?php echo $patient_investigations_grid->Created->editAttributes() ?>>
<?php if (!$patient_investigations_grid->Created->ReadOnly && !$patient_investigations_grid->Created->Disabled && !isset($patient_investigations_grid->Created->EditAttrs["readonly"]) && !isset($patient_investigations_grid->Created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Created">
<span<?php echo $patient_investigations_grid->Created->viewAttributes() ?>><?php echo $patient_investigations_grid->Created->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($patient_investigations_grid->Created->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Created" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($patient_investigations_grid->Created->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($patient_investigations_grid->Created->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Created" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($patient_investigations_grid->Created->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy" <?php echo $patient_investigations_grid->CreatedBy->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_CreatedBy" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->CreatedBy->EditValue ?>"<?php echo $patient_investigations_grid->CreatedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_investigations_grid->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_CreatedBy" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->CreatedBy->EditValue ?>"<?php echo $patient_investigations_grid->CreatedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_CreatedBy">
<span<?php echo $patient_investigations_grid->CreatedBy->viewAttributes() ?>><?php echo $patient_investigations_grid->CreatedBy->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_investigations_grid->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_investigations_grid->CreatedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_investigations_grid->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_investigations_grid->CreatedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->GroupHead->Visible) { // GroupHead ?>
		<td data-name="GroupHead" <?php echo $patient_investigations_grid->GroupHead->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_GroupHead" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_GroupHead" name="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($patient_investigations_grid->GroupHead->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->GroupHead->EditValue ?>"<?php echo $patient_investigations_grid->GroupHead->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" name="o<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="o<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" value="<?php echo HtmlEncode($patient_investigations_grid->GroupHead->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_GroupHead" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_GroupHead" name="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($patient_investigations_grid->GroupHead->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->GroupHead->EditValue ?>"<?php echo $patient_investigations_grid->GroupHead->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_GroupHead">
<span<?php echo $patient_investigations_grid->GroupHead->viewAttributes() ?>><?php echo $patient_investigations_grid->GroupHead->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" name="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" value="<?php echo HtmlEncode($patient_investigations_grid->GroupHead->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" name="o<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="o<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" value="<?php echo HtmlEncode($patient_investigations_grid->GroupHead->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" value="<?php echo HtmlEncode($patient_investigations_grid->GroupHead->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" value="<?php echo HtmlEncode($patient_investigations_grid->GroupHead->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->Cost->Visible) { // Cost ?>
		<td data-name="Cost" <?php echo $patient_investigations_grid->Cost->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Cost" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Cost" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" size="30" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Cost->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Cost->EditValue ?>"<?php echo $patient_investigations_grid->Cost->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Cost" value="<?php echo HtmlEncode($patient_investigations_grid->Cost->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Cost" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Cost" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" size="30" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Cost->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Cost->EditValue ?>"<?php echo $patient_investigations_grid->Cost->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_Cost">
<span<?php echo $patient_investigations_grid->Cost->viewAttributes() ?>><?php echo $patient_investigations_grid->Cost->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" value="<?php echo HtmlEncode($patient_investigations_grid->Cost->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Cost" value="<?php echo HtmlEncode($patient_investigations_grid->Cost->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" value="<?php echo HtmlEncode($patient_investigations_grid->Cost->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Cost" value="<?php echo HtmlEncode($patient_investigations_grid->Cost->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus" <?php echo $patient_investigations_grid->PaymentStatus->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_PaymentStatus" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->PaymentStatus->EditValue ?>"<?php echo $patient_investigations_grid->PaymentStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" name="o<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="o<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($patient_investigations_grid->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_PaymentStatus" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->PaymentStatus->EditValue ?>"<?php echo $patient_investigations_grid->PaymentStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_PaymentStatus">
<span<?php echo $patient_investigations_grid->PaymentStatus->viewAttributes() ?>><?php echo $patient_investigations_grid->PaymentStatus->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($patient_investigations_grid->PaymentStatus->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" name="o<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="o<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($patient_investigations_grid->PaymentStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($patient_investigations_grid->PaymentStatus->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($patient_investigations_grid->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->PayMode->Visible) { // PayMode ?>
		<td data-name="PayMode" <?php echo $patient_investigations_grid->PayMode->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_PayMode" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_PayMode" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->PayMode->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->PayMode->EditValue ?>"<?php echo $patient_investigations_grid->PayMode->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" name="o<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="o<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" value="<?php echo HtmlEncode($patient_investigations_grid->PayMode->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_PayMode" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_PayMode" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->PayMode->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->PayMode->EditValue ?>"<?php echo $patient_investigations_grid->PayMode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_PayMode">
<span<?php echo $patient_investigations_grid->PayMode->viewAttributes() ?>><?php echo $patient_investigations_grid->PayMode->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" value="<?php echo HtmlEncode($patient_investigations_grid->PayMode->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" name="o<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="o<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" value="<?php echo HtmlEncode($patient_investigations_grid->PayMode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" value="<?php echo HtmlEncode($patient_investigations_grid->PayMode->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" value="<?php echo HtmlEncode($patient_investigations_grid->PayMode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->VoucherNo->Visible) { // VoucherNo ?>
		<td data-name="VoucherNo" <?php echo $patient_investigations_grid->VoucherNo->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_VoucherNo" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->VoucherNo->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->VoucherNo->EditValue ?>"<?php echo $patient_investigations_grid->VoucherNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" name="o<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="o<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" value="<?php echo HtmlEncode($patient_investigations_grid->VoucherNo->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_VoucherNo" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->VoucherNo->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->VoucherNo->EditValue ?>"<?php echo $patient_investigations_grid->VoucherNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCount ?>_patient_investigations_VoucherNo">
<span<?php echo $patient_investigations_grid->VoucherNo->viewAttributes() ?>><?php echo $patient_investigations_grid->VoucherNo->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" value="<?php echo HtmlEncode($patient_investigations_grid->VoucherNo->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" name="o<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="o<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" value="<?php echo HtmlEncode($patient_investigations_grid->VoucherNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" value="<?php echo HtmlEncode($patient_investigations_grid->VoucherNo->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" value="<?php echo HtmlEncode($patient_investigations_grid->VoucherNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_investigations_grid->ListOptions->render("body", "right", $patient_investigations_grid->RowCount);
?>
	</tr>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD || $patient_investigations->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "load"], function() {
	fpatient_investigationsgrid.updateLists(<?php echo $patient_investigations_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_investigations_grid->isGridAdd() || $patient_investigations->CurrentMode == "copy")
		if (!$patient_investigations_grid->Recordset->EOF)
			$patient_investigations_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_investigations->CurrentMode == "add" || $patient_investigations->CurrentMode == "copy" || $patient_investigations->CurrentMode == "edit") {
		$patient_investigations_grid->RowIndex = '$rowindex$';
		$patient_investigations_grid->loadRowValues();

		// Set row properties
		$patient_investigations->resetAttributes();
		$patient_investigations->RowAttrs->merge(["data-rowindex" => $patient_investigations_grid->RowIndex, "id" => "r0_patient_investigations", "data-rowtype" => ROWTYPE_ADD]);
		$patient_investigations->RowAttrs->appendClass("ew-template");
		$patient_investigations->RowType = ROWTYPE_ADD;

		// Render row
		$patient_investigations_grid->renderRow();

		// Render list options
		$patient_investigations_grid->renderListOptions();
		$patient_investigations_grid->StartRowCount = 0;
?>
	<tr <?php echo $patient_investigations->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_investigations_grid->ListOptions->render("body", "left", $patient_investigations_grid->RowIndex);
?>
	<?php if ($patient_investigations_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_id" class="form-group patient_investigations_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_id" class="form-group patient_investigations_id">
<span<?php echo $patient_investigations_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="x<?php echo $patient_investigations_grid->RowIndex ?>_id" id="x<?php echo $patient_investigations_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="o<?php echo $patient_investigations_grid->RowIndex ?>_id" id="o<?php echo $patient_investigations_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->Investigation->Visible) { // Investigation ?>
		<td data-name="Investigation">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Investigation" class="form-group patient_investigations_Investigation">
<input type="text" data-table="patient_investigations" data-field="x_Investigation" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Investigation->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Investigation->EditValue ?>"<?php echo $patient_investigations_grid->Investigation->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Investigation" class="form-group patient_investigations_Investigation">
<span<?php echo $patient_investigations_grid->Investigation->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->Investigation->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" value="<?php echo HtmlEncode($patient_investigations_grid->Investigation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" value="<?php echo HtmlEncode($patient_investigations_grid->Investigation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->Value->Visible) { // Value ?>
		<td data-name="Value">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Value" class="form-group patient_investigations_Value">
<input type="text" data-table="patient_investigations" data-field="x_Value" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Value->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Value->EditValue ?>"<?php echo $patient_investigations_grid->Value->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Value" class="form-group patient_investigations_Value">
<span<?php echo $patient_investigations_grid->Value->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->Value->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($patient_investigations_grid->Value->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($patient_investigations_grid->Value->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->NormalRange->Visible) { // NormalRange ?>
		<td data-name="NormalRange">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_NormalRange" class="form-group patient_investigations_NormalRange">
<input type="text" data-table="patient_investigations" data-field="x_NormalRange" name="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->NormalRange->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->NormalRange->EditValue ?>"<?php echo $patient_investigations_grid->NormalRange->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_NormalRange" class="form-group patient_investigations_NormalRange">
<span<?php echo $patient_investigations_grid->NormalRange->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->NormalRange->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" name="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($patient_investigations_grid->NormalRange->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" name="o<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="o<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($patient_investigations_grid->NormalRange->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_investigations->isConfirm()) { ?>
<?php if ($patient_investigations_grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_investigations_mrnno" class="form-group patient_investigations_mrnno">
<span<?php echo $patient_investigations_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_mrnno" class="form-group patient_investigations_mrnno">
<input type="text" data-table="patient_investigations" data-field="x_mrnno" name="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->mrnno->EditValue ?>"<?php echo $patient_investigations_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_mrnno" class="form-group patient_investigations_mrnno">
<span<?php echo $patient_investigations_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations_grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="o<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations_grid->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Age" class="form-group patient_investigations_Age">
<input type="text" data-table="patient_investigations" data-field="x_Age" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Age->EditValue ?>"<?php echo $patient_investigations_grid->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Age" class="form-group patient_investigations_Age">
<span<?php echo $patient_investigations_grid->Age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->Age->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_investigations_grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_investigations_grid->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Gender" class="form-group patient_investigations_Gender">
<input type="text" data-table="patient_investigations" data-field="x_Gender" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Gender->EditValue ?>"<?php echo $patient_investigations_grid->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Gender" class="form-group patient_investigations_Gender">
<span<?php echo $patient_investigations_grid->Gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->Gender->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_investigations_grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_investigations_grid->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->SampleCollected->Visible) { // SampleCollected ?>
		<td data-name="SampleCollected">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_SampleCollected" class="form-group patient_investigations_SampleCollected">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" placeholder="<?php echo HtmlEncode($patient_investigations_grid->SampleCollected->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->SampleCollected->EditValue ?>"<?php echo $patient_investigations_grid->SampleCollected->editAttributes() ?>>
<?php if (!$patient_investigations_grid->SampleCollected->ReadOnly && !$patient_investigations_grid->SampleCollected->Disabled && !isset($patient_investigations_grid->SampleCollected->EditAttrs["readonly"]) && !isset($patient_investigations_grid->SampleCollected->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_SampleCollected" class="form-group patient_investigations_SampleCollected">
<span<?php echo $patient_investigations_grid->SampleCollected->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->SampleCollected->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" value="<?php echo HtmlEncode($patient_investigations_grid->SampleCollected->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" name="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" value="<?php echo HtmlEncode($patient_investigations_grid->SampleCollected->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
		<td data-name="SampleCollectedBy">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_SampleCollectedBy" class="form-group patient_investigations_SampleCollectedBy">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->SampleCollectedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->SampleCollectedBy->EditValue ?>"<?php echo $patient_investigations_grid->SampleCollectedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_SampleCollectedBy" class="form-group patient_investigations_SampleCollectedBy">
<span<?php echo $patient_investigations_grid->SampleCollectedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->SampleCollectedBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" value="<?php echo HtmlEncode($patient_investigations_grid->SampleCollectedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" value="<?php echo HtmlEncode($patient_investigations_grid->SampleCollectedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->ResultedDate->Visible) { // ResultedDate ?>
		<td data-name="ResultedDate">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_ResultedDate" class="form-group patient_investigations_ResultedDate">
<input type="text" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" placeholder="<?php echo HtmlEncode($patient_investigations_grid->ResultedDate->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->ResultedDate->EditValue ?>"<?php echo $patient_investigations_grid->ResultedDate->editAttributes() ?>>
<?php if (!$patient_investigations_grid->ResultedDate->ReadOnly && !$patient_investigations_grid->ResultedDate->Disabled && !isset($patient_investigations_grid->ResultedDate->EditAttrs["readonly"]) && !isset($patient_investigations_grid->ResultedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_ResultedDate" class="form-group patient_investigations_ResultedDate">
<span<?php echo $patient_investigations_grid->ResultedDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->ResultedDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" value="<?php echo HtmlEncode($patient_investigations_grid->ResultedDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" value="<?php echo HtmlEncode($patient_investigations_grid->ResultedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_ResultedBy" class="form-group patient_investigations_ResultedBy">
<input type="text" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->ResultedBy->EditValue ?>"<?php echo $patient_investigations_grid->ResultedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_ResultedBy" class="form-group patient_investigations_ResultedBy">
<span<?php echo $patient_investigations_grid->ResultedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->ResultedBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_investigations_grid->ResultedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_investigations_grid->ResultedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->Modified->Visible) { // Modified ?>
		<td data-name="Modified">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Modified" class="form-group patient_investigations_Modified">
<input type="text" data-table="patient_investigations" data-field="x_Modified" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Modified->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Modified->EditValue ?>"<?php echo $patient_investigations_grid->Modified->editAttributes() ?>>
<?php if (!$patient_investigations_grid->Modified->ReadOnly && !$patient_investigations_grid->Modified->Disabled && !isset($patient_investigations_grid->Modified->EditAttrs["readonly"]) && !isset($patient_investigations_grid->Modified->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Modified" class="form-group patient_investigations_Modified">
<span<?php echo $patient_investigations_grid->Modified->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->Modified->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($patient_investigations_grid->Modified->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($patient_investigations_grid->Modified->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_ModifiedBy" class="form-group patient_investigations_ModifiedBy">
<input type="text" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->ModifiedBy->EditValue ?>"<?php echo $patient_investigations_grid->ModifiedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_ModifiedBy" class="form-group patient_investigations_ModifiedBy">
<span<?php echo $patient_investigations_grid->ModifiedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->ModifiedBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_investigations_grid->ModifiedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_investigations_grid->ModifiedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->Created->Visible) { // Created ?>
		<td data-name="Created">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Created" class="form-group patient_investigations_Created">
<input type="text" data-table="patient_investigations" data-field="x_Created" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Created->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Created->EditValue ?>"<?php echo $patient_investigations_grid->Created->editAttributes() ?>>
<?php if (!$patient_investigations_grid->Created->ReadOnly && !$patient_investigations_grid->Created->Disabled && !isset($patient_investigations_grid->Created->EditAttrs["readonly"]) && !isset($patient_investigations_grid->Created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Created" class="form-group patient_investigations_Created">
<span<?php echo $patient_investigations_grid->Created->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->Created->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($patient_investigations_grid->Created->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($patient_investigations_grid->Created->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_CreatedBy" class="form-group patient_investigations_CreatedBy">
<input type="text" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->CreatedBy->EditValue ?>"<?php echo $patient_investigations_grid->CreatedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_CreatedBy" class="form-group patient_investigations_CreatedBy">
<span<?php echo $patient_investigations_grid->CreatedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->CreatedBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_investigations_grid->CreatedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_investigations_grid->CreatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->GroupHead->Visible) { // GroupHead ?>
		<td data-name="GroupHead">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_GroupHead" class="form-group patient_investigations_GroupHead">
<input type="text" data-table="patient_investigations" data-field="x_GroupHead" name="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($patient_investigations_grid->GroupHead->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->GroupHead->EditValue ?>"<?php echo $patient_investigations_grid->GroupHead->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_GroupHead" class="form-group patient_investigations_GroupHead">
<span<?php echo $patient_investigations_grid->GroupHead->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->GroupHead->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" name="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" value="<?php echo HtmlEncode($patient_investigations_grid->GroupHead->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" name="o<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="o<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" value="<?php echo HtmlEncode($patient_investigations_grid->GroupHead->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->Cost->Visible) { // Cost ?>
		<td data-name="Cost">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Cost" class="form-group patient_investigations_Cost">
<input type="text" data-table="patient_investigations" data-field="x_Cost" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" size="30" placeholder="<?php echo HtmlEncode($patient_investigations_grid->Cost->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->Cost->EditValue ?>"<?php echo $patient_investigations_grid->Cost->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Cost" class="form-group patient_investigations_Cost">
<span<?php echo $patient_investigations_grid->Cost->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->Cost->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" value="<?php echo HtmlEncode($patient_investigations_grid->Cost->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Cost" value="<?php echo HtmlEncode($patient_investigations_grid->Cost->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_PaymentStatus" class="form-group patient_investigations_PaymentStatus">
<input type="text" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->PaymentStatus->EditValue ?>"<?php echo $patient_investigations_grid->PaymentStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_PaymentStatus" class="form-group patient_investigations_PaymentStatus">
<span<?php echo $patient_investigations_grid->PaymentStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->PaymentStatus->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($patient_investigations_grid->PaymentStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" name="o<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="o<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($patient_investigations_grid->PaymentStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->PayMode->Visible) { // PayMode ?>
		<td data-name="PayMode">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_PayMode" class="form-group patient_investigations_PayMode">
<input type="text" data-table="patient_investigations" data-field="x_PayMode" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->PayMode->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->PayMode->EditValue ?>"<?php echo $patient_investigations_grid->PayMode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_PayMode" class="form-group patient_investigations_PayMode">
<span<?php echo $patient_investigations_grid->PayMode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->PayMode->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" value="<?php echo HtmlEncode($patient_investigations_grid->PayMode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" name="o<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="o<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" value="<?php echo HtmlEncode($patient_investigations_grid->PayMode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations_grid->VoucherNo->Visible) { // VoucherNo ?>
		<td data-name="VoucherNo">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_VoucherNo" class="form-group patient_investigations_VoucherNo">
<input type="text" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_grid->VoucherNo->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_grid->VoucherNo->EditValue ?>"<?php echo $patient_investigations_grid->VoucherNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_VoucherNo" class="form-group patient_investigations_VoucherNo">
<span<?php echo $patient_investigations_grid->VoucherNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_grid->VoucherNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" value="<?php echo HtmlEncode($patient_investigations_grid->VoucherNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" name="o<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="o<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" value="<?php echo HtmlEncode($patient_investigations_grid->VoucherNo->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_investigations_grid->ListOptions->render("body", "right", $patient_investigations_grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "load"], function() {
	fpatient_investigationsgrid.updateLists(<?php echo $patient_investigations_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($patient_investigations->CurrentMode == "add" || $patient_investigations->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_investigations_grid->FormKeyCountName ?>" id="<?php echo $patient_investigations_grid->FormKeyCountName ?>" value="<?php echo $patient_investigations_grid->KeyCount ?>">
<?php echo $patient_investigations_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_investigations->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_investigations_grid->FormKeyCountName ?>" id="<?php echo $patient_investigations_grid->FormKeyCountName ?>" value="<?php echo $patient_investigations_grid->KeyCount ?>">
<?php echo $patient_investigations_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_investigations->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_investigationsgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_investigations_grid->Recordset)
	$patient_investigations_grid->Recordset->Close();
?>
<?php if ($patient_investigations_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_investigations_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_investigations_grid->TotalRecords == 0 && !$patient_investigations->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_investigations_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$patient_investigations_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_investigations->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_investigations",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$patient_investigations_grid->terminate();
?>