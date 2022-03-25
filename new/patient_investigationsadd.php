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
<?php include_once "header.php"; ?>
<script>
var fpatient_investigationsadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpatient_investigationsadd = currentForm = new ew.Form("fpatient_investigationsadd", "add");

	// Validate form
	fpatient_investigationsadd.validate = function() {
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
			<?php if ($patient_investigations_add->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->Reception->caption(), $patient_investigations_add->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->PatientId->caption(), $patient_investigations_add->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->PatientName->caption(), $patient_investigations_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->Investigation->Required) { ?>
				elm = this.getElements("x" + infix + "_Investigation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->Investigation->caption(), $patient_investigations_add->Investigation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->Value->Required) { ?>
				elm = this.getElements("x" + infix + "_Value");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->Value->caption(), $patient_investigations_add->Value->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->NormalRange->Required) { ?>
				elm = this.getElements("x" + infix + "_NormalRange");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->NormalRange->caption(), $patient_investigations_add->NormalRange->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->mrnno->caption(), $patient_investigations_add->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->Age->caption(), $patient_investigations_add->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->Gender->caption(), $patient_investigations_add->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->profilePic->caption(), $patient_investigations_add->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->SampleCollected->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleCollected");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->SampleCollected->caption(), $patient_investigations_add->SampleCollected->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SampleCollected");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_add->SampleCollected->errorMessage()) ?>");
			<?php if ($patient_investigations_add->SampleCollectedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleCollectedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->SampleCollectedBy->caption(), $patient_investigations_add->SampleCollectedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->ResultedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->ResultedDate->caption(), $patient_investigations_add->ResultedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_add->ResultedDate->errorMessage()) ?>");
			<?php if ($patient_investigations_add->ResultedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->ResultedBy->caption(), $patient_investigations_add->ResultedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->Modified->Required) { ?>
				elm = this.getElements("x" + infix + "_Modified");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->Modified->caption(), $patient_investigations_add->Modified->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Modified");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_add->Modified->errorMessage()) ?>");
			<?php if ($patient_investigations_add->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->ModifiedBy->caption(), $patient_investigations_add->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->Created->Required) { ?>
				elm = this.getElements("x" + infix + "_Created");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->Created->caption(), $patient_investigations_add->Created->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Created");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_add->Created->errorMessage()) ?>");
			<?php if ($patient_investigations_add->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->CreatedBy->caption(), $patient_investigations_add->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->GroupHead->Required) { ?>
				elm = this.getElements("x" + infix + "_GroupHead");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->GroupHead->caption(), $patient_investigations_add->GroupHead->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->Cost->Required) { ?>
				elm = this.getElements("x" + infix + "_Cost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->Cost->caption(), $patient_investigations_add->Cost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Cost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_add->Cost->errorMessage()) ?>");
			<?php if ($patient_investigations_add->PaymentStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_PaymentStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->PaymentStatus->caption(), $patient_investigations_add->PaymentStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->PayMode->Required) { ?>
				elm = this.getElements("x" + infix + "_PayMode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->PayMode->caption(), $patient_investigations_add->PayMode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->VoucherNo->Required) { ?>
				elm = this.getElements("x" + infix + "_VoucherNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->VoucherNo->caption(), $patient_investigations_add->VoucherNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_add->InvestigationMultiselect->Required) { ?>
				elm = this.getElements("x" + infix + "_InvestigationMultiselect");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_add->InvestigationMultiselect->caption(), $patient_investigations_add->InvestigationMultiselect->RequiredErrorMessage)) ?>");
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
	fpatient_investigationsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_investigationsadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpatient_investigationsadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_investigations_add->showPageHeader(); ?>
<?php
$patient_investigations_add->showMessage();
?>
<form name="fpatient_investigationsadd" id="fpatient_investigationsadd" class="<?php echo $patient_investigations_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_investigations">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_investigations_add->IsModal ?>">
<?php if ($patient_investigations->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_investigations_add->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_investigations_add->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_investigations_add->mrnno->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($patient_investigations_add->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_investigations_Reception" for="x_Reception" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->Reception->caption() ?><?php echo $patient_investigations_add->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->Reception->cellAttributes() ?>>
<?php if ($patient_investigations_add->Reception->getSessionValue() != "") { ?>
<span id="el_patient_investigations_Reception">
<span<?php echo $patient_investigations_add->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_add->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?php echo HtmlEncode($patient_investigations_add->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_investigations_Reception">
<input type="text" data-table="patient_investigations" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_add->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->Reception->EditValue ?>"<?php echo $patient_investigations_add->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_investigations_add->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_investigations_PatientId" for="x_PatientId" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->PatientId->caption() ?><?php echo $patient_investigations_add->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->PatientId->cellAttributes() ?>>
<?php if ($patient_investigations_add->PatientId->getSessionValue() != "") { ?>
<span id="el_patient_investigations_PatientId">
<span<?php echo $patient_investigations_add->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_add->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_PatientId" name="x_PatientId" value="<?php echo HtmlEncode($patient_investigations_add->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_investigations_PatientId">
<input type="text" data-table="patient_investigations" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_add->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->PatientId->EditValue ?>"<?php echo $patient_investigations_add->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_investigations_add->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_investigations_PatientName" for="x_PatientName" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->PatientName->caption() ?><?php echo $patient_investigations_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->PatientName->cellAttributes() ?>>
<span id="el_patient_investigations_PatientName">
<input type="text" data-table="patient_investigations" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_add->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->PatientName->EditValue ?>"<?php echo $patient_investigations_add->PatientName->editAttributes() ?>>
</span>
<?php echo $patient_investigations_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->Investigation->Visible) { // Investigation ?>
	<div id="r_Investigation" class="form-group row">
		<label id="elh_patient_investigations_Investigation" for="x_Investigation" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->Investigation->caption() ?><?php echo $patient_investigations_add->Investigation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->Investigation->cellAttributes() ?>>
<span id="el_patient_investigations_Investigation">
<input type="text" data-table="patient_investigations" data-field="x_Investigation" name="x_Investigation" id="x_Investigation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_add->Investigation->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->Investigation->EditValue ?>"<?php echo $patient_investigations_add->Investigation->editAttributes() ?>>
</span>
<?php echo $patient_investigations_add->Investigation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->Value->Visible) { // Value ?>
	<div id="r_Value" class="form-group row">
		<label id="elh_patient_investigations_Value" for="x_Value" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->Value->caption() ?><?php echo $patient_investigations_add->Value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->Value->cellAttributes() ?>>
<span id="el_patient_investigations_Value">
<input type="text" data-table="patient_investigations" data-field="x_Value" name="x_Value" id="x_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_add->Value->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->Value->EditValue ?>"<?php echo $patient_investigations_add->Value->editAttributes() ?>>
</span>
<?php echo $patient_investigations_add->Value->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->NormalRange->Visible) { // NormalRange ?>
	<div id="r_NormalRange" class="form-group row">
		<label id="elh_patient_investigations_NormalRange" for="x_NormalRange" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->NormalRange->caption() ?><?php echo $patient_investigations_add->NormalRange->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->NormalRange->cellAttributes() ?>>
<span id="el_patient_investigations_NormalRange">
<input type="text" data-table="patient_investigations" data-field="x_NormalRange" name="x_NormalRange" id="x_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_add->NormalRange->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->NormalRange->EditValue ?>"<?php echo $patient_investigations_add->NormalRange->editAttributes() ?>>
</span>
<?php echo $patient_investigations_add->NormalRange->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_investigations_mrnno" for="x_mrnno" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->mrnno->caption() ?><?php echo $patient_investigations_add->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->mrnno->cellAttributes() ?>>
<?php if ($patient_investigations_add->mrnno->getSessionValue() != "") { ?>
<span id="el_patient_investigations_mrnno">
<span<?php echo $patient_investigations_add->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_add->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?php echo HtmlEncode($patient_investigations_add->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_investigations_mrnno">
<input type="text" data-table="patient_investigations" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_add->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->mrnno->EditValue ?>"<?php echo $patient_investigations_add->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_investigations_add->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_investigations_Age" for="x_Age" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->Age->caption() ?><?php echo $patient_investigations_add->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->Age->cellAttributes() ?>>
<span id="el_patient_investigations_Age">
<input type="text" data-table="patient_investigations" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_add->Age->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->Age->EditValue ?>"<?php echo $patient_investigations_add->Age->editAttributes() ?>>
</span>
<?php echo $patient_investigations_add->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_investigations_Gender" for="x_Gender" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->Gender->caption() ?><?php echo $patient_investigations_add->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->Gender->cellAttributes() ?>>
<span id="el_patient_investigations_Gender">
<input type="text" data-table="patient_investigations" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_add->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->Gender->EditValue ?>"<?php echo $patient_investigations_add->Gender->editAttributes() ?>>
</span>
<?php echo $patient_investigations_add->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_investigations_profilePic" for="x_profilePic" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->profilePic->caption() ?><?php echo $patient_investigations_add->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->profilePic->cellAttributes() ?>>
<span id="el_patient_investigations_profilePic">
<textarea data-table="patient_investigations" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_investigations_add->profilePic->getPlaceHolder()) ?>"<?php echo $patient_investigations_add->profilePic->editAttributes() ?>><?php echo $patient_investigations_add->profilePic->EditValue ?></textarea>
</span>
<?php echo $patient_investigations_add->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->SampleCollected->Visible) { // SampleCollected ?>
	<div id="r_SampleCollected" class="form-group row">
		<label id="elh_patient_investigations_SampleCollected" for="x_SampleCollected" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->SampleCollected->caption() ?><?php echo $patient_investigations_add->SampleCollected->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->SampleCollected->cellAttributes() ?>>
<span id="el_patient_investigations_SampleCollected">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollected" name="x_SampleCollected" id="x_SampleCollected" placeholder="<?php echo HtmlEncode($patient_investigations_add->SampleCollected->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->SampleCollected->EditValue ?>"<?php echo $patient_investigations_add->SampleCollected->editAttributes() ?>>
<?php if (!$patient_investigations_add->SampleCollected->ReadOnly && !$patient_investigations_add->SampleCollected->Disabled && !isset($patient_investigations_add->SampleCollected->EditAttrs["readonly"]) && !isset($patient_investigations_add->SampleCollected->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsadd", "x_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_investigations_add->SampleCollected->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
	<div id="r_SampleCollectedBy" class="form-group row">
		<label id="elh_patient_investigations_SampleCollectedBy" for="x_SampleCollectedBy" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->SampleCollectedBy->caption() ?><?php echo $patient_investigations_add->SampleCollectedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->SampleCollectedBy->cellAttributes() ?>>
<span id="el_patient_investigations_SampleCollectedBy">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x_SampleCollectedBy" id="x_SampleCollectedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_add->SampleCollectedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->SampleCollectedBy->EditValue ?>"<?php echo $patient_investigations_add->SampleCollectedBy->editAttributes() ?>>
</span>
<?php echo $patient_investigations_add->SampleCollectedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->ResultedDate->Visible) { // ResultedDate ?>
	<div id="r_ResultedDate" class="form-group row">
		<label id="elh_patient_investigations_ResultedDate" for="x_ResultedDate" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->ResultedDate->caption() ?><?php echo $patient_investigations_add->ResultedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->ResultedDate->cellAttributes() ?>>
<span id="el_patient_investigations_ResultedDate">
<input type="text" data-table="patient_investigations" data-field="x_ResultedDate" name="x_ResultedDate" id="x_ResultedDate" placeholder="<?php echo HtmlEncode($patient_investigations_add->ResultedDate->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->ResultedDate->EditValue ?>"<?php echo $patient_investigations_add->ResultedDate->editAttributes() ?>>
<?php if (!$patient_investigations_add->ResultedDate->ReadOnly && !$patient_investigations_add->ResultedDate->Disabled && !isset($patient_investigations_add->ResultedDate->EditAttrs["readonly"]) && !isset($patient_investigations_add->ResultedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsadd", "x_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_investigations_add->ResultedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->ResultedBy->Visible) { // ResultedBy ?>
	<div id="r_ResultedBy" class="form-group row">
		<label id="elh_patient_investigations_ResultedBy" for="x_ResultedBy" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->ResultedBy->caption() ?><?php echo $patient_investigations_add->ResultedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->ResultedBy->cellAttributes() ?>>
<span id="el_patient_investigations_ResultedBy">
<input type="text" data-table="patient_investigations" data-field="x_ResultedBy" name="x_ResultedBy" id="x_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_add->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->ResultedBy->EditValue ?>"<?php echo $patient_investigations_add->ResultedBy->editAttributes() ?>>
</span>
<?php echo $patient_investigations_add->ResultedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->Modified->Visible) { // Modified ?>
	<div id="r_Modified" class="form-group row">
		<label id="elh_patient_investigations_Modified" for="x_Modified" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->Modified->caption() ?><?php echo $patient_investigations_add->Modified->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->Modified->cellAttributes() ?>>
<span id="el_patient_investigations_Modified">
<input type="text" data-table="patient_investigations" data-field="x_Modified" name="x_Modified" id="x_Modified" placeholder="<?php echo HtmlEncode($patient_investigations_add->Modified->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->Modified->EditValue ?>"<?php echo $patient_investigations_add->Modified->editAttributes() ?>>
<?php if (!$patient_investigations_add->Modified->ReadOnly && !$patient_investigations_add->Modified->Disabled && !isset($patient_investigations_add->Modified->EditAttrs["readonly"]) && !isset($patient_investigations_add->Modified->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsadd", "x_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_investigations_add->Modified->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label id="elh_patient_investigations_ModifiedBy" for="x_ModifiedBy" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->ModifiedBy->caption() ?><?php echo $patient_investigations_add->ModifiedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->ModifiedBy->cellAttributes() ?>>
<span id="el_patient_investigations_ModifiedBy">
<input type="text" data-table="patient_investigations" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_add->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->ModifiedBy->EditValue ?>"<?php echo $patient_investigations_add->ModifiedBy->editAttributes() ?>>
</span>
<?php echo $patient_investigations_add->ModifiedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->Created->Visible) { // Created ?>
	<div id="r_Created" class="form-group row">
		<label id="elh_patient_investigations_Created" for="x_Created" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->Created->caption() ?><?php echo $patient_investigations_add->Created->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->Created->cellAttributes() ?>>
<span id="el_patient_investigations_Created">
<input type="text" data-table="patient_investigations" data-field="x_Created" name="x_Created" id="x_Created" placeholder="<?php echo HtmlEncode($patient_investigations_add->Created->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->Created->EditValue ?>"<?php echo $patient_investigations_add->Created->editAttributes() ?>>
<?php if (!$patient_investigations_add->Created->ReadOnly && !$patient_investigations_add->Created->Disabled && !isset($patient_investigations_add->Created->EditAttrs["readonly"]) && !isset($patient_investigations_add->Created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationsadd", "x_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_investigations_add->Created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label id="elh_patient_investigations_CreatedBy" for="x_CreatedBy" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->CreatedBy->caption() ?><?php echo $patient_investigations_add->CreatedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->CreatedBy->cellAttributes() ?>>
<span id="el_patient_investigations_CreatedBy">
<input type="text" data-table="patient_investigations" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_add->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->CreatedBy->EditValue ?>"<?php echo $patient_investigations_add->CreatedBy->editAttributes() ?>>
</span>
<?php echo $patient_investigations_add->CreatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->GroupHead->Visible) { // GroupHead ?>
	<div id="r_GroupHead" class="form-group row">
		<label id="elh_patient_investigations_GroupHead" for="x_GroupHead" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->GroupHead->caption() ?><?php echo $patient_investigations_add->GroupHead->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->GroupHead->cellAttributes() ?>>
<span id="el_patient_investigations_GroupHead">
<input type="text" data-table="patient_investigations" data-field="x_GroupHead" name="x_GroupHead" id="x_GroupHead" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($patient_investigations_add->GroupHead->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->GroupHead->EditValue ?>"<?php echo $patient_investigations_add->GroupHead->editAttributes() ?>>
</span>
<?php echo $patient_investigations_add->GroupHead->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->Cost->Visible) { // Cost ?>
	<div id="r_Cost" class="form-group row">
		<label id="elh_patient_investigations_Cost" for="x_Cost" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->Cost->caption() ?><?php echo $patient_investigations_add->Cost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->Cost->cellAttributes() ?>>
<span id="el_patient_investigations_Cost">
<input type="text" data-table="patient_investigations" data-field="x_Cost" name="x_Cost" id="x_Cost" size="30" placeholder="<?php echo HtmlEncode($patient_investigations_add->Cost->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->Cost->EditValue ?>"<?php echo $patient_investigations_add->Cost->editAttributes() ?>>
</span>
<?php echo $patient_investigations_add->Cost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->PaymentStatus->Visible) { // PaymentStatus ?>
	<div id="r_PaymentStatus" class="form-group row">
		<label id="elh_patient_investigations_PaymentStatus" for="x_PaymentStatus" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->PaymentStatus->caption() ?><?php echo $patient_investigations_add->PaymentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->PaymentStatus->cellAttributes() ?>>
<span id="el_patient_investigations_PaymentStatus">
<input type="text" data-table="patient_investigations" data-field="x_PaymentStatus" name="x_PaymentStatus" id="x_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_add->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->PaymentStatus->EditValue ?>"<?php echo $patient_investigations_add->PaymentStatus->editAttributes() ?>>
</span>
<?php echo $patient_investigations_add->PaymentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->PayMode->Visible) { // PayMode ?>
	<div id="r_PayMode" class="form-group row">
		<label id="elh_patient_investigations_PayMode" for="x_PayMode" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->PayMode->caption() ?><?php echo $patient_investigations_add->PayMode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->PayMode->cellAttributes() ?>>
<span id="el_patient_investigations_PayMode">
<input type="text" data-table="patient_investigations" data-field="x_PayMode" name="x_PayMode" id="x_PayMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_add->PayMode->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->PayMode->EditValue ?>"<?php echo $patient_investigations_add->PayMode->editAttributes() ?>>
</span>
<?php echo $patient_investigations_add->PayMode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->VoucherNo->Visible) { // VoucherNo ?>
	<div id="r_VoucherNo" class="form-group row">
		<label id="elh_patient_investigations_VoucherNo" for="x_VoucherNo" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->VoucherNo->caption() ?><?php echo $patient_investigations_add->VoucherNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->VoucherNo->cellAttributes() ?>>
<span id="el_patient_investigations_VoucherNo">
<input type="text" data-table="patient_investigations" data-field="x_VoucherNo" name="x_VoucherNo" id="x_VoucherNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_add->VoucherNo->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->VoucherNo->EditValue ?>"<?php echo $patient_investigations_add->VoucherNo->editAttributes() ?>>
</span>
<?php echo $patient_investigations_add->VoucherNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_investigations_add->InvestigationMultiselect->Visible) { // InvestigationMultiselect ?>
	<div id="r_InvestigationMultiselect" class="form-group row">
		<label id="elh_patient_investigations_InvestigationMultiselect" for="x_InvestigationMultiselect" class="<?php echo $patient_investigations_add->LeftColumnClass ?>"><?php echo $patient_investigations_add->InvestigationMultiselect->caption() ?><?php echo $patient_investigations_add->InvestigationMultiselect->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_investigations_add->RightColumnClass ?>"><div <?php echo $patient_investigations_add->InvestigationMultiselect->cellAttributes() ?>>
<span id="el_patient_investigations_InvestigationMultiselect">
<input type="text" data-table="patient_investigations" data-field="x_InvestigationMultiselect" name="x_InvestigationMultiselect" id="x_InvestigationMultiselect" placeholder="<?php echo HtmlEncode($patient_investigations_add->InvestigationMultiselect->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_add->InvestigationMultiselect->EditValue ?>"<?php echo $patient_investigations_add->InvestigationMultiselect->editAttributes() ?>>
</span>
<?php echo $patient_investigations_add->InvestigationMultiselect->CustomMsg ?></div></div>
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
$patient_investigations_add->terminate();
?>