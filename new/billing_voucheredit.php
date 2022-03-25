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
$billing_voucher_edit = new billing_voucher_edit();

// Run the page
$billing_voucher_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_voucher_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbilling_voucheredit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fbilling_voucheredit = currentForm = new ew.Form("fbilling_voucheredit", "edit");

	// Validate form
	fbilling_voucheredit.validate = function() {
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
			<?php if ($billing_voucher_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->id->caption(), $billing_voucher_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->PatId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->PatId->caption(), $billing_voucher_edit->PatId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_voucher_edit->PatId->errorMessage()) ?>");
			<?php if ($billing_voucher_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->Reception->caption(), $billing_voucher_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->BillNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_BillNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->BillNumber->caption(), $billing_voucher_edit->BillNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->PatientId->caption(), $billing_voucher_edit->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_voucher_edit->PatientId->errorMessage()) ?>");
			<?php if ($billing_voucher_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->mrnno->caption(), $billing_voucher_edit->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->PatientName->caption(), $billing_voucher_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->Age->caption(), $billing_voucher_edit->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->Gender->caption(), $billing_voucher_edit->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->profilePic->caption(), $billing_voucher_edit->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->Mobile->caption(), $billing_voucher_edit->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->IP_OP->Required) { ?>
				elm = this.getElements("x" + infix + "_IP_OP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->IP_OP->caption(), $billing_voucher_edit->IP_OP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->Doctor->Required) { ?>
				elm = this.getElements("x" + infix + "_Doctor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->Doctor->caption(), $billing_voucher_edit->Doctor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->voucher_type->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->voucher_type->caption(), $billing_voucher_edit->voucher_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->Details->Required) { ?>
				elm = this.getElements("x" + infix + "_Details");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->Details->caption(), $billing_voucher_edit->Details->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->ModeofPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeofPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->ModeofPayment->caption(), $billing_voucher_edit->ModeofPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->Amount->caption(), $billing_voucher_edit->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_voucher_edit->Amount->errorMessage()) ?>");
			<?php if ($billing_voucher_edit->AnyDues->Required) { ?>
				elm = this.getElements("x" + infix + "_AnyDues");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->AnyDues->caption(), $billing_voucher_edit->AnyDues->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->modifiedby->caption(), $billing_voucher_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->modifieddatetime->caption(), $billing_voucher_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->RealizationAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->RealizationAmount->caption(), $billing_voucher_edit->RealizationAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_voucher_edit->RealizationAmount->errorMessage()) ?>");
			<?php if ($billing_voucher_edit->RealizationStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->RealizationStatus->caption(), $billing_voucher_edit->RealizationStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->RealizationRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->RealizationRemarks->caption(), $billing_voucher_edit->RealizationRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->RealizationBatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationBatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->RealizationBatchNo->caption(), $billing_voucher_edit->RealizationBatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->RealizationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->RealizationDate->caption(), $billing_voucher_edit->RealizationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->HospID->caption(), $billing_voucher_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->RIDNO->caption(), $billing_voucher_edit->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_voucher_edit->RIDNO->errorMessage()) ?>");
			<?php if ($billing_voucher_edit->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->TidNo->caption(), $billing_voucher_edit->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_voucher_edit->TidNo->errorMessage()) ?>");
			<?php if ($billing_voucher_edit->CId->Required) { ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->CId->caption(), $billing_voucher_edit->CId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_voucher_edit->CId->errorMessage()) ?>");
			<?php if ($billing_voucher_edit->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->PartnerName->caption(), $billing_voucher_edit->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->PayerType->Required) { ?>
				elm = this.getElements("x" + infix + "_PayerType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->PayerType->caption(), $billing_voucher_edit->PayerType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->Dob->Required) { ?>
				elm = this.getElements("x" + infix + "_Dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->Dob->caption(), $billing_voucher_edit->Dob->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->Currency->Required) { ?>
				elm = this.getElements("x" + infix + "_Currency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->Currency->caption(), $billing_voucher_edit->Currency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->DiscountRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->DiscountRemarks->caption(), $billing_voucher_edit->DiscountRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->Remarks->caption(), $billing_voucher_edit->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->DrDepartment->Required) { ?>
				elm = this.getElements("x" + infix + "_DrDepartment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->DrDepartment->caption(), $billing_voucher_edit->DrDepartment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->RefferedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_RefferedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->RefferedBy->caption(), $billing_voucher_edit->RefferedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->CardNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_CardNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->CardNumber->caption(), $billing_voucher_edit->CardNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->BankName->Required) { ?>
				elm = this.getElements("x" + infix + "_BankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->BankName->caption(), $billing_voucher_edit->BankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->DrID->caption(), $billing_voucher_edit->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_voucher_edit->DrID->errorMessage()) ?>");
			<?php if ($billing_voucher_edit->BillStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->BillStatus->caption(), $billing_voucher_edit->BillStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_voucher_edit->BillStatus->errorMessage()) ?>");
			<?php if ($billing_voucher_edit->ReportHeader->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportHeader");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->ReportHeader->caption(), $billing_voucher_edit->ReportHeader->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->UserName->Required) { ?>
				elm = this.getElements("x" + infix + "_UserName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->UserName->caption(), $billing_voucher_edit->UserName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->AdjustmentAdvance->Required) { ?>
				elm = this.getElements("x" + infix + "_AdjustmentAdvance");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->AdjustmentAdvance->caption(), $billing_voucher_edit->AdjustmentAdvance->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->billing_vouchercol->Required) { ?>
				elm = this.getElements("x" + infix + "_billing_vouchercol");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->billing_vouchercol->caption(), $billing_voucher_edit->billing_vouchercol->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->BillType->Required) { ?>
				elm = this.getElements("x" + infix + "_BillType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->BillType->caption(), $billing_voucher_edit->BillType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->ProcedureName->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcedureName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->ProcedureName->caption(), $billing_voucher_edit->ProcedureName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->ProcedureAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcedureAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->ProcedureAmount->caption(), $billing_voucher_edit->ProcedureAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProcedureAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_voucher_edit->ProcedureAmount->errorMessage()) ?>");
			<?php if ($billing_voucher_edit->IncludePackage->Required) { ?>
				elm = this.getElements("x" + infix + "_IncludePackage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->IncludePackage->caption(), $billing_voucher_edit->IncludePackage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->CancelBill->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelBill");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->CancelBill->caption(), $billing_voucher_edit->CancelBill->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->CancelReason->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelReason");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->CancelReason->caption(), $billing_voucher_edit->CancelReason->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->CancelModeOfPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelModeOfPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->CancelModeOfPayment->caption(), $billing_voucher_edit->CancelModeOfPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->CancelAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->CancelAmount->caption(), $billing_voucher_edit->CancelAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->CancelBankName->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelBankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->CancelBankName->caption(), $billing_voucher_edit->CancelBankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->CancelTransactionNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelTransactionNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->CancelTransactionNumber->caption(), $billing_voucher_edit->CancelTransactionNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->LabTest->Required) { ?>
				elm = this.getElements("x" + infix + "_LabTest");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->LabTest->caption(), $billing_voucher_edit->LabTest->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->sid->Required) { ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->sid->caption(), $billing_voucher_edit->sid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_voucher_edit->sid->errorMessage()) ?>");
			<?php if ($billing_voucher_edit->SidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_SidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->SidNo->caption(), $billing_voucher_edit->SidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->createdDatettime->Required) { ?>
				elm = this.getElements("x" + infix + "_createdDatettime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->createdDatettime->caption(), $billing_voucher_edit->createdDatettime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->LabTestReleased->Required) { ?>
				elm = this.getElements("x" + infix + "_LabTestReleased");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->LabTestReleased->caption(), $billing_voucher_edit->LabTestReleased->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_voucher_edit->GoogleReviewID->Required) { ?>
				elm = this.getElements("x" + infix + "_GoogleReviewID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher_edit->GoogleReviewID->caption(), $billing_voucher_edit->GoogleReviewID->RequiredErrorMessage)) ?>");
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
	fbilling_voucheredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbilling_voucheredit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbilling_voucheredit.lists["x_Reception"] = <?php echo $billing_voucher_edit->Reception->Lookup->toClientList($billing_voucher_edit) ?>;
	fbilling_voucheredit.lists["x_Reception"].options = <?php echo JsonEncode($billing_voucher_edit->Reception->lookupOptions()) ?>;
	fbilling_voucheredit.lists["x_Doctor"] = <?php echo $billing_voucher_edit->Doctor->Lookup->toClientList($billing_voucher_edit) ?>;
	fbilling_voucheredit.lists["x_Doctor"].options = <?php echo JsonEncode($billing_voucher_edit->Doctor->lookupOptions()) ?>;
	fbilling_voucheredit.autoSuggests["x_Doctor"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fbilling_voucheredit.lists["x_voucher_type"] = <?php echo $billing_voucher_edit->voucher_type->Lookup->toClientList($billing_voucher_edit) ?>;
	fbilling_voucheredit.lists["x_voucher_type"].options = <?php echo JsonEncode($billing_voucher_edit->voucher_type->lookupOptions()) ?>;
	fbilling_voucheredit.lists["x_ModeofPayment"] = <?php echo $billing_voucher_edit->ModeofPayment->Lookup->toClientList($billing_voucher_edit) ?>;
	fbilling_voucheredit.lists["x_ModeofPayment"].options = <?php echo JsonEncode($billing_voucher_edit->ModeofPayment->lookupOptions()) ?>;
	loadjs.done("fbilling_voucheredit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $billing_voucher_edit->showPageHeader(); ?>
<?php
$billing_voucher_edit->showMessage();
?>
<form name="fbilling_voucheredit" id="fbilling_voucheredit" class="<?php echo $billing_voucher_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_voucher">
<?php if ($billing_voucher->isConfirm()) { // Confirm page ?>
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="confirm" id="confirm" value="confirm">
<?php } else { ?>
<input type="hidden" name="action" id="action" value="confirm">
<?php } ?>
<input type="hidden" name="modal" value="<?php echo (int)$billing_voucher_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($billing_voucher_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_billing_voucher_id" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_id" type="text/html"><?php echo $billing_voucher_edit->id->caption() ?><?php echo $billing_voucher_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->id->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_id" type="text/html"><span id="el_billing_voucher_id">
<span<?php echo $billing_voucher_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($billing_voucher_edit->id->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_billing_voucher_id" type="text/html"><span id="el_billing_voucher_id">
<span<?php echo $billing_voucher_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->id->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($billing_voucher_edit->id->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_billing_voucher_PatId" for="x_PatId" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_PatId" type="text/html"><?php echo $billing_voucher_edit->PatId->caption() ?><?php echo $billing_voucher_edit->PatId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->PatId->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_PatId" type="text/html"><span id="el_billing_voucher_PatId">
<input type="text" data-table="billing_voucher" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?php echo HtmlEncode($billing_voucher_edit->PatId->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->PatId->EditValue ?>"<?php echo $billing_voucher_edit->PatId->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="orig_billing_voucher_PatId" class="billing_voucheredit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->PatId->ViewValue)) ?>">
</script>
<script id="tpx_billing_voucher_PatId" type="text/html"><span id="el_billing_voucher_PatId">
<span<?php echo $billing_voucher_edit->PatId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->PatId->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_PatId" name="x_PatId" id="x_PatId" value="<?php echo HtmlEncode($billing_voucher_edit->PatId->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_billing_voucher_Reception" for="x_Reception" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_Reception" type="text/html"><?php echo $billing_voucher_edit->Reception->caption() ?><?php echo $billing_voucher_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->Reception->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Reception" type="text/html"><span id="el_billing_voucher_Reception">
<?php $billing_voucher_edit->Reception->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?php echo EmptyValue(strval($billing_voucher_edit->Reception->ViewValue)) ? $Language->phrase("PleaseSelect") : $billing_voucher_edit->Reception->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($billing_voucher_edit->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($billing_voucher_edit->Reception->ReadOnly || $billing_voucher_edit->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $billing_voucher_edit->Reception->Lookup->getParamTag($billing_voucher_edit, "p_x_Reception") ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $billing_voucher_edit->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?php echo $billing_voucher_edit->Reception->CurrentValue ?>"<?php echo $billing_voucher_edit->Reception->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="orig_billing_voucher_Reception" class="billing_voucheredit" type="text/html">
<?php echo GetImageViewTag($billing_voucher_edit->Reception, $billing_voucher_edit->Reception->ViewValue) ?>
</script>
<script id="tpx_billing_voucher_Reception" type="text/html"><span id="el_billing_voucher_Reception">
<span><?php echo GetImageViewTag($billing_voucher_edit->Reception, $billing_voucher_edit->Reception->ViewValue) ?></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($billing_voucher_edit->Reception->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_billing_voucher_BillNumber" for="x_BillNumber" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_BillNumber" type="text/html"><?php echo $billing_voucher_edit->BillNumber->caption() ?><?php echo $billing_voucher_edit->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->BillNumber->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_BillNumber" type="text/html"><span id="el_billing_voucher_BillNumber">
<input type="text" data-table="billing_voucher" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->BillNumber->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->BillNumber->EditValue ?>"<?php echo $billing_voucher_edit->BillNumber->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_BillNumber" type="text/html"><span id="el_billing_voucher_BillNumber">
<span<?php echo $billing_voucher_edit->BillNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->BillNumber->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" value="<?php echo HtmlEncode($billing_voucher_edit->BillNumber->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_billing_voucher_PatientId" for="x_PatientId" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_PatientId" type="text/html"><?php echo $billing_voucher_edit->PatientId->caption() ?><?php echo $billing_voucher_edit->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->PatientId->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_PatientId" type="text/html"><span id="el_billing_voucher_PatientId">
<input type="text" data-table="billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="80" placeholder="<?php echo HtmlEncode($billing_voucher_edit->PatientId->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->PatientId->EditValue ?>"<?php echo $billing_voucher_edit->PatientId->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_PatientId" type="text/html"><span id="el_billing_voucher_PatientId">
<span><?php echo GetImageViewTag($billing_voucher_edit->PatientId, $billing_voucher_edit->PatientId->ViewValue) ?></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" value="<?php echo HtmlEncode($billing_voucher_edit->PatientId->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_billing_voucher_mrnno" for="x_mrnno" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_mrnno" type="text/html"><?php echo $billing_voucher_edit->mrnno->caption() ?><?php echo $billing_voucher_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->mrnno->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_mrnno" type="text/html"><span id="el_billing_voucher_mrnno">
<input type="text" data-table="billing_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->mrnno->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->mrnno->EditValue ?>"<?php echo $billing_voucher_edit->mrnno->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_mrnno" type="text/html"><span id="el_billing_voucher_mrnno">
<span<?php echo $billing_voucher_edit->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->mrnno->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($billing_voucher_edit->mrnno->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_billing_voucher_PatientName" for="x_PatientName" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_PatientName" type="text/html"><?php echo $billing_voucher_edit->PatientName->caption() ?><?php echo $billing_voucher_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->PatientName->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_PatientName" type="text/html"><span id="el_billing_voucher_PatientName">
<input type="text" data-table="billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->PatientName->EditValue ?>"<?php echo $billing_voucher_edit->PatientName->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_PatientName" type="text/html"><span id="el_billing_voucher_PatientName">
<span<?php echo $billing_voucher_edit->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->PatientName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" value="<?php echo HtmlEncode($billing_voucher_edit->PatientName->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_billing_voucher_Age" for="x_Age" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_Age" type="text/html"><?php echo $billing_voucher_edit->Age->caption() ?><?php echo $billing_voucher_edit->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->Age->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Age" type="text/html"><span id="el_billing_voucher_Age">
<input type="text" data-table="billing_voucher" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->Age->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->Age->EditValue ?>"<?php echo $billing_voucher_edit->Age->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_Age" type="text/html"><span id="el_billing_voucher_Age">
<span<?php echo $billing_voucher_edit->Age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->Age->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_Age" name="x_Age" id="x_Age" value="<?php echo HtmlEncode($billing_voucher_edit->Age->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_billing_voucher_Gender" for="x_Gender" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_Gender" type="text/html"><?php echo $billing_voucher_edit->Gender->caption() ?><?php echo $billing_voucher_edit->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->Gender->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Gender" type="text/html"><span id="el_billing_voucher_Gender">
<input type="text" data-table="billing_voucher" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->Gender->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->Gender->EditValue ?>"<?php echo $billing_voucher_edit->Gender->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_Gender" type="text/html"><span id="el_billing_voucher_Gender">
<span<?php echo $billing_voucher_edit->Gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->Gender->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_Gender" name="x_Gender" id="x_Gender" value="<?php echo HtmlEncode($billing_voucher_edit->Gender->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_billing_voucher_profilePic" for="x_profilePic" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_profilePic" type="text/html"><?php echo $billing_voucher_edit->profilePic->caption() ?><?php echo $billing_voucher_edit->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->profilePic->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_profilePic" type="text/html"><span id="el_billing_voucher_profilePic">
<input type="text" data-table="billing_voucher" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" placeholder="<?php echo HtmlEncode($billing_voucher_edit->profilePic->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->profilePic->EditValue ?>"<?php echo $billing_voucher_edit->profilePic->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_profilePic" type="text/html"><span id="el_billing_voucher_profilePic">
<span<?php echo $billing_voucher_edit->profilePic->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->profilePic->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" value="<?php echo HtmlEncode($billing_voucher_edit->profilePic->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_billing_voucher_Mobile" for="x_Mobile" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_Mobile" type="text/html"><?php echo $billing_voucher_edit->Mobile->caption() ?><?php echo $billing_voucher_edit->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->Mobile->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Mobile" type="text/html"><span id="el_billing_voucher_Mobile">
<input type="text" data-table="billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->Mobile->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->Mobile->EditValue ?>"<?php echo $billing_voucher_edit->Mobile->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_Mobile" type="text/html"><span id="el_billing_voucher_Mobile">
<span<?php echo $billing_voucher_edit->Mobile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->Mobile->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" value="<?php echo HtmlEncode($billing_voucher_edit->Mobile->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label id="elh_billing_voucher_IP_OP" for="x_IP_OP" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_IP_OP" type="text/html"><?php echo $billing_voucher_edit->IP_OP->caption() ?><?php echo $billing_voucher_edit->IP_OP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->IP_OP->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_IP_OP" type="text/html"><span id="el_billing_voucher_IP_OP">
<input type="text" data-table="billing_voucher" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->IP_OP->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->IP_OP->EditValue ?>"<?php echo $billing_voucher_edit->IP_OP->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_IP_OP" type="text/html"><span id="el_billing_voucher_IP_OP">
<span<?php echo $billing_voucher_edit->IP_OP->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->IP_OP->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" value="<?php echo HtmlEncode($billing_voucher_edit->IP_OP->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->IP_OP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_billing_voucher_Doctor" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_Doctor" type="text/html"><?php echo $billing_voucher_edit->Doctor->caption() ?><?php echo $billing_voucher_edit->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->Doctor->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Doctor" type="text/html"><span id="el_billing_voucher_Doctor">
<?php
$onchange = $billing_voucher_edit->Doctor->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$billing_voucher_edit->Doctor->EditAttrs["onchange"] = "";
?>
<span id="as_x_Doctor">
	<input type="text" class="form-control" name="sv_x_Doctor" id="sv_x_Doctor" value="<?php echo RemoveHtml($billing_voucher_edit->Doctor->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->Doctor->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($billing_voucher_edit->Doctor->getPlaceHolder()) ?>"<?php echo $billing_voucher_edit->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Doctor" data-value-separator="<?php echo $billing_voucher_edit->Doctor->displayValueSeparatorAttribute() ?>" name="x_Doctor" id="x_Doctor" value="<?php echo HtmlEncode($billing_voucher_edit->Doctor->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $billing_voucher_edit->Doctor->Lookup->getParamTag($billing_voucher_edit, "p_x_Doctor") ?>
</span></script>
<script type="text/html" class="billing_voucheredit_js">
loadjs.ready(["fbilling_voucheredit"], function() {
	fbilling_voucheredit.createAutoSuggest({"id":"x_Doctor","forceSelect":false});
});
</script>
<?php } else { ?>
<script id="tpx_billing_voucher_Doctor" type="text/html"><span id="el_billing_voucher_Doctor">
<span<?php echo $billing_voucher_edit->Doctor->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->Doctor->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" value="<?php echo HtmlEncode($billing_voucher_edit->Doctor->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_billing_voucher_voucher_type" for="x_voucher_type" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_voucher_type" type="text/html"><?php echo $billing_voucher_edit->voucher_type->caption() ?><?php echo $billing_voucher_edit->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->voucher_type->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_voucher_type" type="text/html"><span id="el_billing_voucher_voucher_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="billing_voucher" data-field="x_voucher_type" data-value-separator="<?php echo $billing_voucher_edit->voucher_type->displayValueSeparatorAttribute() ?>" id="x_voucher_type" name="x_voucher_type"<?php echo $billing_voucher_edit->voucher_type->editAttributes() ?>>
			<?php echo $billing_voucher_edit->voucher_type->selectOptionListHtml("x_voucher_type") ?>
		</select>
</div>
<?php echo $billing_voucher_edit->voucher_type->Lookup->getParamTag($billing_voucher_edit, "p_x_voucher_type") ?>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_voucher_type" type="text/html"><span id="el_billing_voucher_voucher_type">
<span<?php echo $billing_voucher_edit->voucher_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->voucher_type->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" value="<?php echo HtmlEncode($billing_voucher_edit->voucher_type->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_billing_voucher_Details" for="x_Details" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_Details" type="text/html"><?php echo $billing_voucher_edit->Details->caption() ?><?php echo $billing_voucher_edit->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->Details->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Details" type="text/html"><span id="el_billing_voucher_Details">
<input type="text" data-table="billing_voucher" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->Details->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->Details->EditValue ?>"<?php echo $billing_voucher_edit->Details->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_Details" type="text/html"><span id="el_billing_voucher_Details">
<span<?php echo $billing_voucher_edit->Details->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->Details->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_Details" name="x_Details" id="x_Details" value="<?php echo HtmlEncode($billing_voucher_edit->Details->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_billing_voucher_ModeofPayment" for="x_ModeofPayment" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_ModeofPayment" type="text/html"><?php echo $billing_voucher_edit->ModeofPayment->caption() ?><?php echo $billing_voucher_edit->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->ModeofPayment->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_ModeofPayment" type="text/html"><span id="el_billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $billing_voucher_edit->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $billing_voucher_edit->ModeofPayment->editAttributes() ?>>
			<?php echo $billing_voucher_edit->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
		</select>
</div>
<?php echo $billing_voucher_edit->ModeofPayment->Lookup->getParamTag($billing_voucher_edit, "p_x_ModeofPayment") ?>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_ModeofPayment" type="text/html"><span id="el_billing_voucher_ModeofPayment">
<span<?php echo $billing_voucher_edit->ModeofPayment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->ModeofPayment->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" value="<?php echo HtmlEncode($billing_voucher_edit->ModeofPayment->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_billing_voucher_Amount" for="x_Amount" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_Amount" type="text/html"><?php echo $billing_voucher_edit->Amount->caption() ?><?php echo $billing_voucher_edit->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->Amount->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Amount" type="text/html"><span id="el_billing_voucher_Amount">
<input type="text" data-table="billing_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($billing_voucher_edit->Amount->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->Amount->EditValue ?>"<?php echo $billing_voucher_edit->Amount->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_Amount" type="text/html"><span id="el_billing_voucher_Amount">
<span<?php echo $billing_voucher_edit->Amount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->Amount->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" value="<?php echo HtmlEncode($billing_voucher_edit->Amount->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_billing_voucher_AnyDues" for="x_AnyDues" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_AnyDues" type="text/html"><?php echo $billing_voucher_edit->AnyDues->caption() ?><?php echo $billing_voucher_edit->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->AnyDues->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_AnyDues" type="text/html"><span id="el_billing_voucher_AnyDues">
<input type="text" data-table="billing_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->AnyDues->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->AnyDues->EditValue ?>"<?php echo $billing_voucher_edit->AnyDues->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_AnyDues" type="text/html"><span id="el_billing_voucher_AnyDues">
<span<?php echo $billing_voucher_edit->AnyDues->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->AnyDues->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" value="<?php echo HtmlEncode($billing_voucher_edit->AnyDues->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_billing_voucher_RealizationAmount" for="x_RealizationAmount" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_RealizationAmount" type="text/html"><?php echo $billing_voucher_edit->RealizationAmount->caption() ?><?php echo $billing_voucher_edit->RealizationAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->RealizationAmount->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_RealizationAmount" type="text/html"><span id="el_billing_voucher_RealizationAmount">
<input type="text" data-table="billing_voucher" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($billing_voucher_edit->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->RealizationAmount->EditValue ?>"<?php echo $billing_voucher_edit->RealizationAmount->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_RealizationAmount" type="text/html"><span id="el_billing_voucher_RealizationAmount">
<span<?php echo $billing_voucher_edit->RealizationAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->RealizationAmount->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" value="<?php echo HtmlEncode($billing_voucher_edit->RealizationAmount->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_billing_voucher_RealizationStatus" for="x_RealizationStatus" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_RealizationStatus" type="text/html"><?php echo $billing_voucher_edit->RealizationStatus->caption() ?><?php echo $billing_voucher_edit->RealizationStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->RealizationStatus->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_RealizationStatus" type="text/html"><span id="el_billing_voucher_RealizationStatus">
<input type="text" data-table="billing_voucher" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->RealizationStatus->EditValue ?>"<?php echo $billing_voucher_edit->RealizationStatus->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_RealizationStatus" type="text/html"><span id="el_billing_voucher_RealizationStatus">
<span<?php echo $billing_voucher_edit->RealizationStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->RealizationStatus->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" value="<?php echo HtmlEncode($billing_voucher_edit->RealizationStatus->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_billing_voucher_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_RealizationRemarks" type="text/html"><?php echo $billing_voucher_edit->RealizationRemarks->caption() ?><?php echo $billing_voucher_edit->RealizationRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->RealizationRemarks->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_RealizationRemarks" type="text/html"><span id="el_billing_voucher_RealizationRemarks">
<input type="text" data-table="billing_voucher" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->RealizationRemarks->EditValue ?>"<?php echo $billing_voucher_edit->RealizationRemarks->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_RealizationRemarks" type="text/html"><span id="el_billing_voucher_RealizationRemarks">
<span<?php echo $billing_voucher_edit->RealizationRemarks->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->RealizationRemarks->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" value="<?php echo HtmlEncode($billing_voucher_edit->RealizationRemarks->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_billing_voucher_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_RealizationBatchNo" type="text/html"><?php echo $billing_voucher_edit->RealizationBatchNo->caption() ?><?php echo $billing_voucher_edit->RealizationBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->RealizationBatchNo->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_RealizationBatchNo" type="text/html"><span id="el_billing_voucher_RealizationBatchNo">
<input type="text" data-table="billing_voucher" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->RealizationBatchNo->EditValue ?>"<?php echo $billing_voucher_edit->RealizationBatchNo->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_RealizationBatchNo" type="text/html"><span id="el_billing_voucher_RealizationBatchNo">
<span<?php echo $billing_voucher_edit->RealizationBatchNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->RealizationBatchNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" value="<?php echo HtmlEncode($billing_voucher_edit->RealizationBatchNo->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_billing_voucher_RealizationDate" for="x_RealizationDate" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_RealizationDate" type="text/html"><?php echo $billing_voucher_edit->RealizationDate->caption() ?><?php echo $billing_voucher_edit->RealizationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->RealizationDate->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_RealizationDate" type="text/html"><span id="el_billing_voucher_RealizationDate">
<input type="text" data-table="billing_voucher" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->RealizationDate->EditValue ?>"<?php echo $billing_voucher_edit->RealizationDate->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_RealizationDate" type="text/html"><span id="el_billing_voucher_RealizationDate">
<span<?php echo $billing_voucher_edit->RealizationDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->RealizationDate->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" value="<?php echo HtmlEncode($billing_voucher_edit->RealizationDate->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_billing_voucher_RIDNO" for="x_RIDNO" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_RIDNO" type="text/html"><?php echo $billing_voucher_edit->RIDNO->caption() ?><?php echo $billing_voucher_edit->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->RIDNO->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_RIDNO" type="text/html"><span id="el_billing_voucher_RIDNO">
<input type="text" data-table="billing_voucher" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($billing_voucher_edit->RIDNO->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->RIDNO->EditValue ?>"<?php echo $billing_voucher_edit->RIDNO->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_RIDNO" type="text/html"><span id="el_billing_voucher_RIDNO">
<span<?php echo $billing_voucher_edit->RIDNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->RIDNO->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" value="<?php echo HtmlEncode($billing_voucher_edit->RIDNO->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_billing_voucher_TidNo" for="x_TidNo" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_TidNo" type="text/html"><?php echo $billing_voucher_edit->TidNo->caption() ?><?php echo $billing_voucher_edit->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->TidNo->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_TidNo" type="text/html"><span id="el_billing_voucher_TidNo">
<input type="text" data-table="billing_voucher" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($billing_voucher_edit->TidNo->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->TidNo->EditValue ?>"<?php echo $billing_voucher_edit->TidNo->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_TidNo" type="text/html"><span id="el_billing_voucher_TidNo">
<span<?php echo $billing_voucher_edit->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->TidNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" value="<?php echo HtmlEncode($billing_voucher_edit->TidNo->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_billing_voucher_CId" for="x_CId" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_CId" type="text/html"><?php echo $billing_voucher_edit->CId->caption() ?><?php echo $billing_voucher_edit->CId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->CId->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CId" type="text/html"><span id="el_billing_voucher_CId">
<input type="text" data-table="billing_voucher" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($billing_voucher_edit->CId->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->CId->EditValue ?>"<?php echo $billing_voucher_edit->CId->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_CId" type="text/html"><span id="el_billing_voucher_CId">
<span<?php echo $billing_voucher_edit->CId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->CId->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_CId" name="x_CId" id="x_CId" value="<?php echo HtmlEncode($billing_voucher_edit->CId->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_billing_voucher_PartnerName" for="x_PartnerName" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_PartnerName" type="text/html"><?php echo $billing_voucher_edit->PartnerName->caption() ?><?php echo $billing_voucher_edit->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->PartnerName->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_PartnerName" type="text/html"><span id="el_billing_voucher_PartnerName">
<input type="text" data-table="billing_voucher" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->PartnerName->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->PartnerName->EditValue ?>"<?php echo $billing_voucher_edit->PartnerName->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_PartnerName" type="text/html"><span id="el_billing_voucher_PartnerName">
<span<?php echo $billing_voucher_edit->PartnerName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->PartnerName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" value="<?php echo HtmlEncode($billing_voucher_edit->PartnerName->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label id="elh_billing_voucher_PayerType" for="x_PayerType" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_PayerType" type="text/html"><?php echo $billing_voucher_edit->PayerType->caption() ?><?php echo $billing_voucher_edit->PayerType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->PayerType->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_PayerType" type="text/html"><span id="el_billing_voucher_PayerType">
<input type="text" data-table="billing_voucher" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->PayerType->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->PayerType->EditValue ?>"<?php echo $billing_voucher_edit->PayerType->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_PayerType" type="text/html"><span id="el_billing_voucher_PayerType">
<span<?php echo $billing_voucher_edit->PayerType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->PayerType->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" value="<?php echo HtmlEncode($billing_voucher_edit->PayerType->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->PayerType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh_billing_voucher_Dob" for="x_Dob" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_Dob" type="text/html"><?php echo $billing_voucher_edit->Dob->caption() ?><?php echo $billing_voucher_edit->Dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->Dob->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Dob" type="text/html"><span id="el_billing_voucher_Dob">
<input type="text" data-table="billing_voucher" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->Dob->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->Dob->EditValue ?>"<?php echo $billing_voucher_edit->Dob->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_Dob" type="text/html"><span id="el_billing_voucher_Dob">
<span<?php echo $billing_voucher_edit->Dob->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->Dob->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_Dob" name="x_Dob" id="x_Dob" value="<?php echo HtmlEncode($billing_voucher_edit->Dob->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_billing_voucher_Currency" for="x_Currency" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_Currency" type="text/html"><?php echo $billing_voucher_edit->Currency->caption() ?><?php echo $billing_voucher_edit->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->Currency->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Currency" type="text/html"><span id="el_billing_voucher_Currency">
<input type="text" data-table="billing_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->Currency->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->Currency->EditValue ?>"<?php echo $billing_voucher_edit->Currency->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_Currency" type="text/html"><span id="el_billing_voucher_Currency">
<span<?php echo $billing_voucher_edit->Currency->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->Currency->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" value="<?php echo HtmlEncode($billing_voucher_edit->Currency->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label id="elh_billing_voucher_DiscountRemarks" for="x_DiscountRemarks" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_DiscountRemarks" type="text/html"><?php echo $billing_voucher_edit->DiscountRemarks->caption() ?><?php echo $billing_voucher_edit->DiscountRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->DiscountRemarks->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_DiscountRemarks" type="text/html"><span id="el_billing_voucher_DiscountRemarks">
<input type="text" data-table="billing_voucher" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->DiscountRemarks->EditValue ?>"<?php echo $billing_voucher_edit->DiscountRemarks->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_DiscountRemarks" type="text/html"><span id="el_billing_voucher_DiscountRemarks">
<span<?php echo $billing_voucher_edit->DiscountRemarks->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->DiscountRemarks->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" value="<?php echo HtmlEncode($billing_voucher_edit->DiscountRemarks->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->DiscountRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_billing_voucher_Remarks" for="x_Remarks" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_Remarks" type="text/html"><?php echo $billing_voucher_edit->Remarks->caption() ?><?php echo $billing_voucher_edit->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->Remarks->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_Remarks" type="text/html"><span id="el_billing_voucher_Remarks">
<input type="text" data-table="billing_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->Remarks->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->Remarks->EditValue ?>"<?php echo $billing_voucher_edit->Remarks->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_Remarks" type="text/html"><span id="el_billing_voucher_Remarks">
<span<?php echo $billing_voucher_edit->Remarks->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->Remarks->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" value="<?php echo HtmlEncode($billing_voucher_edit->Remarks->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_billing_voucher_DrDepartment" for="x_DrDepartment" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_DrDepartment" type="text/html"><?php echo $billing_voucher_edit->DrDepartment->caption() ?><?php echo $billing_voucher_edit->DrDepartment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->DrDepartment->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_DrDepartment" type="text/html"><span id="el_billing_voucher_DrDepartment">
<input type="text" data-table="billing_voucher" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->DrDepartment->EditValue ?>"<?php echo $billing_voucher_edit->DrDepartment->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_DrDepartment" type="text/html"><span id="el_billing_voucher_DrDepartment">
<span<?php echo $billing_voucher_edit->DrDepartment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->DrDepartment->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" value="<?php echo HtmlEncode($billing_voucher_edit->DrDepartment->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label id="elh_billing_voucher_RefferedBy" for="x_RefferedBy" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_RefferedBy" type="text/html"><?php echo $billing_voucher_edit->RefferedBy->caption() ?><?php echo $billing_voucher_edit->RefferedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->RefferedBy->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_RefferedBy" type="text/html"><span id="el_billing_voucher_RefferedBy">
<input type="text" data-table="billing_voucher" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->RefferedBy->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->RefferedBy->EditValue ?>"<?php echo $billing_voucher_edit->RefferedBy->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_RefferedBy" type="text/html"><span id="el_billing_voucher_RefferedBy">
<span<?php echo $billing_voucher_edit->RefferedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->RefferedBy->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" value="<?php echo HtmlEncode($billing_voucher_edit->RefferedBy->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->RefferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_billing_voucher_CardNumber" for="x_CardNumber" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_CardNumber" type="text/html"><?php echo $billing_voucher_edit->CardNumber->caption() ?><?php echo $billing_voucher_edit->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->CardNumber->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CardNumber" type="text/html"><span id="el_billing_voucher_CardNumber">
<input type="text" data-table="billing_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->CardNumber->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->CardNumber->EditValue ?>"<?php echo $billing_voucher_edit->CardNumber->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_CardNumber" type="text/html"><span id="el_billing_voucher_CardNumber">
<span<?php echo $billing_voucher_edit->CardNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->CardNumber->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" value="<?php echo HtmlEncode($billing_voucher_edit->CardNumber->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_billing_voucher_BankName" for="x_BankName" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_BankName" type="text/html"><?php echo $billing_voucher_edit->BankName->caption() ?><?php echo $billing_voucher_edit->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->BankName->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_BankName" type="text/html"><span id="el_billing_voucher_BankName">
<input type="text" data-table="billing_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->BankName->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->BankName->EditValue ?>"<?php echo $billing_voucher_edit->BankName->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_BankName" type="text/html"><span id="el_billing_voucher_BankName">
<span<?php echo $billing_voucher_edit->BankName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->BankName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" value="<?php echo HtmlEncode($billing_voucher_edit->BankName->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_billing_voucher_DrID" for="x_DrID" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_DrID" type="text/html"><?php echo $billing_voucher_edit->DrID->caption() ?><?php echo $billing_voucher_edit->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->DrID->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_DrID" type="text/html"><span id="el_billing_voucher_DrID">
<input type="text" data-table="billing_voucher" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($billing_voucher_edit->DrID->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->DrID->EditValue ?>"<?php echo $billing_voucher_edit->DrID->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_DrID" type="text/html"><span id="el_billing_voucher_DrID">
<span<?php echo $billing_voucher_edit->DrID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->DrID->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_DrID" name="x_DrID" id="x_DrID" value="<?php echo HtmlEncode($billing_voucher_edit->DrID->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_billing_voucher_BillStatus" for="x_BillStatus" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_BillStatus" type="text/html"><?php echo $billing_voucher_edit->BillStatus->caption() ?><?php echo $billing_voucher_edit->BillStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->BillStatus->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_BillStatus" type="text/html"><span id="el_billing_voucher_BillStatus">
<input type="text" data-table="billing_voucher" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($billing_voucher_edit->BillStatus->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->BillStatus->EditValue ?>"<?php echo $billing_voucher_edit->BillStatus->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_BillStatus" type="text/html"><span id="el_billing_voucher_BillStatus">
<span<?php echo $billing_voucher_edit->BillStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->BillStatus->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" value="<?php echo HtmlEncode($billing_voucher_edit->BillStatus->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_billing_voucher_ReportHeader" for="x_ReportHeader" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_ReportHeader" type="text/html"><?php echo $billing_voucher_edit->ReportHeader->caption() ?><?php echo $billing_voucher_edit->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->ReportHeader->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_ReportHeader" type="text/html"><span id="el_billing_voucher_ReportHeader">
<input type="text" data-table="billing_voucher" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->ReportHeader->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->ReportHeader->EditValue ?>"<?php echo $billing_voucher_edit->ReportHeader->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_ReportHeader" type="text/html"><span id="el_billing_voucher_ReportHeader">
<span<?php echo $billing_voucher_edit->ReportHeader->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->ReportHeader->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader" value="<?php echo HtmlEncode($billing_voucher_edit->ReportHeader->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
	<div id="r_AdjustmentAdvance" class="form-group row">
		<label id="elh_billing_voucher_AdjustmentAdvance" for="x_AdjustmentAdvance" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_AdjustmentAdvance" type="text/html"><?php echo $billing_voucher_edit->AdjustmentAdvance->caption() ?><?php echo $billing_voucher_edit->AdjustmentAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->AdjustmentAdvance->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_AdjustmentAdvance" type="text/html"><span id="el_billing_voucher_AdjustmentAdvance">
<input type="text" data-table="billing_voucher" data-field="x_AdjustmentAdvance" name="x_AdjustmentAdvance" id="x_AdjustmentAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->AdjustmentAdvance->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->AdjustmentAdvance->EditValue ?>"<?php echo $billing_voucher_edit->AdjustmentAdvance->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_AdjustmentAdvance" type="text/html"><span id="el_billing_voucher_AdjustmentAdvance">
<span<?php echo $billing_voucher_edit->AdjustmentAdvance->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->AdjustmentAdvance->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_AdjustmentAdvance" name="x_AdjustmentAdvance" id="x_AdjustmentAdvance" value="<?php echo HtmlEncode($billing_voucher_edit->AdjustmentAdvance->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->AdjustmentAdvance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->billing_vouchercol->Visible) { // billing_vouchercol ?>
	<div id="r_billing_vouchercol" class="form-group row">
		<label id="elh_billing_voucher_billing_vouchercol" for="x_billing_vouchercol" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_billing_vouchercol" type="text/html"><?php echo $billing_voucher_edit->billing_vouchercol->caption() ?><?php echo $billing_voucher_edit->billing_vouchercol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->billing_vouchercol->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_billing_vouchercol" type="text/html"><span id="el_billing_voucher_billing_vouchercol">
<input type="text" data-table="billing_voucher" data-field="x_billing_vouchercol" name="x_billing_vouchercol" id="x_billing_vouchercol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->billing_vouchercol->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->billing_vouchercol->EditValue ?>"<?php echo $billing_voucher_edit->billing_vouchercol->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_billing_vouchercol" type="text/html"><span id="el_billing_voucher_billing_vouchercol">
<span<?php echo $billing_voucher_edit->billing_vouchercol->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->billing_vouchercol->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_billing_vouchercol" name="x_billing_vouchercol" id="x_billing_vouchercol" value="<?php echo HtmlEncode($billing_voucher_edit->billing_vouchercol->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->billing_vouchercol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->BillType->Visible) { // BillType ?>
	<div id="r_BillType" class="form-group row">
		<label id="elh_billing_voucher_BillType" for="x_BillType" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_BillType" type="text/html"><?php echo $billing_voucher_edit->BillType->caption() ?><?php echo $billing_voucher_edit->BillType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->BillType->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_BillType" type="text/html"><span id="el_billing_voucher_BillType">
<input type="text" data-table="billing_voucher" data-field="x_BillType" name="x_BillType" id="x_BillType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->BillType->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->BillType->EditValue ?>"<?php echo $billing_voucher_edit->BillType->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_BillType" type="text/html"><span id="el_billing_voucher_BillType">
<span<?php echo $billing_voucher_edit->BillType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->BillType->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_BillType" name="x_BillType" id="x_BillType" value="<?php echo HtmlEncode($billing_voucher_edit->BillType->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->BillType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->ProcedureName->Visible) { // ProcedureName ?>
	<div id="r_ProcedureName" class="form-group row">
		<label id="elh_billing_voucher_ProcedureName" for="x_ProcedureName" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_ProcedureName" type="text/html"><?php echo $billing_voucher_edit->ProcedureName->caption() ?><?php echo $billing_voucher_edit->ProcedureName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->ProcedureName->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_ProcedureName" type="text/html"><span id="el_billing_voucher_ProcedureName">
<input type="text" data-table="billing_voucher" data-field="x_ProcedureName" name="x_ProcedureName" id="x_ProcedureName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->ProcedureName->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->ProcedureName->EditValue ?>"<?php echo $billing_voucher_edit->ProcedureName->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_ProcedureName" type="text/html"><span id="el_billing_voucher_ProcedureName">
<span<?php echo $billing_voucher_edit->ProcedureName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->ProcedureName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_ProcedureName" name="x_ProcedureName" id="x_ProcedureName" value="<?php echo HtmlEncode($billing_voucher_edit->ProcedureName->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->ProcedureName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->ProcedureAmount->Visible) { // ProcedureAmount ?>
	<div id="r_ProcedureAmount" class="form-group row">
		<label id="elh_billing_voucher_ProcedureAmount" for="x_ProcedureAmount" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_ProcedureAmount" type="text/html"><?php echo $billing_voucher_edit->ProcedureAmount->caption() ?><?php echo $billing_voucher_edit->ProcedureAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->ProcedureAmount->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_ProcedureAmount" type="text/html"><span id="el_billing_voucher_ProcedureAmount">
<input type="text" data-table="billing_voucher" data-field="x_ProcedureAmount" name="x_ProcedureAmount" id="x_ProcedureAmount" size="30" placeholder="<?php echo HtmlEncode($billing_voucher_edit->ProcedureAmount->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->ProcedureAmount->EditValue ?>"<?php echo $billing_voucher_edit->ProcedureAmount->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_ProcedureAmount" type="text/html"><span id="el_billing_voucher_ProcedureAmount">
<span<?php echo $billing_voucher_edit->ProcedureAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->ProcedureAmount->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_ProcedureAmount" name="x_ProcedureAmount" id="x_ProcedureAmount" value="<?php echo HtmlEncode($billing_voucher_edit->ProcedureAmount->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->ProcedureAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->IncludePackage->Visible) { // IncludePackage ?>
	<div id="r_IncludePackage" class="form-group row">
		<label id="elh_billing_voucher_IncludePackage" for="x_IncludePackage" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_IncludePackage" type="text/html"><?php echo $billing_voucher_edit->IncludePackage->caption() ?><?php echo $billing_voucher_edit->IncludePackage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->IncludePackage->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_IncludePackage" type="text/html"><span id="el_billing_voucher_IncludePackage">
<input type="text" data-table="billing_voucher" data-field="x_IncludePackage" name="x_IncludePackage" id="x_IncludePackage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->IncludePackage->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->IncludePackage->EditValue ?>"<?php echo $billing_voucher_edit->IncludePackage->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_IncludePackage" type="text/html"><span id="el_billing_voucher_IncludePackage">
<span<?php echo $billing_voucher_edit->IncludePackage->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->IncludePackage->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_IncludePackage" name="x_IncludePackage" id="x_IncludePackage" value="<?php echo HtmlEncode($billing_voucher_edit->IncludePackage->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->IncludePackage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->CancelBill->Visible) { // CancelBill ?>
	<div id="r_CancelBill" class="form-group row">
		<label id="elh_billing_voucher_CancelBill" for="x_CancelBill" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_CancelBill" type="text/html"><?php echo $billing_voucher_edit->CancelBill->caption() ?><?php echo $billing_voucher_edit->CancelBill->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->CancelBill->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CancelBill" type="text/html"><span id="el_billing_voucher_CancelBill">
<input type="text" data-table="billing_voucher" data-field="x_CancelBill" name="x_CancelBill" id="x_CancelBill" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->CancelBill->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->CancelBill->EditValue ?>"<?php echo $billing_voucher_edit->CancelBill->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_CancelBill" type="text/html"><span id="el_billing_voucher_CancelBill">
<span<?php echo $billing_voucher_edit->CancelBill->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->CancelBill->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelBill" name="x_CancelBill" id="x_CancelBill" value="<?php echo HtmlEncode($billing_voucher_edit->CancelBill->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->CancelBill->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->CancelReason->Visible) { // CancelReason ?>
	<div id="r_CancelReason" class="form-group row">
		<label id="elh_billing_voucher_CancelReason" for="x_CancelReason" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_CancelReason" type="text/html"><?php echo $billing_voucher_edit->CancelReason->caption() ?><?php echo $billing_voucher_edit->CancelReason->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->CancelReason->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CancelReason" type="text/html"><span id="el_billing_voucher_CancelReason">
<input type="text" data-table="billing_voucher" data-field="x_CancelReason" name="x_CancelReason" id="x_CancelReason" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->CancelReason->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->CancelReason->EditValue ?>"<?php echo $billing_voucher_edit->CancelReason->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_CancelReason" type="text/html"><span id="el_billing_voucher_CancelReason">
<span<?php echo $billing_voucher_edit->CancelReason->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->CancelReason->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelReason" name="x_CancelReason" id="x_CancelReason" value="<?php echo HtmlEncode($billing_voucher_edit->CancelReason->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->CancelReason->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
	<div id="r_CancelModeOfPayment" class="form-group row">
		<label id="elh_billing_voucher_CancelModeOfPayment" for="x_CancelModeOfPayment" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_CancelModeOfPayment" type="text/html"><?php echo $billing_voucher_edit->CancelModeOfPayment->caption() ?><?php echo $billing_voucher_edit->CancelModeOfPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->CancelModeOfPayment->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CancelModeOfPayment" type="text/html"><span id="el_billing_voucher_CancelModeOfPayment">
<input type="text" data-table="billing_voucher" data-field="x_CancelModeOfPayment" name="x_CancelModeOfPayment" id="x_CancelModeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->CancelModeOfPayment->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->CancelModeOfPayment->EditValue ?>"<?php echo $billing_voucher_edit->CancelModeOfPayment->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_CancelModeOfPayment" type="text/html"><span id="el_billing_voucher_CancelModeOfPayment">
<span<?php echo $billing_voucher_edit->CancelModeOfPayment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->CancelModeOfPayment->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelModeOfPayment" name="x_CancelModeOfPayment" id="x_CancelModeOfPayment" value="<?php echo HtmlEncode($billing_voucher_edit->CancelModeOfPayment->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->CancelModeOfPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->CancelAmount->Visible) { // CancelAmount ?>
	<div id="r_CancelAmount" class="form-group row">
		<label id="elh_billing_voucher_CancelAmount" for="x_CancelAmount" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_CancelAmount" type="text/html"><?php echo $billing_voucher_edit->CancelAmount->caption() ?><?php echo $billing_voucher_edit->CancelAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->CancelAmount->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CancelAmount" type="text/html"><span id="el_billing_voucher_CancelAmount">
<input type="text" data-table="billing_voucher" data-field="x_CancelAmount" name="x_CancelAmount" id="x_CancelAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->CancelAmount->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->CancelAmount->EditValue ?>"<?php echo $billing_voucher_edit->CancelAmount->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_CancelAmount" type="text/html"><span id="el_billing_voucher_CancelAmount">
<span<?php echo $billing_voucher_edit->CancelAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->CancelAmount->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelAmount" name="x_CancelAmount" id="x_CancelAmount" value="<?php echo HtmlEncode($billing_voucher_edit->CancelAmount->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->CancelAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->CancelBankName->Visible) { // CancelBankName ?>
	<div id="r_CancelBankName" class="form-group row">
		<label id="elh_billing_voucher_CancelBankName" for="x_CancelBankName" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_CancelBankName" type="text/html"><?php echo $billing_voucher_edit->CancelBankName->caption() ?><?php echo $billing_voucher_edit->CancelBankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->CancelBankName->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CancelBankName" type="text/html"><span id="el_billing_voucher_CancelBankName">
<input type="text" data-table="billing_voucher" data-field="x_CancelBankName" name="x_CancelBankName" id="x_CancelBankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->CancelBankName->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->CancelBankName->EditValue ?>"<?php echo $billing_voucher_edit->CancelBankName->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_CancelBankName" type="text/html"><span id="el_billing_voucher_CancelBankName">
<span<?php echo $billing_voucher_edit->CancelBankName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->CancelBankName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelBankName" name="x_CancelBankName" id="x_CancelBankName" value="<?php echo HtmlEncode($billing_voucher_edit->CancelBankName->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->CancelBankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
	<div id="r_CancelTransactionNumber" class="form-group row">
		<label id="elh_billing_voucher_CancelTransactionNumber" for="x_CancelTransactionNumber" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_CancelTransactionNumber" type="text/html"><?php echo $billing_voucher_edit->CancelTransactionNumber->caption() ?><?php echo $billing_voucher_edit->CancelTransactionNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->CancelTransactionNumber->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_CancelTransactionNumber" type="text/html"><span id="el_billing_voucher_CancelTransactionNumber">
<input type="text" data-table="billing_voucher" data-field="x_CancelTransactionNumber" name="x_CancelTransactionNumber" id="x_CancelTransactionNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->CancelTransactionNumber->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->CancelTransactionNumber->EditValue ?>"<?php echo $billing_voucher_edit->CancelTransactionNumber->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_CancelTransactionNumber" type="text/html"><span id="el_billing_voucher_CancelTransactionNumber">
<span<?php echo $billing_voucher_edit->CancelTransactionNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->CancelTransactionNumber->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelTransactionNumber" name="x_CancelTransactionNumber" id="x_CancelTransactionNumber" value="<?php echo HtmlEncode($billing_voucher_edit->CancelTransactionNumber->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->CancelTransactionNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->LabTest->Visible) { // LabTest ?>
	<div id="r_LabTest" class="form-group row">
		<label id="elh_billing_voucher_LabTest" for="x_LabTest" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_LabTest" type="text/html"><?php echo $billing_voucher_edit->LabTest->caption() ?><?php echo $billing_voucher_edit->LabTest->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->LabTest->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_LabTest" type="text/html"><span id="el_billing_voucher_LabTest">
<input type="text" data-table="billing_voucher" data-field="x_LabTest" name="x_LabTest" id="x_LabTest" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->LabTest->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->LabTest->EditValue ?>"<?php echo $billing_voucher_edit->LabTest->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_LabTest" type="text/html"><span id="el_billing_voucher_LabTest">
<span<?php echo $billing_voucher_edit->LabTest->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->LabTest->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_LabTest" name="x_LabTest" id="x_LabTest" value="<?php echo HtmlEncode($billing_voucher_edit->LabTest->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->LabTest->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->sid->Visible) { // sid ?>
	<div id="r_sid" class="form-group row">
		<label id="elh_billing_voucher_sid" for="x_sid" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_sid" type="text/html"><?php echo $billing_voucher_edit->sid->caption() ?><?php echo $billing_voucher_edit->sid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->sid->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_sid" type="text/html"><span id="el_billing_voucher_sid">
<input type="text" data-table="billing_voucher" data-field="x_sid" name="x_sid" id="x_sid" size="30" placeholder="<?php echo HtmlEncode($billing_voucher_edit->sid->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->sid->EditValue ?>"<?php echo $billing_voucher_edit->sid->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_sid" type="text/html"><span id="el_billing_voucher_sid">
<span<?php echo $billing_voucher_edit->sid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->sid->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_sid" name="x_sid" id="x_sid" value="<?php echo HtmlEncode($billing_voucher_edit->sid->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->sid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->SidNo->Visible) { // SidNo ?>
	<div id="r_SidNo" class="form-group row">
		<label id="elh_billing_voucher_SidNo" for="x_SidNo" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_SidNo" type="text/html"><?php echo $billing_voucher_edit->SidNo->caption() ?><?php echo $billing_voucher_edit->SidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->SidNo->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_SidNo" type="text/html"><span id="el_billing_voucher_SidNo">
<input type="text" data-table="billing_voucher" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->SidNo->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->SidNo->EditValue ?>"<?php echo $billing_voucher_edit->SidNo->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_SidNo" type="text/html"><span id="el_billing_voucher_SidNo">
<span<?php echo $billing_voucher_edit->SidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->SidNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" value="<?php echo HtmlEncode($billing_voucher_edit->SidNo->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->SidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->LabTestReleased->Visible) { // LabTestReleased ?>
	<div id="r_LabTestReleased" class="form-group row">
		<label id="elh_billing_voucher_LabTestReleased" for="x_LabTestReleased" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_LabTestReleased" type="text/html"><?php echo $billing_voucher_edit->LabTestReleased->caption() ?><?php echo $billing_voucher_edit->LabTestReleased->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->LabTestReleased->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_LabTestReleased" type="text/html"><span id="el_billing_voucher_LabTestReleased">
<input type="text" data-table="billing_voucher" data-field="x_LabTestReleased" name="x_LabTestReleased" id="x_LabTestReleased" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->LabTestReleased->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->LabTestReleased->EditValue ?>"<?php echo $billing_voucher_edit->LabTestReleased->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_LabTestReleased" type="text/html"><span id="el_billing_voucher_LabTestReleased">
<span<?php echo $billing_voucher_edit->LabTestReleased->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->LabTestReleased->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_LabTestReleased" name="x_LabTestReleased" id="x_LabTestReleased" value="<?php echo HtmlEncode($billing_voucher_edit->LabTestReleased->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->LabTestReleased->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_voucher_edit->GoogleReviewID->Visible) { // GoogleReviewID ?>
	<div id="r_GoogleReviewID" class="form-group row">
		<label id="elh_billing_voucher_GoogleReviewID" for="x_GoogleReviewID" class="<?php echo $billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_billing_voucher_GoogleReviewID" type="text/html"><?php echo $billing_voucher_edit->GoogleReviewID->caption() ?><?php echo $billing_voucher_edit->GoogleReviewID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_voucher_edit->RightColumnClass ?>"><div <?php echo $billing_voucher_edit->GoogleReviewID->cellAttributes() ?>>
<?php if (!$billing_voucher->isConfirm()) { ?>
<script id="tpx_billing_voucher_GoogleReviewID" type="text/html"><span id="el_billing_voucher_GoogleReviewID">
<input type="text" data-table="billing_voucher" data-field="x_GoogleReviewID" name="x_GoogleReviewID" id="x_GoogleReviewID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_edit->GoogleReviewID->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_edit->GoogleReviewID->EditValue ?>"<?php echo $billing_voucher_edit->GoogleReviewID->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_voucher_GoogleReviewID" type="text/html"><span id="el_billing_voucher_GoogleReviewID">
<span<?php echo $billing_voucher_edit->GoogleReviewID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_voucher_edit->GoogleReviewID->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_voucher" data-field="x_GoogleReviewID" name="x_GoogleReviewID" id="x_GoogleReviewID" value="<?php echo HtmlEncode($billing_voucher_edit->GoogleReviewID->FormValue) ?>">
<?php } ?>
<?php echo $billing_voucher_edit->GoogleReviewID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_billing_voucheredit" class="ew-custom-template"></div>
<script id="tpm_billing_voucheredit" type="text/html">
<div id="ct_billing_voucher_edit"><style>
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
		<h3 class="card-title">{{include tmpl="#tpc_billing_voucher_PatId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_PatId")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_billing_voucher_RIDNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_RIDNO")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_billing_voucher_CId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_CId")/}}</h3>
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
		<td>{{include tmpl="#tpc_billing_voucher_PatientId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_PatientId")/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_PatientName")/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_Mobile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_Mobile")/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_billing_voucher_Dob"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_Dob")/}}</td>
		<td>{{include tmpl="#tpc_billing_voucher_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_Age")/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_Gender")/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_billing_voucher_PartnerName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_PartnerName")/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_PayerType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_PayerType")/}}</td>
			<td></td>
		</tr>
		 <tr>
			<td>{{include tmpl="#tpc_billing_voucher_Doctor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_Doctor")/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_DrDepartment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_DrDepartment")/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_RefferedBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_RefferedBy")/}}</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div id="LoadGetOPAdvance"> </div>
{{include tmpl="#tpc_billing_voucher_ReportHeader"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_ReportHeader")/}}
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
			<td>{{include tmpl="#tpc_billing_voucher_ModeofPayment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_ModeofPayment")/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_Amount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_Amount")/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_AnyDues"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_AnyDues")/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_billing_voucher_DiscountRemarks"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_DiscountRemarks")/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_Remarks"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_Remarks")/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_AdjustmentAdvance"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_AdjustmentAdvance")/}}</td>
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
			<td>{{include tmpl="#tpc_billing_voucher_CardNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_CardNumber")/}}</td>
			<td>{{include tmpl="#tpc_billing_voucher_BankName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_voucher_BankName")/}}</td>
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
	if (in_array("patient_services", explode(",", $billing_voucher->getCurrentDetailTable())) && $patient_services->DetailEdit) {
?>
<?php if ($billing_voucher->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_servicesgrid.php" ?>
<?php } ?>
<?php if (!$billing_voucher_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $billing_voucher_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<?php if (!$billing_voucher->isConfirm()) { // Confirm page ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" onclick="this.form.action.value='confirm';"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $billing_voucher_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("ConfirmBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="submit" onclick="this.form.action.value='cancel';"><?php echo $Language->phrase("CancelBtn") ?></button>
<?php } ?>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($billing_voucher->Rows) ?> };
	ew.applyTemplate("tpd_billing_voucheredit", "tpm_billing_voucheredit", "billing_voucheredit", "<?php echo $billing_voucher->CustomExport ?>", ew.templateData.rows[0]);
	$("script.billing_voucheredit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$billing_voucher_edit->showPageFooter();
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
$billing_voucher_edit->terminate();
?>