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
$billing_voucher_add = new billing_voucher_add();

// Run the page
$billing_voucher_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_voucher_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fbilling_voucheradd = currentForm = new ew.Form("fbilling_voucheradd", "add");

// Validate form
fbilling_voucheradd.validate = function() {
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
		<?php if ($billing_voucher_add->PatId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->PatId->caption(), $billing_voucher->PatId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->PatId->errorMessage()) ?>");
		<?php if ($billing_voucher_add->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Reception->caption(), $billing_voucher->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->BillNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_BillNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->BillNumber->caption(), $billing_voucher->BillNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->PatientId->caption(), $billing_voucher->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->PatientId->errorMessage()) ?>");
		<?php if ($billing_voucher_add->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->mrnno->caption(), $billing_voucher->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->PatientName->caption(), $billing_voucher->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Age->caption(), $billing_voucher->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Gender->caption(), $billing_voucher->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->profilePic->caption(), $billing_voucher->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Mobile->caption(), $billing_voucher->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->IP_OP->Required) { ?>
			elm = this.getElements("x" + infix + "_IP_OP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->IP_OP->caption(), $billing_voucher->IP_OP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->Doctor->Required) { ?>
			elm = this.getElements("x" + infix + "_Doctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Doctor->caption(), $billing_voucher->Doctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->voucher_type->Required) { ?>
			elm = this.getElements("x" + infix + "_voucher_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->voucher_type->caption(), $billing_voucher->voucher_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Details->caption(), $billing_voucher->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->ModeofPayment->caption(), $billing_voucher->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Amount->caption(), $billing_voucher->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->Amount->errorMessage()) ?>");
		<?php if ($billing_voucher_add->AnyDues->Required) { ?>
			elm = this.getElements("x" + infix + "_AnyDues");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->AnyDues->caption(), $billing_voucher->AnyDues->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->createdby->caption(), $billing_voucher->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->createddatetime->caption(), $billing_voucher->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->RealizationAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->RealizationAmount->caption(), $billing_voucher->RealizationAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->RealizationAmount->errorMessage()) ?>");
		<?php if ($billing_voucher_add->RealizationStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->RealizationStatus->caption(), $billing_voucher->RealizationStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->RealizationRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->RealizationRemarks->caption(), $billing_voucher->RealizationRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->RealizationBatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationBatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->RealizationBatchNo->caption(), $billing_voucher->RealizationBatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->RealizationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->RealizationDate->caption(), $billing_voucher->RealizationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->HospID->caption(), $billing_voucher->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->RIDNO->caption(), $billing_voucher->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->RIDNO->errorMessage()) ?>");
		<?php if ($billing_voucher_add->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->TidNo->caption(), $billing_voucher->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->TidNo->errorMessage()) ?>");
		<?php if ($billing_voucher_add->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->CId->caption(), $billing_voucher->CId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->CId->errorMessage()) ?>");
		<?php if ($billing_voucher_add->PartnerName->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->PartnerName->caption(), $billing_voucher->PartnerName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->PayerType->Required) { ?>
			elm = this.getElements("x" + infix + "_PayerType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->PayerType->caption(), $billing_voucher->PayerType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->Dob->Required) { ?>
			elm = this.getElements("x" + infix + "_Dob");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Dob->caption(), $billing_voucher->Dob->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->Currency->Required) { ?>
			elm = this.getElements("x" + infix + "_Currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Currency->caption(), $billing_voucher->Currency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->DiscountRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->DiscountRemarks->caption(), $billing_voucher->DiscountRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Remarks->caption(), $billing_voucher->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->DrDepartment->Required) { ?>
			elm = this.getElements("x" + infix + "_DrDepartment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->DrDepartment->caption(), $billing_voucher->DrDepartment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->RefferedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_RefferedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->RefferedBy->caption(), $billing_voucher->RefferedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->CardNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CardNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->CardNumber->caption(), $billing_voucher->CardNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->BankName->Required) { ?>
			elm = this.getElements("x" + infix + "_BankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->BankName->caption(), $billing_voucher->BankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->DrID->caption(), $billing_voucher->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->DrID->errorMessage()) ?>");
		<?php if ($billing_voucher_add->BillStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->BillStatus->caption(), $billing_voucher->BillStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->BillStatus->errorMessage()) ?>");
		<?php if ($billing_voucher_add->ReportHeader->Required) { ?>
			elm = this.getElements("x" + infix + "_ReportHeader");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->ReportHeader->caption(), $billing_voucher->ReportHeader->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->UserName->Required) { ?>
			elm = this.getElements("x" + infix + "_UserName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->UserName->caption(), $billing_voucher->UserName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->AdjustmentAdvance->Required) { ?>
			elm = this.getElements("x" + infix + "_AdjustmentAdvance");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->AdjustmentAdvance->caption(), $billing_voucher->AdjustmentAdvance->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->billing_vouchercol->Required) { ?>
			elm = this.getElements("x" + infix + "_billing_vouchercol");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->billing_vouchercol->caption(), $billing_voucher->billing_vouchercol->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->BillType->Required) { ?>
			elm = this.getElements("x" + infix + "_BillType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->BillType->caption(), $billing_voucher->BillType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->ProcedureName->Required) { ?>
			elm = this.getElements("x" + infix + "_ProcedureName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->ProcedureName->caption(), $billing_voucher->ProcedureName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->ProcedureAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_ProcedureAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->ProcedureAmount->caption(), $billing_voucher->ProcedureAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProcedureAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->ProcedureAmount->errorMessage()) ?>");
		<?php if ($billing_voucher_add->IncludePackage->Required) { ?>
			elm = this.getElements("x" + infix + "_IncludePackage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->IncludePackage->caption(), $billing_voucher->IncludePackage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->CancelBill->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelBill");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->CancelBill->caption(), $billing_voucher->CancelBill->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->CancelReason->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelReason");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->CancelReason->caption(), $billing_voucher->CancelReason->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->CancelModeOfPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelModeOfPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->CancelModeOfPayment->caption(), $billing_voucher->CancelModeOfPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->CancelAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->CancelAmount->caption(), $billing_voucher->CancelAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->CancelBankName->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelBankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->CancelBankName->caption(), $billing_voucher->CancelBankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->CancelTransactionNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelTransactionNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->CancelTransactionNumber->caption(), $billing_voucher->CancelTransactionNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->LabTest->Required) { ?>
			elm = this.getElements("x" + infix + "_LabTest");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->LabTest->caption(), $billing_voucher->LabTest->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->sid->Required) { ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->sid->caption(), $billing_voucher->sid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->sid->errorMessage()) ?>");
		<?php if ($billing_voucher_add->SidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->SidNo->caption(), $billing_voucher->SidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->createdDatettime->Required) { ?>
			elm = this.getElements("x" + infix + "_createdDatettime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->createdDatettime->caption(), $billing_voucher->createdDatettime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->LabTestReleased->Required) { ?>
			elm = this.getElements("x" + infix + "_LabTestReleased");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->LabTestReleased->caption(), $billing_voucher->LabTestReleased->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->GoogleReviewID->Required) { ?>
			elm = this.getElements("x" + infix + "_GoogleReviewID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->GoogleReviewID->caption(), $billing_voucher->GoogleReviewID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->CardType->Required) { ?>
			elm = this.getElements("x" + infix + "_CardType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->CardType->caption(), $billing_voucher->CardType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->PharmacyBill->Required) { ?>
			elm = this.getElements("x" + infix + "_PharmacyBill");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->PharmacyBill->caption(), $billing_voucher->PharmacyBill->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_add->DiscountAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->DiscountAmount->caption(), $billing_voucher->DiscountAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DiscountAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->DiscountAmount->errorMessage()) ?>");
		<?php if ($billing_voucher_add->Cash->Required) { ?>
			elm = this.getElements("x" + infix + "_Cash");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Cash->caption(), $billing_voucher->Cash->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Cash");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->Cash->errorMessage()) ?>");
		<?php if ($billing_voucher_add->Card->Required) { ?>
			elm = this.getElements("x" + infix + "_Card");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Card->caption(), $billing_voucher->Card->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Card");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->Card->errorMessage()) ?>");

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
fbilling_voucheradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbilling_voucheradd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fbilling_voucheradd.lists["x_Reception"] = <?php echo $billing_voucher_add->Reception->Lookup->toClientList() ?>;
fbilling_voucheradd.lists["x_Reception"].options = <?php echo JsonEncode($billing_voucher_add->Reception->lookupOptions()) ?>;
fbilling_voucheradd.lists["x_Doctor"] = <?php echo $billing_voucher_add->Doctor->Lookup->toClientList() ?>;
fbilling_voucheradd.lists["x_Doctor"].options = <?php echo JsonEncode($billing_voucher_add->Doctor->lookupOptions()) ?>;
fbilling_voucheradd.autoSuggests["x_Doctor"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fbilling_voucheradd.lists["x_voucher_type"] = <?php echo $billing_voucher_add->voucher_type->Lookup->toClientList() ?>;
fbilling_voucheradd.lists["x_voucher_type"].options = <?php echo JsonEncode($billing_voucher_add->voucher_type->lookupOptions()) ?>;
fbilling_voucheradd.lists["x_ModeofPayment"] = <?php echo $billing_voucher_add->ModeofPayment->Lookup->toClientList() ?>;
fbilling_voucheradd.lists["x_ModeofPayment"].options = <?php echo JsonEncode($billing_voucher_add->ModeofPayment->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $billing_voucher_add->showPageHeader(); ?>
<?php
$billing_voucher_add->showMessage();
?>
<form name="fbilling_voucheradd" id="fbilling_voucheradd" class="<?php echo $billing_voucher_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($billing_voucher_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $billing_voucher_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_voucher">
<?php if ($billing_voucher->isConfirm()) { // Confirm page ?>
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="confirm" id="confirm" value="confirm">
<?php } else { ?>
<input type="hidden" name="action" id="action" value="confirm">
<?php } ?>
<input type="hidden" name="modal" value="<?php echo (int)$billing_voucher_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($billing_voucher->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_billing_voucher_PatId" for="x_PatId" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_PatId" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->PatId->caption() ?><?php echo ($billing_voucher->PatId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->PatId->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_PatId" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_PatId">
<input type="text" data-table="billing_voucher" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->PatId->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->PatId->EditValue ?>"<?php echo $billing_voucher->PatId->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="orig_billing_voucher_PatId" class="billing_voucheradd" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->PatId->ViewValue) ?>">
</script>
<script id="tpx_billing_voucher_PatId" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_PatId">
<span<?php echo $billing_voucher->PatId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->PatId->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_PatId" name="x_PatId" id="x_PatId" value="<?php echo HtmlEncode($billing_voucher->PatId->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_billing_voucher_Reception" for="x_Reception" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_Reception" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->Reception->caption() ?><?php echo ($billing_voucher->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->Reception->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Reception" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Reception">
<?php $billing_voucher->Reception->EditAttrs["onchange"] = "ew.autoFill(this);" . @$billing_voucher->Reception->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?php echo strval($billing_voucher->Reception->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($billing_voucher->Reception->ViewValue) : $billing_voucher->Reception->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($billing_voucher->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($billing_voucher->Reception->ReadOnly || $billing_voucher->Reception->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $billing_voucher->Reception->Lookup->getParamTag("p_x_Reception") ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $billing_voucher->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?php echo $billing_voucher->Reception->CurrentValue ?>"<?php echo $billing_voucher->Reception->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="orig_billing_voucher_Reception" class="billing_voucheradd" type="text/html">
<?php echo GetImageViewTag($billing_voucher->Reception, $billing_voucher->Reception->ViewValue) ?>
</script>
<script id="tpx_billing_voucher_Reception" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Reception">
<span>
<?php echo GetImageViewTag($billing_voucher->Reception, $billing_voucher->Reception->ViewValue) ?></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($billing_voucher->Reception->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_billing_voucher_BillNumber" for="x_BillNumber" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_BillNumber" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->BillNumber->caption() ?><?php echo ($billing_voucher->BillNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->BillNumber->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_BillNumber" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_BillNumber">
<input type="text" data-table="billing_voucher" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->BillNumber->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->BillNumber->EditValue ?>"<?php echo $billing_voucher->BillNumber->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_BillNumber" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_BillNumber">
<span<?php echo $billing_voucher->BillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->BillNumber->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" value="<?php echo HtmlEncode($billing_voucher->BillNumber->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_billing_voucher_PatientId" for="x_PatientId" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_PatientId" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->PatientId->caption() ?><?php echo ($billing_voucher->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->PatientId->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_PatientId" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_PatientId">
<input type="text" data-table="billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="80" placeholder="<?php echo HtmlEncode($billing_voucher->PatientId->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->PatientId->EditValue ?>"<?php echo $billing_voucher->PatientId->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_PatientId" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_PatientId">
<span>
<?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->ViewValue) ?></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" value="<?php echo HtmlEncode($billing_voucher->PatientId->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_billing_voucher_mrnno" for="x_mrnno" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_mrnno" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->mrnno->caption() ?><?php echo ($billing_voucher->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->mrnno->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_mrnno" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_mrnno">
<input type="text" data-table="billing_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->mrnno->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->mrnno->EditValue ?>"<?php echo $billing_voucher->mrnno->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_mrnno" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_mrnno">
<span<?php echo $billing_voucher->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->mrnno->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($billing_voucher->mrnno->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_billing_voucher_PatientName" for="x_PatientName" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_PatientName" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->PatientName->caption() ?><?php echo ($billing_voucher->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->PatientName->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_PatientName" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_PatientName">
<input type="text" data-table="billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->PatientName->EditValue ?>"<?php echo $billing_voucher->PatientName->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_PatientName" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_PatientName">
<span<?php echo $billing_voucher->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->PatientName->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" value="<?php echo HtmlEncode($billing_voucher->PatientName->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_billing_voucher_Age" for="x_Age" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_Age" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->Age->caption() ?><?php echo ($billing_voucher->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->Age->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Age" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Age">
<input type="text" data-table="billing_voucher" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Age->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Age->EditValue ?>"<?php echo $billing_voucher->Age->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_Age" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Age">
<span<?php echo $billing_voucher->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Age->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_Age" name="x_Age" id="x_Age" value="<?php echo HtmlEncode($billing_voucher->Age->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_billing_voucher_Gender" for="x_Gender" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_Gender" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->Gender->caption() ?><?php echo ($billing_voucher->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->Gender->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Gender" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Gender">
<input type="text" data-table="billing_voucher" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Gender->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Gender->EditValue ?>"<?php echo $billing_voucher->Gender->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_Gender" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Gender">
<span<?php echo $billing_voucher->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Gender->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_Gender" name="x_Gender" id="x_Gender" value="<?php echo HtmlEncode($billing_voucher->Gender->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_billing_voucher_profilePic" for="x_profilePic" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_profilePic" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->profilePic->caption() ?><?php echo ($billing_voucher->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->profilePic->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_profilePic" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_profilePic">
<input type="text" data-table="billing_voucher" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" placeholder="<?php echo HtmlEncode($billing_voucher->profilePic->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->profilePic->EditValue ?>"<?php echo $billing_voucher->profilePic->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_profilePic" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_profilePic">
<span<?php echo $billing_voucher->profilePic->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->profilePic->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" value="<?php echo HtmlEncode($billing_voucher->profilePic->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_billing_voucher_Mobile" for="x_Mobile" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_Mobile" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->Mobile->caption() ?><?php echo ($billing_voucher->Mobile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->Mobile->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Mobile" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Mobile">
<input type="text" data-table="billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Mobile->EditValue ?>"<?php echo $billing_voucher->Mobile->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_Mobile" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Mobile">
<span<?php echo $billing_voucher->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Mobile->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" value="<?php echo HtmlEncode($billing_voucher->Mobile->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label id="elh_billing_voucher_IP_OP" for="x_IP_OP" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_IP_OP" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->IP_OP->caption() ?><?php echo ($billing_voucher->IP_OP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->IP_OP->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_IP_OP" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_IP_OP">
<input type="text" data-table="billing_voucher" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->IP_OP->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->IP_OP->EditValue ?>"<?php echo $billing_voucher->IP_OP->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_IP_OP" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_IP_OP">
<span<?php echo $billing_voucher->IP_OP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->IP_OP->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" value="<?php echo HtmlEncode($billing_voucher->IP_OP->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->IP_OP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_billing_voucher_Doctor" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_Doctor" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->Doctor->caption() ?><?php echo ($billing_voucher->Doctor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->Doctor->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Doctor" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Doctor">
<?php
$wrkonchange = "" . trim(@$billing_voucher->Doctor->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$billing_voucher->Doctor->EditAttrs["onchange"] = "";
?>
<span id="as_x_Doctor" class="text-nowrap" style="z-index: 8870">
	<input type="text" class="form-control" name="sv_x_Doctor" id="sv_x_Doctor" value="<?php echo RemoveHtml($billing_voucher->Doctor->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Doctor->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($billing_voucher->Doctor->getPlaceHolder()) ?>"<?php echo $billing_voucher->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Doctor" data-value-separator="<?php echo $billing_voucher->Doctor->displayValueSeparatorAttribute() ?>" name="x_Doctor" id="x_Doctor" value="<?php echo HtmlEncode($billing_voucher->Doctor->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $billing_voucher->Doctor->Lookup->getParamTag("p_x_Doctor") ?>
</span>
</script>
<script type="text/html" class="billing_voucheradd_js">
fbilling_voucheradd.createAutoSuggest({"id":"x_Doctor","forceSelect":false});
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_Doctor" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Doctor">
<span<?php echo $billing_voucher->Doctor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Doctor->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" value="<?php echo HtmlEncode($billing_voucher->Doctor->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_billing_voucher_voucher_type" for="x_voucher_type" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_voucher_type" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->voucher_type->caption() ?><?php echo ($billing_voucher->voucher_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->voucher_type->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_voucher_type" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_voucher_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="billing_voucher" data-field="x_voucher_type" data-value-separator="<?php echo $billing_voucher->voucher_type->displayValueSeparatorAttribute() ?>" id="x_voucher_type" name="x_voucher_type"<?php echo $billing_voucher->voucher_type->editAttributes() ?>>
		<?php echo $billing_voucher->voucher_type->selectOptionListHtml("x_voucher_type") ?>
	</select>
</div>
<?php echo $billing_voucher->voucher_type->Lookup->getParamTag("p_x_voucher_type") ?>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_voucher_type" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_voucher_type">
<span<?php echo $billing_voucher->voucher_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->voucher_type->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" value="<?php echo HtmlEncode($billing_voucher->voucher_type->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_billing_voucher_Details" for="x_Details" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_Details" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->Details->caption() ?><?php echo ($billing_voucher->Details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->Details->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Details" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Details">
<input type="text" data-table="billing_voucher" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Details->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Details->EditValue ?>"<?php echo $billing_voucher->Details->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_Details" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Details">
<span<?php echo $billing_voucher->Details->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Details->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_Details" name="x_Details" id="x_Details" value="<?php echo HtmlEncode($billing_voucher->Details->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_billing_voucher_ModeofPayment" for="x_ModeofPayment" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_ModeofPayment" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->ModeofPayment->caption() ?><?php echo ($billing_voucher->ModeofPayment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->ModeofPayment->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_ModeofPayment" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $billing_voucher->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $billing_voucher->ModeofPayment->editAttributes() ?>>
		<?php echo $billing_voucher->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
	</select>
</div>
<?php echo $billing_voucher->ModeofPayment->Lookup->getParamTag("p_x_ModeofPayment") ?>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_ModeofPayment" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_ModeofPayment">
<span<?php echo $billing_voucher->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->ModeofPayment->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" value="<?php echo HtmlEncode($billing_voucher->ModeofPayment->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_billing_voucher_Amount" for="x_Amount" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_Amount" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->Amount->caption() ?><?php echo ($billing_voucher->Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->Amount->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Amount" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Amount">
<input type="text" data-table="billing_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->Amount->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Amount->EditValue ?>"<?php echo $billing_voucher->Amount->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_Amount" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Amount">
<span<?php echo $billing_voucher->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Amount->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" value="<?php echo HtmlEncode($billing_voucher->Amount->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_billing_voucher_AnyDues" for="x_AnyDues" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_AnyDues" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->AnyDues->caption() ?><?php echo ($billing_voucher->AnyDues->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->AnyDues->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_AnyDues" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_AnyDues">
<input type="text" data-table="billing_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->AnyDues->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->AnyDues->EditValue ?>"<?php echo $billing_voucher->AnyDues->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_AnyDues" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_AnyDues">
<span<?php echo $billing_voucher->AnyDues->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->AnyDues->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" value="<?php echo HtmlEncode($billing_voucher->AnyDues->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
	<?php if (!$billing_voucher->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_billing_voucher_createdby" class="billing_voucheradd" type="text/html">
	<span id="el_billing_voucher_createdby">
	<span<?php echo $billing_voucher->createdby->viewAttributes() ?>>
	<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->createdby->ViewValue) ?>"></span>
	</span>
	</script>
	<input type="hidden" data-table="billing_voucher" data-field="x_createdby" name="x_createdby" id="x_createdby" value="<?php echo HtmlEncode($billing_voucher->createdby->FormValue) ?>">
	<?php } ?>
	<?php if (!$billing_voucher->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_billing_voucher_createddatetime" class="billing_voucheradd" type="text/html">
	<span id="el_billing_voucher_createddatetime">
	<span<?php echo $billing_voucher->createddatetime->viewAttributes() ?>>
	<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->createddatetime->ViewValue) ?>"></span>
	</span>
	</script>
	<input type="hidden" data-table="billing_voucher" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" value="<?php echo HtmlEncode($billing_voucher->createddatetime->FormValue) ?>">
	<?php } ?>
<?php if ($billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_billing_voucher_RealizationAmount" for="x_RealizationAmount" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_RealizationAmount" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->RealizationAmount->caption() ?><?php echo ($billing_voucher->RealizationAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->RealizationAmount->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_RealizationAmount" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_RealizationAmount">
<input type="text" data-table="billing_voucher" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationAmount->EditValue ?>"<?php echo $billing_voucher->RealizationAmount->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_RealizationAmount" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_RealizationAmount">
<span<?php echo $billing_voucher->RealizationAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->RealizationAmount->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" value="<?php echo HtmlEncode($billing_voucher->RealizationAmount->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_billing_voucher_RealizationStatus" for="x_RealizationStatus" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_RealizationStatus" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->RealizationStatus->caption() ?><?php echo ($billing_voucher->RealizationStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->RealizationStatus->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_RealizationStatus" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_RealizationStatus">
<input type="text" data-table="billing_voucher" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationStatus->EditValue ?>"<?php echo $billing_voucher->RealizationStatus->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_RealizationStatus" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_RealizationStatus">
<span<?php echo $billing_voucher->RealizationStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->RealizationStatus->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" value="<?php echo HtmlEncode($billing_voucher->RealizationStatus->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_billing_voucher_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_RealizationRemarks" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->RealizationRemarks->caption() ?><?php echo ($billing_voucher->RealizationRemarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->RealizationRemarks->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_RealizationRemarks" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_RealizationRemarks">
<input type="text" data-table="billing_voucher" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationRemarks->EditValue ?>"<?php echo $billing_voucher->RealizationRemarks->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_RealizationRemarks" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_RealizationRemarks">
<span<?php echo $billing_voucher->RealizationRemarks->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->RealizationRemarks->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" value="<?php echo HtmlEncode($billing_voucher->RealizationRemarks->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_billing_voucher_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_RealizationBatchNo" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->RealizationBatchNo->caption() ?><?php echo ($billing_voucher->RealizationBatchNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->RealizationBatchNo->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_RealizationBatchNo" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_RealizationBatchNo">
<input type="text" data-table="billing_voucher" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationBatchNo->EditValue ?>"<?php echo $billing_voucher->RealizationBatchNo->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_RealizationBatchNo" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_RealizationBatchNo">
<span<?php echo $billing_voucher->RealizationBatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->RealizationBatchNo->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" value="<?php echo HtmlEncode($billing_voucher->RealizationBatchNo->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_billing_voucher_RealizationDate" for="x_RealizationDate" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_RealizationDate" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->RealizationDate->caption() ?><?php echo ($billing_voucher->RealizationDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->RealizationDate->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_RealizationDate" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_RealizationDate">
<input type="text" data-table="billing_voucher" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationDate->EditValue ?>"<?php echo $billing_voucher->RealizationDate->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_RealizationDate" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_RealizationDate">
<span<?php echo $billing_voucher->RealizationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->RealizationDate->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" value="<?php echo HtmlEncode($billing_voucher->RealizationDate->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
	<?php if (!$billing_voucher->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_billing_voucher_HospID" class="billing_voucheradd" type="text/html">
	<span id="el_billing_voucher_HospID">
	<span<?php echo $billing_voucher->HospID->viewAttributes() ?>>
	<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->HospID->ViewValue) ?>"></span>
	</span>
	</script>
	<input type="hidden" data-table="billing_voucher" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($billing_voucher->HospID->FormValue) ?>">
	<?php } ?>
<?php if ($billing_voucher->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_billing_voucher_RIDNO" for="x_RIDNO" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_RIDNO" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->RIDNO->caption() ?><?php echo ($billing_voucher->RIDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->RIDNO->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_RIDNO" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_RIDNO">
<input type="text" data-table="billing_voucher" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->RIDNO->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RIDNO->EditValue ?>"<?php echo $billing_voucher->RIDNO->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_RIDNO" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_RIDNO">
<span<?php echo $billing_voucher->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->RIDNO->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" value="<?php echo HtmlEncode($billing_voucher->RIDNO->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_billing_voucher_TidNo" for="x_TidNo" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_TidNo" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->TidNo->caption() ?><?php echo ($billing_voucher->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->TidNo->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_TidNo" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_TidNo">
<input type="text" data-table="billing_voucher" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->TidNo->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->TidNo->EditValue ?>"<?php echo $billing_voucher->TidNo->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_TidNo" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_TidNo">
<span<?php echo $billing_voucher->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->TidNo->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" value="<?php echo HtmlEncode($billing_voucher->TidNo->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_billing_voucher_CId" for="x_CId" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_CId" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->CId->caption() ?><?php echo ($billing_voucher->CId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->CId->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CId" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CId">
<input type="text" data-table="billing_voucher" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->CId->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->CId->EditValue ?>"<?php echo $billing_voucher->CId->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_CId" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CId">
<span<?php echo $billing_voucher->CId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->CId->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_CId" name="x_CId" id="x_CId" value="<?php echo HtmlEncode($billing_voucher->CId->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_billing_voucher_PartnerName" for="x_PartnerName" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_PartnerName" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->PartnerName->caption() ?><?php echo ($billing_voucher->PartnerName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->PartnerName->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_PartnerName" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_PartnerName">
<input type="text" data-table="billing_voucher" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->PartnerName->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->PartnerName->EditValue ?>"<?php echo $billing_voucher->PartnerName->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_PartnerName" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_PartnerName">
<span<?php echo $billing_voucher->PartnerName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->PartnerName->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" value="<?php echo HtmlEncode($billing_voucher->PartnerName->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label id="elh_billing_voucher_PayerType" for="x_PayerType" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_PayerType" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->PayerType->caption() ?><?php echo ($billing_voucher->PayerType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->PayerType->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_PayerType" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_PayerType">
<input type="text" data-table="billing_voucher" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->PayerType->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->PayerType->EditValue ?>"<?php echo $billing_voucher->PayerType->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_PayerType" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_PayerType">
<span<?php echo $billing_voucher->PayerType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->PayerType->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" value="<?php echo HtmlEncode($billing_voucher->PayerType->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->PayerType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh_billing_voucher_Dob" for="x_Dob" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_Dob" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->Dob->caption() ?><?php echo ($billing_voucher->Dob->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->Dob->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Dob" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Dob">
<input type="text" data-table="billing_voucher" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Dob->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Dob->EditValue ?>"<?php echo $billing_voucher->Dob->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_Dob" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Dob">
<span<?php echo $billing_voucher->Dob->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Dob->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_Dob" name="x_Dob" id="x_Dob" value="<?php echo HtmlEncode($billing_voucher->Dob->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_billing_voucher_Currency" for="x_Currency" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_Currency" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->Currency->caption() ?><?php echo ($billing_voucher->Currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->Currency->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Currency" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Currency">
<input type="text" data-table="billing_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Currency->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Currency->EditValue ?>"<?php echo $billing_voucher->Currency->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_Currency" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Currency">
<span<?php echo $billing_voucher->Currency->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Currency->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" value="<?php echo HtmlEncode($billing_voucher->Currency->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label id="elh_billing_voucher_DiscountRemarks" for="x_DiscountRemarks" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_DiscountRemarks" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->DiscountRemarks->caption() ?><?php echo ($billing_voucher->DiscountRemarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->DiscountRemarks->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_DiscountRemarks" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_DiscountRemarks">
<input type="text" data-table="billing_voucher" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->DiscountRemarks->EditValue ?>"<?php echo $billing_voucher->DiscountRemarks->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_DiscountRemarks" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_DiscountRemarks">
<span<?php echo $billing_voucher->DiscountRemarks->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->DiscountRemarks->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" value="<?php echo HtmlEncode($billing_voucher->DiscountRemarks->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->DiscountRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_billing_voucher_Remarks" for="x_Remarks" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_Remarks" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->Remarks->caption() ?><?php echo ($billing_voucher->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->Remarks->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Remarks" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Remarks">
<input type="text" data-table="billing_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Remarks->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Remarks->EditValue ?>"<?php echo $billing_voucher->Remarks->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_Remarks" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Remarks">
<span<?php echo $billing_voucher->Remarks->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Remarks->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" value="<?php echo HtmlEncode($billing_voucher->Remarks->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_billing_voucher_DrDepartment" for="x_DrDepartment" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_DrDepartment" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->DrDepartment->caption() ?><?php echo ($billing_voucher->DrDepartment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->DrDepartment->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_DrDepartment" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_DrDepartment">
<input type="text" data-table="billing_voucher" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->DrDepartment->EditValue ?>"<?php echo $billing_voucher->DrDepartment->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_DrDepartment" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_DrDepartment">
<span<?php echo $billing_voucher->DrDepartment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->DrDepartment->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" value="<?php echo HtmlEncode($billing_voucher->DrDepartment->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label id="elh_billing_voucher_RefferedBy" for="x_RefferedBy" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_RefferedBy" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->RefferedBy->caption() ?><?php echo ($billing_voucher->RefferedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->RefferedBy->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_RefferedBy" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_RefferedBy">
<input type="text" data-table="billing_voucher" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RefferedBy->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RefferedBy->EditValue ?>"<?php echo $billing_voucher->RefferedBy->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_RefferedBy" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_RefferedBy">
<span<?php echo $billing_voucher->RefferedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->RefferedBy->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" value="<?php echo HtmlEncode($billing_voucher->RefferedBy->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->RefferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_billing_voucher_CardNumber" for="x_CardNumber" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_CardNumber" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->CardNumber->caption() ?><?php echo ($billing_voucher->CardNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->CardNumber->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CardNumber" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CardNumber">
<input type="text" data-table="billing_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->CardNumber->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->CardNumber->EditValue ?>"<?php echo $billing_voucher->CardNumber->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_CardNumber" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CardNumber">
<span<?php echo $billing_voucher->CardNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->CardNumber->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" value="<?php echo HtmlEncode($billing_voucher->CardNumber->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_billing_voucher_BankName" for="x_BankName" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_BankName" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->BankName->caption() ?><?php echo ($billing_voucher->BankName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->BankName->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_BankName" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_BankName">
<input type="text" data-table="billing_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->BankName->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->BankName->EditValue ?>"<?php echo $billing_voucher->BankName->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_BankName" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_BankName">
<span<?php echo $billing_voucher->BankName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->BankName->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" value="<?php echo HtmlEncode($billing_voucher->BankName->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_billing_voucher_DrID" for="x_DrID" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_DrID" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->DrID->caption() ?><?php echo ($billing_voucher->DrID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->DrID->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_DrID" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_DrID">
<input type="text" data-table="billing_voucher" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->DrID->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->DrID->EditValue ?>"<?php echo $billing_voucher->DrID->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_DrID" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_DrID">
<span<?php echo $billing_voucher->DrID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->DrID->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_DrID" name="x_DrID" id="x_DrID" value="<?php echo HtmlEncode($billing_voucher->DrID->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_billing_voucher_BillStatus" for="x_BillStatus" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_BillStatus" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->BillStatus->caption() ?><?php echo ($billing_voucher->BillStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->BillStatus->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_BillStatus" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_BillStatus">
<input type="text" data-table="billing_voucher" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->BillStatus->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->BillStatus->EditValue ?>"<?php echo $billing_voucher->BillStatus->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_BillStatus" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_BillStatus">
<span<?php echo $billing_voucher->BillStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->BillStatus->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" value="<?php echo HtmlEncode($billing_voucher->BillStatus->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_billing_voucher_ReportHeader" for="x_ReportHeader" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_ReportHeader" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->ReportHeader->caption() ?><?php echo ($billing_voucher->ReportHeader->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->ReportHeader->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_ReportHeader" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_ReportHeader">
<input type="text" data-table="billing_voucher" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->ReportHeader->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->ReportHeader->EditValue ?>"<?php echo $billing_voucher->ReportHeader->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_ReportHeader" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_ReportHeader">
<span<?php echo $billing_voucher->ReportHeader->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->ReportHeader->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader" value="<?php echo HtmlEncode($billing_voucher->ReportHeader->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
	<?php if (!$billing_voucher->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_billing_voucher_UserName" class="billing_voucheradd" type="text/html">
	<span id="el_billing_voucher_UserName">
	<span<?php echo $billing_voucher->UserName->viewAttributes() ?>>
	<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->UserName->ViewValue) ?>"></span>
	</span>
	</script>
	<input type="hidden" data-table="billing_voucher" data-field="x_UserName" name="x_UserName" id="x_UserName" value="<?php echo HtmlEncode($billing_voucher->UserName->FormValue) ?>">
	<?php } ?>
<?php if ($billing_voucher->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
	<div id="r_AdjustmentAdvance" class="form-group row">
		<label id="elh_billing_voucher_AdjustmentAdvance" for="x_AdjustmentAdvance" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_AdjustmentAdvance" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->AdjustmentAdvance->caption() ?><?php echo ($billing_voucher->AdjustmentAdvance->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->AdjustmentAdvance->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_AdjustmentAdvance" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_AdjustmentAdvance">
<input type="text" data-table="billing_voucher" data-field="x_AdjustmentAdvance" name="x_AdjustmentAdvance" id="x_AdjustmentAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->AdjustmentAdvance->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->AdjustmentAdvance->EditValue ?>"<?php echo $billing_voucher->AdjustmentAdvance->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_AdjustmentAdvance" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_AdjustmentAdvance">
<span<?php echo $billing_voucher->AdjustmentAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->AdjustmentAdvance->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_AdjustmentAdvance" name="x_AdjustmentAdvance" id="x_AdjustmentAdvance" value="<?php echo HtmlEncode($billing_voucher->AdjustmentAdvance->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->AdjustmentAdvance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->billing_vouchercol->Visible) { // billing_vouchercol ?>
	<div id="r_billing_vouchercol" class="form-group row">
		<label id="elh_billing_voucher_billing_vouchercol" for="x_billing_vouchercol" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_billing_vouchercol" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->billing_vouchercol->caption() ?><?php echo ($billing_voucher->billing_vouchercol->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->billing_vouchercol->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_billing_vouchercol" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_billing_vouchercol">
<input type="text" data-table="billing_voucher" data-field="x_billing_vouchercol" name="x_billing_vouchercol" id="x_billing_vouchercol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->billing_vouchercol->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->billing_vouchercol->EditValue ?>"<?php echo $billing_voucher->billing_vouchercol->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_billing_vouchercol" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_billing_vouchercol">
<span<?php echo $billing_voucher->billing_vouchercol->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->billing_vouchercol->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_billing_vouchercol" name="x_billing_vouchercol" id="x_billing_vouchercol" value="<?php echo HtmlEncode($billing_voucher->billing_vouchercol->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->billing_vouchercol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->BillType->Visible) { // BillType ?>
	<div id="r_BillType" class="form-group row">
		<label id="elh_billing_voucher_BillType" for="x_BillType" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_BillType" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->BillType->caption() ?><?php echo ($billing_voucher->BillType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->BillType->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_BillType" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_BillType">
<input type="text" data-table="billing_voucher" data-field="x_BillType" name="x_BillType" id="x_BillType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->BillType->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->BillType->EditValue ?>"<?php echo $billing_voucher->BillType->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_BillType" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_BillType">
<span<?php echo $billing_voucher->BillType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->BillType->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_BillType" name="x_BillType" id="x_BillType" value="<?php echo HtmlEncode($billing_voucher->BillType->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->BillType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->ProcedureName->Visible) { // ProcedureName ?>
	<div id="r_ProcedureName" class="form-group row">
		<label id="elh_billing_voucher_ProcedureName" for="x_ProcedureName" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_ProcedureName" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->ProcedureName->caption() ?><?php echo ($billing_voucher->ProcedureName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->ProcedureName->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_ProcedureName" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_ProcedureName">
<input type="text" data-table="billing_voucher" data-field="x_ProcedureName" name="x_ProcedureName" id="x_ProcedureName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->ProcedureName->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->ProcedureName->EditValue ?>"<?php echo $billing_voucher->ProcedureName->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_ProcedureName" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_ProcedureName">
<span<?php echo $billing_voucher->ProcedureName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->ProcedureName->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_ProcedureName" name="x_ProcedureName" id="x_ProcedureName" value="<?php echo HtmlEncode($billing_voucher->ProcedureName->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->ProcedureName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->ProcedureAmount->Visible) { // ProcedureAmount ?>
	<div id="r_ProcedureAmount" class="form-group row">
		<label id="elh_billing_voucher_ProcedureAmount" for="x_ProcedureAmount" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_ProcedureAmount" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->ProcedureAmount->caption() ?><?php echo ($billing_voucher->ProcedureAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->ProcedureAmount->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_ProcedureAmount" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_ProcedureAmount">
<input type="text" data-table="billing_voucher" data-field="x_ProcedureAmount" name="x_ProcedureAmount" id="x_ProcedureAmount" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->ProcedureAmount->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->ProcedureAmount->EditValue ?>"<?php echo $billing_voucher->ProcedureAmount->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_ProcedureAmount" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_ProcedureAmount">
<span<?php echo $billing_voucher->ProcedureAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->ProcedureAmount->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_ProcedureAmount" name="x_ProcedureAmount" id="x_ProcedureAmount" value="<?php echo HtmlEncode($billing_voucher->ProcedureAmount->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->ProcedureAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->IncludePackage->Visible) { // IncludePackage ?>
	<div id="r_IncludePackage" class="form-group row">
		<label id="elh_billing_voucher_IncludePackage" for="x_IncludePackage" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_IncludePackage" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->IncludePackage->caption() ?><?php echo ($billing_voucher->IncludePackage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->IncludePackage->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_IncludePackage" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_IncludePackage">
<input type="text" data-table="billing_voucher" data-field="x_IncludePackage" name="x_IncludePackage" id="x_IncludePackage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->IncludePackage->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->IncludePackage->EditValue ?>"<?php echo $billing_voucher->IncludePackage->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_IncludePackage" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_IncludePackage">
<span<?php echo $billing_voucher->IncludePackage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->IncludePackage->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_IncludePackage" name="x_IncludePackage" id="x_IncludePackage" value="<?php echo HtmlEncode($billing_voucher->IncludePackage->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->IncludePackage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->CancelBill->Visible) { // CancelBill ?>
	<div id="r_CancelBill" class="form-group row">
		<label id="elh_billing_voucher_CancelBill" for="x_CancelBill" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_CancelBill" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->CancelBill->caption() ?><?php echo ($billing_voucher->CancelBill->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->CancelBill->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CancelBill" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CancelBill">
<input type="text" data-table="billing_voucher" data-field="x_CancelBill" name="x_CancelBill" id="x_CancelBill" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->CancelBill->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->CancelBill->EditValue ?>"<?php echo $billing_voucher->CancelBill->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_CancelBill" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CancelBill">
<span<?php echo $billing_voucher->CancelBill->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->CancelBill->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelBill" name="x_CancelBill" id="x_CancelBill" value="<?php echo HtmlEncode($billing_voucher->CancelBill->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->CancelBill->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->CancelReason->Visible) { // CancelReason ?>
	<div id="r_CancelReason" class="form-group row">
		<label id="elh_billing_voucher_CancelReason" for="x_CancelReason" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_CancelReason" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->CancelReason->caption() ?><?php echo ($billing_voucher->CancelReason->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->CancelReason->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CancelReason" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CancelReason">
<input type="text" data-table="billing_voucher" data-field="x_CancelReason" name="x_CancelReason" id="x_CancelReason" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->CancelReason->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->CancelReason->EditValue ?>"<?php echo $billing_voucher->CancelReason->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_CancelReason" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CancelReason">
<span<?php echo $billing_voucher->CancelReason->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->CancelReason->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelReason" name="x_CancelReason" id="x_CancelReason" value="<?php echo HtmlEncode($billing_voucher->CancelReason->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->CancelReason->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
	<div id="r_CancelModeOfPayment" class="form-group row">
		<label id="elh_billing_voucher_CancelModeOfPayment" for="x_CancelModeOfPayment" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_CancelModeOfPayment" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->CancelModeOfPayment->caption() ?><?php echo ($billing_voucher->CancelModeOfPayment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->CancelModeOfPayment->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CancelModeOfPayment" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CancelModeOfPayment">
<input type="text" data-table="billing_voucher" data-field="x_CancelModeOfPayment" name="x_CancelModeOfPayment" id="x_CancelModeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->CancelModeOfPayment->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->CancelModeOfPayment->EditValue ?>"<?php echo $billing_voucher->CancelModeOfPayment->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_CancelModeOfPayment" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CancelModeOfPayment">
<span<?php echo $billing_voucher->CancelModeOfPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->CancelModeOfPayment->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelModeOfPayment" name="x_CancelModeOfPayment" id="x_CancelModeOfPayment" value="<?php echo HtmlEncode($billing_voucher->CancelModeOfPayment->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->CancelModeOfPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->CancelAmount->Visible) { // CancelAmount ?>
	<div id="r_CancelAmount" class="form-group row">
		<label id="elh_billing_voucher_CancelAmount" for="x_CancelAmount" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_CancelAmount" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->CancelAmount->caption() ?><?php echo ($billing_voucher->CancelAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->CancelAmount->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CancelAmount" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CancelAmount">
<input type="text" data-table="billing_voucher" data-field="x_CancelAmount" name="x_CancelAmount" id="x_CancelAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->CancelAmount->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->CancelAmount->EditValue ?>"<?php echo $billing_voucher->CancelAmount->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_CancelAmount" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CancelAmount">
<span<?php echo $billing_voucher->CancelAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->CancelAmount->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelAmount" name="x_CancelAmount" id="x_CancelAmount" value="<?php echo HtmlEncode($billing_voucher->CancelAmount->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->CancelAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->CancelBankName->Visible) { // CancelBankName ?>
	<div id="r_CancelBankName" class="form-group row">
		<label id="elh_billing_voucher_CancelBankName" for="x_CancelBankName" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_CancelBankName" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->CancelBankName->caption() ?><?php echo ($billing_voucher->CancelBankName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->CancelBankName->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CancelBankName" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CancelBankName">
<input type="text" data-table="billing_voucher" data-field="x_CancelBankName" name="x_CancelBankName" id="x_CancelBankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->CancelBankName->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->CancelBankName->EditValue ?>"<?php echo $billing_voucher->CancelBankName->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_CancelBankName" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CancelBankName">
<span<?php echo $billing_voucher->CancelBankName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->CancelBankName->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelBankName" name="x_CancelBankName" id="x_CancelBankName" value="<?php echo HtmlEncode($billing_voucher->CancelBankName->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->CancelBankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
	<div id="r_CancelTransactionNumber" class="form-group row">
		<label id="elh_billing_voucher_CancelTransactionNumber" for="x_CancelTransactionNumber" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_CancelTransactionNumber" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->CancelTransactionNumber->caption() ?><?php echo ($billing_voucher->CancelTransactionNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->CancelTransactionNumber->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CancelTransactionNumber" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CancelTransactionNumber">
<input type="text" data-table="billing_voucher" data-field="x_CancelTransactionNumber" name="x_CancelTransactionNumber" id="x_CancelTransactionNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->CancelTransactionNumber->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->CancelTransactionNumber->EditValue ?>"<?php echo $billing_voucher->CancelTransactionNumber->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_CancelTransactionNumber" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CancelTransactionNumber">
<span<?php echo $billing_voucher->CancelTransactionNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->CancelTransactionNumber->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelTransactionNumber" name="x_CancelTransactionNumber" id="x_CancelTransactionNumber" value="<?php echo HtmlEncode($billing_voucher->CancelTransactionNumber->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->CancelTransactionNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->LabTest->Visible) { // LabTest ?>
	<div id="r_LabTest" class="form-group row">
		<label id="elh_billing_voucher_LabTest" for="x_LabTest" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_LabTest" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->LabTest->caption() ?><?php echo ($billing_voucher->LabTest->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->LabTest->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_LabTest" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_LabTest">
<input type="text" data-table="billing_voucher" data-field="x_LabTest" name="x_LabTest" id="x_LabTest" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->LabTest->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->LabTest->EditValue ?>"<?php echo $billing_voucher->LabTest->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_LabTest" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_LabTest">
<span<?php echo $billing_voucher->LabTest->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->LabTest->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_LabTest" name="x_LabTest" id="x_LabTest" value="<?php echo HtmlEncode($billing_voucher->LabTest->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->LabTest->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->sid->Visible) { // sid ?>
	<div id="r_sid" class="form-group row">
		<label id="elh_billing_voucher_sid" for="x_sid" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_sid" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->sid->caption() ?><?php echo ($billing_voucher->sid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->sid->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_sid" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_sid">
<input type="text" data-table="billing_voucher" data-field="x_sid" name="x_sid" id="x_sid" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->sid->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->sid->EditValue ?>"<?php echo $billing_voucher->sid->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_sid" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_sid">
<span<?php echo $billing_voucher->sid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->sid->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_sid" name="x_sid" id="x_sid" value="<?php echo HtmlEncode($billing_voucher->sid->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->sid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->SidNo->Visible) { // SidNo ?>
	<div id="r_SidNo" class="form-group row">
		<label id="elh_billing_voucher_SidNo" for="x_SidNo" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_SidNo" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->SidNo->caption() ?><?php echo ($billing_voucher->SidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->SidNo->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_SidNo" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_SidNo">
<input type="text" data-table="billing_voucher" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->SidNo->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->SidNo->EditValue ?>"<?php echo $billing_voucher->SidNo->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_SidNo" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_SidNo">
<span<?php echo $billing_voucher->SidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->SidNo->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" value="<?php echo HtmlEncode($billing_voucher->SidNo->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->SidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
	<?php if (!$billing_voucher->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_billing_voucher_createdDatettime" class="billing_voucheradd" type="text/html">
	<span id="el_billing_voucher_createdDatettime">
	<span<?php echo $billing_voucher->createdDatettime->viewAttributes() ?>>
	<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->createdDatettime->ViewValue) ?>"></span>
	</span>
	</script>
	<input type="hidden" data-table="billing_voucher" data-field="x_createdDatettime" name="x_createdDatettime" id="x_createdDatettime" value="<?php echo HtmlEncode($billing_voucher->createdDatettime->FormValue) ?>">
	<?php } ?>
<?php if ($billing_voucher->LabTestReleased->Visible) { // LabTestReleased ?>
	<div id="r_LabTestReleased" class="form-group row">
		<label id="elh_billing_voucher_LabTestReleased" for="x_LabTestReleased" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_LabTestReleased" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->LabTestReleased->caption() ?><?php echo ($billing_voucher->LabTestReleased->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->LabTestReleased->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_LabTestReleased" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_LabTestReleased">
<input type="text" data-table="billing_voucher" data-field="x_LabTestReleased" name="x_LabTestReleased" id="x_LabTestReleased" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->LabTestReleased->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->LabTestReleased->EditValue ?>"<?php echo $billing_voucher->LabTestReleased->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_LabTestReleased" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_LabTestReleased">
<span<?php echo $billing_voucher->LabTestReleased->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->LabTestReleased->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_LabTestReleased" name="x_LabTestReleased" id="x_LabTestReleased" value="<?php echo HtmlEncode($billing_voucher->LabTestReleased->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->LabTestReleased->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->GoogleReviewID->Visible) { // GoogleReviewID ?>
	<div id="r_GoogleReviewID" class="form-group row">
		<label id="elh_billing_voucher_GoogleReviewID" for="x_GoogleReviewID" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_GoogleReviewID" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->GoogleReviewID->caption() ?><?php echo ($billing_voucher->GoogleReviewID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->GoogleReviewID->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_GoogleReviewID" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_GoogleReviewID">
<input type="text" data-table="billing_voucher" data-field="x_GoogleReviewID" name="x_GoogleReviewID" id="x_GoogleReviewID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->GoogleReviewID->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->GoogleReviewID->EditValue ?>"<?php echo $billing_voucher->GoogleReviewID->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_GoogleReviewID" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_GoogleReviewID">
<span<?php echo $billing_voucher->GoogleReviewID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->GoogleReviewID->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_GoogleReviewID" name="x_GoogleReviewID" id="x_GoogleReviewID" value="<?php echo HtmlEncode($billing_voucher->GoogleReviewID->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->GoogleReviewID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->CardType->Visible) { // CardType ?>
	<div id="r_CardType" class="form-group row">
		<label id="elh_billing_voucher_CardType" for="x_CardType" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_CardType" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->CardType->caption() ?><?php echo ($billing_voucher->CardType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->CardType->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CardType" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CardType">
<input type="text" data-table="billing_voucher" data-field="x_CardType" name="x_CardType" id="x_CardType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->CardType->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->CardType->EditValue ?>"<?php echo $billing_voucher->CardType->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_CardType" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_CardType">
<span<?php echo $billing_voucher->CardType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->CardType->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_CardType" name="x_CardType" id="x_CardType" value="<?php echo HtmlEncode($billing_voucher->CardType->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->CardType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->PharmacyBill->Visible) { // PharmacyBill ?>
	<div id="r_PharmacyBill" class="form-group row">
		<label id="elh_billing_voucher_PharmacyBill" for="x_PharmacyBill" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_PharmacyBill" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->PharmacyBill->caption() ?><?php echo ($billing_voucher->PharmacyBill->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->PharmacyBill->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_PharmacyBill" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_PharmacyBill">
<input type="text" data-table="billing_voucher" data-field="x_PharmacyBill" name="x_PharmacyBill" id="x_PharmacyBill" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->PharmacyBill->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->PharmacyBill->EditValue ?>"<?php echo $billing_voucher->PharmacyBill->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_PharmacyBill" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_PharmacyBill">
<span<?php echo $billing_voucher->PharmacyBill->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->PharmacyBill->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_PharmacyBill" name="x_PharmacyBill" id="x_PharmacyBill" value="<?php echo HtmlEncode($billing_voucher->PharmacyBill->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->PharmacyBill->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
	<div id="r_DiscountAmount" class="form-group row">
		<label id="elh_billing_voucher_DiscountAmount" for="x_DiscountAmount" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_DiscountAmount" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->DiscountAmount->caption() ?><?php echo ($billing_voucher->DiscountAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->DiscountAmount->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_DiscountAmount" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_DiscountAmount">
<input type="text" data-table="billing_voucher" data-field="x_DiscountAmount" name="x_DiscountAmount" id="x_DiscountAmount" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->DiscountAmount->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->DiscountAmount->EditValue ?>"<?php echo $billing_voucher->DiscountAmount->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_DiscountAmount" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_DiscountAmount">
<span<?php echo $billing_voucher->DiscountAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->DiscountAmount->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_DiscountAmount" name="x_DiscountAmount" id="x_DiscountAmount" value="<?php echo HtmlEncode($billing_voucher->DiscountAmount->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->DiscountAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->Cash->Visible) { // Cash ?>
	<div id="r_Cash" class="form-group row">
		<label id="elh_billing_voucher_Cash" for="x_Cash" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_Cash" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->Cash->caption() ?><?php echo ($billing_voucher->Cash->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->Cash->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Cash" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Cash">
<input type="text" data-table="billing_voucher" data-field="x_Cash" name="x_Cash" id="x_Cash" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->Cash->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Cash->EditValue ?>"<?php echo $billing_voucher->Cash->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_Cash" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Cash">
<span<?php echo $billing_voucher->Cash->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Cash->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_Cash" name="x_Cash" id="x_Cash" value="<?php echo HtmlEncode($billing_voucher->Cash->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->Cash->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher->Card->Visible) { // Card ?>
	<div id="r_Card" class="form-group row">
		<label id="elh_billing_voucher_Card" for="x_Card" class="<?php echo $billing_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_voucher_Card" class="billing_voucheradd" type="text/html"><span><?php echo $billing_voucher->Card->caption() ?><?php echo ($billing_voucher->Card->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $billing_voucher_add->RightColumnClass ?>"><div<?php echo $billing_voucher->Card->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Card" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Card">
<input type="text" data-table="billing_voucher" data-field="x_Card" name="x_Card" id="x_Card" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->Card->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Card->EditValue ?>"<?php echo $billing_voucher->Card->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_Card" class="billing_voucheradd" type="text/html">
<span id="el_billing_voucher_Card">
<span<?php echo $billing_voucher->Card->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Card->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="billing_voucher" data-field="x_Card" name="x_Card" id="x_Card" value="<?php echo HtmlEncode($billing_voucher->Card->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher->Card->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_billing_voucheradd" class="ew-custom-template"></div>
<script id="tpm_billing_voucheradd" type="text/html">
<div id="ct_billing_voucher_add"><style>
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
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_billing_voucher_PatId"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_PatId"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_billing_voucher_RIDNO"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_RIDNO"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_billing_voucher_CId"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_CId"/}}</h3>
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
		<td>{{include tmpl="#tpc_billing_voucher_PatientId"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_PatientId"/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_PatientName"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_PatientName"/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_Mobile"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_Mobile"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_billing_voucher_Dob"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_Dob"/}}</td>
		<td>{{include tmpl="#tpc_billing_voucher_Age"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_Age"/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_Gender"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_Gender"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_billing_voucher_PartnerName"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_PartnerName"/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_PayerType"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_PayerType"/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_RefferedBy"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_RefferedBy"/}}</td>
			<td></td>
		</tr>
		 <tr>
		 	<td>{{include tmpl="#tpc_billing_voucher_DrID"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_DrID"/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_Doctor"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_Doctor"/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_DrDepartment"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_DrDepartment"/}}</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div id="LoadGetOPAdvance"> </div>
{{include tmpl="#tpc_billing_voucher_ReportHeader"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_ReportHeader"/}}
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
			<td>{{include tmpl="#tpc_billing_voucher_ModeofPayment"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_ModeofPayment"/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_Amount"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_Amount"/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_AnyDues"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_AnyDues"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_billing_voucher_DiscountRemarks"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_DiscountRemarks"/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_Remarks"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_Remarks"/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_AdjustmentAdvance"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_AdjustmentAdvance"/}}</td>
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
		<tr>
			<td>{{include tmpl="#tpc_billing_voucher_CardNumber"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_CardNumber"/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_BankName"/}}&nbsp;{{include tmpl="#tpx_billing_voucher_BankName"/}}</td>
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
	if (in_array("patient_services", explode(",", $billing_voucher->getCurrentDetailTable())) && $patient_services->DetailAdd) {
?>
<?php if ($billing_voucher->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_servicesgrid.php" ?>
<?php } ?>
<?php if (!$billing_voucher_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $billing_voucher_add->OffsetColumnClass ?>"><!-- buttons offset -->
<?php if (!$billing_voucher->isConfirm()) { // Confirm page ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" onclick="this.form.action.value='confirm';"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $billing_voucher_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("ConfirmBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="submit" onclick="this.form.action.value='cancel';"><?php echo $Language->phrase("CancelBtn") ?></button>
<?php } ?>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($billing_voucher->Rows) ?> };
ew.applyTemplate("tpd_billing_voucheradd", "tpm_billing_voucheradd", "billing_voucheradd", "<?php echo $billing_voucher->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.billing_voucheradd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$billing_voucher_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$billing_voucher_add->terminate();
?>