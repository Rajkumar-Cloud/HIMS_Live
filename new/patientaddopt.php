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
var fpatientaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	fpatientaddopt = currentForm = new ew.Form("fpatientaddopt", "addopt");

	// Validate form
	fpatientaddopt.validate = function() {
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
			<?php if ($patient_addopt->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->PatientID->caption(), $patient_addopt->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->title->Required) { ?>
				elm = this.getElements("x" + infix + "_title");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->title->caption(), $patient_addopt->title->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->first_name->Required) { ?>
				elm = this.getElements("x" + infix + "_first_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->first_name->caption(), $patient_addopt->first_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->middle_name->Required) { ?>
				elm = this.getElements("x" + infix + "_middle_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->middle_name->caption(), $patient_addopt->middle_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->last_name->Required) { ?>
				elm = this.getElements("x" + infix + "_last_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->last_name->caption(), $patient_addopt->last_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->gender->Required) { ?>
				elm = this.getElements("x" + infix + "_gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->gender->caption(), $patient_addopt->gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->dob->Required) { ?>
				elm = this.getElements("x" + infix + "_dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->dob->caption(), $patient_addopt->dob->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dob");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_addopt->dob->errorMessage()) ?>");
			<?php if ($patient_addopt->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->Age->caption(), $patient_addopt->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->blood_group->Required) { ?>
				elm = this.getElements("x" + infix + "_blood_group");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->blood_group->caption(), $patient_addopt->blood_group->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->mobile_no->Required) { ?>
				elm = this.getElements("x" + infix + "_mobile_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->mobile_no->caption(), $patient_addopt->mobile_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->description->Required) { ?>
				elm = this.getElements("x" + infix + "_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->description->caption(), $patient_addopt->description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->status->caption(), $patient_addopt->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->createdby->caption(), $patient_addopt->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->createddatetime->caption(), $patient_addopt->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->modifiedby->caption(), $patient_addopt->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->modifieddatetime->caption(), $patient_addopt->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->profilePic->Required) { ?>
				felm = this.getElements("x" + infix + "_profilePic");
				elm = this.getElements("fn_x" + infix + "_profilePic");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->profilePic->caption(), $patient_addopt->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->IdentificationMark->Required) { ?>
				elm = this.getElements("x" + infix + "_IdentificationMark");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->IdentificationMark->caption(), $patient_addopt->IdentificationMark->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->Religion->Required) { ?>
				elm = this.getElements("x" + infix + "_Religion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->Religion->caption(), $patient_addopt->Religion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->Nationality->Required) { ?>
				elm = this.getElements("x" + infix + "_Nationality");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->Nationality->caption(), $patient_addopt->Nationality->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->ReferedByDr->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferedByDr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->ReferedByDr->caption(), $patient_addopt->ReferedByDr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->ReferClinicname->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferClinicname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->ReferClinicname->caption(), $patient_addopt->ReferClinicname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->ReferCity->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferCity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->ReferCity->caption(), $patient_addopt->ReferCity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->ReferMobileNo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferMobileNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->ReferMobileNo->caption(), $patient_addopt->ReferMobileNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->ReferA4TreatingConsultant->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferA4TreatingConsultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->ReferA4TreatingConsultant->caption(), $patient_addopt->ReferA4TreatingConsultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->PurposreReferredfor->Required) { ?>
				elm = this.getElements("x" + infix + "_PurposreReferredfor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->PurposreReferredfor->caption(), $patient_addopt->PurposreReferredfor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->spouse_title->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_title");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->spouse_title->caption(), $patient_addopt->spouse_title->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->spouse_first_name->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_first_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->spouse_first_name->caption(), $patient_addopt->spouse_first_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->spouse_middle_name->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_middle_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->spouse_middle_name->caption(), $patient_addopt->spouse_middle_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->spouse_last_name->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_last_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->spouse_last_name->caption(), $patient_addopt->spouse_last_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->spouse_gender->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->spouse_gender->caption(), $patient_addopt->spouse_gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->spouse_dob->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->spouse_dob->caption(), $patient_addopt->spouse_dob->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->spouse_Age->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->spouse_Age->caption(), $patient_addopt->spouse_Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->spouse_blood_group->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_blood_group");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->spouse_blood_group->caption(), $patient_addopt->spouse_blood_group->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->spouse_mobile_no->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_mobile_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->spouse_mobile_no->caption(), $patient_addopt->spouse_mobile_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->Maritalstatus->Required) { ?>
				elm = this.getElements("x" + infix + "_Maritalstatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->Maritalstatus->caption(), $patient_addopt->Maritalstatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->Business->Required) { ?>
				elm = this.getElements("x" + infix + "_Business");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->Business->caption(), $patient_addopt->Business->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->Patient_Language->Required) { ?>
				elm = this.getElements("x" + infix + "_Patient_Language");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->Patient_Language->caption(), $patient_addopt->Patient_Language->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->Passport->Required) { ?>
				elm = this.getElements("x" + infix + "_Passport");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->Passport->caption(), $patient_addopt->Passport->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->VisaNo->Required) { ?>
				elm = this.getElements("x" + infix + "_VisaNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->VisaNo->caption(), $patient_addopt->VisaNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->ValidityOfVisa->Required) { ?>
				elm = this.getElements("x" + infix + "_ValidityOfVisa");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->ValidityOfVisa->caption(), $patient_addopt->ValidityOfVisa->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->WhereDidYouHear->Required) { ?>
				elm = this.getElements("x" + infix + "_WhereDidYouHear[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->WhereDidYouHear->caption(), $patient_addopt->WhereDidYouHear->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->HospID->caption(), $patient_addopt->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->street->Required) { ?>
				elm = this.getElements("x" + infix + "_street");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->street->caption(), $patient_addopt->street->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->town->Required) { ?>
				elm = this.getElements("x" + infix + "_town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->town->caption(), $patient_addopt->town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->province->Required) { ?>
				elm = this.getElements("x" + infix + "_province");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->province->caption(), $patient_addopt->province->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->country->Required) { ?>
				elm = this.getElements("x" + infix + "_country");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->country->caption(), $patient_addopt->country->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->postal_code->Required) { ?>
				elm = this.getElements("x" + infix + "_postal_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->postal_code->caption(), $patient_addopt->postal_code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->PEmail->Required) { ?>
				elm = this.getElements("x" + infix + "_PEmail");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->PEmail->caption(), $patient_addopt->PEmail->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->PEmergencyContact->Required) { ?>
				elm = this.getElements("x" + infix + "_PEmergencyContact");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->PEmergencyContact->caption(), $patient_addopt->PEmergencyContact->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->occupation->Required) { ?>
				elm = this.getElements("x" + infix + "_occupation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->occupation->caption(), $patient_addopt->occupation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->spouse_occupation->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_occupation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->spouse_occupation->caption(), $patient_addopt->spouse_occupation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->WhatsApp->Required) { ?>
				elm = this.getElements("x" + infix + "_WhatsApp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->WhatsApp->caption(), $patient_addopt->WhatsApp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->CouppleID->Required) { ?>
				elm = this.getElements("x" + infix + "_CouppleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->CouppleID->caption(), $patient_addopt->CouppleID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CouppleID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_addopt->CouppleID->errorMessage()) ?>");
			<?php if ($patient_addopt->MaleID->Required) { ?>
				elm = this.getElements("x" + infix + "_MaleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->MaleID->caption(), $patient_addopt->MaleID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MaleID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_addopt->MaleID->errorMessage()) ?>");
			<?php if ($patient_addopt->FemaleID->Required) { ?>
				elm = this.getElements("x" + infix + "_FemaleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->FemaleID->caption(), $patient_addopt->FemaleID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FemaleID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_addopt->FemaleID->errorMessage()) ?>");
			<?php if ($patient_addopt->GroupID->Required) { ?>
				elm = this.getElements("x" + infix + "_GroupID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->GroupID->caption(), $patient_addopt->GroupID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GroupID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_addopt->GroupID->errorMessage()) ?>");
			<?php if ($patient_addopt->Relationship->Required) { ?>
				elm = this.getElements("x" + infix + "_Relationship");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->Relationship->caption(), $patient_addopt->Relationship->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->AppointmentSearch->Required) { ?>
				elm = this.getElements("x" + infix + "_AppointmentSearch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->AppointmentSearch->caption(), $patient_addopt->AppointmentSearch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_addopt->FacebookID->Required) { ?>
				elm = this.getElements("x" + infix + "_FacebookID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_addopt->FacebookID->caption(), $patient_addopt->FacebookID->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fpatientaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatientaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatientaddopt.lists["x_title"] = <?php echo $patient_addopt->title->Lookup->toClientList($patient_addopt) ?>;
	fpatientaddopt.lists["x_title"].options = <?php echo JsonEncode($patient_addopt->title->lookupOptions()) ?>;
	fpatientaddopt.lists["x_gender"] = <?php echo $patient_addopt->gender->Lookup->toClientList($patient_addopt) ?>;
	fpatientaddopt.lists["x_gender"].options = <?php echo JsonEncode($patient_addopt->gender->lookupOptions()) ?>;
	fpatientaddopt.lists["x_blood_group"] = <?php echo $patient_addopt->blood_group->Lookup->toClientList($patient_addopt) ?>;
	fpatientaddopt.lists["x_blood_group"].options = <?php echo JsonEncode($patient_addopt->blood_group->lookupOptions()) ?>;
	fpatientaddopt.lists["x_status"] = <?php echo $patient_addopt->status->Lookup->toClientList($patient_addopt) ?>;
	fpatientaddopt.lists["x_status"].options = <?php echo JsonEncode($patient_addopt->status->lookupOptions()) ?>;
	fpatientaddopt.lists["x_ReferedByDr"] = <?php echo $patient_addopt->ReferedByDr->Lookup->toClientList($patient_addopt) ?>;
	fpatientaddopt.lists["x_ReferedByDr"].options = <?php echo JsonEncode($patient_addopt->ReferedByDr->lookupOptions()) ?>;
	fpatientaddopt.lists["x_ReferA4TreatingConsultant"] = <?php echo $patient_addopt->ReferA4TreatingConsultant->Lookup->toClientList($patient_addopt) ?>;
	fpatientaddopt.lists["x_ReferA4TreatingConsultant"].options = <?php echo JsonEncode($patient_addopt->ReferA4TreatingConsultant->lookupOptions()) ?>;
	fpatientaddopt.lists["x_spouse_title"] = <?php echo $patient_addopt->spouse_title->Lookup->toClientList($patient_addopt) ?>;
	fpatientaddopt.lists["x_spouse_title"].options = <?php echo JsonEncode($patient_addopt->spouse_title->lookupOptions()) ?>;
	fpatientaddopt.lists["x_spouse_gender"] = <?php echo $patient_addopt->spouse_gender->Lookup->toClientList($patient_addopt) ?>;
	fpatientaddopt.lists["x_spouse_gender"].options = <?php echo JsonEncode($patient_addopt->spouse_gender->lookupOptions()) ?>;
	fpatientaddopt.lists["x_spouse_blood_group"] = <?php echo $patient_addopt->spouse_blood_group->Lookup->toClientList($patient_addopt) ?>;
	fpatientaddopt.lists["x_spouse_blood_group"].options = <?php echo JsonEncode($patient_addopt->spouse_blood_group->lookupOptions()) ?>;
	fpatientaddopt.lists["x_Maritalstatus"] = <?php echo $patient_addopt->Maritalstatus->Lookup->toClientList($patient_addopt) ?>;
	fpatientaddopt.lists["x_Maritalstatus"].options = <?php echo JsonEncode($patient_addopt->Maritalstatus->lookupOptions()) ?>;
	fpatientaddopt.lists["x_Business"] = <?php echo $patient_addopt->Business->Lookup->toClientList($patient_addopt) ?>;
	fpatientaddopt.lists["x_Business"].options = <?php echo JsonEncode($patient_addopt->Business->lookupOptions()) ?>;
	fpatientaddopt.autoSuggests["x_Business"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatientaddopt.lists["x_Patient_Language"] = <?php echo $patient_addopt->Patient_Language->Lookup->toClientList($patient_addopt) ?>;
	fpatientaddopt.lists["x_Patient_Language"].options = <?php echo JsonEncode($patient_addopt->Patient_Language->lookupOptions()) ?>;
	fpatientaddopt.lists["x_WhereDidYouHear[]"] = <?php echo $patient_addopt->WhereDidYouHear->Lookup->toClientList($patient_addopt) ?>;
	fpatientaddopt.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($patient_addopt->WhereDidYouHear->lookupOptions()) ?>;
	fpatientaddopt.lists["x_HospID"] = <?php echo $patient_addopt->HospID->Lookup->toClientList($patient_addopt) ?>;
	fpatientaddopt.lists["x_HospID"].options = <?php echo JsonEncode($patient_addopt->HospID->lookupOptions()) ?>;
	fpatientaddopt.lists["x_AppointmentSearch"] = <?php echo $patient_addopt->AppointmentSearch->Lookup->toClientList($patient_addopt) ?>;
	fpatientaddopt.lists["x_AppointmentSearch"].options = <?php echo JsonEncode($patient_addopt->AppointmentSearch->lookupOptions()) ?>;
	loadjs.done("fpatientaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_addopt->showPageHeader(); ?>
<?php
$patient_addopt->showMessage();
?>
<form name="fpatientaddopt" id="fpatientaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $patient_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($patient_addopt->PatientID->Visible) { // PatientID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PatientID"><?php echo $patient_addopt->PatientID->caption() ?><?php echo $patient_addopt->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->PatientID->EditValue ?>"<?php echo $patient_addopt->PatientID->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->title->Visible) { // title ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_title"><?php echo $patient_addopt->title->caption() ?><?php echo $patient_addopt->title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_title" data-value-separator="<?php echo $patient_addopt->title->displayValueSeparatorAttribute() ?>" id="x_title" name="x_title"<?php echo $patient_addopt->title->editAttributes() ?>>
			<?php echo $patient_addopt->title->selectOptionListHtml("x_title") ?>
		</select>
</div>
<?php echo $patient_addopt->title->Lookup->getParamTag($patient_addopt, "p_x_title") ?>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->first_name->Visible) { // first_name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_first_name"><?php echo $patient_addopt->first_name->caption() ?><?php echo $patient_addopt->first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_addopt->first_name->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->first_name->EditValue ?>"<?php echo $patient_addopt->first_name->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->middle_name->Visible) { // middle_name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_middle_name"><?php echo $patient_addopt->middle_name->caption() ?><?php echo $patient_addopt->middle_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_middle_name" name="x_middle_name" id="x_middle_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_addopt->middle_name->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->middle_name->EditValue ?>"<?php echo $patient_addopt->middle_name->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->last_name->Visible) { // last_name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_last_name"><?php echo $patient_addopt->last_name->caption() ?><?php echo $patient_addopt->last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_addopt->last_name->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->last_name->EditValue ?>"<?php echo $patient_addopt->last_name->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->gender->Visible) { // gender ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_gender"><?php echo $patient_addopt->gender->caption() ?><?php echo $patient_addopt->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_gender" data-value-separator="<?php echo $patient_addopt->gender->displayValueSeparatorAttribute() ?>" id="x_gender" name="x_gender"<?php echo $patient_addopt->gender->editAttributes() ?>>
			<?php echo $patient_addopt->gender->selectOptionListHtml("x_gender") ?>
		</select>
</div>
<?php echo $patient_addopt->gender->Lookup->getParamTag($patient_addopt, "p_x_gender") ?>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->dob->Visible) { // dob ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_dob"><?php echo $patient_addopt->dob->caption() ?><?php echo $patient_addopt->dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_dob" data-format="7" name="x_dob" id="x_dob" placeholder="<?php echo HtmlEncode($patient_addopt->dob->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->dob->EditValue ?>"<?php echo $patient_addopt->dob->editAttributes() ?>>
<?php if (!$patient_addopt->dob->ReadOnly && !$patient_addopt->dob->Disabled && !isset($patient_addopt->dob->EditAttrs["readonly"]) && !isset($patient_addopt->dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatientaddopt", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatientaddopt", "x_dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->Age->Visible) { // Age ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Age"><?php echo $patient_addopt->Age->caption() ?><?php echo $patient_addopt->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->Age->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->Age->EditValue ?>"<?php echo $patient_addopt->Age->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->blood_group->Visible) { // blood_group ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_blood_group"><?php echo $patient_addopt->blood_group->caption() ?><?php echo $patient_addopt->blood_group->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_blood_group" data-value-separator="<?php echo $patient_addopt->blood_group->displayValueSeparatorAttribute() ?>" id="x_blood_group" name="x_blood_group"<?php echo $patient_addopt->blood_group->editAttributes() ?>>
			<?php echo $patient_addopt->blood_group->selectOptionListHtml("x_blood_group") ?>
		</select>
</div>
<?php echo $patient_addopt->blood_group->Lookup->getParamTag($patient_addopt, "p_x_blood_group") ?>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->mobile_no->Visible) { // mobile_no ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_mobile_no"><?php echo $patient_addopt->mobile_no->caption() ?><?php echo $patient_addopt->mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->mobile_no->EditValue ?>"<?php echo $patient_addopt->mobile_no->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->description->Visible) { // description ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_description"><?php echo $patient_addopt->description->caption() ?><?php echo $patient_addopt->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_description" name="x_description" id="x_description" placeholder="<?php echo HtmlEncode($patient_addopt->description->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->description->EditValue ?>"<?php echo $patient_addopt->description->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->status->Visible) { // status ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_status"><?php echo $patient_addopt->status->caption() ?><?php echo $patient_addopt->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_status" data-value-separator="<?php echo $patient_addopt->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_addopt->status->editAttributes() ?>>
			<?php echo $patient_addopt->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $patient_addopt->status->Lookup->getParamTag($patient_addopt, "p_x_status") ?>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->createdby->Visible) { // createdby ?>
	<input type="hidden" data-table="patient" data-field="x_createdby" name="x_createdby" id="x_createdby" value="<?php echo HtmlEncode($patient_addopt->createdby->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_addopt->createddatetime->Visible) { // createddatetime ?>
	<input type="hidden" data-table="patient" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" value="<?php echo HtmlEncode($patient_addopt->createddatetime->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_addopt->modifiedby->Visible) { // modifiedby ?>
	<input type="hidden" data-table="patient" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" value="<?php echo HtmlEncode($patient_addopt->modifiedby->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_addopt->modifieddatetime->Visible) { // modifieddatetime ?>
	<input type="hidden" data-table="patient" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" value="<?php echo HtmlEncode($patient_addopt->modifieddatetime->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_addopt->profilePic->Visible) { // profilePic ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $patient_addopt->profilePic->caption() ?><?php echo $patient_addopt->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div id="fd_x_profilePic">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $patient_addopt->profilePic->title() ?>" data-table="patient" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" lang="<?php echo CurrentLanguageID() ?>"<?php echo $patient_addopt->profilePic->editAttributes() ?><?php if ($patient_addopt->profilePic->ReadOnly || $patient_addopt->profilePic->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_profilePic"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_profilePic" id= "fn_x_profilePic" value="<?php echo $patient_addopt->profilePic->Upload->FileName ?>">
<input type="hidden" name="fa_x_profilePic" id= "fa_x_profilePic" value="0">
<input type="hidden" name="fs_x_profilePic" id= "fs_x_profilePic" value="100">
<input type="hidden" name="fx_x_profilePic" id= "fx_x_profilePic" value="<?php echo $patient_addopt->profilePic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_profilePic" id= "fm_x_profilePic" value="<?php echo $patient_addopt->profilePic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_profilePic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->IdentificationMark->Visible) { // IdentificationMark ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_IdentificationMark"><?php echo $patient_addopt->IdentificationMark->caption() ?><?php echo $patient_addopt->IdentificationMark->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->IdentificationMark->EditValue ?>"<?php echo $patient_addopt->IdentificationMark->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->Religion->Visible) { // Religion ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Religion"><?php echo $patient_addopt->Religion->caption() ?><?php echo $patient_addopt->Religion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_Religion" name="x_Religion" id="x_Religion" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->Religion->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->Religion->EditValue ?>"<?php echo $patient_addopt->Religion->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->Nationality->Visible) { // Nationality ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Nationality"><?php echo $patient_addopt->Nationality->caption() ?><?php echo $patient_addopt->Nationality->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_Nationality" name="x_Nationality" id="x_Nationality" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->Nationality->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->Nationality->EditValue ?>"<?php echo $patient_addopt->Nationality->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->ReferedByDr->Visible) { // ReferedByDr ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ReferedByDr"><?php echo $patient_addopt->ReferedByDr->caption() ?><?php echo $patient_addopt->ReferedByDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferedByDr"><?php echo EmptyValue(strval($patient_addopt->ReferedByDr->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_addopt->ReferedByDr->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_addopt->ReferedByDr->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_addopt->ReferedByDr->ReadOnly || $patient_addopt->ReferedByDr->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferedByDr',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_addopt->ReferedByDr->Lookup->getParamTag($patient_addopt, "p_x_ReferedByDr") ?>
<input type="hidden" data-table="patient" data-field="x_ReferedByDr" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_addopt->ReferedByDr->displayValueSeparatorAttribute() ?>" name="x_ReferedByDr" id="x_ReferedByDr" value="<?php echo $patient_addopt->ReferedByDr->CurrentValue ?>"<?php echo $patient_addopt->ReferedByDr->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->ReferClinicname->Visible) { // ReferClinicname ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ReferClinicname"><?php echo $patient_addopt->ReferClinicname->caption() ?><?php echo $patient_addopt->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->ReferClinicname->EditValue ?>"<?php echo $patient_addopt->ReferClinicname->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->ReferCity->Visible) { // ReferCity ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ReferCity"><?php echo $patient_addopt->ReferCity->caption() ?><?php echo $patient_addopt->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->ReferCity->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->ReferCity->EditValue ?>"<?php echo $patient_addopt->ReferCity->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ReferMobileNo"><?php echo $patient_addopt->ReferMobileNo->caption() ?><?php echo $patient_addopt->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->ReferMobileNo->EditValue ?>"<?php echo $patient_addopt->ReferMobileNo->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ReferA4TreatingConsultant"><?php echo $patient_addopt->ReferA4TreatingConsultant->caption() ?><?php echo $patient_addopt->ReferA4TreatingConsultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferA4TreatingConsultant"><?php echo EmptyValue(strval($patient_addopt->ReferA4TreatingConsultant->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_addopt->ReferA4TreatingConsultant->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_addopt->ReferA4TreatingConsultant->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_addopt->ReferA4TreatingConsultant->ReadOnly || $patient_addopt->ReferA4TreatingConsultant->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferA4TreatingConsultant',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_addopt->ReferA4TreatingConsultant->Lookup->getParamTag($patient_addopt, "p_x_ReferA4TreatingConsultant") ?>
<input type="hidden" data-table="patient" data-field="x_ReferA4TreatingConsultant" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_addopt->ReferA4TreatingConsultant->displayValueSeparatorAttribute() ?>" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" value="<?php echo $patient_addopt->ReferA4TreatingConsultant->CurrentValue ?>"<?php echo $patient_addopt->ReferA4TreatingConsultant->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PurposreReferredfor"><?php echo $patient_addopt->PurposreReferredfor->caption() ?><?php echo $patient_addopt->PurposreReferredfor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->PurposreReferredfor->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->PurposreReferredfor->EditValue ?>"<?php echo $patient_addopt->PurposreReferredfor->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->spouse_title->Visible) { // spouse_title ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_title"><?php echo $patient_addopt->spouse_title->caption() ?><?php echo $patient_addopt->spouse_title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_title" data-value-separator="<?php echo $patient_addopt->spouse_title->displayValueSeparatorAttribute() ?>" id="x_spouse_title" name="x_spouse_title"<?php echo $patient_addopt->spouse_title->editAttributes() ?>>
			<?php echo $patient_addopt->spouse_title->selectOptionListHtml("x_spouse_title") ?>
		</select>
</div>
<?php echo $patient_addopt->spouse_title->Lookup->getParamTag($patient_addopt, "p_x_spouse_title") ?>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->spouse_first_name->Visible) { // spouse_first_name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_first_name"><?php echo $patient_addopt->spouse_first_name->caption() ?><?php echo $patient_addopt->spouse_first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_spouse_first_name" name="x_spouse_first_name" id="x_spouse_first_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->spouse_first_name->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->spouse_first_name->EditValue ?>"<?php echo $patient_addopt->spouse_first_name->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_middle_name"><?php echo $patient_addopt->spouse_middle_name->caption() ?><?php echo $patient_addopt->spouse_middle_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_spouse_middle_name" name="x_spouse_middle_name" id="x_spouse_middle_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->spouse_middle_name->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->spouse_middle_name->EditValue ?>"<?php echo $patient_addopt->spouse_middle_name->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->spouse_last_name->Visible) { // spouse_last_name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_last_name"><?php echo $patient_addopt->spouse_last_name->caption() ?><?php echo $patient_addopt->spouse_last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_spouse_last_name" name="x_spouse_last_name" id="x_spouse_last_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->spouse_last_name->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->spouse_last_name->EditValue ?>"<?php echo $patient_addopt->spouse_last_name->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->spouse_gender->Visible) { // spouse_gender ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_gender"><?php echo $patient_addopt->spouse_gender->caption() ?><?php echo $patient_addopt->spouse_gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_gender" data-value-separator="<?php echo $patient_addopt->spouse_gender->displayValueSeparatorAttribute() ?>" id="x_spouse_gender" name="x_spouse_gender"<?php echo $patient_addopt->spouse_gender->editAttributes() ?>>
			<?php echo $patient_addopt->spouse_gender->selectOptionListHtml("x_spouse_gender") ?>
		</select>
</div>
<?php echo $patient_addopt->spouse_gender->Lookup->getParamTag($patient_addopt, "p_x_spouse_gender") ?>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->spouse_dob->Visible) { // spouse_dob ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_dob"><?php echo $patient_addopt->spouse_dob->caption() ?><?php echo $patient_addopt->spouse_dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_spouse_dob" data-format="7" name="x_spouse_dob" id="x_spouse_dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->spouse_dob->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->spouse_dob->EditValue ?>"<?php echo $patient_addopt->spouse_dob->editAttributes() ?>>
<?php if (!$patient_addopt->spouse_dob->ReadOnly && !$patient_addopt->spouse_dob->Disabled && !isset($patient_addopt->spouse_dob->EditAttrs["readonly"]) && !isset($patient_addopt->spouse_dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatientaddopt", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatientaddopt", "x_spouse_dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->spouse_Age->Visible) { // spouse_Age ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_Age"><?php echo $patient_addopt->spouse_Age->caption() ?><?php echo $patient_addopt->spouse_Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_spouse_Age" name="x_spouse_Age" id="x_spouse_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->spouse_Age->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->spouse_Age->EditValue ?>"<?php echo $patient_addopt->spouse_Age->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_blood_group"><?php echo $patient_addopt->spouse_blood_group->caption() ?><?php echo $patient_addopt->spouse_blood_group->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_blood_group" data-value-separator="<?php echo $patient_addopt->spouse_blood_group->displayValueSeparatorAttribute() ?>" id="x_spouse_blood_group" name="x_spouse_blood_group"<?php echo $patient_addopt->spouse_blood_group->editAttributes() ?>>
			<?php echo $patient_addopt->spouse_blood_group->selectOptionListHtml("x_spouse_blood_group") ?>
		</select>
</div>
<?php echo $patient_addopt->spouse_blood_group->Lookup->getParamTag($patient_addopt, "p_x_spouse_blood_group") ?>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_mobile_no"><?php echo $patient_addopt->spouse_mobile_no->caption() ?><?php echo $patient_addopt->spouse_mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_spouse_mobile_no" name="x_spouse_mobile_no" id="x_spouse_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->spouse_mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->spouse_mobile_no->EditValue ?>"<?php echo $patient_addopt->spouse_mobile_no->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->Maritalstatus->Visible) { // Maritalstatus ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Maritalstatus"><?php echo $patient_addopt->Maritalstatus->caption() ?><?php echo $patient_addopt->Maritalstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_Maritalstatus" data-value-separator="<?php echo $patient_addopt->Maritalstatus->displayValueSeparatorAttribute() ?>" id="x_Maritalstatus" name="x_Maritalstatus"<?php echo $patient_addopt->Maritalstatus->editAttributes() ?>>
			<?php echo $patient_addopt->Maritalstatus->selectOptionListHtml("x_Maritalstatus") ?>
		</select>
</div>
<?php echo $patient_addopt->Maritalstatus->Lookup->getParamTag($patient_addopt, "p_x_Maritalstatus") ?>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->Business->Visible) { // Business ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $patient_addopt->Business->caption() ?><?php echo $patient_addopt->Business->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php
$onchange = $patient_addopt->Business->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_addopt->Business->EditAttrs["onchange"] = "";
?>
<span id="as_x_Business">
	<input type="text" class="form-control" name="sv_x_Business" id="sv_x_Business" value="<?php echo RemoveHtml($patient_addopt->Business->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->Business->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_addopt->Business->getPlaceHolder()) ?>"<?php echo $patient_addopt->Business->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient" data-field="x_Business" data-value-separator="<?php echo $patient_addopt->Business->displayValueSeparatorAttribute() ?>" name="x_Business" id="x_Business" value="<?php echo HtmlEncode($patient_addopt->Business->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatientaddopt"], function() {
	fpatientaddopt.createAutoSuggest({"id":"x_Business","forceSelect":false});
});
</script>
<?php echo $patient_addopt->Business->Lookup->getParamTag($patient_addopt, "p_x_Business") ?>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->Patient_Language->Visible) { // Patient_Language ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Patient_Language"><?php echo $patient_addopt->Patient_Language->caption() ?><?php echo $patient_addopt->Patient_Language->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_Patient_Language" data-value-separator="<?php echo $patient_addopt->Patient_Language->displayValueSeparatorAttribute() ?>" id="x_Patient_Language" name="x_Patient_Language"<?php echo $patient_addopt->Patient_Language->editAttributes() ?>>
			<?php echo $patient_addopt->Patient_Language->selectOptionListHtml("x_Patient_Language") ?>
		</select>
</div>
<?php echo $patient_addopt->Patient_Language->Lookup->getParamTag($patient_addopt, "p_x_Patient_Language") ?>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->Passport->Visible) { // Passport ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Passport"><?php echo $patient_addopt->Passport->caption() ?><?php echo $patient_addopt->Passport->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_Passport" name="x_Passport" id="x_Passport" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->Passport->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->Passport->EditValue ?>"<?php echo $patient_addopt->Passport->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->VisaNo->Visible) { // VisaNo ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_VisaNo"><?php echo $patient_addopt->VisaNo->caption() ?><?php echo $patient_addopt->VisaNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_VisaNo" name="x_VisaNo" id="x_VisaNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->VisaNo->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->VisaNo->EditValue ?>"<?php echo $patient_addopt->VisaNo->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ValidityOfVisa"><?php echo $patient_addopt->ValidityOfVisa->caption() ?><?php echo $patient_addopt->ValidityOfVisa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_ValidityOfVisa" name="x_ValidityOfVisa" id="x_ValidityOfVisa" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->ValidityOfVisa->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->ValidityOfVisa->EditValue ?>"<?php echo $patient_addopt->ValidityOfVisa->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $patient_addopt->WhereDidYouHear->caption() ?><?php echo $patient_addopt->WhereDidYouHear->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div id="tp_x_WhereDidYouHear" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $patient_addopt->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x_WhereDidYouHear[]" id="x_WhereDidYouHear[]" value="{value}"<?php echo $patient_addopt->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_addopt->WhereDidYouHear->checkBoxListHtml(FALSE, "x_WhereDidYouHear[]") ?>
</div></div>
<?php echo $patient_addopt->WhereDidYouHear->Lookup->getParamTag($patient_addopt, "p_x_WhereDidYouHear") ?>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->HospID->Visible) { // HospID ?>
	<input type="hidden" data-table="patient" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($patient_addopt->HospID->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_addopt->street->Visible) { // street ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_street"><?php echo $patient_addopt->street->caption() ?><?php echo $patient_addopt->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_addopt->street->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->street->EditValue ?>"<?php echo $patient_addopt->street->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->town->Visible) { // town ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_town"><?php echo $patient_addopt->town->caption() ?><?php echo $patient_addopt->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_addopt->town->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->town->EditValue ?>"<?php echo $patient_addopt->town->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->province->Visible) { // province ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_province"><?php echo $patient_addopt->province->caption() ?><?php echo $patient_addopt->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_addopt->province->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->province->EditValue ?>"<?php echo $patient_addopt->province->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->country->Visible) { // country ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_country"><?php echo $patient_addopt->country->caption() ?><?php echo $patient_addopt->country->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_country" name="x_country" id="x_country" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_addopt->country->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->country->EditValue ?>"<?php echo $patient_addopt->country->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->postal_code->Visible) { // postal_code ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_postal_code"><?php echo $patient_addopt->postal_code->caption() ?><?php echo $patient_addopt->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_addopt->postal_code->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->postal_code->EditValue ?>"<?php echo $patient_addopt->postal_code->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->PEmail->Visible) { // PEmail ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PEmail"><?php echo $patient_addopt->PEmail->caption() ?><?php echo $patient_addopt->PEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_PEmail" name="x_PEmail" id="x_PEmail" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_addopt->PEmail->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->PEmail->EditValue ?>"<?php echo $patient_addopt->PEmail->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PEmergencyContact"><?php echo $patient_addopt->PEmergencyContact->caption() ?><?php echo $patient_addopt->PEmergencyContact->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_PEmergencyContact" name="x_PEmergencyContact" id="x_PEmergencyContact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_addopt->PEmergencyContact->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->PEmergencyContact->EditValue ?>"<?php echo $patient_addopt->PEmergencyContact->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->occupation->Visible) { // occupation ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_occupation"><?php echo $patient_addopt->occupation->caption() ?><?php echo $patient_addopt->occupation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_occupation" name="x_occupation" id="x_occupation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->occupation->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->occupation->EditValue ?>"<?php echo $patient_addopt->occupation->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->spouse_occupation->Visible) { // spouse_occupation ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_spouse_occupation"><?php echo $patient_addopt->spouse_occupation->caption() ?><?php echo $patient_addopt->spouse_occupation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_spouse_occupation" name="x_spouse_occupation" id="x_spouse_occupation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->spouse_occupation->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->spouse_occupation->EditValue ?>"<?php echo $patient_addopt->spouse_occupation->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->WhatsApp->Visible) { // WhatsApp ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_WhatsApp"><?php echo $patient_addopt->WhatsApp->caption() ?><?php echo $patient_addopt->WhatsApp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_WhatsApp" name="x_WhatsApp" id="x_WhatsApp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->WhatsApp->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->WhatsApp->EditValue ?>"<?php echo $patient_addopt->WhatsApp->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->CouppleID->Visible) { // CouppleID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CouppleID"><?php echo $patient_addopt->CouppleID->caption() ?><?php echo $patient_addopt->CouppleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_CouppleID" name="x_CouppleID" id="x_CouppleID" size="30" placeholder="<?php echo HtmlEncode($patient_addopt->CouppleID->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->CouppleID->EditValue ?>"<?php echo $patient_addopt->CouppleID->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->MaleID->Visible) { // MaleID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_MaleID"><?php echo $patient_addopt->MaleID->caption() ?><?php echo $patient_addopt->MaleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_MaleID" name="x_MaleID" id="x_MaleID" size="30" placeholder="<?php echo HtmlEncode($patient_addopt->MaleID->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->MaleID->EditValue ?>"<?php echo $patient_addopt->MaleID->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->FemaleID->Visible) { // FemaleID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_FemaleID"><?php echo $patient_addopt->FemaleID->caption() ?><?php echo $patient_addopt->FemaleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_FemaleID" name="x_FemaleID" id="x_FemaleID" size="30" placeholder="<?php echo HtmlEncode($patient_addopt->FemaleID->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->FemaleID->EditValue ?>"<?php echo $patient_addopt->FemaleID->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->GroupID->Visible) { // GroupID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_GroupID"><?php echo $patient_addopt->GroupID->caption() ?><?php echo $patient_addopt->GroupID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_GroupID" name="x_GroupID" id="x_GroupID" size="30" placeholder="<?php echo HtmlEncode($patient_addopt->GroupID->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->GroupID->EditValue ?>"<?php echo $patient_addopt->GroupID->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->Relationship->Visible) { // Relationship ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Relationship"><?php echo $patient_addopt->Relationship->caption() ?><?php echo $patient_addopt->Relationship->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_Relationship" name="x_Relationship" id="x_Relationship" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->Relationship->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->Relationship->EditValue ?>"<?php echo $patient_addopt->Relationship->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->AppointmentSearch->Visible) { // AppointmentSearch ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_AppointmentSearch"><?php echo $patient_addopt->AppointmentSearch->caption() ?><?php echo $patient_addopt->AppointmentSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php $patient_addopt->AppointmentSearch->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AppointmentSearch"><?php echo EmptyValue(strval($patient_addopt->AppointmentSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_addopt->AppointmentSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_addopt->AppointmentSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_addopt->AppointmentSearch->ReadOnly || $patient_addopt->AppointmentSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_AppointmentSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_addopt->AppointmentSearch->Lookup->getParamTag($patient_addopt, "p_x_AppointmentSearch") ?>
<input type="hidden" data-table="patient" data-field="x_AppointmentSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_addopt->AppointmentSearch->displayValueSeparatorAttribute() ?>" name="x_AppointmentSearch" id="x_AppointmentSearch" value="<?php echo $patient_addopt->AppointmentSearch->CurrentValue ?>"<?php echo $patient_addopt->AppointmentSearch->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($patient_addopt->FacebookID->Visible) { // FacebookID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_FacebookID"><?php echo $patient_addopt->FacebookID->caption() ?><?php echo $patient_addopt->FacebookID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="patient" data-field="x_FacebookID" name="x_FacebookID" id="x_FacebookID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_addopt->FacebookID->getPlaceHolder()) ?>" value="<?php echo $patient_addopt->FacebookID->EditValue ?>"<?php echo $patient_addopt->FacebookID->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$patient_addopt->showPageFooter();
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
<?php
$patient_addopt->terminate();
?>