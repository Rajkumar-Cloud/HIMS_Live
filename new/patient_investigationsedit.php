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
$patient_investigations_edit = new patient_investigations_edit();

// Run the page
$patient_investigations_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_investigations_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_investigationsedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpatient_investigationsedit = currentForm = new ew.Form("fpatient_investigationsedit", "edit");

	// Validate form
	fpatient_investigationsedit.validate = function() {
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
			<?php if ($patient_investigations_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->id->caption(), $patient_investigations_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->Reception->caption(), $patient_investigations_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->PatientId->caption(), $patient_investigations_edit->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->PatientName->caption(), $patient_investigations_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->Investigation->Required) { ?>
				elm = this.getElements("x" + infix + "_Investigation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->Investigation->caption(), $patient_investigations_edit->Investigation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->Value->Required) { ?>
				elm = this.getElements("x" + infix + "_Value");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->Value->caption(), $patient_investigations_edit->Value->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->NormalRange->Required) { ?>
				elm = this.getElements("x" + infix + "_NormalRange");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->NormalRange->caption(), $patient_investigations_edit->NormalRange->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->mrnno->caption(), $patient_investigations_edit->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->Age->caption(), $patient_investigations_edit->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->Gender->caption(), $patient_investigations_edit->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->profilePic->caption(), $patient_investigations_edit->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->SampleCollected->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleCollected");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->SampleCollected->caption(), $patient_investigations_edit->SampleCollected->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SampleCollected");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_edit->SampleCollected->errorMessage()) ?>");
			<?php if ($patient_investigations_edit->SampleCollectedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleCollectedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->SampleCollectedBy->caption(), $patient_investigations_edit->SampleCollectedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->ResultedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->ResultedDate->caption(), $patient_investigations_edit->ResultedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_edit->ResultedDate->errorMessage()) ?>");
			<?php if ($patient_investigations_edit->ResultedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->ResultedBy->caption(), $patient_investigations_edit->ResultedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->Modified->Required) { ?>
				elm = this.getElements("x" + infix + "_Modified");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->Modified->caption(), $patient_investigations_edit->Modified->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Modified");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_edit->Modified->errorMessage()) ?>");
			<?php if ($patient_investigations_edit->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->ModifiedBy->caption(), $patient_investigations_edit->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->Created->Required) { ?>
				elm = this.getElements("x" + infix + "_Created");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->Created->caption(), $patient_investigations_edit->Created->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Created");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_edit->Created->errorMessage()) ?>");
			<?php if ($patient_investigations_edit->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->CreatedBy->caption(), $patient_investigations_edit->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->GroupHead->Required) { ?>
				elm = this.getElements("x" + infix + "_GroupHead");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->GroupHead->caption(), $patient_investigations_edit->GroupHead->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->Cost->Required) { ?>
				elm = this.getElements("x" + infix + "_Cost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->Cost->caption(), $patient_investigations_edit->Cost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Cost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_edit->Cost->errorMessage()) ?>");
			<?php if ($patient_investigations_edit->PaymentStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_PaymentStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->PaymentStatus->caption(), $patient_investigations_edit->PaymentStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->PayMode->Required) { ?>
				elm = this.getElements("x" + infix + "_PayMode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->PayMode->caption(), $patient_investigations_edit->PayMode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->VoucherNo->Required) { ?>
				elm = this.getElements("x" + infix + "_VoucherNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->VoucherNo->caption(), $patient_investigations_edit->VoucherNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_edit->InvestigationMultiselect->Required) { ?>
				elm = this.getElements("x" + infix + "_InvestigationMultiselect");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_edit->InvestigationMultiselect->caption(), $patient_investigations_edit->InvestigationMultiselect->RequiredErrorMessage)) ?>");
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
	fpatient_investigationsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_investigationsedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpatient_investigationsedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_investigations_edit->showPageHeader(); ?>
<?php
$patient_investigations_edit->showMessage();
?>
<form name="fpatient_investigationsedit" id="fpatient_investigationsedit" class="<?php echo $patient_investigations_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_investigations">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_investigations_edit->IsModal ?>">
<?php if ($patient_investigations->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_investigations_edit->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_investigations_edit->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_investigations_edit->mrnno->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($patient_investigations_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_investigations_id" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->id->caption() ?><?php echo $patient_investigations_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->id->cellAttributes() ?>>
<span id="el_patient_investigations_id">
<span<?php echo $patient_investigations_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_investigations_edit->id->CurrentValue) ?>">
<?php echo $patient_investigations_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_investigations_Reception" for="x_Reception" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->Reception->caption() ?><?php echo $patient_investigations_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->Reception->cellAttributes() ?>>
<span id="el_patient_investigations_Reception">
<span<?php echo $patient_investigations_edit->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_edit->Reception->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($patient_investigations_edit->Reception->CurrentValue) ?>">
<?php echo $patient_investigations_edit->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_investigations_PatientId" for="x_PatientId" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->PatientId->caption() ?><?php echo $patient_investigations_edit->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->PatientId->cellAttributes() ?>>
<span id="el_patient_investigations_PatientId">
<span<?php echo $patient_investigations_edit->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_edit->PatientId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" value="<?php echo HtmlEncode($patient_investigations_edit->PatientId->CurrentValue) ?>">
<?php echo $patient_investigations_edit->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_investigations_PatientName" for="x_PatientName" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->PatientName->caption() ?><?php echo $patient_investigations_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->PatientName->cellAttributes() ?>>
<span id="el_patient_investigations_PatientName">
<input type="text" data-table="patient_investigations" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->PatientName->EditValue ?>"<?php echo $patient_investigations_edit->PatientName->editAttributes() ?>>
</span>
<?php echo $patient_investigations_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->Investigation->Visible) { // Investigation ?>
	<div id="r_Investigation" class="form-group row">
		<label id="elh_patient_investigations_Investigation" for="x_Investigation" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->Investigation->caption() ?><?php echo $patient_investigations_edit->Investigation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->Investigation->cellAttributes() ?>>
<span id="el_patient_investigations_Investigation">
<input type="text" data-table="patient_investigations" data-field="x_Investigation" name="x_Investigation" id="x_Investigation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_edit->Investigation->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->Investigation->EditValue ?>"<?php echo $patient_investigations_edit->Investigation->editAttributes() ?>>
</span>
<?php echo $patient_investigations_edit->Investigation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->Value->Visible) { // Value ?>
	<div id="r_Value" class="form-group row">
		<label id="elh_patient_investigations_Value" for="x_Value" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->Value->caption() ?><?php echo $patient_investigations_edit->Value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->Value->cellAttributes() ?>>
<span id="el_patient_investigations_Value">
<input type="text" data-table="patient_investigations" data-field="x_Value" name="x_Value" id="x_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_edit->Value->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->Value->EditValue ?>"<?php echo $patient_investigations_edit->Value->editAttributes() ?>>
</span>
<?php echo $patient_investigations_edit->Value->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->NormalRange->Visible) { // NormalRange ?>
	<div id="r_NormalRange" class="form-group row">
		<label id="elh_patient_investigations_NormalRange" for="x_NormalRange" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->NormalRange->caption() ?><?php echo $patient_investigations_edit->NormalRange->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->NormalRange->cellAttributes() ?>>
<span id="el_patient_investigations_NormalRange">
<input type="text" data-table="patient_investigations" data-field="x_NormalRange" name="x_NormalRange" id="x_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_edit->NormalRange->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->NormalRange->EditValue ?>"<?php echo $patient_investigations_edit->NormalRange->editAttributes() ?>>
</span>
<?php echo $patient_investigations_edit->NormalRange->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_investigations_mrnno" for="x_mrnno" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->mrnno->caption() ?><?php echo $patient_investigations_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->mrnno->cellAttributes() ?>>
<span id="el_patient_investigations_mrnno">
<span<?php echo $patient_investigations_edit->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_edit->mrnno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($patient_investigations_edit->mrnno->CurrentValue) ?>">
<?php echo $patient_investigations_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_investigations_Age" for="x_Age" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->Age->caption() ?><?php echo $patient_investigations_edit->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->Age->cellAttributes() ?>>
<span id="el_patient_investigations_Age">
<input type="text" data-table="patient_investigations" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_edit->Age->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->Age->EditValue ?>"<?php echo $patient_investigations_edit->Age->editAttributes() ?>>
</span>
<?php echo $patient_investigations_edit->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_investigations_Gender" for="x_Gender" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->Gender->caption() ?><?php echo $patient_investigations_edit->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->Gender->cellAttributes() ?>>
<span id="el_patient_investigations_Gender">
<input type="text" data-table="patient_investigations" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_edit->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->Gender->EditValue ?>"<?php echo $patient_investigations_edit->Gender->editAttributes() ?>>
</span>
<?php echo $patient_investigations_edit->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_investigations_profilePic" for="x_profilePic" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->profilePic->caption() ?><?php echo $patient_investigations_edit->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->profilePic->cellAttributes() ?>>
<span id="el_patient_investigations_profilePic">
<textarea data-table="patient_investigations" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_investigations_edit->profilePic->getPlaceHolder()) ?>"<?php echo $patient_investigations_edit->profilePic->editAttributes() ?>><?php echo $patient_investigations_edit->profilePic->EditValue ?></textarea>
</span>
<?php echo $patient_investigations_edit->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->SampleCollected->Visible) { // SampleCollected ?>
	<div id="r_SampleCollected" class="form-group row">
		<label id="elh_patient_investigations_SampleCollected" for="x_SampleCollected" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->SampleCollected->caption() ?><?php echo $patient_investigations_edit->SampleCollected->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->SampleCollected->cellAttributes() ?>>
<span id="el_patient_investigations_SampleCollected">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollected" name="x_SampleCollected" id="x_SampleCollected" placeholder="<?php echo HtmlEncode($patient_investigations_edit->SampleCollected->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->SampleCollected->EditValue ?>"<?php echo $patient_investigations_edit->SampleCollected->editAttributes() ?>>
<?php if (!$patient_investigations_edit->SampleCollected->ReadOnly && !$patient_investigations_edit->SampleCollected->Disabled && !isset($patient_investigations_edit->SampleCollected->EditAttrs["readonly"]) && !isset($patient_investigations_edit->SampleCollected->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsedit", "x_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_investigations_edit->SampleCollected->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
	<div id="r_SampleCollectedBy" class="form-group row">
		<label id="elh_patient_investigations_SampleCollectedBy" for="x_SampleCollectedBy" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->SampleCollectedBy->caption() ?><?php echo $patient_investigations_edit->SampleCollectedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->SampleCollectedBy->cellAttributes() ?>>
<span id="el_patient_investigations_SampleCollectedBy">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x_SampleCollectedBy" id="x_SampleCollectedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_edit->SampleCollectedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->SampleCollectedBy->EditValue ?>"<?php echo $patient_investigations_edit->SampleCollectedBy->editAttributes() ?>>
</span>
<?php echo $patient_investigations_edit->SampleCollectedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->ResultedDate->Visible) { // ResultedDate ?>
	<div id="r_ResultedDate" class="form-group row">
		<label id="elh_patient_investigations_ResultedDate" for="x_ResultedDate" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->ResultedDate->caption() ?><?php echo $patient_investigations_edit->ResultedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->ResultedDate->cellAttributes() ?>>
<span id="el_patient_investigations_ResultedDate">
<input type="text" data-table="patient_investigations" data-field="x_ResultedDate" name="x_ResultedDate" id="x_ResultedDate" placeholder="<?php echo HtmlEncode($patient_investigations_edit->ResultedDate->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->ResultedDate->EditValue ?>"<?php echo $patient_investigations_edit->ResultedDate->editAttributes() ?>>
<?php if (!$patient_investigations_edit->ResultedDate->ReadOnly && !$patient_investigations_edit->ResultedDate->Disabled && !isset($patient_investigations_edit->ResultedDate->EditAttrs["readonly"]) && !isset($patient_investigations_edit->ResultedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsedit", "x_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_investigations_edit->ResultedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->ResultedBy->Visible) { // ResultedBy ?>
	<div id="r_ResultedBy" class="form-group row">
		<label id="elh_patient_investigations_ResultedBy" for="x_ResultedBy" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->ResultedBy->caption() ?><?php echo $patient_investigations_edit->ResultedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->ResultedBy->cellAttributes() ?>>
<span id="el_patient_investigations_ResultedBy">
<input type="text" data-table="patient_investigations" data-field="x_ResultedBy" name="x_ResultedBy" id="x_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_edit->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->ResultedBy->EditValue ?>"<?php echo $patient_investigations_edit->ResultedBy->editAttributes() ?>>
</span>
<?php echo $patient_investigations_edit->ResultedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->Modified->Visible) { // Modified ?>
	<div id="r_Modified" class="form-group row">
		<label id="elh_patient_investigations_Modified" for="x_Modified" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->Modified->caption() ?><?php echo $patient_investigations_edit->Modified->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->Modified->cellAttributes() ?>>
<span id="el_patient_investigations_Modified">
<input type="text" data-table="patient_investigations" data-field="x_Modified" name="x_Modified" id="x_Modified" placeholder="<?php echo HtmlEncode($patient_investigations_edit->Modified->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->Modified->EditValue ?>"<?php echo $patient_investigations_edit->Modified->editAttributes() ?>>
<?php if (!$patient_investigations_edit->Modified->ReadOnly && !$patient_investigations_edit->Modified->Disabled && !isset($patient_investigations_edit->Modified->EditAttrs["readonly"]) && !isset($patient_investigations_edit->Modified->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsedit", "x_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_investigations_edit->Modified->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label id="elh_patient_investigations_ModifiedBy" for="x_ModifiedBy" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->ModifiedBy->caption() ?><?php echo $patient_investigations_edit->ModifiedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->ModifiedBy->cellAttributes() ?>>
<span id="el_patient_investigations_ModifiedBy">
<input type="text" data-table="patient_investigations" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_edit->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->ModifiedBy->EditValue ?>"<?php echo $patient_investigations_edit->ModifiedBy->editAttributes() ?>>
</span>
<?php echo $patient_investigations_edit->ModifiedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->Created->Visible) { // Created ?>
	<div id="r_Created" class="form-group row">
		<label id="elh_patient_investigations_Created" for="x_Created" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->Created->caption() ?><?php echo $patient_investigations_edit->Created->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->Created->cellAttributes() ?>>
<span id="el_patient_investigations_Created">
<input type="text" data-table="patient_investigations" data-field="x_Created" name="x_Created" id="x_Created" placeholder="<?php echo HtmlEncode($patient_investigations_edit->Created->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->Created->EditValue ?>"<?php echo $patient_investigations_edit->Created->editAttributes() ?>>
<?php if (!$patient_investigations_edit->Created->ReadOnly && !$patient_investigations_edit->Created->Disabled && !isset($patient_investigations_edit->Created->EditAttrs["readonly"]) && !isset($patient_investigations_edit->Created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsedit", "x_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_investigations_edit->Created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label id="elh_patient_investigations_CreatedBy" for="x_CreatedBy" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->CreatedBy->caption() ?><?php echo $patient_investigations_edit->CreatedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->CreatedBy->cellAttributes() ?>>
<span id="el_patient_investigations_CreatedBy">
<input type="text" data-table="patient_investigations" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_edit->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->CreatedBy->EditValue ?>"<?php echo $patient_investigations_edit->CreatedBy->editAttributes() ?>>
</span>
<?php echo $patient_investigations_edit->CreatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->GroupHead->Visible) { // GroupHead ?>
	<div id="r_GroupHead" class="form-group row">
		<label id="elh_patient_investigations_GroupHead" for="x_GroupHead" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->GroupHead->caption() ?><?php echo $patient_investigations_edit->GroupHead->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->GroupHead->cellAttributes() ?>>
<span id="el_patient_investigations_GroupHead">
<input type="text" data-table="patient_investigations" data-field="x_GroupHead" name="x_GroupHead" id="x_GroupHead" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($patient_investigations_edit->GroupHead->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->GroupHead->EditValue ?>"<?php echo $patient_investigations_edit->GroupHead->editAttributes() ?>>
</span>
<?php echo $patient_investigations_edit->GroupHead->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->Cost->Visible) { // Cost ?>
	<div id="r_Cost" class="form-group row">
		<label id="elh_patient_investigations_Cost" for="x_Cost" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->Cost->caption() ?><?php echo $patient_investigations_edit->Cost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->Cost->cellAttributes() ?>>
<span id="el_patient_investigations_Cost">
<input type="text" data-table="patient_investigations" data-field="x_Cost" name="x_Cost" id="x_Cost" size="30" placeholder="<?php echo HtmlEncode($patient_investigations_edit->Cost->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->Cost->EditValue ?>"<?php echo $patient_investigations_edit->Cost->editAttributes() ?>>
</span>
<?php echo $patient_investigations_edit->Cost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->PaymentStatus->Visible) { // PaymentStatus ?>
	<div id="r_PaymentStatus" class="form-group row">
		<label id="elh_patient_investigations_PaymentStatus" for="x_PaymentStatus" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->PaymentStatus->caption() ?><?php echo $patient_investigations_edit->PaymentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->PaymentStatus->cellAttributes() ?>>
<span id="el_patient_investigations_PaymentStatus">
<input type="text" data-table="patient_investigations" data-field="x_PaymentStatus" name="x_PaymentStatus" id="x_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_edit->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->PaymentStatus->EditValue ?>"<?php echo $patient_investigations_edit->PaymentStatus->editAttributes() ?>>
</span>
<?php echo $patient_investigations_edit->PaymentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->PayMode->Visible) { // PayMode ?>
	<div id="r_PayMode" class="form-group row">
		<label id="elh_patient_investigations_PayMode" for="x_PayMode" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->PayMode->caption() ?><?php echo $patient_investigations_edit->PayMode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->PayMode->cellAttributes() ?>>
<span id="el_patient_investigations_PayMode">
<input type="text" data-table="patient_investigations" data-field="x_PayMode" name="x_PayMode" id="x_PayMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_edit->PayMode->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->PayMode->EditValue ?>"<?php echo $patient_investigations_edit->PayMode->editAttributes() ?>>
</span>
<?php echo $patient_investigations_edit->PayMode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->VoucherNo->Visible) { // VoucherNo ?>
	<div id="r_VoucherNo" class="form-group row">
		<label id="elh_patient_investigations_VoucherNo" for="x_VoucherNo" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->VoucherNo->caption() ?><?php echo $patient_investigations_edit->VoucherNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->VoucherNo->cellAttributes() ?>>
<span id="el_patient_investigations_VoucherNo">
<input type="text" data-table="patient_investigations" data-field="x_VoucherNo" name="x_VoucherNo" id="x_VoucherNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_edit->VoucherNo->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->VoucherNo->EditValue ?>"<?php echo $patient_investigations_edit->VoucherNo->editAttributes() ?>>
</span>
<?php echo $patient_investigations_edit->VoucherNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_edit->InvestigationMultiselect->Visible) { // InvestigationMultiselect ?>
	<div id="r_InvestigationMultiselect" class="form-group row">
		<label id="elh_patient_investigations_InvestigationMultiselect" for="x_InvestigationMultiselect" class="<?php echo $patient_investigations_edit->LeftColumnClass ?>"><?php echo $patient_investigations_edit->InvestigationMultiselect->caption() ?><?php echo $patient_investigations_edit->InvestigationMultiselect->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_edit->RightColumnClass ?>"><div <?php echo $patient_investigations_edit->InvestigationMultiselect->cellAttributes() ?>>
<span id="el_patient_investigations_InvestigationMultiselect">
<input type="text" data-table="patient_investigations" data-field="x_InvestigationMultiselect" name="x_InvestigationMultiselect" id="x_InvestigationMultiselect" placeholder="<?php echo HtmlEncode($patient_investigations_edit->InvestigationMultiselect->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_edit->InvestigationMultiselect->EditValue ?>"<?php echo $patient_investigations_edit->InvestigationMultiselect->editAttributes() ?>>
</span>
<?php echo $patient_investigations_edit->InvestigationMultiselect->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_investigations_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_investigations_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_investigations_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_investigations_edit->showPageFooter();
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
$patient_investigations_edit->terminate();
?>