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
$view_billing_voucher_print_add = new view_billing_voucher_print_add();

// Run the page
$view_billing_voucher_print_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_billing_voucher_print_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_billing_voucher_printadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fview_billing_voucher_printadd = currentForm = new ew.Form("fview_billing_voucher_printadd", "add");

	// Validate form
	fview_billing_voucher_printadd.validate = function() {
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
			<?php if ($view_billing_voucher_print_add->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->Reception->caption(), $view_billing_voucher_print_add->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->PatientId->caption(), $view_billing_voucher_print_add->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->mrnno->caption(), $view_billing_voucher_print_add->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->PatientName->caption(), $view_billing_voucher_print_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->Age->caption(), $view_billing_voucher_print_add->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->Gender->caption(), $view_billing_voucher_print_add->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->profilePic->caption(), $view_billing_voucher_print_add->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->Mobile->caption(), $view_billing_voucher_print_add->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->IP_OP->Required) { ?>
				elm = this.getElements("x" + infix + "_IP_OP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->IP_OP->caption(), $view_billing_voucher_print_add->IP_OP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->Doctor->Required) { ?>
				elm = this.getElements("x" + infix + "_Doctor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->Doctor->caption(), $view_billing_voucher_print_add->Doctor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->voucher_type->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->voucher_type->caption(), $view_billing_voucher_print_add->voucher_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->Details->Required) { ?>
				elm = this.getElements("x" + infix + "_Details");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->Details->caption(), $view_billing_voucher_print_add->Details->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->ModeofPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeofPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->ModeofPayment->caption(), $view_billing_voucher_print_add->ModeofPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->Amount->caption(), $view_billing_voucher_print_add->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_print_add->Amount->errorMessage()) ?>");
			<?php if ($view_billing_voucher_print_add->AnyDues->Required) { ?>
				elm = this.getElements("x" + infix + "_AnyDues");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->AnyDues->caption(), $view_billing_voucher_print_add->AnyDues->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->createdby->caption(), $view_billing_voucher_print_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->createddatetime->caption(), $view_billing_voucher_print_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->RealizationAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->RealizationAmount->caption(), $view_billing_voucher_print_add->RealizationAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_print_add->RealizationAmount->errorMessage()) ?>");
			<?php if ($view_billing_voucher_print_add->RealizationStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->RealizationStatus->caption(), $view_billing_voucher_print_add->RealizationStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->RealizationRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->RealizationRemarks->caption(), $view_billing_voucher_print_add->RealizationRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->RealizationBatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationBatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->RealizationBatchNo->caption(), $view_billing_voucher_print_add->RealizationBatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->RealizationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->RealizationDate->caption(), $view_billing_voucher_print_add->RealizationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->HospID->caption(), $view_billing_voucher_print_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->RIDNO->caption(), $view_billing_voucher_print_add->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->TidNo->caption(), $view_billing_voucher_print_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_print_add->TidNo->errorMessage()) ?>");
			<?php if ($view_billing_voucher_print_add->CId->Required) { ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->CId->caption(), $view_billing_voucher_print_add->CId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->PartnerName->caption(), $view_billing_voucher_print_add->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->PayerType->Required) { ?>
				elm = this.getElements("x" + infix + "_PayerType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->PayerType->caption(), $view_billing_voucher_print_add->PayerType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->Dob->Required) { ?>
				elm = this.getElements("x" + infix + "_Dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->Dob->caption(), $view_billing_voucher_print_add->Dob->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->Currency->Required) { ?>
				elm = this.getElements("x" + infix + "_Currency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->Currency->caption(), $view_billing_voucher_print_add->Currency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->DiscountRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->DiscountRemarks->caption(), $view_billing_voucher_print_add->DiscountRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->Remarks->caption(), $view_billing_voucher_print_add->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->PatId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->PatId->caption(), $view_billing_voucher_print_add->PatId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->DrDepartment->Required) { ?>
				elm = this.getElements("x" + infix + "_DrDepartment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->DrDepartment->caption(), $view_billing_voucher_print_add->DrDepartment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->RefferedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_RefferedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->RefferedBy->caption(), $view_billing_voucher_print_add->RefferedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->BillNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_BillNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->BillNumber->caption(), $view_billing_voucher_print_add->BillNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->CardNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_CardNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->CardNumber->caption(), $view_billing_voucher_print_add->CardNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->BankName->Required) { ?>
				elm = this.getElements("x" + infix + "_BankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->BankName->caption(), $view_billing_voucher_print_add->BankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->DrID->caption(), $view_billing_voucher_print_add->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->BillStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->BillStatus->caption(), $view_billing_voucher_print_add->BillStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_print_add->BillStatus->errorMessage()) ?>");
			<?php if ($view_billing_voucher_print_add->ReportHeader->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportHeader[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->ReportHeader->caption(), $view_billing_voucher_print_add->ReportHeader->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->UserName->Required) { ?>
				elm = this.getElements("x" + infix + "_UserName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->UserName->caption(), $view_billing_voucher_print_add->UserName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->AdjustmentAdvance->Required) { ?>
				elm = this.getElements("x" + infix + "_AdjustmentAdvance[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->AdjustmentAdvance->caption(), $view_billing_voucher_print_add->AdjustmentAdvance->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->billing_vouchercol->Required) { ?>
				elm = this.getElements("x" + infix + "_billing_vouchercol");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->billing_vouchercol->caption(), $view_billing_voucher_print_add->billing_vouchercol->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->BillType->Required) { ?>
				elm = this.getElements("x" + infix + "_BillType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->BillType->caption(), $view_billing_voucher_print_add->BillType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->ProcedureName->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcedureName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->ProcedureName->caption(), $view_billing_voucher_print_add->ProcedureName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->ProcedureAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcedureAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->ProcedureAmount->caption(), $view_billing_voucher_print_add->ProcedureAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProcedureAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_print_add->ProcedureAmount->errorMessage()) ?>");
			<?php if ($view_billing_voucher_print_add->IncludePackage->Required) { ?>
				elm = this.getElements("x" + infix + "_IncludePackage[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->IncludePackage->caption(), $view_billing_voucher_print_add->IncludePackage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->CancelBill->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelBill");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->CancelBill->caption(), $view_billing_voucher_print_add->CancelBill->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->CancelReason->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelReason");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->CancelReason->caption(), $view_billing_voucher_print_add->CancelReason->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->CancelModeOfPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelModeOfPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->CancelModeOfPayment->caption(), $view_billing_voucher_print_add->CancelModeOfPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->CancelAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->CancelAmount->caption(), $view_billing_voucher_print_add->CancelAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->CancelBankName->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelBankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->CancelBankName->caption(), $view_billing_voucher_print_add->CancelBankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->CancelTransactionNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelTransactionNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->CancelTransactionNumber->caption(), $view_billing_voucher_print_add->CancelTransactionNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->LabTest->Required) { ?>
				elm = this.getElements("x" + infix + "_LabTest");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->LabTest->caption(), $view_billing_voucher_print_add->LabTest->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_print_add->sid->Required) { ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->sid->caption(), $view_billing_voucher_print_add->sid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_print_add->sid->errorMessage()) ?>");
			<?php if ($view_billing_voucher_print_add->SidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_SidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print_add->SidNo->caption(), $view_billing_voucher_print_add->SidNo->RequiredErrorMessage)) ?>");
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
	fview_billing_voucher_printadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_billing_voucher_printadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_billing_voucher_printadd.lists["x_Reception"] = <?php echo $view_billing_voucher_print_add->Reception->Lookup->toClientList($view_billing_voucher_print_add) ?>;
	fview_billing_voucher_printadd.lists["x_Reception"].options = <?php echo JsonEncode($view_billing_voucher_print_add->Reception->lookupOptions()) ?>;
	fview_billing_voucher_printadd.lists["x_ModeofPayment"] = <?php echo $view_billing_voucher_print_add->ModeofPayment->Lookup->toClientList($view_billing_voucher_print_add) ?>;
	fview_billing_voucher_printadd.lists["x_ModeofPayment"].options = <?php echo JsonEncode($view_billing_voucher_print_add->ModeofPayment->lookupOptions()) ?>;
	fview_billing_voucher_printadd.lists["x_RIDNO"] = <?php echo $view_billing_voucher_print_add->RIDNO->Lookup->toClientList($view_billing_voucher_print_add) ?>;
	fview_billing_voucher_printadd.lists["x_RIDNO"].options = <?php echo JsonEncode($view_billing_voucher_print_add->RIDNO->lookupOptions()) ?>;
	fview_billing_voucher_printadd.lists["x_CId"] = <?php echo $view_billing_voucher_print_add->CId->Lookup->toClientList($view_billing_voucher_print_add) ?>;
	fview_billing_voucher_printadd.lists["x_CId"].options = <?php echo JsonEncode($view_billing_voucher_print_add->CId->lookupOptions()) ?>;
	fview_billing_voucher_printadd.lists["x_PatId"] = <?php echo $view_billing_voucher_print_add->PatId->Lookup->toClientList($view_billing_voucher_print_add) ?>;
	fview_billing_voucher_printadd.lists["x_PatId"].options = <?php echo JsonEncode($view_billing_voucher_print_add->PatId->lookupOptions()) ?>;
	fview_billing_voucher_printadd.lists["x_RefferedBy"] = <?php echo $view_billing_voucher_print_add->RefferedBy->Lookup->toClientList($view_billing_voucher_print_add) ?>;
	fview_billing_voucher_printadd.lists["x_RefferedBy"].options = <?php echo JsonEncode($view_billing_voucher_print_add->RefferedBy->lookupOptions()) ?>;
	fview_billing_voucher_printadd.lists["x_DrID"] = <?php echo $view_billing_voucher_print_add->DrID->Lookup->toClientList($view_billing_voucher_print_add) ?>;
	fview_billing_voucher_printadd.lists["x_DrID"].options = <?php echo JsonEncode($view_billing_voucher_print_add->DrID->lookupOptions()) ?>;
	fview_billing_voucher_printadd.lists["x_ReportHeader[]"] = <?php echo $view_billing_voucher_print_add->ReportHeader->Lookup->toClientList($view_billing_voucher_print_add) ?>;
	fview_billing_voucher_printadd.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_billing_voucher_print_add->ReportHeader->options(FALSE, TRUE)) ?>;
	fview_billing_voucher_printadd.lists["x_AdjustmentAdvance[]"] = <?php echo $view_billing_voucher_print_add->AdjustmentAdvance->Lookup->toClientList($view_billing_voucher_print_add) ?>;
	fview_billing_voucher_printadd.lists["x_AdjustmentAdvance[]"].options = <?php echo JsonEncode($view_billing_voucher_print_add->AdjustmentAdvance->options(FALSE, TRUE)) ?>;
	fview_billing_voucher_printadd.lists["x_IncludePackage[]"] = <?php echo $view_billing_voucher_print_add->IncludePackage->Lookup->toClientList($view_billing_voucher_print_add) ?>;
	fview_billing_voucher_printadd.lists["x_IncludePackage[]"].options = <?php echo JsonEncode($view_billing_voucher_print_add->IncludePackage->options(FALSE, TRUE)) ?>;
	fview_billing_voucher_printadd.lists["x_CancelBill"] = <?php echo $view_billing_voucher_print_add->CancelBill->Lookup->toClientList($view_billing_voucher_print_add) ?>;
	fview_billing_voucher_printadd.lists["x_CancelBill"].options = <?php echo JsonEncode($view_billing_voucher_print_add->CancelBill->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_billing_voucher_printadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_billing_voucher_print_add->showPageHeader(); ?>
<?php
$view_billing_voucher_print_add->showMessage();
?>
<form name="fview_billing_voucher_printadd" id="fview_billing_voucher_printadd" class="<?php echo $view_billing_voucher_print_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher_print">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$view_billing_voucher_print_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($view_billing_voucher_print_add->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_view_billing_voucher_print_Reception" for="x_Reception" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Reception" type="text/html"><?php echo $view_billing_voucher_print_add->Reception->caption() ?><?php echo $view_billing_voucher_print_add->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->Reception->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Reception" type="text/html"><span id="el_view_billing_voucher_print_Reception">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?php echo EmptyValue(strval($view_billing_voucher_print_add->Reception->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_billing_voucher_print_add->Reception->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher_print_add->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_billing_voucher_print_add->Reception->ReadOnly || $view_billing_voucher_print_add->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher_print_add->Reception->Lookup->getParamTag($view_billing_voucher_print_add, "p_x_Reception") ?>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher_print_add->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?php echo $view_billing_voucher_print_add->Reception->CurrentValue ?>"<?php echo $view_billing_voucher_print_add->Reception->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_view_billing_voucher_print_PatientId" for="x_PatientId" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_PatientId" type="text/html"><?php echo $view_billing_voucher_print_add->PatientId->caption() ?><?php echo $view_billing_voucher_print_add->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->PatientId->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_PatientId" type="text/html"><span id="el_view_billing_voucher_print_PatientId">
<input type="text" data-table="view_billing_voucher_print" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->PatientId->EditValue ?>"<?php echo $view_billing_voucher_print_add->PatientId->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_view_billing_voucher_print_mrnno" for="x_mrnno" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_mrnno" type="text/html"><?php echo $view_billing_voucher_print_add->mrnno->caption() ?><?php echo $view_billing_voucher_print_add->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->mrnno->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_mrnno" type="text/html"><span id="el_view_billing_voucher_print_mrnno">
<input type="text" data-table="view_billing_voucher_print" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->mrnno->EditValue ?>"<?php echo $view_billing_voucher_print_add->mrnno->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_view_billing_voucher_print_PatientName" for="x_PatientName" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_PatientName" type="text/html"><?php echo $view_billing_voucher_print_add->PatientName->caption() ?><?php echo $view_billing_voucher_print_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->PatientName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_PatientName" type="text/html"><span id="el_view_billing_voucher_print_PatientName">
<input type="text" data-table="view_billing_voucher_print" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->PatientName->EditValue ?>"<?php echo $view_billing_voucher_print_add->PatientName->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_view_billing_voucher_print_Age" for="x_Age" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Age" type="text/html"><?php echo $view_billing_voucher_print_add->Age->caption() ?><?php echo $view_billing_voucher_print_add->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->Age->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Age" type="text/html"><span id="el_view_billing_voucher_print_Age">
<input type="text" data-table="view_billing_voucher_print" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->Age->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->Age->EditValue ?>"<?php echo $view_billing_voucher_print_add->Age->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_view_billing_voucher_print_Gender" for="x_Gender" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Gender" type="text/html"><?php echo $view_billing_voucher_print_add->Gender->caption() ?><?php echo $view_billing_voucher_print_add->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->Gender->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Gender" type="text/html"><span id="el_view_billing_voucher_print_Gender">
<input type="text" data-table="view_billing_voucher_print" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->Gender->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->Gender->EditValue ?>"<?php echo $view_billing_voucher_print_add->Gender->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_view_billing_voucher_print_profilePic" for="x_profilePic" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_profilePic" type="text/html"><?php echo $view_billing_voucher_print_add->profilePic->caption() ?><?php echo $view_billing_voucher_print_add->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->profilePic->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_profilePic" type="text/html"><span id="el_view_billing_voucher_print_profilePic">
<textarea data-table="view_billing_voucher_print" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->profilePic->getPlaceHolder()) ?>"<?php echo $view_billing_voucher_print_add->profilePic->editAttributes() ?>><?php echo $view_billing_voucher_print_add->profilePic->EditValue ?></textarea>
</span></script>
<?php echo $view_billing_voucher_print_add->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_view_billing_voucher_print_Mobile" for="x_Mobile" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Mobile" type="text/html"><?php echo $view_billing_voucher_print_add->Mobile->caption() ?><?php echo $view_billing_voucher_print_add->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->Mobile->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Mobile" type="text/html"><span id="el_view_billing_voucher_print_Mobile">
<input type="text" data-table="view_billing_voucher_print" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->Mobile->EditValue ?>"<?php echo $view_billing_voucher_print_add->Mobile->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label id="elh_view_billing_voucher_print_IP_OP" for="x_IP_OP" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_IP_OP" type="text/html"><?php echo $view_billing_voucher_print_add->IP_OP->caption() ?><?php echo $view_billing_voucher_print_add->IP_OP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->IP_OP->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_IP_OP" type="text/html"><span id="el_view_billing_voucher_print_IP_OP">
<input type="text" data-table="view_billing_voucher_print" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->IP_OP->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->IP_OP->EditValue ?>"<?php echo $view_billing_voucher_print_add->IP_OP->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->IP_OP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_view_billing_voucher_print_Doctor" for="x_Doctor" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Doctor" type="text/html"><?php echo $view_billing_voucher_print_add->Doctor->caption() ?><?php echo $view_billing_voucher_print_add->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->Doctor->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Doctor" type="text/html"><span id="el_view_billing_voucher_print_Doctor">
<input type="text" data-table="view_billing_voucher_print" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->Doctor->EditValue ?>"<?php echo $view_billing_voucher_print_add->Doctor->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_view_billing_voucher_print_voucher_type" for="x_voucher_type" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_voucher_type" type="text/html"><?php echo $view_billing_voucher_print_add->voucher_type->caption() ?><?php echo $view_billing_voucher_print_add->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->voucher_type->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_voucher_type" type="text/html"><span id="el_view_billing_voucher_print_voucher_type">
<input type="text" data-table="view_billing_voucher_print" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->voucher_type->EditValue ?>"<?php echo $view_billing_voucher_print_add->voucher_type->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_view_billing_voucher_print_Details" for="x_Details" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Details" type="text/html"><?php echo $view_billing_voucher_print_add->Details->caption() ?><?php echo $view_billing_voucher_print_add->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->Details->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Details" type="text/html"><span id="el_view_billing_voucher_print_Details">
<input type="text" data-table="view_billing_voucher_print" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->Details->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->Details->EditValue ?>"<?php echo $view_billing_voucher_print_add->Details->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_view_billing_voucher_print_ModeofPayment" for="x_ModeofPayment" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_ModeofPayment" type="text/html"><?php echo $view_billing_voucher_print_add->ModeofPayment->caption() ?><?php echo $view_billing_voucher_print_add->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->ModeofPayment->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_ModeofPayment" type="text/html"><span id="el_view_billing_voucher_print_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher_print" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_billing_voucher_print_add->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $view_billing_voucher_print_add->ModeofPayment->editAttributes() ?>>
			<?php echo $view_billing_voucher_print_add->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
		</select>
</div>
<?php echo $view_billing_voucher_print_add->ModeofPayment->Lookup->getParamTag($view_billing_voucher_print_add, "p_x_ModeofPayment") ?>
</span></script>
<?php echo $view_billing_voucher_print_add->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_view_billing_voucher_print_Amount" for="x_Amount" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Amount" type="text/html"><?php echo $view_billing_voucher_print_add->Amount->caption() ?><?php echo $view_billing_voucher_print_add->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->Amount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Amount" type="text/html"><span id="el_view_billing_voucher_print_Amount">
<input type="text" data-table="view_billing_voucher_print" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->Amount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->Amount->EditValue ?>"<?php echo $view_billing_voucher_print_add->Amount->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_view_billing_voucher_print_AnyDues" for="x_AnyDues" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_AnyDues" type="text/html"><?php echo $view_billing_voucher_print_add->AnyDues->caption() ?><?php echo $view_billing_voucher_print_add->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->AnyDues->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_AnyDues" type="text/html"><span id="el_view_billing_voucher_print_AnyDues">
<input type="text" data-table="view_billing_voucher_print" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->AnyDues->EditValue ?>"<?php echo $view_billing_voucher_print_add->AnyDues->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_view_billing_voucher_print_RealizationAmount" for="x_RealizationAmount" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_RealizationAmount" type="text/html"><?php echo $view_billing_voucher_print_add->RealizationAmount->caption() ?><?php echo $view_billing_voucher_print_add->RealizationAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->RealizationAmount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RealizationAmount" type="text/html"><span id="el_view_billing_voucher_print_RealizationAmount">
<input type="text" data-table="view_billing_voucher_print" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->RealizationAmount->EditValue ?>"<?php echo $view_billing_voucher_print_add->RealizationAmount->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_view_billing_voucher_print_RealizationStatus" for="x_RealizationStatus" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_RealizationStatus" type="text/html"><?php echo $view_billing_voucher_print_add->RealizationStatus->caption() ?><?php echo $view_billing_voucher_print_add->RealizationStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->RealizationStatus->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RealizationStatus" type="text/html"><span id="el_view_billing_voucher_print_RealizationStatus">
<input type="text" data-table="view_billing_voucher_print" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->RealizationStatus->EditValue ?>"<?php echo $view_billing_voucher_print_add->RealizationStatus->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_view_billing_voucher_print_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_RealizationRemarks" type="text/html"><?php echo $view_billing_voucher_print_add->RealizationRemarks->caption() ?><?php echo $view_billing_voucher_print_add->RealizationRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->RealizationRemarks->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RealizationRemarks" type="text/html"><span id="el_view_billing_voucher_print_RealizationRemarks">
<input type="text" data-table="view_billing_voucher_print" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->RealizationRemarks->EditValue ?>"<?php echo $view_billing_voucher_print_add->RealizationRemarks->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_view_billing_voucher_print_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_RealizationBatchNo" type="text/html"><?php echo $view_billing_voucher_print_add->RealizationBatchNo->caption() ?><?php echo $view_billing_voucher_print_add->RealizationBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->RealizationBatchNo->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RealizationBatchNo" type="text/html"><span id="el_view_billing_voucher_print_RealizationBatchNo">
<input type="text" data-table="view_billing_voucher_print" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->RealizationBatchNo->EditValue ?>"<?php echo $view_billing_voucher_print_add->RealizationBatchNo->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_view_billing_voucher_print_RealizationDate" for="x_RealizationDate" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_RealizationDate" type="text/html"><?php echo $view_billing_voucher_print_add->RealizationDate->caption() ?><?php echo $view_billing_voucher_print_add->RealizationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->RealizationDate->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RealizationDate" type="text/html"><span id="el_view_billing_voucher_print_RealizationDate">
<input type="text" data-table="view_billing_voucher_print" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->RealizationDate->EditValue ?>"<?php echo $view_billing_voucher_print_add->RealizationDate->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_view_billing_voucher_print_RIDNO" for="x_RIDNO" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_RIDNO" type="text/html"><?php echo $view_billing_voucher_print_add->RIDNO->caption() ?><?php echo $view_billing_voucher_print_add->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->RIDNO->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RIDNO" type="text/html"><span id="el_view_billing_voucher_print_RIDNO">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RIDNO"><?php echo EmptyValue(strval($view_billing_voucher_print_add->RIDNO->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_billing_voucher_print_add->RIDNO->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher_print_add->RIDNO->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_billing_voucher_print_add->RIDNO->ReadOnly || $view_billing_voucher_print_add->RIDNO->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RIDNO',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher_print_add->RIDNO->Lookup->getParamTag($view_billing_voucher_print_add, "p_x_RIDNO") ?>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_RIDNO" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher_print_add->RIDNO->displayValueSeparatorAttribute() ?>" name="x_RIDNO" id="x_RIDNO" value="<?php echo $view_billing_voucher_print_add->RIDNO->CurrentValue ?>"<?php echo $view_billing_voucher_print_add->RIDNO->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_view_billing_voucher_print_TidNo" for="x_TidNo" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_TidNo" type="text/html"><?php echo $view_billing_voucher_print_add->TidNo->caption() ?><?php echo $view_billing_voucher_print_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->TidNo->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_TidNo" type="text/html"><span id="el_view_billing_voucher_print_TidNo">
<input type="text" data-table="view_billing_voucher_print" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->TidNo->EditValue ?>"<?php echo $view_billing_voucher_print_add->TidNo->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_view_billing_voucher_print_CId" for="x_CId" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_CId" type="text/html"><?php echo $view_billing_voucher_print_add->CId->caption() ?><?php echo $view_billing_voucher_print_add->CId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->CId->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CId" type="text/html"><span id="el_view_billing_voucher_print_CId">
<?php $view_billing_voucher_print_add->CId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_CId"><?php echo EmptyValue(strval($view_billing_voucher_print_add->CId->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_billing_voucher_print_add->CId->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher_print_add->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_billing_voucher_print_add->CId->ReadOnly || $view_billing_voucher_print_add->CId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_CId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher_print_add->CId->Lookup->getParamTag($view_billing_voucher_print_add, "p_x_CId") ?>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher_print_add->CId->displayValueSeparatorAttribute() ?>" name="x_CId" id="x_CId" value="<?php echo $view_billing_voucher_print_add->CId->CurrentValue ?>"<?php echo $view_billing_voucher_print_add->CId->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_view_billing_voucher_print_PartnerName" for="x_PartnerName" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_PartnerName" type="text/html"><?php echo $view_billing_voucher_print_add->PartnerName->caption() ?><?php echo $view_billing_voucher_print_add->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->PartnerName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_PartnerName" type="text/html"><span id="el_view_billing_voucher_print_PartnerName">
<input type="text" data-table="view_billing_voucher_print" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->PartnerName->EditValue ?>"<?php echo $view_billing_voucher_print_add->PartnerName->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label id="elh_view_billing_voucher_print_PayerType" for="x_PayerType" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_PayerType" type="text/html"><?php echo $view_billing_voucher_print_add->PayerType->caption() ?><?php echo $view_billing_voucher_print_add->PayerType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->PayerType->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_PayerType" type="text/html"><span id="el_view_billing_voucher_print_PayerType">
<input type="text" data-table="view_billing_voucher_print" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->PayerType->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->PayerType->EditValue ?>"<?php echo $view_billing_voucher_print_add->PayerType->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->PayerType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh_view_billing_voucher_print_Dob" for="x_Dob" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Dob" type="text/html"><?php echo $view_billing_voucher_print_add->Dob->caption() ?><?php echo $view_billing_voucher_print_add->Dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->Dob->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Dob" type="text/html"><span id="el_view_billing_voucher_print_Dob">
<input type="text" data-table="view_billing_voucher_print" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->Dob->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->Dob->EditValue ?>"<?php echo $view_billing_voucher_print_add->Dob->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_view_billing_voucher_print_Currency" for="x_Currency" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Currency" type="text/html"><?php echo $view_billing_voucher_print_add->Currency->caption() ?><?php echo $view_billing_voucher_print_add->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->Currency->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Currency" type="text/html"><span id="el_view_billing_voucher_print_Currency">
<input type="text" data-table="view_billing_voucher_print" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->Currency->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->Currency->EditValue ?>"<?php echo $view_billing_voucher_print_add->Currency->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label id="elh_view_billing_voucher_print_DiscountRemarks" for="x_DiscountRemarks" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_DiscountRemarks" type="text/html"><?php echo $view_billing_voucher_print_add->DiscountRemarks->caption() ?><?php echo $view_billing_voucher_print_add->DiscountRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->DiscountRemarks->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_DiscountRemarks" type="text/html"><span id="el_view_billing_voucher_print_DiscountRemarks">
<input type="text" data-table="view_billing_voucher_print" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->DiscountRemarks->EditValue ?>"<?php echo $view_billing_voucher_print_add->DiscountRemarks->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->DiscountRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_view_billing_voucher_print_Remarks" for="x_Remarks" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_Remarks" type="text/html"><?php echo $view_billing_voucher_print_add->Remarks->caption() ?><?php echo $view_billing_voucher_print_add->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->Remarks->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Remarks" type="text/html"><span id="el_view_billing_voucher_print_Remarks">
<textarea data-table="view_billing_voucher_print" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->Remarks->getPlaceHolder()) ?>"<?php echo $view_billing_voucher_print_add->Remarks->editAttributes() ?>><?php echo $view_billing_voucher_print_add->Remarks->EditValue ?></textarea>
</span></script>
<?php echo $view_billing_voucher_print_add->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_view_billing_voucher_print_PatId" for="x_PatId" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_PatId" type="text/html"><?php echo $view_billing_voucher_print_add->PatId->caption() ?><?php echo $view_billing_voucher_print_add->PatId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->PatId->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_PatId" type="text/html"><span id="el_view_billing_voucher_print_PatId">
<?php $view_billing_voucher_print_add->PatId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatId"><?php echo EmptyValue(strval($view_billing_voucher_print_add->PatId->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_billing_voucher_print_add->PatId->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher_print_add->PatId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_billing_voucher_print_add->PatId->ReadOnly || $view_billing_voucher_print_add->PatId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher_print_add->PatId->Lookup->getParamTag($view_billing_voucher_print_add, "p_x_PatId") ?>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher_print_add->PatId->displayValueSeparatorAttribute() ?>" name="x_PatId" id="x_PatId" value="<?php echo $view_billing_voucher_print_add->PatId->CurrentValue ?>"<?php echo $view_billing_voucher_print_add->PatId->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_view_billing_voucher_print_DrDepartment" for="x_DrDepartment" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_DrDepartment" type="text/html"><?php echo $view_billing_voucher_print_add->DrDepartment->caption() ?><?php echo $view_billing_voucher_print_add->DrDepartment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->DrDepartment->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_DrDepartment" type="text/html"><span id="el_view_billing_voucher_print_DrDepartment">
<input type="text" data-table="view_billing_voucher_print" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->DrDepartment->EditValue ?>"<?php echo $view_billing_voucher_print_add->DrDepartment->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label id="elh_view_billing_voucher_print_RefferedBy" for="x_RefferedBy" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_RefferedBy" type="text/html"><?php echo $view_billing_voucher_print_add->RefferedBy->caption() ?><?php echo $view_billing_voucher_print_add->RefferedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->RefferedBy->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RefferedBy" type="text/html"><span id="el_view_billing_voucher_print_RefferedBy">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RefferedBy"><?php echo EmptyValue(strval($view_billing_voucher_print_add->RefferedBy->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_billing_voucher_print_add->RefferedBy->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher_print_add->RefferedBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_billing_voucher_print_add->RefferedBy->ReadOnly || $view_billing_voucher_print_add->RefferedBy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RefferedBy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$view_billing_voucher_print_add->RefferedBy->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_RefferedBy" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_billing_voucher_print_add->RefferedBy->caption() ?>" data-title="<?php echo $view_billing_voucher_print_add->RefferedBy->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_RefferedBy',url:'mas_reference_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $view_billing_voucher_print_add->RefferedBy->Lookup->getParamTag($view_billing_voucher_print_add, "p_x_RefferedBy") ?>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_RefferedBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher_print_add->RefferedBy->displayValueSeparatorAttribute() ?>" name="x_RefferedBy" id="x_RefferedBy" value="<?php echo $view_billing_voucher_print_add->RefferedBy->CurrentValue ?>"<?php echo $view_billing_voucher_print_add->RefferedBy->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->RefferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_view_billing_voucher_print_BillNumber" for="x_BillNumber" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_BillNumber" type="text/html"><?php echo $view_billing_voucher_print_add->BillNumber->caption() ?><?php echo $view_billing_voucher_print_add->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->BillNumber->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_BillNumber" type="text/html"><span id="el_view_billing_voucher_print_BillNumber">
<input type="text" data-table="view_billing_voucher_print" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->BillNumber->EditValue ?>"<?php echo $view_billing_voucher_print_add->BillNumber->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_view_billing_voucher_print_CardNumber" for="x_CardNumber" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_CardNumber" type="text/html"><?php echo $view_billing_voucher_print_add->CardNumber->caption() ?><?php echo $view_billing_voucher_print_add->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->CardNumber->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CardNumber" type="text/html"><span id="el_view_billing_voucher_print_CardNumber">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->CardNumber->EditValue ?>"<?php echo $view_billing_voucher_print_add->CardNumber->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_view_billing_voucher_print_BankName" for="x_BankName" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_BankName" type="text/html"><?php echo $view_billing_voucher_print_add->BankName->caption() ?><?php echo $view_billing_voucher_print_add->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->BankName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_BankName" type="text/html"><span id="el_view_billing_voucher_print_BankName">
<input type="text" data-table="view_billing_voucher_print" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->BankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->BankName->EditValue ?>"<?php echo $view_billing_voucher_print_add->BankName->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_view_billing_voucher_print_DrID" for="x_DrID" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_DrID" type="text/html"><?php echo $view_billing_voucher_print_add->DrID->caption() ?><?php echo $view_billing_voucher_print_add->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->DrID->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_DrID" type="text/html"><span id="el_view_billing_voucher_print_DrID">
<?php $view_billing_voucher_print_add->DrID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?php echo EmptyValue(strval($view_billing_voucher_print_add->DrID->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_billing_voucher_print_add->DrID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher_print_add->DrID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_billing_voucher_print_add->DrID->ReadOnly || $view_billing_voucher_print_add->DrID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher_print_add->DrID->Lookup->getParamTag($view_billing_voucher_print_add, "p_x_DrID") ?>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_DrID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher_print_add->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?php echo $view_billing_voucher_print_add->DrID->CurrentValue ?>"<?php echo $view_billing_voucher_print_add->DrID->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_view_billing_voucher_print_BillStatus" for="x_BillStatus" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_BillStatus" type="text/html"><?php echo $view_billing_voucher_print_add->BillStatus->caption() ?><?php echo $view_billing_voucher_print_add->BillStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->BillStatus->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_BillStatus" type="text/html"><span id="el_view_billing_voucher_print_BillStatus">
<input type="text" data-table="view_billing_voucher_print" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->BillStatus->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->BillStatus->EditValue ?>"<?php echo $view_billing_voucher_print_add->BillStatus->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_view_billing_voucher_print_ReportHeader" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_ReportHeader" type="text/html"><?php echo $view_billing_voucher_print_add->ReportHeader->caption() ?><?php echo $view_billing_voucher_print_add->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_ReportHeader" type="text/html"><span id="el_view_billing_voucher_print_ReportHeader">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_billing_voucher_print" data-field="x_ReportHeader" data-value-separator="<?php echo $view_billing_voucher_print_add->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $view_billing_voucher_print_add->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher_print_add->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span></script>
<?php echo $view_billing_voucher_print_add->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
	<div id="r_AdjustmentAdvance" class="form-group row">
		<label id="elh_view_billing_voucher_print_AdjustmentAdvance" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_AdjustmentAdvance" type="text/html"><?php echo $view_billing_voucher_print_add->AdjustmentAdvance->caption() ?><?php echo $view_billing_voucher_print_add->AdjustmentAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->AdjustmentAdvance->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_AdjustmentAdvance" type="text/html"><span id="el_view_billing_voucher_print_AdjustmentAdvance">
<div id="tp_x_AdjustmentAdvance" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_billing_voucher_print" data-field="x_AdjustmentAdvance" data-value-separator="<?php echo $view_billing_voucher_print_add->AdjustmentAdvance->displayValueSeparatorAttribute() ?>" name="x_AdjustmentAdvance[]" id="x_AdjustmentAdvance[]" value="{value}"<?php echo $view_billing_voucher_print_add->AdjustmentAdvance->editAttributes() ?>></div>
<div id="dsl_x_AdjustmentAdvance" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher_print_add->AdjustmentAdvance->checkBoxListHtml(FALSE, "x_AdjustmentAdvance[]") ?>
</div></div>
</span></script>
<?php echo $view_billing_voucher_print_add->AdjustmentAdvance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->billing_vouchercol->Visible) { // billing_vouchercol ?>
	<div id="r_billing_vouchercol" class="form-group row">
		<label id="elh_view_billing_voucher_print_billing_vouchercol" for="x_billing_vouchercol" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_billing_vouchercol" type="text/html"><?php echo $view_billing_voucher_print_add->billing_vouchercol->caption() ?><?php echo $view_billing_voucher_print_add->billing_vouchercol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->billing_vouchercol->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_billing_vouchercol" type="text/html"><span id="el_view_billing_voucher_print_billing_vouchercol">
<input type="text" data-table="view_billing_voucher_print" data-field="x_billing_vouchercol" name="x_billing_vouchercol" id="x_billing_vouchercol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->billing_vouchercol->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->billing_vouchercol->EditValue ?>"<?php echo $view_billing_voucher_print_add->billing_vouchercol->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->billing_vouchercol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->BillType->Visible) { // BillType ?>
	<div id="r_BillType" class="form-group row">
		<label id="elh_view_billing_voucher_print_BillType" for="x_BillType" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_BillType" type="text/html"><?php echo $view_billing_voucher_print_add->BillType->caption() ?><?php echo $view_billing_voucher_print_add->BillType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->BillType->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_BillType" type="text/html"><span id="el_view_billing_voucher_print_BillType">
<input type="text" data-table="view_billing_voucher_print" data-field="x_BillType" name="x_BillType" id="x_BillType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->BillType->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->BillType->EditValue ?>"<?php echo $view_billing_voucher_print_add->BillType->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->BillType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->ProcedureName->Visible) { // ProcedureName ?>
	<div id="r_ProcedureName" class="form-group row">
		<label id="elh_view_billing_voucher_print_ProcedureName" for="x_ProcedureName" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_ProcedureName" type="text/html"><?php echo $view_billing_voucher_print_add->ProcedureName->caption() ?><?php echo $view_billing_voucher_print_add->ProcedureName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->ProcedureName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_ProcedureName" type="text/html"><span id="el_view_billing_voucher_print_ProcedureName">
<input type="text" data-table="view_billing_voucher_print" data-field="x_ProcedureName" name="x_ProcedureName" id="x_ProcedureName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->ProcedureName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->ProcedureName->EditValue ?>"<?php echo $view_billing_voucher_print_add->ProcedureName->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->ProcedureName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->ProcedureAmount->Visible) { // ProcedureAmount ?>
	<div id="r_ProcedureAmount" class="form-group row">
		<label id="elh_view_billing_voucher_print_ProcedureAmount" for="x_ProcedureAmount" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_ProcedureAmount" type="text/html"><?php echo $view_billing_voucher_print_add->ProcedureAmount->caption() ?><?php echo $view_billing_voucher_print_add->ProcedureAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->ProcedureAmount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_ProcedureAmount" type="text/html"><span id="el_view_billing_voucher_print_ProcedureAmount">
<input type="text" data-table="view_billing_voucher_print" data-field="x_ProcedureAmount" name="x_ProcedureAmount" id="x_ProcedureAmount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->ProcedureAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->ProcedureAmount->EditValue ?>"<?php echo $view_billing_voucher_print_add->ProcedureAmount->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->ProcedureAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->IncludePackage->Visible) { // IncludePackage ?>
	<div id="r_IncludePackage" class="form-group row">
		<label id="elh_view_billing_voucher_print_IncludePackage" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_IncludePackage" type="text/html"><?php echo $view_billing_voucher_print_add->IncludePackage->caption() ?><?php echo $view_billing_voucher_print_add->IncludePackage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->IncludePackage->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_IncludePackage" type="text/html"><span id="el_view_billing_voucher_print_IncludePackage">
<div id="tp_x_IncludePackage" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_billing_voucher_print" data-field="x_IncludePackage" data-value-separator="<?php echo $view_billing_voucher_print_add->IncludePackage->displayValueSeparatorAttribute() ?>" name="x_IncludePackage[]" id="x_IncludePackage[]" value="{value}"<?php echo $view_billing_voucher_print_add->IncludePackage->editAttributes() ?>></div>
<div id="dsl_x_IncludePackage" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher_print_add->IncludePackage->checkBoxListHtml(FALSE, "x_IncludePackage[]") ?>
</div></div>
</span></script>
<?php echo $view_billing_voucher_print_add->IncludePackage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->CancelBill->Visible) { // CancelBill ?>
	<div id="r_CancelBill" class="form-group row">
		<label id="elh_view_billing_voucher_print_CancelBill" for="x_CancelBill" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_CancelBill" type="text/html"><?php echo $view_billing_voucher_print_add->CancelBill->caption() ?><?php echo $view_billing_voucher_print_add->CancelBill->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->CancelBill->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelBill" type="text/html"><span id="el_view_billing_voucher_print_CancelBill">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher_print" data-field="x_CancelBill" data-value-separator="<?php echo $view_billing_voucher_print_add->CancelBill->displayValueSeparatorAttribute() ?>" id="x_CancelBill" name="x_CancelBill"<?php echo $view_billing_voucher_print_add->CancelBill->editAttributes() ?>>
			<?php echo $view_billing_voucher_print_add->CancelBill->selectOptionListHtml("x_CancelBill") ?>
		</select>
</div>
</span></script>
<?php echo $view_billing_voucher_print_add->CancelBill->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->CancelReason->Visible) { // CancelReason ?>
	<div id="r_CancelReason" class="form-group row">
		<label id="elh_view_billing_voucher_print_CancelReason" for="x_CancelReason" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_CancelReason" type="text/html"><?php echo $view_billing_voucher_print_add->CancelReason->caption() ?><?php echo $view_billing_voucher_print_add->CancelReason->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->CancelReason->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelReason" type="text/html"><span id="el_view_billing_voucher_print_CancelReason">
<textarea data-table="view_billing_voucher_print" data-field="x_CancelReason" name="x_CancelReason" id="x_CancelReason" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->CancelReason->getPlaceHolder()) ?>"<?php echo $view_billing_voucher_print_add->CancelReason->editAttributes() ?>><?php echo $view_billing_voucher_print_add->CancelReason->EditValue ?></textarea>
</span></script>
<?php echo $view_billing_voucher_print_add->CancelReason->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
	<div id="r_CancelModeOfPayment" class="form-group row">
		<label id="elh_view_billing_voucher_print_CancelModeOfPayment" for="x_CancelModeOfPayment" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_CancelModeOfPayment" type="text/html"><?php echo $view_billing_voucher_print_add->CancelModeOfPayment->caption() ?><?php echo $view_billing_voucher_print_add->CancelModeOfPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->CancelModeOfPayment->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelModeOfPayment" type="text/html"><span id="el_view_billing_voucher_print_CancelModeOfPayment">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelModeOfPayment" name="x_CancelModeOfPayment" id="x_CancelModeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->CancelModeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->CancelModeOfPayment->EditValue ?>"<?php echo $view_billing_voucher_print_add->CancelModeOfPayment->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->CancelModeOfPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->CancelAmount->Visible) { // CancelAmount ?>
	<div id="r_CancelAmount" class="form-group row">
		<label id="elh_view_billing_voucher_print_CancelAmount" for="x_CancelAmount" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_CancelAmount" type="text/html"><?php echo $view_billing_voucher_print_add->CancelAmount->caption() ?><?php echo $view_billing_voucher_print_add->CancelAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->CancelAmount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelAmount" type="text/html"><span id="el_view_billing_voucher_print_CancelAmount">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelAmount" name="x_CancelAmount" id="x_CancelAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->CancelAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->CancelAmount->EditValue ?>"<?php echo $view_billing_voucher_print_add->CancelAmount->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->CancelAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->CancelBankName->Visible) { // CancelBankName ?>
	<div id="r_CancelBankName" class="form-group row">
		<label id="elh_view_billing_voucher_print_CancelBankName" for="x_CancelBankName" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_CancelBankName" type="text/html"><?php echo $view_billing_voucher_print_add->CancelBankName->caption() ?><?php echo $view_billing_voucher_print_add->CancelBankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->CancelBankName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelBankName" type="text/html"><span id="el_view_billing_voucher_print_CancelBankName">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelBankName" name="x_CancelBankName" id="x_CancelBankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->CancelBankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->CancelBankName->EditValue ?>"<?php echo $view_billing_voucher_print_add->CancelBankName->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->CancelBankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
	<div id="r_CancelTransactionNumber" class="form-group row">
		<label id="elh_view_billing_voucher_print_CancelTransactionNumber" for="x_CancelTransactionNumber" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_CancelTransactionNumber" type="text/html"><?php echo $view_billing_voucher_print_add->CancelTransactionNumber->caption() ?><?php echo $view_billing_voucher_print_add->CancelTransactionNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->CancelTransactionNumber->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelTransactionNumber" type="text/html"><span id="el_view_billing_voucher_print_CancelTransactionNumber">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelTransactionNumber" name="x_CancelTransactionNumber" id="x_CancelTransactionNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->CancelTransactionNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->CancelTransactionNumber->EditValue ?>"<?php echo $view_billing_voucher_print_add->CancelTransactionNumber->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->CancelTransactionNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->LabTest->Visible) { // LabTest ?>
	<div id="r_LabTest" class="form-group row">
		<label id="elh_view_billing_voucher_print_LabTest" for="x_LabTest" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_LabTest" type="text/html"><?php echo $view_billing_voucher_print_add->LabTest->caption() ?><?php echo $view_billing_voucher_print_add->LabTest->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->LabTest->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_LabTest" type="text/html"><span id="el_view_billing_voucher_print_LabTest">
<input type="text" data-table="view_billing_voucher_print" data-field="x_LabTest" name="x_LabTest" id="x_LabTest" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->LabTest->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->LabTest->EditValue ?>"<?php echo $view_billing_voucher_print_add->LabTest->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->LabTest->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->sid->Visible) { // sid ?>
	<div id="r_sid" class="form-group row">
		<label id="elh_view_billing_voucher_print_sid" for="x_sid" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_sid" type="text/html"><?php echo $view_billing_voucher_print_add->sid->caption() ?><?php echo $view_billing_voucher_print_add->sid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->sid->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_sid" type="text/html"><span id="el_view_billing_voucher_print_sid">
<input type="text" data-table="view_billing_voucher_print" data-field="x_sid" name="x_sid" id="x_sid" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->sid->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->sid->EditValue ?>"<?php echo $view_billing_voucher_print_add->sid->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->sid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print_add->SidNo->Visible) { // SidNo ?>
	<div id="r_SidNo" class="form-group row">
		<label id="elh_view_billing_voucher_print_SidNo" for="x_SidNo" class="<?php echo $view_billing_voucher_print_add->LeftColumnClass ?>"><script id="tpc_view_billing_voucher_print_SidNo" type="text/html"><?php echo $view_billing_voucher_print_add->SidNo->caption() ?><?php echo $view_billing_voucher_print_add->SidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_billing_voucher_print_add->RightColumnClass ?>"><div <?php echo $view_billing_voucher_print_add->SidNo->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_SidNo" type="text/html"><span id="el_view_billing_voucher_print_SidNo">
<input type="text" data-table="view_billing_voucher_print" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print_add->SidNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print_add->SidNo->EditValue ?>"<?php echo $view_billing_voucher_print_add->SidNo->editAttributes() ?>>
</span></script>
<?php echo $view_billing_voucher_print_add->SidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_billing_voucher_printadd" class="ew-custom-template"></div>
<script id="tpm_view_billing_voucher_printadd" type="text/html">
<div id="ct_view_billing_voucher_print_add"><style>
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
<input id="createdbyId" name="createdbyId" type="hidden" value="<?php echo CurrentUserName(); ?>">
<input id="HospIDId" name="HospIDId" type="hidden" value="<?php echo HospitalID(); ?>">
<div hidden>{{include tmpl="#tpc_view_billing_voucher_print_billing_vouchercol"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_billing_vouchercol")/}} </div>
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_billing_voucher_print_PatId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_PatId")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_billing_voucher_print_RIDNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_RIDNO")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_billing_voucher_print_CId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_CId")/}}</h3>
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
		<td>{{include tmpl="#tpc_view_billing_voucher_print_PatientId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_PatientId")/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_PatientName")/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_Mobile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_Mobile")/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_Dob"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_Dob")/}}</td>
		<td>{{include tmpl="#tpc_view_billing_voucher_print_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_Age")/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_Gender")/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_PartnerName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_PartnerName")/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_PayerType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_PayerType")/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_RefferedBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_RefferedBy")/}}</td>
			<td></td>
		</tr>
		 <tr>
		 	<td>{{include tmpl="#tpc_view_billing_voucher_print_DrID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_DrID")/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_Doctor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_Doctor")/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_DrDepartment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_DrDepartment")/}}</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div id="LoadGetOPAdvance"> </div>
{{include tmpl="#tpc_view_billing_voucher_print_ReportHeader"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_ReportHeader")/}}
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
			<td>{{include tmpl="#tpc_view_billing_voucher_print_ModeofPayment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_ModeofPayment")/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_Amount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_Amount")/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_AnyDues"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_AnyDues")/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_DiscountRemarks"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_DiscountRemarks")/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_Remarks"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_Remarks")/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_AdjustmentAdvance"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_AdjustmentAdvance")/}}</td>
		</tr>
		<tr id="ProcedureIITem">
			<td>{{include tmpl="#tpc_view_billing_voucher_print_IncludePackage"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_IncludePackage")/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_ProcedureName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_ProcedureName")/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_ProcedureAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_ProcedureAmount")/}}</td>
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
			<td>{{include tmpl="#tpc_view_billing_voucher_print_CardNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_CardNumber")/}}</td>
			<td>{{include tmpl="#tpc_view_billing_voucher_print_BankName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_billing_voucher_print_BankName")/}}</td>
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
	if (in_array("view_patient_services", explode(",", $view_billing_voucher_print->getCurrentDetailTable())) && $view_patient_services->DetailAdd) {
?>
<?php if ($view_billing_voucher_print->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("view_patient_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_patient_servicesgrid.php" ?>
<?php } ?>
<?php if (!$view_billing_voucher_print_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_billing_voucher_print_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_billing_voucher_print_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_billing_voucher_print->Rows) ?> };
	ew.applyTemplate("tpd_view_billing_voucher_printadd", "tpm_view_billing_voucher_printadd", "view_billing_voucher_printadd", "<?php echo $view_billing_voucher_print->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_billing_voucher_printadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_billing_voucher_print_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	document.getElementById("IIDDCancelBankName").style.display="none";
});
</script>
<?php include_once "footer.php"; ?>
<?php
$view_billing_voucher_print_add->terminate();
?>