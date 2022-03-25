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
$view_ip_patient_admission_edit = new view_ip_patient_admission_edit();

// Run the page
$view_ip_patient_admission_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_patient_admission_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_ip_patient_admissionedit = currentForm = new ew.Form("fview_ip_patient_admissionedit", "edit");

// Validate form
fview_ip_patient_admissionedit.validate = function() {
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
		<?php if ($view_ip_patient_admission_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->id->caption(), $view_ip_patient_admission->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->mrnNo->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->mrnNo->caption(), $view_ip_patient_admission->mrnNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->PatientID->caption(), $view_ip_patient_admission->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->patient_name->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->patient_name->caption(), $view_ip_patient_admission->patient_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->mobileno->Required) { ?>
			elm = this.getElements("x" + infix + "_mobileno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->mobileno->caption(), $view_ip_patient_admission->mobileno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->profilePic->caption(), $view_ip_patient_admission->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->gender->Required) { ?>
			elm = this.getElements("x" + infix + "_gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->gender->caption(), $view_ip_patient_admission->gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->age->Required) { ?>
			elm = this.getElements("x" + infix + "_age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->age->caption(), $view_ip_patient_admission->age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->Package->Required) { ?>
			elm = this.getElements("x" + infix + "_Package");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->Package->caption(), $view_ip_patient_admission->Package->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->typeRegsisteration->Required) { ?>
			elm = this.getElements("x" + infix + "_typeRegsisteration");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->typeRegsisteration->caption(), $view_ip_patient_admission->typeRegsisteration->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->PaymentCategory->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentCategory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->PaymentCategory->caption(), $view_ip_patient_admission->PaymentCategory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->admission_consultant_id->Required) { ?>
			elm = this.getElements("x" + infix + "_admission_consultant_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->admission_consultant_id->caption(), $view_ip_patient_admission->admission_consultant_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_admission_consultant_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->admission_consultant_id->errorMessage()) ?>");
		<?php if ($view_ip_patient_admission_edit->leading_consultant_id->Required) { ?>
			elm = this.getElements("x" + infix + "_leading_consultant_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->leading_consultant_id->caption(), $view_ip_patient_admission->leading_consultant_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_leading_consultant_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->leading_consultant_id->errorMessage()) ?>");
		<?php if ($view_ip_patient_admission_edit->cause->Required) { ?>
			elm = this.getElements("x" + infix + "_cause");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->cause->caption(), $view_ip_patient_admission->cause->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->admission_date->Required) { ?>
			elm = this.getElements("x" + infix + "_admission_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->admission_date->caption(), $view_ip_patient_admission->admission_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_admission_date");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->admission_date->errorMessage()) ?>");
		<?php if ($view_ip_patient_admission_edit->release_date->Required) { ?>
			elm = this.getElements("x" + infix + "_release_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->release_date->caption(), $view_ip_patient_admission->release_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_release_date");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->release_date->errorMessage()) ?>");
		<?php if ($view_ip_patient_admission_edit->PaymentStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->PaymentStatus->caption(), $view_ip_patient_admission->PaymentStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->status->caption(), $view_ip_patient_admission->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->status->errorMessage()) ?>");
		<?php if ($view_ip_patient_admission_edit->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->createdby->caption(), $view_ip_patient_admission->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->createddatetime->caption(), $view_ip_patient_admission->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->modifiedby->caption(), $view_ip_patient_admission->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->modifieddatetime->caption(), $view_ip_patient_admission->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->HospID->caption(), $view_ip_patient_admission->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->ReferedByDr->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferedByDr");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->ReferedByDr->caption(), $view_ip_patient_admission->ReferedByDr->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->ReferClinicname->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferClinicname");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->ReferClinicname->caption(), $view_ip_patient_admission->ReferClinicname->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->ReferCity->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferCity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->ReferCity->caption(), $view_ip_patient_admission->ReferCity->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->ReferMobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferMobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->ReferMobileNo->caption(), $view_ip_patient_admission->ReferMobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->ReferA4TreatingConsultant->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferA4TreatingConsultant");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->ReferA4TreatingConsultant->caption(), $view_ip_patient_admission->ReferA4TreatingConsultant->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->PurposreReferredfor->Required) { ?>
			elm = this.getElements("x" + infix + "_PurposreReferredfor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->PurposreReferredfor->caption(), $view_ip_patient_admission->PurposreReferredfor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->BillClosing->Required) { ?>
			elm = this.getElements("x" + infix + "_BillClosing[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->BillClosing->caption(), $view_ip_patient_admission->BillClosing->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->BillClosingDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillClosingDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->BillClosingDate->caption(), $view_ip_patient_admission->BillClosingDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillClosingDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->BillClosingDate->errorMessage()) ?>");
		<?php if ($view_ip_patient_admission_edit->BillNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_BillNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->BillNumber->caption(), $view_ip_patient_admission->BillNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->ClosingAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_ClosingAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->ClosingAmount->caption(), $view_ip_patient_admission->ClosingAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->ClosingType->Required) { ?>
			elm = this.getElements("x" + infix + "_ClosingType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->ClosingType->caption(), $view_ip_patient_admission->ClosingType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->BillAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_BillAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->BillAmount->caption(), $view_ip_patient_admission->BillAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->billclosedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_billclosedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->billclosedBy->caption(), $view_ip_patient_admission->billclosedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->bllcloseByDate->Required) { ?>
			elm = this.getElements("x" + infix + "_bllcloseByDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->bllcloseByDate->caption(), $view_ip_patient_admission->bllcloseByDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bllcloseByDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->bllcloseByDate->errorMessage()) ?>");
		<?php if ($view_ip_patient_admission_edit->ReportHeader->Required) { ?>
			elm = this.getElements("x" + infix + "_ReportHeader[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->ReportHeader->caption(), $view_ip_patient_admission->ReportHeader->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->Procedure->Required) { ?>
			elm = this.getElements("x" + infix + "_Procedure");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->Procedure->caption(), $view_ip_patient_admission->Procedure->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->Consultant->Required) { ?>
			elm = this.getElements("x" + infix + "_Consultant");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->Consultant->caption(), $view_ip_patient_admission->Consultant->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->Anesthetist->Required) { ?>
			elm = this.getElements("x" + infix + "_Anesthetist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->Anesthetist->caption(), $view_ip_patient_admission->Anesthetist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->Amound->Required) { ?>
			elm = this.getElements("x" + infix + "_Amound");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->Amound->caption(), $view_ip_patient_admission->Amound->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amound");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->Amound->errorMessage()) ?>");
		<?php if ($view_ip_patient_admission_edit->physician_id->Required) { ?>
			elm = this.getElements("x" + infix + "_physician_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->physician_id->caption(), $view_ip_patient_admission->physician_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->PartnerID->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->PartnerID->caption(), $view_ip_patient_admission->PartnerID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->PartnerName->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->PartnerName->caption(), $view_ip_patient_admission->PartnerName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->PartnerMobile->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerMobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->PartnerMobile->caption(), $view_ip_patient_admission->PartnerMobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->patient_id->caption(), $view_ip_patient_admission->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->Cid->Required) { ?>
			elm = this.getElements("x" + infix + "_Cid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->Cid->caption(), $view_ip_patient_admission->Cid->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->PartId->Required) { ?>
			elm = this.getElements("x" + infix + "_PartId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->PartId->caption(), $view_ip_patient_admission->PartId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PartId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->PartId->errorMessage()) ?>");
		<?php if ($view_ip_patient_admission_edit->IDProof->Required) { ?>
			elm = this.getElements("x" + infix + "_IDProof");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->IDProof->caption(), $view_ip_patient_admission->IDProof->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->DOB->Required) { ?>
			elm = this.getElements("x" + infix + "_DOB");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->DOB->caption(), $view_ip_patient_admission->DOB->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->AdviceToOtherHospital->Required) { ?>
			elm = this.getElements("x" + infix + "_AdviceToOtherHospital[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->AdviceToOtherHospital->caption(), $view_ip_patient_admission->AdviceToOtherHospital->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_patient_admission_edit->Reason->Required) { ?>
			elm = this.getElements("x" + infix + "_Reason");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_patient_admission->Reason->caption(), $view_ip_patient_admission->Reason->RequiredErrorMessage)) ?>");
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
fview_ip_patient_admissionedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_patient_admissionedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ip_patient_admissionedit.lists["x_typeRegsisteration"] = <?php echo $view_ip_patient_admission_edit->typeRegsisteration->Lookup->toClientList() ?>;
fview_ip_patient_admissionedit.lists["x_typeRegsisteration"].options = <?php echo JsonEncode($view_ip_patient_admission_edit->typeRegsisteration->lookupOptions()) ?>;
fview_ip_patient_admissionedit.lists["x_PaymentCategory"] = <?php echo $view_ip_patient_admission_edit->PaymentCategory->Lookup->toClientList() ?>;
fview_ip_patient_admissionedit.lists["x_PaymentCategory"].options = <?php echo JsonEncode($view_ip_patient_admission_edit->PaymentCategory->lookupOptions()) ?>;
fview_ip_patient_admissionedit.lists["x_PaymentStatus"] = <?php echo $view_ip_patient_admission_edit->PaymentStatus->Lookup->toClientList() ?>;
fview_ip_patient_admissionedit.lists["x_PaymentStatus"].options = <?php echo JsonEncode($view_ip_patient_admission_edit->PaymentStatus->lookupOptions()) ?>;
fview_ip_patient_admissionedit.lists["x_HospID"] = <?php echo $view_ip_patient_admission_edit->HospID->Lookup->toClientList() ?>;
fview_ip_patient_admissionedit.lists["x_HospID"].options = <?php echo JsonEncode($view_ip_patient_admission_edit->HospID->lookupOptions()) ?>;
fview_ip_patient_admissionedit.lists["x_ReferedByDr"] = <?php echo $view_ip_patient_admission_edit->ReferedByDr->Lookup->toClientList() ?>;
fview_ip_patient_admissionedit.lists["x_ReferedByDr"].options = <?php echo JsonEncode($view_ip_patient_admission_edit->ReferedByDr->lookupOptions()) ?>;
fview_ip_patient_admissionedit.lists["x_BillClosing[]"] = <?php echo $view_ip_patient_admission_edit->BillClosing->Lookup->toClientList() ?>;
fview_ip_patient_admissionedit.lists["x_BillClosing[]"].options = <?php echo JsonEncode($view_ip_patient_admission_edit->BillClosing->options(FALSE, TRUE)) ?>;
fview_ip_patient_admissionedit.lists["x_ReportHeader[]"] = <?php echo $view_ip_patient_admission_edit->ReportHeader->Lookup->toClientList() ?>;
fview_ip_patient_admissionedit.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_ip_patient_admission_edit->ReportHeader->options(FALSE, TRUE)) ?>;
fview_ip_patient_admissionedit.lists["x_Procedure"] = <?php echo $view_ip_patient_admission_edit->Procedure->Lookup->toClientList() ?>;
fview_ip_patient_admissionedit.lists["x_Procedure"].options = <?php echo JsonEncode($view_ip_patient_admission_edit->Procedure->lookupOptions()) ?>;
fview_ip_patient_admissionedit.lists["x_Consultant"] = <?php echo $view_ip_patient_admission_edit->Consultant->Lookup->toClientList() ?>;
fview_ip_patient_admissionedit.lists["x_Consultant"].options = <?php echo JsonEncode($view_ip_patient_admission_edit->Consultant->lookupOptions()) ?>;
fview_ip_patient_admissionedit.lists["x_Anesthetist"] = <?php echo $view_ip_patient_admission_edit->Anesthetist->Lookup->toClientList() ?>;
fview_ip_patient_admissionedit.lists["x_Anesthetist"].options = <?php echo JsonEncode($view_ip_patient_admission_edit->Anesthetist->lookupOptions()) ?>;
fview_ip_patient_admissionedit.lists["x_physician_id"] = <?php echo $view_ip_patient_admission_edit->physician_id->Lookup->toClientList() ?>;
fview_ip_patient_admissionedit.lists["x_physician_id"].options = <?php echo JsonEncode($view_ip_patient_admission_edit->physician_id->lookupOptions()) ?>;
fview_ip_patient_admissionedit.lists["x_patient_id"] = <?php echo $view_ip_patient_admission_edit->patient_id->Lookup->toClientList() ?>;
fview_ip_patient_admissionedit.lists["x_patient_id"].options = <?php echo JsonEncode($view_ip_patient_admission_edit->patient_id->lookupOptions()) ?>;
fview_ip_patient_admissionedit.lists["x_Cid"] = <?php echo $view_ip_patient_admission_edit->Cid->Lookup->toClientList() ?>;
fview_ip_patient_admissionedit.lists["x_Cid"].options = <?php echo JsonEncode($view_ip_patient_admission_edit->Cid->lookupOptions()) ?>;
fview_ip_patient_admissionedit.lists["x_AdviceToOtherHospital[]"] = <?php echo $view_ip_patient_admission_edit->AdviceToOtherHospital->Lookup->toClientList() ?>;
fview_ip_patient_admissionedit.lists["x_AdviceToOtherHospital[]"].options = <?php echo JsonEncode($view_ip_patient_admission_edit->AdviceToOtherHospital->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_ip_patient_admission_edit->showPageHeader(); ?>
<?php
$view_ip_patient_admission_edit->showMessage();
?>
<form name="fview_ip_patient_admissionedit" id="fview_ip_patient_admissionedit" class="<?php echo $view_ip_patient_admission_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_patient_admission_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_patient_admission_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_patient_admission">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_patient_admission_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($view_ip_patient_admission->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_ip_patient_admission_id" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_id" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->id->caption() ?><?php echo ($view_ip_patient_admission->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_id" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_id">
<span<?php echo $view_ip_patient_admission->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_patient_admission->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_ip_patient_admission->id->CurrentValue) ?>">
<?php echo $view_ip_patient_admission->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->mrnNo->Visible) { // mrnNo ?>
	<div id="r_mrnNo" class="form-group row">
		<label id="elh_view_ip_patient_admission_mrnNo" for="x_mrnNo" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_mrnNo" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->mrnNo->caption() ?><?php echo ($view_ip_patient_admission->mrnNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->mrnNo->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_mrnNo" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_mrnNo">
<input type="text" data-table="view_ip_patient_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->mrnNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->mrnNo->EditValue ?>"<?php echo $view_ip_patient_admission->mrnNo->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->mrnNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_view_ip_patient_admission_PatientID" for="x_PatientID" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_PatientID" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->PatientID->caption() ?><?php echo ($view_ip_patient_admission->PatientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->PatientID->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PatientID" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_PatientID">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->PatientID->EditValue ?>"<?php echo $view_ip_patient_admission->PatientID->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->patient_name->Visible) { // patient_name ?>
	<div id="r_patient_name" class="form-group row">
		<label id="elh_view_ip_patient_admission_patient_name" for="x_patient_name" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_patient_name" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->patient_name->caption() ?><?php echo ($view_ip_patient_admission->patient_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->patient_name->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_patient_name" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_patient_name">
<input type="text" data-table="view_ip_patient_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->patient_name->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->patient_name->EditValue ?>"<?php echo $view_ip_patient_admission->patient_name->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->patient_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->mobileno->Visible) { // mobileno ?>
	<div id="r_mobileno" class="form-group row">
		<label id="elh_view_ip_patient_admission_mobileno" for="x_mobileno" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_mobileno" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->mobileno->caption() ?><?php echo ($view_ip_patient_admission->mobileno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->mobileno->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_mobileno" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_mobileno">
<input type="text" data-table="view_ip_patient_admission" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->mobileno->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->mobileno->EditValue ?>"<?php echo $view_ip_patient_admission->mobileno->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->mobileno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_view_ip_patient_admission_profilePic" for="x_profilePic" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_profilePic" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->profilePic->caption() ?><?php echo ($view_ip_patient_admission->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->profilePic->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_profilePic" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_profilePic">
<input type="text" data-table="view_ip_patient_admission" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->profilePic->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->profilePic->EditValue ?>"<?php echo $view_ip_patient_admission->profilePic->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_view_ip_patient_admission_gender" for="x_gender" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_gender" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->gender->caption() ?><?php echo ($view_ip_patient_admission->gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->gender->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_gender" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_gender">
<input type="text" data-table="view_ip_patient_admission" data-field="x_gender" name="x_gender" id="x_gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->gender->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->gender->EditValue ?>"<?php echo $view_ip_patient_admission->gender->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->age->Visible) { // age ?>
	<div id="r_age" class="form-group row">
		<label id="elh_view_ip_patient_admission_age" for="x_age" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_age" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->age->caption() ?><?php echo ($view_ip_patient_admission->age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->age->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_age" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_age">
<input type="text" data-table="view_ip_patient_admission" data-field="x_age" name="x_age" id="x_age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->age->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->age->EditValue ?>"<?php echo $view_ip_patient_admission->age->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->Package->Visible) { // Package ?>
	<div id="r_Package" class="form-group row">
		<label id="elh_view_ip_patient_admission_Package" for="x_Package" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_Package" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->Package->caption() ?><?php echo ($view_ip_patient_admission->Package->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->Package->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Package" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_Package">
<input type="text" data-table="view_ip_patient_admission" data-field="x_Package" name="x_Package" id="x_Package" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->Package->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->Package->EditValue ?>"<?php echo $view_ip_patient_admission->Package->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->Package->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<div id="r_typeRegsisteration" class="form-group row">
		<label id="elh_view_ip_patient_admission_typeRegsisteration" for="x_typeRegsisteration" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_typeRegsisteration" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->typeRegsisteration->caption() ?><?php echo ($view_ip_patient_admission->typeRegsisteration->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->typeRegsisteration->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_typeRegsisteration" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_typeRegsisteration">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_typeRegsisteration" data-value-separator="<?php echo $view_ip_patient_admission->typeRegsisteration->displayValueSeparatorAttribute() ?>" id="x_typeRegsisteration" name="x_typeRegsisteration"<?php echo $view_ip_patient_admission->typeRegsisteration->editAttributes() ?>>
		<?php echo $view_ip_patient_admission->typeRegsisteration->selectOptionListHtml("x_typeRegsisteration") ?>
	</select>
</div>
<?php echo $view_ip_patient_admission->typeRegsisteration->Lookup->getParamTag("p_x_typeRegsisteration") ?>
</span>
</script>
<?php echo $view_ip_patient_admission->typeRegsisteration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PaymentCategory->Visible) { // PaymentCategory ?>
	<div id="r_PaymentCategory" class="form-group row">
		<label id="elh_view_ip_patient_admission_PaymentCategory" for="x_PaymentCategory" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_PaymentCategory" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->PaymentCategory->caption() ?><?php echo ($view_ip_patient_admission->PaymentCategory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->PaymentCategory->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PaymentCategory" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_PaymentCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_PaymentCategory" data-value-separator="<?php echo $view_ip_patient_admission->PaymentCategory->displayValueSeparatorAttribute() ?>" id="x_PaymentCategory" name="x_PaymentCategory"<?php echo $view_ip_patient_admission->PaymentCategory->editAttributes() ?>>
		<?php echo $view_ip_patient_admission->PaymentCategory->selectOptionListHtml("x_PaymentCategory") ?>
	</select>
</div>
<?php echo $view_ip_patient_admission->PaymentCategory->Lookup->getParamTag("p_x_PaymentCategory") ?>
</span>
</script>
<?php echo $view_ip_patient_admission->PaymentCategory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<div id="r_admission_consultant_id" class="form-group row">
		<label id="elh_view_ip_patient_admission_admission_consultant_id" for="x_admission_consultant_id" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_admission_consultant_id" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->admission_consultant_id->caption() ?><?php echo ($view_ip_patient_admission->admission_consultant_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->admission_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_admission_consultant_id" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_admission_consultant_id">
<input type="text" data-table="view_ip_patient_admission" data-field="x_admission_consultant_id" name="x_admission_consultant_id" id="x_admission_consultant_id" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->admission_consultant_id->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->admission_consultant_id->EditValue ?>"<?php echo $view_ip_patient_admission->admission_consultant_id->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->admission_consultant_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<div id="r_leading_consultant_id" class="form-group row">
		<label id="elh_view_ip_patient_admission_leading_consultant_id" for="x_leading_consultant_id" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_leading_consultant_id" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->leading_consultant_id->caption() ?><?php echo ($view_ip_patient_admission->leading_consultant_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->leading_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_leading_consultant_id" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_leading_consultant_id">
<input type="text" data-table="view_ip_patient_admission" data-field="x_leading_consultant_id" name="x_leading_consultant_id" id="x_leading_consultant_id" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->leading_consultant_id->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->leading_consultant_id->EditValue ?>"<?php echo $view_ip_patient_admission->leading_consultant_id->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->leading_consultant_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->cause->Visible) { // cause ?>
	<div id="r_cause" class="form-group row">
		<label id="elh_view_ip_patient_admission_cause" for="x_cause" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_cause" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->cause->caption() ?><?php echo ($view_ip_patient_admission->cause->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->cause->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_cause" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_cause">
<textarea data-table="view_ip_patient_admission" data-field="x_cause" name="x_cause" id="x_cause" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->cause->getPlaceHolder()) ?>"<?php echo $view_ip_patient_admission->cause->editAttributes() ?>><?php echo $view_ip_patient_admission->cause->EditValue ?></textarea>
</span>
</script>
<?php echo $view_ip_patient_admission->cause->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->admission_date->Visible) { // admission_date ?>
	<div id="r_admission_date" class="form-group row">
		<label id="elh_view_ip_patient_admission_admission_date" for="x_admission_date" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_admission_date" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->admission_date->caption() ?><?php echo ($view_ip_patient_admission->admission_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->admission_date->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_admission_date" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_admission_date">
<input type="text" data-table="view_ip_patient_admission" data-field="x_admission_date" data-format="11" name="x_admission_date" id="x_admission_date" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->admission_date->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->admission_date->EditValue ?>"<?php echo $view_ip_patient_admission->admission_date->editAttributes() ?>>
<?php if (!$view_ip_patient_admission->admission_date->ReadOnly && !$view_ip_patient_admission->admission_date->Disabled && !isset($view_ip_patient_admission->admission_date->EditAttrs["readonly"]) && !isset($view_ip_patient_admission->admission_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_ip_patient_admissionedit_js">
ew.createDateTimePicker("fview_ip_patient_admissionedit", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $view_ip_patient_admission->admission_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->release_date->Visible) { // release_date ?>
	<div id="r_release_date" class="form-group row">
		<label id="elh_view_ip_patient_admission_release_date" for="x_release_date" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_release_date" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->release_date->caption() ?><?php echo ($view_ip_patient_admission->release_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->release_date->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_release_date" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_release_date">
<input type="text" data-table="view_ip_patient_admission" data-field="x_release_date" data-format="11" name="x_release_date" id="x_release_date" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->release_date->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->release_date->EditValue ?>"<?php echo $view_ip_patient_admission->release_date->editAttributes() ?>>
<?php if (!$view_ip_patient_admission->release_date->ReadOnly && !$view_ip_patient_admission->release_date->Disabled && !isset($view_ip_patient_admission->release_date->EditAttrs["readonly"]) && !isset($view_ip_patient_admission->release_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_ip_patient_admissionedit_js">
ew.createDateTimePicker("fview_ip_patient_admissionedit", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $view_ip_patient_admission->release_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PaymentStatus->Visible) { // PaymentStatus ?>
	<div id="r_PaymentStatus" class="form-group row">
		<label id="elh_view_ip_patient_admission_PaymentStatus" for="x_PaymentStatus" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_PaymentStatus" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->PaymentStatus->caption() ?><?php echo ($view_ip_patient_admission->PaymentStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->PaymentStatus->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PaymentStatus" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_PaymentStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_PaymentStatus" data-value-separator="<?php echo $view_ip_patient_admission->PaymentStatus->displayValueSeparatorAttribute() ?>" id="x_PaymentStatus" name="x_PaymentStatus"<?php echo $view_ip_patient_admission->PaymentStatus->editAttributes() ?>>
		<?php echo $view_ip_patient_admission->PaymentStatus->selectOptionListHtml("x_PaymentStatus") ?>
	</select>
</div>
<?php echo $view_ip_patient_admission->PaymentStatus->Lookup->getParamTag("p_x_PaymentStatus") ?>
</span>
</script>
<?php echo $view_ip_patient_admission->PaymentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_view_ip_patient_admission_status" for="x_status" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_status" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->status->caption() ?><?php echo ($view_ip_patient_admission->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->status->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_status" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_status">
<input type="text" data-table="view_ip_patient_admission" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->status->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->status->EditValue ?>"<?php echo $view_ip_patient_admission->status->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferedByDr->Visible) { // ReferedByDr ?>
	<div id="r_ReferedByDr" class="form-group row">
		<label id="elh_view_ip_patient_admission_ReferedByDr" for="x_ReferedByDr" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_ReferedByDr" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->ReferedByDr->caption() ?><?php echo ($view_ip_patient_admission->ReferedByDr->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->ReferedByDr->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferedByDr" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_ReferedByDr">
<?php $view_ip_patient_admission->ReferedByDr->EditAttrs["onchange"] = "ew.autoFill(this);" . @$view_ip_patient_admission->ReferedByDr->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferedByDr"><?php echo strval($view_ip_patient_admission->ReferedByDr->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_ip_patient_admission->ReferedByDr->ViewValue) : $view_ip_patient_admission->ReferedByDr->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission->ReferedByDr->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_ip_patient_admission->ReferedByDr->ReadOnly || $view_ip_patient_admission->ReferedByDr->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferedByDr',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$view_ip_patient_admission->ReferedByDr->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferedByDr" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_ip_patient_admission->ReferedByDr->caption() ?>" data-title="<?php echo $view_ip_patient_admission->ReferedByDr->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferedByDr',url:'mas_reference_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $view_ip_patient_admission->ReferedByDr->Lookup->getParamTag("p_x_ReferedByDr") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_ReferedByDr" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission->ReferedByDr->displayValueSeparatorAttribute() ?>" name="x_ReferedByDr" id="x_ReferedByDr" value="<?php echo $view_ip_patient_admission->ReferedByDr->CurrentValue ?>"<?php echo $view_ip_patient_admission->ReferedByDr->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->ReferedByDr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label id="elh_view_ip_patient_admission_ReferClinicname" for="x_ReferClinicname" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_ReferClinicname" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->ReferClinicname->caption() ?><?php echo ($view_ip_patient_admission->ReferClinicname->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->ReferClinicname->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferClinicname" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_ReferClinicname">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->ReferClinicname->EditValue ?>"<?php echo $view_ip_patient_admission->ReferClinicname->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->ReferClinicname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label id="elh_view_ip_patient_admission_ReferCity" for="x_ReferCity" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_ReferCity" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->ReferCity->caption() ?><?php echo ($view_ip_patient_admission->ReferCity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->ReferCity->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferCity" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_ReferCity">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->ReferCity->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->ReferCity->EditValue ?>"<?php echo $view_ip_patient_admission->ReferCity->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->ReferCity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label id="elh_view_ip_patient_admission_ReferMobileNo" for="x_ReferMobileNo" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_ReferMobileNo" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->ReferMobileNo->caption() ?><?php echo ($view_ip_patient_admission->ReferMobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferMobileNo" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_ReferMobileNo">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->ReferMobileNo->EditValue ?>"<?php echo $view_ip_patient_admission->ReferMobileNo->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->ReferMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div id="r_ReferA4TreatingConsultant" class="form-group row">
		<label id="elh_view_ip_patient_admission_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_ReferA4TreatingConsultant" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->ReferA4TreatingConsultant->caption() ?><?php echo ($view_ip_patient_admission->ReferA4TreatingConsultant->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferA4TreatingConsultant" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_ReferA4TreatingConsultant">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ReferA4TreatingConsultant" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->ReferA4TreatingConsultant->EditValue ?>"<?php echo $view_ip_patient_admission->ReferA4TreatingConsultant->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->ReferA4TreatingConsultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div id="r_PurposreReferredfor" class="form-group row">
		<label id="elh_view_ip_patient_admission_PurposreReferredfor" for="x_PurposreReferredfor" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_PurposreReferredfor" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->PurposreReferredfor->caption() ?><?php echo ($view_ip_patient_admission->PurposreReferredfor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PurposreReferredfor" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_PurposreReferredfor">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->PurposreReferredfor->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->PurposreReferredfor->EditValue ?>"<?php echo $view_ip_patient_admission->PurposreReferredfor->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->PurposreReferredfor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->BillClosing->Visible) { // BillClosing ?>
	<div id="r_BillClosing" class="form-group row">
		<label id="elh_view_ip_patient_admission_BillClosing" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_BillClosing" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->BillClosing->caption() ?><?php echo ($view_ip_patient_admission->BillClosing->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->BillClosing->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_BillClosing" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_BillClosing">
<div id="tp_x_BillClosing" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_ip_patient_admission" data-field="x_BillClosing" data-value-separator="<?php echo $view_ip_patient_admission->BillClosing->displayValueSeparatorAttribute() ?>" name="x_BillClosing[]" id="x_BillClosing[]" value="{value}"<?php echo $view_ip_patient_admission->BillClosing->editAttributes() ?>></div>
<div id="dsl_x_BillClosing" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ip_patient_admission->BillClosing->checkBoxListHtml(FALSE, "x_BillClosing[]") ?>
</div></div>
</span>
</script>
<?php echo $view_ip_patient_admission->BillClosing->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->BillClosingDate->Visible) { // BillClosingDate ?>
	<div id="r_BillClosingDate" class="form-group row">
		<label id="elh_view_ip_patient_admission_BillClosingDate" for="x_BillClosingDate" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_BillClosingDate" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->BillClosingDate->caption() ?><?php echo ($view_ip_patient_admission->BillClosingDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->BillClosingDate->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_BillClosingDate" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_BillClosingDate">
<input type="text" data-table="view_ip_patient_admission" data-field="x_BillClosingDate" name="x_BillClosingDate" id="x_BillClosingDate" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->BillClosingDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->BillClosingDate->EditValue ?>"<?php echo $view_ip_patient_admission->BillClosingDate->editAttributes() ?>>
<?php if (!$view_ip_patient_admission->BillClosingDate->ReadOnly && !$view_ip_patient_admission->BillClosingDate->Disabled && !isset($view_ip_patient_admission->BillClosingDate->EditAttrs["readonly"]) && !isset($view_ip_patient_admission->BillClosingDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_ip_patient_admissionedit_js">
ew.createDateTimePicker("fview_ip_patient_admissionedit", "x_BillClosingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_ip_patient_admission->BillClosingDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_view_ip_patient_admission_BillNumber" for="x_BillNumber" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_BillNumber" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->BillNumber->caption() ?><?php echo ($view_ip_patient_admission->BillNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->BillNumber->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_BillNumber" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_BillNumber">
<input type="text" data-table="view_ip_patient_admission" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->BillNumber->EditValue ?>"<?php echo $view_ip_patient_admission->BillNumber->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->ClosingAmount->Visible) { // ClosingAmount ?>
	<div id="r_ClosingAmount" class="form-group row">
		<label id="elh_view_ip_patient_admission_ClosingAmount" for="x_ClosingAmount" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_ClosingAmount" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->ClosingAmount->caption() ?><?php echo ($view_ip_patient_admission->ClosingAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->ClosingAmount->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ClosingAmount" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_ClosingAmount">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ClosingAmount" name="x_ClosingAmount" id="x_ClosingAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->ClosingAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->ClosingAmount->EditValue ?>"<?php echo $view_ip_patient_admission->ClosingAmount->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->ClosingAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->ClosingType->Visible) { // ClosingType ?>
	<div id="r_ClosingType" class="form-group row">
		<label id="elh_view_ip_patient_admission_ClosingType" for="x_ClosingType" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_ClosingType" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->ClosingType->caption() ?><?php echo ($view_ip_patient_admission->ClosingType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->ClosingType->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ClosingType" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_ClosingType">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ClosingType" name="x_ClosingType" id="x_ClosingType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->ClosingType->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->ClosingType->EditValue ?>"<?php echo $view_ip_patient_admission->ClosingType->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->ClosingType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->BillAmount->Visible) { // BillAmount ?>
	<div id="r_BillAmount" class="form-group row">
		<label id="elh_view_ip_patient_admission_BillAmount" for="x_BillAmount" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_BillAmount" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->BillAmount->caption() ?><?php echo ($view_ip_patient_admission->BillAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->BillAmount->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_BillAmount" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_BillAmount">
<input type="text" data-table="view_ip_patient_admission" data-field="x_BillAmount" name="x_BillAmount" id="x_BillAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->BillAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->BillAmount->EditValue ?>"<?php echo $view_ip_patient_admission->BillAmount->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->BillAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->billclosedBy->Visible) { // billclosedBy ?>
	<div id="r_billclosedBy" class="form-group row">
		<label id="elh_view_ip_patient_admission_billclosedBy" for="x_billclosedBy" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_billclosedBy" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->billclosedBy->caption() ?><?php echo ($view_ip_patient_admission->billclosedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->billclosedBy->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_billclosedBy" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_billclosedBy">
<input type="text" data-table="view_ip_patient_admission" data-field="x_billclosedBy" name="x_billclosedBy" id="x_billclosedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->billclosedBy->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->billclosedBy->EditValue ?>"<?php echo $view_ip_patient_admission->billclosedBy->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->billclosedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<div id="r_bllcloseByDate" class="form-group row">
		<label id="elh_view_ip_patient_admission_bllcloseByDate" for="x_bllcloseByDate" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_bllcloseByDate" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->bllcloseByDate->caption() ?><?php echo ($view_ip_patient_admission->bllcloseByDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->bllcloseByDate->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_bllcloseByDate" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_bllcloseByDate">
<input type="text" data-table="view_ip_patient_admission" data-field="x_bllcloseByDate" name="x_bllcloseByDate" id="x_bllcloseByDate" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->bllcloseByDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->bllcloseByDate->EditValue ?>"<?php echo $view_ip_patient_admission->bllcloseByDate->editAttributes() ?>>
<?php if (!$view_ip_patient_admission->bllcloseByDate->ReadOnly && !$view_ip_patient_admission->bllcloseByDate->Disabled && !isset($view_ip_patient_admission->bllcloseByDate->EditAttrs["readonly"]) && !isset($view_ip_patient_admission->bllcloseByDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_ip_patient_admissionedit_js">
ew.createDateTimePicker("fview_ip_patient_admissionedit", "x_bllcloseByDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_ip_patient_admission->bllcloseByDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_view_ip_patient_admission_ReportHeader" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_ReportHeader" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->ReportHeader->caption() ?><?php echo ($view_ip_patient_admission->ReportHeader->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReportHeader" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_ReportHeader">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_ip_patient_admission" data-field="x_ReportHeader" data-value-separator="<?php echo $view_ip_patient_admission->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $view_ip_patient_admission->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ip_patient_admission->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span>
</script>
<?php echo $view_ip_patient_admission->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label id="elh_view_ip_patient_admission_Procedure" for="x_Procedure" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_Procedure" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->Procedure->caption() ?><?php echo ($view_ip_patient_admission->Procedure->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->Procedure->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Procedure" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_Procedure">
<?php $view_ip_patient_admission->Procedure->EditAttrs["onchange"] = "ew.autoFill(this);" . @$view_ip_patient_admission->Procedure->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Procedure"><?php echo strval($view_ip_patient_admission->Procedure->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_ip_patient_admission->Procedure->ViewValue) : $view_ip_patient_admission->Procedure->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission->Procedure->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_ip_patient_admission->Procedure->ReadOnly || $view_ip_patient_admission->Procedure->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Procedure',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission->Procedure->Lookup->getParamTag("p_x_Procedure") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_Procedure" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission->Procedure->displayValueSeparatorAttribute() ?>" name="x_Procedure" id="x_Procedure" value="<?php echo $view_ip_patient_admission->Procedure->CurrentValue ?>"<?php echo $view_ip_patient_admission->Procedure->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->Procedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->Consultant->Visible) { // Consultant ?>
	<div id="r_Consultant" class="form-group row">
		<label id="elh_view_ip_patient_admission_Consultant" for="x_Consultant" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_Consultant" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->Consultant->caption() ?><?php echo ($view_ip_patient_admission->Consultant->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->Consultant->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Consultant" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_Consultant">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_Consultant" data-value-separator="<?php echo $view_ip_patient_admission->Consultant->displayValueSeparatorAttribute() ?>" id="x_Consultant" name="x_Consultant"<?php echo $view_ip_patient_admission->Consultant->editAttributes() ?>>
		<?php echo $view_ip_patient_admission->Consultant->selectOptionListHtml("x_Consultant") ?>
	</select>
</div>
<?php echo $view_ip_patient_admission->Consultant->Lookup->getParamTag("p_x_Consultant") ?>
</span>
</script>
<?php echo $view_ip_patient_admission->Consultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->Anesthetist->Visible) { // Anesthetist ?>
	<div id="r_Anesthetist" class="form-group row">
		<label id="elh_view_ip_patient_admission_Anesthetist" for="x_Anesthetist" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_Anesthetist" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->Anesthetist->caption() ?><?php echo ($view_ip_patient_admission->Anesthetist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->Anesthetist->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Anesthetist" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_Anesthetist">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_Anesthetist" data-value-separator="<?php echo $view_ip_patient_admission->Anesthetist->displayValueSeparatorAttribute() ?>" id="x_Anesthetist" name="x_Anesthetist"<?php echo $view_ip_patient_admission->Anesthetist->editAttributes() ?>>
		<?php echo $view_ip_patient_admission->Anesthetist->selectOptionListHtml("x_Anesthetist") ?>
	</select>
</div>
<?php echo $view_ip_patient_admission->Anesthetist->Lookup->getParamTag("p_x_Anesthetist") ?>
</span>
</script>
<?php echo $view_ip_patient_admission->Anesthetist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->Amound->Visible) { // Amound ?>
	<div id="r_Amound" class="form-group row">
		<label id="elh_view_ip_patient_admission_Amound" for="x_Amound" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_Amound" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->Amound->caption() ?><?php echo ($view_ip_patient_admission->Amound->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->Amound->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Amound" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_Amound">
<input type="text" data-table="view_ip_patient_admission" data-field="x_Amound" name="x_Amound" id="x_Amound" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->Amound->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->Amound->EditValue ?>"<?php echo $view_ip_patient_admission->Amound->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->Amound->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->physician_id->Visible) { // physician_id ?>
	<div id="r_physician_id" class="form-group row">
		<label id="elh_view_ip_patient_admission_physician_id" for="x_physician_id" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_physician_id" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->physician_id->caption() ?><?php echo ($view_ip_patient_admission->physician_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->physician_id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_physician_id" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_physician_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_physician_id"><?php echo strval($view_ip_patient_admission->physician_id->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_ip_patient_admission->physician_id->ViewValue) : $view_ip_patient_admission->physician_id->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission->physician_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_ip_patient_admission->physician_id->ReadOnly || $view_ip_patient_admission->physician_id->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_physician_id',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission->physician_id->Lookup->getParamTag("p_x_physician_id") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_physician_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission->physician_id->displayValueSeparatorAttribute() ?>" name="x_physician_id" id="x_physician_id" value="<?php echo $view_ip_patient_admission->physician_id->CurrentValue ?>"<?php echo $view_ip_patient_admission->physician_id->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->physician_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label id="elh_view_ip_patient_admission_PartnerID" for="x_PartnerID" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_PartnerID" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->PartnerID->caption() ?><?php echo ($view_ip_patient_admission->PartnerID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->PartnerID->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PartnerID" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_PartnerID">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->PartnerID->EditValue ?>"<?php echo $view_ip_patient_admission->PartnerID->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->PartnerID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_view_ip_patient_admission_PartnerName" for="x_PartnerName" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_PartnerName" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->PartnerName->caption() ?><?php echo ($view_ip_patient_admission->PartnerName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->PartnerName->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PartnerName" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_PartnerName">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->PartnerName->EditValue ?>"<?php echo $view_ip_patient_admission->PartnerName->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerMobile->Visible) { // PartnerMobile ?>
	<div id="r_PartnerMobile" class="form-group row">
		<label id="elh_view_ip_patient_admission_PartnerMobile" for="x_PartnerMobile" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_PartnerMobile" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->PartnerMobile->caption() ?><?php echo ($view_ip_patient_admission->PartnerMobile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->PartnerMobile->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PartnerMobile" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_PartnerMobile">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->PartnerMobile->EditValue ?>"<?php echo $view_ip_patient_admission->PartnerMobile->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->PartnerMobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_view_ip_patient_admission_patient_id" for="x_patient_id" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_patient_id" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->patient_id->caption() ?><?php echo ($view_ip_patient_admission->patient_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->patient_id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_patient_id" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_patient_id">
<?php $view_ip_patient_admission->patient_id->EditAttrs["onchange"] = "ew.autoFill(this);" . @$view_ip_patient_admission->patient_id->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient_id"><?php echo strval($view_ip_patient_admission->patient_id->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_ip_patient_admission->patient_id->ViewValue) : $view_ip_patient_admission->patient_id->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission->patient_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_ip_patient_admission->patient_id->ReadOnly || $view_ip_patient_admission->patient_id->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient_id',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission->patient_id->Lookup->getParamTag("p_x_patient_id") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_patient_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission->patient_id->displayValueSeparatorAttribute() ?>" name="x_patient_id" id="x_patient_id" value="<?php echo $view_ip_patient_admission->patient_id->CurrentValue ?>"<?php echo $view_ip_patient_admission->patient_id->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->Cid->Visible) { // Cid ?>
	<div id="r_Cid" class="form-group row">
		<label id="elh_view_ip_patient_admission_Cid" for="x_Cid" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_Cid" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->Cid->caption() ?><?php echo ($view_ip_patient_admission->Cid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->Cid->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Cid" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_Cid">
<?php $view_ip_patient_admission->Cid->EditAttrs["onchange"] = "ew.autoFill(this);" . @$view_ip_patient_admission->Cid->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Cid"><?php echo strval($view_ip_patient_admission->Cid->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_ip_patient_admission->Cid->ViewValue) : $view_ip_patient_admission->Cid->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission->Cid->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_ip_patient_admission->Cid->ReadOnly || $view_ip_patient_admission->Cid->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Cid',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission->Cid->Lookup->getParamTag("p_x_Cid") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_Cid" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission->Cid->displayValueSeparatorAttribute() ?>" name="x_Cid" id="x_Cid" value="<?php echo $view_ip_patient_admission->Cid->CurrentValue ?>"<?php echo $view_ip_patient_admission->Cid->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->Cid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PartId->Visible) { // PartId ?>
	<div id="r_PartId" class="form-group row">
		<label id="elh_view_ip_patient_admission_PartId" for="x_PartId" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_PartId" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->PartId->caption() ?><?php echo ($view_ip_patient_admission->PartId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->PartId->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PartId" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_PartId">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PartId" name="x_PartId" id="x_PartId" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->PartId->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->PartId->EditValue ?>"<?php echo $view_ip_patient_admission->PartId->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->PartId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->IDProof->Visible) { // IDProof ?>
	<div id="r_IDProof" class="form-group row">
		<label id="elh_view_ip_patient_admission_IDProof" for="x_IDProof" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_IDProof" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->IDProof->caption() ?><?php echo ($view_ip_patient_admission->IDProof->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->IDProof->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_IDProof" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_IDProof">
<input type="text" data-table="view_ip_patient_admission" data-field="x_IDProof" name="x_IDProof" id="x_IDProof" size="30" maxlength="115" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->IDProof->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->IDProof->EditValue ?>"<?php echo $view_ip_patient_admission->IDProof->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->IDProof->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->DOB->Visible) { // DOB ?>
	<div id="r_DOB" class="form-group row">
		<label id="elh_view_ip_patient_admission_DOB" for="x_DOB" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_DOB" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->DOB->caption() ?><?php echo ($view_ip_patient_admission->DOB->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->DOB->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_DOB" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_DOB">
<input type="text" data-table="view_ip_patient_admission" data-field="x_DOB" name="x_DOB" id="x_DOB" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->DOB->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->DOB->EditValue ?>"<?php echo $view_ip_patient_admission->DOB->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_patient_admission->DOB->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<div id="r_AdviceToOtherHospital" class="form-group row">
		<label id="elh_view_ip_patient_admission_AdviceToOtherHospital" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_AdviceToOtherHospital" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->AdviceToOtherHospital->caption() ?><?php echo ($view_ip_patient_admission->AdviceToOtherHospital->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->AdviceToOtherHospital->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_AdviceToOtherHospital" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_AdviceToOtherHospital">
<div id="tp_x_AdviceToOtherHospital" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_ip_patient_admission" data-field="x_AdviceToOtherHospital" data-value-separator="<?php echo $view_ip_patient_admission->AdviceToOtherHospital->displayValueSeparatorAttribute() ?>" name="x_AdviceToOtherHospital[]" id="x_AdviceToOtherHospital[]" value="{value}"<?php echo $view_ip_patient_admission->AdviceToOtherHospital->editAttributes() ?>></div>
<div id="dsl_x_AdviceToOtherHospital" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ip_patient_admission->AdviceToOtherHospital->checkBoxListHtml(FALSE, "x_AdviceToOtherHospital[]") ?>
</div></div>
</span>
</script>
<?php echo $view_ip_patient_admission->AdviceToOtherHospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->Reason->Visible) { // Reason ?>
	<div id="r_Reason" class="form-group row">
		<label id="elh_view_ip_patient_admission_Reason" for="x_Reason" class="<?php echo $view_ip_patient_admission_edit->LeftColumnClass ?>"><script id="tpc_view_ip_patient_admission_Reason" class="view_ip_patient_admissionedit" type="text/html"><span><?php echo $view_ip_patient_admission->Reason->caption() ?><?php echo ($view_ip_patient_admission->Reason->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_patient_admission_edit->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->Reason->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Reason" class="view_ip_patient_admissionedit" type="text/html">
<span id="el_view_ip_patient_admission_Reason">
<textarea data-table="view_ip_patient_admission" data-field="x_Reason" name="x_Reason" id="x_Reason" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->Reason->getPlaceHolder()) ?>"<?php echo $view_ip_patient_admission->Reason->editAttributes() ?>><?php echo $view_ip_patient_admission->Reason->EditValue ?></textarea>
</span>
</script>
<?php echo $view_ip_patient_admission->Reason->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_ip_patient_admissionedit" class="ew-custom-template"></div>
<script id="tpm_view_ip_patient_admissionedit" type="text/html">
<div id="ct_view_ip_patient_admission_edit"><style>
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
	<span hidden class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_profilePic"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_profilePic"/}}</span>
	<span hidden class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_Consultant"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_Consultant"/}}</span>
<div class="row">
	<div class="col-12">
		<table style="width:100%">
			<tr>
				<td>{{include tmpl="#tpc_view_ip_patient_admission_patient_id"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_patient_id"/}}</td>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_PatientID"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_PatientID"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_patient_name"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_patient_name"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_gender"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_gender"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_age"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_age"/}}</span>
				  </div>
				   <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_DOB"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_DOB"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_mobileno"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_mobileno"/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_mrnNo"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_mrnNo"/}}</span>
				  </div>
				 <div class="ew-row">
					<img id="patientPropic" src=""  height="100" width="100">
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_PartnerID"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_PartnerID"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_PartnerName"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_PartnerName"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_PartnerMobile"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_PartnerMobile"/}}</span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
	  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_ReportHeader"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_ReportHeader"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_admission_date"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_admission_date"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_physician_id"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_physician_id"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_Anesthetist"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_Anesthetist"/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_release_date"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_release_date"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_Procedure"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_Procedure"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_Amound"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_Amound"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_IDProof"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_IDProof"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_typeRegsisteration"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_typeRegsisteration"/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_PaymentCategory"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_PaymentCategory"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_PaymentStatus"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_PaymentStatus"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_ReferedByDr"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_ReferedByDr"/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_ReferClinicname"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_ReferClinicname"/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_ReferMobileNo"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_ReferMobileNo"/}}</span>
				  </div>
				<div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_ReferCity"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_ReferCity"/}}</span>
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
			<div class="card-header"  style="background-color:#03ABA2">
				<h3 class="card-title">Manual Bill Closing.</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_BillClosing"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_BillClosing"/}}</span>
				  </div>
				  <div  class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_BillClosingDate"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_BillClosingDate"/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div  class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_BillNumber"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_BillNumber"/}}</span>
				  </div>
				<div  class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_ClosingAmount"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_ClosingAmount"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_AdviceToOtherHospital"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_AdviceToOtherHospital"/}}</span>
				  </div>
				</div>
				<div id="AdviceToOtherHospitalReason" class="col-9">
				  <div  class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_patient_admission_Reason"/}}&nbsp;{{include tmpl="#tpx_view_ip_patient_admission_Reason"/}}</span>
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
<?php if (!$view_ip_patient_admission_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_ip_patient_admission_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_ip_patient_admission_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ip_patient_admission->Rows) ?> };
ew.applyTemplate("tpd_view_ip_patient_admissionedit", "tpm_view_ip_patient_admissionedit", "view_ip_patient_admissionedit", "<?php echo $view_ip_patient_admission->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_ip_patient_admissionedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ip_patient_admission_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

document.getElementById("x_Amound").style.width = "150px";
document.getElementById("AdviceToOtherHospitalReason").style.display = "none";
</script>
<?php include_once "footer.php" ?>
<?php
$view_ip_patient_admission_edit->terminate();
?>