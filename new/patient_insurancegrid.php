<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_insurance_grid))
	$patient_insurance_grid = new patient_insurance_grid();

// Run the page
$patient_insurance_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_insurance_grid->Page_Render();
?>
<?php if (!$patient_insurance_grid->isExport()) { ?>
<script>
var fpatient_insurancegrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpatient_insurancegrid = new ew.Form("fpatient_insurancegrid", "grid");
	fpatient_insurancegrid.formKeyCountName = '<?php echo $patient_insurance_grid->FormKeyCountName ?>';

	// Validate form
	fpatient_insurancegrid.validate = function() {
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
			<?php if ($patient_insurance_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->id->caption(), $patient_insurance_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->Reception->caption(), $patient_insurance_grid->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->PatientId->caption(), $patient_insurance_grid->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->PatientName->caption(), $patient_insurance_grid->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->Company->Required) { ?>
				elm = this.getElements("x" + infix + "_Company");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->Company->caption(), $patient_insurance_grid->Company->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->AddressInsuranceCarierName->Required) { ?>
				elm = this.getElements("x" + infix + "_AddressInsuranceCarierName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->AddressInsuranceCarierName->caption(), $patient_insurance_grid->AddressInsuranceCarierName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->ContactName->Required) { ?>
				elm = this.getElements("x" + infix + "_ContactName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->ContactName->caption(), $patient_insurance_grid->ContactName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->ContactMobile->Required) { ?>
				elm = this.getElements("x" + infix + "_ContactMobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->ContactMobile->caption(), $patient_insurance_grid->ContactMobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->PolicyType->Required) { ?>
				elm = this.getElements("x" + infix + "_PolicyType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->PolicyType->caption(), $patient_insurance_grid->PolicyType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->PolicyName->Required) { ?>
				elm = this.getElements("x" + infix + "_PolicyName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->PolicyName->caption(), $patient_insurance_grid->PolicyName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->PolicyNo->Required) { ?>
				elm = this.getElements("x" + infix + "_PolicyNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->PolicyNo->caption(), $patient_insurance_grid->PolicyNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->PolicyAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_PolicyAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->PolicyAmount->caption(), $patient_insurance_grid->PolicyAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->RefLetterNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RefLetterNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->RefLetterNo->caption(), $patient_insurance_grid->RefLetterNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->ReferenceBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferenceBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->ReferenceBy->caption(), $patient_insurance_grid->ReferenceBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->ReferenceDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferenceDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->ReferenceDate->caption(), $patient_insurance_grid->ReferenceDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReferenceDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_insurance_grid->ReferenceDate->errorMessage()) ?>");
			<?php if ($patient_insurance_grid->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->createdby->caption(), $patient_insurance_grid->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->createddatetime->caption(), $patient_insurance_grid->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->modifiedby->caption(), $patient_insurance_grid->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->modifieddatetime->caption(), $patient_insurance_grid->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_grid->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_grid->mrnno->caption(), $patient_insurance_grid->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fpatient_insurancegrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
		if (ew.valueChanged(fobj, infix, "Company", false)) return false;
		if (ew.valueChanged(fobj, infix, "AddressInsuranceCarierName", false)) return false;
		if (ew.valueChanged(fobj, infix, "ContactName", false)) return false;
		if (ew.valueChanged(fobj, infix, "ContactMobile", false)) return false;
		if (ew.valueChanged(fobj, infix, "PolicyType", false)) return false;
		if (ew.valueChanged(fobj, infix, "PolicyName", false)) return false;
		if (ew.valueChanged(fobj, infix, "PolicyNo", false)) return false;
		if (ew.valueChanged(fobj, infix, "PolicyAmount", false)) return false;
		if (ew.valueChanged(fobj, infix, "RefLetterNo", false)) return false;
		if (ew.valueChanged(fobj, infix, "ReferenceBy", false)) return false;
		if (ew.valueChanged(fobj, infix, "ReferenceDate", false)) return false;
		if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpatient_insurancegrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_insurancegrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpatient_insurancegrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$patient_insurance_grid->renderOtherOptions();
?>
<?php if ($patient_insurance_grid->TotalRecords > 0 || $patient_insurance->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_insurance_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_insurance">
<?php if ($patient_insurance_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_insurance_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_insurancegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_insurance" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_insurancegrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_insurance->RowType = ROWTYPE_HEADER;

// Render list options
$patient_insurance_grid->renderListOptions();

// Render list options (header, left)
$patient_insurance_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_insurance_grid->id->Visible) { // id ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_insurance_grid->id->headerCellClass() ?>"><div id="elh_patient_insurance_id" class="patient_insurance_id"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_insurance_grid->id->headerCellClass() ?>"><div><div id="elh_patient_insurance_id" class="patient_insurance_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->Reception->Visible) { // Reception ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_insurance_grid->Reception->headerCellClass() ?>"><div id="elh_patient_insurance_Reception" class="patient_insurance_Reception"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_insurance_grid->Reception->headerCellClass() ?>"><div><div id="elh_patient_insurance_Reception" class="patient_insurance_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_insurance_grid->PatientId->headerCellClass() ?>"><div id="elh_patient_insurance_PatientId" class="patient_insurance_PatientId"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_insurance_grid->PatientId->headerCellClass() ?>"><div><div id="elh_patient_insurance_PatientId" class="patient_insurance_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_insurance_grid->PatientName->headerCellClass() ?>"><div id="elh_patient_insurance_PatientName" class="patient_insurance_PatientName"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_insurance_grid->PatientName->headerCellClass() ?>"><div><div id="elh_patient_insurance_PatientName" class="patient_insurance_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->Company->Visible) { // Company ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->Company) == "") { ?>
		<th data-name="Company" class="<?php echo $patient_insurance_grid->Company->headerCellClass() ?>"><div id="elh_patient_insurance_Company" class="patient_insurance_Company"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->Company->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Company" class="<?php echo $patient_insurance_grid->Company->headerCellClass() ?>"><div><div id="elh_patient_insurance_Company" class="patient_insurance_Company">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->Company->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->Company->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->Company->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->AddressInsuranceCarierName) == "") { ?>
		<th data-name="AddressInsuranceCarierName" class="<?php echo $patient_insurance_grid->AddressInsuranceCarierName->headerCellClass() ?>"><div id="elh_patient_insurance_AddressInsuranceCarierName" class="patient_insurance_AddressInsuranceCarierName"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->AddressInsuranceCarierName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AddressInsuranceCarierName" class="<?php echo $patient_insurance_grid->AddressInsuranceCarierName->headerCellClass() ?>"><div><div id="elh_patient_insurance_AddressInsuranceCarierName" class="patient_insurance_AddressInsuranceCarierName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->AddressInsuranceCarierName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->AddressInsuranceCarierName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->AddressInsuranceCarierName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->ContactName->Visible) { // ContactName ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->ContactName) == "") { ?>
		<th data-name="ContactName" class="<?php echo $patient_insurance_grid->ContactName->headerCellClass() ?>"><div id="elh_patient_insurance_ContactName" class="patient_insurance_ContactName"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->ContactName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ContactName" class="<?php echo $patient_insurance_grid->ContactName->headerCellClass() ?>"><div><div id="elh_patient_insurance_ContactName" class="patient_insurance_ContactName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->ContactName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->ContactName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->ContactName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->ContactMobile->Visible) { // ContactMobile ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->ContactMobile) == "") { ?>
		<th data-name="ContactMobile" class="<?php echo $patient_insurance_grid->ContactMobile->headerCellClass() ?>"><div id="elh_patient_insurance_ContactMobile" class="patient_insurance_ContactMobile"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->ContactMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ContactMobile" class="<?php echo $patient_insurance_grid->ContactMobile->headerCellClass() ?>"><div><div id="elh_patient_insurance_ContactMobile" class="patient_insurance_ContactMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->ContactMobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->ContactMobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->ContactMobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->PolicyType->Visible) { // PolicyType ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->PolicyType) == "") { ?>
		<th data-name="PolicyType" class="<?php echo $patient_insurance_grid->PolicyType->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyType" class="patient_insurance_PolicyType"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->PolicyType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PolicyType" class="<?php echo $patient_insurance_grid->PolicyType->headerCellClass() ?>"><div><div id="elh_patient_insurance_PolicyType" class="patient_insurance_PolicyType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->PolicyType->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->PolicyType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->PolicyType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->PolicyName->Visible) { // PolicyName ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->PolicyName) == "") { ?>
		<th data-name="PolicyName" class="<?php echo $patient_insurance_grid->PolicyName->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyName" class="patient_insurance_PolicyName"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->PolicyName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PolicyName" class="<?php echo $patient_insurance_grid->PolicyName->headerCellClass() ?>"><div><div id="elh_patient_insurance_PolicyName" class="patient_insurance_PolicyName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->PolicyName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->PolicyName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->PolicyName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->PolicyNo->Visible) { // PolicyNo ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->PolicyNo) == "") { ?>
		<th data-name="PolicyNo" class="<?php echo $patient_insurance_grid->PolicyNo->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyNo" class="patient_insurance_PolicyNo"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->PolicyNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PolicyNo" class="<?php echo $patient_insurance_grid->PolicyNo->headerCellClass() ?>"><div><div id="elh_patient_insurance_PolicyNo" class="patient_insurance_PolicyNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->PolicyNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->PolicyNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->PolicyNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->PolicyAmount->Visible) { // PolicyAmount ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->PolicyAmount) == "") { ?>
		<th data-name="PolicyAmount" class="<?php echo $patient_insurance_grid->PolicyAmount->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyAmount" class="patient_insurance_PolicyAmount"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->PolicyAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PolicyAmount" class="<?php echo $patient_insurance_grid->PolicyAmount->headerCellClass() ?>"><div><div id="elh_patient_insurance_PolicyAmount" class="patient_insurance_PolicyAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->PolicyAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->PolicyAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->PolicyAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->RefLetterNo->Visible) { // RefLetterNo ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->RefLetterNo) == "") { ?>
		<th data-name="RefLetterNo" class="<?php echo $patient_insurance_grid->RefLetterNo->headerCellClass() ?>"><div id="elh_patient_insurance_RefLetterNo" class="patient_insurance_RefLetterNo"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->RefLetterNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefLetterNo" class="<?php echo $patient_insurance_grid->RefLetterNo->headerCellClass() ?>"><div><div id="elh_patient_insurance_RefLetterNo" class="patient_insurance_RefLetterNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->RefLetterNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->RefLetterNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->RefLetterNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->ReferenceBy->Visible) { // ReferenceBy ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->ReferenceBy) == "") { ?>
		<th data-name="ReferenceBy" class="<?php echo $patient_insurance_grid->ReferenceBy->headerCellClass() ?>"><div id="elh_patient_insurance_ReferenceBy" class="patient_insurance_ReferenceBy"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->ReferenceBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferenceBy" class="<?php echo $patient_insurance_grid->ReferenceBy->headerCellClass() ?>"><div><div id="elh_patient_insurance_ReferenceBy" class="patient_insurance_ReferenceBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->ReferenceBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->ReferenceBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->ReferenceBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->ReferenceDate->Visible) { // ReferenceDate ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->ReferenceDate) == "") { ?>
		<th data-name="ReferenceDate" class="<?php echo $patient_insurance_grid->ReferenceDate->headerCellClass() ?>"><div id="elh_patient_insurance_ReferenceDate" class="patient_insurance_ReferenceDate"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->ReferenceDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferenceDate" class="<?php echo $patient_insurance_grid->ReferenceDate->headerCellClass() ?>"><div><div id="elh_patient_insurance_ReferenceDate" class="patient_insurance_ReferenceDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->ReferenceDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->ReferenceDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->ReferenceDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->createdby->Visible) { // createdby ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_insurance_grid->createdby->headerCellClass() ?>"><div id="elh_patient_insurance_createdby" class="patient_insurance_createdby"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_insurance_grid->createdby->headerCellClass() ?>"><div><div id="elh_patient_insurance_createdby" class="patient_insurance_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_insurance_grid->createddatetime->headerCellClass() ?>"><div id="elh_patient_insurance_createddatetime" class="patient_insurance_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_insurance_grid->createddatetime->headerCellClass() ?>"><div><div id="elh_patient_insurance_createddatetime" class="patient_insurance_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_insurance_grid->modifiedby->headerCellClass() ?>"><div id="elh_patient_insurance_modifiedby" class="patient_insurance_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_insurance_grid->modifiedby->headerCellClass() ?>"><div><div id="elh_patient_insurance_modifiedby" class="patient_insurance_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_insurance_grid->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_insurance_modifieddatetime" class="patient_insurance_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_insurance_grid->modifieddatetime->headerCellClass() ?>"><div><div id="elh_patient_insurance_modifieddatetime" class="patient_insurance_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_grid->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_insurance_grid->SortUrl($patient_insurance_grid->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_insurance_grid->mrnno->headerCellClass() ?>"><div id="elh_patient_insurance_mrnno" class="patient_insurance_mrnno"><div class="ew-table-header-caption"><?php echo $patient_insurance_grid->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_insurance_grid->mrnno->headerCellClass() ?>"><div><div id="elh_patient_insurance_mrnno" class="patient_insurance_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_grid->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_grid->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_grid->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_insurance_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_insurance_grid->StartRecord = 1;
$patient_insurance_grid->StopRecord = $patient_insurance_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($patient_insurance->isConfirm() || $patient_insurance_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_insurance_grid->FormKeyCountName) && ($patient_insurance_grid->isGridAdd() || $patient_insurance_grid->isGridEdit() || $patient_insurance->isConfirm())) {
		$patient_insurance_grid->KeyCount = $CurrentForm->getValue($patient_insurance_grid->FormKeyCountName);
		$patient_insurance_grid->StopRecord = $patient_insurance_grid->StartRecord + $patient_insurance_grid->KeyCount - 1;
	}
}
$patient_insurance_grid->RecordCount = $patient_insurance_grid->StartRecord - 1;
if ($patient_insurance_grid->Recordset && !$patient_insurance_grid->Recordset->EOF) {
	$patient_insurance_grid->Recordset->moveFirst();
	$selectLimit = $patient_insurance_grid->UseSelectLimit;
	if (!$selectLimit && $patient_insurance_grid->StartRecord > 1)
		$patient_insurance_grid->Recordset->move($patient_insurance_grid->StartRecord - 1);
} elseif (!$patient_insurance->AllowAddDeleteRow && $patient_insurance_grid->StopRecord == 0) {
	$patient_insurance_grid->StopRecord = $patient_insurance->GridAddRowCount;
}

// Initialize aggregate
$patient_insurance->RowType = ROWTYPE_AGGREGATEINIT;
$patient_insurance->resetAttributes();
$patient_insurance_grid->renderRow();
if ($patient_insurance_grid->isGridAdd())
	$patient_insurance_grid->RowIndex = 0;
if ($patient_insurance_grid->isGridEdit())
	$patient_insurance_grid->RowIndex = 0;
while ($patient_insurance_grid->RecordCount < $patient_insurance_grid->StopRecord) {
	$patient_insurance_grid->RecordCount++;
	if ($patient_insurance_grid->RecordCount >= $patient_insurance_grid->StartRecord) {
		$patient_insurance_grid->RowCount++;
		if ($patient_insurance_grid->isGridAdd() || $patient_insurance_grid->isGridEdit() || $patient_insurance->isConfirm()) {
			$patient_insurance_grid->RowIndex++;
			$CurrentForm->Index = $patient_insurance_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_insurance_grid->FormActionName) && ($patient_insurance->isConfirm() || $patient_insurance_grid->EventCancelled))
				$patient_insurance_grid->RowAction = strval($CurrentForm->getValue($patient_insurance_grid->FormActionName));
			elseif ($patient_insurance_grid->isGridAdd())
				$patient_insurance_grid->RowAction = "insert";
			else
				$patient_insurance_grid->RowAction = "";
		}

		// Set up key count
		$patient_insurance_grid->KeyCount = $patient_insurance_grid->RowIndex;

		// Init row class and style
		$patient_insurance->resetAttributes();
		$patient_insurance->CssClass = "";
		if ($patient_insurance_grid->isGridAdd()) {
			if ($patient_insurance->CurrentMode == "copy") {
				$patient_insurance_grid->loadRowValues($patient_insurance_grid->Recordset); // Load row values
				$patient_insurance_grid->setRecordKey($patient_insurance_grid->RowOldKey, $patient_insurance_grid->Recordset); // Set old record key
			} else {
				$patient_insurance_grid->loadRowValues(); // Load default values
				$patient_insurance_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_insurance_grid->loadRowValues($patient_insurance_grid->Recordset); // Load row values
		}
		$patient_insurance->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_insurance_grid->isGridAdd()) // Grid add
			$patient_insurance->RowType = ROWTYPE_ADD; // Render add
		if ($patient_insurance_grid->isGridAdd() && $patient_insurance->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_insurance_grid->restoreCurrentRowFormValues($patient_insurance_grid->RowIndex); // Restore form values
		if ($patient_insurance_grid->isGridEdit()) { // Grid edit
			if ($patient_insurance->EventCancelled)
				$patient_insurance_grid->restoreCurrentRowFormValues($patient_insurance_grid->RowIndex); // Restore form values
			if ($patient_insurance_grid->RowAction == "insert")
				$patient_insurance->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_insurance->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_insurance_grid->isGridEdit() && ($patient_insurance->RowType == ROWTYPE_EDIT || $patient_insurance->RowType == ROWTYPE_ADD) && $patient_insurance->EventCancelled) // Update failed
			$patient_insurance_grid->restoreCurrentRowFormValues($patient_insurance_grid->RowIndex); // Restore form values
		if ($patient_insurance->RowType == ROWTYPE_EDIT) // Edit row
			$patient_insurance_grid->EditRowCount++;
		if ($patient_insurance->isConfirm()) // Confirm row
			$patient_insurance_grid->restoreCurrentRowFormValues($patient_insurance_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_insurance->RowAttrs->merge(["data-rowindex" => $patient_insurance_grid->RowCount, "id" => "r" . $patient_insurance_grid->RowCount . "_patient_insurance", "data-rowtype" => $patient_insurance->RowType]);

		// Render row
		$patient_insurance_grid->renderRow();

		// Render list options
		$patient_insurance_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_insurance_grid->RowAction != "delete" && $patient_insurance_grid->RowAction != "insertdelete" && !($patient_insurance_grid->RowAction == "insert" && $patient_insurance->isConfirm() && $patient_insurance_grid->emptyRow())) {
?>
	<tr <?php echo $patient_insurance->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_insurance_grid->ListOptions->render("body", "left", $patient_insurance_grid->RowCount);
?>
	<?php if ($patient_insurance_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_insurance_grid->id->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_id" class="form-group"></span>
<input type="hidden" data-table="patient_insurance" data-field="x_id" name="o<?php echo $patient_insurance_grid->RowIndex ?>_id" id="o<?php echo $patient_insurance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_insurance_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_id" class="form-group">
<span<?php echo $patient_insurance_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_id" name="x<?php echo $patient_insurance_grid->RowIndex ?>_id" id="x<?php echo $patient_insurance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_insurance_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_id">
<span<?php echo $patient_insurance_grid->id->viewAttributes() ?>><?php echo $patient_insurance_grid->id->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_id" name="x<?php echo $patient_insurance_grid->RowIndex ?>_id" id="x<?php echo $patient_insurance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_insurance_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_id" name="o<?php echo $patient_insurance_grid->RowIndex ?>_id" id="o<?php echo $patient_insurance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_insurance_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_id" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_id" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_insurance_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_id" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_id" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_insurance_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_insurance_grid->Reception->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_insurance_grid->Reception->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_Reception" class="form-group">
<span<?php echo $patient_insurance_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_insurance_grid->RowIndex ?>_Reception" name="x<?php echo $patient_insurance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_insurance_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_Reception" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_Reception" name="x<?php echo $patient_insurance_grid->RowIndex ?>_Reception" id="x<?php echo $patient_insurance_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_insurance_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->Reception->EditValue ?>"<?php echo $patient_insurance_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_Reception" name="o<?php echo $patient_insurance_grid->RowIndex ?>_Reception" id="o<?php echo $patient_insurance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_insurance_grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_Reception" class="form-group">
<span<?php echo $patient_insurance_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->Reception->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_Reception" name="x<?php echo $patient_insurance_grid->RowIndex ?>_Reception" id="x<?php echo $patient_insurance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_insurance_grid->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_Reception">
<span<?php echo $patient_insurance_grid->Reception->viewAttributes() ?>><?php echo $patient_insurance_grid->Reception->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_Reception" name="x<?php echo $patient_insurance_grid->RowIndex ?>_Reception" id="x<?php echo $patient_insurance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_insurance_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_Reception" name="o<?php echo $patient_insurance_grid->RowIndex ?>_Reception" id="o<?php echo $patient_insurance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_insurance_grid->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_Reception" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_Reception" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_insurance_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_Reception" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_Reception" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_insurance_grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $patient_insurance_grid->PatientId->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_insurance_grid->PatientId->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PatientId" class="form-group">
<span<?php echo $patient_insurance_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_insurance_grid->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PatientId" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_PatientId" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PatientId->EditValue ?>"<?php echo $patient_insurance_grid->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientId" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_insurance_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PatientId" class="form-group">
<span<?php echo $patient_insurance_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->PatientId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientId" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_insurance_grid->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PatientId">
<span<?php echo $patient_insurance_grid->PatientId->viewAttributes() ?>><?php echo $patient_insurance_grid->PatientId->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientId" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_insurance_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PatientId" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_insurance_grid->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientId" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_insurance_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PatientId" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_insurance_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_insurance_grid->PatientName->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PatientName" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_PatientName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PatientName->EditValue ?>"<?php echo $patient_insurance_grid->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientName" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_insurance_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PatientName" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_PatientName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PatientName->EditValue ?>"<?php echo $patient_insurance_grid->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PatientName">
<span<?php echo $patient_insurance_grid->PatientName->viewAttributes() ?>><?php echo $patient_insurance_grid->PatientName->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_insurance_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PatientName" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_insurance_grid->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientName" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_insurance_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PatientName" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_insurance_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->Company->Visible) { // Company ?>
		<td data-name="Company" <?php echo $patient_insurance_grid->Company->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_Company" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_Company" name="x<?php echo $patient_insurance_grid->RowIndex ?>_Company" id="x<?php echo $patient_insurance_grid->RowIndex ?>_Company" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->Company->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->Company->EditValue ?>"<?php echo $patient_insurance_grid->Company->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_Company" name="o<?php echo $patient_insurance_grid->RowIndex ?>_Company" id="o<?php echo $patient_insurance_grid->RowIndex ?>_Company" value="<?php echo HtmlEncode($patient_insurance_grid->Company->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_Company" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_Company" name="x<?php echo $patient_insurance_grid->RowIndex ?>_Company" id="x<?php echo $patient_insurance_grid->RowIndex ?>_Company" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->Company->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->Company->EditValue ?>"<?php echo $patient_insurance_grid->Company->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_Company">
<span<?php echo $patient_insurance_grid->Company->viewAttributes() ?>><?php echo $patient_insurance_grid->Company->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_Company" name="x<?php echo $patient_insurance_grid->RowIndex ?>_Company" id="x<?php echo $patient_insurance_grid->RowIndex ?>_Company" value="<?php echo HtmlEncode($patient_insurance_grid->Company->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_Company" name="o<?php echo $patient_insurance_grid->RowIndex ?>_Company" id="o<?php echo $patient_insurance_grid->RowIndex ?>_Company" value="<?php echo HtmlEncode($patient_insurance_grid->Company->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_Company" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_Company" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_Company" value="<?php echo HtmlEncode($patient_insurance_grid->Company->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_Company" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_Company" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_Company" value="<?php echo HtmlEncode($patient_insurance_grid->Company->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
		<td data-name="AddressInsuranceCarierName" <?php echo $patient_insurance_grid->AddressInsuranceCarierName->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_AddressInsuranceCarierName" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->AddressInsuranceCarierName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->AddressInsuranceCarierName->EditValue ?>"<?php echo $patient_insurance_grid->AddressInsuranceCarierName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="o<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" id="o<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" value="<?php echo HtmlEncode($patient_insurance_grid->AddressInsuranceCarierName->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_AddressInsuranceCarierName" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->AddressInsuranceCarierName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->AddressInsuranceCarierName->EditValue ?>"<?php echo $patient_insurance_grid->AddressInsuranceCarierName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_AddressInsuranceCarierName">
<span<?php echo $patient_insurance_grid->AddressInsuranceCarierName->viewAttributes() ?>><?php echo $patient_insurance_grid->AddressInsuranceCarierName->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" value="<?php echo HtmlEncode($patient_insurance_grid->AddressInsuranceCarierName->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="o<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" id="o<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" value="<?php echo HtmlEncode($patient_insurance_grid->AddressInsuranceCarierName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" value="<?php echo HtmlEncode($patient_insurance_grid->AddressInsuranceCarierName->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" value="<?php echo HtmlEncode($patient_insurance_grid->AddressInsuranceCarierName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->ContactName->Visible) { // ContactName ?>
		<td data-name="ContactName" <?php echo $patient_insurance_grid->ContactName->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_ContactName" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_ContactName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->ContactName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->ContactName->EditValue ?>"<?php echo $patient_insurance_grid->ContactName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactName" name="o<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" id="o<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" value="<?php echo HtmlEncode($patient_insurance_grid->ContactName->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_ContactName" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_ContactName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->ContactName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->ContactName->EditValue ?>"<?php echo $patient_insurance_grid->ContactName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_ContactName">
<span<?php echo $patient_insurance_grid->ContactName->viewAttributes() ?>><?php echo $patient_insurance_grid->ContactName->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" value="<?php echo HtmlEncode($patient_insurance_grid->ContactName->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_ContactName" name="o<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" id="o<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" value="<?php echo HtmlEncode($patient_insurance_grid->ContactName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactName" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" value="<?php echo HtmlEncode($patient_insurance_grid->ContactName->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_ContactName" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" value="<?php echo HtmlEncode($patient_insurance_grid->ContactName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->ContactMobile->Visible) { // ContactMobile ?>
		<td data-name="ContactMobile" <?php echo $patient_insurance_grid->ContactMobile->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_ContactMobile" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_ContactMobile" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->ContactMobile->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->ContactMobile->EditValue ?>"<?php echo $patient_insurance_grid->ContactMobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactMobile" name="o<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" id="o<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" value="<?php echo HtmlEncode($patient_insurance_grid->ContactMobile->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_ContactMobile" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_ContactMobile" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->ContactMobile->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->ContactMobile->EditValue ?>"<?php echo $patient_insurance_grid->ContactMobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_ContactMobile">
<span<?php echo $patient_insurance_grid->ContactMobile->viewAttributes() ?>><?php echo $patient_insurance_grid->ContactMobile->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactMobile" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" value="<?php echo HtmlEncode($patient_insurance_grid->ContactMobile->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_ContactMobile" name="o<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" id="o<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" value="<?php echo HtmlEncode($patient_insurance_grid->ContactMobile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactMobile" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" value="<?php echo HtmlEncode($patient_insurance_grid->ContactMobile->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_ContactMobile" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" value="<?php echo HtmlEncode($patient_insurance_grid->ContactMobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->PolicyType->Visible) { // PolicyType ?>
		<td data-name="PolicyType" <?php echo $patient_insurance_grid->PolicyType->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PolicyType" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_PolicyType" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PolicyType->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PolicyType->EditValue ?>"<?php echo $patient_insurance_grid->PolicyType->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyType" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyType->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PolicyType" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_PolicyType" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PolicyType->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PolicyType->EditValue ?>"<?php echo $patient_insurance_grid->PolicyType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PolicyType">
<span<?php echo $patient_insurance_grid->PolicyType->viewAttributes() ?>><?php echo $patient_insurance_grid->PolicyType->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyType" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyType->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyType" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyType" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyType->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyType" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->PolicyName->Visible) { // PolicyName ?>
		<td data-name="PolicyName" <?php echo $patient_insurance_grid->PolicyName->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PolicyName" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_PolicyName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PolicyName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PolicyName->EditValue ?>"<?php echo $patient_insurance_grid->PolicyName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyName" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyName->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PolicyName" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_PolicyName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PolicyName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PolicyName->EditValue ?>"<?php echo $patient_insurance_grid->PolicyName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PolicyName">
<span<?php echo $patient_insurance_grid->PolicyName->viewAttributes() ?>><?php echo $patient_insurance_grid->PolicyName->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyName->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyName" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyName" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyName->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyName" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->PolicyNo->Visible) { // PolicyNo ?>
		<td data-name="PolicyNo" <?php echo $patient_insurance_grid->PolicyNo->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PolicyNo" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_PolicyNo" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PolicyNo->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PolicyNo->EditValue ?>"<?php echo $patient_insurance_grid->PolicyNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyNo" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyNo->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PolicyNo" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_PolicyNo" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PolicyNo->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PolicyNo->EditValue ?>"<?php echo $patient_insurance_grid->PolicyNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PolicyNo">
<span<?php echo $patient_insurance_grid->PolicyNo->viewAttributes() ?>><?php echo $patient_insurance_grid->PolicyNo->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyNo" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyNo->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyNo" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyNo" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyNo->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyNo" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->PolicyAmount->Visible) { // PolicyAmount ?>
		<td data-name="PolicyAmount" <?php echo $patient_insurance_grid->PolicyAmount->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PolicyAmount" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_PolicyAmount" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PolicyAmount->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PolicyAmount->EditValue ?>"<?php echo $patient_insurance_grid->PolicyAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyAmount" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PolicyAmount" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_PolicyAmount" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PolicyAmount->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PolicyAmount->EditValue ?>"<?php echo $patient_insurance_grid->PolicyAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_PolicyAmount">
<span<?php echo $patient_insurance_grid->PolicyAmount->viewAttributes() ?>><?php echo $patient_insurance_grid->PolicyAmount->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyAmount" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyAmount->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyAmount" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyAmount" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyAmount->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyAmount" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->RefLetterNo->Visible) { // RefLetterNo ?>
		<td data-name="RefLetterNo" <?php echo $patient_insurance_grid->RefLetterNo->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_RefLetterNo" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_RefLetterNo" name="x<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" id="x<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->RefLetterNo->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->RefLetterNo->EditValue ?>"<?php echo $patient_insurance_grid->RefLetterNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_RefLetterNo" name="o<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" id="o<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" value="<?php echo HtmlEncode($patient_insurance_grid->RefLetterNo->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_RefLetterNo" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_RefLetterNo" name="x<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" id="x<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->RefLetterNo->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->RefLetterNo->EditValue ?>"<?php echo $patient_insurance_grid->RefLetterNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_RefLetterNo">
<span<?php echo $patient_insurance_grid->RefLetterNo->viewAttributes() ?>><?php echo $patient_insurance_grid->RefLetterNo->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_RefLetterNo" name="x<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" id="x<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" value="<?php echo HtmlEncode($patient_insurance_grid->RefLetterNo->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_RefLetterNo" name="o<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" id="o<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" value="<?php echo HtmlEncode($patient_insurance_grid->RefLetterNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_RefLetterNo" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" value="<?php echo HtmlEncode($patient_insurance_grid->RefLetterNo->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_RefLetterNo" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" value="<?php echo HtmlEncode($patient_insurance_grid->RefLetterNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->ReferenceBy->Visible) { // ReferenceBy ?>
		<td data-name="ReferenceBy" <?php echo $patient_insurance_grid->ReferenceBy->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_ReferenceBy" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_ReferenceBy" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->ReferenceBy->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->ReferenceBy->EditValue ?>"<?php echo $patient_insurance_grid->ReferenceBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceBy" name="o<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" id="o<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" value="<?php echo HtmlEncode($patient_insurance_grid->ReferenceBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_ReferenceBy" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_ReferenceBy" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->ReferenceBy->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->ReferenceBy->EditValue ?>"<?php echo $patient_insurance_grid->ReferenceBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_ReferenceBy">
<span<?php echo $patient_insurance_grid->ReferenceBy->viewAttributes() ?>><?php echo $patient_insurance_grid->ReferenceBy->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceBy" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" value="<?php echo HtmlEncode($patient_insurance_grid->ReferenceBy->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceBy" name="o<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" id="o<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" value="<?php echo HtmlEncode($patient_insurance_grid->ReferenceBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceBy" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" value="<?php echo HtmlEncode($patient_insurance_grid->ReferenceBy->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceBy" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" value="<?php echo HtmlEncode($patient_insurance_grid->ReferenceBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->ReferenceDate->Visible) { // ReferenceDate ?>
		<td data-name="ReferenceDate" <?php echo $patient_insurance_grid->ReferenceDate->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_ReferenceDate" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_ReferenceDate" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" placeholder="<?php echo HtmlEncode($patient_insurance_grid->ReferenceDate->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->ReferenceDate->EditValue ?>"<?php echo $patient_insurance_grid->ReferenceDate->editAttributes() ?>>
<?php if (!$patient_insurance_grid->ReferenceDate->ReadOnly && !$patient_insurance_grid->ReferenceDate->Disabled && !isset($patient_insurance_grid->ReferenceDate->EditAttrs["readonly"]) && !isset($patient_insurance_grid->ReferenceDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_insurancegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_insurancegrid", "x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceDate" name="o<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" id="o<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" value="<?php echo HtmlEncode($patient_insurance_grid->ReferenceDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_ReferenceDate" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_ReferenceDate" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" placeholder="<?php echo HtmlEncode($patient_insurance_grid->ReferenceDate->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->ReferenceDate->EditValue ?>"<?php echo $patient_insurance_grid->ReferenceDate->editAttributes() ?>>
<?php if (!$patient_insurance_grid->ReferenceDate->ReadOnly && !$patient_insurance_grid->ReferenceDate->Disabled && !isset($patient_insurance_grid->ReferenceDate->EditAttrs["readonly"]) && !isset($patient_insurance_grid->ReferenceDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_insurancegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_insurancegrid", "x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_ReferenceDate">
<span<?php echo $patient_insurance_grid->ReferenceDate->viewAttributes() ?>><?php echo $patient_insurance_grid->ReferenceDate->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceDate" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" value="<?php echo HtmlEncode($patient_insurance_grid->ReferenceDate->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceDate" name="o<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" id="o<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" value="<?php echo HtmlEncode($patient_insurance_grid->ReferenceDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceDate" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" value="<?php echo HtmlEncode($patient_insurance_grid->ReferenceDate->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceDate" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" value="<?php echo HtmlEncode($patient_insurance_grid->ReferenceDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $patient_insurance_grid->createdby->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_insurance" data-field="x_createdby" name="o<?php echo $patient_insurance_grid->RowIndex ?>_createdby" id="o<?php echo $patient_insurance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_insurance_grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_createdby">
<span<?php echo $patient_insurance_grid->createdby->viewAttributes() ?>><?php echo $patient_insurance_grid->createdby->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_createdby" name="x<?php echo $patient_insurance_grid->RowIndex ?>_createdby" id="x<?php echo $patient_insurance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_insurance_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_createdby" name="o<?php echo $patient_insurance_grid->RowIndex ?>_createdby" id="o<?php echo $patient_insurance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_insurance_grid->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_createdby" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_createdby" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_insurance_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_createdby" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_createdby" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_insurance_grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $patient_insurance_grid->createddatetime->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_insurance" data-field="x_createddatetime" name="o<?php echo $patient_insurance_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_insurance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_insurance_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_createddatetime">
<span<?php echo $patient_insurance_grid->createddatetime->viewAttributes() ?>><?php echo $patient_insurance_grid->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_createddatetime" name="x<?php echo $patient_insurance_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_insurance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_insurance_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_createddatetime" name="o<?php echo $patient_insurance_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_insurance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_insurance_grid->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_createddatetime" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_createddatetime" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_insurance_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_createddatetime" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_createddatetime" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_insurance_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $patient_insurance_grid->modifiedby->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_insurance" data-field="x_modifiedby" name="o<?php echo $patient_insurance_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_insurance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_insurance_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_modifiedby">
<span<?php echo $patient_insurance_grid->modifiedby->viewAttributes() ?>><?php echo $patient_insurance_grid->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_modifiedby" name="x<?php echo $patient_insurance_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_insurance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_insurance_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_modifiedby" name="o<?php echo $patient_insurance_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_insurance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_insurance_grid->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_modifiedby" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_modifiedby" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_insurance_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_modifiedby" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_modifiedby" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_insurance_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $patient_insurance_grid->modifieddatetime->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_insurance" data-field="x_modifieddatetime" name="o<?php echo $patient_insurance_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_insurance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_insurance_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_modifieddatetime">
<span<?php echo $patient_insurance_grid->modifieddatetime->viewAttributes() ?>><?php echo $patient_insurance_grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_modifieddatetime" name="x<?php echo $patient_insurance_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_insurance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_insurance_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_modifieddatetime" name="o<?php echo $patient_insurance_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_insurance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_insurance_grid->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_modifieddatetime" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_modifieddatetime" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_insurance_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_modifieddatetime" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_modifieddatetime" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_insurance_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_insurance_grid->mrnno->cellAttributes() ?>>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_insurance_grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_mrnno" class="form-group">
<span<?php echo $patient_insurance_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_insurance_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_mrnno" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_mrnno" name="x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->mrnno->EditValue ?>"<?php echo $patient_insurance_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_mrnno" name="o<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_insurance_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_insurance_grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_mrnno" class="form-group">
<span<?php echo $patient_insurance_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_insurance_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_mrnno" class="form-group">
<input type="text" data-table="patient_insurance" data-field="x_mrnno" name="x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->mrnno->EditValue ?>"<?php echo $patient_insurance_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_insurance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_insurance_grid->RowCount ?>_patient_insurance_mrnno">
<span<?php echo $patient_insurance_grid->mrnno->viewAttributes() ?>><?php echo $patient_insurance_grid->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_insurance->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_mrnno" name="x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_insurance_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_mrnno" name="o<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_insurance_grid->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_mrnno" name="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" id="fpatient_insurancegrid$x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_insurance_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_mrnno" name="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" id="fpatient_insurancegrid$o<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_insurance_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_insurance_grid->ListOptions->render("body", "right", $patient_insurance_grid->RowCount);
?>
	</tr>
<?php if ($patient_insurance->RowType == ROWTYPE_ADD || $patient_insurance->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_insurancegrid", "load"], function() {
	fpatient_insurancegrid.updateLists(<?php echo $patient_insurance_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_insurance_grid->isGridAdd() || $patient_insurance->CurrentMode == "copy")
		if (!$patient_insurance_grid->Recordset->EOF)
			$patient_insurance_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_insurance->CurrentMode == "add" || $patient_insurance->CurrentMode == "copy" || $patient_insurance->CurrentMode == "edit") {
		$patient_insurance_grid->RowIndex = '$rowindex$';
		$patient_insurance_grid->loadRowValues();

		// Set row properties
		$patient_insurance->resetAttributes();
		$patient_insurance->RowAttrs->merge(["data-rowindex" => $patient_insurance_grid->RowIndex, "id" => "r0_patient_insurance", "data-rowtype" => ROWTYPE_ADD]);
		$patient_insurance->RowAttrs->appendClass("ew-template");
		$patient_insurance->RowType = ROWTYPE_ADD;

		// Render row
		$patient_insurance_grid->renderRow();

		// Render list options
		$patient_insurance_grid->renderListOptions();
		$patient_insurance_grid->StartRowCount = 0;
?>
	<tr <?php echo $patient_insurance->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_insurance_grid->ListOptions->render("body", "left", $patient_insurance_grid->RowIndex);
?>
	<?php if ($patient_insurance_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_insurance->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_id" class="form-group patient_insurance_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_id" class="form-group patient_insurance_id">
<span<?php echo $patient_insurance_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_id" name="x<?php echo $patient_insurance_grid->RowIndex ?>_id" id="x<?php echo $patient_insurance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_insurance_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_id" name="o<?php echo $patient_insurance_grid->RowIndex ?>_id" id="o<?php echo $patient_insurance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_insurance_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$patient_insurance->isConfirm()) { ?>
<?php if ($patient_insurance_grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_insurance_Reception" class="form-group patient_insurance_Reception">
<span<?php echo $patient_insurance_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_insurance_grid->RowIndex ?>_Reception" name="x<?php echo $patient_insurance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_insurance_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_Reception" class="form-group patient_insurance_Reception">
<input type="text" data-table="patient_insurance" data-field="x_Reception" name="x<?php echo $patient_insurance_grid->RowIndex ?>_Reception" id="x<?php echo $patient_insurance_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_insurance_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->Reception->EditValue ?>"<?php echo $patient_insurance_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_Reception" class="form-group patient_insurance_Reception">
<span<?php echo $patient_insurance_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_Reception" name="x<?php echo $patient_insurance_grid->RowIndex ?>_Reception" id="x<?php echo $patient_insurance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_insurance_grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_Reception" name="o<?php echo $patient_insurance_grid->RowIndex ?>_Reception" id="o<?php echo $patient_insurance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_insurance_grid->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$patient_insurance->isConfirm()) { ?>
<?php if ($patient_insurance_grid->PatientId->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_insurance_PatientId" class="form-group patient_insurance_PatientId">
<span<?php echo $patient_insurance_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_insurance_grid->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_PatientId" class="form-group patient_insurance_PatientId">
<input type="text" data-table="patient_insurance" data-field="x_PatientId" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PatientId->EditValue ?>"<?php echo $patient_insurance_grid->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_PatientId" class="form-group patient_insurance_PatientId">
<span<?php echo $patient_insurance_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientId" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_insurance_grid->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientId" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_insurance_grid->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$patient_insurance->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_PatientName" class="form-group patient_insurance_PatientName">
<input type="text" data-table="patient_insurance" data-field="x_PatientName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PatientName->EditValue ?>"<?php echo $patient_insurance_grid->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_PatientName" class="form-group patient_insurance_PatientName">
<span<?php echo $patient_insurance_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_insurance_grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientName" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_insurance_grid->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->Company->Visible) { // Company ?>
		<td data-name="Company">
<?php if (!$patient_insurance->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_Company" class="form-group patient_insurance_Company">
<input type="text" data-table="patient_insurance" data-field="x_Company" name="x<?php echo $patient_insurance_grid->RowIndex ?>_Company" id="x<?php echo $patient_insurance_grid->RowIndex ?>_Company" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->Company->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->Company->EditValue ?>"<?php echo $patient_insurance_grid->Company->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_Company" class="form-group patient_insurance_Company">
<span<?php echo $patient_insurance_grid->Company->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->Company->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_Company" name="x<?php echo $patient_insurance_grid->RowIndex ?>_Company" id="x<?php echo $patient_insurance_grid->RowIndex ?>_Company" value="<?php echo HtmlEncode($patient_insurance_grid->Company->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_Company" name="o<?php echo $patient_insurance_grid->RowIndex ?>_Company" id="o<?php echo $patient_insurance_grid->RowIndex ?>_Company" value="<?php echo HtmlEncode($patient_insurance_grid->Company->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
		<td data-name="AddressInsuranceCarierName">
<?php if (!$patient_insurance->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_AddressInsuranceCarierName" class="form-group patient_insurance_AddressInsuranceCarierName">
<input type="text" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->AddressInsuranceCarierName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->AddressInsuranceCarierName->EditValue ?>"<?php echo $patient_insurance_grid->AddressInsuranceCarierName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_AddressInsuranceCarierName" class="form-group patient_insurance_AddressInsuranceCarierName">
<span<?php echo $patient_insurance_grid->AddressInsuranceCarierName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->AddressInsuranceCarierName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" value="<?php echo HtmlEncode($patient_insurance_grid->AddressInsuranceCarierName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="o<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" id="o<?php echo $patient_insurance_grid->RowIndex ?>_AddressInsuranceCarierName" value="<?php echo HtmlEncode($patient_insurance_grid->AddressInsuranceCarierName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->ContactName->Visible) { // ContactName ?>
		<td data-name="ContactName">
<?php if (!$patient_insurance->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_ContactName" class="form-group patient_insurance_ContactName">
<input type="text" data-table="patient_insurance" data-field="x_ContactName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->ContactName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->ContactName->EditValue ?>"<?php echo $patient_insurance_grid->ContactName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_ContactName" class="form-group patient_insurance_ContactName">
<span<?php echo $patient_insurance_grid->ContactName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->ContactName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" value="<?php echo HtmlEncode($patient_insurance_grid->ContactName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactName" name="o<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" id="o<?php echo $patient_insurance_grid->RowIndex ?>_ContactName" value="<?php echo HtmlEncode($patient_insurance_grid->ContactName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->ContactMobile->Visible) { // ContactMobile ?>
		<td data-name="ContactMobile">
<?php if (!$patient_insurance->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_ContactMobile" class="form-group patient_insurance_ContactMobile">
<input type="text" data-table="patient_insurance" data-field="x_ContactMobile" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->ContactMobile->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->ContactMobile->EditValue ?>"<?php echo $patient_insurance_grid->ContactMobile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_ContactMobile" class="form-group patient_insurance_ContactMobile">
<span<?php echo $patient_insurance_grid->ContactMobile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->ContactMobile->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactMobile" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" value="<?php echo HtmlEncode($patient_insurance_grid->ContactMobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactMobile" name="o<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" id="o<?php echo $patient_insurance_grid->RowIndex ?>_ContactMobile" value="<?php echo HtmlEncode($patient_insurance_grid->ContactMobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->PolicyType->Visible) { // PolicyType ?>
		<td data-name="PolicyType">
<?php if (!$patient_insurance->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_PolicyType" class="form-group patient_insurance_PolicyType">
<input type="text" data-table="patient_insurance" data-field="x_PolicyType" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PolicyType->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PolicyType->EditValue ?>"<?php echo $patient_insurance_grid->PolicyType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_PolicyType" class="form-group patient_insurance_PolicyType">
<span<?php echo $patient_insurance_grid->PolicyType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->PolicyType->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyType" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyType" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyType" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->PolicyName->Visible) { // PolicyName ?>
		<td data-name="PolicyName">
<?php if (!$patient_insurance->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_PolicyName" class="form-group patient_insurance_PolicyName">
<input type="text" data-table="patient_insurance" data-field="x_PolicyName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PolicyName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PolicyName->EditValue ?>"<?php echo $patient_insurance_grid->PolicyName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_PolicyName" class="form-group patient_insurance_PolicyName">
<span<?php echo $patient_insurance_grid->PolicyName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->PolicyName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyName" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyName" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyName" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->PolicyNo->Visible) { // PolicyNo ?>
		<td data-name="PolicyNo">
<?php if (!$patient_insurance->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_PolicyNo" class="form-group patient_insurance_PolicyNo">
<input type="text" data-table="patient_insurance" data-field="x_PolicyNo" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PolicyNo->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PolicyNo->EditValue ?>"<?php echo $patient_insurance_grid->PolicyNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_PolicyNo" class="form-group patient_insurance_PolicyNo">
<span<?php echo $patient_insurance_grid->PolicyNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->PolicyNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyNo" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyNo" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyNo" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->PolicyAmount->Visible) { // PolicyAmount ?>
		<td data-name="PolicyAmount">
<?php if (!$patient_insurance->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_PolicyAmount" class="form-group patient_insurance_PolicyAmount">
<input type="text" data-table="patient_insurance" data-field="x_PolicyAmount" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->PolicyAmount->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->PolicyAmount->EditValue ?>"<?php echo $patient_insurance_grid->PolicyAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_PolicyAmount" class="form-group patient_insurance_PolicyAmount">
<span<?php echo $patient_insurance_grid->PolicyAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->PolicyAmount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyAmount" name="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" id="x<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyAmount" name="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" id="o<?php echo $patient_insurance_grid->RowIndex ?>_PolicyAmount" value="<?php echo HtmlEncode($patient_insurance_grid->PolicyAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->RefLetterNo->Visible) { // RefLetterNo ?>
		<td data-name="RefLetterNo">
<?php if (!$patient_insurance->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_RefLetterNo" class="form-group patient_insurance_RefLetterNo">
<input type="text" data-table="patient_insurance" data-field="x_RefLetterNo" name="x<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" id="x<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->RefLetterNo->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->RefLetterNo->EditValue ?>"<?php echo $patient_insurance_grid->RefLetterNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_RefLetterNo" class="form-group patient_insurance_RefLetterNo">
<span<?php echo $patient_insurance_grid->RefLetterNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->RefLetterNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_RefLetterNo" name="x<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" id="x<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" value="<?php echo HtmlEncode($patient_insurance_grid->RefLetterNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_RefLetterNo" name="o<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" id="o<?php echo $patient_insurance_grid->RowIndex ?>_RefLetterNo" value="<?php echo HtmlEncode($patient_insurance_grid->RefLetterNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->ReferenceBy->Visible) { // ReferenceBy ?>
		<td data-name="ReferenceBy">
<?php if (!$patient_insurance->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_ReferenceBy" class="form-group patient_insurance_ReferenceBy">
<input type="text" data-table="patient_insurance" data-field="x_ReferenceBy" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->ReferenceBy->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->ReferenceBy->EditValue ?>"<?php echo $patient_insurance_grid->ReferenceBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_ReferenceBy" class="form-group patient_insurance_ReferenceBy">
<span<?php echo $patient_insurance_grid->ReferenceBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->ReferenceBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceBy" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" value="<?php echo HtmlEncode($patient_insurance_grid->ReferenceBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceBy" name="o<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" id="o<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceBy" value="<?php echo HtmlEncode($patient_insurance_grid->ReferenceBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->ReferenceDate->Visible) { // ReferenceDate ?>
		<td data-name="ReferenceDate">
<?php if (!$patient_insurance->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_ReferenceDate" class="form-group patient_insurance_ReferenceDate">
<input type="text" data-table="patient_insurance" data-field="x_ReferenceDate" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" placeholder="<?php echo HtmlEncode($patient_insurance_grid->ReferenceDate->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->ReferenceDate->EditValue ?>"<?php echo $patient_insurance_grid->ReferenceDate->editAttributes() ?>>
<?php if (!$patient_insurance_grid->ReferenceDate->ReadOnly && !$patient_insurance_grid->ReferenceDate->Disabled && !isset($patient_insurance_grid->ReferenceDate->EditAttrs["readonly"]) && !isset($patient_insurance_grid->ReferenceDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_insurancegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_insurancegrid", "x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_ReferenceDate" class="form-group patient_insurance_ReferenceDate">
<span<?php echo $patient_insurance_grid->ReferenceDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->ReferenceDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceDate" name="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" id="x<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" value="<?php echo HtmlEncode($patient_insurance_grid->ReferenceDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceDate" name="o<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" id="o<?php echo $patient_insurance_grid->RowIndex ?>_ReferenceDate" value="<?php echo HtmlEncode($patient_insurance_grid->ReferenceDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$patient_insurance->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_createdby" class="form-group patient_insurance_createdby">
<span<?php echo $patient_insurance_grid->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->createdby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_createdby" name="x<?php echo $patient_insurance_grid->RowIndex ?>_createdby" id="x<?php echo $patient_insurance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_insurance_grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_createdby" name="o<?php echo $patient_insurance_grid->RowIndex ?>_createdby" id="o<?php echo $patient_insurance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_insurance_grid->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$patient_insurance->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_createddatetime" class="form-group patient_insurance_createddatetime">
<span<?php echo $patient_insurance_grid->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->createddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_createddatetime" name="x<?php echo $patient_insurance_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_insurance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_insurance_grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_createddatetime" name="o<?php echo $patient_insurance_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_insurance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_insurance_grid->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$patient_insurance->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_modifiedby" class="form-group patient_insurance_modifiedby">
<span<?php echo $patient_insurance_grid->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->modifiedby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_modifiedby" name="x<?php echo $patient_insurance_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_insurance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_insurance_grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_modifiedby" name="o<?php echo $patient_insurance_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_insurance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_insurance_grid->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$patient_insurance->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_modifieddatetime" class="form-group patient_insurance_modifieddatetime">
<span<?php echo $patient_insurance_grid->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->modifieddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_modifieddatetime" name="x<?php echo $patient_insurance_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_insurance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_insurance_grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_modifieddatetime" name="o<?php echo $patient_insurance_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_insurance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_insurance_grid->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_insurance_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_insurance->isConfirm()) { ?>
<?php if ($patient_insurance_grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_insurance_mrnno" class="form-group patient_insurance_mrnno">
<span<?php echo $patient_insurance_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_insurance_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_mrnno" class="form-group patient_insurance_mrnno">
<input type="text" data-table="patient_insurance" data-field="x_mrnno" name="x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_grid->mrnno->EditValue ?>"<?php echo $patient_insurance_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_mrnno" class="form-group patient_insurance_mrnno">
<span<?php echo $patient_insurance_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_mrnno" name="x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_insurance_grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_mrnno" name="o<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_insurance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_insurance_grid->mrnno->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_insurance_grid->ListOptions->render("body", "right", $patient_insurance_grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_insurancegrid", "load"], function() {
	fpatient_insurancegrid.updateLists(<?php echo $patient_insurance_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($patient_insurance->CurrentMode == "add" || $patient_insurance->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_insurance_grid->FormKeyCountName ?>" id="<?php echo $patient_insurance_grid->FormKeyCountName ?>" value="<?php echo $patient_insurance_grid->KeyCount ?>">
<?php echo $patient_insurance_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_insurance->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_insurance_grid->FormKeyCountName ?>" id="<?php echo $patient_insurance_grid->FormKeyCountName ?>" value="<?php echo $patient_insurance_grid->KeyCount ?>">
<?php echo $patient_insurance_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_insurance->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_insurancegrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_insurance_grid->Recordset)
	$patient_insurance_grid->Recordset->Close();
?>
<?php if ($patient_insurance_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_insurance_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_insurance_grid->TotalRecords == 0 && !$patient_insurance->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_insurance_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$patient_insurance_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_insurance->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_insurance",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$patient_insurance_grid->terminate();
?>