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
$pharmacy_billing_return_add = new pharmacy_billing_return_add();

// Run the page
$pharmacy_billing_return_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_return_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_billing_returnadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpharmacy_billing_returnadd = currentForm = new ew.Form("fpharmacy_billing_returnadd", "add");

	// Validate form
	fpharmacy_billing_returnadd.validate = function() {
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
			<?php if ($pharmacy_billing_return_add->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->Reception->caption(), $pharmacy_billing_return_add->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->PatientId->caption(), $pharmacy_billing_return_add->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->mrnno->caption(), $pharmacy_billing_return_add->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->PatientName->caption(), $pharmacy_billing_return_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->Age->caption(), $pharmacy_billing_return_add->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->Gender->caption(), $pharmacy_billing_return_add->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->profilePic->caption(), $pharmacy_billing_return_add->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->Mobile->caption(), $pharmacy_billing_return_add->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->IP_OP->Required) { ?>
				elm = this.getElements("x" + infix + "_IP_OP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->IP_OP->caption(), $pharmacy_billing_return_add->IP_OP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->Doctor->Required) { ?>
				elm = this.getElements("x" + infix + "_Doctor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->Doctor->caption(), $pharmacy_billing_return_add->Doctor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->voucher_type->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->voucher_type->caption(), $pharmacy_billing_return_add->voucher_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->Details->Required) { ?>
				elm = this.getElements("x" + infix + "_Details");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->Details->caption(), $pharmacy_billing_return_add->Details->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->ModeofPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeofPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->ModeofPayment->caption(), $pharmacy_billing_return_add->ModeofPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->Amount->caption(), $pharmacy_billing_return_add->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return_add->Amount->errorMessage()) ?>");
			<?php if ($pharmacy_billing_return_add->AnyDues->Required) { ?>
				elm = this.getElements("x" + infix + "_AnyDues");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->AnyDues->caption(), $pharmacy_billing_return_add->AnyDues->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->createdby->caption(), $pharmacy_billing_return_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->createddatetime->caption(), $pharmacy_billing_return_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->modifiedby->caption(), $pharmacy_billing_return_add->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->modifieddatetime->caption(), $pharmacy_billing_return_add->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->RealizationAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->RealizationAmount->caption(), $pharmacy_billing_return_add->RealizationAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return_add->RealizationAmount->errorMessage()) ?>");
			<?php if ($pharmacy_billing_return_add->RealizationStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->RealizationStatus->caption(), $pharmacy_billing_return_add->RealizationStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->RealizationRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->RealizationRemarks->caption(), $pharmacy_billing_return_add->RealizationRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->RealizationBatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationBatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->RealizationBatchNo->caption(), $pharmacy_billing_return_add->RealizationBatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->RealizationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->RealizationDate->caption(), $pharmacy_billing_return_add->RealizationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->HospID->caption(), $pharmacy_billing_return_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->RIDNO->caption(), $pharmacy_billing_return_add->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->TidNo->caption(), $pharmacy_billing_return_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return_add->TidNo->errorMessage()) ?>");
			<?php if ($pharmacy_billing_return_add->CId->Required) { ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->CId->caption(), $pharmacy_billing_return_add->CId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->PartnerName->caption(), $pharmacy_billing_return_add->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->PayerType->Required) { ?>
				elm = this.getElements("x" + infix + "_PayerType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->PayerType->caption(), $pharmacy_billing_return_add->PayerType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->Dob->Required) { ?>
				elm = this.getElements("x" + infix + "_Dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->Dob->caption(), $pharmacy_billing_return_add->Dob->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->Currency->Required) { ?>
				elm = this.getElements("x" + infix + "_Currency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->Currency->caption(), $pharmacy_billing_return_add->Currency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->DiscountRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->DiscountRemarks->caption(), $pharmacy_billing_return_add->DiscountRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->Remarks->caption(), $pharmacy_billing_return_add->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->PatId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->PatId->caption(), $pharmacy_billing_return_add->PatId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->DrDepartment->Required) { ?>
				elm = this.getElements("x" + infix + "_DrDepartment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->DrDepartment->caption(), $pharmacy_billing_return_add->DrDepartment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->RefferedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_RefferedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->RefferedBy->caption(), $pharmacy_billing_return_add->RefferedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->BillNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_BillNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->BillNumber->caption(), $pharmacy_billing_return_add->BillNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->CardNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_CardNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->CardNumber->caption(), $pharmacy_billing_return_add->CardNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->BankName->Required) { ?>
				elm = this.getElements("x" + infix + "_BankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->BankName->caption(), $pharmacy_billing_return_add->BankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->DrID->caption(), $pharmacy_billing_return_add->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->BillStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->BillStatus->caption(), $pharmacy_billing_return_add->BillStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return_add->BillStatus->errorMessage()) ?>");
			<?php if ($pharmacy_billing_return_add->ReportHeader->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportHeader[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->ReportHeader->caption(), $pharmacy_billing_return_add->ReportHeader->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_return_add->PharID->Required) { ?>
				elm = this.getElements("x" + infix + "_PharID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return_add->PharID->caption(), $pharmacy_billing_return_add->PharID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PharID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return_add->PharID->errorMessage()) ?>");

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
	fpharmacy_billing_returnadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_billing_returnadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_billing_returnadd.lists["x_Reception"] = <?php echo $pharmacy_billing_return_add->Reception->Lookup->toClientList($pharmacy_billing_return_add) ?>;
	fpharmacy_billing_returnadd.lists["x_Reception"].options = <?php echo JsonEncode($pharmacy_billing_return_add->Reception->lookupOptions()) ?>;
	fpharmacy_billing_returnadd.lists["x_ModeofPayment"] = <?php echo $pharmacy_billing_return_add->ModeofPayment->Lookup->toClientList($pharmacy_billing_return_add) ?>;
	fpharmacy_billing_returnadd.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_billing_return_add->ModeofPayment->lookupOptions()) ?>;
	fpharmacy_billing_returnadd.lists["x_RIDNO"] = <?php echo $pharmacy_billing_return_add->RIDNO->Lookup->toClientList($pharmacy_billing_return_add) ?>;
	fpharmacy_billing_returnadd.lists["x_RIDNO"].options = <?php echo JsonEncode($pharmacy_billing_return_add->RIDNO->lookupOptions()) ?>;
	fpharmacy_billing_returnadd.lists["x_CId"] = <?php echo $pharmacy_billing_return_add->CId->Lookup->toClientList($pharmacy_billing_return_add) ?>;
	fpharmacy_billing_returnadd.lists["x_CId"].options = <?php echo JsonEncode($pharmacy_billing_return_add->CId->lookupOptions()) ?>;
	fpharmacy_billing_returnadd.lists["x_PatId"] = <?php echo $pharmacy_billing_return_add->PatId->Lookup->toClientList($pharmacy_billing_return_add) ?>;
	fpharmacy_billing_returnadd.lists["x_PatId"].options = <?php echo JsonEncode($pharmacy_billing_return_add->PatId->lookupOptions()) ?>;
	fpharmacy_billing_returnadd.lists["x_RefferedBy"] = <?php echo $pharmacy_billing_return_add->RefferedBy->Lookup->toClientList($pharmacy_billing_return_add) ?>;
	fpharmacy_billing_returnadd.lists["x_RefferedBy"].options = <?php echo JsonEncode($pharmacy_billing_return_add->RefferedBy->lookupOptions()) ?>;
	fpharmacy_billing_returnadd.lists["x_DrID"] = <?php echo $pharmacy_billing_return_add->DrID->Lookup->toClientList($pharmacy_billing_return_add) ?>;
	fpharmacy_billing_returnadd.lists["x_DrID"].options = <?php echo JsonEncode($pharmacy_billing_return_add->DrID->lookupOptions()) ?>;
	fpharmacy_billing_returnadd.lists["x_ReportHeader[]"] = <?php echo $pharmacy_billing_return_add->ReportHeader->Lookup->toClientList($pharmacy_billing_return_add) ?>;
	fpharmacy_billing_returnadd.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($pharmacy_billing_return_add->ReportHeader->options(FALSE, TRUE)) ?>;
	loadjs.done("fpharmacy_billing_returnadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_billing_return_add->showPageHeader(); ?>
<?php
$pharmacy_billing_return_add->showMessage();
?>
<form name="fpharmacy_billing_returnadd" id="fpharmacy_billing_returnadd" class="<?php echo $pharmacy_billing_return_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_return">
<?php if ($pharmacy_billing_return->isConfirm()) { // Confirm page ?>
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="confirm" id="confirm" value="confirm">
<?php } else { ?>
<input type="hidden" name="action" id="action" value="confirm">
<?php } ?>
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_billing_return_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($pharmacy_billing_return_add->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_pharmacy_billing_return_Reception" for="x_Reception" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Reception" type="text/html"><?php echo $pharmacy_billing_return_add->Reception->caption() ?><?php echo $pharmacy_billing_return_add->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->Reception->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Reception" type="text/html"><span id="el_pharmacy_billing_return_Reception">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?php echo EmptyValue(strval($pharmacy_billing_return_add->Reception->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_return_add->Reception->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return_add->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_return_add->Reception->ReadOnly || $pharmacy_billing_return_add->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return_add->Reception->Lookup->getParamTag($pharmacy_billing_return_add, "p_x_Reception") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return_add->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?php echo $pharmacy_billing_return_add->Reception->CurrentValue ?>"<?php echo $pharmacy_billing_return_add->Reception->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Reception" type="text/html"><span id="el_pharmacy_billing_return_Reception">
<span<?php echo $pharmacy_billing_return_add->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->Reception->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($pharmacy_billing_return_add->Reception->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_pharmacy_billing_return_PatientId" for="x_PatientId" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PatientId" type="text/html"><?php echo $pharmacy_billing_return_add->PatientId->caption() ?><?php echo $pharmacy_billing_return_add->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->PatientId->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_PatientId" type="text/html"><span id="el_pharmacy_billing_return_PatientId">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->PatientId->EditValue ?>"<?php echo $pharmacy_billing_return_add->PatientId->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_PatientId" type="text/html"><span id="el_pharmacy_billing_return_PatientId">
<span<?php echo $pharmacy_billing_return_add->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->PatientId->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" value="<?php echo HtmlEncode($pharmacy_billing_return_add->PatientId->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_pharmacy_billing_return_mrnno" for="x_mrnno" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_mrnno" type="text/html"><?php echo $pharmacy_billing_return_add->mrnno->caption() ?><?php echo $pharmacy_billing_return_add->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->mrnno->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_mrnno" type="text/html"><span id="el_pharmacy_billing_return_mrnno">
<input type="text" data-table="pharmacy_billing_return" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->mrnno->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->mrnno->EditValue ?>"<?php echo $pharmacy_billing_return_add->mrnno->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_mrnno" type="text/html"><span id="el_pharmacy_billing_return_mrnno">
<span<?php echo $pharmacy_billing_return_add->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->mrnno->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($pharmacy_billing_return_add->mrnno->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_pharmacy_billing_return_PatientName" for="x_PatientName" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PatientName" type="text/html"><?php echo $pharmacy_billing_return_add->PatientName->caption() ?><?php echo $pharmacy_billing_return_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->PatientName->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_PatientName" type="text/html"><span id="el_pharmacy_billing_return_PatientName">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->PatientName->EditValue ?>"<?php echo $pharmacy_billing_return_add->PatientName->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_PatientName" type="text/html"><span id="el_pharmacy_billing_return_PatientName">
<span<?php echo $pharmacy_billing_return_add->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->PatientName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" value="<?php echo HtmlEncode($pharmacy_billing_return_add->PatientName->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_pharmacy_billing_return_Age" for="x_Age" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Age" type="text/html"><?php echo $pharmacy_billing_return_add->Age->caption() ?><?php echo $pharmacy_billing_return_add->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->Age->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Age" type="text/html"><span id="el_pharmacy_billing_return_Age">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->Age->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->Age->EditValue ?>"<?php echo $pharmacy_billing_return_add->Age->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Age" type="text/html"><span id="el_pharmacy_billing_return_Age">
<span<?php echo $pharmacy_billing_return_add->Age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->Age->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Age" name="x_Age" id="x_Age" value="<?php echo HtmlEncode($pharmacy_billing_return_add->Age->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_pharmacy_billing_return_Gender" for="x_Gender" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Gender" type="text/html"><?php echo $pharmacy_billing_return_add->Gender->caption() ?><?php echo $pharmacy_billing_return_add->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->Gender->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Gender" type="text/html"><span id="el_pharmacy_billing_return_Gender">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->Gender->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->Gender->EditValue ?>"<?php echo $pharmacy_billing_return_add->Gender->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Gender" type="text/html"><span id="el_pharmacy_billing_return_Gender">
<span<?php echo $pharmacy_billing_return_add->Gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->Gender->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Gender" name="x_Gender" id="x_Gender" value="<?php echo HtmlEncode($pharmacy_billing_return_add->Gender->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_pharmacy_billing_return_profilePic" for="x_profilePic" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_profilePic" type="text/html"><?php echo $pharmacy_billing_return_add->profilePic->caption() ?><?php echo $pharmacy_billing_return_add->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->profilePic->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_profilePic" type="text/html"><span id="el_pharmacy_billing_return_profilePic">
<textarea data-table="pharmacy_billing_return" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->profilePic->getPlaceHolder()) ?>"<?php echo $pharmacy_billing_return_add->profilePic->editAttributes() ?>><?php echo $pharmacy_billing_return_add->profilePic->EditValue ?></textarea>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_profilePic" type="text/html"><span id="el_pharmacy_billing_return_profilePic">
<span<?php echo $pharmacy_billing_return_add->profilePic->viewAttributes() ?>><?php echo $pharmacy_billing_return_add->profilePic->ViewValue ?></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" value="<?php echo HtmlEncode($pharmacy_billing_return_add->profilePic->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_pharmacy_billing_return_Mobile" for="x_Mobile" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Mobile" type="text/html"><?php echo $pharmacy_billing_return_add->Mobile->caption() ?><?php echo $pharmacy_billing_return_add->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->Mobile->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Mobile" type="text/html"><span id="el_pharmacy_billing_return_Mobile">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->Mobile->EditValue ?>"<?php echo $pharmacy_billing_return_add->Mobile->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Mobile" type="text/html"><span id="el_pharmacy_billing_return_Mobile">
<span<?php echo $pharmacy_billing_return_add->Mobile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->Mobile->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" value="<?php echo HtmlEncode($pharmacy_billing_return_add->Mobile->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label id="elh_pharmacy_billing_return_IP_OP" for="x_IP_OP" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_IP_OP" type="text/html"><?php echo $pharmacy_billing_return_add->IP_OP->caption() ?><?php echo $pharmacy_billing_return_add->IP_OP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->IP_OP->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_IP_OP" type="text/html"><span id="el_pharmacy_billing_return_IP_OP">
<input type="text" data-table="pharmacy_billing_return" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->IP_OP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->IP_OP->EditValue ?>"<?php echo $pharmacy_billing_return_add->IP_OP->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_IP_OP" type="text/html"><span id="el_pharmacy_billing_return_IP_OP">
<span<?php echo $pharmacy_billing_return_add->IP_OP->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->IP_OP->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" value="<?php echo HtmlEncode($pharmacy_billing_return_add->IP_OP->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->IP_OP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_pharmacy_billing_return_Doctor" for="x_Doctor" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Doctor" type="text/html"><?php echo $pharmacy_billing_return_add->Doctor->caption() ?><?php echo $pharmacy_billing_return_add->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->Doctor->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Doctor" type="text/html"><span id="el_pharmacy_billing_return_Doctor">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->Doctor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->Doctor->EditValue ?>"<?php echo $pharmacy_billing_return_add->Doctor->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Doctor" type="text/html"><span id="el_pharmacy_billing_return_Doctor">
<span<?php echo $pharmacy_billing_return_add->Doctor->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->Doctor->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" value="<?php echo HtmlEncode($pharmacy_billing_return_add->Doctor->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_pharmacy_billing_return_voucher_type" for="x_voucher_type" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_voucher_type" type="text/html"><?php echo $pharmacy_billing_return_add->voucher_type->caption() ?><?php echo $pharmacy_billing_return_add->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->voucher_type->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_voucher_type" type="text/html"><span id="el_pharmacy_billing_return_voucher_type">
<input type="text" data-table="pharmacy_billing_return" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->voucher_type->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->voucher_type->EditValue ?>"<?php echo $pharmacy_billing_return_add->voucher_type->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_voucher_type" type="text/html"><span id="el_pharmacy_billing_return_voucher_type">
<span<?php echo $pharmacy_billing_return_add->voucher_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->voucher_type->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" value="<?php echo HtmlEncode($pharmacy_billing_return_add->voucher_type->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_pharmacy_billing_return_Details" for="x_Details" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Details" type="text/html"><?php echo $pharmacy_billing_return_add->Details->caption() ?><?php echo $pharmacy_billing_return_add->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->Details->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Details" type="text/html"><span id="el_pharmacy_billing_return_Details">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->Details->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->Details->EditValue ?>"<?php echo $pharmacy_billing_return_add->Details->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Details" type="text/html"><span id="el_pharmacy_billing_return_Details">
<span<?php echo $pharmacy_billing_return_add->Details->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->Details->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Details" name="x_Details" id="x_Details" value="<?php echo HtmlEncode($pharmacy_billing_return_add->Details->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_pharmacy_billing_return_ModeofPayment" for="x_ModeofPayment" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_ModeofPayment" type="text/html"><?php echo $pharmacy_billing_return_add->ModeofPayment->caption() ?><?php echo $pharmacy_billing_return_add->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->ModeofPayment->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_ModeofPayment" type="text/html"><span id="el_pharmacy_billing_return_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_return" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_billing_return_add->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $pharmacy_billing_return_add->ModeofPayment->editAttributes() ?>>
			<?php echo $pharmacy_billing_return_add->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
		</select>
</div>
<?php echo $pharmacy_billing_return_add->ModeofPayment->Lookup->getParamTag($pharmacy_billing_return_add, "p_x_ModeofPayment") ?>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_ModeofPayment" type="text/html"><span id="el_pharmacy_billing_return_ModeofPayment">
<span<?php echo $pharmacy_billing_return_add->ModeofPayment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->ModeofPayment->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" value="<?php echo HtmlEncode($pharmacy_billing_return_add->ModeofPayment->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_pharmacy_billing_return_Amount" for="x_Amount" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Amount" type="text/html"><?php echo $pharmacy_billing_return_add->Amount->caption() ?><?php echo $pharmacy_billing_return_add->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->Amount->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Amount" type="text/html"><span id="el_pharmacy_billing_return_Amount">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->Amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->Amount->EditValue ?>"<?php echo $pharmacy_billing_return_add->Amount->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Amount" type="text/html"><span id="el_pharmacy_billing_return_Amount">
<span<?php echo $pharmacy_billing_return_add->Amount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->Amount->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Amount" name="x_Amount" id="x_Amount" value="<?php echo HtmlEncode($pharmacy_billing_return_add->Amount->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_pharmacy_billing_return_AnyDues" for="x_AnyDues" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_AnyDues" type="text/html"><?php echo $pharmacy_billing_return_add->AnyDues->caption() ?><?php echo $pharmacy_billing_return_add->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->AnyDues->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_AnyDues" type="text/html"><span id="el_pharmacy_billing_return_AnyDues">
<input type="text" data-table="pharmacy_billing_return" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->AnyDues->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->AnyDues->EditValue ?>"<?php echo $pharmacy_billing_return_add->AnyDues->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_AnyDues" type="text/html"><span id="el_pharmacy_billing_return_AnyDues">
<span<?php echo $pharmacy_billing_return_add->AnyDues->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->AnyDues->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" value="<?php echo HtmlEncode($pharmacy_billing_return_add->AnyDues->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
	<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_pharmacy_billing_return_createdby" type="text/html"><span id="el_pharmacy_billing_return_createdby">
	<span<?php echo $pharmacy_billing_return_add->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->createdby->ViewValue)) ?>"></span>
	</span></script>
	<input type="hidden" data-table="pharmacy_billing_return" data-field="x_createdby" name="x_createdby" id="x_createdby" value="<?php echo HtmlEncode($pharmacy_billing_return_add->createdby->FormValue) ?>">
	<?php } ?>
	<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_pharmacy_billing_return_createddatetime" type="text/html"><span id="el_pharmacy_billing_return_createddatetime">
	<span<?php echo $pharmacy_billing_return_add->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->createddatetime->ViewValue)) ?>"></span>
	</span></script>
	<input type="hidden" data-table="pharmacy_billing_return" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" value="<?php echo HtmlEncode($pharmacy_billing_return_add->createddatetime->FormValue) ?>">
	<?php } ?>
	<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_pharmacy_billing_return_modifiedby" type="text/html"><span id="el_pharmacy_billing_return_modifiedby">
	<span<?php echo $pharmacy_billing_return_add->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->modifiedby->ViewValue)) ?>"></span>
	</span></script>
	<input type="hidden" data-table="pharmacy_billing_return" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" value="<?php echo HtmlEncode($pharmacy_billing_return_add->modifiedby->FormValue) ?>">
	<?php } ?>
	<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_pharmacy_billing_return_modifieddatetime" type="text/html"><span id="el_pharmacy_billing_return_modifieddatetime">
	<span<?php echo $pharmacy_billing_return_add->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->modifieddatetime->ViewValue)) ?>"></span>
	</span></script>
	<input type="hidden" data-table="pharmacy_billing_return" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_billing_return_add->modifieddatetime->FormValue) ?>">
	<?php } ?>
<?php if ($pharmacy_billing_return_add->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_pharmacy_billing_return_RealizationAmount" for="x_RealizationAmount" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RealizationAmount" type="text/html"><?php echo $pharmacy_billing_return_add->RealizationAmount->caption() ?><?php echo $pharmacy_billing_return_add->RealizationAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->RealizationAmount->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_RealizationAmount" type="text/html"><span id="el_pharmacy_billing_return_RealizationAmount">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->RealizationAmount->EditValue ?>"<?php echo $pharmacy_billing_return_add->RealizationAmount->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_RealizationAmount" type="text/html"><span id="el_pharmacy_billing_return_RealizationAmount">
<span<?php echo $pharmacy_billing_return_add->RealizationAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->RealizationAmount->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" value="<?php echo HtmlEncode($pharmacy_billing_return_add->RealizationAmount->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_pharmacy_billing_return_RealizationStatus" for="x_RealizationStatus" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RealizationStatus" type="text/html"><?php echo $pharmacy_billing_return_add->RealizationStatus->caption() ?><?php echo $pharmacy_billing_return_add->RealizationStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->RealizationStatus->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_RealizationStatus" type="text/html"><span id="el_pharmacy_billing_return_RealizationStatus">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->RealizationStatus->EditValue ?>"<?php echo $pharmacy_billing_return_add->RealizationStatus->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_RealizationStatus" type="text/html"><span id="el_pharmacy_billing_return_RealizationStatus">
<span<?php echo $pharmacy_billing_return_add->RealizationStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->RealizationStatus->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" value="<?php echo HtmlEncode($pharmacy_billing_return_add->RealizationStatus->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_pharmacy_billing_return_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RealizationRemarks" type="text/html"><?php echo $pharmacy_billing_return_add->RealizationRemarks->caption() ?><?php echo $pharmacy_billing_return_add->RealizationRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->RealizationRemarks->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_RealizationRemarks" type="text/html"><span id="el_pharmacy_billing_return_RealizationRemarks">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->RealizationRemarks->EditValue ?>"<?php echo $pharmacy_billing_return_add->RealizationRemarks->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_RealizationRemarks" type="text/html"><span id="el_pharmacy_billing_return_RealizationRemarks">
<span<?php echo $pharmacy_billing_return_add->RealizationRemarks->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->RealizationRemarks->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" value="<?php echo HtmlEncode($pharmacy_billing_return_add->RealizationRemarks->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_pharmacy_billing_return_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RealizationBatchNo" type="text/html"><?php echo $pharmacy_billing_return_add->RealizationBatchNo->caption() ?><?php echo $pharmacy_billing_return_add->RealizationBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->RealizationBatchNo->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_RealizationBatchNo" type="text/html"><span id="el_pharmacy_billing_return_RealizationBatchNo">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->RealizationBatchNo->EditValue ?>"<?php echo $pharmacy_billing_return_add->RealizationBatchNo->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_RealizationBatchNo" type="text/html"><span id="el_pharmacy_billing_return_RealizationBatchNo">
<span<?php echo $pharmacy_billing_return_add->RealizationBatchNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->RealizationBatchNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" value="<?php echo HtmlEncode($pharmacy_billing_return_add->RealizationBatchNo->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_pharmacy_billing_return_RealizationDate" for="x_RealizationDate" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RealizationDate" type="text/html"><?php echo $pharmacy_billing_return_add->RealizationDate->caption() ?><?php echo $pharmacy_billing_return_add->RealizationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->RealizationDate->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_RealizationDate" type="text/html"><span id="el_pharmacy_billing_return_RealizationDate">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->RealizationDate->EditValue ?>"<?php echo $pharmacy_billing_return_add->RealizationDate->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_RealizationDate" type="text/html"><span id="el_pharmacy_billing_return_RealizationDate">
<span<?php echo $pharmacy_billing_return_add->RealizationDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->RealizationDate->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" value="<?php echo HtmlEncode($pharmacy_billing_return_add->RealizationDate->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
	<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_pharmacy_billing_return_HospID" type="text/html"><span id="el_pharmacy_billing_return_HospID">
	<span<?php echo $pharmacy_billing_return_add->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->HospID->ViewValue)) ?>"></span>
	</span></script>
	<input type="hidden" data-table="pharmacy_billing_return" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($pharmacy_billing_return_add->HospID->FormValue) ?>">
	<?php } ?>
<?php if ($pharmacy_billing_return_add->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_pharmacy_billing_return_RIDNO" for="x_RIDNO" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RIDNO" type="text/html"><?php echo $pharmacy_billing_return_add->RIDNO->caption() ?><?php echo $pharmacy_billing_return_add->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->RIDNO->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_RIDNO" type="text/html"><span id="el_pharmacy_billing_return_RIDNO">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RIDNO"><?php echo EmptyValue(strval($pharmacy_billing_return_add->RIDNO->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_return_add->RIDNO->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return_add->RIDNO->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_return_add->RIDNO->ReadOnly || $pharmacy_billing_return_add->RIDNO->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RIDNO',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return_add->RIDNO->Lookup->getParamTag($pharmacy_billing_return_add, "p_x_RIDNO") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RIDNO" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return_add->RIDNO->displayValueSeparatorAttribute() ?>" name="x_RIDNO" id="x_RIDNO" value="<?php echo $pharmacy_billing_return_add->RIDNO->CurrentValue ?>"<?php echo $pharmacy_billing_return_add->RIDNO->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_RIDNO" type="text/html"><span id="el_pharmacy_billing_return_RIDNO">
<span<?php echo $pharmacy_billing_return_add->RIDNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->RIDNO->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" value="<?php echo HtmlEncode($pharmacy_billing_return_add->RIDNO->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_pharmacy_billing_return_TidNo" for="x_TidNo" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_TidNo" type="text/html"><?php echo $pharmacy_billing_return_add->TidNo->caption() ?><?php echo $pharmacy_billing_return_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->TidNo->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_TidNo" type="text/html"><span id="el_pharmacy_billing_return_TidNo">
<input type="text" data-table="pharmacy_billing_return" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->TidNo->EditValue ?>"<?php echo $pharmacy_billing_return_add->TidNo->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_TidNo" type="text/html"><span id="el_pharmacy_billing_return_TidNo">
<span<?php echo $pharmacy_billing_return_add->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->TidNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" value="<?php echo HtmlEncode($pharmacy_billing_return_add->TidNo->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_pharmacy_billing_return_CId" for="x_CId" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_CId" type="text/html"><?php echo $pharmacy_billing_return_add->CId->caption() ?><?php echo $pharmacy_billing_return_add->CId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->CId->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_CId" type="text/html"><span id="el_pharmacy_billing_return_CId">
<?php $pharmacy_billing_return_add->CId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_CId"><?php echo EmptyValue(strval($pharmacy_billing_return_add->CId->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_return_add->CId->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return_add->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_return_add->CId->ReadOnly || $pharmacy_billing_return_add->CId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_CId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return_add->CId->Lookup->getParamTag($pharmacy_billing_return_add, "p_x_CId") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return_add->CId->displayValueSeparatorAttribute() ?>" name="x_CId" id="x_CId" value="<?php echo $pharmacy_billing_return_add->CId->CurrentValue ?>"<?php echo $pharmacy_billing_return_add->CId->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_CId" type="text/html"><span id="el_pharmacy_billing_return_CId">
<span<?php echo $pharmacy_billing_return_add->CId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->CId->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_CId" name="x_CId" id="x_CId" value="<?php echo HtmlEncode($pharmacy_billing_return_add->CId->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_pharmacy_billing_return_PartnerName" for="x_PartnerName" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PartnerName" type="text/html"><?php echo $pharmacy_billing_return_add->PartnerName->caption() ?><?php echo $pharmacy_billing_return_add->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->PartnerName->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_PartnerName" type="text/html"><span id="el_pharmacy_billing_return_PartnerName">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->PartnerName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->PartnerName->EditValue ?>"<?php echo $pharmacy_billing_return_add->PartnerName->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_PartnerName" type="text/html"><span id="el_pharmacy_billing_return_PartnerName">
<span<?php echo $pharmacy_billing_return_add->PartnerName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->PartnerName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" value="<?php echo HtmlEncode($pharmacy_billing_return_add->PartnerName->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label id="elh_pharmacy_billing_return_PayerType" for="x_PayerType" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PayerType" type="text/html"><?php echo $pharmacy_billing_return_add->PayerType->caption() ?><?php echo $pharmacy_billing_return_add->PayerType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->PayerType->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_PayerType" type="text/html"><span id="el_pharmacy_billing_return_PayerType">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->PayerType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->PayerType->EditValue ?>"<?php echo $pharmacy_billing_return_add->PayerType->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_PayerType" type="text/html"><span id="el_pharmacy_billing_return_PayerType">
<span<?php echo $pharmacy_billing_return_add->PayerType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->PayerType->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" value="<?php echo HtmlEncode($pharmacy_billing_return_add->PayerType->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->PayerType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh_pharmacy_billing_return_Dob" for="x_Dob" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Dob" type="text/html"><?php echo $pharmacy_billing_return_add->Dob->caption() ?><?php echo $pharmacy_billing_return_add->Dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->Dob->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Dob" type="text/html"><span id="el_pharmacy_billing_return_Dob">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->Dob->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->Dob->EditValue ?>"<?php echo $pharmacy_billing_return_add->Dob->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Dob" type="text/html"><span id="el_pharmacy_billing_return_Dob">
<span<?php echo $pharmacy_billing_return_add->Dob->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->Dob->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Dob" name="x_Dob" id="x_Dob" value="<?php echo HtmlEncode($pharmacy_billing_return_add->Dob->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_pharmacy_billing_return_Currency" for="x_Currency" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Currency" type="text/html"><?php echo $pharmacy_billing_return_add->Currency->caption() ?><?php echo $pharmacy_billing_return_add->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->Currency->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Currency" type="text/html"><span id="el_pharmacy_billing_return_Currency">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->Currency->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->Currency->EditValue ?>"<?php echo $pharmacy_billing_return_add->Currency->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Currency" type="text/html"><span id="el_pharmacy_billing_return_Currency">
<span<?php echo $pharmacy_billing_return_add->Currency->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->Currency->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Currency" name="x_Currency" id="x_Currency" value="<?php echo HtmlEncode($pharmacy_billing_return_add->Currency->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label id="elh_pharmacy_billing_return_DiscountRemarks" for="x_DiscountRemarks" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_DiscountRemarks" type="text/html"><?php echo $pharmacy_billing_return_add->DiscountRemarks->caption() ?><?php echo $pharmacy_billing_return_add->DiscountRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->DiscountRemarks->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_DiscountRemarks" type="text/html"><span id="el_pharmacy_billing_return_DiscountRemarks">
<input type="text" data-table="pharmacy_billing_return" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->DiscountRemarks->EditValue ?>"<?php echo $pharmacy_billing_return_add->DiscountRemarks->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_DiscountRemarks" type="text/html"><span id="el_pharmacy_billing_return_DiscountRemarks">
<span<?php echo $pharmacy_billing_return_add->DiscountRemarks->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->DiscountRemarks->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" value="<?php echo HtmlEncode($pharmacy_billing_return_add->DiscountRemarks->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->DiscountRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_pharmacy_billing_return_Remarks" for="x_Remarks" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Remarks" type="text/html"><?php echo $pharmacy_billing_return_add->Remarks->caption() ?><?php echo $pharmacy_billing_return_add->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->Remarks->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_Remarks" type="text/html"><span id="el_pharmacy_billing_return_Remarks">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->Remarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->Remarks->EditValue ?>"<?php echo $pharmacy_billing_return_add->Remarks->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_Remarks" type="text/html"><span id="el_pharmacy_billing_return_Remarks">
<span<?php echo $pharmacy_billing_return_add->Remarks->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->Remarks->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" value="<?php echo HtmlEncode($pharmacy_billing_return_add->Remarks->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_pharmacy_billing_return_PatId" for="x_PatId" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PatId" type="text/html"><?php echo $pharmacy_billing_return_add->PatId->caption() ?><?php echo $pharmacy_billing_return_add->PatId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->PatId->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_PatId" type="text/html"><span id="el_pharmacy_billing_return_PatId">
<?php $pharmacy_billing_return_add->PatId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatId"><?php echo EmptyValue(strval($pharmacy_billing_return_add->PatId->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_return_add->PatId->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return_add->PatId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_return_add->PatId->ReadOnly || $pharmacy_billing_return_add->PatId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return_add->PatId->Lookup->getParamTag($pharmacy_billing_return_add, "p_x_PatId") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PatId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return_add->PatId->displayValueSeparatorAttribute() ?>" name="x_PatId" id="x_PatId" value="<?php echo $pharmacy_billing_return_add->PatId->CurrentValue ?>"<?php echo $pharmacy_billing_return_add->PatId->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_PatId" type="text/html"><span id="el_pharmacy_billing_return_PatId">
<span<?php echo $pharmacy_billing_return_add->PatId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->PatId->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PatId" name="x_PatId" id="x_PatId" value="<?php echo HtmlEncode($pharmacy_billing_return_add->PatId->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_pharmacy_billing_return_DrDepartment" for="x_DrDepartment" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_DrDepartment" type="text/html"><?php echo $pharmacy_billing_return_add->DrDepartment->caption() ?><?php echo $pharmacy_billing_return_add->DrDepartment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->DrDepartment->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_DrDepartment" type="text/html"><span id="el_pharmacy_billing_return_DrDepartment">
<input type="text" data-table="pharmacy_billing_return" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->DrDepartment->EditValue ?>"<?php echo $pharmacy_billing_return_add->DrDepartment->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_DrDepartment" type="text/html"><span id="el_pharmacy_billing_return_DrDepartment">
<span<?php echo $pharmacy_billing_return_add->DrDepartment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->DrDepartment->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" value="<?php echo HtmlEncode($pharmacy_billing_return_add->DrDepartment->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label id="elh_pharmacy_billing_return_RefferedBy" for="x_RefferedBy" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RefferedBy" type="text/html"><?php echo $pharmacy_billing_return_add->RefferedBy->caption() ?><?php echo $pharmacy_billing_return_add->RefferedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->RefferedBy->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_RefferedBy" type="text/html"><span id="el_pharmacy_billing_return_RefferedBy">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RefferedBy"><?php echo EmptyValue(strval($pharmacy_billing_return_add->RefferedBy->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_return_add->RefferedBy->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return_add->RefferedBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_return_add->RefferedBy->ReadOnly || $pharmacy_billing_return_add->RefferedBy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RefferedBy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$pharmacy_billing_return_add->RefferedBy->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_RefferedBy" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $pharmacy_billing_return_add->RefferedBy->caption() ?>" data-title="<?php echo $pharmacy_billing_return_add->RefferedBy->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_RefferedBy',url:'mas_reference_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $pharmacy_billing_return_add->RefferedBy->Lookup->getParamTag($pharmacy_billing_return_add, "p_x_RefferedBy") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RefferedBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return_add->RefferedBy->displayValueSeparatorAttribute() ?>" name="x_RefferedBy" id="x_RefferedBy" value="<?php echo $pharmacy_billing_return_add->RefferedBy->CurrentValue ?>"<?php echo $pharmacy_billing_return_add->RefferedBy->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_RefferedBy" type="text/html"><span id="el_pharmacy_billing_return_RefferedBy">
<span<?php echo $pharmacy_billing_return_add->RefferedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->RefferedBy->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" value="<?php echo HtmlEncode($pharmacy_billing_return_add->RefferedBy->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->RefferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_pharmacy_billing_return_BillNumber" for="x_BillNumber" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_BillNumber" type="text/html"><?php echo $pharmacy_billing_return_add->BillNumber->caption() ?><?php echo $pharmacy_billing_return_add->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->BillNumber->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_BillNumber" type="text/html"><span id="el_pharmacy_billing_return_BillNumber">
<input type="text" data-table="pharmacy_billing_return" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->BillNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->BillNumber->EditValue ?>"<?php echo $pharmacy_billing_return_add->BillNumber->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_BillNumber" type="text/html"><span id="el_pharmacy_billing_return_BillNumber">
<span<?php echo $pharmacy_billing_return_add->BillNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->BillNumber->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" value="<?php echo HtmlEncode($pharmacy_billing_return_add->BillNumber->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_pharmacy_billing_return_CardNumber" for="x_CardNumber" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_CardNumber" type="text/html"><?php echo $pharmacy_billing_return_add->CardNumber->caption() ?><?php echo $pharmacy_billing_return_add->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->CardNumber->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_CardNumber" type="text/html"><span id="el_pharmacy_billing_return_CardNumber">
<input type="text" data-table="pharmacy_billing_return" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->CardNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->CardNumber->EditValue ?>"<?php echo $pharmacy_billing_return_add->CardNumber->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_CardNumber" type="text/html"><span id="el_pharmacy_billing_return_CardNumber">
<span<?php echo $pharmacy_billing_return_add->CardNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->CardNumber->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" value="<?php echo HtmlEncode($pharmacy_billing_return_add->CardNumber->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_pharmacy_billing_return_BankName" for="x_BankName" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_BankName" type="text/html"><?php echo $pharmacy_billing_return_add->BankName->caption() ?><?php echo $pharmacy_billing_return_add->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->BankName->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_BankName" type="text/html"><span id="el_pharmacy_billing_return_BankName">
<input type="text" data-table="pharmacy_billing_return" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->BankName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->BankName->EditValue ?>"<?php echo $pharmacy_billing_return_add->BankName->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_BankName" type="text/html"><span id="el_pharmacy_billing_return_BankName">
<span<?php echo $pharmacy_billing_return_add->BankName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->BankName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_BankName" name="x_BankName" id="x_BankName" value="<?php echo HtmlEncode($pharmacy_billing_return_add->BankName->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_pharmacy_billing_return_DrID" for="x_DrID" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_DrID" type="text/html"><?php echo $pharmacy_billing_return_add->DrID->caption() ?><?php echo $pharmacy_billing_return_add->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->DrID->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_DrID" type="text/html"><span id="el_pharmacy_billing_return_DrID">
<?php $pharmacy_billing_return_add->DrID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?php echo EmptyValue(strval($pharmacy_billing_return_add->DrID->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_return_add->DrID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return_add->DrID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_return_add->DrID->ReadOnly || $pharmacy_billing_return_add->DrID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return_add->DrID->Lookup->getParamTag($pharmacy_billing_return_add, "p_x_DrID") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_DrID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return_add->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?php echo $pharmacy_billing_return_add->DrID->CurrentValue ?>"<?php echo $pharmacy_billing_return_add->DrID->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_DrID" type="text/html"><span id="el_pharmacy_billing_return_DrID">
<span<?php echo $pharmacy_billing_return_add->DrID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->DrID->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_DrID" name="x_DrID" id="x_DrID" value="<?php echo HtmlEncode($pharmacy_billing_return_add->DrID->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_pharmacy_billing_return_BillStatus" for="x_BillStatus" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_BillStatus" type="text/html"><?php echo $pharmacy_billing_return_add->BillStatus->caption() ?><?php echo $pharmacy_billing_return_add->BillStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->BillStatus->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_BillStatus" type="text/html"><span id="el_pharmacy_billing_return_BillStatus">
<input type="text" data-table="pharmacy_billing_return" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_return_add->BillStatus->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_BillStatus" type="text/html"><span id="el_pharmacy_billing_return_BillStatus">
<span<?php echo $pharmacy_billing_return_add->BillStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->BillStatus->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" value="<?php echo HtmlEncode($pharmacy_billing_return_add->BillStatus->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_pharmacy_billing_return_ReportHeader" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_ReportHeader" type="text/html"><?php echo $pharmacy_billing_return_add->ReportHeader->caption() ?><?php echo $pharmacy_billing_return_add->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->ReportHeader->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_ReportHeader" type="text/html"><span id="el_pharmacy_billing_return_ReportHeader">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="pharmacy_billing_return" data-field="x_ReportHeader" data-value-separator="<?php echo $pharmacy_billing_return_add->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $pharmacy_billing_return_add->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_return_add->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_ReportHeader" type="text/html"><span id="el_pharmacy_billing_return_ReportHeader">
<span<?php echo $pharmacy_billing_return_add->ReportHeader->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->ReportHeader->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader" value="<?php echo HtmlEncode($pharmacy_billing_return_add->ReportHeader->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return_add->PharID->Visible) { // PharID ?>
	<div id="r_PharID" class="form-group row">
		<label id="elh_pharmacy_billing_return_PharID" for="x_PharID" class="<?php echo $pharmacy_billing_return_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PharID" type="text/html"><?php echo $pharmacy_billing_return_add->PharID->caption() ?><?php echo $pharmacy_billing_return_add->PharID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_return_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_return_add->PharID->cellAttributes() ?>>
<?php if (!$pharmacy_billing_return->isConfirm()) { ?>
<script id="tpx_pharmacy_billing_return_PharID" type="text/html"><span id="el_pharmacy_billing_return_PharID">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PharID" name="x_PharID" id="x_PharID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return_add->PharID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return_add->PharID->EditValue ?>"<?php echo $pharmacy_billing_return_add->PharID->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_pharmacy_billing_return_PharID" type="text/html"><span id="el_pharmacy_billing_return_PharID">
<span<?php echo $pharmacy_billing_return_add->PharID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_return_add->PharID->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PharID" name="x_PharID" id="x_PharID" value="<?php echo HtmlEncode($pharmacy_billing_return_add->PharID->FormValue) ?>">
<?php } ?>
<?php echo $pharmacy_billing_return_add->PharID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pharmacy_billing_returnadd" class="ew-custom-template"></div>
<script id="tpm_pharmacy_billing_returnadd" type="text/html">
<div id="ct_pharmacy_billing_return_add"><style>
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
	if (in_array("view_pharmacy_pharled_return", explode(",", $pharmacy_billing_return->getCurrentDetailTable())) && $view_pharmacy_pharled_return->DetailAdd) {
?>
<?php if ($pharmacy_billing_return->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("view_pharmacy_pharled_return", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_pharmacy_pharled_returngrid.php" ?>
<?php } ?>
<?php if (!$pharmacy_billing_return_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_billing_return_add->OffsetColumnClass ?>"><!-- buttons offset -->
<?php if (!$pharmacy_billing_return->isConfirm()) { // Confirm page ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" onclick="this.form.action.value='confirm';"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_billing_return_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
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
	ew.applyTemplate("tpd_pharmacy_billing_returnadd", "tpm_pharmacy_billing_returnadd", "pharmacy_billing_returnadd", "<?php echo $pharmacy_billing_return->CustomExport ?>", ew.templateData.rows[0]);
	$("script.pharmacy_billing_returnadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$pharmacy_billing_return_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	function addtotalSum(){for(var e=0,t=1;t<40;t++)try{var n=document.getElementById("x"+t+"_DAMT");if(""!=n.value)e=parseInt(e)+parseInt(n.value),document.getElementById("x"+t+"_SiNo").value=t;document.getElementById("x"+t+"_RT");if(""!=document.getElementById("sv_x"+t+"_Product").value)document.getElementById("x"+t+"_SiNo").value=t}catch(e){}document.getElementById("x_Amount").value=e}document.getElementById("viewBankName").style.display="none",$("[data-name='PRC']").hide(),$("[data-name='UR']").hide(),$("[data-name='IQ']").hide();var HospitalIDDD="<?php echo HospitalID(); ?>",grpButton='<input type="hidden" id="HospitalIDDD" name="HospitalIDDD" value="'+HospitalIDDD+'">',searchfrm=document.getElementById("tbl_view_patient_servicesgrid"),node=document.createElement("div");node.innerHTML=grpButton,searchfrm.appendChild(node);
});
</script>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_billing_return_add->terminate();
?>