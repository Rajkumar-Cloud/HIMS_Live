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
<?php include_once "header.php"; ?>
<script>
var fpatientadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpatientadd = currentForm = new ew.Form("fpatientadd", "add");

	// Validate form
	fpatientadd.validate = function() {
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
			<?php if ($patient_add->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->PatientID->caption(), $patient_add->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->title->Required) { ?>
				elm = this.getElements("x" + infix + "_title");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->title->caption(), $patient_add->title->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->first_name->Required) { ?>
				elm = this.getElements("x" + infix + "_first_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->first_name->caption(), $patient_add->first_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->middle_name->Required) { ?>
				elm = this.getElements("x" + infix + "_middle_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->middle_name->caption(), $patient_add->middle_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->last_name->Required) { ?>
				elm = this.getElements("x" + infix + "_last_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->last_name->caption(), $patient_add->last_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->gender->Required) { ?>
				elm = this.getElements("x" + infix + "_gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->gender->caption(), $patient_add->gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->dob->Required) { ?>
				elm = this.getElements("x" + infix + "_dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->dob->caption(), $patient_add->dob->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dob");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_add->dob->errorMessage()) ?>");
			<?php if ($patient_add->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->Age->caption(), $patient_add->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->blood_group->Required) { ?>
				elm = this.getElements("x" + infix + "_blood_group");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->blood_group->caption(), $patient_add->blood_group->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->mobile_no->Required) { ?>
				elm = this.getElements("x" + infix + "_mobile_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->mobile_no->caption(), $patient_add->mobile_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->description->Required) { ?>
				elm = this.getElements("x" + infix + "_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->description->caption(), $patient_add->description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->status->caption(), $patient_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->createdby->caption(), $patient_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->createddatetime->caption(), $patient_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->profilePic->Required) { ?>
				felm = this.getElements("x" + infix + "_profilePic");
				elm = this.getElements("fn_x" + infix + "_profilePic");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $patient_add->profilePic->caption(), $patient_add->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->IdentificationMark->Required) { ?>
				elm = this.getElements("x" + infix + "_IdentificationMark");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->IdentificationMark->caption(), $patient_add->IdentificationMark->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->Religion->Required) { ?>
				elm = this.getElements("x" + infix + "_Religion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->Religion->caption(), $patient_add->Religion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->Nationality->Required) { ?>
				elm = this.getElements("x" + infix + "_Nationality");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->Nationality->caption(), $patient_add->Nationality->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->ReferedByDr->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferedByDr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->ReferedByDr->caption(), $patient_add->ReferedByDr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->ReferClinicname->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferClinicname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->ReferClinicname->caption(), $patient_add->ReferClinicname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->ReferCity->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferCity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->ReferCity->caption(), $patient_add->ReferCity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->ReferMobileNo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferMobileNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->ReferMobileNo->caption(), $patient_add->ReferMobileNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->ReferA4TreatingConsultant->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferA4TreatingConsultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->ReferA4TreatingConsultant->caption(), $patient_add->ReferA4TreatingConsultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->PurposreReferredfor->Required) { ?>
				elm = this.getElements("x" + infix + "_PurposreReferredfor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->PurposreReferredfor->caption(), $patient_add->PurposreReferredfor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->spouse_title->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_title");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->spouse_title->caption(), $patient_add->spouse_title->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->spouse_first_name->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_first_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->spouse_first_name->caption(), $patient_add->spouse_first_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->spouse_middle_name->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_middle_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->spouse_middle_name->caption(), $patient_add->spouse_middle_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->spouse_last_name->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_last_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->spouse_last_name->caption(), $patient_add->spouse_last_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->spouse_gender->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->spouse_gender->caption(), $patient_add->spouse_gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->spouse_dob->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->spouse_dob->caption(), $patient_add->spouse_dob->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->spouse_Age->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->spouse_Age->caption(), $patient_add->spouse_Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->spouse_blood_group->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_blood_group");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->spouse_blood_group->caption(), $patient_add->spouse_blood_group->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->spouse_mobile_no->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_mobile_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->spouse_mobile_no->caption(), $patient_add->spouse_mobile_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->Maritalstatus->Required) { ?>
				elm = this.getElements("x" + infix + "_Maritalstatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->Maritalstatus->caption(), $patient_add->Maritalstatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->Business->Required) { ?>
				elm = this.getElements("x" + infix + "_Business");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->Business->caption(), $patient_add->Business->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->Patient_Language->Required) { ?>
				elm = this.getElements("x" + infix + "_Patient_Language");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->Patient_Language->caption(), $patient_add->Patient_Language->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->Passport->Required) { ?>
				elm = this.getElements("x" + infix + "_Passport");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->Passport->caption(), $patient_add->Passport->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->VisaNo->Required) { ?>
				elm = this.getElements("x" + infix + "_VisaNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->VisaNo->caption(), $patient_add->VisaNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->ValidityOfVisa->Required) { ?>
				elm = this.getElements("x" + infix + "_ValidityOfVisa");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->ValidityOfVisa->caption(), $patient_add->ValidityOfVisa->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->WhereDidYouHear->Required) { ?>
				elm = this.getElements("x" + infix + "_WhereDidYouHear[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->WhereDidYouHear->caption(), $patient_add->WhereDidYouHear->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->HospID->caption(), $patient_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->street->Required) { ?>
				elm = this.getElements("x" + infix + "_street");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->street->caption(), $patient_add->street->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->town->Required) { ?>
				elm = this.getElements("x" + infix + "_town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->town->caption(), $patient_add->town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->province->Required) { ?>
				elm = this.getElements("x" + infix + "_province");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->province->caption(), $patient_add->province->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->country->Required) { ?>
				elm = this.getElements("x" + infix + "_country");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->country->caption(), $patient_add->country->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->postal_code->Required) { ?>
				elm = this.getElements("x" + infix + "_postal_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->postal_code->caption(), $patient_add->postal_code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->PEmail->Required) { ?>
				elm = this.getElements("x" + infix + "_PEmail");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->PEmail->caption(), $patient_add->PEmail->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->PEmergencyContact->Required) { ?>
				elm = this.getElements("x" + infix + "_PEmergencyContact");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->PEmergencyContact->caption(), $patient_add->PEmergencyContact->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->occupation->Required) { ?>
				elm = this.getElements("x" + infix + "_occupation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->occupation->caption(), $patient_add->occupation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->spouse_occupation->Required) { ?>
				elm = this.getElements("x" + infix + "_spouse_occupation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->spouse_occupation->caption(), $patient_add->spouse_occupation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->WhatsApp->Required) { ?>
				elm = this.getElements("x" + infix + "_WhatsApp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->WhatsApp->caption(), $patient_add->WhatsApp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->CouppleID->Required) { ?>
				elm = this.getElements("x" + infix + "_CouppleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->CouppleID->caption(), $patient_add->CouppleID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CouppleID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_add->CouppleID->errorMessage()) ?>");
			<?php if ($patient_add->MaleID->Required) { ?>
				elm = this.getElements("x" + infix + "_MaleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->MaleID->caption(), $patient_add->MaleID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MaleID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_add->MaleID->errorMessage()) ?>");
			<?php if ($patient_add->FemaleID->Required) { ?>
				elm = this.getElements("x" + infix + "_FemaleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->FemaleID->caption(), $patient_add->FemaleID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FemaleID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_add->FemaleID->errorMessage()) ?>");
			<?php if ($patient_add->GroupID->Required) { ?>
				elm = this.getElements("x" + infix + "_GroupID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->GroupID->caption(), $patient_add->GroupID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GroupID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_add->GroupID->errorMessage()) ?>");
			<?php if ($patient_add->Relationship->Required) { ?>
				elm = this.getElements("x" + infix + "_Relationship");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->Relationship->caption(), $patient_add->Relationship->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->AppointmentSearch->Required) { ?>
				elm = this.getElements("x" + infix + "_AppointmentSearch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->AppointmentSearch->caption(), $patient_add->AppointmentSearch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_add->FacebookID->Required) { ?>
				elm = this.getElements("x" + infix + "_FacebookID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_add->FacebookID->caption(), $patient_add->FacebookID->RequiredErrorMessage)) ?>");
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
	fpatientadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatientadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatientadd.lists["x_title"] = <?php echo $patient_add->title->Lookup->toClientList($patient_add) ?>;
	fpatientadd.lists["x_title"].options = <?php echo JsonEncode($patient_add->title->lookupOptions()) ?>;
	fpatientadd.lists["x_gender"] = <?php echo $patient_add->gender->Lookup->toClientList($patient_add) ?>;
	fpatientadd.lists["x_gender"].options = <?php echo JsonEncode($patient_add->gender->lookupOptions()) ?>;
	fpatientadd.lists["x_blood_group"] = <?php echo $patient_add->blood_group->Lookup->toClientList($patient_add) ?>;
	fpatientadd.lists["x_blood_group"].options = <?php echo JsonEncode($patient_add->blood_group->lookupOptions()) ?>;
	fpatientadd.lists["x_status"] = <?php echo $patient_add->status->Lookup->toClientList($patient_add) ?>;
	fpatientadd.lists["x_status"].options = <?php echo JsonEncode($patient_add->status->lookupOptions()) ?>;
	fpatientadd.lists["x_ReferedByDr"] = <?php echo $patient_add->ReferedByDr->Lookup->toClientList($patient_add) ?>;
	fpatientadd.lists["x_ReferedByDr"].options = <?php echo JsonEncode($patient_add->ReferedByDr->lookupOptions()) ?>;
	fpatientadd.lists["x_ReferA4TreatingConsultant"] = <?php echo $patient_add->ReferA4TreatingConsultant->Lookup->toClientList($patient_add) ?>;
	fpatientadd.lists["x_ReferA4TreatingConsultant"].options = <?php echo JsonEncode($patient_add->ReferA4TreatingConsultant->lookupOptions()) ?>;
	fpatientadd.lists["x_spouse_title"] = <?php echo $patient_add->spouse_title->Lookup->toClientList($patient_add) ?>;
	fpatientadd.lists["x_spouse_title"].options = <?php echo JsonEncode($patient_add->spouse_title->lookupOptions()) ?>;
	fpatientadd.lists["x_spouse_gender"] = <?php echo $patient_add->spouse_gender->Lookup->toClientList($patient_add) ?>;
	fpatientadd.lists["x_spouse_gender"].options = <?php echo JsonEncode($patient_add->spouse_gender->lookupOptions()) ?>;
	fpatientadd.lists["x_spouse_blood_group"] = <?php echo $patient_add->spouse_blood_group->Lookup->toClientList($patient_add) ?>;
	fpatientadd.lists["x_spouse_blood_group"].options = <?php echo JsonEncode($patient_add->spouse_blood_group->lookupOptions()) ?>;
	fpatientadd.lists["x_Maritalstatus"] = <?php echo $patient_add->Maritalstatus->Lookup->toClientList($patient_add) ?>;
	fpatientadd.lists["x_Maritalstatus"].options = <?php echo JsonEncode($patient_add->Maritalstatus->lookupOptions()) ?>;
	fpatientadd.lists["x_Business"] = <?php echo $patient_add->Business->Lookup->toClientList($patient_add) ?>;
	fpatientadd.lists["x_Business"].options = <?php echo JsonEncode($patient_add->Business->lookupOptions()) ?>;
	fpatientadd.autoSuggests["x_Business"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatientadd.lists["x_Patient_Language"] = <?php echo $patient_add->Patient_Language->Lookup->toClientList($patient_add) ?>;
	fpatientadd.lists["x_Patient_Language"].options = <?php echo JsonEncode($patient_add->Patient_Language->lookupOptions()) ?>;
	fpatientadd.lists["x_WhereDidYouHear[]"] = <?php echo $patient_add->WhereDidYouHear->Lookup->toClientList($patient_add) ?>;
	fpatientadd.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($patient_add->WhereDidYouHear->lookupOptions()) ?>;
	fpatientadd.lists["x_HospID"] = <?php echo $patient_add->HospID->Lookup->toClientList($patient_add) ?>;
	fpatientadd.lists["x_HospID"].options = <?php echo JsonEncode($patient_add->HospID->lookupOptions()) ?>;
	fpatientadd.lists["x_AppointmentSearch"] = <?php echo $patient_add->AppointmentSearch->Lookup->toClientList($patient_add) ?>;
	fpatientadd.lists["x_AppointmentSearch"].options = <?php echo JsonEncode($patient_add->AppointmentSearch->lookupOptions()) ?>;
	loadjs.done("fpatientadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_add->showPageHeader(); ?>
<?php
$patient_add->showMessage();
?>
<form name="fpatientadd" id="fpatientadd" class="<?php echo $patient_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($patient_add->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_patient_PatientID" for="x_PatientID" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_PatientID" type="text/html"><?php echo $patient_add->PatientID->caption() ?><?php echo $patient_add->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->PatientID->cellAttributes() ?>>
<script id="tpx_patient_PatientID" type="text/html"><span id="el_patient_PatientID">
<input type="text" data-table="patient" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient_add->PatientID->EditValue ?>"<?php echo $patient_add->PatientID->editAttributes() ?>>
</span></script>
<?php echo $patient_add->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->title->Visible) { // title ?>
	<div id="r_title" class="form-group row">
		<label id="elh_patient_title" for="x_title" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_title" type="text/html"><?php echo $patient_add->title->caption() ?><?php echo $patient_add->title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->title->cellAttributes() ?>>
<script id="tpx_patient_title" type="text/html"><span id="el_patient_title">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_title" data-value-separator="<?php echo $patient_add->title->displayValueSeparatorAttribute() ?>" id="x_title" name="x_title"<?php echo $patient_add->title->editAttributes() ?>>
			<?php echo $patient_add->title->selectOptionListHtml("x_title") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_tittle") && !$patient_add->title->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_title" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_add->title->caption() ?>" data-title="<?php echo $patient_add->title->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_title',url:'sys_tittleaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $patient_add->title->Lookup->getParamTag($patient_add, "p_x_title") ?>
</span></script>
<?php echo $patient_add->title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->first_name->Visible) { // first_name ?>
	<div id="r_first_name" class="form-group row">
		<label id="elh_patient_first_name" for="x_first_name" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_first_name" type="text/html"><?php echo $patient_add->first_name->caption() ?><?php echo $patient_add->first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->first_name->cellAttributes() ?>>
<script id="tpx_patient_first_name" type="text/html"><span id="el_patient_first_name">
<input type="text" data-table="patient" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_add->first_name->getPlaceHolder()) ?>" value="<?php echo $patient_add->first_name->EditValue ?>"<?php echo $patient_add->first_name->editAttributes() ?>>
</span></script>
<?php echo $patient_add->first_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->middle_name->Visible) { // middle_name ?>
	<div id="r_middle_name" class="form-group row">
		<label id="elh_patient_middle_name" for="x_middle_name" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_middle_name" type="text/html"><?php echo $patient_add->middle_name->caption() ?><?php echo $patient_add->middle_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->middle_name->cellAttributes() ?>>
<script id="tpx_patient_middle_name" type="text/html"><span id="el_patient_middle_name">
<input type="text" data-table="patient" data-field="x_middle_name" name="x_middle_name" id="x_middle_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_add->middle_name->getPlaceHolder()) ?>" value="<?php echo $patient_add->middle_name->EditValue ?>"<?php echo $patient_add->middle_name->editAttributes() ?>>
</span></script>
<?php echo $patient_add->middle_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->last_name->Visible) { // last_name ?>
	<div id="r_last_name" class="form-group row">
		<label id="elh_patient_last_name" for="x_last_name" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_last_name" type="text/html"><?php echo $patient_add->last_name->caption() ?><?php echo $patient_add->last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->last_name->cellAttributes() ?>>
<script id="tpx_patient_last_name" type="text/html"><span id="el_patient_last_name">
<input type="text" data-table="patient" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_add->last_name->getPlaceHolder()) ?>" value="<?php echo $patient_add->last_name->EditValue ?>"<?php echo $patient_add->last_name->editAttributes() ?>>
</span></script>
<?php echo $patient_add->last_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_patient_gender" for="x_gender" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_gender" type="text/html"><?php echo $patient_add->gender->caption() ?><?php echo $patient_add->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->gender->cellAttributes() ?>>
<script id="tpx_patient_gender" type="text/html"><span id="el_patient_gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_gender" data-value-separator="<?php echo $patient_add->gender->displayValueSeparatorAttribute() ?>" id="x_gender" name="x_gender"<?php echo $patient_add->gender->editAttributes() ?>>
			<?php echo $patient_add->gender->selectOptionListHtml("x_gender") ?>
		</select>
</div>
<?php echo $patient_add->gender->Lookup->getParamTag($patient_add, "p_x_gender") ?>
</span></script>
<?php echo $patient_add->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->dob->Visible) { // dob ?>
	<div id="r_dob" class="form-group row">
		<label id="elh_patient_dob" for="x_dob" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_dob" type="text/html"><?php echo $patient_add->dob->caption() ?><?php echo $patient_add->dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->dob->cellAttributes() ?>>
<script id="tpx_patient_dob" type="text/html"><span id="el_patient_dob">
<input type="text" data-table="patient" data-field="x_dob" data-format="7" name="x_dob" id="x_dob" placeholder="<?php echo HtmlEncode($patient_add->dob->getPlaceHolder()) ?>" value="<?php echo $patient_add->dob->EditValue ?>"<?php echo $patient_add->dob->editAttributes() ?>>
<?php if (!$patient_add->dob->ReadOnly && !$patient_add->dob->Disabled && !isset($patient_add->dob->EditAttrs["readonly"]) && !isset($patient_add->dob->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patientadd_js">
loadjs.ready(["fpatientadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatientadd", "x_dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_add->dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_Age" for="x_Age" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Age" type="text/html"><?php echo $patient_add->Age->caption() ?><?php echo $patient_add->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->Age->cellAttributes() ?>>
<script id="tpx_patient_Age" type="text/html"><span id="el_patient_Age">
<input type="text" data-table="patient" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->Age->getPlaceHolder()) ?>" value="<?php echo $patient_add->Age->EditValue ?>"<?php echo $patient_add->Age->editAttributes() ?>>
</span></script>
<?php echo $patient_add->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->blood_group->Visible) { // blood_group ?>
	<div id="r_blood_group" class="form-group row">
		<label id="elh_patient_blood_group" for="x_blood_group" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_blood_group" type="text/html"><?php echo $patient_add->blood_group->caption() ?><?php echo $patient_add->blood_group->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->blood_group->cellAttributes() ?>>
<script id="tpx_patient_blood_group" type="text/html"><span id="el_patient_blood_group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_blood_group" data-value-separator="<?php echo $patient_add->blood_group->displayValueSeparatorAttribute() ?>" id="x_blood_group" name="x_blood_group"<?php echo $patient_add->blood_group->editAttributes() ?>>
			<?php echo $patient_add->blood_group->selectOptionListHtml("x_blood_group") ?>
		</select>
</div>
<?php echo $patient_add->blood_group->Lookup->getParamTag($patient_add, "p_x_blood_group") ?>
</span></script>
<?php echo $patient_add->blood_group->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->mobile_no->Visible) { // mobile_no ?>
	<div id="r_mobile_no" class="form-group row">
		<label id="elh_patient_mobile_no" for="x_mobile_no" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_mobile_no" type="text/html"><?php echo $patient_add->mobile_no->caption() ?><?php echo $patient_add->mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->mobile_no->cellAttributes() ?>>
<script id="tpx_patient_mobile_no" type="text/html"><span id="el_patient_mobile_no">
<input type="text" data-table="patient" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient_add->mobile_no->EditValue ?>"<?php echo $patient_add->mobile_no->editAttributes() ?>>
</span></script>
<?php echo $patient_add->mobile_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_patient_description" for="x_description" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_description" type="text/html"><?php echo $patient_add->description->caption() ?><?php echo $patient_add->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->description->cellAttributes() ?>>
<script id="tpx_patient_description" type="text/html"><span id="el_patient_description">
<input type="text" data-table="patient" data-field="x_description" name="x_description" id="x_description" placeholder="<?php echo HtmlEncode($patient_add->description->getPlaceHolder()) ?>" value="<?php echo $patient_add->description->EditValue ?>"<?php echo $patient_add->description->editAttributes() ?>>
</span></script>
<?php echo $patient_add->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_status" for="x_status" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_status" type="text/html"><?php echo $patient_add->status->caption() ?><?php echo $patient_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->status->cellAttributes() ?>>
<script id="tpx_patient_status" type="text/html"><span id="el_patient_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_status" data-value-separator="<?php echo $patient_add->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_add->status->editAttributes() ?>>
			<?php echo $patient_add->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $patient_add->status->Lookup->getParamTag($patient_add, "p_x_status") ?>
</span></script>
<?php echo $patient_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_profilePic" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_profilePic" type="text/html"><?php echo $patient_add->profilePic->caption() ?><?php echo $patient_add->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->profilePic->cellAttributes() ?>>
<script id="tpx_patient_profilePic" type="text/html"><span id="el_patient_profilePic">
<div id="fd_x_profilePic">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $patient_add->profilePic->title() ?>" data-table="patient" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" lang="<?php echo CurrentLanguageID() ?>"<?php echo $patient_add->profilePic->editAttributes() ?><?php if ($patient_add->profilePic->ReadOnly || $patient_add->profilePic->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_profilePic"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_profilePic" id= "fn_x_profilePic" value="<?php echo $patient_add->profilePic->Upload->FileName ?>">
<input type="hidden" name="fa_x_profilePic" id= "fa_x_profilePic" value="0">
<input type="hidden" name="fs_x_profilePic" id= "fs_x_profilePic" value="100">
<input type="hidden" name="fx_x_profilePic" id= "fx_x_profilePic" value="<?php echo $patient_add->profilePic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_profilePic" id= "fm_x_profilePic" value="<?php echo $patient_add->profilePic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_profilePic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span></script>
<?php echo $patient_add->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->IdentificationMark->Visible) { // IdentificationMark ?>
	<div id="r_IdentificationMark" class="form-group row">
		<label id="elh_patient_IdentificationMark" for="x_IdentificationMark" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_IdentificationMark" type="text/html"><?php echo $patient_add->IdentificationMark->caption() ?><?php echo $patient_add->IdentificationMark->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->IdentificationMark->cellAttributes() ?>>
<script id="tpx_patient_IdentificationMark" type="text/html"><span id="el_patient_IdentificationMark">
<input type="text" data-table="patient" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $patient_add->IdentificationMark->EditValue ?>"<?php echo $patient_add->IdentificationMark->editAttributes() ?>>
</span></script>
<?php echo $patient_add->IdentificationMark->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->Religion->Visible) { // Religion ?>
	<div id="r_Religion" class="form-group row">
		<label id="elh_patient_Religion" for="x_Religion" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Religion" type="text/html"><?php echo $patient_add->Religion->caption() ?><?php echo $patient_add->Religion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->Religion->cellAttributes() ?>>
<script id="tpx_patient_Religion" type="text/html"><span id="el_patient_Religion">
<input type="text" data-table="patient" data-field="x_Religion" name="x_Religion" id="x_Religion" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->Religion->getPlaceHolder()) ?>" value="<?php echo $patient_add->Religion->EditValue ?>"<?php echo $patient_add->Religion->editAttributes() ?>>
</span></script>
<?php echo $patient_add->Religion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->Nationality->Visible) { // Nationality ?>
	<div id="r_Nationality" class="form-group row">
		<label id="elh_patient_Nationality" for="x_Nationality" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Nationality" type="text/html"><?php echo $patient_add->Nationality->caption() ?><?php echo $patient_add->Nationality->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->Nationality->cellAttributes() ?>>
<script id="tpx_patient_Nationality" type="text/html"><span id="el_patient_Nationality">
<input type="text" data-table="patient" data-field="x_Nationality" name="x_Nationality" id="x_Nationality" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->Nationality->getPlaceHolder()) ?>" value="<?php echo $patient_add->Nationality->EditValue ?>"<?php echo $patient_add->Nationality->editAttributes() ?>>
</span></script>
<?php echo $patient_add->Nationality->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->ReferedByDr->Visible) { // ReferedByDr ?>
	<div id="r_ReferedByDr" class="form-group row">
		<label id="elh_patient_ReferedByDr" for="x_ReferedByDr" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_ReferedByDr" type="text/html"><?php echo $patient_add->ReferedByDr->caption() ?><?php echo $patient_add->ReferedByDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->ReferedByDr->cellAttributes() ?>>
<script id="tpx_patient_ReferedByDr" type="text/html"><span id="el_patient_ReferedByDr">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferedByDr"><?php echo EmptyValue(strval($patient_add->ReferedByDr->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_add->ReferedByDr->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_add->ReferedByDr->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_add->ReferedByDr->ReadOnly || $patient_add->ReferedByDr->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferedByDr',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$patient_add->ReferedByDr->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferedByDr" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_add->ReferedByDr->caption() ?>" data-title="<?php echo $patient_add->ReferedByDr->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferedByDr',url:'mas_reference_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $patient_add->ReferedByDr->Lookup->getParamTag($patient_add, "p_x_ReferedByDr") ?>
<input type="hidden" data-table="patient" data-field="x_ReferedByDr" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_add->ReferedByDr->displayValueSeparatorAttribute() ?>" name="x_ReferedByDr" id="x_ReferedByDr" value="<?php echo $patient_add->ReferedByDr->CurrentValue ?>"<?php echo $patient_add->ReferedByDr->editAttributes() ?>>
</span></script>
<?php echo $patient_add->ReferedByDr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label id="elh_patient_ReferClinicname" for="x_ReferClinicname" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_ReferClinicname" type="text/html"><?php echo $patient_add->ReferClinicname->caption() ?><?php echo $patient_add->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->ReferClinicname->cellAttributes() ?>>
<script id="tpx_patient_ReferClinicname" type="text/html"><span id="el_patient_ReferClinicname">
<input type="text" data-table="patient" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $patient_add->ReferClinicname->EditValue ?>"<?php echo $patient_add->ReferClinicname->editAttributes() ?>>
</span></script>
<?php echo $patient_add->ReferClinicname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label id="elh_patient_ReferCity" for="x_ReferCity" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_ReferCity" type="text/html"><?php echo $patient_add->ReferCity->caption() ?><?php echo $patient_add->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->ReferCity->cellAttributes() ?>>
<script id="tpx_patient_ReferCity" type="text/html"><span id="el_patient_ReferCity">
<input type="text" data-table="patient" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->ReferCity->getPlaceHolder()) ?>" value="<?php echo $patient_add->ReferCity->EditValue ?>"<?php echo $patient_add->ReferCity->editAttributes() ?>>
</span></script>
<?php echo $patient_add->ReferCity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label id="elh_patient_ReferMobileNo" for="x_ReferMobileNo" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_ReferMobileNo" type="text/html"><?php echo $patient_add->ReferMobileNo->caption() ?><?php echo $patient_add->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_patient_ReferMobileNo" type="text/html"><span id="el_patient_ReferMobileNo">
<input type="text" data-table="patient" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $patient_add->ReferMobileNo->EditValue ?>"<?php echo $patient_add->ReferMobileNo->editAttributes() ?>>
</span></script>
<?php echo $patient_add->ReferMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div id="r_ReferA4TreatingConsultant" class="form-group row">
		<label id="elh_patient_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_ReferA4TreatingConsultant" type="text/html"><?php echo $patient_add->ReferA4TreatingConsultant->caption() ?><?php echo $patient_add->ReferA4TreatingConsultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_patient_ReferA4TreatingConsultant" type="text/html"><span id="el_patient_ReferA4TreatingConsultant">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferA4TreatingConsultant"><?php echo EmptyValue(strval($patient_add->ReferA4TreatingConsultant->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_add->ReferA4TreatingConsultant->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_add->ReferA4TreatingConsultant->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_add->ReferA4TreatingConsultant->ReadOnly || $patient_add->ReferA4TreatingConsultant->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferA4TreatingConsultant',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$patient_add->ReferA4TreatingConsultant->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferA4TreatingConsultant" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_add->ReferA4TreatingConsultant->caption() ?>" data-title="<?php echo $patient_add->ReferA4TreatingConsultant->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferA4TreatingConsultant',url:'doctorsaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $patient_add->ReferA4TreatingConsultant->Lookup->getParamTag($patient_add, "p_x_ReferA4TreatingConsultant") ?>
<input type="hidden" data-table="patient" data-field="x_ReferA4TreatingConsultant" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_add->ReferA4TreatingConsultant->displayValueSeparatorAttribute() ?>" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" value="<?php echo $patient_add->ReferA4TreatingConsultant->CurrentValue ?>"<?php echo $patient_add->ReferA4TreatingConsultant->editAttributes() ?>>
</span></script>
<?php echo $patient_add->ReferA4TreatingConsultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div id="r_PurposreReferredfor" class="form-group row">
		<label id="elh_patient_PurposreReferredfor" for="x_PurposreReferredfor" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_PurposreReferredfor" type="text/html"><?php echo $patient_add->PurposreReferredfor->caption() ?><?php echo $patient_add->PurposreReferredfor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_patient_PurposreReferredfor" type="text/html"><span id="el_patient_PurposreReferredfor">
<input type="text" data-table="patient" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->PurposreReferredfor->getPlaceHolder()) ?>" value="<?php echo $patient_add->PurposreReferredfor->EditValue ?>"<?php echo $patient_add->PurposreReferredfor->editAttributes() ?>>
</span></script>
<?php echo $patient_add->PurposreReferredfor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->spouse_title->Visible) { // spouse_title ?>
	<div id="r_spouse_title" class="form-group row">
		<label id="elh_patient_spouse_title" for="x_spouse_title" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_title" type="text/html"><?php echo $patient_add->spouse_title->caption() ?><?php echo $patient_add->spouse_title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->spouse_title->cellAttributes() ?>>
<script id="tpx_patient_spouse_title" type="text/html"><span id="el_patient_spouse_title">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_title" data-value-separator="<?php echo $patient_add->spouse_title->displayValueSeparatorAttribute() ?>" id="x_spouse_title" name="x_spouse_title"<?php echo $patient_add->spouse_title->editAttributes() ?>>
			<?php echo $patient_add->spouse_title->selectOptionListHtml("x_spouse_title") ?>
		</select>
</div>
<?php echo $patient_add->spouse_title->Lookup->getParamTag($patient_add, "p_x_spouse_title") ?>
</span></script>
<?php echo $patient_add->spouse_title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->spouse_first_name->Visible) { // spouse_first_name ?>
	<div id="r_spouse_first_name" class="form-group row">
		<label id="elh_patient_spouse_first_name" for="x_spouse_first_name" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_first_name" type="text/html"><?php echo $patient_add->spouse_first_name->caption() ?><?php echo $patient_add->spouse_first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->spouse_first_name->cellAttributes() ?>>
<script id="tpx_patient_spouse_first_name" type="text/html"><span id="el_patient_spouse_first_name">
<input type="text" data-table="patient" data-field="x_spouse_first_name" name="x_spouse_first_name" id="x_spouse_first_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->spouse_first_name->getPlaceHolder()) ?>" value="<?php echo $patient_add->spouse_first_name->EditValue ?>"<?php echo $patient_add->spouse_first_name->editAttributes() ?>>
</span></script>
<?php echo $patient_add->spouse_first_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<div id="r_spouse_middle_name" class="form-group row">
		<label id="elh_patient_spouse_middle_name" for="x_spouse_middle_name" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_middle_name" type="text/html"><?php echo $patient_add->spouse_middle_name->caption() ?><?php echo $patient_add->spouse_middle_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->spouse_middle_name->cellAttributes() ?>>
<script id="tpx_patient_spouse_middle_name" type="text/html"><span id="el_patient_spouse_middle_name">
<input type="text" data-table="patient" data-field="x_spouse_middle_name" name="x_spouse_middle_name" id="x_spouse_middle_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->spouse_middle_name->getPlaceHolder()) ?>" value="<?php echo $patient_add->spouse_middle_name->EditValue ?>"<?php echo $patient_add->spouse_middle_name->editAttributes() ?>>
</span></script>
<?php echo $patient_add->spouse_middle_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->spouse_last_name->Visible) { // spouse_last_name ?>
	<div id="r_spouse_last_name" class="form-group row">
		<label id="elh_patient_spouse_last_name" for="x_spouse_last_name" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_last_name" type="text/html"><?php echo $patient_add->spouse_last_name->caption() ?><?php echo $patient_add->spouse_last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->spouse_last_name->cellAttributes() ?>>
<script id="tpx_patient_spouse_last_name" type="text/html"><span id="el_patient_spouse_last_name">
<input type="text" data-table="patient" data-field="x_spouse_last_name" name="x_spouse_last_name" id="x_spouse_last_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->spouse_last_name->getPlaceHolder()) ?>" value="<?php echo $patient_add->spouse_last_name->EditValue ?>"<?php echo $patient_add->spouse_last_name->editAttributes() ?>>
</span></script>
<?php echo $patient_add->spouse_last_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->spouse_gender->Visible) { // spouse_gender ?>
	<div id="r_spouse_gender" class="form-group row">
		<label id="elh_patient_spouse_gender" for="x_spouse_gender" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_gender" type="text/html"><?php echo $patient_add->spouse_gender->caption() ?><?php echo $patient_add->spouse_gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->spouse_gender->cellAttributes() ?>>
<script id="tpx_patient_spouse_gender" type="text/html"><span id="el_patient_spouse_gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_gender" data-value-separator="<?php echo $patient_add->spouse_gender->displayValueSeparatorAttribute() ?>" id="x_spouse_gender" name="x_spouse_gender"<?php echo $patient_add->spouse_gender->editAttributes() ?>>
			<?php echo $patient_add->spouse_gender->selectOptionListHtml("x_spouse_gender") ?>
		</select>
</div>
<?php echo $patient_add->spouse_gender->Lookup->getParamTag($patient_add, "p_x_spouse_gender") ?>
</span></script>
<?php echo $patient_add->spouse_gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->spouse_dob->Visible) { // spouse_dob ?>
	<div id="r_spouse_dob" class="form-group row">
		<label id="elh_patient_spouse_dob" for="x_spouse_dob" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_dob" type="text/html"><?php echo $patient_add->spouse_dob->caption() ?><?php echo $patient_add->spouse_dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->spouse_dob->cellAttributes() ?>>
<script id="tpx_patient_spouse_dob" type="text/html"><span id="el_patient_spouse_dob">
<input type="text" data-table="patient" data-field="x_spouse_dob" data-format="7" name="x_spouse_dob" id="x_spouse_dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->spouse_dob->getPlaceHolder()) ?>" value="<?php echo $patient_add->spouse_dob->EditValue ?>"<?php echo $patient_add->spouse_dob->editAttributes() ?>>
<?php if (!$patient_add->spouse_dob->ReadOnly && !$patient_add->spouse_dob->Disabled && !isset($patient_add->spouse_dob->EditAttrs["readonly"]) && !isset($patient_add->spouse_dob->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patientadd_js">
loadjs.ready(["fpatientadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatientadd", "x_spouse_dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_add->spouse_dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->spouse_Age->Visible) { // spouse_Age ?>
	<div id="r_spouse_Age" class="form-group row">
		<label id="elh_patient_spouse_Age" for="x_spouse_Age" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_Age" type="text/html"><?php echo $patient_add->spouse_Age->caption() ?><?php echo $patient_add->spouse_Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->spouse_Age->cellAttributes() ?>>
<script id="tpx_patient_spouse_Age" type="text/html"><span id="el_patient_spouse_Age">
<input type="text" data-table="patient" data-field="x_spouse_Age" name="x_spouse_Age" id="x_spouse_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->spouse_Age->getPlaceHolder()) ?>" value="<?php echo $patient_add->spouse_Age->EditValue ?>"<?php echo $patient_add->spouse_Age->editAttributes() ?>>
</span></script>
<?php echo $patient_add->spouse_Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<div id="r_spouse_blood_group" class="form-group row">
		<label id="elh_patient_spouse_blood_group" for="x_spouse_blood_group" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_blood_group" type="text/html"><?php echo $patient_add->spouse_blood_group->caption() ?><?php echo $patient_add->spouse_blood_group->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->spouse_blood_group->cellAttributes() ?>>
<script id="tpx_patient_spouse_blood_group" type="text/html"><span id="el_patient_spouse_blood_group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_blood_group" data-value-separator="<?php echo $patient_add->spouse_blood_group->displayValueSeparatorAttribute() ?>" id="x_spouse_blood_group" name="x_spouse_blood_group"<?php echo $patient_add->spouse_blood_group->editAttributes() ?>>
			<?php echo $patient_add->spouse_blood_group->selectOptionListHtml("x_spouse_blood_group") ?>
		</select>
</div>
<?php echo $patient_add->spouse_blood_group->Lookup->getParamTag($patient_add, "p_x_spouse_blood_group") ?>
</span></script>
<?php echo $patient_add->spouse_blood_group->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<div id="r_spouse_mobile_no" class="form-group row">
		<label id="elh_patient_spouse_mobile_no" for="x_spouse_mobile_no" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_mobile_no" type="text/html"><?php echo $patient_add->spouse_mobile_no->caption() ?><?php echo $patient_add->spouse_mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->spouse_mobile_no->cellAttributes() ?>>
<script id="tpx_patient_spouse_mobile_no" type="text/html"><span id="el_patient_spouse_mobile_no">
<input type="text" data-table="patient" data-field="x_spouse_mobile_no" name="x_spouse_mobile_no" id="x_spouse_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->spouse_mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient_add->spouse_mobile_no->EditValue ?>"<?php echo $patient_add->spouse_mobile_no->editAttributes() ?>>
</span></script>
<?php echo $patient_add->spouse_mobile_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->Maritalstatus->Visible) { // Maritalstatus ?>
	<div id="r_Maritalstatus" class="form-group row">
		<label id="elh_patient_Maritalstatus" for="x_Maritalstatus" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Maritalstatus" type="text/html"><?php echo $patient_add->Maritalstatus->caption() ?><?php echo $patient_add->Maritalstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->Maritalstatus->cellAttributes() ?>>
<script id="tpx_patient_Maritalstatus" type="text/html"><span id="el_patient_Maritalstatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_Maritalstatus" data-value-separator="<?php echo $patient_add->Maritalstatus->displayValueSeparatorAttribute() ?>" id="x_Maritalstatus" name="x_Maritalstatus"<?php echo $patient_add->Maritalstatus->editAttributes() ?>>
			<?php echo $patient_add->Maritalstatus->selectOptionListHtml("x_Maritalstatus") ?>
		</select>
</div>
<?php echo $patient_add->Maritalstatus->Lookup->getParamTag($patient_add, "p_x_Maritalstatus") ?>
</span></script>
<?php echo $patient_add->Maritalstatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->Business->Visible) { // Business ?>
	<div id="r_Business" class="form-group row">
		<label id="elh_patient_Business" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Business" type="text/html"><?php echo $patient_add->Business->caption() ?><?php echo $patient_add->Business->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->Business->cellAttributes() ?>>
<script id="tpx_patient_Business" type="text/html"><span id="el_patient_Business">
<?php
$onchange = $patient_add->Business->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_add->Business->EditAttrs["onchange"] = "";
?>
<span id="as_x_Business">
	<input type="text" class="form-control" name="sv_x_Business" id="sv_x_Business" value="<?php echo RemoveHtml($patient_add->Business->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->Business->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_add->Business->getPlaceHolder()) ?>"<?php echo $patient_add->Business->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient" data-field="x_Business" data-value-separator="<?php echo $patient_add->Business->displayValueSeparatorAttribute() ?>" name="x_Business" id="x_Business" value="<?php echo HtmlEncode($patient_add->Business->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_add->Business->Lookup->getParamTag($patient_add, "p_x_Business") ?>
</span></script>
<script type="text/html" class="patientadd_js">
loadjs.ready(["fpatientadd"], function() {
	fpatientadd.createAutoSuggest({"id":"x_Business","forceSelect":false});
});
</script>
<?php echo $patient_add->Business->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->Patient_Language->Visible) { // Patient_Language ?>
	<div id="r_Patient_Language" class="form-group row">
		<label id="elh_patient_Patient_Language" for="x_Patient_Language" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Patient_Language" type="text/html"><?php echo $patient_add->Patient_Language->caption() ?><?php echo $patient_add->Patient_Language->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->Patient_Language->cellAttributes() ?>>
<script id="tpx_patient_Patient_Language" type="text/html"><span id="el_patient_Patient_Language">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_Patient_Language" data-value-separator="<?php echo $patient_add->Patient_Language->displayValueSeparatorAttribute() ?>" id="x_Patient_Language" name="x_Patient_Language"<?php echo $patient_add->Patient_Language->editAttributes() ?>>
			<?php echo $patient_add->Patient_Language->selectOptionListHtml("x_Patient_Language") ?>
		</select>
</div>
<?php echo $patient_add->Patient_Language->Lookup->getParamTag($patient_add, "p_x_Patient_Language") ?>
</span></script>
<?php echo $patient_add->Patient_Language->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->Passport->Visible) { // Passport ?>
	<div id="r_Passport" class="form-group row">
		<label id="elh_patient_Passport" for="x_Passport" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Passport" type="text/html"><?php echo $patient_add->Passport->caption() ?><?php echo $patient_add->Passport->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->Passport->cellAttributes() ?>>
<script id="tpx_patient_Passport" type="text/html"><span id="el_patient_Passport">
<input type="text" data-table="patient" data-field="x_Passport" name="x_Passport" id="x_Passport" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->Passport->getPlaceHolder()) ?>" value="<?php echo $patient_add->Passport->EditValue ?>"<?php echo $patient_add->Passport->editAttributes() ?>>
</span></script>
<?php echo $patient_add->Passport->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->VisaNo->Visible) { // VisaNo ?>
	<div id="r_VisaNo" class="form-group row">
		<label id="elh_patient_VisaNo" for="x_VisaNo" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_VisaNo" type="text/html"><?php echo $patient_add->VisaNo->caption() ?><?php echo $patient_add->VisaNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->VisaNo->cellAttributes() ?>>
<script id="tpx_patient_VisaNo" type="text/html"><span id="el_patient_VisaNo">
<input type="text" data-table="patient" data-field="x_VisaNo" name="x_VisaNo" id="x_VisaNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->VisaNo->getPlaceHolder()) ?>" value="<?php echo $patient_add->VisaNo->EditValue ?>"<?php echo $patient_add->VisaNo->editAttributes() ?>>
</span></script>
<?php echo $patient_add->VisaNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<div id="r_ValidityOfVisa" class="form-group row">
		<label id="elh_patient_ValidityOfVisa" for="x_ValidityOfVisa" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_ValidityOfVisa" type="text/html"><?php echo $patient_add->ValidityOfVisa->caption() ?><?php echo $patient_add->ValidityOfVisa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->ValidityOfVisa->cellAttributes() ?>>
<script id="tpx_patient_ValidityOfVisa" type="text/html"><span id="el_patient_ValidityOfVisa">
<input type="text" data-table="patient" data-field="x_ValidityOfVisa" name="x_ValidityOfVisa" id="x_ValidityOfVisa" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->ValidityOfVisa->getPlaceHolder()) ?>" value="<?php echo $patient_add->ValidityOfVisa->EditValue ?>"<?php echo $patient_add->ValidityOfVisa->editAttributes() ?>>
</span></script>
<?php echo $patient_add->ValidityOfVisa->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<div id="r_WhereDidYouHear" class="form-group row">
		<label id="elh_patient_WhereDidYouHear" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_WhereDidYouHear" type="text/html"><?php echo $patient_add->WhereDidYouHear->caption() ?><?php echo $patient_add->WhereDidYouHear->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->WhereDidYouHear->cellAttributes() ?>>
<script id="tpx_patient_WhereDidYouHear" type="text/html"><span id="el_patient_WhereDidYouHear">
<div id="tp_x_WhereDidYouHear" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $patient_add->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x_WhereDidYouHear[]" id="x_WhereDidYouHear[]" value="{value}"<?php echo $patient_add->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_add->WhereDidYouHear->checkBoxListHtml(FALSE, "x_WhereDidYouHear[]") ?>
</div></div>
<?php echo $patient_add->WhereDidYouHear->Lookup->getParamTag($patient_add, "p_x_WhereDidYouHear") ?>
</span></script>
<?php echo $patient_add->WhereDidYouHear->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label id="elh_patient_street" for="x_street" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_street" type="text/html"><?php echo $patient_add->street->caption() ?><?php echo $patient_add->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->street->cellAttributes() ?>>
<script id="tpx_patient_street" type="text/html"><span id="el_patient_street">
<input type="text" data-table="patient" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_add->street->getPlaceHolder()) ?>" value="<?php echo $patient_add->street->EditValue ?>"<?php echo $patient_add->street->editAttributes() ?>>
</span></script>
<?php echo $patient_add->street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label id="elh_patient_town" for="x_town" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_town" type="text/html"><?php echo $patient_add->town->caption() ?><?php echo $patient_add->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->town->cellAttributes() ?>>
<script id="tpx_patient_town" type="text/html"><span id="el_patient_town">
<input type="text" data-table="patient" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_add->town->getPlaceHolder()) ?>" value="<?php echo $patient_add->town->EditValue ?>"<?php echo $patient_add->town->editAttributes() ?>>
</span></script>
<?php echo $patient_add->town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_patient_province" for="x_province" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_province" type="text/html"><?php echo $patient_add->province->caption() ?><?php echo $patient_add->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->province->cellAttributes() ?>>
<script id="tpx_patient_province" type="text/html"><span id="el_patient_province">
<input type="text" data-table="patient" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_add->province->getPlaceHolder()) ?>" value="<?php echo $patient_add->province->EditValue ?>"<?php echo $patient_add->province->editAttributes() ?>>
</span></script>
<?php echo $patient_add->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->country->Visible) { // country ?>
	<div id="r_country" class="form-group row">
		<label id="elh_patient_country" for="x_country" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_country" type="text/html"><?php echo $patient_add->country->caption() ?><?php echo $patient_add->country->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->country->cellAttributes() ?>>
<script id="tpx_patient_country" type="text/html"><span id="el_patient_country">
<input type="text" data-table="patient" data-field="x_country" name="x_country" id="x_country" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_add->country->getPlaceHolder()) ?>" value="<?php echo $patient_add->country->EditValue ?>"<?php echo $patient_add->country->editAttributes() ?>>
</span></script>
<?php echo $patient_add->country->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_patient_postal_code" for="x_postal_code" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_postal_code" type="text/html"><?php echo $patient_add->postal_code->caption() ?><?php echo $patient_add->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->postal_code->cellAttributes() ?>>
<script id="tpx_patient_postal_code" type="text/html"><span id="el_patient_postal_code">
<input type="text" data-table="patient" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_add->postal_code->getPlaceHolder()) ?>" value="<?php echo $patient_add->postal_code->EditValue ?>"<?php echo $patient_add->postal_code->editAttributes() ?>>
</span></script>
<?php echo $patient_add->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->PEmail->Visible) { // PEmail ?>
	<div id="r_PEmail" class="form-group row">
		<label id="elh_patient_PEmail" for="x_PEmail" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_PEmail" type="text/html"><?php echo $patient_add->PEmail->caption() ?><?php echo $patient_add->PEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->PEmail->cellAttributes() ?>>
<script id="tpx_patient_PEmail" type="text/html"><span id="el_patient_PEmail">
<input type="text" data-table="patient" data-field="x_PEmail" name="x_PEmail" id="x_PEmail" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_add->PEmail->getPlaceHolder()) ?>" value="<?php echo $patient_add->PEmail->EditValue ?>"<?php echo $patient_add->PEmail->editAttributes() ?>>
</span></script>
<?php echo $patient_add->PEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<div id="r_PEmergencyContact" class="form-group row">
		<label id="elh_patient_PEmergencyContact" for="x_PEmergencyContact" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_PEmergencyContact" type="text/html"><?php echo $patient_add->PEmergencyContact->caption() ?><?php echo $patient_add->PEmergencyContact->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->PEmergencyContact->cellAttributes() ?>>
<script id="tpx_patient_PEmergencyContact" type="text/html"><span id="el_patient_PEmergencyContact">
<input type="text" data-table="patient" data-field="x_PEmergencyContact" name="x_PEmergencyContact" id="x_PEmergencyContact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_add->PEmergencyContact->getPlaceHolder()) ?>" value="<?php echo $patient_add->PEmergencyContact->EditValue ?>"<?php echo $patient_add->PEmergencyContact->editAttributes() ?>>
</span></script>
<?php echo $patient_add->PEmergencyContact->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->occupation->Visible) { // occupation ?>
	<div id="r_occupation" class="form-group row">
		<label id="elh_patient_occupation" for="x_occupation" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_occupation" type="text/html"><?php echo $patient_add->occupation->caption() ?><?php echo $patient_add->occupation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->occupation->cellAttributes() ?>>
<script id="tpx_patient_occupation" type="text/html"><span id="el_patient_occupation">
<input type="text" data-table="patient" data-field="x_occupation" name="x_occupation" id="x_occupation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->occupation->getPlaceHolder()) ?>" value="<?php echo $patient_add->occupation->EditValue ?>"<?php echo $patient_add->occupation->editAttributes() ?>>
</span></script>
<?php echo $patient_add->occupation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->spouse_occupation->Visible) { // spouse_occupation ?>
	<div id="r_spouse_occupation" class="form-group row">
		<label id="elh_patient_spouse_occupation" for="x_spouse_occupation" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_spouse_occupation" type="text/html"><?php echo $patient_add->spouse_occupation->caption() ?><?php echo $patient_add->spouse_occupation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->spouse_occupation->cellAttributes() ?>>
<script id="tpx_patient_spouse_occupation" type="text/html"><span id="el_patient_spouse_occupation">
<input type="text" data-table="patient" data-field="x_spouse_occupation" name="x_spouse_occupation" id="x_spouse_occupation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->spouse_occupation->getPlaceHolder()) ?>" value="<?php echo $patient_add->spouse_occupation->EditValue ?>"<?php echo $patient_add->spouse_occupation->editAttributes() ?>>
</span></script>
<?php echo $patient_add->spouse_occupation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->WhatsApp->Visible) { // WhatsApp ?>
	<div id="r_WhatsApp" class="form-group row">
		<label id="elh_patient_WhatsApp" for="x_WhatsApp" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_WhatsApp" type="text/html"><?php echo $patient_add->WhatsApp->caption() ?><?php echo $patient_add->WhatsApp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->WhatsApp->cellAttributes() ?>>
<script id="tpx_patient_WhatsApp" type="text/html"><span id="el_patient_WhatsApp">
<input type="text" data-table="patient" data-field="x_WhatsApp" name="x_WhatsApp" id="x_WhatsApp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->WhatsApp->getPlaceHolder()) ?>" value="<?php echo $patient_add->WhatsApp->EditValue ?>"<?php echo $patient_add->WhatsApp->editAttributes() ?>>
</span></script>
<?php echo $patient_add->WhatsApp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->CouppleID->Visible) { // CouppleID ?>
	<div id="r_CouppleID" class="form-group row">
		<label id="elh_patient_CouppleID" for="x_CouppleID" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_CouppleID" type="text/html"><?php echo $patient_add->CouppleID->caption() ?><?php echo $patient_add->CouppleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->CouppleID->cellAttributes() ?>>
<script id="tpx_patient_CouppleID" type="text/html"><span id="el_patient_CouppleID">
<input type="text" data-table="patient" data-field="x_CouppleID" name="x_CouppleID" id="x_CouppleID" size="30" placeholder="<?php echo HtmlEncode($patient_add->CouppleID->getPlaceHolder()) ?>" value="<?php echo $patient_add->CouppleID->EditValue ?>"<?php echo $patient_add->CouppleID->editAttributes() ?>>
</span></script>
<?php echo $patient_add->CouppleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->MaleID->Visible) { // MaleID ?>
	<div id="r_MaleID" class="form-group row">
		<label id="elh_patient_MaleID" for="x_MaleID" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_MaleID" type="text/html"><?php echo $patient_add->MaleID->caption() ?><?php echo $patient_add->MaleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->MaleID->cellAttributes() ?>>
<script id="tpx_patient_MaleID" type="text/html"><span id="el_patient_MaleID">
<input type="text" data-table="patient" data-field="x_MaleID" name="x_MaleID" id="x_MaleID" size="30" placeholder="<?php echo HtmlEncode($patient_add->MaleID->getPlaceHolder()) ?>" value="<?php echo $patient_add->MaleID->EditValue ?>"<?php echo $patient_add->MaleID->editAttributes() ?>>
</span></script>
<?php echo $patient_add->MaleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->FemaleID->Visible) { // FemaleID ?>
	<div id="r_FemaleID" class="form-group row">
		<label id="elh_patient_FemaleID" for="x_FemaleID" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_FemaleID" type="text/html"><?php echo $patient_add->FemaleID->caption() ?><?php echo $patient_add->FemaleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->FemaleID->cellAttributes() ?>>
<script id="tpx_patient_FemaleID" type="text/html"><span id="el_patient_FemaleID">
<input type="text" data-table="patient" data-field="x_FemaleID" name="x_FemaleID" id="x_FemaleID" size="30" placeholder="<?php echo HtmlEncode($patient_add->FemaleID->getPlaceHolder()) ?>" value="<?php echo $patient_add->FemaleID->EditValue ?>"<?php echo $patient_add->FemaleID->editAttributes() ?>>
</span></script>
<?php echo $patient_add->FemaleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->GroupID->Visible) { // GroupID ?>
	<div id="r_GroupID" class="form-group row">
		<label id="elh_patient_GroupID" for="x_GroupID" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_GroupID" type="text/html"><?php echo $patient_add->GroupID->caption() ?><?php echo $patient_add->GroupID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->GroupID->cellAttributes() ?>>
<script id="tpx_patient_GroupID" type="text/html"><span id="el_patient_GroupID">
<input type="text" data-table="patient" data-field="x_GroupID" name="x_GroupID" id="x_GroupID" size="30" placeholder="<?php echo HtmlEncode($patient_add->GroupID->getPlaceHolder()) ?>" value="<?php echo $patient_add->GroupID->EditValue ?>"<?php echo $patient_add->GroupID->editAttributes() ?>>
</span></script>
<?php echo $patient_add->GroupID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->Relationship->Visible) { // Relationship ?>
	<div id="r_Relationship" class="form-group row">
		<label id="elh_patient_Relationship" for="x_Relationship" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_Relationship" type="text/html"><?php echo $patient_add->Relationship->caption() ?><?php echo $patient_add->Relationship->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->Relationship->cellAttributes() ?>>
<script id="tpx_patient_Relationship" type="text/html"><span id="el_patient_Relationship">
<input type="text" data-table="patient" data-field="x_Relationship" name="x_Relationship" id="x_Relationship" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->Relationship->getPlaceHolder()) ?>" value="<?php echo $patient_add->Relationship->EditValue ?>"<?php echo $patient_add->Relationship->editAttributes() ?>>
</span></script>
<?php echo $patient_add->Relationship->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->AppointmentSearch->Visible) { // AppointmentSearch ?>
	<div id="r_AppointmentSearch" class="form-group row">
		<label id="elh_patient_AppointmentSearch" for="x_AppointmentSearch" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_AppointmentSearch" type="text/html"><?php echo $patient_add->AppointmentSearch->caption() ?><?php echo $patient_add->AppointmentSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->AppointmentSearch->cellAttributes() ?>>
<script id="tpx_patient_AppointmentSearch" type="text/html"><span id="el_patient_AppointmentSearch">
<?php $patient_add->AppointmentSearch->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AppointmentSearch"><?php echo EmptyValue(strval($patient_add->AppointmentSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_add->AppointmentSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_add->AppointmentSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_add->AppointmentSearch->ReadOnly || $patient_add->AppointmentSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_AppointmentSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_add->AppointmentSearch->Lookup->getParamTag($patient_add, "p_x_AppointmentSearch") ?>
<input type="hidden" data-table="patient" data-field="x_AppointmentSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_add->AppointmentSearch->displayValueSeparatorAttribute() ?>" name="x_AppointmentSearch" id="x_AppointmentSearch" value="<?php echo $patient_add->AppointmentSearch->CurrentValue ?>"<?php echo $patient_add->AppointmentSearch->editAttributes() ?>>
</span></script>
<?php echo $patient_add->AppointmentSearch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_add->FacebookID->Visible) { // FacebookID ?>
	<div id="r_FacebookID" class="form-group row">
		<label id="elh_patient_FacebookID" for="x_FacebookID" class="<?php echo $patient_add->LeftColumnClass ?>"><script id="tpc_patient_FacebookID" type="text/html"><?php echo $patient_add->FacebookID->caption() ?><?php echo $patient_add->FacebookID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_add->RightColumnClass ?>"><div <?php echo $patient_add->FacebookID->cellAttributes() ?>>
<script id="tpx_patient_FacebookID" type="text/html"><span id="el_patient_FacebookID">
<input type="text" data-table="patient" data-field="x_FacebookID" name="x_FacebookID" id="x_FacebookID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_add->FacebookID->getPlaceHolder()) ?>" value="<?php echo $patient_add->FacebookID->EditValue ?>"<?php echo $patient_add->FacebookID->editAttributes() ?>>
</span></script>
<?php echo $patient_add->FacebookID->CustomMsg ?></div></div>
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
	if (in_array("patient_address", explode(",", $patient->getCurrentDetailTable())) && $patient_address->DetailAdd) {
?>
<?php if ($patient->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_address", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_addressgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_email", explode(",", $patient->getCurrentDetailTable())) && $patient_email->DetailAdd) {
?>
<?php if ($patient->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_email", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_emailgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_telephone", explode(",", $patient->getCurrentDetailTable())) && $patient_telephone->DetailAdd) {
?>
<?php if ($patient->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_telephone", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_telephonegrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_emergency_contact", explode(",", $patient->getCurrentDetailTable())) && $patient_emergency_contact->DetailAdd) {
?>
<?php if ($patient->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_emergency_contact", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_emergency_contactgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_document", explode(",", $patient->getCurrentDetailTable())) && $patient_document->DetailAdd) {
?>
<?php if ($patient->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_document", "TblCaption") ?></h4>
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
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient->Rows) ?> };
	ew.applyTemplate("tpd_patientadd", "tpm_patientadd", "patientadd", "<?php echo $patient->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patientadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_add->showPageFooter();
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
$patient_add->terminate();
?>