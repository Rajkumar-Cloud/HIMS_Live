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
$patient_history_add = new patient_history_add();

// Run the page
$patient_history_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_history_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_historyadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpatient_historyadd = currentForm = new ew.Form("fpatient_historyadd", "add");

	// Validate form
	fpatient_historyadd.validate = function() {
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
			<?php if ($patient_history_add->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->mrnno->caption(), $patient_history_add->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->PatientName->caption(), $patient_history_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->PatientId->caption(), $patient_history_add->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_history_add->PatientId->errorMessage()) ?>");
			<?php if ($patient_history_add->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->MobileNumber->caption(), $patient_history_add->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->MaritalHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_MaritalHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->MaritalHistory->caption(), $patient_history_add->MaritalHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->MenstrualHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_MenstrualHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->MenstrualHistory->caption(), $patient_history_add->MenstrualHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->ObstetricHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_ObstetricHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->ObstetricHistory->caption(), $patient_history_add->ObstetricHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->MedicalHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_MedicalHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->MedicalHistory->caption(), $patient_history_add->MedicalHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->SurgicalHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_SurgicalHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->SurgicalHistory->caption(), $patient_history_add->SurgicalHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->PastHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_PastHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->PastHistory->caption(), $patient_history_add->PastHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->TreatmentHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_TreatmentHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->TreatmentHistory->caption(), $patient_history_add->TreatmentHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->FamilyHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_FamilyHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->FamilyHistory->caption(), $patient_history_add->FamilyHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->Age->caption(), $patient_history_add->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->Gender->caption(), $patient_history_add->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->profilePic->caption(), $patient_history_add->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->Complaints->Required) { ?>
				elm = this.getElements("x" + infix + "_Complaints");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->Complaints->caption(), $patient_history_add->Complaints->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->illness->Required) { ?>
				elm = this.getElements("x" + infix + "_illness");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->illness->caption(), $patient_history_add->illness->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->PersonalHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_PersonalHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->PersonalHistory->caption(), $patient_history_add->PersonalHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->PatientSearch->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientSearch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->PatientSearch->caption(), $patient_history_add->PatientSearch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->PatID->caption(), $patient_history_add->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_history_add->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->Reception->caption(), $patient_history_add->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_history_add->Reception->errorMessage()) ?>");
			<?php if ($patient_history_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history_add->HospID->caption(), $patient_history_add->HospID->RequiredErrorMessage)) ?>");
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
	fpatient_historyadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_historyadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_historyadd.lists["x_PatientSearch"] = <?php echo $patient_history_add->PatientSearch->Lookup->toClientList($patient_history_add) ?>;
	fpatient_historyadd.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_history_add->PatientSearch->lookupOptions()) ?>;
	loadjs.done("fpatient_historyadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_history_add->showPageHeader(); ?>
<?php
$patient_history_add->showMessage();
?>
<form name="fpatient_historyadd" id="fpatient_historyadd" class="<?php echo $patient_history_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_history">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_history_add->IsModal ?>">
<?php if ($patient_history->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_history_add->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_history_add->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_history_add->mrnno->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($patient_history_add->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_history_mrnno" for="x_mrnno" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_mrnno" type="text/html"><?php echo $patient_history_add->mrnno->caption() ?><?php echo $patient_history_add->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->mrnno->cellAttributes() ?>>
<?php if ($patient_history_add->mrnno->getSessionValue() != "") { ?>
<script id="tpx_patient_history_mrnno" type="text/html"><span id="el_patient_history_mrnno">
<span<?php echo $patient_history_add->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_history_add->mrnno->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?php echo HtmlEncode($patient_history_add->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_history_mrnno" type="text/html"><span id="el_patient_history_mrnno">
<input type="text" data-table="patient_history" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_add->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_history_add->mrnno->EditValue ?>"<?php echo $patient_history_add->mrnno->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $patient_history_add->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_history_PatientName" for="x_PatientName" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_PatientName" type="text/html"><?php echo $patient_history_add->PatientName->caption() ?><?php echo $patient_history_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->PatientName->cellAttributes() ?>>
<script id="tpx_patient_history_PatientName" type="text/html"><span id="el_patient_history_PatientName">
<input type="text" data-table="patient_history" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_add->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_history_add->PatientName->EditValue ?>"<?php echo $patient_history_add->PatientName->editAttributes() ?>>
</span></script>
<?php echo $patient_history_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_history_PatientId" for="x_PatientId" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_PatientId" type="text/html"><?php echo $patient_history_add->PatientId->caption() ?><?php echo $patient_history_add->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->PatientId->cellAttributes() ?>>
<?php if ($patient_history_add->PatientId->getSessionValue() != "") { ?>
<script id="tpx_patient_history_PatientId" type="text/html"><span id="el_patient_history_PatientId">
<span<?php echo $patient_history_add->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_history_add->PatientId->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_PatientId" name="x_PatientId" value="<?php echo HtmlEncode($patient_history_add->PatientId->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_history_PatientId" type="text/html"><span id="el_patient_history_PatientId">
<input type="text" data-table="patient_history" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_history_add->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_history_add->PatientId->EditValue ?>"<?php echo $patient_history_add->PatientId->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $patient_history_add->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_patient_history_MobileNumber" for="x_MobileNumber" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_MobileNumber" type="text/html"><?php echo $patient_history_add->MobileNumber->caption() ?><?php echo $patient_history_add->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_history_MobileNumber" type="text/html"><span id="el_patient_history_MobileNumber">
<input type="text" data-table="patient_history" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_add->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_history_add->MobileNumber->EditValue ?>"<?php echo $patient_history_add->MobileNumber->editAttributes() ?>>
</span></script>
<?php echo $patient_history_add->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->MaritalHistory->Visible) { // MaritalHistory ?>
	<div id="r_MaritalHistory" class="form-group row">
		<label id="elh_patient_history_MaritalHistory" for="x_MaritalHistory" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_MaritalHistory" type="text/html"><?php echo $patient_history_add->MaritalHistory->caption() ?><?php echo $patient_history_add->MaritalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->MaritalHistory->cellAttributes() ?>>
<script id="tpx_patient_history_MaritalHistory" type="text/html"><span id="el_patient_history_MaritalHistory">
<textarea data-table="patient_history" data-field="x_MaritalHistory" name="x_MaritalHistory" id="x_MaritalHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history_add->MaritalHistory->getPlaceHolder()) ?>"<?php echo $patient_history_add->MaritalHistory->editAttributes() ?>><?php echo $patient_history_add->MaritalHistory->EditValue ?></textarea>
</span></script>
<?php echo $patient_history_add->MaritalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<div id="r_MenstrualHistory" class="form-group row">
		<label id="elh_patient_history_MenstrualHistory" for="x_MenstrualHistory" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_MenstrualHistory" type="text/html"><?php echo $patient_history_add->MenstrualHistory->caption() ?><?php echo $patient_history_add->MenstrualHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_patient_history_MenstrualHistory" type="text/html"><span id="el_patient_history_MenstrualHistory">
<textarea data-table="patient_history" data-field="x_MenstrualHistory" name="x_MenstrualHistory" id="x_MenstrualHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history_add->MenstrualHistory->getPlaceHolder()) ?>"<?php echo $patient_history_add->MenstrualHistory->editAttributes() ?>><?php echo $patient_history_add->MenstrualHistory->EditValue ?></textarea>
</span></script>
<?php echo $patient_history_add->MenstrualHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<div id="r_ObstetricHistory" class="form-group row">
		<label id="elh_patient_history_ObstetricHistory" for="x_ObstetricHistory" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_ObstetricHistory" type="text/html"><?php echo $patient_history_add->ObstetricHistory->caption() ?><?php echo $patient_history_add->ObstetricHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->ObstetricHistory->cellAttributes() ?>>
<script id="tpx_patient_history_ObstetricHistory" type="text/html"><span id="el_patient_history_ObstetricHistory">
<textarea data-table="patient_history" data-field="x_ObstetricHistory" name="x_ObstetricHistory" id="x_ObstetricHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history_add->ObstetricHistory->getPlaceHolder()) ?>"<?php echo $patient_history_add->ObstetricHistory->editAttributes() ?>><?php echo $patient_history_add->ObstetricHistory->EditValue ?></textarea>
</span></script>
<?php echo $patient_history_add->ObstetricHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->MedicalHistory->Visible) { // MedicalHistory ?>
	<div id="r_MedicalHistory" class="form-group row">
		<label id="elh_patient_history_MedicalHistory" for="x_MedicalHistory" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_MedicalHistory" type="text/html"><?php echo $patient_history_add->MedicalHistory->caption() ?><?php echo $patient_history_add->MedicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->MedicalHistory->cellAttributes() ?>>
<script id="tpx_patient_history_MedicalHistory" type="text/html"><span id="el_patient_history_MedicalHistory">
<textarea data-table="patient_history" data-field="x_MedicalHistory" name="x_MedicalHistory" id="x_MedicalHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history_add->MedicalHistory->getPlaceHolder()) ?>"<?php echo $patient_history_add->MedicalHistory->editAttributes() ?>><?php echo $patient_history_add->MedicalHistory->EditValue ?></textarea>
</span></script>
<?php echo $patient_history_add->MedicalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<div id="r_SurgicalHistory" class="form-group row">
		<label id="elh_patient_history_SurgicalHistory" for="x_SurgicalHistory" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_SurgicalHistory" type="text/html"><?php echo $patient_history_add->SurgicalHistory->caption() ?><?php echo $patient_history_add->SurgicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->SurgicalHistory->cellAttributes() ?>>
<script id="tpx_patient_history_SurgicalHistory" type="text/html"><span id="el_patient_history_SurgicalHistory">
<textarea data-table="patient_history" data-field="x_SurgicalHistory" name="x_SurgicalHistory" id="x_SurgicalHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history_add->SurgicalHistory->getPlaceHolder()) ?>"<?php echo $patient_history_add->SurgicalHistory->editAttributes() ?>><?php echo $patient_history_add->SurgicalHistory->EditValue ?></textarea>
</span></script>
<?php echo $patient_history_add->SurgicalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->PastHistory->Visible) { // PastHistory ?>
	<div id="r_PastHistory" class="form-group row">
		<label id="elh_patient_history_PastHistory" for="x_PastHistory" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_PastHistory" type="text/html"><?php echo $patient_history_add->PastHistory->caption() ?><?php echo $patient_history_add->PastHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->PastHistory->cellAttributes() ?>>
<script id="tpx_patient_history_PastHistory" type="text/html"><span id="el_patient_history_PastHistory">
<textarea data-table="patient_history" data-field="x_PastHistory" name="x_PastHistory" id="x_PastHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history_add->PastHistory->getPlaceHolder()) ?>"<?php echo $patient_history_add->PastHistory->editAttributes() ?>><?php echo $patient_history_add->PastHistory->EditValue ?></textarea>
</span></script>
<?php echo $patient_history_add->PastHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->TreatmentHistory->Visible) { // TreatmentHistory ?>
	<div id="r_TreatmentHistory" class="form-group row">
		<label id="elh_patient_history_TreatmentHistory" for="x_TreatmentHistory" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_TreatmentHistory" type="text/html"><?php echo $patient_history_add->TreatmentHistory->caption() ?><?php echo $patient_history_add->TreatmentHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->TreatmentHistory->cellAttributes() ?>>
<script id="tpx_patient_history_TreatmentHistory" type="text/html"><span id="el_patient_history_TreatmentHistory">
<textarea data-table="patient_history" data-field="x_TreatmentHistory" name="x_TreatmentHistory" id="x_TreatmentHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history_add->TreatmentHistory->getPlaceHolder()) ?>"<?php echo $patient_history_add->TreatmentHistory->editAttributes() ?>><?php echo $patient_history_add->TreatmentHistory->EditValue ?></textarea>
</span></script>
<?php echo $patient_history_add->TreatmentHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->FamilyHistory->Visible) { // FamilyHistory ?>
	<div id="r_FamilyHistory" class="form-group row">
		<label id="elh_patient_history_FamilyHistory" for="x_FamilyHistory" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_FamilyHistory" type="text/html"><?php echo $patient_history_add->FamilyHistory->caption() ?><?php echo $patient_history_add->FamilyHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->FamilyHistory->cellAttributes() ?>>
<script id="tpx_patient_history_FamilyHistory" type="text/html"><span id="el_patient_history_FamilyHistory">
<textarea data-table="patient_history" data-field="x_FamilyHistory" name="x_FamilyHistory" id="x_FamilyHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history_add->FamilyHistory->getPlaceHolder()) ?>"<?php echo $patient_history_add->FamilyHistory->editAttributes() ?>><?php echo $patient_history_add->FamilyHistory->EditValue ?></textarea>
</span></script>
<?php echo $patient_history_add->FamilyHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_history_Age" for="x_Age" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_Age" type="text/html"><?php echo $patient_history_add->Age->caption() ?><?php echo $patient_history_add->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->Age->cellAttributes() ?>>
<script id="tpx_patient_history_Age" type="text/html"><span id="el_patient_history_Age">
<input type="text" data-table="patient_history" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_add->Age->getPlaceHolder()) ?>" value="<?php echo $patient_history_add->Age->EditValue ?>"<?php echo $patient_history_add->Age->editAttributes() ?>>
</span></script>
<?php echo $patient_history_add->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_history_Gender" for="x_Gender" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_Gender" type="text/html"><?php echo $patient_history_add->Gender->caption() ?><?php echo $patient_history_add->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->Gender->cellAttributes() ?>>
<script id="tpx_patient_history_Gender" type="text/html"><span id="el_patient_history_Gender">
<input type="text" data-table="patient_history" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_add->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_history_add->Gender->EditValue ?>"<?php echo $patient_history_add->Gender->editAttributes() ?>>
</span></script>
<?php echo $patient_history_add->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_history_profilePic" for="x_profilePic" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_profilePic" type="text/html"><?php echo $patient_history_add->profilePic->caption() ?><?php echo $patient_history_add->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->profilePic->cellAttributes() ?>>
<script id="tpx_patient_history_profilePic" type="text/html"><span id="el_patient_history_profilePic">
<textarea data-table="patient_history" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history_add->profilePic->getPlaceHolder()) ?>"<?php echo $patient_history_add->profilePic->editAttributes() ?>><?php echo $patient_history_add->profilePic->EditValue ?></textarea>
</span></script>
<?php echo $patient_history_add->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->Complaints->Visible) { // Complaints ?>
	<div id="r_Complaints" class="form-group row">
		<label id="elh_patient_history_Complaints" for="x_Complaints" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_Complaints" type="text/html"><?php echo $patient_history_add->Complaints->caption() ?><?php echo $patient_history_add->Complaints->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->Complaints->cellAttributes() ?>>
<script id="tpx_patient_history_Complaints" type="text/html"><span id="el_patient_history_Complaints">
<textarea data-table="patient_history" data-field="x_Complaints" name="x_Complaints" id="x_Complaints" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history_add->Complaints->getPlaceHolder()) ?>"<?php echo $patient_history_add->Complaints->editAttributes() ?>><?php echo $patient_history_add->Complaints->EditValue ?></textarea>
</span></script>
<?php echo $patient_history_add->Complaints->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->illness->Visible) { // illness ?>
	<div id="r_illness" class="form-group row">
		<label id="elh_patient_history_illness" for="x_illness" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_illness" type="text/html"><?php echo $patient_history_add->illness->caption() ?><?php echo $patient_history_add->illness->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->illness->cellAttributes() ?>>
<script id="tpx_patient_history_illness" type="text/html"><span id="el_patient_history_illness">
<textarea data-table="patient_history" data-field="x_illness" name="x_illness" id="x_illness" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history_add->illness->getPlaceHolder()) ?>"<?php echo $patient_history_add->illness->editAttributes() ?>><?php echo $patient_history_add->illness->EditValue ?></textarea>
</span></script>
<?php echo $patient_history_add->illness->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->PersonalHistory->Visible) { // PersonalHistory ?>
	<div id="r_PersonalHistory" class="form-group row">
		<label id="elh_patient_history_PersonalHistory" for="x_PersonalHistory" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_PersonalHistory" type="text/html"><?php echo $patient_history_add->PersonalHistory->caption() ?><?php echo $patient_history_add->PersonalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->PersonalHistory->cellAttributes() ?>>
<script id="tpx_patient_history_PersonalHistory" type="text/html"><span id="el_patient_history_PersonalHistory">
<textarea data-table="patient_history" data-field="x_PersonalHistory" name="x_PersonalHistory" id="x_PersonalHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history_add->PersonalHistory->getPlaceHolder()) ?>"<?php echo $patient_history_add->PersonalHistory->editAttributes() ?>><?php echo $patient_history_add->PersonalHistory->EditValue ?></textarea>
</span></script>
<?php echo $patient_history_add->PersonalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label id="elh_patient_history_PatientSearch" for="x_PatientSearch" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_PatientSearch" type="text/html"><?php echo $patient_history_add->PatientSearch->caption() ?><?php echo $patient_history_add->PatientSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_history_PatientSearch" type="text/html"><span id="el_patient_history_PatientSearch">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo EmptyValue(strval($patient_history_add->PatientSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_history_add->PatientSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_history_add->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_history_add->PatientSearch->ReadOnly || $patient_history_add->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_history_add->PatientSearch->Lookup->getParamTag($patient_history_add, "p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_history" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_history_add->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_history_add->PatientSearch->CurrentValue ?>"<?php echo $patient_history_add->PatientSearch->editAttributes() ?>>
</span></script>
<?php echo $patient_history_add->PatientSearch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_patient_history_PatID" for="x_PatID" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_PatID" type="text/html"><?php echo $patient_history_add->PatID->caption() ?><?php echo $patient_history_add->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->PatID->cellAttributes() ?>>
<script id="tpx_patient_history_PatID" type="text/html"><span id="el_patient_history_PatID">
<input type="text" data-table="patient_history" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_add->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_history_add->PatID->EditValue ?>"<?php echo $patient_history_add->PatID->editAttributes() ?>>
</span></script>
<?php echo $patient_history_add->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history_add->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_history_Reception" for="x_Reception" class="<?php echo $patient_history_add->LeftColumnClass ?>"><script id="tpc_patient_history_Reception" type="text/html"><?php echo $patient_history_add->Reception->caption() ?><?php echo $patient_history_add->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_history_add->RightColumnClass ?>"><div <?php echo $patient_history_add->Reception->cellAttributes() ?>>
<?php if ($patient_history_add->Reception->getSessionValue() != "") { ?>
<script id="tpx_patient_history_Reception" type="text/html"><span id="el_patient_history_Reception">
<span<?php echo $patient_history_add->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_history_add->Reception->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?php echo HtmlEncode($patient_history_add->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_history_Reception" type="text/html"><span id="el_patient_history_Reception">
<input type="text" data-table="patient_history" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_history_add->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_history_add->Reception->EditValue ?>"<?php echo $patient_history_add->Reception->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $patient_history_add->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_historyadd" class="ew-custom-template"></div>
<script id="tpm_patient_historyadd" type="text/html">
<div id="ct_patient_history_add"><style>
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
{{include tmpl="#tpc_patient_history_PatientSearch"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_PatientSearch")/}}	
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_history_profilePic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_profilePic")/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl=~getTemplate("#tpx_SurfaceArea")/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl=~getTemplate("#tpx_BodyMassIndex")/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_history_mrnno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_mrnno")/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_history_Reception"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_Reception")/}}</p> 
  <p>{{include tmpl="#tpc_patient_history_PatientId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_PatientId")/}}</p> 
  <p>{{include tmpl="#tpc_patient_history_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_PatientName")/}}</p> 
  <p>{{include tmpl="#tpc_patient_history_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_Age")/}}</p> 
  <p>{{include tmpl="#tpc_patient_history_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_Gender")/}}</p>
  <p>{{include tmpl="#tpc_patient_history_PatID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_PatID")/}}</p>
  <p>{{include tmpl="#tpc_patient_history_MobileNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_MobileNumber")/}}</p> 
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
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_history_Complaints"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_Complaints")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_illness"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_illness")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_PastHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_PastHistory")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_SurgicalHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_SurgicalHistory")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_PersonalHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_PersonalHistory")/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_history_MaritalHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_MaritalHistory")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_MenstrualHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_MenstrualHistory")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_ObstetricHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_ObstetricHistory")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_FamilyHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_FamilyHistory")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_TreatmentHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_TreatmentHistory")/}}</td></tr>
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

<?php if (!$patient_history_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_history_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_history_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_history->Rows) ?> };
	ew.applyTemplate("tpd_patient_historyadd", "tpm_patient_historyadd", "patient_historyadd", "<?php echo $patient_history->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patient_historyadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_history_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	var c=document.getElementById("el_patient_history_profilePic").children,d=c[0].children,evalue=c[0].innerText;
});
</script>
<?php include_once "footer.php"; ?>
<?php
$patient_history_add->terminate();
?>