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
$patient_addopt = new patient_addopt();

// Run the page
$patient_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var fpatientaddopt = currentForm = new ew.Form("fpatientaddopt", "addopt");

// Validate form
fpatientaddopt.validate = function() {
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
		<?php if ($patient_addopt->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->PatientID->caption(), $patient->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->title->Required) { ?>
			elm = this.getElements("x" + infix + "_title");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->title->caption(), $patient->title->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->first_name->Required) { ?>
			elm = this.getElements("x" + infix + "_first_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->first_name->caption(), $patient->first_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->middle_name->Required) { ?>
			elm = this.getElements("x" + infix + "_middle_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->middle_name->caption(), $patient->middle_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->last_name->Required) { ?>
			elm = this.getElements("x" + infix + "_last_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->last_name->caption(), $patient->last_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->gender->Required) { ?>
			elm = this.getElements("x" + infix + "_gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->gender->caption(), $patient->gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->dob->Required) { ?>
			elm = this.getElements("x" + infix + "_dob");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->dob->caption(), $patient->dob->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_dob");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient->dob->errorMessage()) ?>");
		<?php if ($patient_addopt->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Age->caption(), $patient->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->blood_group->Required) { ?>
			elm = this.getElements("x" + infix + "_blood_group");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->blood_group->caption(), $patient->blood_group->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->mobile_no->Required) { ?>
			elm = this.getElements("x" + infix + "_mobile_no");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->mobile_no->caption(), $patient->mobile_no->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->description->caption(), $patient->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->status->caption(), $patient->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->createdby->caption(), $patient->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->createddatetime->caption(), $patient->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->modifiedby->caption(), $patient->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->modifieddatetime->caption(), $patient->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->profilePic->Required) { ?>
			felm = this.getElements("x" + infix + "_profilePic");
			elm = this.getElements("fn_x" + infix + "_profilePic");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $patient->profilePic->caption(), $patient->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->IdentificationMark->Required) { ?>
			elm = this.getElements("x" + infix + "_IdentificationMark");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->IdentificationMark->caption(), $patient->IdentificationMark->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->Religion->Required) { ?>
			elm = this.getElements("x" + infix + "_Religion");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Religion->caption(), $patient->Religion->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->Nationality->Required) { ?>
			elm = this.getElements("x" + infix + "_Nationality");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Nationality->caption(), $patient->Nationality->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->ReferedByDr->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferedByDr");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->ReferedByDr->caption(), $patient->ReferedByDr->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->ReferClinicname->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferClinicname");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->ReferClinicname->caption(), $patient->ReferClinicname->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->ReferCity->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferCity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->ReferCity->caption(), $patient->ReferCity->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->ReferMobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferMobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->ReferMobileNo->caption(), $patient->ReferMobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->ReferA4TreatingConsultant->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferA4TreatingConsultant");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->ReferA4TreatingConsultant->caption(), $patient->ReferA4TreatingConsultant->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->PurposreReferredfor->Required) { ?>
			elm = this.getElements("x" + infix + "_PurposreReferredfor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->PurposreReferredfor->caption(), $patient->PurposreReferredfor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->spouse_title->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_title");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_title->caption(), $patient->spouse_title->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->spouse_first_name->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_first_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_first_name->caption(), $patient->spouse_first_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->spouse_middle_name->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_middle_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_middle_name->caption(), $patient->spouse_middle_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->spouse_last_name->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_last_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_last_name->caption(), $patient->spouse_last_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->spouse_gender->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_gender->caption(), $patient->spouse_gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->spouse_dob->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_dob");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_dob->caption(), $patient->spouse_dob->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->spouse_Age->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_Age->caption(), $patient->spouse_Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->spouse_blood_group->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_blood_group");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_blood_group->caption(), $patient->spouse_blood_group->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->spouse_mobile_no->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_mobile_no");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_mobile_no->caption(), $patient->spouse_mobile_no->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->Maritalstatus->Required) { ?>
			elm = this.getElements("x" + infix + "_Maritalstatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Maritalstatus->caption(), $patient->Maritalstatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->Business->Required) { ?>
			elm = this.getElements("x" + infix + "_Business");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Business->caption(), $patient->Business->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->Patient_Language->Required) { ?>
			elm = this.getElements("x" + infix + "_Patient_Language");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Patient_Language->caption(), $patient->Patient_Language->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->Passport->Required) { ?>
			elm = this.getElements("x" + infix + "_Passport");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Passport->caption(), $patient->Passport->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->VisaNo->Required) { ?>
			elm = this.getElements("x" + infix + "_VisaNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->VisaNo->caption(), $patient->VisaNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->ValidityOfVisa->Required) { ?>
			elm = this.getElements("x" + infix + "_ValidityOfVisa");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->ValidityOfVisa->caption(), $patient->ValidityOfVisa->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->WhereDidYouHear->Required) { ?>
			elm = this.getElements("x" + infix + "_WhereDidYouHear[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->WhereDidYouHear->caption(), $patient->WhereDidYouHear->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->HospID->caption(), $patient->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->street->Required) { ?>
			elm = this.getElements("x" + infix + "_street");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->street->caption(), $patient->street->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->town->Required) { ?>
			elm = this.getElements("x" + infix + "_town");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->town->caption(), $patient->town->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->province->Required) { ?>
			elm = this.getElements("x" + infix + "_province");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->province->caption(), $patient->province->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->country->Required) { ?>
			elm = this.getElements("x" + infix + "_country");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->country->caption(), $patient->country->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->postal_code->Required) { ?>
			elm = this.getElements("x" + infix + "_postal_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->postal_code->caption(), $patient->postal_code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->PEmail->Required) { ?>
			elm = this.getElements("x" + infix + "_PEmail");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->PEmail->caption(), $patient->PEmail->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->PEmergencyContact->Required) { ?>
			elm = this.getElements("x" + infix + "_PEmergencyContact");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->PEmergencyContact->caption(), $patient->PEmergencyContact->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->occupation->Required) { ?>
			elm = this.getElements("x" + infix + "_occupation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->occupation->caption(), $patient->occupation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->spouse_occupation->Required) { ?>
			elm = this.getElements("x" + infix + "_spouse_occupation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->spouse_occupation->caption(), $patient->spouse_occupation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->WhatsApp->Required) { ?>
			elm = this.getElements("x" + infix + "_WhatsApp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->WhatsApp->caption(), $patient->WhatsApp->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->CouppleID->Required) { ?>
			elm = this.getElements("x" + infix + "_CouppleID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->CouppleID->caption(), $patient->CouppleID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CouppleID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient->CouppleID->errorMessage()) ?>");
		<?php if ($patient_addopt->MaleID->Required) { ?>
			elm = this.getElements("x" + infix + "_MaleID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->MaleID->caption(), $patient->MaleID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MaleID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient->MaleID->errorMessage()) ?>");
		<?php if ($patient_addopt->FemaleID->Required) { ?>
			elm = this.getElements("x" + infix + "_FemaleID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->FemaleID->caption(), $patient->FemaleID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FemaleID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient->FemaleID->errorMessage()) ?>");
		<?php if ($patient_addopt->GroupID->Required) { ?>
			elm = this.getElements("x" + infix + "_GroupID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->GroupID->caption(), $patient->GroupID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GroupID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient->GroupID->errorMessage()) ?>");
		<?php if ($patient_addopt->Relationship->Required) { ?>
			elm = this.getElements("x" + infix + "_Relationship");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Relationship->caption(), $patient->Relationship->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->AppointmentSearch->Required) { ?>
			elm = this.getElements("x" + infix + "_AppointmentSearch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->AppointmentSearch->caption(), $patient->AppointmentSearch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->FacebookID->Required) { ?>
			elm = this.getElements("x" + infix + "_FacebookID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->FacebookID->caption(), $patient->FacebookID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->profilePicImage->Required) { ?>
			felm = this.getElements("x" + infix + "_profilePicImage");
			elm = this.getElements("fn_x" + infix + "_profilePicImage");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $patient->profilePicImage->caption(), $patient->profilePicImage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_addopt->Clients->Required) { ?>
			elm = this.getElements("x" + infix + "_Clients");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient->Clients->caption(), $patient->Clients->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fpatientaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatientaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatientaddopt.lists["x_title"] = <?php echo $patient_addopt->title->Lookup->toClientList() ?>;
fpatientaddopt.lists["x_title"].options = <?php echo JsonEncode($patient_addopt->title->lookupOptions()) ?>;
fpatientaddopt.lists["x_gender"] = <?php echo $patient_addopt->gender->Lookup->toClientList() ?>;
fpatientaddopt.lists["x_gender"].options = <?php echo JsonEncode($patient_addopt->gender->lookupOptions()) ?>;
fpatientaddopt.lists["x_blood_group"] = <?php echo $patient_addopt->blood_group->Lookup->toClientList() ?>;
fpatientaddopt.lists["x_blood_group"].options = <?php echo JsonEncode($patient_addopt->blood_group->lookupOptions()) ?>;
fpatientaddopt.lists["x_status"] = <?php echo $patient_addopt->status->Lookup->toClientList() ?>;
fpatientaddopt.lists["x_status"].options = <?php echo JsonEncode($patient_addopt->status->lookupOptions()) ?>;
fpatientaddopt.lists["x_ReferedByDr"] = <?php echo $patient_addopt->ReferedByDr->Lookup->toClientList() ?>;
fpatientaddopt.lists["x_ReferedByDr"].options = <?php echo JsonEncode($patient_addopt->ReferedByDr->lookupOptions()) ?>;
fpatientaddopt.lists["x_ReferA4TreatingConsultant"] = <?php echo $patient_addopt->ReferA4TreatingConsultant->Lookup->toClientList() ?>;
fpatientaddopt.lists["x_ReferA4TreatingConsultant"].options = <?php echo JsonEncode($patient_addopt->ReferA4TreatingConsultant->lookupOptions()) ?>;
fpatientaddopt.lists["x_spouse_title"] = <?php echo $patient_addopt->spouse_title->Lookup->toClientList() ?>;
fpatientaddopt.lists["x_spouse_title"].options = <?php echo JsonEncode($patient_addopt->spouse_title->lookupOptions()) ?>;
fpatientaddopt.lists["x_spouse_gender"] = <?php echo $patient_addopt->spouse_gender->Lookup->toClientList() ?>;
fpatientaddopt.lists["x_spouse_gender"].options = <?php echo JsonEncode($patient_addopt->spouse_gender->lookupOptions()) ?>;
fpatientaddopt.lists["x_spouse_blood_group"] = <?php echo $patient_addopt->spouse_blood_group->Lookup->toClientList() ?>;
fpatientaddopt.lists["x_spouse_blood_group"].options = <?php echo JsonEncode($patient_addopt->spouse_blood_group->lookupOptions()) ?>;
fpatientaddopt.lists["x_Maritalstatus"] = <?php echo $patient_addopt->Maritalstatus->Lookup->toClientList() ?>;
fpatientaddopt.lists["x_Maritalstatus"].options = <?php echo JsonEncode($patient_addopt->Maritalstatus->lookupOptions()) ?>;
fpatientaddopt.lists["x_Business"] = <?php echo $patient_addopt->Business->Lookup->toClientList() ?>;
fpatientaddopt.lists["x_Business"].options = <?php echo JsonEncode($patient_addopt->Business->lookupOptions()) ?>;
fpatientaddopt.autoSuggests["x_Business"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatientaddopt.lists["x_Patient_Language"] = <?php echo $patient_addopt->Patient_Language->Lookup->toClientList() ?>;
fpatientaddopt.lists["x_Patient_Language"].options = <?php echo JsonEncode($patient_addopt->Patient_Language->lookupOptions()) ?>;
fpatientaddopt.lists["x_WhereDidYouHear[]"] = <?php echo $patient_addopt->WhereDidYouHear->Lookup->toClientList() ?>;
fpatientaddopt.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($patient_addopt->WhereDidYouHear->lookupOptions()) ?>;
fpatientaddopt.lists["x_HospID"] = <?php echo $patient_addopt->HospID->Lookup->toClientList() ?>;
fpatientaddopt.lists["x_HospID"].options = <?php echo JsonEncode($patient_addopt->HospID->lookupOptions()) ?>;
fpatientaddopt.lists["x_AppointmentSearch"] = <?php echo $patient_addopt->AppointmentSearch->Lookup->toClientList() ?>;
fpatientaddopt.lists["x_AppointmentSearch"].options = <?php echo JsonEncode($patient_addopt->AppointmentSearch->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_addopt->showPageHeader(); ?>
<?php
$patient_addopt->showMessage();
?>
<form name="fpatientaddopt" id="fpatientaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($patient_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $patient_addopt->TableVar ?>">
<?php if ($patient->PatientID->Visible) { // PatientID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PatientID"><?php echo $patient->PatientID->caption() ?><?php echo ($patient->PatientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient->PatientID->EditValue ?>"<?php echo $patient->PatientID->editAttributes() ?>>
<?php echo $patient->PatientID->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->title->Visible) { // title ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_title"><?php echo $patient->title->caption() ?><?php echo ($patient->title->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_title" data-value-separator="<?php echo $patient->title->displayValueSeparatorAttribute() ?>" id="x_title" name="x_title"<?php echo $patient->title->editAttributes() ?>>
		<?php echo $patient->title->selectOptionListHtml("x_title") ?>
	</select>
</div>
<?php echo $patient->title->Lookup->getParamTag("p_x_title") ?>
<?php echo $patient->title->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->first_name->Visible) { // first_name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_first_name"><?php echo $patient->first_name->caption() ?><?php echo ($patient->first_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->first_name->getPlaceHolder()) ?>" value="<?php echo $patient->first_name->EditValue ?>"<?php echo $patient->first_name->editAttributes() ?>>
<?php echo $patient->first_name->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->middle_name->Visible) { // middle_name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_middle_name"><?php echo $patient->middle_name->caption() ?><?php echo ($patient->middle_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_middle_name" name="x_middle_name" id="x_middle_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient->middle_name->getPlaceHolder()) ?>" value="<?php echo $patient->middle_name->EditValue ?>"<?php echo $patient->middle_name->editAttributes() ?>>
<?php echo $patient->middle_name->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->last_name->Visible) { // last_name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_last_name"><?php echo $patient->last_name->caption() ?><?php echo ($patient->last_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->last_name->getPlaceHolder()) ?>" value="<?php echo $patient->last_name->EditValue ?>"<?php echo $patient->last_name->editAttributes() ?>>
<?php echo $patient->last_name->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->gender->Visible) { // gender ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_gender"><?php echo $patient->gender->caption() ?><?php echo ($patient->gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_gender" data-value-separator="<?php echo $patient->gender->displayValueSeparatorAttribute() ?>" id="x_gender" name="x_gender"<?php echo $patient->gender->editAttributes() ?>>
		<?php echo $patient->gender->selectOptionListHtml("x_gender") ?>
	</select>
</div>
<?php echo $patient->gender->Lookup->getParamTag("p_x_gender") ?>
<?php echo $patient->gender->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->dob->Visible) { // dob ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_dob"><?php echo $patient->dob->caption() ?><?php echo ($patient->dob->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_dob" data-format="7" name="x_dob" id="x_dob" placeholder="<?php echo HtmlEncode($patient->dob->getPlaceHolder()) ?>" value="<?php echo $patient->dob->EditValue ?>"<?php echo $patient->dob->editAttributes() ?>>
<?php if (!$patient->dob->ReadOnly && !$patient->dob->Disabled && !isset($patient->dob->EditAttrs["readonly"]) && !isset($patient->dob->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatientaddopt", "x_dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
<?php echo $patient->dob->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->Age->Visible) { // Age ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Age"><?php echo $patient->Age->caption() ?><?php echo ($patient->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->Age->getPlaceHolder()) ?>" value="<?php echo $patient->Age->EditValue ?>"<?php echo $patient->Age->editAttributes() ?>>
<?php echo $patient->Age->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->blood_group->Visible) { // blood_group ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_blood_group"><?php echo $patient->blood_group->caption() ?><?php echo ($patient->blood_group->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_blood_group" data-value-separator="<?php echo $patient->blood_group->displayValueSeparatorAttribute() ?>" id="x_blood_group" name="x_blood_group"<?php echo $patient->blood_group->editAttributes() ?>>
		<?php echo $patient->blood_group->selectOptionListHtml("x_blood_group") ?>
	</select>
</div>
<?php echo $patient->blood_group->Lookup->getParamTag("p_x_blood_group") ?>
<?php echo $patient->blood_group->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->mobile_no->Visible) { // mobile_no ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_mobile_no"><?php echo $patient->mobile_no->caption() ?><?php echo ($patient->mobile_no->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient->mobile_no->EditValue ?>"<?php echo $patient->mobile_no->editAttributes() ?>>
<?php echo $patient->mobile_no->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->description->Visible) { // description ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_description"><?php echo $patient->description->caption() ?><?php echo ($patient->description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_description" name="x_description" id="x_description" placeholder="<?php echo HtmlEncode($patient->description->getPlaceHolder()) ?>" value="<?php echo $patient->description->EditValue ?>"<?php echo $patient->description->editAttributes() ?>>
<?php echo $patient->description->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->status->Visible) { // status ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_status"><?php echo $patient->status->caption() ?><?php echo ($patient->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_status" data-value-separator="<?php echo $patient->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient->status->editAttributes() ?>>
		<?php echo $patient->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $patient->status->Lookup->getParamTag("p_x_status") ?>
<?php echo $patient->status->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->createdby->Visible) { // createdby ?>
	<input type="hidden" data-table="patient" data-field="x_createdby" name="x_createdby" id="x_createdby" value="<?php echo HtmlEncode($patient->createdby->CurrentValue) ?>">
<?php } ?>
<?php if ($patient->createddatetime->Visible) { // createddatetime ?>
	<input type="hidden" data-table="patient" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" value="<?php echo HtmlEncode($patient->createddatetime->CurrentValue) ?>">
	<?php if (!$patient->createddatetime->ReadOnly && !$patient->createddatetime->Disabled && !isset($patient->createddatetime->EditAttrs["readonly"]) && !isset($patient->createddatetime->EditAttrs["disabled"])) { ?>
	<script>
	ew.createDateTimePicker("fpatientaddopt", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
	</script>
	<?php } ?>
<?php } ?>
<?php if ($patient->modifiedby->Visible) { // modifiedby ?>
	<input type="hidden" data-table="patient" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" value="<?php echo HtmlEncode($patient->modifiedby->CurrentValue) ?>">
<?php } ?>
<?php if ($patient->modifieddatetime->Visible) { // modifieddatetime ?>
	<input type="hidden" data-table="patient" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" value="<?php echo HtmlEncode($patient->modifieddatetime->CurrentValue) ?>">
	<?php if (!$patient->modifieddatetime->ReadOnly && !$patient->modifieddatetime->Disabled && !isset($patient->modifieddatetime->EditAttrs["readonly"]) && !isset($patient->modifieddatetime->EditAttrs["disabled"])) { ?>
	<script>
	ew.createDateTimePicker("fpatientaddopt", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
	</script>
	<?php } ?>
<?php } ?>
<?php if ($patient->profilePic->Visible) { // profilePic ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $patient->profilePic->caption() ?><?php echo ($patient->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
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
<?php echo $patient->profilePic->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->IdentificationMark->Visible) { // IdentificationMark ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_IdentificationMark"><?php echo $patient->IdentificationMark->caption() ?><?php echo ($patient->IdentificationMark->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $patient->IdentificationMark->EditValue ?>"<?php echo $patient->IdentificationMark->editAttributes() ?>>
<?php echo $patient->IdentificationMark->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->Religion->Visible) { // Religion ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Religion"><?php echo $patient->Religion->caption() ?><?php echo ($patient->Religion->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_Religion" name="x_Religion" id="x_Religion" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->Religion->getPlaceHolder()) ?>" value="<?php echo $patient->Religion->EditValue ?>"<?php echo $patient->Religion->editAttributes() ?>>
<?php echo $patient->Religion->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->Nationality->Visible) { // Nationality ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Nationality"><?php echo $patient->Nationality->caption() ?><?php echo ($patient->Nationality->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_Nationality" name="x_Nationality" id="x_Nationality" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->Nationality->getPlaceHolder()) ?>" value="<?php echo $patient->Nationality->EditValue ?>"<?php echo $patient->Nationality->editAttributes() ?>>
<?php echo $patient->Nationality->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->ReferedByDr->Visible) { // ReferedByDr ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ReferedByDr"><?php echo $patient->ReferedByDr->caption() ?><?php echo ($patient->ReferedByDr->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php $patient->ReferedByDr->EditAttrs["onchange"] = "ew.autoFill(this);" . @$patient->ReferedByDr->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferedByDr"><?php echo strval($patient->ReferedByDr->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient->ReferedByDr->ViewValue) : $patient->ReferedByDr->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient->ReferedByDr->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient->ReferedByDr->ReadOnly || $patient->ReferedByDr->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferedByDr',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient->ReferedByDr->Lookup->getParamTag("p_x_ReferedByDr") ?>
<input type="hidden" data-table="patient" data-field="x_ReferedByDr" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient->ReferedByDr->displayValueSeparatorAttribute() ?>" name="x_ReferedByDr" id="x_ReferedByDr" value="<?php echo $patient->ReferedByDr->CurrentValue ?>"<?php echo $patient->ReferedByDr->editAttributes() ?>>
<?php echo $patient->ReferedByDr->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->ReferClinicname->Visible) { // ReferClinicname ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ReferClinicname"><?php echo $patient->ReferClinicname->caption() ?><?php echo ($patient->ReferClinicname->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $patient->ReferClinicname->EditValue ?>"<?php echo $patient->ReferClinicname->editAttributes() ?>>
<?php echo $patient->ReferClinicname->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->ReferCity->Visible) { // ReferCity ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ReferCity"><?php echo $patient->ReferCity->caption() ?><?php echo ($patient->ReferCity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->ReferCity->getPlaceHolder()) ?>" value="<?php echo $patient->ReferCity->EditValue ?>"<?php echo $patient->ReferCity->editAttributes() ?>>
<?php echo $patient->ReferCity->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ReferMobileNo"><?php echo $patient->ReferMobileNo->caption() ?><?php echo ($patient->ReferMobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $patient->ReferMobileNo->EditValue ?>"<?php echo $patient->ReferMobileNo->editAttributes() ?>>
<?php echo $patient->ReferMobileNo->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ReferA4TreatingConsultant"><?php echo $patient->ReferA4TreatingConsultant->caption() ?><?php echo ($patient->ReferA4TreatingConsultant->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferA4TreatingConsultant"><?php echo strval($patient->ReferA4TreatingConsultant->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient->ReferA4TreatingConsultant->ViewValue) : $patient->ReferA4TreatingConsultant->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient->ReferA4TreatingConsultant->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient->ReferA4TreatingConsultant->ReadOnly || $patient->ReferA4TreatingConsultant->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferA4TreatingConsultant',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient->ReferA4TreatingConsultant->Lookup->getParamTag("p_x_ReferA4TreatingConsultant") ?>
<input type="hidden" data-table="patient" data-field="x_ReferA4TreatingConsultant" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient->ReferA4TreatingConsultant->displayValueSeparatorAttribute() ?>" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" value="<?php echo $patient->ReferA4TreatingConsultant->CurrentValue ?>"<?php echo $patient->ReferA4TreatingConsultant->editAttributes() ?>>
<?php echo $patient->ReferA4TreatingConsultant->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PurposreReferredfor"><?php echo $patient->PurposreReferredfor->caption() ?><?php echo ($patient->PurposreReferredfor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->PurposreReferredfor->getPlaceHolder()) ?>" value="<?php echo $patient->PurposreReferredfor->EditValue ?>"<?php echo $patient->PurposreReferredfor->editAttributes() ?>>
<?php echo $patient->PurposreReferredfor->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_title->Visible) { // spouse_title ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_title"><?php echo $patient->spouse_title->caption() ?><?php echo ($patient->spouse_title->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_title" data-value-separator="<?php echo $patient->spouse_title->displayValueSeparatorAttribute() ?>" id="x_spouse_title" name="x_spouse_title"<?php echo $patient->spouse_title->editAttributes() ?>>
		<?php echo $patient->spouse_title->selectOptionListHtml("x_spouse_title") ?>
	</select>
</div>
<?php echo $patient->spouse_title->Lookup->getParamTag("p_x_spouse_title") ?>
<?php echo $patient->spouse_title->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_first_name->Visible) { // spouse_first_name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_first_name"><?php echo $patient->spouse_first_name->caption() ?><?php echo ($patient->spouse_first_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_spouse_first_name" name="x_spouse_first_name" id="x_spouse_first_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->spouse_first_name->getPlaceHolder()) ?>" value="<?php echo $patient->spouse_first_name->EditValue ?>"<?php echo $patient->spouse_first_name->editAttributes() ?>>
<?php echo $patient->spouse_first_name->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_middle_name"><?php echo $patient->spouse_middle_name->caption() ?><?php echo ($patient->spouse_middle_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_spouse_middle_name" name="x_spouse_middle_name" id="x_spouse_middle_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->spouse_middle_name->getPlaceHolder()) ?>" value="<?php echo $patient->spouse_middle_name->EditValue ?>"<?php echo $patient->spouse_middle_name->editAttributes() ?>>
<?php echo $patient->spouse_middle_name->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_last_name->Visible) { // spouse_last_name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_last_name"><?php echo $patient->spouse_last_name->caption() ?><?php echo ($patient->spouse_last_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_spouse_last_name" name="x_spouse_last_name" id="x_spouse_last_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->spouse_last_name->getPlaceHolder()) ?>" value="<?php echo $patient->spouse_last_name->EditValue ?>"<?php echo $patient->spouse_last_name->editAttributes() ?>>
<?php echo $patient->spouse_last_name->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_gender->Visible) { // spouse_gender ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_gender"><?php echo $patient->spouse_gender->caption() ?><?php echo ($patient->spouse_gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_gender" data-value-separator="<?php echo $patient->spouse_gender->displayValueSeparatorAttribute() ?>" id="x_spouse_gender" name="x_spouse_gender"<?php echo $patient->spouse_gender->editAttributes() ?>>
		<?php echo $patient->spouse_gender->selectOptionListHtml("x_spouse_gender") ?>
	</select>
</div>
<?php echo $patient->spouse_gender->Lookup->getParamTag("p_x_spouse_gender") ?>
<?php echo $patient->spouse_gender->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_dob->Visible) { // spouse_dob ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_dob"><?php echo $patient->spouse_dob->caption() ?><?php echo ($patient->spouse_dob->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_spouse_dob" data-format="7" name="x_spouse_dob" id="x_spouse_dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->spouse_dob->getPlaceHolder()) ?>" value="<?php echo $patient->spouse_dob->EditValue ?>"<?php echo $patient->spouse_dob->editAttributes() ?>>
<?php if (!$patient->spouse_dob->ReadOnly && !$patient->spouse_dob->Disabled && !isset($patient->spouse_dob->EditAttrs["readonly"]) && !isset($patient->spouse_dob->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatientaddopt", "x_spouse_dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
<?php echo $patient->spouse_dob->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_Age->Visible) { // spouse_Age ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_Age"><?php echo $patient->spouse_Age->caption() ?><?php echo ($patient->spouse_Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_spouse_Age" name="x_spouse_Age" id="x_spouse_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->spouse_Age->getPlaceHolder()) ?>" value="<?php echo $patient->spouse_Age->EditValue ?>"<?php echo $patient->spouse_Age->editAttributes() ?>>
<?php echo $patient->spouse_Age->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_blood_group"><?php echo $patient->spouse_blood_group->caption() ?><?php echo ($patient->spouse_blood_group->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_blood_group" data-value-separator="<?php echo $patient->spouse_blood_group->displayValueSeparatorAttribute() ?>" id="x_spouse_blood_group" name="x_spouse_blood_group"<?php echo $patient->spouse_blood_group->editAttributes() ?>>
		<?php echo $patient->spouse_blood_group->selectOptionListHtml("x_spouse_blood_group") ?>
	</select>
</div>
<?php echo $patient->spouse_blood_group->Lookup->getParamTag("p_x_spouse_blood_group") ?>
<?php echo $patient->spouse_blood_group->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_mobile_no"><?php echo $patient->spouse_mobile_no->caption() ?><?php echo ($patient->spouse_mobile_no->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_spouse_mobile_no" name="x_spouse_mobile_no" id="x_spouse_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->spouse_mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient->spouse_mobile_no->EditValue ?>"<?php echo $patient->spouse_mobile_no->editAttributes() ?>>
<?php echo $patient->spouse_mobile_no->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->Maritalstatus->Visible) { // Maritalstatus ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Maritalstatus"><?php echo $patient->Maritalstatus->caption() ?><?php echo ($patient->Maritalstatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_Maritalstatus" data-value-separator="<?php echo $patient->Maritalstatus->displayValueSeparatorAttribute() ?>" id="x_Maritalstatus" name="x_Maritalstatus"<?php echo $patient->Maritalstatus->editAttributes() ?>>
		<?php echo $patient->Maritalstatus->selectOptionListHtml("x_Maritalstatus") ?>
	</select>
</div>
<?php echo $patient->Maritalstatus->Lookup->getParamTag("p_x_Maritalstatus") ?>
<?php echo $patient->Maritalstatus->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->Business->Visible) { // Business ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $patient->Business->caption() ?><?php echo ($patient->Business->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php
$wrkonchange = "" . trim(@$patient->Business->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient->Business->EditAttrs["onchange"] = "";
?>
<span id="as_x_Business" class="text-nowrap" style="z-index: 8620">
	<input type="text" class="form-control" name="sv_x_Business" id="sv_x_Business" value="<?php echo RemoveHtml($patient->Business->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->Business->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient->Business->getPlaceHolder()) ?>"<?php echo $patient->Business->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient" data-field="x_Business" data-value-separator="<?php echo $patient->Business->displayValueSeparatorAttribute() ?>" name="x_Business" id="x_Business" value="<?php echo HtmlEncode($patient->Business->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatientaddopt.createAutoSuggest({"id":"x_Business","forceSelect":false});
</script>
<?php echo $patient->Business->Lookup->getParamTag("p_x_Business") ?>
<?php echo $patient->Business->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->Patient_Language->Visible) { // Patient_Language ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Patient_Language"><?php echo $patient->Patient_Language->caption() ?><?php echo ($patient->Patient_Language->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_Patient_Language" data-value-separator="<?php echo $patient->Patient_Language->displayValueSeparatorAttribute() ?>" id="x_Patient_Language" name="x_Patient_Language"<?php echo $patient->Patient_Language->editAttributes() ?>>
		<?php echo $patient->Patient_Language->selectOptionListHtml("x_Patient_Language") ?>
	</select>
</div>
<?php echo $patient->Patient_Language->Lookup->getParamTag("p_x_Patient_Language") ?>
<?php echo $patient->Patient_Language->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->Passport->Visible) { // Passport ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Passport"><?php echo $patient->Passport->caption() ?><?php echo ($patient->Passport->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_Passport" name="x_Passport" id="x_Passport" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->Passport->getPlaceHolder()) ?>" value="<?php echo $patient->Passport->EditValue ?>"<?php echo $patient->Passport->editAttributes() ?>>
<?php echo $patient->Passport->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->VisaNo->Visible) { // VisaNo ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_VisaNo"><?php echo $patient->VisaNo->caption() ?><?php echo ($patient->VisaNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_VisaNo" name="x_VisaNo" id="x_VisaNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->VisaNo->getPlaceHolder()) ?>" value="<?php echo $patient->VisaNo->EditValue ?>"<?php echo $patient->VisaNo->editAttributes() ?>>
<?php echo $patient->VisaNo->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ValidityOfVisa"><?php echo $patient->ValidityOfVisa->caption() ?><?php echo ($patient->ValidityOfVisa->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_ValidityOfVisa" name="x_ValidityOfVisa" id="x_ValidityOfVisa" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->ValidityOfVisa->getPlaceHolder()) ?>" value="<?php echo $patient->ValidityOfVisa->EditValue ?>"<?php echo $patient->ValidityOfVisa->editAttributes() ?>>
<?php echo $patient->ValidityOfVisa->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $patient->WhereDidYouHear->caption() ?><?php echo ($patient->WhereDidYouHear->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div id="tp_x_WhereDidYouHear" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $patient->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x_WhereDidYouHear[]" id="x_WhereDidYouHear[]" value="{value}"<?php echo $patient->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient->WhereDidYouHear->checkBoxListHtml(FALSE, "x_WhereDidYouHear[]") ?>
</div></div>
<?php echo $patient->WhereDidYouHear->Lookup->getParamTag("p_x_WhereDidYouHear") ?>
<?php echo $patient->WhereDidYouHear->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->HospID->Visible) { // HospID ?>
	<input type="hidden" data-table="patient" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($patient->HospID->CurrentValue) ?>">
<?php } ?>
<?php if ($patient->street->Visible) { // street ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_street"><?php echo $patient->street->caption() ?><?php echo ($patient->street->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient->street->getPlaceHolder()) ?>" value="<?php echo $patient->street->EditValue ?>"<?php echo $patient->street->editAttributes() ?>>
<?php echo $patient->street->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->town->Visible) { // town ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_town"><?php echo $patient->town->caption() ?><?php echo ($patient->town->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->town->getPlaceHolder()) ?>" value="<?php echo $patient->town->EditValue ?>"<?php echo $patient->town->editAttributes() ?>>
<?php echo $patient->town->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->province->Visible) { // province ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_province"><?php echo $patient->province->caption() ?><?php echo ($patient->province->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->province->getPlaceHolder()) ?>" value="<?php echo $patient->province->EditValue ?>"<?php echo $patient->province->editAttributes() ?>>
<?php echo $patient->province->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->country->Visible) { // country ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_country"><?php echo $patient->country->caption() ?><?php echo ($patient->country->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_country" name="x_country" id="x_country" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->country->getPlaceHolder()) ?>" value="<?php echo $patient->country->EditValue ?>"<?php echo $patient->country->editAttributes() ?>>
<?php echo $patient->country->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->postal_code->Visible) { // postal_code ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_postal_code"><?php echo $patient->postal_code->caption() ?><?php echo ($patient->postal_code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->postal_code->getPlaceHolder()) ?>" value="<?php echo $patient->postal_code->EditValue ?>"<?php echo $patient->postal_code->editAttributes() ?>>
<?php echo $patient->postal_code->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->PEmail->Visible) { // PEmail ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PEmail"><?php echo $patient->PEmail->caption() ?><?php echo ($patient->PEmail->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_PEmail" name="x_PEmail" id="x_PEmail" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->PEmail->getPlaceHolder()) ?>" value="<?php echo $patient->PEmail->EditValue ?>"<?php echo $patient->PEmail->editAttributes() ?>>
<?php echo $patient->PEmail->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PEmergencyContact"><?php echo $patient->PEmergencyContact->caption() ?><?php echo ($patient->PEmergencyContact->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_PEmergencyContact" name="x_PEmergencyContact" id="x_PEmergencyContact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient->PEmergencyContact->getPlaceHolder()) ?>" value="<?php echo $patient->PEmergencyContact->EditValue ?>"<?php echo $patient->PEmergencyContact->editAttributes() ?>>
<?php echo $patient->PEmergencyContact->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->occupation->Visible) { // occupation ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_occupation"><?php echo $patient->occupation->caption() ?><?php echo ($patient->occupation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_occupation" name="x_occupation" id="x_occupation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->occupation->getPlaceHolder()) ?>" value="<?php echo $patient->occupation->EditValue ?>"<?php echo $patient->occupation->editAttributes() ?>>
<?php echo $patient->occupation->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->spouse_occupation->Visible) { // spouse_occupation ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_occupation"><?php echo $patient->spouse_occupation->caption() ?><?php echo ($patient->spouse_occupation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_spouse_occupation" name="x_spouse_occupation" id="x_spouse_occupation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->spouse_occupation->getPlaceHolder()) ?>" value="<?php echo $patient->spouse_occupation->EditValue ?>"<?php echo $patient->spouse_occupation->editAttributes() ?>>
<?php echo $patient->spouse_occupation->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->WhatsApp->Visible) { // WhatsApp ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_WhatsApp"><?php echo $patient->WhatsApp->caption() ?><?php echo ($patient->WhatsApp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_WhatsApp" name="x_WhatsApp" id="x_WhatsApp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->WhatsApp->getPlaceHolder()) ?>" value="<?php echo $patient->WhatsApp->EditValue ?>"<?php echo $patient->WhatsApp->editAttributes() ?>>
<?php echo $patient->WhatsApp->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->CouppleID->Visible) { // CouppleID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CouppleID"><?php echo $patient->CouppleID->caption() ?><?php echo ($patient->CouppleID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_CouppleID" name="x_CouppleID" id="x_CouppleID" size="30" placeholder="<?php echo HtmlEncode($patient->CouppleID->getPlaceHolder()) ?>" value="<?php echo $patient->CouppleID->EditValue ?>"<?php echo $patient->CouppleID->editAttributes() ?>>
<?php echo $patient->CouppleID->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->MaleID->Visible) { // MaleID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_MaleID"><?php echo $patient->MaleID->caption() ?><?php echo ($patient->MaleID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_MaleID" name="x_MaleID" id="x_MaleID" size="30" placeholder="<?php echo HtmlEncode($patient->MaleID->getPlaceHolder()) ?>" value="<?php echo $patient->MaleID->EditValue ?>"<?php echo $patient->MaleID->editAttributes() ?>>
<?php echo $patient->MaleID->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->FemaleID->Visible) { // FemaleID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_FemaleID"><?php echo $patient->FemaleID->caption() ?><?php echo ($patient->FemaleID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_FemaleID" name="x_FemaleID" id="x_FemaleID" size="30" placeholder="<?php echo HtmlEncode($patient->FemaleID->getPlaceHolder()) ?>" value="<?php echo $patient->FemaleID->EditValue ?>"<?php echo $patient->FemaleID->editAttributes() ?>>
<?php echo $patient->FemaleID->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->GroupID->Visible) { // GroupID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_GroupID"><?php echo $patient->GroupID->caption() ?><?php echo ($patient->GroupID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_GroupID" name="x_GroupID" id="x_GroupID" size="30" placeholder="<?php echo HtmlEncode($patient->GroupID->getPlaceHolder()) ?>" value="<?php echo $patient->GroupID->EditValue ?>"<?php echo $patient->GroupID->editAttributes() ?>>
<?php echo $patient->GroupID->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->Relationship->Visible) { // Relationship ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Relationship"><?php echo $patient->Relationship->caption() ?><?php echo ($patient->Relationship->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_Relationship" name="x_Relationship" id="x_Relationship" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->Relationship->getPlaceHolder()) ?>" value="<?php echo $patient->Relationship->EditValue ?>"<?php echo $patient->Relationship->editAttributes() ?>>
<?php echo $patient->Relationship->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->AppointmentSearch->Visible) { // AppointmentSearch ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_AppointmentSearch"><?php echo $patient->AppointmentSearch->caption() ?><?php echo ($patient->AppointmentSearch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php $patient->AppointmentSearch->EditAttrs["onchange"] = "ew.autoFill(this);" . @$patient->AppointmentSearch->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AppointmentSearch"><?php echo strval($patient->AppointmentSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient->AppointmentSearch->ViewValue) : $patient->AppointmentSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient->AppointmentSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient->AppointmentSearch->ReadOnly || $patient->AppointmentSearch->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_AppointmentSearch',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient->AppointmentSearch->Lookup->getParamTag("p_x_AppointmentSearch") ?>
<input type="hidden" data-table="patient" data-field="x_AppointmentSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient->AppointmentSearch->displayValueSeparatorAttribute() ?>" name="x_AppointmentSearch" id="x_AppointmentSearch" value="<?php echo $patient->AppointmentSearch->CurrentValue ?>"<?php echo $patient->AppointmentSearch->editAttributes() ?>>
<?php echo $patient->AppointmentSearch->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->FacebookID->Visible) { // FacebookID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_FacebookID"><?php echo $patient->FacebookID->caption() ?><?php echo ($patient->FacebookID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_FacebookID" name="x_FacebookID" id="x_FacebookID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->FacebookID->getPlaceHolder()) ?>" value="<?php echo $patient->FacebookID->EditValue ?>"<?php echo $patient->FacebookID->editAttributes() ?>>
<?php echo $patient->FacebookID->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->profilePicImage->Visible) { // profilePicImage ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $patient->profilePicImage->caption() ?><?php echo ($patient->profilePicImage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
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
<?php echo $patient->profilePicImage->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($patient->Clients->Visible) { // Clients ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Clients"><?php echo $patient->Clients->caption() ?><?php echo ($patient->Clients->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_Clients" name="x_Clients" id="x_Clients" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient->Clients->getPlaceHolder()) ?>" value="<?php echo $patient->Clients->EditValue ?>"<?php echo $patient->Clients->editAttributes() ?>>
<?php echo $patient->Clients->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$patient_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$patient_addopt->terminate();
?>