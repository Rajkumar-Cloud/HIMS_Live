<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_follow_up_grid))
	$patient_follow_up_grid = new patient_follow_up_grid();

// Run the page
$patient_follow_up_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_follow_up_grid->Page_Render();
?>
<?php if (!$patient_follow_up_grid->isExport()) { ?>
<script>
var fpatient_follow_upgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpatient_follow_upgrid = new ew.Form("fpatient_follow_upgrid", "grid");
	fpatient_follow_upgrid.formKeyCountName = '<?php echo $patient_follow_up_grid->FormKeyCountName ?>';

	// Validate form
	fpatient_follow_upgrid.validate = function() {
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
			<?php if ($patient_follow_up_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up_grid->id->caption(), $patient_follow_up_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_follow_up_grid->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up_grid->PatID->caption(), $patient_follow_up_grid->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_follow_up_grid->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up_grid->PatientName->caption(), $patient_follow_up_grid->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_follow_up_grid->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up_grid->MobileNumber->caption(), $patient_follow_up_grid->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_follow_up_grid->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up_grid->mrnno->caption(), $patient_follow_up_grid->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_follow_up_grid->BP->Required) { ?>
				elm = this.getElements("x" + infix + "_BP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up_grid->BP->caption(), $patient_follow_up_grid->BP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_follow_up_grid->Pulse->Required) { ?>
				elm = this.getElements("x" + infix + "_Pulse");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up_grid->Pulse->caption(), $patient_follow_up_grid->Pulse->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_follow_up_grid->Resp->Required) { ?>
				elm = this.getElements("x" + infix + "_Resp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up_grid->Resp->caption(), $patient_follow_up_grid->Resp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_follow_up_grid->SPO2->Required) { ?>
				elm = this.getElements("x" + infix + "_SPO2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up_grid->SPO2->caption(), $patient_follow_up_grid->SPO2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_follow_up_grid->NextReviewDate->Required) { ?>
				elm = this.getElements("x" + infix + "_NextReviewDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up_grid->NextReviewDate->caption(), $patient_follow_up_grid->NextReviewDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_follow_up_grid->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up_grid->Age->caption(), $patient_follow_up_grid->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_follow_up_grid->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up_grid->Gender->caption(), $patient_follow_up_grid->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_follow_up_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up_grid->HospID->caption(), $patient_follow_up_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_follow_up_grid->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up_grid->Reception->caption(), $patient_follow_up_grid->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_follow_up_grid->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up_grid->PatientId->caption(), $patient_follow_up_grid->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fpatient_follow_upgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "PatID", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
		if (ew.valueChanged(fobj, infix, "MobileNumber", false)) return false;
		if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
		if (ew.valueChanged(fobj, infix, "BP", false)) return false;
		if (ew.valueChanged(fobj, infix, "Pulse", false)) return false;
		if (ew.valueChanged(fobj, infix, "Resp", false)) return false;
		if (ew.valueChanged(fobj, infix, "SPO2", false)) return false;
		if (ew.valueChanged(fobj, infix, "NextReviewDate", false)) return false;
		if (ew.valueChanged(fobj, infix, "Age", false)) return false;
		if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
		if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpatient_follow_upgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_follow_upgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpatient_follow_upgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$patient_follow_up_grid->renderOtherOptions();
?>
<?php if ($patient_follow_up_grid->TotalRecords > 0 || $patient_follow_up->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_follow_up_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_follow_up">
<?php if ($patient_follow_up_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_follow_up_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_follow_upgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_follow_up" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_follow_upgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_follow_up->RowType = ROWTYPE_HEADER;

// Render list options
$patient_follow_up_grid->renderListOptions();

// Render list options (header, left)
$patient_follow_up_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_follow_up_grid->id->Visible) { // id ?>
	<?php if ($patient_follow_up_grid->SortUrl($patient_follow_up_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_follow_up_grid->id->headerCellClass() ?>"><div id="elh_patient_follow_up_id" class="patient_follow_up_id"><div class="ew-table-header-caption"><?php echo $patient_follow_up_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_follow_up_grid->id->headerCellClass() ?>"><div><div id="elh_patient_follow_up_id" class="patient_follow_up_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_grid->PatID->Visible) { // PatID ?>
	<?php if ($patient_follow_up_grid->SortUrl($patient_follow_up_grid->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_follow_up_grid->PatID->headerCellClass() ?>"><div id="elh_patient_follow_up_PatID" class="patient_follow_up_PatID"><div class="ew-table-header-caption"><?php echo $patient_follow_up_grid->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_follow_up_grid->PatID->headerCellClass() ?>"><div><div id="elh_patient_follow_up_PatID" class="patient_follow_up_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_grid->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_grid->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_grid->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_grid->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_follow_up_grid->SortUrl($patient_follow_up_grid->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_follow_up_grid->PatientName->headerCellClass() ?>"><div id="elh_patient_follow_up_PatientName" class="patient_follow_up_PatientName"><div class="ew-table-header-caption"><?php echo $patient_follow_up_grid->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_follow_up_grid->PatientName->headerCellClass() ?>"><div><div id="elh_patient_follow_up_PatientName" class="patient_follow_up_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_grid->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_grid->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_grid->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_grid->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_follow_up_grid->SortUrl($patient_follow_up_grid->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_follow_up_grid->MobileNumber->headerCellClass() ?>"><div id="elh_patient_follow_up_MobileNumber" class="patient_follow_up_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_follow_up_grid->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_follow_up_grid->MobileNumber->headerCellClass() ?>"><div><div id="elh_patient_follow_up_MobileNumber" class="patient_follow_up_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_grid->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_grid->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_grid->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_grid->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_follow_up_grid->SortUrl($patient_follow_up_grid->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_follow_up_grid->mrnno->headerCellClass() ?>"><div id="elh_patient_follow_up_mrnno" class="patient_follow_up_mrnno"><div class="ew-table-header-caption"><?php echo $patient_follow_up_grid->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_follow_up_grid->mrnno->headerCellClass() ?>"><div><div id="elh_patient_follow_up_mrnno" class="patient_follow_up_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_grid->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_grid->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_grid->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_grid->BP->Visible) { // BP ?>
	<?php if ($patient_follow_up_grid->SortUrl($patient_follow_up_grid->BP) == "") { ?>
		<th data-name="BP" class="<?php echo $patient_follow_up_grid->BP->headerCellClass() ?>"><div id="elh_patient_follow_up_BP" class="patient_follow_up_BP"><div class="ew-table-header-caption"><?php echo $patient_follow_up_grid->BP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BP" class="<?php echo $patient_follow_up_grid->BP->headerCellClass() ?>"><div><div id="elh_patient_follow_up_BP" class="patient_follow_up_BP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_grid->BP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_grid->BP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_grid->BP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_grid->Pulse->Visible) { // Pulse ?>
	<?php if ($patient_follow_up_grid->SortUrl($patient_follow_up_grid->Pulse) == "") { ?>
		<th data-name="Pulse" class="<?php echo $patient_follow_up_grid->Pulse->headerCellClass() ?>"><div id="elh_patient_follow_up_Pulse" class="patient_follow_up_Pulse"><div class="ew-table-header-caption"><?php echo $patient_follow_up_grid->Pulse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pulse" class="<?php echo $patient_follow_up_grid->Pulse->headerCellClass() ?>"><div><div id="elh_patient_follow_up_Pulse" class="patient_follow_up_Pulse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_grid->Pulse->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_grid->Pulse->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_grid->Pulse->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_grid->Resp->Visible) { // Resp ?>
	<?php if ($patient_follow_up_grid->SortUrl($patient_follow_up_grid->Resp) == "") { ?>
		<th data-name="Resp" class="<?php echo $patient_follow_up_grid->Resp->headerCellClass() ?>"><div id="elh_patient_follow_up_Resp" class="patient_follow_up_Resp"><div class="ew-table-header-caption"><?php echo $patient_follow_up_grid->Resp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resp" class="<?php echo $patient_follow_up_grid->Resp->headerCellClass() ?>"><div><div id="elh_patient_follow_up_Resp" class="patient_follow_up_Resp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_grid->Resp->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_grid->Resp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_grid->Resp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_grid->SPO2->Visible) { // SPO2 ?>
	<?php if ($patient_follow_up_grid->SortUrl($patient_follow_up_grid->SPO2) == "") { ?>
		<th data-name="SPO2" class="<?php echo $patient_follow_up_grid->SPO2->headerCellClass() ?>"><div id="elh_patient_follow_up_SPO2" class="patient_follow_up_SPO2"><div class="ew-table-header-caption"><?php echo $patient_follow_up_grid->SPO2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SPO2" class="<?php echo $patient_follow_up_grid->SPO2->headerCellClass() ?>"><div><div id="elh_patient_follow_up_SPO2" class="patient_follow_up_SPO2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_grid->SPO2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_grid->SPO2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_grid->SPO2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_grid->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php if ($patient_follow_up_grid->SortUrl($patient_follow_up_grid->NextReviewDate) == "") { ?>
		<th data-name="NextReviewDate" class="<?php echo $patient_follow_up_grid->NextReviewDate->headerCellClass() ?>"><div id="elh_patient_follow_up_NextReviewDate" class="patient_follow_up_NextReviewDate"><div class="ew-table-header-caption"><?php echo $patient_follow_up_grid->NextReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NextReviewDate" class="<?php echo $patient_follow_up_grid->NextReviewDate->headerCellClass() ?>"><div><div id="elh_patient_follow_up_NextReviewDate" class="patient_follow_up_NextReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_grid->NextReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_grid->NextReviewDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_grid->NextReviewDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_grid->Age->Visible) { // Age ?>
	<?php if ($patient_follow_up_grid->SortUrl($patient_follow_up_grid->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_follow_up_grid->Age->headerCellClass() ?>"><div id="elh_patient_follow_up_Age" class="patient_follow_up_Age"><div class="ew-table-header-caption"><?php echo $patient_follow_up_grid->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_follow_up_grid->Age->headerCellClass() ?>"><div><div id="elh_patient_follow_up_Age" class="patient_follow_up_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_grid->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_grid->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_grid->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_grid->Gender->Visible) { // Gender ?>
	<?php if ($patient_follow_up_grid->SortUrl($patient_follow_up_grid->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_follow_up_grid->Gender->headerCellClass() ?>"><div id="elh_patient_follow_up_Gender" class="patient_follow_up_Gender"><div class="ew-table-header-caption"><?php echo $patient_follow_up_grid->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_follow_up_grid->Gender->headerCellClass() ?>"><div><div id="elh_patient_follow_up_Gender" class="patient_follow_up_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_grid->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_grid->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_grid->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_grid->HospID->Visible) { // HospID ?>
	<?php if ($patient_follow_up_grid->SortUrl($patient_follow_up_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_follow_up_grid->HospID->headerCellClass() ?>"><div id="elh_patient_follow_up_HospID" class="patient_follow_up_HospID"><div class="ew-table-header-caption"><?php echo $patient_follow_up_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_follow_up_grid->HospID->headerCellClass() ?>"><div><div id="elh_patient_follow_up_HospID" class="patient_follow_up_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_grid->Reception->Visible) { // Reception ?>
	<?php if ($patient_follow_up_grid->SortUrl($patient_follow_up_grid->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_follow_up_grid->Reception->headerCellClass() ?>"><div id="elh_patient_follow_up_Reception" class="patient_follow_up_Reception"><div class="ew-table-header-caption"><?php echo $patient_follow_up_grid->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_follow_up_grid->Reception->headerCellClass() ?>"><div><div id="elh_patient_follow_up_Reception" class="patient_follow_up_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_grid->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_grid->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_grid->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_grid->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_follow_up_grid->SortUrl($patient_follow_up_grid->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_follow_up_grid->PatientId->headerCellClass() ?>"><div id="elh_patient_follow_up_PatientId" class="patient_follow_up_PatientId"><div class="ew-table-header-caption"><?php echo $patient_follow_up_grid->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_follow_up_grid->PatientId->headerCellClass() ?>"><div><div id="elh_patient_follow_up_PatientId" class="patient_follow_up_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_grid->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_grid->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_grid->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_follow_up_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_follow_up_grid->StartRecord = 1;
$patient_follow_up_grid->StopRecord = $patient_follow_up_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($patient_follow_up->isConfirm() || $patient_follow_up_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_follow_up_grid->FormKeyCountName) && ($patient_follow_up_grid->isGridAdd() || $patient_follow_up_grid->isGridEdit() || $patient_follow_up->isConfirm())) {
		$patient_follow_up_grid->KeyCount = $CurrentForm->getValue($patient_follow_up_grid->FormKeyCountName);
		$patient_follow_up_grid->StopRecord = $patient_follow_up_grid->StartRecord + $patient_follow_up_grid->KeyCount - 1;
	}
}
$patient_follow_up_grid->RecordCount = $patient_follow_up_grid->StartRecord - 1;
if ($patient_follow_up_grid->Recordset && !$patient_follow_up_grid->Recordset->EOF) {
	$patient_follow_up_grid->Recordset->moveFirst();
	$selectLimit = $patient_follow_up_grid->UseSelectLimit;
	if (!$selectLimit && $patient_follow_up_grid->StartRecord > 1)
		$patient_follow_up_grid->Recordset->move($patient_follow_up_grid->StartRecord - 1);
} elseif (!$patient_follow_up->AllowAddDeleteRow && $patient_follow_up_grid->StopRecord == 0) {
	$patient_follow_up_grid->StopRecord = $patient_follow_up->GridAddRowCount;
}

// Initialize aggregate
$patient_follow_up->RowType = ROWTYPE_AGGREGATEINIT;
$patient_follow_up->resetAttributes();
$patient_follow_up_grid->renderRow();
if ($patient_follow_up_grid->isGridAdd())
	$patient_follow_up_grid->RowIndex = 0;
if ($patient_follow_up_grid->isGridEdit())
	$patient_follow_up_grid->RowIndex = 0;
while ($patient_follow_up_grid->RecordCount < $patient_follow_up_grid->StopRecord) {
	$patient_follow_up_grid->RecordCount++;
	if ($patient_follow_up_grid->RecordCount >= $patient_follow_up_grid->StartRecord) {
		$patient_follow_up_grid->RowCount++;
		if ($patient_follow_up_grid->isGridAdd() || $patient_follow_up_grid->isGridEdit() || $patient_follow_up->isConfirm()) {
			$patient_follow_up_grid->RowIndex++;
			$CurrentForm->Index = $patient_follow_up_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_follow_up_grid->FormActionName) && ($patient_follow_up->isConfirm() || $patient_follow_up_grid->EventCancelled))
				$patient_follow_up_grid->RowAction = strval($CurrentForm->getValue($patient_follow_up_grid->FormActionName));
			elseif ($patient_follow_up_grid->isGridAdd())
				$patient_follow_up_grid->RowAction = "insert";
			else
				$patient_follow_up_grid->RowAction = "";
		}

		// Set up key count
		$patient_follow_up_grid->KeyCount = $patient_follow_up_grid->RowIndex;

		// Init row class and style
		$patient_follow_up->resetAttributes();
		$patient_follow_up->CssClass = "";
		if ($patient_follow_up_grid->isGridAdd()) {
			if ($patient_follow_up->CurrentMode == "copy") {
				$patient_follow_up_grid->loadRowValues($patient_follow_up_grid->Recordset); // Load row values
				$patient_follow_up_grid->setRecordKey($patient_follow_up_grid->RowOldKey, $patient_follow_up_grid->Recordset); // Set old record key
			} else {
				$patient_follow_up_grid->loadRowValues(); // Load default values
				$patient_follow_up_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_follow_up_grid->loadRowValues($patient_follow_up_grid->Recordset); // Load row values
		}
		$patient_follow_up->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_follow_up_grid->isGridAdd()) // Grid add
			$patient_follow_up->RowType = ROWTYPE_ADD; // Render add
		if ($patient_follow_up_grid->isGridAdd() && $patient_follow_up->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_follow_up_grid->restoreCurrentRowFormValues($patient_follow_up_grid->RowIndex); // Restore form values
		if ($patient_follow_up_grid->isGridEdit()) { // Grid edit
			if ($patient_follow_up->EventCancelled)
				$patient_follow_up_grid->restoreCurrentRowFormValues($patient_follow_up_grid->RowIndex); // Restore form values
			if ($patient_follow_up_grid->RowAction == "insert")
				$patient_follow_up->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_follow_up->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_follow_up_grid->isGridEdit() && ($patient_follow_up->RowType == ROWTYPE_EDIT || $patient_follow_up->RowType == ROWTYPE_ADD) && $patient_follow_up->EventCancelled) // Update failed
			$patient_follow_up_grid->restoreCurrentRowFormValues($patient_follow_up_grid->RowIndex); // Restore form values
		if ($patient_follow_up->RowType == ROWTYPE_EDIT) // Edit row
			$patient_follow_up_grid->EditRowCount++;
		if ($patient_follow_up->isConfirm()) // Confirm row
			$patient_follow_up_grid->restoreCurrentRowFormValues($patient_follow_up_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_follow_up->RowAttrs->merge(["data-rowindex" => $patient_follow_up_grid->RowCount, "id" => "r" . $patient_follow_up_grid->RowCount . "_patient_follow_up", "data-rowtype" => $patient_follow_up->RowType]);

		// Render row
		$patient_follow_up_grid->renderRow();

		// Render list options
		$patient_follow_up_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_follow_up_grid->RowAction != "delete" && $patient_follow_up_grid->RowAction != "insertdelete" && !($patient_follow_up_grid->RowAction == "insert" && $patient_follow_up->isConfirm() && $patient_follow_up_grid->emptyRow())) {
?>
	<tr <?php echo $patient_follow_up->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_follow_up_grid->ListOptions->render("body", "left", $patient_follow_up_grid->RowCount);
?>
	<?php if ($patient_follow_up_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_follow_up_grid->id->cellAttributes() ?>>
<?php if ($patient_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_id" class="form-group"></span>
<input type="hidden" data-table="patient_follow_up" data-field="x_id" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_id" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_follow_up_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_id" class="form-group">
<span<?php echo $patient_follow_up_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_id" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_id" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_follow_up_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_id">
<span<?php echo $patient_follow_up_grid->id->viewAttributes() ?>><?php echo $patient_follow_up_grid->id->getViewValue() ?></span>
</span>
<?php if (!$patient_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_id" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_id" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_follow_up_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_id" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_id" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_follow_up_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_id" name="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_id" id="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_follow_up_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_id" name="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_id" id="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_follow_up_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $patient_follow_up_grid->PatID->cellAttributes() ?>>
<?php if ($patient_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_PatID" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_PatID" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->PatID->EditValue ?>"<?php echo $patient_follow_up_grid->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatID" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_follow_up_grid->PatID->OldValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_PatID" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_PatID" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->PatID->EditValue ?>"<?php echo $patient_follow_up_grid->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_PatID">
<span<?php echo $patient_follow_up_grid->PatID->viewAttributes() ?>><?php echo $patient_follow_up_grid->PatID->getViewValue() ?></span>
</span>
<?php if (!$patient_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatID" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_follow_up_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_PatID" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_follow_up_grid->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatID" name="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" id="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_follow_up_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_PatID" name="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" id="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_follow_up_grid->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_follow_up_grid->PatientName->cellAttributes() ?>>
<?php if ($patient_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_PatientName" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_PatientName" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->PatientName->EditValue ?>"<?php echo $patient_follow_up_grid->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientName" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_PatientName" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_PatientName" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->PatientName->EditValue ?>"<?php echo $patient_follow_up_grid->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_PatientName">
<span<?php echo $patient_follow_up_grid->PatientName->viewAttributes() ?>><?php echo $patient_follow_up_grid->PatientName->getViewValue() ?></span>
</span>
<?php if (!$patient_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientName" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientName" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientName" name="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" id="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientName" name="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" id="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $patient_follow_up_grid->MobileNumber->cellAttributes() ?>>
<?php if ($patient_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_MobileNumber" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_MobileNumber" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->MobileNumber->EditValue ?>"<?php echo $patient_follow_up_grid->MobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_MobileNumber" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_follow_up_grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_MobileNumber" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_MobileNumber" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->MobileNumber->EditValue ?>"<?php echo $patient_follow_up_grid->MobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_MobileNumber">
<span<?php echo $patient_follow_up_grid->MobileNumber->viewAttributes() ?>><?php echo $patient_follow_up_grid->MobileNumber->getViewValue() ?></span>
</span>
<?php if (!$patient_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_MobileNumber" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_follow_up_grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_MobileNumber" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_follow_up_grid->MobileNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_MobileNumber" name="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" id="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_follow_up_grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_MobileNumber" name="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" id="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_follow_up_grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_follow_up_grid->mrnno->cellAttributes() ?>>
<?php if ($patient_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_follow_up_grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_mrnno" class="form-group">
<span<?php echo $patient_follow_up_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_follow_up_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_mrnno" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_mrnno" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->mrnno->EditValue ?>"<?php echo $patient_follow_up_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_mrnno" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_follow_up_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_mrnno" class="form-group">
<span<?php echo $patient_follow_up_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->mrnno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_mrnno" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_follow_up_grid->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_mrnno">
<span<?php echo $patient_follow_up_grid->mrnno->viewAttributes() ?>><?php echo $patient_follow_up_grid->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_mrnno" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_follow_up_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_mrnno" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_follow_up_grid->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_mrnno" name="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" id="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_follow_up_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_mrnno" name="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" id="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_follow_up_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->BP->Visible) { // BP ?>
		<td data-name="BP" <?php echo $patient_follow_up_grid->BP->cellAttributes() ?>>
<?php if ($patient_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_BP" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_BP" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_BP" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->BP->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->BP->EditValue ?>"<?php echo $patient_follow_up_grid->BP->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_BP" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_BP" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_follow_up_grid->BP->OldValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_BP" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_BP" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_BP" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->BP->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->BP->EditValue ?>"<?php echo $patient_follow_up_grid->BP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_BP">
<span<?php echo $patient_follow_up_grid->BP->viewAttributes() ?>><?php echo $patient_follow_up_grid->BP->getViewValue() ?></span>
</span>
<?php if (!$patient_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_BP" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_BP" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_follow_up_grid->BP->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_BP" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_BP" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_follow_up_grid->BP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_BP" name="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_BP" id="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_follow_up_grid->BP->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_BP" name="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_BP" id="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_follow_up_grid->BP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->Pulse->Visible) { // Pulse ?>
		<td data-name="Pulse" <?php echo $patient_follow_up_grid->Pulse->cellAttributes() ?>>
<?php if ($patient_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_Pulse" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_Pulse" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->Pulse->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->Pulse->EditValue ?>"<?php echo $patient_follow_up_grid->Pulse->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Pulse" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_follow_up_grid->Pulse->OldValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_Pulse" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_Pulse" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->Pulse->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->Pulse->EditValue ?>"<?php echo $patient_follow_up_grid->Pulse->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_Pulse">
<span<?php echo $patient_follow_up_grid->Pulse->viewAttributes() ?>><?php echo $patient_follow_up_grid->Pulse->getViewValue() ?></span>
</span>
<?php if (!$patient_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Pulse" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_follow_up_grid->Pulse->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_Pulse" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_follow_up_grid->Pulse->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Pulse" name="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" id="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_follow_up_grid->Pulse->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_Pulse" name="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" id="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_follow_up_grid->Pulse->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->Resp->Visible) { // Resp ?>
		<td data-name="Resp" <?php echo $patient_follow_up_grid->Resp->cellAttributes() ?>>
<?php if ($patient_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_Resp" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_Resp" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->Resp->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->Resp->EditValue ?>"<?php echo $patient_follow_up_grid->Resp->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Resp" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" value="<?php echo HtmlEncode($patient_follow_up_grid->Resp->OldValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_Resp" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_Resp" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->Resp->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->Resp->EditValue ?>"<?php echo $patient_follow_up_grid->Resp->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_Resp">
<span<?php echo $patient_follow_up_grid->Resp->viewAttributes() ?>><?php echo $patient_follow_up_grid->Resp->getViewValue() ?></span>
</span>
<?php if (!$patient_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Resp" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" value="<?php echo HtmlEncode($patient_follow_up_grid->Resp->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_Resp" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" value="<?php echo HtmlEncode($patient_follow_up_grid->Resp->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Resp" name="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" id="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" value="<?php echo HtmlEncode($patient_follow_up_grid->Resp->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_Resp" name="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" id="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" value="<?php echo HtmlEncode($patient_follow_up_grid->Resp->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->SPO2->Visible) { // SPO2 ?>
		<td data-name="SPO2" <?php echo $patient_follow_up_grid->SPO2->cellAttributes() ?>>
<?php if ($patient_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_SPO2" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_SPO2" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->SPO2->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->SPO2->EditValue ?>"<?php echo $patient_follow_up_grid->SPO2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_SPO2" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" value="<?php echo HtmlEncode($patient_follow_up_grid->SPO2->OldValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_SPO2" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_SPO2" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->SPO2->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->SPO2->EditValue ?>"<?php echo $patient_follow_up_grid->SPO2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_SPO2">
<span<?php echo $patient_follow_up_grid->SPO2->viewAttributes() ?>><?php echo $patient_follow_up_grid->SPO2->getViewValue() ?></span>
</span>
<?php if (!$patient_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_SPO2" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" value="<?php echo HtmlEncode($patient_follow_up_grid->SPO2->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_SPO2" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" value="<?php echo HtmlEncode($patient_follow_up_grid->SPO2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_SPO2" name="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" id="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" value="<?php echo HtmlEncode($patient_follow_up_grid->SPO2->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_SPO2" name="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" id="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" value="<?php echo HtmlEncode($patient_follow_up_grid->SPO2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->NextReviewDate->Visible) { // NextReviewDate ?>
		<td data-name="NextReviewDate" <?php echo $patient_follow_up_grid->NextReviewDate->cellAttributes() ?>>
<?php if ($patient_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_NextReviewDate" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_NextReviewDate" data-format="7" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->NextReviewDate->EditValue ?>"<?php echo $patient_follow_up_grid->NextReviewDate->editAttributes() ?>>
<?php if (!$patient_follow_up_grid->NextReviewDate->ReadOnly && !$patient_follow_up_grid->NextReviewDate->Disabled && !isset($patient_follow_up_grid->NextReviewDate->EditAttrs["readonly"]) && !isset($patient_follow_up_grid->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_follow_upgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_follow_upgrid", "x<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_NextReviewDate" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" value="<?php echo HtmlEncode($patient_follow_up_grid->NextReviewDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_NextReviewDate" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_NextReviewDate" data-format="7" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->NextReviewDate->EditValue ?>"<?php echo $patient_follow_up_grid->NextReviewDate->editAttributes() ?>>
<?php if (!$patient_follow_up_grid->NextReviewDate->ReadOnly && !$patient_follow_up_grid->NextReviewDate->Disabled && !isset($patient_follow_up_grid->NextReviewDate->EditAttrs["readonly"]) && !isset($patient_follow_up_grid->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_follow_upgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_follow_upgrid", "x<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_NextReviewDate">
<span<?php echo $patient_follow_up_grid->NextReviewDate->viewAttributes() ?>><?php echo $patient_follow_up_grid->NextReviewDate->getViewValue() ?></span>
</span>
<?php if (!$patient_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_NextReviewDate" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" value="<?php echo HtmlEncode($patient_follow_up_grid->NextReviewDate->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_NextReviewDate" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" value="<?php echo HtmlEncode($patient_follow_up_grid->NextReviewDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_NextReviewDate" name="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" id="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" value="<?php echo HtmlEncode($patient_follow_up_grid->NextReviewDate->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_NextReviewDate" name="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" id="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" value="<?php echo HtmlEncode($patient_follow_up_grid->NextReviewDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $patient_follow_up_grid->Age->cellAttributes() ?>>
<?php if ($patient_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_Age" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_Age" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Age" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->Age->EditValue ?>"<?php echo $patient_follow_up_grid->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Age" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_Age" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_follow_up_grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_Age" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_Age" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Age" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->Age->EditValue ?>"<?php echo $patient_follow_up_grid->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_Age">
<span<?php echo $patient_follow_up_grid->Age->viewAttributes() ?>><?php echo $patient_follow_up_grid->Age->getViewValue() ?></span>
</span>
<?php if (!$patient_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Age" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Age" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_follow_up_grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_Age" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_Age" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_follow_up_grid->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Age" name="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_Age" id="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_follow_up_grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_Age" name="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_Age" id="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_follow_up_grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_follow_up_grid->Gender->cellAttributes() ?>>
<?php if ($patient_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_Gender" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_Gender" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->Gender->EditValue ?>"<?php echo $patient_follow_up_grid->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Gender" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_follow_up_grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_Gender" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_Gender" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->Gender->EditValue ?>"<?php echo $patient_follow_up_grid->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_Gender">
<span<?php echo $patient_follow_up_grid->Gender->viewAttributes() ?>><?php echo $patient_follow_up_grid->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Gender" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_follow_up_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_Gender" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_follow_up_grid->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Gender" name="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" id="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_follow_up_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_Gender" name="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" id="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_follow_up_grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $patient_follow_up_grid->HospID->cellAttributes() ?>>
<?php if ($patient_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_HospID" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_HospID" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_follow_up_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_HospID">
<span<?php echo $patient_follow_up_grid->HospID->viewAttributes() ?>><?php echo $patient_follow_up_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$patient_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_HospID" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_HospID" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_follow_up_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_HospID" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_HospID" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_follow_up_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_HospID" name="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_HospID" id="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_follow_up_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_HospID" name="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_HospID" id="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_follow_up_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_follow_up_grid->Reception->cellAttributes() ?>>
<?php if ($patient_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_follow_up_grid->Reception->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_Reception" class="form-group">
<span<?php echo $patient_follow_up_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_follow_up_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_Reception" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_Reception" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->Reception->EditValue ?>"<?php echo $patient_follow_up_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Reception" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_follow_up_grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_Reception" class="form-group">
<span<?php echo $patient_follow_up_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->Reception->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Reception" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_follow_up_grid->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_Reception">
<span<?php echo $patient_follow_up_grid->Reception->viewAttributes() ?>><?php echo $patient_follow_up_grid->Reception->getViewValue() ?></span>
</span>
<?php if (!$patient_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Reception" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_follow_up_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_Reception" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_follow_up_grid->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Reception" name="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" id="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_follow_up_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_Reception" name="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" id="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_follow_up_grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $patient_follow_up_grid->PatientId->cellAttributes() ?>>
<?php if ($patient_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_follow_up_grid->PatientId->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_PatientId" class="form-group">
<span<?php echo $patient_follow_up_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_PatientId" class="form-group">
<input type="text" data-table="patient_follow_up" data-field="x_PatientId" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->PatientId->EditValue ?>"<?php echo $patient_follow_up_grid->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientId" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_PatientId" class="form-group">
<span<?php echo $patient_follow_up_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->PatientId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientId" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_follow_up_grid->RowCount ?>_patient_follow_up_PatientId">
<span<?php echo $patient_follow_up_grid->PatientId->viewAttributes() ?>><?php echo $patient_follow_up_grid->PatientId->getViewValue() ?></span>
</span>
<?php if (!$patient_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientId" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientId" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientId" name="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" id="fpatient_follow_upgrid$x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientId" name="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" id="fpatient_follow_upgrid$o<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_follow_up_grid->ListOptions->render("body", "right", $patient_follow_up_grid->RowCount);
?>
	</tr>
<?php if ($patient_follow_up->RowType == ROWTYPE_ADD || $patient_follow_up->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_follow_upgrid", "load"], function() {
	fpatient_follow_upgrid.updateLists(<?php echo $patient_follow_up_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_follow_up_grid->isGridAdd() || $patient_follow_up->CurrentMode == "copy")
		if (!$patient_follow_up_grid->Recordset->EOF)
			$patient_follow_up_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_follow_up->CurrentMode == "add" || $patient_follow_up->CurrentMode == "copy" || $patient_follow_up->CurrentMode == "edit") {
		$patient_follow_up_grid->RowIndex = '$rowindex$';
		$patient_follow_up_grid->loadRowValues();

		// Set row properties
		$patient_follow_up->resetAttributes();
		$patient_follow_up->RowAttrs->merge(["data-rowindex" => $patient_follow_up_grid->RowIndex, "id" => "r0_patient_follow_up", "data-rowtype" => ROWTYPE_ADD]);
		$patient_follow_up->RowAttrs->appendClass("ew-template");
		$patient_follow_up->RowType = ROWTYPE_ADD;

		// Render row
		$patient_follow_up_grid->renderRow();

		// Render list options
		$patient_follow_up_grid->renderListOptions();
		$patient_follow_up_grid->StartRowCount = 0;
?>
	<tr <?php echo $patient_follow_up->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_follow_up_grid->ListOptions->render("body", "left", $patient_follow_up_grid->RowIndex);
?>
	<?php if ($patient_follow_up_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_id" class="form-group patient_follow_up_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_id" class="form-group patient_follow_up_id">
<span<?php echo $patient_follow_up_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_id" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_id" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_follow_up_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_id" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_id" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_follow_up_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$patient_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_PatID" class="form-group patient_follow_up_PatID">
<input type="text" data-table="patient_follow_up" data-field="x_PatID" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->PatID->EditValue ?>"<?php echo $patient_follow_up_grid->PatID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_PatID" class="form-group patient_follow_up_PatID">
<span<?php echo $patient_follow_up_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatID" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_follow_up_grid->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatID" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_follow_up_grid->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$patient_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_PatientName" class="form-group patient_follow_up_PatientName">
<input type="text" data-table="patient_follow_up" data-field="x_PatientName" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->PatientName->EditValue ?>"<?php echo $patient_follow_up_grid->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_PatientName" class="form-group patient_follow_up_PatientName">
<span<?php echo $patient_follow_up_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientName" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientName" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber">
<?php if (!$patient_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_MobileNumber" class="form-group patient_follow_up_MobileNumber">
<input type="text" data-table="patient_follow_up" data-field="x_MobileNumber" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->MobileNumber->EditValue ?>"<?php echo $patient_follow_up_grid->MobileNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_MobileNumber" class="form-group patient_follow_up_MobileNumber">
<span<?php echo $patient_follow_up_grid->MobileNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->MobileNumber->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_MobileNumber" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_follow_up_grid->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_MobileNumber" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_follow_up_grid->MobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_follow_up->isConfirm()) { ?>
<?php if ($patient_follow_up_grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_follow_up_mrnno" class="form-group patient_follow_up_mrnno">
<span<?php echo $patient_follow_up_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_follow_up_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_mrnno" class="form-group patient_follow_up_mrnno">
<input type="text" data-table="patient_follow_up" data-field="x_mrnno" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->mrnno->EditValue ?>"<?php echo $patient_follow_up_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_mrnno" class="form-group patient_follow_up_mrnno">
<span<?php echo $patient_follow_up_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_mrnno" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_follow_up_grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_mrnno" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_follow_up_grid->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->BP->Visible) { // BP ?>
		<td data-name="BP">
<?php if (!$patient_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_BP" class="form-group patient_follow_up_BP">
<input type="text" data-table="patient_follow_up" data-field="x_BP" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_BP" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->BP->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->BP->EditValue ?>"<?php echo $patient_follow_up_grid->BP->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_BP" class="form-group patient_follow_up_BP">
<span<?php echo $patient_follow_up_grid->BP->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->BP->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_BP" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_BP" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_follow_up_grid->BP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_BP" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_BP" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_follow_up_grid->BP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->Pulse->Visible) { // Pulse ?>
		<td data-name="Pulse">
<?php if (!$patient_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_Pulse" class="form-group patient_follow_up_Pulse">
<input type="text" data-table="patient_follow_up" data-field="x_Pulse" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->Pulse->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->Pulse->EditValue ?>"<?php echo $patient_follow_up_grid->Pulse->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_Pulse" class="form-group patient_follow_up_Pulse">
<span<?php echo $patient_follow_up_grid->Pulse->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->Pulse->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Pulse" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_follow_up_grid->Pulse->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Pulse" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_follow_up_grid->Pulse->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->Resp->Visible) { // Resp ?>
		<td data-name="Resp">
<?php if (!$patient_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_Resp" class="form-group patient_follow_up_Resp">
<input type="text" data-table="patient_follow_up" data-field="x_Resp" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->Resp->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->Resp->EditValue ?>"<?php echo $patient_follow_up_grid->Resp->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_Resp" class="form-group patient_follow_up_Resp">
<span<?php echo $patient_follow_up_grid->Resp->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->Resp->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Resp" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" value="<?php echo HtmlEncode($patient_follow_up_grid->Resp->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Resp" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_Resp" value="<?php echo HtmlEncode($patient_follow_up_grid->Resp->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->SPO2->Visible) { // SPO2 ?>
		<td data-name="SPO2">
<?php if (!$patient_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_SPO2" class="form-group patient_follow_up_SPO2">
<input type="text" data-table="patient_follow_up" data-field="x_SPO2" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->SPO2->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->SPO2->EditValue ?>"<?php echo $patient_follow_up_grid->SPO2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_SPO2" class="form-group patient_follow_up_SPO2">
<span<?php echo $patient_follow_up_grid->SPO2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->SPO2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_SPO2" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" value="<?php echo HtmlEncode($patient_follow_up_grid->SPO2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_SPO2" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_SPO2" value="<?php echo HtmlEncode($patient_follow_up_grid->SPO2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->NextReviewDate->Visible) { // NextReviewDate ?>
		<td data-name="NextReviewDate">
<?php if (!$patient_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_NextReviewDate" class="form-group patient_follow_up_NextReviewDate">
<input type="text" data-table="patient_follow_up" data-field="x_NextReviewDate" data-format="7" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->NextReviewDate->EditValue ?>"<?php echo $patient_follow_up_grid->NextReviewDate->editAttributes() ?>>
<?php if (!$patient_follow_up_grid->NextReviewDate->ReadOnly && !$patient_follow_up_grid->NextReviewDate->Disabled && !isset($patient_follow_up_grid->NextReviewDate->EditAttrs["readonly"]) && !isset($patient_follow_up_grid->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_follow_upgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_follow_upgrid", "x<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_NextReviewDate" class="form-group patient_follow_up_NextReviewDate">
<span<?php echo $patient_follow_up_grid->NextReviewDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->NextReviewDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_NextReviewDate" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" value="<?php echo HtmlEncode($patient_follow_up_grid->NextReviewDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_NextReviewDate" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_NextReviewDate" value="<?php echo HtmlEncode($patient_follow_up_grid->NextReviewDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$patient_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_Age" class="form-group patient_follow_up_Age">
<input type="text" data-table="patient_follow_up" data-field="x_Age" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Age" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->Age->EditValue ?>"<?php echo $patient_follow_up_grid->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_Age" class="form-group patient_follow_up_Age">
<span<?php echo $patient_follow_up_grid->Age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->Age->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Age" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Age" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_follow_up_grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Age" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_Age" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_follow_up_grid->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_Gender" class="form-group patient_follow_up_Gender">
<input type="text" data-table="patient_follow_up" data-field="x_Gender" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->Gender->EditValue ?>"<?php echo $patient_follow_up_grid->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_Gender" class="form-group patient_follow_up_Gender">
<span<?php echo $patient_follow_up_grid->Gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->Gender->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Gender" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_follow_up_grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Gender" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_follow_up_grid->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$patient_follow_up->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_HospID" class="form-group patient_follow_up_HospID">
<span<?php echo $patient_follow_up_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_HospID" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_HospID" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_follow_up_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_HospID" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_HospID" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_follow_up_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$patient_follow_up->isConfirm()) { ?>
<?php if ($patient_follow_up_grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_follow_up_Reception" class="form-group patient_follow_up_Reception">
<span<?php echo $patient_follow_up_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_follow_up_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_Reception" class="form-group patient_follow_up_Reception">
<input type="text" data-table="patient_follow_up" data-field="x_Reception" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->Reception->EditValue ?>"<?php echo $patient_follow_up_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_Reception" class="form-group patient_follow_up_Reception">
<span<?php echo $patient_follow_up_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Reception" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_follow_up_grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Reception" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_follow_up_grid->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_follow_up_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$patient_follow_up->isConfirm()) { ?>
<?php if ($patient_follow_up_grid->PatientId->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_follow_up_PatientId" class="form-group patient_follow_up_PatientId">
<span<?php echo $patient_follow_up_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_PatientId" class="form-group patient_follow_up_PatientId">
<input type="text" data-table="patient_follow_up" data-field="x_PatientId" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up_grid->PatientId->EditValue ?>"<?php echo $patient_follow_up_grid->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_PatientId" class="form-group patient_follow_up_PatientId">
<span<?php echo $patient_follow_up_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_follow_up_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientId" name="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientId" name="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_follow_up_grid->PatientId->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_follow_up_grid->ListOptions->render("body", "right", $patient_follow_up_grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_follow_upgrid", "load"], function() {
	fpatient_follow_upgrid.updateLists(<?php echo $patient_follow_up_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($patient_follow_up->CurrentMode == "add" || $patient_follow_up->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_follow_up_grid->FormKeyCountName ?>" id="<?php echo $patient_follow_up_grid->FormKeyCountName ?>" value="<?php echo $patient_follow_up_grid->KeyCount ?>">
<?php echo $patient_follow_up_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_follow_up->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_follow_up_grid->FormKeyCountName ?>" id="<?php echo $patient_follow_up_grid->FormKeyCountName ?>" value="<?php echo $patient_follow_up_grid->KeyCount ?>">
<?php echo $patient_follow_up_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_follow_up->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_follow_upgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_follow_up_grid->Recordset)
	$patient_follow_up_grid->Recordset->Close();
?>
<?php if ($patient_follow_up_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_follow_up_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_follow_up_grid->TotalRecords == 0 && !$patient_follow_up->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_follow_up_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$patient_follow_up_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_follow_up->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_follow_up",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$patient_follow_up_grid->terminate();
?>