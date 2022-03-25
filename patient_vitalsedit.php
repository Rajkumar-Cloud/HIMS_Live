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
$patient_vitals_edit = new patient_vitals_edit();

// Run the page
$patient_vitals_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_vitals_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpatient_vitalsedit = currentForm = new ew.Form("fpatient_vitalsedit", "edit");

// Validate form
fpatient_vitalsedit.validate = function() {
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
		<?php if ($patient_vitals_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->id->caption(), $patient_vitals->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->mrnno->caption(), $patient_vitals->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->PatientName->caption(), $patient_vitals->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->PatID->caption(), $patient_vitals->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->MobileNumber->caption(), $patient_vitals->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->profilePic->caption(), $patient_vitals->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->HT->Required) { ?>
			elm = this.getElements("x" + infix + "_HT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->HT->caption(), $patient_vitals->HT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->WT->Required) { ?>
			elm = this.getElements("x" + infix + "_WT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->WT->caption(), $patient_vitals->WT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->SurfaceArea->Required) { ?>
			elm = this.getElements("x" + infix + "_SurfaceArea");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->SurfaceArea->caption(), $patient_vitals->SurfaceArea->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->BodyMassIndex->Required) { ?>
			elm = this.getElements("x" + infix + "_BodyMassIndex");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->BodyMassIndex->caption(), $patient_vitals->BodyMassIndex->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->ClinicalFindings->Required) { ?>
			elm = this.getElements("x" + infix + "_ClinicalFindings");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->ClinicalFindings->caption(), $patient_vitals->ClinicalFindings->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->ClinicalDiagnosis->Required) { ?>
			elm = this.getElements("x" + infix + "_ClinicalDiagnosis");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->ClinicalDiagnosis->caption(), $patient_vitals->ClinicalDiagnosis->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->AnticoagulantifAny->Required) { ?>
			elm = this.getElements("x" + infix + "_AnticoagulantifAny");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->AnticoagulantifAny->caption(), $patient_vitals->AnticoagulantifAny->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->FoodAllergies->Required) { ?>
			elm = this.getElements("x" + infix + "_FoodAllergies");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->FoodAllergies->caption(), $patient_vitals->FoodAllergies->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->GenericAllergies->Required) { ?>
			elm = this.getElements("x" + infix + "_GenericAllergies[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->GenericAllergies->caption(), $patient_vitals->GenericAllergies->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->GroupAllergies->Required) { ?>
			elm = this.getElements("x" + infix + "_GroupAllergies[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->GroupAllergies->caption(), $patient_vitals->GroupAllergies->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->Temp->Required) { ?>
			elm = this.getElements("x" + infix + "_Temp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->Temp->caption(), $patient_vitals->Temp->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->Pulse->Required) { ?>
			elm = this.getElements("x" + infix + "_Pulse");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->Pulse->caption(), $patient_vitals->Pulse->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->BP->Required) { ?>
			elm = this.getElements("x" + infix + "_BP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->BP->caption(), $patient_vitals->BP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->PR->Required) { ?>
			elm = this.getElements("x" + infix + "_PR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->PR->caption(), $patient_vitals->PR->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->CNS->Required) { ?>
			elm = this.getElements("x" + infix + "_CNS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->CNS->caption(), $patient_vitals->CNS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->RSA->Required) { ?>
			elm = this.getElements("x" + infix + "_RSA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->RSA->caption(), $patient_vitals->RSA->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->CVS->Required) { ?>
			elm = this.getElements("x" + infix + "_CVS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->CVS->caption(), $patient_vitals->CVS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->PA->Required) { ?>
			elm = this.getElements("x" + infix + "_PA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->PA->caption(), $patient_vitals->PA->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->PS->Required) { ?>
			elm = this.getElements("x" + infix + "_PS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->PS->caption(), $patient_vitals->PS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->PV->Required) { ?>
			elm = this.getElements("x" + infix + "_PV");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->PV->caption(), $patient_vitals->PV->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->clinicaldetails->Required) { ?>
			elm = this.getElements("x" + infix + "_clinicaldetails[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->clinicaldetails->caption(), $patient_vitals->clinicaldetails->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->status->caption(), $patient_vitals->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->modifiedby->caption(), $patient_vitals->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->modifieddatetime->caption(), $patient_vitals->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->Age->caption(), $patient_vitals->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->Gender->caption(), $patient_vitals->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->PatientSearch->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientSearch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->PatientSearch->caption(), $patient_vitals->PatientSearch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->PatientId->caption(), $patient_vitals->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->Reception->caption(), $patient_vitals->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->HospID->caption(), $patient_vitals->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fpatient_vitalsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_vitalsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_vitalsedit.lists["x_AnticoagulantifAny"] = <?php echo $patient_vitals_edit->AnticoagulantifAny->Lookup->toClientList() ?>;
fpatient_vitalsedit.lists["x_AnticoagulantifAny"].options = <?php echo JsonEncode($patient_vitals_edit->AnticoagulantifAny->lookupOptions()) ?>;
fpatient_vitalsedit.autoSuggests["x_AnticoagulantifAny"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_vitalsedit.lists["x_GenericAllergies[]"] = <?php echo $patient_vitals_edit->GenericAllergies->Lookup->toClientList() ?>;
fpatient_vitalsedit.lists["x_GenericAllergies[]"].options = <?php echo JsonEncode($patient_vitals_edit->GenericAllergies->lookupOptions()) ?>;
fpatient_vitalsedit.lists["x_GroupAllergies[]"] = <?php echo $patient_vitals_edit->GroupAllergies->Lookup->toClientList() ?>;
fpatient_vitalsedit.lists["x_GroupAllergies[]"].options = <?php echo JsonEncode($patient_vitals_edit->GroupAllergies->lookupOptions()) ?>;
fpatient_vitalsedit.lists["x_clinicaldetails[]"] = <?php echo $patient_vitals_edit->clinicaldetails->Lookup->toClientList() ?>;
fpatient_vitalsedit.lists["x_clinicaldetails[]"].options = <?php echo JsonEncode($patient_vitals_edit->clinicaldetails->lookupOptions()) ?>;
fpatient_vitalsedit.lists["x_status"] = <?php echo $patient_vitals_edit->status->Lookup->toClientList() ?>;
fpatient_vitalsedit.lists["x_status"].options = <?php echo JsonEncode($patient_vitals_edit->status->lookupOptions()) ?>;
fpatient_vitalsedit.lists["x_PatientSearch"] = <?php echo $patient_vitals_edit->PatientSearch->Lookup->toClientList() ?>;
fpatient_vitalsedit.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_vitals_edit->PatientSearch->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_vitals_edit->showPageHeader(); ?>
<?php
$patient_vitals_edit->showMessage();
?>
<form name="fpatient_vitalsedit" id="fpatient_vitalsedit" class="<?php echo $patient_vitals_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_vitals_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_vitals_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_vitals">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_vitals_edit->IsModal ?>">
<?php if ($patient_vitals->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_vitals->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_vitals->PatientId->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_vitals->mrnno->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($patient_vitals->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_vitals_id" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_id" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->id->caption() ?><?php echo ($patient_vitals->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->id->cellAttributes() ?>>
<script id="tpx_patient_vitals_id" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_id">
<span<?php echo $patient_vitals->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_vitals->id->CurrentValue) ?>">
<?php echo $patient_vitals->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_vitals_mrnno" for="x_mrnno" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_mrnno" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->mrnno->caption() ?><?php echo ($patient_vitals->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->mrnno->cellAttributes() ?>>
<script id="tpx_patient_vitals_mrnno" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_mrnno">
<span<?php echo $patient_vitals->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->mrnno->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($patient_vitals->mrnno->CurrentValue) ?>">
<?php echo $patient_vitals->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_vitals_PatientName" for="x_PatientName" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_PatientName" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->PatientName->caption() ?><?php echo ($patient_vitals->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->PatientName->cellAttributes() ?>>
<script id="tpx_patient_vitals_PatientName" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_PatientName">
<span<?php echo $patient_vitals->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->PatientName->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" value="<?php echo HtmlEncode($patient_vitals->PatientName->CurrentValue) ?>">
<?php echo $patient_vitals->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_patient_vitals_PatID" for="x_PatID" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_PatID" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->PatID->caption() ?><?php echo ($patient_vitals->PatID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->PatID->cellAttributes() ?>>
<script id="tpx_patient_vitals_PatID" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_PatID">
<span<?php echo $patient_vitals->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->PatID->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="x_PatID" id="x_PatID" value="<?php echo HtmlEncode($patient_vitals->PatID->CurrentValue) ?>">
<?php echo $patient_vitals->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_patient_vitals_MobileNumber" for="x_MobileNumber" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_MobileNumber" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->MobileNumber->caption() ?><?php echo ($patient_vitals->MobileNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_vitals_MobileNumber" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_MobileNumber">
<input type="text" data-table="patient_vitals" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->MobileNumber->EditValue ?>"<?php echo $patient_vitals->MobileNumber->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_vitals_profilePic" for="x_profilePic" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_profilePic" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->profilePic->caption() ?><?php echo ($patient_vitals->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->profilePic->cellAttributes() ?>>
<script id="tpx_patient_vitals_profilePic" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_profilePic">
<input type="text" data-table="patient_vitals" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" placeholder="<?php echo HtmlEncode($patient_vitals->profilePic->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->profilePic->EditValue ?>"<?php echo $patient_vitals->profilePic->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->HT->Visible) { // HT ?>
	<div id="r_HT" class="form-group row">
		<label id="elh_patient_vitals_HT" for="x_HT" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_HT" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->HT->caption() ?><?php echo ($patient_vitals->HT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->HT->cellAttributes() ?>>
<script id="tpx_patient_vitals_HT" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_HT">
<input type="text" data-table="patient_vitals" data-field="x_HT" name="x_HT" id="x_HT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals->HT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->HT->EditValue ?>"<?php echo $patient_vitals->HT->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->HT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->WT->Visible) { // WT ?>
	<div id="r_WT" class="form-group row">
		<label id="elh_patient_vitals_WT" for="x_WT" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_WT" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->WT->caption() ?><?php echo ($patient_vitals->WT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->WT->cellAttributes() ?>>
<script id="tpx_patient_vitals_WT" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_WT">
<input type="text" data-table="patient_vitals" data-field="x_WT" name="x_WT" id="x_WT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals->WT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->WT->EditValue ?>"<?php echo $patient_vitals->WT->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->WT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->SurfaceArea->Visible) { // SurfaceArea ?>
	<div id="r_SurfaceArea" class="form-group row">
		<label id="elh_patient_vitals_SurfaceArea" for="x_SurfaceArea" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_SurfaceArea" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->SurfaceArea->caption() ?><?php echo ($patient_vitals->SurfaceArea->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->SurfaceArea->cellAttributes() ?>>
<script id="tpx_patient_vitals_SurfaceArea" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_SurfaceArea">
<input type="text" data-table="patient_vitals" data-field="x_SurfaceArea" name="x_SurfaceArea" id="x_SurfaceArea" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->SurfaceArea->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->SurfaceArea->EditValue ?>"<?php echo $patient_vitals->SurfaceArea->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->SurfaceArea->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->BodyMassIndex->Visible) { // BodyMassIndex ?>
	<div id="r_BodyMassIndex" class="form-group row">
		<label id="elh_patient_vitals_BodyMassIndex" for="x_BodyMassIndex" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_BodyMassIndex" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->BodyMassIndex->caption() ?><?php echo ($patient_vitals->BodyMassIndex->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->BodyMassIndex->cellAttributes() ?>>
<script id="tpx_patient_vitals_BodyMassIndex" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_BodyMassIndex">
<input type="text" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x_BodyMassIndex" id="x_BodyMassIndex" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->BodyMassIndex->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->BodyMassIndex->EditValue ?>"<?php echo $patient_vitals->BodyMassIndex->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->BodyMassIndex->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->ClinicalFindings->Visible) { // ClinicalFindings ?>
	<div id="r_ClinicalFindings" class="form-group row">
		<label id="elh_patient_vitals_ClinicalFindings" for="x_ClinicalFindings" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_ClinicalFindings" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->ClinicalFindings->caption() ?><?php echo ($patient_vitals->ClinicalFindings->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->ClinicalFindings->cellAttributes() ?>>
<script id="tpx_patient_vitals_ClinicalFindings" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_ClinicalFindings">
<textarea data-table="patient_vitals" data-field="x_ClinicalFindings" name="x_ClinicalFindings" id="x_ClinicalFindings" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_vitals->ClinicalFindings->getPlaceHolder()) ?>"<?php echo $patient_vitals->ClinicalFindings->editAttributes() ?>><?php echo $patient_vitals->ClinicalFindings->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_vitals->ClinicalFindings->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->ClinicalDiagnosis->Visible) { // ClinicalDiagnosis ?>
	<div id="r_ClinicalDiagnosis" class="form-group row">
		<label id="elh_patient_vitals_ClinicalDiagnosis" for="x_ClinicalDiagnosis" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_ClinicalDiagnosis" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->ClinicalDiagnosis->caption() ?><?php echo ($patient_vitals->ClinicalDiagnosis->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->ClinicalDiagnosis->cellAttributes() ?>>
<script id="tpx_patient_vitals_ClinicalDiagnosis" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_ClinicalDiagnosis">
<textarea data-table="patient_vitals" data-field="x_ClinicalDiagnosis" name="x_ClinicalDiagnosis" id="x_ClinicalDiagnosis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_vitals->ClinicalDiagnosis->getPlaceHolder()) ?>"<?php echo $patient_vitals->ClinicalDiagnosis->editAttributes() ?>><?php echo $patient_vitals->ClinicalDiagnosis->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_vitals->ClinicalDiagnosis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
	<div id="r_AnticoagulantifAny" class="form-group row">
		<label id="elh_patient_vitals_AnticoagulantifAny" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_AnticoagulantifAny" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->AnticoagulantifAny->caption() ?><?php echo ($patient_vitals->AnticoagulantifAny->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->AnticoagulantifAny->cellAttributes() ?>>
<script id="tpx_patient_vitals_AnticoagulantifAny" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_AnticoagulantifAny">
<?php
$wrkonchange = "" . trim(@$patient_vitals->AnticoagulantifAny->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_vitals->AnticoagulantifAny->EditAttrs["onchange"] = "";
?>
<span id="as_x_AnticoagulantifAny" class="text-nowrap" style="z-index: 8870">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x_AnticoagulantifAny" id="sv_x_AnticoagulantifAny" value="<?php echo RemoveHtml($patient_vitals->AnticoagulantifAny->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->getPlaceHolder()) ?>"<?php echo $patient_vitals->AnticoagulantifAny->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals->AnticoagulantifAny->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_AnticoagulantifAny',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_vitals->AnticoagulantifAny->ReadOnly || $patient_vitals->AnticoagulantifAny->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_vitals->AnticoagulantifAny->displayValueSeparatorAttribute() ?>" name="x_AnticoagulantifAny" id="x_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_vitals->AnticoagulantifAny->Lookup->getParamTag("p_x_AnticoagulantifAny") ?>
</span>
</script>
<script type="text/html" class="patient_vitalsedit_js">
fpatient_vitalsedit.createAutoSuggest({"id":"x_AnticoagulantifAny","forceSelect":true});
</script>
<?php echo $patient_vitals->AnticoagulantifAny->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->FoodAllergies->Visible) { // FoodAllergies ?>
	<div id="r_FoodAllergies" class="form-group row">
		<label id="elh_patient_vitals_FoodAllergies" for="x_FoodAllergies" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_FoodAllergies" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->FoodAllergies->caption() ?><?php echo ($patient_vitals->FoodAllergies->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->FoodAllergies->cellAttributes() ?>>
<script id="tpx_patient_vitals_FoodAllergies" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_FoodAllergies">
<input type="text" data-table="patient_vitals" data-field="x_FoodAllergies" name="x_FoodAllergies" id="x_FoodAllergies" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->FoodAllergies->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->FoodAllergies->EditValue ?>"<?php echo $patient_vitals->FoodAllergies->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->FoodAllergies->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->GenericAllergies->Visible) { // GenericAllergies ?>
	<div id="r_GenericAllergies" class="form-group row">
		<label id="elh_patient_vitals_GenericAllergies" for="x_GenericAllergies" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_GenericAllergies" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->GenericAllergies->caption() ?><?php echo ($patient_vitals->GenericAllergies->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->GenericAllergies->cellAttributes() ?>>
<script id="tpx_patient_vitals_GenericAllergies" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_GenericAllergies">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GenericAllergies"><?php echo strval($patient_vitals->GenericAllergies->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_vitals->GenericAllergies->ViewValue) : $patient_vitals->GenericAllergies->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals->GenericAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_vitals->GenericAllergies->ReadOnly || $patient_vitals->GenericAllergies->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_GenericAllergies[]',m:1,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals->GenericAllergies->Lookup->getParamTag("p_x_GenericAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals->GenericAllergies->displayValueSeparatorAttribute() ?>" name="x_GenericAllergies[]" id="x_GenericAllergies[]" value="<?php echo $patient_vitals->GenericAllergies->CurrentValue ?>"<?php echo $patient_vitals->GenericAllergies->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->GenericAllergies->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->GroupAllergies->Visible) { // GroupAllergies ?>
	<div id="r_GroupAllergies" class="form-group row">
		<label id="elh_patient_vitals_GroupAllergies" for="x_GroupAllergies" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_GroupAllergies" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->GroupAllergies->caption() ?><?php echo ($patient_vitals->GroupAllergies->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->GroupAllergies->cellAttributes() ?>>
<script id="tpx_patient_vitals_GroupAllergies" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_GroupAllergies">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GroupAllergies"><?php echo strval($patient_vitals->GroupAllergies->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_vitals->GroupAllergies->ViewValue) : $patient_vitals->GroupAllergies->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals->GroupAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_vitals->GroupAllergies->ReadOnly || $patient_vitals->GroupAllergies->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_GroupAllergies[]',m:1,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals->GroupAllergies->Lookup->getParamTag("p_x_GroupAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals->GroupAllergies->displayValueSeparatorAttribute() ?>" name="x_GroupAllergies[]" id="x_GroupAllergies[]" value="<?php echo $patient_vitals->GroupAllergies->CurrentValue ?>"<?php echo $patient_vitals->GroupAllergies->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->GroupAllergies->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->Temp->Visible) { // Temp ?>
	<div id="r_Temp" class="form-group row">
		<label id="elh_patient_vitals_Temp" for="x_Temp" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_Temp" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->Temp->caption() ?><?php echo ($patient_vitals->Temp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->Temp->cellAttributes() ?>>
<script id="tpx_patient_vitals_Temp" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_Temp">
<input type="text" data-table="patient_vitals" data-field="x_Temp" name="x_Temp" id="x_Temp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->Temp->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Temp->EditValue ?>"<?php echo $patient_vitals->Temp->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->Temp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->Pulse->Visible) { // Pulse ?>
	<div id="r_Pulse" class="form-group row">
		<label id="elh_patient_vitals_Pulse" for="x_Pulse" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_Pulse" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->Pulse->caption() ?><?php echo ($patient_vitals->Pulse->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->Pulse->cellAttributes() ?>>
<script id="tpx_patient_vitals_Pulse" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_Pulse">
<input type="text" data-table="patient_vitals" data-field="x_Pulse" name="x_Pulse" id="x_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->Pulse->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Pulse->EditValue ?>"<?php echo $patient_vitals->Pulse->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->Pulse->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->BP->Visible) { // BP ?>
	<div id="r_BP" class="form-group row">
		<label id="elh_patient_vitals_BP" for="x_BP" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_BP" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->BP->caption() ?><?php echo ($patient_vitals->BP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->BP->cellAttributes() ?>>
<script id="tpx_patient_vitals_BP" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_BP">
<input type="text" data-table="patient_vitals" data-field="x_BP" name="x_BP" id="x_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->BP->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->BP->EditValue ?>"<?php echo $patient_vitals->BP->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->BP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->PR->Visible) { // PR ?>
	<div id="r_PR" class="form-group row">
		<label id="elh_patient_vitals_PR" for="x_PR" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_PR" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->PR->caption() ?><?php echo ($patient_vitals->PR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->PR->cellAttributes() ?>>
<script id="tpx_patient_vitals_PR" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_PR">
<input type="text" data-table="patient_vitals" data-field="x_PR" name="x_PR" id="x_PR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PR->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PR->EditValue ?>"<?php echo $patient_vitals->PR->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->PR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->CNS->Visible) { // CNS ?>
	<div id="r_CNS" class="form-group row">
		<label id="elh_patient_vitals_CNS" for="x_CNS" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_CNS" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->CNS->caption() ?><?php echo ($patient_vitals->CNS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->CNS->cellAttributes() ?>>
<script id="tpx_patient_vitals_CNS" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_CNS">
<input type="text" data-table="patient_vitals" data-field="x_CNS" name="x_CNS" id="x_CNS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->CNS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->CNS->EditValue ?>"<?php echo $patient_vitals->CNS->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->CNS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->RSA->Visible) { // RSA ?>
	<div id="r_RSA" class="form-group row">
		<label id="elh_patient_vitals_RSA" for="x_RSA" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_RSA" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->RSA->caption() ?><?php echo ($patient_vitals->RSA->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->RSA->cellAttributes() ?>>
<script id="tpx_patient_vitals_RSA" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_RSA">
<input type="text" data-table="patient_vitals" data-field="x_RSA" name="x_RSA" id="x_RSA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->RSA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->RSA->EditValue ?>"<?php echo $patient_vitals->RSA->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->RSA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->CVS->Visible) { // CVS ?>
	<div id="r_CVS" class="form-group row">
		<label id="elh_patient_vitals_CVS" for="x_CVS" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_CVS" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->CVS->caption() ?><?php echo ($patient_vitals->CVS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->CVS->cellAttributes() ?>>
<script id="tpx_patient_vitals_CVS" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_CVS">
<input type="text" data-table="patient_vitals" data-field="x_CVS" name="x_CVS" id="x_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->CVS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->CVS->EditValue ?>"<?php echo $patient_vitals->CVS->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->CVS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->PA->Visible) { // PA ?>
	<div id="r_PA" class="form-group row">
		<label id="elh_patient_vitals_PA" for="x_PA" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_PA" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->PA->caption() ?><?php echo ($patient_vitals->PA->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->PA->cellAttributes() ?>>
<script id="tpx_patient_vitals_PA" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_PA">
<input type="text" data-table="patient_vitals" data-field="x_PA" name="x_PA" id="x_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PA->EditValue ?>"<?php echo $patient_vitals->PA->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->PA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->PS->Visible) { // PS ?>
	<div id="r_PS" class="form-group row">
		<label id="elh_patient_vitals_PS" for="x_PS" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_PS" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->PS->caption() ?><?php echo ($patient_vitals->PS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->PS->cellAttributes() ?>>
<script id="tpx_patient_vitals_PS" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_PS">
<input type="text" data-table="patient_vitals" data-field="x_PS" name="x_PS" id="x_PS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PS->EditValue ?>"<?php echo $patient_vitals->PS->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->PS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->PV->Visible) { // PV ?>
	<div id="r_PV" class="form-group row">
		<label id="elh_patient_vitals_PV" for="x_PV" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_PV" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->PV->caption() ?><?php echo ($patient_vitals->PV->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->PV->cellAttributes() ?>>
<script id="tpx_patient_vitals_PV" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_PV">
<input type="text" data-table="patient_vitals" data-field="x_PV" name="x_PV" id="x_PV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PV->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PV->EditValue ?>"<?php echo $patient_vitals->PV->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->PV->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->clinicaldetails->Visible) { // clinicaldetails ?>
	<div id="r_clinicaldetails" class="form-group row">
		<label id="elh_patient_vitals_clinicaldetails" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_clinicaldetails" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->clinicaldetails->caption() ?><?php echo ($patient_vitals->clinicaldetails->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->clinicaldetails->cellAttributes() ?>>
<script id="tpx_patient_vitals_clinicaldetails" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_clinicaldetails">
<div id="tp_x_clinicaldetails" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_vitals" data-field="x_clinicaldetails" data-value-separator="<?php echo $patient_vitals->clinicaldetails->displayValueSeparatorAttribute() ?>" name="x_clinicaldetails[]" id="x_clinicaldetails[]" value="{value}"<?php echo $patient_vitals->clinicaldetails->editAttributes() ?>></div>
<div id="dsl_x_clinicaldetails" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_vitals->clinicaldetails->checkBoxListHtml(FALSE, "x_clinicaldetails[]") ?>
</div></div>
<?php echo $patient_vitals->clinicaldetails->Lookup->getParamTag("p_x_clinicaldetails") ?>
</span>
</script>
<?php echo $patient_vitals->clinicaldetails->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_vitals_status" for="x_status" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_status" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->status->caption() ?><?php echo ($patient_vitals->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->status->cellAttributes() ?>>
<script id="tpx_patient_vitals_status" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_vitals" data-field="x_status" data-value-separator="<?php echo $patient_vitals->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_vitals->status->editAttributes() ?>>
		<?php echo $patient_vitals->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $patient_vitals->status->Lookup->getParamTag("p_x_status") ?>
</span>
</script>
<?php echo $patient_vitals->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_vitals_Age" for="x_Age" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_Age" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->Age->caption() ?><?php echo ($patient_vitals->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->Age->cellAttributes() ?>>
<script id="tpx_patient_vitals_Age" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_Age">
<input type="text" data-table="patient_vitals" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->Age->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Age->EditValue ?>"<?php echo $patient_vitals->Age->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_vitals_Gender" for="x_Gender" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_Gender" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->Gender->caption() ?><?php echo ($patient_vitals->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->Gender->cellAttributes() ?>>
<script id="tpx_patient_vitals_Gender" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_Gender">
<input type="text" data-table="patient_vitals" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Gender->EditValue ?>"<?php echo $patient_vitals->Gender->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label id="elh_patient_vitals_PatientSearch" for="x_PatientSearch" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_PatientSearch" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->PatientSearch->caption() ?><?php echo ($patient_vitals->PatientSearch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_vitals_PatientSearch" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_PatientSearch">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo strval($patient_vitals->PatientSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_vitals->PatientSearch->ViewValue) : $patient_vitals->PatientSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_vitals->PatientSearch->ReadOnly || $patient_vitals->PatientSearch->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals->PatientSearch->Lookup->getParamTag("p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_vitals->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_vitals->PatientSearch->CurrentValue ?>"<?php echo $patient_vitals->PatientSearch->editAttributes() ?>>
</span>
</script>
<?php echo $patient_vitals->PatientSearch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_vitals_PatientId" for="x_PatientId" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_PatientId" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->PatientId->caption() ?><?php echo ($patient_vitals->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->PatientId->cellAttributes() ?>>
<script id="tpx_patient_vitals_PatientId" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_PatientId">
<span<?php echo $patient_vitals->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->PatientId->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" value="<?php echo HtmlEncode($patient_vitals->PatientId->CurrentValue) ?>">
<?php echo $patient_vitals->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_vitals_Reception" for="x_Reception" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_Reception" class="patient_vitalsedit" type="text/html"><span><?php echo $patient_vitals->Reception->caption() ?><?php echo ($patient_vitals->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div<?php echo $patient_vitals->Reception->cellAttributes() ?>>
<script id="tpx_patient_vitals_Reception" class="patient_vitalsedit" type="text/html">
<span id="el_patient_vitals_Reception">
<span<?php echo $patient_vitals->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->Reception->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($patient_vitals->Reception->CurrentValue) ?>">
<?php echo $patient_vitals->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_vitalsedit" class="ew-custom-template"></div>
<script id="tpm_patient_vitalsedit" type="text/html">
<div id="ct_patient_vitals_edit"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
</style>
	<?php
	$fk_id = $_GET["fk_id"] ;
	$fk_patient_id = $_GET["fk_patient_id"] ;
	$fk_mrnNo = $_GET["fk_mrnNo"] ;
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	if($Tid == "")
	{
		$vviid = $_GET["id"] ;
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_vitals where id='".$vviid."'; ";
		$resuVi = $dbhelper->ExecuteRows($sql);
		$Tid = $resuVi[0]["PatientId"];
		$fk_mrnNo = $resuVi[0]["mrnno"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results1[0]["profilePic"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results2 = $dbhelper->ExecuteRows($sql);
	if($results2[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results2[0]["profilePic"];
	}
	if($results1[0]["profilePic"] == "")
	{
		$PartnerProfilePic = "hims\profile-picture.png";
	}else{
		$PartnerProfilePic = $results1[0]["profilePic"];
	}
	?>
<?php
	$Reception = $_GET["fk_id"] ;
	$PatientId = $_GET["fk_patient_id"] ;
	$mrnno = $_GET["fk_mrnNo"] ;
?>
	<input type="hidden" id="fk_id" name="fk_id" value="<?php echo $Reception; ?>">
	<input type="hidden" id="fk_patient_id" name="fk_patient_id" value="<?php echo $PatientId; ?>">
	<input type="hidden" id="fk_mrnNo" name="fk_mrnNo" value="<?php echo $mrnno; ?>">
	<input type="hidden" id="Repagehistoryview" name="Repagehistoryview" value="3487">
<div hidden>
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_vitals_PatientSearch"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_PatientSearch"/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_vitals_profilePic"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_profilePic"/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpc_patient_vitals_SurfaceArea"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_SurfaceArea"/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpc_patient_vitals_BodyMassIndex"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_BodyMassIndex"/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_vitals_mrnno"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_mrnno"/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_vitals_Reception"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_Reception"/}}</p> 
  <p>{{include tmpl="#tpc_patient_vitals_PatientId"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_PatientId"/}}</p> 
  <p>{{include tmpl="#tpc_patient_vitals_PatientName"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_PatientName"/}}</p> 
  <p>{{include tmpl="#tpc_patient_vitals_Age"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_Age"/}}</p> 
  <p>{{include tmpl="#tpc_patient_vitals_Gender"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_Gender"/}}</p>
  <p>{{include tmpl="#tpc_patient_vitals_PatID"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_PatID"/}}</p>
  <p>{{include tmpl="#tpc_patient_vitals_MobileNumber"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_MobileNumber"/}}</p> 
</div>
	<div class="row">
<div id="patientdataview" class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span id="SemPatientId" class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span id="SemPatientPatientName" class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span id="SemPatientGender" class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span id="SemPatientBloodGroup" class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient"  class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				<div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPatientEmail" class="description-header">MRN No : <?php echo $fk_mrnNo; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span id="SemPatientAge" class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 id="SemPatientMobile" class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<div class="row">
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box">
			  <span class="info-box-icon bg-info elevation-1">H</span>
			  <div class="info-box-content">
				<span class="info-box-text">{{include tmpl="#tpc_patient_vitals_HT"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_HT"/}}</span>
				<span class="info-box-number">Centimeter - Cm.</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-danger elevation-1">W</span>
			  <div class="info-box-content">
				<span class="info-box-text">{{include tmpl="#tpc_patient_vitals_WT"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_WT"/}}</span>
				<span class="info-box-number">Kilogram - Kg.</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <!-- fix for small devices only -->
		  <div class="clearfix hidden-md-up"></div>
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-success elevation-1">BSA</span>
			  <div class="info-box-content">
				<span class="info-box-text">Body Surface Area</span>
				<span id="BodySurfaceAreaValue" class="info-box-number">0</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-warning elevation-1">BMI</span>
			  <div class="info-box-content">
				<span class="info-box-text">Body Mass Index</span>
				<span id="BodyMassIndexValue" class="info-box-number">0</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  {{include tmpl="#tpc_patient_vitals_ClinicalFindings"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_ClinicalFindings"/}}
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  {{include tmpl="#tpc_patient_vitals_ClinicalDiagnosis"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_ClinicalDiagnosis"/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  	<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_vitals_FoodAllergies"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_FoodAllergies"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_vitals_AnticoagulantifAny"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_AnticoagulantifAny"/}}</td></tr>						
						<tr><td>{{include tmpl="#tpc_patient_vitals_GenericAllergies"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_GenericAllergies"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_vitals_GroupAllergies"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_GroupAllergies"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_vitals_clinicaldetails"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_clinicaldetails"/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  		<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_Temp"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_Temp"/}} F</td><td>{{include tmpl="#tpc_patient_vitals_BP"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_BP"/}} mm of Hg</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_Pulse"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_Pulse"/}} beats/min</td><td>{{include tmpl="#tpc_patient_vitals_PR"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_PR"/}} breaths/min</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_CNS"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_CNS"/}}</td><td>{{include tmpl="#tpc_patient_vitals_RSA"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_RSA"/}}</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_CVS"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_CVS"/}}</td><td>{{include tmpl="#tpc_patient_vitals_PA"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_PA"/}}</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_PS"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_PS"/}}</td><td>{{include tmpl="#tpc_patient_vitals_PV"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_PV"/}}</td></tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<?php
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	$Reception = $_GET["fk_id"] ;
	$PatientId = $_GET["fk_patient_id"] ;
	$mrnno = $_GET["fk_mrnNo"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_vitals where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$vitalsURL = "patient_vitalsadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$vitalsURL = "patient_vitalsedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$historyURL = "patient_historyadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$historyURL = "patient_historyedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_provisional_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridadd&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridedit&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_final_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$finaldiagnosisURL = "patient_final_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$finaldiagnosisURL = "patient_final_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_follow_up where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$followupURL = "patient_follow_upadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$followupURL = "patient_follow_upedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$deliveryregisterURL = "patient_ot_delivery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$deliveryregisterURL = "patient_ot_delivery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$surgeryregisterURL = "patient_ot_surgery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$surgeryregisterURL = "patient_ot_surgery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
?>
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callSpatientvitals()">Vitals</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callpatienthistory()">History</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callpatientprovisionaldiagnosis()">Provisional Diagnosis</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callpatientprescription()">Prescription</button>
			</td>
						<td>
				<button class="btn bg-danger btn-lg" onClick="callpatientfinaldiagnosis()">Final Diagnosis</button>
			</td>
			<td>
				<button class="btn bg-orange btn-lg" onClick="callpatientfollowup()">Follow Up</button>
			</td>
						<td>
				<button class="btn bg-purple btn-lg" onClick="callpatientotdeliveryregister()">Delivery Register</button>
			</td>
			<td>
				<button class="btn bg-maroon btn-lg" onClick="callpatientotsurgeryregister()">Surgery Register</button>
			</td>
		</tr>
	</tbody>
</table>
</div>
</script>
<?php if (!$patient_vitals_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_vitals_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_vitals_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_vitals->Rows) ?> };
ew.applyTemplate("tpd_patient_vitalsedit", "tpm_patient_vitalsedit", "patient_vitalsedit", "<?php echo $patient_vitals->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_vitalsedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_vitals_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
// Write your table-specific startup script here
// document.write("page loaded");

 document.getElementById("x_HT").style.width = "80px";
 document.getElementById("x_WT").style.width = "80px";
 document.getElementById("x_Temp").style.width = "80px";
 document.getElementById("x_Pulse").style.width = "80px";
 document.getElementById("x_BP").style.width = "80px";
 document.getElementById("x_PR").style.width = "80px";
 document.getElementById("x_CNS").style.width = "80px";
 document.getElementById("x_CVS").style.width = "80px";
 document.getElementById("x_PA").style.width = "80px";
 document.getElementById("x_PS").style.width = "80px";
 document.getElementById("x_PV").style.width = "80px";
 document.getElementById("x_RSA").style.width = "80px";
 var c = document.getElementById("el_patient_vitals_profilePic").children;
 var d = c[0].children;
   $("#x_WT").change(function(){
		calculateBmi();
		calculateBSA();
	});
	$("#x_HT").change(function(){
		calculateBmi();
		calculateBSA();
	});

	function calculateBmi() {
		var weight = document.getElementById("x_WT").value
		var height = document.getElementById("x_HT").value
		if(weight > 0 && height > 0){	
			var finalBmi = weight / (height / 100 * height / 100)            
			finalBmi = Math.round(finalBmi * 1000) / 1000;
			if(finalBmi < 18.5){
				finalBmi = finalBmi + " Too Thin";

			   // document.bmiForm.meaning.value = "That you are too thin."
			}
			if(finalBmi > 18.5 && finalBmi < 25){

			   // document.bmiForm.meaning.value = "That you are healthy."
			   finalBmi = finalBmi + " Healthy";
			}
			if(finalBmi > 25){

			   // document.bmiForm.meaning.value = "That you have overweight."
			   finalBmi = finalBmi + " Over Weight";
			}
			document.getElementById("BodyMassIndexValue").innerText = finalBmi;
			document.getElementById("x_BodyMassIndex").value = finalBmi;
		}
		else{

			//alert("Please Fill in everything correctly")
		}
	}

	function callSpatientvitals()
	{		
		document.getElementById("Repagehistoryview").value = "patientvitals";
	}

	function callpatienthistory()
	{		
		document.getElementById("Repagehistoryview").value = "patienthistory";
	}

	function callpatientprovisionaldiagnosis()
	{		
		document.getElementById("Repagehistoryview").value = "patientprovisionaldiagnosis";
	}

	function callpatientprescription()
	{		
		document.getElementById("Repagehistoryview").value = "patientprescription";
	}	

	function callpatientfinaldiagnosis()
	{		
		document.getElementById("Repagehistoryview").value = "patientfinaldiagnosis";
	}

	function callpatientfollowup()
	{		
		document.getElementById("Repagehistoryview").value = "patientfollowup";
	}

	function callpatientotdeliveryregister()
	{		
		document.getElementById("Repagehistoryview").value = "patientotdeliveryregister";
	}

	function callpatientotsurgeryregister()
	{		
		document.getElementById("Repagehistoryview").value = "patientotsurgeryregister";
	}

	function calculateBSA(){
		var weight = document.getElementById("x_WT").value
		var height = document.getElementById("x_HT").value
		if(weight > 0 && height > 0){	
			var bsa = 0;
			bsa = Math.pow(weight,0.425) * Math.pow(height,0.725) * 0.007184;
			bsa = Math.round(bsa * 1000) / 1000;
			document.getElementById("BodySurfaceAreaValue").innerText = bsa;
			document.getElementById("x_SurfaceArea").value = bsa;
		}
		else{

		   // alert("Please Fill in everything correctly")
		}
	}
	 var evalue = d[0].value;

 //document.getElementById("profilePicturePatient").src = 'uploads/' + evalue;
</script>
<?php include_once "footer.php" ?>
<?php
$patient_vitals_edit->terminate();
?>