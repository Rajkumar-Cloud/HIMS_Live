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
$patient_provisional_diagnosis_add = new patient_provisional_diagnosis_add();

// Run the page
$patient_provisional_diagnosis_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_provisional_diagnosis_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_provisional_diagnosisadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpatient_provisional_diagnosisadd = currentForm = new ew.Form("fpatient_provisional_diagnosisadd", "add");

	// Validate form
	fpatient_provisional_diagnosisadd.validate = function() {
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
			<?php if ($patient_provisional_diagnosis_add->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis_add->mrnno->caption(), $patient_provisional_diagnosis_add->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_provisional_diagnosis_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis_add->PatientName->caption(), $patient_provisional_diagnosis_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_provisional_diagnosis_add->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis_add->PatID->caption(), $patient_provisional_diagnosis_add->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_provisional_diagnosis_add->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis_add->MobileNumber->caption(), $patient_provisional_diagnosis_add->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_provisional_diagnosis_add->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis_add->Reception->caption(), $patient_provisional_diagnosis_add->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_provisional_diagnosis_add->Reception->errorMessage()) ?>");
			<?php if ($patient_provisional_diagnosis_add->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis_add->PatientId->caption(), $patient_provisional_diagnosis_add->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_provisional_diagnosis_add->PatientId->errorMessage()) ?>");
			<?php if ($patient_provisional_diagnosis_add->provisional_diagnosis->Required) { ?>
				elm = this.getElements("x" + infix + "_provisional_diagnosis");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis_add->provisional_diagnosis->caption(), $patient_provisional_diagnosis_add->provisional_diagnosis->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_provisional_diagnosis_add->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis_add->Age->caption(), $patient_provisional_diagnosis_add->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_provisional_diagnosis_add->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis_add->Gender->caption(), $patient_provisional_diagnosis_add->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_provisional_diagnosis_add->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis_add->profilePic->caption(), $patient_provisional_diagnosis_add->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->Required) { ?>
				elm = this.getElements("x" + infix + "_provisionaldiagnosisTemplate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->caption(), $patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_provisional_diagnosis_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis_add->HospID->caption(), $patient_provisional_diagnosis_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_provisional_diagnosis_add->PatientSearch->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientSearch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis_add->PatientSearch->caption(), $patient_provisional_diagnosis_add->PatientSearch->RequiredErrorMessage)) ?>");
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
	fpatient_provisional_diagnosisadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_provisional_diagnosisadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_provisional_diagnosisadd.lists["x_provisionaldiagnosisTemplate"] = <?php echo $patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->Lookup->toClientList($patient_provisional_diagnosis_add) ?>;
	fpatient_provisional_diagnosisadd.lists["x_provisionaldiagnosisTemplate"].options = <?php echo JsonEncode($patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->lookupOptions()) ?>;
	fpatient_provisional_diagnosisadd.lists["x_PatientSearch"] = <?php echo $patient_provisional_diagnosis_add->PatientSearch->Lookup->toClientList($patient_provisional_diagnosis_add) ?>;
	fpatient_provisional_diagnosisadd.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_provisional_diagnosis_add->PatientSearch->lookupOptions()) ?>;
	loadjs.done("fpatient_provisional_diagnosisadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_provisional_diagnosis_add->showPageHeader(); ?>
<?php
$patient_provisional_diagnosis_add->showMessage();
?>
<form name="fpatient_provisional_diagnosisadd" id="fpatient_provisional_diagnosisadd" class="<?php echo $patient_provisional_diagnosis_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_provisional_diagnosis">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_provisional_diagnosis_add->IsModal ?>">
<?php if ($patient_provisional_diagnosis->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_provisional_diagnosis_add->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_provisional_diagnosis_add->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_provisional_diagnosis_add->mrnno->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($patient_provisional_diagnosis_add->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_provisional_diagnosis_mrnno" for="x_mrnno" class="<?php echo $patient_provisional_diagnosis_add->LeftColumnClass ?>"><script id="tpc_patient_provisional_diagnosis_mrnno" type="text/html"><?php echo $patient_provisional_diagnosis_add->mrnno->caption() ?><?php echo $patient_provisional_diagnosis_add->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_provisional_diagnosis_add->RightColumnClass ?>"><div <?php echo $patient_provisional_diagnosis_add->mrnno->cellAttributes() ?>>
<?php if ($patient_provisional_diagnosis_add->mrnno->getSessionValue() != "") { ?>
<script id="tpx_patient_provisional_diagnosis_mrnno" type="text/html"><span id="el_patient_provisional_diagnosis_mrnno">
<span<?php echo $patient_provisional_diagnosis_add->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_provisional_diagnosis_add->mrnno->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?php echo HtmlEncode($patient_provisional_diagnosis_add->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_provisional_diagnosis_mrnno" type="text/html"><span id="el_patient_provisional_diagnosis_mrnno">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis_add->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis_add->mrnno->EditValue ?>"<?php echo $patient_provisional_diagnosis_add->mrnno->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $patient_provisional_diagnosis_add->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_provisional_diagnosis_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_provisional_diagnosis_PatientName" for="x_PatientName" class="<?php echo $patient_provisional_diagnosis_add->LeftColumnClass ?>"><script id="tpc_patient_provisional_diagnosis_PatientName" type="text/html"><?php echo $patient_provisional_diagnosis_add->PatientName->caption() ?><?php echo $patient_provisional_diagnosis_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_provisional_diagnosis_add->RightColumnClass ?>"><div <?php echo $patient_provisional_diagnosis_add->PatientName->cellAttributes() ?>>
<script id="tpx_patient_provisional_diagnosis_PatientName" type="text/html"><span id="el_patient_provisional_diagnosis_PatientName">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis_add->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis_add->PatientName->EditValue ?>"<?php echo $patient_provisional_diagnosis_add->PatientName->editAttributes() ?>>
</span></script>
<?php echo $patient_provisional_diagnosis_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_provisional_diagnosis_add->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_patient_provisional_diagnosis_PatID" for="x_PatID" class="<?php echo $patient_provisional_diagnosis_add->LeftColumnClass ?>"><script id="tpc_patient_provisional_diagnosis_PatID" type="text/html"><?php echo $patient_provisional_diagnosis_add->PatID->caption() ?><?php echo $patient_provisional_diagnosis_add->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_provisional_diagnosis_add->RightColumnClass ?>"><div <?php echo $patient_provisional_diagnosis_add->PatID->cellAttributes() ?>>
<script id="tpx_patient_provisional_diagnosis_PatID" type="text/html"><span id="el_patient_provisional_diagnosis_PatID">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis_add->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis_add->PatID->EditValue ?>"<?php echo $patient_provisional_diagnosis_add->PatID->editAttributes() ?>>
</span></script>
<?php echo $patient_provisional_diagnosis_add->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_provisional_diagnosis_add->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_patient_provisional_diagnosis_MobileNumber" for="x_MobileNumber" class="<?php echo $patient_provisional_diagnosis_add->LeftColumnClass ?>"><script id="tpc_patient_provisional_diagnosis_MobileNumber" type="text/html"><?php echo $patient_provisional_diagnosis_add->MobileNumber->caption() ?><?php echo $patient_provisional_diagnosis_add->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_provisional_diagnosis_add->RightColumnClass ?>"><div <?php echo $patient_provisional_diagnosis_add->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_provisional_diagnosis_MobileNumber" type="text/html"><span id="el_patient_provisional_diagnosis_MobileNumber">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis_add->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis_add->MobileNumber->EditValue ?>"<?php echo $patient_provisional_diagnosis_add->MobileNumber->editAttributes() ?>>
</span></script>
<?php echo $patient_provisional_diagnosis_add->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_provisional_diagnosis_add->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_provisional_diagnosis_Reception" for="x_Reception" class="<?php echo $patient_provisional_diagnosis_add->LeftColumnClass ?>"><script id="tpc_patient_provisional_diagnosis_Reception" type="text/html"><?php echo $patient_provisional_diagnosis_add->Reception->caption() ?><?php echo $patient_provisional_diagnosis_add->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_provisional_diagnosis_add->RightColumnClass ?>"><div <?php echo $patient_provisional_diagnosis_add->Reception->cellAttributes() ?>>
<?php if ($patient_provisional_diagnosis_add->Reception->getSessionValue() != "") { ?>
<script id="tpx_patient_provisional_diagnosis_Reception" type="text/html"><span id="el_patient_provisional_diagnosis_Reception">
<span<?php echo $patient_provisional_diagnosis_add->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_provisional_diagnosis_add->Reception->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?php echo HtmlEncode($patient_provisional_diagnosis_add->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_provisional_diagnosis_Reception" type="text/html"><span id="el_patient_provisional_diagnosis_Reception">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis_add->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis_add->Reception->EditValue ?>"<?php echo $patient_provisional_diagnosis_add->Reception->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $patient_provisional_diagnosis_add->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_provisional_diagnosis_add->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_provisional_diagnosis_PatientId" for="x_PatientId" class="<?php echo $patient_provisional_diagnosis_add->LeftColumnClass ?>"><script id="tpc_patient_provisional_diagnosis_PatientId" type="text/html"><?php echo $patient_provisional_diagnosis_add->PatientId->caption() ?><?php echo $patient_provisional_diagnosis_add->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_provisional_diagnosis_add->RightColumnClass ?>"><div <?php echo $patient_provisional_diagnosis_add->PatientId->cellAttributes() ?>>
<?php if ($patient_provisional_diagnosis_add->PatientId->getSessionValue() != "") { ?>
<script id="tpx_patient_provisional_diagnosis_PatientId" type="text/html"><span id="el_patient_provisional_diagnosis_PatientId">
<span<?php echo $patient_provisional_diagnosis_add->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_provisional_diagnosis_add->PatientId->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_PatientId" name="x_PatientId" value="<?php echo HtmlEncode($patient_provisional_diagnosis_add->PatientId->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_provisional_diagnosis_PatientId" type="text/html"><span id="el_patient_provisional_diagnosis_PatientId">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis_add->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis_add->PatientId->EditValue ?>"<?php echo $patient_provisional_diagnosis_add->PatientId->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $patient_provisional_diagnosis_add->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_provisional_diagnosis_add->provisional_diagnosis->Visible) { // provisional_diagnosis ?>
	<div id="r_provisional_diagnosis" class="form-group row">
		<label id="elh_patient_provisional_diagnosis_provisional_diagnosis" class="<?php echo $patient_provisional_diagnosis_add->LeftColumnClass ?>"><script id="tpc_patient_provisional_diagnosis_provisional_diagnosis" type="text/html"><?php echo $patient_provisional_diagnosis_add->provisional_diagnosis->caption() ?><?php echo $patient_provisional_diagnosis_add->provisional_diagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_provisional_diagnosis_add->RightColumnClass ?>"><div <?php echo $patient_provisional_diagnosis_add->provisional_diagnosis->cellAttributes() ?>>
<script id="tpx_patient_provisional_diagnosis_provisional_diagnosis" type="text/html"><span id="el_patient_provisional_diagnosis_provisional_diagnosis">
<?php $patient_provisional_diagnosis_add->provisional_diagnosis->EditAttrs->appendClass("editor"); ?>
<textarea data-table="patient_provisional_diagnosis" data-field="x_provisional_diagnosis" name="x_provisional_diagnosis" id="x_provisional_diagnosis" cols="35" rows="25" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis_add->provisional_diagnosis->getPlaceHolder()) ?>"<?php echo $patient_provisional_diagnosis_add->provisional_diagnosis->editAttributes() ?>><?php echo $patient_provisional_diagnosis_add->provisional_diagnosis->EditValue ?></textarea>
</span></script>
<script type="text/html" class="patient_provisional_diagnosisadd_js">
loadjs.ready(["fpatient_provisional_diagnosisadd", "editor"], function() {
	ew.createEditor("fpatient_provisional_diagnosisadd", "x_provisional_diagnosis", 35, 25, <?php echo $patient_provisional_diagnosis_add->provisional_diagnosis->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $patient_provisional_diagnosis_add->provisional_diagnosis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_provisional_diagnosis_add->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_provisional_diagnosis_Age" for="x_Age" class="<?php echo $patient_provisional_diagnosis_add->LeftColumnClass ?>"><script id="tpc_patient_provisional_diagnosis_Age" type="text/html"><?php echo $patient_provisional_diagnosis_add->Age->caption() ?><?php echo $patient_provisional_diagnosis_add->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_provisional_diagnosis_add->RightColumnClass ?>"><div <?php echo $patient_provisional_diagnosis_add->Age->cellAttributes() ?>>
<script id="tpx_patient_provisional_diagnosis_Age" type="text/html"><span id="el_patient_provisional_diagnosis_Age">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis_add->Age->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis_add->Age->EditValue ?>"<?php echo $patient_provisional_diagnosis_add->Age->editAttributes() ?>>
</span></script>
<?php echo $patient_provisional_diagnosis_add->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_provisional_diagnosis_add->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_provisional_diagnosis_Gender" for="x_Gender" class="<?php echo $patient_provisional_diagnosis_add->LeftColumnClass ?>"><script id="tpc_patient_provisional_diagnosis_Gender" type="text/html"><?php echo $patient_provisional_diagnosis_add->Gender->caption() ?><?php echo $patient_provisional_diagnosis_add->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_provisional_diagnosis_add->RightColumnClass ?>"><div <?php echo $patient_provisional_diagnosis_add->Gender->cellAttributes() ?>>
<script id="tpx_patient_provisional_diagnosis_Gender" type="text/html"><span id="el_patient_provisional_diagnosis_Gender">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis_add->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis_add->Gender->EditValue ?>"<?php echo $patient_provisional_diagnosis_add->Gender->editAttributes() ?>>
</span></script>
<?php echo $patient_provisional_diagnosis_add->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_provisional_diagnosis_add->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_provisional_diagnosis_profilePic" for="x_profilePic" class="<?php echo $patient_provisional_diagnosis_add->LeftColumnClass ?>"><script id="tpc_patient_provisional_diagnosis_profilePic" type="text/html"><?php echo $patient_provisional_diagnosis_add->profilePic->caption() ?><?php echo $patient_provisional_diagnosis_add->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_provisional_diagnosis_add->RightColumnClass ?>"><div <?php echo $patient_provisional_diagnosis_add->profilePic->cellAttributes() ?>>
<script id="tpx_patient_provisional_diagnosis_profilePic" type="text/html"><span id="el_patient_provisional_diagnosis_profilePic">
<textarea data-table="patient_provisional_diagnosis" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis_add->profilePic->getPlaceHolder()) ?>"<?php echo $patient_provisional_diagnosis_add->profilePic->editAttributes() ?>><?php echo $patient_provisional_diagnosis_add->profilePic->EditValue ?></textarea>
</span></script>
<?php echo $patient_provisional_diagnosis_add->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->Visible) { // provisionaldiagnosisTemplate ?>
	<div id="r_provisionaldiagnosisTemplate" class="form-group row">
		<label id="elh_patient_provisional_diagnosis_provisionaldiagnosisTemplate" for="x_provisionaldiagnosisTemplate" class="<?php echo $patient_provisional_diagnosis_add->LeftColumnClass ?>"><script id="tpc_patient_provisional_diagnosis_provisionaldiagnosisTemplate" type="text/html"><?php echo $patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->caption() ?><?php echo $patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_provisional_diagnosis_add->RightColumnClass ?>"><div <?php echo $patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->cellAttributes() ?>>
<script id="tpx_patient_provisional_diagnosis_provisionaldiagnosisTemplate" type="text/html"><span id="el_patient_provisional_diagnosis_provisionaldiagnosisTemplate">
<?php $patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_provisional_diagnosis" data-field="x_provisionaldiagnosisTemplate" data-value-separator="<?php echo $patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->displayValueSeparatorAttribute() ?>" id="x_provisionaldiagnosisTemplate" name="x_provisionaldiagnosisTemplate"<?php echo $patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->editAttributes() ?>>
			<?php echo $patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->selectOptionListHtml("x_provisionaldiagnosisTemplate") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_provisionaldiagnosisTemplate" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->caption() ?>" data-title="<?php echo $patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_provisionaldiagnosisTemplate',url:'mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->Lookup->getParamTag($patient_provisional_diagnosis_add, "p_x_provisionaldiagnosisTemplate") ?>
</span></script>
<?php echo $patient_provisional_diagnosis_add->provisionaldiagnosisTemplate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_provisional_diagnosis_add->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label id="elh_patient_provisional_diagnosis_PatientSearch" for="x_PatientSearch" class="<?php echo $patient_provisional_diagnosis_add->LeftColumnClass ?>"><script id="tpc_patient_provisional_diagnosis_PatientSearch" type="text/html"><?php echo $patient_provisional_diagnosis_add->PatientSearch->caption() ?><?php echo $patient_provisional_diagnosis_add->PatientSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_provisional_diagnosis_add->RightColumnClass ?>"><div <?php echo $patient_provisional_diagnosis_add->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_provisional_diagnosis_PatientSearch" type="text/html"><span id="el_patient_provisional_diagnosis_PatientSearch">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo EmptyValue(strval($patient_provisional_diagnosis_add->PatientSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_provisional_diagnosis_add->PatientSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_provisional_diagnosis_add->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_provisional_diagnosis_add->PatientSearch->ReadOnly || $patient_provisional_diagnosis_add->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_provisional_diagnosis_add->PatientSearch->Lookup->getParamTag($patient_provisional_diagnosis_add, "p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_provisional_diagnosis_add->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_provisional_diagnosis_add->PatientSearch->CurrentValue ?>"<?php echo $patient_provisional_diagnosis_add->PatientSearch->editAttributes() ?>>
</span></script>
<?php echo $patient_provisional_diagnosis_add->PatientSearch->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_provisional_diagnosisadd" class="ew-custom-template"></div>
<script id="tpm_patient_provisional_diagnosisadd" type="text/html">
<div id="ct_patient_provisional_diagnosis_add"><style>
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
{{include tmpl="#tpc_patient_provisional_diagnosis_PatientSearch"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_provisional_diagnosis_PatientSearch")/}}	
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_provisional_diagnosis_profilePic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_provisional_diagnosis_profilePic")/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl=~getTemplate("#tpx_SurfaceArea")/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl=~getTemplate("#tpx_BodyMassIndex")/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_provisional_diagnosis_mrnno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_provisional_diagnosis_mrnno")/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_provisional_diagnosis_Reception"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_provisional_diagnosis_Reception")/}}</p> 
  <p>{{include tmpl="#tpc_patient_provisional_diagnosis_PatientId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_provisional_diagnosis_PatientId")/}}</p> 
  <p>{{include tmpl="#tpc_patient_provisional_diagnosis_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_provisional_diagnosis_PatientName")/}}</p> 
  <p>{{include tmpl="#tpc_patient_provisional_diagnosis_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_provisional_diagnosis_Age")/}}</p> 
  <p>{{include tmpl="#tpc_patient_provisional_diagnosis_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_provisional_diagnosis_Gender")/}}</p>
  <p>{{include tmpl="#tpc_patient_provisional_diagnosis_PatID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_provisional_diagnosis_PatID")/}}</p>
  <p>{{include tmpl="#tpc_patient_provisional_diagnosis_MobileNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_provisional_diagnosis_MobileNumber")/}}</p> 
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
{{include tmpl="#tpc_patient_provisional_diagnosis_provisionaldiagnosisTemplate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_provisional_diagnosis_provisionaldiagnosisTemplate")/}}
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info">             
			  <div class="card-body">
			  {{include tmpl="#tpc_patient_provisional_diagnosis_provisional_diagnosis"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_provisional_diagnosis_provisional_diagnosis")/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>	
</div>
</script>

<?php if (!$patient_provisional_diagnosis_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_provisional_diagnosis_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_provisional_diagnosis_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_provisional_diagnosis->Rows) ?> };
	ew.applyTemplate("tpd_patient_provisional_diagnosisadd", "tpm_patient_provisional_diagnosisadd", "patient_provisional_diagnosisadd", "<?php echo $patient_provisional_diagnosis->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patient_provisional_diagnosisadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_provisional_diagnosis_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	var c=document.getElementById("el_patient_provisional_diagnosis_profilePic").children,d=c[0].children,evalue=c[0].innerText;document.getElementById("profilePicturePatient").src="uploads/"+evalue;
});
</script>
<?php include_once "footer.php"; ?>
<?php
$patient_provisional_diagnosis_add->terminate();
?>