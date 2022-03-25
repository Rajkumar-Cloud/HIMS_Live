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
$pharmacy_billing_return_edit = new pharmacy_billing_return_edit();

// Run the page
$pharmacy_billing_return_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_return_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_billing_returnedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpharmacy_billing_returnedit = currentForm = new ew.Form("fpharmacy_billing_returnedit", "edit");

	// Validate form
	fpharmacy_billing_returnedit.validate = function() {
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
			<?php if ($pharmacy_billing_return_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->id->caption(), $pharmacy_billing_return_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->Reception->caption(), $pharmacy_billing_return_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->PatientId->caption(), $pharmacy_billing_return_edit->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->mrnno->caption(), $pharmacy_billing_return_edit->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->PatientName->caption(), $pharmacy_billing_return_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->Age->caption(), $pharmacy_billing_return_edit->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->Gender->caption(), $pharmacy_billing_return_edit->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->profilePic->caption(), $pharmacy_billing_return_edit->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->Mobile->caption(), $pharmacy_billing_return_edit->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->IP_OP->Required) { ?>
				elm = this.getElements("x" + infix + "_IP_OP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->IP_OP->caption(), $pharmacy_billing_return_edit->IP_OP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->Doctor->Required) { ?>
				elm = this.getElements("x" + infix + "_Doctor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->Doctor->caption(), $pharmacy_billing_return_edit->Doctor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->voucher_type->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->voucher_type->caption(), $pharmacy_billing_return_edit->voucher_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->Details->Required) { ?>
				elm = this.getElements("x" + infix + "_Details");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->Details->caption(), $pharmacy_billing_return_edit->Details->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->ModeofPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeofPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->ModeofPayment->caption(), $pharmacy_billing_return_edit->ModeofPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->Amount->caption(), $pharmacy_billing_return_edit->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return_edit->Amount->errorMessage()) ?>");
			<?php if ($pharmacy_billing_return_edit->AnyDues->Required) { ?>
				elm = this.getElements("x" + infix + "_AnyDues");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->AnyDues->caption(), $pharmacy_billing_return_edit->AnyDues->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->createdby->caption(), $pharmacy_billing_return_edit->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->createddatetime->caption(), $pharmacy_billing_return_edit->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->modifiedby->caption(), $pharmacy_billing_return_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->modifieddatetime->caption(), $pharmacy_billing_return_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->RealizationAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->RealizationAmount->caption(), $pharmacy_billing_return_edit->RealizationAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return_edit->RealizationAmount->errorMessage()) ?>");
			<?php if ($pharmacy_billing_return_edit->RealizationStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->RealizationStatus->caption(), $pharmacy_billing_return_edit->RealizationStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->RealizationRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->RealizationRemarks->caption(), $pharmacy_billing_return_edit->RealizationRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->RealizationBatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationBatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->RealizationBatchNo->caption(), $pharmacy_billing_return_edit->RealizationBatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->RealizationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->RealizationDate->caption(), $pharmacy_billing_return_edit->RealizationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->HospID->caption(), $pharmacy_billing_return_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->RIDNO->caption(), $pharmacy_billing_return_edit->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->TidNo->caption(), $pharmacy_billing_return_edit->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return_edit->TidNo->errorMessage()) ?>");
			<?php if ($pharmacy_billing_return_edit->CId->Required) { ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->CId->caption(), $pharmacy_billing_return_edit->CId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->PartnerName->caption(), $pharmacy_billing_return_edit->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->PayerType->Required) { ?>
				elm = this.getElements("x" + infix + "_PayerType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->PayerType->caption(), $pharmacy_billing_return_edit->PayerType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->Dob->Required) { ?>
				elm = this.getElements("x" + infix + "_Dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->Dob->caption(), $pharmacy_billing_return_edit->Dob->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->Currency->Required) { ?>
				elm = this.getElements("x" + infix + "_Currency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->Currency->caption(), $pharmacy_billing_return_edit->Currency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->DiscountRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->DiscountRemarks->caption(), $pharmacy_billing_return_edit->DiscountRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->Remarks->caption(), $pharmacy_billing_return_edit->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->PatId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->PatId->caption(), $pharmacy_billing_return_edit->PatId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->DrDepartment->Required) { ?>
				elm = this.getElements("x" + infix + "_DrDepartment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->DrDepartment->caption(), $pharmacy_billing_return_edit->DrDepartment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->RefferedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_RefferedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->RefferedBy->caption(), $pharmacy_billing_return_edit->RefferedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->BillNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_BillNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->BillNumber->caption(), $pharmacy_billing_return_edit->BillNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->CardNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_CardNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->CardNumber->caption(), $pharmacy_billing_return_edit->CardNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->BankName->Required) { ?>
				elm = this.getElements("x" + infix + "_BankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->BankName->caption(), $pharmacy_billing_return_edit->BankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->DrID->caption(), $pharmacy_billing_return_edit->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->BillStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->BillStatus->caption(), $pharmacy_billing_return_edit->BillStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return_edit->BillStatus->errorMessage()) ?>");
			<?php if ($pharmacy_billing_return_edit->ReportHeader->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportHeader[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->ReportHeader->caption(), $pharmacy_billing_return_edit->ReportHeader->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_edit->PharID->Required) { ?>
				elm = this.getElements("x" + infix + "_PharID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_edit->PharID->caption(), $pharmacy_billing_return_edit->PharID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PharID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return_edit->PharID->errorMessage()) ?>");

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
	fpharmacy_billing_returnedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_billing_returnedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_billing_returnedit.lists["x_Reception"] = <?php echo $pharmacy_billing_return_edit->Reception->Lookup->toClientList($pharmacy_billing_return_edit) ?>;
	fpharmacy_billing_returnedit.lists["x_Reception"].options = <?php echo JsonEncode($pharmacy_billing_return_edit->Reception->lookupOptions()) ?>;
	fpharmacy_billing_returnedit.lists["x_ModeofPayment"] = <?php echo $pharmacy_billing_return_edit->ModeofPayment->Lookup->toClientList($pharmacy_billing_return_edit) ?>;
	fpharmacy_billing_returnedit.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_billing_return_edit->ModeofPayment->lookupOptions()) ?>;
	fpharmacy_billing_returnedit.lists["x_RIDNO"] = <?php echo $pharmacy_billing_return_edit->RIDNO->Lookup->toClientList($pharmacy_billing_return_edit) ?>;
	fpharmacy_billing_returnedit.lists["x_RIDNO"].options = <?php echo JsonEncode($pharmacy_billing_return_edit->RIDNO->lookupOptions()) ?>;
	fpharmacy_billing_returnedit.lists["x_CId"] = <?php echo $pharmacy_billing_return_edit->CId->Lookup->toClientList($pharmacy_billing_return_edit) ?>;
	fpharmacy_billing_returnedit.lists["x_CId"].options = <?php echo JsonEncode($pharmacy_billing_return_edit->CId->lookupOptions()) ?>;
	fpharmacy_billing_returnedit.lists["x_PatId"] = <?php echo $pharmacy_billing_return_edit->PatId->Lookup->toClientList($pharmacy_billing_return_edit) ?>;
	fpharmacy_billing_returnedit.lists["x_PatId"].options = <?php echo JsonEncode($pharmacy_billing_return_edit->PatId->lookupOptions()) ?>;
	fpharmacy_billing_returnedit.lists["x_RefferedBy"] = <?php echo $pharmacy_billing_return_edit->RefferedBy->Lookup->toClientList($pharmacy_billing_return_edit) ?>;
	fpharmacy_billing_returnedit.lists["x_RefferedBy"].options = <?php echo JsonEncode($pharmacy_billing_return_edit->RefferedBy->lookupOptions()) ?>;
	fpharmacy_billing_returnedit.lists["x_DrID"] = <?php echo $pharmacy_billing_return_edit->DrID->Lookup->toClientList($pharmacy_billing_return_edit) ?>;
	fpharmacy_billing_returnedit.lists["x_DrID"].options = <?php echo JsonEncode($pharmacy_billing_return_edit->DrID->lookupOptions()) ?>;
	fpharmacy_billing_returnedit.lists["x_ReportHeader[]"] = <?php echo $pharmacy_billing_return_edit->ReportHeader->Lookup->toClientList($pharmacy_billing_return_edit) ?>;
	fpharmacy_billing_returnedit.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($pharmacy_billing_return_edit->ReportHeader->options(FALSE, TRUE)) ?>;
	loadjs.done("fpharmacy_billing_returnedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_billing_return_edit->showPageHeader(); ?>
<?php
$pharmacy_billing_return_edit->showMessage();
?>
<form name="fpharmacy_billing_returnedit" id="fpharmacy_billing_returnedit" class="<?php echo $pharmacy_billing_return_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_return">
<?php if ($pharmacy_billing_return->isConfirm()) { // Confirm page ?>
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="confirm" id="confirm" value="confirm">
<?php } else { ?>
<input type="hidden" name="action" id="action" value="confirm">
<?php } ?>
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_billing_return_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($pharmacy_billing_return_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_billing_return_id" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_id" type="text/html"><?php echo $pharmacy_billing_return_edit->id->caption() ?><?php echo $pharmacy_billing_return_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->id->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_id" type="text/html"><span id="el_pharmacy_billing_return_id">
<span<?php echo $pharmacy_billing_return_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->id->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_id" type="text/html"><span id="el_pharmacy_billing_return_id">
<span<?php echo $pharmacy_billing_return_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->id->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->id->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_pharmacy_billing_return_Reception" for="x_Reception" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Reception" type="text/html"><?php echo $pharmacy_billing_return_edit->Reception->caption() ?><?php echo $pharmacy_billing_return_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->Reception->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Reception" type="text/html"><span id="el_pharmacy_billing_return_Reception">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?php echo EmptyValue(strval($pharmacy_billing_return_edit->Reception->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_return_edit->Reception->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return_edit->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_return_edit->Reception->ReadOnly || $pharmacy_billing_return_edit->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return_edit->Reception->Lookup->getParamTag($pharmacy_billing_return_edit, "p_x_Reception") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return_edit->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?php echo $pharmacy_billing_return_edit->Reception->CurrentValue ?>"<?php echo $pharmacy_billing_return_edit->Reception->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Reception" type="text/html"><span id="el_pharmacy_billing_return_Reception">
<span<?php echo $pharmacy_billing_return_edit->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->Reception->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->Reception->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_pharmacy_billing_return_PatientId" for="x_PatientId" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PatientId" type="text/html"><?php echo $pharmacy_billing_return_edit->PatientId->caption() ?><?php echo $pharmacy_billing_return_edit->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->PatientId->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_PatientId" type="text/html"><span id="el_pharmacy_billing_return_PatientId">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->PatientId->EditValue ?>"<?php echo $pharmacy_billing_return_edit->PatientId->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_PatientId" type="text/html"><span id="el_pharmacy_billing_return_PatientId">
<span<?php echo $pharmacy_billing_return_edit->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->PatientId->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->PatientId->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_pharmacy_billing_return_mrnno" for="x_mrnno" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_mrnno" type="text/html"><?php echo $pharmacy_billing_return_edit->mrnno->caption() ?><?php echo $pharmacy_billing_return_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->mrnno->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_mrnno" type="text/html"><span id="el_pharmacy_billing_return_mrnno">
<input type="text" data-table="pharmacy_billing_return" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->mrnno->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->mrnno->EditValue ?>"<?php echo $pharmacy_billing_return_edit->mrnno->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_mrnno" type="text/html"><span id="el_pharmacy_billing_return_mrnno">
<span<?php echo $pharmacy_billing_return_edit->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->mrnno->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->mrnno->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_pharmacy_billing_return_PatientName" for="x_PatientName" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PatientName" type="text/html"><?php echo $pharmacy_billing_return_edit->PatientName->caption() ?><?php echo $pharmacy_billing_return_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->PatientName->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_PatientName" type="text/html"><span id="el_pharmacy_billing_return_PatientName">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->PatientName->EditValue ?>"<?php echo $pharmacy_billing_return_edit->PatientName->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_PatientName" type="text/html"><span id="el_pharmacy_billing_return_PatientName">
<span<?php echo $pharmacy_billing_return_edit->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->PatientName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->PatientName->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_pharmacy_billing_return_Age" for="x_Age" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Age" type="text/html"><?php echo $pharmacy_billing_return_edit->Age->caption() ?><?php echo $pharmacy_billing_return_edit->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->Age->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Age" type="text/html"><span id="el_pharmacy_billing_return_Age">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->Age->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->Age->EditValue ?>"<?php echo $pharmacy_billing_return_edit->Age->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Age" type="text/html"><span id="el_pharmacy_billing_return_Age">
<span<?php echo $pharmacy_billing_return_edit->Age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->Age->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Age" name="x_Age" id="x_Age" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->Age->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_pharmacy_billing_return_Gender" for="x_Gender" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Gender" type="text/html"><?php echo $pharmacy_billing_return_edit->Gender->caption() ?><?php echo $pharmacy_billing_return_edit->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->Gender->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Gender" type="text/html"><span id="el_pharmacy_billing_return_Gender">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->Gender->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->Gender->EditValue ?>"<?php echo $pharmacy_billing_return_edit->Gender->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Gender" type="text/html"><span id="el_pharmacy_billing_return_Gender">
<span<?php echo $pharmacy_billing_return_edit->Gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->Gender->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Gender" name="x_Gender" id="x_Gender" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->Gender->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_pharmacy_billing_return_profilePic" for="x_profilePic" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_profilePic" type="text/html"><?php echo $pharmacy_billing_return_edit->profilePic->caption() ?><?php echo $pharmacy_billing_return_edit->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->profilePic->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_profilePic" type="text/html"><span id="el_pharmacy_billing_return_profilePic">
<textarea data-table="pharmacy_billing_return" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->profilePic->getPlaceHolder()) ?>"<?php echo $pharmacy_billing_return_edit->profilePic->editAttributes() ?>><?php echo $pharmacy_billing_return_edit->profilePic->EditValue ?></textarea>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_profilePic" type="text/html"><span id="el_pharmacy_billing_return_profilePic">
<span<?php echo $pharmacy_billing_return_edit->profilePic->viewAttributes() ?>><?php echo $pharmacy_billing_return_edit->profilePic->ViewValue ?></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->profilePic->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_pharmacy_billing_return_Mobile" for="x_Mobile" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Mobile" type="text/html"><?php echo $pharmacy_billing_return_edit->Mobile->caption() ?><?php echo $pharmacy_billing_return_edit->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->Mobile->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Mobile" type="text/html"><span id="el_pharmacy_billing_return_Mobile">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->Mobile->EditValue ?>"<?php echo $pharmacy_billing_return_edit->Mobile->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Mobile" type="text/html"><span id="el_pharmacy_billing_return_Mobile">
<span<?php echo $pharmacy_billing_return_edit->Mobile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->Mobile->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->Mobile->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label id="elh_pharmacy_billing_return_IP_OP" for="x_IP_OP" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_IP_OP" type="text/html"><?php echo $pharmacy_billing_return_edit->IP_OP->caption() ?><?php echo $pharmacy_billing_return_edit->IP_OP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->IP_OP->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_IP_OP" type="text/html"><span id="el_pharmacy_billing_return_IP_OP">
<input type="text" data-table="pharmacy_billing_return" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->IP_OP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->IP_OP->EditValue ?>"<?php echo $pharmacy_billing_return_edit->IP_OP->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_IP_OP" type="text/html"><span id="el_pharmacy_billing_return_IP_OP">
<span<?php echo $pharmacy_billing_return_edit->IP_OP->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->IP_OP->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->IP_OP->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->IP_OP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_pharmacy_billing_return_Doctor" for="x_Doctor" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Doctor" type="text/html"><?php echo $pharmacy_billing_return_edit->Doctor->caption() ?><?php echo $pharmacy_billing_return_edit->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->Doctor->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Doctor" type="text/html"><span id="el_pharmacy_billing_return_Doctor">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->Doctor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->Doctor->EditValue ?>"<?php echo $pharmacy_billing_return_edit->Doctor->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Doctor" type="text/html"><span id="el_pharmacy_billing_return_Doctor">
<span<?php echo $pharmacy_billing_return_edit->Doctor->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->Doctor->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->Doctor->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_pharmacy_billing_return_voucher_type" for="x_voucher_type" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_voucher_type" type="text/html"><?php echo $pharmacy_billing_return_edit->voucher_type->caption() ?><?php echo $pharmacy_billing_return_edit->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->voucher_type->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_voucher_type" type="text/html"><span id="el_pharmacy_billing_return_voucher_type">
<input type="text" data-table="pharmacy_billing_return" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->voucher_type->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->voucher_type->EditValue ?>"<?php echo $pharmacy_billing_return_edit->voucher_type->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_voucher_type" type="text/html"><span id="el_pharmacy_billing_return_voucher_type">
<span<?php echo $pharmacy_billing_return_edit->voucher_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->voucher_type->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->voucher_type->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_pharmacy_billing_return_Details" for="x_Details" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Details" type="text/html"><?php echo $pharmacy_billing_return_edit->Details->caption() ?><?php echo $pharmacy_billing_return_edit->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->Details->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Details" type="text/html"><span id="el_pharmacy_billing_return_Details">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->Details->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->Details->EditValue ?>"<?php echo $pharmacy_billing_return_edit->Details->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Details" type="text/html"><span id="el_pharmacy_billing_return_Details">
<span<?php echo $pharmacy_billing_return_edit->Details->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->Details->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Details" name="x_Details" id="x_Details" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->Details->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_pharmacy_billing_return_ModeofPayment" for="x_ModeofPayment" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_ModeofPayment" type="text/html"><?php echo $pharmacy_billing_return_edit->ModeofPayment->caption() ?><?php echo $pharmacy_billing_return_edit->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->ModeofPayment->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_ModeofPayment" type="text/html"><span id="el_pharmacy_billing_return_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_return" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_billing_return_edit->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $pharmacy_billing_return_edit->ModeofPayment->editAttributes() ?>>
			<?php echo $pharmacy_billing_return_edit->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
		</select>
</div>
<?php echo $pharmacy_billing_return_edit->ModeofPayment->Lookup->getParamTag($pharmacy_billing_return_edit, "p_x_ModeofPayment") ?>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_ModeofPayment" type="text/html"><span id="el_pharmacy_billing_return_ModeofPayment">
<span<?php echo $pharmacy_billing_return_edit->ModeofPayment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->ModeofPayment->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->ModeofPayment->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_pharmacy_billing_return_Amount" for="x_Amount" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Amount" type="text/html"><?php echo $pharmacy_billing_return_edit->Amount->caption() ?><?php echo $pharmacy_billing_return_edit->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->Amount->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Amount" type="text/html"><span id="el_pharmacy_billing_return_Amount">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->Amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->Amount->EditValue ?>"<?php echo $pharmacy_billing_return_edit->Amount->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Amount" type="text/html"><span id="el_pharmacy_billing_return_Amount">
<span<?php echo $pharmacy_billing_return_edit->Amount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->Amount->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Amount" name="x_Amount" id="x_Amount" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->Amount->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_pharmacy_billing_return_AnyDues" for="x_AnyDues" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_AnyDues" type="text/html"><?php echo $pharmacy_billing_return_edit->AnyDues->caption() ?><?php echo $pharmacy_billing_return_edit->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->AnyDues->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_AnyDues" type="text/html"><span id="el_pharmacy_billing_return_AnyDues">
<input type="text" data-table="pharmacy_billing_return" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->AnyDues->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->AnyDues->EditValue ?>"<?php echo $pharmacy_billing_return_edit->AnyDues->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_AnyDues" type="text/html"><span id="el_pharmacy_billing_return_AnyDues">
<span<?php echo $pharmacy_billing_return_edit->AnyDues->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->AnyDues->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->AnyDues->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_pharmacy_billing_return_RealizationAmount" for="x_RealizationAmount" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RealizationAmount" type="text/html"><?php echo $pharmacy_billing_return_edit->RealizationAmount->caption() ?><?php echo $pharmacy_billing_return_edit->RealizationAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->RealizationAmount->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_RealizationAmount" type="text/html"><span id="el_pharmacy_billing_return_RealizationAmount">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->RealizationAmount->EditValue ?>"<?php echo $pharmacy_billing_return_edit->RealizationAmount->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_RealizationAmount" type="text/html"><span id="el_pharmacy_billing_return_RealizationAmount">
<span<?php echo $pharmacy_billing_return_edit->RealizationAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->RealizationAmount->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->RealizationAmount->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_pharmacy_billing_return_RealizationStatus" for="x_RealizationStatus" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RealizationStatus" type="text/html"><?php echo $pharmacy_billing_return_edit->RealizationStatus->caption() ?><?php echo $pharmacy_billing_return_edit->RealizationStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->RealizationStatus->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_RealizationStatus" type="text/html"><span id="el_pharmacy_billing_return_RealizationStatus">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->RealizationStatus->EditValue ?>"<?php echo $pharmacy_billing_return_edit->RealizationStatus->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_RealizationStatus" type="text/html"><span id="el_pharmacy_billing_return_RealizationStatus">
<span<?php echo $pharmacy_billing_return_edit->RealizationStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->RealizationStatus->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->RealizationStatus->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_pharmacy_billing_return_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RealizationRemarks" type="text/html"><?php echo $pharmacy_billing_return_edit->RealizationRemarks->caption() ?><?php echo $pharmacy_billing_return_edit->RealizationRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->RealizationRemarks->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_RealizationRemarks" type="text/html"><span id="el_pharmacy_billing_return_RealizationRemarks">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->RealizationRemarks->EditValue ?>"<?php echo $pharmacy_billing_return_edit->RealizationRemarks->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_RealizationRemarks" type="text/html"><span id="el_pharmacy_billing_return_RealizationRemarks">
<span<?php echo $pharmacy_billing_return_edit->RealizationRemarks->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->RealizationRemarks->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->RealizationRemarks->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_pharmacy_billing_return_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RealizationBatchNo" type="text/html"><?php echo $pharmacy_billing_return_edit->RealizationBatchNo->caption() ?><?php echo $pharmacy_billing_return_edit->RealizationBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->RealizationBatchNo->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_RealizationBatchNo" type="text/html"><span id="el_pharmacy_billing_return_RealizationBatchNo">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->RealizationBatchNo->EditValue ?>"<?php echo $pharmacy_billing_return_edit->RealizationBatchNo->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_RealizationBatchNo" type="text/html"><span id="el_pharmacy_billing_return_RealizationBatchNo">
<span<?php echo $pharmacy_billing_return_edit->RealizationBatchNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->RealizationBatchNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->RealizationBatchNo->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_pharmacy_billing_return_RealizationDate" for="x_RealizationDate" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RealizationDate" type="text/html"><?php echo $pharmacy_billing_return_edit->RealizationDate->caption() ?><?php echo $pharmacy_billing_return_edit->RealizationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->RealizationDate->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_RealizationDate" type="text/html"><span id="el_pharmacy_billing_return_RealizationDate">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->RealizationDate->EditValue ?>"<?php echo $pharmacy_billing_return_edit->RealizationDate->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_RealizationDate" type="text/html"><span id="el_pharmacy_billing_return_RealizationDate">
<span<?php echo $pharmacy_billing_return_edit->RealizationDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->RealizationDate->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->RealizationDate->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_pharmacy_billing_return_RIDNO" for="x_RIDNO" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RIDNO" type="text/html"><?php echo $pharmacy_billing_return_edit->RIDNO->caption() ?><?php echo $pharmacy_billing_return_edit->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->RIDNO->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_RIDNO" type="text/html"><span id="el_pharmacy_billing_return_RIDNO">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RIDNO"><?php echo EmptyValue(strval($pharmacy_billing_return_edit->RIDNO->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_return_edit->RIDNO->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return_edit->RIDNO->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_return_edit->RIDNO->ReadOnly || $pharmacy_billing_return_edit->RIDNO->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RIDNO',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return_edit->RIDNO->Lookup->getParamTag($pharmacy_billing_return_edit, "p_x_RIDNO") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RIDNO" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return_edit->RIDNO->displayValueSeparatorAttribute() ?>" name="x_RIDNO" id="x_RIDNO" value="<?php echo $pharmacy_billing_return_edit->RIDNO->CurrentValue ?>"<?php echo $pharmacy_billing_return_edit->RIDNO->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_RIDNO" type="text/html"><span id="el_pharmacy_billing_return_RIDNO">
<span<?php echo $pharmacy_billing_return_edit->RIDNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->RIDNO->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->RIDNO->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_pharmacy_billing_return_TidNo" for="x_TidNo" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_TidNo" type="text/html"><?php echo $pharmacy_billing_return_edit->TidNo->caption() ?><?php echo $pharmacy_billing_return_edit->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->TidNo->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_TidNo" type="text/html"><span id="el_pharmacy_billing_return_TidNo">
<input type="text" data-table="pharmacy_billing_return" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->TidNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->TidNo->EditValue ?>"<?php echo $pharmacy_billing_return_edit->TidNo->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_TidNo" type="text/html"><span id="el_pharmacy_billing_return_TidNo">
<span<?php echo $pharmacy_billing_return_edit->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->TidNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->TidNo->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_pharmacy_billing_return_CId" for="x_CId" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_CId" type="text/html"><?php echo $pharmacy_billing_return_edit->CId->caption() ?><?php echo $pharmacy_billing_return_edit->CId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->CId->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_CId" type="text/html"><span id="el_pharmacy_billing_return_CId">
<?php $pharmacy_billing_return_edit->CId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_CId"><?php echo EmptyValue(strval($pharmacy_billing_return_edit->CId->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_return_edit->CId->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return_edit->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_return_edit->CId->ReadOnly || $pharmacy_billing_return_edit->CId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_CId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return_edit->CId->Lookup->getParamTag($pharmacy_billing_return_edit, "p_x_CId") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return_edit->CId->displayValueSeparatorAttribute() ?>" name="x_CId" id="x_CId" value="<?php echo $pharmacy_billing_return_edit->CId->CurrentValue ?>"<?php echo $pharmacy_billing_return_edit->CId->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_CId" type="text/html"><span id="el_pharmacy_billing_return_CId">
<span<?php echo $pharmacy_billing_return_edit->CId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->CId->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_CId" name="x_CId" id="x_CId" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->CId->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_pharmacy_billing_return_PartnerName" for="x_PartnerName" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PartnerName" type="text/html"><?php echo $pharmacy_billing_return_edit->PartnerName->caption() ?><?php echo $pharmacy_billing_return_edit->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->PartnerName->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_PartnerName" type="text/html"><span id="el_pharmacy_billing_return_PartnerName">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->PartnerName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->PartnerName->EditValue ?>"<?php echo $pharmacy_billing_return_edit->PartnerName->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_PartnerName" type="text/html"><span id="el_pharmacy_billing_return_PartnerName">
<span<?php echo $pharmacy_billing_return_edit->PartnerName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->PartnerName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->PartnerName->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label id="elh_pharmacy_billing_return_PayerType" for="x_PayerType" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PayerType" type="text/html"><?php echo $pharmacy_billing_return_edit->PayerType->caption() ?><?php echo $pharmacy_billing_return_edit->PayerType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->PayerType->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_PayerType" type="text/html"><span id="el_pharmacy_billing_return_PayerType">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->PayerType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->PayerType->EditValue ?>"<?php echo $pharmacy_billing_return_edit->PayerType->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_PayerType" type="text/html"><span id="el_pharmacy_billing_return_PayerType">
<span<?php echo $pharmacy_billing_return_edit->PayerType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->PayerType->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->PayerType->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->PayerType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh_pharmacy_billing_return_Dob" for="x_Dob" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Dob" type="text/html"><?php echo $pharmacy_billing_return_edit->Dob->caption() ?><?php echo $pharmacy_billing_return_edit->Dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->Dob->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Dob" type="text/html"><span id="el_pharmacy_billing_return_Dob">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->Dob->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->Dob->EditValue ?>"<?php echo $pharmacy_billing_return_edit->Dob->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Dob" type="text/html"><span id="el_pharmacy_billing_return_Dob">
<span<?php echo $pharmacy_billing_return_edit->Dob->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->Dob->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Dob" name="x_Dob" id="x_Dob" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->Dob->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_pharmacy_billing_return_Currency" for="x_Currency" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Currency" type="text/html"><?php echo $pharmacy_billing_return_edit->Currency->caption() ?><?php echo $pharmacy_billing_return_edit->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->Currency->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Currency" type="text/html"><span id="el_pharmacy_billing_return_Currency">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->Currency->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->Currency->EditValue ?>"<?php echo $pharmacy_billing_return_edit->Currency->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Currency" type="text/html"><span id="el_pharmacy_billing_return_Currency">
<span<?php echo $pharmacy_billing_return_edit->Currency->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->Currency->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Currency" name="x_Currency" id="x_Currency" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->Currency->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label id="elh_pharmacy_billing_return_DiscountRemarks" for="x_DiscountRemarks" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_DiscountRemarks" type="text/html"><?php echo $pharmacy_billing_return_edit->DiscountRemarks->caption() ?><?php echo $pharmacy_billing_return_edit->DiscountRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->DiscountRemarks->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_DiscountRemarks" type="text/html"><span id="el_pharmacy_billing_return_DiscountRemarks">
<input type="text" data-table="pharmacy_billing_return" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->DiscountRemarks->EditValue ?>"<?php echo $pharmacy_billing_return_edit->DiscountRemarks->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_DiscountRemarks" type="text/html"><span id="el_pharmacy_billing_return_DiscountRemarks">
<span<?php echo $pharmacy_billing_return_edit->DiscountRemarks->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->DiscountRemarks->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->DiscountRemarks->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->DiscountRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_pharmacy_billing_return_Remarks" for="x_Remarks" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Remarks" type="text/html"><?php echo $pharmacy_billing_return_edit->Remarks->caption() ?><?php echo $pharmacy_billing_return_edit->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->Remarks->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Remarks" type="text/html"><span id="el_pharmacy_billing_return_Remarks">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->Remarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->Remarks->EditValue ?>"<?php echo $pharmacy_billing_return_edit->Remarks->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Remarks" type="text/html"><span id="el_pharmacy_billing_return_Remarks">
<span<?php echo $pharmacy_billing_return_edit->Remarks->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->Remarks->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->Remarks->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_pharmacy_billing_return_PatId" for="x_PatId" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PatId" type="text/html"><?php echo $pharmacy_billing_return_edit->PatId->caption() ?><?php echo $pharmacy_billing_return_edit->PatId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->PatId->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_PatId" type="text/html"><span id="el_pharmacy_billing_return_PatId">
<?php $pharmacy_billing_return_edit->PatId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatId"><?php echo EmptyValue(strval($pharmacy_billing_return_edit->PatId->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_return_edit->PatId->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return_edit->PatId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_return_edit->PatId->ReadOnly || $pharmacy_billing_return_edit->PatId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return_edit->PatId->Lookup->getParamTag($pharmacy_billing_return_edit, "p_x_PatId") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PatId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return_edit->PatId->displayValueSeparatorAttribute() ?>" name="x_PatId" id="x_PatId" value="<?php echo $pharmacy_billing_return_edit->PatId->CurrentValue ?>"<?php echo $pharmacy_billing_return_edit->PatId->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_PatId" type="text/html"><span id="el_pharmacy_billing_return_PatId">
<span<?php echo $pharmacy_billing_return_edit->PatId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->PatId->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PatId" name="x_PatId" id="x_PatId" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->PatId->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_pharmacy_billing_return_DrDepartment" for="x_DrDepartment" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_DrDepartment" type="text/html"><?php echo $pharmacy_billing_return_edit->DrDepartment->caption() ?><?php echo $pharmacy_billing_return_edit->DrDepartment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->DrDepartment->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_DrDepartment" type="text/html"><span id="el_pharmacy_billing_return_DrDepartment">
<input type="text" data-table="pharmacy_billing_return" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->DrDepartment->EditValue ?>"<?php echo $pharmacy_billing_return_edit->DrDepartment->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_DrDepartment" type="text/html"><span id="el_pharmacy_billing_return_DrDepartment">
<span<?php echo $pharmacy_billing_return_edit->DrDepartment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->DrDepartment->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->DrDepartment->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label id="elh_pharmacy_billing_return_RefferedBy" for="x_RefferedBy" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RefferedBy" type="text/html"><?php echo $pharmacy_billing_return_edit->RefferedBy->caption() ?><?php echo $pharmacy_billing_return_edit->RefferedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->RefferedBy->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_RefferedBy" type="text/html"><span id="el_pharmacy_billing_return_RefferedBy">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RefferedBy"><?php echo EmptyValue(strval($pharmacy_billing_return_edit->RefferedBy->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_return_edit->RefferedBy->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return_edit->RefferedBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_return_edit->RefferedBy->ReadOnly || $pharmacy_billing_return_edit->RefferedBy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RefferedBy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$pharmacy_billing_return_edit->RefferedBy->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_RefferedBy" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $pharmacy_billing_return_edit->RefferedBy->caption() ?>" data-title="<?php echo $pharmacy_billing_return_edit->RefferedBy->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_RefferedBy',url:'mas_reference_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $pharmacy_billing_return_edit->RefferedBy->Lookup->getParamTag($pharmacy_billing_return_edit, "p_x_RefferedBy") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RefferedBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return_edit->RefferedBy->displayValueSeparatorAttribute() ?>" name="x_RefferedBy" id="x_RefferedBy" value="<?php echo $pharmacy_billing_return_edit->RefferedBy->CurrentValue ?>"<?php echo $pharmacy_billing_return_edit->RefferedBy->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_RefferedBy" type="text/html"><span id="el_pharmacy_billing_return_RefferedBy">
<span<?php echo $pharmacy_billing_return_edit->RefferedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->RefferedBy->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->RefferedBy->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->RefferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_pharmacy_billing_return_BillNumber" for="x_BillNumber" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_BillNumber" type="text/html"><?php echo $pharmacy_billing_return_edit->BillNumber->caption() ?><?php echo $pharmacy_billing_return_edit->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->BillNumber->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_BillNumber" type="text/html"><span id="el_pharmacy_billing_return_BillNumber">
<input type="text" data-table="pharmacy_billing_return" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->BillNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->BillNumber->EditValue ?>"<?php echo $pharmacy_billing_return_edit->BillNumber->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_BillNumber" type="text/html"><span id="el_pharmacy_billing_return_BillNumber">
<span<?php echo $pharmacy_billing_return_edit->BillNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->BillNumber->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->BillNumber->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_pharmacy_billing_return_CardNumber" for="x_CardNumber" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_CardNumber" type="text/html"><?php echo $pharmacy_billing_return_edit->CardNumber->caption() ?><?php echo $pharmacy_billing_return_edit->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->CardNumber->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_CardNumber" type="text/html"><span id="el_pharmacy_billing_return_CardNumber">
<input type="text" data-table="pharmacy_billing_return" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->CardNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->CardNumber->EditValue ?>"<?php echo $pharmacy_billing_return_edit->CardNumber->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_CardNumber" type="text/html"><span id="el_pharmacy_billing_return_CardNumber">
<span<?php echo $pharmacy_billing_return_edit->CardNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->CardNumber->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->CardNumber->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_pharmacy_billing_return_BankName" for="x_BankName" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_BankName" type="text/html"><?php echo $pharmacy_billing_return_edit->BankName->caption() ?><?php echo $pharmacy_billing_return_edit->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->BankName->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_BankName" type="text/html"><span id="el_pharmacy_billing_return_BankName">
<input type="text" data-table="pharmacy_billing_return" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->BankName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->BankName->EditValue ?>"<?php echo $pharmacy_billing_return_edit->BankName->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_BankName" type="text/html"><span id="el_pharmacy_billing_return_BankName">
<span<?php echo $pharmacy_billing_return_edit->BankName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->BankName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_BankName" name="x_BankName" id="x_BankName" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->BankName->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_pharmacy_billing_return_DrID" for="x_DrID" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_DrID" type="text/html"><?php echo $pharmacy_billing_return_edit->DrID->caption() ?><?php echo $pharmacy_billing_return_edit->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->DrID->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_DrID" type="text/html"><span id="el_pharmacy_billing_return_DrID">
<?php $pharmacy_billing_return_edit->DrID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?php echo EmptyValue(strval($pharmacy_billing_return_edit->DrID->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_return_edit->DrID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return_edit->DrID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_return_edit->DrID->ReadOnly || $pharmacy_billing_return_edit->DrID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return_edit->DrID->Lookup->getParamTag($pharmacy_billing_return_edit, "p_x_DrID") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_DrID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return_edit->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?php echo $pharmacy_billing_return_edit->DrID->CurrentValue ?>"<?php echo $pharmacy_billing_return_edit->DrID->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_DrID" type="text/html"><span id="el_pharmacy_billing_return_DrID">
<span<?php echo $pharmacy_billing_return_edit->DrID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->DrID->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_DrID" name="x_DrID" id="x_DrID" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->DrID->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_pharmacy_billing_return_BillStatus" for="x_BillStatus" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_BillStatus" type="text/html"><?php echo $pharmacy_billing_return_edit->BillStatus->caption() ?><?php echo $pharmacy_billing_return_edit->BillStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->BillStatus->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_BillStatus" type="text/html"><span id="el_pharmacy_billing_return_BillStatus">
<input type="text" data-table="pharmacy_billing_return" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_return_edit->BillStatus->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_BillStatus" type="text/html"><span id="el_pharmacy_billing_return_BillStatus">
<span<?php echo $pharmacy_billing_return_edit->BillStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->BillStatus->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->BillStatus->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_pharmacy_billing_return_ReportHeader" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_ReportHeader" type="text/html"><?php echo $pharmacy_billing_return_edit->ReportHeader->caption() ?><?php echo $pharmacy_billing_return_edit->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->ReportHeader->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_ReportHeader" type="text/html"><span id="el_pharmacy_billing_return_ReportHeader">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="pharmacy_billing_return" data-field="x_ReportHeader" data-value-separator="<?php echo $pharmacy_billing_return_edit->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $pharmacy_billing_return_edit->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_return_edit->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_ReportHeader" type="text/html"><span id="el_pharmacy_billing_return_ReportHeader">
<span<?php echo $pharmacy_billing_return_edit->ReportHeader->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->ReportHeader->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->ReportHeader->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_edit->PharID->Visible) { // PharID ?>
	<div id="r_PharID" class="form-group row">
		<label id="elh_pharmacy_billing_return_PharID" for="x_PharID" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PharID" type="text/html"><?php echo $pharmacy_billing_return_edit->PharID->caption() ?><?php echo $pharmacy_billing_return_edit->PharID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_edit->PharID->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_PharID" type="text/html"><span id="el_pharmacy_billing_return_PharID">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PharID" name="x_PharID" id="x_PharID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_edit->PharID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_edit->PharID->EditValue ?>"<?php echo $pharmacy_billing_return_edit->PharID->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_PharID" type="text/html"><span id="el_pharmacy_billing_return_PharID">
<span<?php echo $pharmacy_billing_return_edit->PharID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_edit->PharID->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PharID" name="x_PharID" id="x_PharID" value="<?php echo HtmlEncode($pharmacy_billing_return_edit->PharID->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_edit->PharID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pharmacy_billing_returnedit" class="ew-custom-template"></div>
<script id="tpm_pharmacy_billing_returnedit" type="text/html">
<div id="ct_pharmacy_billing_return_edit"><style>
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
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_return_PatId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_PatId")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_return_RIDNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_RIDNO")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_return_CId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_CId")/}}</h3>
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
		<td>{{include tmpl="#tpc_pharmacy_billing_return_PatientId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_PatientId")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_PatientName")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_Mobile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_Mobile")/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_Dob"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_Dob")/}}</td>
		<td>{{include tmpl="#tpc_pharmacy_billing_return_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_Age")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_Gender")/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_PartnerName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_PartnerName")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_PayerType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_PayerType")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_RefferedBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_RefferedBy")/}}</td>
			<td></td>
		</tr>
		 <tr>
		 	<td>{{include tmpl="#tpc_pharmacy_billing_return_DrID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_DrID")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_Doctor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_Doctor")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_DrDepartment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_DrDepartment")/}}</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
{{include tmpl="#tpc_pharmacy_billing_return_ReportHeader"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_ReportHeader")/}}
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
			<td>{{include tmpl="#tpc_pharmacy_billing_return_ModeofPayment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_ModeofPayment")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_Amount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_Amount")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_AnyDues"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_AnyDues")/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_DiscountRemarks"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_DiscountRemarks")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_Remarks"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_Remarks")/}}</td>
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
			<td>{{include tmpl="#tpc_pharmacy_billing_return_CardNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_CardNumber")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_BankName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_return_BankName")/}}</td>
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
	if (in_array("view_pharmacy_pharled_return", explode(",", $pharmacy_billing_return->getCurrentDetailTable())) && $view_pharmacy_pharled_return->DetailEdit) {
?>
<?php if ($pharmacy_billing_return->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("view_pharmacy_pharled_return", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_pharmacy_pharled_returngrid.php" ?>
<?php } ?>
<?php if (!$pharmacy_billing_return_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_billing_return_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<?php if (!$pharmacy_billing_return->isConfirm()) { // Confirm page ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" onclick="this.form.action.value='confirm';"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_billing_return_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
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
	ew.templateData = { rows: <?php echo JsonEncode($pharmacy_billing_return->Rows) ?> };
	ew.applyTemplate("tpd_pharmacy_billing_returnedit", "tpm_pharmacy_billing_returnedit", "pharmacy_billing_returnedit", "<?php echo $pharmacy_billing_return->CustomExport ?>", ew.templateData.rows[0]);
	$("script.pharmacy_billing_returnedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$pharmacy_billing_return_edit->showPageFooter();
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
$pharmacy_billing_return_edit->terminate();
?>