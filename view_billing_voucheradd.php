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
$view_billing_voucher_add = new view_billing_voucher_add();

// Run the page
$view_billing_voucher_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_billing_voucher_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fview_billing_voucheradd = currentForm = new ew.Form("fview_billing_voucheradd", "add");

// Validate form
fview_billing_voucheradd.validate = function() {
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
		<?php if ($view_billing_voucher_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->createddatetime->caption(), $view_billing_voucher->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->createddatetime->errorMessage()) ?>");
		<?php if ($view_billing_voucher_add->BillNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_BillNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->BillNumber->caption(), $view_billing_voucher->BillNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->Reception->caption(), $view_billing_voucher->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->PatientId->caption(), $view_billing_voucher->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->mrnno->caption(), $view_billing_voucher->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->PatientName->caption(), $view_billing_voucher->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->Age->caption(), $view_billing_voucher->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->Gender->caption(), $view_billing_voucher->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->profilePic->caption(), $view_billing_voucher->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->Mobile->caption(), $view_billing_voucher->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->IP_OP->Required) { ?>
			elm = this.getElements("x" + infix + "_IP_OP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->IP_OP->caption(), $view_billing_voucher->IP_OP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->Doctor->Required) { ?>
			elm = this.getElements("x" + infix + "_Doctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->Doctor->caption(), $view_billing_voucher->Doctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->voucher_type->Required) { ?>
			elm = this.getElements("x" + infix + "_voucher_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->voucher_type->caption(), $view_billing_voucher->voucher_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->Details->caption(), $view_billing_voucher->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->ModeofPayment->caption(), $view_billing_voucher->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->Amount->caption(), $view_billing_voucher->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->Amount->errorMessage()) ?>");
		<?php if ($view_billing_voucher_add->AnyDues->Required) { ?>
			elm = this.getElements("x" + infix + "_AnyDues");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->AnyDues->caption(), $view_billing_voucher->AnyDues->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->DiscountAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->DiscountAmount->caption(), $view_billing_voucher->DiscountAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DiscountAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->DiscountAmount->errorMessage()) ?>");
		<?php if ($view_billing_voucher_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->createdby->caption(), $view_billing_voucher->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->RealizationAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->RealizationAmount->caption(), $view_billing_voucher->RealizationAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->RealizationAmount->errorMessage()) ?>");
		<?php if ($view_billing_voucher_add->RealizationStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->RealizationStatus->caption(), $view_billing_voucher->RealizationStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->RealizationRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->RealizationRemarks->caption(), $view_billing_voucher->RealizationRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->RealizationBatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationBatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->RealizationBatchNo->caption(), $view_billing_voucher->RealizationBatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->RealizationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->RealizationDate->caption(), $view_billing_voucher->RealizationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->HospID->caption(), $view_billing_voucher->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->RIDNO->caption(), $view_billing_voucher->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->RIDNO->errorMessage()) ?>");
		<?php if ($view_billing_voucher_add->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->TidNo->caption(), $view_billing_voucher->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->TidNo->errorMessage()) ?>");
		<?php if ($view_billing_voucher_add->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->CId->caption(), $view_billing_voucher->CId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->PartnerName->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->PartnerName->caption(), $view_billing_voucher->PartnerName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->PayerType->Required) { ?>
			elm = this.getElements("x" + infix + "_PayerType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->PayerType->caption(), $view_billing_voucher->PayerType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->Dob->Required) { ?>
			elm = this.getElements("x" + infix + "_Dob");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->Dob->caption(), $view_billing_voucher->Dob->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->Currency->Required) { ?>
			elm = this.getElements("x" + infix + "_Currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->Currency->caption(), $view_billing_voucher->Currency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->DiscountRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->DiscountRemarks->caption(), $view_billing_voucher->DiscountRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->Remarks->caption(), $view_billing_voucher->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->PatId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->PatId->caption(), $view_billing_voucher->PatId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->DrDepartment->Required) { ?>
			elm = this.getElements("x" + infix + "_DrDepartment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->DrDepartment->caption(), $view_billing_voucher->DrDepartment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->RefferedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_RefferedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->RefferedBy->caption(), $view_billing_voucher->RefferedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->CardNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CardNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->CardNumber->caption(), $view_billing_voucher->CardNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->BankName->Required) { ?>
			elm = this.getElements("x" + infix + "_BankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->BankName->caption(), $view_billing_voucher->BankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->DrID->caption(), $view_billing_voucher->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->BillStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->BillStatus->caption(), $view_billing_voucher->BillStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->BillStatus->errorMessage()) ?>");
		<?php if ($view_billing_voucher_add->ReportHeader->Required) { ?>
			elm = this.getElements("x" + infix + "_ReportHeader[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->ReportHeader->caption(), $view_billing_voucher->ReportHeader->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->UserName->Required) { ?>
			elm = this.getElements("x" + infix + "_UserName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->UserName->caption(), $view_billing_voucher->UserName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->AdjustmentAdvance->Required) { ?>
			elm = this.getElements("x" + infix + "_AdjustmentAdvance[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->AdjustmentAdvance->caption(), $view_billing_voucher->AdjustmentAdvance->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->billing_vouchercol->Required) { ?>
			elm = this.getElements("x" + infix + "_billing_vouchercol");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->billing_vouchercol->caption(), $view_billing_voucher->billing_vouchercol->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->BillType->Required) { ?>
			elm = this.getElements("x" + infix + "_BillType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->BillType->caption(), $view_billing_voucher->BillType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->ProcedureName->Required) { ?>
			elm = this.getElements("x" + infix + "_ProcedureName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->ProcedureName->caption(), $view_billing_voucher->ProcedureName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->ProcedureAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_ProcedureAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->ProcedureAmount->caption(), $view_billing_voucher->ProcedureAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProcedureAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->ProcedureAmount->errorMessage()) ?>");
		<?php if ($view_billing_voucher_add->IncludePackage->Required) { ?>
			elm = this.getElements("x" + infix + "_IncludePackage[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->IncludePackage->caption(), $view_billing_voucher->IncludePackage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->CancelBill->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelBill");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->CancelBill->caption(), $view_billing_voucher->CancelBill->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->CancelReason->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelReason");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->CancelReason->caption(), $view_billing_voucher->CancelReason->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->CancelModeOfPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelModeOfPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->CancelModeOfPayment->caption(), $view_billing_voucher->CancelModeOfPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->CancelAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->CancelAmount->caption(), $view_billing_voucher->CancelAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->CancelBankName->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelBankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->CancelBankName->caption(), $view_billing_voucher->CancelBankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->CancelTransactionNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelTransactionNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->CancelTransactionNumber->caption(), $view_billing_voucher->CancelTransactionNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->LabTest->Required) { ?>
			elm = this.getElements("x" + infix + "_LabTest");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->LabTest->caption(), $view_billing_voucher->LabTest->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->sid->Required) { ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->sid->caption(), $view_billing_voucher->sid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->sid->errorMessage()) ?>");
		<?php if ($view_billing_voucher_add->SidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->SidNo->caption(), $view_billing_voucher->SidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->createdDatettime->Required) { ?>
			elm = this.getElements("x" + infix + "_createdDatettime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->createdDatettime->caption(), $view_billing_voucher->createdDatettime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->BillClosing->Required) { ?>
			elm = this.getElements("x" + infix + "_BillClosing[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->BillClosing->caption(), $view_billing_voucher->BillClosing->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->GoogleReviewID->Required) { ?>
			elm = this.getElements("x" + infix + "_GoogleReviewID[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->GoogleReviewID->caption(), $view_billing_voucher->GoogleReviewID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->CardType->Required) { ?>
			elm = this.getElements("x" + infix + "_CardType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->CardType->caption(), $view_billing_voucher->CardType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->PharmacyBill->Required) { ?>
			elm = this.getElements("x" + infix + "_PharmacyBill[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->PharmacyBill->caption(), $view_billing_voucher->PharmacyBill->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_add->cash->Required) { ?>
			elm = this.getElements("x" + infix + "_cash");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->cash->caption(), $view_billing_voucher->cash->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_cash");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->cash->errorMessage()) ?>");
		<?php if ($view_billing_voucher_add->Card->Required) { ?>
			elm = this.getElements("x" + infix + "_Card");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->Card->caption(), $view_billing_voucher->Card->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Card");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->Card->errorMessage()) ?>");

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
fview_billing_voucheradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_billing_voucheradd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_billing_voucheradd.lists["x_Reception"] = <?php echo $view_billing_voucher_add->Reception->Lookup->toClientList() ?>;
fview_billing_voucheradd.lists["x_Reception"].options = <?php echo JsonEncode($view_billing_voucher_add->Reception->lookupOptions()) ?>;
fview_billing_voucheradd.lists["x_ModeofPayment"] = <?php echo $view_billing_voucher_add->ModeofPayment->Lookup->toClientList() ?>;
fview_billing_voucheradd.lists["x_ModeofPayment"].options = <?php echo JsonEncode($view_billing_voucher_add->ModeofPayment->lookupOptions()) ?>;
fview_billing_voucheradd.lists["x_CId"] = <?php echo $view_billing_voucher_add->CId->Lookup->toClientList() ?>;
fview_billing_voucheradd.lists["x_CId"].options = <?php echo JsonEncode($view_billing_voucher_add->CId->lookupOptions()) ?>;
fview_billing_voucheradd.lists["x_PatId"] = <?php echo $view_billing_voucher_add->PatId->Lookup->toClientList() ?>;
fview_billing_voucheradd.lists["x_PatId"].options = <?php echo JsonEncode($view_billing_voucher_add->PatId->lookupOptions()) ?>;
fview_billing_voucheradd.lists["x_RefferedBy"] = <?php echo $view_billing_voucher_add->RefferedBy->Lookup->toClientList() ?>;
fview_billing_voucheradd.lists["x_RefferedBy"].options = <?php echo JsonEncode($view_billing_voucher_add->RefferedBy->lookupOptions()) ?>;
fview_billing_voucheradd.lists["x_DrID"] = <?php echo $view_billing_voucher_add->DrID->Lookup->toClientList() ?>;
fview_billing_voucheradd.lists["x_DrID"].options = <?php echo JsonEncode($view_billing_voucher_add->DrID->lookupOptions()) ?>;
fview_billing_voucheradd.lists["x_ReportHeader[]"] = <?php echo $view_billing_voucher_add->ReportHeader->Lookup->toClientList() ?>;
fview_billing_voucheradd.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_billing_voucher_add->ReportHeader->options(FALSE, TRUE)) ?>;
fview_billing_voucheradd.lists["x_AdjustmentAdvance[]"] = <?php echo $view_billing_voucher_add->AdjustmentAdvance->Lookup->toClientList() ?>;
fview_billing_voucheradd.lists["x_AdjustmentAdvance[]"].options = <?php echo JsonEncode($view_billing_voucher_add->AdjustmentAdvance->options(FALSE, TRUE)) ?>;
fview_billing_voucheradd.lists["x_BillType"] = <?php echo $view_billing_voucher_add->BillType->Lookup->toClientList() ?>;
fview_billing_voucheradd.lists["x_BillType"].options = <?php echo JsonEncode($view_billing_voucher_add->BillType->options(FALSE, TRUE)) ?>;
fview_billing_voucheradd.lists["x_IncludePackage[]"] = <?php echo $view_billing_voucher_add->IncludePackage->Lookup->toClientList() ?>;
fview_billing_voucheradd.lists["x_IncludePackage[]"].options = <?php echo JsonEncode($view_billing_voucher_add->IncludePackage->options(FALSE, TRUE)) ?>;
fview_billing_voucheradd.lists["x_CancelBill"] = <?php echo $view_billing_voucher_add->CancelBill->Lookup->toClientList() ?>;
fview_billing_voucheradd.lists["x_CancelBill"].options = <?php echo JsonEncode($view_billing_voucher_add->CancelBill->options(FALSE, TRUE)) ?>;
fview_billing_voucheradd.lists["x_BillClosing[]"] = <?php echo $view_billing_voucher_add->BillClosing->Lookup->toClientList() ?>;
fview_billing_voucheradd.lists["x_BillClosing[]"].options = <?php echo JsonEncode($view_billing_voucher_add->BillClosing->options(FALSE, TRUE)) ?>;
fview_billing_voucheradd.lists["x_GoogleReviewID[]"] = <?php echo $view_billing_voucher_add->GoogleReviewID->Lookup->toClientList() ?>;
fview_billing_voucheradd.lists["x_GoogleReviewID[]"].options = <?php echo JsonEncode($view_billing_voucher_add->GoogleReviewID->options(FALSE, TRUE)) ?>;
fview_billing_voucheradd.lists["x_CardType"] = <?php echo $view_billing_voucher_add->CardType->Lookup->toClientList() ?>;
fview_billing_voucheradd.lists["x_CardType"].options = <?php echo JsonEncode($view_billing_voucher_add->CardType->options(FALSE, TRUE)) ?>;
fview_billing_voucheradd.lists["x_PharmacyBill[]"] = <?php echo $view_billing_voucher_add->PharmacyBill->Lookup->toClientList() ?>;
fview_billing_voucheradd.lists["x_PharmacyBill[]"].options = <?php echo JsonEncode($view_billing_voucher_add->PharmacyBill->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_billing_voucher_add->showPageHeader(); ?>
<?php
$view_billing_voucher_add->showMessage();
?>
<form name="fview_billing_voucheradd" id="fview_billing_voucheradd" class="<?php echo $view_billing_voucher_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_billing_voucher_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_billing_voucher_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$view_billing_voucher_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($view_billing_voucher->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_view_billing_voucher_createddatetime" for="x_createddatetime" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_createddatetime" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->createddatetime->caption() ?><?php echo ($view_billing_voucher->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->createddatetime->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_createddatetime" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_createddatetime">
<input type="text" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->createddatetime->EditValue ?>"<?php echo $view_billing_voucher->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher->createddatetime->ReadOnly && !$view_billing_voucher->createddatetime->Disabled && !isset($view_billing_voucher->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher->createddatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_billing_voucheradd_js">
ew.createDateTimePicker("fview_billing_voucheradd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $view_billing_voucher->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_view_billing_voucher_BillNumber" for="x_BillNumber" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_BillNumber" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->BillNumber->caption() ?><?php echo ($view_billing_voucher->BillNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->BillNumber->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_BillNumber" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_BillNumber">
<input type="text" data-table="view_billing_voucher" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->BillNumber->EditValue ?>"<?php echo $view_billing_voucher->BillNumber->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_view_billing_voucher_Reception" for="x_Reception" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_Reception" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->Reception->caption() ?><?php echo ($view_billing_voucher->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Reception->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_Reception" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_Reception">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?php echo strval($view_billing_voucher->Reception->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_billing_voucher->Reception->ViewValue) : $view_billing_voucher->Reception->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_billing_voucher->Reception->ReadOnly || $view_billing_voucher->Reception->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher->Reception->Lookup->getParamTag("p_x_Reception") ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?php echo $view_billing_voucher->Reception->CurrentValue ?>"<?php echo $view_billing_voucher->Reception->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_view_billing_voucher_PatientId" for="x_PatientId" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_PatientId" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->PatientId->caption() ?><?php echo ($view_billing_voucher->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->PatientId->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_PatientId" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_PatientId">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->PatientId->EditValue ?>"<?php echo $view_billing_voucher->PatientId->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_view_billing_voucher_mrnno" for="x_mrnno" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_mrnno" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->mrnno->caption() ?><?php echo ($view_billing_voucher->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->mrnno->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_mrnno" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_mrnno">
<input type="text" data-table="view_billing_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->mrnno->EditValue ?>"<?php echo $view_billing_voucher->mrnno->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_view_billing_voucher_PatientName" for="x_PatientName" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_PatientName" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->PatientName->caption() ?><?php echo ($view_billing_voucher->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->PatientName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_PatientName" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_PatientName">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->PatientName->EditValue ?>"<?php echo $view_billing_voucher->PatientName->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_view_billing_voucher_Age" for="x_Age" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_Age" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->Age->caption() ?><?php echo ($view_billing_voucher->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Age->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_Age" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_Age">
<input type="text" data-table="view_billing_voucher" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Age->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Age->EditValue ?>"<?php echo $view_billing_voucher->Age->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_view_billing_voucher_Gender" for="x_Gender" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_Gender" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->Gender->caption() ?><?php echo ($view_billing_voucher->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Gender->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_Gender" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_Gender">
<input type="text" data-table="view_billing_voucher" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Gender->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Gender->EditValue ?>"<?php echo $view_billing_voucher->Gender->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_view_billing_voucher_profilePic" for="x_profilePic" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_profilePic" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->profilePic->caption() ?><?php echo ($view_billing_voucher->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->profilePic->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_profilePic" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_profilePic">
<textarea data-table="view_billing_voucher" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_billing_voucher->profilePic->getPlaceHolder()) ?>"<?php echo $view_billing_voucher->profilePic->editAttributes() ?>><?php echo $view_billing_voucher->profilePic->EditValue ?></textarea>
</span>
</script>
<?php echo $view_billing_voucher->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_view_billing_voucher_Mobile" for="x_Mobile" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_Mobile" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->Mobile->caption() ?><?php echo ($view_billing_voucher->Mobile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Mobile->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_Mobile" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_Mobile">
<input type="text" data-table="view_billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Mobile->EditValue ?>"<?php echo $view_billing_voucher->Mobile->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label id="elh_view_billing_voucher_IP_OP" for="x_IP_OP" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_IP_OP" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->IP_OP->caption() ?><?php echo ($view_billing_voucher->IP_OP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->IP_OP->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_IP_OP" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_IP_OP">
<input type="text" data-table="view_billing_voucher" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->IP_OP->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->IP_OP->EditValue ?>"<?php echo $view_billing_voucher->IP_OP->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->IP_OP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_view_billing_voucher_Doctor" for="x_Doctor" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_Doctor" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->Doctor->caption() ?><?php echo ($view_billing_voucher->Doctor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Doctor->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_Doctor" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_Doctor">
<input type="text" data-table="view_billing_voucher" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Doctor->EditValue ?>"<?php echo $view_billing_voucher->Doctor->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_view_billing_voucher_voucher_type" for="x_voucher_type" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_voucher_type" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->voucher_type->caption() ?><?php echo ($view_billing_voucher->voucher_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->voucher_type->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_type" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_voucher_type">
<input type="text" data-table="view_billing_voucher" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->voucher_type->EditValue ?>"<?php echo $view_billing_voucher->voucher_type->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_view_billing_voucher_Details" for="x_Details" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_Details" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->Details->caption() ?><?php echo ($view_billing_voucher->Details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Details->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_Details" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_Details">
<input type="text" data-table="view_billing_voucher" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Details->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Details->EditValue ?>"<?php echo $view_billing_voucher->Details->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_view_billing_voucher_ModeofPayment" for="x_ModeofPayment" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_ModeofPayment" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->ModeofPayment->caption() ?><?php echo ($view_billing_voucher->ModeofPayment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->ModeofPayment->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_ModeofPayment" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_billing_voucher->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $view_billing_voucher->ModeofPayment->editAttributes() ?>>
		<?php echo $view_billing_voucher->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
	</select>
</div>
<?php echo $view_billing_voucher->ModeofPayment->Lookup->getParamTag("p_x_ModeofPayment") ?>
</span>
</script>
<?php echo $view_billing_voucher->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_view_billing_voucher_Amount" for="x_Amount" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_Amount" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->Amount->caption() ?><?php echo ($view_billing_voucher->Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Amount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_Amount" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_Amount">
<input type="text" data-table="view_billing_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->Amount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Amount->EditValue ?>"<?php echo $view_billing_voucher->Amount->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_view_billing_voucher_AnyDues" for="x_AnyDues" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_AnyDues" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->AnyDues->caption() ?><?php echo ($view_billing_voucher->AnyDues->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->AnyDues->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_AnyDues" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_AnyDues">
<input type="text" data-table="view_billing_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->AnyDues->EditValue ?>"<?php echo $view_billing_voucher->AnyDues->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
	<div id="r_DiscountAmount" class="form-group row">
		<label id="elh_view_billing_voucher_DiscountAmount" for="x_DiscountAmount" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_DiscountAmount" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->DiscountAmount->caption() ?><?php echo ($view_billing_voucher->DiscountAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->DiscountAmount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_DiscountAmount" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_DiscountAmount">
<input type="text" data-table="view_billing_voucher" data-field="x_DiscountAmount" name="x_DiscountAmount" id="x_DiscountAmount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->DiscountAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->DiscountAmount->EditValue ?>"<?php echo $view_billing_voucher->DiscountAmount->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->DiscountAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_view_billing_voucher_RealizationAmount" for="x_RealizationAmount" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_RealizationAmount" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->RealizationAmount->caption() ?><?php echo ($view_billing_voucher->RealizationAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->RealizationAmount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_RealizationAmount" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_RealizationAmount">
<input type="text" data-table="view_billing_voucher" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->RealizationAmount->EditValue ?>"<?php echo $view_billing_voucher->RealizationAmount->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_view_billing_voucher_RealizationStatus" for="x_RealizationStatus" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_RealizationStatus" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->RealizationStatus->caption() ?><?php echo ($view_billing_voucher->RealizationStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->RealizationStatus->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_RealizationStatus" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_RealizationStatus">
<input type="text" data-table="view_billing_voucher" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->RealizationStatus->EditValue ?>"<?php echo $view_billing_voucher->RealizationStatus->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_view_billing_voucher_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_RealizationRemarks" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->RealizationRemarks->caption() ?><?php echo ($view_billing_voucher->RealizationRemarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->RealizationRemarks->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_RealizationRemarks" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_RealizationRemarks">
<input type="text" data-table="view_billing_voucher" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->RealizationRemarks->EditValue ?>"<?php echo $view_billing_voucher->RealizationRemarks->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_view_billing_voucher_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_RealizationBatchNo" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->RealizationBatchNo->caption() ?><?php echo ($view_billing_voucher->RealizationBatchNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->RealizationBatchNo->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_RealizationBatchNo" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_RealizationBatchNo">
<input type="text" data-table="view_billing_voucher" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->RealizationBatchNo->EditValue ?>"<?php echo $view_billing_voucher->RealizationBatchNo->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_view_billing_voucher_RealizationDate" for="x_RealizationDate" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_RealizationDate" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->RealizationDate->caption() ?><?php echo ($view_billing_voucher->RealizationDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->RealizationDate->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_RealizationDate" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_RealizationDate">
<input type="text" data-table="view_billing_voucher" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->RealizationDate->EditValue ?>"<?php echo $view_billing_voucher->RealizationDate->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_view_billing_voucher_RIDNO" for="x_RIDNO" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_RIDNO" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->RIDNO->caption() ?><?php echo ($view_billing_voucher->RIDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->RIDNO->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_RIDNO" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_RIDNO">
<input type="text" data-table="view_billing_voucher" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->RIDNO->EditValue ?>"<?php echo $view_billing_voucher->RIDNO->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_view_billing_voucher_TidNo" for="x_TidNo" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_TidNo" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->TidNo->caption() ?><?php echo ($view_billing_voucher->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->TidNo->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_TidNo" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_TidNo">
<input type="text" data-table="view_billing_voucher" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->TidNo->EditValue ?>"<?php echo $view_billing_voucher->TidNo->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_view_billing_voucher_CId" for="x_CId" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_CId" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->CId->caption() ?><?php echo ($view_billing_voucher->CId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CId->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_CId" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_CId">
<?php $view_billing_voucher->CId->EditAttrs["onchange"] = "ew.autoFill(this);" . @$view_billing_voucher->CId->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_CId"><?php echo strval($view_billing_voucher->CId->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_billing_voucher->CId->ViewValue) : $view_billing_voucher->CId->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_billing_voucher->CId->ReadOnly || $view_billing_voucher->CId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_CId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher->CId->Lookup->getParamTag("p_x_CId") ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher->CId->displayValueSeparatorAttribute() ?>" name="x_CId" id="x_CId" value="<?php echo $view_billing_voucher->CId->CurrentValue ?>"<?php echo $view_billing_voucher->CId->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_view_billing_voucher_PartnerName" for="x_PartnerName" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_PartnerName" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->PartnerName->caption() ?><?php echo ($view_billing_voucher->PartnerName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->PartnerName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_PartnerName" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_PartnerName">
<input type="text" data-table="view_billing_voucher" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->PartnerName->EditValue ?>"<?php echo $view_billing_voucher->PartnerName->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label id="elh_view_billing_voucher_PayerType" for="x_PayerType" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_PayerType" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->PayerType->caption() ?><?php echo ($view_billing_voucher->PayerType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->PayerType->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_PayerType" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_PayerType">
<input type="text" data-table="view_billing_voucher" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->PayerType->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->PayerType->EditValue ?>"<?php echo $view_billing_voucher->PayerType->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->PayerType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh_view_billing_voucher_Dob" for="x_Dob" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_Dob" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->Dob->caption() ?><?php echo ($view_billing_voucher->Dob->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Dob->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_Dob" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_Dob">
<input type="text" data-table="view_billing_voucher" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Dob->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Dob->EditValue ?>"<?php echo $view_billing_voucher->Dob->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_view_billing_voucher_Currency" for="x_Currency" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_Currency" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->Currency->caption() ?><?php echo ($view_billing_voucher->Currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Currency->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_Currency" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_Currency">
<input type="text" data-table="view_billing_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Currency->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Currency->EditValue ?>"<?php echo $view_billing_voucher->Currency->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label id="elh_view_billing_voucher_DiscountRemarks" for="x_DiscountRemarks" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_DiscountRemarks" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->DiscountRemarks->caption() ?><?php echo ($view_billing_voucher->DiscountRemarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->DiscountRemarks->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_DiscountRemarks" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_DiscountRemarks">
<input type="text" data-table="view_billing_voucher" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->DiscountRemarks->EditValue ?>"<?php echo $view_billing_voucher->DiscountRemarks->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->DiscountRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_view_billing_voucher_Remarks" for="x_Remarks" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_Remarks" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->Remarks->caption() ?><?php echo ($view_billing_voucher->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Remarks->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_Remarks" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_Remarks">
<textarea data-table="view_billing_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_billing_voucher->Remarks->getPlaceHolder()) ?>"<?php echo $view_billing_voucher->Remarks->editAttributes() ?>><?php echo $view_billing_voucher->Remarks->EditValue ?></textarea>
</span>
</script>
<?php echo $view_billing_voucher->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_view_billing_voucher_PatId" for="x_PatId" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_PatId" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->PatId->caption() ?><?php echo ($view_billing_voucher->PatId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->PatId->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_PatId" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_PatId">
<?php $view_billing_voucher->PatId->EditAttrs["onchange"] = "ew.autoFill(this);" . @$view_billing_voucher->PatId->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatId"><?php echo strval($view_billing_voucher->PatId->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_billing_voucher->PatId->ViewValue) : $view_billing_voucher->PatId->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher->PatId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_billing_voucher->PatId->ReadOnly || $view_billing_voucher->PatId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher->PatId->Lookup->getParamTag("p_x_PatId") ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PatId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher->PatId->displayValueSeparatorAttribute() ?>" name="x_PatId" id="x_PatId" value="<?php echo $view_billing_voucher->PatId->CurrentValue ?>"<?php echo $view_billing_voucher->PatId->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_view_billing_voucher_DrDepartment" for="x_DrDepartment" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_DrDepartment" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->DrDepartment->caption() ?><?php echo ($view_billing_voucher->DrDepartment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->DrDepartment->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_DrDepartment" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_DrDepartment">
<input type="text" data-table="view_billing_voucher" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->DrDepartment->EditValue ?>"<?php echo $view_billing_voucher->DrDepartment->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label id="elh_view_billing_voucher_RefferedBy" for="x_RefferedBy" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_RefferedBy" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->RefferedBy->caption() ?><?php echo ($view_billing_voucher->RefferedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->RefferedBy->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_RefferedBy" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_RefferedBy">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RefferedBy"><?php echo strval($view_billing_voucher->RefferedBy->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_billing_voucher->RefferedBy->ViewValue) : $view_billing_voucher->RefferedBy->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher->RefferedBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_billing_voucher->RefferedBy->ReadOnly || $view_billing_voucher->RefferedBy->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_RefferedBy',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$view_billing_voucher->RefferedBy->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_RefferedBy" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_billing_voucher->RefferedBy->caption() ?>" data-title="<?php echo $view_billing_voucher->RefferedBy->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_RefferedBy',url:'mas_reference_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $view_billing_voucher->RefferedBy->Lookup->getParamTag("p_x_RefferedBy") ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_RefferedBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher->RefferedBy->displayValueSeparatorAttribute() ?>" name="x_RefferedBy" id="x_RefferedBy" value="<?php echo $view_billing_voucher->RefferedBy->CurrentValue ?>"<?php echo $view_billing_voucher->RefferedBy->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->RefferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_view_billing_voucher_CardNumber" for="x_CardNumber" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_CardNumber" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->CardNumber->caption() ?><?php echo ($view_billing_voucher->CardNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CardNumber->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_CardNumber" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_CardNumber">
<input type="text" data-table="view_billing_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->CardNumber->EditValue ?>"<?php echo $view_billing_voucher->CardNumber->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_view_billing_voucher_BankName" for="x_BankName" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_BankName" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->BankName->caption() ?><?php echo ($view_billing_voucher->BankName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->BankName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_BankName" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_BankName">
<input type="text" data-table="view_billing_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->BankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->BankName->EditValue ?>"<?php echo $view_billing_voucher->BankName->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_view_billing_voucher_DrID" for="x_DrID" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_DrID" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->DrID->caption() ?><?php echo ($view_billing_voucher->DrID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->DrID->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_DrID" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_DrID">
<?php $view_billing_voucher->DrID->EditAttrs["onchange"] = "ew.autoFill(this);" . @$view_billing_voucher->DrID->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?php echo strval($view_billing_voucher->DrID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_billing_voucher->DrID->ViewValue) : $view_billing_voucher->DrID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher->DrID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_billing_voucher->DrID->ReadOnly || $view_billing_voucher->DrID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher->DrID->Lookup->getParamTag("p_x_DrID") ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_DrID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?php echo $view_billing_voucher->DrID->CurrentValue ?>"<?php echo $view_billing_voucher->DrID->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_view_billing_voucher_BillStatus" for="x_BillStatus" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_BillStatus" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->BillStatus->caption() ?><?php echo ($view_billing_voucher->BillStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->BillStatus->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_BillStatus" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_BillStatus">
<input type="text" data-table="view_billing_voucher" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->BillStatus->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->BillStatus->EditValue ?>"<?php echo $view_billing_voucher->BillStatus->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_view_billing_voucher_ReportHeader" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_ReportHeader" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->ReportHeader->caption() ?><?php echo ($view_billing_voucher->ReportHeader->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_ReportHeader" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_ReportHeader">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_ReportHeader" data-value-separator="<?php echo $view_billing_voucher->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $view_billing_voucher->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span>
</script>
<?php echo $view_billing_voucher->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
	<div id="r_AdjustmentAdvance" class="form-group row">
		<label id="elh_view_billing_voucher_AdjustmentAdvance" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_AdjustmentAdvance" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->AdjustmentAdvance->caption() ?><?php echo ($view_billing_voucher->AdjustmentAdvance->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->AdjustmentAdvance->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_AdjustmentAdvance" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_AdjustmentAdvance">
<div id="tp_x_AdjustmentAdvance" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_AdjustmentAdvance" data-value-separator="<?php echo $view_billing_voucher->AdjustmentAdvance->displayValueSeparatorAttribute() ?>" name="x_AdjustmentAdvance[]" id="x_AdjustmentAdvance[]" value="{value}"<?php echo $view_billing_voucher->AdjustmentAdvance->editAttributes() ?>></div>
<div id="dsl_x_AdjustmentAdvance" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->AdjustmentAdvance->checkBoxListHtml(FALSE, "x_AdjustmentAdvance[]") ?>
</div></div>
</span>
</script>
<?php echo $view_billing_voucher->AdjustmentAdvance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->billing_vouchercol->Visible) { // billing_vouchercol ?>
	<div id="r_billing_vouchercol" class="form-group row">
		<label id="elh_view_billing_voucher_billing_vouchercol" for="x_billing_vouchercol" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_billing_vouchercol" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->billing_vouchercol->caption() ?><?php echo ($view_billing_voucher->billing_vouchercol->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->billing_vouchercol->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_billing_vouchercol" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_billing_vouchercol">
<input type="text" data-table="view_billing_voucher" data-field="x_billing_vouchercol" name="x_billing_vouchercol" id="x_billing_vouchercol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->billing_vouchercol->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->billing_vouchercol->EditValue ?>"<?php echo $view_billing_voucher->billing_vouchercol->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->billing_vouchercol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->BillType->Visible) { // BillType ?>
	<div id="r_BillType" class="form-group row">
		<label id="elh_view_billing_voucher_BillType" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_BillType" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->BillType->caption() ?><?php echo ($view_billing_voucher->BillType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->BillType->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_BillType" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_BillType">
<div id="tp_x_BillType" class="ew-template"><input type="radio" class="form-check-input" data-table="view_billing_voucher" data-field="x_BillType" data-value-separator="<?php echo $view_billing_voucher->BillType->displayValueSeparatorAttribute() ?>" name="x_BillType" id="x_BillType" value="{value}"<?php echo $view_billing_voucher->BillType->editAttributes() ?>></div>
<div id="dsl_x_BillType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->BillType->radioButtonListHtml(FALSE, "x_BillType") ?>
</div></div>
</span>
</script>
<?php echo $view_billing_voucher->BillType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->ProcedureName->Visible) { // ProcedureName ?>
	<div id="r_ProcedureName" class="form-group row">
		<label id="elh_view_billing_voucher_ProcedureName" for="x_ProcedureName" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_ProcedureName" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->ProcedureName->caption() ?><?php echo ($view_billing_voucher->ProcedureName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->ProcedureName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_ProcedureName" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_ProcedureName">
<input type="text" data-table="view_billing_voucher" data-field="x_ProcedureName" name="x_ProcedureName" id="x_ProcedureName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->ProcedureName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->ProcedureName->EditValue ?>"<?php echo $view_billing_voucher->ProcedureName->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->ProcedureName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->ProcedureAmount->Visible) { // ProcedureAmount ?>
	<div id="r_ProcedureAmount" class="form-group row">
		<label id="elh_view_billing_voucher_ProcedureAmount" for="x_ProcedureAmount" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_ProcedureAmount" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->ProcedureAmount->caption() ?><?php echo ($view_billing_voucher->ProcedureAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->ProcedureAmount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_ProcedureAmount" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_ProcedureAmount">
<input type="text" data-table="view_billing_voucher" data-field="x_ProcedureAmount" name="x_ProcedureAmount" id="x_ProcedureAmount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->ProcedureAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->ProcedureAmount->EditValue ?>"<?php echo $view_billing_voucher->ProcedureAmount->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->ProcedureAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->IncludePackage->Visible) { // IncludePackage ?>
	<div id="r_IncludePackage" class="form-group row">
		<label id="elh_view_billing_voucher_IncludePackage" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_IncludePackage" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->IncludePackage->caption() ?><?php echo ($view_billing_voucher->IncludePackage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->IncludePackage->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_IncludePackage" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_IncludePackage">
<div id="tp_x_IncludePackage" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_IncludePackage" data-value-separator="<?php echo $view_billing_voucher->IncludePackage->displayValueSeparatorAttribute() ?>" name="x_IncludePackage[]" id="x_IncludePackage[]" value="{value}"<?php echo $view_billing_voucher->IncludePackage->editAttributes() ?>></div>
<div id="dsl_x_IncludePackage" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->IncludePackage->checkBoxListHtml(FALSE, "x_IncludePackage[]") ?>
</div></div>
</span>
</script>
<?php echo $view_billing_voucher->IncludePackage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CancelBill->Visible) { // CancelBill ?>
	<div id="r_CancelBill" class="form-group row">
		<label id="elh_view_billing_voucher_CancelBill" for="x_CancelBill" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_CancelBill" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->CancelBill->caption() ?><?php echo ($view_billing_voucher->CancelBill->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CancelBill->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_CancelBill" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_CancelBill">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_CancelBill" data-value-separator="<?php echo $view_billing_voucher->CancelBill->displayValueSeparatorAttribute() ?>" id="x_CancelBill" name="x_CancelBill"<?php echo $view_billing_voucher->CancelBill->editAttributes() ?>>
		<?php echo $view_billing_voucher->CancelBill->selectOptionListHtml("x_CancelBill") ?>
	</select>
</div>
</span>
</script>
<?php echo $view_billing_voucher->CancelBill->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CancelReason->Visible) { // CancelReason ?>
	<div id="r_CancelReason" class="form-group row">
		<label id="elh_view_billing_voucher_CancelReason" for="x_CancelReason" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_CancelReason" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->CancelReason->caption() ?><?php echo ($view_billing_voucher->CancelReason->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CancelReason->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_CancelReason" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_CancelReason">
<textarea data-table="view_billing_voucher" data-field="x_CancelReason" name="x_CancelReason" id="x_CancelReason" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_billing_voucher->CancelReason->getPlaceHolder()) ?>"<?php echo $view_billing_voucher->CancelReason->editAttributes() ?>><?php echo $view_billing_voucher->CancelReason->EditValue ?></textarea>
</span>
</script>
<?php echo $view_billing_voucher->CancelReason->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
	<div id="r_CancelModeOfPayment" class="form-group row">
		<label id="elh_view_billing_voucher_CancelModeOfPayment" for="x_CancelModeOfPayment" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_CancelModeOfPayment" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->CancelModeOfPayment->caption() ?><?php echo ($view_billing_voucher->CancelModeOfPayment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CancelModeOfPayment->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_CancelModeOfPayment" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_CancelModeOfPayment">
<input type="text" data-table="view_billing_voucher" data-field="x_CancelModeOfPayment" name="x_CancelModeOfPayment" id="x_CancelModeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->CancelModeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->CancelModeOfPayment->EditValue ?>"<?php echo $view_billing_voucher->CancelModeOfPayment->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->CancelModeOfPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CancelAmount->Visible) { // CancelAmount ?>
	<div id="r_CancelAmount" class="form-group row">
		<label id="elh_view_billing_voucher_CancelAmount" for="x_CancelAmount" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_CancelAmount" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->CancelAmount->caption() ?><?php echo ($view_billing_voucher->CancelAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CancelAmount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_CancelAmount" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_CancelAmount">
<input type="text" data-table="view_billing_voucher" data-field="x_CancelAmount" name="x_CancelAmount" id="x_CancelAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->CancelAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->CancelAmount->EditValue ?>"<?php echo $view_billing_voucher->CancelAmount->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->CancelAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CancelBankName->Visible) { // CancelBankName ?>
	<div id="r_CancelBankName" class="form-group row">
		<label id="elh_view_billing_voucher_CancelBankName" for="x_CancelBankName" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_CancelBankName" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->CancelBankName->caption() ?><?php echo ($view_billing_voucher->CancelBankName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CancelBankName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_CancelBankName" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_CancelBankName">
<input type="text" data-table="view_billing_voucher" data-field="x_CancelBankName" name="x_CancelBankName" id="x_CancelBankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->CancelBankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->CancelBankName->EditValue ?>"<?php echo $view_billing_voucher->CancelBankName->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->CancelBankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
	<div id="r_CancelTransactionNumber" class="form-group row">
		<label id="elh_view_billing_voucher_CancelTransactionNumber" for="x_CancelTransactionNumber" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_CancelTransactionNumber" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->CancelTransactionNumber->caption() ?><?php echo ($view_billing_voucher->CancelTransactionNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CancelTransactionNumber->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_CancelTransactionNumber" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_CancelTransactionNumber">
<input type="text" data-table="view_billing_voucher" data-field="x_CancelTransactionNumber" name="x_CancelTransactionNumber" id="x_CancelTransactionNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->CancelTransactionNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->CancelTransactionNumber->EditValue ?>"<?php echo $view_billing_voucher->CancelTransactionNumber->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->CancelTransactionNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->LabTest->Visible) { // LabTest ?>
	<div id="r_LabTest" class="form-group row">
		<label id="elh_view_billing_voucher_LabTest" for="x_LabTest" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_LabTest" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->LabTest->caption() ?><?php echo ($view_billing_voucher->LabTest->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->LabTest->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_LabTest" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_LabTest">
<input type="text" data-table="view_billing_voucher" data-field="x_LabTest" name="x_LabTest" id="x_LabTest" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->LabTest->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->LabTest->EditValue ?>"<?php echo $view_billing_voucher->LabTest->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->LabTest->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->sid->Visible) { // sid ?>
	<div id="r_sid" class="form-group row">
		<label id="elh_view_billing_voucher_sid" for="x_sid" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_sid" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->sid->caption() ?><?php echo ($view_billing_voucher->sid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->sid->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_sid" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_sid">
<input type="text" data-table="view_billing_voucher" data-field="x_sid" name="x_sid" id="x_sid" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->sid->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->sid->EditValue ?>"<?php echo $view_billing_voucher->sid->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->sid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->SidNo->Visible) { // SidNo ?>
	<div id="r_SidNo" class="form-group row">
		<label id="elh_view_billing_voucher_SidNo" for="x_SidNo" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_SidNo" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->SidNo->caption() ?><?php echo ($view_billing_voucher->SidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->SidNo->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_SidNo" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_SidNo">
<input type="text" data-table="view_billing_voucher" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->SidNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->SidNo->EditValue ?>"<?php echo $view_billing_voucher->SidNo->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->SidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->BillClosing->Visible) { // BillClosing ?>
	<div id="r_BillClosing" class="form-group row">
		<label id="elh_view_billing_voucher_BillClosing" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_BillClosing" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->BillClosing->caption() ?><?php echo ($view_billing_voucher->BillClosing->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->BillClosing->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_BillClosing" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_BillClosing">
<div id="tp_x_BillClosing" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_BillClosing" data-value-separator="<?php echo $view_billing_voucher->BillClosing->displayValueSeparatorAttribute() ?>" name="x_BillClosing[]" id="x_BillClosing[]" value="{value}"<?php echo $view_billing_voucher->BillClosing->editAttributes() ?>></div>
<div id="dsl_x_BillClosing" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->BillClosing->checkBoxListHtml(FALSE, "x_BillClosing[]") ?>
</div></div>
</span>
</script>
<?php echo $view_billing_voucher->BillClosing->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->GoogleReviewID->Visible) { // GoogleReviewID ?>
	<div id="r_GoogleReviewID" class="form-group row">
		<label id="elh_view_billing_voucher_GoogleReviewID" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_GoogleReviewID" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->GoogleReviewID->caption() ?><?php echo ($view_billing_voucher->GoogleReviewID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->GoogleReviewID->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_GoogleReviewID" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_GoogleReviewID">
<div id="tp_x_GoogleReviewID" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_GoogleReviewID" data-value-separator="<?php echo $view_billing_voucher->GoogleReviewID->displayValueSeparatorAttribute() ?>" name="x_GoogleReviewID[]" id="x_GoogleReviewID[]" value="{value}"<?php echo $view_billing_voucher->GoogleReviewID->editAttributes() ?>></div>
<div id="dsl_x_GoogleReviewID" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->GoogleReviewID->checkBoxListHtml(FALSE, "x_GoogleReviewID[]") ?>
</div></div>
</span>
</script>
<?php echo $view_billing_voucher->GoogleReviewID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CardType->Visible) { // CardType ?>
	<div id="r_CardType" class="form-group row">
		<label id="elh_view_billing_voucher_CardType" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_CardType" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->CardType->caption() ?><?php echo ($view_billing_voucher->CardType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CardType->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_CardType" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_CardType">
<div id="tp_x_CardType" class="ew-template"><input type="radio" class="form-check-input" data-table="view_billing_voucher" data-field="x_CardType" data-value-separator="<?php echo $view_billing_voucher->CardType->displayValueSeparatorAttribute() ?>" name="x_CardType" id="x_CardType" value="{value}"<?php echo $view_billing_voucher->CardType->editAttributes() ?>></div>
<div id="dsl_x_CardType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->CardType->radioButtonListHtml(FALSE, "x_CardType") ?>
</div></div>
</span>
</script>
<?php echo $view_billing_voucher->CardType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->PharmacyBill->Visible) { // PharmacyBill ?>
	<div id="r_PharmacyBill" class="form-group row">
		<label id="elh_view_billing_voucher_PharmacyBill" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_PharmacyBill" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->PharmacyBill->caption() ?><?php echo ($view_billing_voucher->PharmacyBill->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->PharmacyBill->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_PharmacyBill" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_PharmacyBill">
<div id="tp_x_PharmacyBill" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_PharmacyBill" data-value-separator="<?php echo $view_billing_voucher->PharmacyBill->displayValueSeparatorAttribute() ?>" name="x_PharmacyBill[]" id="x_PharmacyBill[]" value="{value}"<?php echo $view_billing_voucher->PharmacyBill->editAttributes() ?>></div>
<div id="dsl_x_PharmacyBill" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->PharmacyBill->checkBoxListHtml(FALSE, "x_PharmacyBill[]") ?>
</div></div>
</span>
</script>
<?php echo $view_billing_voucher->PharmacyBill->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->cash->Visible) { // cash ?>
	<div id="r_cash" class="form-group row">
		<label id="elh_view_billing_voucher_cash" for="x_cash" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_cash" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->cash->caption() ?><?php echo ($view_billing_voucher->cash->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->cash->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_cash" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_cash">
<input type="text" data-table="view_billing_voucher" data-field="x_cash" name="x_cash" id="x_cash" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->cash->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->cash->EditValue ?>"<?php echo $view_billing_voucher->cash->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->cash->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Card->Visible) { // Card ?>
	<div id="r_Card" class="form-group row">
		<label id="elh_view_billing_voucher_Card" for="x_Card" class="<?php echo $view_billing_voucher_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_Card" class="view_billing_voucheradd" type="text/html"><span><?php echo $view_billing_voucher->Card->caption() ?><?php echo ($view_billing_voucher->Card->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_add->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Card->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_Card" class="view_billing_voucheradd" type="text/html">
<span id="el_view_billing_voucher_Card">
<input type="text" data-table="view_billing_voucher" data-field="x_Card" name="x_Card" id="x_Card" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->Card->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Card->EditValue ?>"<?php echo $view_billing_voucher->Card->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher->Card->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_billing_voucheradd" class="ew-custom-template"></div>
<script id="tpm_view_billing_voucheradd" type="text/html">
<div id="ct_view_billing_voucher_add"><style>
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
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<link rel="stylesheet" href="customized\lightWeightPopup\lightweightpopup.css" type="text/css">
<input id="createdbyId" name="createdbyId" type="hidden" value="<?php echo CurrentUserName(); ?>">
<input id="HospIDId" name="HospIDId" type="hidden" value="<?php echo HospitalID(); ?>">
<div hidden>{{include tmpl="#tpc_view_billing_voucher_billing_vouchercol"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_billing_vouchercol"/}} </div>
<div hidden>{{include tmpl="#tpc_view_billing_voucher_LabTest"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_LabTest"/}} </div>
<div hidden>{{include tmpl="#tpc_view_billing_voucher_sid"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_sid"/}} </div>
<div hidden>{{include tmpl="#tpc_view_billing_voucher_SidNo"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_SidNo"/}} </div>
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_billing_voucher_PatId"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_PatId"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_billing_voucher_RIDNO"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_RIDNO"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_billing_voucher_CId"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_CId"/}}</h3>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#229954">
				<h3 class="card-title">Patient Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
	 	<tr>
			<td>{{include tmpl="#tpc_view_billing_voucher_createddatetime"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_createddatetime"/}}</td>
			<td><a id="ipAdmissiontype" style="display: none;"></a></td>
			<td>
				<table>
				 <tbody><tbody><tr>
				 	<td><a id="BillClosingType" style="display: none;">{{include tmpl="#tpc_view_billing_voucher_BillClosing"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_BillClosing"/}}</a>
				 	</td><td  class="card-header" style="background-color: #fedfec;">{{include tmpl="#tpc_view_billing_voucher_PharmacyBill"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_PharmacyBill"/}}
				 </td></tr></tbody>
				 </table>
			</td>		
		</tr>
		<tr>
		<td>{{include tmpl="#tpc_view_billing_voucher_PatientId"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_PatientId"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_PatientName"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_PatientName"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_Mobile"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_Mobile"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_view_billing_voucher_Dob"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_Dob"/}}</td>
		<td>{{include tmpl="#tpc_view_billing_voucher_Age"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_Age"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_Gender"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_Gender"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_view_billing_voucher_PartnerName"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_PartnerName"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_PayerType"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_PayerType"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_RefferedBy"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_RefferedBy"/}}</td>
			<td></td>
		</tr>
		 <tr>
		 	<td>{{include tmpl="#tpc_view_billing_voucher_DrID"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_DrID"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_Doctor"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_Doctor"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_DrDepartment"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_DrDepartment"/}}</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div id="LoadGetOPAdvance"> </div>
<table class="">
	 <tbody>
		<tr>
			<td>
				{{include tmpl="#tpc_view_billing_voucher_ReportHeader"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_ReportHeader"/}}
			</td>
			<td>
				{{include tmpl="#tpc_view_billing_voucher_BillType"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_BillType"/}}
			</td>
			<td>
			<a  id="AddBulkService" onclick="Addloadservice()" class="nav-link active btn btn-block btn-danger  btn-flat" data-toggle="tab"><i class="fa fa-fw fa-calendar-check"></i>Add IP Service</a>
			</td>
	        <td>
			<a id="Addloadservice" onclick="loadservice()" class="nav-link active btn btn-block btn-success btn-flat" data-toggle="tab"><i class="fa fa-fw fa-refresh"></i>Refresh</a>
			</td>
		</tr>
	</tbody>
</table>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#D68910">
				<h3 class="card-title">Payment Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
	 	<tr>
			<td>{{include tmpl="#tpc_view_billing_voucher_ModeofPayment"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_ModeofPayment"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_Amount"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_Amount"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_AnyDues"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_AnyDues"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_view_billing_voucher_DiscountRemarks"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_DiscountRemarks"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_Remarks"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_Remarks"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_AdjustmentAdvance"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_AdjustmentAdvance"/}}</td>
		</tr>
		<tr id="ProcedureIITem">
			<td>{{include tmpl="#tpc_view_billing_voucher_IncludePackage"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_IncludePackage"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_ProcedureName"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_ProcedureName"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_ProcedureAmount"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_ProcedureAmount"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_view_billing_voucher_GoogleReviewID"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_GoogleReviewID"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_DiscountAmount"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_DiscountAmount"/}}</td>
			<td></td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
<div id="viewBankName" class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#E706B7">
				<h3 id="viewBankDetails" class="card-title">BankName</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr id="viewCardType">
			<td>{{include tmpl="#tpc_view_billing_voucher_CardType"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_CardType"/}}</td>
			<td id="viewCash">{{include tmpl="#tpc_view_billing_voucher_cash"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_cash"/}}</td>
			<td id="viewCard">{{include tmpl="#tpc_view_billing_voucher_Card"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_Card"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_view_billing_voucher_CardNumber"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_CardNumber"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_BankName"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_BankName"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_RealizationBatchNo"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_RealizationBatchNo"/}}</td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
</div>
</script>
<?php
	if (in_array("view_patient_services", explode(",", $view_billing_voucher->getCurrentDetailTable())) && $view_patient_services->DetailAdd) {
?>
<?php if ($view_billing_voucher->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("view_patient_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_patient_servicesgrid.php" ?>
<?php } ?>
<?php if (!$view_billing_voucher_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_billing_voucher_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_billing_voucher_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_billing_voucher->Rows) ?> };
ew.applyTemplate("tpd_view_billing_voucheradd", "tpm_view_billing_voucheradd", "view_billing_voucheradd", "<?php echo $view_billing_voucher->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_billing_voucheradd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_billing_voucher_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

 document.getElementById("viewBankName").style.display = "none";
 document.getElementById("x_Amount").readOnly = true;
 document.getElementById("ProcedureIITem").style.visibility = "hidden";
 document.getElementById("AddBulkService").style.display = "none";
  document.getElementById("Addloadservice").style.display = "none";

 function addtotalSumCash()
{
var x_Amount = document.getElementById("x_Amount").value;
var x_Cash = document.getElementById("x_cash").value;
document.getElementById("x_Card").value = (parseFloat(x_Amount) - parseFloat(x_Cash)).toFixed(2);
}

function addtotalSumCard()
{
var x_Amount = document.getElementById("x_Amount").value;
var x_Card = document.getElementById("x_Card").value;
document.getElementById("x_cash").value = (parseFloat(x_Amount) - parseFloat(x_Card)).toFixed(2);
}

function addtotalSum()
{	
	var totSum = 0;
	for (var i = 1; i < 80; i++) {
			try {
				var amount = document.getElementById("x" + i + "_SubTotal");
				if (amount.value != '') {
					var hhh = amount.value;
					var ttt = hhh.replace(',','');
					totSum = parseInt(totSum) + parseInt(ttt);

					//totSum = parseInt(totSum) + parseInt(amount.value);
				}
			}
			catch(err) {
			}
	}

//	var DSAmount =  0;  //document.getElementById("x_DiscountAmount");
	var DisCountAmount = 0; //DSAmount.value;
		var BillAmount = document.getElementById("x_Amount");
		BillAmount.value = totSum - DisCountAmount;
}
var HospitalIDDD = '<?php echo HospitalID(); ?>';
var grpButton = '<input type="hidden" id="HospitalIDDD" name="HospitalIDDD" value="'+HospitalIDDD+'">';
		var searchfrm = document.getElementById("tbl_view_patient_servicesgrid");
		var node = document.createElement("div");
		node.innerHTML = grpButton;    
		searchfrm.appendChild(node);

function ERdeleteGridRow(kkk, k)
{
document.getElementById('sv_x'+k+'_Services').value = '';
											document.getElementById('x'+k+'_amount').value =  '';
											document.getElementById('x'+k+'_SubTotal').value =  '';
											document.getElementById('x'+k+'_ItemCode').value =  '';
											document.getElementById('x'+k+'_Quantity').value =  '';
											document.getElementById('x'+k+'_sid').value =  '';
											document.getElementById('x_ProcedureAmount').value =  '';
													document.getElementById('x_ProcedureName').value =  '';
													 var Services = document.getElementById("sv_x" +k+ "_Services");
													 Services.innerHTML  = '';
													 Services.selectedIndex = '';
													 Services.value = '';
													 Services.text = '';
									  				var Services = document.getElementById("x" +k+ "_Services");
									  				Services.value = '';

										//	var jjAddRow = $('*[data-caption="Delete"]');
										//	ew.deleteGridRow(jjAddRow,k);

}
 </script>
  <link rel="stylesheet" href="customized\sweetalert2b\sweetalert2.min.css">
  <script src="customized\sweetalert2b\sweetalert2.all.min.js"></script>
 <script>
$("button").click(function(e) { 
	var id = $(this).attr('id');
			var form = this;
		e.preventDefault();
		if (id == 'btn-action') {
			swal({
				title: "Are you want to save?",
				text: "----",
				type: "warning",
				confirmButtonText: "Yes, Save!",
				showCancelButton: true
			})
				.then((result) => {
					if (result.value) {

						//form.submit();
						$("#fview_billing_voucheradd").submit();
					} else if (result.dismiss === 'cancel') {
						swal(
							'Cancelled',
							'----',
							'error'
						)
					}
				})
		}
	});

//$("#AddBulkService").lightWeightPopup({href:"ipbulkservice.php", overlay:false, width:"90%", maxWidth:"600px", title:"Ajax Model"});
 $("#AddBulkService").click(function(){
 var PPaattID =  document.getElementById("x_PatId").value;
$("#AddBulkService").lightWeightPopup({href:"ipbulkservice.php?id="+PPaattID, overlay:false, width:"90%", maxWidth:"800px", title:"IP Service Bulk Insert"});
   $("[data-name='Services']").hide();

  //alert("The paragraph was clicked.");
});

function loadservice()
{
	$("[data-name='Services']").show();
}

function Addloadservice()
{
 	var PPaattID =  document.getElementById("x_PatId").value;
	location.href = "ipbulkservice.php?id="+PPaattID;
}
</script>
<?php include_once "footer.php" ?>
<?php
$view_billing_voucher_add->terminate();
?>