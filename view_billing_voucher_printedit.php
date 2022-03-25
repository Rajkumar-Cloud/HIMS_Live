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
$view_billing_voucher_print_edit = new view_billing_voucher_print_edit();

// Run the page
$view_billing_voucher_print_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_billing_voucher_print_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_billing_voucher_printedit = currentForm = new ew.Form("fview_billing_voucher_printedit", "edit");

// Validate form
fview_billing_voucher_printedit.validate = function() {
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
		<?php if ($view_billing_voucher_print_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->id->caption(), $view_billing_voucher_print->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->Reception->caption(), $view_billing_voucher_print->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->PatientId->caption(), $view_billing_voucher_print->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->mrnno->caption(), $view_billing_voucher_print->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->PatientName->caption(), $view_billing_voucher_print->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->Age->caption(), $view_billing_voucher_print->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->Gender->caption(), $view_billing_voucher_print->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->profilePic->caption(), $view_billing_voucher_print->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->Mobile->caption(), $view_billing_voucher_print->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->IP_OP->Required) { ?>
			elm = this.getElements("x" + infix + "_IP_OP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->IP_OP->caption(), $view_billing_voucher_print->IP_OP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->Doctor->Required) { ?>
			elm = this.getElements("x" + infix + "_Doctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->Doctor->caption(), $view_billing_voucher_print->Doctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->voucher_type->Required) { ?>
			elm = this.getElements("x" + infix + "_voucher_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->voucher_type->caption(), $view_billing_voucher_print->voucher_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->Details->caption(), $view_billing_voucher_print->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->ModeofPayment->caption(), $view_billing_voucher_print->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->Amount->caption(), $view_billing_voucher_print->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->AnyDues->Required) { ?>
			elm = this.getElements("x" + infix + "_AnyDues");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->AnyDues->caption(), $view_billing_voucher_print->AnyDues->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->modifiedby->caption(), $view_billing_voucher_print->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->modifieddatetime->caption(), $view_billing_voucher_print->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->RealizationAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->RealizationAmount->caption(), $view_billing_voucher_print->RealizationAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->RealizationStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->RealizationStatus->caption(), $view_billing_voucher_print->RealizationStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->RealizationRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->RealizationRemarks->caption(), $view_billing_voucher_print->RealizationRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->RealizationBatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationBatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->RealizationBatchNo->caption(), $view_billing_voucher_print->RealizationBatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->RealizationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->RealizationDate->caption(), $view_billing_voucher_print->RealizationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->HospID->caption(), $view_billing_voucher_print->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->RIDNO->caption(), $view_billing_voucher_print->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->TidNo->caption(), $view_billing_voucher_print->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->CId->caption(), $view_billing_voucher_print->CId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->PartnerName->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->PartnerName->caption(), $view_billing_voucher_print->PartnerName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->PayerType->Required) { ?>
			elm = this.getElements("x" + infix + "_PayerType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->PayerType->caption(), $view_billing_voucher_print->PayerType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->Dob->Required) { ?>
			elm = this.getElements("x" + infix + "_Dob");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->Dob->caption(), $view_billing_voucher_print->Dob->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->Currency->Required) { ?>
			elm = this.getElements("x" + infix + "_Currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->Currency->caption(), $view_billing_voucher_print->Currency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->DiscountRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->DiscountRemarks->caption(), $view_billing_voucher_print->DiscountRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->Remarks->caption(), $view_billing_voucher_print->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->PatId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->PatId->caption(), $view_billing_voucher_print->PatId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->DrDepartment->Required) { ?>
			elm = this.getElements("x" + infix + "_DrDepartment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->DrDepartment->caption(), $view_billing_voucher_print->DrDepartment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->RefferedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_RefferedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->RefferedBy->caption(), $view_billing_voucher_print->RefferedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->BillNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_BillNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->BillNumber->caption(), $view_billing_voucher_print->BillNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->CardNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CardNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->CardNumber->caption(), $view_billing_voucher_print->CardNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->BankName->Required) { ?>
			elm = this.getElements("x" + infix + "_BankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->BankName->caption(), $view_billing_voucher_print->BankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->DrID->caption(), $view_billing_voucher_print->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->BillStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->BillStatus->caption(), $view_billing_voucher_print->BillStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->ReportHeader->Required) { ?>
			elm = this.getElements("x" + infix + "_ReportHeader[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->ReportHeader->caption(), $view_billing_voucher_print->ReportHeader->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->UserName->Required) { ?>
			elm = this.getElements("x" + infix + "_UserName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->UserName->caption(), $view_billing_voucher_print->UserName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->AdjustmentAdvance->Required) { ?>
			elm = this.getElements("x" + infix + "_AdjustmentAdvance[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->AdjustmentAdvance->caption(), $view_billing_voucher_print->AdjustmentAdvance->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->billing_vouchercol->Required) { ?>
			elm = this.getElements("x" + infix + "_billing_vouchercol");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->billing_vouchercol->caption(), $view_billing_voucher_print->billing_vouchercol->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->BillType->Required) { ?>
			elm = this.getElements("x" + infix + "_BillType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->BillType->caption(), $view_billing_voucher_print->BillType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->ProcedureName->Required) { ?>
			elm = this.getElements("x" + infix + "_ProcedureName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->ProcedureName->caption(), $view_billing_voucher_print->ProcedureName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->ProcedureAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_ProcedureAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->ProcedureAmount->caption(), $view_billing_voucher_print->ProcedureAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->IncludePackage->Required) { ?>
			elm = this.getElements("x" + infix + "_IncludePackage[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->IncludePackage->caption(), $view_billing_voucher_print->IncludePackage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->CancelBill->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelBill");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->CancelBill->caption(), $view_billing_voucher_print->CancelBill->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->CancelReason->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelReason");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->CancelReason->caption(), $view_billing_voucher_print->CancelReason->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->CancelModeOfPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelModeOfPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->CancelModeOfPayment->caption(), $view_billing_voucher_print->CancelModeOfPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->CancelAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->CancelAmount->caption(), $view_billing_voucher_print->CancelAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->CancelBankName->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelBankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->CancelBankName->caption(), $view_billing_voucher_print->CancelBankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->CancelTransactionNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelTransactionNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->CancelTransactionNumber->caption(), $view_billing_voucher_print->CancelTransactionNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->LabTest->Required) { ?>
			elm = this.getElements("x" + infix + "_LabTest");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->LabTest->caption(), $view_billing_voucher_print->LabTest->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_edit->sid->Required) { ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->sid->caption(), $view_billing_voucher_print->sid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_print->sid->errorMessage()) ?>");
		<?php if ($view_billing_voucher_print_edit->SidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->SidNo->caption(), $view_billing_voucher_print->SidNo->RequiredErrorMessage)) ?>");
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
fview_billing_voucher_printedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_billing_voucher_printedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_billing_voucher_printedit.lists["x_Reception"] = <?php echo $view_billing_voucher_print_edit->Reception->Lookup->toClientList() ?>;
fview_billing_voucher_printedit.lists["x_Reception"].options = <?php echo JsonEncode($view_billing_voucher_print_edit->Reception->lookupOptions()) ?>;
fview_billing_voucher_printedit.lists["x_ModeofPayment"] = <?php echo $view_billing_voucher_print_edit->ModeofPayment->Lookup->toClientList() ?>;
fview_billing_voucher_printedit.lists["x_ModeofPayment"].options = <?php echo JsonEncode($view_billing_voucher_print_edit->ModeofPayment->lookupOptions()) ?>;
fview_billing_voucher_printedit.lists["x_RIDNO"] = <?php echo $view_billing_voucher_print_edit->RIDNO->Lookup->toClientList() ?>;
fview_billing_voucher_printedit.lists["x_RIDNO"].options = <?php echo JsonEncode($view_billing_voucher_print_edit->RIDNO->lookupOptions()) ?>;
fview_billing_voucher_printedit.lists["x_CId"] = <?php echo $view_billing_voucher_print_edit->CId->Lookup->toClientList() ?>;
fview_billing_voucher_printedit.lists["x_CId"].options = <?php echo JsonEncode($view_billing_voucher_print_edit->CId->lookupOptions()) ?>;
fview_billing_voucher_printedit.lists["x_PatId"] = <?php echo $view_billing_voucher_print_edit->PatId->Lookup->toClientList() ?>;
fview_billing_voucher_printedit.lists["x_PatId"].options = <?php echo JsonEncode($view_billing_voucher_print_edit->PatId->lookupOptions()) ?>;
fview_billing_voucher_printedit.lists["x_RefferedBy"] = <?php echo $view_billing_voucher_print_edit->RefferedBy->Lookup->toClientList() ?>;
fview_billing_voucher_printedit.lists["x_RefferedBy"].options = <?php echo JsonEncode($view_billing_voucher_print_edit->RefferedBy->lookupOptions()) ?>;
fview_billing_voucher_printedit.lists["x_DrID"] = <?php echo $view_billing_voucher_print_edit->DrID->Lookup->toClientList() ?>;
fview_billing_voucher_printedit.lists["x_DrID"].options = <?php echo JsonEncode($view_billing_voucher_print_edit->DrID->lookupOptions()) ?>;
fview_billing_voucher_printedit.lists["x_ReportHeader[]"] = <?php echo $view_billing_voucher_print_edit->ReportHeader->Lookup->toClientList() ?>;
fview_billing_voucher_printedit.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_billing_voucher_print_edit->ReportHeader->options(FALSE, TRUE)) ?>;
fview_billing_voucher_printedit.lists["x_AdjustmentAdvance[]"] = <?php echo $view_billing_voucher_print_edit->AdjustmentAdvance->Lookup->toClientList() ?>;
fview_billing_voucher_printedit.lists["x_AdjustmentAdvance[]"].options = <?php echo JsonEncode($view_billing_voucher_print_edit->AdjustmentAdvance->options(FALSE, TRUE)) ?>;
fview_billing_voucher_printedit.lists["x_IncludePackage[]"] = <?php echo $view_billing_voucher_print_edit->IncludePackage->Lookup->toClientList() ?>;
fview_billing_voucher_printedit.lists["x_IncludePackage[]"].options = <?php echo JsonEncode($view_billing_voucher_print_edit->IncludePackage->options(FALSE, TRUE)) ?>;
fview_billing_voucher_printedit.lists["x_CancelBill"] = <?php echo $view_billing_voucher_print_edit->CancelBill->Lookup->toClientList() ?>;
fview_billing_voucher_printedit.lists["x_CancelBill"].options = <?php echo JsonEncode($view_billing_voucher_print_edit->CancelBill->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_billing_voucher_print_edit->showPageHeader(); ?>
<?php
$view_billing_voucher_print_edit->showMessage();
?>
<form name="fview_billing_voucher_printedit" id="fview_billing_voucher_printedit" class="<?php echo $view_billing_voucher_print_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_billing_voucher_print_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_billing_voucher_print_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher_print">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_billing_voucher_print_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($view_billing_voucher_print->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_billing_voucher_print_id" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_id" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->id->caption() ?><?php echo ($view_billing_voucher_print->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->id->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_id" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_id">
<span<?php echo $view_billing_voucher_print->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_billing_voucher_print->id->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_view_billing_voucher_print_Reception" for="x_Reception" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Reception" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->Reception->caption() ?><?php echo ($view_billing_voucher_print->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->Reception->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Reception" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_Reception">
<span<?php echo $view_billing_voucher_print->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->Reception->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($view_billing_voucher_print->Reception->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_view_billing_voucher_print_PatientId" for="x_PatientId" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_PatientId" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->PatientId->caption() ?><?php echo ($view_billing_voucher_print->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->PatientId->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_PatientId" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_PatientId">
<span<?php echo $view_billing_voucher_print->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->PatientId->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" value="<?php echo HtmlEncode($view_billing_voucher_print->PatientId->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_view_billing_voucher_print_mrnno" for="x_mrnno" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_mrnno" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->mrnno->caption() ?><?php echo ($view_billing_voucher_print->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->mrnno->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_mrnno" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_mrnno">
<span<?php echo $view_billing_voucher_print->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->mrnno->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($view_billing_voucher_print->mrnno->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_view_billing_voucher_print_PatientName" for="x_PatientName" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_PatientName" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->PatientName->caption() ?><?php echo ($view_billing_voucher_print->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->PatientName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_PatientName" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_PatientName">
<span<?php echo $view_billing_voucher_print->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->PatientName->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" value="<?php echo HtmlEncode($view_billing_voucher_print->PatientName->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_view_billing_voucher_print_Age" for="x_Age" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Age" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->Age->caption() ?><?php echo ($view_billing_voucher_print->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->Age->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Age" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_Age">
<span<?php echo $view_billing_voucher_print->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->Age->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Age" name="x_Age" id="x_Age" value="<?php echo HtmlEncode($view_billing_voucher_print->Age->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_view_billing_voucher_print_Gender" for="x_Gender" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Gender" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->Gender->caption() ?><?php echo ($view_billing_voucher_print->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->Gender->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Gender" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_Gender">
<span<?php echo $view_billing_voucher_print->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->Gender->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Gender" name="x_Gender" id="x_Gender" value="<?php echo HtmlEncode($view_billing_voucher_print->Gender->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_view_billing_voucher_print_profilePic" for="x_profilePic" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_profilePic" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->profilePic->caption() ?><?php echo ($view_billing_voucher_print->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->profilePic->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_profilePic" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_profilePic">
<span<?php echo $view_billing_voucher_print->profilePic->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->profilePic->EditValue ?></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" value="<?php echo HtmlEncode($view_billing_voucher_print->profilePic->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_view_billing_voucher_print_Mobile" for="x_Mobile" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Mobile" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->Mobile->caption() ?><?php echo ($view_billing_voucher_print->Mobile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->Mobile->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Mobile" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_Mobile">
<span<?php echo $view_billing_voucher_print->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->Mobile->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" value="<?php echo HtmlEncode($view_billing_voucher_print->Mobile->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label id="elh_view_billing_voucher_print_IP_OP" for="x_IP_OP" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_IP_OP" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->IP_OP->caption() ?><?php echo ($view_billing_voucher_print->IP_OP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->IP_OP->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_IP_OP" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_IP_OP">
<span<?php echo $view_billing_voucher_print->IP_OP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->IP_OP->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" value="<?php echo HtmlEncode($view_billing_voucher_print->IP_OP->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->IP_OP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_view_billing_voucher_print_Doctor" for="x_Doctor" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Doctor" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->Doctor->caption() ?><?php echo ($view_billing_voucher_print->Doctor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->Doctor->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Doctor" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_Doctor">
<span<?php echo $view_billing_voucher_print->Doctor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->Doctor->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" value="<?php echo HtmlEncode($view_billing_voucher_print->Doctor->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_view_billing_voucher_print_voucher_type" for="x_voucher_type" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_voucher_type" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->voucher_type->caption() ?><?php echo ($view_billing_voucher_print->voucher_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->voucher_type->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_voucher_type" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_voucher_type">
<span<?php echo $view_billing_voucher_print->voucher_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->voucher_type->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" value="<?php echo HtmlEncode($view_billing_voucher_print->voucher_type->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_view_billing_voucher_print_Details" for="x_Details" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Details" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->Details->caption() ?><?php echo ($view_billing_voucher_print->Details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->Details->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Details" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_Details">
<span<?php echo $view_billing_voucher_print->Details->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->Details->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Details" name="x_Details" id="x_Details" value="<?php echo HtmlEncode($view_billing_voucher_print->Details->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_view_billing_voucher_print_ModeofPayment" for="x_ModeofPayment" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_ModeofPayment" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->ModeofPayment->caption() ?><?php echo ($view_billing_voucher_print->ModeofPayment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->ModeofPayment->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_ModeofPayment" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_ModeofPayment">
<span<?php echo $view_billing_voucher_print->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->ModeofPayment->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" value="<?php echo HtmlEncode($view_billing_voucher_print->ModeofPayment->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_view_billing_voucher_print_Amount" for="x_Amount" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Amount" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->Amount->caption() ?><?php echo ($view_billing_voucher_print->Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->Amount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Amount" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_Amount">
<span<?php echo $view_billing_voucher_print->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->Amount->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Amount" name="x_Amount" id="x_Amount" value="<?php echo HtmlEncode($view_billing_voucher_print->Amount->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_view_billing_voucher_print_AnyDues" for="x_AnyDues" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_AnyDues" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->AnyDues->caption() ?><?php echo ($view_billing_voucher_print->AnyDues->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->AnyDues->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_AnyDues" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_AnyDues">
<span<?php echo $view_billing_voucher_print->AnyDues->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->AnyDues->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" value="<?php echo HtmlEncode($view_billing_voucher_print->AnyDues->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_view_billing_voucher_print_RealizationAmount" for="x_RealizationAmount" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_RealizationAmount" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->RealizationAmount->caption() ?><?php echo ($view_billing_voucher_print->RealizationAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->RealizationAmount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RealizationAmount" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_RealizationAmount">
<span<?php echo $view_billing_voucher_print->RealizationAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->RealizationAmount->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" value="<?php echo HtmlEncode($view_billing_voucher_print->RealizationAmount->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_view_billing_voucher_print_RealizationStatus" for="x_RealizationStatus" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_RealizationStatus" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->RealizationStatus->caption() ?><?php echo ($view_billing_voucher_print->RealizationStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->RealizationStatus->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RealizationStatus" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_RealizationStatus">
<span<?php echo $view_billing_voucher_print->RealizationStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->RealizationStatus->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" value="<?php echo HtmlEncode($view_billing_voucher_print->RealizationStatus->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_view_billing_voucher_print_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_RealizationRemarks" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->RealizationRemarks->caption() ?><?php echo ($view_billing_voucher_print->RealizationRemarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->RealizationRemarks->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RealizationRemarks" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_RealizationRemarks">
<span<?php echo $view_billing_voucher_print->RealizationRemarks->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->RealizationRemarks->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" value="<?php echo HtmlEncode($view_billing_voucher_print->RealizationRemarks->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_view_billing_voucher_print_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_RealizationBatchNo" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->RealizationBatchNo->caption() ?><?php echo ($view_billing_voucher_print->RealizationBatchNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->RealizationBatchNo->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RealizationBatchNo" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_RealizationBatchNo">
<span<?php echo $view_billing_voucher_print->RealizationBatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->RealizationBatchNo->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" value="<?php echo HtmlEncode($view_billing_voucher_print->RealizationBatchNo->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_view_billing_voucher_print_RealizationDate" for="x_RealizationDate" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_RealizationDate" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->RealizationDate->caption() ?><?php echo ($view_billing_voucher_print->RealizationDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->RealizationDate->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RealizationDate" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_RealizationDate">
<span<?php echo $view_billing_voucher_print->RealizationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->RealizationDate->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" value="<?php echo HtmlEncode($view_billing_voucher_print->RealizationDate->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_view_billing_voucher_print_RIDNO" for="x_RIDNO" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_RIDNO" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->RIDNO->caption() ?><?php echo ($view_billing_voucher_print->RIDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->RIDNO->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RIDNO" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_RIDNO">
<span<?php echo $view_billing_voucher_print->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->RIDNO->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" value="<?php echo HtmlEncode($view_billing_voucher_print->RIDNO->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_view_billing_voucher_print_TidNo" for="x_TidNo" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_TidNo" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->TidNo->caption() ?><?php echo ($view_billing_voucher_print->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->TidNo->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_TidNo" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_TidNo">
<span<?php echo $view_billing_voucher_print->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->TidNo->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" value="<?php echo HtmlEncode($view_billing_voucher_print->TidNo->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_view_billing_voucher_print_CId" for="x_CId" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_CId" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->CId->caption() ?><?php echo ($view_billing_voucher_print->CId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->CId->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CId" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_CId">
<span<?php echo $view_billing_voucher_print->CId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->CId->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CId" name="x_CId" id="x_CId" value="<?php echo HtmlEncode($view_billing_voucher_print->CId->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_view_billing_voucher_print_PartnerName" for="x_PartnerName" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_PartnerName" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->PartnerName->caption() ?><?php echo ($view_billing_voucher_print->PartnerName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->PartnerName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_PartnerName" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_PartnerName">
<span<?php echo $view_billing_voucher_print->PartnerName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->PartnerName->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" value="<?php echo HtmlEncode($view_billing_voucher_print->PartnerName->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label id="elh_view_billing_voucher_print_PayerType" for="x_PayerType" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_PayerType" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->PayerType->caption() ?><?php echo ($view_billing_voucher_print->PayerType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->PayerType->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_PayerType" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_PayerType">
<span<?php echo $view_billing_voucher_print->PayerType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->PayerType->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" value="<?php echo HtmlEncode($view_billing_voucher_print->PayerType->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->PayerType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh_view_billing_voucher_print_Dob" for="x_Dob" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Dob" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->Dob->caption() ?><?php echo ($view_billing_voucher_print->Dob->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->Dob->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Dob" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_Dob">
<span<?php echo $view_billing_voucher_print->Dob->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->Dob->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Dob" name="x_Dob" id="x_Dob" value="<?php echo HtmlEncode($view_billing_voucher_print->Dob->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_view_billing_voucher_print_Currency" for="x_Currency" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Currency" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->Currency->caption() ?><?php echo ($view_billing_voucher_print->Currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->Currency->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Currency" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_Currency">
<span<?php echo $view_billing_voucher_print->Currency->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->Currency->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Currency" name="x_Currency" id="x_Currency" value="<?php echo HtmlEncode($view_billing_voucher_print->Currency->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label id="elh_view_billing_voucher_print_DiscountRemarks" for="x_DiscountRemarks" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_DiscountRemarks" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->DiscountRemarks->caption() ?><?php echo ($view_billing_voucher_print->DiscountRemarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->DiscountRemarks->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_DiscountRemarks" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_DiscountRemarks">
<span<?php echo $view_billing_voucher_print->DiscountRemarks->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->DiscountRemarks->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" value="<?php echo HtmlEncode($view_billing_voucher_print->DiscountRemarks->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->DiscountRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_view_billing_voucher_print_Remarks" for="x_Remarks" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Remarks" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->Remarks->caption() ?><?php echo ($view_billing_voucher_print->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->Remarks->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Remarks" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_Remarks">
<span<?php echo $view_billing_voucher_print->Remarks->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->Remarks->EditValue ?></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" value="<?php echo HtmlEncode($view_billing_voucher_print->Remarks->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_view_billing_voucher_print_PatId" for="x_PatId" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_PatId" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->PatId->caption() ?><?php echo ($view_billing_voucher_print->PatId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->PatId->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_PatId" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_PatId">
<span<?php echo $view_billing_voucher_print->PatId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->PatId->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatId" name="x_PatId" id="x_PatId" value="<?php echo HtmlEncode($view_billing_voucher_print->PatId->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_view_billing_voucher_print_DrDepartment" for="x_DrDepartment" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_DrDepartment" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->DrDepartment->caption() ?><?php echo ($view_billing_voucher_print->DrDepartment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->DrDepartment->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_DrDepartment" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_DrDepartment">
<span<?php echo $view_billing_voucher_print->DrDepartment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->DrDepartment->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" value="<?php echo HtmlEncode($view_billing_voucher_print->DrDepartment->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label id="elh_view_billing_voucher_print_RefferedBy" for="x_RefferedBy" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_RefferedBy" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->RefferedBy->caption() ?><?php echo ($view_billing_voucher_print->RefferedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->RefferedBy->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RefferedBy" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_RefferedBy">
<span<?php echo $view_billing_voucher_print->RefferedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->RefferedBy->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" value="<?php echo HtmlEncode($view_billing_voucher_print->RefferedBy->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->RefferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_view_billing_voucher_print_BillNumber" for="x_BillNumber" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_BillNumber" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->BillNumber->caption() ?><?php echo ($view_billing_voucher_print->BillNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->BillNumber->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_BillNumber" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_BillNumber">
<span<?php echo $view_billing_voucher_print->BillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->BillNumber->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" value="<?php echo HtmlEncode($view_billing_voucher_print->BillNumber->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_view_billing_voucher_print_CardNumber" for="x_CardNumber" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_CardNumber" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->CardNumber->caption() ?><?php echo ($view_billing_voucher_print->CardNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->CardNumber->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CardNumber" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_CardNumber">
<span<?php echo $view_billing_voucher_print->CardNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->CardNumber->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" value="<?php echo HtmlEncode($view_billing_voucher_print->CardNumber->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_view_billing_voucher_print_BankName" for="x_BankName" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_BankName" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->BankName->caption() ?><?php echo ($view_billing_voucher_print->BankName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->BankName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_BankName" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_BankName">
<span<?php echo $view_billing_voucher_print->BankName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->BankName->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BankName" name="x_BankName" id="x_BankName" value="<?php echo HtmlEncode($view_billing_voucher_print->BankName->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_view_billing_voucher_print_DrID" for="x_DrID" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_DrID" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->DrID->caption() ?><?php echo ($view_billing_voucher_print->DrID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->DrID->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_DrID" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_DrID">
<span<?php echo $view_billing_voucher_print->DrID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->DrID->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_DrID" name="x_DrID" id="x_DrID" value="<?php echo HtmlEncode($view_billing_voucher_print->DrID->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_view_billing_voucher_print_BillStatus" for="x_BillStatus" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_BillStatus" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->BillStatus->caption() ?><?php echo ($view_billing_voucher_print->BillStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->BillStatus->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_BillStatus" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_BillStatus">
<span<?php echo $view_billing_voucher_print->BillStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->BillStatus->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" value="<?php echo HtmlEncode($view_billing_voucher_print->BillStatus->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_view_billing_voucher_print_ReportHeader" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_ReportHeader" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->ReportHeader->caption() ?><?php echo ($view_billing_voucher_print->ReportHeader->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_ReportHeader" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_ReportHeader">
<span<?php echo $view_billing_voucher_print->ReportHeader->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->ReportHeader->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader" value="<?php echo HtmlEncode($view_billing_voucher_print->ReportHeader->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
	<div id="r_AdjustmentAdvance" class="form-group row">
		<label id="elh_view_billing_voucher_print_AdjustmentAdvance" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_AdjustmentAdvance" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->AdjustmentAdvance->caption() ?><?php echo ($view_billing_voucher_print->AdjustmentAdvance->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->AdjustmentAdvance->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_AdjustmentAdvance" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_AdjustmentAdvance">
<span<?php echo $view_billing_voucher_print->AdjustmentAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->AdjustmentAdvance->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_AdjustmentAdvance" name="x_AdjustmentAdvance" id="x_AdjustmentAdvance" value="<?php echo HtmlEncode($view_billing_voucher_print->AdjustmentAdvance->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->AdjustmentAdvance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->billing_vouchercol->Visible) { // billing_vouchercol ?>
	<div id="r_billing_vouchercol" class="form-group row">
		<label id="elh_view_billing_voucher_print_billing_vouchercol" for="x_billing_vouchercol" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_billing_vouchercol" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->billing_vouchercol->caption() ?><?php echo ($view_billing_voucher_print->billing_vouchercol->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->billing_vouchercol->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_billing_vouchercol" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_billing_vouchercol">
<span<?php echo $view_billing_voucher_print->billing_vouchercol->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->billing_vouchercol->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_billing_vouchercol" name="x_billing_vouchercol" id="x_billing_vouchercol" value="<?php echo HtmlEncode($view_billing_voucher_print->billing_vouchercol->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->billing_vouchercol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->BillType->Visible) { // BillType ?>
	<div id="r_BillType" class="form-group row">
		<label id="elh_view_billing_voucher_print_BillType" for="x_BillType" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_BillType" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->BillType->caption() ?><?php echo ($view_billing_voucher_print->BillType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->BillType->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_BillType" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_BillType">
<span<?php echo $view_billing_voucher_print->BillType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->BillType->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillType" name="x_BillType" id="x_BillType" value="<?php echo HtmlEncode($view_billing_voucher_print->BillType->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->BillType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->ProcedureName->Visible) { // ProcedureName ?>
	<div id="r_ProcedureName" class="form-group row">
		<label id="elh_view_billing_voucher_print_ProcedureName" for="x_ProcedureName" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_ProcedureName" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->ProcedureName->caption() ?><?php echo ($view_billing_voucher_print->ProcedureName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->ProcedureName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_ProcedureName" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_ProcedureName">
<span<?php echo $view_billing_voucher_print->ProcedureName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->ProcedureName->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_ProcedureName" name="x_ProcedureName" id="x_ProcedureName" value="<?php echo HtmlEncode($view_billing_voucher_print->ProcedureName->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->ProcedureName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->ProcedureAmount->Visible) { // ProcedureAmount ?>
	<div id="r_ProcedureAmount" class="form-group row">
		<label id="elh_view_billing_voucher_print_ProcedureAmount" for="x_ProcedureAmount" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_ProcedureAmount" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->ProcedureAmount->caption() ?><?php echo ($view_billing_voucher_print->ProcedureAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->ProcedureAmount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_ProcedureAmount" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_ProcedureAmount">
<span<?php echo $view_billing_voucher_print->ProcedureAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->ProcedureAmount->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_ProcedureAmount" name="x_ProcedureAmount" id="x_ProcedureAmount" value="<?php echo HtmlEncode($view_billing_voucher_print->ProcedureAmount->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->ProcedureAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->IncludePackage->Visible) { // IncludePackage ?>
	<div id="r_IncludePackage" class="form-group row">
		<label id="elh_view_billing_voucher_print_IncludePackage" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_IncludePackage" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->IncludePackage->caption() ?><?php echo ($view_billing_voucher_print->IncludePackage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->IncludePackage->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_IncludePackage" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_IncludePackage">
<span<?php echo $view_billing_voucher_print->IncludePackage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->IncludePackage->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_IncludePackage" name="x_IncludePackage" id="x_IncludePackage" value="<?php echo HtmlEncode($view_billing_voucher_print->IncludePackage->CurrentValue) ?>">
<?php echo $view_billing_voucher_print->IncludePackage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelBill->Visible) { // CancelBill ?>
	<div id="r_CancelBill" class="form-group row">
		<label id="elh_view_billing_voucher_print_CancelBill" for="x_CancelBill" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_CancelBill" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->CancelBill->caption() ?><?php echo ($view_billing_voucher_print->CancelBill->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->CancelBill->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelBill" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_CancelBill">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher_print" data-field="x_CancelBill" data-value-separator="<?php echo $view_billing_voucher_print->CancelBill->displayValueSeparatorAttribute() ?>" id="x_CancelBill" name="x_CancelBill"<?php echo $view_billing_voucher_print->CancelBill->editAttributes() ?>>
		<?php echo $view_billing_voucher_print->CancelBill->selectOptionListHtml("x_CancelBill") ?>
	</select>
</div>
</span>
</script>
<?php echo $view_billing_voucher_print->CancelBill->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelReason->Visible) { // CancelReason ?>
	<div id="r_CancelReason" class="form-group row">
		<label id="elh_view_billing_voucher_print_CancelReason" for="x_CancelReason" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_CancelReason" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->CancelReason->caption() ?><?php echo ($view_billing_voucher_print->CancelReason->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->CancelReason->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelReason" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_CancelReason">
<textarea data-table="view_billing_voucher_print" data-field="x_CancelReason" name="x_CancelReason" id="x_CancelReason" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelReason->getPlaceHolder()) ?>"<?php echo $view_billing_voucher_print->CancelReason->editAttributes() ?>><?php echo $view_billing_voucher_print->CancelReason->EditValue ?></textarea>
</span>
</script>
<?php echo $view_billing_voucher_print->CancelReason->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
	<div id="r_CancelModeOfPayment" class="form-group row">
		<label id="elh_view_billing_voucher_print_CancelModeOfPayment" for="x_CancelModeOfPayment" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_CancelModeOfPayment" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->CancelModeOfPayment->caption() ?><?php echo ($view_billing_voucher_print->CancelModeOfPayment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->CancelModeOfPayment->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelModeOfPayment" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_CancelModeOfPayment">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelModeOfPayment" name="x_CancelModeOfPayment" id="x_CancelModeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelModeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->CancelModeOfPayment->EditValue ?>"<?php echo $view_billing_voucher_print->CancelModeOfPayment->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher_print->CancelModeOfPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelAmount->Visible) { // CancelAmount ?>
	<div id="r_CancelAmount" class="form-group row">
		<label id="elh_view_billing_voucher_print_CancelAmount" for="x_CancelAmount" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_CancelAmount" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->CancelAmount->caption() ?><?php echo ($view_billing_voucher_print->CancelAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->CancelAmount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelAmount" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_CancelAmount">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelAmount" name="x_CancelAmount" id="x_CancelAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->CancelAmount->EditValue ?>"<?php echo $view_billing_voucher_print->CancelAmount->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher_print->CancelAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelBankName->Visible) { // CancelBankName ?>
	<div id="r_CancelBankName" class="form-group row">
		<label id="elh_view_billing_voucher_print_CancelBankName" for="x_CancelBankName" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_CancelBankName" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->CancelBankName->caption() ?><?php echo ($view_billing_voucher_print->CancelBankName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->CancelBankName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelBankName" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_CancelBankName">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelBankName" name="x_CancelBankName" id="x_CancelBankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelBankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->CancelBankName->EditValue ?>"<?php echo $view_billing_voucher_print->CancelBankName->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher_print->CancelBankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
	<div id="r_CancelTransactionNumber" class="form-group row">
		<label id="elh_view_billing_voucher_print_CancelTransactionNumber" for="x_CancelTransactionNumber" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_CancelTransactionNumber" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->CancelTransactionNumber->caption() ?><?php echo ($view_billing_voucher_print->CancelTransactionNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->CancelTransactionNumber->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelTransactionNumber" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_CancelTransactionNumber">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelTransactionNumber" name="x_CancelTransactionNumber" id="x_CancelTransactionNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelTransactionNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->CancelTransactionNumber->EditValue ?>"<?php echo $view_billing_voucher_print->CancelTransactionNumber->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher_print->CancelTransactionNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->LabTest->Visible) { // LabTest ?>
	<div id="r_LabTest" class="form-group row">
		<label id="elh_view_billing_voucher_print_LabTest" for="x_LabTest" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_LabTest" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->LabTest->caption() ?><?php echo ($view_billing_voucher_print->LabTest->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->LabTest->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_LabTest" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_LabTest">
<input type="text" data-table="view_billing_voucher_print" data-field="x_LabTest" name="x_LabTest" id="x_LabTest" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->LabTest->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->LabTest->EditValue ?>"<?php echo $view_billing_voucher_print->LabTest->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher_print->LabTest->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->sid->Visible) { // sid ?>
	<div id="r_sid" class="form-group row">
		<label id="elh_view_billing_voucher_print_sid" for="x_sid" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_sid" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->sid->caption() ?><?php echo ($view_billing_voucher_print->sid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->sid->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_sid" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_sid">
<input type="text" data-table="view_billing_voucher_print" data-field="x_sid" name="x_sid" id="x_sid" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->sid->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->sid->EditValue ?>"<?php echo $view_billing_voucher_print->sid->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher_print->sid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->SidNo->Visible) { // SidNo ?>
	<div id="r_SidNo" class="form-group row">
		<label id="elh_view_billing_voucher_print_SidNo" for="x_SidNo" class="<?php echo $view_billing_voucher_print_edit->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_SidNo" class="view_billing_voucher_printedit" type="text/html"><span><?php echo $view_billing_voucher_print->SidNo->caption() ?><?php echo ($view_billing_voucher_print->SidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_billing_voucher_print_edit->RightColumnClass ?>"><div<?php echo $view_billing_voucher_print->SidNo->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_SidNo" class="view_billing_voucher_printedit" type="text/html">
<span id="el_view_billing_voucher_print_SidNo">
<input type="text" data-table="view_billing_voucher_print" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->SidNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->SidNo->EditValue ?>"<?php echo $view_billing_voucher_print->SidNo->editAttributes() ?>>
</span>
</script>
<?php echo $view_billing_voucher_print->SidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_billing_voucher_printedit" class="ew-custom-template"></div>
<script id="tpm_view_billing_voucher_printedit" type="text/html">
<div id="ct_view_billing_voucher_print_edit"><style>
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
<div hidden>{{include tmpl="#tpc_view_billing_voucher_print_billing_vouchercol"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_billing_vouchercol"/}} </div>
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_billing_voucher_print_PatId"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_PatId"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_billing_voucher_print_RIDNO"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_RIDNO"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_billing_voucher_print_CId"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_CId"/}}</h3>
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
		<td>{{include tmpl="#tpc_view_billing_voucher_print_PatientId"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_PatientId"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_PatientName"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_PatientName"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_Mobile"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_Mobile"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_Dob"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_Dob"/}}</td>
		<td>{{include tmpl="#tpc_view_billing_voucher_print_Age"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_Age"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_Gender"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_Gender"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_PartnerName"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_PartnerName"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_PayerType"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_PayerType"/}}</td>
			<td></td>
		</tr>
		 <tr>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_Doctor"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_Doctor"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_DrDepartment"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_DrDepartment"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_RefferedBy"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_RefferedBy"/}}</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#229954">
				<h3 class="card-title">Cancel Bill Details</h3>
			</div>
			<div class="card-body">
<table>
	 <tbody>
		<tr>
		<td>{{include tmpl="#tpc_view_billing_voucher_print_CancelBill"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_CancelBill"/}}</td>
		<td>{{include tmpl="#tpc_view_billing_voucher_print_CancelAmount"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_CancelAmount"/}}</td>
		<td>{{include tmpl="#tpc_view_billing_voucher_print_CancelReason"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_CancelReason"/}}</td>
				</tr>
<tr id="IIDDCancelBankName">
<td>{{include tmpl="#tpc_view_billing_voucher_print_CancelBankName"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_CancelBankName"/}}</td>
<td>{{include tmpl="#tpc_view_billing_voucher_print_CancelTransactionNumber"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_CancelTransactionNumber"/}}</td>
<td></td>
</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div id="LoadGetOPAdvance"> </div>
{{include tmpl="#tpc_view_billing_voucher_print_ReportHeader"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_ReportHeader"/}}
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
			<td>{{include tmpl="#tpc_view_billing_voucher_print_ModeofPayment"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_ModeofPayment"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_Amount"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_Amount"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_AnyDues"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_AnyDues"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_DiscountRemarks"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_DiscountRemarks"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_Remarks"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_Remarks"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_AdjustmentAdvance"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_AdjustmentAdvance"/}}</td>
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
			<td>{{include tmpl="#tpc_view_billing_voucher_print_CardNumber"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_CardNumber"/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_BankName"/}}&nbsp;{{include tmpl="#tpx_view_billing_voucher_print_BankName"/}}</td>
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
	if (in_array("view_patient_services", explode(",", $view_billing_voucher_print->getCurrentDetailTable())) && $view_patient_services->DetailEdit) {
?>
<?php if ($view_billing_voucher_print->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("view_patient_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_patient_servicesgrid.php" ?>
<?php } ?>
<?php if (!$view_billing_voucher_print_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_billing_voucher_print_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_billing_voucher_print_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_billing_voucher_print->Rows) ?> };
ew.applyTemplate("tpd_view_billing_voucher_printedit", "tpm_view_billing_voucher_printedit", "view_billing_voucher_printedit", "<?php echo $view_billing_voucher_print->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_billing_voucher_printedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_billing_voucher_print_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

	document.getElementById("IIDDCancelBankName").style.display = "none";
</script>
<?php include_once "footer.php" ?>
<?php
$view_billing_voucher_print_edit->terminate();
?>