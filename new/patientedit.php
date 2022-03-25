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
$patient_edit = new patient_edit();

// Run the page
$patient_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatientedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpatientedit = currentForm = new ew.Form("fpatientedit", "edit");

	// Validate form
	fpatientedit.validate = function() {
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
			<?php if ($patient_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->id->caption(), $patient_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->PatientID->caption(), $patient_edit->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->title->Required) { ?>
				elm = this.getElements("x" + infix + "_title");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->title->caption(), $patient_edit->title->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->first_name->Required) { ?>
				elm = this.getElements("x" + infix + "_first_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->first_name->caption(), $patient_edit->first_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->middle_name->Required) { ?>
				elm = this.getElements("x" + infix + "_middle_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->middle_name->caption(), $patient_edit->middle_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->last_name->Required) { ?>
				elm = this.getElements("x" + infix + "_last_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->last_name->caption(), $patient_edit->last_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->gender->Required) { ?>
				elm = this.getElements("x" + infix + "_gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->gender->caption(), $patient_edit->gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->dob->Required) { ?>
				elm = this.getElements("x" + infix + "_dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->dob->caption(), $patient_edit->dob->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dob");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_edit->dob->errorMessage()) ?>");
			<?php if ($patient_edit->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->Age->caption(), $patient_edit->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->blood_group->Required) { ?>
				elm = this.getElements("x" + infix + "_blood_group");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->blood_group->caption(), $patient_edit->blood_group->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->mobile_no->Required) { ?>
				elm = this.getElements("x" + infix + "_mobile_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->mobile_no->caption(), $patient_edit->mobile_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->description->Required) { ?>
				elm = this.getElements("x" + infix + "_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->description->caption(), $patient_edit->description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->status->caption(), $patient_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->modifiedby->caption(), $patient_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->modifieddatetime->caption(), $patient_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->profilePic->Required) { ?>
				felm = this.getElements("x" + infix + "_profilePic");
				elm = this.getElements("fn_x" + infix + "_profilePic");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $patient_edit->profilePic->caption(), $patient_edit->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->IdentificationMark->Required) { ?>
				elm = this.getElements("x" + infix + "_IdentificationMark");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->IdentificationMark->caption(), $patient_edit->IdentificationMark->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->Religion->Required) { ?>
				elm = this.getElements("x" + infix + "_Religion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->Religion->caption(), $patient_edit->Religion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->Nationality->Required) { ?>
				elm = this.getElements("x" + infix + "_Nationality");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->Nationality->caption(), $patient_edit->Nationality->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->ReferedByDr->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferedByDr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->ReferedByDr->caption(), $patient_edit->ReferedByDr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->ReferClinicname->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferClinicname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->ReferClinicname->caption(), $patient_edit->ReferClinicname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->ReferCity->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferCity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->ReferCity->caption(), $patient_edit->ReferCity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->ReferMobileNo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferMobileNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->ReferMobileNo->caption(), $patient_edit->ReferMobileNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->ReferA4TreatingConsultant->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferA4TreatingConsultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->ReferA4TreatingConsultant->caption(), $patient_edit->ReferA4TreatingConsultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->PurposreReferredfor->Required) { ?>
				elm = this.getElements("x" + infix + "_PurposreReferredfor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->PurposreReferredfor->caption(), $patient_edit->PurposreReferredfor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->spouse_title->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_title");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->spouse_title->caption(), $patient_edit->spouse_title->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->spouse_first_name->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_first_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->spouse_first_name->caption(), $patient_edit->spouse_first_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->spouse_middle_name->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_middle_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->spouse_middle_name->caption(), $patient_edit->spouse_middle_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->spouse_last_name->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_last_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->spouse_last_name->caption(), $patient_edit->spouse_last_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->spouse_gender->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->spouse_gender->caption(), $patient_edit->spouse_gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->spouse_dob->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->spouse_dob->caption(), $patient_edit->spouse_dob->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->spouse_Age->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->spouse_Age->caption(), $patient_edit->spouse_Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->spouse_blood_group->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_blood_group");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->spouse_blood_group->caption(), $patient_edit->spouse_blood_group->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->spouse_mobile_no->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_mobile_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->spouse_mobile_no->caption(), $patient_edit->spouse_mobile_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->Maritalstatus->Required) { ?>
				elm = this.getElements("x" + infix + "_Maritalstatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->Maritalstatus->caption(), $patient_edit->Maritalstatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->Business->Required) { ?>
				elm = this.getElements("x" + infix + "_Business");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->Business->caption(), $patient_edit->Business->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->Patient_Language->Required) { ?>
				elm = this.getElements("x" + infix + "_Patient_Language");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->Patient_Language->caption(), $patient_edit->Patient_Language->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->Passport->Required) { ?>
				elm = this.getElements("x" + infix + "_Passport");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->Passport->caption(), $patient_edit->Passport->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->VisaNo->Required) { ?>
				elm = this.getElements("x" + infix + "_VisaNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->VisaNo->caption(), $patient_edit->VisaNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->ValidityOfVisa->Required) { ?>
				elm = this.getElements("x" + infix + "_ValidityOfVisa");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->ValidityOfVisa->caption(), $patient_edit->ValidityOfVisa->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->WhereDidYouHear->Required) { ?>
				elm = this.getElements("x" + infix + "_WhereDidYouHear[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->WhereDidYouHear->caption(), $patient_edit->WhereDidYouHear->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->HospID->caption(), $patient_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->street->Required) { ?>
				elm = this.getElements("x" + infix + "_street");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->street->caption(), $patient_edit->street->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->town->Required) { ?>
				elm = this.getElements("x" + infix + "_town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->town->caption(), $patient_edit->town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->province->Required) { ?>
				elm = this.getElements("x" + infix + "_province");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->province->caption(), $patient_edit->province->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->country->Required) { ?>
				elm = this.getElements("x" + infix + "_country");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->country->caption(), $patient_edit->country->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->postal_code->Required) { ?>
				elm = this.getElements("x" + infix + "_postal_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->postal_code->caption(), $patient_edit->postal_code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->PEmail->Required) { ?>
				elm = this.getElements("x" + infix + "_PEmail");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->PEmail->caption(), $patient_edit->PEmail->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->PEmergencyContact->Required) { ?>
				elm = this.getElements("x" + infix + "_PEmergencyContact");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->PEmergencyContact->caption(), $patient_edit->PEmergencyContact->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->occupation->Required) { ?>
				elm = this.getElements("x" + infix + "_occupation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->occupation->caption(), $patient_edit->occupation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->spouse_occupation->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_occupation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->spouse_occupation->caption(), $patient_edit->spouse_occupation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->WhatsApp->Required) { ?>
				elm = this.getElements("x" + infix + "_WhatsApp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->WhatsApp->caption(), $patient_edit->WhatsApp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->CouppleID->Required) { ?>
				elm = this.getElements("x" + infix + "_CouppleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->CouppleID->caption(), $patient_edit->CouppleID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CouppleID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_edit->CouppleID->errorMessage()) ?>");
			<?php if ($patient_edit->MaleID->Required) { ?>
				elm = this.getElements("x" + infix + "_MaleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->MaleID->caption(), $patient_edit->MaleID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MaleID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_edit->MaleID->errorMessage()) ?>");
			<?php if ($patient_edit->FemaleID->Required) { ?>
				elm = this.getElements("x" + infix + "_FemaleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->FemaleID->caption(), $patient_edit->FemaleID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FemaleID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_edit->FemaleID->errorMessage()) ?>");
			<?php if ($patient_edit->GroupID->Required) { ?>
				elm = this.getElements("x" + infix + "_GroupID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->GroupID->caption(), $patient_edit->GroupID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GroupID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_edit->GroupID->errorMessage()) ?>");
			<?php if ($patient_edit->Relationship->Required) { ?>
				elm = this.getElements("x" + infix + "_Relationship");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->Relationship->caption(), $patient_edit->Relationship->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->AppointmentSearch->Required) { ?>
				elm = this.getElements("x" + infix + "_AppointmentSearch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->AppointmentSearch->caption(), $patient_edit->AppointmentSearch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_edit->FacebookID->Required) { ?>
				elm = this.getElements("x" + infix + "_FacebookID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_edit->FacebookID->caption(), $patient_edit->FacebookID->RequiredErrorMessage)) ?>");
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
	fpatientedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatientedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatientedit.lists["x_title"] = <?php echo $patient_edit->title->Lookup->toClientList($patient_edit) ?>;
	fpatientedit.lists["x_title"].options = <?php echo JsonEncode($patient_edit->title->lookupOptions()) ?>;
	fpatientedit.lists["x_gender"] = <?php echo $patient_edit->gender->Lookup->toClientList($patient_edit) ?>;
	fpatientedit.lists["x_gender"].options = <?php echo JsonEncode($patient_edit->gender->lookupOptions()) ?>;
	fpatientedit.lists["x_blood_group"] = <?php echo $patient_edit->blood_group->Lookup->toClientList($patient_edit) ?>;
	fpatientedit.lists["x_blood_group"].options = <?php echo JsonEncode($patient_edit->blood_group->lookupOptions()) ?>;
	fpatientedit.lists["x_status"] = <?php echo $patient_edit->status->Lookup->toClientList($patient_edit) ?>;
	fpatientedit.lists["x_status"].options = <?php echo JsonEncode($patient_edit->status->lookupOptions()) ?>;
	fpatientedit.lists["x_ReferedByDr"] = <?php echo $patient_edit->ReferedByDr->Lookup->toClientList($patient_edit) ?>;
	fpatientedit.lists["x_ReferedByDr"].options = <?php echo JsonEncode($patient_edit->ReferedByDr->lookupOptions()) ?>;
	fpatientedit.lists["x_ReferA4TreatingConsultant"] = <?php echo $patient_edit->ReferA4TreatingConsultant->Lookup->toClientList($patient_edit) ?>;
	fpatientedit.lists["x_ReferA4TreatingConsultant"].options = <?php echo JsonEncode($patient_edit->ReferA4TreatingConsultant->lookupOptions()) ?>;
	fpatientedit.lists["x_spouse_title"] = <?php echo $patient_edit->spouse_title->Lookup->toClientList($patient_edit) ?>;
	fpatientedit.lists["x_spouse_title"].options = <?php echo JsonEncode($patient_edit->spouse_title->lookupOptions()) ?>;
	fpatientedit.lists["x_spouse_gender"] = <?php echo $patient_edit->spouse_gender->Lookup->toClientList($patient_edit) ?>;
	fpatientedit.lists["x_spouse_gender"].options = <?php echo JsonEncode($patient_edit->spouse_gender->lookupOptions()) ?>;
	fpatientedit.lists["x_spouse_blood_group"] = <?php echo $patient_edit->spouse_blood_group->Lookup->toClientList($patient_edit) ?>;
	fpatientedit.lists["x_spouse_blood_group"].options = <?php echo JsonEncode($patient_edit->spouse_blood_group->lookupOptions()) ?>;
	fpatientedit.lists["x_Maritalstatus"] = <?php echo $patient_edit->Maritalstatus->Lookup->toClientList($patient_edit) ?>;
	fpatientedit.lists["x_Maritalstatus"].options = <?php echo JsonEncode($patient_edit->Maritalstatus->lookupOptions()) ?>;
	fpatientedit.lists["x_Business"] = <?php echo $patient_edit->Business->Lookup->toClientList($patient_edit) ?>;
	fpatientedit.lists["x_Business"].options = <?php echo JsonEncode($patient_edit->Business->lookupOptions()) ?>;
	fpatientedit.autoSuggests["x_Business"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatientedit.lists["x_Patient_Language"] = <?php echo $patient_edit->Patient_Language->Lookup->toClientList($patient_edit) ?>;
	fpatientedit.lists["x_Patient_Language"].options = <?php echo JsonEncode($patient_edit->Patient_Language->lookupOptions()) ?>;
	fpatientedit.lists["x_WhereDidYouHear[]"] = <?php echo $patient_edit->WhereDidYouHear->Lookup->toClientList($patient_edit) ?>;
	fpatientedit.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($patient_edit->WhereDidYouHear->lookupOptions()) ?>;
	fpatientedit.lists["x_AppointmentSearch"] = <?php echo $patient_edit->AppointmentSearch->Lookup->toClientList($patient_edit) ?>;
	fpatientedit.lists["x_AppointmentSearch"].options = <?php echo JsonEncode($patient_edit->AppointmentSearch->lookupOptions()) ?>;
	loadjs.done("fpatientedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_edit->showPageHeader(); ?>
<?php
$patient_edit->showMessage();
?>
<form name="fpatientedit" id="fpatientedit" class="<?php echo $patient_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($patient_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_id" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_id" type="text/html"><?php echo $patient_edit->id->caption() ?><?php echo $patient_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->id->cellAttributes() ?>>
<script id="tpx_patient_id" type="text/html"><span id="el_patient_id">
<span<?php echo $patient_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_edit->id->CurrentValue) ?>">
<?php echo $patient_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_patient_PatientID" for="x_PatientID" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_PatientID" type="text/html"><?php echo $patient_edit->PatientID->caption() ?><?php echo $patient_edit->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->PatientID->cellAttributes() ?>>
<script id="tpx_patient_PatientID" type="text/html"><span id="el_patient_PatientID">
<span<?php echo $patient_edit->PatientID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_edit->PatientID->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" value="<?php echo HtmlEncode($patient_edit->PatientID->CurrentValue) ?>">
<?php echo $patient_edit->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->title->Visible) { // title ?>
	<div id="r_title" class="form-group row">
		<label id="elh_patient_title" for="x_title" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_title" type="text/html"><?php echo $patient_edit->title->caption() ?><?php echo $patient_edit->title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->title->cellAttributes() ?>>
<script id="tpx_patient_title" type="text/html"><span id="el_patient_title">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_title" data-value-separator="<?php echo $patient_edit->title->displayValueSeparatorAttribute() ?>" id="x_title" name="x_title"<?php echo $patient_edit->title->editAttributes() ?>>
			<?php echo $patient_edit->title->selectOptionListHtml("x_title") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_tittle") && !$patient_edit->title->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_title" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_edit->title->caption() ?>" data-title="<?php echo $patient_edit->title->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_title',url:'sys_tittleaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $patient_edit->title->Lookup->getParamTag($patient_edit, "p_x_title") ?>
</span></script>
<?php echo $patient_edit->title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->first_name->Visible) { // first_name ?>
	<div id="r_first_name" class="form-group row">
		<label id="elh_patient_first_name" for="x_first_name" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_first_name" type="text/html"><?php echo $patient_edit->first_name->caption() ?><?php echo $patient_edit->first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->first_name->cellAttributes() ?>>
<script id="tpx_patient_first_name" type="text/html"><span id="el_patient_first_name">
<input type="text" data-table="patient" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_edit->first_name->getPlaceHolder()) ?>" value="<?php echo $patient_edit->first_name->EditValue ?>"<?php echo $patient_edit->first_name->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->first_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->middle_name->Visible) { // middle_name ?>
	<div id="r_middle_name" class="form-group row">
		<label id="elh_patient_middle_name" for="x_middle_name" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_middle_name" type="text/html"><?php echo $patient_edit->middle_name->caption() ?><?php echo $patient_edit->middle_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->middle_name->cellAttributes() ?>>
<script id="tpx_patient_middle_name" type="text/html"><span id="el_patient_middle_name">
<input type="text" data-table="patient" data-field="x_middle_name" name="x_middle_name" id="x_middle_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_edit->middle_name->getPlaceHolder()) ?>" value="<?php echo $patient_edit->middle_name->EditValue ?>"<?php echo $patient_edit->middle_name->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->middle_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->last_name->Visible) { // last_name ?>
	<div id="r_last_name" class="form-group row">
		<label id="elh_patient_last_name" for="x_last_name" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_last_name" type="text/html"><?php echo $patient_edit->last_name->caption() ?><?php echo $patient_edit->last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->last_name->cellAttributes() ?>>
<script id="tpx_patient_last_name" type="text/html"><span id="el_patient_last_name">
<input type="text" data-table="patient" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_edit->last_name->getPlaceHolder()) ?>" value="<?php echo $patient_edit->last_name->EditValue ?>"<?php echo $patient_edit->last_name->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->last_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_patient_gender" for="x_gender" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_gender" type="text/html"><?php echo $patient_edit->gender->caption() ?><?php echo $patient_edit->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->gender->cellAttributes() ?>>
<script id="tpx_patient_gender" type="text/html"><span id="el_patient_gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_gender" data-value-separator="<?php echo $patient_edit->gender->displayValueSeparatorAttribute() ?>" id="x_gender" name="x_gender"<?php echo $patient_edit->gender->editAttributes() ?>>
			<?php echo $patient_edit->gender->selectOptionListHtml("x_gender") ?>
		</select>
</div>
<?php echo $patient_edit->gender->Lookup->getParamTag($patient_edit, "p_x_gender") ?>
</span></script>
<?php echo $patient_edit->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->dob->Visible) { // dob ?>
	<div id="r_dob" class="form-group row">
		<label id="elh_patient_dob" for="x_dob" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_dob" type="text/html"><?php echo $patient_edit->dob->caption() ?><?php echo $patient_edit->dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->dob->cellAttributes() ?>>
<script id="tpx_patient_dob" type="text/html"><span id="el_patient_dob">
<input type="text" data-table="patient" data-field="x_dob" data-format="7" name="x_dob" id="x_dob" placeholder="<?php echo HtmlEncode($patient_edit->dob->getPlaceHolder()) ?>" value="<?php echo $patient_edit->dob->EditValue ?>"<?php echo $patient_edit->dob->editAttributes() ?>>
<?php if (!$patient_edit->dob->ReadOnly && !$patient_edit->dob->Disabled && !isset($patient_edit->dob->EditAttrs["readonly"]) && !isset($patient_edit->dob->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patientedit_js">
loadjs.ready(["fpatientedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatientedit", "x_dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_edit->dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_Age" for="x_Age" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_Age" type="text/html"><?php echo $patient_edit->Age->caption() ?><?php echo $patient_edit->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->Age->cellAttributes() ?>>
<script id="tpx_patient_Age" type="text/html"><span id="el_patient_Age">
<input type="text" data-table="patient" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->Age->getPlaceHolder()) ?>" value="<?php echo $patient_edit->Age->EditValue ?>"<?php echo $patient_edit->Age->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->blood_group->Visible) { // blood_group ?>
	<div id="r_blood_group" class="form-group row">
		<label id="elh_patient_blood_group" for="x_blood_group" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_blood_group" type="text/html"><?php echo $patient_edit->blood_group->caption() ?><?php echo $patient_edit->blood_group->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->blood_group->cellAttributes() ?>>
<script id="tpx_patient_blood_group" type="text/html"><span id="el_patient_blood_group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_blood_group" data-value-separator="<?php echo $patient_edit->blood_group->displayValueSeparatorAttribute() ?>" id="x_blood_group" name="x_blood_group"<?php echo $patient_edit->blood_group->editAttributes() ?>>
			<?php echo $patient_edit->blood_group->selectOptionListHtml("x_blood_group") ?>
		</select>
</div>
<?php echo $patient_edit->blood_group->Lookup->getParamTag($patient_edit, "p_x_blood_group") ?>
</span></script>
<?php echo $patient_edit->blood_group->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->mobile_no->Visible) { // mobile_no ?>
	<div id="r_mobile_no" class="form-group row">
		<label id="elh_patient_mobile_no" for="x_mobile_no" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_mobile_no" type="text/html"><?php echo $patient_edit->mobile_no->caption() ?><?php echo $patient_edit->mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->mobile_no->cellAttributes() ?>>
<script id="tpx_patient_mobile_no" type="text/html"><span id="el_patient_mobile_no">
<input type="text" data-table="patient" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient_edit->mobile_no->EditValue ?>"<?php echo $patient_edit->mobile_no->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->mobile_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_patient_description" for="x_description" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_description" type="text/html"><?php echo $patient_edit->description->caption() ?><?php echo $patient_edit->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->description->cellAttributes() ?>>
<script id="tpx_patient_description" type="text/html"><span id="el_patient_description">
<input type="text" data-table="patient" data-field="x_description" name="x_description" id="x_description" placeholder="<?php echo HtmlEncode($patient_edit->description->getPlaceHolder()) ?>" value="<?php echo $patient_edit->description->EditValue ?>"<?php echo $patient_edit->description->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_status" for="x_status" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_status" type="text/html"><?php echo $patient_edit->status->caption() ?><?php echo $patient_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->status->cellAttributes() ?>>
<script id="tpx_patient_status" type="text/html"><span id="el_patient_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_status" data-value-separator="<?php echo $patient_edit->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_edit->status->editAttributes() ?>>
			<?php echo $patient_edit->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $patient_edit->status->Lookup->getParamTag($patient_edit, "p_x_status") ?>
</span></script>
<?php echo $patient_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_profilePic" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_profilePic" type="text/html"><?php echo $patient_edit->profilePic->caption() ?><?php echo $patient_edit->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->profilePic->cellAttributes() ?>>
<script id="tpx_patient_profilePic" type="text/html"><span id="el_patient_profilePic">
<div id="fd_x_profilePic">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $patient_edit->profilePic->title() ?>" data-table="patient" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" lang="<?php echo CurrentLanguageID() ?>"<?php echo $patient_edit->profilePic->editAttributes() ?><?php if ($patient_edit->profilePic->ReadOnly || $patient_edit->profilePic->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_profilePic"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_profilePic" id= "fn_x_profilePic" value="<?php echo $patient_edit->profilePic->Upload->FileName ?>">
<input type="hidden" name="fa_x_profilePic" id= "fa_x_profilePic" value="<?php echo (Post("fa_x_profilePic") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_profilePic" id= "fs_x_profilePic" value="100">
<input type="hidden" name="fx_x_profilePic" id= "fx_x_profilePic" value="<?php echo $patient_edit->profilePic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_profilePic" id= "fm_x_profilePic" value="<?php echo $patient_edit->profilePic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_profilePic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span></script>
<?php echo $patient_edit->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->IdentificationMark->Visible) { // IdentificationMark ?>
	<div id="r_IdentificationMark" class="form-group row">
		<label id="elh_patient_IdentificationMark" for="x_IdentificationMark" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_IdentificationMark" type="text/html"><?php echo $patient_edit->IdentificationMark->caption() ?><?php echo $patient_edit->IdentificationMark->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->IdentificationMark->cellAttributes() ?>>
<script id="tpx_patient_IdentificationMark" type="text/html"><span id="el_patient_IdentificationMark">
<input type="text" data-table="patient" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $patient_edit->IdentificationMark->EditValue ?>"<?php echo $patient_edit->IdentificationMark->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->IdentificationMark->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->Religion->Visible) { // Religion ?>
	<div id="r_Religion" class="form-group row">
		<label id="elh_patient_Religion" for="x_Religion" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_Religion" type="text/html"><?php echo $patient_edit->Religion->caption() ?><?php echo $patient_edit->Religion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->Religion->cellAttributes() ?>>
<script id="tpx_patient_Religion" type="text/html"><span id="el_patient_Religion">
<input type="text" data-table="patient" data-field="x_Religion" name="x_Religion" id="x_Religion" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->Religion->getPlaceHolder()) ?>" value="<?php echo $patient_edit->Religion->EditValue ?>"<?php echo $patient_edit->Religion->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->Religion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->Nationality->Visible) { // Nationality ?>
	<div id="r_Nationality" class="form-group row">
		<label id="elh_patient_Nationality" for="x_Nationality" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_Nationality" type="text/html"><?php echo $patient_edit->Nationality->caption() ?><?php echo $patient_edit->Nationality->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->Nationality->cellAttributes() ?>>
<script id="tpx_patient_Nationality" type="text/html"><span id="el_patient_Nationality">
<input type="text" data-table="patient" data-field="x_Nationality" name="x_Nationality" id="x_Nationality" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->Nationality->getPlaceHolder()) ?>" value="<?php echo $patient_edit->Nationality->EditValue ?>"<?php echo $patient_edit->Nationality->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->Nationality->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->ReferedByDr->Visible) { // ReferedByDr ?>
	<div id="r_ReferedByDr" class="form-group row">
		<label id="elh_patient_ReferedByDr" for="x_ReferedByDr" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_ReferedByDr" type="text/html"><?php echo $patient_edit->ReferedByDr->caption() ?><?php echo $patient_edit->ReferedByDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->ReferedByDr->cellAttributes() ?>>
<script id="tpx_patient_ReferedByDr" type="text/html"><span id="el_patient_ReferedByDr">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferedByDr"><?php echo EmptyValue(strval($patient_edit->ReferedByDr->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_edit->ReferedByDr->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_edit->ReferedByDr->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_edit->ReferedByDr->ReadOnly || $patient_edit->ReferedByDr->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferedByDr',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$patient_edit->ReferedByDr->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferedByDr" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_edit->ReferedByDr->caption() ?>" data-title="<?php echo $patient_edit->ReferedByDr->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferedByDr',url:'mas_reference_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $patient_edit->ReferedByDr->Lookup->getParamTag($patient_edit, "p_x_ReferedByDr") ?>
<input type="hidden" data-table="patient" data-field="x_ReferedByDr" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_edit->ReferedByDr->displayValueSeparatorAttribute() ?>" name="x_ReferedByDr" id="x_ReferedByDr" value="<?php echo $patient_edit->ReferedByDr->CurrentValue ?>"<?php echo $patient_edit->ReferedByDr->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->ReferedByDr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label id="elh_patient_ReferClinicname" for="x_ReferClinicname" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_ReferClinicname" type="text/html"><?php echo $patient_edit->ReferClinicname->caption() ?><?php echo $patient_edit->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->ReferClinicname->cellAttributes() ?>>
<script id="tpx_patient_ReferClinicname" type="text/html"><span id="el_patient_ReferClinicname">
<input type="text" data-table="patient" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $patient_edit->ReferClinicname->EditValue ?>"<?php echo $patient_edit->ReferClinicname->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->ReferClinicname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label id="elh_patient_ReferCity" for="x_ReferCity" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_ReferCity" type="text/html"><?php echo $patient_edit->ReferCity->caption() ?><?php echo $patient_edit->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->ReferCity->cellAttributes() ?>>
<script id="tpx_patient_ReferCity" type="text/html"><span id="el_patient_ReferCity">
<input type="text" data-table="patient" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->ReferCity->getPlaceHolder()) ?>" value="<?php echo $patient_edit->ReferCity->EditValue ?>"<?php echo $patient_edit->ReferCity->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->ReferCity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label id="elh_patient_ReferMobileNo" for="x_ReferMobileNo" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_ReferMobileNo" type="text/html"><?php echo $patient_edit->ReferMobileNo->caption() ?><?php echo $patient_edit->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_patient_ReferMobileNo" type="text/html"><span id="el_patient_ReferMobileNo">
<input type="text" data-table="patient" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $patient_edit->ReferMobileNo->EditValue ?>"<?php echo $patient_edit->ReferMobileNo->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->ReferMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div id="r_ReferA4TreatingConsultant" class="form-group row">
		<label id="elh_patient_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_ReferA4TreatingConsultant" type="text/html"><?php echo $patient_edit->ReferA4TreatingConsultant->caption() ?><?php echo $patient_edit->ReferA4TreatingConsultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_patient_ReferA4TreatingConsultant" type="text/html"><span id="el_patient_ReferA4TreatingConsultant">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferA4TreatingConsultant"><?php echo EmptyValue(strval($patient_edit->ReferA4TreatingConsultant->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_edit->ReferA4TreatingConsultant->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_edit->ReferA4TreatingConsultant->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_edit->ReferA4TreatingConsultant->ReadOnly || $patient_edit->ReferA4TreatingConsultant->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferA4TreatingConsultant',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$patient_edit->ReferA4TreatingConsultant->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferA4TreatingConsultant" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_edit->ReferA4TreatingConsultant->caption() ?>" data-title="<?php echo $patient_edit->ReferA4TreatingConsultant->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferA4TreatingConsultant',url:'doctorsaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $patient_edit->ReferA4TreatingConsultant->Lookup->getParamTag($patient_edit, "p_x_ReferA4TreatingConsultant") ?>
<input type="hidden" data-table="patient" data-field="x_ReferA4TreatingConsultant" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_edit->ReferA4TreatingConsultant->displayValueSeparatorAttribute() ?>" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" value="<?php echo $patient_edit->ReferA4TreatingConsultant->CurrentValue ?>"<?php echo $patient_edit->ReferA4TreatingConsultant->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->ReferA4TreatingConsultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div id="r_PurposreReferredfor" class="form-group row">
		<label id="elh_patient_PurposreReferredfor" for="x_PurposreReferredfor" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_PurposreReferredfor" type="text/html"><?php echo $patient_edit->PurposreReferredfor->caption() ?><?php echo $patient_edit->PurposreReferredfor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_patient_PurposreReferredfor" type="text/html"><span id="el_patient_PurposreReferredfor">
<input type="text" data-table="patient" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->PurposreReferredfor->getPlaceHolder()) ?>" value="<?php echo $patient_edit->PurposreReferredfor->EditValue ?>"<?php echo $patient_edit->PurposreReferredfor->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->PurposreReferredfor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->spouse_title->Visible) { // spouse_title ?>
	<div id="r_spouse_title" class="form-group row">
		<label id="elh_patient_spouse_title" for="x_spouse_title" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_spouse_title" type="text/html"><?php echo $patient_edit->spouse_title->caption() ?><?php echo $patient_edit->spouse_title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->spouse_title->cellAttributes() ?>>
<script id="tpx_patient_spouse_title" type="text/html"><span id="el_patient_spouse_title">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_title" data-value-separator="<?php echo $patient_edit->spouse_title->displayValueSeparatorAttribute() ?>" id="x_spouse_title" name="x_spouse_title"<?php echo $patient_edit->spouse_title->editAttributes() ?>>
			<?php echo $patient_edit->spouse_title->selectOptionListHtml("x_spouse_title") ?>
		</select>
</div>
<?php echo $patient_edit->spouse_title->Lookup->getParamTag($patient_edit, "p_x_spouse_title") ?>
</span></script>
<?php echo $patient_edit->spouse_title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->spouse_first_name->Visible) { // spouse_first_name ?>
	<div id="r_spouse_first_name" class="form-group row">
		<label id="elh_patient_spouse_first_name" for="x_spouse_first_name" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_spouse_first_name" type="text/html"><?php echo $patient_edit->spouse_first_name->caption() ?><?php echo $patient_edit->spouse_first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->spouse_first_name->cellAttributes() ?>>
<script id="tpx_patient_spouse_first_name" type="text/html"><span id="el_patient_spouse_first_name">
<input type="text" data-table="patient" data-field="x_spouse_first_name" name="x_spouse_first_name" id="x_spouse_first_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->spouse_first_name->getPlaceHolder()) ?>" value="<?php echo $patient_edit->spouse_first_name->EditValue ?>"<?php echo $patient_edit->spouse_first_name->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->spouse_first_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<div id="r_spouse_middle_name" class="form-group row">
		<label id="elh_patient_spouse_middle_name" for="x_spouse_middle_name" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_spouse_middle_name" type="text/html"><?php echo $patient_edit->spouse_middle_name->caption() ?><?php echo $patient_edit->spouse_middle_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->spouse_middle_name->cellAttributes() ?>>
<script id="tpx_patient_spouse_middle_name" type="text/html"><span id="el_patient_spouse_middle_name">
<input type="text" data-table="patient" data-field="x_spouse_middle_name" name="x_spouse_middle_name" id="x_spouse_middle_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->spouse_middle_name->getPlaceHolder()) ?>" value="<?php echo $patient_edit->spouse_middle_name->EditValue ?>"<?php echo $patient_edit->spouse_middle_name->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->spouse_middle_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->spouse_last_name->Visible) { // spouse_last_name ?>
	<div id="r_spouse_last_name" class="form-group row">
		<label id="elh_patient_spouse_last_name" for="x_spouse_last_name" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_spouse_last_name" type="text/html"><?php echo $patient_edit->spouse_last_name->caption() ?><?php echo $patient_edit->spouse_last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->spouse_last_name->cellAttributes() ?>>
<script id="tpx_patient_spouse_last_name" type="text/html"><span id="el_patient_spouse_last_name">
<input type="text" data-table="patient" data-field="x_spouse_last_name" name="x_spouse_last_name" id="x_spouse_last_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->spouse_last_name->getPlaceHolder()) ?>" value="<?php echo $patient_edit->spouse_last_name->EditValue ?>"<?php echo $patient_edit->spouse_last_name->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->spouse_last_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->spouse_gender->Visible) { // spouse_gender ?>
	<div id="r_spouse_gender" class="form-group row">
		<label id="elh_patient_spouse_gender" for="x_spouse_gender" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_spouse_gender" type="text/html"><?php echo $patient_edit->spouse_gender->caption() ?><?php echo $patient_edit->spouse_gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->spouse_gender->cellAttributes() ?>>
<script id="tpx_patient_spouse_gender" type="text/html"><span id="el_patient_spouse_gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_gender" data-value-separator="<?php echo $patient_edit->spouse_gender->displayValueSeparatorAttribute() ?>" id="x_spouse_gender" name="x_spouse_gender"<?php echo $patient_edit->spouse_gender->editAttributes() ?>>
			<?php echo $patient_edit->spouse_gender->selectOptionListHtml("x_spouse_gender") ?>
		</select>
</div>
<?php echo $patient_edit->spouse_gender->Lookup->getParamTag($patient_edit, "p_x_spouse_gender") ?>
</span></script>
<?php echo $patient_edit->spouse_gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->spouse_dob->Visible) { // spouse_dob ?>
	<div id="r_spouse_dob" class="form-group row">
		<label id="elh_patient_spouse_dob" for="x_spouse_dob" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_spouse_dob" type="text/html"><?php echo $patient_edit->spouse_dob->caption() ?><?php echo $patient_edit->spouse_dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->spouse_dob->cellAttributes() ?>>
<script id="tpx_patient_spouse_dob" type="text/html"><span id="el_patient_spouse_dob">
<input type="text" data-table="patient" data-field="x_spouse_dob" data-format="7" name="x_spouse_dob" id="x_spouse_dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->spouse_dob->getPlaceHolder()) ?>" value="<?php echo $patient_edit->spouse_dob->EditValue ?>"<?php echo $patient_edit->spouse_dob->editAttributes() ?>>
<?php if (!$patient_edit->spouse_dob->ReadOnly && !$patient_edit->spouse_dob->Disabled && !isset($patient_edit->spouse_dob->EditAttrs["readonly"]) && !isset($patient_edit->spouse_dob->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patientedit_js">
loadjs.ready(["fpatientedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatientedit", "x_spouse_dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_edit->spouse_dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->spouse_Age->Visible) { // spouse_Age ?>
	<div id="r_spouse_Age" class="form-group row">
		<label id="elh_patient_spouse_Age" for="x_spouse_Age" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_spouse_Age" type="text/html"><?php echo $patient_edit->spouse_Age->caption() ?><?php echo $patient_edit->spouse_Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->spouse_Age->cellAttributes() ?>>
<script id="tpx_patient_spouse_Age" type="text/html"><span id="el_patient_spouse_Age">
<input type="text" data-table="patient" data-field="x_spouse_Age" name="x_spouse_Age" id="x_spouse_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->spouse_Age->getPlaceHolder()) ?>" value="<?php echo $patient_edit->spouse_Age->EditValue ?>"<?php echo $patient_edit->spouse_Age->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->spouse_Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<div id="r_spouse_blood_group" class="form-group row">
		<label id="elh_patient_spouse_blood_group" for="x_spouse_blood_group" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_spouse_blood_group" type="text/html"><?php echo $patient_edit->spouse_blood_group->caption() ?><?php echo $patient_edit->spouse_blood_group->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->spouse_blood_group->cellAttributes() ?>>
<script id="tpx_patient_spouse_blood_group" type="text/html"><span id="el_patient_spouse_blood_group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_blood_group" data-value-separator="<?php echo $patient_edit->spouse_blood_group->displayValueSeparatorAttribute() ?>" id="x_spouse_blood_group" name="x_spouse_blood_group"<?php echo $patient_edit->spouse_blood_group->editAttributes() ?>>
			<?php echo $patient_edit->spouse_blood_group->selectOptionListHtml("x_spouse_blood_group") ?>
		</select>
</div>
<?php echo $patient_edit->spouse_blood_group->Lookup->getParamTag($patient_edit, "p_x_spouse_blood_group") ?>
</span></script>
<?php echo $patient_edit->spouse_blood_group->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<div id="r_spouse_mobile_no" class="form-group row">
		<label id="elh_patient_spouse_mobile_no" for="x_spouse_mobile_no" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_spouse_mobile_no" type="text/html"><?php echo $patient_edit->spouse_mobile_no->caption() ?><?php echo $patient_edit->spouse_mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->spouse_mobile_no->cellAttributes() ?>>
<script id="tpx_patient_spouse_mobile_no" type="text/html"><span id="el_patient_spouse_mobile_no">
<input type="text" data-table="patient" data-field="x_spouse_mobile_no" name="x_spouse_mobile_no" id="x_spouse_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->spouse_mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient_edit->spouse_mobile_no->EditValue ?>"<?php echo $patient_edit->spouse_mobile_no->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->spouse_mobile_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->Maritalstatus->Visible) { // Maritalstatus ?>
	<div id="r_Maritalstatus" class="form-group row">
		<label id="elh_patient_Maritalstatus" for="x_Maritalstatus" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_Maritalstatus" type="text/html"><?php echo $patient_edit->Maritalstatus->caption() ?><?php echo $patient_edit->Maritalstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->Maritalstatus->cellAttributes() ?>>
<script id="tpx_patient_Maritalstatus" type="text/html"><span id="el_patient_Maritalstatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_Maritalstatus" data-value-separator="<?php echo $patient_edit->Maritalstatus->displayValueSeparatorAttribute() ?>" id="x_Maritalstatus" name="x_Maritalstatus"<?php echo $patient_edit->Maritalstatus->editAttributes() ?>>
			<?php echo $patient_edit->Maritalstatus->selectOptionListHtml("x_Maritalstatus") ?>
		</select>
</div>
<?php echo $patient_edit->Maritalstatus->Lookup->getParamTag($patient_edit, "p_x_Maritalstatus") ?>
</span></script>
<?php echo $patient_edit->Maritalstatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->Business->Visible) { // Business ?>
	<div id="r_Business" class="form-group row">
		<label id="elh_patient_Business" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_Business" type="text/html"><?php echo $patient_edit->Business->caption() ?><?php echo $patient_edit->Business->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->Business->cellAttributes() ?>>
<script id="tpx_patient_Business" type="text/html"><span id="el_patient_Business">
<?php
$onchange = $patient_edit->Business->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_edit->Business->EditAttrs["onchange"] = "";
?>
<span id="as_x_Business">
	<input type="text" class="form-control" name="sv_x_Business" id="sv_x_Business" value="<?php echo RemoveHtml($patient_edit->Business->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->Business->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_edit->Business->getPlaceHolder()) ?>"<?php echo $patient_edit->Business->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient" data-field="x_Business" data-value-separator="<?php echo $patient_edit->Business->displayValueSeparatorAttribute() ?>" name="x_Business" id="x_Business" value="<?php echo HtmlEncode($patient_edit->Business->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_edit->Business->Lookup->getParamTag($patient_edit, "p_x_Business") ?>
</span></script>
<script type="text/html" class="patientedit_js">
loadjs.ready(["fpatientedit"], function() {
	fpatientedit.createAutoSuggest({"id":"x_Business","forceSelect":false});
});
</script>
<?php echo $patient_edit->Business->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->Patient_Language->Visible) { // Patient_Language ?>
	<div id="r_Patient_Language" class="form-group row">
		<label id="elh_patient_Patient_Language" for="x_Patient_Language" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_Patient_Language" type="text/html"><?php echo $patient_edit->Patient_Language->caption() ?><?php echo $patient_edit->Patient_Language->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->Patient_Language->cellAttributes() ?>>
<script id="tpx_patient_Patient_Language" type="text/html"><span id="el_patient_Patient_Language">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_Patient_Language" data-value-separator="<?php echo $patient_edit->Patient_Language->displayValueSeparatorAttribute() ?>" id="x_Patient_Language" name="x_Patient_Language"<?php echo $patient_edit->Patient_Language->editAttributes() ?>>
			<?php echo $patient_edit->Patient_Language->selectOptionListHtml("x_Patient_Language") ?>
		</select>
</div>
<?php echo $patient_edit->Patient_Language->Lookup->getParamTag($patient_edit, "p_x_Patient_Language") ?>
</span></script>
<?php echo $patient_edit->Patient_Language->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->Passport->Visible) { // Passport ?>
	<div id="r_Passport" class="form-group row">
		<label id="elh_patient_Passport" for="x_Passport" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_Passport" type="text/html"><?php echo $patient_edit->Passport->caption() ?><?php echo $patient_edit->Passport->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->Passport->cellAttributes() ?>>
<script id="tpx_patient_Passport" type="text/html"><span id="el_patient_Passport">
<input type="text" data-table="patient" data-field="x_Passport" name="x_Passport" id="x_Passport" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->Passport->getPlaceHolder()) ?>" value="<?php echo $patient_edit->Passport->EditValue ?>"<?php echo $patient_edit->Passport->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->Passport->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->VisaNo->Visible) { // VisaNo ?>
	<div id="r_VisaNo" class="form-group row">
		<label id="elh_patient_VisaNo" for="x_VisaNo" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_VisaNo" type="text/html"><?php echo $patient_edit->VisaNo->caption() ?><?php echo $patient_edit->VisaNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->VisaNo->cellAttributes() ?>>
<script id="tpx_patient_VisaNo" type="text/html"><span id="el_patient_VisaNo">
<input type="text" data-table="patient" data-field="x_VisaNo" name="x_VisaNo" id="x_VisaNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->VisaNo->getPlaceHolder()) ?>" value="<?php echo $patient_edit->VisaNo->EditValue ?>"<?php echo $patient_edit->VisaNo->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->VisaNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<div id="r_ValidityOfVisa" class="form-group row">
		<label id="elh_patient_ValidityOfVisa" for="x_ValidityOfVisa" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_ValidityOfVisa" type="text/html"><?php echo $patient_edit->ValidityOfVisa->caption() ?><?php echo $patient_edit->ValidityOfVisa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->ValidityOfVisa->cellAttributes() ?>>
<script id="tpx_patient_ValidityOfVisa" type="text/html"><span id="el_patient_ValidityOfVisa">
<input type="text" data-table="patient" data-field="x_ValidityOfVisa" name="x_ValidityOfVisa" id="x_ValidityOfVisa" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->ValidityOfVisa->getPlaceHolder()) ?>" value="<?php echo $patient_edit->ValidityOfVisa->EditValue ?>"<?php echo $patient_edit->ValidityOfVisa->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->ValidityOfVisa->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<div id="r_WhereDidYouHear" class="form-group row">
		<label id="elh_patient_WhereDidYouHear" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_WhereDidYouHear" type="text/html"><?php echo $patient_edit->WhereDidYouHear->caption() ?><?php echo $patient_edit->WhereDidYouHear->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->WhereDidYouHear->cellAttributes() ?>>
<script id="tpx_patient_WhereDidYouHear" type="text/html"><span id="el_patient_WhereDidYouHear">
<div id="tp_x_WhereDidYouHear" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $patient_edit->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x_WhereDidYouHear[]" id="x_WhereDidYouHear[]" value="{value}"<?php echo $patient_edit->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_edit->WhereDidYouHear->checkBoxListHtml(FALSE, "x_WhereDidYouHear[]") ?>
</div></div>
<?php echo $patient_edit->WhereDidYouHear->Lookup->getParamTag($patient_edit, "p_x_WhereDidYouHear") ?>
</span></script>
<?php echo $patient_edit->WhereDidYouHear->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label id="elh_patient_street" for="x_street" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_street" type="text/html"><?php echo $patient_edit->street->caption() ?><?php echo $patient_edit->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->street->cellAttributes() ?>>
<script id="tpx_patient_street" type="text/html"><span id="el_patient_street">
<input type="text" data-table="patient" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_edit->street->getPlaceHolder()) ?>" value="<?php echo $patient_edit->street->EditValue ?>"<?php echo $patient_edit->street->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label id="elh_patient_town" for="x_town" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_town" type="text/html"><?php echo $patient_edit->town->caption() ?><?php echo $patient_edit->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->town->cellAttributes() ?>>
<script id="tpx_patient_town" type="text/html"><span id="el_patient_town">
<input type="text" data-table="patient" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_edit->town->getPlaceHolder()) ?>" value="<?php echo $patient_edit->town->EditValue ?>"<?php echo $patient_edit->town->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_patient_province" for="x_province" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_province" type="text/html"><?php echo $patient_edit->province->caption() ?><?php echo $patient_edit->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->province->cellAttributes() ?>>
<script id="tpx_patient_province" type="text/html"><span id="el_patient_province">
<input type="text" data-table="patient" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_edit->province->getPlaceHolder()) ?>" value="<?php echo $patient_edit->province->EditValue ?>"<?php echo $patient_edit->province->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->country->Visible) { // country ?>
	<div id="r_country" class="form-group row">
		<label id="elh_patient_country" for="x_country" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_country" type="text/html"><?php echo $patient_edit->country->caption() ?><?php echo $patient_edit->country->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->country->cellAttributes() ?>>
<script id="tpx_patient_country" type="text/html"><span id="el_patient_country">
<input type="text" data-table="patient" data-field="x_country" name="x_country" id="x_country" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_edit->country->getPlaceHolder()) ?>" value="<?php echo $patient_edit->country->EditValue ?>"<?php echo $patient_edit->country->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->country->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_patient_postal_code" for="x_postal_code" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_postal_code" type="text/html"><?php echo $patient_edit->postal_code->caption() ?><?php echo $patient_edit->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->postal_code->cellAttributes() ?>>
<script id="tpx_patient_postal_code" type="text/html"><span id="el_patient_postal_code">
<input type="text" data-table="patient" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_edit->postal_code->getPlaceHolder()) ?>" value="<?php echo $patient_edit->postal_code->EditValue ?>"<?php echo $patient_edit->postal_code->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->PEmail->Visible) { // PEmail ?>
	<div id="r_PEmail" class="form-group row">
		<label id="elh_patient_PEmail" for="x_PEmail" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_PEmail" type="text/html"><?php echo $patient_edit->PEmail->caption() ?><?php echo $patient_edit->PEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->PEmail->cellAttributes() ?>>
<script id="tpx_patient_PEmail" type="text/html"><span id="el_patient_PEmail">
<input type="text" data-table="patient" data-field="x_PEmail" name="x_PEmail" id="x_PEmail" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_edit->PEmail->getPlaceHolder()) ?>" value="<?php echo $patient_edit->PEmail->EditValue ?>"<?php echo $patient_edit->PEmail->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->PEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<div id="r_PEmergencyContact" class="form-group row">
		<label id="elh_patient_PEmergencyContact" for="x_PEmergencyContact" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_PEmergencyContact" type="text/html"><?php echo $patient_edit->PEmergencyContact->caption() ?><?php echo $patient_edit->PEmergencyContact->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->PEmergencyContact->cellAttributes() ?>>
<script id="tpx_patient_PEmergencyContact" type="text/html"><span id="el_patient_PEmergencyContact">
<input type="text" data-table="patient" data-field="x_PEmergencyContact" name="x_PEmergencyContact" id="x_PEmergencyContact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_edit->PEmergencyContact->getPlaceHolder()) ?>" value="<?php echo $patient_edit->PEmergencyContact->EditValue ?>"<?php echo $patient_edit->PEmergencyContact->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->PEmergencyContact->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->occupation->Visible) { // occupation ?>
	<div id="r_occupation" class="form-group row">
		<label id="elh_patient_occupation" for="x_occupation" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_occupation" type="text/html"><?php echo $patient_edit->occupation->caption() ?><?php echo $patient_edit->occupation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->occupation->cellAttributes() ?>>
<script id="tpx_patient_occupation" type="text/html"><span id="el_patient_occupation">
<input type="text" data-table="patient" data-field="x_occupation" name="x_occupation" id="x_occupation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->occupation->getPlaceHolder()) ?>" value="<?php echo $patient_edit->occupation->EditValue ?>"<?php echo $patient_edit->occupation->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->occupation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->spouse_occupation->Visible) { // spouse_occupation ?>
	<div id="r_spouse_occupation" class="form-group row">
		<label id="elh_patient_spouse_occupation" for="x_spouse_occupation" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_spouse_occupation" type="text/html"><?php echo $patient_edit->spouse_occupation->caption() ?><?php echo $patient_edit->spouse_occupation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->spouse_occupation->cellAttributes() ?>>
<script id="tpx_patient_spouse_occupation" type="text/html"><span id="el_patient_spouse_occupation">
<input type="text" data-table="patient" data-field="x_spouse_occupation" name="x_spouse_occupation" id="x_spouse_occupation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->spouse_occupation->getPlaceHolder()) ?>" value="<?php echo $patient_edit->spouse_occupation->EditValue ?>"<?php echo $patient_edit->spouse_occupation->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->spouse_occupation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->WhatsApp->Visible) { // WhatsApp ?>
	<div id="r_WhatsApp" class="form-group row">
		<label id="elh_patient_WhatsApp" for="x_WhatsApp" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_WhatsApp" type="text/html"><?php echo $patient_edit->WhatsApp->caption() ?><?php echo $patient_edit->WhatsApp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->WhatsApp->cellAttributes() ?>>
<script id="tpx_patient_WhatsApp" type="text/html"><span id="el_patient_WhatsApp">
<input type="text" data-table="patient" data-field="x_WhatsApp" name="x_WhatsApp" id="x_WhatsApp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->WhatsApp->getPlaceHolder()) ?>" value="<?php echo $patient_edit->WhatsApp->EditValue ?>"<?php echo $patient_edit->WhatsApp->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->WhatsApp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->CouppleID->Visible) { // CouppleID ?>
	<div id="r_CouppleID" class="form-group row">
		<label id="elh_patient_CouppleID" for="x_CouppleID" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_CouppleID" type="text/html"><?php echo $patient_edit->CouppleID->caption() ?><?php echo $patient_edit->CouppleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->CouppleID->cellAttributes() ?>>
<script id="tpx_patient_CouppleID" type="text/html"><span id="el_patient_CouppleID">
<input type="text" data-table="patient" data-field="x_CouppleID" name="x_CouppleID" id="x_CouppleID" size="30" placeholder="<?php echo HtmlEncode($patient_edit->CouppleID->getPlaceHolder()) ?>" value="<?php echo $patient_edit->CouppleID->EditValue ?>"<?php echo $patient_edit->CouppleID->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->CouppleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->MaleID->Visible) { // MaleID ?>
	<div id="r_MaleID" class="form-group row">
		<label id="elh_patient_MaleID" for="x_MaleID" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_MaleID" type="text/html"><?php echo $patient_edit->MaleID->caption() ?><?php echo $patient_edit->MaleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->MaleID->cellAttributes() ?>>
<script id="tpx_patient_MaleID" type="text/html"><span id="el_patient_MaleID">
<input type="text" data-table="patient" data-field="x_MaleID" name="x_MaleID" id="x_MaleID" size="30" placeholder="<?php echo HtmlEncode($patient_edit->MaleID->getPlaceHolder()) ?>" value="<?php echo $patient_edit->MaleID->EditValue ?>"<?php echo $patient_edit->MaleID->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->MaleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->FemaleID->Visible) { // FemaleID ?>
	<div id="r_FemaleID" class="form-group row">
		<label id="elh_patient_FemaleID" for="x_FemaleID" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_FemaleID" type="text/html"><?php echo $patient_edit->FemaleID->caption() ?><?php echo $patient_edit->FemaleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->FemaleID->cellAttributes() ?>>
<script id="tpx_patient_FemaleID" type="text/html"><span id="el_patient_FemaleID">
<input type="text" data-table="patient" data-field="x_FemaleID" name="x_FemaleID" id="x_FemaleID" size="30" placeholder="<?php echo HtmlEncode($patient_edit->FemaleID->getPlaceHolder()) ?>" value="<?php echo $patient_edit->FemaleID->EditValue ?>"<?php echo $patient_edit->FemaleID->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->FemaleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->GroupID->Visible) { // GroupID ?>
	<div id="r_GroupID" class="form-group row">
		<label id="elh_patient_GroupID" for="x_GroupID" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_GroupID" type="text/html"><?php echo $patient_edit->GroupID->caption() ?><?php echo $patient_edit->GroupID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->GroupID->cellAttributes() ?>>
<script id="tpx_patient_GroupID" type="text/html"><span id="el_patient_GroupID">
<input type="text" data-table="patient" data-field="x_GroupID" name="x_GroupID" id="x_GroupID" size="30" placeholder="<?php echo HtmlEncode($patient_edit->GroupID->getPlaceHolder()) ?>" value="<?php echo $patient_edit->GroupID->EditValue ?>"<?php echo $patient_edit->GroupID->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->GroupID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->Relationship->Visible) { // Relationship ?>
	<div id="r_Relationship" class="form-group row">
		<label id="elh_patient_Relationship" for="x_Relationship" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_Relationship" type="text/html"><?php echo $patient_edit->Relationship->caption() ?><?php echo $patient_edit->Relationship->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->Relationship->cellAttributes() ?>>
<script id="tpx_patient_Relationship" type="text/html"><span id="el_patient_Relationship">
<input type="text" data-table="patient" data-field="x_Relationship" name="x_Relationship" id="x_Relationship" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->Relationship->getPlaceHolder()) ?>" value="<?php echo $patient_edit->Relationship->EditValue ?>"<?php echo $patient_edit->Relationship->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->Relationship->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->AppointmentSearch->Visible) { // AppointmentSearch ?>
	<div id="r_AppointmentSearch" class="form-group row">
		<label id="elh_patient_AppointmentSearch" for="x_AppointmentSearch" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_AppointmentSearch" type="text/html"><?php echo $patient_edit->AppointmentSearch->caption() ?><?php echo $patient_edit->AppointmentSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->AppointmentSearch->cellAttributes() ?>>
<script id="tpx_patient_AppointmentSearch" type="text/html"><span id="el_patient_AppointmentSearch">
<?php $patient_edit->AppointmentSearch->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AppointmentSearch"><?php echo EmptyValue(strval($patient_edit->AppointmentSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_edit->AppointmentSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_edit->AppointmentSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_edit->AppointmentSearch->ReadOnly || $patient_edit->AppointmentSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_AppointmentSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_edit->AppointmentSearch->Lookup->getParamTag($patient_edit, "p_x_AppointmentSearch") ?>
<input type="hidden" data-table="patient" data-field="x_AppointmentSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_edit->AppointmentSearch->displayValueSeparatorAttribute() ?>" name="x_AppointmentSearch" id="x_AppointmentSearch" value="<?php echo $patient_edit->AppointmentSearch->CurrentValue ?>"<?php echo $patient_edit->AppointmentSearch->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->AppointmentSearch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_edit->FacebookID->Visible) { // FacebookID ?>
	<div id="r_FacebookID" class="form-group row">
		<label id="elh_patient_FacebookID" for="x_FacebookID" class="<?php echo $patient_edit->LeftColumnClass ?>"><script id="tpc_patient_FacebookID" type="text/html"><?php echo $patient_edit->FacebookID->caption() ?><?php echo $patient_edit->FacebookID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_edit->RightColumnClass ?>"><div <?php echo $patient_edit->FacebookID->cellAttributes() ?>>
<script id="tpx_patient_FacebookID" type="text/html"><span id="el_patient_FacebookID">
<input type="text" data-table="patient" data-field="x_FacebookID" name="x_FacebookID" id="x_FacebookID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_edit->FacebookID->getPlaceHolder()) ?>" value="<?php echo $patient_edit->FacebookID->EditValue ?>"<?php echo $patient_edit->FacebookID->editAttributes() ?>>
</span></script>
<?php echo $patient_edit->FacebookID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patientedit" class="ew-custom-template"></div>
<script id="tpm_patientedit" type="text/html">
<div id="ct_patient_edit"><style>
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
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_patient_PatientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_PatientID")/}}</h3>
	</div>
	<div class="col-4">
	</div>
	<div class="col-4">
		<h3 class="card-title">
			{{include tmpl="#tpc_patient_AppointmentSearch"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_AppointmentSearch")/}}
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
					<span class="ew-cell">{{include tmpl="#tpc_patient_title"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_title")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_first_name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_first_name")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_middle_name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_middle_name")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_last_name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_last_name")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_gender")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_dob"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_dob")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_Age")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_blood_group"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_blood_group")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_mobile_no"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_mobile_no")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_occupation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_occupation")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_title"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_title")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_first_name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_first_name")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_middle_name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_middle_name")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_last_name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_last_name")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_gender")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_dob"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_dob")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_Age")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_blood_group"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_blood_group")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_mobile_no"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_mobile_no")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_occupation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_occupation")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_patient_street"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_street")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_town"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_town")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_province"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_province")/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_country"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_country")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_postal_code"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_postal_code")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_PEmail"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_PEmail")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_patient_IdentificationMark"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_IdentificationMark")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Religion"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_Religion")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Nationality"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_Nationality")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_profilePic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_profilePic")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_patient_Maritalstatus"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_Maritalstatus")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Business"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_Business")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Patient_Language"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_Patient_Language")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_PEmergencyContact"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_PEmergencyContact")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_description"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_description")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_WhatsApp"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_WhatsApp")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_FacebookID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_FacebookID")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferedByDr"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ReferedByDr")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferClinicname"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ReferClinicname")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferCity"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ReferCity")/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferMobileNo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ReferMobileNo")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferA4TreatingConsultant"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ReferA4TreatingConsultant")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_PurposreReferredfor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_PurposreReferredfor")/}}</span>
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
			{{include tmpl="#tpc_patient_WhereDidYouHear"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_WhereDidYouHear")/}}
			</div>
		</div>
	</div>
</div>
</div>
</script>

<?php
	if (in_array("patient_address", explode(",", $patient->getCurrentDetailTable())) && $patient_address->DetailEdit) {
?>
<?php if ($patient->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_address", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_addressgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_email", explode(",", $patient->getCurrentDetailTable())) && $patient_email->DetailEdit) {
?>
<?php if ($patient->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_email", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_emailgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_telephone", explode(",", $patient->getCurrentDetailTable())) && $patient_telephone->DetailEdit) {
?>
<?php if ($patient->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_telephone", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_telephonegrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_emergency_contact", explode(",", $patient->getCurrentDetailTable())) && $patient_emergency_contact->DetailEdit) {
?>
<?php if ($patient->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_emergency_contact", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_emergency_contactgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_document", explode(",", $patient->getCurrentDetailTable())) && $patient_document->DetailEdit) {
?>
<?php if ($patient->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_document", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_documentgrid.php" ?>
<?php } ?>
<?php if (!$patient_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient->Rows) ?> };
	ew.applyTemplate("tpd_patientedit", "tpm_patientedit", "patientedit", "<?php echo $patient->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patientedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	function handleError(e){console.error("navigator.getUserMedia error: ",e)}const constraints={video:!0};!function(){document.querySelector("#basic video"),document.querySelector("#basic .capture-button")}(),function(){const e=document.querySelector("#screenshot .capture-button"),t=document.querySelector("#screenshot-button"),c=document.querySelector("#screenshot img"),n=document.querySelector("#screenshot video"),o=document.createElement("canvas");function r(e){t.disabled=!1,n.srcObject=e}e.onclick=function(){navigator.mediaDevices.getUserMedia(constraints).then(r).catch(handleError)},t.onclick=n.onclick=function(){o.width=n.videoWidth,o.height=n.videoHeight,o.getContext("2d").drawImage(n,0,0),c.src=o.toDataURL("image/png"),document.getElementById("screenshotFF").value=c.src}}(),function(){const e=document.querySelector("#cssfilters .capture-button"),t=document.querySelector("#cssfilters-apply"),c=document.querySelector("#cssfilters video");let n=0;const o=["grayscale","sepia","blur","brightness","contrast","hue-rotate","hue-rotate2","hue-rotate3","saturate","invert",""];function r(e){c.srcObject=e}e.onclick=function(){navigator.mediaDevices.getUserMedia(constraints).then(r).catch(handleError)},t.onclick=c.onclick=function(){c.className=o[n++%o.length]}}();
});
</script>
<?php include_once "footer.php"; ?>
<?php
$patient_edit->terminate();
?>