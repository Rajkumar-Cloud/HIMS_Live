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
$patient_insurance_edit = new patient_insurance_edit();

// Run the page
$patient_insurance_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_insurance_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_insuranceedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpatient_insuranceedit = currentForm = new ew.Form("fpatient_insuranceedit", "edit");

	// Validate form
	fpatient_insuranceedit.validate = function() {
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
			<?php if ($patient_insurance_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->id->caption(), $patient_insurance_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->Reception->caption(), $patient_insurance_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->PatientId->caption(), $patient_insurance_edit->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->PatientName->caption(), $patient_insurance_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->Company->Required) { ?>
				elm = this.getElements("x" + infix + "_Company");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->Company->caption(), $patient_insurance_edit->Company->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->AddressInsuranceCarierName->Required) { ?>
				elm = this.getElements("x" + infix + "_AddressInsuranceCarierName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->AddressInsuranceCarierName->caption(), $patient_insurance_edit->AddressInsuranceCarierName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->ContactName->Required) { ?>
				elm = this.getElements("x" + infix + "_ContactName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->ContactName->caption(), $patient_insurance_edit->ContactName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->ContactMobile->Required) { ?>
				elm = this.getElements("x" + infix + "_ContactMobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->ContactMobile->caption(), $patient_insurance_edit->ContactMobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->PolicyType->Required) { ?>
				elm = this.getElements("x" + infix + "_PolicyType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->PolicyType->caption(), $patient_insurance_edit->PolicyType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->PolicyName->Required) { ?>
				elm = this.getElements("x" + infix + "_PolicyName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->PolicyName->caption(), $patient_insurance_edit->PolicyName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->PolicyNo->Required) { ?>
				elm = this.getElements("x" + infix + "_PolicyNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->PolicyNo->caption(), $patient_insurance_edit->PolicyNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->PolicyAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_PolicyAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->PolicyAmount->caption(), $patient_insurance_edit->PolicyAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->RefLetterNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RefLetterNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->RefLetterNo->caption(), $patient_insurance_edit->RefLetterNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->ReferenceBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferenceBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->ReferenceBy->caption(), $patient_insurance_edit->ReferenceBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->ReferenceDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferenceDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->ReferenceDate->caption(), $patient_insurance_edit->ReferenceDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReferenceDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_insurance_edit->ReferenceDate->errorMessage()) ?>");
			<?php if ($patient_insurance_edit->DocumentAttatch->Required) { ?>
				felm = this.getElements("x" + infix + "_DocumentAttatch");
				elm = this.getElements("fn_x" + infix + "_DocumentAttatch");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->DocumentAttatch->caption(), $patient_insurance_edit->DocumentAttatch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->modifiedby->caption(), $patient_insurance_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->modifieddatetime->caption(), $patient_insurance_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_edit->mrnno->caption(), $patient_insurance_edit->mrnno->RequiredErrorMessage)) ?>");
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
	fpatient_insuranceedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_insuranceedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpatient_insuranceedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_insurance_edit->showPageHeader(); ?>
<?php
$patient_insurance_edit->showMessage();
?>
<form name="fpatient_insuranceedit" id="fpatient_insuranceedit" class="<?php echo $patient_insurance_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_insurance">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_insurance_edit->IsModal ?>">
<?php if ($patient_insurance->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_insurance_edit->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_insurance_edit->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_insurance_edit->mrnno->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($patient_insurance_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_insurance_id" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->id->caption() ?><?php echo $patient_insurance_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->id->cellAttributes() ?>>
<span id="el_patient_insurance_id">
<span<?php echo $patient_insurance_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_insurance_edit->id->CurrentValue) ?>">
<?php echo $patient_insurance_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_insurance_Reception" for="x_Reception" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->Reception->caption() ?><?php echo $patient_insurance_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->Reception->cellAttributes() ?>>
<span id="el_patient_insurance_Reception">
<span<?php echo $patient_insurance_edit->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_edit->Reception->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($patient_insurance_edit->Reception->CurrentValue) ?>">
<?php echo $patient_insurance_edit->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_edit->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_insurance_PatientId" for="x_PatientId" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->PatientId->caption() ?><?php echo $patient_insurance_edit->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->PatientId->cellAttributes() ?>>
<span id="el_patient_insurance_PatientId">
<span<?php echo $patient_insurance_edit->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_edit->PatientId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" value="<?php echo HtmlEncode($patient_insurance_edit->PatientId->CurrentValue) ?>">
<?php echo $patient_insurance_edit->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_insurance_PatientName" for="x_PatientName" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->PatientName->caption() ?><?php echo $patient_insurance_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->PatientName->cellAttributes() ?>>
<span id="el_patient_insurance_PatientName">
<input type="text" data-table="patient_insurance" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_edit->PatientName->EditValue ?>"<?php echo $patient_insurance_edit->PatientName->editAttributes() ?>>
</span>
<?php echo $patient_insurance_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_edit->Company->Visible) { // Company ?>
	<div id="r_Company" class="form-group row">
		<label id="elh_patient_insurance_Company" for="x_Company" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->Company->caption() ?><?php echo $patient_insurance_edit->Company->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->Company->cellAttributes() ?>>
<span id="el_patient_insurance_Company">
<input type="text" data-table="patient_insurance" data-field="x_Company" name="x_Company" id="x_Company" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_edit->Company->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_edit->Company->EditValue ?>"<?php echo $patient_insurance_edit->Company->editAttributes() ?>>
</span>
<?php echo $patient_insurance_edit->Company->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_edit->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
	<div id="r_AddressInsuranceCarierName" class="form-group row">
		<label id="elh_patient_insurance_AddressInsuranceCarierName" for="x_AddressInsuranceCarierName" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->AddressInsuranceCarierName->caption() ?><?php echo $patient_insurance_edit->AddressInsuranceCarierName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->AddressInsuranceCarierName->cellAttributes() ?>>
<span id="el_patient_insurance_AddressInsuranceCarierName">
<input type="text" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="x_AddressInsuranceCarierName" id="x_AddressInsuranceCarierName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_edit->AddressInsuranceCarierName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_edit->AddressInsuranceCarierName->EditValue ?>"<?php echo $patient_insurance_edit->AddressInsuranceCarierName->editAttributes() ?>>
</span>
<?php echo $patient_insurance_edit->AddressInsuranceCarierName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_edit->ContactName->Visible) { // ContactName ?>
	<div id="r_ContactName" class="form-group row">
		<label id="elh_patient_insurance_ContactName" for="x_ContactName" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->ContactName->caption() ?><?php echo $patient_insurance_edit->ContactName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->ContactName->cellAttributes() ?>>
<span id="el_patient_insurance_ContactName">
<input type="text" data-table="patient_insurance" data-field="x_ContactName" name="x_ContactName" id="x_ContactName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_edit->ContactName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_edit->ContactName->EditValue ?>"<?php echo $patient_insurance_edit->ContactName->editAttributes() ?>>
</span>
<?php echo $patient_insurance_edit->ContactName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_edit->ContactMobile->Visible) { // ContactMobile ?>
	<div id="r_ContactMobile" class="form-group row">
		<label id="elh_patient_insurance_ContactMobile" for="x_ContactMobile" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->ContactMobile->caption() ?><?php echo $patient_insurance_edit->ContactMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->ContactMobile->cellAttributes() ?>>
<span id="el_patient_insurance_ContactMobile">
<input type="text" data-table="patient_insurance" data-field="x_ContactMobile" name="x_ContactMobile" id="x_ContactMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_edit->ContactMobile->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_edit->ContactMobile->EditValue ?>"<?php echo $patient_insurance_edit->ContactMobile->editAttributes() ?>>
</span>
<?php echo $patient_insurance_edit->ContactMobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_edit->PolicyType->Visible) { // PolicyType ?>
	<div id="r_PolicyType" class="form-group row">
		<label id="elh_patient_insurance_PolicyType" for="x_PolicyType" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->PolicyType->caption() ?><?php echo $patient_insurance_edit->PolicyType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->PolicyType->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyType">
<input type="text" data-table="patient_insurance" data-field="x_PolicyType" name="x_PolicyType" id="x_PolicyType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_edit->PolicyType->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_edit->PolicyType->EditValue ?>"<?php echo $patient_insurance_edit->PolicyType->editAttributes() ?>>
</span>
<?php echo $patient_insurance_edit->PolicyType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_edit->PolicyName->Visible) { // PolicyName ?>
	<div id="r_PolicyName" class="form-group row">
		<label id="elh_patient_insurance_PolicyName" for="x_PolicyName" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->PolicyName->caption() ?><?php echo $patient_insurance_edit->PolicyName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->PolicyName->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyName">
<input type="text" data-table="patient_insurance" data-field="x_PolicyName" name="x_PolicyName" id="x_PolicyName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_edit->PolicyName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_edit->PolicyName->EditValue ?>"<?php echo $patient_insurance_edit->PolicyName->editAttributes() ?>>
</span>
<?php echo $patient_insurance_edit->PolicyName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_edit->PolicyNo->Visible) { // PolicyNo ?>
	<div id="r_PolicyNo" class="form-group row">
		<label id="elh_patient_insurance_PolicyNo" for="x_PolicyNo" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->PolicyNo->caption() ?><?php echo $patient_insurance_edit->PolicyNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->PolicyNo->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyNo">
<input type="text" data-table="patient_insurance" data-field="x_PolicyNo" name="x_PolicyNo" id="x_PolicyNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_edit->PolicyNo->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_edit->PolicyNo->EditValue ?>"<?php echo $patient_insurance_edit->PolicyNo->editAttributes() ?>>
</span>
<?php echo $patient_insurance_edit->PolicyNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_edit->PolicyAmount->Visible) { // PolicyAmount ?>
	<div id="r_PolicyAmount" class="form-group row">
		<label id="elh_patient_insurance_PolicyAmount" for="x_PolicyAmount" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->PolicyAmount->caption() ?><?php echo $patient_insurance_edit->PolicyAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->PolicyAmount->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyAmount">
<input type="text" data-table="patient_insurance" data-field="x_PolicyAmount" name="x_PolicyAmount" id="x_PolicyAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_edit->PolicyAmount->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_edit->PolicyAmount->EditValue ?>"<?php echo $patient_insurance_edit->PolicyAmount->editAttributes() ?>>
</span>
<?php echo $patient_insurance_edit->PolicyAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_edit->RefLetterNo->Visible) { // RefLetterNo ?>
	<div id="r_RefLetterNo" class="form-group row">
		<label id="elh_patient_insurance_RefLetterNo" for="x_RefLetterNo" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->RefLetterNo->caption() ?><?php echo $patient_insurance_edit->RefLetterNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->RefLetterNo->cellAttributes() ?>>
<span id="el_patient_insurance_RefLetterNo">
<input type="text" data-table="patient_insurance" data-field="x_RefLetterNo" name="x_RefLetterNo" id="x_RefLetterNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_edit->RefLetterNo->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_edit->RefLetterNo->EditValue ?>"<?php echo $patient_insurance_edit->RefLetterNo->editAttributes() ?>>
</span>
<?php echo $patient_insurance_edit->RefLetterNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_edit->ReferenceBy->Visible) { // ReferenceBy ?>
	<div id="r_ReferenceBy" class="form-group row">
		<label id="elh_patient_insurance_ReferenceBy" for="x_ReferenceBy" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->ReferenceBy->caption() ?><?php echo $patient_insurance_edit->ReferenceBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->ReferenceBy->cellAttributes() ?>>
<span id="el_patient_insurance_ReferenceBy">
<input type="text" data-table="patient_insurance" data-field="x_ReferenceBy" name="x_ReferenceBy" id="x_ReferenceBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_edit->ReferenceBy->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_edit->ReferenceBy->EditValue ?>"<?php echo $patient_insurance_edit->ReferenceBy->editAttributes() ?>>
</span>
<?php echo $patient_insurance_edit->ReferenceBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_edit->ReferenceDate->Visible) { // ReferenceDate ?>
	<div id="r_ReferenceDate" class="form-group row">
		<label id="elh_patient_insurance_ReferenceDate" for="x_ReferenceDate" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->ReferenceDate->caption() ?><?php echo $patient_insurance_edit->ReferenceDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->ReferenceDate->cellAttributes() ?>>
<span id="el_patient_insurance_ReferenceDate">
<input type="text" data-table="patient_insurance" data-field="x_ReferenceDate" name="x_ReferenceDate" id="x_ReferenceDate" placeholder="<?php echo HtmlEncode($patient_insurance_edit->ReferenceDate->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_edit->ReferenceDate->EditValue ?>"<?php echo $patient_insurance_edit->ReferenceDate->editAttributes() ?>>
<?php if (!$patient_insurance_edit->ReferenceDate->ReadOnly && !$patient_insurance_edit->ReferenceDate->Disabled && !isset($patient_insurance_edit->ReferenceDate->EditAttrs["readonly"]) && !isset($patient_insurance_edit->ReferenceDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_insuranceedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_insuranceedit", "x_ReferenceDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_insurance_edit->ReferenceDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_edit->DocumentAttatch->Visible) { // DocumentAttatch ?>
	<div id="r_DocumentAttatch" class="form-group row">
		<label id="elh_patient_insurance_DocumentAttatch" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->DocumentAttatch->caption() ?><?php echo $patient_insurance_edit->DocumentAttatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->DocumentAttatch->cellAttributes() ?>>
<span id="el_patient_insurance_DocumentAttatch">
<div id="fd_x_DocumentAttatch">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $patient_insurance_edit->DocumentAttatch->title() ?>" data-table="patient_insurance" data-field="x_DocumentAttatch" name="x_DocumentAttatch" id="x_DocumentAttatch" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $patient_insurance_edit->DocumentAttatch->editAttributes() ?><?php if ($patient_insurance_edit->DocumentAttatch->ReadOnly || $patient_insurance_edit->DocumentAttatch->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_DocumentAttatch"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_DocumentAttatch" id= "fn_x_DocumentAttatch" value="<?php echo $patient_insurance_edit->DocumentAttatch->Upload->FileName ?>">
<input type="hidden" name="fa_x_DocumentAttatch" id= "fa_x_DocumentAttatch" value="<?php echo (Post("fa_x_DocumentAttatch") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_DocumentAttatch" id= "fs_x_DocumentAttatch" value="405">
<input type="hidden" name="fx_x_DocumentAttatch" id= "fx_x_DocumentAttatch" value="<?php echo $patient_insurance_edit->DocumentAttatch->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_DocumentAttatch" id= "fm_x_DocumentAttatch" value="<?php echo $patient_insurance_edit->DocumentAttatch->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x_DocumentAttatch" id= "fc_x_DocumentAttatch" value="<?php echo $patient_insurance_edit->DocumentAttatch->UploadMaxFileCount ?>">
</div>
<table id="ft_x_DocumentAttatch" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $patient_insurance_edit->DocumentAttatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_insurance_mrnno" for="x_mrnno" class="<?php echo $patient_insurance_edit->LeftColumnClass ?>"><?php echo $patient_insurance_edit->mrnno->caption() ?><?php echo $patient_insurance_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_edit->RightColumnClass ?>"><div <?php echo $patient_insurance_edit->mrnno->cellAttributes() ?>>
<?php if ($patient_insurance_edit->mrnno->getSessionValue() != "") { ?>
<span id="el_patient_insurance_mrnno">
<span<?php echo $patient_insurance_edit->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_edit->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?php echo HtmlEncode($patient_insurance_edit->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_insurance_mrnno">
<input type="text" data-table="patient_insurance" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_edit->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_edit->mrnno->EditValue ?>"<?php echo $patient_insurance_edit->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_insurance_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_insurance_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_insurance_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_insurance_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_insurance_edit->showPageFooter();
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
$patient_insurance_edit->terminate();
?>