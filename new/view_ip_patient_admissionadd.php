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
$view_ip_patient_admission_add = new view_ip_patient_admission_add();

// Run the page
$view_ip_patient_admission_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_patient_admission_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_ip_patient_admissionadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fview_ip_patient_admissionadd = currentForm = new ew.Form("fview_ip_patient_admissionadd", "add");

	// Validate form
	fview_ip_patient_admissionadd.validate = function() {
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
			<?php if ($view_ip_patient_admission_add->mrnNo->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->mrnNo->caption(), $view_ip_patient_admission_add->mrnNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->PatientID->caption(), $view_ip_patient_admission_add->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->patient_name->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->patient_name->caption(), $view_ip_patient_admission_add->patient_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->mobileno->Required) { ?>
				elm = this.getElements("x" + infix + "_mobileno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->mobileno->caption(), $view_ip_patient_admission_add->mobileno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->profilePic->caption(), $view_ip_patient_admission_add->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->gender->Required) { ?>
				elm = this.getElements("x" + infix + "_gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->gender->caption(), $view_ip_patient_admission_add->gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->age->Required) { ?>
				elm = this.getElements("x" + infix + "_age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->age->caption(), $view_ip_patient_admission_add->age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->Package->Required) { ?>
				elm = this.getElements("x" + infix + "_Package");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->Package->caption(), $view_ip_patient_admission_add->Package->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->typeRegsisteration->Required) { ?>
				elm = this.getElements("x" + infix + "_typeRegsisteration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->typeRegsisteration->caption(), $view_ip_patient_admission_add->typeRegsisteration->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->PaymentCategory->Required) { ?>
				elm = this.getElements("x" + infix + "_PaymentCategory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->PaymentCategory->caption(), $view_ip_patient_admission_add->PaymentCategory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->admission_consultant_id->Required) { ?>
				elm = this.getElements("x" + infix + "_admission_consultant_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->admission_consultant_id->caption(), $view_ip_patient_admission_add->admission_consultant_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_admission_consultant_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_add->admission_consultant_id->errorMessage()) ?>");
			<?php if ($view_ip_patient_admission_add->leading_consultant_id->Required) { ?>
				elm = this.getElements("x" + infix + "_leading_consultant_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->leading_consultant_id->caption(), $view_ip_patient_admission_add->leading_consultant_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_leading_consultant_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_add->leading_consultant_id->errorMessage()) ?>");
			<?php if ($view_ip_patient_admission_add->cause->Required) { ?>
				elm = this.getElements("x" + infix + "_cause");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->cause->caption(), $view_ip_patient_admission_add->cause->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->admission_date->Required) { ?>
				elm = this.getElements("x" + infix + "_admission_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->admission_date->caption(), $view_ip_patient_admission_add->admission_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_admission_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_add->admission_date->errorMessage()) ?>");
			<?php if ($view_ip_patient_admission_add->release_date->Required) { ?>
				elm = this.getElements("x" + infix + "_release_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->release_date->caption(), $view_ip_patient_admission_add->release_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_release_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_add->release_date->errorMessage()) ?>");
			<?php if ($view_ip_patient_admission_add->PaymentStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_PaymentStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->PaymentStatus->caption(), $view_ip_patient_admission_add->PaymentStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->status->caption(), $view_ip_patient_admission_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_add->status->errorMessage()) ?>");
			<?php if ($view_ip_patient_admission_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->createdby->caption(), $view_ip_patient_admission_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->createddatetime->caption(), $view_ip_patient_admission_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->modifiedby->caption(), $view_ip_patient_admission_add->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->modifieddatetime->caption(), $view_ip_patient_admission_add->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->HospID->caption(), $view_ip_patient_admission_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->ReferedByDr->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferedByDr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->ReferedByDr->caption(), $view_ip_patient_admission_add->ReferedByDr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->ReferClinicname->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferClinicname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->ReferClinicname->caption(), $view_ip_patient_admission_add->ReferClinicname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->ReferCity->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferCity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->ReferCity->caption(), $view_ip_patient_admission_add->ReferCity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->ReferMobileNo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferMobileNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->ReferMobileNo->caption(), $view_ip_patient_admission_add->ReferMobileNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->ReferA4TreatingConsultant->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferA4TreatingConsultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->ReferA4TreatingConsultant->caption(), $view_ip_patient_admission_add->ReferA4TreatingConsultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->PurposreReferredfor->Required) { ?>
				elm = this.getElements("x" + infix + "_PurposreReferredfor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->PurposreReferredfor->caption(), $view_ip_patient_admission_add->PurposreReferredfor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->BillClosing->Required) { ?>
				elm = this.getElements("x" + infix + "_BillClosing[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->BillClosing->caption(), $view_ip_patient_admission_add->BillClosing->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->BillClosingDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillClosingDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->BillClosingDate->caption(), $view_ip_patient_admission_add->BillClosingDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillClosingDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_add->BillClosingDate->errorMessage()) ?>");
			<?php if ($view_ip_patient_admission_add->BillNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_BillNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->BillNumber->caption(), $view_ip_patient_admission_add->BillNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->ClosingAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_ClosingAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->ClosingAmount->caption(), $view_ip_patient_admission_add->ClosingAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->ClosingType->Required) { ?>
				elm = this.getElements("x" + infix + "_ClosingType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->ClosingType->caption(), $view_ip_patient_admission_add->ClosingType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->BillAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_BillAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->BillAmount->caption(), $view_ip_patient_admission_add->BillAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->billclosedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_billclosedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->billclosedBy->caption(), $view_ip_patient_admission_add->billclosedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->bllcloseByDate->Required) { ?>
				elm = this.getElements("x" + infix + "_bllcloseByDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->bllcloseByDate->caption(), $view_ip_patient_admission_add->bllcloseByDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_bllcloseByDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_add->bllcloseByDate->errorMessage()) ?>");
			<?php if ($view_ip_patient_admission_add->ReportHeader->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportHeader[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->ReportHeader->caption(), $view_ip_patient_admission_add->ReportHeader->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->Procedure->Required) { ?>
				elm = this.getElements("x" + infix + "_Procedure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->Procedure->caption(), $view_ip_patient_admission_add->Procedure->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->Consultant->Required) { ?>
				elm = this.getElements("x" + infix + "_Consultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->Consultant->caption(), $view_ip_patient_admission_add->Consultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->Anesthetist->Required) { ?>
				elm = this.getElements("x" + infix + "_Anesthetist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->Anesthetist->caption(), $view_ip_patient_admission_add->Anesthetist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->Amound->Required) { ?>
				elm = this.getElements("x" + infix + "_Amound");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->Amound->caption(), $view_ip_patient_admission_add->Amound->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amound");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_add->Amound->errorMessage()) ?>");
			<?php if ($view_ip_patient_admission_add->physician_id->Required) { ?>
				elm = this.getElements("x" + infix + "_physician_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->physician_id->caption(), $view_ip_patient_admission_add->physician_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->PartnerID->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->PartnerID->caption(), $view_ip_patient_admission_add->PartnerID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->PartnerName->caption(), $view_ip_patient_admission_add->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->PartnerMobile->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerMobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->PartnerMobile->caption(), $view_ip_patient_admission_add->PartnerMobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->patient_id->caption(), $view_ip_patient_admission_add->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->Cid->Required) { ?>
				elm = this.getElements("x" + infix + "_Cid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->Cid->caption(), $view_ip_patient_admission_add->Cid->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->PartId->Required) { ?>
				elm = this.getElements("x" + infix + "_PartId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->PartId->caption(), $view_ip_patient_admission_add->PartId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PartId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_add->PartId->errorMessage()) ?>");
			<?php if ($view_ip_patient_admission_add->IDProof->Required) { ?>
				elm = this.getElements("x" + infix + "_IDProof");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->IDProof->caption(), $view_ip_patient_admission_add->IDProof->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->DOB->Required) { ?>
				elm = this.getElements("x" + infix + "_DOB");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->DOB->caption(), $view_ip_patient_admission_add->DOB->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->AdviceToOtherHospital->Required) { ?>
				elm = this.getElements("x" + infix + "_AdviceToOtherHospital[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->AdviceToOtherHospital->caption(), $view_ip_patient_admission_add->AdviceToOtherHospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_patient_admission_add->Reason->Required) { ?>
				elm = this.getElements("x" + infix + "_Reason");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission_add->Reason->caption(), $view_ip_patient_admission_add->Reason->RequiredErrorMessage)) ?>");
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
	fview_ip_patient_admissionadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_ip_patient_admissionadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_ip_patient_admissionadd.lists["x_typeRegsisteration"] = <?php echo $view_ip_patient_admission_add->typeRegsisteration->Lookup->toClientList($view_ip_patient_admission_add) ?>;
	fview_ip_patient_admissionadd.lists["x_typeRegsisteration"].options = <?php echo JsonEncode($view_ip_patient_admission_add->typeRegsisteration->lookupOptions()) ?>;
	fview_ip_patient_admissionadd.lists["x_PaymentCategory"] = <?php echo $view_ip_patient_admission_add->PaymentCategory->Lookup->toClientList($view_ip_patient_admission_add) ?>;
	fview_ip_patient_admissionadd.lists["x_PaymentCategory"].options = <?php echo JsonEncode($view_ip_patient_admission_add->PaymentCategory->lookupOptions()) ?>;
	fview_ip_patient_admissionadd.lists["x_PaymentStatus"] = <?php echo $view_ip_patient_admission_add->PaymentStatus->Lookup->toClientList($view_ip_patient_admission_add) ?>;
	fview_ip_patient_admissionadd.lists["x_PaymentStatus"].options = <?php echo JsonEncode($view_ip_patient_admission_add->PaymentStatus->lookupOptions()) ?>;
	fview_ip_patient_admissionadd.lists["x_HospID"] = <?php echo $view_ip_patient_admission_add->HospID->Lookup->toClientList($view_ip_patient_admission_add) ?>;
	fview_ip_patient_admissionadd.lists["x_HospID"].options = <?php echo JsonEncode($view_ip_patient_admission_add->HospID->lookupOptions()) ?>;
	fview_ip_patient_admissionadd.lists["x_ReferedByDr"] = <?php echo $view_ip_patient_admission_add->ReferedByDr->Lookup->toClientList($view_ip_patient_admission_add) ?>;
	fview_ip_patient_admissionadd.lists["x_ReferedByDr"].options = <?php echo JsonEncode($view_ip_patient_admission_add->ReferedByDr->lookupOptions()) ?>;
	fview_ip_patient_admissionadd.lists["x_BillClosing[]"] = <?php echo $view_ip_patient_admission_add->BillClosing->Lookup->toClientList($view_ip_patient_admission_add) ?>;
	fview_ip_patient_admissionadd.lists["x_BillClosing[]"].options = <?php echo JsonEncode($view_ip_patient_admission_add->BillClosing->options(FALSE, TRUE)) ?>;
	fview_ip_patient_admissionadd.lists["x_ReportHeader[]"] = <?php echo $view_ip_patient_admission_add->ReportHeader->Lookup->toClientList($view_ip_patient_admission_add) ?>;
	fview_ip_patient_admissionadd.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_ip_patient_admission_add->ReportHeader->options(FALSE, TRUE)) ?>;
	fview_ip_patient_admissionadd.lists["x_Procedure"] = <?php echo $view_ip_patient_admission_add->Procedure->Lookup->toClientList($view_ip_patient_admission_add) ?>;
	fview_ip_patient_admissionadd.lists["x_Procedure"].options = <?php echo JsonEncode($view_ip_patient_admission_add->Procedure->lookupOptions()) ?>;
	fview_ip_patient_admissionadd.lists["x_Consultant"] = <?php echo $view_ip_patient_admission_add->Consultant->Lookup->toClientList($view_ip_patient_admission_add) ?>;
	fview_ip_patient_admissionadd.lists["x_Consultant"].options = <?php echo JsonEncode($view_ip_patient_admission_add->Consultant->lookupOptions()) ?>;
	fview_ip_patient_admissionadd.lists["x_Anesthetist"] = <?php echo $view_ip_patient_admission_add->Anesthetist->Lookup->toClientList($view_ip_patient_admission_add) ?>;
	fview_ip_patient_admissionadd.lists["x_Anesthetist"].options = <?php echo JsonEncode($view_ip_patient_admission_add->Anesthetist->lookupOptions()) ?>;
	fview_ip_patient_admissionadd.lists["x_physician_id"] = <?php echo $view_ip_patient_admission_add->physician_id->Lookup->toClientList($view_ip_patient_admission_add) ?>;
	fview_ip_patient_admissionadd.lists["x_physician_id"].options = <?php echo JsonEncode($view_ip_patient_admission_add->physician_id->lookupOptions()) ?>;
	fview_ip_patient_admissionadd.lists["x_patient_id"] = <?php echo $view_ip_patient_admission_add->patient_id->Lookup->toClientList($view_ip_patient_admission_add) ?>;
	fview_ip_patient_admissionadd.lists["x_patient_id"].options = <?php echo JsonEncode($view_ip_patient_admission_add->patient_id->lookupOptions()) ?>;
	fview_ip_patient_admissionadd.lists["x_Cid"] = <?php echo $view_ip_patient_admission_add->Cid->Lookup->toClientList($view_ip_patient_admission_add) ?>;
	fview_ip_patient_admissionadd.lists["x_Cid"].options = <?php echo JsonEncode($view_ip_patient_admission_add->Cid->lookupOptions()) ?>;
	fview_ip_patient_admissionadd.lists["x_AdviceToOtherHospital[]"] = <?php echo $view_ip_patient_admission_add->AdviceToOtherHospital->Lookup->toClientList($view_ip_patient_admission_add) ?>;
	fview_ip_patient_admissionadd.lists["x_AdviceToOtherHospital[]"].options = <?php echo JsonEncode($view_ip_patient_admission_add->AdviceToOtherHospital->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_ip_patient_admissionadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_ip_patient_admission_add->showPageHeader(); ?>
<?php
$view_ip_patient_admission_add->showMessage();
?>
<form name="fview_ip_patient_admissionadd" id="fview_ip_patient_admissionadd" class="<?php echo $view_ip_patient_admission_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_patient_admission">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_patient_admission_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($view_ip_patient_admission_add->mrnNo->Visible) { // mrnNo ?>
	<div id="r_mrnNo" class="form-group row">
		<label id="elh_view_ip_patient_admission_mrnNo" for="x_mrnNo" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_mrnNo" type="text/html"><?php echo $view_ip_patient_admission_add->mrnNo->caption() ?><?php echo $view_ip_patient_admission_add->mrnNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->mrnNo->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_mrnNo" type="text/html"><span id="el_view_ip_patient_admission_mrnNo">
<input type="text" data-table="view_ip_patient_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->mrnNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->mrnNo->EditValue ?>"<?php echo $view_ip_patient_admission_add->mrnNo->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->mrnNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_view_ip_patient_admission_PatientID" for="x_PatientID" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_PatientID" type="text/html"><?php echo $view_ip_patient_admission_add->PatientID->caption() ?><?php echo $view_ip_patient_admission_add->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->PatientID->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PatientID" type="text/html"><span id="el_view_ip_patient_admission_PatientID">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->PatientID->EditValue ?>"<?php echo $view_ip_patient_admission_add->PatientID->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->patient_name->Visible) { // patient_name ?>
	<div id="r_patient_name" class="form-group row">
		<label id="elh_view_ip_patient_admission_patient_name" for="x_patient_name" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_patient_name" type="text/html"><?php echo $view_ip_patient_admission_add->patient_name->caption() ?><?php echo $view_ip_patient_admission_add->patient_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->patient_name->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_patient_name" type="text/html"><span id="el_view_ip_patient_admission_patient_name">
<input type="text" data-table="view_ip_patient_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->patient_name->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->patient_name->EditValue ?>"<?php echo $view_ip_patient_admission_add->patient_name->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->patient_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->mobileno->Visible) { // mobileno ?>
	<div id="r_mobileno" class="form-group row">
		<label id="elh_view_ip_patient_admission_mobileno" for="x_mobileno" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_mobileno" type="text/html"><?php echo $view_ip_patient_admission_add->mobileno->caption() ?><?php echo $view_ip_patient_admission_add->mobileno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->mobileno->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_mobileno" type="text/html"><span id="el_view_ip_patient_admission_mobileno">
<input type="text" data-table="view_ip_patient_admission" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->mobileno->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->mobileno->EditValue ?>"<?php echo $view_ip_patient_admission_add->mobileno->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->mobileno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_view_ip_patient_admission_profilePic" for="x_profilePic" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_profilePic" type="text/html"><?php echo $view_ip_patient_admission_add->profilePic->caption() ?><?php echo $view_ip_patient_admission_add->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->profilePic->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_profilePic" type="text/html"><span id="el_view_ip_patient_admission_profilePic">
<input type="text" data-table="view_ip_patient_admission" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->profilePic->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->profilePic->EditValue ?>"<?php echo $view_ip_patient_admission_add->profilePic->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_view_ip_patient_admission_gender" for="x_gender" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_gender" type="text/html"><?php echo $view_ip_patient_admission_add->gender->caption() ?><?php echo $view_ip_patient_admission_add->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->gender->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_gender" type="text/html"><span id="el_view_ip_patient_admission_gender">
<input type="text" data-table="view_ip_patient_admission" data-field="x_gender" name="x_gender" id="x_gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->gender->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->gender->EditValue ?>"<?php echo $view_ip_patient_admission_add->gender->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->age->Visible) { // age ?>
	<div id="r_age" class="form-group row">
		<label id="elh_view_ip_patient_admission_age" for="x_age" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_age" type="text/html"><?php echo $view_ip_patient_admission_add->age->caption() ?><?php echo $view_ip_patient_admission_add->age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->age->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_age" type="text/html"><span id="el_view_ip_patient_admission_age">
<input type="text" data-table="view_ip_patient_admission" data-field="x_age" name="x_age" id="x_age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->age->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->age->EditValue ?>"<?php echo $view_ip_patient_admission_add->age->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->Package->Visible) { // Package ?>
	<div id="r_Package" class="form-group row">
		<label id="elh_view_ip_patient_admission_Package" for="x_Package" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_Package" type="text/html"><?php echo $view_ip_patient_admission_add->Package->caption() ?><?php echo $view_ip_patient_admission_add->Package->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->Package->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Package" type="text/html"><span id="el_view_ip_patient_admission_Package">
<input type="text" data-table="view_ip_patient_admission" data-field="x_Package" name="x_Package" id="x_Package" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->Package->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->Package->EditValue ?>"<?php echo $view_ip_patient_admission_add->Package->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->Package->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<div id="r_typeRegsisteration" class="form-group row">
		<label id="elh_view_ip_patient_admission_typeRegsisteration" for="x_typeRegsisteration" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_typeRegsisteration" type="text/html"><?php echo $view_ip_patient_admission_add->typeRegsisteration->caption() ?><?php echo $view_ip_patient_admission_add->typeRegsisteration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->typeRegsisteration->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_typeRegsisteration" type="text/html"><span id="el_view_ip_patient_admission_typeRegsisteration">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_typeRegsisteration" data-value-separator="<?php echo $view_ip_patient_admission_add->typeRegsisteration->displayValueSeparatorAttribute() ?>" id="x_typeRegsisteration" name="x_typeRegsisteration"<?php echo $view_ip_patient_admission_add->typeRegsisteration->editAttributes() ?>>
			<?php echo $view_ip_patient_admission_add->typeRegsisteration->selectOptionListHtml("x_typeRegsisteration") ?>
		</select>
</div>
<?php echo $view_ip_patient_admission_add->typeRegsisteration->Lookup->getParamTag($view_ip_patient_admission_add, "p_x_typeRegsisteration") ?>
</span></script>
<?php echo $view_ip_patient_admission_add->typeRegsisteration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->PaymentCategory->Visible) { // PaymentCategory ?>
	<div id="r_PaymentCategory" class="form-group row">
		<label id="elh_view_ip_patient_admission_PaymentCategory" for="x_PaymentCategory" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_PaymentCategory" type="text/html"><?php echo $view_ip_patient_admission_add->PaymentCategory->caption() ?><?php echo $view_ip_patient_admission_add->PaymentCategory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->PaymentCategory->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PaymentCategory" type="text/html"><span id="el_view_ip_patient_admission_PaymentCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_PaymentCategory" data-value-separator="<?php echo $view_ip_patient_admission_add->PaymentCategory->displayValueSeparatorAttribute() ?>" id="x_PaymentCategory" name="x_PaymentCategory"<?php echo $view_ip_patient_admission_add->PaymentCategory->editAttributes() ?>>
			<?php echo $view_ip_patient_admission_add->PaymentCategory->selectOptionListHtml("x_PaymentCategory") ?>
		</select>
</div>
<?php echo $view_ip_patient_admission_add->PaymentCategory->Lookup->getParamTag($view_ip_patient_admission_add, "p_x_PaymentCategory") ?>
</span></script>
<?php echo $view_ip_patient_admission_add->PaymentCategory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<div id="r_admission_consultant_id" class="form-group row">
		<label id="elh_view_ip_patient_admission_admission_consultant_id" for="x_admission_consultant_id" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_admission_consultant_id" type="text/html"><?php echo $view_ip_patient_admission_add->admission_consultant_id->caption() ?><?php echo $view_ip_patient_admission_add->admission_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->admission_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_admission_consultant_id" type="text/html"><span id="el_view_ip_patient_admission_admission_consultant_id">
<input type="text" data-table="view_ip_patient_admission" data-field="x_admission_consultant_id" name="x_admission_consultant_id" id="x_admission_consultant_id" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->admission_consultant_id->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->admission_consultant_id->EditValue ?>"<?php echo $view_ip_patient_admission_add->admission_consultant_id->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->admission_consultant_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<div id="r_leading_consultant_id" class="form-group row">
		<label id="elh_view_ip_patient_admission_leading_consultant_id" for="x_leading_consultant_id" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_leading_consultant_id" type="text/html"><?php echo $view_ip_patient_admission_add->leading_consultant_id->caption() ?><?php echo $view_ip_patient_admission_add->leading_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->leading_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_leading_consultant_id" type="text/html"><span id="el_view_ip_patient_admission_leading_consultant_id">
<input type="text" data-table="view_ip_patient_admission" data-field="x_leading_consultant_id" name="x_leading_consultant_id" id="x_leading_consultant_id" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->leading_consultant_id->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->leading_consultant_id->EditValue ?>"<?php echo $view_ip_patient_admission_add->leading_consultant_id->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->leading_consultant_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->cause->Visible) { // cause ?>
	<div id="r_cause" class="form-group row">
		<label id="elh_view_ip_patient_admission_cause" for="x_cause" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_cause" type="text/html"><?php echo $view_ip_patient_admission_add->cause->caption() ?><?php echo $view_ip_patient_admission_add->cause->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->cause->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_cause" type="text/html"><span id="el_view_ip_patient_admission_cause">
<textarea data-table="view_ip_patient_admission" data-field="x_cause" name="x_cause" id="x_cause" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->cause->getPlaceHolder()) ?>"<?php echo $view_ip_patient_admission_add->cause->editAttributes() ?>><?php echo $view_ip_patient_admission_add->cause->EditValue ?></textarea>
</span></script>
<?php echo $view_ip_patient_admission_add->cause->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->admission_date->Visible) { // admission_date ?>
	<div id="r_admission_date" class="form-group row">
		<label id="elh_view_ip_patient_admission_admission_date" for="x_admission_date" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_admission_date" type="text/html"><?php echo $view_ip_patient_admission_add->admission_date->caption() ?><?php echo $view_ip_patient_admission_add->admission_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->admission_date->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_admission_date" type="text/html"><span id="el_view_ip_patient_admission_admission_date">
<input type="text" data-table="view_ip_patient_admission" data-field="x_admission_date" data-format="11" name="x_admission_date" id="x_admission_date" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->admission_date->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->admission_date->EditValue ?>"<?php echo $view_ip_patient_admission_add->admission_date->editAttributes() ?>>
<?php if (!$view_ip_patient_admission_add->admission_date->ReadOnly && !$view_ip_patient_admission_add->admission_date->Disabled && !isset($view_ip_patient_admission_add->admission_date->EditAttrs["readonly"]) && !isset($view_ip_patient_admission_add->admission_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_ip_patient_admissionadd_js">
loadjs.ready(["fview_ip_patient_admissionadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_patient_admissionadd", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $view_ip_patient_admission_add->admission_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->release_date->Visible) { // release_date ?>
	<div id="r_release_date" class="form-group row">
		<label id="elh_view_ip_patient_admission_release_date" for="x_release_date" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_release_date" type="text/html"><?php echo $view_ip_patient_admission_add->release_date->caption() ?><?php echo $view_ip_patient_admission_add->release_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->release_date->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_release_date" type="text/html"><span id="el_view_ip_patient_admission_release_date">
<input type="text" data-table="view_ip_patient_admission" data-field="x_release_date" data-format="11" name="x_release_date" id="x_release_date" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->release_date->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->release_date->EditValue ?>"<?php echo $view_ip_patient_admission_add->release_date->editAttributes() ?>>
<?php if (!$view_ip_patient_admission_add->release_date->ReadOnly && !$view_ip_patient_admission_add->release_date->Disabled && !isset($view_ip_patient_admission_add->release_date->EditAttrs["readonly"]) && !isset($view_ip_patient_admission_add->release_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_ip_patient_admissionadd_js">
loadjs.ready(["fview_ip_patient_admissionadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_patient_admissionadd", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $view_ip_patient_admission_add->release_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->PaymentStatus->Visible) { // PaymentStatus ?>
	<div id="r_PaymentStatus" class="form-group row">
		<label id="elh_view_ip_patient_admission_PaymentStatus" for="x_PaymentStatus" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_PaymentStatus" type="text/html"><?php echo $view_ip_patient_admission_add->PaymentStatus->caption() ?><?php echo $view_ip_patient_admission_add->PaymentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->PaymentStatus->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PaymentStatus" type="text/html"><span id="el_view_ip_patient_admission_PaymentStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_PaymentStatus" data-value-separator="<?php echo $view_ip_patient_admission_add->PaymentStatus->displayValueSeparatorAttribute() ?>" id="x_PaymentStatus" name="x_PaymentStatus"<?php echo $view_ip_patient_admission_add->PaymentStatus->editAttributes() ?>>
			<?php echo $view_ip_patient_admission_add->PaymentStatus->selectOptionListHtml("x_PaymentStatus") ?>
		</select>
</div>
<?php echo $view_ip_patient_admission_add->PaymentStatus->Lookup->getParamTag($view_ip_patient_admission_add, "p_x_PaymentStatus") ?>
</span></script>
<?php echo $view_ip_patient_admission_add->PaymentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_view_ip_patient_admission_status" for="x_status" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_status" type="text/html"><?php echo $view_ip_patient_admission_add->status->caption() ?><?php echo $view_ip_patient_admission_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->status->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_status" type="text/html"><span id="el_view_ip_patient_admission_status">
<input type="text" data-table="view_ip_patient_admission" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->status->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->status->EditValue ?>"<?php echo $view_ip_patient_admission_add->status->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->ReferedByDr->Visible) { // ReferedByDr ?>
	<div id="r_ReferedByDr" class="form-group row">
		<label id="elh_view_ip_patient_admission_ReferedByDr" for="x_ReferedByDr" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_ReferedByDr" type="text/html"><?php echo $view_ip_patient_admission_add->ReferedByDr->caption() ?><?php echo $view_ip_patient_admission_add->ReferedByDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->ReferedByDr->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferedByDr" type="text/html"><span id="el_view_ip_patient_admission_ReferedByDr">
<?php $view_ip_patient_admission_add->ReferedByDr->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_ReferedByDr" data-value-separator="<?php echo $view_ip_patient_admission_add->ReferedByDr->displayValueSeparatorAttribute() ?>" id="x_ReferedByDr" name="x_ReferedByDr"<?php echo $view_ip_patient_admission_add->ReferedByDr->editAttributes() ?>>
			<?php echo $view_ip_patient_admission_add->ReferedByDr->selectOptionListHtml("x_ReferedByDr") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$view_ip_patient_admission_add->ReferedByDr->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferedByDr" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_ip_patient_admission_add->ReferedByDr->caption() ?>" data-title="<?php echo $view_ip_patient_admission_add->ReferedByDr->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferedByDr',url:'mas_reference_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $view_ip_patient_admission_add->ReferedByDr->Lookup->getParamTag($view_ip_patient_admission_add, "p_x_ReferedByDr") ?>
</span></script>
<?php echo $view_ip_patient_admission_add->ReferedByDr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label id="elh_view_ip_patient_admission_ReferClinicname" for="x_ReferClinicname" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_ReferClinicname" type="text/html"><?php echo $view_ip_patient_admission_add->ReferClinicname->caption() ?><?php echo $view_ip_patient_admission_add->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->ReferClinicname->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferClinicname" type="text/html"><span id="el_view_ip_patient_admission_ReferClinicname">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->ReferClinicname->EditValue ?>"<?php echo $view_ip_patient_admission_add->ReferClinicname->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->ReferClinicname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label id="elh_view_ip_patient_admission_ReferCity" for="x_ReferCity" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_ReferCity" type="text/html"><?php echo $view_ip_patient_admission_add->ReferCity->caption() ?><?php echo $view_ip_patient_admission_add->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->ReferCity->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferCity" type="text/html"><span id="el_view_ip_patient_admission_ReferCity">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->ReferCity->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->ReferCity->EditValue ?>"<?php echo $view_ip_patient_admission_add->ReferCity->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->ReferCity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label id="elh_view_ip_patient_admission_ReferMobileNo" for="x_ReferMobileNo" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_ReferMobileNo" type="text/html"><?php echo $view_ip_patient_admission_add->ReferMobileNo->caption() ?><?php echo $view_ip_patient_admission_add->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferMobileNo" type="text/html"><span id="el_view_ip_patient_admission_ReferMobileNo">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->ReferMobileNo->EditValue ?>"<?php echo $view_ip_patient_admission_add->ReferMobileNo->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->ReferMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div id="r_ReferA4TreatingConsultant" class="form-group row">
		<label id="elh_view_ip_patient_admission_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_ReferA4TreatingConsultant" type="text/html"><?php echo $view_ip_patient_admission_add->ReferA4TreatingConsultant->caption() ?><?php echo $view_ip_patient_admission_add->ReferA4TreatingConsultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferA4TreatingConsultant" type="text/html"><span id="el_view_ip_patient_admission_ReferA4TreatingConsultant">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ReferA4TreatingConsultant" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->ReferA4TreatingConsultant->EditValue ?>"<?php echo $view_ip_patient_admission_add->ReferA4TreatingConsultant->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->ReferA4TreatingConsultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div id="r_PurposreReferredfor" class="form-group row">
		<label id="elh_view_ip_patient_admission_PurposreReferredfor" for="x_PurposreReferredfor" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_PurposreReferredfor" type="text/html"><?php echo $view_ip_patient_admission_add->PurposreReferredfor->caption() ?><?php echo $view_ip_patient_admission_add->PurposreReferredfor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PurposreReferredfor" type="text/html"><span id="el_view_ip_patient_admission_PurposreReferredfor">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->PurposreReferredfor->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->PurposreReferredfor->EditValue ?>"<?php echo $view_ip_patient_admission_add->PurposreReferredfor->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->PurposreReferredfor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->BillClosing->Visible) { // BillClosing ?>
	<div id="r_BillClosing" class="form-group row">
		<label id="elh_view_ip_patient_admission_BillClosing" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_BillClosing" type="text/html"><?php echo $view_ip_patient_admission_add->BillClosing->caption() ?><?php echo $view_ip_patient_admission_add->BillClosing->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->BillClosing->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_BillClosing" type="text/html"><span id="el_view_ip_patient_admission_BillClosing">
<div id="tp_x_BillClosing" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_ip_patient_admission" data-field="x_BillClosing" data-value-separator="<?php echo $view_ip_patient_admission_add->BillClosing->displayValueSeparatorAttribute() ?>" name="x_BillClosing[]" id="x_BillClosing[]" value="{value}"<?php echo $view_ip_patient_admission_add->BillClosing->editAttributes() ?>></div>
<div id="dsl_x_BillClosing" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ip_patient_admission_add->BillClosing->checkBoxListHtml(FALSE, "x_BillClosing[]") ?>
</div></div>
</span></script>
<?php echo $view_ip_patient_admission_add->BillClosing->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->BillClosingDate->Visible) { // BillClosingDate ?>
	<div id="r_BillClosingDate" class="form-group row">
		<label id="elh_view_ip_patient_admission_BillClosingDate" for="x_BillClosingDate" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_BillClosingDate" type="text/html"><?php echo $view_ip_patient_admission_add->BillClosingDate->caption() ?><?php echo $view_ip_patient_admission_add->BillClosingDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->BillClosingDate->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_BillClosingDate" type="text/html"><span id="el_view_ip_patient_admission_BillClosingDate">
<input type="text" data-table="view_ip_patient_admission" data-field="x_BillClosingDate" name="x_BillClosingDate" id="x_BillClosingDate" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->BillClosingDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->BillClosingDate->EditValue ?>"<?php echo $view_ip_patient_admission_add->BillClosingDate->editAttributes() ?>>
<?php if (!$view_ip_patient_admission_add->BillClosingDate->ReadOnly && !$view_ip_patient_admission_add->BillClosingDate->Disabled && !isset($view_ip_patient_admission_add->BillClosingDate->EditAttrs["readonly"]) && !isset($view_ip_patient_admission_add->BillClosingDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_ip_patient_admissionadd_js">
loadjs.ready(["fview_ip_patient_admissionadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_patient_admissionadd", "x_BillClosingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $view_ip_patient_admission_add->BillClosingDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_view_ip_patient_admission_BillNumber" for="x_BillNumber" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_BillNumber" type="text/html"><?php echo $view_ip_patient_admission_add->BillNumber->caption() ?><?php echo $view_ip_patient_admission_add->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->BillNumber->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_BillNumber" type="text/html"><span id="el_view_ip_patient_admission_BillNumber">
<input type="text" data-table="view_ip_patient_admission" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->BillNumber->EditValue ?>"<?php echo $view_ip_patient_admission_add->BillNumber->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->ClosingAmount->Visible) { // ClosingAmount ?>
	<div id="r_ClosingAmount" class="form-group row">
		<label id="elh_view_ip_patient_admission_ClosingAmount" for="x_ClosingAmount" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_ClosingAmount" type="text/html"><?php echo $view_ip_patient_admission_add->ClosingAmount->caption() ?><?php echo $view_ip_patient_admission_add->ClosingAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->ClosingAmount->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ClosingAmount" type="text/html"><span id="el_view_ip_patient_admission_ClosingAmount">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ClosingAmount" name="x_ClosingAmount" id="x_ClosingAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->ClosingAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->ClosingAmount->EditValue ?>"<?php echo $view_ip_patient_admission_add->ClosingAmount->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->ClosingAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->ClosingType->Visible) { // ClosingType ?>
	<div id="r_ClosingType" class="form-group row">
		<label id="elh_view_ip_patient_admission_ClosingType" for="x_ClosingType" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_ClosingType" type="text/html"><?php echo $view_ip_patient_admission_add->ClosingType->caption() ?><?php echo $view_ip_patient_admission_add->ClosingType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->ClosingType->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ClosingType" type="text/html"><span id="el_view_ip_patient_admission_ClosingType">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ClosingType" name="x_ClosingType" id="x_ClosingType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->ClosingType->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->ClosingType->EditValue ?>"<?php echo $view_ip_patient_admission_add->ClosingType->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->ClosingType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->BillAmount->Visible) { // BillAmount ?>
	<div id="r_BillAmount" class="form-group row">
		<label id="elh_view_ip_patient_admission_BillAmount" for="x_BillAmount" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_BillAmount" type="text/html"><?php echo $view_ip_patient_admission_add->BillAmount->caption() ?><?php echo $view_ip_patient_admission_add->BillAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->BillAmount->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_BillAmount" type="text/html"><span id="el_view_ip_patient_admission_BillAmount">
<input type="text" data-table="view_ip_patient_admission" data-field="x_BillAmount" name="x_BillAmount" id="x_BillAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->BillAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->BillAmount->EditValue ?>"<?php echo $view_ip_patient_admission_add->BillAmount->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->BillAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->billclosedBy->Visible) { // billclosedBy ?>
	<div id="r_billclosedBy" class="form-group row">
		<label id="elh_view_ip_patient_admission_billclosedBy" for="x_billclosedBy" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_billclosedBy" type="text/html"><?php echo $view_ip_patient_admission_add->billclosedBy->caption() ?><?php echo $view_ip_patient_admission_add->billclosedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->billclosedBy->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_billclosedBy" type="text/html"><span id="el_view_ip_patient_admission_billclosedBy">
<input type="text" data-table="view_ip_patient_admission" data-field="x_billclosedBy" name="x_billclosedBy" id="x_billclosedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->billclosedBy->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->billclosedBy->EditValue ?>"<?php echo $view_ip_patient_admission_add->billclosedBy->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->billclosedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<div id="r_bllcloseByDate" class="form-group row">
		<label id="elh_view_ip_patient_admission_bllcloseByDate" for="x_bllcloseByDate" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_bllcloseByDate" type="text/html"><?php echo $view_ip_patient_admission_add->bllcloseByDate->caption() ?><?php echo $view_ip_patient_admission_add->bllcloseByDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->bllcloseByDate->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_bllcloseByDate" type="text/html"><span id="el_view_ip_patient_admission_bllcloseByDate">
<input type="text" data-table="view_ip_patient_admission" data-field="x_bllcloseByDate" name="x_bllcloseByDate" id="x_bllcloseByDate" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->bllcloseByDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->bllcloseByDate->EditValue ?>"<?php echo $view_ip_patient_admission_add->bllcloseByDate->editAttributes() ?>>
<?php if (!$view_ip_patient_admission_add->bllcloseByDate->ReadOnly && !$view_ip_patient_admission_add->bllcloseByDate->Disabled && !isset($view_ip_patient_admission_add->bllcloseByDate->EditAttrs["readonly"]) && !isset($view_ip_patient_admission_add->bllcloseByDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_ip_patient_admissionadd_js">
loadjs.ready(["fview_ip_patient_admissionadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_patient_admissionadd", "x_bllcloseByDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $view_ip_patient_admission_add->bllcloseByDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_view_ip_patient_admission_ReportHeader" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_ReportHeader" type="text/html"><?php echo $view_ip_patient_admission_add->ReportHeader->caption() ?><?php echo $view_ip_patient_admission_add->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReportHeader" type="text/html"><span id="el_view_ip_patient_admission_ReportHeader">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_ip_patient_admission" data-field="x_ReportHeader" data-value-separator="<?php echo $view_ip_patient_admission_add->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $view_ip_patient_admission_add->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ip_patient_admission_add->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span></script>
<?php echo $view_ip_patient_admission_add->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label id="elh_view_ip_patient_admission_Procedure" for="x_Procedure" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_Procedure" type="text/html"><?php echo $view_ip_patient_admission_add->Procedure->caption() ?><?php echo $view_ip_patient_admission_add->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->Procedure->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Procedure" type="text/html"><span id="el_view_ip_patient_admission_Procedure">
<?php $view_ip_patient_admission_add->Procedure->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Procedure"><?php echo EmptyValue(strval($view_ip_patient_admission_add->Procedure->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_ip_patient_admission_add->Procedure->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission_add->Procedure->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_ip_patient_admission_add->Procedure->ReadOnly || $view_ip_patient_admission_add->Procedure->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Procedure',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission_add->Procedure->Lookup->getParamTag($view_ip_patient_admission_add, "p_x_Procedure") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_Procedure" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission_add->Procedure->displayValueSeparatorAttribute() ?>" name="x_Procedure" id="x_Procedure" value="<?php echo $view_ip_patient_admission_add->Procedure->CurrentValue ?>"<?php echo $view_ip_patient_admission_add->Procedure->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->Procedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->Consultant->Visible) { // Consultant ?>
	<div id="r_Consultant" class="form-group row">
		<label id="elh_view_ip_patient_admission_Consultant" for="x_Consultant" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_Consultant" type="text/html"><?php echo $view_ip_patient_admission_add->Consultant->caption() ?><?php echo $view_ip_patient_admission_add->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->Consultant->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Consultant" type="text/html"><span id="el_view_ip_patient_admission_Consultant">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_Consultant" data-value-separator="<?php echo $view_ip_patient_admission_add->Consultant->displayValueSeparatorAttribute() ?>" id="x_Consultant" name="x_Consultant"<?php echo $view_ip_patient_admission_add->Consultant->editAttributes() ?>>
			<?php echo $view_ip_patient_admission_add->Consultant->selectOptionListHtml("x_Consultant") ?>
		</select>
</div>
<?php echo $view_ip_patient_admission_add->Consultant->Lookup->getParamTag($view_ip_patient_admission_add, "p_x_Consultant") ?>
</span></script>
<?php echo $view_ip_patient_admission_add->Consultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->Anesthetist->Visible) { // Anesthetist ?>
	<div id="r_Anesthetist" class="form-group row">
		<label id="elh_view_ip_patient_admission_Anesthetist" for="x_Anesthetist" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_Anesthetist" type="text/html"><?php echo $view_ip_patient_admission_add->Anesthetist->caption() ?><?php echo $view_ip_patient_admission_add->Anesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->Anesthetist->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Anesthetist" type="text/html"><span id="el_view_ip_patient_admission_Anesthetist">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_Anesthetist" data-value-separator="<?php echo $view_ip_patient_admission_add->Anesthetist->displayValueSeparatorAttribute() ?>" id="x_Anesthetist" name="x_Anesthetist"<?php echo $view_ip_patient_admission_add->Anesthetist->editAttributes() ?>>
			<?php echo $view_ip_patient_admission_add->Anesthetist->selectOptionListHtml("x_Anesthetist") ?>
		</select>
</div>
<?php echo $view_ip_patient_admission_add->Anesthetist->Lookup->getParamTag($view_ip_patient_admission_add, "p_x_Anesthetist") ?>
</span></script>
<?php echo $view_ip_patient_admission_add->Anesthetist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->Amound->Visible) { // Amound ?>
	<div id="r_Amound" class="form-group row">
		<label id="elh_view_ip_patient_admission_Amound" for="x_Amound" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_Amound" type="text/html"><?php echo $view_ip_patient_admission_add->Amound->caption() ?><?php echo $view_ip_patient_admission_add->Amound->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->Amound->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Amound" type="text/html"><span id="el_view_ip_patient_admission_Amound">
<input type="text" data-table="view_ip_patient_admission" data-field="x_Amound" name="x_Amound" id="x_Amound" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->Amound->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->Amound->EditValue ?>"<?php echo $view_ip_patient_admission_add->Amound->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->Amound->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->physician_id->Visible) { // physician_id ?>
	<div id="r_physician_id" class="form-group row">
		<label id="elh_view_ip_patient_admission_physician_id" for="x_physician_id" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_physician_id" type="text/html"><?php echo $view_ip_patient_admission_add->physician_id->caption() ?><?php echo $view_ip_patient_admission_add->physician_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->physician_id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_physician_id" type="text/html"><span id="el_view_ip_patient_admission_physician_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_physician_id"><?php echo EmptyValue(strval($view_ip_patient_admission_add->physician_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_ip_patient_admission_add->physician_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission_add->physician_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_ip_patient_admission_add->physician_id->ReadOnly || $view_ip_patient_admission_add->physician_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_physician_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission_add->physician_id->Lookup->getParamTag($view_ip_patient_admission_add, "p_x_physician_id") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_physician_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission_add->physician_id->displayValueSeparatorAttribute() ?>" name="x_physician_id" id="x_physician_id" value="<?php echo $view_ip_patient_admission_add->physician_id->CurrentValue ?>"<?php echo $view_ip_patient_admission_add->physician_id->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->physician_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label id="elh_view_ip_patient_admission_PartnerID" for="x_PartnerID" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_PartnerID" type="text/html"><?php echo $view_ip_patient_admission_add->PartnerID->caption() ?><?php echo $view_ip_patient_admission_add->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->PartnerID->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PartnerID" type="text/html"><span id="el_view_ip_patient_admission_PartnerID">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->PartnerID->EditValue ?>"<?php echo $view_ip_patient_admission_add->PartnerID->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->PartnerID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_view_ip_patient_admission_PartnerName" for="x_PartnerName" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_PartnerName" type="text/html"><?php echo $view_ip_patient_admission_add->PartnerName->caption() ?><?php echo $view_ip_patient_admission_add->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->PartnerName->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PartnerName" type="text/html"><span id="el_view_ip_patient_admission_PartnerName">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->PartnerName->EditValue ?>"<?php echo $view_ip_patient_admission_add->PartnerName->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->PartnerMobile->Visible) { // PartnerMobile ?>
	<div id="r_PartnerMobile" class="form-group row">
		<label id="elh_view_ip_patient_admission_PartnerMobile" for="x_PartnerMobile" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_PartnerMobile" type="text/html"><?php echo $view_ip_patient_admission_add->PartnerMobile->caption() ?><?php echo $view_ip_patient_admission_add->PartnerMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->PartnerMobile->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PartnerMobile" type="text/html"><span id="el_view_ip_patient_admission_PartnerMobile">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->PartnerMobile->EditValue ?>"<?php echo $view_ip_patient_admission_add->PartnerMobile->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->PartnerMobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_view_ip_patient_admission_patient_id" for="x_patient_id" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_patient_id" type="text/html"><?php echo $view_ip_patient_admission_add->patient_id->caption() ?><?php echo $view_ip_patient_admission_add->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->patient_id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_patient_id" type="text/html"><span id="el_view_ip_patient_admission_patient_id">
<?php $view_ip_patient_admission_add->patient_id->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient_id"><?php echo EmptyValue(strval($view_ip_patient_admission_add->patient_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_ip_patient_admission_add->patient_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission_add->patient_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_ip_patient_admission_add->patient_id->ReadOnly || $view_ip_patient_admission_add->patient_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission_add->patient_id->Lookup->getParamTag($view_ip_patient_admission_add, "p_x_patient_id") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_patient_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission_add->patient_id->displayValueSeparatorAttribute() ?>" name="x_patient_id" id="x_patient_id" value="<?php echo $view_ip_patient_admission_add->patient_id->CurrentValue ?>"<?php echo $view_ip_patient_admission_add->patient_id->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->Cid->Visible) { // Cid ?>
	<div id="r_Cid" class="form-group row">
		<label id="elh_view_ip_patient_admission_Cid" for="x_Cid" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_Cid" type="text/html"><?php echo $view_ip_patient_admission_add->Cid->caption() ?><?php echo $view_ip_patient_admission_add->Cid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->Cid->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Cid" type="text/html"><span id="el_view_ip_patient_admission_Cid">
<?php $view_ip_patient_admission_add->Cid->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Cid"><?php echo EmptyValue(strval($view_ip_patient_admission_add->Cid->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_ip_patient_admission_add->Cid->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission_add->Cid->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_ip_patient_admission_add->Cid->ReadOnly || $view_ip_patient_admission_add->Cid->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Cid',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission_add->Cid->Lookup->getParamTag($view_ip_patient_admission_add, "p_x_Cid") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_Cid" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission_add->Cid->displayValueSeparatorAttribute() ?>" name="x_Cid" id="x_Cid" value="<?php echo $view_ip_patient_admission_add->Cid->CurrentValue ?>"<?php echo $view_ip_patient_admission_add->Cid->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->Cid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->PartId->Visible) { // PartId ?>
	<div id="r_PartId" class="form-group row">
		<label id="elh_view_ip_patient_admission_PartId" for="x_PartId" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_PartId" type="text/html"><?php echo $view_ip_patient_admission_add->PartId->caption() ?><?php echo $view_ip_patient_admission_add->PartId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->PartId->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PartId" type="text/html"><span id="el_view_ip_patient_admission_PartId">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PartId" name="x_PartId" id="x_PartId" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->PartId->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->PartId->EditValue ?>"<?php echo $view_ip_patient_admission_add->PartId->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->PartId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->IDProof->Visible) { // IDProof ?>
	<div id="r_IDProof" class="form-group row">
		<label id="elh_view_ip_patient_admission_IDProof" for="x_IDProof" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_IDProof" type="text/html"><?php echo $view_ip_patient_admission_add->IDProof->caption() ?><?php echo $view_ip_patient_admission_add->IDProof->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->IDProof->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_IDProof" type="text/html"><span id="el_view_ip_patient_admission_IDProof">
<input type="text" data-table="view_ip_patient_admission" data-field="x_IDProof" name="x_IDProof" id="x_IDProof" size="30" maxlength="115" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->IDProof->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->IDProof->EditValue ?>"<?php echo $view_ip_patient_admission_add->IDProof->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->IDProof->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->DOB->Visible) { // DOB ?>
	<div id="r_DOB" class="form-group row">
		<label id="elh_view_ip_patient_admission_DOB" for="x_DOB" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_DOB" type="text/html"><?php echo $view_ip_patient_admission_add->DOB->caption() ?><?php echo $view_ip_patient_admission_add->DOB->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->DOB->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_DOB" type="text/html"><span id="el_view_ip_patient_admission_DOB">
<input type="text" data-table="view_ip_patient_admission" data-field="x_DOB" name="x_DOB" id="x_DOB" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->DOB->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_add->DOB->EditValue ?>"<?php echo $view_ip_patient_admission_add->DOB->editAttributes() ?>>
</span></script>
<?php echo $view_ip_patient_admission_add->DOB->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<div id="r_AdviceToOtherHospital" class="form-group row">
		<label id="elh_view_ip_patient_admission_AdviceToOtherHospital" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_AdviceToOtherHospital" type="text/html"><?php echo $view_ip_patient_admission_add->AdviceToOtherHospital->caption() ?><?php echo $view_ip_patient_admission_add->AdviceToOtherHospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->AdviceToOtherHospital->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_AdviceToOtherHospital" type="text/html"><span id="el_view_ip_patient_admission_AdviceToOtherHospital">
<div id="tp_x_AdviceToOtherHospital" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_ip_patient_admission" data-field="x_AdviceToOtherHospital" data-value-separator="<?php echo $view_ip_patient_admission_add->AdviceToOtherHospital->displayValueSeparatorAttribute() ?>" name="x_AdviceToOtherHospital[]" id="x_AdviceToOtherHospital[]" value="{value}"<?php echo $view_ip_patient_admission_add->AdviceToOtherHospital->editAttributes() ?>></div>
<div id="dsl_x_AdviceToOtherHospital" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ip_patient_admission_add->AdviceToOtherHospital->checkBoxListHtml(FALSE, "x_AdviceToOtherHospital[]") ?>
</div></div>
</span></script>
<?php echo $view_ip_patient_admission_add->AdviceToOtherHospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_add->Reason->Visible) { // Reason ?>
	<div id="r_Reason" class="form-group row">
		<label id="elh_view_ip_patient_admission_Reason" for="x_Reason" class="<?php echo $view_ip_patient_admission_add->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_Reason" type="text/html"><?php echo $view_ip_patient_admission_add->Reason->caption() ?><?php echo $view_ip_patient_admission_add->Reason->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_patient_admission_add->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_add->Reason->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Reason" type="text/html"><span id="el_view_ip_patient_admission_Reason">
<textarea data-table="view_ip_patient_admission" data-field="x_Reason" name="x_Reason" id="x_Reason" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_add->Reason->getPlaceHolder()) ?>"<?php echo $view_ip_patient_admission_add->Reason->editAttributes() ?>><?php echo $view_ip_patient_admission_add->Reason->EditValue ?></textarea>
</span></script>
<?php echo $view_ip_patient_admission_add->Reason->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_ip_patient_admissionadd" class="ew-custom-template"></div>
<script id="tpm_view_ip_patient_admissionadd" type="text/html">
<div id="ct_view_ip_patient_admission_add"><style>
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
	<span hidden class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_profilePic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_profilePic")/}}</span>
	<span hidden class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_Consultant"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_Consultant")/}}</span>
<div class="row">
	<div class="col-12">
		<table style="width:100%">
			<tr>
				<td>{{include tmpl="#tpc_view_ip_patient_admission_patient_id"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_patient_id")/}}</td>
				<td></td>
 			</tr>
 		</table>
	</div>
</div>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_PatientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_PatientID")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_patient_name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_patient_name")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_gender")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_age")/}}</span>
				  </div>
				   <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_DOB"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_DOB")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_mobileno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_mobileno")/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_mrnNo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_mrnNo")/}}</span>
				  </div>
				 <div class="ew-row">
					<img id="patientPropic" src=""  height="100" width="100">
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_PartnerID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_PartnerID")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_PartnerName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_PartnerName")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_PartnerMobile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_PartnerMobile")/}}</span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
	  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_ReportHeader"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_ReportHeader")/}}</span>
	</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#C71585">
				<h3 class="card-title">Patient Admission Details</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_admission_date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_admission_date")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_physician_id"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_physician_id")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_Anesthetist"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_Anesthetist")/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_release_date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_release_date")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_Procedure"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_Procedure")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_Amound"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_Amound")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_IDProof"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_IDProof")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_typeRegsisteration"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_typeRegsisteration")/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_PaymentCategory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_PaymentCategory")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_PaymentStatus"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_PaymentStatus")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_ReferedByDr"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_ReferedByDr")/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_ReferClinicname"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_ReferClinicname")/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_ReferMobileNo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_ReferMobileNo")/}}</span>
				  </div>
				<div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_ReferCity"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_ReferCity")/}}</span>
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
			<div class="card-header"  style="background-color:#7e0420">
				<h3 class="card-title">Clinical Summary.</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-3">
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_AdviceToOtherHospital"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_AdviceToOtherHospital")/}}</span>
				  </div>
				</div>
				<div id="AdviceToOtherHospitalReason" class="col-9">
				  <div  class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_Reason"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_patient_admission_Reason")/}}</span>
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

<?php if (!$view_ip_patient_admission_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_ip_patient_admission_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_ip_patient_admission_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_ip_patient_admission->Rows) ?> };
	ew.applyTemplate("tpd_view_ip_patient_admissionadd", "tpm_view_ip_patient_admissionadd", "view_ip_patient_admissionadd", "<?php echo $view_ip_patient_admission->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_ip_patient_admissionadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_ip_patient_admission_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	document.getElementById("x_Amound").style.width="150px",document.getElementById("AdviceToOtherHospitalReason").style.display="none";
});
</script>
<?php include_once "footer.php"; ?>
<?php
$view_ip_patient_admission_add->terminate();
?>