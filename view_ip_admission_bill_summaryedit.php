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
$view_ip_admission_bill_summary_edit = new view_ip_admission_bill_summary_edit();

// Run the page
$view_ip_admission_bill_summary_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_admission_bill_summary_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_ip_admission_bill_summaryedit = currentForm = new ew.Form("fview_ip_admission_bill_summaryedit", "edit");

// Validate form
fview_ip_admission_bill_summaryedit.validate = function() {
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
		<?php if ($view_ip_admission_bill_summary_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->id->caption(), $view_ip_admission_bill_summary->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->mrnNo->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->mrnNo->caption(), $view_ip_admission_bill_summary->mrnNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->PatientID->caption(), $view_ip_admission_bill_summary->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->patient_name->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->patient_name->caption(), $view_ip_admission_bill_summary->patient_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->mobileno->Required) { ?>
			elm = this.getElements("x" + infix + "_mobileno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->mobileno->caption(), $view_ip_admission_bill_summary->mobileno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->profilePic->caption(), $view_ip_admission_bill_summary->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->gender->Required) { ?>
			elm = this.getElements("x" + infix + "_gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->gender->caption(), $view_ip_admission_bill_summary->gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->age->Required) { ?>
			elm = this.getElements("x" + infix + "_age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->age->caption(), $view_ip_admission_bill_summary->age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->physician_id->Required) { ?>
			elm = this.getElements("x" + infix + "_physician_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->physician_id->caption(), $view_ip_admission_bill_summary->physician_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->typeRegsisteration->Required) { ?>
			elm = this.getElements("x" + infix + "_typeRegsisteration");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->typeRegsisteration->caption(), $view_ip_admission_bill_summary->typeRegsisteration->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->PaymentCategory->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentCategory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->PaymentCategory->caption(), $view_ip_admission_bill_summary->PaymentCategory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->admission_consultant_id->Required) { ?>
			elm = this.getElements("x" + infix + "_admission_consultant_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->admission_consultant_id->caption(), $view_ip_admission_bill_summary->admission_consultant_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->leading_consultant_id->Required) { ?>
			elm = this.getElements("x" + infix + "_leading_consultant_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->leading_consultant_id->caption(), $view_ip_admission_bill_summary->leading_consultant_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->cause->Required) { ?>
			elm = this.getElements("x" + infix + "_cause");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->cause->caption(), $view_ip_admission_bill_summary->cause->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->admission_date->Required) { ?>
			elm = this.getElements("x" + infix + "_admission_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->admission_date->caption(), $view_ip_admission_bill_summary->admission_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_admission_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_admission_bill_summary->admission_date->errorMessage()) ?>");
		<?php if ($view_ip_admission_bill_summary_edit->release_date->Required) { ?>
			elm = this.getElements("x" + infix + "_release_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->release_date->caption(), $view_ip_admission_bill_summary->release_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_release_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_admission_bill_summary->release_date->errorMessage()) ?>");
		<?php if ($view_ip_admission_bill_summary_edit->PaymentStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->PaymentStatus->caption(), $view_ip_admission_bill_summary->PaymentStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->status->caption(), $view_ip_admission_bill_summary->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->createdby->caption(), $view_ip_admission_bill_summary->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->createddatetime->caption(), $view_ip_admission_bill_summary->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->modifiedby->caption(), $view_ip_admission_bill_summary->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_admission_bill_summary->modifiedby->errorMessage()) ?>");
		<?php if ($view_ip_admission_bill_summary_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->modifieddatetime->caption(), $view_ip_admission_bill_summary->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_admission_bill_summary->modifieddatetime->errorMessage()) ?>");
		<?php if ($view_ip_admission_bill_summary_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->HospID->caption(), $view_ip_admission_bill_summary->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->ReferedByDr->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferedByDr");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->ReferedByDr->caption(), $view_ip_admission_bill_summary->ReferedByDr->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->ReferClinicname->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferClinicname");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->ReferClinicname->caption(), $view_ip_admission_bill_summary->ReferClinicname->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->ReferCity->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferCity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->ReferCity->caption(), $view_ip_admission_bill_summary->ReferCity->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->ReferMobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferMobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->ReferMobileNo->caption(), $view_ip_admission_bill_summary->ReferMobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->ReferA4TreatingConsultant->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferA4TreatingConsultant");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->ReferA4TreatingConsultant->caption(), $view_ip_admission_bill_summary->ReferA4TreatingConsultant->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->PurposreReferredfor->Required) { ?>
			elm = this.getElements("x" + infix + "_PurposreReferredfor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->PurposreReferredfor->caption(), $view_ip_admission_bill_summary->PurposreReferredfor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->BillClosing->Required) { ?>
			elm = this.getElements("x" + infix + "_BillClosing");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->BillClosing->caption(), $view_ip_admission_bill_summary->BillClosing->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->BillClosingDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillClosingDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->BillClosingDate->caption(), $view_ip_admission_bill_summary->BillClosingDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillClosingDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_admission_bill_summary->BillClosingDate->errorMessage()) ?>");
		<?php if ($view_ip_admission_bill_summary_edit->BillNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_BillNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->BillNumber->caption(), $view_ip_admission_bill_summary->BillNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->ClosingAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_ClosingAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->ClosingAmount->caption(), $view_ip_admission_bill_summary->ClosingAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->ClosingType->Required) { ?>
			elm = this.getElements("x" + infix + "_ClosingType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->ClosingType->caption(), $view_ip_admission_bill_summary->ClosingType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->BillAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_BillAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->BillAmount->caption(), $view_ip_admission_bill_summary->BillAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->billclosedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_billclosedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->billclosedBy->caption(), $view_ip_admission_bill_summary->billclosedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->bllcloseByDate->Required) { ?>
			elm = this.getElements("x" + infix + "_bllcloseByDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->bllcloseByDate->caption(), $view_ip_admission_bill_summary->bllcloseByDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->ReportHeader->Required) { ?>
			elm = this.getElements("x" + infix + "_ReportHeader[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->ReportHeader->caption(), $view_ip_admission_bill_summary->ReportHeader->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->Procedure->Required) { ?>
			elm = this.getElements("x" + infix + "_Procedure");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->Procedure->caption(), $view_ip_admission_bill_summary->Procedure->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->Consultant->Required) { ?>
			elm = this.getElements("x" + infix + "_Consultant");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->Consultant->caption(), $view_ip_admission_bill_summary->Consultant->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->Anesthetist->Required) { ?>
			elm = this.getElements("x" + infix + "_Anesthetist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->Anesthetist->caption(), $view_ip_admission_bill_summary->Anesthetist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->Amound->Required) { ?>
			elm = this.getElements("x" + infix + "_Amound");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->Amound->caption(), $view_ip_admission_bill_summary->Amound->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amound");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_admission_bill_summary->Amound->errorMessage()) ?>");
		<?php if ($view_ip_admission_bill_summary_edit->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->patient_id->caption(), $view_ip_admission_bill_summary->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_admission_bill_summary_edit->Package->Required) { ?>
			elm = this.getElements("x" + infix + "_Package");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary->Package->caption(), $view_ip_admission_bill_summary->Package->RequiredErrorMessage)) ?>");
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
fview_ip_admission_bill_summaryedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_admission_bill_summaryedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ip_admission_bill_summaryedit.lists["x_PaymentCategory"] = <?php echo $view_ip_admission_bill_summary_edit->PaymentCategory->Lookup->toClientList() ?>;
fview_ip_admission_bill_summaryedit.lists["x_PaymentCategory"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_edit->PaymentCategory->lookupOptions()) ?>;
fview_ip_admission_bill_summaryedit.lists["x_PaymentStatus"] = <?php echo $view_ip_admission_bill_summary_edit->PaymentStatus->Lookup->toClientList() ?>;
fview_ip_admission_bill_summaryedit.lists["x_PaymentStatus"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_edit->PaymentStatus->lookupOptions()) ?>;
fview_ip_admission_bill_summaryedit.lists["x_BillClosing"] = <?php echo $view_ip_admission_bill_summary_edit->BillClosing->Lookup->toClientList() ?>;
fview_ip_admission_bill_summaryedit.lists["x_BillClosing"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_edit->BillClosing->options(FALSE, TRUE)) ?>;
fview_ip_admission_bill_summaryedit.lists["x_ReportHeader[]"] = <?php echo $view_ip_admission_bill_summary_edit->ReportHeader->Lookup->toClientList() ?>;
fview_ip_admission_bill_summaryedit.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_edit->ReportHeader->options(FALSE, TRUE)) ?>;
fview_ip_admission_bill_summaryedit.lists["x_Procedure"] = <?php echo $view_ip_admission_bill_summary_edit->Procedure->Lookup->toClientList() ?>;
fview_ip_admission_bill_summaryedit.lists["x_Procedure"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_edit->Procedure->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_ip_admission_bill_summary_edit->showPageHeader(); ?>
<?php
$view_ip_admission_bill_summary_edit->showMessage();
?>
<form name="fview_ip_admission_bill_summaryedit" id="fview_ip_admission_bill_summaryedit" class="<?php echo $view_ip_admission_bill_summary_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_admission_bill_summary_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_admission_bill_summary_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_admission_bill_summary">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_admission_bill_summary_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($view_ip_admission_bill_summary->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_id" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_id" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->id->caption() ?><?php echo ($view_ip_admission_bill_summary->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_id" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_id">
<span<?php echo $view_ip_admission_bill_summary->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->id->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->mrnNo->Visible) { // mrnNo ?>
	<div id="r_mrnNo" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_mrnNo" for="x_mrnNo" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_mrnNo" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->mrnNo->caption() ?><?php echo ($view_ip_admission_bill_summary->mrnNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->mrnNo->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_mrnNo" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_mrnNo">
<span<?php echo $view_ip_admission_bill_summary->mrnNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->mrnNo->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->mrnNo->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->mrnNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_PatientID" for="x_PatientID" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_PatientID" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->PatientID->caption() ?><?php echo ($view_ip_admission_bill_summary->PatientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->PatientID->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_PatientID" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_PatientID">
<span<?php echo $view_ip_admission_bill_summary->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->PatientID->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->PatientID->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->patient_name->Visible) { // patient_name ?>
	<div id="r_patient_name" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_patient_name" for="x_patient_name" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_patient_name" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->patient_name->caption() ?><?php echo ($view_ip_admission_bill_summary->patient_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->patient_name->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_patient_name" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_patient_name">
<span<?php echo $view_ip_admission_bill_summary->patient_name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->patient_name->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->patient_name->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->patient_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->mobileno->Visible) { // mobileno ?>
	<div id="r_mobileno" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_mobileno" for="x_mobileno" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_mobileno" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->mobileno->caption() ?><?php echo ($view_ip_admission_bill_summary->mobileno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->mobileno->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_mobileno" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_mobileno">
<span<?php echo $view_ip_admission_bill_summary->mobileno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->mobileno->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->mobileno->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->mobileno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_profilePic" for="x_profilePic" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_profilePic" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->profilePic->caption() ?><?php echo ($view_ip_admission_bill_summary->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->profilePic->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_profilePic" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_profilePic">
<span<?php echo $view_ip_admission_bill_summary->profilePic->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->profilePic->EditValue ?></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->profilePic->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_gender" for="x_gender" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_gender" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->gender->caption() ?><?php echo ($view_ip_admission_bill_summary->gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->gender->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_gender" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_gender">
<span<?php echo $view_ip_admission_bill_summary->gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->gender->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_gender" name="x_gender" id="x_gender" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->gender->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->age->Visible) { // age ?>
	<div id="r_age" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_age" for="x_age" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_age" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->age->caption() ?><?php echo ($view_ip_admission_bill_summary->age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->age->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_age" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_age">
<span<?php echo $view_ip_admission_bill_summary->age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->age->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_age" name="x_age" id="x_age" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->age->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->physician_id->Visible) { // physician_id ?>
	<div id="r_physician_id" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_physician_id" for="x_physician_id" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_physician_id" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->physician_id->caption() ?><?php echo ($view_ip_admission_bill_summary->physician_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->physician_id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_physician_id" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_physician_id">
<span<?php echo $view_ip_admission_bill_summary->physician_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->physician_id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_physician_id" name="x_physician_id" id="x_physician_id" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->physician_id->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->physician_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<div id="r_typeRegsisteration" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_typeRegsisteration" for="x_typeRegsisteration" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_typeRegsisteration" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->typeRegsisteration->caption() ?><?php echo ($view_ip_admission_bill_summary->typeRegsisteration->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->typeRegsisteration->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_typeRegsisteration" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_typeRegsisteration">
<span<?php echo $view_ip_admission_bill_summary->typeRegsisteration->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->typeRegsisteration->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_typeRegsisteration" name="x_typeRegsisteration" id="x_typeRegsisteration" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->typeRegsisteration->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->typeRegsisteration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->PaymentCategory->Visible) { // PaymentCategory ?>
	<div id="r_PaymentCategory" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_PaymentCategory" for="x_PaymentCategory" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_PaymentCategory" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->PaymentCategory->caption() ?><?php echo ($view_ip_admission_bill_summary->PaymentCategory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->PaymentCategory->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_PaymentCategory" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_PaymentCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_admission_bill_summary" data-field="x_PaymentCategory" data-value-separator="<?php echo $view_ip_admission_bill_summary->PaymentCategory->displayValueSeparatorAttribute() ?>" id="x_PaymentCategory" name="x_PaymentCategory"<?php echo $view_ip_admission_bill_summary->PaymentCategory->editAttributes() ?>>
		<?php echo $view_ip_admission_bill_summary->PaymentCategory->selectOptionListHtml("x_PaymentCategory") ?>
	</select>
</div>
<?php echo $view_ip_admission_bill_summary->PaymentCategory->Lookup->getParamTag("p_x_PaymentCategory") ?>
</span>
</script>
<?php echo $view_ip_admission_bill_summary->PaymentCategory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<div id="r_admission_consultant_id" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_admission_consultant_id" for="x_admission_consultant_id" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_admission_consultant_id" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->admission_consultant_id->caption() ?><?php echo ($view_ip_admission_bill_summary->admission_consultant_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->admission_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_admission_consultant_id" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_admission_consultant_id">
<span<?php echo $view_ip_admission_bill_summary->admission_consultant_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->admission_consultant_id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_admission_consultant_id" name="x_admission_consultant_id" id="x_admission_consultant_id" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->admission_consultant_id->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->admission_consultant_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<div id="r_leading_consultant_id" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_leading_consultant_id" for="x_leading_consultant_id" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_leading_consultant_id" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->leading_consultant_id->caption() ?><?php echo ($view_ip_admission_bill_summary->leading_consultant_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->leading_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_leading_consultant_id" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_leading_consultant_id">
<span<?php echo $view_ip_admission_bill_summary->leading_consultant_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->leading_consultant_id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_leading_consultant_id" name="x_leading_consultant_id" id="x_leading_consultant_id" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->leading_consultant_id->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->leading_consultant_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->cause->Visible) { // cause ?>
	<div id="r_cause" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_cause" for="x_cause" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_cause" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->cause->caption() ?><?php echo ($view_ip_admission_bill_summary->cause->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->cause->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_cause" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_cause">
<span<?php echo $view_ip_admission_bill_summary->cause->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->cause->EditValue ?></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_cause" name="x_cause" id="x_cause" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->cause->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->cause->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->admission_date->Visible) { // admission_date ?>
	<div id="r_admission_date" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_admission_date" for="x_admission_date" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_admission_date" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->admission_date->caption() ?><?php echo ($view_ip_admission_bill_summary->admission_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->admission_date->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_admission_date" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_admission_date">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_admission_date" name="x_admission_date" id="x_admission_date" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary->admission_date->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary->admission_date->EditValue ?>"<?php echo $view_ip_admission_bill_summary->admission_date->editAttributes() ?>>
<?php if (!$view_ip_admission_bill_summary->admission_date->ReadOnly && !$view_ip_admission_bill_summary->admission_date->Disabled && !isset($view_ip_admission_bill_summary->admission_date->EditAttrs["readonly"]) && !isset($view_ip_admission_bill_summary->admission_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_ip_admission_bill_summaryedit_js">
ew.createDateTimePicker("fview_ip_admission_bill_summaryedit", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_ip_admission_bill_summary->admission_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->release_date->Visible) { // release_date ?>
	<div id="r_release_date" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_release_date" for="x_release_date" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_release_date" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->release_date->caption() ?><?php echo ($view_ip_admission_bill_summary->release_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->release_date->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_release_date" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_release_date">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_release_date" name="x_release_date" id="x_release_date" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary->release_date->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary->release_date->EditValue ?>"<?php echo $view_ip_admission_bill_summary->release_date->editAttributes() ?>>
<?php if (!$view_ip_admission_bill_summary->release_date->ReadOnly && !$view_ip_admission_bill_summary->release_date->Disabled && !isset($view_ip_admission_bill_summary->release_date->EditAttrs["readonly"]) && !isset($view_ip_admission_bill_summary->release_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_ip_admission_bill_summaryedit_js">
ew.createDateTimePicker("fview_ip_admission_bill_summaryedit", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_ip_admission_bill_summary->release_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->PaymentStatus->Visible) { // PaymentStatus ?>
	<div id="r_PaymentStatus" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_PaymentStatus" for="x_PaymentStatus" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_PaymentStatus" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->PaymentStatus->caption() ?><?php echo ($view_ip_admission_bill_summary->PaymentStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->PaymentStatus->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_PaymentStatus" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_PaymentStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_admission_bill_summary" data-field="x_PaymentStatus" data-value-separator="<?php echo $view_ip_admission_bill_summary->PaymentStatus->displayValueSeparatorAttribute() ?>" id="x_PaymentStatus" name="x_PaymentStatus"<?php echo $view_ip_admission_bill_summary->PaymentStatus->editAttributes() ?>>
		<?php echo $view_ip_admission_bill_summary->PaymentStatus->selectOptionListHtml("x_PaymentStatus") ?>
	</select>
</div>
<?php echo $view_ip_admission_bill_summary->PaymentStatus->Lookup->getParamTag("p_x_PaymentStatus") ?>
</span>
</script>
<?php echo $view_ip_admission_bill_summary->PaymentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_status" for="x_status" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_status" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->status->caption() ?><?php echo ($view_ip_admission_bill_summary->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->status->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_status" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_status">
<span<?php echo $view_ip_admission_bill_summary->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->status->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_status" name="x_status" id="x_status" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->status->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_createdby" for="x_createdby" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_createdby" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->createdby->caption() ?><?php echo ($view_ip_admission_bill_summary->createdby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->createdby->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_createdby" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_createdby">
<span<?php echo $view_ip_admission_bill_summary->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->createdby->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_createdby" name="x_createdby" id="x_createdby" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->createdby->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_createddatetime" for="x_createddatetime" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_createddatetime" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->createddatetime->caption() ?><?php echo ($view_ip_admission_bill_summary->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->createddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_createddatetime" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_createddatetime">
<span<?php echo $view_ip_admission_bill_summary->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->createddatetime->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->createddatetime->CurrentValue) ?>">
<script type="text/html" class="view_ip_admission_bill_summaryedit_js">
ew.createDateTimePicker("fview_ip_admission_bill_summaryedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_ip_admission_bill_summary->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_modifiedby" for="x_modifiedby" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_modifiedby" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->modifiedby->caption() ?><?php echo ($view_ip_admission_bill_summary->modifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->modifiedby->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_modifiedby" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_modifiedby">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary->modifiedby->EditValue ?>"<?php echo $view_ip_admission_bill_summary->modifiedby->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_admission_bill_summary->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_modifieddatetime" for="x_modifieddatetime" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_modifieddatetime" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->modifieddatetime->caption() ?><?php echo ($view_ip_admission_bill_summary->modifieddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_modifieddatetime" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_modifieddatetime">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary->modifieddatetime->EditValue ?>"<?php echo $view_ip_admission_bill_summary->modifieddatetime->editAttributes() ?>>
<?php if (!$view_ip_admission_bill_summary->modifieddatetime->ReadOnly && !$view_ip_admission_bill_summary->modifieddatetime->Disabled && !isset($view_ip_admission_bill_summary->modifieddatetime->EditAttrs["readonly"]) && !isset($view_ip_admission_bill_summary->modifieddatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_ip_admission_bill_summaryedit_js">
ew.createDateTimePicker("fview_ip_admission_bill_summaryedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_ip_admission_bill_summary->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_HospID" for="x_HospID" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_HospID" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->HospID->caption() ?><?php echo ($view_ip_admission_bill_summary->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->HospID->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_HospID" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_HospID">
<span<?php echo $view_ip_admission_bill_summary->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->HospID->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->HospID->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReferedByDr->Visible) { // ReferedByDr ?>
	<div id="r_ReferedByDr" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_ReferedByDr" for="x_ReferedByDr" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_ReferedByDr" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->ReferedByDr->caption() ?><?php echo ($view_ip_admission_bill_summary->ReferedByDr->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->ReferedByDr->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferedByDr" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_ReferedByDr">
<span<?php echo $view_ip_admission_bill_summary->ReferedByDr->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->ReferedByDr->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_ReferedByDr" name="x_ReferedByDr" id="x_ReferedByDr" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->ReferedByDr->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->ReferedByDr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_ReferClinicname" for="x_ReferClinicname" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_ReferClinicname" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->ReferClinicname->caption() ?><?php echo ($view_ip_admission_bill_summary->ReferClinicname->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->ReferClinicname->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferClinicname" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_ReferClinicname">
<span<?php echo $view_ip_admission_bill_summary->ReferClinicname->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->ReferClinicname->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->ReferClinicname->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->ReferClinicname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_ReferCity" for="x_ReferCity" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_ReferCity" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->ReferCity->caption() ?><?php echo ($view_ip_admission_bill_summary->ReferCity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->ReferCity->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferCity" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_ReferCity">
<span<?php echo $view_ip_admission_bill_summary->ReferCity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->ReferCity->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->ReferCity->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->ReferCity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_ReferMobileNo" for="x_ReferMobileNo" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_ReferMobileNo" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->ReferMobileNo->caption() ?><?php echo ($view_ip_admission_bill_summary->ReferMobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferMobileNo" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_ReferMobileNo">
<span<?php echo $view_ip_admission_bill_summary->ReferMobileNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->ReferMobileNo->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->ReferMobileNo->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->ReferMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div id="r_ReferA4TreatingConsultant" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_ReferA4TreatingConsultant" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->ReferA4TreatingConsultant->caption() ?><?php echo ($view_ip_admission_bill_summary->ReferA4TreatingConsultant->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferA4TreatingConsultant" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_ReferA4TreatingConsultant">
<span<?php echo $view_ip_admission_bill_summary->ReferA4TreatingConsultant->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->ReferA4TreatingConsultant->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_ReferA4TreatingConsultant" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->ReferA4TreatingConsultant->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->ReferA4TreatingConsultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div id="r_PurposreReferredfor" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_PurposreReferredfor" for="x_PurposreReferredfor" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_PurposreReferredfor" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->PurposreReferredfor->caption() ?><?php echo ($view_ip_admission_bill_summary->PurposreReferredfor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_PurposreReferredfor" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_PurposreReferredfor">
<span<?php echo $view_ip_admission_bill_summary->PurposreReferredfor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->PurposreReferredfor->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->PurposreReferredfor->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->PurposreReferredfor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->BillClosing->Visible) { // BillClosing ?>
	<div id="r_BillClosing" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_BillClosing" for="x_BillClosing" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_BillClosing" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->BillClosing->caption() ?><?php echo ($view_ip_admission_bill_summary->BillClosing->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->BillClosing->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_BillClosing" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_BillClosing">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_admission_bill_summary" data-field="x_BillClosing" data-value-separator="<?php echo $view_ip_admission_bill_summary->BillClosing->displayValueSeparatorAttribute() ?>" id="x_BillClosing" name="x_BillClosing"<?php echo $view_ip_admission_bill_summary->BillClosing->editAttributes() ?>>
		<?php echo $view_ip_admission_bill_summary->BillClosing->selectOptionListHtml("x_BillClosing") ?>
	</select>
</div>
</span>
</script>
<?php echo $view_ip_admission_bill_summary->BillClosing->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->BillClosingDate->Visible) { // BillClosingDate ?>
	<div id="r_BillClosingDate" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_BillClosingDate" for="x_BillClosingDate" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_BillClosingDate" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->BillClosingDate->caption() ?><?php echo ($view_ip_admission_bill_summary->BillClosingDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->BillClosingDate->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_BillClosingDate" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_BillClosingDate">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_BillClosingDate" name="x_BillClosingDate" id="x_BillClosingDate" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary->BillClosingDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary->BillClosingDate->EditValue ?>"<?php echo $view_ip_admission_bill_summary->BillClosingDate->editAttributes() ?>>
<?php if (!$view_ip_admission_bill_summary->BillClosingDate->ReadOnly && !$view_ip_admission_bill_summary->BillClosingDate->Disabled && !isset($view_ip_admission_bill_summary->BillClosingDate->EditAttrs["readonly"]) && !isset($view_ip_admission_bill_summary->BillClosingDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_ip_admission_bill_summaryedit_js">
ew.createDateTimePicker("fview_ip_admission_bill_summaryedit", "x_BillClosingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_ip_admission_bill_summary->BillClosingDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_BillNumber" for="x_BillNumber" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_BillNumber" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->BillNumber->caption() ?><?php echo ($view_ip_admission_bill_summary->BillNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->BillNumber->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_BillNumber" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_BillNumber">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary->BillNumber->EditValue ?>"<?php echo $view_ip_admission_bill_summary->BillNumber->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_admission_bill_summary->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ClosingAmount->Visible) { // ClosingAmount ?>
	<div id="r_ClosingAmount" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_ClosingAmount" for="x_ClosingAmount" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_ClosingAmount" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->ClosingAmount->caption() ?><?php echo ($view_ip_admission_bill_summary->ClosingAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->ClosingAmount->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ClosingAmount" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_ClosingAmount">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_ClosingAmount" name="x_ClosingAmount" id="x_ClosingAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary->ClosingAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary->ClosingAmount->EditValue ?>"<?php echo $view_ip_admission_bill_summary->ClosingAmount->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_admission_bill_summary->ClosingAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ClosingType->Visible) { // ClosingType ?>
	<div id="r_ClosingType" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_ClosingType" for="x_ClosingType" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_ClosingType" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->ClosingType->caption() ?><?php echo ($view_ip_admission_bill_summary->ClosingType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->ClosingType->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ClosingType" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_ClosingType">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_ClosingType" name="x_ClosingType" id="x_ClosingType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary->ClosingType->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary->ClosingType->EditValue ?>"<?php echo $view_ip_admission_bill_summary->ClosingType->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_admission_bill_summary->ClosingType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->BillAmount->Visible) { // BillAmount ?>
	<div id="r_BillAmount" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_BillAmount" for="x_BillAmount" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_BillAmount" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->BillAmount->caption() ?><?php echo ($view_ip_admission_bill_summary->BillAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->BillAmount->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_BillAmount" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_BillAmount">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_BillAmount" name="x_BillAmount" id="x_BillAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary->BillAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary->BillAmount->EditValue ?>"<?php echo $view_ip_admission_bill_summary->BillAmount->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_admission_bill_summary->BillAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_ReportHeader" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_ReportHeader" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->ReportHeader->caption() ?><?php echo ($view_ip_admission_bill_summary->ReportHeader->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReportHeader" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_ReportHeader">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_ip_admission_bill_summary" data-field="x_ReportHeader" data-value-separator="<?php echo $view_ip_admission_bill_summary->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $view_ip_admission_bill_summary->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ip_admission_bill_summary->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span>
</script>
<?php echo $view_ip_admission_bill_summary->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_Procedure" for="x_Procedure" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_Procedure" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->Procedure->caption() ?><?php echo ($view_ip_admission_bill_summary->Procedure->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->Procedure->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Procedure" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_Procedure">
<?php $view_ip_admission_bill_summary->Procedure->EditAttrs["onchange"] = "ew.autoFill(this);" . @$view_ip_admission_bill_summary->Procedure->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Procedure"><?php echo strval($view_ip_admission_bill_summary->Procedure->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_ip_admission_bill_summary->Procedure->ViewValue) : $view_ip_admission_bill_summary->Procedure->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_admission_bill_summary->Procedure->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_ip_admission_bill_summary->Procedure->ReadOnly || $view_ip_admission_bill_summary->Procedure->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Procedure',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_admission_bill_summary->Procedure->Lookup->getParamTag("p_x_Procedure") ?>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_Procedure" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_admission_bill_summary->Procedure->displayValueSeparatorAttribute() ?>" name="x_Procedure" id="x_Procedure" value="<?php echo $view_ip_admission_bill_summary->Procedure->CurrentValue ?>"<?php echo $view_ip_admission_bill_summary->Procedure->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_admission_bill_summary->Procedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->Consultant->Visible) { // Consultant ?>
	<div id="r_Consultant" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_Consultant" for="x_Consultant" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_Consultant" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->Consultant->caption() ?><?php echo ($view_ip_admission_bill_summary->Consultant->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->Consultant->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Consultant" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_Consultant">
<span<?php echo $view_ip_admission_bill_summary->Consultant->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->Consultant->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->Consultant->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->Consultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->Anesthetist->Visible) { // Anesthetist ?>
	<div id="r_Anesthetist" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_Anesthetist" for="x_Anesthetist" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_Anesthetist" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->Anesthetist->caption() ?><?php echo ($view_ip_admission_bill_summary->Anesthetist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->Anesthetist->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Anesthetist" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_Anesthetist">
<span<?php echo $view_ip_admission_bill_summary->Anesthetist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->Anesthetist->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_Anesthetist" name="x_Anesthetist" id="x_Anesthetist" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->Anesthetist->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->Anesthetist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->Amound->Visible) { // Amound ?>
	<div id="r_Amound" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_Amound" for="x_Amound" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_Amound" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->Amound->caption() ?><?php echo ($view_ip_admission_bill_summary->Amound->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->Amound->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Amound" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_Amound">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_Amound" name="x_Amound" id="x_Amound" size="30" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary->Amound->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary->Amound->EditValue ?>"<?php echo $view_ip_admission_bill_summary->Amound->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_admission_bill_summary->Amound->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_patient_id" for="x_patient_id" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_patient_id" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->patient_id->caption() ?><?php echo ($view_ip_admission_bill_summary->patient_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->patient_id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_patient_id" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_patient_id">
<span<?php echo $view_ip_admission_bill_summary->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_admission_bill_summary->patient_id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" value="<?php echo HtmlEncode($view_ip_admission_bill_summary->patient_id->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->Package->Visible) { // Package ?>
	<div id="r_Package" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_Package" for="x_Package" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_Package" class="view_ip_admission_bill_summaryedit" type="text/html"><span><?php echo $view_ip_admission_bill_summary->Package->caption() ?><?php echo ($view_ip_admission_bill_summary->Package->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div<?php echo $view_ip_admission_bill_summary->Package->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Package" class="view_ip_admission_bill_summaryedit" type="text/html">
<span id="el_view_ip_admission_bill_summary_Package">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_Package" name="x_Package" id="x_Package" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary->Package->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary->Package->EditValue ?>"<?php echo $view_ip_admission_bill_summary->Package->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_admission_bill_summary->Package->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_ip_admission_bill_summaryedit" class="ew-custom-template"></div>
<script id="tpm_view_ip_admission_bill_summaryedit" type="text/html">
<div id="ct_view_ip_admission_bill_summary_edit"><style>
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
	<span hidden class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_profilePic"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_profilePic"/}}</span>
	<span hidden class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_Consultant"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_Consultant"/}}</span>
<div hidden class="row">
	<div class="col-12">
		<table style="width:100%">
			<tr>
				<td>{{include tmpl="#tpc_view_ip_admission_bill_summary_patient_id"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_patient_id"/}}</td>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_PatientID"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_PatientID"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_patient_name"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_patient_name"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_gender"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_gender"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_age"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_age"/}}</span>
				  </div>
				   <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpx_DOB"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_mobileno"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_mobileno"/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_mrnNo"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_mrnNo"/}}</span>
				  </div>
				 <div hidden class="ew-row">
					<img id="patientPropic" src=""  height="100" width="100">
				  </div>
				 <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpx_PartnerID"/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpx_PartnerName"/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpx_PartnerMobile"/}}</span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
	  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_ReportHeader"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_ReportHeader"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_admission_date"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_admission_date"/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_physician_id"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_physician_id"/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_Anesthetist"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_Anesthetist"/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_release_date"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_release_date"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_Procedure"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_Procedure"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_Amound"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_Amound"/}}</span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div  class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#7D3C98">
				<h3 class="card-title">Patient Visit Details</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div hidden class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpx_IDProof"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_typeRegsisteration"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_typeRegsisteration"/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_PaymentCategory"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_PaymentCategory"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_PaymentStatus"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_PaymentStatus"/}}</span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div hidden class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#1F618D">
				<h3 class="card-title">Refered By.</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_ReferedByDr"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_ReferedByDr"/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_ReferClinicname"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_ReferClinicname"/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_ReferMobileNo"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_ReferMobileNo"/}}</span>
				  </div>
				<div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_ReferCity"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_ReferCity"/}}</span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<table class="ew-table">
	 <tbody>
		<tr><td></td><td>{{include tmpl="#tpc_view_ip_admission_bill_summary_BillClosing"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_BillClosing"/}}</td><td>{{include tmpl="#tpc_view_ip_admission_bill_summary_BillClosingDate"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_BillClosingDate"/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_view_ip_admission_bill_summary_BillAmount"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_BillAmount"/}}</td><td>{{include tmpl="#tpc_view_ip_admission_bill_summary_ClosingAmount"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_ClosingAmount"/}}</td><td>{{include tmpl="#tpc_view_ip_admission_bill_summary_ClosingType"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_ClosingType"/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_view_ip_admission_bill_summary_BillNumber"/}}&nbsp;{{include tmpl="#tpx_view_ip_admission_bill_summary_BillNumber"/}}</td><td></td><td></td></tr>
	</tbody>
</table>
</div>
</script>
<?php if (!$view_ip_admission_bill_summary_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_ip_admission_bill_summary_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_ip_admission_bill_summary_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ip_admission_bill_summary->Rows) ?> };
ew.applyTemplate("tpd_view_ip_admission_bill_summaryedit", "tpm_view_ip_admission_bill_summaryedit", "view_ip_admission_bill_summaryedit", "<?php echo $view_ip_admission_bill_summary->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_ip_admission_bill_summaryedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ip_admission_bill_summary_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

document.getElementById('x_BillNumber').readOnly = true;
</script>
<?php include_once "footer.php" ?>
<?php
$view_ip_admission_bill_summary_edit->terminate();
?>