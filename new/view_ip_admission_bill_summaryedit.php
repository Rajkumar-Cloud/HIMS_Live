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
<?php include_once "header.php"; ?>
<script>
var fview_ip_admission_bill_summaryedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fview_ip_admission_bill_summaryedit = currentForm = new ew.Form("fview_ip_admission_bill_summaryedit", "edit");

	// Validate form
	fview_ip_admission_bill_summaryedit.validate = function() {
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
			<?php if ($view_ip_admission_bill_summary_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->id->caption(), $view_ip_admission_bill_summary_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->mrnNo->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->mrnNo->caption(), $view_ip_admission_bill_summary_edit->mrnNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->PatientID->caption(), $view_ip_admission_bill_summary_edit->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->patient_name->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->patient_name->caption(), $view_ip_admission_bill_summary_edit->patient_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->mobileno->Required) { ?>
				elm = this.getElements("x" + infix + "_mobileno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->mobileno->caption(), $view_ip_admission_bill_summary_edit->mobileno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->profilePic->caption(), $view_ip_admission_bill_summary_edit->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->gender->Required) { ?>
				elm = this.getElements("x" + infix + "_gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->gender->caption(), $view_ip_admission_bill_summary_edit->gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->age->Required) { ?>
				elm = this.getElements("x" + infix + "_age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->age->caption(), $view_ip_admission_bill_summary_edit->age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->physician_id->Required) { ?>
				elm = this.getElements("x" + infix + "_physician_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->physician_id->caption(), $view_ip_admission_bill_summary_edit->physician_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->typeRegsisteration->Required) { ?>
				elm = this.getElements("x" + infix + "_typeRegsisteration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->typeRegsisteration->caption(), $view_ip_admission_bill_summary_edit->typeRegsisteration->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->PaymentCategory->Required) { ?>
				elm = this.getElements("x" + infix + "_PaymentCategory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->PaymentCategory->caption(), $view_ip_admission_bill_summary_edit->PaymentCategory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->admission_consultant_id->Required) { ?>
				elm = this.getElements("x" + infix + "_admission_consultant_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->admission_consultant_id->caption(), $view_ip_admission_bill_summary_edit->admission_consultant_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->leading_consultant_id->Required) { ?>
				elm = this.getElements("x" + infix + "_leading_consultant_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->leading_consultant_id->caption(), $view_ip_admission_bill_summary_edit->leading_consultant_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->cause->Required) { ?>
				elm = this.getElements("x" + infix + "_cause");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->cause->caption(), $view_ip_admission_bill_summary_edit->cause->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->admission_date->Required) { ?>
				elm = this.getElements("x" + infix + "_admission_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->admission_date->caption(), $view_ip_admission_bill_summary_edit->admission_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_admission_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_admission_bill_summary_edit->admission_date->errorMessage()) ?>");
			<?php if ($view_ip_admission_bill_summary_edit->release_date->Required) { ?>
				elm = this.getElements("x" + infix + "_release_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->release_date->caption(), $view_ip_admission_bill_summary_edit->release_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_release_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_admission_bill_summary_edit->release_date->errorMessage()) ?>");
			<?php if ($view_ip_admission_bill_summary_edit->PaymentStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_PaymentStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->PaymentStatus->caption(), $view_ip_admission_bill_summary_edit->PaymentStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->status->caption(), $view_ip_admission_bill_summary_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->createdby->caption(), $view_ip_admission_bill_summary_edit->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->createddatetime->caption(), $view_ip_admission_bill_summary_edit->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->modifiedby->caption(), $view_ip_admission_bill_summary_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_admission_bill_summary_edit->modifiedby->errorMessage()) ?>");
			<?php if ($view_ip_admission_bill_summary_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->modifieddatetime->caption(), $view_ip_admission_bill_summary_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_admission_bill_summary_edit->modifieddatetime->errorMessage()) ?>");
			<?php if ($view_ip_admission_bill_summary_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->HospID->caption(), $view_ip_admission_bill_summary_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->ReferedByDr->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferedByDr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->ReferedByDr->caption(), $view_ip_admission_bill_summary_edit->ReferedByDr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->ReferClinicname->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferClinicname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->ReferClinicname->caption(), $view_ip_admission_bill_summary_edit->ReferClinicname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->ReferCity->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferCity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->ReferCity->caption(), $view_ip_admission_bill_summary_edit->ReferCity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->ReferMobileNo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferMobileNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->ReferMobileNo->caption(), $view_ip_admission_bill_summary_edit->ReferMobileNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->ReferA4TreatingConsultant->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferA4TreatingConsultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->ReferA4TreatingConsultant->caption(), $view_ip_admission_bill_summary_edit->ReferA4TreatingConsultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->PurposreReferredfor->Required) { ?>
				elm = this.getElements("x" + infix + "_PurposreReferredfor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->PurposreReferredfor->caption(), $view_ip_admission_bill_summary_edit->PurposreReferredfor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->BillClosing->Required) { ?>
				elm = this.getElements("x" + infix + "_BillClosing");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->BillClosing->caption(), $view_ip_admission_bill_summary_edit->BillClosing->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->BillClosingDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillClosingDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->BillClosingDate->caption(), $view_ip_admission_bill_summary_edit->BillClosingDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillClosingDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_admission_bill_summary_edit->BillClosingDate->errorMessage()) ?>");
			<?php if ($view_ip_admission_bill_summary_edit->BillNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_BillNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->BillNumber->caption(), $view_ip_admission_bill_summary_edit->BillNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->ClosingAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_ClosingAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->ClosingAmount->caption(), $view_ip_admission_bill_summary_edit->ClosingAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->ClosingType->Required) { ?>
				elm = this.getElements("x" + infix + "_ClosingType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->ClosingType->caption(), $view_ip_admission_bill_summary_edit->ClosingType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->BillAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_BillAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->BillAmount->caption(), $view_ip_admission_bill_summary_edit->BillAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->billclosedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_billclosedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->billclosedBy->caption(), $view_ip_admission_bill_summary_edit->billclosedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->bllcloseByDate->Required) { ?>
				elm = this.getElements("x" + infix + "_bllcloseByDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->bllcloseByDate->caption(), $view_ip_admission_bill_summary_edit->bllcloseByDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->ReportHeader->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportHeader[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->ReportHeader->caption(), $view_ip_admission_bill_summary_edit->ReportHeader->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->Procedure->Required) { ?>
				elm = this.getElements("x" + infix + "_Procedure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->Procedure->caption(), $view_ip_admission_bill_summary_edit->Procedure->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->Consultant->Required) { ?>
				elm = this.getElements("x" + infix + "_Consultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->Consultant->caption(), $view_ip_admission_bill_summary_edit->Consultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->Anesthetist->Required) { ?>
				elm = this.getElements("x" + infix + "_Anesthetist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->Anesthetist->caption(), $view_ip_admission_bill_summary_edit->Anesthetist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->Amound->Required) { ?>
				elm = this.getElements("x" + infix + "_Amound");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->Amound->caption(), $view_ip_admission_bill_summary_edit->Amound->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amound");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_admission_bill_summary_edit->Amound->errorMessage()) ?>");
			<?php if ($view_ip_admission_bill_summary_edit->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->patient_id->caption(), $view_ip_admission_bill_summary_edit->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_admission_bill_summary_edit->Package->Required) { ?>
				elm = this.getElements("x" + infix + "_Package");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_admission_bill_summary_edit->Package->caption(), $view_ip_admission_bill_summary_edit->Package->RequiredErrorMessage)) ?>");
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
	fview_ip_admission_bill_summaryedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_ip_admission_bill_summaryedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_ip_admission_bill_summaryedit.lists["x_PaymentCategory"] = <?php echo $view_ip_admission_bill_summary_edit->PaymentCategory->Lookup->toClientList($view_ip_admission_bill_summary_edit) ?>;
	fview_ip_admission_bill_summaryedit.lists["x_PaymentCategory"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_edit->PaymentCategory->lookupOptions()) ?>;
	fview_ip_admission_bill_summaryedit.lists["x_PaymentStatus"] = <?php echo $view_ip_admission_bill_summary_edit->PaymentStatus->Lookup->toClientList($view_ip_admission_bill_summary_edit) ?>;
	fview_ip_admission_bill_summaryedit.lists["x_PaymentStatus"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_edit->PaymentStatus->lookupOptions()) ?>;
	fview_ip_admission_bill_summaryedit.lists["x_BillClosing"] = <?php echo $view_ip_admission_bill_summary_edit->BillClosing->Lookup->toClientList($view_ip_admission_bill_summary_edit) ?>;
	fview_ip_admission_bill_summaryedit.lists["x_BillClosing"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_edit->BillClosing->options(FALSE, TRUE)) ?>;
	fview_ip_admission_bill_summaryedit.lists["x_ReportHeader[]"] = <?php echo $view_ip_admission_bill_summary_edit->ReportHeader->Lookup->toClientList($view_ip_admission_bill_summary_edit) ?>;
	fview_ip_admission_bill_summaryedit.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_edit->ReportHeader->options(FALSE, TRUE)) ?>;
	fview_ip_admission_bill_summaryedit.lists["x_Procedure"] = <?php echo $view_ip_admission_bill_summary_edit->Procedure->Lookup->toClientList($view_ip_admission_bill_summary_edit) ?>;
	fview_ip_admission_bill_summaryedit.lists["x_Procedure"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_edit->Procedure->lookupOptions()) ?>;
	loadjs.done("fview_ip_admission_bill_summaryedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_ip_admission_bill_summary_edit->showPageHeader(); ?>
<?php
$view_ip_admission_bill_summary_edit->showMessage();
?>
<form name="fview_ip_admission_bill_summaryedit" id="fview_ip_admission_bill_summaryedit" class="<?php echo $view_ip_admission_bill_summary_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_admission_bill_summary">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_admission_bill_summary_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($view_ip_admission_bill_summary_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_id" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_id" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->id->caption() ?><?php echo $view_ip_admission_bill_summary_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_id" type="text/html"><span id="el_view_ip_admission_bill_summary_id">
<span<?php echo $view_ip_admission_bill_summary_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->id->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->mrnNo->Visible) { // mrnNo ?>
	<div id="r_mrnNo" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_mrnNo" for="x_mrnNo" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_mrnNo" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->mrnNo->caption() ?><?php echo $view_ip_admission_bill_summary_edit->mrnNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->mrnNo->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_mrnNo" type="text/html"><span id="el_view_ip_admission_bill_summary_mrnNo">
<span<?php echo $view_ip_admission_bill_summary_edit->mrnNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->mrnNo->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->mrnNo->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->mrnNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_PatientID" for="x_PatientID" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_PatientID" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->PatientID->caption() ?><?php echo $view_ip_admission_bill_summary_edit->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->PatientID->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_PatientID" type="text/html"><span id="el_view_ip_admission_bill_summary_PatientID">
<span<?php echo $view_ip_admission_bill_summary_edit->PatientID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->PatientID->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->PatientID->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->patient_name->Visible) { // patient_name ?>
	<div id="r_patient_name" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_patient_name" for="x_patient_name" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_patient_name" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->patient_name->caption() ?><?php echo $view_ip_admission_bill_summary_edit->patient_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->patient_name->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_patient_name" type="text/html"><span id="el_view_ip_admission_bill_summary_patient_name">
<span<?php echo $view_ip_admission_bill_summary_edit->patient_name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->patient_name->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->patient_name->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->patient_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->mobileno->Visible) { // mobileno ?>
	<div id="r_mobileno" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_mobileno" for="x_mobileno" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_mobileno" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->mobileno->caption() ?><?php echo $view_ip_admission_bill_summary_edit->mobileno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->mobileno->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_mobileno" type="text/html"><span id="el_view_ip_admission_bill_summary_mobileno">
<span<?php echo $view_ip_admission_bill_summary_edit->mobileno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->mobileno->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->mobileno->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->mobileno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_profilePic" for="x_profilePic" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_profilePic" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->profilePic->caption() ?><?php echo $view_ip_admission_bill_summary_edit->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->profilePic->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_profilePic" type="text/html"><span id="el_view_ip_admission_bill_summary_profilePic">
<span<?php echo $view_ip_admission_bill_summary_edit->profilePic->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_edit->profilePic->EditValue ?></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->profilePic->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_gender" for="x_gender" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_gender" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->gender->caption() ?><?php echo $view_ip_admission_bill_summary_edit->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->gender->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_gender" type="text/html"><span id="el_view_ip_admission_bill_summary_gender">
<span<?php echo $view_ip_admission_bill_summary_edit->gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->gender->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_gender" name="x_gender" id="x_gender" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->gender->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->age->Visible) { // age ?>
	<div id="r_age" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_age" for="x_age" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_age" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->age->caption() ?><?php echo $view_ip_admission_bill_summary_edit->age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->age->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_age" type="text/html"><span id="el_view_ip_admission_bill_summary_age">
<span<?php echo $view_ip_admission_bill_summary_edit->age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->age->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_age" name="x_age" id="x_age" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->age->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->physician_id->Visible) { // physician_id ?>
	<div id="r_physician_id" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_physician_id" for="x_physician_id" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_physician_id" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->physician_id->caption() ?><?php echo $view_ip_admission_bill_summary_edit->physician_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->physician_id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_physician_id" type="text/html"><span id="el_view_ip_admission_bill_summary_physician_id">
<span<?php echo $view_ip_admission_bill_summary_edit->physician_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->physician_id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_physician_id" name="x_physician_id" id="x_physician_id" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->physician_id->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->physician_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<div id="r_typeRegsisteration" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_typeRegsisteration" for="x_typeRegsisteration" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_typeRegsisteration" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->typeRegsisteration->caption() ?><?php echo $view_ip_admission_bill_summary_edit->typeRegsisteration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->typeRegsisteration->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_typeRegsisteration" type="text/html"><span id="el_view_ip_admission_bill_summary_typeRegsisteration">
<span<?php echo $view_ip_admission_bill_summary_edit->typeRegsisteration->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->typeRegsisteration->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_typeRegsisteration" name="x_typeRegsisteration" id="x_typeRegsisteration" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->typeRegsisteration->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->typeRegsisteration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->PaymentCategory->Visible) { // PaymentCategory ?>
	<div id="r_PaymentCategory" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_PaymentCategory" for="x_PaymentCategory" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_PaymentCategory" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->PaymentCategory->caption() ?><?php echo $view_ip_admission_bill_summary_edit->PaymentCategory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->PaymentCategory->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_PaymentCategory" type="text/html"><span id="el_view_ip_admission_bill_summary_PaymentCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_admission_bill_summary" data-field="x_PaymentCategory" data-value-separator="<?php echo $view_ip_admission_bill_summary_edit->PaymentCategory->displayValueSeparatorAttribute() ?>" id="x_PaymentCategory" name="x_PaymentCategory"<?php echo $view_ip_admission_bill_summary_edit->PaymentCategory->editAttributes() ?>>
			<?php echo $view_ip_admission_bill_summary_edit->PaymentCategory->selectOptionListHtml("x_PaymentCategory") ?>
		</select>
</div>
<?php echo $view_ip_admission_bill_summary_edit->PaymentCategory->Lookup->getParamTag($view_ip_admission_bill_summary_edit, "p_x_PaymentCategory") ?>
</span></script>
<?php echo $view_ip_admission_bill_summary_edit->PaymentCategory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<div id="r_admission_consultant_id" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_admission_consultant_id" for="x_admission_consultant_id" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_admission_consultant_id" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->admission_consultant_id->caption() ?><?php echo $view_ip_admission_bill_summary_edit->admission_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->admission_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_admission_consultant_id" type="text/html"><span id="el_view_ip_admission_bill_summary_admission_consultant_id">
<span<?php echo $view_ip_admission_bill_summary_edit->admission_consultant_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->admission_consultant_id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_admission_consultant_id" name="x_admission_consultant_id" id="x_admission_consultant_id" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->admission_consultant_id->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->admission_consultant_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<div id="r_leading_consultant_id" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_leading_consultant_id" for="x_leading_consultant_id" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_leading_consultant_id" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->leading_consultant_id->caption() ?><?php echo $view_ip_admission_bill_summary_edit->leading_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->leading_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_leading_consultant_id" type="text/html"><span id="el_view_ip_admission_bill_summary_leading_consultant_id">
<span<?php echo $view_ip_admission_bill_summary_edit->leading_consultant_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->leading_consultant_id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_leading_consultant_id" name="x_leading_consultant_id" id="x_leading_consultant_id" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->leading_consultant_id->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->leading_consultant_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->cause->Visible) { // cause ?>
	<div id="r_cause" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_cause" for="x_cause" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_cause" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->cause->caption() ?><?php echo $view_ip_admission_bill_summary_edit->cause->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->cause->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_cause" type="text/html"><span id="el_view_ip_admission_bill_summary_cause">
<span<?php echo $view_ip_admission_bill_summary_edit->cause->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_edit->cause->EditValue ?></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_cause" name="x_cause" id="x_cause" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->cause->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->cause->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->admission_date->Visible) { // admission_date ?>
	<div id="r_admission_date" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_admission_date" for="x_admission_date" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_admission_date" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->admission_date->caption() ?><?php echo $view_ip_admission_bill_summary_edit->admission_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->admission_date->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_admission_date" type="text/html"><span id="el_view_ip_admission_bill_summary_admission_date">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_admission_date" name="x_admission_date" id="x_admission_date" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->admission_date->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary_edit->admission_date->EditValue ?>"<?php echo $view_ip_admission_bill_summary_edit->admission_date->editAttributes() ?>>
<?php if (!$view_ip_admission_bill_summary_edit->admission_date->ReadOnly && !$view_ip_admission_bill_summary_edit->admission_date->Disabled && !isset($view_ip_admission_bill_summary_edit->admission_date->EditAttrs["readonly"]) && !isset($view_ip_admission_bill_summary_edit->admission_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_ip_admission_bill_summaryedit_js">
loadjs.ready(["fview_ip_admission_bill_summaryedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_admission_bill_summaryedit", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $view_ip_admission_bill_summary_edit->admission_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->release_date->Visible) { // release_date ?>
	<div id="r_release_date" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_release_date" for="x_release_date" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_release_date" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->release_date->caption() ?><?php echo $view_ip_admission_bill_summary_edit->release_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->release_date->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_release_date" type="text/html"><span id="el_view_ip_admission_bill_summary_release_date">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_release_date" name="x_release_date" id="x_release_date" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->release_date->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary_edit->release_date->EditValue ?>"<?php echo $view_ip_admission_bill_summary_edit->release_date->editAttributes() ?>>
<?php if (!$view_ip_admission_bill_summary_edit->release_date->ReadOnly && !$view_ip_admission_bill_summary_edit->release_date->Disabled && !isset($view_ip_admission_bill_summary_edit->release_date->EditAttrs["readonly"]) && !isset($view_ip_admission_bill_summary_edit->release_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_ip_admission_bill_summaryedit_js">
loadjs.ready(["fview_ip_admission_bill_summaryedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_admission_bill_summaryedit", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $view_ip_admission_bill_summary_edit->release_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->PaymentStatus->Visible) { // PaymentStatus ?>
	<div id="r_PaymentStatus" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_PaymentStatus" for="x_PaymentStatus" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_PaymentStatus" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->PaymentStatus->caption() ?><?php echo $view_ip_admission_bill_summary_edit->PaymentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->PaymentStatus->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_PaymentStatus" type="text/html"><span id="el_view_ip_admission_bill_summary_PaymentStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_admission_bill_summary" data-field="x_PaymentStatus" data-value-separator="<?php echo $view_ip_admission_bill_summary_edit->PaymentStatus->displayValueSeparatorAttribute() ?>" id="x_PaymentStatus" name="x_PaymentStatus"<?php echo $view_ip_admission_bill_summary_edit->PaymentStatus->editAttributes() ?>>
			<?php echo $view_ip_admission_bill_summary_edit->PaymentStatus->selectOptionListHtml("x_PaymentStatus") ?>
		</select>
</div>
<?php echo $view_ip_admission_bill_summary_edit->PaymentStatus->Lookup->getParamTag($view_ip_admission_bill_summary_edit, "p_x_PaymentStatus") ?>
</span></script>
<?php echo $view_ip_admission_bill_summary_edit->PaymentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_status" for="x_status" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_status" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->status->caption() ?><?php echo $view_ip_admission_bill_summary_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->status->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_status" type="text/html"><span id="el_view_ip_admission_bill_summary_status">
<span<?php echo $view_ip_admission_bill_summary_edit->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->status->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_status" name="x_status" id="x_status" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->status->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_createdby" for="x_createdby" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_createdby" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->createdby->caption() ?><?php echo $view_ip_admission_bill_summary_edit->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->createdby->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_createdby" type="text/html"><span id="el_view_ip_admission_bill_summary_createdby">
<span<?php echo $view_ip_admission_bill_summary_edit->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->createdby->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_createdby" name="x_createdby" id="x_createdby" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->createdby->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_createddatetime" for="x_createddatetime" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_createddatetime" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->createddatetime->caption() ?><?php echo $view_ip_admission_bill_summary_edit->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->createddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_createddatetime" type="text/html"><span id="el_view_ip_admission_bill_summary_createddatetime">
<span<?php echo $view_ip_admission_bill_summary_edit->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->createddatetime->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->createddatetime->CurrentValue) ?>">
<script type="text/html" class="view_ip_admission_bill_summaryedit_js">
loadjs.ready(["fview_ip_admission_bill_summaryedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_admission_bill_summaryedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $view_ip_admission_bill_summary_edit->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_modifiedby" for="x_modifiedby" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_modifiedby" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->modifiedby->caption() ?><?php echo $view_ip_admission_bill_summary_edit->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->modifiedby->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_modifiedby" type="text/html"><span id="el_view_ip_admission_bill_summary_modifiedby">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary_edit->modifiedby->EditValue ?>"<?php echo $view_ip_admission_bill_summary_edit->modifiedby->editAttributes() ?>>
</span></script>
<?php echo $view_ip_admission_bill_summary_edit->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_modifieddatetime" for="x_modifieddatetime" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_modifieddatetime" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->modifieddatetime->caption() ?><?php echo $view_ip_admission_bill_summary_edit->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_modifieddatetime" type="text/html"><span id="el_view_ip_admission_bill_summary_modifieddatetime">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary_edit->modifieddatetime->EditValue ?>"<?php echo $view_ip_admission_bill_summary_edit->modifieddatetime->editAttributes() ?>>
<?php if (!$view_ip_admission_bill_summary_edit->modifieddatetime->ReadOnly && !$view_ip_admission_bill_summary_edit->modifieddatetime->Disabled && !isset($view_ip_admission_bill_summary_edit->modifieddatetime->EditAttrs["readonly"]) && !isset($view_ip_admission_bill_summary_edit->modifieddatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_ip_admission_bill_summaryedit_js">
loadjs.ready(["fview_ip_admission_bill_summaryedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_admission_bill_summaryedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $view_ip_admission_bill_summary_edit->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_HospID" for="x_HospID" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_HospID" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->HospID->caption() ?><?php echo $view_ip_admission_bill_summary_edit->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->HospID->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_HospID" type="text/html"><span id="el_view_ip_admission_bill_summary_HospID">
<span<?php echo $view_ip_admission_bill_summary_edit->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->HospID->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->HospID->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->ReferedByDr->Visible) { // ReferedByDr ?>
	<div id="r_ReferedByDr" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_ReferedByDr" for="x_ReferedByDr" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_ReferedByDr" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->ReferedByDr->caption() ?><?php echo $view_ip_admission_bill_summary_edit->ReferedByDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->ReferedByDr->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferedByDr" type="text/html"><span id="el_view_ip_admission_bill_summary_ReferedByDr">
<span<?php echo $view_ip_admission_bill_summary_edit->ReferedByDr->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->ReferedByDr->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_ReferedByDr" name="x_ReferedByDr" id="x_ReferedByDr" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->ReferedByDr->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->ReferedByDr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_ReferClinicname" for="x_ReferClinicname" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_ReferClinicname" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->ReferClinicname->caption() ?><?php echo $view_ip_admission_bill_summary_edit->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->ReferClinicname->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferClinicname" type="text/html"><span id="el_view_ip_admission_bill_summary_ReferClinicname">
<span<?php echo $view_ip_admission_bill_summary_edit->ReferClinicname->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->ReferClinicname->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->ReferClinicname->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->ReferClinicname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_ReferCity" for="x_ReferCity" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_ReferCity" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->ReferCity->caption() ?><?php echo $view_ip_admission_bill_summary_edit->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->ReferCity->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferCity" type="text/html"><span id="el_view_ip_admission_bill_summary_ReferCity">
<span<?php echo $view_ip_admission_bill_summary_edit->ReferCity->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->ReferCity->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->ReferCity->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->ReferCity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_ReferMobileNo" for="x_ReferMobileNo" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_ReferMobileNo" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->ReferMobileNo->caption() ?><?php echo $view_ip_admission_bill_summary_edit->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferMobileNo" type="text/html"><span id="el_view_ip_admission_bill_summary_ReferMobileNo">
<span<?php echo $view_ip_admission_bill_summary_edit->ReferMobileNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->ReferMobileNo->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->ReferMobileNo->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->ReferMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div id="r_ReferA4TreatingConsultant" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_ReferA4TreatingConsultant" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->ReferA4TreatingConsultant->caption() ?><?php echo $view_ip_admission_bill_summary_edit->ReferA4TreatingConsultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferA4TreatingConsultant" type="text/html"><span id="el_view_ip_admission_bill_summary_ReferA4TreatingConsultant">
<span<?php echo $view_ip_admission_bill_summary_edit->ReferA4TreatingConsultant->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->ReferA4TreatingConsultant->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_ReferA4TreatingConsultant" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->ReferA4TreatingConsultant->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->ReferA4TreatingConsultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div id="r_PurposreReferredfor" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_PurposreReferredfor" for="x_PurposreReferredfor" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_PurposreReferredfor" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->PurposreReferredfor->caption() ?><?php echo $view_ip_admission_bill_summary_edit->PurposreReferredfor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_PurposreReferredfor" type="text/html"><span id="el_view_ip_admission_bill_summary_PurposreReferredfor">
<span<?php echo $view_ip_admission_bill_summary_edit->PurposreReferredfor->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->PurposreReferredfor->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->PurposreReferredfor->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->PurposreReferredfor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->BillClosing->Visible) { // BillClosing ?>
	<div id="r_BillClosing" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_BillClosing" for="x_BillClosing" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_BillClosing" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->BillClosing->caption() ?><?php echo $view_ip_admission_bill_summary_edit->BillClosing->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->BillClosing->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_BillClosing" type="text/html"><span id="el_view_ip_admission_bill_summary_BillClosing">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_admission_bill_summary" data-field="x_BillClosing" data-value-separator="<?php echo $view_ip_admission_bill_summary_edit->BillClosing->displayValueSeparatorAttribute() ?>" id="x_BillClosing" name="x_BillClosing"<?php echo $view_ip_admission_bill_summary_edit->BillClosing->editAttributes() ?>>
			<?php echo $view_ip_admission_bill_summary_edit->BillClosing->selectOptionListHtml("x_BillClosing") ?>
		</select>
</div>
</span></script>
<?php echo $view_ip_admission_bill_summary_edit->BillClosing->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->BillClosingDate->Visible) { // BillClosingDate ?>
	<div id="r_BillClosingDate" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_BillClosingDate" for="x_BillClosingDate" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_BillClosingDate" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->BillClosingDate->caption() ?><?php echo $view_ip_admission_bill_summary_edit->BillClosingDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->BillClosingDate->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_BillClosingDate" type="text/html"><span id="el_view_ip_admission_bill_summary_BillClosingDate">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_BillClosingDate" name="x_BillClosingDate" id="x_BillClosingDate" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->BillClosingDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary_edit->BillClosingDate->EditValue ?>"<?php echo $view_ip_admission_bill_summary_edit->BillClosingDate->editAttributes() ?>>
<?php if (!$view_ip_admission_bill_summary_edit->BillClosingDate->ReadOnly && !$view_ip_admission_bill_summary_edit->BillClosingDate->Disabled && !isset($view_ip_admission_bill_summary_edit->BillClosingDate->EditAttrs["readonly"]) && !isset($view_ip_admission_bill_summary_edit->BillClosingDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_ip_admission_bill_summaryedit_js">
loadjs.ready(["fview_ip_admission_bill_summaryedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_admission_bill_summaryedit", "x_BillClosingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $view_ip_admission_bill_summary_edit->BillClosingDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_BillNumber" for="x_BillNumber" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_BillNumber" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->BillNumber->caption() ?><?php echo $view_ip_admission_bill_summary_edit->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->BillNumber->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_BillNumber" type="text/html"><span id="el_view_ip_admission_bill_summary_BillNumber">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary_edit->BillNumber->EditValue ?>"<?php echo $view_ip_admission_bill_summary_edit->BillNumber->editAttributes() ?>>
</span></script>
<?php echo $view_ip_admission_bill_summary_edit->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->ClosingAmount->Visible) { // ClosingAmount ?>
	<div id="r_ClosingAmount" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_ClosingAmount" for="x_ClosingAmount" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_ClosingAmount" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->ClosingAmount->caption() ?><?php echo $view_ip_admission_bill_summary_edit->ClosingAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->ClosingAmount->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ClosingAmount" type="text/html"><span id="el_view_ip_admission_bill_summary_ClosingAmount">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_ClosingAmount" name="x_ClosingAmount" id="x_ClosingAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->ClosingAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary_edit->ClosingAmount->EditValue ?>"<?php echo $view_ip_admission_bill_summary_edit->ClosingAmount->editAttributes() ?>>
</span></script>
<?php echo $view_ip_admission_bill_summary_edit->ClosingAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->ClosingType->Visible) { // ClosingType ?>
	<div id="r_ClosingType" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_ClosingType" for="x_ClosingType" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_ClosingType" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->ClosingType->caption() ?><?php echo $view_ip_admission_bill_summary_edit->ClosingType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->ClosingType->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ClosingType" type="text/html"><span id="el_view_ip_admission_bill_summary_ClosingType">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_ClosingType" name="x_ClosingType" id="x_ClosingType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->ClosingType->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary_edit->ClosingType->EditValue ?>"<?php echo $view_ip_admission_bill_summary_edit->ClosingType->editAttributes() ?>>
</span></script>
<?php echo $view_ip_admission_bill_summary_edit->ClosingType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->BillAmount->Visible) { // BillAmount ?>
	<div id="r_BillAmount" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_BillAmount" for="x_BillAmount" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_BillAmount" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->BillAmount->caption() ?><?php echo $view_ip_admission_bill_summary_edit->BillAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->BillAmount->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_BillAmount" type="text/html"><span id="el_view_ip_admission_bill_summary_BillAmount">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_BillAmount" name="x_BillAmount" id="x_BillAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->BillAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary_edit->BillAmount->EditValue ?>"<?php echo $view_ip_admission_bill_summary_edit->BillAmount->editAttributes() ?>>
</span></script>
<?php echo $view_ip_admission_bill_summary_edit->BillAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_ReportHeader" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_ReportHeader" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->ReportHeader->caption() ?><?php echo $view_ip_admission_bill_summary_edit->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReportHeader" type="text/html"><span id="el_view_ip_admission_bill_summary_ReportHeader">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_ip_admission_bill_summary" data-field="x_ReportHeader" data-value-separator="<?php echo $view_ip_admission_bill_summary_edit->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $view_ip_admission_bill_summary_edit->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ip_admission_bill_summary_edit->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span></script>
<?php echo $view_ip_admission_bill_summary_edit->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_Procedure" for="x_Procedure" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_Procedure" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->Procedure->caption() ?><?php echo $view_ip_admission_bill_summary_edit->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->Procedure->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Procedure" type="text/html"><span id="el_view_ip_admission_bill_summary_Procedure">
<?php $view_ip_admission_bill_summary_edit->Procedure->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Procedure"><?php echo EmptyValue(strval($view_ip_admission_bill_summary_edit->Procedure->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_ip_admission_bill_summary_edit->Procedure->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_admission_bill_summary_edit->Procedure->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_ip_admission_bill_summary_edit->Procedure->ReadOnly || $view_ip_admission_bill_summary_edit->Procedure->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Procedure',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_admission_bill_summary_edit->Procedure->Lookup->getParamTag($view_ip_admission_bill_summary_edit, "p_x_Procedure") ?>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_Procedure" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_admission_bill_summary_edit->Procedure->displayValueSeparatorAttribute() ?>" name="x_Procedure" id="x_Procedure" value="<?php echo $view_ip_admission_bill_summary_edit->Procedure->CurrentValue ?>"<?php echo $view_ip_admission_bill_summary_edit->Procedure->editAttributes() ?>>
</span></script>
<?php echo $view_ip_admission_bill_summary_edit->Procedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->Consultant->Visible) { // Consultant ?>
	<div id="r_Consultant" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_Consultant" for="x_Consultant" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_Consultant" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->Consultant->caption() ?><?php echo $view_ip_admission_bill_summary_edit->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->Consultant->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Consultant" type="text/html"><span id="el_view_ip_admission_bill_summary_Consultant">
<span<?php echo $view_ip_admission_bill_summary_edit->Consultant->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->Consultant->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->Consultant->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->Consultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->Anesthetist->Visible) { // Anesthetist ?>
	<div id="r_Anesthetist" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_Anesthetist" for="x_Anesthetist" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_Anesthetist" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->Anesthetist->caption() ?><?php echo $view_ip_admission_bill_summary_edit->Anesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->Anesthetist->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Anesthetist" type="text/html"><span id="el_view_ip_admission_bill_summary_Anesthetist">
<span<?php echo $view_ip_admission_bill_summary_edit->Anesthetist->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->Anesthetist->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_Anesthetist" name="x_Anesthetist" id="x_Anesthetist" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->Anesthetist->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->Anesthetist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->Amound->Visible) { // Amound ?>
	<div id="r_Amound" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_Amound" for="x_Amound" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_Amound" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->Amound->caption() ?><?php echo $view_ip_admission_bill_summary_edit->Amound->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->Amound->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Amound" type="text/html"><span id="el_view_ip_admission_bill_summary_Amound">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_Amound" name="x_Amound" id="x_Amound" size="30" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->Amound->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary_edit->Amound->EditValue ?>"<?php echo $view_ip_admission_bill_summary_edit->Amound->editAttributes() ?>>
</span></script>
<?php echo $view_ip_admission_bill_summary_edit->Amound->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_patient_id" for="x_patient_id" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_patient_id" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->patient_id->caption() ?><?php echo $view_ip_admission_bill_summary_edit->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->patient_id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_patient_id" type="text/html"><span id="el_view_ip_admission_bill_summary_patient_id">
<span<?php echo $view_ip_admission_bill_summary_edit->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_admission_bill_summary_edit->patient_id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->patient_id->CurrentValue) ?>">
<?php echo $view_ip_admission_bill_summary_edit->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_edit->Package->Visible) { // Package ?>
	<div id="r_Package" class="form-group row">
		<label id="elh_view_ip_admission_bill_summary_Package" for="x_Package" class="<?php echo $view_ip_admission_bill_summary_edit->LeftColumnClass ?>"><script id="tpc_view_ip_admission_bill_summary_Package" type="text/html"><?php echo $view_ip_admission_bill_summary_edit->Package->caption() ?><?php echo $view_ip_admission_bill_summary_edit->Package->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ip_admission_bill_summary_edit->RightColumnClass ?>"><div <?php echo $view_ip_admission_bill_summary_edit->Package->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Package" type="text/html"><span id="el_view_ip_admission_bill_summary_Package">
<input type="text" data-table="view_ip_admission_bill_summary" data-field="x_Package" name="x_Package" id="x_Package" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_admission_bill_summary_edit->Package->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission_bill_summary_edit->Package->EditValue ?>"<?php echo $view_ip_admission_bill_summary_edit->Package->editAttributes() ?>>
</span></script>
<?php echo $view_ip_admission_bill_summary_edit->Package->CustomMsg ?></div></div>
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
	<span hidden class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_profilePic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_profilePic")/}}</span>
	<span hidden class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_Consultant"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_Consultant")/}}</span>
<div hidden class="row">
	<div class="col-12">
		<table style="width:100%">
			<tr>
				<td>{{include tmpl="#tpc_view_ip_admission_bill_summary_patient_id"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_patient_id")/}}</td>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_PatientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_PatientID")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_patient_name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_patient_name")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_gender")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_age")/}}</span>
				  </div>
				   <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl=~getTemplate("#tpx_DOB")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_mobileno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_mobileno")/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_mrnNo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_mrnNo")/}}</span>
				  </div>
				 <div hidden class="ew-row">
					<img id="patientPropic" src=""  height="100" width="100">
				  </div>
				 <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl=~getTemplate("#tpx_PartnerID")/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl=~getTemplate("#tpx_PartnerName")/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl=~getTemplate("#tpx_PartnerMobile")/}}</span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
	  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_ReportHeader"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_ReportHeader")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_admission_date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_admission_date")/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_physician_id"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_physician_id")/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_Anesthetist"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_Anesthetist")/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_release_date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_release_date")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_Procedure"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_Procedure")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_Amound"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_Amound")/}}</span>
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
					<span class="ew-cell">{{include tmpl=~getTemplate("#tpx_IDProof")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_typeRegsisteration"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_typeRegsisteration")/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_PaymentCategory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_PaymentCategory")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_PaymentStatus"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_PaymentStatus")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_ReferedByDr"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_ReferedByDr")/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_ReferClinicname"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_ReferClinicname")/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_ReferMobileNo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_ReferMobileNo")/}}</span>
				  </div>
				<div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ip_admission_bill_summary_ReferCity"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_ReferCity")/}}</span>
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
		<tr><td></td><td>{{include tmpl="#tpc_view_ip_admission_bill_summary_BillClosing"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_BillClosing")/}}</td><td>{{include tmpl="#tpc_view_ip_admission_bill_summary_BillClosingDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_BillClosingDate")/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_view_ip_admission_bill_summary_BillAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_BillAmount")/}}</td><td>{{include tmpl="#tpc_view_ip_admission_bill_summary_ClosingAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_ClosingAmount")/}}</td><td>{{include tmpl="#tpc_view_ip_admission_bill_summary_ClosingType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_ClosingType")/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_view_ip_admission_bill_summary_BillNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ip_admission_bill_summary_BillNumber")/}}</td><td></td><td></td></tr>
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
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_ip_admission_bill_summary->Rows) ?> };
	ew.applyTemplate("tpd_view_ip_admission_bill_summaryedit", "tpm_view_ip_admission_bill_summaryedit", "view_ip_admission_bill_summaryedit", "<?php echo $view_ip_admission_bill_summary->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_ip_admission_bill_summaryedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_ip_admission_bill_summary_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	document.getElementById("x_BillNumber").readOnly=!0;
});
</script>
<?php include_once "footer.php"; ?>
<?php
$view_ip_admission_bill_summary_edit->terminate();
?>