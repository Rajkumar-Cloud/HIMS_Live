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
$patient_app_edit = new patient_app_edit();

// Run the page
$patient_app_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_app_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_appedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpatient_appedit = currentForm = new ew.Form("fpatient_appedit", "edit");

	// Validate form
	fpatient_appedit.validate = function() {
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
			<?php if ($patient_app_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->id->caption(), $patient_app_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->PatientID->caption(), $patient_app_edit->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->title->Required) { ?>
				elm = this.getElements("x" + infix + "_title");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->title->caption(), $patient_app_edit->title->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_title");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_edit->title->errorMessage()) ?>");
			<?php if ($patient_app_edit->first_name->Required) { ?>
				elm = this.getElements("x" + infix + "_first_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->first_name->caption(), $patient_app_edit->first_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->middle_name->Required) { ?>
				elm = this.getElements("x" + infix + "_middle_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->middle_name->caption(), $patient_app_edit->middle_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->last_name->Required) { ?>
				elm = this.getElements("x" + infix + "_last_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->last_name->caption(), $patient_app_edit->last_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->gender->Required) { ?>
				elm = this.getElements("x" + infix + "_gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->gender->caption(), $patient_app_edit->gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->dob->Required) { ?>
				elm = this.getElements("x" + infix + "_dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->dob->caption(), $patient_app_edit->dob->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dob");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_edit->dob->errorMessage()) ?>");
			<?php if ($patient_app_edit->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->Age->caption(), $patient_app_edit->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->blood_group->Required) { ?>
				elm = this.getElements("x" + infix + "_blood_group");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->blood_group->caption(), $patient_app_edit->blood_group->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->mobile_no->Required) { ?>
				elm = this.getElements("x" + infix + "_mobile_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->mobile_no->caption(), $patient_app_edit->mobile_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->description->Required) { ?>
				elm = this.getElements("x" + infix + "_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->description->caption(), $patient_app_edit->description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->IdentificationMark->Required) { ?>
				elm = this.getElements("x" + infix + "_IdentificationMark");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->IdentificationMark->caption(), $patient_app_edit->IdentificationMark->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->Religion->Required) { ?>
				elm = this.getElements("x" + infix + "_Religion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->Religion->caption(), $patient_app_edit->Religion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->Nationality->Required) { ?>
				elm = this.getElements("x" + infix + "_Nationality");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->Nationality->caption(), $patient_app_edit->Nationality->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->profilePic->caption(), $patient_app_edit->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->status->caption(), $patient_app_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_edit->status->errorMessage()) ?>");
			<?php if ($patient_app_edit->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->createdby->caption(), $patient_app_edit->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_edit->createdby->errorMessage()) ?>");
			<?php if ($patient_app_edit->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->createddatetime->caption(), $patient_app_edit->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_edit->createddatetime->errorMessage()) ?>");
			<?php if ($patient_app_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->modifiedby->caption(), $patient_app_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_edit->modifiedby->errorMessage()) ?>");
			<?php if ($patient_app_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->modifieddatetime->caption(), $patient_app_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_edit->modifieddatetime->errorMessage()) ?>");
			<?php if ($patient_app_edit->ReferedByDr->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferedByDr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->ReferedByDr->caption(), $patient_app_edit->ReferedByDr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->ReferClinicname->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferClinicname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->ReferClinicname->caption(), $patient_app_edit->ReferClinicname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->ReferCity->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferCity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->ReferCity->caption(), $patient_app_edit->ReferCity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->ReferMobileNo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferMobileNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->ReferMobileNo->caption(), $patient_app_edit->ReferMobileNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->ReferA4TreatingConsultant->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferA4TreatingConsultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->ReferA4TreatingConsultant->caption(), $patient_app_edit->ReferA4TreatingConsultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->PurposreReferredfor->Required) { ?>
				elm = this.getElements("x" + infix + "_PurposreReferredfor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->PurposreReferredfor->caption(), $patient_app_edit->PurposreReferredfor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->spouse_title->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_title");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->spouse_title->caption(), $patient_app_edit->spouse_title->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->spouse_first_name->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_first_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->spouse_first_name->caption(), $patient_app_edit->spouse_first_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->spouse_middle_name->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_middle_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->spouse_middle_name->caption(), $patient_app_edit->spouse_middle_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->spouse_last_name->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_last_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->spouse_last_name->caption(), $patient_app_edit->spouse_last_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->spouse_gender->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->spouse_gender->caption(), $patient_app_edit->spouse_gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->spouse_dob->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->spouse_dob->caption(), $patient_app_edit->spouse_dob->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_spouse_dob");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_edit->spouse_dob->errorMessage()) ?>");
			<?php if ($patient_app_edit->spouse_Age->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->spouse_Age->caption(), $patient_app_edit->spouse_Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->spouse_blood_group->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_blood_group");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->spouse_blood_group->caption(), $patient_app_edit->spouse_blood_group->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->spouse_mobile_no->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_mobile_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->spouse_mobile_no->caption(), $patient_app_edit->spouse_mobile_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->Maritalstatus->Required) { ?>
				elm = this.getElements("x" + infix + "_Maritalstatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->Maritalstatus->caption(), $patient_app_edit->Maritalstatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->Business->Required) { ?>
				elm = this.getElements("x" + infix + "_Business");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->Business->caption(), $patient_app_edit->Business->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->Patient_Language->Required) { ?>
				elm = this.getElements("x" + infix + "_Patient_Language");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->Patient_Language->caption(), $patient_app_edit->Patient_Language->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->Passport->Required) { ?>
				elm = this.getElements("x" + infix + "_Passport");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->Passport->caption(), $patient_app_edit->Passport->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->VisaNo->Required) { ?>
				elm = this.getElements("x" + infix + "_VisaNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->VisaNo->caption(), $patient_app_edit->VisaNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->ValidityOfVisa->Required) { ?>
				elm = this.getElements("x" + infix + "_ValidityOfVisa");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->ValidityOfVisa->caption(), $patient_app_edit->ValidityOfVisa->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->WhereDidYouHear->Required) { ?>
				elm = this.getElements("x" + infix + "_WhereDidYouHear");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->WhereDidYouHear->caption(), $patient_app_edit->WhereDidYouHear->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->HospID->caption(), $patient_app_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->street->Required) { ?>
				elm = this.getElements("x" + infix + "_street");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->street->caption(), $patient_app_edit->street->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->town->Required) { ?>
				elm = this.getElements("x" + infix + "_town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->town->caption(), $patient_app_edit->town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->province->Required) { ?>
				elm = this.getElements("x" + infix + "_province");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->province->caption(), $patient_app_edit->province->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->country->Required) { ?>
				elm = this.getElements("x" + infix + "_country");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->country->caption(), $patient_app_edit->country->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->postal_code->Required) { ?>
				elm = this.getElements("x" + infix + "_postal_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->postal_code->caption(), $patient_app_edit->postal_code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->PEmail->Required) { ?>
				elm = this.getElements("x" + infix + "_PEmail");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->PEmail->caption(), $patient_app_edit->PEmail->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->PEmergencyContact->Required) { ?>
				elm = this.getElements("x" + infix + "_PEmergencyContact");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->PEmergencyContact->caption(), $patient_app_edit->PEmergencyContact->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->occupation->Required) { ?>
				elm = this.getElements("x" + infix + "_occupation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->occupation->caption(), $patient_app_edit->occupation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->spouse_occupation->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_occupation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->spouse_occupation->caption(), $patient_app_edit->spouse_occupation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->WhatsApp->Required) { ?>
				elm = this.getElements("x" + infix + "_WhatsApp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->WhatsApp->caption(), $patient_app_edit->WhatsApp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_edit->CouppleID->Required) { ?>
				elm = this.getElements("x" + infix + "_CouppleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->CouppleID->caption(), $patient_app_edit->CouppleID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CouppleID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_edit->CouppleID->errorMessage()) ?>");
			<?php if ($patient_app_edit->MaleID->Required) { ?>
				elm = this.getElements("x" + infix + "_MaleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->MaleID->caption(), $patient_app_edit->MaleID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MaleID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_edit->MaleID->errorMessage()) ?>");
			<?php if ($patient_app_edit->FemaleID->Required) { ?>
				elm = this.getElements("x" + infix + "_FemaleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->FemaleID->caption(), $patient_app_edit->FemaleID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FemaleID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_edit->FemaleID->errorMessage()) ?>");
			<?php if ($patient_app_edit->GroupID->Required) { ?>
				elm = this.getElements("x" + infix + "_GroupID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->GroupID->caption(), $patient_app_edit->GroupID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GroupID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_edit->GroupID->errorMessage()) ?>");
			<?php if ($patient_app_edit->Relationship->Required) { ?>
				elm = this.getElements("x" + infix + "_Relationship");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_edit->Relationship->caption(), $patient_app_edit->Relationship->RequiredErrorMessage)) ?>");
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
	fpatient_appedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_appedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpatient_appedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_app_edit->showPageHeader(); ?>
<?php
$patient_app_edit->showMessage();
?>
<form name="fpatient_appedit" id="fpatient_appedit" class="<?php echo $patient_app_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_app">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_app_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($patient_app_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_app_id" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->id->caption() ?><?php echo $patient_app_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->id->cellAttributes() ?>>
<span id="el_patient_app_id">
<span<?php echo $patient_app_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_app_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_app" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_app_edit->id->CurrentValue) ?>">
<?php echo $patient_app_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_patient_app_PatientID" for="x_PatientID" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->PatientID->caption() ?><?php echo $patient_app_edit->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->PatientID->cellAttributes() ?>>
<input type="text" data-table="patient_app" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->PatientID->EditValue ?>"<?php echo $patient_app_edit->PatientID->editAttributes() ?>>
<input type="hidden" data-table="patient_app" data-field="x_PatientID" name="o_PatientID" id="o_PatientID" value="<?php echo HtmlEncode($patient_app_edit->PatientID->OldValue != null ? $patient_app_edit->PatientID->OldValue : $patient_app_edit->PatientID->CurrentValue) ?>">
<?php echo $patient_app_edit->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->title->Visible) { // title ?>
	<div id="r_title" class="form-group row">
		<label id="elh_patient_app_title" for="x_title" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->title->caption() ?><?php echo $patient_app_edit->title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->title->cellAttributes() ?>>
<span id="el_patient_app_title">
<input type="text" data-table="patient_app" data-field="x_title" name="x_title" id="x_title" size="30" placeholder="<?php echo HtmlEncode($patient_app_edit->title->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->title->EditValue ?>"<?php echo $patient_app_edit->title->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->first_name->Visible) { // first_name ?>
	<div id="r_first_name" class="form-group row">
		<label id="elh_patient_app_first_name" for="x_first_name" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->first_name->caption() ?><?php echo $patient_app_edit->first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->first_name->cellAttributes() ?>>
<span id="el_patient_app_first_name">
<input type="text" data-table="patient_app" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_app_edit->first_name->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->first_name->EditValue ?>"<?php echo $patient_app_edit->first_name->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->first_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->middle_name->Visible) { // middle_name ?>
	<div id="r_middle_name" class="form-group row">
		<label id="elh_patient_app_middle_name" for="x_middle_name" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->middle_name->caption() ?><?php echo $patient_app_edit->middle_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->middle_name->cellAttributes() ?>>
<span id="el_patient_app_middle_name">
<input type="text" data-table="patient_app" data-field="x_middle_name" name="x_middle_name" id="x_middle_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_app_edit->middle_name->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->middle_name->EditValue ?>"<?php echo $patient_app_edit->middle_name->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->middle_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->last_name->Visible) { // last_name ?>
	<div id="r_last_name" class="form-group row">
		<label id="elh_patient_app_last_name" for="x_last_name" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->last_name->caption() ?><?php echo $patient_app_edit->last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->last_name->cellAttributes() ?>>
<span id="el_patient_app_last_name">
<input type="text" data-table="patient_app" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_app_edit->last_name->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->last_name->EditValue ?>"<?php echo $patient_app_edit->last_name->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->last_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_patient_app_gender" for="x_gender" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->gender->caption() ?><?php echo $patient_app_edit->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->gender->cellAttributes() ?>>
<span id="el_patient_app_gender">
<input type="text" data-table="patient_app" data-field="x_gender" name="x_gender" id="x_gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->gender->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->gender->EditValue ?>"<?php echo $patient_app_edit->gender->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->dob->Visible) { // dob ?>
	<div id="r_dob" class="form-group row">
		<label id="elh_patient_app_dob" for="x_dob" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->dob->caption() ?><?php echo $patient_app_edit->dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->dob->cellAttributes() ?>>
<span id="el_patient_app_dob">
<input type="text" data-table="patient_app" data-field="x_dob" name="x_dob" id="x_dob" placeholder="<?php echo HtmlEncode($patient_app_edit->dob->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->dob->EditValue ?>"<?php echo $patient_app_edit->dob->editAttributes() ?>>
<?php if (!$patient_app_edit->dob->ReadOnly && !$patient_app_edit->dob->Disabled && !isset($patient_app_edit->dob->EditAttrs["readonly"]) && !isset($patient_app_edit->dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_appedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_appedit", "x_dob", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_app_edit->dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_app_Age" for="x_Age" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->Age->caption() ?><?php echo $patient_app_edit->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->Age->cellAttributes() ?>>
<span id="el_patient_app_Age">
<input type="text" data-table="patient_app" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->Age->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->Age->EditValue ?>"<?php echo $patient_app_edit->Age->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->blood_group->Visible) { // blood_group ?>
	<div id="r_blood_group" class="form-group row">
		<label id="elh_patient_app_blood_group" for="x_blood_group" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->blood_group->caption() ?><?php echo $patient_app_edit->blood_group->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->blood_group->cellAttributes() ?>>
<span id="el_patient_app_blood_group">
<input type="text" data-table="patient_app" data-field="x_blood_group" name="x_blood_group" id="x_blood_group" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->blood_group->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->blood_group->EditValue ?>"<?php echo $patient_app_edit->blood_group->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->blood_group->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->mobile_no->Visible) { // mobile_no ?>
	<div id="r_mobile_no" class="form-group row">
		<label id="elh_patient_app_mobile_no" for="x_mobile_no" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->mobile_no->caption() ?><?php echo $patient_app_edit->mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->mobile_no->cellAttributes() ?>>
<span id="el_patient_app_mobile_no">
<input type="text" data-table="patient_app" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->mobile_no->EditValue ?>"<?php echo $patient_app_edit->mobile_no->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->mobile_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_patient_app_description" for="x_description" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->description->caption() ?><?php echo $patient_app_edit->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->description->cellAttributes() ?>>
<span id="el_patient_app_description">
<textarea data-table="patient_app" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_app_edit->description->getPlaceHolder()) ?>"<?php echo $patient_app_edit->description->editAttributes() ?>><?php echo $patient_app_edit->description->EditValue ?></textarea>
</span>
<?php echo $patient_app_edit->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->IdentificationMark->Visible) { // IdentificationMark ?>
	<div id="r_IdentificationMark" class="form-group row">
		<label id="elh_patient_app_IdentificationMark" for="x_IdentificationMark" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->IdentificationMark->caption() ?><?php echo $patient_app_edit->IdentificationMark->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->IdentificationMark->cellAttributes() ?>>
<span id="el_patient_app_IdentificationMark">
<input type="text" data-table="patient_app" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->IdentificationMark->EditValue ?>"<?php echo $patient_app_edit->IdentificationMark->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->IdentificationMark->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->Religion->Visible) { // Religion ?>
	<div id="r_Religion" class="form-group row">
		<label id="elh_patient_app_Religion" for="x_Religion" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->Religion->caption() ?><?php echo $patient_app_edit->Religion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->Religion->cellAttributes() ?>>
<span id="el_patient_app_Religion">
<input type="text" data-table="patient_app" data-field="x_Religion" name="x_Religion" id="x_Religion" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->Religion->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->Religion->EditValue ?>"<?php echo $patient_app_edit->Religion->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->Religion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->Nationality->Visible) { // Nationality ?>
	<div id="r_Nationality" class="form-group row">
		<label id="elh_patient_app_Nationality" for="x_Nationality" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->Nationality->caption() ?><?php echo $patient_app_edit->Nationality->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->Nationality->cellAttributes() ?>>
<span id="el_patient_app_Nationality">
<input type="text" data-table="patient_app" data-field="x_Nationality" name="x_Nationality" id="x_Nationality" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->Nationality->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->Nationality->EditValue ?>"<?php echo $patient_app_edit->Nationality->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->Nationality->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_app_profilePic" for="x_profilePic" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->profilePic->caption() ?><?php echo $patient_app_edit->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->profilePic->cellAttributes() ?>>
<span id="el_patient_app_profilePic">
<input type="text" data-table="patient_app" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_app_edit->profilePic->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->profilePic->EditValue ?>"<?php echo $patient_app_edit->profilePic->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_app_status" for="x_status" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->status->caption() ?><?php echo $patient_app_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->status->cellAttributes() ?>>
<span id="el_patient_app_status">
<input type="text" data-table="patient_app" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($patient_app_edit->status->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->status->EditValue ?>"<?php echo $patient_app_edit->status->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_patient_app_createdby" for="x_createdby" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->createdby->caption() ?><?php echo $patient_app_edit->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->createdby->cellAttributes() ?>>
<span id="el_patient_app_createdby">
<input type="text" data-table="patient_app" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_app_edit->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->createdby->EditValue ?>"<?php echo $patient_app_edit->createdby->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_patient_app_createddatetime" for="x_createddatetime" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->createddatetime->caption() ?><?php echo $patient_app_edit->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->createddatetime->cellAttributes() ?>>
<span id="el_patient_app_createddatetime">
<input type="text" data-table="patient_app" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_app_edit->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->createddatetime->EditValue ?>"<?php echo $patient_app_edit->createddatetime->editAttributes() ?>>
<?php if (!$patient_app_edit->createddatetime->ReadOnly && !$patient_app_edit->createddatetime->Disabled && !isset($patient_app_edit->createddatetime->EditAttrs["readonly"]) && !isset($patient_app_edit->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_appedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_appedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_app_edit->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_patient_app_modifiedby" for="x_modifiedby" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->modifiedby->caption() ?><?php echo $patient_app_edit->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->modifiedby->cellAttributes() ?>>
<span id="el_patient_app_modifiedby">
<input type="text" data-table="patient_app" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_app_edit->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->modifiedby->EditValue ?>"<?php echo $patient_app_edit->modifiedby->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_patient_app_modifieddatetime" for="x_modifieddatetime" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->modifieddatetime->caption() ?><?php echo $patient_app_edit->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_app_modifieddatetime">
<input type="text" data-table="patient_app" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_app_edit->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->modifieddatetime->EditValue ?>"<?php echo $patient_app_edit->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_app_edit->modifieddatetime->ReadOnly && !$patient_app_edit->modifieddatetime->Disabled && !isset($patient_app_edit->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_app_edit->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_appedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_appedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_app_edit->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->ReferedByDr->Visible) { // ReferedByDr ?>
	<div id="r_ReferedByDr" class="form-group row">
		<label id="elh_patient_app_ReferedByDr" for="x_ReferedByDr" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->ReferedByDr->caption() ?><?php echo $patient_app_edit->ReferedByDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->ReferedByDr->cellAttributes() ?>>
<span id="el_patient_app_ReferedByDr">
<input type="text" data-table="patient_app" data-field="x_ReferedByDr" name="x_ReferedByDr" id="x_ReferedByDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->ReferedByDr->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->ReferedByDr->EditValue ?>"<?php echo $patient_app_edit->ReferedByDr->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->ReferedByDr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label id="elh_patient_app_ReferClinicname" for="x_ReferClinicname" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->ReferClinicname->caption() ?><?php echo $patient_app_edit->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->ReferClinicname->cellAttributes() ?>>
<span id="el_patient_app_ReferClinicname">
<input type="text" data-table="patient_app" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->ReferClinicname->EditValue ?>"<?php echo $patient_app_edit->ReferClinicname->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->ReferClinicname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label id="elh_patient_app_ReferCity" for="x_ReferCity" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->ReferCity->caption() ?><?php echo $patient_app_edit->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->ReferCity->cellAttributes() ?>>
<span id="el_patient_app_ReferCity">
<input type="text" data-table="patient_app" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->ReferCity->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->ReferCity->EditValue ?>"<?php echo $patient_app_edit->ReferCity->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->ReferCity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label id="elh_patient_app_ReferMobileNo" for="x_ReferMobileNo" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->ReferMobileNo->caption() ?><?php echo $patient_app_edit->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->ReferMobileNo->cellAttributes() ?>>
<span id="el_patient_app_ReferMobileNo">
<input type="text" data-table="patient_app" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->ReferMobileNo->EditValue ?>"<?php echo $patient_app_edit->ReferMobileNo->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->ReferMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div id="r_ReferA4TreatingConsultant" class="form-group row">
		<label id="elh_patient_app_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->ReferA4TreatingConsultant->caption() ?><?php echo $patient_app_edit->ReferA4TreatingConsultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el_patient_app_ReferA4TreatingConsultant">
<input type="text" data-table="patient_app" data-field="x_ReferA4TreatingConsultant" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->ReferA4TreatingConsultant->EditValue ?>"<?php echo $patient_app_edit->ReferA4TreatingConsultant->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->ReferA4TreatingConsultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div id="r_PurposreReferredfor" class="form-group row">
		<label id="elh_patient_app_PurposreReferredfor" for="x_PurposreReferredfor" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->PurposreReferredfor->caption() ?><?php echo $patient_app_edit->PurposreReferredfor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->PurposreReferredfor->cellAttributes() ?>>
<span id="el_patient_app_PurposreReferredfor">
<input type="text" data-table="patient_app" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->PurposreReferredfor->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->PurposreReferredfor->EditValue ?>"<?php echo $patient_app_edit->PurposreReferredfor->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->PurposreReferredfor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->spouse_title->Visible) { // spouse_title ?>
	<div id="r_spouse_title" class="form-group row">
		<label id="elh_patient_app_spouse_title" for="x_spouse_title" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->spouse_title->caption() ?><?php echo $patient_app_edit->spouse_title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->spouse_title->cellAttributes() ?>>
<span id="el_patient_app_spouse_title">
<input type="text" data-table="patient_app" data-field="x_spouse_title" name="x_spouse_title" id="x_spouse_title" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->spouse_title->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->spouse_title->EditValue ?>"<?php echo $patient_app_edit->spouse_title->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->spouse_title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->spouse_first_name->Visible) { // spouse_first_name ?>
	<div id="r_spouse_first_name" class="form-group row">
		<label id="elh_patient_app_spouse_first_name" for="x_spouse_first_name" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->spouse_first_name->caption() ?><?php echo $patient_app_edit->spouse_first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->spouse_first_name->cellAttributes() ?>>
<span id="el_patient_app_spouse_first_name">
<input type="text" data-table="patient_app" data-field="x_spouse_first_name" name="x_spouse_first_name" id="x_spouse_first_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->spouse_first_name->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->spouse_first_name->EditValue ?>"<?php echo $patient_app_edit->spouse_first_name->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->spouse_first_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<div id="r_spouse_middle_name" class="form-group row">
		<label id="elh_patient_app_spouse_middle_name" for="x_spouse_middle_name" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->spouse_middle_name->caption() ?><?php echo $patient_app_edit->spouse_middle_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->spouse_middle_name->cellAttributes() ?>>
<span id="el_patient_app_spouse_middle_name">
<input type="text" data-table="patient_app" data-field="x_spouse_middle_name" name="x_spouse_middle_name" id="x_spouse_middle_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->spouse_middle_name->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->spouse_middle_name->EditValue ?>"<?php echo $patient_app_edit->spouse_middle_name->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->spouse_middle_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->spouse_last_name->Visible) { // spouse_last_name ?>
	<div id="r_spouse_last_name" class="form-group row">
		<label id="elh_patient_app_spouse_last_name" for="x_spouse_last_name" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->spouse_last_name->caption() ?><?php echo $patient_app_edit->spouse_last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->spouse_last_name->cellAttributes() ?>>
<span id="el_patient_app_spouse_last_name">
<input type="text" data-table="patient_app" data-field="x_spouse_last_name" name="x_spouse_last_name" id="x_spouse_last_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->spouse_last_name->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->spouse_last_name->EditValue ?>"<?php echo $patient_app_edit->spouse_last_name->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->spouse_last_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->spouse_gender->Visible) { // spouse_gender ?>
	<div id="r_spouse_gender" class="form-group row">
		<label id="elh_patient_app_spouse_gender" for="x_spouse_gender" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->spouse_gender->caption() ?><?php echo $patient_app_edit->spouse_gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->spouse_gender->cellAttributes() ?>>
<span id="el_patient_app_spouse_gender">
<input type="text" data-table="patient_app" data-field="x_spouse_gender" name="x_spouse_gender" id="x_spouse_gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->spouse_gender->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->spouse_gender->EditValue ?>"<?php echo $patient_app_edit->spouse_gender->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->spouse_gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->spouse_dob->Visible) { // spouse_dob ?>
	<div id="r_spouse_dob" class="form-group row">
		<label id="elh_patient_app_spouse_dob" for="x_spouse_dob" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->spouse_dob->caption() ?><?php echo $patient_app_edit->spouse_dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->spouse_dob->cellAttributes() ?>>
<span id="el_patient_app_spouse_dob">
<input type="text" data-table="patient_app" data-field="x_spouse_dob" name="x_spouse_dob" id="x_spouse_dob" placeholder="<?php echo HtmlEncode($patient_app_edit->spouse_dob->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->spouse_dob->EditValue ?>"<?php echo $patient_app_edit->spouse_dob->editAttributes() ?>>
<?php if (!$patient_app_edit->spouse_dob->ReadOnly && !$patient_app_edit->spouse_dob->Disabled && !isset($patient_app_edit->spouse_dob->EditAttrs["readonly"]) && !isset($patient_app_edit->spouse_dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_appedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_appedit", "x_spouse_dob", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_app_edit->spouse_dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->spouse_Age->Visible) { // spouse_Age ?>
	<div id="r_spouse_Age" class="form-group row">
		<label id="elh_patient_app_spouse_Age" for="x_spouse_Age" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->spouse_Age->caption() ?><?php echo $patient_app_edit->spouse_Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->spouse_Age->cellAttributes() ?>>
<span id="el_patient_app_spouse_Age">
<input type="text" data-table="patient_app" data-field="x_spouse_Age" name="x_spouse_Age" id="x_spouse_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->spouse_Age->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->spouse_Age->EditValue ?>"<?php echo $patient_app_edit->spouse_Age->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->spouse_Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<div id="r_spouse_blood_group" class="form-group row">
		<label id="elh_patient_app_spouse_blood_group" for="x_spouse_blood_group" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->spouse_blood_group->caption() ?><?php echo $patient_app_edit->spouse_blood_group->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->spouse_blood_group->cellAttributes() ?>>
<span id="el_patient_app_spouse_blood_group">
<input type="text" data-table="patient_app" data-field="x_spouse_blood_group" name="x_spouse_blood_group" id="x_spouse_blood_group" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->spouse_blood_group->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->spouse_blood_group->EditValue ?>"<?php echo $patient_app_edit->spouse_blood_group->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->spouse_blood_group->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<div id="r_spouse_mobile_no" class="form-group row">
		<label id="elh_patient_app_spouse_mobile_no" for="x_spouse_mobile_no" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->spouse_mobile_no->caption() ?><?php echo $patient_app_edit->spouse_mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->spouse_mobile_no->cellAttributes() ?>>
<span id="el_patient_app_spouse_mobile_no">
<input type="text" data-table="patient_app" data-field="x_spouse_mobile_no" name="x_spouse_mobile_no" id="x_spouse_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->spouse_mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->spouse_mobile_no->EditValue ?>"<?php echo $patient_app_edit->spouse_mobile_no->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->spouse_mobile_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->Maritalstatus->Visible) { // Maritalstatus ?>
	<div id="r_Maritalstatus" class="form-group row">
		<label id="elh_patient_app_Maritalstatus" for="x_Maritalstatus" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->Maritalstatus->caption() ?><?php echo $patient_app_edit->Maritalstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->Maritalstatus->cellAttributes() ?>>
<span id="el_patient_app_Maritalstatus">
<input type="text" data-table="patient_app" data-field="x_Maritalstatus" name="x_Maritalstatus" id="x_Maritalstatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->Maritalstatus->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->Maritalstatus->EditValue ?>"<?php echo $patient_app_edit->Maritalstatus->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->Maritalstatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->Business->Visible) { // Business ?>
	<div id="r_Business" class="form-group row">
		<label id="elh_patient_app_Business" for="x_Business" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->Business->caption() ?><?php echo $patient_app_edit->Business->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->Business->cellAttributes() ?>>
<span id="el_patient_app_Business">
<input type="text" data-table="patient_app" data-field="x_Business" name="x_Business" id="x_Business" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->Business->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->Business->EditValue ?>"<?php echo $patient_app_edit->Business->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->Business->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->Patient_Language->Visible) { // Patient_Language ?>
	<div id="r_Patient_Language" class="form-group row">
		<label id="elh_patient_app_Patient_Language" for="x_Patient_Language" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->Patient_Language->caption() ?><?php echo $patient_app_edit->Patient_Language->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->Patient_Language->cellAttributes() ?>>
<span id="el_patient_app_Patient_Language">
<input type="text" data-table="patient_app" data-field="x_Patient_Language" name="x_Patient_Language" id="x_Patient_Language" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->Patient_Language->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->Patient_Language->EditValue ?>"<?php echo $patient_app_edit->Patient_Language->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->Patient_Language->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->Passport->Visible) { // Passport ?>
	<div id="r_Passport" class="form-group row">
		<label id="elh_patient_app_Passport" for="x_Passport" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->Passport->caption() ?><?php echo $patient_app_edit->Passport->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->Passport->cellAttributes() ?>>
<span id="el_patient_app_Passport">
<input type="text" data-table="patient_app" data-field="x_Passport" name="x_Passport" id="x_Passport" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->Passport->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->Passport->EditValue ?>"<?php echo $patient_app_edit->Passport->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->Passport->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->VisaNo->Visible) { // VisaNo ?>
	<div id="r_VisaNo" class="form-group row">
		<label id="elh_patient_app_VisaNo" for="x_VisaNo" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->VisaNo->caption() ?><?php echo $patient_app_edit->VisaNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->VisaNo->cellAttributes() ?>>
<span id="el_patient_app_VisaNo">
<input type="text" data-table="patient_app" data-field="x_VisaNo" name="x_VisaNo" id="x_VisaNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->VisaNo->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->VisaNo->EditValue ?>"<?php echo $patient_app_edit->VisaNo->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->VisaNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<div id="r_ValidityOfVisa" class="form-group row">
		<label id="elh_patient_app_ValidityOfVisa" for="x_ValidityOfVisa" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->ValidityOfVisa->caption() ?><?php echo $patient_app_edit->ValidityOfVisa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->ValidityOfVisa->cellAttributes() ?>>
<span id="el_patient_app_ValidityOfVisa">
<input type="text" data-table="patient_app" data-field="x_ValidityOfVisa" name="x_ValidityOfVisa" id="x_ValidityOfVisa" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->ValidityOfVisa->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->ValidityOfVisa->EditValue ?>"<?php echo $patient_app_edit->ValidityOfVisa->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->ValidityOfVisa->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<div id="r_WhereDidYouHear" class="form-group row">
		<label id="elh_patient_app_WhereDidYouHear" for="x_WhereDidYouHear" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->WhereDidYouHear->caption() ?><?php echo $patient_app_edit->WhereDidYouHear->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->WhereDidYouHear->cellAttributes() ?>>
<span id="el_patient_app_WhereDidYouHear">
<input type="text" data-table="patient_app" data-field="x_WhereDidYouHear" name="x_WhereDidYouHear" id="x_WhereDidYouHear" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->WhereDidYouHear->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->WhereDidYouHear->EditValue ?>"<?php echo $patient_app_edit->WhereDidYouHear->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->WhereDidYouHear->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_patient_app_HospID" for="x_HospID" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->HospID->caption() ?><?php echo $patient_app_edit->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->HospID->cellAttributes() ?>>
<span id="el_patient_app_HospID">
<input type="text" data-table="patient_app" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->HospID->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->HospID->EditValue ?>"<?php echo $patient_app_edit->HospID->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label id="elh_patient_app_street" for="x_street" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->street->caption() ?><?php echo $patient_app_edit->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->street->cellAttributes() ?>>
<span id="el_patient_app_street">
<input type="text" data-table="patient_app" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_app_edit->street->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->street->EditValue ?>"<?php echo $patient_app_edit->street->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label id="elh_patient_app_town" for="x_town" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->town->caption() ?><?php echo $patient_app_edit->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->town->cellAttributes() ?>>
<span id="el_patient_app_town">
<input type="text" data-table="patient_app" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_app_edit->town->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->town->EditValue ?>"<?php echo $patient_app_edit->town->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_patient_app_province" for="x_province" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->province->caption() ?><?php echo $patient_app_edit->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->province->cellAttributes() ?>>
<span id="el_patient_app_province">
<input type="text" data-table="patient_app" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_app_edit->province->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->province->EditValue ?>"<?php echo $patient_app_edit->province->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->country->Visible) { // country ?>
	<div id="r_country" class="form-group row">
		<label id="elh_patient_app_country" for="x_country" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->country->caption() ?><?php echo $patient_app_edit->country->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->country->cellAttributes() ?>>
<span id="el_patient_app_country">
<input type="text" data-table="patient_app" data-field="x_country" name="x_country" id="x_country" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_app_edit->country->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->country->EditValue ?>"<?php echo $patient_app_edit->country->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->country->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_patient_app_postal_code" for="x_postal_code" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->postal_code->caption() ?><?php echo $patient_app_edit->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->postal_code->cellAttributes() ?>>
<span id="el_patient_app_postal_code">
<input type="text" data-table="patient_app" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_app_edit->postal_code->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->postal_code->EditValue ?>"<?php echo $patient_app_edit->postal_code->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->PEmail->Visible) { // PEmail ?>
	<div id="r_PEmail" class="form-group row">
		<label id="elh_patient_app_PEmail" for="x_PEmail" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->PEmail->caption() ?><?php echo $patient_app_edit->PEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->PEmail->cellAttributes() ?>>
<span id="el_patient_app_PEmail">
<input type="text" data-table="patient_app" data-field="x_PEmail" name="x_PEmail" id="x_PEmail" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_app_edit->PEmail->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->PEmail->EditValue ?>"<?php echo $patient_app_edit->PEmail->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->PEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<div id="r_PEmergencyContact" class="form-group row">
		<label id="elh_patient_app_PEmergencyContact" for="x_PEmergencyContact" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->PEmergencyContact->caption() ?><?php echo $patient_app_edit->PEmergencyContact->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->PEmergencyContact->cellAttributes() ?>>
<span id="el_patient_app_PEmergencyContact">
<input type="text" data-table="patient_app" data-field="x_PEmergencyContact" name="x_PEmergencyContact" id="x_PEmergencyContact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_app_edit->PEmergencyContact->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->PEmergencyContact->EditValue ?>"<?php echo $patient_app_edit->PEmergencyContact->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->PEmergencyContact->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->occupation->Visible) { // occupation ?>
	<div id="r_occupation" class="form-group row">
		<label id="elh_patient_app_occupation" for="x_occupation" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->occupation->caption() ?><?php echo $patient_app_edit->occupation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->occupation->cellAttributes() ?>>
<span id="el_patient_app_occupation">
<input type="text" data-table="patient_app" data-field="x_occupation" name="x_occupation" id="x_occupation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->occupation->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->occupation->EditValue ?>"<?php echo $patient_app_edit->occupation->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->occupation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->spouse_occupation->Visible) { // spouse_occupation ?>
	<div id="r_spouse_occupation" class="form-group row">
		<label id="elh_patient_app_spouse_occupation" for="x_spouse_occupation" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->spouse_occupation->caption() ?><?php echo $patient_app_edit->spouse_occupation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->spouse_occupation->cellAttributes() ?>>
<span id="el_patient_app_spouse_occupation">
<input type="text" data-table="patient_app" data-field="x_spouse_occupation" name="x_spouse_occupation" id="x_spouse_occupation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->spouse_occupation->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->spouse_occupation->EditValue ?>"<?php echo $patient_app_edit->spouse_occupation->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->spouse_occupation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->WhatsApp->Visible) { // WhatsApp ?>
	<div id="r_WhatsApp" class="form-group row">
		<label id="elh_patient_app_WhatsApp" for="x_WhatsApp" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->WhatsApp->caption() ?><?php echo $patient_app_edit->WhatsApp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->WhatsApp->cellAttributes() ?>>
<span id="el_patient_app_WhatsApp">
<input type="text" data-table="patient_app" data-field="x_WhatsApp" name="x_WhatsApp" id="x_WhatsApp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->WhatsApp->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->WhatsApp->EditValue ?>"<?php echo $patient_app_edit->WhatsApp->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->WhatsApp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->CouppleID->Visible) { // CouppleID ?>
	<div id="r_CouppleID" class="form-group row">
		<label id="elh_patient_app_CouppleID" for="x_CouppleID" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->CouppleID->caption() ?><?php echo $patient_app_edit->CouppleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->CouppleID->cellAttributes() ?>>
<span id="el_patient_app_CouppleID">
<input type="text" data-table="patient_app" data-field="x_CouppleID" name="x_CouppleID" id="x_CouppleID" size="30" placeholder="<?php echo HtmlEncode($patient_app_edit->CouppleID->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->CouppleID->EditValue ?>"<?php echo $patient_app_edit->CouppleID->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->CouppleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->MaleID->Visible) { // MaleID ?>
	<div id="r_MaleID" class="form-group row">
		<label id="elh_patient_app_MaleID" for="x_MaleID" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->MaleID->caption() ?><?php echo $patient_app_edit->MaleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->MaleID->cellAttributes() ?>>
<span id="el_patient_app_MaleID">
<input type="text" data-table="patient_app" data-field="x_MaleID" name="x_MaleID" id="x_MaleID" size="30" placeholder="<?php echo HtmlEncode($patient_app_edit->MaleID->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->MaleID->EditValue ?>"<?php echo $patient_app_edit->MaleID->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->MaleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->FemaleID->Visible) { // FemaleID ?>
	<div id="r_FemaleID" class="form-group row">
		<label id="elh_patient_app_FemaleID" for="x_FemaleID" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->FemaleID->caption() ?><?php echo $patient_app_edit->FemaleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->FemaleID->cellAttributes() ?>>
<span id="el_patient_app_FemaleID">
<input type="text" data-table="patient_app" data-field="x_FemaleID" name="x_FemaleID" id="x_FemaleID" size="30" placeholder="<?php echo HtmlEncode($patient_app_edit->FemaleID->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->FemaleID->EditValue ?>"<?php echo $patient_app_edit->FemaleID->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->FemaleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->GroupID->Visible) { // GroupID ?>
	<div id="r_GroupID" class="form-group row">
		<label id="elh_patient_app_GroupID" for="x_GroupID" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->GroupID->caption() ?><?php echo $patient_app_edit->GroupID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->GroupID->cellAttributes() ?>>
<span id="el_patient_app_GroupID">
<input type="text" data-table="patient_app" data-field="x_GroupID" name="x_GroupID" id="x_GroupID" size="30" placeholder="<?php echo HtmlEncode($patient_app_edit->GroupID->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->GroupID->EditValue ?>"<?php echo $patient_app_edit->GroupID->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->GroupID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_edit->Relationship->Visible) { // Relationship ?>
	<div id="r_Relationship" class="form-group row">
		<label id="elh_patient_app_Relationship" for="x_Relationship" class="<?php echo $patient_app_edit->LeftColumnClass ?>"><?php echo $patient_app_edit->Relationship->caption() ?><?php echo $patient_app_edit->Relationship->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_edit->RightColumnClass ?>"><div <?php echo $patient_app_edit->Relationship->cellAttributes() ?>>
<span id="el_patient_app_Relationship">
<input type="text" data-table="patient_app" data-field="x_Relationship" name="x_Relationship" id="x_Relationship" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_edit->Relationship->getPlaceHolder()) ?>" value="<?php echo $patient_app_edit->Relationship->EditValue ?>"<?php echo $patient_app_edit->Relationship->editAttributes() ?>>
</span>
<?php echo $patient_app_edit->Relationship->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_app_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_app_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_app_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_app_edit->showPageFooter();
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
$patient_app_edit->terminate();
?>