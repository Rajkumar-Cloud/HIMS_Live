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
$patient_investigations_add = new patient_investigations_add();

// Run the page
$patient_investigations_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_investigations_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpatient_investigationsadd = currentForm = new ew.Form("fpatient_investigationsadd", "add");

// Validate form
fpatient_investigationsadd.validate = function() {
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
		<?php if ($patient_investigations_add->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Reception->caption(), $patient_investigations->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->PatientId->caption(), $patient_investigations->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->PatientName->caption(), $patient_investigations->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->Investigation->Required) { ?>
			elm = this.getElements("x" + infix + "_Investigation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Investigation->caption(), $patient_investigations->Investigation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->Value->Required) { ?>
			elm = this.getElements("x" + infix + "_Value");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Value->caption(), $patient_investigations->Value->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->NormalRange->Required) { ?>
			elm = this.getElements("x" + infix + "_NormalRange");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->NormalRange->caption(), $patient_investigations->NormalRange->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->mrnno->caption(), $patient_investigations->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Age->caption(), $patient_investigations->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Gender->caption(), $patient_investigations->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->profilePic->caption(), $patient_investigations->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->SampleCollected->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleCollected");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->SampleCollected->caption(), $patient_investigations->SampleCollected->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SampleCollected");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_investigations->SampleCollected->errorMessage()) ?>");
		<?php if ($patient_investigations_add->SampleCollectedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleCollectedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->SampleCollectedBy->caption(), $patient_investigations->SampleCollectedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->ResultedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->ResultedDate->caption(), $patient_investigations->ResultedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResultedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_investigations->ResultedDate->errorMessage()) ?>");
		<?php if ($patient_investigations_add->ResultedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->ResultedBy->caption(), $patient_investigations->ResultedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->Modified->Required) { ?>
			elm = this.getElements("x" + infix + "_Modified");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Modified->caption(), $patient_investigations->Modified->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Modified");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_investigations->Modified->errorMessage()) ?>");
		<?php if ($patient_investigations_add->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->ModifiedBy->caption(), $patient_investigations->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->Created->Required) { ?>
			elm = this.getElements("x" + infix + "_Created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Created->caption(), $patient_investigations->Created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_investigations->Created->errorMessage()) ?>");
		<?php if ($patient_investigations_add->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->CreatedBy->caption(), $patient_investigations->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->GroupHead->Required) { ?>
			elm = this.getElements("x" + infix + "_GroupHead");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->GroupHead->caption(), $patient_investigations->GroupHead->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->Cost->Required) { ?>
			elm = this.getElements("x" + infix + "_Cost");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Cost->caption(), $patient_investigations->Cost->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Cost");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_investigations->Cost->errorMessage()) ?>");
		<?php if ($patient_investigations_add->PaymentStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->PaymentStatus->caption(), $patient_investigations->PaymentStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->PayMode->Required) { ?>
			elm = this.getElements("x" + infix + "_PayMode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->PayMode->caption(), $patient_investigations->PayMode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->VoucherNo->Required) { ?>
			elm = this.getElements("x" + infix + "_VoucherNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->VoucherNo->caption(), $patient_investigations->VoucherNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_add->InvestigationMultiselect->Required) { ?>
			elm = this.getElements("x" + infix + "_InvestigationMultiselect");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->InvestigationMultiselect->caption(), $patient_investigations->InvestigationMultiselect->RequiredErrorMessage)) ?>");
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
fpatient_investigationsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_investigationsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_investigations_add->showPageHeader(); ?>
<?php
$patient_investigations_add->showMessage();
?>
<form name="fpatient_investigationsadd" id="fpatient_investigationsadd" class="<?php echo $patient_investigations_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_investigations_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_investigations_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_investigations">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_investigations_add->IsModal ?>">
<?php if ($patient_investigations->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_investigations->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_investigations->PatientId->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_investigations->mrnno->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($patient_investigations->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_investigations_Reception" for="x_Reception" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->Reception->caption() ?><?php echo ($patient_investigations->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->Reception->cellAttributes() ?>>
<?php if ($patient_investigations->Reception->getSessionValue() <> "") { ?>
<span id="el_patient_investigations_Reception">
<span<?php echo $patient_investigations->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?php echo HtmlEncode($patient_investigations->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_investigations_Reception">
<input type="text" data-table="patient_investigations" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Reception->EditValue ?>"<?php echo $patient_investigations->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_investigations->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_investigations_PatientId" for="x_PatientId" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->PatientId->caption() ?><?php echo ($patient_investigations->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->PatientId->cellAttributes() ?>>
<?php if ($patient_investigations->PatientId->getSessionValue() <> "") { ?>
<span id="el_patient_investigations_PatientId">
<span<?php echo $patient_investigations->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_PatientId" name="x_PatientId" value="<?php echo HtmlEncode($patient_investigations->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_investigations_PatientId">
<input type="text" data-table="patient_investigations" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->PatientId->EditValue ?>"<?php echo $patient_investigations->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_investigations->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_investigations_PatientName" for="x_PatientName" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->PatientName->caption() ?><?php echo ($patient_investigations->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->PatientName->cellAttributes() ?>>
<span id="el_patient_investigations_PatientName">
<input type="text" data-table="patient_investigations" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->PatientName->EditValue ?>"<?php echo $patient_investigations->PatientName->editAttributes() ?>>
</span>
<?php echo $patient_investigations->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->Investigation->Visible) { // Investigation ?>
	<div id="r_Investigation" class="form-group row">
		<label id="elh_patient_investigations_Investigation" for="x_Investigation" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->Investigation->caption() ?><?php echo ($patient_investigations->Investigation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->Investigation->cellAttributes() ?>>
<span id="el_patient_investigations_Investigation">
<input type="text" data-table="patient_investigations" data-field="x_Investigation" name="x_Investigation" id="x_Investigation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Investigation->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Investigation->EditValue ?>"<?php echo $patient_investigations->Investigation->editAttributes() ?>>
</span>
<?php echo $patient_investigations->Investigation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->Value->Visible) { // Value ?>
	<div id="r_Value" class="form-group row">
		<label id="elh_patient_investigations_Value" for="x_Value" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->Value->caption() ?><?php echo ($patient_investigations->Value->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->Value->cellAttributes() ?>>
<span id="el_patient_investigations_Value">
<input type="text" data-table="patient_investigations" data-field="x_Value" name="x_Value" id="x_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Value->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Value->EditValue ?>"<?php echo $patient_investigations->Value->editAttributes() ?>>
</span>
<?php echo $patient_investigations->Value->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->NormalRange->Visible) { // NormalRange ?>
	<div id="r_NormalRange" class="form-group row">
		<label id="elh_patient_investigations_NormalRange" for="x_NormalRange" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->NormalRange->caption() ?><?php echo ($patient_investigations->NormalRange->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->NormalRange->cellAttributes() ?>>
<span id="el_patient_investigations_NormalRange">
<input type="text" data-table="patient_investigations" data-field="x_NormalRange" name="x_NormalRange" id="x_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->NormalRange->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->NormalRange->EditValue ?>"<?php echo $patient_investigations->NormalRange->editAttributes() ?>>
</span>
<?php echo $patient_investigations->NormalRange->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_investigations_mrnno" for="x_mrnno" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->mrnno->caption() ?><?php echo ($patient_investigations->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->mrnno->cellAttributes() ?>>
<?php if ($patient_investigations->mrnno->getSessionValue() <> "") { ?>
<span id="el_patient_investigations_mrnno">
<span<?php echo $patient_investigations->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?php echo HtmlEncode($patient_investigations->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_investigations_mrnno">
<input type="text" data-table="patient_investigations" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->mrnno->EditValue ?>"<?php echo $patient_investigations->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_investigations->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_investigations_Age" for="x_Age" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->Age->caption() ?><?php echo ($patient_investigations->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->Age->cellAttributes() ?>>
<span id="el_patient_investigations_Age">
<input type="text" data-table="patient_investigations" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Age->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Age->EditValue ?>"<?php echo $patient_investigations->Age->editAttributes() ?>>
</span>
<?php echo $patient_investigations->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_investigations_Gender" for="x_Gender" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->Gender->caption() ?><?php echo ($patient_investigations->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->Gender->cellAttributes() ?>>
<span id="el_patient_investigations_Gender">
<input type="text" data-table="patient_investigations" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Gender->EditValue ?>"<?php echo $patient_investigations->Gender->editAttributes() ?>>
</span>
<?php echo $patient_investigations->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_investigations_profilePic" for="x_profilePic" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->profilePic->caption() ?><?php echo ($patient_investigations->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->profilePic->cellAttributes() ?>>
<span id="el_patient_investigations_profilePic">
<textarea data-table="patient_investigations" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_investigations->profilePic->getPlaceHolder()) ?>"<?php echo $patient_investigations->profilePic->editAttributes() ?>><?php echo $patient_investigations->profilePic->EditValue ?></textarea>
</span>
<?php echo $patient_investigations->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->SampleCollected->Visible) { // SampleCollected ?>
	<div id="r_SampleCollected" class="form-group row">
		<label id="elh_patient_investigations_SampleCollected" for="x_SampleCollected" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->SampleCollected->caption() ?><?php echo ($patient_investigations->SampleCollected->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->SampleCollected->cellAttributes() ?>>
<span id="el_patient_investigations_SampleCollected">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollected" name="x_SampleCollected" id="x_SampleCollected" placeholder="<?php echo HtmlEncode($patient_investigations->SampleCollected->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->SampleCollected->EditValue ?>"<?php echo $patient_investigations->SampleCollected->editAttributes() ?>>
<?php if (!$patient_investigations->SampleCollected->ReadOnly && !$patient_investigations->SampleCollected->Disabled && !isset($patient_investigations->SampleCollected->EditAttrs["readonly"]) && !isset($patient_investigations->SampleCollected->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_investigationsadd", "x_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_investigations->SampleCollected->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
	<div id="r_SampleCollectedBy" class="form-group row">
		<label id="elh_patient_investigations_SampleCollectedBy" for="x_SampleCollectedBy" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->SampleCollectedBy->caption() ?><?php echo ($patient_investigations->SampleCollectedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->SampleCollectedBy->cellAttributes() ?>>
<span id="el_patient_investigations_SampleCollectedBy">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x_SampleCollectedBy" id="x_SampleCollectedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->SampleCollectedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->SampleCollectedBy->EditValue ?>"<?php echo $patient_investigations->SampleCollectedBy->editAttributes() ?>>
</span>
<?php echo $patient_investigations->SampleCollectedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->ResultedDate->Visible) { // ResultedDate ?>
	<div id="r_ResultedDate" class="form-group row">
		<label id="elh_patient_investigations_ResultedDate" for="x_ResultedDate" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->ResultedDate->caption() ?><?php echo ($patient_investigations->ResultedDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->ResultedDate->cellAttributes() ?>>
<span id="el_patient_investigations_ResultedDate">
<input type="text" data-table="patient_investigations" data-field="x_ResultedDate" name="x_ResultedDate" id="x_ResultedDate" placeholder="<?php echo HtmlEncode($patient_investigations->ResultedDate->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ResultedDate->EditValue ?>"<?php echo $patient_investigations->ResultedDate->editAttributes() ?>>
<?php if (!$patient_investigations->ResultedDate->ReadOnly && !$patient_investigations->ResultedDate->Disabled && !isset($patient_investigations->ResultedDate->EditAttrs["readonly"]) && !isset($patient_investigations->ResultedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_investigationsadd", "x_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_investigations->ResultedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->ResultedBy->Visible) { // ResultedBy ?>
	<div id="r_ResultedBy" class="form-group row">
		<label id="elh_patient_investigations_ResultedBy" for="x_ResultedBy" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->ResultedBy->caption() ?><?php echo ($patient_investigations->ResultedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->ResultedBy->cellAttributes() ?>>
<span id="el_patient_investigations_ResultedBy">
<input type="text" data-table="patient_investigations" data-field="x_ResultedBy" name="x_ResultedBy" id="x_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ResultedBy->EditValue ?>"<?php echo $patient_investigations->ResultedBy->editAttributes() ?>>
</span>
<?php echo $patient_investigations->ResultedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->Modified->Visible) { // Modified ?>
	<div id="r_Modified" class="form-group row">
		<label id="elh_patient_investigations_Modified" for="x_Modified" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->Modified->caption() ?><?php echo ($patient_investigations->Modified->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->Modified->cellAttributes() ?>>
<span id="el_patient_investigations_Modified">
<input type="text" data-table="patient_investigations" data-field="x_Modified" name="x_Modified" id="x_Modified" placeholder="<?php echo HtmlEncode($patient_investigations->Modified->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Modified->EditValue ?>"<?php echo $patient_investigations->Modified->editAttributes() ?>>
<?php if (!$patient_investigations->Modified->ReadOnly && !$patient_investigations->Modified->Disabled && !isset($patient_investigations->Modified->EditAttrs["readonly"]) && !isset($patient_investigations->Modified->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_investigationsadd", "x_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_investigations->Modified->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label id="elh_patient_investigations_ModifiedBy" for="x_ModifiedBy" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->ModifiedBy->caption() ?><?php echo ($patient_investigations->ModifiedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->ModifiedBy->cellAttributes() ?>>
<span id="el_patient_investigations_ModifiedBy">
<input type="text" data-table="patient_investigations" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ModifiedBy->EditValue ?>"<?php echo $patient_investigations->ModifiedBy->editAttributes() ?>>
</span>
<?php echo $patient_investigations->ModifiedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->Created->Visible) { // Created ?>
	<div id="r_Created" class="form-group row">
		<label id="elh_patient_investigations_Created" for="x_Created" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->Created->caption() ?><?php echo ($patient_investigations->Created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->Created->cellAttributes() ?>>
<span id="el_patient_investigations_Created">
<input type="text" data-table="patient_investigations" data-field="x_Created" name="x_Created" id="x_Created" placeholder="<?php echo HtmlEncode($patient_investigations->Created->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Created->EditValue ?>"<?php echo $patient_investigations->Created->editAttributes() ?>>
<?php if (!$patient_investigations->Created->ReadOnly && !$patient_investigations->Created->Disabled && !isset($patient_investigations->Created->EditAttrs["readonly"]) && !isset($patient_investigations->Created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_investigationsadd", "x_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_investigations->Created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label id="elh_patient_investigations_CreatedBy" for="x_CreatedBy" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->CreatedBy->caption() ?><?php echo ($patient_investigations->CreatedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->CreatedBy->cellAttributes() ?>>
<span id="el_patient_investigations_CreatedBy">
<input type="text" data-table="patient_investigations" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->CreatedBy->EditValue ?>"<?php echo $patient_investigations->CreatedBy->editAttributes() ?>>
</span>
<?php echo $patient_investigations->CreatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->GroupHead->Visible) { // GroupHead ?>
	<div id="r_GroupHead" class="form-group row">
		<label id="elh_patient_investigations_GroupHead" for="x_GroupHead" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->GroupHead->caption() ?><?php echo ($patient_investigations->GroupHead->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->GroupHead->cellAttributes() ?>>
<span id="el_patient_investigations_GroupHead">
<input type="text" data-table="patient_investigations" data-field="x_GroupHead" name="x_GroupHead" id="x_GroupHead" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($patient_investigations->GroupHead->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->GroupHead->EditValue ?>"<?php echo $patient_investigations->GroupHead->editAttributes() ?>>
</span>
<?php echo $patient_investigations->GroupHead->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->Cost->Visible) { // Cost ?>
	<div id="r_Cost" class="form-group row">
		<label id="elh_patient_investigations_Cost" for="x_Cost" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->Cost->caption() ?><?php echo ($patient_investigations->Cost->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->Cost->cellAttributes() ?>>
<span id="el_patient_investigations_Cost">
<input type="text" data-table="patient_investigations" data-field="x_Cost" name="x_Cost" id="x_Cost" size="30" placeholder="<?php echo HtmlEncode($patient_investigations->Cost->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Cost->EditValue ?>"<?php echo $patient_investigations->Cost->editAttributes() ?>>
</span>
<?php echo $patient_investigations->Cost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->PaymentStatus->Visible) { // PaymentStatus ?>
	<div id="r_PaymentStatus" class="form-group row">
		<label id="elh_patient_investigations_PaymentStatus" for="x_PaymentStatus" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->PaymentStatus->caption() ?><?php echo ($patient_investigations->PaymentStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->PaymentStatus->cellAttributes() ?>>
<span id="el_patient_investigations_PaymentStatus">
<input type="text" data-table="patient_investigations" data-field="x_PaymentStatus" name="x_PaymentStatus" id="x_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->PaymentStatus->EditValue ?>"<?php echo $patient_investigations->PaymentStatus->editAttributes() ?>>
</span>
<?php echo $patient_investigations->PaymentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->PayMode->Visible) { // PayMode ?>
	<div id="r_PayMode" class="form-group row">
		<label id="elh_patient_investigations_PayMode" for="x_PayMode" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->PayMode->caption() ?><?php echo ($patient_investigations->PayMode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->PayMode->cellAttributes() ?>>
<span id="el_patient_investigations_PayMode">
<input type="text" data-table="patient_investigations" data-field="x_PayMode" name="x_PayMode" id="x_PayMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->PayMode->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->PayMode->EditValue ?>"<?php echo $patient_investigations->PayMode->editAttributes() ?>>
</span>
<?php echo $patient_investigations->PayMode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->VoucherNo->Visible) { // VoucherNo ?>
	<div id="r_VoucherNo" class="form-group row">
		<label id="elh_patient_investigations_VoucherNo" for="x_VoucherNo" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->VoucherNo->caption() ?><?php echo ($patient_investigations->VoucherNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->VoucherNo->cellAttributes() ?>>
<span id="el_patient_investigations_VoucherNo">
<input type="text" data-table="patient_investigations" data-field="x_VoucherNo" name="x_VoucherNo" id="x_VoucherNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->VoucherNo->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->VoucherNo->EditValue ?>"<?php echo $patient_investigations->VoucherNo->editAttributes() ?>>
</span>
<?php echo $patient_investigations->VoucherNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations->InvestigationMultiselect->Visible) { // InvestigationMultiselect ?>
	<div id="r_InvestigationMultiselect" class="form-group row">
		<label id="elh_patient_investigations_InvestigationMultiselect" for="x_InvestigationMultiselect" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations->InvestigationMultiselect->caption() ?><?php echo ($patient_investigations->InvestigationMultiselect->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div<?php echo $patient_investigations->InvestigationMultiselect->cellAttributes() ?>>
<span id="el_patient_investigations_InvestigationMultiselect">
<input type="text" data-table="patient_investigations" data-field="x_InvestigationMultiselect" name="x_InvestigationMultiselect" id="x_InvestigationMultiselect" placeholder="<?php echo HtmlEncode($patient_investigations->InvestigationMultiselect->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->InvestigationMultiselect->EditValue ?>"<?php echo $patient_investigations->InvestigationMultiselect->editAttributes() ?>>
</span>
<?php echo $patient_investigations->InvestigationMultiselect->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_investigations_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_investigations_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_investigations_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_investigations_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_investigations_add->terminate();
?>