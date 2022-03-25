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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpatient_insuranceadd = currentForm = new ew.Form("fpatient_insuranceadd", "add");

// Validate form
fpatient_insuranceadd.validate = function() {
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
		<?php if ($patient_insurance_add->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->Reception->caption(), $patient_insurance->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_insurance->Reception->errorMessage()) ?>");
		<?php if ($patient_insurance_add->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->PatientId->caption(), $patient_insurance->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_insurance->PatientId->errorMessage()) ?>");
		<?php if ($patient_insurance_add->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->PatientName->caption(), $patient_insurance->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_insurance_add->Company->Required) { ?>
			elm = this.getElements("x" + infix + "_Company");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->Company->caption(), $patient_insurance->Company->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_insurance_add->AddressInsuranceCarierName->Required) { ?>
			elm = this.getElements("x" + infix + "_AddressInsuranceCarierName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->AddressInsuranceCarierName->caption(), $patient_insurance->AddressInsuranceCarierName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_insurance_add->ContactName->Required) { ?>
			elm = this.getElements("x" + infix + "_ContactName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->ContactName->caption(), $patient_insurance->ContactName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_insurance_add->ContactMobile->Required) { ?>
			elm = this.getElements("x" + infix + "_ContactMobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->ContactMobile->caption(), $patient_insurance->ContactMobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_insurance_add->PolicyType->Required) { ?>
			elm = this.getElements("x" + infix + "_PolicyType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->PolicyType->caption(), $patient_insurance->PolicyType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_insurance_add->PolicyName->Required) { ?>
			elm = this.getElements("x" + infix + "_PolicyName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->PolicyName->caption(), $patient_insurance->PolicyName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_insurance_add->PolicyNo->Required) { ?>
			elm = this.getElements("x" + infix + "_PolicyNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->PolicyNo->caption(), $patient_insurance->PolicyNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_insurance_add->PolicyAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_PolicyAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->PolicyAmount->caption(), $patient_insurance->PolicyAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_insurance_add->RefLetterNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RefLetterNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->RefLetterNo->caption(), $patient_insurance->RefLetterNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_insurance_add->ReferenceBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferenceBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->ReferenceBy->caption(), $patient_insurance->ReferenceBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_insurance_add->ReferenceDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferenceDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->ReferenceDate->caption(), $patient_insurance->ReferenceDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReferenceDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_insurance->ReferenceDate->errorMessage()) ?>");
		<?php if ($patient_insurance_add->DocumentAttatch->Required) { ?>
			felm = this.getElements("x" + infix + "_DocumentAttatch");
			elm = this.getElements("fn_x" + infix + "_DocumentAttatch");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->DocumentAttatch->caption(), $patient_insurance->DocumentAttatch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_insurance_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->createdby->caption(), $patient_insurance->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_insurance_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->createddatetime->caption(), $patient_insurance->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_insurance_add->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_insurance->mrnno->caption(), $patient_insurance->mrnno->RequiredErrorMessage)) ?>");
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
fpatient_insuranceadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_insuranceadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_insurance_add->showPageHeader(); ?>
<?php
$patient_insurance_add->showMessage();
?>
<form name="fpatient_insuranceadd" id="fpatient_insuranceadd" class="<?php echo $patient_insurance_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_insurance_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_insurance_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_insurance">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_insurance_add->IsModal ?>">
<?php if ($patient_insurance->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_insurance->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_insurance->PatientId->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_insurance->mrnno->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($patient_insurance->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_insurance_Reception" for="x_Reception" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance->Reception->caption() ?><?php echo ($patient_insurance->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div<?php echo $patient_insurance->Reception->cellAttributes() ?>>
<?php if ($patient_insurance->Reception->getSessionValue() <> "") { ?>
<span id="el_patient_insurance_Reception">
<span<?php echo $patient_insurance->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_insurance->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?php echo HtmlEncode($patient_insurance->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_insurance_Reception">
<input type="text" data-table="patient_insurance" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_insurance->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_insurance->Reception->EditValue ?>"<?php echo $patient_insurance->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_insurance->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_insurance_PatientId" for="x_PatientId" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance->PatientId->caption() ?><?php echo ($patient_insurance->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div<?php echo $patient_insurance->PatientId->cellAttributes() ?>>
<?php if ($patient_insurance->PatientId->getSessionValue() <> "") { ?>
<span id="el_patient_insurance_PatientId">
<span<?php echo $patient_insurance->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_insurance->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_PatientId" name="x_PatientId" value="<?php echo HtmlEncode($patient_insurance->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_insurance_PatientId">
<input type="text" data-table="patient_insurance" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_insurance->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_insurance->PatientId->EditValue ?>"<?php echo $patient_insurance->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_insurance->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_insurance_PatientName" for="x_PatientName" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance->PatientName->caption() ?><?php echo ($patient_insurance->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div<?php echo $patient_insurance->PatientName->cellAttributes() ?>>
<span id="el_patient_insurance_PatientName">
<input type="text" data-table="patient_insurance" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance->PatientName->EditValue ?>"<?php echo $patient_insurance->PatientName->editAttributes() ?>>
</span>
<?php echo $patient_insurance->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance->Company->Visible) { // Company ?>
	<div id="r_Company" class="form-group row">
		<label id="elh_patient_insurance_Company" for="x_Company" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance->Company->caption() ?><?php echo ($patient_insurance->Company->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div<?php echo $patient_insurance->Company->cellAttributes() ?>>
<span id="el_patient_insurance_Company">
<input type="text" data-table="patient_insurance" data-field="x_Company" name="x_Company" id="x_Company" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance->Company->getPlaceHolder()) ?>" value="<?php echo $patient_insurance->Company->EditValue ?>"<?php echo $patient_insurance->Company->editAttributes() ?>>
</span>
<?php echo $patient_insurance->Company->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
	<div id="r_AddressInsuranceCarierName" class="form-group row">
		<label id="elh_patient_insurance_AddressInsuranceCarierName" for="x_AddressInsuranceCarierName" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance->AddressInsuranceCarierName->caption() ?><?php echo ($patient_insurance->AddressInsuranceCarierName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div<?php echo $patient_insurance->AddressInsuranceCarierName->cellAttributes() ?>>
<span id="el_patient_insurance_AddressInsuranceCarierName">
<input type="text" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="x_AddressInsuranceCarierName" id="x_AddressInsuranceCarierName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance->AddressInsuranceCarierName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance->AddressInsuranceCarierName->EditValue ?>"<?php echo $patient_insurance->AddressInsuranceCarierName->editAttributes() ?>>
</span>
<?php echo $patient_insurance->AddressInsuranceCarierName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance->ContactName->Visible) { // ContactName ?>
	<div id="r_ContactName" class="form-group row">
		<label id="elh_patient_insurance_ContactName" for="x_ContactName" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance->ContactName->caption() ?><?php echo ($patient_insurance->ContactName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div<?php echo $patient_insurance->ContactName->cellAttributes() ?>>
<span id="el_patient_insurance_ContactName">
<input type="text" data-table="patient_insurance" data-field="x_ContactName" name="x_ContactName" id="x_ContactName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance->ContactName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance->ContactName->EditValue ?>"<?php echo $patient_insurance->ContactName->editAttributes() ?>>
</span>
<?php echo $patient_insurance->ContactName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance->ContactMobile->Visible) { // ContactMobile ?>
	<div id="r_ContactMobile" class="form-group row">
		<label id="elh_patient_insurance_ContactMobile" for="x_ContactMobile" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance->ContactMobile->caption() ?><?php echo ($patient_insurance->ContactMobile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div<?php echo $patient_insurance->ContactMobile->cellAttributes() ?>>
<span id="el_patient_insurance_ContactMobile">
<input type="text" data-table="patient_insurance" data-field="x_ContactMobile" name="x_ContactMobile" id="x_ContactMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance->ContactMobile->getPlaceHolder()) ?>" value="<?php echo $patient_insurance->ContactMobile->EditValue ?>"<?php echo $patient_insurance->ContactMobile->editAttributes() ?>>
</span>
<?php echo $patient_insurance->ContactMobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance->PolicyType->Visible) { // PolicyType ?>
	<div id="r_PolicyType" class="form-group row">
		<label id="elh_patient_insurance_PolicyType" for="x_PolicyType" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance->PolicyType->caption() ?><?php echo ($patient_insurance->PolicyType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div<?php echo $patient_insurance->PolicyType->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyType">
<input type="text" data-table="patient_insurance" data-field="x_PolicyType" name="x_PolicyType" id="x_PolicyType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance->PolicyType->getPlaceHolder()) ?>" value="<?php echo $patient_insurance->PolicyType->EditValue ?>"<?php echo $patient_insurance->PolicyType->editAttributes() ?>>
</span>
<?php echo $patient_insurance->PolicyType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance->PolicyName->Visible) { // PolicyName ?>
	<div id="r_PolicyName" class="form-group row">
		<label id="elh_patient_insurance_PolicyName" for="x_PolicyName" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance->PolicyName->caption() ?><?php echo ($patient_insurance->PolicyName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div<?php echo $patient_insurance->PolicyName->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyName">
<input type="text" data-table="patient_insurance" data-field="x_PolicyName" name="x_PolicyName" id="x_PolicyName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance->PolicyName->getPlaceHolder()) ?>" value="<?php echo $patient_insurance->PolicyName->EditValue ?>"<?php echo $patient_insurance->PolicyName->editAttributes() ?>>
</span>
<?php echo $patient_insurance->PolicyName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance->PolicyNo->Visible) { // PolicyNo ?>
	<div id="r_PolicyNo" class="form-group row">
		<label id="elh_patient_insurance_PolicyNo" for="x_PolicyNo" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance->PolicyNo->caption() ?><?php echo ($patient_insurance->PolicyNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div<?php echo $patient_insurance->PolicyNo->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyNo">
<input type="text" data-table="patient_insurance" data-field="x_PolicyNo" name="x_PolicyNo" id="x_PolicyNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance->PolicyNo->getPlaceHolder()) ?>" value="<?php echo $patient_insurance->PolicyNo->EditValue ?>"<?php echo $patient_insurance->PolicyNo->editAttributes() ?>>
</span>
<?php echo $patient_insurance->PolicyNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance->PolicyAmount->Visible) { // PolicyAmount ?>
	<div id="r_PolicyAmount" class="form-group row">
		<label id="elh_patient_insurance_PolicyAmount" for="x_PolicyAmount" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance->PolicyAmount->caption() ?><?php echo ($patient_insurance->PolicyAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div<?php echo $patient_insurance->PolicyAmount->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyAmount">
<input type="text" data-table="patient_insurance" data-field="x_PolicyAmount" name="x_PolicyAmount" id="x_PolicyAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance->PolicyAmount->getPlaceHolder()) ?>" value="<?php echo $patient_insurance->PolicyAmount->EditValue ?>"<?php echo $patient_insurance->PolicyAmount->editAttributes() ?>>
</span>
<?php echo $patient_insurance->PolicyAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance->RefLetterNo->Visible) { // RefLetterNo ?>
	<div id="r_RefLetterNo" class="form-group row">
		<label id="elh_patient_insurance_RefLetterNo" for="x_RefLetterNo" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance->RefLetterNo->caption() ?><?php echo ($patient_insurance->RefLetterNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div<?php echo $patient_insurance->RefLetterNo->cellAttributes() ?>>
<span id="el_patient_insurance_RefLetterNo">
<input type="text" data-table="patient_insurance" data-field="x_RefLetterNo" name="x_RefLetterNo" id="x_RefLetterNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance->RefLetterNo->getPlaceHolder()) ?>" value="<?php echo $patient_insurance->RefLetterNo->EditValue ?>"<?php echo $patient_insurance->RefLetterNo->editAttributes() ?>>
</span>
<?php echo $patient_insurance->RefLetterNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance->ReferenceBy->Visible) { // ReferenceBy ?>
	<div id="r_ReferenceBy" class="form-group row">
		<label id="elh_patient_insurance_ReferenceBy" for="x_ReferenceBy" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance->ReferenceBy->caption() ?><?php echo ($patient_insurance->ReferenceBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div<?php echo $patient_insurance->ReferenceBy->cellAttributes() ?>>
<span id="el_patient_insurance_ReferenceBy">
<input type="text" data-table="patient_insurance" data-field="x_ReferenceBy" name="x_ReferenceBy" id="x_ReferenceBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance->ReferenceBy->getPlaceHolder()) ?>" value="<?php echo $patient_insurance->ReferenceBy->EditValue ?>"<?php echo $patient_insurance->ReferenceBy->editAttributes() ?>>
</span>
<?php echo $patient_insurance->ReferenceBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance->ReferenceDate->Visible) { // ReferenceDate ?>
	<div id="r_ReferenceDate" class="form-group row">
		<label id="elh_patient_insurance_ReferenceDate" for="x_ReferenceDate" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance->ReferenceDate->caption() ?><?php echo ($patient_insurance->ReferenceDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div<?php echo $patient_insurance->ReferenceDate->cellAttributes() ?>>
<span id="el_patient_insurance_ReferenceDate">
<input type="text" data-table="patient_insurance" data-field="x_ReferenceDate" name="x_ReferenceDate" id="x_ReferenceDate" placeholder="<?php echo HtmlEncode($patient_insurance->ReferenceDate->getPlaceHolder()) ?>" value="<?php echo $patient_insurance->ReferenceDate->EditValue ?>"<?php echo $patient_insurance->ReferenceDate->editAttributes() ?>>
<?php if (!$patient_insurance->ReferenceDate->ReadOnly && !$patient_insurance->ReferenceDate->Disabled && !isset($patient_insurance->ReferenceDate->EditAttrs["readonly"]) && !isset($patient_insurance->ReferenceDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_insuranceadd", "x_ReferenceDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_insurance->ReferenceDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance->DocumentAttatch->Visible) { // DocumentAttatch ?>
	<div id="r_DocumentAttatch" class="form-group row">
		<label id="elh_patient_insurance_DocumentAttatch" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance->DocumentAttatch->caption() ?><?php echo ($patient_insurance->DocumentAttatch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div<?php echo $patient_insurance->DocumentAttatch->cellAttributes() ?>>
<span id="el_patient_insurance_DocumentAttatch">
<div id="fd_x_DocumentAttatch">
<span title="<?php echo $patient_insurance->DocumentAttatch->title() ? $patient_insurance->DocumentAttatch->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($patient_insurance->DocumentAttatch->ReadOnly || $patient_insurance->DocumentAttatch->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="patient_insurance" data-field="x_DocumentAttatch" name="x_DocumentAttatch" id="x_DocumentAttatch" multiple="multiple"<?php echo $patient_insurance->DocumentAttatch->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_DocumentAttatch" id= "fn_x_DocumentAttatch" value="<?php echo $patient_insurance->DocumentAttatch->Upload->FileName ?>">
<input type="hidden" name="fa_x_DocumentAttatch" id= "fa_x_DocumentAttatch" value="0">
<input type="hidden" name="fs_x_DocumentAttatch" id= "fs_x_DocumentAttatch" value="405">
<input type="hidden" name="fx_x_DocumentAttatch" id= "fx_x_DocumentAttatch" value="<?php echo $patient_insurance->DocumentAttatch->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_DocumentAttatch" id= "fm_x_DocumentAttatch" value="<?php echo $patient_insurance->DocumentAttatch->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x_DocumentAttatch" id= "fc_x_DocumentAttatch" value="<?php echo $patient_insurance->DocumentAttatch->UploadMaxFileCount ?>">
</div>
<table id="ft_x_DocumentAttatch" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $patient_insurance->DocumentAttatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_insurance->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_insurance_mrnno" for="x_mrnno" class="<?php echo $patient_insurance_add->LeftColumnClass ?>"><?php echo $patient_insurance->mrnno->caption() ?><?php echo ($patient_insurance->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_insurance_add->RightColumnClass ?>"><div<?php echo $patient_insurance->mrnno->cellAttributes() ?>>
<?php if ($patient_insurance->mrnno->getSessionValue() <> "") { ?>
<span id="el_patient_insurance_mrnno">
<span<?php echo $patient_insurance->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_insurance->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?php echo HtmlEncode($patient_insurance->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_insurance_mrnno">
<input type="text" data-table="patient_insurance" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_insurance->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_insurance->mrnno->EditValue ?>"<?php echo $patient_insurance->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_insurance->mrnno->CustomMsg ?></div></div>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_insurance_add->terminate();
?>