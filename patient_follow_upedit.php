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
$patient_follow_up_edit = new patient_follow_up_edit();

// Run the page
$patient_follow_up_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_follow_up_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpatient_follow_upedit = currentForm = new ew.Form("fpatient_follow_upedit", "edit");

// Validate form
fpatient_follow_upedit.validate = function() {
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
		<?php if ($patient_follow_up_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->id->caption(), $patient_follow_up->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->PatID->caption(), $patient_follow_up->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->PatientName->caption(), $patient_follow_up->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->MobileNumber->caption(), $patient_follow_up->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->mrnno->caption(), $patient_follow_up->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->BP->Required) { ?>
			elm = this.getElements("x" + infix + "_BP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->BP->caption(), $patient_follow_up->BP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->Pulse->Required) { ?>
			elm = this.getElements("x" + infix + "_Pulse");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->Pulse->caption(), $patient_follow_up->Pulse->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->Resp->Required) { ?>
			elm = this.getElements("x" + infix + "_Resp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->Resp->caption(), $patient_follow_up->Resp->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->SPO2->Required) { ?>
			elm = this.getElements("x" + infix + "_SPO2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->SPO2->caption(), $patient_follow_up->SPO2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->FollowupAdvice->Required) { ?>
			elm = this.getElements("x" + infix + "_FollowupAdvice");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->FollowupAdvice->caption(), $patient_follow_up->FollowupAdvice->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->NextReviewDate->Required) { ?>
			elm = this.getElements("x" + infix + "_NextReviewDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->NextReviewDate->caption(), $patient_follow_up->NextReviewDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->Age->caption(), $patient_follow_up->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->Gender->caption(), $patient_follow_up->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->profilePic->caption(), $patient_follow_up->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->Template->Required) { ?>
			elm = this.getElements("x" + infix + "_Template");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->Template->caption(), $patient_follow_up->Template->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->courseinhospital->Required) { ?>
			elm = this.getElements("x" + infix + "_courseinhospital");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->courseinhospital->caption(), $patient_follow_up->courseinhospital->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->procedurenotes->Required) { ?>
			elm = this.getElements("x" + infix + "_procedurenotes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->procedurenotes->caption(), $patient_follow_up->procedurenotes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->conditionatdischarge->Required) { ?>
			elm = this.getElements("x" + infix + "_conditionatdischarge");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->conditionatdischarge->caption(), $patient_follow_up->conditionatdischarge->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->Template1->Required) { ?>
			elm = this.getElements("x" + infix + "_Template1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->Template1->caption(), $patient_follow_up->Template1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->Template2->Required) { ?>
			elm = this.getElements("x" + infix + "_Template2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->Template2->caption(), $patient_follow_up->Template2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->Template3->Required) { ?>
			elm = this.getElements("x" + infix + "_Template3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->Template3->caption(), $patient_follow_up->Template3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->HospID->caption(), $patient_follow_up->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->Reception->caption(), $patient_follow_up->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->PatientId->caption(), $patient_follow_up->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->PatientSearch->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientSearch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->PatientSearch->caption(), $patient_follow_up->PatientSearch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->DischargeAdviceMedicine->Required) { ?>
			elm = this.getElements("x" + infix + "_DischargeAdviceMedicine");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->DischargeAdviceMedicine->caption(), $patient_follow_up->DischargeAdviceMedicine->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_follow_up_edit->DischargeAdviceMedicineTemplate->Required) { ?>
			elm = this.getElements("x" + infix + "_DischargeAdviceMedicineTemplate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_follow_up->DischargeAdviceMedicineTemplate->caption(), $patient_follow_up->DischargeAdviceMedicineTemplate->RequiredErrorMessage)) ?>");
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
fpatient_follow_upedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_follow_upedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_follow_upedit.lists["x_Template"] = <?php echo $patient_follow_up_edit->Template->Lookup->toClientList() ?>;
fpatient_follow_upedit.lists["x_Template"].options = <?php echo JsonEncode($patient_follow_up_edit->Template->lookupOptions()) ?>;
fpatient_follow_upedit.lists["x_Template1"] = <?php echo $patient_follow_up_edit->Template1->Lookup->toClientList() ?>;
fpatient_follow_upedit.lists["x_Template1"].options = <?php echo JsonEncode($patient_follow_up_edit->Template1->lookupOptions()) ?>;
fpatient_follow_upedit.lists["x_Template2"] = <?php echo $patient_follow_up_edit->Template2->Lookup->toClientList() ?>;
fpatient_follow_upedit.lists["x_Template2"].options = <?php echo JsonEncode($patient_follow_up_edit->Template2->lookupOptions()) ?>;
fpatient_follow_upedit.lists["x_Template3"] = <?php echo $patient_follow_up_edit->Template3->Lookup->toClientList() ?>;
fpatient_follow_upedit.lists["x_Template3"].options = <?php echo JsonEncode($patient_follow_up_edit->Template3->lookupOptions()) ?>;
fpatient_follow_upedit.lists["x_PatientSearch"] = <?php echo $patient_follow_up_edit->PatientSearch->Lookup->toClientList() ?>;
fpatient_follow_upedit.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_follow_up_edit->PatientSearch->lookupOptions()) ?>;
fpatient_follow_upedit.lists["x_DischargeAdviceMedicineTemplate"] = <?php echo $patient_follow_up_edit->DischargeAdviceMedicineTemplate->Lookup->toClientList() ?>;
fpatient_follow_upedit.lists["x_DischargeAdviceMedicineTemplate"].options = <?php echo JsonEncode($patient_follow_up_edit->DischargeAdviceMedicineTemplate->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_follow_up_edit->showPageHeader(); ?>
<?php
$patient_follow_up_edit->showMessage();
?>
<form name="fpatient_follow_upedit" id="fpatient_follow_upedit" class="<?php echo $patient_follow_up_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_follow_up_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_follow_up_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_follow_up">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_follow_up_edit->IsModal ?>">
<?php if ($patient_follow_up->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_follow_up->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_follow_up->PatientId->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_follow_up->mrnno->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($patient_follow_up->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_follow_up_id" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_id" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->id->caption() ?><?php echo ($patient_follow_up->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->id->cellAttributes() ?>>
<script id="tpx_patient_follow_up_id" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_id">
<span<?php echo $patient_follow_up->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_follow_up->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_follow_up" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_follow_up->id->CurrentValue) ?>">
<?php echo $patient_follow_up->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_patient_follow_up_PatID" for="x_PatID" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_PatID" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->PatID->caption() ?><?php echo ($patient_follow_up->PatID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->PatID->cellAttributes() ?>>
<script id="tpx_patient_follow_up_PatID" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_PatID">
<input type="text" data-table="patient_follow_up" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up->PatID->EditValue ?>"<?php echo $patient_follow_up->PatID->editAttributes() ?>>
</span>
</script>
<?php echo $patient_follow_up->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_follow_up_PatientName" for="x_PatientName" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_PatientName" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->PatientName->caption() ?><?php echo ($patient_follow_up->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->PatientName->cellAttributes() ?>>
<script id="tpx_patient_follow_up_PatientName" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_PatientName">
<input type="text" data-table="patient_follow_up" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up->PatientName->EditValue ?>"<?php echo $patient_follow_up->PatientName->editAttributes() ?>>
</span>
</script>
<?php echo $patient_follow_up->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_patient_follow_up_MobileNumber" for="x_MobileNumber" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_MobileNumber" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->MobileNumber->caption() ?><?php echo ($patient_follow_up->MobileNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_follow_up_MobileNumber" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_MobileNumber">
<input type="text" data-table="patient_follow_up" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up->MobileNumber->EditValue ?>"<?php echo $patient_follow_up->MobileNumber->editAttributes() ?>>
</span>
</script>
<?php echo $patient_follow_up->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_follow_up_mrnno" for="x_mrnno" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_mrnno" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->mrnno->caption() ?><?php echo ($patient_follow_up->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->mrnno->cellAttributes() ?>>
<script id="tpx_patient_follow_up_mrnno" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_mrnno">
<span<?php echo $patient_follow_up->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_follow_up->mrnno->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_follow_up" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($patient_follow_up->mrnno->CurrentValue) ?>">
<?php echo $patient_follow_up->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->BP->Visible) { // BP ?>
	<div id="r_BP" class="form-group row">
		<label id="elh_patient_follow_up_BP" for="x_BP" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_BP" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->BP->caption() ?><?php echo ($patient_follow_up->BP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->BP->cellAttributes() ?>>
<script id="tpx_patient_follow_up_BP" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_BP">
<input type="text" data-table="patient_follow_up" data-field="x_BP" name="x_BP" id="x_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up->BP->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up->BP->EditValue ?>"<?php echo $patient_follow_up->BP->editAttributes() ?>>
</span>
</script>
<?php echo $patient_follow_up->BP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->Pulse->Visible) { // Pulse ?>
	<div id="r_Pulse" class="form-group row">
		<label id="elh_patient_follow_up_Pulse" for="x_Pulse" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_Pulse" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->Pulse->caption() ?><?php echo ($patient_follow_up->Pulse->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->Pulse->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Pulse" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_Pulse">
<input type="text" data-table="patient_follow_up" data-field="x_Pulse" name="x_Pulse" id="x_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up->Pulse->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up->Pulse->EditValue ?>"<?php echo $patient_follow_up->Pulse->editAttributes() ?>>
</span>
</script>
<?php echo $patient_follow_up->Pulse->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->Resp->Visible) { // Resp ?>
	<div id="r_Resp" class="form-group row">
		<label id="elh_patient_follow_up_Resp" for="x_Resp" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_Resp" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->Resp->caption() ?><?php echo ($patient_follow_up->Resp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->Resp->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Resp" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_Resp">
<input type="text" data-table="patient_follow_up" data-field="x_Resp" name="x_Resp" id="x_Resp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up->Resp->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up->Resp->EditValue ?>"<?php echo $patient_follow_up->Resp->editAttributes() ?>>
</span>
</script>
<?php echo $patient_follow_up->Resp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->SPO2->Visible) { // SPO2 ?>
	<div id="r_SPO2" class="form-group row">
		<label id="elh_patient_follow_up_SPO2" for="x_SPO2" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_SPO2" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->SPO2->caption() ?><?php echo ($patient_follow_up->SPO2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->SPO2->cellAttributes() ?>>
<script id="tpx_patient_follow_up_SPO2" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_SPO2">
<input type="text" data-table="patient_follow_up" data-field="x_SPO2" name="x_SPO2" id="x_SPO2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up->SPO2->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up->SPO2->EditValue ?>"<?php echo $patient_follow_up->SPO2->editAttributes() ?>>
</span>
</script>
<?php echo $patient_follow_up->SPO2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->FollowupAdvice->Visible) { // FollowupAdvice ?>
	<div id="r_FollowupAdvice" class="form-group row">
		<label id="elh_patient_follow_up_FollowupAdvice" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_FollowupAdvice" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->FollowupAdvice->caption() ?><?php echo ($patient_follow_up->FollowupAdvice->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->FollowupAdvice->cellAttributes() ?>>
<script id="tpx_patient_follow_up_FollowupAdvice" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_FollowupAdvice">
<?php AppendClass($patient_follow_up->FollowupAdvice->EditAttrs["class"], "editor"); ?>
<textarea data-table="patient_follow_up" data-field="x_FollowupAdvice" name="x_FollowupAdvice" id="x_FollowupAdvice" cols="35" rows="25" placeholder="<?php echo HtmlEncode($patient_follow_up->FollowupAdvice->getPlaceHolder()) ?>"<?php echo $patient_follow_up->FollowupAdvice->editAttributes() ?>><?php echo $patient_follow_up->FollowupAdvice->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="patient_follow_upedit_js">
ew.createEditor("fpatient_follow_upedit", "x_FollowupAdvice", 35, 25, <?php echo ($patient_follow_up->FollowupAdvice->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $patient_follow_up->FollowupAdvice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
	<div id="r_NextReviewDate" class="form-group row">
		<label id="elh_patient_follow_up_NextReviewDate" for="x_NextReviewDate" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_NextReviewDate" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->NextReviewDate->caption() ?><?php echo ($patient_follow_up->NextReviewDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->NextReviewDate->cellAttributes() ?>>
<script id="tpx_patient_follow_up_NextReviewDate" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_NextReviewDate">
<input type="text" data-table="patient_follow_up" data-field="x_NextReviewDate" data-format="7" name="x_NextReviewDate" id="x_NextReviewDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up->NextReviewDate->EditValue ?>"<?php echo $patient_follow_up->NextReviewDate->editAttributes() ?>>
<?php if (!$patient_follow_up->NextReviewDate->ReadOnly && !$patient_follow_up->NextReviewDate->Disabled && !isset($patient_follow_up->NextReviewDate->EditAttrs["readonly"]) && !isset($patient_follow_up->NextReviewDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_follow_upedit_js">
ew.createDateTimePicker("fpatient_follow_upedit", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_follow_up->NextReviewDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_follow_up_Age" for="x_Age" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_Age" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->Age->caption() ?><?php echo ($patient_follow_up->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->Age->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Age" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_Age">
<input type="text" data-table="patient_follow_up" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up->Age->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up->Age->EditValue ?>"<?php echo $patient_follow_up->Age->editAttributes() ?>>
</span>
</script>
<?php echo $patient_follow_up->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_follow_up_Gender" for="x_Gender" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_Gender" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->Gender->caption() ?><?php echo ($patient_follow_up->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->Gender->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Gender" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_Gender">
<input type="text" data-table="patient_follow_up" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_follow_up->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_follow_up->Gender->EditValue ?>"<?php echo $patient_follow_up->Gender->editAttributes() ?>>
</span>
</script>
<?php echo $patient_follow_up->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_follow_up_profilePic" for="x_profilePic" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_profilePic" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->profilePic->caption() ?><?php echo ($patient_follow_up->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->profilePic->cellAttributes() ?>>
<script id="tpx_patient_follow_up_profilePic" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_profilePic">
<textarea data-table="patient_follow_up" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_follow_up->profilePic->getPlaceHolder()) ?>"<?php echo $patient_follow_up->profilePic->editAttributes() ?>><?php echo $patient_follow_up->profilePic->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_follow_up->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->Template->Visible) { // Template ?>
	<div id="r_Template" class="form-group row">
		<label id="elh_patient_follow_up_Template" for="x_Template" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_Template" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->Template->caption() ?><?php echo ($patient_follow_up->Template->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->Template->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Template" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_Template">
<?php $patient_follow_up->Template->EditAttrs["onchange"] = "ew.autoFill(this);" . @$patient_follow_up->Template->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_follow_up" data-field="x_Template" data-value-separator="<?php echo $patient_follow_up->Template->displayValueSeparatorAttribute() ?>" id="x_Template" name="x_Template"<?php echo $patient_follow_up->Template->editAttributes() ?>>
		<?php echo $patient_follow_up->Template->selectOptionListHtml("x_Template") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$patient_follow_up->Template->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Template" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_follow_up->Template->caption() ?>" data-title="<?php echo $patient_follow_up->Template->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Template',url:'mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $patient_follow_up->Template->Lookup->getParamTag("p_x_Template") ?>
</span>
</script>
<?php echo $patient_follow_up->Template->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->courseinhospital->Visible) { // courseinhospital ?>
	<div id="r_courseinhospital" class="form-group row">
		<label id="elh_patient_follow_up_courseinhospital" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_courseinhospital" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->courseinhospital->caption() ?><?php echo ($patient_follow_up->courseinhospital->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->courseinhospital->cellAttributes() ?>>
<script id="tpx_patient_follow_up_courseinhospital" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_courseinhospital">
<?php AppendClass($patient_follow_up->courseinhospital->EditAttrs["class"], "editor"); ?>
<textarea data-table="patient_follow_up" data-field="x_courseinhospital" name="x_courseinhospital" id="x_courseinhospital" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_follow_up->courseinhospital->getPlaceHolder()) ?>"<?php echo $patient_follow_up->courseinhospital->editAttributes() ?>><?php echo $patient_follow_up->courseinhospital->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="patient_follow_upedit_js">
ew.createEditor("fpatient_follow_upedit", "x_courseinhospital", 35, 4, <?php echo ($patient_follow_up->courseinhospital->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $patient_follow_up->courseinhospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->procedurenotes->Visible) { // procedurenotes ?>
	<div id="r_procedurenotes" class="form-group row">
		<label id="elh_patient_follow_up_procedurenotes" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_procedurenotes" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->procedurenotes->caption() ?><?php echo ($patient_follow_up->procedurenotes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->procedurenotes->cellAttributes() ?>>
<script id="tpx_patient_follow_up_procedurenotes" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_procedurenotes">
<?php AppendClass($patient_follow_up->procedurenotes->EditAttrs["class"], "editor"); ?>
<textarea data-table="patient_follow_up" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_follow_up->procedurenotes->getPlaceHolder()) ?>"<?php echo $patient_follow_up->procedurenotes->editAttributes() ?>><?php echo $patient_follow_up->procedurenotes->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="patient_follow_upedit_js">
ew.createEditor("fpatient_follow_upedit", "x_procedurenotes", 35, 4, <?php echo ($patient_follow_up->procedurenotes->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $patient_follow_up->procedurenotes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->conditionatdischarge->Visible) { // conditionatdischarge ?>
	<div id="r_conditionatdischarge" class="form-group row">
		<label id="elh_patient_follow_up_conditionatdischarge" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_conditionatdischarge" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->conditionatdischarge->caption() ?><?php echo ($patient_follow_up->conditionatdischarge->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->conditionatdischarge->cellAttributes() ?>>
<script id="tpx_patient_follow_up_conditionatdischarge" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_conditionatdischarge">
<?php AppendClass($patient_follow_up->conditionatdischarge->EditAttrs["class"], "editor"); ?>
<textarea data-table="patient_follow_up" data-field="x_conditionatdischarge" name="x_conditionatdischarge" id="x_conditionatdischarge" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_follow_up->conditionatdischarge->getPlaceHolder()) ?>"<?php echo $patient_follow_up->conditionatdischarge->editAttributes() ?>><?php echo $patient_follow_up->conditionatdischarge->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="patient_follow_upedit_js">
ew.createEditor("fpatient_follow_upedit", "x_conditionatdischarge", 35, 4, <?php echo ($patient_follow_up->conditionatdischarge->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $patient_follow_up->conditionatdischarge->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->Template1->Visible) { // Template1 ?>
	<div id="r_Template1" class="form-group row">
		<label id="elh_patient_follow_up_Template1" for="x_Template1" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_Template1" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->Template1->caption() ?><?php echo ($patient_follow_up->Template1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->Template1->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Template1" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_Template1">
<?php $patient_follow_up->Template1->EditAttrs["onchange"] = "ew.autoFill(this);" . @$patient_follow_up->Template1->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_follow_up" data-field="x_Template1" data-value-separator="<?php echo $patient_follow_up->Template1->displayValueSeparatorAttribute() ?>" id="x_Template1" name="x_Template1"<?php echo $patient_follow_up->Template1->editAttributes() ?>>
		<?php echo $patient_follow_up->Template1->selectOptionListHtml("x_Template1") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$patient_follow_up->Template1->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Template1" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_follow_up->Template1->caption() ?>" data-title="<?php echo $patient_follow_up->Template1->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Template1',url:'mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $patient_follow_up->Template1->Lookup->getParamTag("p_x_Template1") ?>
</span>
</script>
<?php echo $patient_follow_up->Template1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->Template2->Visible) { // Template2 ?>
	<div id="r_Template2" class="form-group row">
		<label id="elh_patient_follow_up_Template2" for="x_Template2" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_Template2" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->Template2->caption() ?><?php echo ($patient_follow_up->Template2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->Template2->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Template2" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_Template2">
<?php $patient_follow_up->Template2->EditAttrs["onchange"] = "ew.autoFill(this);" . @$patient_follow_up->Template2->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_follow_up" data-field="x_Template2" data-value-separator="<?php echo $patient_follow_up->Template2->displayValueSeparatorAttribute() ?>" id="x_Template2" name="x_Template2"<?php echo $patient_follow_up->Template2->editAttributes() ?>>
		<?php echo $patient_follow_up->Template2->selectOptionListHtml("x_Template2") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$patient_follow_up->Template2->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Template2" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_follow_up->Template2->caption() ?>" data-title="<?php echo $patient_follow_up->Template2->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Template2',url:'mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $patient_follow_up->Template2->Lookup->getParamTag("p_x_Template2") ?>
</span>
</script>
<?php echo $patient_follow_up->Template2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->Template3->Visible) { // Template3 ?>
	<div id="r_Template3" class="form-group row">
		<label id="elh_patient_follow_up_Template3" for="x_Template3" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_Template3" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->Template3->caption() ?><?php echo ($patient_follow_up->Template3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->Template3->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Template3" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_Template3">
<?php $patient_follow_up->Template3->EditAttrs["onchange"] = "ew.autoFill(this);" . @$patient_follow_up->Template3->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_follow_up" data-field="x_Template3" data-value-separator="<?php echo $patient_follow_up->Template3->displayValueSeparatorAttribute() ?>" id="x_Template3" name="x_Template3"<?php echo $patient_follow_up->Template3->editAttributes() ?>>
		<?php echo $patient_follow_up->Template3->selectOptionListHtml("x_Template3") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$patient_follow_up->Template3->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Template3" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_follow_up->Template3->caption() ?>" data-title="<?php echo $patient_follow_up->Template3->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Template3',url:'mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $patient_follow_up->Template3->Lookup->getParamTag("p_x_Template3") ?>
</span>
</script>
<?php echo $patient_follow_up->Template3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_follow_up_Reception" for="x_Reception" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_Reception" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->Reception->caption() ?><?php echo ($patient_follow_up->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->Reception->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Reception" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_Reception">
<span<?php echo $patient_follow_up->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_follow_up->Reception->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_follow_up" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($patient_follow_up->Reception->CurrentValue) ?>">
<?php echo $patient_follow_up->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_follow_up_PatientId" for="x_PatientId" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_PatientId" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->PatientId->caption() ?><?php echo ($patient_follow_up->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->PatientId->cellAttributes() ?>>
<script id="tpx_patient_follow_up_PatientId" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_PatientId">
<span<?php echo $patient_follow_up->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_follow_up->PatientId->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" value="<?php echo HtmlEncode($patient_follow_up->PatientId->CurrentValue) ?>">
<?php echo $patient_follow_up->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label id="elh_patient_follow_up_PatientSearch" for="x_PatientSearch" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_PatientSearch" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->PatientSearch->caption() ?><?php echo ($patient_follow_up->PatientSearch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_follow_up_PatientSearch" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_PatientSearch">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo strval($patient_follow_up->PatientSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_follow_up->PatientSearch->ViewValue) : $patient_follow_up->PatientSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_follow_up->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_follow_up->PatientSearch->ReadOnly || $patient_follow_up->PatientSearch->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_follow_up->PatientSearch->Lookup->getParamTag("p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_follow_up->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_follow_up->PatientSearch->CurrentValue ?>"<?php echo $patient_follow_up->PatientSearch->editAttributes() ?>>
</span>
</script>
<?php echo $patient_follow_up->PatientSearch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->DischargeAdviceMedicine->Visible) { // DischargeAdviceMedicine ?>
	<div id="r_DischargeAdviceMedicine" class="form-group row">
		<label id="elh_patient_follow_up_DischargeAdviceMedicine" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_DischargeAdviceMedicine" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->DischargeAdviceMedicine->caption() ?><?php echo ($patient_follow_up->DischargeAdviceMedicine->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->DischargeAdviceMedicine->cellAttributes() ?>>
<script id="tpx_patient_follow_up_DischargeAdviceMedicine" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_DischargeAdviceMedicine">
<?php AppendClass($patient_follow_up->DischargeAdviceMedicine->EditAttrs["class"], "editor"); ?>
<textarea data-table="patient_follow_up" data-field="x_DischargeAdviceMedicine" name="x_DischargeAdviceMedicine" id="x_DischargeAdviceMedicine" cols="35" rows="10" placeholder="<?php echo HtmlEncode($patient_follow_up->DischargeAdviceMedicine->getPlaceHolder()) ?>"<?php echo $patient_follow_up->DischargeAdviceMedicine->editAttributes() ?>><?php echo $patient_follow_up->DischargeAdviceMedicine->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="patient_follow_upedit_js">
ew.createEditor("fpatient_follow_upedit", "x_DischargeAdviceMedicine", 35, 10, <?php echo ($patient_follow_up->DischargeAdviceMedicine->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $patient_follow_up->DischargeAdviceMedicine->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_follow_up->DischargeAdviceMedicineTemplate->Visible) { // DischargeAdviceMedicineTemplate ?>
	<div id="r_DischargeAdviceMedicineTemplate" class="form-group row">
		<label id="elh_patient_follow_up_DischargeAdviceMedicineTemplate" for="x_DischargeAdviceMedicineTemplate" class="<?php echo $patient_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_follow_up_DischargeAdviceMedicineTemplate" class="patient_follow_upedit" type="text/html"><span><?php echo $patient_follow_up->DischargeAdviceMedicineTemplate->caption() ?><?php echo ($patient_follow_up->DischargeAdviceMedicineTemplate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_follow_up->DischargeAdviceMedicineTemplate->cellAttributes() ?>>
<script id="tpx_patient_follow_up_DischargeAdviceMedicineTemplate" class="patient_follow_upedit" type="text/html">
<span id="el_patient_follow_up_DischargeAdviceMedicineTemplate">
<?php $patient_follow_up->DischargeAdviceMedicineTemplate->EditAttrs["onchange"] = "ew.autoFill(this);" . @$patient_follow_up->DischargeAdviceMedicineTemplate->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_follow_up" data-field="x_DischargeAdviceMedicineTemplate" data-value-separator="<?php echo $patient_follow_up->DischargeAdviceMedicineTemplate->displayValueSeparatorAttribute() ?>" id="x_DischargeAdviceMedicineTemplate" name="x_DischargeAdviceMedicineTemplate"<?php echo $patient_follow_up->DischargeAdviceMedicineTemplate->editAttributes() ?>>
		<?php echo $patient_follow_up->DischargeAdviceMedicineTemplate->selectOptionListHtml("x_DischargeAdviceMedicineTemplate") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$patient_follow_up->DischargeAdviceMedicineTemplate->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_DischargeAdviceMedicineTemplate" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_follow_up->DischargeAdviceMedicineTemplate->caption() ?>" data-title="<?php echo $patient_follow_up->DischargeAdviceMedicineTemplate->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_DischargeAdviceMedicineTemplate',url:'mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $patient_follow_up->DischargeAdviceMedicineTemplate->Lookup->getParamTag("p_x_DischargeAdviceMedicineTemplate") ?>
</span>
</script>
<?php echo $patient_follow_up->DischargeAdviceMedicineTemplate->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_follow_upedit" class="ew-custom-template"></div>
<script id="tpm_patient_follow_upedit" type="text/html">
<div id="ct_patient_follow_up_edit"><style>
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
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_follow_up where id='".$vviid."'; ";
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
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_follow_up_PatientSearch"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_PatientSearch"/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_follow_up_profilePic"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_profilePic"/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpx_SurfaceArea"/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpx_BodyMassIndex"/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_follow_up_mrnno"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_mrnno"/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_follow_up_Reception"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Reception"/}}</p> 
  <p>{{include tmpl="#tpc_patient_follow_up_PatientId"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_PatientId"/}}</p> 
  <p>{{include tmpl="#tpc_patient_follow_up_PatientName"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_PatientName"/}}</p> 
  <p>{{include tmpl="#tpc_patient_follow_up_Age"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Age"/}}</p> 
  <p>{{include tmpl="#tpc_patient_follow_up_Gender"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Gender"/}}</p>
  <p>{{include tmpl="#tpc_patient_follow_up_PatID"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_PatID"/}}</p>
  <p>{{include tmpl="#tpc_patient_follow_up_MobileNumber"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_MobileNumber"/}}</p> 
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
{{include tmpl="#tpc_patient_follow_up_Template"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Template"/}}
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_follow_up_courseinhospital"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_courseinhospital"/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
{{include tmpl="#tpc_patient_follow_up_Template"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Template"/}}
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_follow_up_procedurenotes"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_procedurenotes"/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
{{include tmpl="#tpc_patient_follow_up_Template"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Template"/}}
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_follow_up_conditionatdischarge"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_conditionatdischarge"/}}
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
						<tr><td>{{include tmpl="#tpc_patient_follow_up_BP"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_BP"/}}  mm of Hg </td></tr>
						<tr><td>{{include tmpl="#tpc_patient_follow_up_Pulse"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Pulse"/}}  mints</td></tr>						
						<tr><td>{{include tmpl="#tpc_patient_follow_up_Resp"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Resp"/}}</td></tr>
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
			  				<tr><td>{{include tmpl="#tpc_patient_follow_up_SPO2"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_SPO2"/}} F</td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_follow_up_NextReviewDate"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_NextReviewDate"/}} </td></tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
{{include tmpl="#tpc_patient_follow_up_DischargeAdviceMedicineTemplate"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_DischargeAdviceMedicineTemplate"/}}
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_follow_up_DischargeAdviceMedicine"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_DischargeAdviceMedicine"/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
{{include tmpl="#tpc_patient_follow_up_Template"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Template"/}}
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_follow_up_FollowupAdvice"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_FollowupAdvice"/}}
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
<?php if (!$patient_follow_up_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_follow_up_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_follow_up_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_follow_up->Rows) ?> };
ew.applyTemplate("tpd_patient_follow_upedit", "tpm_patient_follow_upedit", "patient_follow_upedit", "<?php echo $patient_follow_up->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_follow_upedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_follow_up_edit->showPageFooter();
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
$patient_follow_up_edit->terminate();
?>