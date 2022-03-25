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
$patient_app_add = new patient_app_add();

// Run the page
$patient_app_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_app_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_appadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpatient_appadd = currentForm = new ew.Form("fpatient_appadd", "add");

	// Validate form
	fpatient_appadd.validate = function() {
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
			<?php if ($patient_app_add->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->PatientID->caption(), $patient_app_add->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->title->Required) { ?>
				elm = this.getElements("x" + infix + "_title");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->title->caption(), $patient_app_add->title->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_title");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_add->title->errorMessage()) ?>");
			<?php if ($patient_app_add->first_name->Required) { ?>
				elm = this.getElements("x" + infix + "_first_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->first_name->caption(), $patient_app_add->first_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->middle_name->Required) { ?>
				elm = this.getElements("x" + infix + "_middle_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->middle_name->caption(), $patient_app_add->middle_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->last_name->Required) { ?>
				elm = this.getElements("x" + infix + "_last_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->last_name->caption(), $patient_app_add->last_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->gender->Required) { ?>
				elm = this.getElements("x" + infix + "_gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->gender->caption(), $patient_app_add->gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->dob->Required) { ?>
				elm = this.getElements("x" + infix + "_dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->dob->caption(), $patient_app_add->dob->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dob");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_add->dob->errorMessage()) ?>");
			<?php if ($patient_app_add->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->Age->caption(), $patient_app_add->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->blood_group->Required) { ?>
				elm = this.getElements("x" + infix + "_blood_group");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->blood_group->caption(), $patient_app_add->blood_group->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->mobile_no->Required) { ?>
				elm = this.getElements("x" + infix + "_mobile_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->mobile_no->caption(), $patient_app_add->mobile_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->description->Required) { ?>
				elm = this.getElements("x" + infix + "_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->description->caption(), $patient_app_add->description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->IdentificationMark->Required) { ?>
				elm = this.getElements("x" + infix + "_IdentificationMark");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->IdentificationMark->caption(), $patient_app_add->IdentificationMark->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->Religion->Required) { ?>
				elm = this.getElements("x" + infix + "_Religion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->Religion->caption(), $patient_app_add->Religion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->Nationality->Required) { ?>
				elm = this.getElements("x" + infix + "_Nationality");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->Nationality->caption(), $patient_app_add->Nationality->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->profilePic->caption(), $patient_app_add->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->status->caption(), $patient_app_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_add->status->errorMessage()) ?>");
			<?php if ($patient_app_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->createdby->caption(), $patient_app_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_add->createdby->errorMessage()) ?>");
			<?php if ($patient_app_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->createddatetime->caption(), $patient_app_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_add->createddatetime->errorMessage()) ?>");
			<?php if ($patient_app_add->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->modifiedby->caption(), $patient_app_add->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_add->modifiedby->errorMessage()) ?>");
			<?php if ($patient_app_add->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->modifieddatetime->caption(), $patient_app_add->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_add->modifieddatetime->errorMessage()) ?>");
			<?php if ($patient_app_add->ReferedByDr->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferedByDr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->ReferedByDr->caption(), $patient_app_add->ReferedByDr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->ReferClinicname->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferClinicname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->ReferClinicname->caption(), $patient_app_add->ReferClinicname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->ReferCity->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferCity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->ReferCity->caption(), $patient_app_add->ReferCity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->ReferMobileNo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferMobileNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->ReferMobileNo->caption(), $patient_app_add->ReferMobileNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->ReferA4TreatingConsultant->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferA4TreatingConsultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->ReferA4TreatingConsultant->caption(), $patient_app_add->ReferA4TreatingConsultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->PurposreReferredfor->Required) { ?>
				elm = this.getElements("x" + infix + "_PurposreReferredfor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->PurposreReferredfor->caption(), $patient_app_add->PurposreReferredfor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->spouse_title->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_title");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->spouse_title->caption(), $patient_app_add->spouse_title->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->spouse_first_name->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_first_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->spouse_first_name->caption(), $patient_app_add->spouse_first_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->spouse_middle_name->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_middle_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->spouse_middle_name->caption(), $patient_app_add->spouse_middle_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->spouse_last_name->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_last_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->spouse_last_name->caption(), $patient_app_add->spouse_last_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->spouse_gender->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->spouse_gender->caption(), $patient_app_add->spouse_gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->spouse_dob->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->spouse_dob->caption(), $patient_app_add->spouse_dob->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_spouse_dob");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_add->spouse_dob->errorMessage()) ?>");
			<?php if ($patient_app_add->spouse_Age->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->spouse_Age->caption(), $patient_app_add->spouse_Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->spouse_blood_group->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_blood_group");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->spouse_blood_group->caption(), $patient_app_add->spouse_blood_group->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->spouse_mobile_no->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_mobile_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->spouse_mobile_no->caption(), $patient_app_add->spouse_mobile_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->Maritalstatus->Required) { ?>
				elm = this.getElements("x" + infix + "_Maritalstatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->Maritalstatus->caption(), $patient_app_add->Maritalstatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->Business->Required) { ?>
				elm = this.getElements("x" + infix + "_Business");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->Business->caption(), $patient_app_add->Business->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->Patient_Language->Required) { ?>
				elm = this.getElements("x" + infix + "_Patient_Language");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->Patient_Language->caption(), $patient_app_add->Patient_Language->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->Passport->Required) { ?>
				elm = this.getElements("x" + infix + "_Passport");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->Passport->caption(), $patient_app_add->Passport->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->VisaNo->Required) { ?>
				elm = this.getElements("x" + infix + "_VisaNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->VisaNo->caption(), $patient_app_add->VisaNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->ValidityOfVisa->Required) { ?>
				elm = this.getElements("x" + infix + "_ValidityOfVisa");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->ValidityOfVisa->caption(), $patient_app_add->ValidityOfVisa->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->WhereDidYouHear->Required) { ?>
				elm = this.getElements("x" + infix + "_WhereDidYouHear");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->WhereDidYouHear->caption(), $patient_app_add->WhereDidYouHear->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->HospID->caption(), $patient_app_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->street->Required) { ?>
				elm = this.getElements("x" + infix + "_street");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->street->caption(), $patient_app_add->street->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->town->Required) { ?>
				elm = this.getElements("x" + infix + "_town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->town->caption(), $patient_app_add->town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->province->Required) { ?>
				elm = this.getElements("x" + infix + "_province");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->province->caption(), $patient_app_add->province->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->country->Required) { ?>
				elm = this.getElements("x" + infix + "_country");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->country->caption(), $patient_app_add->country->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->postal_code->Required) { ?>
				elm = this.getElements("x" + infix + "_postal_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->postal_code->caption(), $patient_app_add->postal_code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->PEmail->Required) { ?>
				elm = this.getElements("x" + infix + "_PEmail");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->PEmail->caption(), $patient_app_add->PEmail->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->PEmergencyContact->Required) { ?>
				elm = this.getElements("x" + infix + "_PEmergencyContact");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->PEmergencyContact->caption(), $patient_app_add->PEmergencyContact->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->occupation->Required) { ?>
				elm = this.getElements("x" + infix + "_occupation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->occupation->caption(), $patient_app_add->occupation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->spouse_occupation->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_occupation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->spouse_occupation->caption(), $patient_app_add->spouse_occupation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->WhatsApp->Required) { ?>
				elm = this.getElements("x" + infix + "_WhatsApp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->WhatsApp->caption(), $patient_app_add->WhatsApp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_app_add->CouppleID->Required) { ?>
				elm = this.getElements("x" + infix + "_CouppleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->CouppleID->caption(), $patient_app_add->CouppleID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CouppleID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_add->CouppleID->errorMessage()) ?>");
			<?php if ($patient_app_add->MaleID->Required) { ?>
				elm = this.getElements("x" + infix + "_MaleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->MaleID->caption(), $patient_app_add->MaleID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MaleID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_add->MaleID->errorMessage()) ?>");
			<?php if ($patient_app_add->FemaleID->Required) { ?>
				elm = this.getElements("x" + infix + "_FemaleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->FemaleID->caption(), $patient_app_add->FemaleID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FemaleID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_add->FemaleID->errorMessage()) ?>");
			<?php if ($patient_app_add->GroupID->Required) { ?>
				elm = this.getElements("x" + infix + "_GroupID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->GroupID->caption(), $patient_app_add->GroupID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GroupID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_app_add->GroupID->errorMessage()) ?>");
			<?php if ($patient_app_add->Relationship->Required) { ?>
				elm = this.getElements("x" + infix + "_Relationship");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_app_add->Relationship->caption(), $patient_app_add->Relationship->RequiredErrorMessage)) ?>");
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
	fpatient_appadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_appadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpatient_appadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_app_add->showPageHeader(); ?>
<?php
$patient_app_add->showMessage();
?>
<form name="fpatient_appadd" id="fpatient_appadd" class="<?php echo $patient_app_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_app">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_app_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($patient_app_add->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_patient_app_PatientID" for="x_PatientID" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->PatientID->caption() ?><?php echo $patient_app_add->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->PatientID->cellAttributes() ?>>
<span id="el_patient_app_PatientID">
<input type="text" data-table="patient_app" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->PatientID->EditValue ?>"<?php echo $patient_app_add->PatientID->editAttributes() ?>>
</span>
<?php echo $patient_app_add->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->title->Visible) { // title ?>
	<div id="r_title" class="form-group row">
		<label id="elh_patient_app_title" for="x_title" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->title->caption() ?><?php echo $patient_app_add->title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->title->cellAttributes() ?>>
<span id="el_patient_app_title">
<input type="text" data-table="patient_app" data-field="x_title" name="x_title" id="x_title" size="30" placeholder="<?php echo HtmlEncode($patient_app_add->title->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->title->EditValue ?>"<?php echo $patient_app_add->title->editAttributes() ?>>
</span>
<?php echo $patient_app_add->title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->first_name->Visible) { // first_name ?>
	<div id="r_first_name" class="form-group row">
		<label id="elh_patient_app_first_name" for="x_first_name" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->first_name->caption() ?><?php echo $patient_app_add->first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->first_name->cellAttributes() ?>>
<span id="el_patient_app_first_name">
<input type="text" data-table="patient_app" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_app_add->first_name->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->first_name->EditValue ?>"<?php echo $patient_app_add->first_name->editAttributes() ?>>
</span>
<?php echo $patient_app_add->first_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->middle_name->Visible) { // middle_name ?>
	<div id="r_middle_name" class="form-group row">
		<label id="elh_patient_app_middle_name" for="x_middle_name" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->middle_name->caption() ?><?php echo $patient_app_add->middle_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->middle_name->cellAttributes() ?>>
<span id="el_patient_app_middle_name">
<input type="text" data-table="patient_app" data-field="x_middle_name" name="x_middle_name" id="x_middle_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_app_add->middle_name->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->middle_name->EditValue ?>"<?php echo $patient_app_add->middle_name->editAttributes() ?>>
</span>
<?php echo $patient_app_add->middle_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->last_name->Visible) { // last_name ?>
	<div id="r_last_name" class="form-group row">
		<label id="elh_patient_app_last_name" for="x_last_name" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->last_name->caption() ?><?php echo $patient_app_add->last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->last_name->cellAttributes() ?>>
<span id="el_patient_app_last_name">
<input type="text" data-table="patient_app" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_app_add->last_name->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->last_name->EditValue ?>"<?php echo $patient_app_add->last_name->editAttributes() ?>>
</span>
<?php echo $patient_app_add->last_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_patient_app_gender" for="x_gender" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->gender->caption() ?><?php echo $patient_app_add->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->gender->cellAttributes() ?>>
<span id="el_patient_app_gender">
<input type="text" data-table="patient_app" data-field="x_gender" name="x_gender" id="x_gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->gender->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->gender->EditValue ?>"<?php echo $patient_app_add->gender->editAttributes() ?>>
</span>
<?php echo $patient_app_add->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->dob->Visible) { // dob ?>
	<div id="r_dob" class="form-group row">
		<label id="elh_patient_app_dob" for="x_dob" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->dob->caption() ?><?php echo $patient_app_add->dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->dob->cellAttributes() ?>>
<span id="el_patient_app_dob">
<input type="text" data-table="patient_app" data-field="x_dob" name="x_dob" id="x_dob" placeholder="<?php echo HtmlEncode($patient_app_add->dob->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->dob->EditValue ?>"<?php echo $patient_app_add->dob->editAttributes() ?>>
<?php if (!$patient_app_add->dob->ReadOnly && !$patient_app_add->dob->Disabled && !isset($patient_app_add->dob->EditAttrs["readonly"]) && !isset($patient_app_add->dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_appadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_appadd", "x_dob", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_app_add->dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_app_Age" for="x_Age" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->Age->caption() ?><?php echo $patient_app_add->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->Age->cellAttributes() ?>>
<span id="el_patient_app_Age">
<input type="text" data-table="patient_app" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->Age->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->Age->EditValue ?>"<?php echo $patient_app_add->Age->editAttributes() ?>>
</span>
<?php echo $patient_app_add->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->blood_group->Visible) { // blood_group ?>
	<div id="r_blood_group" class="form-group row">
		<label id="elh_patient_app_blood_group" for="x_blood_group" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->blood_group->caption() ?><?php echo $patient_app_add->blood_group->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->blood_group->cellAttributes() ?>>
<span id="el_patient_app_blood_group">
<input type="text" data-table="patient_app" data-field="x_blood_group" name="x_blood_group" id="x_blood_group" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->blood_group->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->blood_group->EditValue ?>"<?php echo $patient_app_add->blood_group->editAttributes() ?>>
</span>
<?php echo $patient_app_add->blood_group->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->mobile_no->Visible) { // mobile_no ?>
	<div id="r_mobile_no" class="form-group row">
		<label id="elh_patient_app_mobile_no" for="x_mobile_no" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->mobile_no->caption() ?><?php echo $patient_app_add->mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->mobile_no->cellAttributes() ?>>
<span id="el_patient_app_mobile_no">
<input type="text" data-table="patient_app" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->mobile_no->EditValue ?>"<?php echo $patient_app_add->mobile_no->editAttributes() ?>>
</span>
<?php echo $patient_app_add->mobile_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_patient_app_description" for="x_description" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->description->caption() ?><?php echo $patient_app_add->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->description->cellAttributes() ?>>
<span id="el_patient_app_description">
<textarea data-table="patient_app" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_app_add->description->getPlaceHolder()) ?>"<?php echo $patient_app_add->description->editAttributes() ?>><?php echo $patient_app_add->description->EditValue ?></textarea>
</span>
<?php echo $patient_app_add->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->IdentificationMark->Visible) { // IdentificationMark ?>
	<div id="r_IdentificationMark" class="form-group row">
		<label id="elh_patient_app_IdentificationMark" for="x_IdentificationMark" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->IdentificationMark->caption() ?><?php echo $patient_app_add->IdentificationMark->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->IdentificationMark->cellAttributes() ?>>
<span id="el_patient_app_IdentificationMark">
<input type="text" data-table="patient_app" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->IdentificationMark->EditValue ?>"<?php echo $patient_app_add->IdentificationMark->editAttributes() ?>>
</span>
<?php echo $patient_app_add->IdentificationMark->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->Religion->Visible) { // Religion ?>
	<div id="r_Religion" class="form-group row">
		<label id="elh_patient_app_Religion" for="x_Religion" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->Religion->caption() ?><?php echo $patient_app_add->Religion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->Religion->cellAttributes() ?>>
<span id="el_patient_app_Religion">
<input type="text" data-table="patient_app" data-field="x_Religion" name="x_Religion" id="x_Religion" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->Religion->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->Religion->EditValue ?>"<?php echo $patient_app_add->Religion->editAttributes() ?>>
</span>
<?php echo $patient_app_add->Religion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->Nationality->Visible) { // Nationality ?>
	<div id="r_Nationality" class="form-group row">
		<label id="elh_patient_app_Nationality" for="x_Nationality" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->Nationality->caption() ?><?php echo $patient_app_add->Nationality->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->Nationality->cellAttributes() ?>>
<span id="el_patient_app_Nationality">
<input type="text" data-table="patient_app" data-field="x_Nationality" name="x_Nationality" id="x_Nationality" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->Nationality->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->Nationality->EditValue ?>"<?php echo $patient_app_add->Nationality->editAttributes() ?>>
</span>
<?php echo $patient_app_add->Nationality->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_app_profilePic" for="x_profilePic" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->profilePic->caption() ?><?php echo $patient_app_add->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->profilePic->cellAttributes() ?>>
<span id="el_patient_app_profilePic">
<input type="text" data-table="patient_app" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_app_add->profilePic->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->profilePic->EditValue ?>"<?php echo $patient_app_add->profilePic->editAttributes() ?>>
</span>
<?php echo $patient_app_add->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_app_status" for="x_status" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->status->caption() ?><?php echo $patient_app_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->status->cellAttributes() ?>>
<span id="el_patient_app_status">
<input type="text" data-table="patient_app" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($patient_app_add->status->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->status->EditValue ?>"<?php echo $patient_app_add->status->editAttributes() ?>>
</span>
<?php echo $patient_app_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_patient_app_createdby" for="x_createdby" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->createdby->caption() ?><?php echo $patient_app_add->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->createdby->cellAttributes() ?>>
<span id="el_patient_app_createdby">
<input type="text" data-table="patient_app" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_app_add->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->createdby->EditValue ?>"<?php echo $patient_app_add->createdby->editAttributes() ?>>
</span>
<?php echo $patient_app_add->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_patient_app_createddatetime" for="x_createddatetime" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->createddatetime->caption() ?><?php echo $patient_app_add->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->createddatetime->cellAttributes() ?>>
<span id="el_patient_app_createddatetime">
<input type="text" data-table="patient_app" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_app_add->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->createddatetime->EditValue ?>"<?php echo $patient_app_add->createddatetime->editAttributes() ?>>
<?php if (!$patient_app_add->createddatetime->ReadOnly && !$patient_app_add->createddatetime->Disabled && !isset($patient_app_add->createddatetime->EditAttrs["readonly"]) && !isset($patient_app_add->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_appadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_appadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_app_add->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_patient_app_modifiedby" for="x_modifiedby" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->modifiedby->caption() ?><?php echo $patient_app_add->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->modifiedby->cellAttributes() ?>>
<span id="el_patient_app_modifiedby">
<input type="text" data-table="patient_app" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_app_add->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->modifiedby->EditValue ?>"<?php echo $patient_app_add->modifiedby->editAttributes() ?>>
</span>
<?php echo $patient_app_add->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_patient_app_modifieddatetime" for="x_modifieddatetime" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->modifieddatetime->caption() ?><?php echo $patient_app_add->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_app_modifieddatetime">
<input type="text" data-table="patient_app" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_app_add->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->modifieddatetime->EditValue ?>"<?php echo $patient_app_add->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_app_add->modifieddatetime->ReadOnly && !$patient_app_add->modifieddatetime->Disabled && !isset($patient_app_add->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_app_add->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_appadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_appadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_app_add->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->ReferedByDr->Visible) { // ReferedByDr ?>
	<div id="r_ReferedByDr" class="form-group row">
		<label id="elh_patient_app_ReferedByDr" for="x_ReferedByDr" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->ReferedByDr->caption() ?><?php echo $patient_app_add->ReferedByDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->ReferedByDr->cellAttributes() ?>>
<span id="el_patient_app_ReferedByDr">
<input type="text" data-table="patient_app" data-field="x_ReferedByDr" name="x_ReferedByDr" id="x_ReferedByDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->ReferedByDr->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->ReferedByDr->EditValue ?>"<?php echo $patient_app_add->ReferedByDr->editAttributes() ?>>
</span>
<?php echo $patient_app_add->ReferedByDr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label id="elh_patient_app_ReferClinicname" for="x_ReferClinicname" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->ReferClinicname->caption() ?><?php echo $patient_app_add->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->ReferClinicname->cellAttributes() ?>>
<span id="el_patient_app_ReferClinicname">
<input type="text" data-table="patient_app" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->ReferClinicname->EditValue ?>"<?php echo $patient_app_add->ReferClinicname->editAttributes() ?>>
</span>
<?php echo $patient_app_add->ReferClinicname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label id="elh_patient_app_ReferCity" for="x_ReferCity" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->ReferCity->caption() ?><?php echo $patient_app_add->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->ReferCity->cellAttributes() ?>>
<span id="el_patient_app_ReferCity">
<input type="text" data-table="patient_app" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->ReferCity->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->ReferCity->EditValue ?>"<?php echo $patient_app_add->ReferCity->editAttributes() ?>>
</span>
<?php echo $patient_app_add->ReferCity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label id="elh_patient_app_ReferMobileNo" for="x_ReferMobileNo" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->ReferMobileNo->caption() ?><?php echo $patient_app_add->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->ReferMobileNo->cellAttributes() ?>>
<span id="el_patient_app_ReferMobileNo">
<input type="text" data-table="patient_app" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->ReferMobileNo->EditValue ?>"<?php echo $patient_app_add->ReferMobileNo->editAttributes() ?>>
</span>
<?php echo $patient_app_add->ReferMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div id="r_ReferA4TreatingConsultant" class="form-group row">
		<label id="elh_patient_app_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->ReferA4TreatingConsultant->caption() ?><?php echo $patient_app_add->ReferA4TreatingConsultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el_patient_app_ReferA4TreatingConsultant">
<input type="text" data-table="patient_app" data-field="x_ReferA4TreatingConsultant" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->ReferA4TreatingConsultant->EditValue ?>"<?php echo $patient_app_add->ReferA4TreatingConsultant->editAttributes() ?>>
</span>
<?php echo $patient_app_add->ReferA4TreatingConsultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div id="r_PurposreReferredfor" class="form-group row">
		<label id="elh_patient_app_PurposreReferredfor" for="x_PurposreReferredfor" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->PurposreReferredfor->caption() ?><?php echo $patient_app_add->PurposreReferredfor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->PurposreReferredfor->cellAttributes() ?>>
<span id="el_patient_app_PurposreReferredfor">
<input type="text" data-table="patient_app" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->PurposreReferredfor->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->PurposreReferredfor->EditValue ?>"<?php echo $patient_app_add->PurposreReferredfor->editAttributes() ?>>
</span>
<?php echo $patient_app_add->PurposreReferredfor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->spouse_title->Visible) { // spouse_title ?>
	<div id="r_spouse_title" class="form-group row">
		<label id="elh_patient_app_spouse_title" for="x_spouse_title" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->spouse_title->caption() ?><?php echo $patient_app_add->spouse_title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->spouse_title->cellAttributes() ?>>
<span id="el_patient_app_spouse_title">
<input type="text" data-table="patient_app" data-field="x_spouse_title" name="x_spouse_title" id="x_spouse_title" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->spouse_title->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->spouse_title->EditValue ?>"<?php echo $patient_app_add->spouse_title->editAttributes() ?>>
</span>
<?php echo $patient_app_add->spouse_title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->spouse_first_name->Visible) { // spouse_first_name ?>
	<div id="r_spouse_first_name" class="form-group row">
		<label id="elh_patient_app_spouse_first_name" for="x_spouse_first_name" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->spouse_first_name->caption() ?><?php echo $patient_app_add->spouse_first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->spouse_first_name->cellAttributes() ?>>
<span id="el_patient_app_spouse_first_name">
<input type="text" data-table="patient_app" data-field="x_spouse_first_name" name="x_spouse_first_name" id="x_spouse_first_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->spouse_first_name->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->spouse_first_name->EditValue ?>"<?php echo $patient_app_add->spouse_first_name->editAttributes() ?>>
</span>
<?php echo $patient_app_add->spouse_first_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<div id="r_spouse_middle_name" class="form-group row">
		<label id="elh_patient_app_spouse_middle_name" for="x_spouse_middle_name" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->spouse_middle_name->caption() ?><?php echo $patient_app_add->spouse_middle_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->spouse_middle_name->cellAttributes() ?>>
<span id="el_patient_app_spouse_middle_name">
<input type="text" data-table="patient_app" data-field="x_spouse_middle_name" name="x_spouse_middle_name" id="x_spouse_middle_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->spouse_middle_name->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->spouse_middle_name->EditValue ?>"<?php echo $patient_app_add->spouse_middle_name->editAttributes() ?>>
</span>
<?php echo $patient_app_add->spouse_middle_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->spouse_last_name->Visible) { // spouse_last_name ?>
	<div id="r_spouse_last_name" class="form-group row">
		<label id="elh_patient_app_spouse_last_name" for="x_spouse_last_name" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->spouse_last_name->caption() ?><?php echo $patient_app_add->spouse_last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->spouse_last_name->cellAttributes() ?>>
<span id="el_patient_app_spouse_last_name">
<input type="text" data-table="patient_app" data-field="x_spouse_last_name" name="x_spouse_last_name" id="x_spouse_last_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->spouse_last_name->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->spouse_last_name->EditValue ?>"<?php echo $patient_app_add->spouse_last_name->editAttributes() ?>>
</span>
<?php echo $patient_app_add->spouse_last_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->spouse_gender->Visible) { // spouse_gender ?>
	<div id="r_spouse_gender" class="form-group row">
		<label id="elh_patient_app_spouse_gender" for="x_spouse_gender" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->spouse_gender->caption() ?><?php echo $patient_app_add->spouse_gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->spouse_gender->cellAttributes() ?>>
<span id="el_patient_app_spouse_gender">
<input type="text" data-table="patient_app" data-field="x_spouse_gender" name="x_spouse_gender" id="x_spouse_gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->spouse_gender->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->spouse_gender->EditValue ?>"<?php echo $patient_app_add->spouse_gender->editAttributes() ?>>
</span>
<?php echo $patient_app_add->spouse_gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->spouse_dob->Visible) { // spouse_dob ?>
	<div id="r_spouse_dob" class="form-group row">
		<label id="elh_patient_app_spouse_dob" for="x_spouse_dob" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->spouse_dob->caption() ?><?php echo $patient_app_add->spouse_dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->spouse_dob->cellAttributes() ?>>
<span id="el_patient_app_spouse_dob">
<input type="text" data-table="patient_app" data-field="x_spouse_dob" name="x_spouse_dob" id="x_spouse_dob" placeholder="<?php echo HtmlEncode($patient_app_add->spouse_dob->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->spouse_dob->EditValue ?>"<?php echo $patient_app_add->spouse_dob->editAttributes() ?>>
<?php if (!$patient_app_add->spouse_dob->ReadOnly && !$patient_app_add->spouse_dob->Disabled && !isset($patient_app_add->spouse_dob->EditAttrs["readonly"]) && !isset($patient_app_add->spouse_dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_appadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_appadd", "x_spouse_dob", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_app_add->spouse_dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->spouse_Age->Visible) { // spouse_Age ?>
	<div id="r_spouse_Age" class="form-group row">
		<label id="elh_patient_app_spouse_Age" for="x_spouse_Age" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->spouse_Age->caption() ?><?php echo $patient_app_add->spouse_Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->spouse_Age->cellAttributes() ?>>
<span id="el_patient_app_spouse_Age">
<input type="text" data-table="patient_app" data-field="x_spouse_Age" name="x_spouse_Age" id="x_spouse_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->spouse_Age->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->spouse_Age->EditValue ?>"<?php echo $patient_app_add->spouse_Age->editAttributes() ?>>
</span>
<?php echo $patient_app_add->spouse_Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<div id="r_spouse_blood_group" class="form-group row">
		<label id="elh_patient_app_spouse_blood_group" for="x_spouse_blood_group" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->spouse_blood_group->caption() ?><?php echo $patient_app_add->spouse_blood_group->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->spouse_blood_group->cellAttributes() ?>>
<span id="el_patient_app_spouse_blood_group">
<input type="text" data-table="patient_app" data-field="x_spouse_blood_group" name="x_spouse_blood_group" id="x_spouse_blood_group" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->spouse_blood_group->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->spouse_blood_group->EditValue ?>"<?php echo $patient_app_add->spouse_blood_group->editAttributes() ?>>
</span>
<?php echo $patient_app_add->spouse_blood_group->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<div id="r_spouse_mobile_no" class="form-group row">
		<label id="elh_patient_app_spouse_mobile_no" for="x_spouse_mobile_no" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->spouse_mobile_no->caption() ?><?php echo $patient_app_add->spouse_mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->spouse_mobile_no->cellAttributes() ?>>
<span id="el_patient_app_spouse_mobile_no">
<input type="text" data-table="patient_app" data-field="x_spouse_mobile_no" name="x_spouse_mobile_no" id="x_spouse_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->spouse_mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->spouse_mobile_no->EditValue ?>"<?php echo $patient_app_add->spouse_mobile_no->editAttributes() ?>>
</span>
<?php echo $patient_app_add->spouse_mobile_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->Maritalstatus->Visible) { // Maritalstatus ?>
	<div id="r_Maritalstatus" class="form-group row">
		<label id="elh_patient_app_Maritalstatus" for="x_Maritalstatus" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->Maritalstatus->caption() ?><?php echo $patient_app_add->Maritalstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->Maritalstatus->cellAttributes() ?>>
<span id="el_patient_app_Maritalstatus">
<input type="text" data-table="patient_app" data-field="x_Maritalstatus" name="x_Maritalstatus" id="x_Maritalstatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->Maritalstatus->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->Maritalstatus->EditValue ?>"<?php echo $patient_app_add->Maritalstatus->editAttributes() ?>>
</span>
<?php echo $patient_app_add->Maritalstatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->Business->Visible) { // Business ?>
	<div id="r_Business" class="form-group row">
		<label id="elh_patient_app_Business" for="x_Business" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->Business->caption() ?><?php echo $patient_app_add->Business->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->Business->cellAttributes() ?>>
<span id="el_patient_app_Business">
<input type="text" data-table="patient_app" data-field="x_Business" name="x_Business" id="x_Business" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->Business->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->Business->EditValue ?>"<?php echo $patient_app_add->Business->editAttributes() ?>>
</span>
<?php echo $patient_app_add->Business->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->Patient_Language->Visible) { // Patient_Language ?>
	<div id="r_Patient_Language" class="form-group row">
		<label id="elh_patient_app_Patient_Language" for="x_Patient_Language" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->Patient_Language->caption() ?><?php echo $patient_app_add->Patient_Language->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->Patient_Language->cellAttributes() ?>>
<span id="el_patient_app_Patient_Language">
<input type="text" data-table="patient_app" data-field="x_Patient_Language" name="x_Patient_Language" id="x_Patient_Language" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->Patient_Language->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->Patient_Language->EditValue ?>"<?php echo $patient_app_add->Patient_Language->editAttributes() ?>>
</span>
<?php echo $patient_app_add->Patient_Language->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->Passport->Visible) { // Passport ?>
	<div id="r_Passport" class="form-group row">
		<label id="elh_patient_app_Passport" for="x_Passport" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->Passport->caption() ?><?php echo $patient_app_add->Passport->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->Passport->cellAttributes() ?>>
<span id="el_patient_app_Passport">
<input type="text" data-table="patient_app" data-field="x_Passport" name="x_Passport" id="x_Passport" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->Passport->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->Passport->EditValue ?>"<?php echo $patient_app_add->Passport->editAttributes() ?>>
</span>
<?php echo $patient_app_add->Passport->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->VisaNo->Visible) { // VisaNo ?>
	<div id="r_VisaNo" class="form-group row">
		<label id="elh_patient_app_VisaNo" for="x_VisaNo" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->VisaNo->caption() ?><?php echo $patient_app_add->VisaNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->VisaNo->cellAttributes() ?>>
<span id="el_patient_app_VisaNo">
<input type="text" data-table="patient_app" data-field="x_VisaNo" name="x_VisaNo" id="x_VisaNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->VisaNo->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->VisaNo->EditValue ?>"<?php echo $patient_app_add->VisaNo->editAttributes() ?>>
</span>
<?php echo $patient_app_add->VisaNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<div id="r_ValidityOfVisa" class="form-group row">
		<label id="elh_patient_app_ValidityOfVisa" for="x_ValidityOfVisa" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->ValidityOfVisa->caption() ?><?php echo $patient_app_add->ValidityOfVisa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->ValidityOfVisa->cellAttributes() ?>>
<span id="el_patient_app_ValidityOfVisa">
<input type="text" data-table="patient_app" data-field="x_ValidityOfVisa" name="x_ValidityOfVisa" id="x_ValidityOfVisa" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->ValidityOfVisa->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->ValidityOfVisa->EditValue ?>"<?php echo $patient_app_add->ValidityOfVisa->editAttributes() ?>>
</span>
<?php echo $patient_app_add->ValidityOfVisa->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<div id="r_WhereDidYouHear" class="form-group row">
		<label id="elh_patient_app_WhereDidYouHear" for="x_WhereDidYouHear" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->WhereDidYouHear->caption() ?><?php echo $patient_app_add->WhereDidYouHear->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->WhereDidYouHear->cellAttributes() ?>>
<span id="el_patient_app_WhereDidYouHear">
<input type="text" data-table="patient_app" data-field="x_WhereDidYouHear" name="x_WhereDidYouHear" id="x_WhereDidYouHear" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->WhereDidYouHear->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->WhereDidYouHear->EditValue ?>"<?php echo $patient_app_add->WhereDidYouHear->editAttributes() ?>>
</span>
<?php echo $patient_app_add->WhereDidYouHear->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_patient_app_HospID" for="x_HospID" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->HospID->caption() ?><?php echo $patient_app_add->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->HospID->cellAttributes() ?>>
<span id="el_patient_app_HospID">
<input type="text" data-table="patient_app" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->HospID->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->HospID->EditValue ?>"<?php echo $patient_app_add->HospID->editAttributes() ?>>
</span>
<?php echo $patient_app_add->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label id="elh_patient_app_street" for="x_street" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->street->caption() ?><?php echo $patient_app_add->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->street->cellAttributes() ?>>
<span id="el_patient_app_street">
<input type="text" data-table="patient_app" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_app_add->street->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->street->EditValue ?>"<?php echo $patient_app_add->street->editAttributes() ?>>
</span>
<?php echo $patient_app_add->street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label id="elh_patient_app_town" for="x_town" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->town->caption() ?><?php echo $patient_app_add->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->town->cellAttributes() ?>>
<span id="el_patient_app_town">
<input type="text" data-table="patient_app" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_app_add->town->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->town->EditValue ?>"<?php echo $patient_app_add->town->editAttributes() ?>>
</span>
<?php echo $patient_app_add->town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_patient_app_province" for="x_province" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->province->caption() ?><?php echo $patient_app_add->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->province->cellAttributes() ?>>
<span id="el_patient_app_province">
<input type="text" data-table="patient_app" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_app_add->province->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->province->EditValue ?>"<?php echo $patient_app_add->province->editAttributes() ?>>
</span>
<?php echo $patient_app_add->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->country->Visible) { // country ?>
	<div id="r_country" class="form-group row">
		<label id="elh_patient_app_country" for="x_country" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->country->caption() ?><?php echo $patient_app_add->country->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->country->cellAttributes() ?>>
<span id="el_patient_app_country">
<input type="text" data-table="patient_app" data-field="x_country" name="x_country" id="x_country" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_app_add->country->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->country->EditValue ?>"<?php echo $patient_app_add->country->editAttributes() ?>>
</span>
<?php echo $patient_app_add->country->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_patient_app_postal_code" for="x_postal_code" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->postal_code->caption() ?><?php echo $patient_app_add->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->postal_code->cellAttributes() ?>>
<span id="el_patient_app_postal_code">
<input type="text" data-table="patient_app" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_app_add->postal_code->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->postal_code->EditValue ?>"<?php echo $patient_app_add->postal_code->editAttributes() ?>>
</span>
<?php echo $patient_app_add->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->PEmail->Visible) { // PEmail ?>
	<div id="r_PEmail" class="form-group row">
		<label id="elh_patient_app_PEmail" for="x_PEmail" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->PEmail->caption() ?><?php echo $patient_app_add->PEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->PEmail->cellAttributes() ?>>
<span id="el_patient_app_PEmail">
<input type="text" data-table="patient_app" data-field="x_PEmail" name="x_PEmail" id="x_PEmail" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_app_add->PEmail->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->PEmail->EditValue ?>"<?php echo $patient_app_add->PEmail->editAttributes() ?>>
</span>
<?php echo $patient_app_add->PEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<div id="r_PEmergencyContact" class="form-group row">
		<label id="elh_patient_app_PEmergencyContact" for="x_PEmergencyContact" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->PEmergencyContact->caption() ?><?php echo $patient_app_add->PEmergencyContact->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->PEmergencyContact->cellAttributes() ?>>
<span id="el_patient_app_PEmergencyContact">
<input type="text" data-table="patient_app" data-field="x_PEmergencyContact" name="x_PEmergencyContact" id="x_PEmergencyContact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_app_add->PEmergencyContact->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->PEmergencyContact->EditValue ?>"<?php echo $patient_app_add->PEmergencyContact->editAttributes() ?>>
</span>
<?php echo $patient_app_add->PEmergencyContact->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->occupation->Visible) { // occupation ?>
	<div id="r_occupation" class="form-group row">
		<label id="elh_patient_app_occupation" for="x_occupation" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->occupation->caption() ?><?php echo $patient_app_add->occupation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->occupation->cellAttributes() ?>>
<span id="el_patient_app_occupation">
<input type="text" data-table="patient_app" data-field="x_occupation" name="x_occupation" id="x_occupation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->occupation->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->occupation->EditValue ?>"<?php echo $patient_app_add->occupation->editAttributes() ?>>
</span>
<?php echo $patient_app_add->occupation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->spouse_occupation->Visible) { // spouse_occupation ?>
	<div id="r_spouse_occupation" class="form-group row">
		<label id="elh_patient_app_spouse_occupation" for="x_spouse_occupation" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->spouse_occupation->caption() ?><?php echo $patient_app_add->spouse_occupation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->spouse_occupation->cellAttributes() ?>>
<span id="el_patient_app_spouse_occupation">
<input type="text" data-table="patient_app" data-field="x_spouse_occupation" name="x_spouse_occupation" id="x_spouse_occupation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->spouse_occupation->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->spouse_occupation->EditValue ?>"<?php echo $patient_app_add->spouse_occupation->editAttributes() ?>>
</span>
<?php echo $patient_app_add->spouse_occupation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->WhatsApp->Visible) { // WhatsApp ?>
	<div id="r_WhatsApp" class="form-group row">
		<label id="elh_patient_app_WhatsApp" for="x_WhatsApp" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->WhatsApp->caption() ?><?php echo $patient_app_add->WhatsApp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->WhatsApp->cellAttributes() ?>>
<span id="el_patient_app_WhatsApp">
<input type="text" data-table="patient_app" data-field="x_WhatsApp" name="x_WhatsApp" id="x_WhatsApp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->WhatsApp->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->WhatsApp->EditValue ?>"<?php echo $patient_app_add->WhatsApp->editAttributes() ?>>
</span>
<?php echo $patient_app_add->WhatsApp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->CouppleID->Visible) { // CouppleID ?>
	<div id="r_CouppleID" class="form-group row">
		<label id="elh_patient_app_CouppleID" for="x_CouppleID" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->CouppleID->caption() ?><?php echo $patient_app_add->CouppleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->CouppleID->cellAttributes() ?>>
<span id="el_patient_app_CouppleID">
<input type="text" data-table="patient_app" data-field="x_CouppleID" name="x_CouppleID" id="x_CouppleID" size="30" placeholder="<?php echo HtmlEncode($patient_app_add->CouppleID->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->CouppleID->EditValue ?>"<?php echo $patient_app_add->CouppleID->editAttributes() ?>>
</span>
<?php echo $patient_app_add->CouppleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->MaleID->Visible) { // MaleID ?>
	<div id="r_MaleID" class="form-group row">
		<label id="elh_patient_app_MaleID" for="x_MaleID" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->MaleID->caption() ?><?php echo $patient_app_add->MaleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->MaleID->cellAttributes() ?>>
<span id="el_patient_app_MaleID">
<input type="text" data-table="patient_app" data-field="x_MaleID" name="x_MaleID" id="x_MaleID" size="30" placeholder="<?php echo HtmlEncode($patient_app_add->MaleID->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->MaleID->EditValue ?>"<?php echo $patient_app_add->MaleID->editAttributes() ?>>
</span>
<?php echo $patient_app_add->MaleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->FemaleID->Visible) { // FemaleID ?>
	<div id="r_FemaleID" class="form-group row">
		<label id="elh_patient_app_FemaleID" for="x_FemaleID" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->FemaleID->caption() ?><?php echo $patient_app_add->FemaleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->FemaleID->cellAttributes() ?>>
<span id="el_patient_app_FemaleID">
<input type="text" data-table="patient_app" data-field="x_FemaleID" name="x_FemaleID" id="x_FemaleID" size="30" placeholder="<?php echo HtmlEncode($patient_app_add->FemaleID->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->FemaleID->EditValue ?>"<?php echo $patient_app_add->FemaleID->editAttributes() ?>>
</span>
<?php echo $patient_app_add->FemaleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->GroupID->Visible) { // GroupID ?>
	<div id="r_GroupID" class="form-group row">
		<label id="elh_patient_app_GroupID" for="x_GroupID" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->GroupID->caption() ?><?php echo $patient_app_add->GroupID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->GroupID->cellAttributes() ?>>
<span id="el_patient_app_GroupID">
<input type="text" data-table="patient_app" data-field="x_GroupID" name="x_GroupID" id="x_GroupID" size="30" placeholder="<?php echo HtmlEncode($patient_app_add->GroupID->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->GroupID->EditValue ?>"<?php echo $patient_app_add->GroupID->editAttributes() ?>>
</span>
<?php echo $patient_app_add->GroupID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_app_add->Relationship->Visible) { // Relationship ?>
	<div id="r_Relationship" class="form-group row">
		<label id="elh_patient_app_Relationship" for="x_Relationship" class="<?php echo $patient_app_add->LeftColumnClass ?>"><?php echo $patient_app_add->Relationship->caption() ?><?php echo $patient_app_add->Relationship->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_app_add->RightColumnClass ?>"><div <?php echo $patient_app_add->Relationship->cellAttributes() ?>>
<span id="el_patient_app_Relationship">
<input type="text" data-table="patient_app" data-field="x_Relationship" name="x_Relationship" id="x_Relationship" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_app_add->Relationship->getPlaceHolder()) ?>" value="<?php echo $patient_app_add->Relationship->EditValue ?>"<?php echo $patient_app_add->Relationship->editAttributes() ?>>
</span>
<?php echo $patient_app_add->Relationship->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_app_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_app_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_app_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_app_add->showPageFooter();
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
$patient_app_add->terminate();
?>