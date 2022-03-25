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
$patient_add = new patient_add();

// Run the page
$patient_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpatientadd = currentForm = new ew.Form("fpatientadd", "add");

// Validate form
fpatientadd.validate = function() {
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
		<?php if ($patient_add->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->PatientID->caption(), $patient->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->title->Required) { ?>
			elm = this.getElements("x" + infix + "_title");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->title->caption(), $patient->title->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->first_name->Required) { ?>
			elm = this.getElements("x" + infix + "_first_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->first_name->caption(), $patient->first_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->middle_name->Required) { ?>
			elm = this.getElements("x" + infix + "_middle_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->middle_name->caption(), $patient->middle_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->last_name->Required) { ?>
			elm = this.getElements("x" + infix + "_last_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->last_name->caption(), $patient->last_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->gender->Required) { ?>
			elm = this.getElements("x" + infix + "_gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->gender->caption(), $patient->gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->dob->Required) { ?>
			elm = this.getElements("x" + infix + "_dob");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->dob->caption(), $patient->dob->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_dob");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient->dob->errorMessage()) ?>");
		<?php if ($patient_add->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Age->caption(), $patient->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->blood_group->Required) { ?>
			elm = this.getElements("x" + infix + "_blood_group");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->blood_group->caption(), $patient->blood_group->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->mobile_no->Required) { ?>
			elm = this.getElements("x" + infix + "_mobile_no");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->mobile_no->caption(), $patient->mobile_no->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->description->caption(), $patient->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->status->caption(), $patient->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->createdby->caption(), $patient->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->createddatetime->caption(), $patient->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->profilePic->Required) { ?>
			felm = this.getElements("x" + infix + "_profilePic");
			elm = this.getElements("fn_x" + infix + "_profilePic");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $patient->profilePic->caption(), $patient->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->IdentificationMark->Required) { ?>
			elm = this.getElements("x" + infix + "_IdentificationMark");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->IdentificationMark->caption(), $patient->IdentificationMark->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->Religion->Required) { ?>
			elm = this.getElements("x" + infix + "_Religion");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Religion->caption(), $patient->Religion->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->Nationality->Required) { ?>
			elm = this.getElements("x" + infix + "_Nationality");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Nationality->caption(), $patient->Nationality->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->ReferedByDr->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferedByDr");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->ReferedByDr->caption(), $patient->ReferedByDr->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->ReferClinicname->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferClinicname");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->ReferClinicname->caption(), $patient->ReferClinicname->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->ReferCity->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferCity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->ReferCity->caption(), $patient->ReferCity->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->ReferMobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferMobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->ReferMobileNo->caption(), $patient->ReferMobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->ReferA4TreatingConsultant->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferA4TreatingConsultant");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->ReferA4TreatingConsultant->caption(), $patient->ReferA4TreatingConsultant->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->PurposreReferredfor->Required) { ?>
			elm = this.getElements("x" + infix + "_PurposreReferredfor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->PurposreReferredfor->caption(), $patient->PurposreReferredfor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->spouse_title->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_title");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_title->caption(), $patient->spouse_title->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->spouse_first_name->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_first_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_first_name->caption(), $patient->spouse_first_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->spouse_middle_name->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_middle_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_middle_name->caption(), $patient->spouse_middle_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->spouse_last_name->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_last_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_last_name->caption(), $patient->spouse_last_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->spouse_gender->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_gender->caption(), $patient->spouse_gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->spouse_dob->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_dob");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_dob->caption(), $patient->spouse_dob->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->spouse_Age->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_Age->caption(), $patient->spouse_Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->spouse_blood_group->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_blood_group");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_blood_group->caption(), $patient->spouse_blood_group->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->spouse_mobile_no->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_mobile_no");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_mobile_no->caption(), $patient->spouse_mobile_no->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->Maritalstatus->Required) { ?>
			elm = this.getElements("x" + infix + "_Maritalstatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Maritalstatus->caption(), $patient->Maritalstatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->Business->Required) { ?>
			elm = this.getElements("x" + infix + "_Business");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Business->caption(), $patient->Business->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->Patient_Language->Required) { ?>
			elm = this.getElements("x" + infix + "_Patient_Language");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Patient_Language->caption(), $patient->Patient_Language->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->Passport->Required) { ?>
			elm = this.getElements("x" + infix + "_Passport");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Passport->caption(), $patient->Passport->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->VisaNo->Required) { ?>
			elm = this.getElements("x" + infix + "_VisaNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->VisaNo->caption(), $patient->VisaNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->ValidityOfVisa->Required) { ?>
			elm = this.getElements("x" + infix + "_ValidityOfVisa");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->ValidityOfVisa->caption(), $patient->ValidityOfVisa->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->WhereDidYouHear->Required) { ?>
			elm = this.getElements("x" + infix + "_WhereDidYouHear[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->WhereDidYouHear->caption(), $patient->WhereDidYouHear->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->HospID->caption(), $patient->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->street->Required) { ?>
			elm = this.getElements("x" + infix + "_street");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->street->caption(), $patient->street->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->town->Required) { ?>
			elm = this.getElements("x" + infix + "_town");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->town->caption(), $patient->town->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->province->Required) { ?>
			elm = this.getElements("x" + infix + "_province");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->province->caption(), $patient->province->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->country->Required) { ?>
			elm = this.getElements("x" + infix + "_country");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->country->caption(), $patient->country->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->postal_code->Required) { ?>
			elm = this.getElements("x" + infix + "_postal_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->postal_code->caption(), $patient->postal_code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->PEmail->Required) { ?>
			elm = this.getElements("x" + infix + "_PEmail");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->PEmail->caption(), $patient->PEmail->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->PEmergencyContact->Required) { ?>
			elm = this.getElements("x" + infix + "_PEmergencyContact");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->PEmergencyContact->caption(), $patient->PEmergencyContact->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->occupation->Required) { ?>
			elm = this.getElements("x" + infix + "_occupation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->occupation->caption(), $patient->occupation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->spouse_occupation->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_occupation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_occupation->caption(), $patient->spouse_occupation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->WhatsApp->Required) { ?>
			elm = this.getElements("x" + infix + "_WhatsApp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->WhatsApp->caption(), $patient->WhatsApp->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->CouppleID->Required) { ?>
			elm = this.getElements("x" + infix + "_CouppleID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->CouppleID->caption(), $patient->CouppleID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CouppleID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient->CouppleID->errorMessage()) ?>");
		<?php if ($patient_add->MaleID->Required) { ?>
			elm = this.getElements("x" + infix + "_MaleID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->MaleID->caption(), $patient->MaleID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MaleID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient->MaleID->errorMessage()) ?>");
		<?php if ($patient_add->FemaleID->Required) { ?>
			elm = this.getElements("x" + infix + "_FemaleID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->FemaleID->caption(), $patient->FemaleID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FemaleID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient->FemaleID->errorMessage()) ?>");
		<?php if ($patient_add->GroupID->Required) { ?>
			elm = this.getElements("x" + infix + "_GroupID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->GroupID->caption(), $patient->GroupID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GroupID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient->GroupID->errorMessage()) ?>");
		<?php if ($patient_add->Relationship->Required) { ?>
			elm = this.getElements("x" + infix + "_Relationship");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Relationship->caption(), $patient->Relationship->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->AppointmentSearch->Required) { ?>
			elm = this.getElements("x" + infix + "_AppointmentSearch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->AppointmentSearch->caption(), $patient->AppointmentSearch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->FacebookID->Required) { ?>
			elm = this.getElements("x" + infix + "_FacebookID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->FacebookID->caption(), $patient->FacebookID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->profilePicImage->Required) { ?>
			felm = this.getElements("x" + infix + "_profilePicImage");
			elm = this.getElements("fn_x" + infix + "_profilePicImage");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $patient->profilePicImage->caption(), $patient->profilePicImage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_add->Clients->Required) { ?>
			elm = this.getElements("x" + infix + "_Clients");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Clients->caption(), $patient->Clients->RequiredErrorMessage)) ?>");
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
fpatientadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatientadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatientadd.lists["x_title"] = <?php echo $patient_add->title->Lookup->toClientList() ?>;
fpatientadd.lists["x_title"].options = <?php echo JsonEncode($patient_add->title->lookupOptions()) ?>;
fpatientadd.lists["x_gender"] = <?php echo $patient_add->gender->Lookup->toClientList() ?>;
fpatientadd.lists["x_gender"].options = <?php echo JsonEncode($patient_add->gender->lookupOptions()) ?>;
fpatientadd.lists["x_blood_group"] = <?php echo $patient_add->blood_group->Lookup->toClientList() ?>;
fpatientadd.lists["x_blood_group"].options = <?php echo JsonEncode($patient_add->blood_group->lookupOptions()) ?>;
fpatientadd.lists["x_status"] = <?php echo $patient_add->status->Lookup->toClientList() ?>;
fpatientadd.lists["x_status"].options = <?php echo JsonEncode($patient_add->status->lookupOptions()) ?>;
fpatientadd.lists["x_ReferedByDr"] = <?php echo $patient_add->ReferedByDr->Lookup->toClientList() ?>;
fpatientadd.lists["x_ReferedByDr"].options = <?php echo JsonEncode($patient_add->ReferedByDr->lookupOptions()) ?>;
fpatientadd.lists["x_ReferA4TreatingConsultant"] = <?php echo $patient_add->ReferA4TreatingConsultant->Lookup->toClientList() ?>;
fpatientadd.lists["x_ReferA4TreatingConsultant"].options = <?php echo JsonEncode($patient_add->ReferA4TreatingConsultant->lookupOptions()) ?>;
fpatientadd.lists["x_spouse_title"] = <?php echo $patient_add->spouse_title->Lookup->toClientList() ?>;
fpatientadd.lists["x_spouse_title"].options = <?php echo JsonEncode($patient_add->spouse_title->lookupOptions()) ?>;
fpatientadd.lists["x_spouse_gender"] = <?php echo $patient_add->spouse_gender->Lookup->toClientList() ?>;
fpatientadd.lists["x_spouse_gender"].options = <?php echo JsonEncode($patient_add->spouse_gender->lookupOptions()) ?>;
fpatientadd.lists["x_spouse_blood_group"] = <?php echo $patient_add->spouse_blood_group->Lookup->toClientList() ?>;
fpatientadd.lists["x_spouse_blood_group"].options = <?php echo JsonEncode($patient_add->spouse_blood_group->lookupOptions()) ?>;
fpatientadd.lists["x_Maritalstatus"] = <?php echo $patient_add->Maritalstatus->Lookup->toClientList() ?>;
fpatientadd.lists["x_Maritalstatus"].options = <?php echo JsonEncode($patient_add->Maritalstatus->lookupOptions()) ?>;
fpatientadd.lists["x_Business"] = <?php echo $patient_add->Business->Lookup->toClientList() ?>;
fpatientadd.lists["x_Business"].options = <?php echo JsonEncode($patient_add->Business->lookupOptions()) ?>;
fpatientadd.autoSuggests["x_Business"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatientadd.lists["x_Patient_Language"] = <?php echo $patient_add->Patient_Language->Lookup->toClientList() ?>;
fpatientadd.lists["x_Patient_Language"].options = <?php echo JsonEncode($patient_add->Patient_Language->lookupOptions()) ?>;
fpatientadd.lists["x_WhereDidYouHear[]"] = <?php echo $patient_add->WhereDidYouHear->Lookup->toClientList() ?>;
fpatientadd.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($patient_add->WhereDidYouHear->lookupOptions()) ?>;
fpatientadd.lists["x_HospID"] = <?php echo $patient_add->HospID->Lookup->toClientList() ?>;
fpatientadd.lists["x_HospID"].options = <?php echo JsonEncode($patient_add->HospID->lookupOptions()) ?>;
fpatientadd.lists["x_AppointmentSearch"] = <?php echo $patient_add->AppointmentSearch->Lookup->toClientList() ?>;
fpatientadd.lists["x_AppointmentSearch"].options = <?php echo JsonEncode($patient_add->AppointmentSearch->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_add->showPageHeader(); ?>
<?php
$patient_add->showMessage();
?>
<form name="fpatientadd" id="fpatientadd" class="<?php echo $patient_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($patient->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_patient_PatientID" for="x_PatientID" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_PatientID" class="patientadd" type="text/html"><span><?php echo $patient->PatientID->caption() ?><?php echo ($patient->PatientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->PatientID->cellAttributes() ?>>
<script id="tpx_patient_PatientID" class="patientadd" type="text/html">
<span id="el_patient_PatientID">
<input type="text" data-table="patient" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient->PatientID->EditValue ?>"<?php echo $patient->PatientID->editAttributes() ?>>
</span>
</script>
<?php echo $patient->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->title->Visible) { // title ?>
	<div id="r_title" class="form-group row">
		<label id="elh_patient_title" for="x_title" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_title" class="patientadd" type="text/html"><span><?php echo $patient->title->caption() ?><?php echo ($patient->title->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->title->cellAttributes() ?>>
<script id="tpx_patient_title" class="patientadd" type="text/html">
<span id="el_patient_title">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_title" data-value-separator="<?php echo $patient->title->displayValueSeparatorAttribute() ?>" id="x_title" name="x_title"<?php echo $patient->title->editAttributes() ?>>
		<?php echo $patient->title->selectOptionListHtml("x_title") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_tittle") && !$patient->title->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_title" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient->title->caption() ?>" data-title="<?php echo $patient->title->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_title',url:'sys_tittleaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $patient->title->Lookup->getParamTag("p_x_title") ?>
</span>
</script>
<?php echo $patient->title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->first_name->Visible) { // first_name ?>
	<div id="r_first_name" class="form-group row">
		<label id="elh_patient_first_name" for="x_first_name" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_first_name" class="patientadd" type="text/html"><span><?php echo $patient->first_name->caption() ?><?php echo ($patient->first_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->first_name->cellAttributes() ?>>
<script id="tpx_patient_first_name" class="patientadd" type="text/html">
<span id="el_patient_first_name">
<input type="text" data-table="patient" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->first_name->getPlaceHolder()) ?>" value="<?php echo $patient->first_name->EditValue ?>"<?php echo $patient->first_name->editAttributes() ?>>
</span>
</script>
<?php echo $patient->first_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->middle_name->Visible) { // middle_name ?>
	<div id="r_middle_name" class="form-group row">
		<label id="elh_patient_middle_name" for="x_middle_name" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_middle_name" class="patientadd" type="text/html"><span><?php echo $patient->middle_name->caption() ?><?php echo ($patient->middle_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->middle_name->cellAttributes() ?>>
<script id="tpx_patient_middle_name" class="patientadd" type="text/html">
<span id="el_patient_middle_name">
<input type="text" data-table="patient" data-field="x_middle_name" name="x_middle_name" id="x_middle_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient->middle_name->getPlaceHolder()) ?>" value="<?php echo $patient->middle_name->EditValue ?>"<?php echo $patient->middle_name->editAttributes() ?>>
</span>
</script>
<?php echo $patient->middle_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->last_name->Visible) { // last_name ?>
	<div id="r_last_name" class="form-group row">
		<label id="elh_patient_last_name" for="x_last_name" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_last_name" class="patientadd" type="text/html"><span><?php echo $patient->last_name->caption() ?><?php echo ($patient->last_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->last_name->cellAttributes() ?>>
<script id="tpx_patient_last_name" class="patientadd" type="text/html">
<span id="el_patient_last_name">
<input type="text" data-table="patient" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->last_name->getPlaceHolder()) ?>" value="<?php echo $patient->last_name->EditValue ?>"<?php echo $patient->last_name->editAttributes() ?>>
</span>
</script>
<?php echo $patient->last_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_patient_gender" for="x_gender" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_gender" class="patientadd" type="text/html"><span><?php echo $patient->gender->caption() ?><?php echo ($patient->gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->gender->cellAttributes() ?>>
<script id="tpx_patient_gender" class="patientadd" type="text/html">
<span id="el_patient_gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_gender" data-value-separator="<?php echo $patient->gender->displayValueSeparatorAttribute() ?>" id="x_gender" name="x_gender"<?php echo $patient->gender->editAttributes() ?>>
		<?php echo $patient->gender->selectOptionListHtml("x_gender") ?>
	</select>
</div>
<?php echo $patient->gender->Lookup->getParamTag("p_x_gender") ?>
</span>
</script>
<?php echo $patient->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->dob->Visible) { // dob ?>
	<div id="r_dob" class="form-group row">
		<label id="elh_patient_dob" for="x_dob" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_dob" class="patientadd" type="text/html"><span><?php echo $patient->dob->caption() ?><?php echo ($patient->dob->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->dob->cellAttributes() ?>>
<script id="tpx_patient_dob" class="patientadd" type="text/html">
<span id="el_patient_dob">
<input type="text" data-table="patient" data-field="x_dob" data-format="7" name="x_dob" id="x_dob" placeholder="<?php echo HtmlEncode($patient->dob->getPlaceHolder()) ?>" value="<?php echo $patient->dob->EditValue ?>"<?php echo $patient->dob->editAttributes() ?>>
<?php if (!$patient->dob->ReadOnly && !$patient->dob->Disabled && !isset($patient->dob->EditAttrs["readonly"]) && !isset($patient->dob->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patientadd_js">
ew.createDateTimePicker("fpatientadd", "x_dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient->dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_Age" for="x_Age" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Age" class="patientadd" type="text/html"><span><?php echo $patient->Age->caption() ?><?php echo ($patient->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->Age->cellAttributes() ?>>
<script id="tpx_patient_Age" class="patientadd" type="text/html">
<span id="el_patient_Age">
<input type="text" data-table="patient" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->Age->getPlaceHolder()) ?>" value="<?php echo $patient->Age->EditValue ?>"<?php echo $patient->Age->editAttributes() ?>>
</span>
</script>
<?php echo $patient->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->blood_group->Visible) { // blood_group ?>
	<div id="r_blood_group" class="form-group row">
		<label id="elh_patient_blood_group" for="x_blood_group" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_blood_group" class="patientadd" type="text/html"><span><?php echo $patient->blood_group->caption() ?><?php echo ($patient->blood_group->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->blood_group->cellAttributes() ?>>
<script id="tpx_patient_blood_group" class="patientadd" type="text/html">
<span id="el_patient_blood_group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_blood_group" data-value-separator="<?php echo $patient->blood_group->displayValueSeparatorAttribute() ?>" id="x_blood_group" name="x_blood_group"<?php echo $patient->blood_group->editAttributes() ?>>
		<?php echo $patient->blood_group->selectOptionListHtml("x_blood_group") ?>
	</select>
</div>
<?php echo $patient->blood_group->Lookup->getParamTag("p_x_blood_group") ?>
</span>
</script>
<?php echo $patient->blood_group->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->mobile_no->Visible) { // mobile_no ?>
	<div id="r_mobile_no" class="form-group row">
		<label id="elh_patient_mobile_no" for="x_mobile_no" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_mobile_no" class="patientadd" type="text/html"><span><?php echo $patient->mobile_no->caption() ?><?php echo ($patient->mobile_no->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->mobile_no->cellAttributes() ?>>
<script id="tpx_patient_mobile_no" class="patientadd" type="text/html">
<span id="el_patient_mobile_no">
<input type="text" data-table="patient" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient->mobile_no->EditValue ?>"<?php echo $patient->mobile_no->editAttributes() ?>>
</span>
</script>
<?php echo $patient->mobile_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_patient_description" for="x_description" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_description" class="patientadd" type="text/html"><span><?php echo $patient->description->caption() ?><?php echo ($patient->description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->description->cellAttributes() ?>>
<script id="tpx_patient_description" class="patientadd" type="text/html">
<span id="el_patient_description">
<input type="text" data-table="patient" data-field="x_description" name="x_description" id="x_description" placeholder="<?php echo HtmlEncode($patient->description->getPlaceHolder()) ?>" value="<?php echo $patient->description->EditValue ?>"<?php echo $patient->description->editAttributes() ?>>
</span>
</script>
<?php echo $patient->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_status" for="x_status" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_status" class="patientadd" type="text/html"><span><?php echo $patient->status->caption() ?><?php echo ($patient->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->status->cellAttributes() ?>>
<script id="tpx_patient_status" class="patientadd" type="text/html">
<span id="el_patient_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_status" data-value-separator="<?php echo $patient->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient->status->editAttributes() ?>>
		<?php echo $patient->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $patient->status->Lookup->getParamTag("p_x_status") ?>
</span>
</script>
<?php echo $patient->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_profilePic" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_profilePic" class="patientadd" type="text/html"><span><?php echo $patient->profilePic->caption() ?><?php echo ($patient->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->profilePic->cellAttributes() ?>>
<script id="tpx_patient_profilePic" class="patientadd" type="text/html">
<span id="el_patient_profilePic">
<div id="fd_x_profilePic">
<span title="<?php echo $patient->profilePic->title() ? $patient->profilePic->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($patient->profilePic->ReadOnly || $patient->profilePic->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="patient" data-field="x_profilePic" name="x_profilePic" id="x_profilePic"<?php echo $patient->profilePic->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_profilePic" id= "fn_x_profilePic" value="<?php echo $patient->profilePic->Upload->FileName ?>">
<input type="hidden" name="fa_x_profilePic" id= "fa_x_profilePic" value="0">
<input type="hidden" name="fs_x_profilePic" id= "fs_x_profilePic" value="100">
<input type="hidden" name="fx_x_profilePic" id= "fx_x_profilePic" value="<?php echo $patient->profilePic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_profilePic" id= "fm_x_profilePic" value="<?php echo $patient->profilePic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_profilePic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</script>
<?php echo $patient->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->IdentificationMark->Visible) { // IdentificationMark ?>
	<div id="r_IdentificationMark" class="form-group row">
		<label id="elh_patient_IdentificationMark" for="x_IdentificationMark" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_IdentificationMark" class="patientadd" type="text/html"><span><?php echo $patient->IdentificationMark->caption() ?><?php echo ($patient->IdentificationMark->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->IdentificationMark->cellAttributes() ?>>
<script id="tpx_patient_IdentificationMark" class="patientadd" type="text/html">
<span id="el_patient_IdentificationMark">
<input type="text" data-table="patient" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $patient->IdentificationMark->EditValue ?>"<?php echo $patient->IdentificationMark->editAttributes() ?>>
</span>
</script>
<?php echo $patient->IdentificationMark->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->Religion->Visible) { // Religion ?>
	<div id="r_Religion" class="form-group row">
		<label id="elh_patient_Religion" for="x_Religion" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Religion" class="patientadd" type="text/html"><span><?php echo $patient->Religion->caption() ?><?php echo ($patient->Religion->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->Religion->cellAttributes() ?>>
<script id="tpx_patient_Religion" class="patientadd" type="text/html">
<span id="el_patient_Religion">
<input type="text" data-table="patient" data-field="x_Religion" name="x_Religion" id="x_Religion" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->Religion->getPlaceHolder()) ?>" value="<?php echo $patient->Religion->EditValue ?>"<?php echo $patient->Religion->editAttributes() ?>>
</span>
</script>
<?php echo $patient->Religion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->Nationality->Visible) { // Nationality ?>
	<div id="r_Nationality" class="form-group row">
		<label id="elh_patient_Nationality" for="x_Nationality" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Nationality" class="patientadd" type="text/html"><span><?php echo $patient->Nationality->caption() ?><?php echo ($patient->Nationality->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->Nationality->cellAttributes() ?>>
<script id="tpx_patient_Nationality" class="patientadd" type="text/html">
<span id="el_patient_Nationality">
<input type="text" data-table="patient" data-field="x_Nationality" name="x_Nationality" id="x_Nationality" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->Nationality->getPlaceHolder()) ?>" value="<?php echo $patient->Nationality->EditValue ?>"<?php echo $patient->Nationality->editAttributes() ?>>
</span>
</script>
<?php echo $patient->Nationality->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->ReferedByDr->Visible) { // ReferedByDr ?>
	<div id="r_ReferedByDr" class="form-group row">
		<label id="elh_patient_ReferedByDr" for="x_ReferedByDr" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_ReferedByDr" class="patientadd" type="text/html"><span><?php echo $patient->ReferedByDr->caption() ?><?php echo ($patient->ReferedByDr->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->ReferedByDr->cellAttributes() ?>>
<script id="tpx_patient_ReferedByDr" class="patientadd" type="text/html">
<span id="el_patient_ReferedByDr">
<?php $patient->ReferedByDr->EditAttrs["onchange"] = "ew.autoFill(this);" . @$patient->ReferedByDr->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferedByDr"><?php echo strval($patient->ReferedByDr->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient->ReferedByDr->ViewValue) : $patient->ReferedByDr->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient->ReferedByDr->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient->ReferedByDr->ReadOnly || $patient->ReferedByDr->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferedByDr',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$patient->ReferedByDr->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferedByDr" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient->ReferedByDr->caption() ?>" data-title="<?php echo $patient->ReferedByDr->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferedByDr',url:'mas_reference_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $patient->ReferedByDr->Lookup->getParamTag("p_x_ReferedByDr") ?>
<input type="hidden" data-table="patient" data-field="x_ReferedByDr" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient->ReferedByDr->displayValueSeparatorAttribute() ?>" name="x_ReferedByDr" id="x_ReferedByDr" value="<?php echo $patient->ReferedByDr->CurrentValue ?>"<?php echo $patient->ReferedByDr->editAttributes() ?>>
</span>
</script>
<?php echo $patient->ReferedByDr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label id="elh_patient_ReferClinicname" for="x_ReferClinicname" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_ReferClinicname" class="patientadd" type="text/html"><span><?php echo $patient->ReferClinicname->caption() ?><?php echo ($patient->ReferClinicname->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->ReferClinicname->cellAttributes() ?>>
<script id="tpx_patient_ReferClinicname" class="patientadd" type="text/html">
<span id="el_patient_ReferClinicname">
<input type="text" data-table="patient" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $patient->ReferClinicname->EditValue ?>"<?php echo $patient->ReferClinicname->editAttributes() ?>>
</span>
</script>
<?php echo $patient->ReferClinicname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label id="elh_patient_ReferCity" for="x_ReferCity" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_ReferCity" class="patientadd" type="text/html"><span><?php echo $patient->ReferCity->caption() ?><?php echo ($patient->ReferCity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->ReferCity->cellAttributes() ?>>
<script id="tpx_patient_ReferCity" class="patientadd" type="text/html">
<span id="el_patient_ReferCity">
<input type="text" data-table="patient" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->ReferCity->getPlaceHolder()) ?>" value="<?php echo $patient->ReferCity->EditValue ?>"<?php echo $patient->ReferCity->editAttributes() ?>>
</span>
</script>
<?php echo $patient->ReferCity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label id="elh_patient_ReferMobileNo" for="x_ReferMobileNo" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_ReferMobileNo" class="patientadd" type="text/html"><span><?php echo $patient->ReferMobileNo->caption() ?><?php echo ($patient->ReferMobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_patient_ReferMobileNo" class="patientadd" type="text/html">
<span id="el_patient_ReferMobileNo">
<input type="text" data-table="patient" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $patient->ReferMobileNo->EditValue ?>"<?php echo $patient->ReferMobileNo->editAttributes() ?>>
</span>
</script>
<?php echo $patient->ReferMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div id="r_ReferA4TreatingConsultant" class="form-group row">
		<label id="elh_patient_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_ReferA4TreatingConsultant" class="patientadd" type="text/html"><span><?php echo $patient->ReferA4TreatingConsultant->caption() ?><?php echo ($patient->ReferA4TreatingConsultant->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_patient_ReferA4TreatingConsultant" class="patientadd" type="text/html">
<span id="el_patient_ReferA4TreatingConsultant">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferA4TreatingConsultant"><?php echo strval($patient->ReferA4TreatingConsultant->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient->ReferA4TreatingConsultant->ViewValue) : $patient->ReferA4TreatingConsultant->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient->ReferA4TreatingConsultant->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient->ReferA4TreatingConsultant->ReadOnly || $patient->ReferA4TreatingConsultant->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferA4TreatingConsultant',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$patient->ReferA4TreatingConsultant->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferA4TreatingConsultant" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient->ReferA4TreatingConsultant->caption() ?>" data-title="<?php echo $patient->ReferA4TreatingConsultant->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferA4TreatingConsultant',url:'doctorsaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $patient->ReferA4TreatingConsultant->Lookup->getParamTag("p_x_ReferA4TreatingConsultant") ?>
<input type="hidden" data-table="patient" data-field="x_ReferA4TreatingConsultant" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient->ReferA4TreatingConsultant->displayValueSeparatorAttribute() ?>" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" value="<?php echo $patient->ReferA4TreatingConsultant->CurrentValue ?>"<?php echo $patient->ReferA4TreatingConsultant->editAttributes() ?>>
</span>
</script>
<?php echo $patient->ReferA4TreatingConsultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div id="r_PurposreReferredfor" class="form-group row">
		<label id="elh_patient_PurposreReferredfor" for="x_PurposreReferredfor" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_PurposreReferredfor" class="patientadd" type="text/html"><span><?php echo $patient->PurposreReferredfor->caption() ?><?php echo ($patient->PurposreReferredfor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_patient_PurposreReferredfor" class="patientadd" type="text/html">
<span id="el_patient_PurposreReferredfor">
<input type="text" data-table="patient" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->PurposreReferredfor->getPlaceHolder()) ?>" value="<?php echo $patient->PurposreReferredfor->EditValue ?>"<?php echo $patient->PurposreReferredfor->editAttributes() ?>>
</span>
</script>
<?php echo $patient->PurposreReferredfor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_title->Visible) { // spouse_title ?>
	<div id="r_spouse_title" class="form-group row">
		<label id="elh_patient_spouse_title" for="x_spouse_title" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_title" class="patientadd" type="text/html"><span><?php echo $patient->spouse_title->caption() ?><?php echo ($patient->spouse_title->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->spouse_title->cellAttributes() ?>>
<script id="tpx_patient_spouse_title" class="patientadd" type="text/html">
<span id="el_patient_spouse_title">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_title" data-value-separator="<?php echo $patient->spouse_title->displayValueSeparatorAttribute() ?>" id="x_spouse_title" name="x_spouse_title"<?php echo $patient->spouse_title->editAttributes() ?>>
		<?php echo $patient->spouse_title->selectOptionListHtml("x_spouse_title") ?>
	</select>
</div>
<?php echo $patient->spouse_title->Lookup->getParamTag("p_x_spouse_title") ?>
</span>
</script>
<?php echo $patient->spouse_title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_first_name->Visible) { // spouse_first_name ?>
	<div id="r_spouse_first_name" class="form-group row">
		<label id="elh_patient_spouse_first_name" for="x_spouse_first_name" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_first_name" class="patientadd" type="text/html"><span><?php echo $patient->spouse_first_name->caption() ?><?php echo ($patient->spouse_first_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->spouse_first_name->cellAttributes() ?>>
<script id="tpx_patient_spouse_first_name" class="patientadd" type="text/html">
<span id="el_patient_spouse_first_name">
<input type="text" data-table="patient" data-field="x_spouse_first_name" name="x_spouse_first_name" id="x_spouse_first_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->spouse_first_name->getPlaceHolder()) ?>" value="<?php echo $patient->spouse_first_name->EditValue ?>"<?php echo $patient->spouse_first_name->editAttributes() ?>>
</span>
</script>
<?php echo $patient->spouse_first_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<div id="r_spouse_middle_name" class="form-group row">
		<label id="elh_patient_spouse_middle_name" for="x_spouse_middle_name" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_middle_name" class="patientadd" type="text/html"><span><?php echo $patient->spouse_middle_name->caption() ?><?php echo ($patient->spouse_middle_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->spouse_middle_name->cellAttributes() ?>>
<script id="tpx_patient_spouse_middle_name" class="patientadd" type="text/html">
<span id="el_patient_spouse_middle_name">
<input type="text" data-table="patient" data-field="x_spouse_middle_name" name="x_spouse_middle_name" id="x_spouse_middle_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->spouse_middle_name->getPlaceHolder()) ?>" value="<?php echo $patient->spouse_middle_name->EditValue ?>"<?php echo $patient->spouse_middle_name->editAttributes() ?>>
</span>
</script>
<?php echo $patient->spouse_middle_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_last_name->Visible) { // spouse_last_name ?>
	<div id="r_spouse_last_name" class="form-group row">
		<label id="elh_patient_spouse_last_name" for="x_spouse_last_name" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_last_name" class="patientadd" type="text/html"><span><?php echo $patient->spouse_last_name->caption() ?><?php echo ($patient->spouse_last_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->spouse_last_name->cellAttributes() ?>>
<script id="tpx_patient_spouse_last_name" class="patientadd" type="text/html">
<span id="el_patient_spouse_last_name">
<input type="text" data-table="patient" data-field="x_spouse_last_name" name="x_spouse_last_name" id="x_spouse_last_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->spouse_last_name->getPlaceHolder()) ?>" value="<?php echo $patient->spouse_last_name->EditValue ?>"<?php echo $patient->spouse_last_name->editAttributes() ?>>
</span>
</script>
<?php echo $patient->spouse_last_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_gender->Visible) { // spouse_gender ?>
	<div id="r_spouse_gender" class="form-group row">
		<label id="elh_patient_spouse_gender" for="x_spouse_gender" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_gender" class="patientadd" type="text/html"><span><?php echo $patient->spouse_gender->caption() ?><?php echo ($patient->spouse_gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->spouse_gender->cellAttributes() ?>>
<script id="tpx_patient_spouse_gender" class="patientadd" type="text/html">
<span id="el_patient_spouse_gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_gender" data-value-separator="<?php echo $patient->spouse_gender->displayValueSeparatorAttribute() ?>" id="x_spouse_gender" name="x_spouse_gender"<?php echo $patient->spouse_gender->editAttributes() ?>>
		<?php echo $patient->spouse_gender->selectOptionListHtml("x_spouse_gender") ?>
	</select>
</div>
<?php echo $patient->spouse_gender->Lookup->getParamTag("p_x_spouse_gender") ?>
</span>
</script>
<?php echo $patient->spouse_gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_dob->Visible) { // spouse_dob ?>
	<div id="r_spouse_dob" class="form-group row">
		<label id="elh_patient_spouse_dob" for="x_spouse_dob" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_dob" class="patientadd" type="text/html"><span><?php echo $patient->spouse_dob->caption() ?><?php echo ($patient->spouse_dob->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->spouse_dob->cellAttributes() ?>>
<script id="tpx_patient_spouse_dob" class="patientadd" type="text/html">
<span id="el_patient_spouse_dob">
<input type="text" data-table="patient" data-field="x_spouse_dob" data-format="7" name="x_spouse_dob" id="x_spouse_dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->spouse_dob->getPlaceHolder()) ?>" value="<?php echo $patient->spouse_dob->EditValue ?>"<?php echo $patient->spouse_dob->editAttributes() ?>>
<?php if (!$patient->spouse_dob->ReadOnly && !$patient->spouse_dob->Disabled && !isset($patient->spouse_dob->EditAttrs["readonly"]) && !isset($patient->spouse_dob->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patientadd_js">
ew.createDateTimePicker("fpatientadd", "x_spouse_dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient->spouse_dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_Age->Visible) { // spouse_Age ?>
	<div id="r_spouse_Age" class="form-group row">
		<label id="elh_patient_spouse_Age" for="x_spouse_Age" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_Age" class="patientadd" type="text/html"><span><?php echo $patient->spouse_Age->caption() ?><?php echo ($patient->spouse_Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->spouse_Age->cellAttributes() ?>>
<script id="tpx_patient_spouse_Age" class="patientadd" type="text/html">
<span id="el_patient_spouse_Age">
<input type="text" data-table="patient" data-field="x_spouse_Age" name="x_spouse_Age" id="x_spouse_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->spouse_Age->getPlaceHolder()) ?>" value="<?php echo $patient->spouse_Age->EditValue ?>"<?php echo $patient->spouse_Age->editAttributes() ?>>
</span>
</script>
<?php echo $patient->spouse_Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<div id="r_spouse_blood_group" class="form-group row">
		<label id="elh_patient_spouse_blood_group" for="x_spouse_blood_group" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_blood_group" class="patientadd" type="text/html"><span><?php echo $patient->spouse_blood_group->caption() ?><?php echo ($patient->spouse_blood_group->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->spouse_blood_group->cellAttributes() ?>>
<script id="tpx_patient_spouse_blood_group" class="patientadd" type="text/html">
<span id="el_patient_spouse_blood_group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_blood_group" data-value-separator="<?php echo $patient->spouse_blood_group->displayValueSeparatorAttribute() ?>" id="x_spouse_blood_group" name="x_spouse_blood_group"<?php echo $patient->spouse_blood_group->editAttributes() ?>>
		<?php echo $patient->spouse_blood_group->selectOptionListHtml("x_spouse_blood_group") ?>
	</select>
</div>
<?php echo $patient->spouse_blood_group->Lookup->getParamTag("p_x_spouse_blood_group") ?>
</span>
</script>
<?php echo $patient->spouse_blood_group->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<div id="r_spouse_mobile_no" class="form-group row">
		<label id="elh_patient_spouse_mobile_no" for="x_spouse_mobile_no" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_mobile_no" class="patientadd" type="text/html"><span><?php echo $patient->spouse_mobile_no->caption() ?><?php echo ($patient->spouse_mobile_no->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->spouse_mobile_no->cellAttributes() ?>>
<script id="tpx_patient_spouse_mobile_no" class="patientadd" type="text/html">
<span id="el_patient_spouse_mobile_no">
<input type="text" data-table="patient" data-field="x_spouse_mobile_no" name="x_spouse_mobile_no" id="x_spouse_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->spouse_mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient->spouse_mobile_no->EditValue ?>"<?php echo $patient->spouse_mobile_no->editAttributes() ?>>
</span>
</script>
<?php echo $patient->spouse_mobile_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->Maritalstatus->Visible) { // Maritalstatus ?>
	<div id="r_Maritalstatus" class="form-group row">
		<label id="elh_patient_Maritalstatus" for="x_Maritalstatus" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Maritalstatus" class="patientadd" type="text/html"><span><?php echo $patient->Maritalstatus->caption() ?><?php echo ($patient->Maritalstatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->Maritalstatus->cellAttributes() ?>>
<script id="tpx_patient_Maritalstatus" class="patientadd" type="text/html">
<span id="el_patient_Maritalstatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_Maritalstatus" data-value-separator="<?php echo $patient->Maritalstatus->displayValueSeparatorAttribute() ?>" id="x_Maritalstatus" name="x_Maritalstatus"<?php echo $patient->Maritalstatus->editAttributes() ?>>
		<?php echo $patient->Maritalstatus->selectOptionListHtml("x_Maritalstatus") ?>
	</select>
</div>
<?php echo $patient->Maritalstatus->Lookup->getParamTag("p_x_Maritalstatus") ?>
</span>
</script>
<?php echo $patient->Maritalstatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->Business->Visible) { // Business ?>
	<div id="r_Business" class="form-group row">
		<label id="elh_patient_Business" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Business" class="patientadd" type="text/html"><span><?php echo $patient->Business->caption() ?><?php echo ($patient->Business->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->Business->cellAttributes() ?>>
<script id="tpx_patient_Business" class="patientadd" type="text/html">
<span id="el_patient_Business">
<?php
$wrkonchange = "" . trim(@$patient->Business->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient->Business->EditAttrs["onchange"] = "";
?>
<span id="as_x_Business" class="text-nowrap" style="z-index: 8620">
	<input type="text" class="form-control" name="sv_x_Business" id="sv_x_Business" value="<?php echo RemoveHtml($patient->Business->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->Business->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient->Business->getPlaceHolder()) ?>"<?php echo $patient->Business->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient" data-field="x_Business" data-value-separator="<?php echo $patient->Business->displayValueSeparatorAttribute() ?>" name="x_Business" id="x_Business" value="<?php echo HtmlEncode($patient->Business->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient->Business->Lookup->getParamTag("p_x_Business") ?>
</span>
</script>
<script type="text/html" class="patientadd_js">
fpatientadd.createAutoSuggest({"id":"x_Business","forceSelect":false});
</script>
<?php echo $patient->Business->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->Patient_Language->Visible) { // Patient_Language ?>
	<div id="r_Patient_Language" class="form-group row">
		<label id="elh_patient_Patient_Language" for="x_Patient_Language" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Patient_Language" class="patientadd" type="text/html"><span><?php echo $patient->Patient_Language->caption() ?><?php echo ($patient->Patient_Language->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->Patient_Language->cellAttributes() ?>>
<script id="tpx_patient_Patient_Language" class="patientadd" type="text/html">
<span id="el_patient_Patient_Language">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_Patient_Language" data-value-separator="<?php echo $patient->Patient_Language->displayValueSeparatorAttribute() ?>" id="x_Patient_Language" name="x_Patient_Language"<?php echo $patient->Patient_Language->editAttributes() ?>>
		<?php echo $patient->Patient_Language->selectOptionListHtml("x_Patient_Language") ?>
	</select>
</div>
<?php echo $patient->Patient_Language->Lookup->getParamTag("p_x_Patient_Language") ?>
</span>
</script>
<?php echo $patient->Patient_Language->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->Passport->Visible) { // Passport ?>
	<div id="r_Passport" class="form-group row">
		<label id="elh_patient_Passport" for="x_Passport" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Passport" class="patientadd" type="text/html"><span><?php echo $patient->Passport->caption() ?><?php echo ($patient->Passport->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->Passport->cellAttributes() ?>>
<script id="tpx_patient_Passport" class="patientadd" type="text/html">
<span id="el_patient_Passport">
<input type="text" data-table="patient" data-field="x_Passport" name="x_Passport" id="x_Passport" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->Passport->getPlaceHolder()) ?>" value="<?php echo $patient->Passport->EditValue ?>"<?php echo $patient->Passport->editAttributes() ?>>
</span>
</script>
<?php echo $patient->Passport->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->VisaNo->Visible) { // VisaNo ?>
	<div id="r_VisaNo" class="form-group row">
		<label id="elh_patient_VisaNo" for="x_VisaNo" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_VisaNo" class="patientadd" type="text/html"><span><?php echo $patient->VisaNo->caption() ?><?php echo ($patient->VisaNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->VisaNo->cellAttributes() ?>>
<script id="tpx_patient_VisaNo" class="patientadd" type="text/html">
<span id="el_patient_VisaNo">
<input type="text" data-table="patient" data-field="x_VisaNo" name="x_VisaNo" id="x_VisaNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->VisaNo->getPlaceHolder()) ?>" value="<?php echo $patient->VisaNo->EditValue ?>"<?php echo $patient->VisaNo->editAttributes() ?>>
</span>
</script>
<?php echo $patient->VisaNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<div id="r_ValidityOfVisa" class="form-group row">
		<label id="elh_patient_ValidityOfVisa" for="x_ValidityOfVisa" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_ValidityOfVisa" class="patientadd" type="text/html"><span><?php echo $patient->ValidityOfVisa->caption() ?><?php echo ($patient->ValidityOfVisa->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->ValidityOfVisa->cellAttributes() ?>>
<script id="tpx_patient_ValidityOfVisa" class="patientadd" type="text/html">
<span id="el_patient_ValidityOfVisa">
<input type="text" data-table="patient" data-field="x_ValidityOfVisa" name="x_ValidityOfVisa" id="x_ValidityOfVisa" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->ValidityOfVisa->getPlaceHolder()) ?>" value="<?php echo $patient->ValidityOfVisa->EditValue ?>"<?php echo $patient->ValidityOfVisa->editAttributes() ?>>
</span>
</script>
<?php echo $patient->ValidityOfVisa->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<div id="r_WhereDidYouHear" class="form-group row">
		<label id="elh_patient_WhereDidYouHear" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_WhereDidYouHear" class="patientadd" type="text/html"><span><?php echo $patient->WhereDidYouHear->caption() ?><?php echo ($patient->WhereDidYouHear->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->WhereDidYouHear->cellAttributes() ?>>
<script id="tpx_patient_WhereDidYouHear" class="patientadd" type="text/html">
<span id="el_patient_WhereDidYouHear">
<div id="tp_x_WhereDidYouHear" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $patient->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x_WhereDidYouHear[]" id="x_WhereDidYouHear[]" value="{value}"<?php echo $patient->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient->WhereDidYouHear->checkBoxListHtml(FALSE, "x_WhereDidYouHear[]") ?>
</div></div>
<?php echo $patient->WhereDidYouHear->Lookup->getParamTag("p_x_WhereDidYouHear") ?>
</span>
</script>
<?php echo $patient->WhereDidYouHear->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label id="elh_patient_street" for="x_street" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_street" class="patientadd" type="text/html"><span><?php echo $patient->street->caption() ?><?php echo ($patient->street->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->street->cellAttributes() ?>>
<script id="tpx_patient_street" class="patientadd" type="text/html">
<span id="el_patient_street">
<input type="text" data-table="patient" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient->street->getPlaceHolder()) ?>" value="<?php echo $patient->street->EditValue ?>"<?php echo $patient->street->editAttributes() ?>>
</span>
</script>
<?php echo $patient->street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label id="elh_patient_town" for="x_town" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_town" class="patientadd" type="text/html"><span><?php echo $patient->town->caption() ?><?php echo ($patient->town->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->town->cellAttributes() ?>>
<script id="tpx_patient_town" class="patientadd" type="text/html">
<span id="el_patient_town">
<input type="text" data-table="patient" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->town->getPlaceHolder()) ?>" value="<?php echo $patient->town->EditValue ?>"<?php echo $patient->town->editAttributes() ?>>
</span>
</script>
<?php echo $patient->town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_patient_province" for="x_province" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_province" class="patientadd" type="text/html"><span><?php echo $patient->province->caption() ?><?php echo ($patient->province->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->province->cellAttributes() ?>>
<script id="tpx_patient_province" class="patientadd" type="text/html">
<span id="el_patient_province">
<input type="text" data-table="patient" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->province->getPlaceHolder()) ?>" value="<?php echo $patient->province->EditValue ?>"<?php echo $patient->province->editAttributes() ?>>
</span>
</script>
<?php echo $patient->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->country->Visible) { // country ?>
	<div id="r_country" class="form-group row">
		<label id="elh_patient_country" for="x_country" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_country" class="patientadd" type="text/html"><span><?php echo $patient->country->caption() ?><?php echo ($patient->country->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->country->cellAttributes() ?>>
<script id="tpx_patient_country" class="patientadd" type="text/html">
<span id="el_patient_country">
<input type="text" data-table="patient" data-field="x_country" name="x_country" id="x_country" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->country->getPlaceHolder()) ?>" value="<?php echo $patient->country->EditValue ?>"<?php echo $patient->country->editAttributes() ?>>
</span>
</script>
<?php echo $patient->country->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_patient_postal_code" for="x_postal_code" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_postal_code" class="patientadd" type="text/html"><span><?php echo $patient->postal_code->caption() ?><?php echo ($patient->postal_code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->postal_code->cellAttributes() ?>>
<script id="tpx_patient_postal_code" class="patientadd" type="text/html">
<span id="el_patient_postal_code">
<input type="text" data-table="patient" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->postal_code->getPlaceHolder()) ?>" value="<?php echo $patient->postal_code->EditValue ?>"<?php echo $patient->postal_code->editAttributes() ?>>
</span>
</script>
<?php echo $patient->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->PEmail->Visible) { // PEmail ?>
	<div id="r_PEmail" class="form-group row">
		<label id="elh_patient_PEmail" for="x_PEmail" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_PEmail" class="patientadd" type="text/html"><span><?php echo $patient->PEmail->caption() ?><?php echo ($patient->PEmail->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->PEmail->cellAttributes() ?>>
<script id="tpx_patient_PEmail" class="patientadd" type="text/html">
<span id="el_patient_PEmail">
<input type="text" data-table="patient" data-field="x_PEmail" name="x_PEmail" id="x_PEmail" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->PEmail->getPlaceHolder()) ?>" value="<?php echo $patient->PEmail->EditValue ?>"<?php echo $patient->PEmail->editAttributes() ?>>
</span>
</script>
<?php echo $patient->PEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<div id="r_PEmergencyContact" class="form-group row">
		<label id="elh_patient_PEmergencyContact" for="x_PEmergencyContact" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_PEmergencyContact" class="patientadd" type="text/html"><span><?php echo $patient->PEmergencyContact->caption() ?><?php echo ($patient->PEmergencyContact->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->PEmergencyContact->cellAttributes() ?>>
<script id="tpx_patient_PEmergencyContact" class="patientadd" type="text/html">
<span id="el_patient_PEmergencyContact">
<input type="text" data-table="patient" data-field="x_PEmergencyContact" name="x_PEmergencyContact" id="x_PEmergencyContact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->PEmergencyContact->getPlaceHolder()) ?>" value="<?php echo $patient->PEmergencyContact->EditValue ?>"<?php echo $patient->PEmergencyContact->editAttributes() ?>>
</span>
</script>
<?php echo $patient->PEmergencyContact->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->occupation->Visible) { // occupation ?>
	<div id="r_occupation" class="form-group row">
		<label id="elh_patient_occupation" for="x_occupation" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_occupation" class="patientadd" type="text/html"><span><?php echo $patient->occupation->caption() ?><?php echo ($patient->occupation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->occupation->cellAttributes() ?>>
<script id="tpx_patient_occupation" class="patientadd" type="text/html">
<span id="el_patient_occupation">
<input type="text" data-table="patient" data-field="x_occupation" name="x_occupation" id="x_occupation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->occupation->getPlaceHolder()) ?>" value="<?php echo $patient->occupation->EditValue ?>"<?php echo $patient->occupation->editAttributes() ?>>
</span>
</script>
<?php echo $patient->occupation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_occupation->Visible) { // spouse_occupation ?>
	<div id="r_spouse_occupation" class="form-group row">
		<label id="elh_patient_spouse_occupation" for="x_spouse_occupation" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_occupation" class="patientadd" type="text/html"><span><?php echo $patient->spouse_occupation->caption() ?><?php echo ($patient->spouse_occupation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->spouse_occupation->cellAttributes() ?>>
<script id="tpx_patient_spouse_occupation" class="patientadd" type="text/html">
<span id="el_patient_spouse_occupation">
<input type="text" data-table="patient" data-field="x_spouse_occupation" name="x_spouse_occupation" id="x_spouse_occupation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->spouse_occupation->getPlaceHolder()) ?>" value="<?php echo $patient->spouse_occupation->EditValue ?>"<?php echo $patient->spouse_occupation->editAttributes() ?>>
</span>
</script>
<?php echo $patient->spouse_occupation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->WhatsApp->Visible) { // WhatsApp ?>
	<div id="r_WhatsApp" class="form-group row">
		<label id="elh_patient_WhatsApp" for="x_WhatsApp" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_WhatsApp" class="patientadd" type="text/html"><span><?php echo $patient->WhatsApp->caption() ?><?php echo ($patient->WhatsApp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->WhatsApp->cellAttributes() ?>>
<script id="tpx_patient_WhatsApp" class="patientadd" type="text/html">
<span id="el_patient_WhatsApp">
<input type="text" data-table="patient" data-field="x_WhatsApp" name="x_WhatsApp" id="x_WhatsApp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->WhatsApp->getPlaceHolder()) ?>" value="<?php echo $patient->WhatsApp->EditValue ?>"<?php echo $patient->WhatsApp->editAttributes() ?>>
</span>
</script>
<?php echo $patient->WhatsApp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->CouppleID->Visible) { // CouppleID ?>
	<div id="r_CouppleID" class="form-group row">
		<label id="elh_patient_CouppleID" for="x_CouppleID" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_CouppleID" class="patientadd" type="text/html"><span><?php echo $patient->CouppleID->caption() ?><?php echo ($patient->CouppleID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->CouppleID->cellAttributes() ?>>
<script id="tpx_patient_CouppleID" class="patientadd" type="text/html">
<span id="el_patient_CouppleID">
<input type="text" data-table="patient" data-field="x_CouppleID" name="x_CouppleID" id="x_CouppleID" size="30" placeholder="<?php echo HtmlEncode($patient->CouppleID->getPlaceHolder()) ?>" value="<?php echo $patient->CouppleID->EditValue ?>"<?php echo $patient->CouppleID->editAttributes() ?>>
</span>
</script>
<?php echo $patient->CouppleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->MaleID->Visible) { // MaleID ?>
	<div id="r_MaleID" class="form-group row">
		<label id="elh_patient_MaleID" for="x_MaleID" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_MaleID" class="patientadd" type="text/html"><span><?php echo $patient->MaleID->caption() ?><?php echo ($patient->MaleID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->MaleID->cellAttributes() ?>>
<script id="tpx_patient_MaleID" class="patientadd" type="text/html">
<span id="el_patient_MaleID">
<input type="text" data-table="patient" data-field="x_MaleID" name="x_MaleID" id="x_MaleID" size="30" placeholder="<?php echo HtmlEncode($patient->MaleID->getPlaceHolder()) ?>" value="<?php echo $patient->MaleID->EditValue ?>"<?php echo $patient->MaleID->editAttributes() ?>>
</span>
</script>
<?php echo $patient->MaleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->FemaleID->Visible) { // FemaleID ?>
	<div id="r_FemaleID" class="form-group row">
		<label id="elh_patient_FemaleID" for="x_FemaleID" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_FemaleID" class="patientadd" type="text/html"><span><?php echo $patient->FemaleID->caption() ?><?php echo ($patient->FemaleID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->FemaleID->cellAttributes() ?>>
<script id="tpx_patient_FemaleID" class="patientadd" type="text/html">
<span id="el_patient_FemaleID">
<input type="text" data-table="patient" data-field="x_FemaleID" name="x_FemaleID" id="x_FemaleID" size="30" placeholder="<?php echo HtmlEncode($patient->FemaleID->getPlaceHolder()) ?>" value="<?php echo $patient->FemaleID->EditValue ?>"<?php echo $patient->FemaleID->editAttributes() ?>>
</span>
</script>
<?php echo $patient->FemaleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->GroupID->Visible) { // GroupID ?>
	<div id="r_GroupID" class="form-group row">
		<label id="elh_patient_GroupID" for="x_GroupID" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_GroupID" class="patientadd" type="text/html"><span><?php echo $patient->GroupID->caption() ?><?php echo ($patient->GroupID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->GroupID->cellAttributes() ?>>
<script id="tpx_patient_GroupID" class="patientadd" type="text/html">
<span id="el_patient_GroupID">
<input type="text" data-table="patient" data-field="x_GroupID" name="x_GroupID" id="x_GroupID" size="30" placeholder="<?php echo HtmlEncode($patient->GroupID->getPlaceHolder()) ?>" value="<?php echo $patient->GroupID->EditValue ?>"<?php echo $patient->GroupID->editAttributes() ?>>
</span>
</script>
<?php echo $patient->GroupID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->Relationship->Visible) { // Relationship ?>
	<div id="r_Relationship" class="form-group row">
		<label id="elh_patient_Relationship" for="x_Relationship" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Relationship" class="patientadd" type="text/html"><span><?php echo $patient->Relationship->caption() ?><?php echo ($patient->Relationship->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->Relationship->cellAttributes() ?>>
<script id="tpx_patient_Relationship" class="patientadd" type="text/html">
<span id="el_patient_Relationship">
<input type="text" data-table="patient" data-field="x_Relationship" name="x_Relationship" id="x_Relationship" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->Relationship->getPlaceHolder()) ?>" value="<?php echo $patient->Relationship->EditValue ?>"<?php echo $patient->Relationship->editAttributes() ?>>
</span>
</script>
<?php echo $patient->Relationship->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->AppointmentSearch->Visible) { // AppointmentSearch ?>
	<div id="r_AppointmentSearch" class="form-group row">
		<label id="elh_patient_AppointmentSearch" for="x_AppointmentSearch" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_AppointmentSearch" class="patientadd" type="text/html"><span><?php echo $patient->AppointmentSearch->caption() ?><?php echo ($patient->AppointmentSearch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->AppointmentSearch->cellAttributes() ?>>
<script id="tpx_patient_AppointmentSearch" class="patientadd" type="text/html">
<span id="el_patient_AppointmentSearch">
<?php $patient->AppointmentSearch->EditAttrs["onchange"] = "ew.autoFill(this);" . @$patient->AppointmentSearch->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AppointmentSearch"><?php echo strval($patient->AppointmentSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient->AppointmentSearch->ViewValue) : $patient->AppointmentSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient->AppointmentSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient->AppointmentSearch->ReadOnly || $patient->AppointmentSearch->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_AppointmentSearch',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient->AppointmentSearch->Lookup->getParamTag("p_x_AppointmentSearch") ?>
<input type="hidden" data-table="patient" data-field="x_AppointmentSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient->AppointmentSearch->displayValueSeparatorAttribute() ?>" name="x_AppointmentSearch" id="x_AppointmentSearch" value="<?php echo $patient->AppointmentSearch->CurrentValue ?>"<?php echo $patient->AppointmentSearch->editAttributes() ?>>
</span>
</script>
<?php echo $patient->AppointmentSearch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->FacebookID->Visible) { // FacebookID ?>
	<div id="r_FacebookID" class="form-group row">
		<label id="elh_patient_FacebookID" for="x_FacebookID" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_FacebookID" class="patientadd" type="text/html"><span><?php echo $patient->FacebookID->caption() ?><?php echo ($patient->FacebookID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->FacebookID->cellAttributes() ?>>
<script id="tpx_patient_FacebookID" class="patientadd" type="text/html">
<span id="el_patient_FacebookID">
<input type="text" data-table="patient" data-field="x_FacebookID" name="x_FacebookID" id="x_FacebookID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->FacebookID->getPlaceHolder()) ?>" value="<?php echo $patient->FacebookID->EditValue ?>"<?php echo $patient->FacebookID->editAttributes() ?>>
</span>
</script>
<?php echo $patient->FacebookID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->profilePicImage->Visible) { // profilePicImage ?>
	<div id="r_profilePicImage" class="form-group row">
		<label id="elh_patient_profilePicImage" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_profilePicImage" class="patientadd" type="text/html"><span><?php echo $patient->profilePicImage->caption() ?><?php echo ($patient->profilePicImage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->profilePicImage->cellAttributes() ?>>
<script id="tpx_patient_profilePicImage" class="patientadd" type="text/html">
<span id="el_patient_profilePicImage">
<div id="fd_x_profilePicImage">
<span title="<?php echo $patient->profilePicImage->title() ? $patient->profilePicImage->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($patient->profilePicImage->ReadOnly || $patient->profilePicImage->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="patient" data-field="x_profilePicImage" name="x_profilePicImage" id="x_profilePicImage"<?php echo $patient->profilePicImage->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_profilePicImage" id= "fn_x_profilePicImage" value="<?php echo $patient->profilePicImage->Upload->FileName ?>">
<input type="hidden" name="fa_x_profilePicImage" id= "fa_x_profilePicImage" value="0">
<input type="hidden" name="fs_x_profilePicImage" id= "fs_x_profilePicImage" value="0">
<input type="hidden" name="fx_x_profilePicImage" id= "fx_x_profilePicImage" value="<?php echo $patient->profilePicImage->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_profilePicImage" id= "fm_x_profilePicImage" value="<?php echo $patient->profilePicImage->UploadMaxFileSize ?>">
</div>
<table id="ft_x_profilePicImage" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</script>
<?php echo $patient->profilePicImage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient->Clients->Visible) { // Clients ?>
	<div id="r_Clients" class="form-group row">
		<label id="elh_patient_Clients" for="x_Clients" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Clients" class="patientadd" type="text/html"><span><?php echo $patient->Clients->caption() ?><?php echo ($patient->Clients->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div<?php echo $patient->Clients->cellAttributes() ?>>
<script id="tpx_patient_Clients" class="patientadd" type="text/html">
<span id="el_patient_Clients">
<input type="text" data-table="patient" data-field="x_Clients" name="x_Clients" id="x_Clients" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->Clients->getPlaceHolder()) ?>" value="<?php echo $patient->Clients->EditValue ?>"<?php echo $patient->Clients->editAttributes() ?>>
</span>
</script>
<?php echo $patient->Clients->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patientadd" class="ew-custom-template"></div>
<script id="tpm_patientadd" type="text/html">
<div id="ct_patient_add"><style>
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
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<?php
$pcid = $_GET["id"] ;
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$Iid = $_GET["id"] ;
$dbhelper = &DbHelper();
if($pcid != null)
{
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where Male='". $pcid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$IVFid = $resultsa[0]["RIDNO"];
	$ccid = $resultsa[0]["Name"];
	$cPatientID = $resultsa[0]["PartnerID"];
}
if($cPatientID == null)
{
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where Female='".$pcid."'; ";
	$results1a = $dbhelper->ExecuteRows($sql);
	$IVFida = $resultsa[0]["RIDNO"];
	$ccida = $resultsa[0]["Name"];
	$cPatientID = $resultsa[0]["PatientID"];
}
?>	
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_patient_PatientID"/}}&nbsp;{{include tmpl="#tpx_patient_PatientID"/}}</h3>
	</div>
	<div class="col-4">
	 <?php  if($cPatientID != '')
{ echo "Partner ID : ".$cPatientID; }
  ?>
	</div>
	<div class="col-4">
		<h3 class="card-title">
			{{include tmpl="#tpc_patient_AppointmentSearch"/}}&nbsp;{{include tmpl="#tpx_patient_AppointmentSearch"/}}
		</h3>
	</div>
</div>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient Details</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_title"/}}&nbsp;{{include tmpl="#tpx_patient_title"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_first_name"/}}&nbsp;{{include tmpl="#tpx_patient_first_name"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_middle_name"/}}&nbsp;{{include tmpl="#tpx_patient_middle_name"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_last_name"/}}&nbsp;{{include tmpl="#tpx_patient_last_name"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_gender"/}}&nbsp;{{include tmpl="#tpx_patient_gender"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_dob"/}}&nbsp;{{include tmpl="#tpx_patient_dob"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Age"/}}&nbsp;{{include tmpl="#tpx_patient_Age"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_blood_group"/}}&nbsp;{{include tmpl="#tpx_patient_blood_group"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_mobile_no"/}}&nbsp;{{include tmpl="#tpx_patient_mobile_no"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_occupation"/}}&nbsp;{{include tmpl="#tpx_patient_occupation"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Spouse Details</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_title"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_title"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_first_name"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_first_name"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_middle_name"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_middle_name"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_last_name"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_last_name"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_gender"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_gender"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_dob"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_dob"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_Age"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_Age"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_blood_group"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_blood_group"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_mobile_no"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_mobile_no"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_occupation"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_occupation"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#229954">
				<h3 class="card-title">Patient Address</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_street"/}}&nbsp;{{include tmpl="#tpx_patient_street"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_town"/}}&nbsp;{{include tmpl="#tpx_patient_town"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_province"/}}&nbsp;{{include tmpl="#tpx_patient_province"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Passport"/}}&nbsp;{{include tmpl="#tpx_patient_Passport"/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_country"/}}&nbsp;{{include tmpl="#tpx_patient_country"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_postal_code"/}}&nbsp;{{include tmpl="#tpx_patient_postal_code"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_PEmail"/}}&nbsp;{{include tmpl="#tpx_patient_PEmail"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_VisaNo"/}}&nbsp;{{include tmpl="#tpx_patient_VisaNo"/}}</span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#7D3C98">
				<h3 class="card-title">Patient Other Details</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_IdentificationMark"/}}&nbsp;{{include tmpl="#tpx_patient_IdentificationMark"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Religion"/}}&nbsp;{{include tmpl="#tpx_patient_Religion"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Nationality"/}}&nbsp;{{include tmpl="#tpx_patient_Nationality"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_profilePic"/}}&nbsp;{{include tmpl="#tpx_patient_profilePic"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">
<input hidden type="text" id="screenshotFF" name="screenshotFF" value="">
					</span>
				  </div>
<div id="screenshot" style="text-align:center;">
  <video class="videostream" autoplay></video>
  <img id="screenshot-img"  name="screenshot-img">
<div class="row">  
<p  id="capture-button"  name="capture-button" class="col-4 capture-button btn btn-primary btn-block">Capture video</p>
<p id="screenshot-button"  name="screenshot-button" class="col-4 btn btn-success btn-block"  disabled>Take screenshot</p>
</div>
</div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Maritalstatus"/}}&nbsp;{{include tmpl="#tpx_patient_Maritalstatus"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Business"/}}&nbsp;{{include tmpl="#tpx_patient_Business"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Patient_Language"/}}&nbsp;{{include tmpl="#tpx_patient_Patient_Language"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_PEmergencyContact"/}}&nbsp;{{include tmpl="#tpx_patient_PEmergencyContact"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_description"/}}&nbsp;{{include tmpl="#tpx_patient_description"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_WhatsApp"/}}&nbsp;{{include tmpl="#tpx_patient_WhatsApp"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_FacebookID"/}}&nbsp;{{include tmpl="#tpx_patient_FacebookID"/}}</span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#1F618D">
				<h3 class="card-title">Refered By.</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferedByDr"/}}&nbsp;{{include tmpl="#tpx_patient_ReferedByDr"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferClinicname"/}}&nbsp;{{include tmpl="#tpx_patient_ReferClinicname"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferCity"/}}&nbsp;{{include tmpl="#tpx_patient_ReferCity"/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferMobileNo"/}}&nbsp;{{include tmpl="#tpx_patient_ReferMobileNo"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferA4TreatingConsultant"/}}&nbsp;{{include tmpl="#tpx_patient_ReferA4TreatingConsultant"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_PurposreReferredfor"/}}&nbsp;{{include tmpl="#tpx_patient_PurposreReferredfor"/}}</span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#D68910">
				<h3 class="card-title">Where Did You Hear About This</h3>
			</div>
			<div class="card-body">
			{{include tmpl="#tpc_patient_WhereDidYouHear"/}}&nbsp;{{include tmpl="#tpx_patient_WhereDidYouHear"/}}
			</div>
		</div>
	</div>
</div>
</div>
</script>
<?php
	if (in_array("patient_address", explode(",", $patient->getCurrentDetailTable())) && $patient_address->DetailAdd) {
?>
<?php if ($patient->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_address", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_addressgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_email", explode(",", $patient->getCurrentDetailTable())) && $patient_email->DetailAdd) {
?>
<?php if ($patient->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_email", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_emailgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_telephone", explode(",", $patient->getCurrentDetailTable())) && $patient_telephone->DetailAdd) {
?>
<?php if ($patient->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_telephone", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_telephonegrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_emergency_contact", explode(",", $patient->getCurrentDetailTable())) && $patient_emergency_contact->DetailAdd) {
?>
<?php if ($patient->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_emergency_contact", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_emergency_contactgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_document", explode(",", $patient->getCurrentDetailTable())) && $patient_document->DetailAdd) {
?>
<?php if ($patient->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_document", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_documentgrid.php" ?>
<?php } ?>
<?php if (!$patient_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient->Rows) ?> };
ew.applyTemplate("tpd_patientadd", "tpm_patientadd", "patientadd", "<?php echo $patient->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patientadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
function handleError(error) {
  console.error('navigator.getUserMedia error: ', error);
}
const constraints = {video: true};
(function() {
  const video = document.querySelector('#basic video');
  const captureVideoButton = document.querySelector('#basic .capture-button');
  let localMediaStream;

  function handleSuccess(stream) {
	localMediaStream = stream;
	video.srcObject = stream;
  }

  //captureVideoButton.onclick = function() {
  //  navigator.mediaDevices.getUserMedia(constraints).
  //    then(handleSuccess).catch(handleError);
  //};
  //document.querySelector('#stop-button').onclick = function() {
  //  video.pause();
  //  localMediaStream.stop();
  //};

})();
(function() {
  const captureVideoButton =
	document.querySelector('#screenshot .capture-button');
  const screenshotButton = document.querySelector('#screenshot-button');
  const img = document.querySelector('#screenshot img');
  const video = document.querySelector('#screenshot video');
  const canvas = document.createElement('canvas');
  captureVideoButton.onclick = function() {
	navigator.mediaDevices.getUserMedia(constraints).
	  then(handleSuccess).catch(handleError);
  };
  screenshotButton.onclick = video.onclick = function() {
	canvas.width = video.videoWidth;
	canvas.height = video.videoHeight;
	canvas.getContext('2d').drawImage(video, 0, 0);

	// Other browsers will fall back to image/png
	//img.src = canvas.toDataURL('image/webp');

	img.src = canvas.toDataURL('image/png');
	document.getElementById("screenshotFF").value = img.src;
  };

  function handleSuccess(stream) {
	screenshotButton.disabled = false;
	video.srcObject = stream;
  }
})();
(function() {
  const captureVideoButton =
	document.querySelector('#cssfilters .capture-button');
  const cssFiltersButton = document.querySelector('#cssfilters-apply');
  const video = document.querySelector('#cssfilters video');
  let filterIndex = 0;
  const filters = [
	'grayscale',
	'sepia',
	'blur',
	'brightness',
	'contrast',
	'hue-rotate',
	'hue-rotate2',
	'hue-rotate3',
	'saturate',
	'invert',
	''
  ];
  captureVideoButton.onclick = function() {
	navigator.mediaDevices.getUserMedia(constraints).
	  then(handleSuccess).catch(handleError);
  };
  cssFiltersButton.onclick = video.onclick = function() {
	video.className = filters[filterIndex++ % filters.length];
  };

  function handleSuccess(stream) {
	video.srcObject = stream;
  }
	})();
</script>
<?php include_once "footer.php" ?>
<?php
$patient_add->terminate();
?>