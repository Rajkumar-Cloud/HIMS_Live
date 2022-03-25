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
$billing_other_voucher_add = new billing_other_voucher_add();

// Run the page
$billing_other_voucher_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_other_voucher_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbilling_other_voucheradd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fbilling_other_voucheradd = currentForm = new ew.Form("fbilling_other_voucheradd", "add");

	// Validate form
	fbilling_other_voucheradd.validate = function() {
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
			<?php if ($billing_other_voucher_add->AdvanceNo->Required) { ?>
				elm = this.getElements("x" + infix + "_AdvanceNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->AdvanceNo->caption(), $billing_other_voucher_add->AdvanceNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->PatientID->caption(), $billing_other_voucher_add->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->PatientName->caption(), $billing_other_voucher_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->Mobile->caption(), $billing_other_voucher_add->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->ModeofPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeofPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->ModeofPayment->caption(), $billing_other_voucher_add->ModeofPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->Amount->caption(), $billing_other_voucher_add->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_other_voucher_add->Amount->errorMessage()) ?>");
			<?php if ($billing_other_voucher_add->CardNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_CardNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->CardNumber->caption(), $billing_other_voucher_add->CardNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->BankName->Required) { ?>
				elm = this.getElements("x" + infix + "_BankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->BankName->caption(), $billing_other_voucher_add->BankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->Name->caption(), $billing_other_voucher_add->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->voucher_type->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->voucher_type->caption(), $billing_other_voucher_add->voucher_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->Details->Required) { ?>
				elm = this.getElements("x" + infix + "_Details");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->Details->caption(), $billing_other_voucher_add->Details->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->Date->Required) { ?>
				elm = this.getElements("x" + infix + "_Date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->Date->caption(), $billing_other_voucher_add->Date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_other_voucher_add->Date->errorMessage()) ?>");
			<?php if ($billing_other_voucher_add->AnyDues->Required) { ?>
				elm = this.getElements("x" + infix + "_AnyDues");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->AnyDues->caption(), $billing_other_voucher_add->AnyDues->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->createdby->caption(), $billing_other_voucher_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->createddatetime->caption(), $billing_other_voucher_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->PatID->caption(), $billing_other_voucher_add->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->VisiteType->Required) { ?>
				elm = this.getElements("x" + infix + "_VisiteType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->VisiteType->caption(), $billing_other_voucher_add->VisiteType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->VisitDate->Required) { ?>
				elm = this.getElements("x" + infix + "_VisitDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->VisitDate->caption(), $billing_other_voucher_add->VisitDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->Status->caption(), $billing_other_voucher_add->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->AdvanceValidityDate->Required) { ?>
				elm = this.getElements("x" + infix + "_AdvanceValidityDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->AdvanceValidityDate->caption(), $billing_other_voucher_add->AdvanceValidityDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AdvanceValidityDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_other_voucher_add->AdvanceValidityDate->errorMessage()) ?>");
			<?php if ($billing_other_voucher_add->TotalRemainingAdvance->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalRemainingAdvance");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->TotalRemainingAdvance->caption(), $billing_other_voucher_add->TotalRemainingAdvance->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->Remarks->caption(), $billing_other_voucher_add->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->SeectPaymentMode->Required) { ?>
				elm = this.getElements("x" + infix + "_SeectPaymentMode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->SeectPaymentMode->caption(), $billing_other_voucher_add->SeectPaymentMode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->PaidAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_PaidAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->PaidAmount->caption(), $billing_other_voucher_add->PaidAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->Currency->Required) { ?>
				elm = this.getElements("x" + infix + "_Currency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->Currency->caption(), $billing_other_voucher_add->Currency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->HospID->caption(), $billing_other_voucher_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->Reception->caption(), $billing_other_voucher_add->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_other_voucher_add->Reception->errorMessage()) ?>");
			<?php if ($billing_other_voucher_add->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->mrnno->caption(), $billing_other_voucher_add->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->GetUserName->Required) { ?>
				elm = this.getElements("x" + infix + "_GetUserName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->GetUserName->caption(), $billing_other_voucher_add->GetUserName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->AdjustmentwithAdvance->Required) { ?>
				elm = this.getElements("x" + infix + "_AdjustmentwithAdvance");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->AdjustmentwithAdvance->caption(), $billing_other_voucher_add->AdjustmentwithAdvance->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->AdjustmentBillNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_AdjustmentBillNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->AdjustmentBillNumber->caption(), $billing_other_voucher_add->AdjustmentBillNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->CancelAdvance->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelAdvance[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->CancelAdvance->caption(), $billing_other_voucher_add->CancelAdvance->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->CancelReasan->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelReasan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->CancelReasan->caption(), $billing_other_voucher_add->CancelReasan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->CancelBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->CancelBy->caption(), $billing_other_voucher_add->CancelBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->CancelDate->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->CancelDate->caption(), $billing_other_voucher_add->CancelDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CancelDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_other_voucher_add->CancelDate->errorMessage()) ?>");
			<?php if ($billing_other_voucher_add->CancelDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->CancelDateTime->caption(), $billing_other_voucher_add->CancelDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CancelDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_other_voucher_add->CancelDateTime->errorMessage()) ?>");
			<?php if ($billing_other_voucher_add->CanceledBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CanceledBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->CanceledBy->caption(), $billing_other_voucher_add->CanceledBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_other_voucher_add->CancelStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_other_voucher_add->CancelStatus->caption(), $billing_other_voucher_add->CancelStatus->RequiredErrorMessage)) ?>");
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
	fbilling_other_voucheradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbilling_other_voucheradd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbilling_other_voucheradd.lists["x_ModeofPayment"] = <?php echo $billing_other_voucher_add->ModeofPayment->Lookup->toClientList($billing_other_voucher_add) ?>;
	fbilling_other_voucheradd.lists["x_ModeofPayment"].options = <?php echo JsonEncode($billing_other_voucher_add->ModeofPayment->lookupOptions()) ?>;
	fbilling_other_voucheradd.lists["x_PatID"] = <?php echo $billing_other_voucher_add->PatID->Lookup->toClientList($billing_other_voucher_add) ?>;
	fbilling_other_voucheradd.lists["x_PatID"].options = <?php echo JsonEncode($billing_other_voucher_add->PatID->lookupOptions()) ?>;
	fbilling_other_voucheradd.lists["x_CancelAdvance[]"] = <?php echo $billing_other_voucher_add->CancelAdvance->Lookup->toClientList($billing_other_voucher_add) ?>;
	fbilling_other_voucheradd.lists["x_CancelAdvance[]"].options = <?php echo JsonEncode($billing_other_voucher_add->CancelAdvance->options(FALSE, TRUE)) ?>;
	fbilling_other_voucheradd.lists["x_CancelStatus"] = <?php echo $billing_other_voucher_add->CancelStatus->Lookup->toClientList($billing_other_voucher_add) ?>;
	fbilling_other_voucheradd.lists["x_CancelStatus"].options = <?php echo JsonEncode($billing_other_voucher_add->CancelStatus->options(FALSE, TRUE)) ?>;
	loadjs.done("fbilling_other_voucheradd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $billing_other_voucher_add->showPageHeader(); ?>
<?php
$billing_other_voucher_add->showMessage();
?>
<form name="fbilling_other_voucheradd" id="fbilling_other_voucheradd" class="<?php echo $billing_other_voucher_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_other_voucher">
<?php if ($billing_other_voucher->isConfirm()) { // Confirm page ?>
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="confirm" id="confirm" value="confirm">
<?php } else { ?>
<input type="hidden" name="action" id="action" value="confirm">
<?php } ?>
<input type="hidden" name="modal" value="<?php echo (int)$billing_other_voucher_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($billing_other_voucher_add->AdvanceNo->Visible) { // AdvanceNo ?>
	<div id="r_AdvanceNo" class="form-group row">
		<label id="elh_billing_other_voucher_AdvanceNo" for="x_AdvanceNo" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_AdvanceNo" type="text/html"><?php echo $billing_other_voucher_add->AdvanceNo->caption() ?><?php echo $billing_other_voucher_add->AdvanceNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->AdvanceNo->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_AdvanceNo" type="text/html"><span id="el_billing_other_voucher_AdvanceNo">
<input type="text" data-table="billing_other_voucher" data-field="x_AdvanceNo" name="x_AdvanceNo" id="x_AdvanceNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->AdvanceNo->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->AdvanceNo->EditValue ?>"<?php echo $billing_other_voucher_add->AdvanceNo->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_AdvanceNo" type="text/html"><span id="el_billing_other_voucher_AdvanceNo">
<span<?php echo $billing_other_voucher_add->AdvanceNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->AdvanceNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_AdvanceNo" name="x_AdvanceNo" id="x_AdvanceNo" value="<?php echo HtmlEncode($billing_other_voucher_add->AdvanceNo->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->AdvanceNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_billing_other_voucher_PatientID" for="x_PatientID" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_PatientID" type="text/html"><?php echo $billing_other_voucher_add->PatientID->caption() ?><?php echo $billing_other_voucher_add->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->PatientID->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_PatientID" type="text/html"><span id="el_billing_other_voucher_PatientID">
<input type="text" data-table="billing_other_voucher" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->PatientID->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->PatientID->EditValue ?>"<?php echo $billing_other_voucher_add->PatientID->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_PatientID" type="text/html"><span id="el_billing_other_voucher_PatientID">
<span<?php echo $billing_other_voucher_add->PatientID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->PatientID->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" value="<?php echo HtmlEncode($billing_other_voucher_add->PatientID->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_billing_other_voucher_PatientName" for="x_PatientName" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_PatientName" type="text/html"><?php echo $billing_other_voucher_add->PatientName->caption() ?><?php echo $billing_other_voucher_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->PatientName->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_PatientName" type="text/html"><span id="el_billing_other_voucher_PatientName">
<input type="text" data-table="billing_other_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->PatientName->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->PatientName->EditValue ?>"<?php echo $billing_other_voucher_add->PatientName->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_PatientName" type="text/html"><span id="el_billing_other_voucher_PatientName">
<span<?php echo $billing_other_voucher_add->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->PatientName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" value="<?php echo HtmlEncode($billing_other_voucher_add->PatientName->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_billing_other_voucher_Mobile" for="x_Mobile" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_Mobile" type="text/html"><?php echo $billing_other_voucher_add->Mobile->caption() ?><?php echo $billing_other_voucher_add->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->Mobile->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_Mobile" type="text/html"><span id="el_billing_other_voucher_Mobile">
<input type="text" data-table="billing_other_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->Mobile->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->Mobile->EditValue ?>"<?php echo $billing_other_voucher_add->Mobile->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_Mobile" type="text/html"><span id="el_billing_other_voucher_Mobile">
<span<?php echo $billing_other_voucher_add->Mobile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->Mobile->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" value="<?php echo HtmlEncode($billing_other_voucher_add->Mobile->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_billing_other_voucher_ModeofPayment" for="x_ModeofPayment" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_ModeofPayment" type="text/html"><?php echo $billing_other_voucher_add->ModeofPayment->caption() ?><?php echo $billing_other_voucher_add->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->ModeofPayment->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_ModeofPayment" type="text/html"><span id="el_billing_other_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="billing_other_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $billing_other_voucher_add->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $billing_other_voucher_add->ModeofPayment->editAttributes() ?>>
			<?php echo $billing_other_voucher_add->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
		</select>
</div>
<?php echo $billing_other_voucher_add->ModeofPayment->Lookup->getParamTag($billing_other_voucher_add, "p_x_ModeofPayment") ?>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_ModeofPayment" type="text/html"><span id="el_billing_other_voucher_ModeofPayment">
<span<?php echo $billing_other_voucher_add->ModeofPayment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->ModeofPayment->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" value="<?php echo HtmlEncode($billing_other_voucher_add->ModeofPayment->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_billing_other_voucher_Amount" for="x_Amount" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_Amount" type="text/html"><?php echo $billing_other_voucher_add->Amount->caption() ?><?php echo $billing_other_voucher_add->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->Amount->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_Amount" type="text/html"><span id="el_billing_other_voucher_Amount">
<input type="text" data-table="billing_other_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->Amount->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->Amount->EditValue ?>"<?php echo $billing_other_voucher_add->Amount->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_Amount" type="text/html"><span id="el_billing_other_voucher_Amount">
<span<?php echo $billing_other_voucher_add->Amount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->Amount->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" value="<?php echo HtmlEncode($billing_other_voucher_add->Amount->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_billing_other_voucher_CardNumber" for="x_CardNumber" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_CardNumber" type="text/html"><?php echo $billing_other_voucher_add->CardNumber->caption() ?><?php echo $billing_other_voucher_add->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->CardNumber->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_CardNumber" type="text/html"><span id="el_billing_other_voucher_CardNumber">
<input type="text" data-table="billing_other_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->CardNumber->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->CardNumber->EditValue ?>"<?php echo $billing_other_voucher_add->CardNumber->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_CardNumber" type="text/html"><span id="el_billing_other_voucher_CardNumber">
<span<?php echo $billing_other_voucher_add->CardNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->CardNumber->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" value="<?php echo HtmlEncode($billing_other_voucher_add->CardNumber->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_billing_other_voucher_BankName" for="x_BankName" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_BankName" type="text/html"><?php echo $billing_other_voucher_add->BankName->caption() ?><?php echo $billing_other_voucher_add->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->BankName->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_BankName" type="text/html"><span id="el_billing_other_voucher_BankName">
<input type="text" data-table="billing_other_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->BankName->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->BankName->EditValue ?>"<?php echo $billing_other_voucher_add->BankName->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_BankName" type="text/html"><span id="el_billing_other_voucher_BankName">
<span<?php echo $billing_other_voucher_add->BankName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->BankName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" value="<?php echo HtmlEncode($billing_other_voucher_add->BankName->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_billing_other_voucher_Name" for="x_Name" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_Name" type="text/html"><?php echo $billing_other_voucher_add->Name->caption() ?><?php echo $billing_other_voucher_add->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->Name->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_Name" type="text/html"><span id="el_billing_other_voucher_Name">
<input type="text" data-table="billing_other_voucher" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->Name->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->Name->EditValue ?>"<?php echo $billing_other_voucher_add->Name->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_Name" type="text/html"><span id="el_billing_other_voucher_Name">
<span<?php echo $billing_other_voucher_add->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->Name->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Name" name="x_Name" id="x_Name" value="<?php echo HtmlEncode($billing_other_voucher_add->Name->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_billing_other_voucher_voucher_type" for="x_voucher_type" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_voucher_type" type="text/html"><?php echo $billing_other_voucher_add->voucher_type->caption() ?><?php echo $billing_other_voucher_add->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->voucher_type->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_voucher_type" type="text/html"><span id="el_billing_other_voucher_voucher_type">
<input type="text" data-table="billing_other_voucher" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->voucher_type->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->voucher_type->EditValue ?>"<?php echo $billing_other_voucher_add->voucher_type->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_voucher_type" type="text/html"><span id="el_billing_other_voucher_voucher_type">
<span<?php echo $billing_other_voucher_add->voucher_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->voucher_type->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" value="<?php echo HtmlEncode($billing_other_voucher_add->voucher_type->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_billing_other_voucher_Details" for="x_Details" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_Details" type="text/html"><?php echo $billing_other_voucher_add->Details->caption() ?><?php echo $billing_other_voucher_add->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->Details->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_Details" type="text/html"><span id="el_billing_other_voucher_Details">
<input type="text" data-table="billing_other_voucher" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->Details->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->Details->EditValue ?>"<?php echo $billing_other_voucher_add->Details->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_Details" type="text/html"><span id="el_billing_other_voucher_Details">
<span<?php echo $billing_other_voucher_add->Details->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->Details->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Details" name="x_Details" id="x_Details" value="<?php echo HtmlEncode($billing_other_voucher_add->Details->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->Date->Visible) { // Date ?>
	<div id="r_Date" class="form-group row">
		<label id="elh_billing_other_voucher_Date" for="x_Date" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_Date" type="text/html"><?php echo $billing_other_voucher_add->Date->caption() ?><?php echo $billing_other_voucher_add->Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->Date->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_Date" type="text/html"><span id="el_billing_other_voucher_Date">
<input type="text" data-table="billing_other_voucher" data-field="x_Date" data-format="7" name="x_Date" id="x_Date" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->Date->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->Date->EditValue ?>"<?php echo $billing_other_voucher_add->Date->editAttributes() ?>>
<?php if (!$billing_other_voucher_add->Date->ReadOnly && !$billing_other_voucher_add->Date->Disabled && !isset($billing_other_voucher_add->Date->EditAttrs["readonly"]) && !isset($billing_other_voucher_add->Date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="billing_other_voucheradd_js">
loadjs.ready(["fbilling_other_voucheradd", "datetimepicker"], function() {
	ew.createDateTimePicker("fbilling_other_voucheradd", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_Date" type="text/html"><span id="el_billing_other_voucher_Date">
<span<?php echo $billing_other_voucher_add->Date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->Date->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Date" name="x_Date" id="x_Date" value="<?php echo HtmlEncode($billing_other_voucher_add->Date->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_billing_other_voucher_AnyDues" for="x_AnyDues" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_AnyDues" type="text/html"><?php echo $billing_other_voucher_add->AnyDues->caption() ?><?php echo $billing_other_voucher_add->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->AnyDues->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_AnyDues" type="text/html"><span id="el_billing_other_voucher_AnyDues">
<input type="text" data-table="billing_other_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->AnyDues->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->AnyDues->EditValue ?>"<?php echo $billing_other_voucher_add->AnyDues->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_AnyDues" type="text/html"><span id="el_billing_other_voucher_AnyDues">
<span<?php echo $billing_other_voucher_add->AnyDues->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->AnyDues->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" value="<?php echo HtmlEncode($billing_other_voucher_add->AnyDues->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
	<?php if (!$billing_other_voucher->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_billing_other_voucher_createdby" type="text/html"><span id="el_billing_other_voucher_createdby">
	<span<?php echo $billing_other_voucher_add->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->createdby->ViewValue)) ?>"></span>
	</span></script>
	<input type="hidden" data-table="billing_other_voucher" data-field="x_createdby" name="x_createdby" id="x_createdby" value="<?php echo HtmlEncode($billing_other_voucher_add->createdby->FormValue) ?>">
	<?php } ?>
	<?php if (!$billing_other_voucher->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_billing_other_voucher_createddatetime" type="text/html"><span id="el_billing_other_voucher_createddatetime">
	<span<?php echo $billing_other_voucher_add->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->createddatetime->ViewValue)) ?>"></span>
	</span></script>
	<input type="hidden" data-table="billing_other_voucher" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" value="<?php echo HtmlEncode($billing_other_voucher_add->createddatetime->FormValue) ?>">
	<?php } ?>
<?php if ($billing_other_voucher_add->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_billing_other_voucher_PatID" for="x_PatID" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_PatID" type="text/html"><?php echo $billing_other_voucher_add->PatID->caption() ?><?php echo $billing_other_voucher_add->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->PatID->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_PatID" type="text/html"><span id="el_billing_other_voucher_PatID">
<?php $billing_other_voucher_add->PatID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatID"><?php echo EmptyValue(strval($billing_other_voucher_add->PatID->ViewValue)) ? $Language->phrase("PleaseSelect") : $billing_other_voucher_add->PatID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($billing_other_voucher_add->PatID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($billing_other_voucher_add->PatID->ReadOnly || $billing_other_voucher_add->PatID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $billing_other_voucher_add->PatID->Lookup->getParamTag($billing_other_voucher_add, "p_x_PatID") ?>
<input type="hidden" data-table="billing_other_voucher" data-field="x_PatID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $billing_other_voucher_add->PatID->displayValueSeparatorAttribute() ?>" name="x_PatID" id="x_PatID" value="<?php echo $billing_other_voucher_add->PatID->CurrentValue ?>"<?php echo $billing_other_voucher_add->PatID->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_PatID" type="text/html"><span id="el_billing_other_voucher_PatID">
<span<?php echo $billing_other_voucher_add->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->PatID->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_PatID" name="x_PatID" id="x_PatID" value="<?php echo HtmlEncode($billing_other_voucher_add->PatID->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->VisiteType->Visible) { // VisiteType ?>
	<div id="r_VisiteType" class="form-group row">
		<label id="elh_billing_other_voucher_VisiteType" for="x_VisiteType" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_VisiteType" type="text/html"><?php echo $billing_other_voucher_add->VisiteType->caption() ?><?php echo $billing_other_voucher_add->VisiteType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->VisiteType->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_VisiteType" type="text/html"><span id="el_billing_other_voucher_VisiteType">
<input type="text" data-table="billing_other_voucher" data-field="x_VisiteType" name="x_VisiteType" id="x_VisiteType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->VisiteType->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->VisiteType->EditValue ?>"<?php echo $billing_other_voucher_add->VisiteType->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_VisiteType" type="text/html"><span id="el_billing_other_voucher_VisiteType">
<span<?php echo $billing_other_voucher_add->VisiteType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->VisiteType->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_VisiteType" name="x_VisiteType" id="x_VisiteType" value="<?php echo HtmlEncode($billing_other_voucher_add->VisiteType->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->VisiteType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->VisitDate->Visible) { // VisitDate ?>
	<div id="r_VisitDate" class="form-group row">
		<label id="elh_billing_other_voucher_VisitDate" for="x_VisitDate" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_VisitDate" type="text/html"><?php echo $billing_other_voucher_add->VisitDate->caption() ?><?php echo $billing_other_voucher_add->VisitDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->VisitDate->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_VisitDate" type="text/html"><span id="el_billing_other_voucher_VisitDate">
<input type="text" data-table="billing_other_voucher" data-field="x_VisitDate" name="x_VisitDate" id="x_VisitDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->VisitDate->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->VisitDate->EditValue ?>"<?php echo $billing_other_voucher_add->VisitDate->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_VisitDate" type="text/html"><span id="el_billing_other_voucher_VisitDate">
<span<?php echo $billing_other_voucher_add->VisitDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->VisitDate->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_VisitDate" name="x_VisitDate" id="x_VisitDate" value="<?php echo HtmlEncode($billing_other_voucher_add->VisitDate->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->VisitDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_billing_other_voucher_Status" for="x_Status" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_Status" type="text/html"><?php echo $billing_other_voucher_add->Status->caption() ?><?php echo $billing_other_voucher_add->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->Status->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_Status" type="text/html"><span id="el_billing_other_voucher_Status">
<input type="text" data-table="billing_other_voucher" data-field="x_Status" name="x_Status" id="x_Status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->Status->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->Status->EditValue ?>"<?php echo $billing_other_voucher_add->Status->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_Status" type="text/html"><span id="el_billing_other_voucher_Status">
<span<?php echo $billing_other_voucher_add->Status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->Status->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Status" name="x_Status" id="x_Status" value="<?php echo HtmlEncode($billing_other_voucher_add->Status->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<div id="r_AdvanceValidityDate" class="form-group row">
		<label id="elh_billing_other_voucher_AdvanceValidityDate" for="x_AdvanceValidityDate" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_AdvanceValidityDate" type="text/html"><?php echo $billing_other_voucher_add->AdvanceValidityDate->caption() ?><?php echo $billing_other_voucher_add->AdvanceValidityDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->AdvanceValidityDate->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_AdvanceValidityDate" type="text/html"><span id="el_billing_other_voucher_AdvanceValidityDate">
<input type="text" data-table="billing_other_voucher" data-field="x_AdvanceValidityDate" name="x_AdvanceValidityDate" id="x_AdvanceValidityDate" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->AdvanceValidityDate->EditValue ?>"<?php echo $billing_other_voucher_add->AdvanceValidityDate->editAttributes() ?>>
<?php if (!$billing_other_voucher_add->AdvanceValidityDate->ReadOnly && !$billing_other_voucher_add->AdvanceValidityDate->Disabled && !isset($billing_other_voucher_add->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($billing_other_voucher_add->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="billing_other_voucheradd_js">
loadjs.ready(["fbilling_other_voucheradd", "datetimepicker"], function() {
	ew.createDateTimePicker("fbilling_other_voucheradd", "x_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_AdvanceValidityDate" type="text/html"><span id="el_billing_other_voucher_AdvanceValidityDate">
<span<?php echo $billing_other_voucher_add->AdvanceValidityDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->AdvanceValidityDate->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_AdvanceValidityDate" name="x_AdvanceValidityDate" id="x_AdvanceValidityDate" value="<?php echo HtmlEncode($billing_other_voucher_add->AdvanceValidityDate->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->AdvanceValidityDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<div id="r_TotalRemainingAdvance" class="form-group row">
		<label id="elh_billing_other_voucher_TotalRemainingAdvance" for="x_TotalRemainingAdvance" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_TotalRemainingAdvance" type="text/html"><?php echo $billing_other_voucher_add->TotalRemainingAdvance->caption() ?><?php echo $billing_other_voucher_add->TotalRemainingAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->TotalRemainingAdvance->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_TotalRemainingAdvance" type="text/html"><span id="el_billing_other_voucher_TotalRemainingAdvance">
<input type="text" data-table="billing_other_voucher" data-field="x_TotalRemainingAdvance" name="x_TotalRemainingAdvance" id="x_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->TotalRemainingAdvance->EditValue ?>"<?php echo $billing_other_voucher_add->TotalRemainingAdvance->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_TotalRemainingAdvance" type="text/html"><span id="el_billing_other_voucher_TotalRemainingAdvance">
<span<?php echo $billing_other_voucher_add->TotalRemainingAdvance->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->TotalRemainingAdvance->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_TotalRemainingAdvance" name="x_TotalRemainingAdvance" id="x_TotalRemainingAdvance" value="<?php echo HtmlEncode($billing_other_voucher_add->TotalRemainingAdvance->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->TotalRemainingAdvance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_billing_other_voucher_Remarks" for="x_Remarks" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_Remarks" type="text/html"><?php echo $billing_other_voucher_add->Remarks->caption() ?><?php echo $billing_other_voucher_add->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->Remarks->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_Remarks" type="text/html"><span id="el_billing_other_voucher_Remarks">
<textarea data-table="billing_other_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->Remarks->getPlaceHolder()) ?>"<?php echo $billing_other_voucher_add->Remarks->editAttributes() ?>><?php echo $billing_other_voucher_add->Remarks->EditValue ?></textarea>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_Remarks" type="text/html"><span id="el_billing_other_voucher_Remarks">
<span<?php echo $billing_other_voucher_add->Remarks->viewAttributes() ?>><?php echo $billing_other_voucher_add->Remarks->ViewValue ?></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" value="<?php echo HtmlEncode($billing_other_voucher_add->Remarks->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<div id="r_SeectPaymentMode" class="form-group row">
		<label id="elh_billing_other_voucher_SeectPaymentMode" for="x_SeectPaymentMode" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_SeectPaymentMode" type="text/html"><?php echo $billing_other_voucher_add->SeectPaymentMode->caption() ?><?php echo $billing_other_voucher_add->SeectPaymentMode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->SeectPaymentMode->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_SeectPaymentMode" type="text/html"><span id="el_billing_other_voucher_SeectPaymentMode">
<input type="text" data-table="billing_other_voucher" data-field="x_SeectPaymentMode" name="x_SeectPaymentMode" id="x_SeectPaymentMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->SeectPaymentMode->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->SeectPaymentMode->EditValue ?>"<?php echo $billing_other_voucher_add->SeectPaymentMode->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_SeectPaymentMode" type="text/html"><span id="el_billing_other_voucher_SeectPaymentMode">
<span<?php echo $billing_other_voucher_add->SeectPaymentMode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->SeectPaymentMode->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_SeectPaymentMode" name="x_SeectPaymentMode" id="x_SeectPaymentMode" value="<?php echo HtmlEncode($billing_other_voucher_add->SeectPaymentMode->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->SeectPaymentMode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->PaidAmount->Visible) { // PaidAmount ?>
	<div id="r_PaidAmount" class="form-group row">
		<label id="elh_billing_other_voucher_PaidAmount" for="x_PaidAmount" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_PaidAmount" type="text/html"><?php echo $billing_other_voucher_add->PaidAmount->caption() ?><?php echo $billing_other_voucher_add->PaidAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->PaidAmount->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_PaidAmount" type="text/html"><span id="el_billing_other_voucher_PaidAmount">
<input type="text" data-table="billing_other_voucher" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->PaidAmount->EditValue ?>"<?php echo $billing_other_voucher_add->PaidAmount->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_PaidAmount" type="text/html"><span id="el_billing_other_voucher_PaidAmount">
<span<?php echo $billing_other_voucher_add->PaidAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->PaidAmount->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" value="<?php echo HtmlEncode($billing_other_voucher_add->PaidAmount->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->PaidAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_billing_other_voucher_Currency" for="x_Currency" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_Currency" type="text/html"><?php echo $billing_other_voucher_add->Currency->caption() ?><?php echo $billing_other_voucher_add->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->Currency->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_Currency" type="text/html"><span id="el_billing_other_voucher_Currency">
<input type="text" data-table="billing_other_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->Currency->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->Currency->EditValue ?>"<?php echo $billing_other_voucher_add->Currency->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_Currency" type="text/html"><span id="el_billing_other_voucher_Currency">
<span<?php echo $billing_other_voucher_add->Currency->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->Currency->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" value="<?php echo HtmlEncode($billing_other_voucher_add->Currency->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
	<?php if (!$billing_other_voucher->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_billing_other_voucher_HospID" type="text/html"><span id="el_billing_other_voucher_HospID">
	<span<?php echo $billing_other_voucher_add->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->HospID->ViewValue)) ?>"></span>
	</span></script>
	<input type="hidden" data-table="billing_other_voucher" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($billing_other_voucher_add->HospID->FormValue) ?>">
	<?php } ?>
<?php if ($billing_other_voucher_add->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_billing_other_voucher_Reception" for="x_Reception" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_Reception" type="text/html"><?php echo $billing_other_voucher_add->Reception->caption() ?><?php echo $billing_other_voucher_add->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->Reception->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_Reception" type="text/html"><span id="el_billing_other_voucher_Reception">
<input type="text" data-table="billing_other_voucher" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->Reception->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->Reception->EditValue ?>"<?php echo $billing_other_voucher_add->Reception->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_Reception" type="text/html"><span id="el_billing_other_voucher_Reception">
<span<?php echo $billing_other_voucher_add->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->Reception->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($billing_other_voucher_add->Reception->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_billing_other_voucher_mrnno" for="x_mrnno" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_mrnno" type="text/html"><?php echo $billing_other_voucher_add->mrnno->caption() ?><?php echo $billing_other_voucher_add->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->mrnno->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_mrnno" type="text/html"><span id="el_billing_other_voucher_mrnno">
<input type="text" data-table="billing_other_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->mrnno->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->mrnno->EditValue ?>"<?php echo $billing_other_voucher_add->mrnno->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_mrnno" type="text/html"><span id="el_billing_other_voucher_mrnno">
<span<?php echo $billing_other_voucher_add->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->mrnno->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($billing_other_voucher_add->mrnno->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
	<?php if (!$billing_other_voucher->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_billing_other_voucher_GetUserName" type="text/html"><span id="el_billing_other_voucher_GetUserName">
	<span<?php echo $billing_other_voucher_add->GetUserName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->GetUserName->ViewValue)) ?>"></span>
	</span></script>
	<input type="hidden" data-table="billing_other_voucher" data-field="x_GetUserName" name="x_GetUserName" id="x_GetUserName" value="<?php echo HtmlEncode($billing_other_voucher_add->GetUserName->FormValue) ?>">
	<?php } ?>
<?php if ($billing_other_voucher_add->AdjustmentwithAdvance->Visible) { // AdjustmentwithAdvance ?>
	<div id="r_AdjustmentwithAdvance" class="form-group row">
		<label id="elh_billing_other_voucher_AdjustmentwithAdvance" for="x_AdjustmentwithAdvance" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_AdjustmentwithAdvance" type="text/html"><?php echo $billing_other_voucher_add->AdjustmentwithAdvance->caption() ?><?php echo $billing_other_voucher_add->AdjustmentwithAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->AdjustmentwithAdvance->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_AdjustmentwithAdvance" type="text/html"><span id="el_billing_other_voucher_AdjustmentwithAdvance">
<input type="text" data-table="billing_other_voucher" data-field="x_AdjustmentwithAdvance" name="x_AdjustmentwithAdvance" id="x_AdjustmentwithAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->AdjustmentwithAdvance->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->AdjustmentwithAdvance->EditValue ?>"<?php echo $billing_other_voucher_add->AdjustmentwithAdvance->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_AdjustmentwithAdvance" type="text/html"><span id="el_billing_other_voucher_AdjustmentwithAdvance">
<span<?php echo $billing_other_voucher_add->AdjustmentwithAdvance->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->AdjustmentwithAdvance->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_AdjustmentwithAdvance" name="x_AdjustmentwithAdvance" id="x_AdjustmentwithAdvance" value="<?php echo HtmlEncode($billing_other_voucher_add->AdjustmentwithAdvance->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->AdjustmentwithAdvance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->AdjustmentBillNumber->Visible) { // AdjustmentBillNumber ?>
	<div id="r_AdjustmentBillNumber" class="form-group row">
		<label id="elh_billing_other_voucher_AdjustmentBillNumber" for="x_AdjustmentBillNumber" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_AdjustmentBillNumber" type="text/html"><?php echo $billing_other_voucher_add->AdjustmentBillNumber->caption() ?><?php echo $billing_other_voucher_add->AdjustmentBillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->AdjustmentBillNumber->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_AdjustmentBillNumber" type="text/html"><span id="el_billing_other_voucher_AdjustmentBillNumber">
<input type="text" data-table="billing_other_voucher" data-field="x_AdjustmentBillNumber" name="x_AdjustmentBillNumber" id="x_AdjustmentBillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->AdjustmentBillNumber->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->AdjustmentBillNumber->EditValue ?>"<?php echo $billing_other_voucher_add->AdjustmentBillNumber->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_AdjustmentBillNumber" type="text/html"><span id="el_billing_other_voucher_AdjustmentBillNumber">
<span<?php echo $billing_other_voucher_add->AdjustmentBillNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->AdjustmentBillNumber->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_AdjustmentBillNumber" name="x_AdjustmentBillNumber" id="x_AdjustmentBillNumber" value="<?php echo HtmlEncode($billing_other_voucher_add->AdjustmentBillNumber->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->AdjustmentBillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->CancelAdvance->Visible) { // CancelAdvance ?>
	<div id="r_CancelAdvance" class="form-group row">
		<label id="elh_billing_other_voucher_CancelAdvance" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_CancelAdvance" type="text/html"><?php echo $billing_other_voucher_add->CancelAdvance->caption() ?><?php echo $billing_other_voucher_add->CancelAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->CancelAdvance->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_CancelAdvance" type="text/html"><span id="el_billing_other_voucher_CancelAdvance">
<div id="tp_x_CancelAdvance" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="billing_other_voucher" data-field="x_CancelAdvance" data-value-separator="<?php echo $billing_other_voucher_add->CancelAdvance->displayValueSeparatorAttribute() ?>" name="x_CancelAdvance[]" id="x_CancelAdvance[]" value="{value}"<?php echo $billing_other_voucher_add->CancelAdvance->editAttributes() ?>></div>
<div id="dsl_x_CancelAdvance" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $billing_other_voucher_add->CancelAdvance->checkBoxListHtml(FALSE, "x_CancelAdvance[]") ?>
</div></div>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_CancelAdvance" type="text/html"><span id="el_billing_other_voucher_CancelAdvance">
<span<?php echo $billing_other_voucher_add->CancelAdvance->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->CancelAdvance->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_CancelAdvance" name="x_CancelAdvance" id="x_CancelAdvance" value="<?php echo HtmlEncode($billing_other_voucher_add->CancelAdvance->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->CancelAdvance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->CancelReasan->Visible) { // CancelReasan ?>
	<div id="r_CancelReasan" class="form-group row">
		<label id="elh_billing_other_voucher_CancelReasan" for="x_CancelReasan" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_CancelReasan" type="text/html"><?php echo $billing_other_voucher_add->CancelReasan->caption() ?><?php echo $billing_other_voucher_add->CancelReasan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->CancelReasan->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_CancelReasan" type="text/html"><span id="el_billing_other_voucher_CancelReasan">
<textarea data-table="billing_other_voucher" data-field="x_CancelReasan" name="x_CancelReasan" id="x_CancelReasan" cols="35" rows="4" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->CancelReasan->getPlaceHolder()) ?>"<?php echo $billing_other_voucher_add->CancelReasan->editAttributes() ?>><?php echo $billing_other_voucher_add->CancelReasan->EditValue ?></textarea>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_CancelReasan" type="text/html"><span id="el_billing_other_voucher_CancelReasan">
<span<?php echo $billing_other_voucher_add->CancelReasan->viewAttributes() ?>><?php echo $billing_other_voucher_add->CancelReasan->ViewValue ?></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_CancelReasan" name="x_CancelReasan" id="x_CancelReasan" value="<?php echo HtmlEncode($billing_other_voucher_add->CancelReasan->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->CancelReasan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->CancelBy->Visible) { // CancelBy ?>
	<div id="r_CancelBy" class="form-group row">
		<label id="elh_billing_other_voucher_CancelBy" for="x_CancelBy" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_CancelBy" type="text/html"><?php echo $billing_other_voucher_add->CancelBy->caption() ?><?php echo $billing_other_voucher_add->CancelBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->CancelBy->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_CancelBy" type="text/html"><span id="el_billing_other_voucher_CancelBy">
<input type="text" data-table="billing_other_voucher" data-field="x_CancelBy" name="x_CancelBy" id="x_CancelBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->CancelBy->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->CancelBy->EditValue ?>"<?php echo $billing_other_voucher_add->CancelBy->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_CancelBy" type="text/html"><span id="el_billing_other_voucher_CancelBy">
<span<?php echo $billing_other_voucher_add->CancelBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->CancelBy->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_CancelBy" name="x_CancelBy" id="x_CancelBy" value="<?php echo HtmlEncode($billing_other_voucher_add->CancelBy->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->CancelBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->CancelDate->Visible) { // CancelDate ?>
	<div id="r_CancelDate" class="form-group row">
		<label id="elh_billing_other_voucher_CancelDate" for="x_CancelDate" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_CancelDate" type="text/html"><?php echo $billing_other_voucher_add->CancelDate->caption() ?><?php echo $billing_other_voucher_add->CancelDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->CancelDate->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_CancelDate" type="text/html"><span id="el_billing_other_voucher_CancelDate">
<input type="text" data-table="billing_other_voucher" data-field="x_CancelDate" data-format="7" name="x_CancelDate" id="x_CancelDate" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->CancelDate->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->CancelDate->EditValue ?>"<?php echo $billing_other_voucher_add->CancelDate->editAttributes() ?>>
<?php if (!$billing_other_voucher_add->CancelDate->ReadOnly && !$billing_other_voucher_add->CancelDate->Disabled && !isset($billing_other_voucher_add->CancelDate->EditAttrs["readonly"]) && !isset($billing_other_voucher_add->CancelDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="billing_other_voucheradd_js">
loadjs.ready(["fbilling_other_voucheradd", "datetimepicker"], function() {
	ew.createDateTimePicker("fbilling_other_voucheradd", "x_CancelDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_CancelDate" type="text/html"><span id="el_billing_other_voucher_CancelDate">
<span<?php echo $billing_other_voucher_add->CancelDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->CancelDate->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_CancelDate" name="x_CancelDate" id="x_CancelDate" value="<?php echo HtmlEncode($billing_other_voucher_add->CancelDate->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->CancelDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->CancelDateTime->Visible) { // CancelDateTime ?>
	<div id="r_CancelDateTime" class="form-group row">
		<label id="elh_billing_other_voucher_CancelDateTime" for="x_CancelDateTime" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_CancelDateTime" type="text/html"><?php echo $billing_other_voucher_add->CancelDateTime->caption() ?><?php echo $billing_other_voucher_add->CancelDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->CancelDateTime->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_CancelDateTime" type="text/html"><span id="el_billing_other_voucher_CancelDateTime">
<input type="text" data-table="billing_other_voucher" data-field="x_CancelDateTime" name="x_CancelDateTime" id="x_CancelDateTime" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->CancelDateTime->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->CancelDateTime->EditValue ?>"<?php echo $billing_other_voucher_add->CancelDateTime->editAttributes() ?>>
<?php if (!$billing_other_voucher_add->CancelDateTime->ReadOnly && !$billing_other_voucher_add->CancelDateTime->Disabled && !isset($billing_other_voucher_add->CancelDateTime->EditAttrs["readonly"]) && !isset($billing_other_voucher_add->CancelDateTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="billing_other_voucheradd_js">
loadjs.ready(["fbilling_other_voucheradd", "datetimepicker"], function() {
	ew.createDateTimePicker("fbilling_other_voucheradd", "x_CancelDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_CancelDateTime" type="text/html"><span id="el_billing_other_voucher_CancelDateTime">
<span<?php echo $billing_other_voucher_add->CancelDateTime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->CancelDateTime->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_CancelDateTime" name="x_CancelDateTime" id="x_CancelDateTime" value="<?php echo HtmlEncode($billing_other_voucher_add->CancelDateTime->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->CancelDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->CanceledBy->Visible) { // CanceledBy ?>
	<div id="r_CanceledBy" class="form-group row">
		<label id="elh_billing_other_voucher_CanceledBy" for="x_CanceledBy" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_CanceledBy" type="text/html"><?php echo $billing_other_voucher_add->CanceledBy->caption() ?><?php echo $billing_other_voucher_add->CanceledBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->CanceledBy->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_CanceledBy" type="text/html"><span id="el_billing_other_voucher_CanceledBy">
<input type="text" data-table="billing_other_voucher" data-field="x_CanceledBy" name="x_CanceledBy" id="x_CanceledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_add->CanceledBy->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_add->CanceledBy->EditValue ?>"<?php echo $billing_other_voucher_add->CanceledBy->editAttributes() ?>>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_CanceledBy" type="text/html"><span id="el_billing_other_voucher_CanceledBy">
<span<?php echo $billing_other_voucher_add->CanceledBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->CanceledBy->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_CanceledBy" name="x_CanceledBy" id="x_CanceledBy" value="<?php echo HtmlEncode($billing_other_voucher_add->CanceledBy->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->CanceledBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_other_voucher_add->CancelStatus->Visible) { // CancelStatus ?>
	<div id="r_CancelStatus" class="form-group row">
		<label id="elh_billing_other_voucher_CancelStatus" for="x_CancelStatus" class="<?php echo $billing_other_voucher_add->LeftColumnClass ?>"><script id="tpc_billing_other_voucher_CancelStatus" type="text/html"><?php echo $billing_other_voucher_add->CancelStatus->caption() ?><?php echo $billing_other_voucher_add->CancelStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $billing_other_voucher_add->RightColumnClass ?>"><div <?php echo $billing_other_voucher_add->CancelStatus->cellAttributes() ?>>
<?php if (!$billing_other_voucher->isConfirm()) { ?>
<script id="tpx_billing_other_voucher_CancelStatus" type="text/html"><span id="el_billing_other_voucher_CancelStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="billing_other_voucher" data-field="x_CancelStatus" data-value-separator="<?php echo $billing_other_voucher_add->CancelStatus->displayValueSeparatorAttribute() ?>" id="x_CancelStatus" name="x_CancelStatus"<?php echo $billing_other_voucher_add->CancelStatus->editAttributes() ?>>
			<?php echo $billing_other_voucher_add->CancelStatus->selectOptionListHtml("x_CancelStatus") ?>
		</select>
</div>
</span></script>
<?php } else { ?>
<script id="tpx_billing_other_voucher_CancelStatus" type="text/html"><span id="el_billing_other_voucher_CancelStatus">
<span<?php echo $billing_other_voucher_add->CancelStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_other_voucher_add->CancelStatus->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="billing_other_voucher" data-field="x_CancelStatus" name="x_CancelStatus" id="x_CancelStatus" value="<?php echo HtmlEncode($billing_other_voucher_add->CancelStatus->FormValue) ?>">
<?php } ?>
<?php echo $billing_other_voucher_add->CancelStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_billing_other_voucheradd" class="ew-custom-template"></div>
<script id="tpm_billing_other_voucheradd" type="text/html">
<div id="ct_billing_other_voucher_add"><style>
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
		<h3 class="card-title">{{include tmpl="#tpc_billing_other_voucher_PatID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_other_voucher_PatID")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"></h3>
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
		<td>{{include tmpl="#tpc_billing_other_voucher_PatientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_other_voucher_PatientID")/}}</td>
			<td>{{include tmpl="#tpc_billing_other_voucher_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_other_voucher_PatientName")/}}</td>
			<td>{{include tmpl="#tpc_billing_other_voucher_Mobile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_other_voucher_Mobile")/}}</td>
		</tr>
		<tr>
		<td>{{include tmpl="#tpc_billing_other_voucher_Date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_other_voucher_Date")/}}</td>
		<td>{{include tmpl="#tpc_billing_other_voucher_AdvanceValidityDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_other_voucher_AdvanceValidityDate")/}}</td>
		<td></td>
		</tr>
		 <tr>
			<td>{{include tmpl="#tpc_billing_other_voucher_AdvanceNo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_other_voucher_AdvanceNo")/}}</td>
			<td>{{include tmpl="#tpc_billing_other_voucher_Status"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_other_voucher_Status")/}}</td>
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
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#E706B7">
				<h3 class="card-title">Payment Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
			<td>{{include tmpl="#tpc_billing_other_voucher_ModeofPayment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_other_voucher_ModeofPayment")/}}</td>
			<td>{{include tmpl="#tpc_billing_other_voucher_Amount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_other_voucher_Amount")/}}</td>
			<td>{{include tmpl="#tpc_billing_other_voucher_Remarks"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_other_voucher_Remarks")/}}</td>
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
			<div class="card-header"  style="background-color:#06A5E7">
				<h3 id="viewBankDetails" class="card-title">BankName</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
			<td>{{include tmpl="#tpc_billing_other_voucher_CardNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_other_voucher_CardNumber")/}}</td>
			<td>{{include tmpl="#tpc_billing_other_voucher_BankName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_other_voucher_BankName")/}}</td>
			<td>{{include tmpl="#tpc_billing_other_voucher_SeectPaymentMode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_billing_other_voucher_SeectPaymentMode")/}}</td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
</div>
</script>

<?php if (!$billing_other_voucher_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $billing_other_voucher_add->OffsetColumnClass ?>"><!-- buttons offset -->
<?php if (!$billing_other_voucher->isConfirm()) { // Confirm page ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" onclick="this.form.action.value='confirm';"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $billing_other_voucher_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
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
	ew.templateData = { rows: <?php echo JsonEncode($billing_other_voucher->Rows) ?> };
	ew.applyTemplate("tpd_billing_other_voucheradd", "tpm_billing_other_voucheradd", "billing_other_voucheradd", "<?php echo $billing_other_voucher->CustomExport ?>", ew.templateData.rows[0]);
	$("script.billing_other_voucheradd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$billing_other_voucher_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	document.getElementById("viewBankName").style.display="none";
});
</script>
<?php include_once "footer.php"; ?>
<?php
$billing_other_voucher_add->terminate();
?>