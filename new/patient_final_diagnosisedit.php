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
$patient_final_diagnosis_edit = new patient_final_diagnosis_edit();

// Run the page
$patient_final_diagnosis_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_final_diagnosis_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_final_diagnosisedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpatient_final_diagnosisedit = currentForm = new ew.Form("fpatient_final_diagnosisedit", "edit");

	// Validate form
	fpatient_final_diagnosisedit.validate = function() {
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
			<?php if ($patient_final_diagnosis_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_edit->id->caption(), $patient_final_diagnosis_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_edit->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_edit->PatID->caption(), $patient_final_diagnosis_edit->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_edit->PatientName->caption(), $patient_final_diagnosis_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_edit->mrnno->caption(), $patient_final_diagnosis_edit->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_edit->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_edit->MobileNumber->caption(), $patient_final_diagnosis_edit->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_edit->FinalDiagnosis->Required) { ?>
				elm = this.getElements("x" + infix + "_FinalDiagnosis");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_edit->FinalDiagnosis->caption(), $patient_final_diagnosis_edit->FinalDiagnosis->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_edit->Treatments->Required) { ?>
				elm = this.getElements("x" + infix + "_Treatments");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_edit->Treatments->caption(), $patient_final_diagnosis_edit->Treatments->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_edit->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_edit->Age->caption(), $patient_final_diagnosis_edit->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_edit->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_edit->Gender->caption(), $patient_final_diagnosis_edit->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_edit->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_edit->profilePic->caption(), $patient_final_diagnosis_edit->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_edit->FinalDiagnosisTemplate->Required) { ?>
				elm = this.getElements("x" + infix + "_FinalDiagnosisTemplate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_edit->FinalDiagnosisTemplate->caption(), $patient_final_diagnosis_edit->FinalDiagnosisTemplate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_edit->TreatmentsTemplate->Required) { ?>
				elm = this.getElements("x" + infix + "_TreatmentsTemplate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_edit->TreatmentsTemplate->caption(), $patient_final_diagnosis_edit->TreatmentsTemplate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_edit->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_edit->PatientId->caption(), $patient_final_diagnosis_edit->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_edit->Reception->caption(), $patient_final_diagnosis_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_edit->HospID->caption(), $patient_final_diagnosis_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_edit->PatientSearch->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientSearch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_edit->PatientSearch->caption(), $patient_final_diagnosis_edit->PatientSearch->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fpatient_final_diagnosisedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_final_diagnosisedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_final_diagnosisedit.lists["x_FinalDiagnosisTemplate"] = <?php echo $patient_final_diagnosis_edit->FinalDiagnosisTemplate->Lookup->toClientList($patient_final_diagnosis_edit) ?>;
	fpatient_final_diagnosisedit.lists["x_FinalDiagnosisTemplate"].options = <?php echo JsonEncode($patient_final_diagnosis_edit->FinalDiagnosisTemplate->lookupOptions()) ?>;
	fpatient_final_diagnosisedit.lists["x_TreatmentsTemplate"] = <?php echo $patient_final_diagnosis_edit->TreatmentsTemplate->Lookup->toClientList($patient_final_diagnosis_edit) ?>;
	fpatient_final_diagnosisedit.lists["x_TreatmentsTemplate"].options = <?php echo JsonEncode($patient_final_diagnosis_edit->TreatmentsTemplate->lookupOptions()) ?>;
	fpatient_final_diagnosisedit.lists["x_PatientSearch"] = <?php echo $patient_final_diagnosis_edit->PatientSearch->Lookup->toClientList($patient_final_diagnosis_edit) ?>;
	fpatient_final_diagnosisedit.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_final_diagnosis_edit->PatientSearch->lookupOptions()) ?>;
	loadjs.done("fpatient_final_diagnosisedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_final_diagnosis_edit->showPageHeader(); ?>
<?php
$patient_final_diagnosis_edit->showMessage();
?>
<form name="fpatient_final_diagnosisedit" id="fpatient_final_diagnosisedit" class="<?php echo $patient_final_diagnosis_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_final_diagnosis">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_final_diagnosis_edit->IsModal ?>">
<?php if ($patient_final_diagnosis->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_final_diagnosis_edit->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_final_diagnosis_edit->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_final_diagnosis_edit->mrnno->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($patient_final_diagnosis_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_final_diagnosis_id" class="<?php echo $patient_final_diagnosis_edit->LeftColumnClass ?>"><script id="tpc_patient_final_diagnosis_id" type="text/html"><?php echo $patient_final_diagnosis_edit->id->caption() ?><?php echo $patient_final_diagnosis_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_final_diagnosis_edit->RightColumnClass ?>"><div <?php echo $patient_final_diagnosis_edit->id->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_id" type="text/html"><span id="el_patient_final_diagnosis_id">
<span<?php echo $patient_final_diagnosis_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_final_diagnosis_edit->id->CurrentValue) ?>">
<?php echo $patient_final_diagnosis_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_final_diagnosis_edit->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_patient_final_diagnosis_PatID" for="x_PatID" class="<?php echo $patient_final_diagnosis_edit->LeftColumnClass ?>"><script id="tpc_patient_final_diagnosis_PatID" type="text/html"><?php echo $patient_final_diagnosis_edit->PatID->caption() ?><?php echo $patient_final_diagnosis_edit->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_final_diagnosis_edit->RightColumnClass ?>"><div <?php echo $patient_final_diagnosis_edit->PatID->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_PatID" type="text/html"><span id="el_patient_final_diagnosis_PatID">
<input type="text" data-table="patient_final_diagnosis" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_edit->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_edit->PatID->EditValue ?>"<?php echo $patient_final_diagnosis_edit->PatID->editAttributes() ?>>
</span></script>
<?php echo $patient_final_diagnosis_edit->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_final_diagnosis_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_final_diagnosis_PatientName" for="x_PatientName" class="<?php echo $patient_final_diagnosis_edit->LeftColumnClass ?>"><script id="tpc_patient_final_diagnosis_PatientName" type="text/html"><?php echo $patient_final_diagnosis_edit->PatientName->caption() ?><?php echo $patient_final_diagnosis_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_final_diagnosis_edit->RightColumnClass ?>"><div <?php echo $patient_final_diagnosis_edit->PatientName->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_PatientName" type="text/html"><span id="el_patient_final_diagnosis_PatientName">
<input type="text" data-table="patient_final_diagnosis" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_edit->PatientName->EditValue ?>"<?php echo $patient_final_diagnosis_edit->PatientName->editAttributes() ?>>
</span></script>
<?php echo $patient_final_diagnosis_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_final_diagnosis_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_final_diagnosis_mrnno" for="x_mrnno" class="<?php echo $patient_final_diagnosis_edit->LeftColumnClass ?>"><script id="tpc_patient_final_diagnosis_mrnno" type="text/html"><?php echo $patient_final_diagnosis_edit->mrnno->caption() ?><?php echo $patient_final_diagnosis_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_final_diagnosis_edit->RightColumnClass ?>"><div <?php echo $patient_final_diagnosis_edit->mrnno->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_mrnno" type="text/html"><span id="el_patient_final_diagnosis_mrnno">
<span<?php echo $patient_final_diagnosis_edit->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_edit->mrnno->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($patient_final_diagnosis_edit->mrnno->CurrentValue) ?>">
<?php echo $patient_final_diagnosis_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_final_diagnosis_edit->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_patient_final_diagnosis_MobileNumber" for="x_MobileNumber" class="<?php echo $patient_final_diagnosis_edit->LeftColumnClass ?>"><script id="tpc_patient_final_diagnosis_MobileNumber" type="text/html"><?php echo $patient_final_diagnosis_edit->MobileNumber->caption() ?><?php echo $patient_final_diagnosis_edit->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_final_diagnosis_edit->RightColumnClass ?>"><div <?php echo $patient_final_diagnosis_edit->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_MobileNumber" type="text/html"><span id="el_patient_final_diagnosis_MobileNumber">
<input type="text" data-table="patient_final_diagnosis" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_edit->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_edit->MobileNumber->EditValue ?>"<?php echo $patient_final_diagnosis_edit->MobileNumber->editAttributes() ?>>
</span></script>
<?php echo $patient_final_diagnosis_edit->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_final_diagnosis_edit->FinalDiagnosis->Visible) { // FinalDiagnosis ?>
	<div id="r_FinalDiagnosis" class="form-group row">
		<label id="elh_patient_final_diagnosis_FinalDiagnosis" class="<?php echo $patient_final_diagnosis_edit->LeftColumnClass ?>"><script id="tpc_patient_final_diagnosis_FinalDiagnosis" type="text/html"><?php echo $patient_final_diagnosis_edit->FinalDiagnosis->caption() ?><?php echo $patient_final_diagnosis_edit->FinalDiagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_final_diagnosis_edit->RightColumnClass ?>"><div <?php echo $patient_final_diagnosis_edit->FinalDiagnosis->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_FinalDiagnosis" type="text/html"><span id="el_patient_final_diagnosis_FinalDiagnosis">
<?php $patient_final_diagnosis_edit->FinalDiagnosis->EditAttrs->appendClass("editor"); ?>
<textarea data-table="patient_final_diagnosis" data-field="x_FinalDiagnosis" name="x_FinalDiagnosis" id="x_FinalDiagnosis" cols="35" rows="25" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_edit->FinalDiagnosis->getPlaceHolder()) ?>"<?php echo $patient_final_diagnosis_edit->FinalDiagnosis->editAttributes() ?>><?php echo $patient_final_diagnosis_edit->FinalDiagnosis->EditValue ?></textarea>
</span></script>
<script type="text/html" class="patient_final_diagnosisedit_js">
loadjs.ready(["fpatient_final_diagnosisedit", "editor"], function() {
	ew.createEditor("fpatient_final_diagnosisedit", "x_FinalDiagnosis", 35, 25, <?php echo $patient_final_diagnosis_edit->FinalDiagnosis->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $patient_final_diagnosis_edit->FinalDiagnosis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_final_diagnosis_edit->Treatments->Visible) { // Treatments ?>
	<div id="r_Treatments" class="form-group row">
		<label id="elh_patient_final_diagnosis_Treatments" class="<?php echo $patient_final_diagnosis_edit->LeftColumnClass ?>"><script id="tpc_patient_final_diagnosis_Treatments" type="text/html"><?php echo $patient_final_diagnosis_edit->Treatments->caption() ?><?php echo $patient_final_diagnosis_edit->Treatments->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_final_diagnosis_edit->RightColumnClass ?>"><div <?php echo $patient_final_diagnosis_edit->Treatments->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_Treatments" type="text/html"><span id="el_patient_final_diagnosis_Treatments">
<?php $patient_final_diagnosis_edit->Treatments->EditAttrs->appendClass("editor"); ?>
<textarea data-table="patient_final_diagnosis" data-field="x_Treatments" name="x_Treatments" id="x_Treatments" cols="35" rows="25" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_edit->Treatments->getPlaceHolder()) ?>"<?php echo $patient_final_diagnosis_edit->Treatments->editAttributes() ?>><?php echo $patient_final_diagnosis_edit->Treatments->EditValue ?></textarea>
</span></script>
<script type="text/html" class="patient_final_diagnosisedit_js">
loadjs.ready(["fpatient_final_diagnosisedit", "editor"], function() {
	ew.createEditor("fpatient_final_diagnosisedit", "x_Treatments", 35, 25, <?php echo $patient_final_diagnosis_edit->Treatments->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $patient_final_diagnosis_edit->Treatments->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_final_diagnosis_edit->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_final_diagnosis_Age" for="x_Age" class="<?php echo $patient_final_diagnosis_edit->LeftColumnClass ?>"><script id="tpc_patient_final_diagnosis_Age" type="text/html"><?php echo $patient_final_diagnosis_edit->Age->caption() ?><?php echo $patient_final_diagnosis_edit->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_final_diagnosis_edit->RightColumnClass ?>"><div <?php echo $patient_final_diagnosis_edit->Age->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_Age" type="text/html"><span id="el_patient_final_diagnosis_Age">
<input type="text" data-table="patient_final_diagnosis" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_edit->Age->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_edit->Age->EditValue ?>"<?php echo $patient_final_diagnosis_edit->Age->editAttributes() ?>>
</span></script>
<?php echo $patient_final_diagnosis_edit->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_final_diagnosis_edit->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_final_diagnosis_Gender" for="x_Gender" class="<?php echo $patient_final_diagnosis_edit->LeftColumnClass ?>"><script id="tpc_patient_final_diagnosis_Gender" type="text/html"><?php echo $patient_final_diagnosis_edit->Gender->caption() ?><?php echo $patient_final_diagnosis_edit->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_final_diagnosis_edit->RightColumnClass ?>"><div <?php echo $patient_final_diagnosis_edit->Gender->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_Gender" type="text/html"><span id="el_patient_final_diagnosis_Gender">
<input type="text" data-table="patient_final_diagnosis" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_edit->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_edit->Gender->EditValue ?>"<?php echo $patient_final_diagnosis_edit->Gender->editAttributes() ?>>
</span></script>
<?php echo $patient_final_diagnosis_edit->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_final_diagnosis_edit->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_final_diagnosis_profilePic" for="x_profilePic" class="<?php echo $patient_final_diagnosis_edit->LeftColumnClass ?>"><script id="tpc_patient_final_diagnosis_profilePic" type="text/html"><?php echo $patient_final_diagnosis_edit->profilePic->caption() ?><?php echo $patient_final_diagnosis_edit->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_final_diagnosis_edit->RightColumnClass ?>"><div <?php echo $patient_final_diagnosis_edit->profilePic->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_profilePic" type="text/html"><span id="el_patient_final_diagnosis_profilePic">
<textarea data-table="patient_final_diagnosis" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_edit->profilePic->getPlaceHolder()) ?>"<?php echo $patient_final_diagnosis_edit->profilePic->editAttributes() ?>><?php echo $patient_final_diagnosis_edit->profilePic->EditValue ?></textarea>
</span></script>
<?php echo $patient_final_diagnosis_edit->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_final_diagnosis_edit->FinalDiagnosisTemplate->Visible) { // FinalDiagnosisTemplate ?>
	<div id="r_FinalDiagnosisTemplate" class="form-group row">
		<label id="elh_patient_final_diagnosis_FinalDiagnosisTemplate" for="x_FinalDiagnosisTemplate" class="<?php echo $patient_final_diagnosis_edit->LeftColumnClass ?>"><script id="tpc_patient_final_diagnosis_FinalDiagnosisTemplate" type="text/html"><?php echo $patient_final_diagnosis_edit->FinalDiagnosisTemplate->caption() ?><?php echo $patient_final_diagnosis_edit->FinalDiagnosisTemplate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_final_diagnosis_edit->RightColumnClass ?>"><div <?php echo $patient_final_diagnosis_edit->FinalDiagnosisTemplate->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_FinalDiagnosisTemplate" type="text/html"><span id="el_patient_final_diagnosis_FinalDiagnosisTemplate">
<?php $patient_final_diagnosis_edit->FinalDiagnosisTemplate->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_final_diagnosis" data-field="x_FinalDiagnosisTemplate" data-value-separator="<?php echo $patient_final_diagnosis_edit->FinalDiagnosisTemplate->displayValueSeparatorAttribute() ?>" id="x_FinalDiagnosisTemplate" name="x_FinalDiagnosisTemplate"<?php echo $patient_final_diagnosis_edit->FinalDiagnosisTemplate->editAttributes() ?>>
			<?php echo $patient_final_diagnosis_edit->FinalDiagnosisTemplate->selectOptionListHtml("x_FinalDiagnosisTemplate") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$patient_final_diagnosis_edit->FinalDiagnosisTemplate->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_FinalDiagnosisTemplate" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_final_diagnosis_edit->FinalDiagnosisTemplate->caption() ?>" data-title="<?php echo $patient_final_diagnosis_edit->FinalDiagnosisTemplate->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_FinalDiagnosisTemplate',url:'mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $patient_final_diagnosis_edit->FinalDiagnosisTemplate->Lookup->getParamTag($patient_final_diagnosis_edit, "p_x_FinalDiagnosisTemplate") ?>
</span></script>
<?php echo $patient_final_diagnosis_edit->FinalDiagnosisTemplate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_final_diagnosis_edit->TreatmentsTemplate->Visible) { // TreatmentsTemplate ?>
	<div id="r_TreatmentsTemplate" class="form-group row">
		<label id="elh_patient_final_diagnosis_TreatmentsTemplate" for="x_TreatmentsTemplate" class="<?php echo $patient_final_diagnosis_edit->LeftColumnClass ?>"><script id="tpc_patient_final_diagnosis_TreatmentsTemplate" type="text/html"><?php echo $patient_final_diagnosis_edit->TreatmentsTemplate->caption() ?><?php echo $patient_final_diagnosis_edit->TreatmentsTemplate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_final_diagnosis_edit->RightColumnClass ?>"><div <?php echo $patient_final_diagnosis_edit->TreatmentsTemplate->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_TreatmentsTemplate" type="text/html"><span id="el_patient_final_diagnosis_TreatmentsTemplate">
<?php $patient_final_diagnosis_edit->TreatmentsTemplate->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_final_diagnosis" data-field="x_TreatmentsTemplate" data-value-separator="<?php echo $patient_final_diagnosis_edit->TreatmentsTemplate->displayValueSeparatorAttribute() ?>" id="x_TreatmentsTemplate" name="x_TreatmentsTemplate"<?php echo $patient_final_diagnosis_edit->TreatmentsTemplate->editAttributes() ?>>
			<?php echo $patient_final_diagnosis_edit->TreatmentsTemplate->selectOptionListHtml("x_TreatmentsTemplate") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$patient_final_diagnosis_edit->TreatmentsTemplate->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TreatmentsTemplate" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_final_diagnosis_edit->TreatmentsTemplate->caption() ?>" data-title="<?php echo $patient_final_diagnosis_edit->TreatmentsTemplate->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TreatmentsTemplate',url:'mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $patient_final_diagnosis_edit->TreatmentsTemplate->Lookup->getParamTag($patient_final_diagnosis_edit, "p_x_TreatmentsTemplate") ?>
</span></script>
<?php echo $patient_final_diagnosis_edit->TreatmentsTemplate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_final_diagnosis_edit->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_final_diagnosis_PatientId" for="x_PatientId" class="<?php echo $patient_final_diagnosis_edit->LeftColumnClass ?>"><script id="tpc_patient_final_diagnosis_PatientId" type="text/html"><?php echo $patient_final_diagnosis_edit->PatientId->caption() ?><?php echo $patient_final_diagnosis_edit->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_final_diagnosis_edit->RightColumnClass ?>"><div <?php echo $patient_final_diagnosis_edit->PatientId->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_PatientId" type="text/html"><span id="el_patient_final_diagnosis_PatientId">
<span<?php echo $patient_final_diagnosis_edit->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_edit->PatientId->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" value="<?php echo HtmlEncode($patient_final_diagnosis_edit->PatientId->CurrentValue) ?>">
<?php echo $patient_final_diagnosis_edit->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_final_diagnosis_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_final_diagnosis_Reception" for="x_Reception" class="<?php echo $patient_final_diagnosis_edit->LeftColumnClass ?>"><script id="tpc_patient_final_diagnosis_Reception" type="text/html"><?php echo $patient_final_diagnosis_edit->Reception->caption() ?><?php echo $patient_final_diagnosis_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_final_diagnosis_edit->RightColumnClass ?>"><div <?php echo $patient_final_diagnosis_edit->Reception->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_Reception" type="text/html"><span id="el_patient_final_diagnosis_Reception">
<span<?php echo $patient_final_diagnosis_edit->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_edit->Reception->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($patient_final_diagnosis_edit->Reception->CurrentValue) ?>">
<?php echo $patient_final_diagnosis_edit->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_final_diagnosis_edit->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label id="elh_patient_final_diagnosis_PatientSearch" for="x_PatientSearch" class="<?php echo $patient_final_diagnosis_edit->LeftColumnClass ?>"><script id="tpc_patient_final_diagnosis_PatientSearch" type="text/html"><?php echo $patient_final_diagnosis_edit->PatientSearch->caption() ?><?php echo $patient_final_diagnosis_edit->PatientSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_final_diagnosis_edit->RightColumnClass ?>"><div <?php echo $patient_final_diagnosis_edit->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_PatientSearch" type="text/html"><span id="el_patient_final_diagnosis_PatientSearch">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo EmptyValue(strval($patient_final_diagnosis_edit->PatientSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_final_diagnosis_edit->PatientSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_final_diagnosis_edit->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_final_diagnosis_edit->PatientSearch->ReadOnly || $patient_final_diagnosis_edit->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_final_diagnosis_edit->PatientSearch->Lookup->getParamTag($patient_final_diagnosis_edit, "p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_final_diagnosis_edit->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_final_diagnosis_edit->PatientSearch->CurrentValue ?>"<?php echo $patient_final_diagnosis_edit->PatientSearch->editAttributes() ?>>
</span></script>
<?php echo $patient_final_diagnosis_edit->PatientSearch->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_final_diagnosisedit" class="ew-custom-template"></div>
<script id="tpm_patient_final_diagnosisedit" type="text/html">
<div id="ct_patient_final_diagnosis_edit"><style>
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
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_final_diagnosis where id='".$vviid."'; ";
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
<div hidden>
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_final_diagnosis_PatientSearch"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_PatientSearch")/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_final_diagnosis_profilePic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_profilePic")/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl=~getTemplate("#tpx_SurfaceArea")/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl=~getTemplate("#tpx_BodyMassIndex")/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_final_diagnosis_mrnno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_mrnno")/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_final_diagnosis_Reception"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_Reception")/}}</p> 
  <p>{{include tmpl="#tpc_patient_final_diagnosis_PatientId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_PatientId")/}}</p> 
  <p>{{include tmpl="#tpc_patient_final_diagnosis_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_PatientName")/}}</p> 
  <p>{{include tmpl="#tpc_patient_final_diagnosis_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_Age")/}}</p> 
  <p>{{include tmpl="#tpc_patient_final_diagnosis_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_Gender")/}}</p>
  <p>{{include tmpl="#tpc_patient_final_diagnosis_PatID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_PatID")/}}</p>
  <p>{{include tmpl="#tpc_patient_final_diagnosis_MobileNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_MobileNumber")/}}</p> 
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
{{include tmpl="#tpc_patient_final_diagnosis_FinalDiagnosisTemplate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_FinalDiagnosisTemplate")/}}
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info" style="color:#ac3973;">             
			  <div class="card-body">
			  {{include tmpl="#tpc_patient_final_diagnosis_FinalDiagnosis"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_FinalDiagnosis")/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
{{include tmpl="#tpc_patient_final_diagnosis_TreatmentsTemplate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_TreatmentsTemplate")/}}
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info" style="color:#8a8a5c;">             
			  <div class="card-body">
			  {{include tmpl="#tpc_patient_final_diagnosis_Treatments"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_Treatments")/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>	
</div>
</script>

<?php if (!$patient_final_diagnosis_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_final_diagnosis_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_final_diagnosis_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_final_diagnosis->Rows) ?> };
	ew.applyTemplate("tpd_patient_final_diagnosisedit", "tpm_patient_final_diagnosisedit", "patient_final_diagnosisedit", "<?php echo $patient_final_diagnosis->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patient_final_diagnosisedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_final_diagnosis_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$patient_final_diagnosis_edit->terminate();
?>