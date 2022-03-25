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
$patient_history_edit = new patient_history_edit();

// Run the page
$patient_history_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_history_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpatient_historyedit = currentForm = new ew.Form("fpatient_historyedit", "edit");

// Validate form
fpatient_historyedit.validate = function() {
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
		<?php if ($patient_history_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->id->caption(), $patient_history->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->mrnno->caption(), $patient_history->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->PatientName->caption(), $patient_history->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->PatientId->caption(), $patient_history->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->MobileNumber->caption(), $patient_history->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->MaritalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MaritalHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->MaritalHistory->caption(), $patient_history->MaritalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->MenstrualHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MenstrualHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->MenstrualHistory->caption(), $patient_history->MenstrualHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->ObstetricHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_ObstetricHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->ObstetricHistory->caption(), $patient_history->ObstetricHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->MedicalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MedicalHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->MedicalHistory->caption(), $patient_history->MedicalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->SurgicalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_SurgicalHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->SurgicalHistory->caption(), $patient_history->SurgicalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->PastHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_PastHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->PastHistory->caption(), $patient_history->PastHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->TreatmentHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_TreatmentHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->TreatmentHistory->caption(), $patient_history->TreatmentHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->FamilyHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_FamilyHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->FamilyHistory->caption(), $patient_history->FamilyHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->Age->caption(), $patient_history->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->Gender->caption(), $patient_history->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->profilePic->caption(), $patient_history->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->Complaints->Required) { ?>
			elm = this.getElements("x" + infix + "_Complaints");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->Complaints->caption(), $patient_history->Complaints->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->illness->Required) { ?>
			elm = this.getElements("x" + infix + "_illness");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->illness->caption(), $patient_history->illness->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->PersonalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_PersonalHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->PersonalHistory->caption(), $patient_history->PersonalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->PatientSearch->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientSearch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->PatientSearch->caption(), $patient_history->PatientSearch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->PatID->caption(), $patient_history->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->Reception->caption(), $patient_history->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->HospID->caption(), $patient_history->HospID->RequiredErrorMessage)) ?>");
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
fpatient_historyedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_historyedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_historyedit.lists["x_PatientSearch"] = <?php echo $patient_history_edit->PatientSearch->Lookup->toClientList() ?>;
fpatient_historyedit.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_history_edit->PatientSearch->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_history_edit->showPageHeader(); ?>
<?php
$patient_history_edit->showMessage();
?>
<form name="fpatient_historyedit" id="fpatient_historyedit" class="<?php echo $patient_history_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_history_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_history_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_history">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_history_edit->IsModal ?>">
<?php if ($patient_history->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_history->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_history->PatientId->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_history->mrnno->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($patient_history->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_history_id" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_id" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->id->caption() ?><?php echo ($patient_history->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->id->cellAttributes() ?>>
<script id="tpx_patient_history_id" class="patient_historyedit" type="text/html">
<span id="el_patient_history_id">
<span<?php echo $patient_history->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_history" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_history->id->CurrentValue) ?>">
<?php echo $patient_history->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_history_mrnno" for="x_mrnno" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_mrnno" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->mrnno->caption() ?><?php echo ($patient_history->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->mrnno->cellAttributes() ?>>
<script id="tpx_patient_history_mrnno" class="patient_historyedit" type="text/html">
<span id="el_patient_history_mrnno">
<span<?php echo $patient_history->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->mrnno->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_history" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($patient_history->mrnno->CurrentValue) ?>">
<?php echo $patient_history->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_history_PatientName" for="x_PatientName" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_PatientName" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->PatientName->caption() ?><?php echo ($patient_history->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->PatientName->cellAttributes() ?>>
<script id="tpx_patient_history_PatientName" class="patient_historyedit" type="text/html">
<span id="el_patient_history_PatientName">
<input type="text" data-table="patient_history" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_history->PatientName->EditValue ?>"<?php echo $patient_history->PatientName->editAttributes() ?>>
</span>
</script>
<?php echo $patient_history->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_history_PatientId" for="x_PatientId" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_PatientId" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->PatientId->caption() ?><?php echo ($patient_history->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->PatientId->cellAttributes() ?>>
<script id="tpx_patient_history_PatientId" class="patient_historyedit" type="text/html">
<span id="el_patient_history_PatientId">
<span<?php echo $patient_history->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->PatientId->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_history" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" value="<?php echo HtmlEncode($patient_history->PatientId->CurrentValue) ?>">
<?php echo $patient_history->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_patient_history_MobileNumber" for="x_MobileNumber" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_MobileNumber" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->MobileNumber->caption() ?><?php echo ($patient_history->MobileNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_history_MobileNumber" class="patient_historyedit" type="text/html">
<span id="el_patient_history_MobileNumber">
<input type="text" data-table="patient_history" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_history->MobileNumber->EditValue ?>"<?php echo $patient_history->MobileNumber->editAttributes() ?>>
</span>
</script>
<?php echo $patient_history->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->MaritalHistory->Visible) { // MaritalHistory ?>
	<div id="r_MaritalHistory" class="form-group row">
		<label id="elh_patient_history_MaritalHistory" for="x_MaritalHistory" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_MaritalHistory" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->MaritalHistory->caption() ?><?php echo ($patient_history->MaritalHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->MaritalHistory->cellAttributes() ?>>
<script id="tpx_patient_history_MaritalHistory" class="patient_historyedit" type="text/html">
<span id="el_patient_history_MaritalHistory">
<textarea data-table="patient_history" data-field="x_MaritalHistory" name="x_MaritalHistory" id="x_MaritalHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->MaritalHistory->getPlaceHolder()) ?>"<?php echo $patient_history->MaritalHistory->editAttributes() ?>><?php echo $patient_history->MaritalHistory->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_history->MaritalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<div id="r_MenstrualHistory" class="form-group row">
		<label id="elh_patient_history_MenstrualHistory" for="x_MenstrualHistory" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_MenstrualHistory" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->MenstrualHistory->caption() ?><?php echo ($patient_history->MenstrualHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_patient_history_MenstrualHistory" class="patient_historyedit" type="text/html">
<span id="el_patient_history_MenstrualHistory">
<textarea data-table="patient_history" data-field="x_MenstrualHistory" name="x_MenstrualHistory" id="x_MenstrualHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->MenstrualHistory->getPlaceHolder()) ?>"<?php echo $patient_history->MenstrualHistory->editAttributes() ?>><?php echo $patient_history->MenstrualHistory->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_history->MenstrualHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<div id="r_ObstetricHistory" class="form-group row">
		<label id="elh_patient_history_ObstetricHistory" for="x_ObstetricHistory" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_ObstetricHistory" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->ObstetricHistory->caption() ?><?php echo ($patient_history->ObstetricHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->ObstetricHistory->cellAttributes() ?>>
<script id="tpx_patient_history_ObstetricHistory" class="patient_historyedit" type="text/html">
<span id="el_patient_history_ObstetricHistory">
<textarea data-table="patient_history" data-field="x_ObstetricHistory" name="x_ObstetricHistory" id="x_ObstetricHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->ObstetricHistory->getPlaceHolder()) ?>"<?php echo $patient_history->ObstetricHistory->editAttributes() ?>><?php echo $patient_history->ObstetricHistory->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_history->ObstetricHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->MedicalHistory->Visible) { // MedicalHistory ?>
	<div id="r_MedicalHistory" class="form-group row">
		<label id="elh_patient_history_MedicalHistory" for="x_MedicalHistory" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_MedicalHistory" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->MedicalHistory->caption() ?><?php echo ($patient_history->MedicalHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->MedicalHistory->cellAttributes() ?>>
<script id="tpx_patient_history_MedicalHistory" class="patient_historyedit" type="text/html">
<span id="el_patient_history_MedicalHistory">
<textarea data-table="patient_history" data-field="x_MedicalHistory" name="x_MedicalHistory" id="x_MedicalHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->MedicalHistory->getPlaceHolder()) ?>"<?php echo $patient_history->MedicalHistory->editAttributes() ?>><?php echo $patient_history->MedicalHistory->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_history->MedicalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<div id="r_SurgicalHistory" class="form-group row">
		<label id="elh_patient_history_SurgicalHistory" for="x_SurgicalHistory" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_SurgicalHistory" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->SurgicalHistory->caption() ?><?php echo ($patient_history->SurgicalHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->SurgicalHistory->cellAttributes() ?>>
<script id="tpx_patient_history_SurgicalHistory" class="patient_historyedit" type="text/html">
<span id="el_patient_history_SurgicalHistory">
<textarea data-table="patient_history" data-field="x_SurgicalHistory" name="x_SurgicalHistory" id="x_SurgicalHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->SurgicalHistory->getPlaceHolder()) ?>"<?php echo $patient_history->SurgicalHistory->editAttributes() ?>><?php echo $patient_history->SurgicalHistory->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_history->SurgicalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->PastHistory->Visible) { // PastHistory ?>
	<div id="r_PastHistory" class="form-group row">
		<label id="elh_patient_history_PastHistory" for="x_PastHistory" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_PastHistory" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->PastHistory->caption() ?><?php echo ($patient_history->PastHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->PastHistory->cellAttributes() ?>>
<script id="tpx_patient_history_PastHistory" class="patient_historyedit" type="text/html">
<span id="el_patient_history_PastHistory">
<textarea data-table="patient_history" data-field="x_PastHistory" name="x_PastHistory" id="x_PastHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->PastHistory->getPlaceHolder()) ?>"<?php echo $patient_history->PastHistory->editAttributes() ?>><?php echo $patient_history->PastHistory->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_history->PastHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->TreatmentHistory->Visible) { // TreatmentHistory ?>
	<div id="r_TreatmentHistory" class="form-group row">
		<label id="elh_patient_history_TreatmentHistory" for="x_TreatmentHistory" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_TreatmentHistory" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->TreatmentHistory->caption() ?><?php echo ($patient_history->TreatmentHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->TreatmentHistory->cellAttributes() ?>>
<script id="tpx_patient_history_TreatmentHistory" class="patient_historyedit" type="text/html">
<span id="el_patient_history_TreatmentHistory">
<textarea data-table="patient_history" data-field="x_TreatmentHistory" name="x_TreatmentHistory" id="x_TreatmentHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->TreatmentHistory->getPlaceHolder()) ?>"<?php echo $patient_history->TreatmentHistory->editAttributes() ?>><?php echo $patient_history->TreatmentHistory->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_history->TreatmentHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->FamilyHistory->Visible) { // FamilyHistory ?>
	<div id="r_FamilyHistory" class="form-group row">
		<label id="elh_patient_history_FamilyHistory" for="x_FamilyHistory" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_FamilyHistory" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->FamilyHistory->caption() ?><?php echo ($patient_history->FamilyHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->FamilyHistory->cellAttributes() ?>>
<script id="tpx_patient_history_FamilyHistory" class="patient_historyedit" type="text/html">
<span id="el_patient_history_FamilyHistory">
<textarea data-table="patient_history" data-field="x_FamilyHistory" name="x_FamilyHistory" id="x_FamilyHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->FamilyHistory->getPlaceHolder()) ?>"<?php echo $patient_history->FamilyHistory->editAttributes() ?>><?php echo $patient_history->FamilyHistory->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_history->FamilyHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_history_Age" for="x_Age" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_Age" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->Age->caption() ?><?php echo ($patient_history->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->Age->cellAttributes() ?>>
<script id="tpx_patient_history_Age" class="patient_historyedit" type="text/html">
<span id="el_patient_history_Age">
<input type="text" data-table="patient_history" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->Age->getPlaceHolder()) ?>" value="<?php echo $patient_history->Age->EditValue ?>"<?php echo $patient_history->Age->editAttributes() ?>>
</span>
</script>
<?php echo $patient_history->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_history_Gender" for="x_Gender" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_Gender" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->Gender->caption() ?><?php echo ($patient_history->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->Gender->cellAttributes() ?>>
<script id="tpx_patient_history_Gender" class="patient_historyedit" type="text/html">
<span id="el_patient_history_Gender">
<input type="text" data-table="patient_history" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_history->Gender->EditValue ?>"<?php echo $patient_history->Gender->editAttributes() ?>>
</span>
</script>
<?php echo $patient_history->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_history_profilePic" for="x_profilePic" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_profilePic" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->profilePic->caption() ?><?php echo ($patient_history->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->profilePic->cellAttributes() ?>>
<script id="tpx_patient_history_profilePic" class="patient_historyedit" type="text/html">
<span id="el_patient_history_profilePic">
<textarea data-table="patient_history" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->profilePic->getPlaceHolder()) ?>"<?php echo $patient_history->profilePic->editAttributes() ?>><?php echo $patient_history->profilePic->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_history->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->Complaints->Visible) { // Complaints ?>
	<div id="r_Complaints" class="form-group row">
		<label id="elh_patient_history_Complaints" for="x_Complaints" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_Complaints" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->Complaints->caption() ?><?php echo ($patient_history->Complaints->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->Complaints->cellAttributes() ?>>
<script id="tpx_patient_history_Complaints" class="patient_historyedit" type="text/html">
<span id="el_patient_history_Complaints">
<textarea data-table="patient_history" data-field="x_Complaints" name="x_Complaints" id="x_Complaints" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->Complaints->getPlaceHolder()) ?>"<?php echo $patient_history->Complaints->editAttributes() ?>><?php echo $patient_history->Complaints->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_history->Complaints->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->illness->Visible) { // illness ?>
	<div id="r_illness" class="form-group row">
		<label id="elh_patient_history_illness" for="x_illness" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_illness" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->illness->caption() ?><?php echo ($patient_history->illness->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->illness->cellAttributes() ?>>
<script id="tpx_patient_history_illness" class="patient_historyedit" type="text/html">
<span id="el_patient_history_illness">
<textarea data-table="patient_history" data-field="x_illness" name="x_illness" id="x_illness" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->illness->getPlaceHolder()) ?>"<?php echo $patient_history->illness->editAttributes() ?>><?php echo $patient_history->illness->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_history->illness->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->PersonalHistory->Visible) { // PersonalHistory ?>
	<div id="r_PersonalHistory" class="form-group row">
		<label id="elh_patient_history_PersonalHistory" for="x_PersonalHistory" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_PersonalHistory" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->PersonalHistory->caption() ?><?php echo ($patient_history->PersonalHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->PersonalHistory->cellAttributes() ?>>
<script id="tpx_patient_history_PersonalHistory" class="patient_historyedit" type="text/html">
<span id="el_patient_history_PersonalHistory">
<textarea data-table="patient_history" data-field="x_PersonalHistory" name="x_PersonalHistory" id="x_PersonalHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->PersonalHistory->getPlaceHolder()) ?>"<?php echo $patient_history->PersonalHistory->editAttributes() ?>><?php echo $patient_history->PersonalHistory->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_history->PersonalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label id="elh_patient_history_PatientSearch" for="x_PatientSearch" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_PatientSearch" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->PatientSearch->caption() ?><?php echo ($patient_history->PatientSearch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_history_PatientSearch" class="patient_historyedit" type="text/html">
<span id="el_patient_history_PatientSearch">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo strval($patient_history->PatientSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_history->PatientSearch->ViewValue) : $patient_history->PatientSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_history->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_history->PatientSearch->ReadOnly || $patient_history->PatientSearch->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_history->PatientSearch->Lookup->getParamTag("p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_history" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_history->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_history->PatientSearch->CurrentValue ?>"<?php echo $patient_history->PatientSearch->editAttributes() ?>>
</span>
</script>
<?php echo $patient_history->PatientSearch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_patient_history_PatID" for="x_PatID" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_PatID" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->PatID->caption() ?><?php echo ($patient_history->PatID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->PatID->cellAttributes() ?>>
<script id="tpx_patient_history_PatID" class="patient_historyedit" type="text/html">
<span id="el_patient_history_PatID">
<input type="text" data-table="patient_history" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_history->PatID->EditValue ?>"<?php echo $patient_history->PatID->editAttributes() ?>>
</span>
</script>
<?php echo $patient_history->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_history->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_history_Reception" for="x_Reception" class="<?php echo $patient_history_edit->LeftColumnClass ?>"><script id="tpc_patient_history_Reception" class="patient_historyedit" type="text/html"><span><?php echo $patient_history->Reception->caption() ?><?php echo ($patient_history->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_history_edit->RightColumnClass ?>"><div<?php echo $patient_history->Reception->cellAttributes() ?>>
<script id="tpx_patient_history_Reception" class="patient_historyedit" type="text/html">
<span id="el_patient_history_Reception">
<span<?php echo $patient_history->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->Reception->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_history" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($patient_history->Reception->CurrentValue) ?>">
<?php echo $patient_history->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_historyedit" class="ew-custom-template"></div>
<script id="tpm_patient_historyedit" type="text/html">
<div id="ct_patient_history_edit"><style>
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
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where id='".$vviid."'; ";
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
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_history_PatientSearch"/}}&nbsp;{{include tmpl="#tpx_patient_history_PatientSearch"/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_history_profilePic"/}}&nbsp;{{include tmpl="#tpx_patient_history_profilePic"/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpx_SurfaceArea"/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpx_BodyMassIndex"/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_history_mrnno"/}}&nbsp;{{include tmpl="#tpx_patient_history_mrnno"/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_history_Reception"/}}&nbsp;{{include tmpl="#tpx_patient_history_Reception"/}}</p> 
  <p>{{include tmpl="#tpc_patient_history_PatientId"/}}&nbsp;{{include tmpl="#tpx_patient_history_PatientId"/}}</p> 
  <p>{{include tmpl="#tpc_patient_history_PatientName"/}}&nbsp;{{include tmpl="#tpx_patient_history_PatientName"/}}</p> 
  <p>{{include tmpl="#tpc_patient_history_Age"/}}&nbsp;{{include tmpl="#tpx_patient_history_Age"/}}</p> 
  <p>{{include tmpl="#tpc_patient_history_Gender"/}}&nbsp;{{include tmpl="#tpx_patient_history_Gender"/}}</p>
  <p>{{include tmpl="#tpc_patient_history_PatID"/}}&nbsp;{{include tmpl="#tpx_patient_history_PatID"/}}</p>
  <p>{{include tmpl="#tpc_patient_history_MobileNumber"/}}&nbsp;{{include tmpl="#tpx_patient_history_MobileNumber"/}}</p> 
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
						<tr><td>{{include tmpl="#tpc_patient_history_Complaints"/}}&nbsp;{{include tmpl="#tpx_patient_history_Complaints"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_illness"/}}&nbsp;{{include tmpl="#tpx_patient_history_illness"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_PastHistory"/}}&nbsp;{{include tmpl="#tpx_patient_history_PastHistory"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_SurgicalHistory"/}}&nbsp;{{include tmpl="#tpx_patient_history_SurgicalHistory"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_PersonalHistory"/}}&nbsp;{{include tmpl="#tpx_patient_history_PersonalHistory"/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_history_MaritalHistory"/}}&nbsp;{{include tmpl="#tpx_patient_history_MaritalHistory"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_MenstrualHistory"/}}&nbsp;{{include tmpl="#tpx_patient_history_MenstrualHistory"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_ObstetricHistory"/}}&nbsp;{{include tmpl="#tpx_patient_history_ObstetricHistory"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_FamilyHistory"/}}&nbsp;{{include tmpl="#tpx_patient_history_FamilyHistory"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_TreatmentHistory"/}}&nbsp;{{include tmpl="#tpx_patient_history_TreatmentHistory"/}}</td></tr>
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
<?php if (!$patient_history_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_history_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_history_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_history->Rows) ?> };
ew.applyTemplate("tpd_patient_historyedit", "tpm_patient_historyedit", "patient_historyedit", "<?php echo $patient_history->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_historyedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_history_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
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
</script>
<?php include_once "footer.php" ?>
<?php
$patient_history_edit->terminate();
?>