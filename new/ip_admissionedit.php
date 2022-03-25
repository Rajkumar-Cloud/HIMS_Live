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
$ip_admission_edit = new ip_admission_edit();

// Run the page
$ip_admission_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ip_admission_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fip_admissionedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fip_admissionedit = currentForm = new ew.Form("fip_admissionedit", "edit");

	// Validate form
	fip_admissionedit.validate = function() {
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
			<?php if ($ip_admission_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->id->caption(), $ip_admission_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->mrnNo->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->mrnNo->caption(), $ip_admission_edit->mrnNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->PatientID->caption(), $ip_admission_edit->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->patient_name->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->patient_name->caption(), $ip_admission_edit->patient_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->mobileno->Required) { ?>
				elm = this.getElements("x" + infix + "_mobileno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->mobileno->caption(), $ip_admission_edit->mobileno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->gender->Required) { ?>
				elm = this.getElements("x" + infix + "_gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->gender->caption(), $ip_admission_edit->gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->age->Required) { ?>
				elm = this.getElements("x" + infix + "_age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->age->caption(), $ip_admission_edit->age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->typeRegsisteration->Required) { ?>
				elm = this.getElements("x" + infix + "_typeRegsisteration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->typeRegsisteration->caption(), $ip_admission_edit->typeRegsisteration->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->PaymentCategory->Required) { ?>
				elm = this.getElements("x" + infix + "_PaymentCategory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->PaymentCategory->caption(), $ip_admission_edit->PaymentCategory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->physician_id->Required) { ?>
				elm = this.getElements("x" + infix + "_physician_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->physician_id->caption(), $ip_admission_edit->physician_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->admission_consultant_id->Required) { ?>
				elm = this.getElements("x" + infix + "_admission_consultant_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->admission_consultant_id->caption(), $ip_admission_edit->admission_consultant_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->leading_consultant_id->Required) { ?>
				elm = this.getElements("x" + infix + "_leading_consultant_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->leading_consultant_id->caption(), $ip_admission_edit->leading_consultant_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->cause->Required) { ?>
				elm = this.getElements("x" + infix + "_cause");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->cause->caption(), $ip_admission_edit->cause->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->admission_date->Required) { ?>
				elm = this.getElements("x" + infix + "_admission_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->admission_date->caption(), $ip_admission_edit->admission_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_admission_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ip_admission_edit->admission_date->errorMessage()) ?>");
			<?php if ($ip_admission_edit->release_date->Required) { ?>
				elm = this.getElements("x" + infix + "_release_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->release_date->caption(), $ip_admission_edit->release_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_release_date");
				if (elm && !ew.checkShortEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ip_admission_edit->release_date->errorMessage()) ?>");
			<?php if ($ip_admission_edit->PaymentStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_PaymentStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->PaymentStatus->caption(), $ip_admission_edit->PaymentStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->status->caption(), $ip_admission_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->modifiedby->caption(), $ip_admission_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->modifieddatetime->caption(), $ip_admission_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->profilePic->caption(), $ip_admission_edit->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->HospID->caption(), $ip_admission_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->DOB->Required) { ?>
				elm = this.getElements("x" + infix + "_DOB");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->DOB->caption(), $ip_admission_edit->DOB->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->ReferedByDr->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferedByDr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->ReferedByDr->caption(), $ip_admission_edit->ReferedByDr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->ReferClinicname->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferClinicname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->ReferClinicname->caption(), $ip_admission_edit->ReferClinicname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->ReferCity->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferCity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->ReferCity->caption(), $ip_admission_edit->ReferCity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->ReferMobileNo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferMobileNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->ReferMobileNo->caption(), $ip_admission_edit->ReferMobileNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->ReferA4TreatingConsultant->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferA4TreatingConsultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->ReferA4TreatingConsultant->caption(), $ip_admission_edit->ReferA4TreatingConsultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->PurposreReferredfor->Required) { ?>
				elm = this.getElements("x" + infix + "_PurposreReferredfor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->PurposreReferredfor->caption(), $ip_admission_edit->PurposreReferredfor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->BillClosing->Required) { ?>
				elm = this.getElements("x" + infix + "_BillClosing");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->BillClosing->caption(), $ip_admission_edit->BillClosing->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->BillClosingDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillClosingDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->BillClosingDate->caption(), $ip_admission_edit->BillClosingDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillClosingDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ip_admission_edit->BillClosingDate->errorMessage()) ?>");
			<?php if ($ip_admission_edit->BillNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_BillNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->BillNumber->caption(), $ip_admission_edit->BillNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->ClosingAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_ClosingAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->ClosingAmount->caption(), $ip_admission_edit->ClosingAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->ClosingType->Required) { ?>
				elm = this.getElements("x" + infix + "_ClosingType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->ClosingType->caption(), $ip_admission_edit->ClosingType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->BillAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_BillAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->BillAmount->caption(), $ip_admission_edit->BillAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->billclosedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_billclosedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->billclosedBy->caption(), $ip_admission_edit->billclosedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->bllcloseByDate->Required) { ?>
				elm = this.getElements("x" + infix + "_bllcloseByDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->bllcloseByDate->caption(), $ip_admission_edit->bllcloseByDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_bllcloseByDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ip_admission_edit->bllcloseByDate->errorMessage()) ?>");
			<?php if ($ip_admission_edit->ReportHeader->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportHeader");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->ReportHeader->caption(), $ip_admission_edit->ReportHeader->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->Procedure->Required) { ?>
				elm = this.getElements("x" + infix + "_Procedure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->Procedure->caption(), $ip_admission_edit->Procedure->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->Consultant->Required) { ?>
				elm = this.getElements("x" + infix + "_Consultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->Consultant->caption(), $ip_admission_edit->Consultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->Anesthetist->Required) { ?>
				elm = this.getElements("x" + infix + "_Anesthetist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->Anesthetist->caption(), $ip_admission_edit->Anesthetist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->Amound->Required) { ?>
				elm = this.getElements("x" + infix + "_Amound");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->Amound->caption(), $ip_admission_edit->Amound->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amound");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ip_admission_edit->Amound->errorMessage()) ?>");
			<?php if ($ip_admission_edit->Package->Required) { ?>
				elm = this.getElements("x" + infix + "_Package");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->Package->caption(), $ip_admission_edit->Package->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->patient_id->caption(), $ip_admission_edit->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->PartnerID->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->PartnerID->caption(), $ip_admission_edit->PartnerID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->PartnerName->caption(), $ip_admission_edit->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->PartnerMobile->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerMobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->PartnerMobile->caption(), $ip_admission_edit->PartnerMobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->Cid->Required) { ?>
				elm = this.getElements("x" + infix + "_Cid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->Cid->caption(), $ip_admission_edit->Cid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Cid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ip_admission_edit->Cid->errorMessage()) ?>");
			<?php if ($ip_admission_edit->PartId->Required) { ?>
				elm = this.getElements("x" + infix + "_PartId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->PartId->caption(), $ip_admission_edit->PartId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PartId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ip_admission_edit->PartId->errorMessage()) ?>");
			<?php if ($ip_admission_edit->IDProof->Required) { ?>
				elm = this.getElements("x" + infix + "_IDProof");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->IDProof->caption(), $ip_admission_edit->IDProof->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->AdviceToOtherHospital->Required) { ?>
				elm = this.getElements("x" + infix + "_AdviceToOtherHospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->AdviceToOtherHospital->caption(), $ip_admission_edit->AdviceToOtherHospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ip_admission_edit->Reason->Required) { ?>
				elm = this.getElements("x" + infix + "_Reason");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ip_admission_edit->Reason->caption(), $ip_admission_edit->Reason->RequiredErrorMessage)) ?>");
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
	fip_admissionedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fip_admissionedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fip_admissionedit.lists["x_gender"] = <?php echo $ip_admission_edit->gender->Lookup->toClientList($ip_admission_edit) ?>;
	fip_admissionedit.lists["x_gender"].options = <?php echo JsonEncode($ip_admission_edit->gender->lookupOptions()) ?>;
	fip_admissionedit.autoSuggests["x_gender"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fip_admissionedit.lists["x_typeRegsisteration"] = <?php echo $ip_admission_edit->typeRegsisteration->Lookup->toClientList($ip_admission_edit) ?>;
	fip_admissionedit.lists["x_typeRegsisteration"].options = <?php echo JsonEncode($ip_admission_edit->typeRegsisteration->lookupOptions()) ?>;
	fip_admissionedit.lists["x_PaymentCategory"] = <?php echo $ip_admission_edit->PaymentCategory->Lookup->toClientList($ip_admission_edit) ?>;
	fip_admissionedit.lists["x_PaymentCategory"].options = <?php echo JsonEncode($ip_admission_edit->PaymentCategory->lookupOptions()) ?>;
	fip_admissionedit.lists["x_physician_id"] = <?php echo $ip_admission_edit->physician_id->Lookup->toClientList($ip_admission_edit) ?>;
	fip_admissionedit.lists["x_physician_id"].options = <?php echo JsonEncode($ip_admission_edit->physician_id->lookupOptions()) ?>;
	fip_admissionedit.lists["x_admission_consultant_id"] = <?php echo $ip_admission_edit->admission_consultant_id->Lookup->toClientList($ip_admission_edit) ?>;
	fip_admissionedit.lists["x_admission_consultant_id"].options = <?php echo JsonEncode($ip_admission_edit->admission_consultant_id->lookupOptions()) ?>;
	fip_admissionedit.lists["x_leading_consultant_id"] = <?php echo $ip_admission_edit->leading_consultant_id->Lookup->toClientList($ip_admission_edit) ?>;
	fip_admissionedit.lists["x_leading_consultant_id"].options = <?php echo JsonEncode($ip_admission_edit->leading_consultant_id->lookupOptions()) ?>;
	fip_admissionedit.lists["x_PaymentStatus"] = <?php echo $ip_admission_edit->PaymentStatus->Lookup->toClientList($ip_admission_edit) ?>;
	fip_admissionedit.lists["x_PaymentStatus"].options = <?php echo JsonEncode($ip_admission_edit->PaymentStatus->lookupOptions()) ?>;
	fip_admissionedit.lists["x_status"] = <?php echo $ip_admission_edit->status->Lookup->toClientList($ip_admission_edit) ?>;
	fip_admissionedit.lists["x_status"].options = <?php echo JsonEncode($ip_admission_edit->status->lookupOptions()) ?>;
	fip_admissionedit.lists["x_HospID"] = <?php echo $ip_admission_edit->HospID->Lookup->toClientList($ip_admission_edit) ?>;
	fip_admissionedit.lists["x_HospID"].options = <?php echo JsonEncode($ip_admission_edit->HospID->lookupOptions()) ?>;
	fip_admissionedit.lists["x_ReferedByDr"] = <?php echo $ip_admission_edit->ReferedByDr->Lookup->toClientList($ip_admission_edit) ?>;
	fip_admissionedit.lists["x_ReferedByDr"].options = <?php echo JsonEncode($ip_admission_edit->ReferedByDr->lookupOptions()) ?>;
	fip_admissionedit.lists["x_ReferA4TreatingConsultant"] = <?php echo $ip_admission_edit->ReferA4TreatingConsultant->Lookup->toClientList($ip_admission_edit) ?>;
	fip_admissionedit.lists["x_ReferA4TreatingConsultant"].options = <?php echo JsonEncode($ip_admission_edit->ReferA4TreatingConsultant->lookupOptions()) ?>;
	fip_admissionedit.lists["x_patient_id"] = <?php echo $ip_admission_edit->patient_id->Lookup->toClientList($ip_admission_edit) ?>;
	fip_admissionedit.lists["x_patient_id"].options = <?php echo JsonEncode($ip_admission_edit->patient_id->lookupOptions()) ?>;
	loadjs.done("fip_admissionedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ip_admission_edit->showPageHeader(); ?>
<?php
$ip_admission_edit->showMessage();
?>
<form name="fip_admissionedit" id="fip_admissionedit" class="<?php echo $ip_admission_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ip_admission">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ip_admission_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($ip_admission_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ip_admission_id" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_id" type="text/html"><?php echo $ip_admission_edit->id->caption() ?><?php echo $ip_admission_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->id->cellAttributes() ?>>
<script id="tpx_ip_admission_id" type="text/html"><span id="el_ip_admission_id">
<span<?php echo $ip_admission_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ip_admission_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="ip_admission" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ip_admission_edit->id->CurrentValue) ?>">
<?php echo $ip_admission_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->mrnNo->Visible) { // mrnNo ?>
	<div id="r_mrnNo" class="form-group row">
		<label id="elh_ip_admission_mrnNo" for="x_mrnNo" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_mrnNo" type="text/html"><?php echo $ip_admission_edit->mrnNo->caption() ?><?php echo $ip_admission_edit->mrnNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->mrnNo->cellAttributes() ?>>
<script id="tpx_ip_admission_mrnNo" type="text/html"><span id="el_ip_admission_mrnNo">
<input type="text" data-table="ip_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->mrnNo->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->mrnNo->EditValue ?>"<?php echo $ip_admission_edit->mrnNo->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->mrnNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_ip_admission_PatientID" for="x_PatientID" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_PatientID" type="text/html"><?php echo $ip_admission_edit->PatientID->caption() ?><?php echo $ip_admission_edit->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->PatientID->cellAttributes() ?>>
<script id="tpx_ip_admission_PatientID" type="text/html"><span id="el_ip_admission_PatientID">
<input type="text" data-table="ip_admission" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->PatientID->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->PatientID->EditValue ?>"<?php echo $ip_admission_edit->PatientID->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->patient_name->Visible) { // patient_name ?>
	<div id="r_patient_name" class="form-group row">
		<label id="elh_ip_admission_patient_name" for="x_patient_name" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_patient_name" type="text/html"><?php echo $ip_admission_edit->patient_name->caption() ?><?php echo $ip_admission_edit->patient_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->patient_name->cellAttributes() ?>>
<script id="tpx_ip_admission_patient_name" type="text/html"><span id="el_ip_admission_patient_name">
<input type="text" data-table="ip_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->patient_name->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->patient_name->EditValue ?>"<?php echo $ip_admission_edit->patient_name->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->patient_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->mobileno->Visible) { // mobileno ?>
	<div id="r_mobileno" class="form-group row">
		<label id="elh_ip_admission_mobileno" for="x_mobileno" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_mobileno" type="text/html"><?php echo $ip_admission_edit->mobileno->caption() ?><?php echo $ip_admission_edit->mobileno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->mobileno->cellAttributes() ?>>
<script id="tpx_ip_admission_mobileno" type="text/html"><span id="el_ip_admission_mobileno">
<input type="text" data-table="ip_admission" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->mobileno->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->mobileno->EditValue ?>"<?php echo $ip_admission_edit->mobileno->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->mobileno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_ip_admission_gender" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_gender" type="text/html"><?php echo $ip_admission_edit->gender->caption() ?><?php echo $ip_admission_edit->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->gender->cellAttributes() ?>>
<script id="tpx_ip_admission_gender" type="text/html"><span id="el_ip_admission_gender">
<?php
$onchange = $ip_admission_edit->gender->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$ip_admission_edit->gender->EditAttrs["onchange"] = "";
?>
<span id="as_x_gender">
	<input type="text" class="form-control" name="sv_x_gender" id="sv_x_gender" value="<?php echo RemoveHtml($ip_admission_edit->gender->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->gender->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ip_admission_edit->gender->getPlaceHolder()) ?>"<?php echo $ip_admission_edit->gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="ip_admission" data-field="x_gender" data-value-separator="<?php echo $ip_admission_edit->gender->displayValueSeparatorAttribute() ?>" name="x_gender" id="x_gender" value="<?php echo HtmlEncode($ip_admission_edit->gender->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $ip_admission_edit->gender->Lookup->getParamTag($ip_admission_edit, "p_x_gender") ?>
</span></script>
<script type="text/html" class="ip_admissionedit_js">
loadjs.ready(["fip_admissionedit"], function() {
	fip_admissionedit.createAutoSuggest({"id":"x_gender","forceSelect":false});
});
</script>
<?php echo $ip_admission_edit->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->age->Visible) { // age ?>
	<div id="r_age" class="form-group row">
		<label id="elh_ip_admission_age" for="x_age" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_age" type="text/html"><?php echo $ip_admission_edit->age->caption() ?><?php echo $ip_admission_edit->age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->age->cellAttributes() ?>>
<script id="tpx_ip_admission_age" type="text/html"><span id="el_ip_admission_age">
<input type="text" data-table="ip_admission" data-field="x_age" name="x_age" id="x_age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->age->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->age->EditValue ?>"<?php echo $ip_admission_edit->age->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<div id="r_typeRegsisteration" class="form-group row">
		<label id="elh_ip_admission_typeRegsisteration" for="x_typeRegsisteration" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_typeRegsisteration" type="text/html"><?php echo $ip_admission_edit->typeRegsisteration->caption() ?><?php echo $ip_admission_edit->typeRegsisteration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->typeRegsisteration->cellAttributes() ?>>
<script id="tpx_ip_admission_typeRegsisteration" type="text/html"><span id="el_ip_admission_typeRegsisteration">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_typeRegsisteration" data-value-separator="<?php echo $ip_admission_edit->typeRegsisteration->displayValueSeparatorAttribute() ?>" id="x_typeRegsisteration" name="x_typeRegsisteration"<?php echo $ip_admission_edit->typeRegsisteration->editAttributes() ?>>
			<?php echo $ip_admission_edit->typeRegsisteration->selectOptionListHtml("x_typeRegsisteration") ?>
		</select>
</div>
<?php echo $ip_admission_edit->typeRegsisteration->Lookup->getParamTag($ip_admission_edit, "p_x_typeRegsisteration") ?>
</span></script>
<?php echo $ip_admission_edit->typeRegsisteration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->PaymentCategory->Visible) { // PaymentCategory ?>
	<div id="r_PaymentCategory" class="form-group row">
		<label id="elh_ip_admission_PaymentCategory" for="x_PaymentCategory" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_PaymentCategory" type="text/html"><?php echo $ip_admission_edit->PaymentCategory->caption() ?><?php echo $ip_admission_edit->PaymentCategory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->PaymentCategory->cellAttributes() ?>>
<script id="tpx_ip_admission_PaymentCategory" type="text/html"><span id="el_ip_admission_PaymentCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_PaymentCategory" data-value-separator="<?php echo $ip_admission_edit->PaymentCategory->displayValueSeparatorAttribute() ?>" id="x_PaymentCategory" name="x_PaymentCategory"<?php echo $ip_admission_edit->PaymentCategory->editAttributes() ?>>
			<?php echo $ip_admission_edit->PaymentCategory->selectOptionListHtml("x_PaymentCategory") ?>
		</select>
</div>
<?php echo $ip_admission_edit->PaymentCategory->Lookup->getParamTag($ip_admission_edit, "p_x_PaymentCategory") ?>
</span></script>
<?php echo $ip_admission_edit->PaymentCategory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->physician_id->Visible) { // physician_id ?>
	<div id="r_physician_id" class="form-group row">
		<label id="elh_ip_admission_physician_id" for="x_physician_id" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_physician_id" type="text/html"><?php echo $ip_admission_edit->physician_id->caption() ?><?php echo $ip_admission_edit->physician_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->physician_id->cellAttributes() ?>>
<script id="tpx_ip_admission_physician_id" type="text/html"><span id="el_ip_admission_physician_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_physician_id" data-value-separator="<?php echo $ip_admission_edit->physician_id->displayValueSeparatorAttribute() ?>" id="x_physician_id" name="x_physician_id"<?php echo $ip_admission_edit->physician_id->editAttributes() ?>>
			<?php echo $ip_admission_edit->physician_id->selectOptionListHtml("x_physician_id") ?>
		</select>
</div>
<?php echo $ip_admission_edit->physician_id->Lookup->getParamTag($ip_admission_edit, "p_x_physician_id") ?>
</span></script>
<?php echo $ip_admission_edit->physician_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<div id="r_admission_consultant_id" class="form-group row">
		<label id="elh_ip_admission_admission_consultant_id" for="x_admission_consultant_id" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_admission_consultant_id" type="text/html"><?php echo $ip_admission_edit->admission_consultant_id->caption() ?><?php echo $ip_admission_edit->admission_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->admission_consultant_id->cellAttributes() ?>>
<script id="tpx_ip_admission_admission_consultant_id" type="text/html"><span id="el_ip_admission_admission_consultant_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_admission_consultant_id" data-value-separator="<?php echo $ip_admission_edit->admission_consultant_id->displayValueSeparatorAttribute() ?>" id="x_admission_consultant_id" name="x_admission_consultant_id"<?php echo $ip_admission_edit->admission_consultant_id->editAttributes() ?>>
			<?php echo $ip_admission_edit->admission_consultant_id->selectOptionListHtml("x_admission_consultant_id") ?>
		</select>
</div>
<?php echo $ip_admission_edit->admission_consultant_id->Lookup->getParamTag($ip_admission_edit, "p_x_admission_consultant_id") ?>
</span></script>
<?php echo $ip_admission_edit->admission_consultant_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<div id="r_leading_consultant_id" class="form-group row">
		<label id="elh_ip_admission_leading_consultant_id" for="x_leading_consultant_id" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_leading_consultant_id" type="text/html"><?php echo $ip_admission_edit->leading_consultant_id->caption() ?><?php echo $ip_admission_edit->leading_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->leading_consultant_id->cellAttributes() ?>>
<script id="tpx_ip_admission_leading_consultant_id" type="text/html"><span id="el_ip_admission_leading_consultant_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_leading_consultant_id" data-value-separator="<?php echo $ip_admission_edit->leading_consultant_id->displayValueSeparatorAttribute() ?>" id="x_leading_consultant_id" name="x_leading_consultant_id"<?php echo $ip_admission_edit->leading_consultant_id->editAttributes() ?>>
			<?php echo $ip_admission_edit->leading_consultant_id->selectOptionListHtml("x_leading_consultant_id") ?>
		</select>
</div>
<?php echo $ip_admission_edit->leading_consultant_id->Lookup->getParamTag($ip_admission_edit, "p_x_leading_consultant_id") ?>
</span></script>
<?php echo $ip_admission_edit->leading_consultant_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->cause->Visible) { // cause ?>
	<div id="r_cause" class="form-group row">
		<label id="elh_ip_admission_cause" for="x_cause" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_cause" type="text/html"><?php echo $ip_admission_edit->cause->caption() ?><?php echo $ip_admission_edit->cause->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->cause->cellAttributes() ?>>
<script id="tpx_ip_admission_cause" type="text/html"><span id="el_ip_admission_cause">
<textarea data-table="ip_admission" data-field="x_cause" name="x_cause" id="x_cause" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ip_admission_edit->cause->getPlaceHolder()) ?>"<?php echo $ip_admission_edit->cause->editAttributes() ?>><?php echo $ip_admission_edit->cause->EditValue ?></textarea>
</span></script>
<?php echo $ip_admission_edit->cause->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->admission_date->Visible) { // admission_date ?>
	<div id="r_admission_date" class="form-group row">
		<label id="elh_ip_admission_admission_date" for="x_admission_date" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_admission_date" type="text/html"><?php echo $ip_admission_edit->admission_date->caption() ?><?php echo $ip_admission_edit->admission_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->admission_date->cellAttributes() ?>>
<script id="tpx_ip_admission_admission_date" type="text/html"><span id="el_ip_admission_admission_date">
<input type="text" data-table="ip_admission" data-field="x_admission_date" data-format="11" name="x_admission_date" id="x_admission_date" placeholder="<?php echo HtmlEncode($ip_admission_edit->admission_date->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->admission_date->EditValue ?>"<?php echo $ip_admission_edit->admission_date->editAttributes() ?>>
<?php if (!$ip_admission_edit->admission_date->ReadOnly && !$ip_admission_edit->admission_date->Disabled && !isset($ip_admission_edit->admission_date->EditAttrs["readonly"]) && !isset($ip_admission_edit->admission_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ip_admissionedit_js">
loadjs.ready(["fip_admissionedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fip_admissionedit", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $ip_admission_edit->admission_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->release_date->Visible) { // release_date ?>
	<div id="r_release_date" class="form-group row">
		<label id="elh_ip_admission_release_date" for="x_release_date" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_release_date" type="text/html"><?php echo $ip_admission_edit->release_date->caption() ?><?php echo $ip_admission_edit->release_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->release_date->cellAttributes() ?>>
<script id="tpx_ip_admission_release_date" type="text/html"><span id="el_ip_admission_release_date">
<input type="text" data-table="ip_admission" data-field="x_release_date" data-format="17" name="x_release_date" id="x_release_date" placeholder="<?php echo HtmlEncode($ip_admission_edit->release_date->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->release_date->EditValue ?>"<?php echo $ip_admission_edit->release_date->editAttributes() ?>>
<?php if (!$ip_admission_edit->release_date->ReadOnly && !$ip_admission_edit->release_date->Disabled && !isset($ip_admission_edit->release_date->EditAttrs["readonly"]) && !isset($ip_admission_edit->release_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ip_admissionedit_js">
loadjs.ready(["fip_admissionedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fip_admissionedit", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":17});
});
</script>
<?php echo $ip_admission_edit->release_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->PaymentStatus->Visible) { // PaymentStatus ?>
	<div id="r_PaymentStatus" class="form-group row">
		<label id="elh_ip_admission_PaymentStatus" for="x_PaymentStatus" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_PaymentStatus" type="text/html"><?php echo $ip_admission_edit->PaymentStatus->caption() ?><?php echo $ip_admission_edit->PaymentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->PaymentStatus->cellAttributes() ?>>
<script id="tpx_ip_admission_PaymentStatus" type="text/html"><span id="el_ip_admission_PaymentStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_PaymentStatus" data-value-separator="<?php echo $ip_admission_edit->PaymentStatus->displayValueSeparatorAttribute() ?>" id="x_PaymentStatus" name="x_PaymentStatus"<?php echo $ip_admission_edit->PaymentStatus->editAttributes() ?>>
			<?php echo $ip_admission_edit->PaymentStatus->selectOptionListHtml("x_PaymentStatus") ?>
		</select>
</div>
<?php echo $ip_admission_edit->PaymentStatus->Lookup->getParamTag($ip_admission_edit, "p_x_PaymentStatus") ?>
</span></script>
<?php echo $ip_admission_edit->PaymentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_ip_admission_profilePic" for="x_profilePic" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_profilePic" type="text/html"><?php echo $ip_admission_edit->profilePic->caption() ?><?php echo $ip_admission_edit->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->profilePic->cellAttributes() ?>>
<script id="tpx_ip_admission_profilePic" type="text/html"><span id="el_ip_admission_profilePic">
<textarea data-table="ip_admission" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ip_admission_edit->profilePic->getPlaceHolder()) ?>"<?php echo $ip_admission_edit->profilePic->editAttributes() ?>><?php echo $ip_admission_edit->profilePic->EditValue ?></textarea>
</span></script>
<?php echo $ip_admission_edit->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->DOB->Visible) { // DOB ?>
	<div id="r_DOB" class="form-group row">
		<label id="elh_ip_admission_DOB" for="x_DOB" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_DOB" type="text/html"><?php echo $ip_admission_edit->DOB->caption() ?><?php echo $ip_admission_edit->DOB->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->DOB->cellAttributes() ?>>
<script id="tpx_ip_admission_DOB" type="text/html"><span id="el_ip_admission_DOB">
<input type="text" data-table="ip_admission" data-field="x_DOB" name="x_DOB" id="x_DOB" placeholder="<?php echo HtmlEncode($ip_admission_edit->DOB->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->DOB->EditValue ?>"<?php echo $ip_admission_edit->DOB->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->DOB->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->ReferedByDr->Visible) { // ReferedByDr ?>
	<div id="r_ReferedByDr" class="form-group row">
		<label id="elh_ip_admission_ReferedByDr" for="x_ReferedByDr" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_ReferedByDr" type="text/html"><?php echo $ip_admission_edit->ReferedByDr->caption() ?><?php echo $ip_admission_edit->ReferedByDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->ReferedByDr->cellAttributes() ?>>
<script id="tpx_ip_admission_ReferedByDr" type="text/html"><span id="el_ip_admission_ReferedByDr">
<?php $ip_admission_edit->ReferedByDr->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferedByDr"><?php echo EmptyValue(strval($ip_admission_edit->ReferedByDr->ViewValue)) ? $Language->phrase("PleaseSelect") : $ip_admission_edit->ReferedByDr->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ip_admission_edit->ReferedByDr->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ip_admission_edit->ReferedByDr->ReadOnly || $ip_admission_edit->ReferedByDr->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferedByDr',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$ip_admission_edit->ReferedByDr->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferedByDr" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ip_admission_edit->ReferedByDr->caption() ?>" data-title="<?php echo $ip_admission_edit->ReferedByDr->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferedByDr',url:'mas_reference_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $ip_admission_edit->ReferedByDr->Lookup->getParamTag($ip_admission_edit, "p_x_ReferedByDr") ?>
<input type="hidden" data-table="ip_admission" data-field="x_ReferedByDr" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ip_admission_edit->ReferedByDr->displayValueSeparatorAttribute() ?>" name="x_ReferedByDr" id="x_ReferedByDr" value="<?php echo $ip_admission_edit->ReferedByDr->CurrentValue ?>"<?php echo $ip_admission_edit->ReferedByDr->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->ReferedByDr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label id="elh_ip_admission_ReferClinicname" for="x_ReferClinicname" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_ReferClinicname" type="text/html"><?php echo $ip_admission_edit->ReferClinicname->caption() ?><?php echo $ip_admission_edit->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->ReferClinicname->cellAttributes() ?>>
<script id="tpx_ip_admission_ReferClinicname" type="text/html"><span id="el_ip_admission_ReferClinicname">
<input type="text" data-table="ip_admission" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->ReferClinicname->EditValue ?>"<?php echo $ip_admission_edit->ReferClinicname->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->ReferClinicname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label id="elh_ip_admission_ReferCity" for="x_ReferCity" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_ReferCity" type="text/html"><?php echo $ip_admission_edit->ReferCity->caption() ?><?php echo $ip_admission_edit->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->ReferCity->cellAttributes() ?>>
<script id="tpx_ip_admission_ReferCity" type="text/html"><span id="el_ip_admission_ReferCity">
<input type="text" data-table="ip_admission" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->ReferCity->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->ReferCity->EditValue ?>"<?php echo $ip_admission_edit->ReferCity->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->ReferCity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label id="elh_ip_admission_ReferMobileNo" for="x_ReferMobileNo" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_ReferMobileNo" type="text/html"><?php echo $ip_admission_edit->ReferMobileNo->caption() ?><?php echo $ip_admission_edit->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_ip_admission_ReferMobileNo" type="text/html"><span id="el_ip_admission_ReferMobileNo">
<input type="text" data-table="ip_admission" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->ReferMobileNo->EditValue ?>"<?php echo $ip_admission_edit->ReferMobileNo->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->ReferMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div id="r_ReferA4TreatingConsultant" class="form-group row">
		<label id="elh_ip_admission_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_ReferA4TreatingConsultant" type="text/html"><?php echo $ip_admission_edit->ReferA4TreatingConsultant->caption() ?><?php echo $ip_admission_edit->ReferA4TreatingConsultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_ip_admission_ReferA4TreatingConsultant" type="text/html"><span id="el_ip_admission_ReferA4TreatingConsultant">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferA4TreatingConsultant"><?php echo EmptyValue(strval($ip_admission_edit->ReferA4TreatingConsultant->ViewValue)) ? $Language->phrase("PleaseSelect") : $ip_admission_edit->ReferA4TreatingConsultant->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ip_admission_edit->ReferA4TreatingConsultant->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ip_admission_edit->ReferA4TreatingConsultant->ReadOnly || $ip_admission_edit->ReferA4TreatingConsultant->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferA4TreatingConsultant',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$ip_admission_edit->ReferA4TreatingConsultant->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferA4TreatingConsultant" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ip_admission_edit->ReferA4TreatingConsultant->caption() ?>" data-title="<?php echo $ip_admission_edit->ReferA4TreatingConsultant->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferA4TreatingConsultant',url:'doctorsaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $ip_admission_edit->ReferA4TreatingConsultant->Lookup->getParamTag($ip_admission_edit, "p_x_ReferA4TreatingConsultant") ?>
<input type="hidden" data-table="ip_admission" data-field="x_ReferA4TreatingConsultant" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ip_admission_edit->ReferA4TreatingConsultant->displayValueSeparatorAttribute() ?>" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" value="<?php echo $ip_admission_edit->ReferA4TreatingConsultant->CurrentValue ?>"<?php echo $ip_admission_edit->ReferA4TreatingConsultant->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->ReferA4TreatingConsultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div id="r_PurposreReferredfor" class="form-group row">
		<label id="elh_ip_admission_PurposreReferredfor" for="x_PurposreReferredfor" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_PurposreReferredfor" type="text/html"><?php echo $ip_admission_edit->PurposreReferredfor->caption() ?><?php echo $ip_admission_edit->PurposreReferredfor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_ip_admission_PurposreReferredfor" type="text/html"><span id="el_ip_admission_PurposreReferredfor">
<input type="text" data-table="ip_admission" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->PurposreReferredfor->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->PurposreReferredfor->EditValue ?>"<?php echo $ip_admission_edit->PurposreReferredfor->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->PurposreReferredfor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->BillClosing->Visible) { // BillClosing ?>
	<div id="r_BillClosing" class="form-group row">
		<label id="elh_ip_admission_BillClosing" for="x_BillClosing" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_BillClosing" type="text/html"><?php echo $ip_admission_edit->BillClosing->caption() ?><?php echo $ip_admission_edit->BillClosing->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->BillClosing->cellAttributes() ?>>
<script id="tpx_ip_admission_BillClosing" type="text/html"><span id="el_ip_admission_BillClosing">
<input type="text" data-table="ip_admission" data-field="x_BillClosing" name="x_BillClosing" id="x_BillClosing" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->BillClosing->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->BillClosing->EditValue ?>"<?php echo $ip_admission_edit->BillClosing->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->BillClosing->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->BillClosingDate->Visible) { // BillClosingDate ?>
	<div id="r_BillClosingDate" class="form-group row">
		<label id="elh_ip_admission_BillClosingDate" for="x_BillClosingDate" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_BillClosingDate" type="text/html"><?php echo $ip_admission_edit->BillClosingDate->caption() ?><?php echo $ip_admission_edit->BillClosingDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->BillClosingDate->cellAttributes() ?>>
<script id="tpx_ip_admission_BillClosingDate" type="text/html"><span id="el_ip_admission_BillClosingDate">
<input type="text" data-table="ip_admission" data-field="x_BillClosingDate" name="x_BillClosingDate" id="x_BillClosingDate" placeholder="<?php echo HtmlEncode($ip_admission_edit->BillClosingDate->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->BillClosingDate->EditValue ?>"<?php echo $ip_admission_edit->BillClosingDate->editAttributes() ?>>
<?php if (!$ip_admission_edit->BillClosingDate->ReadOnly && !$ip_admission_edit->BillClosingDate->Disabled && !isset($ip_admission_edit->BillClosingDate->EditAttrs["readonly"]) && !isset($ip_admission_edit->BillClosingDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ip_admissionedit_js">
loadjs.ready(["fip_admissionedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fip_admissionedit", "x_BillClosingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ip_admission_edit->BillClosingDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_ip_admission_BillNumber" for="x_BillNumber" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_BillNumber" type="text/html"><?php echo $ip_admission_edit->BillNumber->caption() ?><?php echo $ip_admission_edit->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->BillNumber->cellAttributes() ?>>
<script id="tpx_ip_admission_BillNumber" type="text/html"><span id="el_ip_admission_BillNumber">
<input type="text" data-table="ip_admission" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->BillNumber->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->BillNumber->EditValue ?>"<?php echo $ip_admission_edit->BillNumber->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->ClosingAmount->Visible) { // ClosingAmount ?>
	<div id="r_ClosingAmount" class="form-group row">
		<label id="elh_ip_admission_ClosingAmount" for="x_ClosingAmount" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_ClosingAmount" type="text/html"><?php echo $ip_admission_edit->ClosingAmount->caption() ?><?php echo $ip_admission_edit->ClosingAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->ClosingAmount->cellAttributes() ?>>
<script id="tpx_ip_admission_ClosingAmount" type="text/html"><span id="el_ip_admission_ClosingAmount">
<input type="text" data-table="ip_admission" data-field="x_ClosingAmount" name="x_ClosingAmount" id="x_ClosingAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->ClosingAmount->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->ClosingAmount->EditValue ?>"<?php echo $ip_admission_edit->ClosingAmount->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->ClosingAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->ClosingType->Visible) { // ClosingType ?>
	<div id="r_ClosingType" class="form-group row">
		<label id="elh_ip_admission_ClosingType" for="x_ClosingType" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_ClosingType" type="text/html"><?php echo $ip_admission_edit->ClosingType->caption() ?><?php echo $ip_admission_edit->ClosingType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->ClosingType->cellAttributes() ?>>
<script id="tpx_ip_admission_ClosingType" type="text/html"><span id="el_ip_admission_ClosingType">
<input type="text" data-table="ip_admission" data-field="x_ClosingType" name="x_ClosingType" id="x_ClosingType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->ClosingType->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->ClosingType->EditValue ?>"<?php echo $ip_admission_edit->ClosingType->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->ClosingType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->BillAmount->Visible) { // BillAmount ?>
	<div id="r_BillAmount" class="form-group row">
		<label id="elh_ip_admission_BillAmount" for="x_BillAmount" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_BillAmount" type="text/html"><?php echo $ip_admission_edit->BillAmount->caption() ?><?php echo $ip_admission_edit->BillAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->BillAmount->cellAttributes() ?>>
<script id="tpx_ip_admission_BillAmount" type="text/html"><span id="el_ip_admission_BillAmount">
<input type="text" data-table="ip_admission" data-field="x_BillAmount" name="x_BillAmount" id="x_BillAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->BillAmount->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->BillAmount->EditValue ?>"<?php echo $ip_admission_edit->BillAmount->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->BillAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->billclosedBy->Visible) { // billclosedBy ?>
	<div id="r_billclosedBy" class="form-group row">
		<label id="elh_ip_admission_billclosedBy" for="x_billclosedBy" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_billclosedBy" type="text/html"><?php echo $ip_admission_edit->billclosedBy->caption() ?><?php echo $ip_admission_edit->billclosedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->billclosedBy->cellAttributes() ?>>
<script id="tpx_ip_admission_billclosedBy" type="text/html"><span id="el_ip_admission_billclosedBy">
<input type="text" data-table="ip_admission" data-field="x_billclosedBy" name="x_billclosedBy" id="x_billclosedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->billclosedBy->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->billclosedBy->EditValue ?>"<?php echo $ip_admission_edit->billclosedBy->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->billclosedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<div id="r_bllcloseByDate" class="form-group row">
		<label id="elh_ip_admission_bllcloseByDate" for="x_bllcloseByDate" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_bllcloseByDate" type="text/html"><?php echo $ip_admission_edit->bllcloseByDate->caption() ?><?php echo $ip_admission_edit->bllcloseByDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->bllcloseByDate->cellAttributes() ?>>
<script id="tpx_ip_admission_bllcloseByDate" type="text/html"><span id="el_ip_admission_bllcloseByDate">
<input type="text" data-table="ip_admission" data-field="x_bllcloseByDate" name="x_bllcloseByDate" id="x_bllcloseByDate" placeholder="<?php echo HtmlEncode($ip_admission_edit->bllcloseByDate->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->bllcloseByDate->EditValue ?>"<?php echo $ip_admission_edit->bllcloseByDate->editAttributes() ?>>
<?php if (!$ip_admission_edit->bllcloseByDate->ReadOnly && !$ip_admission_edit->bllcloseByDate->Disabled && !isset($ip_admission_edit->bllcloseByDate->EditAttrs["readonly"]) && !isset($ip_admission_edit->bllcloseByDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ip_admissionedit_js">
loadjs.ready(["fip_admissionedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fip_admissionedit", "x_bllcloseByDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ip_admission_edit->bllcloseByDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_ip_admission_ReportHeader" for="x_ReportHeader" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_ReportHeader" type="text/html"><?php echo $ip_admission_edit->ReportHeader->caption() ?><?php echo $ip_admission_edit->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->ReportHeader->cellAttributes() ?>>
<script id="tpx_ip_admission_ReportHeader" type="text/html"><span id="el_ip_admission_ReportHeader">
<input type="text" data-table="ip_admission" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->ReportHeader->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->ReportHeader->EditValue ?>"<?php echo $ip_admission_edit->ReportHeader->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label id="elh_ip_admission_Procedure" for="x_Procedure" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_Procedure" type="text/html"><?php echo $ip_admission_edit->Procedure->caption() ?><?php echo $ip_admission_edit->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->Procedure->cellAttributes() ?>>
<script id="tpx_ip_admission_Procedure" type="text/html"><span id="el_ip_admission_Procedure">
<input type="text" data-table="ip_admission" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->Procedure->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->Procedure->EditValue ?>"<?php echo $ip_admission_edit->Procedure->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->Procedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->Consultant->Visible) { // Consultant ?>
	<div id="r_Consultant" class="form-group row">
		<label id="elh_ip_admission_Consultant" for="x_Consultant" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_Consultant" type="text/html"><?php echo $ip_admission_edit->Consultant->caption() ?><?php echo $ip_admission_edit->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->Consultant->cellAttributes() ?>>
<script id="tpx_ip_admission_Consultant" type="text/html"><span id="el_ip_admission_Consultant">
<input type="text" data-table="ip_admission" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->Consultant->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->Consultant->EditValue ?>"<?php echo $ip_admission_edit->Consultant->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->Consultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->Anesthetist->Visible) { // Anesthetist ?>
	<div id="r_Anesthetist" class="form-group row">
		<label id="elh_ip_admission_Anesthetist" for="x_Anesthetist" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_Anesthetist" type="text/html"><?php echo $ip_admission_edit->Anesthetist->caption() ?><?php echo $ip_admission_edit->Anesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->Anesthetist->cellAttributes() ?>>
<script id="tpx_ip_admission_Anesthetist" type="text/html"><span id="el_ip_admission_Anesthetist">
<input type="text" data-table="ip_admission" data-field="x_Anesthetist" name="x_Anesthetist" id="x_Anesthetist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->Anesthetist->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->Anesthetist->EditValue ?>"<?php echo $ip_admission_edit->Anesthetist->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->Anesthetist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->Amound->Visible) { // Amound ?>
	<div id="r_Amound" class="form-group row">
		<label id="elh_ip_admission_Amound" for="x_Amound" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_Amound" type="text/html"><?php echo $ip_admission_edit->Amound->caption() ?><?php echo $ip_admission_edit->Amound->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->Amound->cellAttributes() ?>>
<script id="tpx_ip_admission_Amound" type="text/html"><span id="el_ip_admission_Amound">
<input type="text" data-table="ip_admission" data-field="x_Amound" name="x_Amound" id="x_Amound" size="30" placeholder="<?php echo HtmlEncode($ip_admission_edit->Amound->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->Amound->EditValue ?>"<?php echo $ip_admission_edit->Amound->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->Amound->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->Package->Visible) { // Package ?>
	<div id="r_Package" class="form-group row">
		<label id="elh_ip_admission_Package" for="x_Package" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_Package" type="text/html"><?php echo $ip_admission_edit->Package->caption() ?><?php echo $ip_admission_edit->Package->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->Package->cellAttributes() ?>>
<script id="tpx_ip_admission_Package" type="text/html"><span id="el_ip_admission_Package">
<input type="text" data-table="ip_admission" data-field="x_Package" name="x_Package" id="x_Package" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->Package->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->Package->EditValue ?>"<?php echo $ip_admission_edit->Package->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->Package->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_ip_admission_patient_id" for="x_patient_id" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_patient_id" type="text/html"><?php echo $ip_admission_edit->patient_id->caption() ?><?php echo $ip_admission_edit->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->patient_id->cellAttributes() ?>>
<script id="tpx_ip_admission_patient_id" type="text/html"><span id="el_ip_admission_patient_id">
<?php $ip_admission_edit->patient_id->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient_id"><?php echo EmptyValue(strval($ip_admission_edit->patient_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $ip_admission_edit->patient_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ip_admission_edit->patient_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ip_admission_edit->patient_id->ReadOnly || $ip_admission_edit->patient_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "patient") && !$ip_admission_edit->patient_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_patient_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ip_admission_edit->patient_id->caption() ?>" data-title="<?php echo $ip_admission_edit->patient_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_patient_id',url:'patientaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $ip_admission_edit->patient_id->Lookup->getParamTag($ip_admission_edit, "p_x_patient_id") ?>
<input type="hidden" data-table="ip_admission" data-field="x_patient_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ip_admission_edit->patient_id->displayValueSeparatorAttribute() ?>" name="x_patient_id" id="x_patient_id" value="<?php echo $ip_admission_edit->patient_id->CurrentValue ?>"<?php echo $ip_admission_edit->patient_id->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label id="elh_ip_admission_PartnerID" for="x_PartnerID" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_PartnerID" type="text/html"><?php echo $ip_admission_edit->PartnerID->caption() ?><?php echo $ip_admission_edit->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->PartnerID->cellAttributes() ?>>
<script id="tpx_ip_admission_PartnerID" type="text/html"><span id="el_ip_admission_PartnerID">
<input type="text" data-table="ip_admission" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->PartnerID->EditValue ?>"<?php echo $ip_admission_edit->PartnerID->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->PartnerID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_ip_admission_PartnerName" for="x_PartnerName" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_PartnerName" type="text/html"><?php echo $ip_admission_edit->PartnerName->caption() ?><?php echo $ip_admission_edit->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->PartnerName->cellAttributes() ?>>
<script id="tpx_ip_admission_PartnerName" type="text/html"><span id="el_ip_admission_PartnerName">
<input type="text" data-table="ip_admission" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->PartnerName->EditValue ?>"<?php echo $ip_admission_edit->PartnerName->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->PartnerMobile->Visible) { // PartnerMobile ?>
	<div id="r_PartnerMobile" class="form-group row">
		<label id="elh_ip_admission_PartnerMobile" for="x_PartnerMobile" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_PartnerMobile" type="text/html"><?php echo $ip_admission_edit->PartnerMobile->caption() ?><?php echo $ip_admission_edit->PartnerMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->PartnerMobile->cellAttributes() ?>>
<script id="tpx_ip_admission_PartnerMobile" type="text/html"><span id="el_ip_admission_PartnerMobile">
<input type="text" data-table="ip_admission" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->PartnerMobile->EditValue ?>"<?php echo $ip_admission_edit->PartnerMobile->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->PartnerMobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->Cid->Visible) { // Cid ?>
	<div id="r_Cid" class="form-group row">
		<label id="elh_ip_admission_Cid" for="x_Cid" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_Cid" type="text/html"><?php echo $ip_admission_edit->Cid->caption() ?><?php echo $ip_admission_edit->Cid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->Cid->cellAttributes() ?>>
<script id="tpx_ip_admission_Cid" type="text/html"><span id="el_ip_admission_Cid">
<input type="text" data-table="ip_admission" data-field="x_Cid" name="x_Cid" id="x_Cid" size="30" placeholder="<?php echo HtmlEncode($ip_admission_edit->Cid->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->Cid->EditValue ?>"<?php echo $ip_admission_edit->Cid->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->Cid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->PartId->Visible) { // PartId ?>
	<div id="r_PartId" class="form-group row">
		<label id="elh_ip_admission_PartId" for="x_PartId" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_PartId" type="text/html"><?php echo $ip_admission_edit->PartId->caption() ?><?php echo $ip_admission_edit->PartId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->PartId->cellAttributes() ?>>
<script id="tpx_ip_admission_PartId" type="text/html"><span id="el_ip_admission_PartId">
<input type="text" data-table="ip_admission" data-field="x_PartId" name="x_PartId" id="x_PartId" size="30" placeholder="<?php echo HtmlEncode($ip_admission_edit->PartId->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->PartId->EditValue ?>"<?php echo $ip_admission_edit->PartId->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->PartId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->IDProof->Visible) { // IDProof ?>
	<div id="r_IDProof" class="form-group row">
		<label id="elh_ip_admission_IDProof" for="x_IDProof" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_IDProof" type="text/html"><?php echo $ip_admission_edit->IDProof->caption() ?><?php echo $ip_admission_edit->IDProof->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->IDProof->cellAttributes() ?>>
<script id="tpx_ip_admission_IDProof" type="text/html"><span id="el_ip_admission_IDProof">
<input type="text" data-table="ip_admission" data-field="x_IDProof" name="x_IDProof" id="x_IDProof" size="30" maxlength="115" placeholder="<?php echo HtmlEncode($ip_admission_edit->IDProof->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->IDProof->EditValue ?>"<?php echo $ip_admission_edit->IDProof->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->IDProof->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<div id="r_AdviceToOtherHospital" class="form-group row">
		<label id="elh_ip_admission_AdviceToOtherHospital" for="x_AdviceToOtherHospital" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_AdviceToOtherHospital" type="text/html"><?php echo $ip_admission_edit->AdviceToOtherHospital->caption() ?><?php echo $ip_admission_edit->AdviceToOtherHospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->AdviceToOtherHospital->cellAttributes() ?>>
<script id="tpx_ip_admission_AdviceToOtherHospital" type="text/html"><span id="el_ip_admission_AdviceToOtherHospital">
<input type="text" data-table="ip_admission" data-field="x_AdviceToOtherHospital" name="x_AdviceToOtherHospital" id="x_AdviceToOtherHospital" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_edit->AdviceToOtherHospital->getPlaceHolder()) ?>" value="<?php echo $ip_admission_edit->AdviceToOtherHospital->EditValue ?>"<?php echo $ip_admission_edit->AdviceToOtherHospital->editAttributes() ?>>
</span></script>
<?php echo $ip_admission_edit->AdviceToOtherHospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ip_admission_edit->Reason->Visible) { // Reason ?>
	<div id="r_Reason" class="form-group row">
		<label id="elh_ip_admission_Reason" for="x_Reason" class="<?php echo $ip_admission_edit->LeftColumnClass ?>"><script id="tpc_ip_admission_Reason" type="text/html"><?php echo $ip_admission_edit->Reason->caption() ?><?php echo $ip_admission_edit->Reason->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ip_admission_edit->RightColumnClass ?>"><div <?php echo $ip_admission_edit->Reason->cellAttributes() ?>>
<script id="tpx_ip_admission_Reason" type="text/html"><span id="el_ip_admission_Reason">
<textarea data-table="ip_admission" data-field="x_Reason" name="x_Reason" id="x_Reason" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ip_admission_edit->Reason->getPlaceHolder()) ?>"<?php echo $ip_admission_edit->Reason->editAttributes() ?>><?php echo $ip_admission_edit->Reason->EditValue ?></textarea>
</span></script>
<?php echo $ip_admission_edit->Reason->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ip_admissionedit" class="ew-custom-template"></div>
<script id="tpm_ip_admissionedit" type="text/html">
<div id="ct_ip_admission_edit"><style>
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
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#229954">
				<h3 class="card-title">Select Patient </h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_patient_id"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_patient_id")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_patient_name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_patient_name")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_mobileno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_mobileno")/}}</span>
				  </div>
				    <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_PatientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_PatientID")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_admission_date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_admission_date")/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_mrnNo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_mrnNo")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_gender")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_age")/}}</span>
				  </div>
				    <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_DOB"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_DOB")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_release_date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_release_date")/}}</span>
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
				<h3 class="card-title">Patient Visit Details</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_physician_id"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_physician_id")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_typeRegsisteration"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_typeRegsisteration")/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_PaymentCategory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_PaymentCategory")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_PaymentStatus"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_PaymentStatus")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_ReferedByDr"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_ReferedByDr")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_ReferClinicname"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_ReferClinicname")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_ReferCity"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_ReferCity")/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_ReferMobileNo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_ReferMobileNo")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_ReferA4TreatingConsultant"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_ReferA4TreatingConsultant")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_PurposreReferredfor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ip_admission_PurposreReferredfor")/}}</span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</script>

<?php
	if (in_array("patient_vitals", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_vitals->DetailEdit) {
?>
<?php if ($ip_admission->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_vitals", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_vitalsgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_history", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_history->DetailEdit) {
?>
<?php if ($ip_admission->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_history", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_historygrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_provisional_diagnosis", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_provisional_diagnosis->DetailEdit) {
?>
<?php if ($ip_admission->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_provisional_diagnosis", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_provisional_diagnosisgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_prescription", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_prescription->DetailEdit) {
?>
<?php if ($ip_admission->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_prescription", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_prescriptiongrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_final_diagnosis", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_final_diagnosis->DetailEdit) {
?>
<?php if ($ip_admission->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_final_diagnosis", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_final_diagnosisgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_follow_up", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_follow_up->DetailEdit) {
?>
<?php if ($ip_admission->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_follow_up", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_follow_upgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_ot_delivery_register", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_ot_delivery_register->DetailEdit) {
?>
<?php if ($ip_admission->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_ot_delivery_register", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_ot_delivery_registergrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_ot_surgery_register", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_ot_surgery_register->DetailEdit) {
?>
<?php if ($ip_admission->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_ot_surgery_register", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_ot_surgery_registergrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_services", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_services->DetailEdit) {
?>
<?php if ($ip_admission->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_servicesgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_investigations", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_investigations->DetailEdit) {
?>
<?php if ($ip_admission->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_investigations", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_investigationsgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_insurance", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_insurance->DetailEdit) {
?>
<?php if ($ip_admission->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_insurance", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_insurancegrid.php" ?>
<?php } ?>
<?php
	if (in_array("pharmacy_pharled", explode(",", $ip_admission->getCurrentDetailTable())) && $pharmacy_pharled->DetailEdit) {
?>
<?php if ($ip_admission->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("pharmacy_pharled", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_pharledgrid.php" ?>
<?php } ?>
<?php
	if (in_array("view_ip_advance", explode(",", $ip_admission->getCurrentDetailTable())) && $view_ip_advance->DetailEdit) {
?>
<?php if ($ip_admission->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("view_ip_advance", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_ip_advancegrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_room", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_room->DetailEdit) {
?>
<?php if ($ip_admission->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_room", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_roomgrid.php" ?>
<?php } ?>
<?php if (!$ip_admission_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ip_admission_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ip_admission_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ip_admission->Rows) ?> };
	ew.applyTemplate("tpd_ip_admissionedit", "tpm_ip_admissionedit", "ip_admissionedit", "<?php echo $ip_admission->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ip_admissionedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ip_admission_edit->showPageFooter();
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
$ip_admission_edit->terminate();
?>