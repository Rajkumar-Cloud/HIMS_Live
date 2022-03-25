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
<?php include_once "header.php"; ?>
<script>
var fpatient_vitalsedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpatient_vitalsedit = currentForm = new ew.Form("fpatient_vitalsedit", "edit");

	// Validate form
	fpatient_vitalsedit.validate = function() {
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
			<?php if ($patient_vitals_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->id->caption(), $patient_vitals_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->mrnno->caption(), $patient_vitals_edit->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->PatientName->caption(), $patient_vitals_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->PatID->caption(), $patient_vitals_edit->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->MobileNumber->caption(), $patient_vitals_edit->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->profilePic->caption(), $patient_vitals_edit->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->HT->Required) { ?>
				elm = this.getElements("x" + infix + "_HT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->HT->caption(), $patient_vitals_edit->HT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->WT->Required) { ?>
				elm = this.getElements("x" + infix + "_WT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->WT->caption(), $patient_vitals_edit->WT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->SurfaceArea->Required) { ?>
				elm = this.getElements("x" + infix + "_SurfaceArea");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->SurfaceArea->caption(), $patient_vitals_edit->SurfaceArea->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->BodyMassIndex->Required) { ?>
				elm = this.getElements("x" + infix + "_BodyMassIndex");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->BodyMassIndex->caption(), $patient_vitals_edit->BodyMassIndex->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->ClinicalFindings->Required) { ?>
				elm = this.getElements("x" + infix + "_ClinicalFindings");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->ClinicalFindings->caption(), $patient_vitals_edit->ClinicalFindings->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->ClinicalDiagnosis->Required) { ?>
				elm = this.getElements("x" + infix + "_ClinicalDiagnosis");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->ClinicalDiagnosis->caption(), $patient_vitals_edit->ClinicalDiagnosis->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->AnticoagulantifAny->Required) { ?>
				elm = this.getElements("x" + infix + "_AnticoagulantifAny");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->AnticoagulantifAny->caption(), $patient_vitals_edit->AnticoagulantifAny->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->FoodAllergies->Required) { ?>
				elm = this.getElements("x" + infix + "_FoodAllergies");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->FoodAllergies->caption(), $patient_vitals_edit->FoodAllergies->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->GenericAllergies->Required) { ?>
				elm = this.getElements("x" + infix + "_GenericAllergies[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->GenericAllergies->caption(), $patient_vitals_edit->GenericAllergies->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->GroupAllergies->Required) { ?>
				elm = this.getElements("x" + infix + "_GroupAllergies[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->GroupAllergies->caption(), $patient_vitals_edit->GroupAllergies->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->Temp->Required) { ?>
				elm = this.getElements("x" + infix + "_Temp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->Temp->caption(), $patient_vitals_edit->Temp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->Pulse->Required) { ?>
				elm = this.getElements("x" + infix + "_Pulse");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->Pulse->caption(), $patient_vitals_edit->Pulse->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->BP->Required) { ?>
				elm = this.getElements("x" + infix + "_BP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->BP->caption(), $patient_vitals_edit->BP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->PR->Required) { ?>
				elm = this.getElements("x" + infix + "_PR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->PR->caption(), $patient_vitals_edit->PR->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->CNS->Required) { ?>
				elm = this.getElements("x" + infix + "_CNS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->CNS->caption(), $patient_vitals_edit->CNS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->RSA->Required) { ?>
				elm = this.getElements("x" + infix + "_RSA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->RSA->caption(), $patient_vitals_edit->RSA->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->CVS->Required) { ?>
				elm = this.getElements("x" + infix + "_CVS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->CVS->caption(), $patient_vitals_edit->CVS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->PA->Required) { ?>
				elm = this.getElements("x" + infix + "_PA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->PA->caption(), $patient_vitals_edit->PA->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->PS->Required) { ?>
				elm = this.getElements("x" + infix + "_PS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->PS->caption(), $patient_vitals_edit->PS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->PV->Required) { ?>
				elm = this.getElements("x" + infix + "_PV");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->PV->caption(), $patient_vitals_edit->PV->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->clinicaldetails->Required) { ?>
				elm = this.getElements("x" + infix + "_clinicaldetails[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->clinicaldetails->caption(), $patient_vitals_edit->clinicaldetails->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->status->caption(), $patient_vitals_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->modifiedby->caption(), $patient_vitals_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->modifieddatetime->caption(), $patient_vitals_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->Age->caption(), $patient_vitals_edit->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->Gender->caption(), $patient_vitals_edit->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->PatientSearch->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientSearch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->PatientSearch->caption(), $patient_vitals_edit->PatientSearch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->PatientId->caption(), $patient_vitals_edit->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->Reception->caption(), $patient_vitals_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_edit->HospID->caption(), $patient_vitals_edit->HospID->RequiredErrorMessage)) ?>");
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
	fpatient_vitalsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_vitalsedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_vitalsedit.lists["x_AnticoagulantifAny"] = <?php echo $patient_vitals_edit->AnticoagulantifAny->Lookup->toClientList($patient_vitals_edit) ?>;
	fpatient_vitalsedit.lists["x_AnticoagulantifAny"].options = <?php echo JsonEncode($patient_vitals_edit->AnticoagulantifAny->lookupOptions()) ?>;
	fpatient_vitalsedit.autoSuggests["x_AnticoagulantifAny"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_vitalsedit.lists["x_GenericAllergies[]"] = <?php echo $patient_vitals_edit->GenericAllergies->Lookup->toClientList($patient_vitals_edit) ?>;
	fpatient_vitalsedit.lists["x_GenericAllergies[]"].options = <?php echo JsonEncode($patient_vitals_edit->GenericAllergies->lookupOptions()) ?>;
	fpatient_vitalsedit.lists["x_GroupAllergies[]"] = <?php echo $patient_vitals_edit->GroupAllergies->Lookup->toClientList($patient_vitals_edit) ?>;
	fpatient_vitalsedit.lists["x_GroupAllergies[]"].options = <?php echo JsonEncode($patient_vitals_edit->GroupAllergies->lookupOptions()) ?>;
	fpatient_vitalsedit.lists["x_clinicaldetails[]"] = <?php echo $patient_vitals_edit->clinicaldetails->Lookup->toClientList($patient_vitals_edit) ?>;
	fpatient_vitalsedit.lists["x_clinicaldetails[]"].options = <?php echo JsonEncode($patient_vitals_edit->clinicaldetails->lookupOptions()) ?>;
	fpatient_vitalsedit.lists["x_status"] = <?php echo $patient_vitals_edit->status->Lookup->toClientList($patient_vitals_edit) ?>;
	fpatient_vitalsedit.lists["x_status"].options = <?php echo JsonEncode($patient_vitals_edit->status->lookupOptions()) ?>;
	fpatient_vitalsedit.lists["x_PatientSearch"] = <?php echo $patient_vitals_edit->PatientSearch->Lookup->toClientList($patient_vitals_edit) ?>;
	fpatient_vitalsedit.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_vitals_edit->PatientSearch->lookupOptions()) ?>;
	loadjs.done("fpatient_vitalsedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_vitals_edit->showPageHeader(); ?>
<?php
$patient_vitals_edit->showMessage();
?>
<form name="fpatient_vitalsedit" id="fpatient_vitalsedit" class="<?php echo $patient_vitals_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_vitals">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_vitals_edit->IsModal ?>">
<?php if ($patient_vitals->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_vitals_edit->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_vitals_edit->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_vitals_edit->mrnno->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($patient_vitals_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_vitals_id" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_id" type="text/html"><?php echo $patient_vitals_edit->id->caption() ?><?php echo $patient_vitals_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->id->cellAttributes() ?>>
<script id="tpx_patient_vitals_id" type="text/html"><span id="el_patient_vitals_id">
<span<?php echo $patient_vitals_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_vitals_edit->id->CurrentValue) ?>">
<?php echo $patient_vitals_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_vitals_mrnno" for="x_mrnno" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_mrnno" type="text/html"><?php echo $patient_vitals_edit->mrnno->caption() ?><?php echo $patient_vitals_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->mrnno->cellAttributes() ?>>
<script id="tpx_patient_vitals_mrnno" type="text/html"><span id="el_patient_vitals_mrnno">
<span<?php echo $patient_vitals_edit->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_edit->mrnno->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($patient_vitals_edit->mrnno->CurrentValue) ?>">
<?php echo $patient_vitals_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_vitals_PatientName" for="x_PatientName" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_PatientName" type="text/html"><?php echo $patient_vitals_edit->PatientName->caption() ?><?php echo $patient_vitals_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->PatientName->cellAttributes() ?>>
<script id="tpx_patient_vitals_PatientName" type="text/html"><span id="el_patient_vitals_PatientName">
<span<?php echo $patient_vitals_edit->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_edit->PatientName->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" value="<?php echo HtmlEncode($patient_vitals_edit->PatientName->CurrentValue) ?>">
<?php echo $patient_vitals_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_patient_vitals_PatID" for="x_PatID" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_PatID" type="text/html"><?php echo $patient_vitals_edit->PatID->caption() ?><?php echo $patient_vitals_edit->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->PatID->cellAttributes() ?>>
<script id="tpx_patient_vitals_PatID" type="text/html"><span id="el_patient_vitals_PatID">
<span<?php echo $patient_vitals_edit->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_edit->PatID->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="x_PatID" id="x_PatID" value="<?php echo HtmlEncode($patient_vitals_edit->PatID->CurrentValue) ?>">
<?php echo $patient_vitals_edit->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_patient_vitals_MobileNumber" for="x_MobileNumber" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_MobileNumber" type="text/html"><?php echo $patient_vitals_edit->MobileNumber->caption() ?><?php echo $patient_vitals_edit->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_vitals_MobileNumber" type="text/html"><span id="el_patient_vitals_MobileNumber">
<input type="text" data-table="patient_vitals" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->MobileNumber->EditValue ?>"<?php echo $patient_vitals_edit->MobileNumber->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_vitals_profilePic" for="x_profilePic" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_profilePic" type="text/html"><?php echo $patient_vitals_edit->profilePic->caption() ?><?php echo $patient_vitals_edit->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->profilePic->cellAttributes() ?>>
<script id="tpx_patient_vitals_profilePic" type="text/html"><span id="el_patient_vitals_profilePic">
<input type="text" data-table="patient_vitals" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" placeholder="<?php echo HtmlEncode($patient_vitals_edit->profilePic->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->profilePic->EditValue ?>"<?php echo $patient_vitals_edit->profilePic->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->HT->Visible) { // HT ?>
	<div id="r_HT" class="form-group row">
		<label id="elh_patient_vitals_HT" for="x_HT" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_HT" type="text/html"><?php echo $patient_vitals_edit->HT->caption() ?><?php echo $patient_vitals_edit->HT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->HT->cellAttributes() ?>>
<script id="tpx_patient_vitals_HT" type="text/html"><span id="el_patient_vitals_HT">
<input type="text" data-table="patient_vitals" data-field="x_HT" name="x_HT" id="x_HT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals_edit->HT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->HT->EditValue ?>"<?php echo $patient_vitals_edit->HT->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->HT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->WT->Visible) { // WT ?>
	<div id="r_WT" class="form-group row">
		<label id="elh_patient_vitals_WT" for="x_WT" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_WT" type="text/html"><?php echo $patient_vitals_edit->WT->caption() ?><?php echo $patient_vitals_edit->WT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->WT->cellAttributes() ?>>
<script id="tpx_patient_vitals_WT" type="text/html"><span id="el_patient_vitals_WT">
<input type="text" data-table="patient_vitals" data-field="x_WT" name="x_WT" id="x_WT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals_edit->WT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->WT->EditValue ?>"<?php echo $patient_vitals_edit->WT->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->WT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->SurfaceArea->Visible) { // SurfaceArea ?>
	<div id="r_SurfaceArea" class="form-group row">
		<label id="elh_patient_vitals_SurfaceArea" for="x_SurfaceArea" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_SurfaceArea" type="text/html"><?php echo $patient_vitals_edit->SurfaceArea->caption() ?><?php echo $patient_vitals_edit->SurfaceArea->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->SurfaceArea->cellAttributes() ?>>
<script id="tpx_patient_vitals_SurfaceArea" type="text/html"><span id="el_patient_vitals_SurfaceArea">
<input type="text" data-table="patient_vitals" data-field="x_SurfaceArea" name="x_SurfaceArea" id="x_SurfaceArea" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->SurfaceArea->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->SurfaceArea->EditValue ?>"<?php echo $patient_vitals_edit->SurfaceArea->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->SurfaceArea->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->BodyMassIndex->Visible) { // BodyMassIndex ?>
	<div id="r_BodyMassIndex" class="form-group row">
		<label id="elh_patient_vitals_BodyMassIndex" for="x_BodyMassIndex" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_BodyMassIndex" type="text/html"><?php echo $patient_vitals_edit->BodyMassIndex->caption() ?><?php echo $patient_vitals_edit->BodyMassIndex->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->BodyMassIndex->cellAttributes() ?>>
<script id="tpx_patient_vitals_BodyMassIndex" type="text/html"><span id="el_patient_vitals_BodyMassIndex">
<input type="text" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x_BodyMassIndex" id="x_BodyMassIndex" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->BodyMassIndex->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->BodyMassIndex->EditValue ?>"<?php echo $patient_vitals_edit->BodyMassIndex->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->BodyMassIndex->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->ClinicalFindings->Visible) { // ClinicalFindings ?>
	<div id="r_ClinicalFindings" class="form-group row">
		<label id="elh_patient_vitals_ClinicalFindings" for="x_ClinicalFindings" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_ClinicalFindings" type="text/html"><?php echo $patient_vitals_edit->ClinicalFindings->caption() ?><?php echo $patient_vitals_edit->ClinicalFindings->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->ClinicalFindings->cellAttributes() ?>>
<script id="tpx_patient_vitals_ClinicalFindings" type="text/html"><span id="el_patient_vitals_ClinicalFindings">
<textarea data-table="patient_vitals" data-field="x_ClinicalFindings" name="x_ClinicalFindings" id="x_ClinicalFindings" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_vitals_edit->ClinicalFindings->getPlaceHolder()) ?>"<?php echo $patient_vitals_edit->ClinicalFindings->editAttributes() ?>><?php echo $patient_vitals_edit->ClinicalFindings->EditValue ?></textarea>
</span></script>
<?php echo $patient_vitals_edit->ClinicalFindings->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->ClinicalDiagnosis->Visible) { // ClinicalDiagnosis ?>
	<div id="r_ClinicalDiagnosis" class="form-group row">
		<label id="elh_patient_vitals_ClinicalDiagnosis" for="x_ClinicalDiagnosis" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_ClinicalDiagnosis" type="text/html"><?php echo $patient_vitals_edit->ClinicalDiagnosis->caption() ?><?php echo $patient_vitals_edit->ClinicalDiagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->ClinicalDiagnosis->cellAttributes() ?>>
<script id="tpx_patient_vitals_ClinicalDiagnosis" type="text/html"><span id="el_patient_vitals_ClinicalDiagnosis">
<textarea data-table="patient_vitals" data-field="x_ClinicalDiagnosis" name="x_ClinicalDiagnosis" id="x_ClinicalDiagnosis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_vitals_edit->ClinicalDiagnosis->getPlaceHolder()) ?>"<?php echo $patient_vitals_edit->ClinicalDiagnosis->editAttributes() ?>><?php echo $patient_vitals_edit->ClinicalDiagnosis->EditValue ?></textarea>
</span></script>
<?php echo $patient_vitals_edit->ClinicalDiagnosis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
	<div id="r_AnticoagulantifAny" class="form-group row">
		<label id="elh_patient_vitals_AnticoagulantifAny" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_AnticoagulantifAny" type="text/html"><?php echo $patient_vitals_edit->AnticoagulantifAny->caption() ?><?php echo $patient_vitals_edit->AnticoagulantifAny->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->AnticoagulantifAny->cellAttributes() ?>>
<script id="tpx_patient_vitals_AnticoagulantifAny" type="text/html"><span id="el_patient_vitals_AnticoagulantifAny">
<?php
$onchange = $patient_vitals_edit->AnticoagulantifAny->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_vitals_edit->AnticoagulantifAny->EditAttrs["onchange"] = "";
?>
<span id="as_x_AnticoagulantifAny">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_AnticoagulantifAny" id="sv_x_AnticoagulantifAny" value="<?php echo RemoveHtml($patient_vitals_edit->AnticoagulantifAny->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->AnticoagulantifAny->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_vitals_edit->AnticoagulantifAny->getPlaceHolder()) ?>"<?php echo $patient_vitals_edit->AnticoagulantifAny->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals_edit->AnticoagulantifAny->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_AnticoagulantifAny',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?php echo ($patient_vitals_edit->AnticoagulantifAny->ReadOnly || $patient_vitals_edit->AnticoagulantifAny->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_vitals_edit->AnticoagulantifAny->displayValueSeparatorAttribute() ?>" name="x_AnticoagulantifAny" id="x_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals_edit->AnticoagulantifAny->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_vitals_edit->AnticoagulantifAny->Lookup->getParamTag($patient_vitals_edit, "p_x_AnticoagulantifAny") ?>
</span></script>
<script type="text/html" class="patient_vitalsedit_js">
loadjs.ready(["fpatient_vitalsedit"], function() {
	fpatient_vitalsedit.createAutoSuggest({"id":"x_AnticoagulantifAny","forceSelect":true});
});
</script>
<?php echo $patient_vitals_edit->AnticoagulantifAny->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->FoodAllergies->Visible) { // FoodAllergies ?>
	<div id="r_FoodAllergies" class="form-group row">
		<label id="elh_patient_vitals_FoodAllergies" for="x_FoodAllergies" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_FoodAllergies" type="text/html"><?php echo $patient_vitals_edit->FoodAllergies->caption() ?><?php echo $patient_vitals_edit->FoodAllergies->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->FoodAllergies->cellAttributes() ?>>
<script id="tpx_patient_vitals_FoodAllergies" type="text/html"><span id="el_patient_vitals_FoodAllergies">
<input type="text" data-table="patient_vitals" data-field="x_FoodAllergies" name="x_FoodAllergies" id="x_FoodAllergies" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->FoodAllergies->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->FoodAllergies->EditValue ?>"<?php echo $patient_vitals_edit->FoodAllergies->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->FoodAllergies->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->GenericAllergies->Visible) { // GenericAllergies ?>
	<div id="r_GenericAllergies" class="form-group row">
		<label id="elh_patient_vitals_GenericAllergies" for="x_GenericAllergies" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_GenericAllergies" type="text/html"><?php echo $patient_vitals_edit->GenericAllergies->caption() ?><?php echo $patient_vitals_edit->GenericAllergies->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->GenericAllergies->cellAttributes() ?>>
<script id="tpx_patient_vitals_GenericAllergies" type="text/html"><span id="el_patient_vitals_GenericAllergies">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GenericAllergies"><?php echo EmptyValue(strval($patient_vitals_edit->GenericAllergies->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_vitals_edit->GenericAllergies->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals_edit->GenericAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_vitals_edit->GenericAllergies->ReadOnly || $patient_vitals_edit->GenericAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GenericAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals_edit->GenericAllergies->Lookup->getParamTag($patient_vitals_edit, "p_x_GenericAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals_edit->GenericAllergies->displayValueSeparatorAttribute() ?>" name="x_GenericAllergies[]" id="x_GenericAllergies[]" value="<?php echo $patient_vitals_edit->GenericAllergies->CurrentValue ?>"<?php echo $patient_vitals_edit->GenericAllergies->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->GenericAllergies->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->GroupAllergies->Visible) { // GroupAllergies ?>
	<div id="r_GroupAllergies" class="form-group row">
		<label id="elh_patient_vitals_GroupAllergies" for="x_GroupAllergies" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_GroupAllergies" type="text/html"><?php echo $patient_vitals_edit->GroupAllergies->caption() ?><?php echo $patient_vitals_edit->GroupAllergies->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->GroupAllergies->cellAttributes() ?>>
<script id="tpx_patient_vitals_GroupAllergies" type="text/html"><span id="el_patient_vitals_GroupAllergies">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GroupAllergies"><?php echo EmptyValue(strval($patient_vitals_edit->GroupAllergies->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_vitals_edit->GroupAllergies->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals_edit->GroupAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_vitals_edit->GroupAllergies->ReadOnly || $patient_vitals_edit->GroupAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GroupAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals_edit->GroupAllergies->Lookup->getParamTag($patient_vitals_edit, "p_x_GroupAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals_edit->GroupAllergies->displayValueSeparatorAttribute() ?>" name="x_GroupAllergies[]" id="x_GroupAllergies[]" value="<?php echo $patient_vitals_edit->GroupAllergies->CurrentValue ?>"<?php echo $patient_vitals_edit->GroupAllergies->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->GroupAllergies->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->Temp->Visible) { // Temp ?>
	<div id="r_Temp" class="form-group row">
		<label id="elh_patient_vitals_Temp" for="x_Temp" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_Temp" type="text/html"><?php echo $patient_vitals_edit->Temp->caption() ?><?php echo $patient_vitals_edit->Temp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->Temp->cellAttributes() ?>>
<script id="tpx_patient_vitals_Temp" type="text/html"><span id="el_patient_vitals_Temp">
<input type="text" data-table="patient_vitals" data-field="x_Temp" name="x_Temp" id="x_Temp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->Temp->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->Temp->EditValue ?>"<?php echo $patient_vitals_edit->Temp->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->Temp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->Pulse->Visible) { // Pulse ?>
	<div id="r_Pulse" class="form-group row">
		<label id="elh_patient_vitals_Pulse" for="x_Pulse" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_Pulse" type="text/html"><?php echo $patient_vitals_edit->Pulse->caption() ?><?php echo $patient_vitals_edit->Pulse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->Pulse->cellAttributes() ?>>
<script id="tpx_patient_vitals_Pulse" type="text/html"><span id="el_patient_vitals_Pulse">
<input type="text" data-table="patient_vitals" data-field="x_Pulse" name="x_Pulse" id="x_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->Pulse->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->Pulse->EditValue ?>"<?php echo $patient_vitals_edit->Pulse->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->Pulse->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->BP->Visible) { // BP ?>
	<div id="r_BP" class="form-group row">
		<label id="elh_patient_vitals_BP" for="x_BP" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_BP" type="text/html"><?php echo $patient_vitals_edit->BP->caption() ?><?php echo $patient_vitals_edit->BP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->BP->cellAttributes() ?>>
<script id="tpx_patient_vitals_BP" type="text/html"><span id="el_patient_vitals_BP">
<input type="text" data-table="patient_vitals" data-field="x_BP" name="x_BP" id="x_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->BP->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->BP->EditValue ?>"<?php echo $patient_vitals_edit->BP->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->BP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->PR->Visible) { // PR ?>
	<div id="r_PR" class="form-group row">
		<label id="elh_patient_vitals_PR" for="x_PR" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_PR" type="text/html"><?php echo $patient_vitals_edit->PR->caption() ?><?php echo $patient_vitals_edit->PR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->PR->cellAttributes() ?>>
<script id="tpx_patient_vitals_PR" type="text/html"><span id="el_patient_vitals_PR">
<input type="text" data-table="patient_vitals" data-field="x_PR" name="x_PR" id="x_PR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->PR->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->PR->EditValue ?>"<?php echo $patient_vitals_edit->PR->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->PR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->CNS->Visible) { // CNS ?>
	<div id="r_CNS" class="form-group row">
		<label id="elh_patient_vitals_CNS" for="x_CNS" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_CNS" type="text/html"><?php echo $patient_vitals_edit->CNS->caption() ?><?php echo $patient_vitals_edit->CNS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->CNS->cellAttributes() ?>>
<script id="tpx_patient_vitals_CNS" type="text/html"><span id="el_patient_vitals_CNS">
<input type="text" data-table="patient_vitals" data-field="x_CNS" name="x_CNS" id="x_CNS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->CNS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->CNS->EditValue ?>"<?php echo $patient_vitals_edit->CNS->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->CNS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->RSA->Visible) { // RSA ?>
	<div id="r_RSA" class="form-group row">
		<label id="elh_patient_vitals_RSA" for="x_RSA" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_RSA" type="text/html"><?php echo $patient_vitals_edit->RSA->caption() ?><?php echo $patient_vitals_edit->RSA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->RSA->cellAttributes() ?>>
<script id="tpx_patient_vitals_RSA" type="text/html"><span id="el_patient_vitals_RSA">
<input type="text" data-table="patient_vitals" data-field="x_RSA" name="x_RSA" id="x_RSA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->RSA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->RSA->EditValue ?>"<?php echo $patient_vitals_edit->RSA->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->RSA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->CVS->Visible) { // CVS ?>
	<div id="r_CVS" class="form-group row">
		<label id="elh_patient_vitals_CVS" for="x_CVS" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_CVS" type="text/html"><?php echo $patient_vitals_edit->CVS->caption() ?><?php echo $patient_vitals_edit->CVS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->CVS->cellAttributes() ?>>
<script id="tpx_patient_vitals_CVS" type="text/html"><span id="el_patient_vitals_CVS">
<input type="text" data-table="patient_vitals" data-field="x_CVS" name="x_CVS" id="x_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->CVS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->CVS->EditValue ?>"<?php echo $patient_vitals_edit->CVS->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->CVS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->PA->Visible) { // PA ?>
	<div id="r_PA" class="form-group row">
		<label id="elh_patient_vitals_PA" for="x_PA" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_PA" type="text/html"><?php echo $patient_vitals_edit->PA->caption() ?><?php echo $patient_vitals_edit->PA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->PA->cellAttributes() ?>>
<script id="tpx_patient_vitals_PA" type="text/html"><span id="el_patient_vitals_PA">
<input type="text" data-table="patient_vitals" data-field="x_PA" name="x_PA" id="x_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->PA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->PA->EditValue ?>"<?php echo $patient_vitals_edit->PA->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->PA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->PS->Visible) { // PS ?>
	<div id="r_PS" class="form-group row">
		<label id="elh_patient_vitals_PS" for="x_PS" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_PS" type="text/html"><?php echo $patient_vitals_edit->PS->caption() ?><?php echo $patient_vitals_edit->PS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->PS->cellAttributes() ?>>
<script id="tpx_patient_vitals_PS" type="text/html"><span id="el_patient_vitals_PS">
<input type="text" data-table="patient_vitals" data-field="x_PS" name="x_PS" id="x_PS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->PS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->PS->EditValue ?>"<?php echo $patient_vitals_edit->PS->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->PS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->PV->Visible) { // PV ?>
	<div id="r_PV" class="form-group row">
		<label id="elh_patient_vitals_PV" for="x_PV" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_PV" type="text/html"><?php echo $patient_vitals_edit->PV->caption() ?><?php echo $patient_vitals_edit->PV->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->PV->cellAttributes() ?>>
<script id="tpx_patient_vitals_PV" type="text/html"><span id="el_patient_vitals_PV">
<input type="text" data-table="patient_vitals" data-field="x_PV" name="x_PV" id="x_PV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->PV->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->PV->EditValue ?>"<?php echo $patient_vitals_edit->PV->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->PV->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->clinicaldetails->Visible) { // clinicaldetails ?>
	<div id="r_clinicaldetails" class="form-group row">
		<label id="elh_patient_vitals_clinicaldetails" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_clinicaldetails" type="text/html"><?php echo $patient_vitals_edit->clinicaldetails->caption() ?><?php echo $patient_vitals_edit->clinicaldetails->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->clinicaldetails->cellAttributes() ?>>
<script id="tpx_patient_vitals_clinicaldetails" type="text/html"><span id="el_patient_vitals_clinicaldetails">
<div id="tp_x_clinicaldetails" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_vitals" data-field="x_clinicaldetails" data-value-separator="<?php echo $patient_vitals_edit->clinicaldetails->displayValueSeparatorAttribute() ?>" name="x_clinicaldetails[]" id="x_clinicaldetails[]" value="{value}"<?php echo $patient_vitals_edit->clinicaldetails->editAttributes() ?>></div>
<div id="dsl_x_clinicaldetails" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_vitals_edit->clinicaldetails->checkBoxListHtml(FALSE, "x_clinicaldetails[]") ?>
</div></div>
<?php echo $patient_vitals_edit->clinicaldetails->Lookup->getParamTag($patient_vitals_edit, "p_x_clinicaldetails") ?>
</span></script>
<?php echo $patient_vitals_edit->clinicaldetails->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_vitals_status" for="x_status" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_status" type="text/html"><?php echo $patient_vitals_edit->status->caption() ?><?php echo $patient_vitals_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->status->cellAttributes() ?>>
<script id="tpx_patient_vitals_status" type="text/html"><span id="el_patient_vitals_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_vitals" data-field="x_status" data-value-separator="<?php echo $patient_vitals_edit->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_vitals_edit->status->editAttributes() ?>>
			<?php echo $patient_vitals_edit->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $patient_vitals_edit->status->Lookup->getParamTag($patient_vitals_edit, "p_x_status") ?>
</span></script>
<?php echo $patient_vitals_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_vitals_Age" for="x_Age" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_Age" type="text/html"><?php echo $patient_vitals_edit->Age->caption() ?><?php echo $patient_vitals_edit->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->Age->cellAttributes() ?>>
<script id="tpx_patient_vitals_Age" type="text/html"><span id="el_patient_vitals_Age">
<input type="text" data-table="patient_vitals" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->Age->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->Age->EditValue ?>"<?php echo $patient_vitals_edit->Age->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_vitals_Gender" for="x_Gender" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_Gender" type="text/html"><?php echo $patient_vitals_edit->Gender->caption() ?><?php echo $patient_vitals_edit->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->Gender->cellAttributes() ?>>
<script id="tpx_patient_vitals_Gender" type="text/html"><span id="el_patient_vitals_Gender">
<input type="text" data-table="patient_vitals" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_edit->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_edit->Gender->EditValue ?>"<?php echo $patient_vitals_edit->Gender->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label id="elh_patient_vitals_PatientSearch" for="x_PatientSearch" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_PatientSearch" type="text/html"><?php echo $patient_vitals_edit->PatientSearch->caption() ?><?php echo $patient_vitals_edit->PatientSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_vitals_PatientSearch" type="text/html"><span id="el_patient_vitals_PatientSearch">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo EmptyValue(strval($patient_vitals_edit->PatientSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_vitals_edit->PatientSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals_edit->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_vitals_edit->PatientSearch->ReadOnly || $patient_vitals_edit->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals_edit->PatientSearch->Lookup->getParamTag($patient_vitals_edit, "p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_vitals_edit->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_vitals_edit->PatientSearch->CurrentValue ?>"<?php echo $patient_vitals_edit->PatientSearch->editAttributes() ?>>
</span></script>
<?php echo $patient_vitals_edit->PatientSearch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_vitals_PatientId" for="x_PatientId" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_PatientId" type="text/html"><?php echo $patient_vitals_edit->PatientId->caption() ?><?php echo $patient_vitals_edit->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->PatientId->cellAttributes() ?>>
<script id="tpx_patient_vitals_PatientId" type="text/html"><span id="el_patient_vitals_PatientId">
<span<?php echo $patient_vitals_edit->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_edit->PatientId->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" value="<?php echo HtmlEncode($patient_vitals_edit->PatientId->CurrentValue) ?>">
<?php echo $patient_vitals_edit->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_vitals_Reception" for="x_Reception" class="<?php echo $patient_vitals_edit->LeftColumnClass ?>"><script id="tpc_patient_vitals_Reception" type="text/html"><?php echo $patient_vitals_edit->Reception->caption() ?><?php echo $patient_vitals_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_vitals_edit->RightColumnClass ?>"><div <?php echo $patient_vitals_edit->Reception->cellAttributes() ?>>
<script id="tpx_patient_vitals_Reception" type="text/html"><span id="el_patient_vitals_Reception">
<span<?php echo $patient_vitals_edit->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_edit->Reception->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($patient_vitals_edit->Reception->CurrentValue) ?>">
<?php echo $patient_vitals_edit->Reception->CustomMsg ?></div></div>
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
<div hidden>
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_vitals_PatientSearch"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_PatientSearch")/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_vitals_profilePic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_profilePic")/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpc_patient_vitals_SurfaceArea"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_SurfaceArea")/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpc_patient_vitals_BodyMassIndex"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_BodyMassIndex")/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_vitals_mrnno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_mrnno")/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_vitals_Reception"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_Reception")/}}</p> 
  <p>{{include tmpl="#tpc_patient_vitals_PatientId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_PatientId")/}}</p> 
  <p>{{include tmpl="#tpc_patient_vitals_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_PatientName")/}}</p> 
  <p>{{include tmpl="#tpc_patient_vitals_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_Age")/}}</p> 
  <p>{{include tmpl="#tpc_patient_vitals_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_Gender")/}}</p>
  <p>{{include tmpl="#tpc_patient_vitals_PatID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_PatID")/}}</p>
  <p>{{include tmpl="#tpc_patient_vitals_MobileNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_MobileNumber")/}}</p> 
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
				<span class="info-box-text">{{include tmpl="#tpc_patient_vitals_HT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_HT")/}}</span>
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
				<span class="info-box-text">{{include tmpl="#tpc_patient_vitals_WT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_WT")/}}</span>
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
			  {{include tmpl="#tpc_patient_vitals_ClinicalFindings"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_ClinicalFindings")/}}
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  {{include tmpl="#tpc_patient_vitals_ClinicalDiagnosis"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_ClinicalDiagnosis")/}}
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
						<tr><td>{{include tmpl="#tpc_patient_vitals_FoodAllergies"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_FoodAllergies")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_vitals_AnticoagulantifAny"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_AnticoagulantifAny")/}}</td></tr>						
						<tr><td>{{include tmpl="#tpc_patient_vitals_GenericAllergies"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_GenericAllergies")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_vitals_GroupAllergies"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_GroupAllergies")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_vitals_clinicaldetails"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_clinicaldetails")/}}</td></tr>
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
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_Temp"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_Temp")/}} F</td><td>{{include tmpl="#tpc_patient_vitals_BP"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_BP")/}} mm of Hg</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_Pulse"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_Pulse")/}} beats/min</td><td>{{include tmpl="#tpc_patient_vitals_PR"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_PR")/}} breaths/min</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_CNS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_CNS")/}}</td><td>{{include tmpl="#tpc_patient_vitals_RSA"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_RSA")/}}</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_CVS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_CVS")/}}</td><td>{{include tmpl="#tpc_patient_vitals_PA"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_PA")/}}</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_PS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_PS")/}}</td><td>{{include tmpl="#tpc_patient_vitals_PV"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_PV")/}}</td></tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
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
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_vitals->Rows) ?> };
	ew.applyTemplate("tpd_patient_vitalsedit", "tpm_patient_vitalsedit", "patient_vitalsedit", "<?php echo $patient_vitals->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patient_vitalsedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_vitals_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	document.getElementById("x_HT").style.width="80px",document.getElementById("x_WT").style.width="80px",document.getElementById("x_Temp").style.width="80px",document.getElementById("x_Pulse").style.width="80px",document.getElementById("x_BP").style.width="80px",document.getElementById("x_PR").style.width="80px",document.getElementById("x_CNS").style.width="80px",document.getElementById("x_CVS").style.width="80px",document.getElementById("x_PA").style.width="80px",document.getElementById("x_PS").style.width="80px",document.getElementById("x_PV").style.width="80px",document.getElementById("x_RSA").style.width="80px";var c=document.getElementById("el_patient_vitals_profilePic").children,d=c[0].children;function calculateBmi(){var e=document.getElementById("x_WT").value,t=document.getElementById("x_HT").value;if(e>0&&t>0){var d=e/(t/100*t/100);(d=Math.round(1e3*d)/1e3)<18.5&&(d+=" Too Thin"),d>18.5&&d<25&&(d+=" Healthy"),d>25&&(d+=" Over Weight"),document.getElementById("BodyMassIndexValue").innerText=d,document.getElementById("x_BodyMassIndex").value=d}}function calculateBSA(){var e=document.getElementById("x_WT").value,t=document.getElementById("x_HT").value;if(e>0&&t>0){var d=0;d=Math.pow(e,.425)*Math.pow(t,.725)*.007184,d=Math.round(1e3*d)/1e3,document.getElementById("BodySurfaceAreaValue").innerText=d,document.getElementById("x_SurfaceArea").value=d}}$("#x_WT").change(function(){calculateBmi(),calculateBSA()}),$("#x_HT").change(function(){calculateBmi(),calculateBSA()});var evalue=d[0].value;
});
</script>
<?php include_once "footer.php"; ?>
<?php
$patient_vitals_edit->terminate();
?>