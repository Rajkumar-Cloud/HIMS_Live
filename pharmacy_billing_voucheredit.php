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
$pharmacy_billing_voucher_edit = new pharmacy_billing_voucher_edit();

// Run the page
$pharmacy_billing_voucher_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_voucher_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpharmacy_billing_voucheredit = currentForm = new ew.Form("fpharmacy_billing_voucheredit", "edit");

// Validate form
fpharmacy_billing_voucheredit.validate = function() {
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
		<?php if ($pharmacy_billing_voucher_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->id->caption(), $pharmacy_billing_voucher->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->BillNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_BillNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->BillNumber->caption(), $pharmacy_billing_voucher->BillNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->voucher_type->Required) { ?>
			elm = this.getElements("x" + infix + "_voucher_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->voucher_type->caption(), $pharmacy_billing_voucher->voucher_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Reception->caption(), $pharmacy_billing_voucher->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->PatientId->caption(), $pharmacy_billing_voucher->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->PatientName->caption(), $pharmacy_billing_voucher->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Mobile->caption(), $pharmacy_billing_voucher->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Age->caption(), $pharmacy_billing_voucher->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->mrnno->caption(), $pharmacy_billing_voucher->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->IP_OP->Required) { ?>
			elm = this.getElements("x" + infix + "_IP_OP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->IP_OP->caption(), $pharmacy_billing_voucher->IP_OP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->Doctor->Required) { ?>
			elm = this.getElements("x" + infix + "_Doctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Doctor->caption(), $pharmacy_billing_voucher->Doctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Gender->caption(), $pharmacy_billing_voucher->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Details->caption(), $pharmacy_billing_voucher->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->ModeofPayment->caption(), $pharmacy_billing_voucher->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Amount->caption(), $pharmacy_billing_voucher->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher->Amount->errorMessage()) ?>");
		<?php if ($pharmacy_billing_voucher_edit->AnyDues->Required) { ?>
			elm = this.getElements("x" + infix + "_AnyDues");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->AnyDues->caption(), $pharmacy_billing_voucher->AnyDues->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->modifiedby->caption(), $pharmacy_billing_voucher->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->modifieddatetime->caption(), $pharmacy_billing_voucher->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->RealizationAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->RealizationAmount->caption(), $pharmacy_billing_voucher->RealizationAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher->RealizationAmount->errorMessage()) ?>");
		<?php if ($pharmacy_billing_voucher_edit->RealizationStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->RealizationStatus->caption(), $pharmacy_billing_voucher->RealizationStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->RealizationRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->RealizationRemarks->caption(), $pharmacy_billing_voucher->RealizationRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->RealizationBatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationBatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->RealizationBatchNo->caption(), $pharmacy_billing_voucher->RealizationBatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->RealizationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->RealizationDate->caption(), $pharmacy_billing_voucher->RealizationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->HospID->caption(), $pharmacy_billing_voucher->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->RIDNO->caption(), $pharmacy_billing_voucher->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->TidNo->caption(), $pharmacy_billing_voucher->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher->TidNo->errorMessage()) ?>");
		<?php if ($pharmacy_billing_voucher_edit->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->CId->caption(), $pharmacy_billing_voucher->CId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->PartnerName->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->PartnerName->caption(), $pharmacy_billing_voucher->PartnerName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->PayerType->Required) { ?>
			elm = this.getElements("x" + infix + "_PayerType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->PayerType->caption(), $pharmacy_billing_voucher->PayerType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->profilePic->caption(), $pharmacy_billing_voucher->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->Dob->Required) { ?>
			elm = this.getElements("x" + infix + "_Dob");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Dob->caption(), $pharmacy_billing_voucher->Dob->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->Currency->Required) { ?>
			elm = this.getElements("x" + infix + "_Currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Currency->caption(), $pharmacy_billing_voucher->Currency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->DiscountRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->DiscountRemarks->caption(), $pharmacy_billing_voucher->DiscountRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Remarks->caption(), $pharmacy_billing_voucher->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->PatId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->PatId->caption(), $pharmacy_billing_voucher->PatId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->DrDepartment->Required) { ?>
			elm = this.getElements("x" + infix + "_DrDepartment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->DrDepartment->caption(), $pharmacy_billing_voucher->DrDepartment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->RefferedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_RefferedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->RefferedBy->caption(), $pharmacy_billing_voucher->RefferedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->CardNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CardNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->CardNumber->caption(), $pharmacy_billing_voucher->CardNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->BankName->Required) { ?>
			elm = this.getElements("x" + infix + "_BankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->BankName->caption(), $pharmacy_billing_voucher->BankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->DrID->caption(), $pharmacy_billing_voucher->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->BillStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->BillStatus->caption(), $pharmacy_billing_voucher->BillStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher->BillStatus->errorMessage()) ?>");
		<?php if ($pharmacy_billing_voucher_edit->ReportHeader->Required) { ?>
			elm = this.getElements("x" + infix + "_ReportHeader[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->ReportHeader->caption(), $pharmacy_billing_voucher->ReportHeader->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->PharID->Required) { ?>
			elm = this.getElements("x" + infix + "_PharID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->PharID->caption(), $pharmacy_billing_voucher->PharID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->UserName->Required) { ?>
			elm = this.getElements("x" + infix + "_UserName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->UserName->caption(), $pharmacy_billing_voucher->UserName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->CardType->Required) { ?>
			elm = this.getElements("x" + infix + "_CardType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->CardType->caption(), $pharmacy_billing_voucher->CardType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->DiscountAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->DiscountAmount->caption(), $pharmacy_billing_voucher->DiscountAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->ApprovalNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_ApprovalNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->ApprovalNumber->caption(), $pharmacy_billing_voucher->ApprovalNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->Cash->Required) { ?>
			elm = this.getElements("x" + infix + "_Cash");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Cash->caption(), $pharmacy_billing_voucher->Cash->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Cash");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher->Cash->errorMessage()) ?>");
		<?php if ($pharmacy_billing_voucher_edit->Card->Required) { ?>
			elm = this.getElements("x" + infix + "_Card");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Card->caption(), $pharmacy_billing_voucher->Card->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Card");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher->Card->errorMessage()) ?>");
		<?php if ($pharmacy_billing_voucher_edit->BillType->Required) { ?>
			elm = this.getElements("x" + infix + "_BillType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->BillType->caption(), $pharmacy_billing_voucher->BillType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->PartialSave->Required) { ?>
			elm = this.getElements("x" + infix + "_PartialSave[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->PartialSave->caption(), $pharmacy_billing_voucher->PartialSave->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_edit->PatientGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->PatientGST->caption(), $pharmacy_billing_voucher->PatientGST->RequiredErrorMessage)) ?>");
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
fpharmacy_billing_voucheredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_billing_voucheredit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_billing_voucheredit.lists["x_Reception"] = <?php echo $pharmacy_billing_voucher_edit->Reception->Lookup->toClientList() ?>;
fpharmacy_billing_voucheredit.lists["x_Reception"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->Reception->lookupOptions()) ?>;
fpharmacy_billing_voucheredit.lists["x_ModeofPayment"] = <?php echo $pharmacy_billing_voucher_edit->ModeofPayment->Lookup->toClientList() ?>;
fpharmacy_billing_voucheredit.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->ModeofPayment->lookupOptions()) ?>;
fpharmacy_billing_voucheredit.lists["x_RIDNO"] = <?php echo $pharmacy_billing_voucher_edit->RIDNO->Lookup->toClientList() ?>;
fpharmacy_billing_voucheredit.lists["x_RIDNO"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->RIDNO->lookupOptions()) ?>;
fpharmacy_billing_voucheredit.lists["x_CId"] = <?php echo $pharmacy_billing_voucher_edit->CId->Lookup->toClientList() ?>;
fpharmacy_billing_voucheredit.lists["x_CId"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->CId->lookupOptions()) ?>;
fpharmacy_billing_voucheredit.lists["x_PatId"] = <?php echo $pharmacy_billing_voucher_edit->PatId->Lookup->toClientList() ?>;
fpharmacy_billing_voucheredit.lists["x_PatId"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->PatId->lookupOptions()) ?>;
fpharmacy_billing_voucheredit.lists["x_RefferedBy"] = <?php echo $pharmacy_billing_voucher_edit->RefferedBy->Lookup->toClientList() ?>;
fpharmacy_billing_voucheredit.lists["x_RefferedBy"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->RefferedBy->lookupOptions()) ?>;
fpharmacy_billing_voucheredit.lists["x_DrID"] = <?php echo $pharmacy_billing_voucher_edit->DrID->Lookup->toClientList() ?>;
fpharmacy_billing_voucheredit.lists["x_DrID"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->DrID->lookupOptions()) ?>;
fpharmacy_billing_voucheredit.lists["x_ReportHeader[]"] = <?php echo $pharmacy_billing_voucher_edit->ReportHeader->Lookup->toClientList() ?>;
fpharmacy_billing_voucheredit.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->ReportHeader->options(FALSE, TRUE)) ?>;
fpharmacy_billing_voucheredit.lists["x_CardType"] = <?php echo $pharmacy_billing_voucher_edit->CardType->Lookup->toClientList() ?>;
fpharmacy_billing_voucheredit.lists["x_CardType"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->CardType->options(FALSE, TRUE)) ?>;
fpharmacy_billing_voucheredit.lists["x_BillType"] = <?php echo $pharmacy_billing_voucher_edit->BillType->Lookup->toClientList() ?>;
fpharmacy_billing_voucheredit.lists["x_BillType"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->BillType->options(FALSE, TRUE)) ?>;
fpharmacy_billing_voucheredit.lists["x_PartialSave[]"] = <?php echo $pharmacy_billing_voucher_edit->PartialSave->Lookup->toClientList() ?>;
fpharmacy_billing_voucheredit.lists["x_PartialSave[]"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->PartialSave->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_billing_voucher_edit->showPageHeader(); ?>
<?php
$pharmacy_billing_voucher_edit->showMessage();
?>
<form name="fpharmacy_billing_voucheredit" id="fpharmacy_billing_voucheredit" class="<?php echo $pharmacy_billing_voucher_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_billing_voucher_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_billing_voucher_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_voucher">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_billing_voucher_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($pharmacy_billing_voucher->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_id" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_id" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->id->caption() ?><?php echo ($pharmacy_billing_voucher->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->id->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_id" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_id">
<span<?php echo $pharmacy_billing_voucher->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_billing_voucher->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_billing_voucher->id->CurrentValue) ?>">
<?php echo $pharmacy_billing_voucher->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_BillNumber" for="x_BillNumber" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_BillNumber" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->BillNumber->caption() ?><?php echo ($pharmacy_billing_voucher->BillNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->BillNumber->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_BillNumber" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_BillNumber">
<span<?php echo $pharmacy_billing_voucher->BillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_billing_voucher->BillNumber->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" value="<?php echo HtmlEncode($pharmacy_billing_voucher->BillNumber->CurrentValue) ?>">
<?php echo $pharmacy_billing_voucher->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_voucher_type" for="x_voucher_type" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_voucher_type" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->voucher_type->caption() ?><?php echo ($pharmacy_billing_voucher->voucher_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->voucher_type->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_voucher_type" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_voucher_type">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->voucher_type->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->voucher_type->EditValue ?>"<?php echo $pharmacy_billing_voucher->voucher_type->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Reception" for="x_Reception" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Reception" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->Reception->caption() ?><?php echo ($pharmacy_billing_voucher->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->Reception->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Reception" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_Reception">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?php echo strval($pharmacy_billing_voucher->Reception->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_voucher->Reception->ViewValue) : $pharmacy_billing_voucher->Reception->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_voucher->Reception->ReadOnly || $pharmacy_billing_voucher->Reception->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_voucher->Reception->Lookup->getParamTag("p_x_Reception") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?php echo $pharmacy_billing_voucher->Reception->CurrentValue ?>"<?php echo $pharmacy_billing_voucher->Reception->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_PatientId" for="x_PatientId" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_PatientId" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->PatientId->caption() ?><?php echo ($pharmacy_billing_voucher->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->PatientId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_PatientId" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_PatientId">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PatientId->EditValue ?>"<?php echo $pharmacy_billing_voucher->PatientId->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_PatientName" for="x_PatientName" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_PatientName" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->PatientName->caption() ?><?php echo ($pharmacy_billing_voucher->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->PatientName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_PatientName" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_PatientName">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PatientName->EditValue ?>"<?php echo $pharmacy_billing_voucher->PatientName->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Mobile" for="x_Mobile" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Mobile" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->Mobile->caption() ?><?php echo ($pharmacy_billing_voucher->Mobile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->Mobile->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Mobile" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_Mobile">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Mobile->EditValue ?>"<?php echo $pharmacy_billing_voucher->Mobile->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Age" for="x_Age" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Age" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->Age->caption() ?><?php echo ($pharmacy_billing_voucher->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->Age->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Age" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_Age">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Age->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Age->EditValue ?>"<?php echo $pharmacy_billing_voucher->Age->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_mrnno" for="x_mrnno" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_mrnno" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->mrnno->caption() ?><?php echo ($pharmacy_billing_voucher->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->mrnno->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_mrnno" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_mrnno">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->mrnno->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->mrnno->EditValue ?>"<?php echo $pharmacy_billing_voucher->mrnno->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_IP_OP" for="x_IP_OP" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_IP_OP" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->IP_OP->caption() ?><?php echo ($pharmacy_billing_voucher->IP_OP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->IP_OP->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_IP_OP" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_IP_OP">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->IP_OP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->IP_OP->EditValue ?>"<?php echo $pharmacy_billing_voucher->IP_OP->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->IP_OP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Doctor" for="x_Doctor" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Doctor" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->Doctor->caption() ?><?php echo ($pharmacy_billing_voucher->Doctor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->Doctor->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Doctor" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_Doctor">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Doctor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Doctor->EditValue ?>"<?php echo $pharmacy_billing_voucher->Doctor->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Gender" for="x_Gender" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Gender" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->Gender->caption() ?><?php echo ($pharmacy_billing_voucher->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->Gender->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Gender" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_Gender">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Gender->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Gender->EditValue ?>"<?php echo $pharmacy_billing_voucher->Gender->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Details" for="x_Details" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Details" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->Details->caption() ?><?php echo ($pharmacy_billing_voucher->Details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->Details->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Details" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_Details">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Details->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Details->EditValue ?>"<?php echo $pharmacy_billing_voucher->Details->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_ModeofPayment" for="x_ModeofPayment" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_ModeofPayment" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->ModeofPayment->caption() ?><?php echo ($pharmacy_billing_voucher->ModeofPayment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->ModeofPayment->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_ModeofPayment" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_billing_voucher->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $pharmacy_billing_voucher->ModeofPayment->editAttributes() ?>>
		<?php echo $pharmacy_billing_voucher->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
	</select>
</div>
<?php echo $pharmacy_billing_voucher->ModeofPayment->Lookup->getParamTag("p_x_ModeofPayment") ?>
</span>
</script>
<?php echo $pharmacy_billing_voucher->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Amount" for="x_Amount" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Amount" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->Amount->caption() ?><?php echo ($pharmacy_billing_voucher->Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->Amount->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Amount" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_Amount">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Amount->EditValue ?>"<?php echo $pharmacy_billing_voucher->Amount->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_AnyDues" for="x_AnyDues" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_AnyDues" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->AnyDues->caption() ?><?php echo ($pharmacy_billing_voucher->AnyDues->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->AnyDues->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_AnyDues" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_AnyDues">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->AnyDues->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->AnyDues->EditValue ?>"<?php echo $pharmacy_billing_voucher->AnyDues->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_RealizationAmount" for="x_RealizationAmount" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_RealizationAmount" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->RealizationAmount->caption() ?><?php echo ($pharmacy_billing_voucher->RealizationAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->RealizationAmount->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_RealizationAmount" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_RealizationAmount">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->RealizationAmount->EditValue ?>"<?php echo $pharmacy_billing_voucher->RealizationAmount->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_RealizationStatus" for="x_RealizationStatus" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_RealizationStatus" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->RealizationStatus->caption() ?><?php echo ($pharmacy_billing_voucher->RealizationStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->RealizationStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_RealizationStatus" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_RealizationStatus">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->RealizationStatus->EditValue ?>"<?php echo $pharmacy_billing_voucher->RealizationStatus->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_RealizationRemarks" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->RealizationRemarks->caption() ?><?php echo ($pharmacy_billing_voucher->RealizationRemarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->RealizationRemarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_RealizationRemarks" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_RealizationRemarks">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->RealizationRemarks->EditValue ?>"<?php echo $pharmacy_billing_voucher->RealizationRemarks->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_RealizationBatchNo" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->RealizationBatchNo->caption() ?><?php echo ($pharmacy_billing_voucher->RealizationBatchNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->RealizationBatchNo->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_RealizationBatchNo" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_RealizationBatchNo">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->RealizationBatchNo->EditValue ?>"<?php echo $pharmacy_billing_voucher->RealizationBatchNo->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_RealizationDate" for="x_RealizationDate" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_RealizationDate" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->RealizationDate->caption() ?><?php echo ($pharmacy_billing_voucher->RealizationDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->RealizationDate->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_RealizationDate" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_RealizationDate">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->RealizationDate->EditValue ?>"<?php echo $pharmacy_billing_voucher->RealizationDate->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_RIDNO" for="x_RIDNO" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_RIDNO" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->RIDNO->caption() ?><?php echo ($pharmacy_billing_voucher->RIDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->RIDNO->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_RIDNO" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_RIDNO">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RIDNO"><?php echo strval($pharmacy_billing_voucher->RIDNO->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_voucher->RIDNO->ViewValue) : $pharmacy_billing_voucher->RIDNO->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher->RIDNO->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_voucher->RIDNO->ReadOnly || $pharmacy_billing_voucher->RIDNO->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_RIDNO',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_voucher->RIDNO->Lookup->getParamTag("p_x_RIDNO") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_RIDNO" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher->RIDNO->displayValueSeparatorAttribute() ?>" name="x_RIDNO" id="x_RIDNO" value="<?php echo $pharmacy_billing_voucher->RIDNO->CurrentValue ?>"<?php echo $pharmacy_billing_voucher->RIDNO->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_TidNo" for="x_TidNo" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_TidNo" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->TidNo->caption() ?><?php echo ($pharmacy_billing_voucher->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->TidNo->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_TidNo" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_TidNo">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->TidNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->TidNo->EditValue ?>"<?php echo $pharmacy_billing_voucher->TidNo->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_CId" for="x_CId" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_CId" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->CId->caption() ?><?php echo ($pharmacy_billing_voucher->CId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->CId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_CId" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_CId">
<?php $pharmacy_billing_voucher->CId->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_voucher->CId->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_CId"><?php echo strval($pharmacy_billing_voucher->CId->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_voucher->CId->ViewValue) : $pharmacy_billing_voucher->CId->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_voucher->CId->ReadOnly || $pharmacy_billing_voucher->CId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_CId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_voucher->CId->Lookup->getParamTag("p_x_CId") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher->CId->displayValueSeparatorAttribute() ?>" name="x_CId" id="x_CId" value="<?php echo $pharmacy_billing_voucher->CId->CurrentValue ?>"<?php echo $pharmacy_billing_voucher->CId->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_PartnerName" for="x_PartnerName" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_PartnerName" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->PartnerName->caption() ?><?php echo ($pharmacy_billing_voucher->PartnerName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->PartnerName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_PartnerName" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_PartnerName">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PartnerName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PartnerName->EditValue ?>"<?php echo $pharmacy_billing_voucher->PartnerName->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_PayerType" for="x_PayerType" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_PayerType" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->PayerType->caption() ?><?php echo ($pharmacy_billing_voucher->PayerType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->PayerType->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_PayerType" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_PayerType">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PayerType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PayerType->EditValue ?>"<?php echo $pharmacy_billing_voucher->PayerType->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->PayerType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_profilePic" for="x_profilePic" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_profilePic" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->profilePic->caption() ?><?php echo ($pharmacy_billing_voucher->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->profilePic->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_profilePic" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_profilePic">
<textarea data-table="pharmacy_billing_voucher" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->profilePic->getPlaceHolder()) ?>"<?php echo $pharmacy_billing_voucher->profilePic->editAttributes() ?>><?php echo $pharmacy_billing_voucher->profilePic->EditValue ?></textarea>
</span>
</script>
<?php echo $pharmacy_billing_voucher->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Dob" for="x_Dob" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Dob" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->Dob->caption() ?><?php echo ($pharmacy_billing_voucher->Dob->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->Dob->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Dob" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_Dob">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Dob->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Dob->EditValue ?>"<?php echo $pharmacy_billing_voucher->Dob->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Currency" for="x_Currency" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Currency" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->Currency->caption() ?><?php echo ($pharmacy_billing_voucher->Currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->Currency->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Currency" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_Currency">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Currency->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Currency->EditValue ?>"<?php echo $pharmacy_billing_voucher->Currency->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_DiscountRemarks" for="x_DiscountRemarks" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_DiscountRemarks" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->DiscountRemarks->caption() ?><?php echo ($pharmacy_billing_voucher->DiscountRemarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->DiscountRemarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_DiscountRemarks" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_DiscountRemarks">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->DiscountRemarks->EditValue ?>"<?php echo $pharmacy_billing_voucher->DiscountRemarks->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->DiscountRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Remarks" for="x_Remarks" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Remarks" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->Remarks->caption() ?><?php echo ($pharmacy_billing_voucher->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->Remarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Remarks" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_Remarks">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Remarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Remarks->EditValue ?>"<?php echo $pharmacy_billing_voucher->Remarks->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_PatId" for="x_PatId" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_PatId" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->PatId->caption() ?><?php echo ($pharmacy_billing_voucher->PatId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->PatId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_PatId" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_PatId">
<?php $pharmacy_billing_voucher->PatId->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_voucher->PatId->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatId"><?php echo strval($pharmacy_billing_voucher->PatId->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_voucher->PatId->ViewValue) : $pharmacy_billing_voucher->PatId->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher->PatId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_voucher->PatId->ReadOnly || $pharmacy_billing_voucher->PatId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_voucher->PatId->Lookup->getParamTag("p_x_PatId") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher->PatId->displayValueSeparatorAttribute() ?>" name="x_PatId" id="x_PatId" value="<?php echo $pharmacy_billing_voucher->PatId->CurrentValue ?>"<?php echo $pharmacy_billing_voucher->PatId->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_DrDepartment" for="x_DrDepartment" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_DrDepartment" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->DrDepartment->caption() ?><?php echo ($pharmacy_billing_voucher->DrDepartment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->DrDepartment->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_DrDepartment" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_DrDepartment">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->DrDepartment->EditValue ?>"<?php echo $pharmacy_billing_voucher->DrDepartment->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_RefferedBy" for="x_RefferedBy" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_RefferedBy" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->RefferedBy->caption() ?><?php echo ($pharmacy_billing_voucher->RefferedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->RefferedBy->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_RefferedBy" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_RefferedBy">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RefferedBy"><?php echo strval($pharmacy_billing_voucher->RefferedBy->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_voucher->RefferedBy->ViewValue) : $pharmacy_billing_voucher->RefferedBy->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher->RefferedBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_voucher->RefferedBy->ReadOnly || $pharmacy_billing_voucher->RefferedBy->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_RefferedBy',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$pharmacy_billing_voucher->RefferedBy->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_RefferedBy" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $pharmacy_billing_voucher->RefferedBy->caption() ?>" data-title="<?php echo $pharmacy_billing_voucher->RefferedBy->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_RefferedBy',url:'mas_reference_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $pharmacy_billing_voucher->RefferedBy->Lookup->getParamTag("p_x_RefferedBy") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_RefferedBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher->RefferedBy->displayValueSeparatorAttribute() ?>" name="x_RefferedBy" id="x_RefferedBy" value="<?php echo $pharmacy_billing_voucher->RefferedBy->CurrentValue ?>"<?php echo $pharmacy_billing_voucher->RefferedBy->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->RefferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_CardNumber" for="x_CardNumber" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_CardNumber" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->CardNumber->caption() ?><?php echo ($pharmacy_billing_voucher->CardNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->CardNumber->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_CardNumber" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_CardNumber">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->CardNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->CardNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher->CardNumber->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_BankName" for="x_BankName" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_BankName" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->BankName->caption() ?><?php echo ($pharmacy_billing_voucher->BankName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->BankName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_BankName" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_BankName">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->BankName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->BankName->EditValue ?>"<?php echo $pharmacy_billing_voucher->BankName->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_DrID" for="x_DrID" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_DrID" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->DrID->caption() ?><?php echo ($pharmacy_billing_voucher->DrID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->DrID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_DrID" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_DrID">
<?php $pharmacy_billing_voucher->DrID->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_voucher->DrID->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?php echo strval($pharmacy_billing_voucher->DrID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_voucher->DrID->ViewValue) : $pharmacy_billing_voucher->DrID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher->DrID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_voucher->DrID->ReadOnly || $pharmacy_billing_voucher->DrID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_voucher->DrID->Lookup->getParamTag("p_x_DrID") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_DrID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?php echo $pharmacy_billing_voucher->DrID->CurrentValue ?>"<?php echo $pharmacy_billing_voucher->DrID->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_BillStatus" for="x_BillStatus" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_BillStatus" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->BillStatus->caption() ?><?php echo ($pharmacy_billing_voucher->BillStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->BillStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_BillStatus" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_BillStatus">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_voucher->BillStatus->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_ReportHeader" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_ReportHeader" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->ReportHeader->caption() ?><?php echo ($pharmacy_billing_voucher->ReportHeader->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->ReportHeader->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_ReportHeader" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_ReportHeader">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" data-value-separator="<?php echo $pharmacy_billing_voucher->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $pharmacy_billing_voucher->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span>
</script>
<?php echo $pharmacy_billing_voucher->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CardType->Visible) { // CardType ?>
	<div id="r_CardType" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_CardType" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_CardType" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->CardType->caption() ?><?php echo ($pharmacy_billing_voucher->CardType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->CardType->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_CardType" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_CardType">
<div id="tp_x_CardType" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_billing_voucher" data-field="x_CardType" data-value-separator="<?php echo $pharmacy_billing_voucher->CardType->displayValueSeparatorAttribute() ?>" name="x_CardType" id="x_CardType" value="{value}"<?php echo $pharmacy_billing_voucher->CardType->editAttributes() ?>></div>
<div id="dsl_x_CardType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher->CardType->radioButtonListHtml(FALSE, "x_CardType") ?>
</div></div>
</span>
</script>
<?php echo $pharmacy_billing_voucher->CardType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
	<div id="r_DiscountAmount" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_DiscountAmount" for="x_DiscountAmount" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_DiscountAmount" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->DiscountAmount->caption() ?><?php echo ($pharmacy_billing_voucher->DiscountAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->DiscountAmount->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_DiscountAmount" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_DiscountAmount">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_DiscountAmount" name="x_DiscountAmount" id="x_DiscountAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->DiscountAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->DiscountAmount->EditValue ?>"<?php echo $pharmacy_billing_voucher->DiscountAmount->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->DiscountAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ApprovalNumber->Visible) { // ApprovalNumber ?>
	<div id="r_ApprovalNumber" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_ApprovalNumber" for="x_ApprovalNumber" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_ApprovalNumber" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->ApprovalNumber->caption() ?><?php echo ($pharmacy_billing_voucher->ApprovalNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->ApprovalNumber->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_ApprovalNumber" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_ApprovalNumber">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_ApprovalNumber" name="x_ApprovalNumber" id="x_ApprovalNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->ApprovalNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->ApprovalNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher->ApprovalNumber->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->ApprovalNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Cash->Visible) { // Cash ?>
	<div id="r_Cash" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Cash" for="x_Cash" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Cash" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->Cash->caption() ?><?php echo ($pharmacy_billing_voucher->Cash->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->Cash->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Cash" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_Cash">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Cash" name="x_Cash" id="x_Cash" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Cash->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Cash->EditValue ?>"<?php echo $pharmacy_billing_voucher->Cash->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->Cash->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Card->Visible) { // Card ?>
	<div id="r_Card" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Card" for="x_Card" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Card" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->Card->caption() ?><?php echo ($pharmacy_billing_voucher->Card->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->Card->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Card" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_Card">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Card" name="x_Card" id="x_Card" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Card->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Card->EditValue ?>"<?php echo $pharmacy_billing_voucher->Card->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->Card->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillType->Visible) { // BillType ?>
	<div id="r_BillType" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_BillType" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_BillType" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->BillType->caption() ?><?php echo ($pharmacy_billing_voucher->BillType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->BillType->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_BillType" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_BillType">
<div id="tp_x_BillType" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_billing_voucher" data-field="x_BillType" data-value-separator="<?php echo $pharmacy_billing_voucher->BillType->displayValueSeparatorAttribute() ?>" name="x_BillType" id="x_BillType" value="{value}"<?php echo $pharmacy_billing_voucher->BillType->editAttributes() ?>></div>
<div id="dsl_x_BillType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher->BillType->radioButtonListHtml(FALSE, "x_BillType") ?>
</div></div>
</span>
</script>
<?php echo $pharmacy_billing_voucher->BillType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PartialSave->Visible) { // PartialSave ?>
	<div id="r_PartialSave" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_PartialSave" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_PartialSave" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->PartialSave->caption() ?><?php echo ($pharmacy_billing_voucher->PartialSave->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->PartialSave->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_PartialSave" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_PartialSave">
<div id="tp_x_PartialSave" class="ew-template"><input type="checkbox" class="form-check-input" data-table="pharmacy_billing_voucher" data-field="x_PartialSave" data-value-separator="<?php echo $pharmacy_billing_voucher->PartialSave->displayValueSeparatorAttribute() ?>" name="x_PartialSave[]" id="x_PartialSave[]" value="{value}"<?php echo $pharmacy_billing_voucher->PartialSave->editAttributes() ?>></div>
<div id="dsl_x_PartialSave" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher->PartialSave->checkBoxListHtml(FALSE, "x_PartialSave[]") ?>
</div></div>
</span>
</script>
<?php echo $pharmacy_billing_voucher->PartialSave->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientGST->Visible) { // PatientGST ?>
	<div id="r_PatientGST" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_PatientGST" for="x_PatientGST" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_PatientGST" class="pharmacy_billing_voucheredit" type="text/html"><span><?php echo $pharmacy_billing_voucher->PatientGST->caption() ?><?php echo ($pharmacy_billing_voucher->PatientGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_voucher->PatientGST->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_PatientGST" class="pharmacy_billing_voucheredit" type="text/html">
<span id="el_pharmacy_billing_voucher_PatientGST">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientGST" name="x_PatientGST" id="x_PatientGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PatientGST->EditValue ?>"<?php echo $pharmacy_billing_voucher->PatientGST->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_voucher->PatientGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pharmacy_billing_voucheredit" class="ew-custom-template"></div>
<script id="tpm_pharmacy_billing_voucheredit" type="text/html">
<div id="ct_pharmacy_billing_voucher_edit"><style>
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
	{{include tmpl="#tpc_pharmacy_billing_voucher_BillNumber"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_BillNumber"/}}
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_voucher_PatId"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_PatId"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_voucher_RIDNO"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_RIDNO"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_voucher_CId"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_CId"/}}</h3>
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
		<td>{{include tmpl="#tpc_pharmacy_billing_voucher_PatientId"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_PatientId"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_PatientName"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_PatientName"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_Mobile"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_Mobile"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_Dob"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_Dob"/}}</td>
		<td>{{include tmpl="#tpc_pharmacy_billing_voucher_Age"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_Age"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_Gender"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_Gender"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_PartnerName"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_PartnerName"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_PayerType"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_PayerType"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_RefferedBy"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_RefferedBy"/}}</td>
			<td></td>
		</tr>
		 <tr>
		 	<td>{{include tmpl="#tpc_pharmacy_billing_voucher_DrID"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_DrID"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_Doctor"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_Doctor"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_DrDepartment"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_DrDepartment"/}}</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<table class="">
	 <tbody>
		<tr>
			<td>
				{{include tmpl="#tpc_pharmacy_billing_voucher_ReportHeader"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_ReportHeader"/}}
			</td>
			<td>
				{{include tmpl="#tpc_pharmacy_billing_voucher_BillType"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_BillType"/}}
			</td>
			<td>
				{{include tmpl="#tpc_pharmacy_billing_voucher_PatientGST"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_PatientGST"/}}
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
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_ModeofPayment"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_ModeofPayment"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_Amount"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_Amount"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_AnyDues"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_AnyDues"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_DiscountRemarks"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_DiscountRemarks"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_Remarks"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_Remarks"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_DiscountAmount"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_DiscountAmount"/}}</td>
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
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_CardType"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_CardType"/}}</td>
			<td id="viewCash">{{include tmpl="#tpc_pharmacy_billing_voucher_Cash"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_Cash"/}}</td>
			<td id="viewCard">{{include tmpl="#tpc_pharmacy_billing_voucher_Card"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_Card"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_CardNumber"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_CardNumber"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_BankName"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_BankName"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_ApprovalNumber"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_ApprovalNumber"/}}</td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
{{include tmpl="#tpc_pharmacy_billing_voucher_PartialSave"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_voucher_PartialSave"/}}   
</div>
</script>
<?php
	if (in_array("pharmacy_pharled", explode(",", $pharmacy_billing_voucher->getCurrentDetailTable())) && $pharmacy_pharled->DetailEdit) {
?>
<?php if ($pharmacy_billing_voucher->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("pharmacy_pharled", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_pharledgrid.php" ?>
<?php } ?>
<?php if (!$pharmacy_billing_voucher_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_billing_voucher_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_billing_voucher_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($pharmacy_billing_voucher->Rows) ?> };
ew.applyTemplate("tpd_pharmacy_billing_voucheredit", "tpm_pharmacy_billing_voucheredit", "pharmacy_billing_voucheredit", "<?php echo $pharmacy_billing_voucher->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.pharmacy_billing_voucheredit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$pharmacy_billing_voucher_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

 document.getElementById("viewBankName").style.display = "none";
 $("[data-name='PRC']").hide();
 $("[data-name='UR']").hide();
 $("[data-name='Product']").hide();
$("[data-name='baid']").hide();
  $("[data-name='isdate']").hide();
  $("[data-name='PCGST']").hide();
  $("[data-name='PSGST']").hide();
  $("[data-name='PUnit']").hide();
  $("[data-name='PurRate']").hide();
  $("[data-name='PurValue']").hide();
  $("[data-name='SCGST']").hide();
  $("[data-name='SSGST']").hide();
  $("[data-name='SUnit']").hide();
  $("[data-name='id']").hide();

function addtotalSum()
{	
	var totSum = 0;
	for (var i = 1; i < 100; i++) {
			try {
				var amount = document.getElementById("x" + i + "_DAMT");
				if (amount.value != '') {
					totSum = parseFloat(totSum) + parseFloat(amount.value);
				 var SiNo = document.getElementById("x" + i + "_SiNo");
				 SiNo.value = i;
				}
				var RT = document.getElementById("x" + i + "_RT");
				var Product = document.getElementById("sv_x" + i + "_Product").value;
				if (Product != '') {
				 var SiNo = document.getElementById("x" + i + "_SiNo");
				 SiNo.value = i;
				 }
			}
			catch(err) {
			}
	}
	var DiscountAmount = document.getElementById("x_DiscountAmount").value;
		var BillAmount = document.getElementById("x_Amount");
		var kk = parseFloat(totSum) - parseFloat(DiscountAmount);
		var mm = Math.round(kk);
		BillAmount.value = mm.toFixed(2);;
}
var HospitalIDDD = '<?php echo HospitalID(); ?>';
var grpButton = '<input type="hidden" id="HospitalIDDD" name="HospitalIDDD" value="'+HospitalIDDD+'">';
		var searchfrm = document.getElementById("tbl_view_patient_servicesgrid");
		var node = document.createElement("div");
		node.innerHTML = grpButton;    
		searchfrm.appendChild(node);
</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_billing_voucher_edit->terminate();
?>