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
<?php include_once "header.php"; ?>
<script>
var fpharmacy_billing_voucheredit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpharmacy_billing_voucheredit = currentForm = new ew.Form("fpharmacy_billing_voucheredit", "edit");

	// Validate form
	fpharmacy_billing_voucheredit.validate = function() {
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
			<?php if ($pharmacy_billing_voucher_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->id->caption(), $pharmacy_billing_voucher_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->BillNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_BillNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->BillNumber->caption(), $pharmacy_billing_voucher_edit->BillNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->voucher_type->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->voucher_type->caption(), $pharmacy_billing_voucher_edit->voucher_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->Reception->caption(), $pharmacy_billing_voucher_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->PatientId->caption(), $pharmacy_billing_voucher_edit->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->PatientName->caption(), $pharmacy_billing_voucher_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->Mobile->caption(), $pharmacy_billing_voucher_edit->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->Age->caption(), $pharmacy_billing_voucher_edit->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->mrnno->caption(), $pharmacy_billing_voucher_edit->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->IP_OP->Required) { ?>
				elm = this.getElements("x" + infix + "_IP_OP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->IP_OP->caption(), $pharmacy_billing_voucher_edit->IP_OP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->Doctor->Required) { ?>
				elm = this.getElements("x" + infix + "_Doctor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->Doctor->caption(), $pharmacy_billing_voucher_edit->Doctor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->Gender->caption(), $pharmacy_billing_voucher_edit->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->Details->Required) { ?>
				elm = this.getElements("x" + infix + "_Details");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->Details->caption(), $pharmacy_billing_voucher_edit->Details->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->ModeofPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeofPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->ModeofPayment->caption(), $pharmacy_billing_voucher_edit->ModeofPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->Amount->caption(), $pharmacy_billing_voucher_edit->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher_edit->Amount->errorMessage()) ?>");
			<?php if ($pharmacy_billing_voucher_edit->AnyDues->Required) { ?>
				elm = this.getElements("x" + infix + "_AnyDues");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->AnyDues->caption(), $pharmacy_billing_voucher_edit->AnyDues->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->createdby->caption(), $pharmacy_billing_voucher_edit->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->createddatetime->caption(), $pharmacy_billing_voucher_edit->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->modifiedby->caption(), $pharmacy_billing_voucher_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->modifieddatetime->caption(), $pharmacy_billing_voucher_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->RealizationAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->RealizationAmount->caption(), $pharmacy_billing_voucher_edit->RealizationAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher_edit->RealizationAmount->errorMessage()) ?>");
			<?php if ($pharmacy_billing_voucher_edit->RealizationStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->RealizationStatus->caption(), $pharmacy_billing_voucher_edit->RealizationStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->RealizationRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->RealizationRemarks->caption(), $pharmacy_billing_voucher_edit->RealizationRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->RealizationBatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationBatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->RealizationBatchNo->caption(), $pharmacy_billing_voucher_edit->RealizationBatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->RealizationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->RealizationDate->caption(), $pharmacy_billing_voucher_edit->RealizationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->HospID->caption(), $pharmacy_billing_voucher_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->RIDNO->caption(), $pharmacy_billing_voucher_edit->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->TidNo->caption(), $pharmacy_billing_voucher_edit->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher_edit->TidNo->errorMessage()) ?>");
			<?php if ($pharmacy_billing_voucher_edit->CId->Required) { ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->CId->caption(), $pharmacy_billing_voucher_edit->CId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->PartnerName->caption(), $pharmacy_billing_voucher_edit->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->PayerType->Required) { ?>
				elm = this.getElements("x" + infix + "_PayerType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->PayerType->caption(), $pharmacy_billing_voucher_edit->PayerType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->profilePic->caption(), $pharmacy_billing_voucher_edit->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->Dob->Required) { ?>
				elm = this.getElements("x" + infix + "_Dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->Dob->caption(), $pharmacy_billing_voucher_edit->Dob->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->Currency->Required) { ?>
				elm = this.getElements("x" + infix + "_Currency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->Currency->caption(), $pharmacy_billing_voucher_edit->Currency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->DiscountRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->DiscountRemarks->caption(), $pharmacy_billing_voucher_edit->DiscountRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->Remarks->caption(), $pharmacy_billing_voucher_edit->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->PatId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->PatId->caption(), $pharmacy_billing_voucher_edit->PatId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->DrDepartment->Required) { ?>
				elm = this.getElements("x" + infix + "_DrDepartment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->DrDepartment->caption(), $pharmacy_billing_voucher_edit->DrDepartment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->RefferedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_RefferedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->RefferedBy->caption(), $pharmacy_billing_voucher_edit->RefferedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->CardNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_CardNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->CardNumber->caption(), $pharmacy_billing_voucher_edit->CardNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->BankName->Required) { ?>
				elm = this.getElements("x" + infix + "_BankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->BankName->caption(), $pharmacy_billing_voucher_edit->BankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->DrID->caption(), $pharmacy_billing_voucher_edit->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->BillStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->BillStatus->caption(), $pharmacy_billing_voucher_edit->BillStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher_edit->BillStatus->errorMessage()) ?>");
			<?php if ($pharmacy_billing_voucher_edit->ReportHeader->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportHeader[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->ReportHeader->caption(), $pharmacy_billing_voucher_edit->ReportHeader->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_edit->PharID->Required) { ?>
				elm = this.getElements("x" + infix + "_PharID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->PharID->caption(), $pharmacy_billing_voucher_edit->PharID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PharID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher_edit->PharID->errorMessage()) ?>");
			<?php if ($pharmacy_billing_voucher_edit->UserName->Required) { ?>
				elm = this.getElements("x" + infix + "_UserName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_edit->UserName->caption(), $pharmacy_billing_voucher_edit->UserName->RequiredErrorMessage)) ?>");
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
	fpharmacy_billing_voucheredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_billing_voucheredit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_billing_voucheredit.lists["x_Reception"] = <?php echo $pharmacy_billing_voucher_edit->Reception->Lookup->toClientList($pharmacy_billing_voucher_edit) ?>;
	fpharmacy_billing_voucheredit.lists["x_Reception"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->Reception->lookupOptions()) ?>;
	fpharmacy_billing_voucheredit.lists["x_ModeofPayment"] = <?php echo $pharmacy_billing_voucher_edit->ModeofPayment->Lookup->toClientList($pharmacy_billing_voucher_edit) ?>;
	fpharmacy_billing_voucheredit.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->ModeofPayment->lookupOptions()) ?>;
	fpharmacy_billing_voucheredit.lists["x_RIDNO"] = <?php echo $pharmacy_billing_voucher_edit->RIDNO->Lookup->toClientList($pharmacy_billing_voucher_edit) ?>;
	fpharmacy_billing_voucheredit.lists["x_RIDNO"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->RIDNO->lookupOptions()) ?>;
	fpharmacy_billing_voucheredit.lists["x_CId"] = <?php echo $pharmacy_billing_voucher_edit->CId->Lookup->toClientList($pharmacy_billing_voucher_edit) ?>;
	fpharmacy_billing_voucheredit.lists["x_CId"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->CId->lookupOptions()) ?>;
	fpharmacy_billing_voucheredit.lists["x_PatId"] = <?php echo $pharmacy_billing_voucher_edit->PatId->Lookup->toClientList($pharmacy_billing_voucher_edit) ?>;
	fpharmacy_billing_voucheredit.lists["x_PatId"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->PatId->lookupOptions()) ?>;
	fpharmacy_billing_voucheredit.lists["x_RefferedBy"] = <?php echo $pharmacy_billing_voucher_edit->RefferedBy->Lookup->toClientList($pharmacy_billing_voucher_edit) ?>;
	fpharmacy_billing_voucheredit.lists["x_RefferedBy"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->RefferedBy->lookupOptions()) ?>;
	fpharmacy_billing_voucheredit.lists["x_DrID"] = <?php echo $pharmacy_billing_voucher_edit->DrID->Lookup->toClientList($pharmacy_billing_voucher_edit) ?>;
	fpharmacy_billing_voucheredit.lists["x_DrID"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->DrID->lookupOptions()) ?>;
	fpharmacy_billing_voucheredit.lists["x_ReportHeader[]"] = <?php echo $pharmacy_billing_voucher_edit->ReportHeader->Lookup->toClientList($pharmacy_billing_voucher_edit) ?>;
	fpharmacy_billing_voucheredit.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($pharmacy_billing_voucher_edit->ReportHeader->options(FALSE, TRUE)) ?>;
	loadjs.done("fpharmacy_billing_voucheredit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_billing_voucher_edit->showPageHeader(); ?>
<?php
$pharmacy_billing_voucher_edit->showMessage();
?>
<form name="fpharmacy_billing_voucheredit" id="fpharmacy_billing_voucheredit" class="<?php echo $pharmacy_billing_voucher_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_voucher">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_billing_voucher_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($pharmacy_billing_voucher_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_id" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_id" type="text/html"><?php echo $pharmacy_billing_voucher_edit->id->caption() ?><?php echo $pharmacy_billing_voucher_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->id->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_id" type="text/html"><span id="el_pharmacy_billing_voucher_id">
<span<?php echo $pharmacy_billing_voucher_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_voucher_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->id->CurrentValue) ?>">
<?php echo $pharmacy_billing_voucher_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_BillNumber" for="x_BillNumber" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_BillNumber" type="text/html"><?php echo $pharmacy_billing_voucher_edit->BillNumber->caption() ?><?php echo $pharmacy_billing_voucher_edit->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->BillNumber->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_BillNumber" type="text/html"><span id="el_pharmacy_billing_voucher_BillNumber">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->BillNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->BillNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->BillNumber->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_voucher_type" for="x_voucher_type" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_voucher_type" type="text/html"><?php echo $pharmacy_billing_voucher_edit->voucher_type->caption() ?><?php echo $pharmacy_billing_voucher_edit->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->voucher_type->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_voucher_type" type="text/html"><span id="el_pharmacy_billing_voucher_voucher_type">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->voucher_type->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->voucher_type->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->voucher_type->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Reception" for="x_Reception" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Reception" type="text/html"><?php echo $pharmacy_billing_voucher_edit->Reception->caption() ?><?php echo $pharmacy_billing_voucher_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->Reception->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Reception" type="text/html"><span id="el_pharmacy_billing_voucher_Reception">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?php echo EmptyValue(strval($pharmacy_billing_voucher_edit->Reception->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_voucher_edit->Reception->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher_edit->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_voucher_edit->Reception->ReadOnly || $pharmacy_billing_voucher_edit->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_voucher_edit->Reception->Lookup->getParamTag($pharmacy_billing_voucher_edit, "p_x_Reception") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher_edit->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?php echo $pharmacy_billing_voucher_edit->Reception->CurrentValue ?>"<?php echo $pharmacy_billing_voucher_edit->Reception->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_PatientId" for="x_PatientId" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_PatientId" type="text/html"><?php echo $pharmacy_billing_voucher_edit->PatientId->caption() ?><?php echo $pharmacy_billing_voucher_edit->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->PatientId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_PatientId" type="text/html"><span id="el_pharmacy_billing_voucher_PatientId">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->PatientId->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->PatientId->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_PatientName" for="x_PatientName" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_PatientName" type="text/html"><?php echo $pharmacy_billing_voucher_edit->PatientName->caption() ?><?php echo $pharmacy_billing_voucher_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->PatientName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_PatientName" type="text/html"><span id="el_pharmacy_billing_voucher_PatientName">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->PatientName->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->PatientName->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Mobile" for="x_Mobile" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Mobile" type="text/html"><?php echo $pharmacy_billing_voucher_edit->Mobile->caption() ?><?php echo $pharmacy_billing_voucher_edit->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->Mobile->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Mobile" type="text/html"><span id="el_pharmacy_billing_voucher_Mobile">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->Mobile->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->Mobile->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Age" for="x_Age" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Age" type="text/html"><?php echo $pharmacy_billing_voucher_edit->Age->caption() ?><?php echo $pharmacy_billing_voucher_edit->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->Age->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Age" type="text/html"><span id="el_pharmacy_billing_voucher_Age">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->Age->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->Age->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->Age->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_mrnno" for="x_mrnno" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_mrnno" type="text/html"><?php echo $pharmacy_billing_voucher_edit->mrnno->caption() ?><?php echo $pharmacy_billing_voucher_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->mrnno->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_mrnno" type="text/html"><span id="el_pharmacy_billing_voucher_mrnno">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->mrnno->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->mrnno->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->mrnno->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_IP_OP" for="x_IP_OP" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_IP_OP" type="text/html"><?php echo $pharmacy_billing_voucher_edit->IP_OP->caption() ?><?php echo $pharmacy_billing_voucher_edit->IP_OP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->IP_OP->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_IP_OP" type="text/html"><span id="el_pharmacy_billing_voucher_IP_OP">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->IP_OP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->IP_OP->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->IP_OP->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->IP_OP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Doctor" for="x_Doctor" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Doctor" type="text/html"><?php echo $pharmacy_billing_voucher_edit->Doctor->caption() ?><?php echo $pharmacy_billing_voucher_edit->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->Doctor->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Doctor" type="text/html"><span id="el_pharmacy_billing_voucher_Doctor">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->Doctor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->Doctor->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->Doctor->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Gender" for="x_Gender" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Gender" type="text/html"><?php echo $pharmacy_billing_voucher_edit->Gender->caption() ?><?php echo $pharmacy_billing_voucher_edit->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->Gender->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Gender" type="text/html"><span id="el_pharmacy_billing_voucher_Gender">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->Gender->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->Gender->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->Gender->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Details" for="x_Details" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Details" type="text/html"><?php echo $pharmacy_billing_voucher_edit->Details->caption() ?><?php echo $pharmacy_billing_voucher_edit->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->Details->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Details" type="text/html"><span id="el_pharmacy_billing_voucher_Details">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->Details->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->Details->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->Details->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_ModeofPayment" for="x_ModeofPayment" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_ModeofPayment" type="text/html"><?php echo $pharmacy_billing_voucher_edit->ModeofPayment->caption() ?><?php echo $pharmacy_billing_voucher_edit->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->ModeofPayment->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_ModeofPayment" type="text/html"><span id="el_pharmacy_billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_billing_voucher_edit->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $pharmacy_billing_voucher_edit->ModeofPayment->editAttributes() ?>>
			<?php echo $pharmacy_billing_voucher_edit->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
		</select>
</div>
<?php echo $pharmacy_billing_voucher_edit->ModeofPayment->Lookup->getParamTag($pharmacy_billing_voucher_edit, "p_x_ModeofPayment") ?>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Amount" for="x_Amount" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Amount" type="text/html"><?php echo $pharmacy_billing_voucher_edit->Amount->caption() ?><?php echo $pharmacy_billing_voucher_edit->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->Amount->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Amount" type="text/html"><span id="el_pharmacy_billing_voucher_Amount">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->Amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->Amount->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->Amount->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_AnyDues" for="x_AnyDues" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_AnyDues" type="text/html"><?php echo $pharmacy_billing_voucher_edit->AnyDues->caption() ?><?php echo $pharmacy_billing_voucher_edit->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->AnyDues->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_AnyDues" type="text/html"><span id="el_pharmacy_billing_voucher_AnyDues">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->AnyDues->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->AnyDues->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->AnyDues->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_RealizationAmount" for="x_RealizationAmount" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_RealizationAmount" type="text/html"><?php echo $pharmacy_billing_voucher_edit->RealizationAmount->caption() ?><?php echo $pharmacy_billing_voucher_edit->RealizationAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->RealizationAmount->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_RealizationAmount" type="text/html"><span id="el_pharmacy_billing_voucher_RealizationAmount">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->RealizationAmount->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->RealizationAmount->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_RealizationStatus" for="x_RealizationStatus" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_RealizationStatus" type="text/html"><?php echo $pharmacy_billing_voucher_edit->RealizationStatus->caption() ?><?php echo $pharmacy_billing_voucher_edit->RealizationStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->RealizationStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_RealizationStatus" type="text/html"><span id="el_pharmacy_billing_voucher_RealizationStatus">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->RealizationStatus->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->RealizationStatus->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_RealizationRemarks" type="text/html"><?php echo $pharmacy_billing_voucher_edit->RealizationRemarks->caption() ?><?php echo $pharmacy_billing_voucher_edit->RealizationRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->RealizationRemarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_RealizationRemarks" type="text/html"><span id="el_pharmacy_billing_voucher_RealizationRemarks">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->RealizationRemarks->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->RealizationRemarks->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_RealizationBatchNo" type="text/html"><?php echo $pharmacy_billing_voucher_edit->RealizationBatchNo->caption() ?><?php echo $pharmacy_billing_voucher_edit->RealizationBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->RealizationBatchNo->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_RealizationBatchNo" type="text/html"><span id="el_pharmacy_billing_voucher_RealizationBatchNo">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->RealizationBatchNo->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->RealizationBatchNo->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_RealizationDate" for="x_RealizationDate" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_RealizationDate" type="text/html"><?php echo $pharmacy_billing_voucher_edit->RealizationDate->caption() ?><?php echo $pharmacy_billing_voucher_edit->RealizationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->RealizationDate->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_RealizationDate" type="text/html"><span id="el_pharmacy_billing_voucher_RealizationDate">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->RealizationDate->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->RealizationDate->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_RIDNO" for="x_RIDNO" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_RIDNO" type="text/html"><?php echo $pharmacy_billing_voucher_edit->RIDNO->caption() ?><?php echo $pharmacy_billing_voucher_edit->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->RIDNO->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_RIDNO" type="text/html"><span id="el_pharmacy_billing_voucher_RIDNO">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RIDNO"><?php echo EmptyValue(strval($pharmacy_billing_voucher_edit->RIDNO->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_voucher_edit->RIDNO->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher_edit->RIDNO->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_voucher_edit->RIDNO->ReadOnly || $pharmacy_billing_voucher_edit->RIDNO->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RIDNO',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_voucher_edit->RIDNO->Lookup->getParamTag($pharmacy_billing_voucher_edit, "p_x_RIDNO") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_RIDNO" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher_edit->RIDNO->displayValueSeparatorAttribute() ?>" name="x_RIDNO" id="x_RIDNO" value="<?php echo $pharmacy_billing_voucher_edit->RIDNO->CurrentValue ?>"<?php echo $pharmacy_billing_voucher_edit->RIDNO->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_TidNo" for="x_TidNo" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_TidNo" type="text/html"><?php echo $pharmacy_billing_voucher_edit->TidNo->caption() ?><?php echo $pharmacy_billing_voucher_edit->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->TidNo->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_TidNo" type="text/html"><span id="el_pharmacy_billing_voucher_TidNo">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->TidNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->TidNo->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->TidNo->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_CId" for="x_CId" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_CId" type="text/html"><?php echo $pharmacy_billing_voucher_edit->CId->caption() ?><?php echo $pharmacy_billing_voucher_edit->CId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->CId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_CId" type="text/html"><span id="el_pharmacy_billing_voucher_CId">
<?php $pharmacy_billing_voucher_edit->CId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_CId"><?php echo EmptyValue(strval($pharmacy_billing_voucher_edit->CId->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_voucher_edit->CId->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher_edit->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_voucher_edit->CId->ReadOnly || $pharmacy_billing_voucher_edit->CId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_CId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_voucher_edit->CId->Lookup->getParamTag($pharmacy_billing_voucher_edit, "p_x_CId") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher_edit->CId->displayValueSeparatorAttribute() ?>" name="x_CId" id="x_CId" value="<?php echo $pharmacy_billing_voucher_edit->CId->CurrentValue ?>"<?php echo $pharmacy_billing_voucher_edit->CId->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_PartnerName" for="x_PartnerName" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_PartnerName" type="text/html"><?php echo $pharmacy_billing_voucher_edit->PartnerName->caption() ?><?php echo $pharmacy_billing_voucher_edit->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->PartnerName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_PartnerName" type="text/html"><span id="el_pharmacy_billing_voucher_PartnerName">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->PartnerName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->PartnerName->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->PartnerName->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_PayerType" for="x_PayerType" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_PayerType" type="text/html"><?php echo $pharmacy_billing_voucher_edit->PayerType->caption() ?><?php echo $pharmacy_billing_voucher_edit->PayerType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->PayerType->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_PayerType" type="text/html"><span id="el_pharmacy_billing_voucher_PayerType">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->PayerType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->PayerType->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->PayerType->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->PayerType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_profilePic" for="x_profilePic" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_profilePic" type="text/html"><?php echo $pharmacy_billing_voucher_edit->profilePic->caption() ?><?php echo $pharmacy_billing_voucher_edit->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->profilePic->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_profilePic" type="text/html"><span id="el_pharmacy_billing_voucher_profilePic">
<textarea data-table="pharmacy_billing_voucher" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->profilePic->getPlaceHolder()) ?>"<?php echo $pharmacy_billing_voucher_edit->profilePic->editAttributes() ?>><?php echo $pharmacy_billing_voucher_edit->profilePic->EditValue ?></textarea>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Dob" for="x_Dob" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Dob" type="text/html"><?php echo $pharmacy_billing_voucher_edit->Dob->caption() ?><?php echo $pharmacy_billing_voucher_edit->Dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->Dob->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Dob" type="text/html"><span id="el_pharmacy_billing_voucher_Dob">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->Dob->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->Dob->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->Dob->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Currency" for="x_Currency" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Currency" type="text/html"><?php echo $pharmacy_billing_voucher_edit->Currency->caption() ?><?php echo $pharmacy_billing_voucher_edit->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->Currency->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Currency" type="text/html"><span id="el_pharmacy_billing_voucher_Currency">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->Currency->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->Currency->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->Currency->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_DiscountRemarks" for="x_DiscountRemarks" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_DiscountRemarks" type="text/html"><?php echo $pharmacy_billing_voucher_edit->DiscountRemarks->caption() ?><?php echo $pharmacy_billing_voucher_edit->DiscountRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->DiscountRemarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_DiscountRemarks" type="text/html"><span id="el_pharmacy_billing_voucher_DiscountRemarks">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->DiscountRemarks->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->DiscountRemarks->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->DiscountRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_Remarks" for="x_Remarks" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_Remarks" type="text/html"><?php echo $pharmacy_billing_voucher_edit->Remarks->caption() ?><?php echo $pharmacy_billing_voucher_edit->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->Remarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_Remarks" type="text/html"><span id="el_pharmacy_billing_voucher_Remarks">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->Remarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->Remarks->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->Remarks->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_PatId" for="x_PatId" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_PatId" type="text/html"><?php echo $pharmacy_billing_voucher_edit->PatId->caption() ?><?php echo $pharmacy_billing_voucher_edit->PatId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->PatId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_PatId" type="text/html"><span id="el_pharmacy_billing_voucher_PatId">
<?php $pharmacy_billing_voucher_edit->PatId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatId"><?php echo EmptyValue(strval($pharmacy_billing_voucher_edit->PatId->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_voucher_edit->PatId->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher_edit->PatId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_voucher_edit->PatId->ReadOnly || $pharmacy_billing_voucher_edit->PatId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_voucher_edit->PatId->Lookup->getParamTag($pharmacy_billing_voucher_edit, "p_x_PatId") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher_edit->PatId->displayValueSeparatorAttribute() ?>" name="x_PatId" id="x_PatId" value="<?php echo $pharmacy_billing_voucher_edit->PatId->CurrentValue ?>"<?php echo $pharmacy_billing_voucher_edit->PatId->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_DrDepartment" for="x_DrDepartment" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_DrDepartment" type="text/html"><?php echo $pharmacy_billing_voucher_edit->DrDepartment->caption() ?><?php echo $pharmacy_billing_voucher_edit->DrDepartment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->DrDepartment->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_DrDepartment" type="text/html"><span id="el_pharmacy_billing_voucher_DrDepartment">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->DrDepartment->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->DrDepartment->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_RefferedBy" for="x_RefferedBy" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_RefferedBy" type="text/html"><?php echo $pharmacy_billing_voucher_edit->RefferedBy->caption() ?><?php echo $pharmacy_billing_voucher_edit->RefferedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->RefferedBy->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_RefferedBy" type="text/html"><span id="el_pharmacy_billing_voucher_RefferedBy">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RefferedBy"><?php echo EmptyValue(strval($pharmacy_billing_voucher_edit->RefferedBy->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_voucher_edit->RefferedBy->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher_edit->RefferedBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_voucher_edit->RefferedBy->ReadOnly || $pharmacy_billing_voucher_edit->RefferedBy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RefferedBy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$pharmacy_billing_voucher_edit->RefferedBy->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_RefferedBy" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $pharmacy_billing_voucher_edit->RefferedBy->caption() ?>" data-title="<?php echo $pharmacy_billing_voucher_edit->RefferedBy->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_RefferedBy',url:'mas_reference_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $pharmacy_billing_voucher_edit->RefferedBy->Lookup->getParamTag($pharmacy_billing_voucher_edit, "p_x_RefferedBy") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_RefferedBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher_edit->RefferedBy->displayValueSeparatorAttribute() ?>" name="x_RefferedBy" id="x_RefferedBy" value="<?php echo $pharmacy_billing_voucher_edit->RefferedBy->CurrentValue ?>"<?php echo $pharmacy_billing_voucher_edit->RefferedBy->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->RefferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_CardNumber" for="x_CardNumber" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_CardNumber" type="text/html"><?php echo $pharmacy_billing_voucher_edit->CardNumber->caption() ?><?php echo $pharmacy_billing_voucher_edit->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->CardNumber->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_CardNumber" type="text/html"><span id="el_pharmacy_billing_voucher_CardNumber">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->CardNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->CardNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->CardNumber->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_BankName" for="x_BankName" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_BankName" type="text/html"><?php echo $pharmacy_billing_voucher_edit->BankName->caption() ?><?php echo $pharmacy_billing_voucher_edit->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->BankName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_BankName" type="text/html"><span id="el_pharmacy_billing_voucher_BankName">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->BankName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->BankName->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->BankName->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_DrID" for="x_DrID" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_DrID" type="text/html"><?php echo $pharmacy_billing_voucher_edit->DrID->caption() ?><?php echo $pharmacy_billing_voucher_edit->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->DrID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_DrID" type="text/html"><span id="el_pharmacy_billing_voucher_DrID">
<?php $pharmacy_billing_voucher_edit->DrID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?php echo EmptyValue(strval($pharmacy_billing_voucher_edit->DrID->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_voucher_edit->DrID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher_edit->DrID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_voucher_edit->DrID->ReadOnly || $pharmacy_billing_voucher_edit->DrID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_voucher_edit->DrID->Lookup->getParamTag($pharmacy_billing_voucher_edit, "p_x_DrID") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_DrID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher_edit->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?php echo $pharmacy_billing_voucher_edit->DrID->CurrentValue ?>"<?php echo $pharmacy_billing_voucher_edit->DrID->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_BillStatus" for="x_BillStatus" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_BillStatus" type="text/html"><?php echo $pharmacy_billing_voucher_edit->BillStatus->caption() ?><?php echo $pharmacy_billing_voucher_edit->BillStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->BillStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_BillStatus" type="text/html"><span id="el_pharmacy_billing_voucher_BillStatus">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->BillStatus->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_ReportHeader" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_ReportHeader" type="text/html"><?php echo $pharmacy_billing_voucher_edit->ReportHeader->caption() ?><?php echo $pharmacy_billing_voucher_edit->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->ReportHeader->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_ReportHeader" type="text/html"><span id="el_pharmacy_billing_voucher_ReportHeader">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" data-value-separator="<?php echo $pharmacy_billing_voucher_edit->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $pharmacy_billing_voucher_edit->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher_edit->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_edit->PharID->Visible) { // PharID ?>
	<div id="r_PharID" class="form-group row">
		<label id="elh_pharmacy_billing_voucher_PharID" for="x_PharID" class="<?php echo $pharmacy_billing_voucher_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_voucher_PharID" type="text/html"><?php echo $pharmacy_billing_voucher_edit->PharID->caption() ?><?php echo $pharmacy_billing_voucher_edit->PharID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_voucher_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_voucher_edit->PharID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_voucher_PharID" type="text/html"><span id="el_pharmacy_billing_voucher_PharID">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PharID" name="x_PharID" id="x_PharID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_edit->PharID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_edit->PharID->EditValue ?>"<?php echo $pharmacy_billing_voucher_edit->PharID->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_voucher_edit->PharID->CustomMsg ?></div></div>
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
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_voucher_PatId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_PatId")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_voucher_RIDNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_RIDNO")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_voucher_CId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_CId")/}}</h3>
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
		<td>{{include tmpl="#tpc_pharmacy_billing_voucher_PatientId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_PatientId")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_PatientName")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_Mobile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_Mobile")/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_Dob"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_Dob")/}}</td>
		<td>{{include tmpl="#tpc_pharmacy_billing_voucher_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_Age")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_Gender")/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_PartnerName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_PartnerName")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_PayerType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_PayerType")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_RefferedBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_RefferedBy")/}}</td>
			<td></td>
		</tr>
		 <tr>
		 	<td>{{include tmpl="#tpc_pharmacy_billing_voucher_DrID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_DrID")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_Doctor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_Doctor")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_DrDepartment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_DrDepartment")/}}</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
{{include tmpl="#tpc_pharmacy_billing_voucher_ReportHeader"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_ReportHeader")/}}
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
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_ModeofPayment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_ModeofPayment")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_Amount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_Amount")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_AnyDues"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_AnyDues")/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_DiscountRemarks"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_DiscountRemarks")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_Remarks"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_Remarks")/}}</td>
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
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_CardNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_CardNumber")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_voucher_BankName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_voucher_BankName")/}}</td>
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
	if (in_array("pharmacy_pharled", explode(",", $pharmacy_billing_voucher->getCurrentDetailTable())) && $pharmacy_pharled->DetailEdit) {
?>
<?php if ($pharmacy_billing_voucher->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("pharmacy_pharled", "TblCaption") ?></h4>
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
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($pharmacy_billing_voucher->Rows) ?> };
	ew.applyTemplate("tpd_pharmacy_billing_voucheredit", "tpm_pharmacy_billing_voucheredit", "pharmacy_billing_voucheredit", "<?php echo $pharmacy_billing_voucher->CustomExport ?>", ew.templateData.rows[0]);
	$("script.pharmacy_billing_voucheredit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$pharmacy_billing_voucher_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	function addtotalSum(){for(var e=0,t=1;t<40;t++)try{var a=document.getElementById("x"+t+"_SubTotal");""!=a.value&&(e=parseInt(e)+parseInt(a.value))}catch(e){}document.getElementById("x_Amount").value=e}document.getElementById("viewBankName").style.display="none",$("[data-name='PRC']").hide(),$("[data-name='UR']").hide();var HospitalIDDD="<?php echo HospitalID(); ?>",grpButton='<input type="hidden" id="HospitalIDDD" name="HospitalIDDD" value="'+HospitalIDDD+'">',searchfrm=document.getElementById("tbl_view_patient_servicesgrid"),node=document.createElement("div");node.innerHTML=grpButton,searchfrm.appendChild(node);
});
</script>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_billing_voucher_edit->terminate();
?>