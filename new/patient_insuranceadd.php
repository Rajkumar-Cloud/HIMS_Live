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
$patient_insurance_add = new patient_insurance_add();

// Run the page
$patient_insurance_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_insurance_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_insuranceadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpatient_insuranceadd = currentForm = new ew.Form("fpatient_insuranceadd", "add");

	// Validate form
	fpatient_insuranceadd.validate = function() {
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
			<?php if ($patient_insurance_add->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->Reception->caption(), $patient_insurance_add->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_insurance_add->Reception->errorMessage()) ?>");
			<?php if ($patient_insurance_add->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->PatientId->caption(), $patient_insurance_add->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_insurance_add->PatientId->errorMessage()) ?>");
			<?php if ($patient_insurance_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->PatientName->caption(), $patient_insurance_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_add->Company->Required) { ?>
				elm = this.getElements("x" + infix + "_Company");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->Company->caption(), $patient_insurance_add->Company->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_add->AddressInsuranceCarierName->Required) { ?>
				elm = this.getElements("x" + infix + "_AddressInsuranceCarierName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->AddressInsuranceCarierName->caption(), $patient_insurance_add->AddressInsuranceCarierName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_add->ContactName->Required) { ?>
				elm = this.getElements("x" + infix + "_ContactName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->ContactName->caption(), $patient_insurance_add->ContactName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_add->ContactMobile->Required) { ?>
				elm = this.getElements("x" + infix + "_ContactMobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->ContactMobile->caption(), $patient_insurance_add->ContactMobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_add->PolicyType->Required) { ?>
				elm = this.getElements("x" + infix + "_PolicyType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->PolicyType->caption(), $patient_insurance_add->PolicyType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_add->PolicyName->Required) { ?>
				elm = this.getElements("x" + infix + "_PolicyName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->PolicyName->caption(), $patient_insurance_add->PolicyName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_add->PolicyNo->Required) { ?>
				elm = this.getElements("x" + infix + "_PolicyNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->PolicyNo->caption(), $patient_insurance_add->PolicyNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_add->PolicyAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_PolicyAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->PolicyAmount->caption(), $patient_insurance_add->PolicyAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_add->RefLetterNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RefLetterNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->RefLetterNo->caption(), $patient_insurance_add->RefLetterNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_add->ReferenceBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferenceBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->ReferenceBy->caption(), $patient_insurance_add->ReferenceBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_add->ReferenceDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferenceDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->ReferenceDate->caption(), $patient_insurance_add->ReferenceDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReferenceDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_insurance_add->ReferenceDate->errorMessage()) ?>");
			<?php if ($patient_insurance_add->DocumentAttatch->Required) { ?>
				felm = this.getElements("x" + infix + "_DocumentAttatch");
				elm = this.getElements("fn_x" + infix + "_DocumentAttatch");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->DocumentAttatch->caption(), $patient_insurance_add->DocumentAttatch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->createdby->caption(), $patient_insurance_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->createddatetime->caption(), $patient_insurance_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_insurance_add->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance_add->mrnno->caption(), $patient_insurance_add->mrnno->RequiredErrorMessage)) ?>");
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
	fpatient_insuranceadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_insuranceadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpatient_insuranceadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_insurance_add->showPageHeader(); ?>
<?php
$patient_insurance_add->showMessage();
?>
<form name="fpatient_insuranceadd" id="fpatient_insuranceadd" class="<?php echo $patient_insurance_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_insurance">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_insurance_add->IsModal ?>">
<?php if ($patient_insurance->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_insurance_add->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_insurance_add->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_insurance_add->mrnno->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($patient_insurance_add->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_insurance_Reception" for="x_Reception" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance_add->Reception->caption() ?><?php echo $patient_insurance_add->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div <?php echo $patient_insurance_add->Reception->cellAttributes() ?>>
<?php if ($patient_insurance_add->Reception->getSessionValue() != "") { ?>
<span id="el_patient_insurance_Reception">
<span<?php echo $patient_insurance_add->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_add->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?php echo HtmlEncode($patient_insurance_add->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_insurance_Reception">
<input type="text" data-table="patient_insurance" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_insurance_add->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_add->Reception->EditValue ?>"<?php echo $patient_insurance_add->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_insurance_add->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_add->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_insurance_PatientId" for="x_PatientId" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance_add->PatientId->caption() ?><?php echo $patient_insurance_add->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div <?php echo $patient_insurance_add->PatientId->cellAttributes() ?>>
<?php if ($patient_insurance_add->PatientId->getSessionValue() != "") { ?>
<span id="el_patient_insurance_PatientId">
<span<?php echo $patient_insurance_add->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_add->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_PatientId" name="x_PatientId" value="<?php echo HtmlEncode($patient_insurance_add->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_insurance_PatientId">
<input type="text" data-table="patient_insurance" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_insurance_add->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_add->PatientId->EditValue ?>"<?php echo $patient_insurance_add->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_insurance_add->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_insurance_PatientName" for="x_PatientName" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance_add->PatientName->caption() ?><?php echo $patient_insurance_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div <?php echo $patient_insurance_add->PatientName->cellAttributes() ?>>
<span id="el_patient_insurance_PatientName">
<input type="text" data-table="patient_insurance" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_add->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_add->PatientName->EditValue ?>"<?php echo $patient_insurance_add->PatientName->editAttributes() ?>>
</span>
<?php echo $patient_insurance_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_add->Company->Visible) { // Company ?>
	<div id="r_Company" class="form-group row">
		<label id="elh_patient_insurance_Company" for="x_Company" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance_add->Company->caption() ?><?php echo $patient_insurance_add->Company->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div <?php echo $patient_insurance_add->Company->cellAttributes() ?>>
<span id="el_patient_insurance_Company">
<input type="text" data-table="patient_insurance" data-field="x_Company" name="x_Company" id="x_Company" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_add->Company->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_add->Company->EditValue ?>"<?php echo $patient_insurance_add->Company->editAttributes() ?>>
</span>
<?php echo $patient_insurance_add->Company->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_add->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
	<div id="r_AddressInsuranceCarierName" class="form-group row">
		<label id="elh_patient_insurance_AddressInsuranceCarierName" for="x_AddressInsuranceCarierName" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance_add->AddressInsuranceCarierName->caption() ?><?php echo $patient_insurance_add->AddressInsuranceCarierName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div <?php echo $patient_insurance_add->AddressInsuranceCarierName->cellAttributes() ?>>
<span id="el_patient_insurance_AddressInsuranceCarierName">
<input type="text" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="x_AddressInsuranceCarierName" id="x_AddressInsuranceCarierName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_add->AddressInsuranceCarierName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_add->AddressInsuranceCarierName->EditValue ?>"<?php echo $patient_insurance_add->AddressInsuranceCarierName->editAttributes() ?>>
</span>
<?php echo $patient_insurance_add->AddressInsuranceCarierName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_add->ContactName->Visible) { // ContactName ?>
	<div id="r_ContactName" class="form-group row">
		<label id="elh_patient_insurance_ContactName" for="x_ContactName" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance_add->ContactName->caption() ?><?php echo $patient_insurance_add->ContactName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div <?php echo $patient_insurance_add->ContactName->cellAttributes() ?>>
<span id="el_patient_insurance_ContactName">
<input type="text" data-table="patient_insurance" data-field="x_ContactName" name="x_ContactName" id="x_ContactName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_add->ContactName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_add->ContactName->EditValue ?>"<?php echo $patient_insurance_add->ContactName->editAttributes() ?>>
</span>
<?php echo $patient_insurance_add->ContactName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_add->ContactMobile->Visible) { // ContactMobile ?>
	<div id="r_ContactMobile" class="form-group row">
		<label id="elh_patient_insurance_ContactMobile" for="x_ContactMobile" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance_add->ContactMobile->caption() ?><?php echo $patient_insurance_add->ContactMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div <?php echo $patient_insurance_add->ContactMobile->cellAttributes() ?>>
<span id="el_patient_insurance_ContactMobile">
<input type="text" data-table="patient_insurance" data-field="x_ContactMobile" name="x_ContactMobile" id="x_ContactMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_add->ContactMobile->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_add->ContactMobile->EditValue ?>"<?php echo $patient_insurance_add->ContactMobile->editAttributes() ?>>
</span>
<?php echo $patient_insurance_add->ContactMobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_add->PolicyType->Visible) { // PolicyType ?>
	<div id="r_PolicyType" class="form-group row">
		<label id="elh_patient_insurance_PolicyType" for="x_PolicyType" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance_add->PolicyType->caption() ?><?php echo $patient_insurance_add->PolicyType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div <?php echo $patient_insurance_add->PolicyType->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyType">
<input type="text" data-table="patient_insurance" data-field="x_PolicyType" name="x_PolicyType" id="x_PolicyType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_add->PolicyType->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_add->PolicyType->EditValue ?>"<?php echo $patient_insurance_add->PolicyType->editAttributes() ?>>
</span>
<?php echo $patient_insurance_add->PolicyType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_add->PolicyName->Visible) { // PolicyName ?>
	<div id="r_PolicyName" class="form-group row">
		<label id="elh_patient_insurance_PolicyName" for="x_PolicyName" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance_add->PolicyName->caption() ?><?php echo $patient_insurance_add->PolicyName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div <?php echo $patient_insurance_add->PolicyName->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyName">
<input type="text" data-table="patient_insurance" data-field="x_PolicyName" name="x_PolicyName" id="x_PolicyName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_add->PolicyName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_add->PolicyName->EditValue ?>"<?php echo $patient_insurance_add->PolicyName->editAttributes() ?>>
</span>
<?php echo $patient_insurance_add->PolicyName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_add->PolicyNo->Visible) { // PolicyNo ?>
	<div id="r_PolicyNo" class="form-group row">
		<label id="elh_patient_insurance_PolicyNo" for="x_PolicyNo" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance_add->PolicyNo->caption() ?><?php echo $patient_insurance_add->PolicyNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div <?php echo $patient_insurance_add->PolicyNo->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyNo">
<input type="text" data-table="patient_insurance" data-field="x_PolicyNo" name="x_PolicyNo" id="x_PolicyNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_add->PolicyNo->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_add->PolicyNo->EditValue ?>"<?php echo $patient_insurance_add->PolicyNo->editAttributes() ?>>
</span>
<?php echo $patient_insurance_add->PolicyNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_add->PolicyAmount->Visible) { // PolicyAmount ?>
	<div id="r_PolicyAmount" class="form-group row">
		<label id="elh_patient_insurance_PolicyAmount" for="x_PolicyAmount" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance_add->PolicyAmount->caption() ?><?php echo $patient_insurance_add->PolicyAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div <?php echo $patient_insurance_add->PolicyAmount->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyAmount">
<input type="text" data-table="patient_insurance" data-field="x_PolicyAmount" name="x_PolicyAmount" id="x_PolicyAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_add->PolicyAmount->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_add->PolicyAmount->EditValue ?>"<?php echo $patient_insurance_add->PolicyAmount->editAttributes() ?>>
</span>
<?php echo $patient_insurance_add->PolicyAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_add->RefLetterNo->Visible) { // RefLetterNo ?>
	<div id="r_RefLetterNo" class="form-group row">
		<label id="elh_patient_insurance_RefLetterNo" for="x_RefLetterNo" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance_add->RefLetterNo->caption() ?><?php echo $patient_insurance_add->RefLetterNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div <?php echo $patient_insurance_add->RefLetterNo->cellAttributes() ?>>
<span id="el_patient_insurance_RefLetterNo">
<input type="text" data-table="patient_insurance" data-field="x_RefLetterNo" name="x_RefLetterNo" id="x_RefLetterNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_add->RefLetterNo->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_add->RefLetterNo->EditValue ?>"<?php echo $patient_insurance_add->RefLetterNo->editAttributes() ?>>
</span>
<?php echo $patient_insurance_add->RefLetterNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_add->ReferenceBy->Visible) { // ReferenceBy ?>
	<div id="r_ReferenceBy" class="form-group row">
		<label id="elh_patient_insurance_ReferenceBy" for="x_ReferenceBy" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance_add->ReferenceBy->caption() ?><?php echo $patient_insurance_add->ReferenceBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div <?php echo $patient_insurance_add->ReferenceBy->cellAttributes() ?>>
<span id="el_patient_insurance_ReferenceBy">
<input type="text" data-table="patient_insurance" data-field="x_ReferenceBy" name="x_ReferenceBy" id="x_ReferenceBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_add->ReferenceBy->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_add->ReferenceBy->EditValue ?>"<?php echo $patient_insurance_add->ReferenceBy->editAttributes() ?>>
</span>
<?php echo $patient_insurance_add->ReferenceBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_add->ReferenceDate->Visible) { // ReferenceDate ?>
	<div id="r_ReferenceDate" class="form-group row">
		<label id="elh_patient_insurance_ReferenceDate" for="x_ReferenceDate" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance_add->ReferenceDate->caption() ?><?php echo $patient_insurance_add->ReferenceDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div <?php echo $patient_insurance_add->ReferenceDate->cellAttributes() ?>>
<span id="el_patient_insurance_ReferenceDate">
<input type="text" data-table="patient_insurance" data-field="x_ReferenceDate" name="x_ReferenceDate" id="x_ReferenceDate" placeholder="<?php echo HtmlEncode($patient_insurance_add->ReferenceDate->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_add->ReferenceDate->EditValue ?>"<?php echo $patient_insurance_add->ReferenceDate->editAttributes() ?>>
<?php if (!$patient_insurance_add->ReferenceDate->ReadOnly && !$patient_insurance_add->ReferenceDate->Disabled && !isset($patient_insurance_add->ReferenceDate->EditAttrs["readonly"]) && !isset($patient_insurance_add->ReferenceDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_insuranceadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_insuranceadd", "x_ReferenceDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_insurance_add->ReferenceDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_add->DocumentAttatch->Visible) { // DocumentAttatch ?>
	<div id="r_DocumentAttatch" class="form-group row">
		<label id="elh_patient_insurance_DocumentAttatch" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance_add->DocumentAttatch->caption() ?><?php echo $patient_insurance_add->DocumentAttatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div <?php echo $patient_insurance_add->DocumentAttatch->cellAttributes() ?>>
<span id="el_patient_insurance_DocumentAttatch">
<div id="fd_x_DocumentAttatch">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $patient_insurance_add->DocumentAttatch->title() ?>" data-table="patient_insurance" data-field="x_DocumentAttatch" name="x_DocumentAttatch" id="x_DocumentAttatch" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $patient_insurance_add->DocumentAttatch->editAttributes() ?><?php if ($patient_insurance_add->DocumentAttatch->ReadOnly || $patient_insurance_add->DocumentAttatch->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_DocumentAttatch"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_DocumentAttatch" id= "fn_x_DocumentAttatch" value="<?php echo $patient_insurance_add->DocumentAttatch->Upload->FileName ?>">
<input type="hidden" name="fa_x_DocumentAttatch" id= "fa_x_DocumentAttatch" value="0">
<input type="hidden" name="fs_x_DocumentAttatch" id= "fs_x_DocumentAttatch" value="405">
<input type="hidden" name="fx_x_DocumentAttatch" id= "fx_x_DocumentAttatch" value="<?php echo $patient_insurance_add->DocumentAttatch->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_DocumentAttatch" id= "fm_x_DocumentAttatch" value="<?php echo $patient_insurance_add->DocumentAttatch->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x_DocumentAttatch" id= "fc_x_DocumentAttatch" value="<?php echo $patient_insurance_add->DocumentAttatch->UploadMaxFileCount ?>">
</div>
<table id="ft_x_DocumentAttatch" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $patient_insurance_add->DocumentAttatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance_add->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_insurance_mrnno" for="x_mrnno" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance_add->mrnno->caption() ?><?php echo $patient_insurance_add->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div <?php echo $patient_insurance_add->mrnno->cellAttributes() ?>>
<?php if ($patient_insurance_add->mrnno->getSessionValue() != "") { ?>
<span id="el_patient_insurance_mrnno">
<span<?php echo $patient_insurance_add->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_insurance_add->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?php echo HtmlEncode($patient_insurance_add->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_insurance_mrnno">
<input type="text" data-table="patient_insurance" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance_add->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_insurance_add->mrnno->EditValue ?>"<?php echo $patient_insurance_add->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_insurance_add->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_insurance_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_insurance_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_insurance_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_insurance_add->showPageFooter();
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
$patient_insurance_add->terminate();
?>